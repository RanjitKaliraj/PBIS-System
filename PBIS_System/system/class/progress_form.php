<?php

include_once('connection.php');
include_once('quarter.php');
include_once('employee.php');
include_once('work_form.php');
class Progressform {

    //private $host="localhost";
    //private $db_name="root";
    //private $password="";
    //private $database="pbis_db";
    private $connection;
    private $table="progressform";
    private $table1="progressformstatus";



    //initializing the constructor in order to connect to the database
    public function __construct() {

        //creating new connection to the database
        $connect = new Connection;
        $this->connection = $connect->connection;
    }

    public function __destruct() {
        mysqli_close($this->connection);  //closing the connection

    }


    //thia function checks if the progressform submitted is empty or not
    //if empty field are found they Error mesage will be displayed to the user.
    //this function also checks if the user has inputted the same details on progressform or not
    //if same activity name is entered then Error message will be displayed
    public function checkProgressformData($measure, $scor, $prog, $indicat, $counter) {

        //decoding in to array of workform
        $measurement= json_decode($measure);
        $score = json_decode($scor);
        $progress = json_decode($prog);
        $imd = json_decode($indicat);
        $rowCount = $counter;

        $obj = new Quarter;  //creating new quarter object
        $obj->quarter();   //calling method from class quarter in order to get current quarter and year


        $count1 = count($measurement);
        $count2 = count($score);
        $count3 = count($progress);
        $count4 = count($imd);
        //echo "<br>";
        //echo $rowCount;


        //checking if the form is empty or not
        //else if other form field are empty or not
        if ($count1==0) {
            echo "<span style='color:red'># Error: Cannot send the empty form!!!</span>";
            exit();
        }

        else if ($count1<$count2) {
            echo "<span style='color:red'># Error: The measurement field is incomplete!!!</span>";
            exit();
        }

        else if ($count1<$count3) {
            echo "<span style='color:red'># Error: The measurement field is incomplete!!!</span>";
            exit();
        }

        else if ($count1<$count4) {
            echo "<span style='color:red'># Error: The measurement field is incomplete!!!</span>";
            exit();
        }





        for ($i=0; $i<$count1; $i++) {
            if (empty($measurement[$i])) {
                echo "<span style='color:red'># Error: The measurement field is incomplete!!!</span>";
                exit();
            }
            if (empty($score[$i])) {
                echo "<span style='color:red'># Error: The score field is incomplete!!!</span>";
                exit();
            }

            if (empty($progress[$i])) {
                echo "<span style='color:red'># Error: The progress field is incomplete!!!</span>";
                exit();
            }

            if (empty($imd[$i])) {
                echo "<span style='color:red'># Error: The indicator measurement basis field is incomplete!!!</span>";
                exit();
            }
        }

        //checking if the input is entered completely without leaving a row or not
        if ($count1!=$rowCount) {
            echo "<span style='color:red'># Error: Incomplete form. The row seems to be not filled completely!!!</span>";
            exit();
        }

        //checking if the score field is integer or not
        for ($i=0; $i<$count1; $i++) {
            //if the progress value is multiple by number then it is number otherwise it is string
            //error message will be displayed it is not number.
            if (!($score[$i]*1)) {
                echo "<span style='color:red'># Error: Please enter number in Score fields.!!!</span><br>";
                exit();
            }
        }

        //checking if the progress field is integer or not
        for ($i=0; $i<$count1; $i++) {
            //if the progress value is multiple by number then it is number otherwise it is string
            //error message will be displayed it is not number.
            if (!($progress[$i]*1)) {
                echo "<span style='color:red'># Error: Please enter number in Progress fields.!!!</span><br>";
                exit();
            }
        }



    }



