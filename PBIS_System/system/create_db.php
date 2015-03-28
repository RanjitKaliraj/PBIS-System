<?php
include_once('class/create_db.php');
//create new object
$database=new CreateDatabase;

//create new database
$database->createDb();

//create new table for workform
$database->createWorkformTable();

//create new table for progressform
$database->createProgressformTable();

//create new table for status of workform and progressform
$database->workformStatusTable();

//create new table for status of workform and progressform
$database->progressformStatusTable();

//create new table for login
$database->createLoginTable();

//create new table for employee details
$database->createEmployeeDB();

//create new table for Pbis percentage
$database->createPbisPercentage();
?>