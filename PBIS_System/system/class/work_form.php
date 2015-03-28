<?php

include_once('quarter.php');
include_once('connection.php');

class Workform {

    private $connection;
    private $table="workform";
    private $table1="workformstatus";

    

    //initializing the constructor in order to connect to the database
    public function __construct() {

        //creating new connection to the database
        $connect = new Connection;
        $this->connection = $connect->connection;

    }

    public function __destruct() {
        mysqli_close($this->connection);  //closing the connection

    }

    //thia function checks if the workform submitted is empty or not
    //if empty field are found they error mesage will be displayed to the user.
    //this function also checks if the user has inputted the same details on workform or not
    //if same activity name is entered then error message will be displayed
    public function checkData($name, $units, $weight, $pi1, $pi2, $pi3, $pi4) {

        //decoding in to array of workform
        $activity = json_decode($name);
        $unit = json_decode($units);
        $weightage = json_decode($weight);
        $pi_100 = json_decode($pi1);
        $pi_75 = json_decode($pi2);
        $pi_50 = json_decode($pi3);
        $pi_less50 = json_decode($pi4);

        $obj = new Quarter;  //creating new quarter object
        $obj->quarter();   //calling method from class quarter in order to get current quarter and year


        $count1 = count($activity);
        $count2 = count($unit);
        $count3 = count($weightage);
        $count4 = count($pi_100);
        $count5 = count($pi_75);
        $count6 = count($pi_50);
        $count7 = count($pi_less50);

        if ($count1==0) {
            echo "<span style='color:red'># Error: Cannot send the empty form!!!</span>";
            exit();
        }

        else if ($count1<$count2) {
            echo "<span style='color:red'># Error: The activity field is incomplete!!!</span>";
            exit();
        }

        else if ($count1<$count3) {
            echo "<span style='color:red'># Error: The activity field is incomplete!!!</span>";
            exit();
        }

        else if ($count1<$count4) {
            echo "<span style='color:red'># Error: The activity field is incomplete!!!</span>";
            exit();
        }

        else if ($count1<$count5) {
            echo "<span style='color:red'># Error: The activity field is incomplete!!!</span>";
            exit();
        }

        else if ($count1<$count6) {
            echo "<span style='color:red'># Error: The activity field is incomplete!!!</span>";
            exit();
        }

        else if ($count1<$count7) {
            echo "<span style='color:red'># Error: The activity field is incomplete!!!</span>";
            exit();
        }



        for ($i=0; $i<$count1; $i++) {
            if (empty($activity[$i])) {
                echo "<span style='color:red'># Error: The activity field is incomplete!!!</span>";
                exit();
            }
            if (empty($unit[$i])) {
                echo "<span style='color:red'># Error: The unit field is incomplete!!!</span>";
                exit();
            }

            if (empty($weightage[$i])) {
                echo "<span style='color:red'># Error: The weightage field is incomplete!!!</span>";
                exit();
            }

            if (empty($pi_100[$i])) {
                echo "<span style='color:red'># Error: The performance indicator 100 field is incomplete!!!</span>";
                exit();
            }

            if (empty($pi_75[$i])) {
                echo "<span style='color:red'># Error: The performance indicator 75 field is incomplete!!!</span>";
                exit();
            }

            if (empty($pi_50[$i])) {
                echo "<span style='color:red'># Error: The performance indicator 50 field is incomplete!!!</span>";
                exit();
            }

            if (empty($pi_less50[$i])) {
                echo "<span style='color:red'># Error: The performance indicator >50 field is incomplete!!!</span>";
                exit();
            }
        }

        //checking if there are duplicate entries in the form
        for ($i=0; $i<$count1; $i++) {
            for ($j=$i+1; $j<$count1; $j++) {
                if ($activity[$i]==$activity[$j]) {
                    $sn1 = $i+1;
                    $sn2 = $j+1;
                    echo "<span style='color:red'># Error: Duplicate Activity name entries found in SN ".$sn1." and ".$sn2."!!!</span><br>";
                    exit();
                }
            }
        }
    }

