<?php

require_once 'config/koneksi.php';

class Login extends Connect {

    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * login
     *
     * @param  mixed $username
     * @param  mixed $password
     * @return void
     */
    public function login($username, $password)
    {
        $data = $this->conn->query("SELECT * FROM siswa WHERE nisn='$username' AND nis='$password'");

        if ($data->num_rows > 0) {
            //siswa
            $_SESSION['status'] = "login";
            header('Location:includes/siswa/');
        } else {
            //petugas
            $password = md5($password);
            $data2 = $this->conn->query("SELECT * FROM petugas WHERE username='$username' AND password='$password'");

            if ($data2->num_rows > 0) {

                $_SESSION['username'] = $username;
                $_SESSION['status'] = "login";
        
                while ($x = $data2->fetch_assoc()) {
                    $result[] = $x;
                }

                foreach($result as $petugas) :

                    if ($petugas['level'] == "admin") {
                        $_SESSION['id_petugas'] = $petugas['id_petugas'];
                        $_SESSION['nama'] = $petugas['nama_petugas'];
                        $_SESSION['level'] = $petugas['level'];
                        header('Location:includes/admin/');
                    } elseif ($petugas['level'] == "petugas") {
                        $_SESSION['id_petugas'] = $petugas['id_petugas'];
                        $_SESSION['nama'] = $petugas['nama_petugas'];
                        $_SESSION['level'] = $petugas['level'];
                        header('Location:includes/petugas/');
                    }

                endforeach;
    
            } else {
                $_SESSION['error'] = "credential not match";
            }
        }
    }
}