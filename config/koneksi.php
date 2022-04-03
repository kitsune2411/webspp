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

    public function iflogin()
    {
        if (isset($_SESSION['status'])) { 
            if ($_SESSION['status'] == 'login') {
                if (isset($_SESSION['level'])) {
                    if ($_SESSION['level'] == 'admin') {
                        header('Location:includes/admin');
                    } elseif ($_SESSION['level'] == "petugas") {
                        header('Location:includes/petugas');
                    }
                } else {
                    header('location:includes/siswa');
                }
            }
        }
    }

    public function isAdmin()
    {
        if (isset($_SESSION['level'])) {
            if (!$_SESSION['level'] == 'admin') {
                header('location:../../unauthorize.php');
            }
        } else {
            header('location:../../unauthorize.php');

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