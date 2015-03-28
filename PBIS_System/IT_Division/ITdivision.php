<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
   include_once('../system/class/login.php');		//including login in order to set username in the login textbox
   $login = new Login;
   
   include_once('../system/class/notification.php'); //get notification in the it division homepage
   
   include_once('../system/class/quarter.php');
   $quarter = new Quarter;
   
   include_once('../system/class/employee.php');
   $employee = new Employee;
   
   include_once('../system/class/pbis.php');
   $pbis = new CalculatePBIS;
   
   include_once('../system/class/formstatus.php');
   $form = new FormStatus;
   
   session_start();
   if(!isset($_SESSION['division'])) 
   				{
   				 header("location:../login.php");
   				 $_SESSION['username']=$login->getUserName('IT Division');			//getting username in order to preset in the login textbox
   				 exit();
   				}
   				
   else if ($_SESSION['division']!='IT Division'){
   		header("location:../login.php");
   		 exit();
   		 }
   ?>
<html xmlns="http://www.w3.org/1999/xhtml">
   <html>
      <head>
         <title> XYZ Corporation </title>
         <link rel="icon" type="image/png" href="../../images/favicon.png" />
         <link rel="stylesheet" type="text/css" href="../../css/menu.css"/>
         <script type="text/javascript" src="../../js/jquery-1.4.min.js"> </script>
         <script type="text/javascript" src="../../js/progressform.js"> </script>
         <style type="text/css">
            .body{	
            font-family:Verdana;
            font-size:13px;
            background-color:white;
            height:100%; width:100%;
            margin:0px;
            padding:0px;
            background-image:url('../../images/pattern.png');	
            }
         </style>
         <script type="text/javascript">
            //this ajax is for submitting workform table
            $(function(){
              $("#submitworkform").click(function(){
            	$("#maindiv").load("../forms/workform.php #wform",
            	function () {
            	$.getScript('../../js/workform.js');});
            	});
            });
         </script> 
         <script type="text/javascript">
            //this is ajax for displaying the workform table
            	$(function(){
            	  $("#viewworkform").click(function(){
            		$("#maindiv").load("../system/displayworkformtable.php");
            	  });
            	});
         </script> 
         <script type="text/javascript">
            //this is ajax for displaying the workform approval status
            	$(function(){
            	  $("#approval").click(function(){
            		$("#maindiv").load("../system/workform_approvalstatus.php");
            	  });
            	});
         </script> 
         <script type="text/javascript">
            //this ajax code is for submitting progress form 
            	$(function(){
            	  $("#submitprogressform").click(function(){
            		$("#maindiv").load("../system/itdivision_progressform_submit.php");
            	  });
            	});
         </script> 
         <script type="text/javascript">
            //this is ajax for displaying the progressform table
            	$(function(){
            	  $("#viewprogressform").click(function(){
            		$("#maindiv").load("../system/displayprogressformtable.php");
            	  });
            	});
         </script>
         <script type="text/javascript">
            //this is ajax for displaying the progressform approval status
            	$(function(){
            	  $("#progapproval").click(function(){
            		$("#maindiv").load("../system/progressform_approvalstatus.php");
            	  });
            	});
         </script>
         <script type="text/javascript">
            //this is ajax for displaying the pbis percentage table
            	$(function(){
            	  $("#pbisdisplay").click(function(){
            		$("#maindiv").load("../system/display_pbistable.php");
            	  });
            	});
         </script>
      </head>
      <body class="body">
         <!--<div style="background-image:url('1.jpg');background-size:100%;">-->
         <!-- for header  -->
         <div style="height:70px; width:auto; -webkit-box-shadow:0 0 20px black;-moz-box-shadow:0 0 20px black;box-shadow:0 0 20px black;background-color: rgba(0, 0, 0, 0.7)">
            <div style="height:80px; width:1220px; margin:auto">
               <!--for div center align note:width must be in pixel in order to align center -->
               <a href="#" title="Home">
                  <div style="height:89px;width:23%; float:left;background:url('../../images/logo.png') no-repeat">
                     <!-- for left logo -->
               <a style="text-decoration:none;" href="../../index.php"><div style="height:62px;width:120px; position:relative; top:12px; left:2px; background:url('../../images/title.png') no-repeat; -webkit-box-shadow:0 0 20px green;-moz-box-shadow:0 0 20px green;box-shadow:0 0 20px black;">
               <span style="position:relative; top:7px; left:130px; font-size:20px; color:white"> XYZ </span>  <br>
               <span style=" position:relative; top:7px; left: 130px;font-size:16px; color:green"> Corporation </span>
               </div></a>
               </div>
               </a>
               <div style="float:left; margin:10px 0px 0px 0px; height:56px; width:52%; position:relative; left:35px; z-index:2">
                  <!-- for menu element  -->
                  <div id="nav">
                     <ul>
                        <li><a  href="../../index.php">HOME</a></li>
                        <li>
                           <a  href="#">DIVISIONS</a>
                           <ul>
                              <li><a href="../Administration/administration.php">Administration</a></li>
                              <li><a href="ITdivision.php">IT Division</a></li>
                              <li><a href="../HR_Division/HRdivision.php">HR Division</a></li>
                              <li><a href="../RTE_Division/RTEdivision.php">RTE Division</a></li>
                           </ul>
                        </li>
                        <li>
                           <a  href="#">EXCO MEMBER</a>
                           <ul>
                              <li><a href="../EXCO/exco1.php">CEO</a></li>
                              <li><a href="../EXCO/exco2.php">MD</a></li>
                           </ul>
                        </li>
                     </ul>
                  </div>
               </div>
               <div style="float:right; height:60px; width:auto; position:relative; top:1px; right:20px">
                  <!-- google search -->
                  <span style=" color:green;font-size:28px; position:relative; top:10px; text-shadow:0 0 10px black"> PBIS System <br> <span style="color:white; font-size:10px"> Performance Based Incentive System</span> </span>
               </div>
            </div>
         </div>
         <!-- for middle  -->
         <div style="height:527px; width:1220px; margin:auto; background:url('../../images/pattern.png')">
            <div id="subnav" style="height:480px; width:222px; background-color: rgba(0, 0, 0, 0.7); border-radius:10px;position:relative; top:28px;-webkit-box-shadow:0 0 20px black;-moz-box-shadow:0 0 20px black;box-shadow:0 0 20px black; ">
               <div style=" background-color:darkgrey; height:30px;margin-left:1px; width:220px; border-radius:2px;">
                  <span style="position:relative; top:-15px; left:70px; font-size:15px; font-weight:bold" >IT Division</span>
               </div>
               <div style="height:30px; margin:20px;width:180px; background-color:white; border-radius:5px;">
                  <ul style="position:relative;top:5px; left:25px" >
                     <li style="list-style:none; position:relative; right:40px"><a href="ITdivision.php"  style="text-decoration:none; color:black; font-weight:bold"> IT Division - Home</a></li>
                  </ul>
               </div>
               <div style="height:100px; margin:20px;width:180px; background-color:white; border-radius:5px;">
                  <div style="height:30px; margin:auto;width:180px; background-color:darkgrey; border-radius:5px;"> 
                     <span  style="position:relative;top:5px; left:20px" >WorkPlan Detail Form</span>
                  </div>
                  <ul style="position:relative; bottom:5px;">
                     <li><a id ="approval" style="text-decoration:none;" href="#">Approval Status</a></li>
                     <li><a id="viewworkform" style="text-decoration:none;" href="#">View Form</a></li>
                     <li><a id="submitworkform" style="text-decoration:none;" href="#">Submit Form</a></li>
                  </ul>
               </div>
               <div style="height:100px; margin:20px;width:180px; background-color:white; border-radius:5px;">
                  <div style="height:30px; margin:auto;width:180px; background-color:darkgrey; border-radius:5px;">
                     <span style="position:relative;  left:12px; top:5px; " >WorkPlan Progress Form</span>
                  </div>
                  <ul style="position:relative; bottom:5px;">
                     <li><a id="progapproval" style="text-decoration:none;" href="#">Approval Status</a></li>
                     <li><a id="viewprogressform" style="text-decoration:none;" href="#">View Form</a></li>
                     <li><a id="submitprogressform" style="text-decoration:none;" href="#">Submit Form</a></li>
                  </ul>
               </div>
               <div style="height:30px; margin:auto;width:180px; background-color:white; border-radius:5px;">
                  <ul style="position:relative;top:5px;left:20px" >
                     <li style="list-style:none; width: 170px; position:relative; right:50px"><a id="pbisdisplay" href="#" style="color:black;text-decoration:none; ">PBIS Percentage Report</a></li>
                  </ul>
               </div>
            </div>
            <!-- main body -->
            <div id="maindiv" style="background:url('../../images/bg.jpg');overflow-x:hidden; height:480px; width:980px; position:relative;top:-452px; left:240px;-webkit-box-shadow:0 0 20px black;-moz-box-shadow:0 0 20px black;box-shadow:0 0 20px black; ">
               <div  style="height:30px; width:auto; background-color:rgba(0, 0, 0, 0.7)">
                  <span style="font-size:16px; margin-left:380px;font-weight:bold; position:relative; top:4px; color:darkgrey"> IT Department - Home </span>
               </div>
               <div style="background-color:white;float:left;height:190px; width:450px; position:relative; left:25px; top:20px; border:1px dotted black; border-radius: 5px">
                  <div style="height:25px; width:auto; background-color:rgba(0, 0, 0, 0.7)">
                     <span style="font-weight:bold;color:white; font-size:14px;position:relative; top:3px; left:10px"> Welcome to IT Department </span>
                  </div>
                  <div style="height:140px; width: 290px; float:left">
                     <span style="font-size:14px;font-family:veranda; font-weight:bold; color:black; position:relative; top:15px; left:15px">
                     Division Name: <span style="color:green">IT Division</span><br>
                     Division Chief:<span style="color:green"> <?php echo $employee->getITChief() ?> </span></br>
                     </span>
                  </div>
                  <div style="float:right;height:135px; width:150px; position:relative; right:12px; top:13px; -webkit-box-shadow:0 0 8px black;-moz-box-shadow:0 0 8px black;box-shadow:0 0 8px black">
                     <img src="../../images/itdiv.jpg" alt="IT Department">
                  </div>
               </div>
               <div style="font-size:12px; float:right;height:400px; width:450px; position:relative; top:20px; right:25px; border:1px dotted black; border-radius: 5px">
                  <div style="height:25px; width:auto; background-color:rgba(0, 0, 0, 0.7)">
                     <span style="font-weight:bold;color:white; font-size:14px;position:relative; top:3px; left:120px"> Work/Progress Form Details </span>
                  </div>
                  <div style="background-color:white; float:left; height:170px; width: 200px; position:relative; top:11px; left:15px;  -webkit-box-shadow:0 0 8px black;-moz-box-shadow:0 0 8px black;box-shadow:0 0 8px black;">
                     <div style="height:25px; width:auto; background-color:rgba(0, 0, 0, 0.7); ">
                        <span style="font-weight:bold; color:white; font-size:14px;position:relative; top:3px; left:60px"> I Quarter </span>
                     </div>
                     <div style="height:26px; width:auto; border:1px solid black; ">
                        <span style="font-weight:bold; color:green; position:relative; left:5px; top:4px"> Period:<span><?php $quarter->quarterFirstActiveStatus() ?></span><br></span>
                     </div>
                     <div style="font-size:11px;height:42px; width:auto; border:1px solid black; ">
                        <span style=" position:relative; top:4px; left:5px"> workForm Submit: <span style="color:red"><?php $form->workformSubmitStatus($_SESSION['division'], 'first')  ?> </span><br>
                        WorkForm Status:<span style="color:red"> <?php $form->workformApproveStatus($_SESSION['division'], 'first')  ?> </span></span>  
                     </div>
                     <div style="font-size:11px;height:42px; width:auto; border:1px solid black; ">
                        <span style="position:relative; top:4px; left:5px"> ProgressForm Submit:<span style="color:red"> <?php $form->progressformSubmitStatus($_SESSION['division'], 'first')  ?></span> <br>
                        ProgressForm Status:<span style="color:red"> <?php $form->progressformApproveStatus($_SESSION['division'], 'first')  ?> </span></span>
                     </div>
                     <div style="height:27px; width:auto; border:1px solid black; ">
                        <span style="font-weight:bold; color:green; position:relative; left:5px; top:4px"> PBIS status: <?php echo $pbis->itPbisStatus('first')  ?> <br></span>
                     </div>
                     <!--
                        <span style="color:green; position:relative; left:10px;">Duration: January to April <br> Period: Active <br></span>
                        <div style=" width: 200px; height:15px;background-color:grey; position:relative; top:4px"> WorkForm Status  </div>
                        <span style="color:grey; position:relative; top:-7px; "><ul style="list-style:none"> <li>Submit: Yes</li> <li> Status: Pending</li> </ul></span>
                        <div style=" width: 200px; height:15px;background-color:grey; position:relative; top:-17px"> WorkForm Status  </div>
                        <span style="color:grey; position:relative; top:-27px; "><ul style="list-style:none"> <li>Submit: Yes</li> <li> Status: Pending</li> </ul></span>
                        <div style=" width: 200px; height:18px;background-color:grey; position:relative; top:-37px"> PBIS status: Received  </div>
                        -->
                  </div>
                  <div style="background-color:white;float:right; height:170px; width: 200px;position:relative; top:11px; right: 15px;-webkit-box-shadow:0 0 8px black;-moz-box-shadow:0 0 8px black;box-shadow:0 0 8px black;">
                     <div style="font-weight:bold; height:25px; width:auto; background-color:rgba(0, 0, 0, 0.7)">
                        <span style="color:white; font-size:14px;position:relative; top:3px; left:60px"> II Quarter </span>
                     </div>
                     <div style="height:26px; width:auto; border:1px solid black; ">
                        <span style="font-weight:bold;color:green; position:relative; left:5px; top:4px"> Period: <?php $quarter->quarterSecondActiveStatus() ?><br></span>
                     </div>
                     <div style="font-size:11px;height:42px; width:auto; border:1px solid black; ">
                        <span style=" position:relative; top:4px; left:5px"> workForm Submit:<span style="color:red"> <?php $form->workformSubmitStatus($_SESSION['division'], 'second')  ?></span><br>
                        WorkForm Status:<span style="color:red"> <?php $form->workformApproveStatus($_SESSION['division'], 'second')  ?></span> </span>
                     </div>
                     <div style="font-size:11px;height:42px; width:auto; border:1px solid black; ">
                        <span style="position:relative; top:4px; left:5px"> ProgressForm Submit:<span style="color:red"> <?php $form->progressformSubmitStatus($_SESSION['division'], 'second')  ?> </span><br>
                        ProgressForm Status: <span style="color:red"><?php $form->progressformApproveStatus($_SESSION['division'], 'second')  ?></span></span>
                     </div>
                     <div style="height:27px; width:auto; border:1px solid black; ">
                        <span style="font-weight:bold; color:green; position:relative; left:5px; top:4px"> PBIS status: <?php echo $pbis->itPbisStatus('Second')  ?> <br></span>
                     </div>
                  </div>
                  <div style="background-color:white;float:left; height:170px; width: 200px; position:relative; top:23px; left:15px;-webkit-box-shadow:0 0 8px black;-moz-box-shadow:0 0 8px black;box-shadow:0 0 8px black;">
                     <div style="height:25px; width:auto; background-color:rgba(0, 0, 0, 0.7)">
                        <span style="font-weight:bold; color:white; font-size:14px;position:relative; top:3px; left:60px"> III Quarter </span>
                     </div>
                     <div style="height:26px; width:auto; border:1px solid black; ">
                        <span style="font-weight:bold; font-weight:bold; color:green; position:relative; left:5px; top:4px"> Period: <?php $quarter->quarterThirdActiveStatus() ?> <br></span>
                     </div>
                     <div style="font-size:11px;height:42px; width:auto; border:1px solid black; ">
                        <span style=" position:relative; top:4px; left:5px"> workForm Submit: <span style="color:red"><?php $form->workformSubmitStatus($_SESSION['division'], 'third')  ?></span> <br>
                        WorkForm Status:<span style="color:red"> <?php $form->workformApproveStatus($_SESSION['division'], 'third')  ?></span> </span>
                     </div>
                     <div style="font-size:11px;height:42px; width:auto; border:1px solid black; ">
                        <span style="position:relative; top:4px; left:5px"> ProgressForm Submit:<span style="color:red"> <?php $form->progressformSubmitStatus($_SESSION['division'], 'third')  ?> </span><br>
                        ProgressForm Status: <span style="color:red"><?php $form->progressformApproveStatus($_SESSION['division'], 'third')  ?></span></span>
                     </div>
                     <div style="height:27px; width:auto; border:1px solid black; ">
                        <span style="font-weight:bold; color:green; position:relative; left:5px; top:4px"> PBIS status: <?php echo $pbis->itPbisStatus('third')  ?> <br></span>
                     </div>
                  </div>
                  <div style="background-color:white;font-weight:bold; float:right; height:170px; width: 200px;position:relative; top:23px; right: 15px;-webkit-box-shadow:0 0 8px black;-moz-box-shadow:0 0 8px black;box-shadow:0 0 8px black;">
                     <div style="height:25px; width:auto; background-color:rgba(0, 0, 0, 0.7)">
                        <span style="color:white; font-size:14px;position:relative; top:3px; left:60px"> Durations </span>
                     </div>
                     <div style="height:46px; width:auto; border:1px solid black; text-align:center ">
                        <span style="text-decoration:underline; color:green; position:relative; left:5px; top:4px; font-weight:bold;"> I Quarter <br></span>
                        <span style="color:green; position:relative; left:5px; top:4px"> January - April <br></span>
                     </div>
                     <div style="height:46px; width:auto; border:1px solid black;text-align:center ">
                        <span style="text-decoration:underline;color:green; position:relative; left:5px; top:4px; font-weight:bold;"> II Quarter <br></span>
                        <span style="color:green; position:relative; left:5px; top:4px"> May - August <br></span>
                     </div>
                     <div style="height:47px; width:auto; border:1px solid black;text-align:center ">
                        <span style="text-decoration:underline;color:green; position:relative; left:5px; top:4px; font-weight:bold;"> III Quarter <br></span>
                        <span style="color:green; position:relative; left:5px; top:4px"> September - December <br></span>
                     </div>
                  </div>
               </div>
               <div style="background-color:white;float:left; height:190px; width:450px; position:relative;top:40px; left:25px; border:1px dotted black; border-radius: 5px">
                  <div style="height:25px; width:auto; background-color:rgba(0, 0, 0, 0.7)">
                     <span style="font-weight:bold;color:white; font-size:14px;position:relative; top:3px; left:10px"> Notifications and Messages </span>
                     <div style="margin:15px; font-family:New Courier; font-size:14px; color:green">
                        <?php
                           $notification = new Notification;
                           echo $notification->workformApproval($_SESSION['division']);
                           echo "<br>";
                           echo $notification->Exco1Approval($_SESSION['division']);
                           echo "<br>";
                           echo $notification->Exco2Approval($_SESSION['division']);
                           echo "<br>";
                           echo $notification->pbisNotification();
                           ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--for footer   -->
         <div style="height:70px; width:auto; margin-top:10px; background-color: rgba(0, 0, 0, 0.9); -webkit-box-shadow:0 0 20px black;-moz-box-shadow:0 0 20px black;box-shadow:0 0 20px black;">
            <div style="height:70px; width:1220px; margin:auto">
               <div style=" float:left; color:white;height:20px; width:300px; position:relative; top:5px;">
                  Login Status : <?php echo $_SESSION['division']; ?> | <a style="color:green" href="../system/logout.php">logOut </a>
               </div>
               <div style=" float:left; color:white;height:20px; width:auto; position:relative; top:30px;left:150px;text-align:center">
                  <span style="color:white; font-size:10px;margin:auto; ">
                  PBIS SYSTEM - A Performance Based Insentive System for XYZ Corporation. </br>
                  All Rights Reserved. </span>
               </div>
            </div>
         </div>
      </body>
   </html>