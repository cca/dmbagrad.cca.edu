<?php

return [

		'db' => [

			'server' => 'localhost',
			'username' => 'root',
			'password' => '123456',
			'database_name' => 'ccaprod',
			'database_type' => 'mysql',
			'charset' => 'utf8'

		],

		'root_domain' => 'http://clients.onix-systems.com/cca',

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
