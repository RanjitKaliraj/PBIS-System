<?php
include_once('connection.php');
include_once('quarter.php');
class CalculatePBIS {


    //private $workform = 'workform';
    private $progressStatus = 'progressformstatus';
    private $progressform = 'progressform';
    private $connection;
    private $table = 'pbis_percentage';
    private $columnName;

    //private $row;

    //initializing the constructor in order to connect to the database
    public function __construct() {

        //creating new connection to the database
        $connect = new Connection;
        $this->connection = $connect->connection;

    }

    //this function calculate the total of progress of respective division
    public function progressTotal($div) {
        $division = $div;
        $obj = new Quarter;  //creating new quarter object
        $obj->quarter();   //calling method from class quarter in order to get current quarter and year

        $sql="SELECT SUM(Progress) AS Totalsum FROM $this->progressform WHERE Division='$division' AND Quarter='$obj->quarter' AND Year='$obj->year'";
        $result=$this->connection->query($sql);
        if (!$result) {
            echo "Error in query while getting calculating PBIS. For help, contact admin: ".mysqli_error($this->connection);
            exit();
        }

        $row = $result->fetch_array();
        return $row['Totalsum'];


    }

    //this function calculate the total number of activities of respective division
    public function activityCount($div) {
        $division = $div;
        $obj = new Quarter;  //creating new quarter object
        $obj->quarter();   //calling method from class quarter in order to get current quarter and year

        $sql="SELECT COUNT(ActivityName) AS TotalActivities FROM $this->progressform WHERE Division='$division' AND Quarter='$obj->quarter' AND Year='$obj->year'";
        $result=$this->connection->query($sql);
        if (!$result) {
            echo "Error in query while getting calculating PBIS. For help, contact admin: ".mysqli_error($this->connection);
            exit();
        }

        $row = $result->fetch_array();
        return $row['TotalActivities'];


    }

    //this function calculate the total pbis percentage of the IT division
    public function calculateITPbisPercentage() {
        $totalProgress = $this->progressTotal('IT Division');
        $totalActivities = $this->activityCount('IT Division');

        if ($totalActivities>0) {
            $pbis_Percentage = $totalProgress/$totalActivities;
            return $pbis_Percentage;
        }
        else {
            $pbis_Percentage = 0;
            return $pbis_Percentage;
        }

    }

    //this function calculate the total pbis percentage of the HR division
    public function calculateHRPbisPercentage() {
        $totalProgress = $this->progressTotal('HR Division');
        $totalActivities = $this->activityCount('HR Division');


        if ($totalActivities>0) {
            $pbis_Percentage = $totalProgress/$totalActivities;
            return $pbis_Percentage;
        }
        else {
            $pbis_Percentage = 0;
            return $pbis_Percentage;
        }
    }

    //this function calculate the total pbis percentage of the RTE division
    public function calculateRTEPbisPercentage() {
        $totalProgress = $this->progressTotal('RTE Division');
        $totalActivities = $this->activityCount('RTE Division');

        if ($totalActivities>0) {
            $pbis_Percentage = $totalProgress/$totalActivities;
            return $pbis_Percentage;
        }
        else {
            $pbis_Percentage = 0;
            return $pbis_Percentage;
        }
    }