    //this function stores progressform data to the database
    //this function will display message if the submission is successful or not
    public function storeData($measure, $scor, $prog, $indicat, $div) {

        //decoding in to array of workform
        $measurement= json_decode($measure);
        $score = json_decode($scor);
        $progress = json_decode($prog);
        $imd = json_decode($indicat);

        $division = $div;

        $obj = new Quarter;  //creating new quarter object
        $obj->quarter();   //calling method from class quarter in order to get current quarter and year


        $count1 = count($measurement);

        $query = "SELECT * FROM workformstatus WHERE DivisionName='$division'";
        $query_result=$this->connection->query($query);
        $row = $query_result->fetch_array();

        if ($row['SubmitStatus']=='yes') {

            for ($i=0; $i<$count1; $i++) {
                //$sql="INSERT INTO $this->table(Measurement, Score, Progress, IMB) VALUES('$measurement[$i]', '$score[$i]', '$progress[$i]', '$imd[$i]')";
                $sql="UPDATE $this->table SET Measurement='$measurement[$i]', Score= '$score[$i]', Progress='$progress[$i]', IMB='$imd[$i]'  WHERE SN='$i' AND Division='$division' AND Quarter='$obj->quarter' AND Year='$obj->year'";

                $result=$this->connection->query($sql);
                if (!$result) {
                    echo "<span style=' color:red'># Error: Sending failed!!! An error occured while sending the Progressform. Please, try again.".mysqli_Error($this->connection)."</span>".'<br>';
                    echo "<span style='font-size:11px'>(Note : If you are experiencing problems please contact to Admin.)</span>";
                    //echo mysqli_error($this->connection);
                    exit();
                }
            }

            // else{
            echo "Sending Successful!!!".'<br>';
            echo "Your Progressform has been successfully delivered to the Administration.";

            $this->setProgressformStatusValue($_SESSION['division'],$_SESSION['chief'],$_SESSION['quarter'],$_SESSION['date'],$_SESSION['year'], $_SESSION['submit'], 'pending', 'pending');

            //		}
        }
        else {
            echo "Sending Unsuccessful!!!".'<br>';
            echo "Workform has not yet been submitted.";
        }

    }

    //this function stores the values in progressform status table
    public function setProgressformStatusValue($divname, $divchief, $quarter, $date_value, $year_value, $submit, $forward, $approval) {
        $division_name = $divname;
        $division_chief = $divchief;
        $quarter_name = $quarter;
        $date = $date_value;
        $year = $year_value;
        $submit_status = $submit;
        $forward_status = $forward;
        $approve_status = $approval;

        $sql="INSERT INTO $this->table1(DivisionName,DivisionChief,Quarter,Date,Year,SubmitStatus,AdminForwardStatus, Exco1ApproveStatus,Exco2ApproveStatus)
             VALUES ('$division_name','$division_chief','$quarter_name','$date','$year','$submit_status','$forward_status', '$approve_status','$approve_status')";
        $result=$this->connection->query($sql);
        if (!$result) {
            echo "Error occured.".mysqli_error($this->connection);
            exit();
        }
    }

    //this function checks if the progressform is already submitted or not
    public function checkSubmitStatus($quarter, $year, $div) {

        $current_quarter = $quarter;
        $current_year = $year;
        $division = $div;
        $sql="SELECT * FROM $this->table1 WHERE Quarter='$current_quarter' AND Year='$current_year' AND DivisionName='$division'";
        $result=$this->connection->query($sql);
        if (!$result) {
            echo "<span style='color:red;'>Something went wrong in database. Error while checking submit status of required division Progressform. ".mysqli_Error($this->connection);
            exit();
        }
        while ($row = $result->fetch_array())
        {
            if ($row['SubmitStatus']=='yes') {
                echo "<span style='color:red;'>Error: Progressform for this quarter is already submitted.";
                exit();
            }
        }
    }

