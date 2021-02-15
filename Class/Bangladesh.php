<?php

include_once 'Database.php';

class Bangladesh extends Database {

    function __construct() {
        parent::__construct();
    }
    
    public function sqlCheck($sql){
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
//            header("Location:index.php?msg4=nodata");
        }
    }

    public function division() {
        $sql = "SELECT * FROM divisions";
        return $this->sqlCheck($sql);
    }

    public function district($division_id) {
        $sql = "SELECT * FROM districts WHERE division_id = '$division_id'";
        return $this->sqlCheck($sql);
    }

    public function upazila($id) {
        $sql = "SELECT * FROM upazilas WHERE district_id = '$id'";
        return $this->sqlCheck($sql);
    }

    public function union($id) {
        $sql = "SELECT * FROM unions WHERE upazila_id = '$id'";
        return $this->sqlCheck($sql);
    }

}
