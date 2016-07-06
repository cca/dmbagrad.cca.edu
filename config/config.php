<?php

return [

		'db' => [
			'server' => 'localhost',
			'username' => getenv('DB_USER'),
			'password' => getenv('DB_PW'),
			'database_name' => getenv('DB_NAME'),
			'database_type' => 'mysql',
			'charset' => 'utf8'
		],

		'root_domain' => 'http://localhost',

		'components' => [

			'template_engine' => [
				//name
				'engine_name' => 'php',
				'siteName' => 'Web App',
				'forntend_module_folder' => 'frontend',
				'template_engine_settings' => [
					'smarty' => [
						'compiledDir' => 'runtime/compiled'
					],
					'twig' => [
						'compiledDir' => 'runtime/compiled'
					]
				],
			],

		],

		'production' => false,
		'frontend_module_name' => 'frontend',
		'siteName' => 'Web App'
];
