<?php
session_start();
if($_SESSION['login'] == false || !isset($_SESSION['login'])){
  header('Location: login.php');
}

$title =  'Mechanic Locator';

require  'controllers/callController.php';
require  'controllers/emailController.php';

$id = $_SESSION['user_id'];
$run = new callController();

$tech_location = $run->getLocation();
$city = $tech_location[0]['city'];
$province  = $tech_location[0]['province'];
$zip = $tech_location[0]['zip'];

	$one_selected = ' ';
	$two_selected = ' ';
	$three_selected = ' ';
	
if(isset($_POST['location']) && $_POST['location'] == 2){
	$mechanics = $run->sortByProvince($province);
	$two_selected = 'selected';
}elseif(isset($_POST['location']) && $_POST['location'] == 3){
	$mechanics = $run->sortByZip($zip);
	$three_selected = 'selected';
}else{
	$mechanics = $run->sortByCity($city);
	$one_selected = 'selected';
}

$user = $run->getUser($id);

$phone = $user[0]['u_phone'];
$name = $user[0]['u_name'];
$email = $user[0]['u_email'];

if(isset($_POST['submit_request'])){
	$description = isset($_POST['description']) ? $_POST['description'] : null;
	$mechanic_id = isset($_POST['mech_id']) ? $_POST['mech_id'] : null;
	
	$run->createRequest($id,$description,$mechanic_id);

	newRequest($email,$name);
	header('Location: callReport.php');
}

require 'views/sort.view.php';