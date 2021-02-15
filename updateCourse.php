<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$title = "Update New Course";
include_once 'header.php';

if ($_SESSION["UserName"]) {

    include_once 'Class/CourseManagment.php';
    $courseMange = new CourseManagment();


    if (isset($_GET["updateCourse"]) && !empty($_GET["updateCourse"])) {
        $id = $_GET["updateCourse"];
        $datas = $courseMange->displayId($id);
    }

    if (isset($_POST["submit_Course_update"])) {
        $courseMange->updateCourse($_POST);
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
                <section>
                    <form class="box-Add-rol" action="updateCourse.php" method="POST">
                        <?php
                        foreach ($datas as $data) {
                            ?>
                            <div class="py-2 text-center">
                                <h4 class="text-dark">
                                    Update Course,<span class="text-muted">
                                        <?php echo $data["Course_Name"] ?>
                                    </span>
                                </h4>
                            </div>
                            <input
                                type="hidden"
                                name ="id"
                                value="<?php echo $data['id']; ?>"
                                />
                            <div class="form-group py-3">
                                <input 
                                    type="text"
                                    class="form-control"
                                    name="course"
                                    placeholder="<?php echo $data["Course_Name"] ?>"
                                    required="">
                            </div>
                            <div class="form-group pt-2 text-center">
                                <input 
                                    class="my-btn"
                                    type="submit"
                                    name="submit_Course_update" 
                                    class="btn btn-primary"
                                    value="Update"
                                    >
                            </div>
                            <?php
                        }
                        ?>
                    </form>
                </section>
            </div>
        </div>
    </div>

    <?php
    include_once 'footer.php';
} else {
    header("Location:login.php");
}
?>