    //this functio stores data to the database
    //this function will display message if the submission is successful or not
    public function storeData($name, $units, $weight, $pi1, $pi2, $pi3, $pi4, $div) {

        //decoding in to array of workform
        $activity = json_decode($name);
        $unit = json_decode($units);
        $weightage = json_decode($weight);
        $pi_100 = json_decode($pi1);
        $pi_75 = json_decode($pi2);
        $pi_50 = json_decode($pi3);
        $pi_less50 = json_decode($pi4);

        $division = $div;

        $obj = new Quarter;  //creating new quarter object
        $obj->quarter();   //calling method from class quarter in order to get current quarter and year

        $count1 = count($activity);

        for ($i=0; $i<$count1; $i++) {
            $sql1="INSERT INTO $this->table(SN, ActivityName,Unit,Weightage,PI_100, PI_75, PI_50, PI_less50, Quarter, Year, Division)
                  VALUES('$i','$activity[$i]','$unit[$i]','$weightage[$i]', '$pi_100[$i]', '$pi_75[$i]','$pi_50[$i]','$pi_less50[$i]','$obj->quarter','$obj->year', '$division')";

            $sql2="INSERT INTO progressform(SN, ActivityName,Unit,Weightage,PI_100, PI_75, PI_50, PI_less50, Quarter, Year, Division)
                  VALUES('$i','$activity[$i]','$unit[$i]','$weightage[$i]', '$pi_100[$i]', '$pi_75[$i]','$pi_50[$i]','$pi_less50[$i]','$obj->quarter','$obj->year', '$division')";

            $result1=$this->connection->query($sql1);
            if (!$result1) {
                echo "<span style=' color:red'># Error: Sending failed!!! An error occured while sending the Workform. Please, try again.</span>".'<br>';
                echo "<span style='font-size:11px'>(Note : If you are experiencing problems please contact to Admin.)</span>";
                //echo mysqli_error($this->connection);
                exit();
            }
            $result2=$this->connection->query($sql2);
            if (!$result2) {
                echo "<span style=' color:red'># Error: Sending failed!!! An error occured while sending the Workform. Please, try again.</span>".'<br>';
                echo "<span style='font-size:11px'>(Note : If you are experiencing problems please contact to Admin.)</span>";
                //echo mysqli_error($this->connection);
                exit();
            }
        }



        //else{
        echo "Sending Successful!!!".'<br>';
        echo "Your Workform has been successfully delivered to the Administration.";

        $this->setWorkformStatusValue($_SESSION['division'],$_SESSION['chief'],$_SESSION['quarter'],$_SESSION['date'],$_SESSION['year'], $_SESSION['submit'], $_SESSION['approve']);




    }


    //this functio stores data to the database
    //this function will display message if the submission is successful or not
    public function updateData($name, $units, $weight, $pi1, $pi2, $pi3, $pi4, $div) {

        //decoding in to array of workform
        $activity = json_decode($name);
        $unit = json_decode($units);
        $weightage = json_decode($weight);
        $pi_100 = json_decode($pi1);
        $pi_75 = json_decode($pi2);
        $pi_50 = json_decode($pi3);
        $pi_less50 = json_decode($pi4);

        $division = $div;

        $obj = new Quarter;  //creating new quarter object
        $obj->quarter();   //calling method from class quarter in order to get current quarter and year

        $count1 = count($activity);

        for ($i=0; $i<$count1; $i++) {
            $sql1="UPDATE $this->table SET ActivityName='$activity[$i]',Unit='$unit[$i]',Weightage='$weightage[$i]',PI_100='$pi_100[$i]', PI_75='$pi_75[$i]', PI_50='$pi_50[$i]', PI_less50='$pi_less50[$i]' WHERE SN='$i' AND Quarter='$obj->quarter' AND Year='$obj->year' AND Division='$division'";


            $sql2="UPDATE progressform SET ActivityName='$activity[$i]',Unit='$unit[$i]',Weightage='$weightage[$i]',PI_100='$pi_100[$i]', PI_75='$pi_75[$i]', PI_50='$pi_50[$i]', PI_less50='$pi_less50[$i]' WHERE SN='$i' AND Quarter='$obj->quarter' AND Year='$obj->year' AND Division='$division'";

            $result1=$this->connection->query($sql1);
            if (!$result1) {
                echo "<span style=' color:red'># Error: Sending failed!!! An error occured while sending the Workform. Please, try again.</span>".'<br>';
                echo "<span style='font-size:11px'>(Note : If you are experiencing problems please contact to Admin.)</span>";
                echo mysqli_error($this->connection);
                exit();
            }
            $result2=$this->connection->query($sql2);
            if (!$result2) {
                echo "<span style=' color:red'># Error: Sending failed!!! An error occured while sending the Workform. Please, try again.</span>".'<br>';
                echo "<span style='font-size:11px'>(Note : If you are experiencing problems please contact to Admin.)</span>";
                echo mysqli_error($this->connection);
                exit();
            }
        }
        //else{
        echo "Saving Successful!!!".'<br>';
        echo "The Workform has been successfully saved.";
    }

