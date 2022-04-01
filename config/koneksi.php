<?php

class Connect {
    var $host = "localhost";
    var $user = "root";
    var $pass = "";
    var $db   = "db_spp";

    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
        
    }

    public function islogin()
    {
        if (!$_SESSION['status'] == 'login') {
            header('location:../../index.php');
            exit;
        }
    }

    
    /**
     * logout
     *
     * @return void
     */
    public function logout()
    {
        session_unset();
        session_destroy();
        header('location:../../index.php');
    }
}

?>