    //this function displays the table of pbis percentage form
    public function displayPbisTable() {
        $table = "employee";
        $obj = new Quarter;  //creating new quarter object
        $obj->quarter();   //calling method from class quarter in order to get current quarter and year


        $sql = "SELECT * FROM $table WHERE Division!='Administration' AND Division!='exco'";
        $result = $this->connection->query($sql);
        if (!$result) {
            echo "error in query while displaying workform table. For help, contact admin: ".mysqli_error($this->connection);
            exit();
        }


        echo "<div  style='height:30px; width:auto; background-color:rgba(0, 0, 0, 0.7)'>
        <span style='font-size:16px; margin-left:350px;font-weight:bold; position:relative; top:4px; color:darkgrey'> PBIS Percentage Calculation</span>
        </div>";

        if ($this->itPbisStatus($obj->quarter())=='Approved' && $this->hrPbisStatus($obj->quarter())=='Approved' && $this->rtePbisStatus($obj->quarter())=='Approved' ) {

            echo " <table border='1' align='center' style='width:auto;border-spacing:0px; position:relative; top:20px; background-color:white'>
            <tr style='background-color:grey'>
            <th height='50' width='40'>SN</th>
            <th width='200'>Employee Name</th>
            <th width='200'>Division</th>
            <th width='140'>PBIS Percentage (%)</th></tr>
            </tr>";
            $i = 1;
            while ($row = $result->fetch_array())
            {
                echo "<tr>";
                echo "<td style='border:1px solid black;height:20px'>" ."<span style='margin-left:13px'>".$i."</span></td>";
                echo "<td style='border:1px solid black;'>" ."<span style='margin-left:10px'>".$row['Name']."</span></td>";
                echo "<td style='border:1px solid black;'>" ."<span style='margin-left:10px'>".$row['Division']."</span></td>";
                echo "<td style='border:1px solid black;'>"."<span style='margin-left:40px'>".$this->getPbisPercentage($row['Division'])."</span></td>";

                echo "</tr>";
                $i++;
            }

            echo "</table>";
        }

        else {
            echo "<div style='height:60px; width:550px; padding:20px; border:1px dashed green;background-color:white;position:relative; top:40px; left:180px; color:red; font-weight:bold; font-family:arial; font-size:16px'># Error: All Division's progressforms are not Approved yet.</div>";

        }

    }



//this function set the current divisions in the pbis table
    public function setPbisDivisions() {
        $div1 = 'IT Division';
        $div2 = 'HR Division';
        $div3 = 'RTE Division';

        $sql = "SELECT * FROM $this->table";
        $result = $this->connection->query($sql);
        $row = $result->fetch_array();
        if (empty($row['Division'])) {
            $sql1 = "INSERT INTO $this->table(Division) VALUES('$div1'),('$div2'),('$div3')";
            $this->connection->query($sql1);
        }
    }



//this function add new column for the pbis percentage in pbis_percentage table
    public function addPbisPercentageColumn() {
        $obj = new Quarter;  //creating new quarter object
        $obj->quarter();   //calling method from class quarter in order to get current quarter and year

        $this->columnName = $obj->quarter()."Quarter".$obj->year;



        $sql1 = "ALTER TABLE $this->table ADD $this->columnName varchar(20)";
        $this->connection->query($sql1);

    }

//this function set the pbis percentage in the pbis_percentage table
    public function setpbisPercentage() {

        $it_percentage = round($this->calculateITPbisPercentage(), 2);
        $hr_percentage = round($this->calculateHRPbisPercentage(),2);
        $rte_percentage = round($this->calculateRTEPbisPercentage(),2);

        //echo $it_percentage;
        //echo $hr_percentage;
        //echo $rte_percentage;


        $this->setPbisDivisions();
        $this->addPbisPercentageColumn();
        //echo $this->columnName;


        $sql1 = "UPDATE $this->table SET $this->columnName='$it_percentage' WHERE Division='IT Division'";
        $this->connection->query($sql1);

        $sql2 = "UPDATE $this->table SET $this->columnName='$hr_percentage' WHERE Division='HR Division'";
        $this->connection->query($sql2);

        $sql3 = "UPDATE $this->table SET $this->columnName='$rte_percentage' WHERE Division='RTE Division'";
        $this->connection->query($sql3);



    }


//this function get the pbis percentage value
//this function will be used displaypbistable() function
    public function getPbisPercentage($div) {
        $division = $div;
        $obj = new Quarter;  //creating new quarter object
        $obj->quarter();   //calling method from class quarter in order to get current quarter and year

        $column = $obj->quarter()."Quarter".$obj->year;
        //$column = toString($column);

        $this->setPbisPercentage();

        $sql = "SELECT * FROM $this->table WHERE Division='$division'";
        $result = $this->connection->query($sql);
        if (!$result) {
            echo "error occured. For help, contact admin: ".mysqli_error($this->connection);
            exit();
        }
        $row = $result->fetch_array();
        //$this->addPbisPercentageColumn();
        //return $row[$column];
        $percent = str_replace('$', '', $row[$column]);
        return $percent;
    }





//this function display the pbis status of it division
    public function itPbisStatus($quarter) {
        $division = 'IT Division';
        $quar = $quarter;

        $obj = new Quarter;  //creating new quarter object
        $obj->quarter();   //calling method from class quarter in order to get current quarter and year


        $sql = "SELECT * FROM $this->progressStatus WHERE DivisionName='$division' AND Quarter='$quar' AND Year='$obj->year'";
        $result = $this->connection->query($sql);
        if (!$result) {
            echo "error in query. For help, contact admin: ".mysqli_error($this->connection);
            exit();
        }
        $row = $result->fetch_array();

        if ($row['Exco1ApproveStatus']=='Approved' && $row['Exco2ApproveStatus']=='Approved') {
            return "Approved";
        }
        else if ($row['Exco1ApproveStatus']=='pending' || $row['Exco2ApproveStatus']=='pending') {
            return "pending";
        }
        else {
            return "Not Available";
        }

    }

//this function display the pbis status of hr division
    public function hrPbisStatus($quarter) {
        $division = 'HR Division';
        $quar = $quarter;

        $obj = new Quarter;  //creating new quarter object
        $obj->quarter();   //calling method from class quarter in order to get current quarter and year


        $sql = "SELECT * FROM $this->progressStatus WHERE DivisionName='$division' AND Quarter='$quar' AND Year='$obj->year'";
        $result = $this->connection->query($sql);
        if (!$result) {
            echo "error in query. For help, contact admin: ".mysqli_error($this->connection);
            exit();
        }
        $row = $result->fetch_array();

        if ($row['Exco1ApproveStatus']=='Approved' && $row['Exco2ApproveStatus']=='Approved') {
            return "Approved";
        }
        else if ($row['Exco1ApproveStatus']=='pending' || $row['Exco2ApproveStatus']=='pending') {
            return "pending";
        }
        else {
            return "Not Available";
        }

    }

//this function display the pbis status of rte division
    public function rtePbisStatus($quarter) {
        $division = 'RTE Division';
        $quar = $quarter;

        $obj = new Quarter;  //creating new quarter object
        $obj->quarter();   //calling method from class quarter in order to get current quarter and year


        $sql = "SELECT * FROM $this->progressStatus WHERE DivisionName='$division' AND Quarter='$quar' AND Year='$obj->year'";
        $result = $this->connection->query($sql);
        if (!$result) {
            echo "error in query. For help, contact admin: ".mysqli_error($this->connection);
            exit();
        }
        $row = $result->fetch_array();

        if ($row['Exco1ApproveStatus']=='Approved' && $row['Exco2ApproveStatus']=='Approved') {
            return "Approved";
        }
        else if ($row['Exco1ApproveStatus']=='pending' || $row['Exco2ApproveStatus']=='pending') {
            return "pending";
        }
        else {
            return "Not Available";
        }
    }




}

?>