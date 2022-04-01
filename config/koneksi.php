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
}