    //this function stores the values in workform status table
    public function setWorkformStatusValue($divname, $divchief, $quarter, $date_value, $year_value, $submit, $approve) {
        $division_name = $divname;
        $division_chief = $divchief;
        $quarter_name = $quarter;
        $date = $date_value;
        $year = $year_value;
        $submit_status = $submit;
        $approve_status = $approve;

        $sql="INSERT INTO $this->table1(DivisionName,DivisionChief,Quarter,Date,Year,SubmitStatus,ApproveStatus)
             VALUES ('$division_name','$division_chief','$quarter_name','$date','$year','$submit_status','$approve_status')";
        $result=$this->connection->query($sql);
        if (!$result) {
            echo "error occured.".mysqli_error($this->connection);
            exit();
        }
    }

    //this function checks if the workform is already submitted or not
    public function checkSubmitStatus($quarter, $year, $div) {

        $current_quarter = $quarter;
        $current_year = $year;
        $division = $div;

        $sql="SELECT * FROM $this->table1 WHERE Quarter='$current_quarter' AND Year='$current_year' AND DivisionName='$division'";
        $result=$this->connection->query($sql);
        if (!$result) {
            echo "<span style='color:red;'>Something went wrong in database. Error while checking submit status of required division workform. ".mysqli_error($this->connection);
            exit();
        }
        while ($row = $result->fetch_array())
        {
            if ($row['SubmitStatus']=='yes') {
                echo "<span style='color:red;'>Error: Workform for this quarter is already submitted.";
                //return true;
                exit();
            }
            else {
                return true;
            }
        }
    }


    //this function gets the workform submit status
    //this method is used in progressform.php in divisionProgressformTableDisplay($division_name) function
    //this method choose is progressform is to be submitted or not.

    public function getWorkformApproveStatus($quarter, $year, $div) {

        $current_quarter = $quarter;
        $current_year = $year;
        $division = $div;

        $sql="SELECT * FROM $this->table1 WHERE Quarter='$current_quarter' AND Year='$current_year' AND DivisionName='$division'";
        $result=$this->connection->query($sql);
        if (!$result) {
            echo "<span style='color:red;'>Something went wrong in database. Error while checking submit status of required division workform. ".mysqli_error($this->connection);
            exit();
        }
        while ($row = $result->fetch_array())
        {
            if ($row['ApproveStatus']=='Approved') {
                //echo "<span style='color:red;'>Error: Workform for this quarter is already submitted.";
                return true;
                exit();
            }
            else {
                return false;
            }
        }
    }

