<?php
//this page is called when progressform status is called from division
include_once('class/progress_form.php');
session_start();

$obj = new Progressform;
$obj->approvalStatus($_SESSION['division']);

?>