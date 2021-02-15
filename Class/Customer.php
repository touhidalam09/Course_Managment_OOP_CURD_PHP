<?php

include_once 'Database.php';

class Customer extends Database {

    function __construct() {
        parent::__construct();
    }

    public function insertData($post) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $userName = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST["group"];
        $division = $_POST['division'];
        $district = $_POST['district'];
        $upazila = $_POST['upazila'];
        $union = $_POST['union'];
        

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = test_input($name);
            $email = test_input($email);
            $userName = test_input($userName);
            $password = test_input($password);
        }
        $password = md5($password);

        $sql = "INSERT INTO customers(
                        Name,
                        Email,
                        Username,
                        Role,
                        Division,
                        District,
                        Upazila,
                        Unions,
                        Password
                    )
                    VALUES(
                        '$name',
                        '$email',
                        '$userName',
                        '$role',
                        '$division',
                        '$district',
                        '$upazila',
                        '$union',
                        '$password'
                    )";
        if ($this->conn->query($sql) === TRUE) {
            header("Location:viewRecord.php?msg1=insert");
        } else {
            header("Location:viewRecord.php?duplicated=duplicated");
        }
    }

    public function display() {

        $sql = "SELECT
                    customers.Id,
                    `group`.Role AS Role,
                    customers.Name,
                    customers.Email,
                    customers.Username,
                    divisions.bn_name AS Division,
                    districts.bn_name AS District,
                    upazilas.bn_name AS Upazila,
                    unions.bn_name AS Unions
                FROM
                    customers
                LEFT JOIN `group` ON customers.Role = `group`.id
                LEFT JOIN divisions ON customers.Division = divisions.id
                LEFT JOIN districts ON customers.District = districts.id
                LEFT JOIN upazilas ON customers.Upazila = upazilas.id
                LEFT JOIN unions ON customers.Unions = unions.id
                ORDER BY `group`.Role";

        $result = $this->conn->query($sql);
        $data = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            return $data;
        }
    }

    public function displaybyId($id) {
        $sql = "SELECT * FROM customers WHERE Id = '$id'";
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

    public function destroy($id) {
        $sql = "DELETE FROM customers WHERE ID = '$id'";
        if ($this->conn->query($sql) == true) {
            header("Location:viewRecord.php?msg3=delete");
        } else {
            header("Location:index.php?msg4=delete");
        }
    }

    public function update_Data($post) {

        $id = $_POST["id"];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $userName = $_POST['username'];
        $role = $_POST["group"];
        $password = $_POST['password'];

        function test_input1($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = test_input1($name);
            $email = test_input1($email);
            $userName = test_input1($userName);
            $password = test_input1($password);
        }
        $password = md5($password);
        if (empty($role)){
            $role = 0;
        }

        $sql = "UPDATE customers SET Name='$name',Email='$email',Username='$userName',Role='$role',Password='$password' WHERE id='$id'";
        if ($this->conn->query($sql) === TRUE) {
            header("Location:viewRecord.php?msg2=update");
        } else {
            header("Location:viewRecord.php?duplicated=duplicated");
        }
    }

    public function pagination() {
        $limit = '5';

        $sql = "SELECT * FROM customers LIMIT 5 OFFSET 15";
        $result = $this->conn->query($sql);
        $data = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            return $data;
        }
    }

}

//Class Customer Close
