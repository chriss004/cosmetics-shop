<?php

class Database {
    private $host = "localhost";
    private $db_name = "cosmetics_shop";
    private $user = "root";
    private $password = "";
    private $conn;

    public function connect() {
        $this->conn = new PDO(
            'mysql:host=' . $this->host . ';dbname=' . $this->db_name,
            $this->user,
            $this->password
        );
        return $this->conn;
    }

    public function getConnection() {
        return $this->connect();
    }
}

$database = new Database();
$conn = $database->getConnection();
?>