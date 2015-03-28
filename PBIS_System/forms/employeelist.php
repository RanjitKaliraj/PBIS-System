<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <html>
      <head>
         <title> XYZ Corporation </title>
      </head>
      <body>
         <!-- main body -->
         <div id="employeelist" style="overflow:hidden; height:480px; width:980px; background-color: rgba(255, 255, 255, 0.2);-webkit-box-shadow:0 0 20px black;-moz-box-shadow:0 0 20px black;box-shadow:0 0 20px black; ">
            <div style="height:30px; width:auto; background-color:rgba(0, 0, 0, 0.7)">
               <span style="font-size:16px; margin-left:380px;font-weight:bold; position:relative; top:4px; color:darkgrey"> Add Employee Details </span>
            </div>
            <div style="height:420px; width:auto; overflow-x:hidden;overflow-y:auto">
               <form action="#" method="post">
                  <table id="dataTable" border="1" cellpadding="0" align="center" style="width:900px; border-spacing:0px;text-align: center; position:relative;top:40px;background-color:grey ">
                     <tr>
                        <th width="25%">Employee Name</th>
                        <th width="20%">Address</th>
                        <th width="16%">Contact No.</th>
                        <th width="16%">Division</th>
                        <th width="18%">Division Role</th>
                     </tr>
                     <tr>
                        <td> <input  style="height:100%; width:99%" type="text" id="name" name="name[]"/> </td>
                        <td> <input  style="height:100%; width:99%" type="text" id="address" name="address[]"/> </td>
                        <td> <input  style="height:100%; width:99%" type="text" id="contact" name="contact[]"/> </td>
                        <td> <input  style="height:100%; width:99%" type="text" id="division" name="division[]"/> </td>
                        <td> <input  style="height:100%; width:99%" type="text" id="role" name="role[]"/> </td>
                     </tr>
                  </table>
                  <div style="position:relative; top:50px;left:37px">
                     <!--<input type="button" name="addrow" value="Add Row" onclick="addRow('dataTable')" />-->
                  </div>
                  <div style="position:relative; top:55px;left:762px">
                     <input type="reset"  value="Reset"/>
                     <input type="button"  value="Save to Database" onclick="sendEmployeeData()"/>
                  </div>
                  <div id="message" style="height:30px; width:700px;margin:40px;font-family:Courier New; color:green; font-weight:bold">			   
                  </div>
               </form>
            </div>
         </div>
         <!--for footer   -->
      </body>
   </html>