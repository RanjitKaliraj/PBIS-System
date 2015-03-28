<?php
//this php is called when IT division progress form submit is called
include_once('class/progress_form.php');
//create a new login object
$obj = new Progressform;
$obj->divisionProgressformTableDisplay('RTE Division');
?>