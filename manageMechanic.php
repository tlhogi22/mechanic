<?php
session_start();
if($_SESSION['login'] == false || !isset($_SESSION['login'])){
  header('Location: login.php');
}
$title =  'Mechanic Locator';

require  'controllers/callController.php';
$id = $_SESSION['user_id'];
$run = new callController();

$mechanics = $run->getAllMechanics();

if(isset($_POST['active_mechanic'])){
	$u_id = isset($_POST['active_mechanic']) ? $_POST['active_mechanic'] : null;
	$status = 1;
	$run->updateMechanicStatus($u_id,$status);
	$mechanics = $run->getAllMechanics();
}

if(isset($_POST['disable_mechanic'])){
	$u_id = isset($_POST['disable_mechanic']) ? $_POST['disable_mechanic'] : null;
	$status = 0;
	$run->updateMechanicStatus($u_id,$status);
	$mechanics = $run->getAllMechanics();
}
require 'views/manageMechanic.view.php';