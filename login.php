<?php
session_start();
require 'controllers/userController.php';
$run = new UserController();

$title = "login";

$username = "";

if(isset($_POST['submit-login'])){
	$username = !empty($_POST['username']) ? $_POST['username'] : null;
	$password = !empty($_POST['password']) ? $_POST['password'] : null;
	
	$run->login($username,$password);
}

require 'views/login.view.php';