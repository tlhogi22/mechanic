<?php
session_start();
if($_SESSION['login'] == false || !isset($_SESSION['login'])){
  header('Location: login.php');
}
$title =  'Mechanic Locator';

require  'controllers/callController.php';
$id = $_SESSION['user_id'];
$run = new callController();

$users = $run->getAllUsers();

if(isset($_POST['active_user'])){
	$u_id = isset($_POST['active_user']) ? $_POST['active_user'] : null;
	$run->updateUserStatus($u_id);
	$users = $run->getAllUsers();
}
require 'views/deactivateUser.view.php';