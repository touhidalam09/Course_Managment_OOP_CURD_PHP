<?php

include_once 'Database.php';

class CourseManagment extends Database {

    function __construct() {
        parent::__construct();
    }

    private function forDisplaySql($sql) {
        if (!empty($sql)) {
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

    public function display() {
        $sql = "SELECT * FROM `coursemanagment`";
        return $this->forDisplaySql($sql);
    }

    public function displayId($id) {
        $sql = "SELECT * FROM `coursemanagment` WHERE id = '$id'";
        return $this->forDisplaySql($sql);
    }

    private function testData($course) {

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $course = $_POST["course"];
            $course = test_input($course);
            return $course;
        } else {
            $course = "";
            return $course;
        }
    }

    function insertCourse($post) {

        $course = $this->testData($post);

        $sql = "INSERT INTO `coursemanagment` SET Course_Name = '$course'";
        $result = $this->conn->query($sql);
        if ($result === TRUE) {
            header("Location:courseManagment.php?msg1=insert");
        } else {
            header("Location:courseManagment.php?duplicated=duplicated");
        }
    }

    public function updateCourse($post) {

        function test_input2($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST["id"];
            $course = $_POST["course"];
            $course = test_input2($course);
        }

        $sql = "UPDATE `coursemanagment` SET Course_Name = '$course' WHERE id = '$id'";
        $result = $this->conn->query($sql);
        if ($result === TRUE) {
            header("Location:courseManagment.php?msg2=update");
        } else {
            header("Location:courseManagment.php?duplicated=duplicated");
        }
    }

    public function deleteCourse($id) {
        $sql = "DELETE FROM `coursemanagment` WHERE id = '$id'";
        $result = $this->conn->query($sql);
        if ($result === TRUE) {
            header("Location:courseManagment.php?msg3=delete");
        } else {
            header("Location:courseManagment.php?msg4=nodata");
        }
    }

    public function assignCourseDisplay() {

        $findRole = "SELECT * FROM `group` WHERE lower(Role) = 'student' OR upper(Role) = 'student'";
        $data = "no student Role";
        $id = 0;
        $result = $this->conn->query($findRole);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $id = $row["id"];
            $data = $row["Role"];
        }

        $sql = "SELECT
                    coursestudent.StudentID,
                    coursestudent.CourseID,
                    customers.Name,
                    customers.Id,
                    coursemanagment.Course_Name AS CourseName
                FROM
                    customers
                LEFT JOIN coursestudent ON coursestudent.StudentID = customers.Id
                LEFT JOIN coursemanagment ON coursemanagment.id = coursestudent.CourseID
                WHERE
                    customers.Role = '$id'";
        return $this->forDisplaySql($sql);
    }

    public function coursestudent($stdId, $courseId) {
        $search = "SELECT * FROM coursestudent WHERE StudentID='$stdId'";
        $sql = "INSERT INTO coursestudent SET StudentID='$stdId',CourseID='$courseId'";
        $result = $this->conn->query($search);


        if (($result->num_rows > 0)) {
//            header("Location:coursetoStudent.php?duplicated=duplicated");
            $flag = 0;
            return $flag;
        } else {
            if (($this->conn->query($sql) === TRUE)) {
                $flag = 1;
//                header("Location:coursetoStudent.php?msg1=insert");return $flag;
            }
            return $flag;
        }
    }

}