    //this function display progressform data in the table
    public function tableDisplay($division_name) {

        $division = $division_name;  //variable that holds current division
        $obj = new Quarter;  //creating new quarter object
        $obj->quarter();   //calling method from class quarter in order to get current quarter and year

        $sql="SELECT * FROM $this->table WHERE Division='$division' AND Quarter='$obj->quarter' AND Year='$obj->year'";
        $result=$this->connection->query($sql);
        if (!$result) {
            echo "Error in query while displaying progressform table. For help, contact admin: ".mysqli_Error($this->connection);
            exit();
        }
        echo "<div  style='height:30px; width:auto; background-color:rgba(0, 0, 0, 0.7)'>
        <span style='font-size:16px; margin-left:290px;font-weight:bold; position:relative; top:4px; color:darkgrey'> View Progressform Details : ".$obj->quarter." Quarter ".$obj->year."</span>
        </div>";

        //$count=$result->num_rows; //checking if the table contain data or not
        //if ($count!=0){		//if the count is not zero then table is executed else erro message will be displayed
        $row=$result->fetch_array();

        if ($row['Measurement']!='') {
            echo " <table border='1' align='center' id='table' style='width:900px;border-spacing:0px;position:relative; top:20px; background-color:white'>
            <tr style='background-color:grey'>
            <th rowspan='2' height='50' width='5%'>SN</th>
            <th rowspan='2' width='180'>Activity Name</th>
            <th rowspan='2' width='70'>Unit</th>
            <th rowspan='2' width='70'>Weightage</th>
            <th colspan='4' height='30' width='200'>Performance Indicators (Percentage)</th>
            <th colspan='3' height='30' width='20%'>Performance Achievement</th>
            <th rowspan='2' width='10%'>Indicator measurement basis</th>
            </tr>
            <tr style='background-color:grey; '>
            <th height='25%' > 100 </th>
            <th height='25%' > 75 </th>
            <th height='25%' > 50 </th>
            <th height='25%' > <50 </th>
            <th height='13%' > Measurement </th>
            <th height='13%' > Score </th>
            <th height='14%' > Progress </th>
            </tr>
            ";

            //$row=$result->fetch_assoc();
            //echo $row['ActivityName'];
            $i = 1;
            while ($row = $result->fetch_array())
            {
                echo "<tr>";
                echo "<td style='border:1px solid black;height:22px; '>" . $i . "</td>";
                echo "<td style='border:1px solid black;'>" . $row['ActivityName'] . "</td>";
                echo "<td style='border:1px solid black;'>" . $row['Unit'] . "</td>";
                echo "<td style='border:1px solid black;'>" . $row['Weightage'] . "</td>";
                echo "<td style='border:1px solid black;'>" . $row['PI_100'] . "</td>";
                echo "<td style='border:1px solid black;'>" . $row['PI_75'] . "</td>";
                echo "<td style='border:1px solid black;'>" . $row['PI_50'] . "</td>";
                echo "<td style='border:1px solid black;'>" . $row['PI_less50'] . "</td>";
                echo "<td style='border:1px solid black;'>" . $row['Measurement'] . "</td>";
                echo "<td style='border:1px solid black;'>" . $row['Score'] . "</td>";
                echo "<td style='border:1px solid black;'>" . $row['Progress'] . "</td>";
                echo "<td style='border:1px solid black;'>" . $row['IMB'] . "</td>";

                echo "</tr>";
                $i++;
            }

            echo "</table>";
            return true;
        }
        else {
            //echo "<div style='margin:10px;font-weight:bold; color:red; font-family:Courier New;'># Progressform Unvailable!!!".'<br>'."Currently, The ".$division."'s Progressform is pending.</div>";
            echo "<div style='height:60px; width:550px; padding:20px; border:1px dashed green;background-color:white;position:relative; top:40px; left:180px; color:red; font-weight:bold; font-family:arial; font-size:16px'># Error: Progressform Unvailable!!!".'<br>'."Currently, The ".$division."'s Progressform is pending.</div>";

        }
    }



    //this function return the approval status of the progressform
    //this function is used by divisions to view the approval status
    public function approvalStatus($div) {
        $division = $div;
        $obj = new Quarter;  //creating new quarter object
        $obj->quarter();   //calling method from class quarter in order to get current quarter and year

        $sql="SELECT * FROM $this->table1 WHERE DivisionName='$division' AND Quarter='$obj->quarter' AND Year='$obj->year'";
        $result=$this->connection->query($sql);
        if (!$result) {
            echo "Error in query while getting approval status. For help, contact admin: ".mysqli_error($this->connection);
            exit();
        }

        $row = $result->fetch_array();
        echo "<div  style='height:30px; width:auto; background-color:rgba(0, 0, 0, 0.7)'>
        <span style='font-size:16px; margin-left:340px;font-weight:bold; position:relative; top:4px; color:darkgrey'> Progressform Approval Status</span>
        </div>";



        if (isset($row)) { //if the row contains data that means progressform is submitted then table will be displayed else error will displayed
            echo " <table border='1' cellpadding='3' align='center' style='width:850px;border-spacing:0px; text-align: center; position:relative; top:30px; background-color:white'>
            <tr style='background-color:grey'>
            <th width='200'>Division Name</th>
            <th width='200'>Division Chief</th>
            <th width='100'>Quarter</th>
            <th width='100'>Year</th>
            <th width='100'>Submit Status</th>
            <th width='100'>Exco 1 Status</th>
            <th width='100'>Exco 2 Status</th>
            </tr>";


            echo "<tr style='background-color:white'>";
            echo "<td style='border:1px solid black;'>" . $row['DivisionName'] . "</td>";
            echo "<td style='border:1px solid black;'>" . $row['DivisionChief'] . "</td>";
            echo "<td style='border:1px solid black;'>" . $row['Quarter'] . "</td>";
            echo "<td style='border:1px solid black;'>" . $row['Year'] . "</td>";
            echo "<td style='border:1px solid black;'>" . $row['SubmitStatus'] . "</td>";
            echo "<td style='border:1px solid black;color:red'>" . $row['Exco1ApproveStatus'] . "</td>";
            echo "<td style='border:1px solid black;color:red'>" . $row['Exco2ApproveStatus'] . "</td>";

            echo "</tr>";


            echo "</table>";
        }
        else {
            //echo "<span style='color:red;font-weight:bold;position:relative;top:20px; left:20px;font-family:Courier New;'>Error: The Progressform is not submitted yet.</span>";
            echo "<div style='height:60px; width:550px; padding:20px; border:1px dashed green;background-color:white;position:relative; top:40px; left:180px; color:red; font-weight:bold; font-family:arial; font-size:16px'># Error: The Progressform is not submitted yet.</div>";

        }
        if ($row['Exco1ApproveStatus']== 'Approved' && $row['Exco2ApproveStatus']== 'Approved') {
            //echo "<span style='color:green;font-family:Courier New; font-weight:bold; position:relative;top:20px; left:65px'>Your division's progressform details has been Approved.</span>";
            echo "<div style='height:60px; width:550px; padding:20px; border:1px dashed green;background-color:white;position:relative; top:40px; left:180px; color:red; font-weight:bold; font-family:arial; font-size:16px'># Success: Your division's progressform details has been Approved.</div>";

        }
        else if ($row['SubmitStatus']== 'yes' && $row['Exco1ApproveStatus']== 'pending' || $row['Exco2ApproveStatus']== 'pending') {
            //echo "<span style='color:red; font-family:Courier New;font-weight:bold; position:relative;top:20px; left:65px'>Your division's progressform detail's approval is Pending...</span>";
            echo "<div style='height:60px; width:550px; padding:20px; border:1px dashed green;background-color:white;position:relative; top:40px; left:180px; color:red; font-weight:bold; font-family:arial; font-size:16px'># Error: Your division's progressform detail's approval is Pending...</div>";

        }


    }




