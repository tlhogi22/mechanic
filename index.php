<?php
session_start();
if($_SESSION['login'] == false || !isset($_SESSION['login'])){
  header('Location: login.php');
}
$title =  'Mechanic Locator';

require  'controllers/callController.php';
$id = $_SESSION['user_id'];
$run = new callController();

if(isset($_POST['submit_call'])){
	
	$user = $run->getUser($id);	
	$email = $user[0]['u_email'];
	$name = $user[0]['u_name'];

	$street = !empty($_POST['street']) ? $_POST['street'] : null;
	$city = !empty($_POST['city']) ? $_POST['city'] : null;
	$province = !empty($_POST['province']) ? $_POST['province'] : null;
	$zip= !empty($_POST['zip']) ? $_POST['zip'] : null;
	
	$alert = $run->storeLocation($id,$street, $city, $province, $zip);
	header('Location: sort.php');
}
require 'views/index.view.php';