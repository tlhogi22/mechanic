<?php
session_start();
if($_SESSION['login'] == false || !isset($_SESSION['login'])){
  header('Location: login.php');
}
$title =  'Mechanic Locator';

require  'controllers/callController.php';
$run = new callController();

$idno = $_SESSION['user_id'];
$call_Log = $run->getLogHistory($idno);
$user_info = $run->getUser($idno);

require  'views/callReport.view.php';