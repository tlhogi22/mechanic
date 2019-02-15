<?php
return[
	'name' => 'sampledb',
	'username' => 'userKD1',
	'password' => 'yuA5gfCWWDymFeoW',
	'connection' => 'mysql://mysql:3306/',
	'options' => [
		PDO::ATTR_PERSISTENT    => true,
    	PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION,
    	PDO::ATTR_EMULATE_PREPARES => false
	]
];
