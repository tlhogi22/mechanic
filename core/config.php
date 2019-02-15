<?php
return[
	'name' => 'sampledb',
	'username' => 'userKD1',
	'password' => 'yuA5gfCWWDymFeoW',
	'connection' => 'mysql:host=mysql',
	'options' => [
		PDO::ATTR_PERSISTENT    => true,
    	PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION,
    	PDO::ATTR_EMULATE_PREPARES => false
	]
];
