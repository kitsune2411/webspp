<?php

require_once '../../config/koneksi.php';

class Admin extends Connect {
    
    function __construct()
    {
        parent::__construct();
    }

    function getAllDataPetugas()
    {
        $data = $this->conn->query('SELECT * FROM petugas');

        return $data;
    }

    function getAllDataSiswa()
    {
        $data = $this->conn->query('CALL GetAllDataSiswa');

        return $data;
    }
    
    function addPetugas($name, $username, $password, $level)
    {
        $data = $this->conn->query("INSERT INTO petugas VALUES(NULL, '$username', '$password', '$name', '$level')");

        if ($data) {
            return true;
        } else {
            return false;
        }
    }
}


?>