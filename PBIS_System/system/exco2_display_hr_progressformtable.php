<?php
//this php page is used by exco 2
//to display the progress form of HR division and approve or edit the workform
include_once('class/progress_form.php');

$obj = new Progressform;

if ($obj->tableDisplay('HR Division')==true) {
    echo "<input style='position:relative; top:40px; left:50px;font-weight:bold;color:red' type='button' value='APPROVE' onclick='approveHRProgressform()';/>";
    echo "<input style='position:relative; top:40px; left:50px;font-weight:bold;color:red' type='button' value='DISAPPROVE' onclick='disapproveHRProgressform()';/>";
    echo "<div id='message' style='height:50px; width:500px; font-family:Courier New; color:green;font-weight:bold; position:relative;top:20px;left:220px;'>  </div>";
}

?>