    //this function approves progressform
    //this function is used by from Exco 1
    public function approveExco1Progressform($approve, $div) {
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

        if ($row['AdminForwardStatus']=='yes') {

            if ($row['Exco1ApproveStatus']=='pending') {


                if ($approval=='yes') {
                    $sql="UPDATE $this->table1 SET Exco1ApproveStatus='$approve' WHERE DivisionName='$division' AND Quarter='$obj->quarter' AND Year='$obj->year'";
                    $result=$this->connection->query($sql);
                    if (!$result) {
                        echo "Error occured while approving the workform. For help, contact admin: ".mysqli_error($this->connection);
                        exit();
                    }
                    //echo "This Progressform has been Successfully Approved.";
                    echo "<div style='height:60px; width:550px; padding:20px; border:1px dashed green;background-color:white;position:relative; top:40px; left:180px; color:red; font-weight:bold; font-family:arial; font-size:16px'># Success: This Progressform has been Successfully Approved.</div>";

                }
            }

            else if ($row['Exco1ApproveStatus']=='Disapproved') {
                if ($approval=='yes') {
                    $sql="UPDATE $this->table1 SET Exco1ApproveStatus='$approve' WHERE DivisionName='$division' AND Quarter='$obj->quarter' AND Year='$obj->year'";
                    $result=$this->connection->query($sql);
                    if (!$result) {
                        echo "Error occured while approving the workform. For help, contact admin: ".mysqli_error($this->connection);
                        exit();
                    }
                    //echo "This Progressform which was dis-approved before has been Successfully Approved.";
                    echo "<div style='height:60px; width:550px; padding:20px; border:1px dashed green;background-color:white;position:relative; top:40px; left:180px; color:red; font-weight:bold; font-family:arial; font-size:16px'># Success: This Progressform which was dis-approved before has been Successfully Approved.</div>";

                }
            }

            else if ($row['Exco1ApproveStatus']=='Approved') {
                //echo "This Progress has been already approved.";
                echo "<div style='height:60px; width:550px; padding:20px; border:1px dashed green;background-color:white;position:relative; top:40px; left:180px; color:red; font-weight:bold; font-family:arial; font-size:16px'># Error: This Progress has been already approved.</div>";

            }
        }
        else {
            //echo "Sorry, the Progressform is not yet submitted.";
            echo "<div style='height:60px; width:550px; padding:20px; border:1px dashed green;background-color:white;position:relative; top:40px; left:180px; color:red; font-weight:bold; font-family:arial; font-size:16px'># Error: Sorry, the Progressform is not yet submitted.</div>";

        }
    }

