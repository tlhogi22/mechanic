<?php
session_start();
if($_SESSION['login'] == false || !isset($_SESSION['login'])){
  header('Location: login.php');
}
$title =  'Mechanic Locator';
require  'controllers/userController.php';

$run = new UserController();

if(isset($_POST['add_tech'])){
	
	$name = !empty($_POST['name']) ? $_POST['name'] : null;
	$surname = !empty($_POST['surname']) ? $_POST['surname'] : null;
	$email = !empty($_POST['email']) ? $_POST['email'] : null;
	$phone= !empty($_POST['phone']) ? $_POST['phone'] : null;
	$password ='password';
	$status = 0;
	
	$street = !empty($_POST['street']) ? $_POST['street'] : null;
	$city = !empty($_POST['city']) ? $_POST['city'] : null;
	$state = !empty($_POST['province']) ? $_POST['province'] : null;
	$zip = !empty($_POST['zip']) ? $_POST['zip'] : null;

	$alert = $run->createMechanic($name,$surname,$email,$phone, $password,$status);
	if($alert == "success"){
		$user = $run->getMechanicId($email);
		$m_id = $user[0]['m_id']; 
		$run->createUserRole($m_id,2,'m_id');
		$run->createAddress($m_id,$street, $city, $state, $zip);
	}
}
require 'views/addmechanic.view.php'; 