    //this function display workform data in the table
    public function tableDisplay($division_name) {

        $division = $division_name;  //variable that holds current division
        $obj = new Quarter;  //creating new quarter object
        $obj->quarter();   //calling method from class quarter in order to get current quarter and year

        $sql="SELECT * FROM $this->table WHERE Division='$division' AND Quarter='$obj->quarter' AND Year='$obj->year'";
        $result=$this->connection->query($sql);
        if (!$result) {
            echo "error in query while displaying workform table. For help, contact admin: ".mysqli_error($this->connection);
            exit();
        }
        echo "<div  style='height:30px; width:auto; background-color:rgba(0, 0, 0, 0.7)'>
        <span style='font-size:16px; margin-left:290px;font-weight:bold; position:relative; top:4px; color:darkgrey'> View Workform Details : ".$obj->quarter." Quarter ".$obj->year."</span>
        </div>";

        $count=$result->num_rows; //checking if the table contain data or not
        if ($count!=0) {		//if the count is not zero then table is executed else erro message will be displayed

            echo " <table border='1' cellpadding='3' align='center' style='width:900px;border-spacing:0px; position:relative; top:20px; background-color:white'>
            <tr style='background-color:grey'>
            <th rowspan='2' height='50' width='5%'>SN</th>
            <th rowspan='2' width='200'>Activity Name</th>
            <th rowspan='2' width='100'>Unit</th>
            <th rowspan='2' width='100'>Weightage</th>
            <th colspan='4' height='30' width='300'>Performance Indicators (Percentage)</th>
            </tr>
            <tr style='background-color:grey; '>
            <th height='25%' > 100 </th>
            <th height='25%' > 75 </th>
            <th height='25%' > 50 </th>
            <th height='25%' > <50 </th>
            </tr>
            ";

            //$row=$result->fetch_assoc();
            //echo $row['ActivityName'];
            $i=1;
            while ($row = $result->fetch_array())
            {
                echo "<tr>";
                echo "<td style='border:1px solid black; '>" . $i . "</td>";
                echo "<td style='border:1px solid black;'>" . $row['ActivityName'] . "</td>";
                echo "<td style='border:1px solid black;'>" . $row['Unit'] . "</td>";
                echo "<td style='border:1px solid black;'>" . $row['Weightage'] . "</td>";
                echo "<td style='border:1px solid black;'>" . $row['PI_100'] . "</td>";
                echo "<td style='border:1px solid black;'>" . $row['PI_75'] . "</td>";
                echo "<td style='border:1px solid black;'>" . $row['PI_50'] . "</td>";
                echo "<td style='border:1px solid black;'>" . $row['PI_less50'] . "</td>";

                echo "</tr>";
                $i++;
            }

            echo "</table>";
            return true;
        }

        else {
            echo "<div style='margin:10px;font-weight:bold; color:red; font-family:Courier New;'># Workform Unvailable!!!".'<br>'."Currently, The ".$division."'s Workform is pending.</div>";

        }
    }



    //this function return the approval status of the workform
    //this function also display table
    public function approvalStatus($div) {
        $division = $div;
        $obj = new Quarter;  //creating new quarter object
        $obj->quarter();   //calling method from class quarter in order to get current quarter and year

        $sql="SELECT * FROM $this->table1 WHERE DivisionName='$division' AND Quarter='$obj->quarter' AND Year='$obj->year'";
        $result=$this->connection->query($sql);
        if (!$result) {
            echo "error in query while getting approval status. For help, contact admin: ".mysqli_error($this->connection);
            exit();
        }

        $row = $result->fetch_array();
        echo "<div  style='height:30px; width:auto; background-color:rgba(0, 0, 0, 0.7)'>
        <span style='font-size:16px; margin-left:340px;font-weight:bold; position:relative; top:4px; color:darkgrey'> Workform Approval Status</span>
        </div>";


        if (isset($row)) { //if the row contains data that means workform is submitted then table will be displayed else error will displayed
            echo " <table border='1' cellpadding='3' align='center' style='width:850px;border-spacing:0px; text-align: center; position:relative; top:30px;background-color:white'>
            <tr style='background-color:grey'>
            <th width='200'>Division Name</th>
            <th width='200'>Division Chief</th>
            <th width='100'>Quarter</th>
            <th width='100'>Year</th>
            <th width='100'>Submit Status</th>
            <th width='100'>Approval Status</th>

            </tr>";


            echo "<tr style='background-color:white'>";
            echo "<td style='border:1px solid black;'>" . $row['DivisionName'] . "</td>";
            echo "<td style='border:1px solid black;'>" . $row['DivisionChief'] . "</td>";
            echo "<td style='border:1px solid black;'>" . $row['Quarter'] . "</td>";
            echo "<td style='border:1px solid black;'>" . $row['Year'] . "</td>";
            echo "<td style='border:1px solid black;'>" . $row['SubmitStatus'] . "</td>";
            echo "<td style='border:1px solid black;color:red'>" . $row['ApproveStatus'] . "</td>";

            echo "</tr>";


            echo "</table>";

        }
        else {
            echo "<span style='color:red;font-weight:bold;position:relative;top:20px; left:20px;font-family:Courier New;'>Error: The workform is not submitted yet.</span>";

        }

        if ($row['ApproveStatus']== 'Approved') {
            //echo "<span style='color:red;font-family:Courier New; font-size:16px; font-weight:bold; position:relative;top:20px; left:65px'>Your division's workform details has been Approved.</span>";
            echo "<div style='height:40px; width:550px; padding:20px; border:1px dashed green;background-color:white;position:relative; top:40px; left:180px; color:red; font-weight:bold; font-family:arial; font-size:16px'># Message: Your division's workform details has been Approved.</div>";

        }
        else if ($row['SubmitStatus']== 'yes' && $row['ApproveStatus']!= 'Approved') {
            //echo "<span style='color:red;font-size:16px; font-family:Courier New;font-weight:bold; position:relative;top:20px; left:65px'>Your division's workform details approval is Pending...</span>";
            echo "<div style='height:40px; width:550px; padding:20px; border:1px dashed green;background-color:white;position:relative; top:40px; left:180px; color:red; font-weight:bold; font-family:arial; font-size:16px'># Message: Your division's workform details approval is Pending...</div>";

        }



    }


