<?php

class Database{
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $db = 'latihan_ukk';
    
    public function __construct()
    {
        // membuat koneksi
        $this->koneksi = new mysqli($this->host, $this->user, $this->pass, $this->db);
    }
}