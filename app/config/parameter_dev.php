<?php

$parameter = array(
	'base_path' => '',
	'base_uri' => 'http://booking.test/',
	'loader' => array(
		'namespaces' => array(
			'Plugin' => ROOT . '/plugins/',
			'Common' => ROOT . '/common/',
			'Core' => ROOT . '/app/modules/Core/',
            'Orders' => ROOT . '/app/modules/Orders/',
            'Wp' => ROOT . '/app/modules/Wp/',
            'User' => ROOT . '/app/modules/User/',
		)
	),
	'modules' => array(
        "core" => array(
            "className" => 'Core\\Module',
            "path"      => ROOT . '/app/modules/Core/Module.php',
        ),
        "orders" => array(
            "className" => 'Orders\\Module',
            "path"      => ROOT . '/app/modules/Orders/Module.php',
        ),
        "user" => array(
            "className" => 'User\\Module',
            "path"      => ROOT . '/app/modules/User/Module.php',
        ),
        "wp" => array(
            "className" => 'Wp\\Module',
            "path"      => ROOT . '/app/modules/Wp/Module.php',
        ),
    ),
	'db' => array(
		'debug'    => false,
        'host'     => 'localhost',
        'port'     => '3306',
        'username' => 'root',
        'password' => '',
        'dbname'   => 'booking_car',
        'charset'  => 'utf8'
	),
	'volt' => array(
        'debug'              => true,
        'stat'               => true,
        'compiled_separator' => '%'
    ),
    'path_wp_load' => '/Volumes/DATA/web-working/wordpress/nghiamp/wp-load.php',
);