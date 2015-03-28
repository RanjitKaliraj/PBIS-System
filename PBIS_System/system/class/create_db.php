<?php
class CreateDatabase {


    public $host="localhost";
    public $username="root";
    public $password="";
    public $con;

    //the connection will be stablished in the constructor
    public function __construct() {
        $this->con=mysqli_connect($this->host,$this->username,$this->password);
        // Check connection
        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
    }
    public function __destruct()
    {
        echo "Database and tables are successfully created.";
    }


    /**
    	public function __construct(){
    	include_once ("connection.php");
    	$obj=new Connection;
    	$con=$obj->connection();
    	}**/

    //this function create database
    public function createDb() {
        $sql="CREATE DATABASE IF NOT EXISTS PBIS_db";
        return mysqli_query($this->con,$sql);
    }

    //this function Create table for workform data store
    public function createWorkformTable() {
        mysqli_select_db($this->con,"pbis_db");
        $sql="CREATE TABLE IF NOT EXISTS Workform(SN int, ActivityName varchar(100),Unit varchar(50),Weightage varchar(50),PI_100 varchar(50), PI_75 varchar(50), PI_50 varchar(50), PI_less50 varchar(50),Quarter varchar(20), Year varchar(20), Division varchar(20))";
        return mysqli_query($this->con,$sql);
    }

    //this function Create table for progressform data store
    public function createProgressFormTable() {
        mysqli_select_db($this->con,"pbis_db");
        $sql="CREATE TABLE IF NOT EXISTS Progressform(SN int, ActivityName varchar(100),Unit varchar(50),Weightage varchar(50),PI_100 varchar(50), PI_75 varchar(50), PI_50 varchar(50), PI_less50 varchar(50), Measurement varchar(50), Score int, Progress int, IMB varchar(100), Quarter varchar(20), Year varchar(20), Division varchar(20)) ";
        return mysqli_query($this->con,$sql);
    }

    //this function creates table for workform status
    public function workformStatusTable() {
        mysqli_select_db($this->con,"pbis_db");
        $sql="CREATE TABLE IF NOT EXISTS WorkformStatus(DivisionName varchar(50), DivisionChief varchar(50), Quarter varchar(20), Date varchar(20), Year varchar(20),SubmitStatus varchar(20), ApproveStatus varchar(20),AdminDataChange varchar(20)) ";
        return mysqli_query($this->con,$sql);
    }

    //this function creates table for progressform status
    public function progressformStatusTable() {
        mysqli_select_db($this->con,"pbis_db");
        $sql="CREATE TABLE IF NOT EXISTS ProgressformStatus(DivisionName varchar(50), DivisionChief varchar(50), Quarter varchar(20), Date varchar(20), Year varchar(20),SubmitStatus varchar(20), AdminForwardStatus varchar(20),Exco1ApproveStatus varchar(20), Exco2ApproveStatus varchar(20)) ";
        return mysqli_query($this->con,$sql);
    }


    //this function creates table for username/password for login
    public function createLoginTable() {
        mysqli_select_db($this->con,"pbis_db");
        $sql="CREATE TABLE IF NOT EXISTS login(Username varchar(20), Password varchar(20), Division varchar(20))";
        return mysqli_query($this->con,$sql);
    }

    //this function creates table for username/password for login
    public function createEmployeeDB() {
        mysqli_select_db($this->con,"pbis_db");
        $sql="CREATE TABLE IF NOT EXISTS Employee(Name varchar(50), Address varchar(200), Contact varchar(15),Division varchar(20), DivisionRole varchar(50))";
        return mysqli_query($this->con,$sql);
    }

    //this function creates table for PBIS percentage
    public function createPbisPercentage() {
        mysqli_select_db($this->con,"pbis_db");
        $sql="CREATE TABLE IF NOT EXISTS pbis_percentage(Division varchar(50))";
        return mysqli_query($this->con,$sql);
    }


}


?>