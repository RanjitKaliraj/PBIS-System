<?php
//this php page is used by administration 
//to display the progress form of IT division and approve or edit the workform
include_once('class/progress_form.php');

$obj = new Progressform;

if ($obj->tableDisplay('IT Division')==true){
	echo "<input style='position:relative; top:40px; left:50px;font-weight:bold;color:red' type='button' value='Forward to EXCO' onclick='forwardItprogressform()';/>";
	echo "<div id='message' style='height:50px; width:500px; font-family:Courier New; font-weight:bold;color:green; position:relative;top:20px;left:220px;'>  </div>";
}
?>