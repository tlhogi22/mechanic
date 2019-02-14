<?php
session_start();
if($_SESSION['login'] == false || !isset($_SESSION['login'])){
  header('Location: login.php');
}

$title =  'Mechanic Locator';

require  'controllers/callController.php';
$run = new callController();
$statusObj = $run->getStatus();

if(isset($_POST['status']) && $_POST['status'] != 0){
	$status = isset($_POST['status'])?$_POST['status']:null;
	$logs = $run->getLogsbyStatus($status);
}else{
	$logs = $run->getAllLogs();
}

require  'views/adminLogs.view.php';