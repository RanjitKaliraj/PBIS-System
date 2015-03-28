<?php
//this page is called when view progressform button is clicked in the division
include_once('class/progress_form.php');
session_start();
$obj = new Progressform;
$obj->tableDisplay($_SESSION['division']);
?>