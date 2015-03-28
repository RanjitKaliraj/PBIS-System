<?php

class Connection {
    private $host="localhost";
    private $db_name="root";
    private $password="";
    private $database="pbis_db";
    public $connection;

    //the connection will be stablished in the constructor

    public function __construct() {
        $this->connection = new mysqli($this->host,$this->db_name,$this->password, $this->database);
        // Check connection
        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySql database: " . mysqli_connect_error();
            exit();
        }
    }
}

?>