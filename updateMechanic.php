<?php
session_start();
if($_SESSION['login'] == false || !isset($_SESSION['login'])){
  header('Location: login.php');
}

$title =  'Mechanic Locator';

require  'controllers/callController.php';
$run = new callController();

$idno = $_SESSION['user_id'];

$user_address = $run->addressexists($idno);
if(!empty($user_address)){
	foreach($user_address as $address){
		$street = $address['street'];
		$city = $address['city'];
		$province = $address['state'];
		$zip= $address['zipcode'];	
	}
}else{
		$street = "";
		$city  = "";
		$province  = "";
		$zip = "";	
}


	
	if($_SESSION['role_id'] == 2){
			$user_info = $run->getMechanic($idno);
	}else{
		$user_info = $run->getUser($idno);
	}

if(!empty($user_info)){
	foreach($user_info as $user){
		$fname = !empty($user['u_name'])? $user['u_name']: $user['m_name'];
		$lname = !empty($user['u_surname'])? $user['u_surname']: $user['m_surname'];
		$email = !empty($user['u_email'])? $user['u_email']: $user['m_email'];
		$phone = !empty($user['u_phone'])? $user['u_phone']: $user['m_phone'];	
	}
}else{
		$fname = "";
		$lame  = "";
		$email  = "";
		$zip = "";	
}

if(isset($_POST['update_address'])){
	$street = isset($_POST['street'])?$_POST['street']:null;
	$city = isset($_POST['city'])?$_POST['city']:null;
	$province = isset($_POST['province'])?$_POST['province']:null;
	$zip= isset($_POST['zip'])?$_POST['zip']:null;
	$alert = $run->updateAddress($idno,$street, $city, $province, $zip);
}

if(isset($_POST['update_user'])){
	$fname = isset($_POST['name'])?$_POST['name']:null;
	$lname = isset($_POST['surname'])?$_POST['surname']:null;
	$email = isset($_POST['email'])?$_POST['email']:null;
	$phone= isset($_POST['phone'])?$_POST['phone']:null;
	$alert = $run->updateMechanic($idno,$fname,$lname, $email, $phone);
}
require  'views/updateMechanic.view.php';