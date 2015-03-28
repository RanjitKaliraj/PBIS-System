<?php
//this php file is to edit the workform of RTE division

include_once('class/work_form.php');

$obj = new Workform;

if ($obj->editWorkform('RTE Division')==true) {

    echo "<input style='position:relative; top:40px; left:50px;font-weight:bold;color:red' type='button' value='SAVE' onclick='saveRTEWorkform()';/>";
    echo "<input style='position:relative; top:40px; left:50px;font-weight:bold;color:red' type='button' value='Approve' onclick='sendRteWorkformApproval()';/>";
    echo "<div id='message' style='height:50px; width:500px; color:green;font-family:Courier New; font-weight:bold; position:relative;top:20px;left:220px;'>  </div>";
}
?>

