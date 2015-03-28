<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
   session_start();
   if (!isset($_SESSION['division'])){
   	header("location:login.php");
   	exit();
   	session_destroy();
   }
   	
   ?>
<html xmlns="http://www.w3.org/1999/xhtml">
   <html>
      <head>
         <title> XYZ Corporation </title>
         <link rel="icon" type="image/png" href="../images/favicon.png" />
         <link rel="stylesheet" type="text/css" href="../css/menu.css"/>
         <style type="text/css">
            /* all */
            ::-webkit-input-placeholder { padding-left:5px;letter-spacing:1px; font-size:10px; font-family:verdana; }
            ::-moz-placeholder { padding-left:5px; letter-spacing:1px; font-size:10px; font-family:verdana;} /* firefox 19+ */
            :-ms-input-placeholder {padding-left:5px; letter-spacing:1px; font-size:10px; font-family:verdana;} /* ie */
            input:-moz-placeholder { padding-left:5px; letter-spacing:1px; font-size:10px; font-family:verdana;}
            .body{	
            font-family:Verdana;
            font-size:13px;
            background-color:white;
            height:100%; width:100%;
            margin:0px;
            padding:0px;
            background-image:url('../images/pattern.png');	
            }
         </style>
         <script type="text/javascript">
            function checklogin()				<!--Internal Javascript function for sign up full box -->
            		{
            		   if( document.login.username.value == "" )		//Ask to re-enter Name if the Name field is null or Empty 
            		   {
            			 alert( "Please enter your User Name!" );
            			 document.login.username.focus() ;
            			 return false;
            		   }
            		   
            		   else if( document.login.password.value == "" )		//Ask to re-enter Name if the password field is null or Empty 
            		   {
            			 alert( "Please enter your Password!" );
            			 document.login.password.focus() ;
            			 return false;
            		   }
            }			  
         </script>
      </head>
      <body class="body">
         <!--<div style="background-image:url('1.jpg');background-size:100%;">-->
         <!-- for header  -->
         <div style="height:70px; width:auto; -webkit-box-shadow:0 0 20px black;-moz-box-shadow:0 0 20px black;box-shadow:0 0 20px black;background-color: rgba(0, 0, 0, 0.7)">
            <div style="height:80px; width:1220px; margin:auto">
               <!--for div center align note:width must be in pixel in order to align center -->
               <a href="#" title="Home">
                  <div style="height:89px;width:23%; float:left;background:url('../images/logo.png') no-repeat">
                     <!-- for left logo -->
               <a style="text-decoration:none;" href="../index.php"><div style="height:62px;width:120px; position:relative; top:12px; left:2px; background:url('../images/title.png') no-repeat; -webkit-box-shadow:0 0 20px green;-moz-box-shadow:0 0 20px green;box-shadow:0 0 20px black;">
               <span style="position:relative; top:7px; left:130px; font-size:20px; color:white"> XYZ </span>  <br>
               <span style=" position:relative; top:7px; left: 130px;font-size:16px; color:green"> Corporation </span>
               </div> </a>
               </div>
               </a>
               <div style="float:left; margin:10px 0px 0px 0px; height:56px; width:52%; position:relative; left:35px; z-index:2">
                  <!-- for menu element  -->
                  <div id="nav">
                     <ul>
                        <li><a  href="../index.php">HOME</a></li>
                        <li>
                           <a  href="#">DIVISIONS</a>
                           <ul>
                              <li><a href="Administration/administration.php">Administration</a></li>
                              <li><a href="IT_Division/ITDivision.php">IT Division</a></li>
                              <li><a href="HR_Division/HRDivision.php">HR Division</a></li>
                              <li><a href="RTE_Division/RTEDivision.php">RTE Division</a></li>
                           </ul>
                        </li>
                        <li>
                           <a  href="#">EXCO MEMBER</a>
                           <ul>
                              <li><a href="EXCO/exco1.php">CEO</a></li>
                              <li><a href="EXCO/exco2.php">MD</a></li>
                           </ul>
                        </li>
                     </ul>
                  </div>
               </div>
               <div style="float:right; height:60px; width:auto; position:relative; top:1px; right:20px"> 
                  <span style="color:green; font-size:28px; position:relative; top:10px; text-shadow:0 0 10px black"> PBIS System <br> <span style="color:white; font-size:10px"> Performance Based Incentive System</span> </span>
               </div>
            </div>
         </div>
         <!-- for middle  -->
         <div style="height:527px; width:1220px; margin:auto; background:url('../images/pattern.png') ">
            <div id="subnav" style="height:480px; width:222px; background-color: rgba(0, 0, 0, 0.7); border-radius:10px;position:relative; top:28px; -webkit-box-shadow:0 0 20px black;-moz-box-shadow:0 0 20px black;box-shadow:0 0 20px black; ">
               <div style=" background-color:darkgrey; height:30px;margin-left:1px; width:220px; border-radius:2px;">
                  <span style="position:relative; top:-15px; left:70px; font-size:15px; font-weight:bold" > HomePage</span>
               </div>
               <div style=" background:url('../images/2.jpg'); height:300px;margin:10px; width:200px; border-radius:2px;">
               </div>
               <div style=" background:url('../images/1.jpg'); height:100px;margin:10px; width:200px; border-radius:2px;">
               </div>
            </div>
            <!-- main body -->
            <div style="background:url('../images/bg.jpg');overflow:hidden;text-shadow: 0px 0px 20px #000000; height:480px; width:980px; position:relative;top:-452px; left:240px;-webkit-box-shadow:0 0 20px black;-moz-box-shadow:0 0 20px black;box-shadow:0 0 20px black; ">
               <div style="height:30px; width:auto; background-color:rgba(0, 0, 0, 0.7)">
                  <span style="font-size:16px; margin-left:330px;font-weight:bold; position:relative; top:4px; left:-20px;  color:darkgrey"> Current Login Status/Session</span>
               </div>
               <!-- main login page -->
               <div style="font-family:verdana; font-size:12px; height:200px; width:400px; position:relative; top:100px; left:280px;">
                  <div style="margin: 10px; position:relative; top:50px; left: 20px; font-weight:bold; font-size:12px">
                     You are current logged in as : <span style="color: red; font-style:italic"> <?php echo $_SESSION['division']; ?> </span>
                  </div>
               </div>
            </div>
         </div>
         <!--for footer   -->
         <div style="height:70px; width:auto; margin-top:10px; background-color: rgba(0, 0, 0, 0.9); -webkit-box-shadow:0 0 20px black;-moz-box-shadow:0 0 20px black;box-shadow:0 0 20px black;">
            <div style="height:70px; width:1220px; margin:auto">
               <div style=" float:left; color:white;height:20px; width:300px; position:relative; top:5px;">
                  Login Status : <?php echo $_SESSION['division']; ?> | <a style="color:green" href="system/logout.php">logOut </a>
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