    //this function approves progressform
    //this function is used by from Exco 2
    public function approveExco2Progressform($approve, $div) {
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

        if ($row['AdminForwardStatus']=='yes') {

            if ($row['Exco2ApproveStatus']=='pending') {


                if ($approval=='yes') {
                    $sql="UPDATE $this->table1 SET Exco2ApproveStatus='$approve' WHERE DivisionName='$division' AND Quarter='$obj->quarter' AND Year='$obj->year'";
                    $result=$this->connection->query($sql);
                    if (!$result) {
                        echo "Error occured while approving the workform. For help, contact admin: ".mysqli_error($this->connection);
                        exit();
                    }
                    //echo "This Progressform has been Successfully Approved.";
                    echo "<div style='height:60px; width:550px; padding:20px; border:1px dashed green;background-color:white;position:relative; top:40px; left:180px; color:red; font-weight:bold; font-family:arial; font-size:16px'># Success: This Progressform has been Successfully Approved.</div>";

                }
            }

            else if ($row['Exco2ApproveStatus']=='Disapproved') {
                if ($approval=='yes') {
                    $sql="UPDATE $this->table1 SET Exco2ApproveStatus='$approve' WHERE DivisionName='$division' AND Quarter='$obj->quarter' AND Year='$obj->year'";
                    $result=$this->connection->query($sql);
                    if (!$result) {
                        echo "Error occured while approving the workform. For help, contact admin: ".mysqli_error($this->connection);
                        exit();
                    }
                    //echo "This Progressform which was dis-approved before has been Successfully Approved.";
                    echo "<div style='height:60px; width:550px; padding:20px; border:1px dashed green;background-color:white;position:relative; top:40px; left:180px; color:red; font-weight:bold; font-family:arial; font-size:16px'># Success: This Progressform which was dis-approved before has been Successfully Approved.</div>";

                }
            }

            else if ($row['Exco2ApproveStatus']=='Approved') {
                //echo "This Progress has been already approved.";
                echo "<div style='height:60px; width:550px; padding:20px; border:1px dashed green;background-color:white;position:relative; top:40px; left:180px; color:red; font-weight:bold; font-family:arial; font-size:16px'># Error: This Progress has been already approved.</div>";

            }
        }
        else {
            //echo "Sorry, the Progressform is not yet submitted.";
            echo "<div style='height:60px; width:550px; padding:20px; border:1px dashed green;background-color:white;position:relative; top:40px; left:180px; color:red; font-weight:bold; font-family:arial; font-size:16px'># Error: Sorry, the Progressform is not yet submitted.</div>";

        }
    }




    //this function dis-approves progressform
    //this function is used by from Exco 1
    public function disapproveExco1Progressform($approve, $div) {
        $approval = $approve;
        $division = $div;
        $approve = 'Disapproved';

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

        if ($row['AdminForwardStatus']=='yes') {

            if ($row['Exco1ApproveStatus']=='pending') {


                if ($approval=='yes') {
                    $sql="UPDATE $this->table1 SET Exco1ApproveStatus='$approve' WHERE DivisionName='$division' AND Quarter='$obj->quarter' AND Year='$obj->year'";
                    $result=$this->connection->query($sql);
                    if (!$result) {
                        echo "Error occured while disapproving the workform. For help, contact admin: ".mysqli_error($this->connection);
                        exit();
                    }
                    //echo "This Progressform has been Successfully dis-Approved.";
                    echo "<div style='height:60px; width:550px; padding:20px; border:1px dashed green;background-color:white;position:relative; top:40px; left:180px; color:red; font-weight:bold; font-family:arial; font-size:16px'># Success: This Progressform has been Successfully dis-Approved.</div>";

                }
            }
            else if ($row['Exco1ApproveStatus']=='Approved') {
                if ($approval=='yes') {
                    $sql="UPDATE $this->table1 SET Exco1ApproveStatus='$approve' WHERE DivisionName='$division' AND Quarter='$obj->quarter' AND Year='$obj->year'";
                    $result=$this->connection->query($sql);
                    if (!$result) {
                        echo "Error occured while disapproving the workform. For help, contact admin: ".mysqli_error($this->connection);
                        exit();
                    }
                    //echo "This Progressform which was approved before has been Successfully dis-Approved.";
                    echo "<div style='height:60px; width:550px; padding:20px; border:1px dashed green;background-color:white;position:relative; top:40px; left:180px; color:red; font-weight:bold; font-family:arial; font-size:16px'># Success: This Progressform which was approved before has been Successfully dis-Approved.</div>";

                }
            }

            else if ($row['Exco1ApproveStatus']=='Disapproved') {
                echo "<div style='height:60px; width:550px; padding:20px; border:1px dashed green;background-color:white;position:relative; top:40px; left:180px; color:red; font-weight:bold; font-family:arial; font-size:16px'># Error: This Progress has been already dis-approved.</div>";
            }
        }
        else {
            //echo "Sorry, the Progressform is not yet submitted.";
            echo "<div style='height:60px; width:550px; padding:20px; border:1px dashed green;background-color:white;position:relative; top:40px; left:180px; color:red; font-weight:bold; font-family:arial; font-size:16px'># Error: Sorry, the Progressform is not yet submitted.</div>";

        }
    }

