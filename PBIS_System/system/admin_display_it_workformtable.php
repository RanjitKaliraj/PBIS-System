<?php
//this php page is used by administration
//to display the workform of IT division and approve or edit the workform
include_once('class/work_form.php');

$obj = new Workform;

if ($obj->tableDisplay('IT Division')==true) {
    echo "<input style='position:relative; top:40px; left:40px; font-weight:bold;color:red' type='submit' value='Edit Form' onclick='editITWorkform()';/>";
    echo "<input style='position:relative; top:40px; left:50px;font-weight:bold;color:red' type='button' value='Approve' onclick='sendItWorkformApproval()';/>";
    echo "<div id='message' style='height:50px; width:500px; color:green;font-family:Courier New; font-weight:bold; position:relative;top:20px;left:220px;'>  </div>";
}
?>