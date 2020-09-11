FROM alpine:3.12
LABEL Maintainer="Tim de Pater <code@trafex.nl>" \
      Description="Lightweight container with Nginx 1.18 & PHP-FPM 7.3 based on Alpine Linux."

# Install packages and remove default server definition
RUN apk --no-cache add php7 php7-fpm php7-opcache php7-mysqli php7-json php7-openssl php7-curl \
    php7-zlib php7-xml php7-phar php7-intl php7-dom php7-xmlreader php7-ctype php7-session \
    php7-mbstring php7-gd php7-xmlwriter php7-tokenizer nginx supervisor curl && \
    rm /etc/nginx/conf.d/default.conf

COPY --from=composer /usr/bin/composer /usr/bin/composer

# Configure nginx
COPY conf/nginx.conf /etc/nginx/nginx.conf

# Configure PHP-FPM
COPY conf/fpm-pool.conf /etc/php7/php-fpm.d/www.conf
COPY conf/php.ini /etc/php7/conf.d/custom.ini

# Configure supervisord
COPY conf/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Setup document root
RUN mkdir -p /usr/share/nginx/html

# Make sure files/folders needed by the processes are accessable when they run under the nobody user
RUN touch /run/nginx.pid
RUN touch /run/supervisord.pid
RUN chgrp -R 0 /var/log/nginx /var/lib/nginx /run/nginx.pid /run/supervisord.pid
RUN chmod -R g+rwx /var/log/nginx /var/lib/nginx /run/nginx.pid /run/supervisord.pid

# Add application
COPY . /usr/share/nginx/html
WORKDIR /usr/share/nginx/html

RUN chgrp -R 0 /usr/share/nginx/html
RUN chmod -R g+rwx /usr/share/nginx/html
RUN chmod -R a+X storage

RUN composer install --optimize-autoloader --no-interaction --no-progress
RUN cp .env.production .env

# Switch to use a non-root user from here on
USER 1001

# Expose the port nginx is reachable on
EXPOSE 8080

# Let supervisord start nginx & php-fpm
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]

# Configure a healthcheck to validate that everything is up&running
HEALTHCHECK --timeout=10s CMD curl --silent --fail http://127.0.0.1:8080/fpm-ping