    //this function dis-approves progressform
    //this function is used by from Exco 2
    public function disapproveExco2Progressform($approve, $div) {
        $approval = $approve;
        $division = $div;
        $approve = 'Disapproved';

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

        if ($row['AdminForwardStatus']=='yes') {

            if ($row['Exco2ApproveStatus']=='pending') {


                if ($approval=='yes') {
                    $sql="UPDATE $this->table1 SET Exco2ApproveStatus='$approve' WHERE DivisionName='$division' AND Quarter='$obj->quarter' AND Year='$obj->year'";
                    $result=$this->connection->query($sql);
                    if (!$result) {
                        echo "Error occured while disapproving the workform. For help, contact admin: ".mysqli_error($this->connection);
                        exit();
                    }
                    //echo "This Progressform has been Successfully dis-Approved.";
                    echo "<div style='height:60px; width:550px; padding:20px; border:1px dashed green;background-color:white;position:relative; top:40px; left:180px; color:red; font-weight:bold; font-family:arial; font-size:16px'># Success: This Progressform has been Successfully dis-Approved.</div>";

                }
            }
            else if ($row['Exco2ApproveStatus']=='Approved') {
                if ($approval=='yes') {
                    $sql="UPDATE $this->table1 SET Exco2ApproveStatus='$approve' WHERE DivisionName='$division' AND Quarter='$obj->quarter' AND Year='$obj->year'";
                    $result=$this->connection->query($sql);
                    if (!$result) {
                        echo "Error occured while disapproving the workform. For help, contact admin: ".mysqli_error($this->connection);
                        exit();
                    }
                    //echo "This Progressform which was approved before has been Successfully dis-Approved.";
                    echo "<div style='height:60px; width:550px; padding:20px; border:1px dashed green;background-color:white;position:relative; top:40px; left:180px; color:red; font-weight:bold; font-family:arial; font-size:16px'># Success: This Progressform which was approved before has been Successfully dis-Approved.</div>";

                }
            }

            else if ($row['Exco2ApproveStatus']=='Disapproved') {
                //echo "This Progress has been already dis-approved.";
                echo "<div style='height:60px; width:550px; padding:20px; border:1px dashed green;background-color:white;position:relative; top:40px; left:180px; color:red; font-weight:bold; font-family:arial; font-size:16px'># Error: This Progress has been already dis-approved.</div>";

            }
        }
        else {
            //echo "Sorry, the Progressform is not yet submitted.";
            echo "<div style='height:60px; width:550px; padding:20px; border:1px dashed green;background-color:white;position:relative; top:40px; left:180px; color:red; font-weight:bold; font-family:arial; font-size:16px'># Error: Sorry, the Progressform is not yet submitted.</div>";

        }
    }




    //this function set the forward status of progressform to exco division
    public function progressformForward($div) {
        $division = $div;

        $obj = new Quarter;  //creating new quarter object
        $obj->quarter();   //calling method from class quarter in order to get current quarter and year

        $query = "SELECT * FROM $this->table1 WHERE DivisionName='$division' AND Quarter='$obj->quarter' AND Year='$obj->year'";
        $result1 = $this->connection->query($query);
        if (!$result1) {
            echo "Error occured. For help, contact admin: ".mysqli_error($this->connection);
            exit();
        }
        $row = $result1->fetch_array();
        if ($row['AdminForwardStatus']=='yes') {
            echo "The Progressform is already forwarded.";
        }
        else {
            $sql="UPDATE $this->table1 SET AdminForwardStatus='yes' WHERE DivisionName='$division' AND Quarter='$obj->quarter' AND Year='$obj->year'";
            $result=$this->connection->query($sql);
            if (!$result) {
                echo "Error occured. For help, contact admin: ".mysqli_error($this->connection);
                exit();
            }

            echo "The Progressform has been successfully forwarded to the EXCO.";
            //echo "<div style='height:60px; width:550px; padding:20px; border:1px dashed green;background-color:white;position:relative; top:40px; left:180px; color:red; font-weight:bold; font-family:arial; font-size:16px'># Success: The Progressform has been successfully forwarded to the EXCO.</div>";

        }
    }

