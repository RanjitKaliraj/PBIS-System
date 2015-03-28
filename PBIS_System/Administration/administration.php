<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
   include_once('../system/class/login.php');		//including login in order to set username in the login textbox
   include_once('../system/class/formstatus.php');	
   include_once('../system/class/quarter.php');
   include_once('../system/class/notification.php');
   include_once('../system/class/employee.php');	
   $login = new Login;
   $form = new FormStatus;
   $quarter = new Quarter;
   $employee = new Employee;
   
   session_start();
   if(!isset($_SESSION['division'])) 
   				{
   				 header("location:../login.php");
   				 $_SESSION['username']=$login->getUserName('Admin');	
   				 exit();
   				}
   				
   else if ($_SESSION['division']!='Administration'){
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
         <script type="text/javascript" src="../../js/admin.js"> </script>
         <script type="text/javascript" src="../../js/workform.js"> </script>
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
            //this ajax is for entering to the employee table 
            $(function(){
              $("#addemployee").click(function(){
            	$("#maindiv").load("../forms/employeelist.php #employeelist",
            	function () {
            	$.getScript('../../js/employeelist.js');});
              });
            });
         </script>
         <script type="text/javascript">
            //this is ajax for displaying all the employee list in table
            	$(function(){
            	  $("#viewemployeelist").click(function(){
            		$("#maindiv").load("../system/viewemployeedetails.php");
            	  });
            	});
            	
         </script> 
         <script type="text/javascript">
            //this is ajax for displaying the workform table of IT Division
            	$(function(){
            	  $("#itworkform").click(function(){
            		$("#maindiv").load("../system/admin_display_it_workformtable.php");
            	  });
            	});
         </script>
         <script type="text/javascript">
            //this is ajax for editing the workform table of IT Division
            	$(function(){
            	  $("#edititworkform").click(function(){
            		$("#maindiv").load("../system/admin_edit_itworkform.php");
            	  });
            	});
         </script>
         <script type="text/javascript">
            //this is ajax for displaying the workform table of HR Division
            	$(function(){
            	  $("#hrworkform").click(function(){
            		$("#maindiv").load("../system/admin_display_hr_workformtable.php");
            	  });
            	});
         </script>
         <script type="text/javascript">
            //this is ajax for editing the workform table of HR Division
            	$(function(){
            	  $("#edithrworkform").click(function(){
            		$("#maindiv").load("../system/admin_edit_hrworkform.php");
            	  });
            	});
         </script>
         <script type="text/javascript">
            //this is ajax for displaying the workform table of RTE Division
            	$(function(){
            	  $("#rteworkform").click(function(){
            		$("#maindiv").load("../system/admin_display_rte_workformtable.php");
            	  });
            	});
         </script>
         <script type="text/javascript">
            //this is ajax for editing the workform table of RTE Division
            	$(function(){
            	  $("#editrteworkform").click(function(){
            		$("#maindiv").load("../system/admin_edit_rteworkform.php");
            	  });
            	});
         </script>
         <script type="text/javascript">
            //this is ajax for displaying the progressform table of IT Division
            	$(function(){
            	  $("#itprogressform").click(function(){
            		$("#maindiv").load("../system/admin_display_it_progressformtable.php");
            	  });
            	});
         </script>
         <script type="text/javascript">
            //this is ajax for displaying the progressform  table of RTE Division
            	$(function(){
            	  $("#rteprogressform").click(function(){
            		$("#maindiv").load("../system/admin_display_rte_progressformtable.php");
            	  });
            	});
         </script>
         <script type="text/javascript">
            //this is ajax for displaying the progressform table of HR Division
            	$(function(){
            	  $("#hrprogressform").click(function(){
            		$("#maindiv").load("../system/admin_display_hr_progressformtable.php");
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
         <div style="height:70px; width:auto; -webkit-box-shadow:0 0 20px black;-moz-box-shadow:0 0 20px black;box-shadow:0 0 20px black; background-color: rgba(0, 0, 0, 0.7)">
            <div style="height:80px; width:1220px; margin:auto">
               <!--for div center align note:width must be in pixel in order to align center -->
               <a href="#" title="Home">
                  <div style="height:89px;width:23%; float:left;background:url('../../images/logo.png') no-repeat">
                     <!-- for left logo -->
               <a style="text-decoration:none;" href="../../index.php"> <div style="height:62px;width:120px; position:relative; top:12px; left:2px; background:url('../../images/title.png') no-repeat; -webkit-box-shadow:0 0 20px green;-moz-box-shadow:0 0 20px green;box-shadow:0 0 20px black;">
               <span style="position:relative; top:7px; left:130px; font-size:20px; color:white"> XYZ </span><br>
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
                              <li><a href="administration.php">Administration</a></li>
                              <li><a href="../IT_Division/ITdivision.php">IT Division</a></li>
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
                  <span style="color:green; font-size:28px; position:relative; top:10px; text-shadow:0 0 10px black"> PBIS System <br>
                  <span style="color:white; font-size:10px"> Performance Based Incentive System</span></span>
               </div>
            </div>
         </div>
         <!-- for middle  -->
         <div style="height:527px;width:1220px; margin:auto; background:url('../../images/pattern.png')">
            <div id="subnav" style="height:480px; width:222px; background-color: rgba(0, 0, 0, 0.7); border-radius:10px;position:relative; top:28px; -webkit-box-shadow:0 0 20px black;-moz-box-shadow:0 0 20px black;box-shadow:0 0 20px black; ">
               <div style=" background-color:darkgrey; height:30px;margin-left:1px; width:220px; border-radius:2px;">
                  <span style="position:relative; top:-15px; left:15px; font-size:15px; font-weight:bold">Administration Division</span>
               </div>
               <div style="height:25px; margin:20px;width:180px; background-color:white; border-radius:5px;">
                  <ul style="position:relative;top:5px; left:10px">
                     <li style="list-style:none; position:relative; right:40px; width:200px"><a href="administration.php" style="text-decoration:none; color:black; font-weight:bold">Administration - Home</a></li>
                  </ul>
               </div>
               <div style="height:75px; margin:20px;width:180px; background-color:white; border-radius:5px;">
                  <div style="height:30px; margin:auto;width:180px; background-color:darkgrey; border-radius:5px;">
                     <span style="position:relative;top:5px; left:20px">Employee Information</span>
                  </div>
                  <ul style="position:relative; bottom:5px;">
                     <li><a id="viewemployeelist" style="text-decoration:none;" href="#">View Details</a></li>
                     <li><a id="addemployee" style="text-decoration:none;" href="#">Add/Edit Details</a></li>
                  </ul>
               </div>
               <div style="height:95px; margin:20px;width:180px; background-color:white; border-radius:5px;">
                  <div style="height:30px; margin:auto;width:180px; background-color:darkgrey; border-radius:5px;">
                     <span style="position:relative;top:5px; left:20px">WorkPlan Detail Form</span>
                  </div>
                  <ul style="position:relative; bottom:5px;">
                     <li><a id="itworkform" style="text-decoration:none;" href="#">IT Division</a></li>
                     <li><a id="rteworkform" style="text-decoration:none;" href="#">RTE Division</a></li>
                     <li><a id="hrworkform" style="text-decoration:none;" href="#">HR Division</a></li>
                  </ul>
               </div>
               <div style="height:95px; margin:20px;width:180px; background-color:white; border-radius:5px;">
                  <div style="height:30px; margin:auto;width:180px; background-color:darkgrey; border-radius:5px;">
                     <span style="position:relative;top:5px; left:20px">Progress Detail Form</span>
                  </div>
                  <ul style="position:relative; bottom:5px;">
                     <li><a id="itprogressform" style="text-decoration:none;" href="#">IT Division</a></li>
                     <li><a id="rteprogressform" style="text-decoration:none;" href="#">RTE Division</a></li>
                     <li><a id="hrprogressform" style="text-decoration:none;" href="#">HR Division</a></li>
                  </ul>
               </div>
               <div style="height:30px; margin:auto;width:180px; background-color:white; border-radius:5px;">
                  <ul style="position:relative;top:5px;left:10px">
                     <li style="list-style:none; width: 160px; position:relative; right:40px"><a id="pbisdisplay" href="#" style="color:black;text-decoration:none; ">PBIS Percentage Report</a></li>
                  </ul>
               </div>
            </div>
            <!-- main body -->
            <div id="maindiv" style="background:url('../../images/bg.jpg');overflow-x:hidden; height:480px; width:980px; background-color: rgba(255, 255, 255, 0.2); position:relative;top:-452px; left:240px;-webkit-box-shadow:0 0 20px black;-moz-box-shadow:0 0 20px black;box-shadow:0 0 20px black; ">
               <div style="height:30px; width:auto; background-color:rgba(0, 0, 0, 0.7)">
                  <span style="font-size:16px; margin-left:330px;font-weight:bold; position:relative; top:4px; color:darkgrey"> Home - Administration Division </span>
               </div>
               <div style=" background-color:white;float:left;height:180px; width:450px; position:relative; left:25px; top:15px; border:1px dotted black; border-radius: 5px">
                  <div style="height:25px; width:auto; background-color:rgba(0, 0, 0, 0.7)">
                     <span style="font-weight:bold;color:white; font-size:14px;position:relative; top:3px; left:10px"> Welcome to Administration Division</span>
                  </div>
                  <div style="height:140px; width: 290px; float:left">
                     <span style="font-size:14px;font-family:Arial; font-weight:bold; color:black; position:relative; top:15px; left:15px">
                     * Administration Division<br>
                     * Division Chief:<span style="color:green"> <?php echo $employee->getAdminChief() ?> </span></br>
                     </span>
                  </div>
                  <div style="float:right;height:135px; width:150px; position:relative; right:12px; top:13px; -webkit-box-shadow:0 0 8px black;-moz-box-shadow:0 0 8px black;box-shadow:0 0 8px black">
                     <img src="../../images/admin.jpg" alt="IT Department">
                  </div>
               </div>
               <div style="font-size:12px; float:right;height:180px; background-color:white; width:450px; position:relative; top:15px; right:25px; border:1px dotted black; border-radius: 5px">
                  <div style="height:25px; width:auto; background-color:rgba(0, 0, 0, 0.7)">
                     <span style="font-weight:bold;color:white; font-size:14px;position:relative; top:3px; left:10px"> Notifications and Messages </span>
                  </div>
                  <div style="position:relative; top:15px; color:green; font-family:New Courier; font-size:14px">
                     <?php
                        $notification = new Notification;
                        echo $notification->workformSubmitMessage('IT Division');
                        echo "<br>";
                        echo $notification->progressformSubmitMessage('IT Division');
                        echo "<br>";
                        echo $notification->workformSubmitMessage('HR Division');
                        echo "<br>";
                        echo $notification->progressformSubmitMessage('HR Division');
                        echo "<br>";
                        echo $notification->workformSubmitMessage('RTE Division');
                        echo "<br>";
                        echo $notification->progressformSubmitMessage('RTE Division');
                        echo "<br>";
                        echo $notification->pbisNotification();
                        ?>
                  </div>
               </div>
               <div style="float:left; height:220px; width:930px; position:relative;top:30px; left:25px; border:1px dotted black; border-radius: 5px">
                  <div style="height:20px; width:auto; background-color:rgba(0, 0, 0, 0.7);text-align:center">
                     <span style="font-weight:bold;color:white; font-size:13px">WorkForm Status - <?php echo $quarter->quarter()  ?> Quarter</span>
                  </div>
                  <div style="height:90px; width:auto">
                     <!-- Container for workforms status block -->
                     <div style=" background-color:white;float:left; height:75px; width: 280px; margin-left:22px; margin-top:4px; border:1px dotted black; border-radius: 5px ">
                        <div style="height:15px; width:auto; background-color:rgba(0, 0, 0, 0.7); text-align:center">
                           <span style="color:white; font-size:12px;position:relative;"> IT Division</span>
                        </div>
                        <div style="height:auto; width:auto; position:relative; top:-10px;font-size:11px; color:green">
                           <ul style="list-style:none">
                              <li> Submit Status:<span style="color:red"> <?php $form->workformSubmitStatus('IT Division', $quarter->quarter())    ?> </span></li>
                              <li>Approval Status:<span style="color:red"> <?php  $form->workformApproveStatus('IT Division', $quarter->quarter())  ?> </span> </li>
                              <li>Date:<span style="color:red"> <?php    $form->workformSubmitDate('IT Division', $quarter->quarter())   ?> </span> </li>
                              <li><a id="itworkform" href="#" style="color:black; font-weight:bold"> </a></li>
                           </ul>
                        </div>
                     </div>
                     <div style=" background-color:white;float:left; height:75px; width: 280px; margin-left:22px; margin-top:4px; border:1px dotted black; border-radius: 5px ">
                        <div style="height:15px; width:auto; background-color:rgba(0, 0, 0, 0.7); text-align:center">
                           <span style="color:white; font-size:12px;position:relative;"> HR Division</span>
                        </div>
                        <div style="height:auto; width:auto; position:relative; top:-10px;font-size:11px; color:green">
                           <ul style="list-style:none">
                              <li> Submit Status: <span style="color:red"> <?php  $form->workformSubmitStatus('HR Division', $quarter->quarter())   ?> </span></li>
                              <li>Approval Status: <span style="color:red"> <?php $form->workformApproveStatus('HR Division', $quarter->quarter())   ?> </span> </li>
                              <li>Date:<span style="color:red"> <?php   $form->workformSubmitDate('HR Division', $quarter->quarter())    ?> </span> </li>
                              <li><a id="hrworkform" href="#" style="color:black; font-weight:bold"> </a></li>
                           </ul>
                        </div>
                     </div>
                     <div style=" background-color:white;float:left; height:75px; width: 280px; margin-left:22px; margin-top:4px; border:1px dotted black; border-radius: 5px ">
                        <div style="height:15px; width:auto; background-color:rgba(0, 0, 0, 0.7); text-align:center">
                           <span style="color:white; font-size:12px;position:relative;"> RTE Division</span>
                        </div>
                        <div style="height:auto; width:auto; position:relative; top:-10px;font-size:11px; color:green">
                           <ul style="list-style:none">
                              <li> Submit Status: <span style="color:red"> <?php  $form->workformSubmitStatus('RTE Division', $quarter->quarter())   ?> </span></li>
                              <li>Approval Status: <span style="color:red"> <?php $form->workformApproveStatus('RTE Division', $quarter->quarter())   ?> </span>  </li>
                              <li>Date: <span style="color:red"> <?php  $form->workformSubmitDate('RTE Division', $quarter->quarter())     ?> </span></li>
                              <li><a id="rteworkform" href="#" style="color:black; font-weight:bold"> </a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div style="height:20px; width:auto; background-color:rgba(0, 0, 0, 0.7); text-align:center">
                     <span style="font-weight:bold; color:white; font-size:13px">ProgressForm Status - <?php echo $quarter->quarter()  ?> Quarter</span>
                  </div>
                  <div style="height:85px; width:auto">
                     <div style=" background-color:white;float:left; height:75px; width: 280px; margin-left:22px; margin-top:4px; border:1px dotted black; border-radius: 5px ">
                        <div style="height:15px; width:auto; background-color:rgba(0, 0, 0, 0.7); text-align:center">
                           <span style="color:white; font-size:12px;position:relative;"> IT Division</span>
                        </div>
                        <div style="height:auto; width:auto; position:relative; top:-10px;font-size:11px; color:green">
                           <ul style="list-style:none">
                              <li>Submit Status: <span style="color:red"> <?php   $form->progressformSubmitStatus('IT Division', $quarter->quarter())  ?> </span></li>
                              <li>ExCo Approval Status: <span style="color:red"> <?php   $form->progressformApproveStatus('IT Division', $quarter->quarter())  ?> </span> </li>
                              <li>Date: <span style="color:red"> <?php  $form->progressformSubmitDate('IT Division', $quarter->quarter())     ?> </span></li>
                              <li><a id="itprogressform" href="#" style="color:black; font-weight:bold"></a></li>
                           </ul>
                        </div>
                     </div>
                     <div style=" background-color:white;float:left; height:75px; width: 280px; margin-left:22px; margin-top:4px; border:1px dotted black; border-radius: 5px ">
                        <div style="height:15px; width:auto; background-color:rgba(0, 0, 0, 0.7); text-align:center">
                           <span style="color:white; font-size:12px;position:relative;"> HR Division</span>
                        </div>
                        <div style="height:auto; width:auto; position:relative; top:-10px;font-size:11px; color:green">
                           <ul style="list-style:none">
                              <li> Submit Status:<span style="color:red"> <?php   $form->progressformSubmitStatus('HR Division', $quarter->quarter())  ?> </span></li>
                              <li>ExCo Approval Status: <span style="color:red"> <?php $form->progressformApproveStatus('HR Division', $quarter->quarter()) ?> </span> </li>
                              <li>Date: <span style="color:red"> <?php   $form->progressformSubmitDate('HR Division', $quarter->quarter())    ?> </span></li>
                              <li><a id="hrprogressform" href="#" style="color:black; font-weight:bold"> </a></li>
                           </ul>
                        </div>
                     </div>
                     <div style=" background-color:white;float:left; height:75px; width: 280px; margin-left:22px; margin-top:4px; border:1px dotted black; border-radius: 5px ">
                        <div style="height:15px; width:auto; background-color:rgba(0, 0, 0, 0.7); text-align:center">
                           <span style="color:white; font-size:12px;position:relative;"> RTE Division</span>
                        </div>
                        <div style="height:auto; width:auto; position:relative; top:-10px;font-size:11px; color:green">
                           <ul style="list-style:none">
                              <li> Submit Status: <span style="color:red"> <?php  $form->progressformSubmitStatus('RTE Division', $quarter->quarter())   ?> </span></li>
                              <li>ExCo Approval Status: <span style="color:red"> <?php   $form->progressformApproveStatus('RTE Division', $quarter->quarter()) ?> </span></li>
                              <li>Date: <span style="color:red"> <?php $form->progressformSubmitDate('RTE Division', $quarter->quarter())   ?> </span> </li>
                              <li><a id="rteprogressform" href="#" style="color:black; font-weight:bold"> </a></li>
                           </ul>
                        </div>
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