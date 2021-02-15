<?php

function whoIsLogin() {
    if (isset($_SESSION['UserName']) && (!empty($_SESSION['UserName']))) {
        echo '<li>
                <a class="bg-info" href="#">';
        echo 'Welcome, ';
        echo $_SESSION["UserName"];
        echo '  </a>
            </li>';
    } else {
        echo '<li>
                <a href="#">';
        echo '  </a>
              </li>';
    }
}
?>

<ul class="nav flex-column text-start">
    <?php
    $filename = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);
    if ($filename == "index.php") {
        echo '<li><a class="active" href="index.php">Home</a></li>';
    } else {
        echo '<li><a href="index.php">Home</a></li>';
    }
    
    if ($filename == "viewRecord.php" || $filename == "add.php" || $filename == "update.php") {
        echo '<li><a class="active" href="viewRecord.php">View Record</a></li>';
    } else {
        echo '<li><a href="viewRecord.php">View Record</a></li>';
    }
    if ($filename == "courseManagment.php" || $filename == "addCourse.php" || $filename == "updateCourse.php") {
        echo '<li><a class="active" href="courseManagment.php">Course Managment</a></li>';
    } else {
        echo '<li><a href="courseManagment.php">Course Managment</a></li>';
    }
    if ($filename == "coursetoStudent.php") {
        echo '<li><a class="active" href="coursetoStudent.php">Course to Selection</a></li>';
    } else {
        echo '<li><a href="coursetoStudent.php">Course to Selection</a></li>';
    }
    
    if ($filename == "roleManagement.php" || $filename == "addRole.php" || $filename == "updateRole.php") {
        echo '<li><a class="active" href="roleManagement.php">Role Management</a></li>';
    } else {
        echo '<li><a href="roleManagement.php">Role Management</a></li>';
    }
    if ($filename == "logout.php") {
        echo '<li><a class="active" href="logout.php">LogOut</a></li>';
    } else {
        echo '<li><a href="logout.php">LogOut</a></li>';
    }
    
    ?>
</ul>

