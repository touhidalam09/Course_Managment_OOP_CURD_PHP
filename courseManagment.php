
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if ($_SESSION["UserName"]) {

    $title = "Manage Course";
    include_once 'header.php';


    include_once 'Class/CourseManagment.php';
    $courseMange = new CourseManagment();


    if (!empty($_GET["deleteCourse"]) && isset($_GET["deleteCourse"])) {
        $id = $_GET["deleteCourse"];
        $courseMange->deleteCourse($id);
    }
    ?>


    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2" style="padding-right: 0">
                <?php
                include_once 'navbar.php';
                ?>
            </div>
            <div class="col-lg-10" style="padding-left: 0">
                <div class="container" style="padding-left: 0">
                    <div>
                        <?php
                        include_once 'message.php';
                        ?>
                    </div>
                    <section class="table-section">
                        <?php
                        include_once 'displayCourse.php';
                        ?>
                    </section>

                </div>
            </div>
        </div>
    </div>


    <?php
    include_once 'footer.php';
//else session empty or destroy then go login page
} else {
    header("Location:login.php");
}
?>




