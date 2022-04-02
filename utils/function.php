<?php

include_once 'databases.php';

class Koneksi extends Database{

    public function __construct()
    {
        parent::__construct();
    }

    // membuat fungsi login user 
    public function loginUser($username, $password){
        $query = $this->koneksi->query("SELECT * FROM tb_siswa WHERE nisn='$username' AND nis='$password'");
        $data = mysqli_num_rows($query);

        $query2 = $this->koneksi->query("SELECT * FROM tb_petugas WHERE username='$username' AND password='$password'");
        $data2 = mysqli_num_rows($query2);

        // login siswa
        if($data > 0){
            $res = $query->fetch_array();
			$_SESSION['username'] = $username;
			$_SESSION['nama']= $res['nama'];
            $_SESSION['login'] = true;
			header('location: views/siswa/dashboard.php');
        }
        
        if($data2 > 0){
            // login admin
            $res = $query2->fetch_array();
			if($res['level'] == 'admin'){
                $_SESSION['username'] = $username;
                $_SESSION['login'] = true;
                header('location: views/admin/dashboard.php');
            }
            // login petugas
            else if($res['level'] == 'petugas'){
                $_SESSION['username'] = $username;
                $_SESSION['login'] = true;
                header('location: views/petugas/dashboard.php');
            }
        }else{
			echo "<script>alert('Username atau Password Salah!')</script>";
		}
    }

    public function createSiswa($nisn, $nis, $nama, $alamat, $kelas, $no_telp, $spp){
        // lakukan pengecekan untuk akun siswa
        $query = $this->koneksi->query("SELECT * FROM tb_siswa WHERE nisn='$nisn' OR nis='$nis'");
        if(mysqli_fetch_assoc($query) === 0){
            echo"<script>alert('data siswa ini sudah ada')</script>";
        }

        // mengambil array atau data dari tb spp
        $id_spp = $this->koneksi->query("SELECT * FROM tb_spp WHERE tahun='$spp'");
        $arr_spp = $id_spp->fetch_array();
        $idSpp = $arr_spp['id_spp'];

        // mengambil array atau data dari tb kelas
        $id_kelas = $this->koneksi->query("SELECT * FROM tb_kelas WHERE nama_kelas='$kelas'");
        $arr_kelas = $id_kelas->fetch_array();
        $idKelas = $arr_kelas['id_kelas'];

        // melakukan insert data siswa
        $this->koneksi->query("INSERT INTO tb_siswa VALUES('$nisn', '$nis', '$nama', '$alamat', '$idKelas', '$no_telp', '$idSpp')");
    }

    public function data_siswa(){
        $query = $this->koneksi->query("CALL data_siswa()");
        while($s = $query->fetch_array()){
            $hasil[] = $s;
        }
        return $hasil;
    }

    public function data_petugas(){
        $query = $this->koneksi->query("SELECT * FROM tb_petugas");
        while($s = $query->fetch_array()){
            $hasil[] = $s;
        }
        return $hasil;
    }

    public function data_kelas(){
        $query = $this->koneksi->query("SELECT * FROM tb_kelas");
        while($s = $query->fetch_array()){
            $hasil[] = $s;
        }
        return $hasil;
    }

    public function data_spp(){
        $query = $this->koneksi->query("SELECT * FROM tb_spp");
        while($s = $query->fetch_array()){
            $hasil[] = $s;
        }
        return $hasil;
    }

    public function data_transaksi(){
        $query = $this->koneksi->query("SELECT * FROM generate_laporan");
        while($s = $query->fetch_array()){
            $hasil[] = $s;
        }
        return $hasil;
    }

    public function createPetugas($username, $password, $nama_petugas, $level){
        // melakukan insert data petugas
       $query =  $this->koneksi->query("INSERT INTO tb_petugas VALUES(null, '$username', '$password', '$nama_petugas', '$level')");
       return $query;
    }

    public function createSpp(){

    }

    public function createKelas(){
        
    }

    public function generateLaporan(){

    }

    public function logOut(){
        session_start();
        session_destroy();
    }

}


?>