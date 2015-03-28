<?php
include_once('class/work_form.php');

$division='RTE Division';
$approve = 'yes';
//creating a new object of class Employee
$obj = new Workform;
$obj->approveWorkform($approve, $division);

?>