    //this function checks if the workform is summitted and approved or not
    //if the workform is not approved or submitted then progress form can not be send.
    public function checkProgressformSubmitAvailability($div) {

        $division = $div;

        $obj = new Quarter;  //creating new quarter object
        $obj->quarter();   //calling method from class quarter in order to get current quarter and year


        $sql="SELECT * FROM workformstatus WHERE Quarter='$current_quarter' AND Year='$current_year' AND DivisionName='$division'";
        $result=$this->connection->query($sql);
        if (!$result) {
            echo "<span style='color:red;'>Something went wrong in database. Error while checking submit status of required division workform. ".mysqli_error($this->connection);
            exit();
        }
        while ($row = $result->fetch_array())
        {
            if ($row['SubmitStatus']!='yes') {
                //echo "<span style='color:red;'>Error: Cannot submit Progressform. The workform for this quarter is not yet Approved.";
                echo "<div style='height:60px; width:550px; padding:20px; border:1px dashed green;background-color:white;position:relative; top:40px; left:180px; color:red; font-weight:bold; font-family:arial; font-size:16px'># Error: Cannot submit Progressform. The workform for this quarter is not yet Approved.</div>";

                //return true;
                exit();
            }
            else {
                return true;
            }
        }
    }


//this function checks if the progressform has been forwarded by admin or not
//if the form is forwarded to exco the exco can view the workform
    public function excoProgressformView($div) {

        $division = $div;
        $obj = new Quarter;  //creating new quarter object
        $obj->quarter();   //calling method from class quarter in order to get current quarter and year

        $sql="SELECT * FROM $this->table1 WHERE DivisionName='$division' AND Quarter='$obj->quarter' AND Year='$obj->year'";
        $result=$this->connection->query($sql);
        if (!$result) {
            echo "Error occured. For help, contact admin: ".mysqli_error($this->connection);
            exit();
        }
        $row = $result->fetch_array();
        if ($row['AdminForwardStatus']=="yes") {
            $this->tableDisplay($division);
        }
        else {
            //echo "The Progressform is not Available.";
            echo "<div style='height:60px; width:550px; padding:20px; border:1px dashed green;background-color:white;position:relative; top:40px; left:180px; color:red; font-weight:bold; font-family:arial; font-size:16px'># Error: The Progressform is not Available.</div>";

        }
    }

    //this function will preset the progressform values i.e workform value
    public function setProgressformValue() {




    }

