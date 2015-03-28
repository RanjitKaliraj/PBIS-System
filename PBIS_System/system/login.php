<?php

include_once('class/login.php');
//create a new login object
$loginStart=new Login;
$loginStart->loginCheck($_POST['username'],$_POST['password']);
?>