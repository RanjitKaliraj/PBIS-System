<?php
include_once('class/employee.php');

//creating a new object of class Employee
$obj = new Employee;
$obj->checkInput($_POST['name'],$_POST['address'],$_POST['contact'],$_POST['division'],$_POST['divrole']);
$obj->addEmployeeDetails($_POST['name'],$_POST['address'],$_POST['contact'],$_POST['division'],$_POST['divrole']);

?>