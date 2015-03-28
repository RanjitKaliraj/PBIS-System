<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
   include_once('../system/class/employee.php');
   include_once('../system/class/quarter.php');
   ?>
<html xmlns="http://www.w3.org/1999/xhtml">
   <html>
      <head>
         <title> XYZ Corporation </title>
      </head>
      <body>
         <!-- main body -->
         <div id="wform" style="overflow:hidden; height:480px; width:980px;  background-color: rgba(255, 255, 255, 0.2);-webkit-box-shadow:0 0 20px black;-moz-box-shadow:0 0 20px black;box-shadow:0 0 20px black; ">
            <div  style="height:30px; width:auto; background-color:rgba(0, 0, 0, 0.7)">
               <span style="font-size:16px; margin-left:380px;font-weight:bold; position:relative; top:4px; color:darkgrey"> Submit WorkForm Details </span>
            </div>
            <div style=" height: 90px; position:relative;left:10px;">
               <span style="position:relative; top:8px;left:30px;">
               <?php
                  //this section display all the details in form heading
                  $obj = new Employee;
                  $obj1 = new Quarter;
                  
                  session_start();				   
                  $_SESSION['date'] = date('d/m/Y');
                  $_SESSION['year'] = date('Y');
                  $_SESSION['submit'] = "yes";
                  $_SESSION['approve'] = "pending";
                  
                  if ($_SESSION['division']=='IT Division'){
                  $_SESSION['chief'] = $obj->getITChief();
                  $_SESSION['quarter'] = $obj1->quarter();
                  }
                  else if ($_SESSION['division']=='HR Division'){
                  $_SESSION['chief'] = $obj->getHRChief();
                  $_SESSION['quarter'] = $obj1->quarter();
                  }
                  
                  else if ($_SESSION['division']=='RTE Division'){
                  $_SESSION['chief'] = $obj->getRTEChief();
                  $_SESSION['quarter'] = $obj1->quarter();					
                  }
                  
                  echo "Division Name: ".$_SESSION['division']."<br>";
                  echo "Division Chief: ". $_SESSION['chief']."</br>";
                  echo "Quarter: ".$_SESSION['quarter']."<br>";
                  echo "Month:"; echo $obj1->getMonth();
                  ?>
               </span>
               <span style="float:right; margin-right:80px">
               date: <?php echo $_SESSION['date'];?>
               </span>  
            </div>
            <div style="height:350px; width:auto; overflow-x:hidden;overflow-y:auto">
               <form action="../test.php" method="post">
                  <table id="dataTable" table border='1' align='center' style="width:900px;border-spacing:0px; text-align: center; position:relative; top:20px; background-color:white">
                     <tr style='background-color:grey'>
                        <th rowspan="2" height="50" width="5%">SN</th>
                        <th rowspan="2" width="25%">Activity Name</th>
                        <th rowspan="2" width="11%">Unit</th>
                        <th rowspan="2" width="15%">Weightage</th>
                        <th colspan="4" height="30" width="44%">Performance Indicators (Percentage)</th>
                     </tr>
                     <tr style='background-color:grey'>
                        <th height="25%" > 100 </th>
                        <th height="25%" > 75 </th>
                        <th height="25%" > 50 </th>
                        <th height="25%" > <50 </th>
                     </tr>
                     <tr>
                        <td style='border:1px solid black;'> 1 </td>
                        <td style='border:1px solid black;'> <input  style="height:100%; width:99%" type="text" id="0"/> </td>
                        <td style='border:1px solid black;'> <input  style="height:100%; width:99%" type="text" id="100"/> </td>
                        <td style='border:1px solid black;'> <input  style="height:100%; width:99%" type="text" id="200"/> </td>
                        <td style='border:1px solid black;'> <input  style="height:100%; width:99%" type="text" id="300"/> </td>
                        <td style='border:1px solid black;'> <input  style="height:100%; width:99%" type="text" id="400"/> </td>
                        <td style='border:1px solid black;'> <input  style="height:100%; width:99%" type="text" id="500"/> </td>
                        <td style='border:1px solid black;'> <input  style="height:100%; width:99%" type="text" id="600"/> </td>
                     </tr>
                     <tr>
                        <td> 2 </td>
                        <td> <input  style="height:100%; width:99%" type="text" id="1"/> </td>
                        <td> <input  style="height:100%; width:99%" type="text" id="101"/> </td>
                        <td> <input  style="height:100%; width:99%" type="text" id="201"/> </td>
                        <td> <input  style="height:100%; width:99%" type="text" id="301"/> </td>
                        <td> <input  style="height:100%; width:99%" type="text" id="401"/> </td>
                        <td> <input  style="height:100%; width:99%" type="text" id="501"/> </td>
                        <td> <input  style="height:100%; width:99%" type="text" id="601"/> </td>
                     </tr>
                     <tr>
                        <td> 3 </td>
                        <td> <input  style="height:100%; width:99%" type="text" id="2"/> </td>
                        <td> <input  style="height:100%; width:99%" type="text" id="102"/> </td>
                        <td> <input  style="height:100%; width:99%" type="text" id="202"/> </td>
                        <td> <input  style="height:100%; width:99%" type="text" id="302"/> </td>
                        <td> <input  style="height:100%; width:99%" type="text" id="402"/> </td>
                        <td> <input  style="height:100%; width:99%" type="text" id="502"/> </td>
                        <td> <input  style="height:100%; width:99%" type="text" id="602"/> </td>
                     </tr>
                  </table>
                  <div style="position:relative; top:27px;left:38px; margin-bottom:40px;">
                     <input type="button" name="addrow" value="Add Row" onclick="addRow('dataTable')" />
                  </div>
                  <div style="float:right; margin-right:38px; position:relative; top:-40px; z-index:1">
                     <input type="reset" name="reset" value="Reset"/>
                     <input type="button" name="reset" value="Send" onclick="sendWorkformData()";/>
                  </div>
                  <div id="message" style="height:30px; width:700px;margin-left:40px;font-family:Courier New; color:green; font-weight:bold">			   
                  </div>
               </form>
            </div>
         </div>
      </body>
   </html>