    //this function approves workform
    //this function is triggered from administration
    public function approveWorkform($approve, $div) {
        $approval = $approve;
        $division = $div;
        $approve = 'Approved';

        $obj = new Quarter;  //creating new quarter object
        $obj->quarter();   //calling method from class quarter in order to get current quarter and year

        //$this->connect(); //connecting to the database
        $sql="SELECT * FROM $this->table1 WHERE DivisionName='$division' AND Quarter='$obj->quarter' AND Year='$obj->year'";
        $result=$this->connection->query($sql);
        if (!$result) {
            echo "Error occured while approving the workform. For help, contact admin: ".mysqli_error($this->connection);
            exit();
        }
        $row = $result->fetch_array();
        if ($row['ApproveStatus']=='pending') {



            if ($approval=='yes') {
                $sql="UPDATE $this->table1 SET ApproveStatus='$approve' WHERE DivisionName='$division' AND Quarter='$obj->quarter' AND Year='$obj->year'";
                $result=$this->connection->query($sql);
                if (!$result) {
                    echo "Error occured while approving the workform. For help, contact admin: ".mysqli_error($this->connection);
                    exit();
                }
                echo "This workform has been Successfully Approved.";
            }
        }
        else {
            echo "This workform has been already approved.";
        }
    }








    //this function edits the progress form
    //this function is called by administration section
    public function editWorkform($div) {

        $division = $div;  //variable that holds current division
        $obj = new Quarter;  //creating new quarter object
        $obj->quarter();   //calling method from class quarter in order to get current quarter and year

        $sql="SELECT * FROM $this->table WHERE Division='$division' AND Quarter='$obj->quarter' AND Year='$obj->year'";
        $result=$this->connection->query($sql);
        if (!$result) {
            echo "error in query while displaying workform table. For help, contact admin: ".mysqli_error($this->connection);
            exit();
        }
        echo "<div  style='height:30px; width:auto; background-color:rgba(0, 0, 0, 0.7)'>
        <span style='font-size:16px; margin-left:290px;font-weight:bold; position:relative; top:4px; color:darkgrey'> View Workform Details : ".$obj->quarter." Quarter ".$obj->year."</span>
        </div>";

        if ($this->getApprovalStatus($division)!=true) {
            echo " <table border='1' align='center' style='width:900px;border-spacing:0px; text-align: center; position:relative; top:20px; background-color:white'>
            <tr style='background-color:grey'>
            <th rowspan='2' height='50' width='5%'>SN</th>
            <th rowspan='2' width='200'>Activity Name</th>
            <th rowspan='2' width='100'>Unit</th>
            <th rowspan='2' width='100'>Weightage</th>
            <th colspan='4' height='30' width='300'>Performance Indicators (Percentage)</th>
            </tr>
            <tr style='background-color:grey; '>
            <th height='25%' > 100 </th>
            <th height='25%' > 75 </th>
            <th height='25%' > 50 </th>
            <th height='25%' > <50 </th>
            </tr>
            ";

            //$row=$result->fetch_assoc();
            //echo $row['ActivityName'];

            $h = 1;
            $i = 0;
            $j = 100;
            $k = 200;
            $l = 300;
            $m = 400;
            $n = 500;
            $o = 600;
            while ($row = $result->fetch_array())
            {
                $activity= explode(" ",$row['ActivityName']);
                $unit= explode(" ",$row['Unit']);
                $weight= explode(" ",$row['Weightage']);
                $p1= explode(" ",$row['PI_100']);
                $p2= explode(" ",$row['PI_75']);
                $p3= explode(" ",$row['PI_50']);
                $p4= explode(" ",$row['PI_less50']);

                echo "<tr>";
                echo "<td style='border:1px solid black;'>" .$h. "</td>";
                echo "<td style='border:1px solid black; '>" ."<input  style='height:23px;width:100%' type='text' id=".$i." value=".htmlentities(implode(html_entity_decode("&nbsp;"),$activity)).">" ."</td>";
                echo "<td style='border:1px solid black;'>" . "<input  style='height:23px; width:100%' type='text' id=".$j." value=".htmlentities(implode(html_entity_decode("&nbsp;"),$unit)).">" . "</td>";
                echo "<td style='border:1px solid black;'>" . "<input  style='height:23px; width:100%' type='text' id=".$k." value=".htmlentities(implode(html_entity_decode("&nbsp;"),$weight)).">" . "</td>";
                echo "<td style='border:1px solid black;'>" . "<input  style='height:23px; width:100%' type='text' id=".$l." value=".htmlentities(implode(html_entity_decode("&nbsp;"),$p1)).">" . "</td>";
                echo "<td style='border:1px solid black;'>" . "<input  style='height:23px; width:100%' type='text' id=".$m." value=".htmlentities(implode(html_entity_decode("&nbsp;"),$p2)).">" . "</td>";
                echo "<td style='border:1px solid black;'>" . "<input  style='height:23px; width:100%' type='text' id=".$n." value=".htmlentities(implode(html_entity_decode("&nbsp;"),$p3)).">" . "</td>";
                echo "<td style='border:1px solid black;'>" . "<input  style='height:23px; width:100%' type='text' id=".$o." value=".htmlentities(implode(html_entity_decode("&nbsp;"),$p4))." >" . "</td>";


                echo "</tr>";
                $i++;
                $h++;
                $j = $j+1;
                $k = $k+1;
                $l = $l+1;
                $m = $m+1;
                $n = $n+1;
                $o = $o+1;

            }

            echo "</table>";
            return true;
        }
        else {
            echo "<span style='color:red;font-weight:bold;position:relative;top:20px; left:20px;font-family:Courier New;'>Error: This workform is already approved and therefore cannot be edited.</span>";
        }
    }

    //this function get the approve status wheather if the workform is approved or not
    //this function is used to in edit workform for administration. if the approval is already done it can not be edited.
    public function getApprovalStatus($div) {
        $division = $div;
        $obj = new Quarter;  //creating new quarter object
        $obj->quarter();   //calling method from class quarter in order to get current quarter and year

        $sql="SELECT * FROM $this->table1 WHERE DivisionName='$division' AND Quarter='$obj->quarter' AND Year='$obj->year'";
        $result=$this->connection->query($sql);
        if (!$result) {
            echo "error in query while getting approval status. For help, contact admin: ".mysqli_error($this->connection);
            exit();
        }

        $row = $result->fetch_array();

        if ($row['ApproveStatus']== 'Approved') {
            return true;
        }
    }
}
?>

