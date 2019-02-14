<?php
session_start();
$title =  'Mechanic Locator';
require  'controllers/userController.php';
$run = new UserController();

if(isset($_POST['submit_call'])){
	
	$name = !empty($_POST['name']) ? $_POST['name'] : null;
	$surname = !empty($_POST['surname']) ? $_POST['surname'] : null;
	$email = !empty($_POST['email']) ? $_POST['email'] : null;
	$phone= !empty($_POST['phone']) ? $_POST['phone'] : null;
	$password= !empty($_POST['password']) ? $_POST['password'] : null;
	$kin_name= !empty($_POST['kin_name']) ? $_POST['kin_name'] : null;
	$kin_email= !empty($_POST['kin_email']) ? $_POST['kin_email'] : null;
	$kin_phone= !empty($_POST['kin_phone']) ? $_POST['kin_phone'] : null;
	$status= 1;

	$alert = $run->createUser($name,$surname,$email,$phone, $password,$kin_name,$kin_phone,
	$kin_email,$status);
	if($alert == "success"){
		$user = $run->getUserId($email);
		$u_id = !empty($user[0]['user_id'])?$user[0]['user_id']:null; 
		$run->createUserRole($u_id,1,'user_id');
		$run->login($email,$password);
	}
}

if(isset($_POST['add_tech'])){
	
	$name = !empty($_POST['m_name']) ? $_POST['m_name'] : null;
	$surname = !empty($_POST['m_surname']) ? $_POST['m_surname'] : null;
	$email = !empty($_POST['m_email']) ? $_POST['m_email'] : null;
	$phone= !empty($_POST['m_phone']) ? $_POST['m_phone'] : null;
	$password= !empty($_POST['password_m']) ? $_POST['password_m'] : null;
	$status = 0;
	$street = !empty($_POST['street']) ? $_POST['street'] : null;
	$city = !empty($_POST['city']) ? $_POST['city'] : null;
	$state = !empty($_POST['province']) ? $_POST['province'] : null;
	$zip = !empty($_POST['zip']) ? $_POST['zip'] : null;
	

	$alert = $run->createMechanic($name,$surname,$email,$phone, $password,$status);
	if($alert == "success"){
		$user = $run->getMechanicId($email);
		$m_id = !empty($user[0]['m_id'])?$user[0]['m_id']:null; 
		$run->createUserRole($m_id,2,'m_id');
		$run->createAddress($m_id,$street, $city, $state, $zip);
		echo "<script> alert('Success! Pending admin approval');</script>";
	}
}
require 'views/register.view.php';