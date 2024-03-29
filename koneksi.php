<?php

class Database
{
    private $localhost;
    private $username;
    private $password;
    private $database;
    private $conn;

    public function __construct($localhost, $username, $password, $database)
    {
        $this->localhost = $localhost;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;

        $this->connect();
    }

    private function connect()
    {
        $this->conn = new mysqli($this->localhost, $this->username, $this->password, $this->database);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }
}

$localhost = "localhost";
$username = "root"; 
$password = ""; 
$database = "oop_html"; 

$database = new Database($localhost, $username, $password, $database);
$conn = $database->getConnection();

$query = "SELECT * FROM hitung";
$result = $conn->query($query);

?>