<?php
//this php file is to store workform data in the database from the each divisions

session_start();
include_once('class/progress_form.php');

$measurement = $_POST['measurement'];
$score = $_POST['score'];
$progress = $_POST['progress'];
$imd = $_POST['imd'];
$row = $_POST['row'];

$workform = new Progressform;

//checking if the input values of workform are correct of not duplicated
$workform->checkProgressformData($measurement, $score, $progress, $imd, $row);

//checking the submit status of the workform. i.e. if the workform for this quarter is already submited or not
$workform->checkSubmitStatus($_SESSION['quarter'], $_SESSION['year'],$_SESSION['division']);

//storing the workform data to the database
$workform->storeData($measurement, $score, $progress, $imd,$_SESSION['division']);

?>
