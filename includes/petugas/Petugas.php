<?php

include_once "../../config/koneksi.php";

class Petugas extends Connect {
    public function __construct()
    {
        parent::__construct();
    }

    public function isPetugas()
    {
        if (isset($_SESSION['level'])) {
            if ($_SESSION['level'] != 'petugas') {
                header('location:../../unauthorize.php');
            }
        } else {
            header('location:../../unauthorize.php');
        
        }
    }

    public function getAllDataSiswa()
    {
        $data = $this->conn->query('CALL GetAllDataSiswa');

        return $data;
    }

    public function getHistoryPembayaran()
    {
        $data = $this->conn->query('SELECT * FROM pembayaran');

        return $data;
    }
}