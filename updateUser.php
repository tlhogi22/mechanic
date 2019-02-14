<?php
session_start();
if($_SESSION['login'] == false || !isset($_SESSION['login'])){
  header('Location: login.php');
}

$title =  'Mechanic Locator';

require  'controllers/callController.php';
$run = new callController();

$idno = $_SESSION['user_id'];

$user_info = $run->getUser($idno);
if(!empty($user_info)){
foreach($user_info as $user){
	$fname = $user['u_name'];
	$lname = $user['u_surname'];
	$email = $user['u_email'];
	$phone= $user['u_phone'];	
}
}else{
		$fname = "";
		$lame  = "";
		$email  = "";
		$zip = "";	
}

if(isset($_POST['update_user'])){
	$fname = isset($_POST['name'])?$_POST['name']:null;
	$lname = isset($_POST['surname'])?$_POST['surname']:null;
	$email = isset($_POST['email'])?$_POST['email']:null;
	$phone= isset($_POST['phone'])?$_POST['phone']:null;
	$alert = $run->updateCitizen($idno,$fname,$lname, $email, $phone);
}
require  'views/updateUser.view.php';