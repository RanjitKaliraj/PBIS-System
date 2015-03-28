<?php
   session_start();
   
   ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
   include_once('PBIS_System/system/class/employee.php');
   include_once('PBIS_System/system/class/quarter.php');
   include_once('PBIS_System/system/class/formstatus.php');
   $employee = new Employee;
   $form = new FormStatus;
   $quarter = new Quarter;
   
   
   ?>
<html xmlns="http://www.w3.org/1999/xhtml">
   <html>
      <head>
         <title> XYZ Corporation </title>
         <link rel="icon" type="image/png" href="images/favicon.png" />
         <link rel="stylesheet" type="text/css" href="css/menu.css"/>
         <style type="text/css">
            .body{	
            font-family:Verdana;
            font-size:13px;
            background-color:white;
            height:100%; width:100%;
            margin:0px;
            padding:0px;
            background-image:url('images/pattern.png');	
            }
         </style>
      </head>
      <body class="body">
         <!--<div style="background-image:url('1.jpg');background-size:100%;">-->
         <!-- for header  -->
         <div style="height:70px; width:auto; -webkit-box-shadow:0 0 20px black;-moz-box-shadow:0 0 20px black;box-shadow:0 0 20px black;background-color: rgba(0, 0, 0, 0.7)">
            <div style="height:80px; width:1220px; margin:auto">
               <!--for div center align note:width must be in pixel in order to align center -->
               <a href="#" title="Home">
                  <div style="height:89px;width:23%; float:left;background:url('images/logo.png') no-repeat">
                     <!-- for left logo -->
                     <div style="height:62px;width:120px; position:relative; top:12px; left:2px; background:url('images/title.png') no-repeat; -webkit-box-shadow:0 0 20px green;-moz-box-shadow:0 0 20px green;box-shadow:0 0 20px black;">
                        <span style="position:relative; top:7px; left:130px; font-size:20px; color:white"> XYZ </span>  <br>
                        <span style=" position:relative; top:7px; left: 130px;font-size:16px; color:green"> Corporation </span>
                     </div>
                  </div>
               </a>
               <div style="float:left; margin:10px 0px 0px 0px; height:56px; width:52%; position:relative; left:35px; z-index:2">
                  <!-- for menu element  -->
                  <div id="nav">
                     <ul>
                        <li><a  href="#">HOME</a></li>
                        <li>
                           <a  href="#">DIVISIONS</a>
                           <ul>
                              <li><a href="PBIS_System/Administration/administration.php">Administration</a></li>
                              <li><a href="PBIS_System/IT_Division/ITDivision.php">IT Division</a></li>
                              <li><a href="PBIS_System/HR_Division/HRDivision.php">HR Division</a></li>
                              <li><a href="PBIS_System/RTE_Division/RTEdivision.php">RTE Division</a></li>
                           </ul>
                        </li>
                        <li>
                           <a  href="#">EXCO MEMBER</a>
                           <ul>
                              <li><a href="PBIS_System/EXCO/CEO">CEO</a></li>
                              <li><a href="PBIS_System/EXCO/MD">MD</a></li>
                           </ul>
                        </li>
                     </ul>
                  </div>
               </div>
               <div style="float:right; height:60px; width:auto; position:relative; top:1px; right:20px">
                  <span style="color:green; font-size:28px; position:relative; top:5px; text-shadow:0 0 10px black"> PBIS System <br> <span style="color:white; font-size:10px"> Performance Based Incentive System</span> </span>
               </div>
            </div>
         </div>
         <!-- for middle  -->
         <div style="height:527px; width:1220px; margin:auto; background:url('images/pattern.png')">
            <div id="subnav" style="height:480px; width:222px; background-color: rgba(0, 0, 0, 0.7); border-radius:10px;position:relative; top:28px;-webkit-box-shadow:0 0 20px black;-moz-box-shadow:0 0 20px black;box-shadow:0 0 20px black; ">
               <div style=" background-color:darkgrey; height:30px;margin-left:1px; width:220px; border-radius:2px;">
                  <span style="position:relative; top:-15px; left:70px; font-size:15px; font-weight:bold" >Homepage</span>
               </div>
               <div style=" background:url('images/2.jpg'); height:300px;margin:10px; width:200px; border-radius:2px;">
               </div>
               <div style=" background:url('images/1.jpg'); height:100px;margin:10px; width:200px; border-radius:2px;">
               </div>
               <!--
                  <div style="height:30px; margin:20px;width:180px; background-color:white; border-radius:5px;">
                  <ul style="position:relative;top:5px; left:25px" ><li style="list-style:none; position:relative; right:40px"><a href="#"  style="text-decoration:none; color:green; font-weight:bold"> IT Division - Home</a></li></ul>
                  </div>
                  <div style="height:100px; margin:20px;width:180px; background-color:white; border-radius:5px;">
                  <div style="height:30px; margin:auto;width:180px; background-color:darkgrey; border-radius:5px;"> 
                  <span  style="position:relative;top:5px; left:20px" >WorkPlan Detail Form</span>
                  </div>
                  <ul style="position:relative; bottom:5px;">
                  			<li><a style="text-decoration:none;" href="#">Approval Status</a></li>
                  			<li><a style="text-decoration:none;" href="#">View Form</a></li>
                  			<li><a style="text-decoration:none;" href="#">Submit Form</a></li>
                  			
                  		</ul>
                  </div>
                  <div style="height:100px; margin:20px;width:180px; background-color:white; border-radius:5px;">
                  <div style="height:30px; margin:auto;width:180px; background-color:darkgrey; border-radius:5px;">
                  <span style="position:relative;  left:12px; top:5px; " >WorkPlan Progress Form</span>
                  </div>
                  <ul style="position:relative; bottom:5px;">
                  			<li><a style="text-decoration:none;" href="#">Approval Status</a></li>
                  			<li><a style="text-decoration:none;" href="#">View Form</a></li>
                  			<li><a style="text-decoration:none;" href="#">Submit Form</a></li>
                  			
                  		</ul>
                  </div>
                  
                  <div style="height:30px; margin:auto;width:180px; background-color:white; border-radius:5px;">
                  <ul style="position:relative;top:5px;left:20px" ><li style="list-style:none; width: 150px; position:relative; right:40px"><a href="#" style="color:black;text-decoration:none; ">PBIS Percentage Form</a></li></ul>
                  </div>
                  -->
            </div>
            <!-- main body -->
            <div style="background:url('images/bg.jpg');overflow:hidden; text-shadow: 0px 0px 20px #000000;height:480px; width:980px;  background-color: rgba(255, 255, 255, 0.2); position:relative;top:-452px; left:240px;-webkit-box-shadow:0 0 20px black;-moz-box-shadow:0 0 20px black;box-shadow:0 0 20px black ">
               <div style="height:30px; width:auto; background-color:rgba(0, 0, 0, 0.7)">
                  <span style="font-size:16px; margin-left:320px;font-weight:bold; position:relative; top:4px; color:darkgrey"> Home - XYZ Corporation PBIS System </span>
               </div>
               <div style="float:left;height:220px; width:450px; position:relative; left:25px; top:20px; border:1px dotted black; border-radius: 5px;">
                  <div style="height:25px; width:auto; background-color:rgba(0, 0, 0, 0.7)">
                     <span style="font-weight:bold;color:white; font-size:14px;position:relative; top:3px; left:10px"> Welcome to XYZ Corporation's PBIS System </span> <br>
                  </div>
                  <div style="color:black;font-size:12px;position:relative; top:20px;margin:10px 20px 0px 20px; text-align:justify"> This is an Online PBIS system Portal for XYZ Corporation. In this system, each department
                     needs to submit their workplan and workprogress details from the respective division page and the PBIS percentage will be calculated. Please, navigate to the corresponding page
                     and login with your provided username and password.
                     <br><br> Thank you.<br> <br>
                     <span style="font-size:10px; text-align:left; color:green">(Note: Contact Administration if you donot have Username/Password.)</span>
                  </div>
               </div>
               <div style="color:green; float:right;height:220px; width:450px; position:relative; right:25px; top:20px; border:1px dotted black; border-radius: 5px">
                  <div style="height:25px; width:auto; background-color:rgba(0, 0, 0, 0.7)">
                     <span style="font-weight:bold; color:white; font-size:14px;position:relative; top:3px; left:10px"> ExCo Members </span>
                  </div>
                  <div style="height:95px; width:auto; border-bottom:1px dotted black;">
                     <div style="height:auto; width:auto; float:left; margin:20px; ">
                        <span> Name: <span style="color:red"><?php echo $employee->getExco1() ?></span> </span><br>
                        <span> Chief Executive Officer (CEO) </span> 
                     </div>
                     <div style="height:auto; width:auto; float:right">
                        <img style="position:relative; top:5px; right:10px;float:right" src="images/exco1.jpg" height="90px" width="160px" alt="CEO">
                     </div>
                  </div>
                  <div style="height:96px; width:auto; ">
                     <div style="height:auto; width:auto; float:left; margin:20px">
                        <span> Name:  <span style="color:red"> <?php echo $employee->getExco2() ?> </span></span><br>
                        <span> Managing Director (MD) </span> 
                     </div>
                     <div style="height:auto; width:auto; float:right">
                        <img style="position:relative; top:5px; right:10px;float:right" src="images/exco2.jpg" height="90px" width="160px" alt="MD">
                     </div>
                  </div>
               </div>
               <!-- divisions sections  -->
               <div style=" float:left;height:150px; width:928px; margin:auto; position:relative; left:25px; top:45px; border:1px dotted black; border-radius: 5px">
                  <div style="height:25px; width:auto; background-color:rgba(0, 0, 0, 0.7); text-align:center">
                     <span style="font-weight:bold;color:white; font-size:14px;position:relative; top:3px; left:10px"> Divisions </span>
                  </div>
                  <div style=" float:left; height:100px; width: 222px; position:relative; top:11px; left:20px;  -webkit-box-shadow:0 0 8px black;-moz-box-shadow:0 0 8px black;box-shadow:0 0 8px black;">
                     <div style="height:25px; width:auto; background-color:rgba(0, 0, 0, 0.7); text-align:center">
                        <span style="font-weight:bold;color:white; font-size:14px;position:relative; top:3px; left:10px">Administration </span>
                     </div>
                     <span style="color:green; font-size:11px;position:relative; top:3px; left:10px;position:relative; left:-18px">
                        <ul>
                           <li>Division Chief: <span style="color:red" > <?php echo $employee->getAdminChief() ?> </span></li>
                        </ul>
                     </span>
                  </div>
                  <div style=" float:left; height:100px; width: 222px; position:relative; top:11px; left:20px;  -webkit-box-shadow:0 0 8px black;-moz-box-shadow:0 0 8px black;box-shadow:0 0 8px black;">
                     <div style="height:25px; width:auto; background-color:rgba(0, 0, 0, 0.7); text-align:center">
                        <span style="font-weight:bold;color:white; font-size:14px;position:relative; top:3px; left:10px">IT Divisions </span>
                     </div>
                     <span style="color:green; font-size:11px;position:relative; top:3px; left:10px;position:relative; left:-18px">
                        <ul>
                           <li>Division Chief:<span style="color:red" > <?php echo $employee->getITChief() ?> </span></li>
                           <li>WorkForm Status:<span style="color:red" > <?php $form->workformApproveStatus('IT Division',$quarter->quarter())  ?>  </span> </li>
                           <li>Progress Status:<span style="color:red" ><?php $form->progressformApproveStatus('IT Division',$quarter->quarter())  ?>  </span> </li>
                        </ul>
                     </span>
                  </div>
                  <div style=" float:left; height:100px; width: 222px; position:relative; top:11px; left:20px;  -webkit-box-shadow:0 0 8px black;-moz-box-shadow:0 0 8px black;box-shadow:0 0 8px black;">
                     <div style="height:25px; width:auto; background-color:rgba(0, 0, 0, 0.7); text-align:center">
                        <span style="font-weight:bold;color:white; font-size:14px;position:relative; top:3px; left:10px">HR Divisions </span>
                     </div>
                     <span style="color:green; font-size:11px;position:relative; top:3px; left:10px;position:relative; left:-18px">
                        <ul>
                           <li>Division Chief:<span style="color:red" > <?php echo $employee->getHRChief() ?></span> </li>
                           <li>WorkForm Status:<span style="color:red" > <?php $form->workformApproveStatus('HR Division',$quarter->quarter())  ?>  </span> </li>
                           <li>Progress Status:<span style="color:red" > <?php $form->progressformApproveStatus('HR Division',$quarter->quarter())  ?> </span> </li>
                        </ul>
                     </span>
                  </div>
                  <div style=" float:left; height:100px; width: 222px; position:relative; top:11px; left:20px;  -webkit-box-shadow:0 0 8px black;-moz-box-shadow:0 0 8px black;box-shadow:0 0 8px black;">
                     <div style="height:25px; width:auto; background-color:rgba(0, 0, 0, 0.7); text-align:center">
                        <span style="font-weight:bold;color:white; font-size:14px;position:relative; top:3px; left:10px">RTE Divisions </span>
                     </div>
                     <span style="color:green; font-size:11px;position:relative; top:3px; left:10px;position:relative; left:-18px">
                        <ul>
                           <li>Division Chief:<span style="color:red" > <?php echo $employee->getRTEChief() ?> </span></li>
                           <li>WorkForm Status:<span style="color:red" > <?php $form->workformApproveStatus('RTE Division',$quarter->quarter())  ?> </span> </li>
                           <li>Progress Status:<span style="color:red" > <?php $form->progressformApproveStatus('RTE Division',$quarter->quarter())  ?> </span> </li>
                        </ul>
                     </span>
                  </div>
               </div>
            </div>
         </div>
         <!--for footer   -->
         <div style="height:70px; width:auto; margin-top:10px; background-color: rgba(0, 0, 0, 0.9); -webkit-box-shadow:0 0 20px black;-moz-box-shadow:0 0 20px black;box-shadow:0 0 20px black;">
            <div style="height:70px; width:1220px; margin:auto">
               <div style=" float:left; color:white;height:20px; width:300px; position:relative; top:5px;">
                  Login Status : 
                  <?php
                     if (!empty($_SESSION['division'])){
                     	echo $_SESSION['division'];
                     	echo " | <a style='color:green' href='PBIS_System/system/logout.php'>logOut </a>";
                     }
                     else{
                     	echo "<span style='color:green'> Not Available</span>"; 
                     }
                     
                       ?>
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