<?php
include_once('class/work_form.php');
session_start();

$obj = new Workform;
$obj->approvalStatus($_SESSION['division']);

?>