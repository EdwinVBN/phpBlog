<?php
require_once '../DB/DB.php';

class Logout extends DBConnectie {
    public function __construct()
    {
        session_start();
        session_destroy();
        header("Location: ../login.php");
        exit;
    }

    public function logout()
    {
        $this->__construct();
    }
}

$logout = new Logout();
$logout->logout();