<?php 
return [
	'/ping[/]' => [
		'get' => [
			'handler' => "App\Controllers\SphinxController:query",
			'name' => 'api_ping',
			'auth' => false
		]
	],
	'/socket[/]' => [
		'get' => [
			'handler' => "App\Controllers\SocketController:add",
			'name' => 'api_socket',
			'auth' => false
		]
	],
];