<?php
//this php file is to display pbis table

session_start();
include_once('class/pbis.php');

$obj = new CalculatePBIS;
$obj->displayPbisTable();

?>
