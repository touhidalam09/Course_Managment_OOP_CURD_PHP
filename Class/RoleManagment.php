<?php
include_once 'Database.php';


class RoleManagment extends Database {
    function __construct() {
        parent::__construct();
    }
    
    public function display(){
        $sql = "SELECT * FROM `group`";
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
    
    public function displayID($id){
        $sql = "SELECT * FROM `group` WHERE id = '$id'";
        $result  = $this->conn->query($sql);
        $data = array();
        if ($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $data[] = $row;
            return $data;
        }else{
            return $data;
        }
    }
    
    public function destroy($id){
        
        $sql = "DELETE FROM `group` WHERE ID = '$id'";
        if ($this->conn->query($sql) == true) {
            header("Location:roleManagement.php?msg3=delete");
        } else {
            header("Location:roleManagement.php?msg4=delete");
        }
        
    }
    
    public function insertRole($post){
        $role = $_POST["role"];
        
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $role = test_input($role);
        }
        
        $sql = "INSERT INTO `group` SET Role = '$role'";
        
        $result = $this->conn->query($sql);
        if (($result->num_rows > 0) && ($result === TRUE)) {
            header("Location:roleManagement.php?msg1=insert");
        } else {
            header("Location:roleManagement.php?duplicated=duplicated");
        }
    }
    public function updateRole($post){
        $id = $_POST["id"];
        $role = $_POST["role"];
        
        function test_input_update($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $role = test_input_update($role);
        }
        
        $sql = "UPDATE `group` SET Role = '$role' WHERE id = '$id'";
        $result = $this->conn->query($sql);
        if (($result->num_rows > 0) && ($result === TRUE)) {
            header("Location:roleManagement.php?msg2=update");
        } else {
            header("Location:roleManagement.php?duplicated=duplicated");
        }
    }
}
