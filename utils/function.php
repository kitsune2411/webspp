<?php

include_once 'databases.php';

class Koneksi extends Database{
    // membuat fungsi login user 
    public function loginUser($username, $password){
        $query = mysqli_query($this->koneksi, "SELECT * FROM tb_siswa WHERE nisn='$username' AND nis='$password'");
        $data = mysqli_num_rows($query);

        $query2 = mysqli_query($this->koneksi, "SELECT * FROM tb_petugas WHERE username='$username' AND password='$password' AND level='admin'");
        $data2 = mysqli_num_rows($query2);

        $query3 = mysqli_query($this->koneksi, "SELECT * FROM tb_petugas WHERE username='$username' AND password='$password' AND level='petugas'");
        $data3 = mysqli_num_rows($query3);

        // login siswa
        if($data > 0){
            mysqli_fetch_array($query);
			$_SESSION['username'] = $username;
			$_SESSION['akses']= 'siswa';
            $_SESSION['login'] = true;
			header('location: views/siswa/dashboard.php');
        }// login admin
        else if($data2 > 0){
            $res = mysqli_fetch_array($query2);
			$_SESSION['username'] = $username;
			$_SESSION['akses']= $res['level'];
            $_SESSION['login'] = true;
			header('location: views/admin/dashboard.php');
        }// login petugas
        else if($data3 > 0){
            $res = mysqli_fetch_array($query3);
			$_SESSION['username'] = $username;
			$_SESSION['akses']= $res['level'];
            $_SESSION['login'] = true;
			header('location: views/petugas/dashboard.php');
        }
        else{
			echo "<script>alert('Username atau Password Salah!')</script>";
		}
    }

    public function createSiswa($nisn, $nis, $nama, $alamat, $kelas, $no_telp, $spp){
        // lakukan pengecekan untuk akun siswa
        $query = mysqli_query($this->koneksi, "SELECT * FROM tb_siswa WHERE nisn='$nisn' OR nis='$nis'");
        if(mysqli_fetch_assoc($query) === 0){
            echo"<script>alert('data siswa ini sudah ada')</script>";
        }

        // mengambil array atau data dari tb spp
        $id_spp = mysqli_query($this->koneksi, "SELECT * FROM tb_spp WHERE tahun='$spp'");
        $arr_spp = mysqli_fetch_array($id_spp);
        $idSpp = $arr_spp['id_spp'];

        // mengambil array atau data dari tb kelas
        $id_kelas = mysqli_query($this->koneksi, "SELECT * FROM tb_kelas WHERE nama_kelas='$kelas'");
        $arr_kelas = mysqli_fetch_array($id_kelas);
        $idKelas = $arr_kelas['id_kelas'];

        // melakukan insert data siswa
        mysqli_query($this->koneksi, "INSERT INTO tb_siswa VALUES('$nisn', '$nis', '$nama', '$alamat', '$idKelas', '$no_telp', '$idSpp')");
    }

    public function data_siswa(){
        $query = mysqli_query($this->koneksi, "CALL data_siswa()");
        while($s = mysqli_fetch_array($query)){
            $hasil[] = $s;
        }
        return $hasil;
    }

    public function data_petugas(){
        $query = mysqli_query($this->koneksi, "CALL data_petugas()");
        while($s = mysqli_fetch_array($query)){
            $hasil[] = $s;
        }
        return $hasil;
    }

    public function createPetugas($username, $password, $nama_petugas, $level){
        // melakukan insert data petugas
        mysqli_query($this->konneksi, "INSERT INTO tb_petugas VALUES('$username', '$password', '$nama_petugas', '$level')");
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