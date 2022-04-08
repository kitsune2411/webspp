<?php

require_once '../../config/koneksi.php';

class Admin extends Connect {
    
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllDataPetugas()
    {
        $data = $this->conn->query('SELECT * FROM petugas');

        return $data;
    }

    public function getAllDataSiswa()
    {
        $data = $this->conn->query('CALL GetAllDataSiswa');

        return $data;
    }

    public function getAllKelas()
    {
        $data = $this->conn->query('SELECT * FROM kelas');

        return $data;
    }

    public function getAllSpp()
    {
        $data = $this->conn->query('SELECT * FROM spp');

        return $data;
    }

    public function getHistoryPembayaran()
    {
        $data = $this->conn->query('SELECT * FROM pembayaran');

        return $data;
    }
    
    public function addPetugas($name, $username, $pass, $level)
    {
        $data = $this->conn->query("INSERT INTO petugas VALUES(NULL,  '$username', '$name', '$pass', '$level')");

        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function deletePetugas($id)
    {
        $data = $this->conn->query("DELETE FROM petugas WHERE id_petugas = '$id'");

        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function addSiswa($nisn,$nis,$name, $alamat, $telp, $spp, $kelas)
    {
        $data = $this->conn->query("INSERT INTO siswa VALUES('$nisn', '$nis', '$name', '$kelas', '$alamat', '$telp', $spp)");

        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteSiswa($id)
    {
        $data = $this->conn->query("DELETE FROM siswa WHERE nisn = '$id'");

        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function AddSpp($tahun, $nominal)
    {
        $data = $this->conn->query("INSERT INTO spp VALUES(NULL, '$tahun', '$nominal')");

        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteSpp($id)
    {
        $data = $this->conn->query("DELETE FROM spp WHERE id_spp = '$id'");

        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function AddKelas($kelas, $komka)
    {
        $data = $this->conn->query("INSERT INTO kelas VALUES(NULL, '$kelas', '$komka')");

        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteKelas($id)
    {
        $data = $this->conn->query("DELETE FROM kelas WHERE id_kelas = '$id'");

        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function getDataPetugas($id)
    {
        $data = $this->conn->query("SELECT * FROM petugas WHERE id_petugas='$id'");

        return $data;
    }
    public function getDataSiswa($id)
    {
        $data = $this->conn->query("SELECT * FROM siswa WHERE nisn='$id'");

        return $data;
    }

    public function getDataKelas($id)
    {
        $data = $this->conn->query("SELECT * FROM kelas WHERE id_kelas='$id'");

        return $data;
    }

    public function getDataSpp($id)
    {
        $data = $this->conn->query("SELECT * FROM spp WHERE id_spp='$id'");

        return $data;
    }

    public function updatePetugas($id, $name, $username,$password, $level)
    {

        if (isset($password) && !empty($password)) {
            
            $data = $this->conn->query("UPDATE petugas SET username='$username', nama_petugas='$name', password='$password', level='$level' WHERE id_petugas='$id'");
        } else {
            $data = $this->conn->query("UPDATE petugas SET username='$username', nama_petugas='$name', level='$level' WHERE id_petugas='$id'");
        }

        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function updateSiswa($nisn,$nis,$name, $alamat, $telp, $spp, $kelas)
    {
        $data = $this->conn->query("UPDATE `siswa` SET `nis` = '$nis', `nama` = '$name', `id_kelas` = '$kelas', `alamat` = '$alamat', no_telp = '$telp', id_spp = '$spp' WHERE nisn = '$nisn'");

        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function updateKelas($id, $kelas, $komka)
    {
        $data = $this->conn->query("UPDATE kelas SET nama_kelas='$kelas', kopetensi_keahlian='$komka' WHERE id_kelas='$id'");

        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function updateSpp($id, $tahun, $nominal)
    {
        $data = $this->conn->query("UPDATE spp SET tahun='$tahun', nominal='$nominal' WHERE id_spp = '$id' ");

        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function getNominalBayar($nisn_fix)
    {
        $data = $this->conn->query("SELECT * FROM siswa a LEFT JOIN spp b ON a.id_spp = b.id_spp  WHERE nisn='$nisn_fix'");

        return $data;
    }


}


?>