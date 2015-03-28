<?php
//this php file is to store workform data in the database
session_start();
include_once('class/work_form.php');

$activity = $_POST['activity'];
//$activity = json_decode($activity);

$unit = $_POST['unit'];
//$unit = json_decode($unit);

$weight = $_POST['weight'];
//$weight = json_decode($weight);

$p1 = $_POST['p1'];
//$p1 = json_decode($p1);

$p2 = $_POST['p2'];
//$p2 = json_decode($p2);

$p3 = $_POST['p3'];
//$p3 = json_decode($p3);

$p4 = $_POST['p4'];
//$p4 = json_decode($p4);

$workform = new Workform;

//storing the workform data to the database
$workform->updateData($activity,$unit,$weight,$p1,$p2,$p3,$p4,'IT Division');

?>
