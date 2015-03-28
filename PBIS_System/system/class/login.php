<?php

include_once('connection.php');

class Login {

    private $host="localhost";
    private $db_name="root";
    private $password="";
    private $database="pbis_db";
    private $connection;
    private $table="login";

    /**
    //this function is for connecting to the mysql server
    public function connect()
    	{
    	$this->connection = new mysqli($this->host,$this->db_name,$this->password, $this->database);
    	if($this->connection->connect_errno > 0)		// Check connection
    		{
    		die('Unable to connect to database [' . $db->connect_error . ']');
    		}
    	}
    	*/

    //initializing the constructor in order to connect to the database
    public function __construct() {

        //creating new connection to the database
        $connect = new Connection;
        $this->connection = $connect->connection;

    }

    public function __destruct() {
        mysqli_close($this->connection);  //closing the connection

    }

    //this function get the username of required division
    public function getUserName($div) {
        $division = $div;
        $sql = "SELECT * FROM $this->table";
        $result = $this->connection->query($sql);

        while ($row = $result->fetch_array()) {
            if ($row['Division'] == $division) {
                return $row['Username'];
                exit();
            }
        }

    }

    //this function check the login username and password
    public function loginCheck($username, $password) {
        $user_name=$username;
        $user_password=$password;
        //echo "first name:".$user_name.'<br>';

        // To protect MySQL injection (more detail about MySQL injection)
        $new_username = stripslashes($user_name);
        $new_password = stripslashes($user_password);
        $new_username = $this->connection->real_escape_string($new_username);
        $new_password = $this->connection->real_escape_string($new_password);

        $hashed_Password=md5($new_password); //encrypting password with md5


        $sql="SELECT * FROM $this->table WHERE Username='$new_username' AND Password='$hashed_Password'";
        $result=$this->connection->query($sql);
        if (!$result) {
            echo "error in query: ".mysqli_error($this->connection);
            exit();
        }

        // Mysql_num_row is counting table row
        // If result matched $user_name and $user_password, table row must be 1 row
        $count=$result->num_rows;

        /**
        echo $count;
        echo "name: ". $new_username.'<br>';
        echo "hashed:".$hashed_Password. '<br>';
        echo "password: ". $new_password;
        **/

        //getting all the value of row
        $row=$result->fetch_assoc();
        //echo $row['Division'];

        //login for administration section
        if ($count==1 && $row['Division']=='Admin') {
            session_start();
            $_SESSION['division'] = 'Administration';
            header("location:../administration/administration.php");
            exit();
        }

        //login for IT division
        else if ($count==1 && $row['Division']=='IT Division') {
            session_start();
            $_SESSION['division'] = 'IT Division';
            header("location:../IT_Division/ITdivision.php");
            exit();
        }

        //Login for HR division
        else if ($count==1 && $row['Division']=='HR Division') {
            session_start();
            $_SESSION['division'] = 'HR Division';
            header("location:../HR_Division/HRDivision.php");
            exit();
        }

        //login for RTE division
        else if ($count==1 && $row['Division']=='RTE Division') {
            session_start();
            $_SESSION['division'] = 'RTE Division';
            header("location:../RTE_Division/RTEDivision.php");
            exit();
        }

        //login for EXCO - CEO
        else if ($count==1 && $row['Division']=='Exco1') {
            session_start();
            $_SESSION['division'] = 'Exco1 - CEO';
            header("location:../EXCO/exco1.php");
            exit();
        }

        //login for EXCO - MD
        else if ($count==1 && $row['Division']=='Exco2') {
            session_start();
            $_SESSION['division'] = 'Exco2 - MD';
            header("location:../EXCO/exco2.php");
            exit();
        }

        else {
            session_start();
            $_SESSION['error']= 'Invalid Username/Password !!!';
            header("location:../login.php");
            exit();
        }
    }
}


?>