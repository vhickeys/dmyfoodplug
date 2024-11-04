<?php

class Database
{
    private $hostname = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "dmyfoodplug";
    private $conn;

    // Uncomment this for Live Connection

    // private $hostname = "localhost";
    // private $username = "dmyfoodp_user";
    // private $password = "dmyfoodp_user2024";
    // private $dbname = "dmyfoodp_db";
    // private $conn;

    public function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->hostname;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $th) {
            echo "Connection failed: " . $th->getMessage();
            die();
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }
}
