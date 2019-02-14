<?php
return[
	'name' => 'mechanic',
	'username' => 'thabo_mnguni',
	'password' => 'Kaysto2#',
	'connection' => 'db4free.net',
	'options' => [
		PDO::ATTR_PERSISTENT    => true,
    	PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION,
    	PDO::ATTR_EMULATE_PREPARES => false
	]
];
