<?php

class Database{
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $db = 'latihan_ukk';
    public $koneksi;
    
    public function __construct()
    {
        // membuat koneksi
        $this->koneksi = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
    }
}