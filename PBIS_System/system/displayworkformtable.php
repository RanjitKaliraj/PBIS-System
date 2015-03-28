<?php
//this php file is called when user needs to view the workform details in the respective division
include_once('class/work_form.php');

session_start();

$obj = new Workform;
//$obj->connect();

$obj->tableDisplay($_SESSION['division']);
?>