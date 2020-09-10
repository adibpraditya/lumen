FROM php:7.0.33

RUN apt-get update && apt-get install -y libxml2-dev
RUN docker-php-ext-install pdo pdo_mysql soap

USER root
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

USER 1001
COPY . /usr/src/myapp
WORKDIR /usr/src/myapp

RUN composer update
RUN composer install
#RUN mv .env.production .env

CMD [ "php", "-S", "0.0.0.0:8000", "-t", "." ]
