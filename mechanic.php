<?php
session_start();
if($_SESSION['login'] == false || !isset($_SESSION['login'])){
  header('Location: login.php');
}

$title =  'Mechanic Locator';

require  'controllers/mechanicController.php';
$run = new mechanicController();
$user_Id = $_SESSION['user_id'];

if(isset($_POST['pick'])){
	$call_id = isset($_POST['pick'])?$_POST['pick']:null;
	$run->updateCallStatus($call_id);
}

if(isset($_POST['close'])){
	$call_id = isset($_POST['close'])?$_POST['close']:null;
	$run->closeCall($call_id);
}

$log = $run->getLog($user_Id );
$users = $run->getUser($_SESSION['user_id']);
require 'views/mechanic.view.php';