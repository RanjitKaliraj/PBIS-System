<?php
class Logout {

    public function __construct() {
        session_destroy();

        session_start();
        unset($_SESSION['division']);
        $_SESSION['logout']= 'You have successfully logout.';
        header("location:../login.php");
        exit();
    }
}


?>