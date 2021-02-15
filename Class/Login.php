<?php

session_start();
include_once 'Database.php';

class Login extends Database {

    function __construct() {
        parent::__construct();
    }

    public function Display() {
        $sql = "SELECT * FROM admin";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            header("Location:index.php?msg4=nodata");
        }
    }

    public function DisplayIDCheack($post) {

        $username = $_POST["username"];
        $password = $_POST["password"];

        if ((!empty($username)) and ( !empty($password))) {

            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = test_input($username);
                $password = test_input($password);
            }
        }
        $sql = "SELECT * FROM admin WHERE UserName = '$username' AND Password = '$password'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION["UserName"] = $row["UserName"];
            
        } else {
            $_SESSION["UserName"] = "";
            header("Location:login.php?msg5=invalid");
        }

        if (isset($_SESSION["UserName"]) && (!empty($_SESSION["UserName"]))) {
            header("Location:index.php");
        }
        //function close 
    }

}
