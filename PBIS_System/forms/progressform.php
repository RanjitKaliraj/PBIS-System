<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <html>
      <head>
         <title> XYZ Corporation </title>
      </head>
      <body>
         <!-- main body -->
         <div id="pform" style="overflow:hidden; height:480px; width:980px;  background-color: rgba(255, 255, 255, 0.2); -webkit-box-shadow:0 0 20px black;-moz-box-shadow:0 0 20px black;box-shadow:0 0 20px black; ">
            <div  style="height:30px; width:auto; background-color:rgba(0, 0, 0, 0.7)">
               <span style="font-size:16px; margin-left:380px;font-weight:bold; position:relative; top:4px; color:darkgrey"> Submit ProgressForm Details </span>
            </div>
            <div style=" height: 90px; position:relative; left:10px;">
               <span style="position:relative; top:8px;left:30px;">
               Division Name: IT Division <br>
               Division Chief: Narendra Tiwari </br>
               Quarter:III <br>
               Month: OCT
               </span>
               <span style="float:right; margin-right:80px">
               date: <?php echo date("d/m/Y") ?>
               </span>
            </div>
            <div style="height:350px; width:auto; overflow-x:hidden;overflow-y:auto">
               <form action="#" method="post">
                  <table id="dataTable" border="1" cellpadding="0" align="center" style="width:900px; text-align: center; position:relative;top:40px;background-color:grey ">
                     <tr>
                        <th rowspan="2" height="50" width="3%">SN</th>
                        <th rowspan="2" width="18%">Activity Name</th>
                        <th rowspan="2" width="7%">Unit</th>
                        <th rowspan="2" width="7%">Weightage</th>
                        <th colspan="4" height="30" width="30%">Performance Indicators (Percentage)</th>
                        <th colspan="3" height="30" width="25%">Performance Achievement</th>
                        <th rowspan="2" width="10%">Indicator measurement basis</th>
                     </tr>
                     <tr>
                        <th height="15%" > 100 </th>
                        <th height="15%" > 75 </th>
                        <th height="15%" > 50 </th>
                        <th height="15%" > <50 </th>
                        <th height="13%" > Measurement </th>
                        <th height="13%" > Score </th>
                        <th height="14%" > Progress </th>
                     </tr>
                     <tr>
                        <td> 1 </td>
                        <td> <input  style="height:100%; width:99%" type="text" name="activity[]"/> </td>
                        <td> <input  style="height:100%; width:99%" type="text" name="unit[]"/> </td>
                        <td> <input  style="height:100%; width:99%" type="text" name="weight[]"/> </td>
                        <td> <input  style="height:100%; width:99%" type="text" name="perform1[]"/> </td>
                        <td> <input  style="height:100%; width:99%" type="text" name="perform2[]"/> </td>
                        <td> <input  style="height:100%; width:99%" type="text" name="perform3[]"/> </td>
                        <td> <input  style="height:100%; width:99%" type="text" name="perform4[]"/> </td>
                        <td> <input  style="height:100%; width:99%" type="text" name="measurement[]"/> </td>
                        <td> <input  style="height:100%; width:99%" type="text" name="score[]"/> </td>
                        <td> <input  style="height:100%; width:99%" type="text" name="progress[]"/> </td>
                        <td> <input  style="height:100%; width:99%" type="text" name="imb[]"/> </td>
                     </tr>
                  </table>
                  <div style="position:relative; top:50px;left:37px">
                     <input type="button" name="addrow" value="Add Row" onclick="addRow('dataTable')" />
                  </div>
                  <div style="position:relative; top:25px;left:782px">
                     <input type="reset" name="addrow" value="Reset"/>
                     <input type="button" name="addrow" value="Send"/>
                  </div>
               </form>
            </div>
         </div>
      </body>
   </html>