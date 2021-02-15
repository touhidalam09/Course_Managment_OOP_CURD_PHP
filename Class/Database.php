<?php


class Database {

    private $serverName = "localhost";
    private $userName = "root";
    private $password = "";
    private $database = "php_oop";
    public $conn;

    function __construct() {
        $this->conn = new mysqli($this->serverName, $this->userName, $this->password, $this->database);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        } else {
//            echo "Connection Successfully";
        }
    }

}
