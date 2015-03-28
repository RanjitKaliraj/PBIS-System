<?php
//this php page is for notification display
include_once('connection.php');
include_once('pbis.php');
include_once('quarter.php');
class Notification {

    private $connection;
    private $table1 = 'workformstatus';
    private $table2 = 'progressformstatus';

//initializing the constructor in order to connect to the database
    public function __construct() {

        //creating new connection to the database
        $connect = new Connection;
        $this->connection = $connect->connection;

    }
    public function __destruct() {
        exit();
    }

//this function display the current submit status of workform
//this method is called in administration section for viewing the status of each department's workform submission.
    public function workformSubmitMessage($div) {
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
        if ($row['SubmitStatus']=='yes') {
            echo "* A new Workform has been submitted by ".$row['DivisionName'].".";
        }


    }



//this function display the current submit status of progressform
//this method is called in administration section for viewing the status of each department's progressform submission.
    public function progressformSubmitMessage($div) {
        $division = $div;

        $obj = new Quarter;  //creating new quarter object
        $obj->quarter();   //calling method from class quarter in order to get current quarter and year

        $sql="SELECT * FROM $this->table2 WHERE DivisionName='$division' AND Quarter='$obj->quarter' AND Year='$obj->year'";
        $result=$this->connection->query($sql);
        if (!$result) {
            echo "Error occured. For help, contact admin: ".mysqli_error($this->connection);
            exit();
        }
        $row = $result->fetch_array();
        if ($row['SubmitStatus']=='yes') {
            echo "* A new Progressform has been submitted by ".$division.".";
        }
    }




//this function display the workform approval notification in respective division
    public function workformApproval($div) {
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
        if ($row['ApproveStatus']=='Approved') {
            echo "* Your Division's Workform has been Approved.";
        }
        else if ($row['ApproveStatus']!='Approved' && $row['SubmitStatus']=='yes') {
            echo "* Your Division's Workform approval is pending.";
        }

    }



//this function is for exco notification for receiving progressform from admin
    public function excoProgressformForwardStatus($div) {
        $division = $div;

        $obj = new Quarter;  //creating new quarter object
        $obj->quarter();   //calling method from class quarter in order to get current quarter and year

        $sql="SELECT * FROM $this->table2 WHERE DivisionName='$division' AND Quarter='$obj->quarter' AND Year='$obj->year'";
        $result=$this->connection->query($sql);
        if (!$result) {
            echo "Error occured. For help, contact admin: ".mysqli_error($this->connection);
            exit();
        }
        $row = $result->fetch_array();
        if ($row['AdminForwardStatus']=='yes') {
            echo "* ".$division."'s Progressform has been forwarded by Administration section.";
        }

    }




//this function display the EXCO approval notification in respective division
    public function exco1Approval($div) {
        $division = $div;

        $obj = new Quarter;  //creating new quarter object
        $obj->quarter();   //calling method from class quarter in order to get current quarter and year

        $sql="SELECT * FROM $this->table2 WHERE DivisionName='$division' AND Quarter='$obj->quarter' AND Year='$obj->year'";
        $result=$this->connection->query($sql);
        if (!$result) {
            echo "Error occured. For help, contact admin: ".mysqli_error($this->connection);
            exit();
        }
        $row = $result->fetch_array();
        if ($row['Exco1ApproveStatus']=='Approved') {
            echo "* Your Progressform has been Approved by EXCO 1.";
        }
        else if ($row['Exco1ApproveStatus']=='Disapproved') {
            echo "* Your Progressform has been Dis-approved by EXCO 1.";
        }
        else if ($row['Exco1ApproveStatus']=='pending') {
            echo "* The EXCO 1 approval for your Progressform is pending.";
        }
    }


//this function display the EXCO approval notification in respective division
    public function exco2Approval($div) {
        $division = $div;

        $obj = new Quarter;  //creating new quarter object
        $obj->quarter();   //calling method from class quarter in order to get current quarter and year

        $sql="SELECT * FROM $this->table2 WHERE DivisionName='$division' AND Quarter='$obj->quarter' AND Year='$obj->year'";
        $result=$this->connection->query($sql);
        if (!$result) {
            echo "Error occured. For help, contact admin: ".mysqli_error($this->connection);
            exit();
        }
        $row = $result->fetch_array();
        if ($row['Exco2ApproveStatus']=='Approved') {
            echo "* Your Progressform has been Approved by EXCO 2.";
        }
        else if ($row['Exco2ApproveStatus']=='Disapproved') {
            echo "* Your Progressform has been Dis-approved by EXCO 2.";
        }
        else if ($row['Exco2ApproveStatus']=='pending') {
            echo "* The EXCO 2 approval for your Progressform is pending.";
        }
    }

//this function display the pbis notification
    public function pbisNotification() {

        $pbis = new CalculatePBIS;
        $obj = new Quarter;  //creating new quarter object


        if ($pbis->itPbisStatus($obj->quarter())=='Approved' && $pbis->hrPbisStatus($obj->quarter())=='Approved' && $pbis->rtePbisStatus($obj->quarter())=='Approved' ) {
            return "* PBIS Percentage has been calculated.";
        }
    }
}


?>