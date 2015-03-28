<?php
//this page is called when workform status in IT division is called
session_start();
include_once('class/work_form.php');
include_once('class/quarter.php');

$workform = new Workform;
$quart = new Quarter;
$quart->quarter();

$current_quarter = $quart->quarter();
$year = $quart->year;
$division = "IT Division";
$workform->checkSubmitStatus($current_quarter, $year, $division);

?>