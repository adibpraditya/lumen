<?php
	return [
	    'default' => 'mysql',
	    'connections' => [
	        'mysql' => [
	            'driver' => 'mysql',
	            'host' => env('DB_HOST'),
	            'database' => env('DB_DATABASE'),
	            'username' => env('DB_USERNAME'),
	            'password' => env('DB_PASSWORD'),
	            'charset'   => 'utf8',
	            'collation' => 'utf8_unicode_ci',
	        ],
	        'mysql2' => [
	            'driver' => 'mysql',
	            'host' => env('DB2_HOST'),
	            'database' => env('DB2_DATABASE'),
	            'username' => env('DB2_USERNAME'),
	            'password' => env('DB2_PASSWORD'),
	            'charset'   => 'utf8',
	            'collation' => 'utf8_unicode_ci',
	        ],
	        'notif' => [
	            'driver' => 'sqlsrv',
	            'host' => env('DB_NOTIF_HOST'),
	            'database' => env('DB_NOTIF_DATABASE'),
	            'username' => env('DB_NOTIF_USERNAME'),
	            'password' => env('DB_NOTIF_PASSWORD'),
	            'charset' => 'utf8',
			    'collation' => 'utf8_unicode_ci',
			    'prefix' => ''
	        ],
	        'cpm' => [
	            'driver' => 'sqlsrv',
	            'host' => env('DB_CPM_HOST'),
	            'database' => env('DB_CPM_DATABASE'),
	            'username' => env('DB_CPM_USERNAME'),
	            'password' => env('DB_CPM_PASSWORD'),
	            'charset' => 'utf8',
			    'collation' => 'utf8_unicode_ci',
			    'prefix' => ''
	        ]
	    ]
	];