<?php
include_once('connection.php');
class Employee {

    private $table = 'employee';
    private $new_connection;
    //private $row;

    //initializing the constructor in order to connect to the database
    public function __construct() {

        //creating new connection to the database
        $connect = new Connection;
        $this->new_connection = $connect->connection;

    }

    public function __destruct() {
        mysqli_close($this->new_connection);
    }
    //this function add the employee details to the database
    public function addEmployeeDetails($name, $add, $cont, $div, $role) {
        $employee_name = $name;
        $address = $add;
        $contact = $cont;
        $division = $div;
        $divisionRole = $role;

        $sql="INSERT INTO $this->table(Name, Address, Contact, Division, DivisionRole)
             VALUES('$employee_name','$address','$contact', '$division', '$divisionRole')";

        $result=$this->new_connection->query($sql);
        if (!$result) {
            echo "<span style=' color:red'># Error: Submission failed!!!. Please, try again.</span>".'<br>';
            echo "<span style='font-size:11px'>(Note : If you are experiencing problems please contact to Admin.)</span>";
            //echo mysqli_error($this->connection);
            exit();
        }

        else {
            echo "Successful!!!".'<br>';
            echo "You have successfully added the employee information to the database.";
        }
    }


    //thia function checks if the employee details submitted is empty or not
    //if empty field are found they error mesage will be displayed to the user.
    public function checkInput($name, $add, $cont, $div, $role) {
        $employee_name = $name;
        $address = $add;
        $contact = $cont;
        $division = $div;
        $divisionRole = $role;

        if (empty($employee_name)) {
            echo "<span style='color:red'># Error: Employee's information seems to be incomplete!!! </span>";
            exit();
        }
        else if (!empty($employee_name)) {
            if ((empty($address)) || (empty($contact)) || (empty($division)) || (empty($divisionRole))) {
                echo "<span style='color:red'>#  Error: Employee's information seems to be incomplete!!!</span";
                exit();
            }
        }
    }



    //this is a function to view all the details of employers
    public function viewEmployeeDetails() {
        $sql="SELECT * FROM $this->table";
        $result=$this->new_connection->query($sql);
        if (!$result) {
            echo "error in query: ".mysqli_error($this->connection);
            exit();
        }
        echo "<div  style='height:30px; width:auto; background-color:rgba(0, 0, 0, 0.7)'>
        <span style='font-size:16px; margin-left:360px;font-weight:bold; position:relative; top:4px; color:darkgrey'> View Employee Details</span>
        </div>";

        //if (($result->fetch_array())){		//condition for if there are data available or not
        $count=$result->num_rows; //checking if the table contain data or not
        if ($count!=0) {				//if the count is not zero then table is executed else erro message will be displayed

            echo " <table id='dataTable' border='1' cellpadding='3' align='center' style='width:900px; border-spacing:0px;text-align: justified; position:relative;top:40px;background-color:white'>
            <tr style='background-color:grey'>
            <th height='50' width='6%'>SN</th>
            <th width='32%'>Employee Name</th>
            <th width='26%'>Address</th>
            <th width='17%'>Contact No.</th>
            <th width='17%'>Division</th>
            </tr>";
            //$row=$result->fetch_assoc();
            $i=1;
            while ($row = $result->fetch_array())
            {
                echo "<tr>";
                echo "<td style='border:1px solid black; '>" . $i . "</td>";
                echo "<td style='border:1px solid black;'>" . $row['Name'] . "</td>";
                echo "<td style='border:1px solid black;'>" . $row['Address'] . "</td>";
                echo "<td style='border:1px solid black;'>" . $row['Contact'] . "</td>";
                echo "<td style='border:1px solid black;'>" . $row['Division'] . "</td>";
                //echo "<td style='border:1px solid black;'>" . $row['DivisionRole'] . "</td>";
                echo "</tr>";
                $i++;
            }
            echo "</table>";


        }

        else {
            echo "<div style='margin:10px; color:red; font-family:Courier New;'># Employee list are empty at the moment.</div>";
        }
    }



    //this function returns the exco 1 name
    public function getExco1() {

        $sql="SELECT * FROM $this->table WHERE DivisionRole='ceo'";
        $result = $this->new_connection->query($sql);
        if (!$result) {
            echo "# Something went wrong in database ".mysqli_error($this->connection)."<br>";
            echo "Contact to the admin for further help.";
            exit();
        }
        $row = $result->fetch_array();
        $exco1 = $row['Name'];
        return $exco1;
    }

    //this function returns the exco 2 name
    public function getExco2() {
        $sql="SELECT * FROM $this->table WHERE DivisionRole='md'";
        $result = $this->new_connection->query($sql);
        if (!$result) {
            echo "# Something went wrong in database ".mysqli_error($this->connection)."<br>";
            echo "Contact to the admin for further help.";
            exit();
        }
        $row = $result->fetch_array();
        $exco1 = $row['Name'];
        return $exco1;
    }


    //this function returns the name of IT division chief
    public function getITChief() {
        $sql="SELECT * FROM $this->table WHERE DivisionRole='chief' AND Division='IT Division'";
        $result = $this->new_connection->query($sql);
        if (!$result) {
            echo "# Something went wrong in database ".mysqli_error($this->connection)."<br>";
            echo "Contact to the admin for further help.";
            exit();
        }
        $row = $result->fetch_array();
        $itChief = $row['Name'];
        return $itChief;
    }


    //this function returns the name of HR division chief
    public function getHRChief() {
        $sql="SELECT * FROM $this->table WHERE DivisionRole='chief' AND Division='HR Division'";
        $result = $this->new_connection->query($sql);
        if (!$result) {
            echo "# Something went wrong in database ".mysqli_error($this->connection)."<br>";
            echo "Contact to the admin for further help.";
            exit();
        }
        $row = $result->fetch_array();
        $hrChief = $row['Name'];
        return $hrChief;
    }

    //this function returns the RTE division chief
    public function getRTEChief() {
        $sql="SELECT * FROM $this->table WHERE DivisionRole='chief' AND Division='RTE Division'";
        $result = $this->new_connection->query($sql);
        if (!$result) {
            echo "# Something went wrong in database ".mysqli_error($this->connection)."<br>";
            echo "Contact to the admin for further help.";
            exit();
        }
        $row = $result->fetch_array();
        $rteChief = $row['Name'];
        return $rteChief;
    }


    //this function returns the Administration division chief
    public function getAdminChief() {
        $sql="SELECT * FROM $this->table WHERE DivisionRole='chief' AND Division='Administration'";
        $result = $this->new_connection->query($sql);
        if (!$result) {
            echo "# Something went wrong in database ".mysqli_error($this->connection)."<br>";
            echo "Contact to the admin for further help.";
            exit();
        }
        $row = $result->fetch_array();
        $adminChief = $row['Name'];
        return $adminChief;
    }

}



?>