    //this function display progressform data in the table for the divisions
    //this function will preset the workform data in the progressform and division can see data in their progressform
    public function divisionProgressformTableDisplay($division_name) {

        $division = $division_name;  //variable that holds current division
        $obj = new Quarter;  //creating new quarter object
        $obj->quarter();   //calling method from class quarter in order to get current quarter and year

        $sql="SELECT * FROM $this->table WHERE Division='$division' AND Quarter='$obj->quarter' AND Year='$obj->year'";
        $result=$this->connection->query($sql);
        if (!$result) {
            echo "Error in query while displaying progressform table. For help, contact admin: ".mysqli_Error($this->connection);
            exit();
        }
        echo "<div  style='height:30px; width:auto; background-color:rgba(0, 0, 0, 0.7)'>
        <span style='font-size:16px; margin-left:380px;font-weight:bold; position:relative; top:4px; color:darkgrey'> Submit ProgressForm Details </span>
        </div>";

        $workform = new Workform;


        // $count=$result->num_rows; //checking if the table contain data or not
        //if ($count!=0){		//if the count is not zero then table is executed else erro message will be displayed

        if ($workform->getWorkformApproveStatus($obj->quarter(), $obj->year, $division)==true) {
            echo "<div style='height: 90px; position:relative;left:10px;'>";
            echo "<span style='position:relative; top:8px;left:30px;'>";


            //this section display all the details in form heading
            $obj = new Employee;
            $obj1 = new Quarter;

            session_start();
            $_SESSION['date'] = date('d/m/Y');
            $_SESSION['year'] = date('Y');
            $_SESSION['submit'] = "yes";
            $_SESSION['approval'] = "pending";
            //$_SESSION['fw'] = "yes";

            if ($_SESSION['division']=='IT Division') {
                $_SESSION['chief'] = $obj->getITChief();
                $_SESSION['quarter'] = $obj1->quarter();
            }
            else if ($_SESSION['division']=='HR Division') {
                $_SESSION['chief'] = $obj->getHRChief();
                $_SESSION['quarter'] = $obj1->quarter();
            }

            else if ($_SESSION['division']=='RTE Division') {
                $_SESSION['chief'] = $obj->getRTEChief();
                $_SESSION['quarter'] = $obj1->quarter();
            }

            echo "Division Name: ".$_SESSION['division']."<br>";
            echo "Division Chief: ". $_SESSION['chief']."</br>";
            echo "Quarter: ".$_SESSION['quarter']."<br>";
            echo "Month:";
            echo $obj1->getMonth();

            echo "</span>";
            echo "<span style='float:right; margin-right:80px'>";
            echo "date: ". $_SESSION['date'];

            echo "</span>";

            echo "</div>";

            echo "<form action='#' method='POST'>";
            echo " <table border='1' align='center' id='table' style='width:900px;border-spacing:0px;position:relative; top:20px; background-color:white'>
            <tr style='background-color:grey'>
            <th rowspan='2' height='50' width='5%'>SN</th>
            <th rowspan='2' width='150'>Activity Name</th>
            <th rowspan='2' width='80'>Unit</th>
            <th rowspan='2' width='80'>Weightage</th>
            <th colspan='4' height='30' width='300'>Performance Indicators (Percentage)</th>
            <th colspan='3' height='30' width='20%'>Performance Achievement</th>
            <th rowspan='2' width='10%'>Indicator measurement basis</th>
            </tr>
            <tr style='background-color:grey; '>
            <th height='25%' > 100 </th>
            <th height='25%' > 75 </th>
            <th height='25%' > 50 </th>
            <th height='25%' > <50 </th>
            <th height='13%' > Measurement </th>
            <th height='13%' > Score </th>
            <th height='14%' > Progress </th>
            </tr>
            ";

            //$row=$result->fetch_assoc();
            //echo $row['ActivityName'];
            $h = 1;
            $i = 0;
            $j = 100;
            $k = 200;
            $l = 300;
            while ($row = $result->fetch_array())
            {
                echo "<tr>";
                echo "<td style='border:1px solid black;'>" . $h . "</td>";
                echo "<td style='border:1px solid black;'>" . $row['ActivityName'] . "</td>";
                echo "<td style='border:1px solid black;'>" . $row['Unit'] . "</td>";
                echo "<td style='border:1px solid black;'>" . $row['Weightage'] . "</td>";
                echo "<td style='border:1px solid black;'>" . $row['PI_100'] . "</td>";
                echo "<td style='border:1px solid black;'>" . $row['PI_75'] . "</td>";
                echo "<td style='border:1px solid black;'>" . $row['PI_50'] . "</td>";
                echo "<td style='border:1px solid black;'>" . $row['PI_less50'] . "</td>";
                echo "<td style='border:1px solid black;'>" . "<input  style='height:18px; width:98%' type='text' id=".$i."></td>";
                echo "<td style='border:1px solid black;'>" . "<input  style='height:18px; width:98%' type='text' id=".$j."></td>";
                echo "<td style='border:1px solid black;'>" . "<input  style='height:18px; width:98%' type='text' id=".$k."></td>";
                echo "<td style='border:1px solid black;'>" . "<input  style='height:18px; width:98%' type='text' id=".$l."></td>";

                echo "</tr>";
                $h++;
                $i++;

                $j=$j+1;
                $k=$k+1;
                $l=$l+1;
            }

            echo "</table>";

            echo "<div style='float:right; margin-right:50px; position:relative; top:30px; z-index:1'>";
            echo	"<input type='reset' name='reset' value='Reset'/>";
            echo	"<input type='button' name='reset' value='Send' onclick='sendProgressformData()'/>";
            echo "</div>";
            echo "</form>";

            echo  "<div id='message' style='position:relative; top:40px;height:50px; width:700px;margin-left:40px;font-family:Courier New; color:green; font-weight:bold'>
            </div>";
        }
        else {
            //echo "<div style='margin:10px;font-weight:bold; color:red; font-family:Courier New;'># Workform is not yet Approved.!!!".'<br>'."Therefore, cannot send progressform at the moment.</div>";
            echo "<div style='height:60px; width:550px; padding:20px; border:1px dashed green;background-color:white;position:relative; top:40px; left:180px; color:red; font-weight:bold; font-family:arial; font-size:16px'># Error: Workform is not yet Approved. Therefore, cannot send progressform at the moment.</div>";
        }
    }
}
?>

