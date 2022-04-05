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

    function getAllKelas()
    {
        $data = $this->conn->query('SELECT * FROM kelas');

        return $data;
    }

    function getAllSpp()
    {
        $data = $this->conn->query('SELECT * FROM spp');

        return $data;
    }
    
    function addPetugas($name, $alamat, $password, $level)
    {
        $data = $this->conn->query("INSERT INTO petugas VALUES(NULL,  '$password', '$name', '$level')");

        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    function deletePetugas($id)
    {
        $data = $this->conn->query("DELETE FROM petugas WHERE id_petugas = '$id'");

        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    function addSiswa($nisn,$nis,$name, $alamat, $telp, $spp, $kelas)
    {
        $data = $this->conn->query("INSERT INTO siswa VALUES('$nisn', '$nis', '$name', '$kelas', '$alamat', '$telp', $spp)");

        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    function deleteSiswa($id)
    {
        $data = $this->conn->query("DELETE FROM siswa WHERE nisn = '$id'");

        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    function AddSpp($tahun, $nominal)
    {
        $data = $this->conn->query("INSERT INTO spp VALUES(NULL, '$tahun', '$nominal')");

        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    function deleteSpp($id)
    {
        $data = $this->conn->query("DELETE FROM spp WHERE id_spp = '$id'");

        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    function AddKelas($kelas, $komka)
    {
        $data = $this->conn->query("INSERT INTO kelas VALUES(NULL, '$kelas', '$komka')");

        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    function deleteKelas($id)
    {
        $data = $this->conn->query("DELETE FROM kelas WHERE id_kelas = '$id'");

        if ($data) {
            return true;
        } else {
            return false;
        }
    }
}


?>