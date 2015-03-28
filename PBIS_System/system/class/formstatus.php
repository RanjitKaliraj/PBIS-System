<?php
include_once('connection.php');
include_once('quarter.php');
class FormStatus {


    private $table1 = 'workformstatus';
    private $table2 = 'progressformstatus';
    private $connection;
    //private $row;

    //initializing the constructor in order to connect to the database
    public function __construct() {

        //creating new connection to the database
        $connect = new Connection;
        $this->connection = $connect->connection;

    }

    //this function returns the approval status of IT division workform
    public function workformApproveStatus($div, $quart) {
        $division = $div;
        $quarter = $quart;
        $obj = new Quarter;  //creating new quarter object
        $obj->quarter();   //calling method from class quarter in order to get current quarter and year

        $sql="SELECT * FROM $this->table1 WHERE DivisionName='$division' AND Quarter='$quarter' AND Year='$obj->year'";
        $result=$this->connection->query($sql);
        if (!$result) {
            echo "Error";    // in query while getting approval status. For help, contact admin: ".mysqli_error($this->connection);
            exit();
        }

        $row = $result->fetch_array();
        if ($row['ApproveStatus']=='Approved') {
            echo "Approved";
        }
        else if ($row['ApproveStatus']=='pending') {
            echo "pending";
        }
        else {
            echo "N/A";
        }
    }

    //this function returns submit status of IT division workform
    public function workformSubmitStatus($div, $quart) {
        $division = $div;
        $quarter = $quart;

        $obj = new Quarter;  //creating new quarter object
        $obj->quarter();   //calling method from class quarter in order to get current quarter and year

        $sql="SELECT * FROM $this->table1 WHERE DivisionName='$division' AND Quarter='$quarter' AND Year='$obj->year'";
        $result=$this->connection->query($sql);
        if (!$result) {
            echo "Error";    // in query while getting approval status. For help, contact admin: ".mysqli_error($this->connection);
            exit();
        }

        $row = $result->fetch_array();
        if ($row['SubmitStatus']=='yes') {
            echo "Submitted";
        }
        else if ($row['SubmitStatus']=='pending') {
            echo "pending";
        }
        else {
            echo "N/A";
        }
    }






    //this function returns the approval status of IT division workform
    public function progressformApproveStatus($div, $quart) {
        $division = $div;
        $quarter = $quart;
        $obj = new Quarter;  //creating new quarter object
        $obj->quarter();   //calling method from class quarter in order to get current quarter and year

        $sql="SELECT * FROM $this->table2 WHERE DivisionName='$division' AND Quarter='$quarter' AND Year='$obj->year'";
        $result=$this->connection->query($sql);
        if (!$result) {
            echo "Error";    // in query while getting approval status. For help, contact admin: ".mysqli_error($this->connection);
            exit();
        }

        $row = $result->fetch_array();
        if ($row['Exco1ApproveStatus']=='Approved' && $row['Exco2ApproveStatus']=='Approved') {
            echo "Approved";
        }
        else if ($row['Exco1ApproveStatus']=='pending' && $row['Exco2ApproveStatus']=='pending') {
            echo "pending";
        }
        else {
            echo "N/A";
        }
    }

    //this function returns submit status of IT division workform
    public function progressformSubmitStatus($div, $quart) {
        $division = $div;
        $quarter = $quart;
        $obj = new Quarter;  //creating new quarter object
        $obj->quarter();   //calling method from class quarter in order to get current quarter and year

        $sql="SELECT * FROM $this->table2 WHERE DivisionName='$division' AND Quarter='$quarter' AND Year='$obj->year'";
        $result=$this->connection->query($sql);
        if (!$result) {
            echo "Error";    // in query while getting approval status. For help, contact admin: ".mysqli_error($this->connection);
            exit();
        }

        $row = $result->fetch_array();
        if ($row['SubmitStatus']=='yes') {
            echo "Submitted";
        }
        else if ($row['SubmitStatus']=='pending') {
            echo "pending";
        }
        else {
            echo "N/A";
        }
    }



    //this function returns the approval status of IT division workform
    public function workformSubmitDate($div, $quart) {
        $division = $div;
        $quarter = $quart;
        $obj = new Quarter;  //creating new quarter object
        $obj->quarter();   //calling method from class quarter in order to get current quarter and year

        $sql="SELECT * FROM $this->table1 WHERE DivisionName='$division' AND Quarter='$quarter' AND Year='$obj->year'";
        $result=$this->connection->query($sql);
        if (!$result) {
            echo "Error";    // in query while getting approval status. For help, contact admin: ".mysqli_error($this->connection);
            exit();
        }

        $row = $result->fetch_array();
        if (!empty($row['Date'])) {
            echo $row['Date'];
        }
        else {
            echo "N/A";
        }
    }

    //this function returns the approval status of IT division workform
    public function progressformSubmitDate($div, $quart) {
        $division = $div;
        $quarter = $quart;

        $obj = new Quarter;  //creating new quarter object
        $obj->quarter();   //calling method from class quarter in order to get current quarter and year

        $sql="SELECT * FROM $this->table2 WHERE DivisionName='$division' AND Quarter='$quarter' AND Year='$obj->year'";
        $result=$this->connection->query($sql);
        if (!$result) {
            echo "Error";    // in query while getting approval status. For help, contact admin: ".mysqli_error($this->connection);
            exit();
        }

        $row = $result->fetch_array();
        if (!empty($row['Date'])) {
            echo $row['Date'];
        }
        else {
            echo "N/A";
        }
    }

//this function returns submit status of IT division workform
    public function progressformForwardStatus($div, $quart) {
        $division = $div;
        $quarter = $quart;
        $obj = new Quarter;  //creating new quarter object
        $obj->quarter();   //calling method from class quarter in order to get current quarter and year

        $sql="SELECT * FROM $this->table2 WHERE DivisionName='$division' AND Quarter='$quarter' AND Year='$obj->year'";
        $result=$this->connection->query($sql);
        if (!$result) {
            echo "Error";    // in query while getting approval status. For help, contact admin: ".mysqli_error($this->connection);
            exit();
        }

        $row = $result->fetch_array();
        if ($row['AdminForwardStatus']=='yes') {
            echo "Received";
        }
        else if ($row['SubmitStatus']=='pending') {
            echo "pending";
        }
        else {
            echo "N/A";
        }
    }
}

?>