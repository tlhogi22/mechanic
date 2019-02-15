<?php
return[
	'name' => 'mechanic',
	'username' => 'user6HJ',
	'password' => 'Kaysto2#',
	'connection' => 'mysql:host=mysql-mymechanic.7e14.starter-us-west-2.openshiftapps.com',
	'options' => [
		PDO::ATTR_PERSISTENT    => true,
    	PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION,
    	PDO::ATTR_EMULATE_PREPARES => false
	]
];
