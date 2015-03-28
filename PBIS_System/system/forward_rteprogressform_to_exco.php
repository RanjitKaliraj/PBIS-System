<?php
//this php page is used when administration forward RTE division's progressform
include_once('class/progress_form.php');

//creating a new object of class progressform
$obj = new Progressform;

$obj->progressformForward('RTE Division');

?>