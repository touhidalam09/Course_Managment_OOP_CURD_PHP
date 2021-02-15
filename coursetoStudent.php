<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if ($_SESSION["UserName"]) {

    $title = "Manage Course to Select";
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
                        include_once 'displayCtoS.php';
                        ?>
                    </section>

                </div>
            </div>
        </div>
    </div>

    <script>
        

        $(document).ready(function() {
            $("#myTableBody").hide();
            $("#save_course").hide();
        });
        $(document).ready(function() {
            $("select#course").change(function() {
                var value = $("#course option:selected").val();
                if (value > 0) {
                    $("#myTableBody").show();
                    $("#save_course").show();
                } else {
                    $("#myTableBody").hide();
                    $("#save_course").hide();
                }
            })
        });


        const save_course = document.getElementById("save_course");
        save_course.addEventListener("click", function(event) {
            event.preventDefault();
            var course = document.getElementById("course");
            for (let i = 0; i < course.length; i++) {
                if (course[i].selected) {
                    course = course[i].value
                }
            }

            var selectedItem = [];
            let chekBox = document.getElementsByClassName("chekBox");
            for (let i = 0; i < chekBox.length; i++) {
                if (chekBox[i].checked) {
                    selectedItem[i] = chekBox[i].value;
                }
            }

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    //                    document.getElementById("assignCourse").innerHTML = this.responseText;
                    if (this.responseText == 0) {
                        location.href = "coursetoStudent.php?duplicated=duplicated";
                    } else {
                        location.href = "coursetoStudent.php?msg1=insert";
                    }
                }
            };
            xhttp.open("GET", "AjaxFile/acourse.php?cr=" + course + "&aitem=" + selectedItem, true);
            xhttp.send();
        });
    </script>


<?php
    include_once 'footer.php';
    //else session empty or destroy then go login page
} else {
    header("Location:login.php");
}
?>