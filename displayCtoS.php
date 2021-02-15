<?php
include_once 'Class/CourseManagment.php';
$courseMange = new CourseManagment();

$allData = $courseMange->display();

function courseSelection() {
    global $allData;

    foreach ($allData as $data) {
        echo "<option value=" . $data["id"] . ">";
        echo $data["Course_Name"];
        echo "</option>";
    }
}
?>

<div class="reg-box pt-4" style="width: auto;">
    <div class="d-flex justify-content-between py-3">
        <div class="d-flex align-items-center text-center">
            <div>
                <h4 class="text-dark">
                    Manage <span class="bg-info">
                        <b>Course to Student Select</b>
                    </span>
                </h4>
            </div>
        </div>
        <div class="d-flex justify-content-between mb-3">
            <select name="course" id="course" class="bg-light">
                <option value="0"> chosse course</option>
                <?php courseSelection(); ?>
            </select>
        </div>
    </div>
    <table class="table table-hover my-table text-start" >
        <thead class="table-dark">
            <tr>
                <th>Id</th>
                <th>Select Student</th>
                <th>Student Name</th>
                <th>Assign Course</th>
            </tr>
        </thead>
        <tbody id="myTableBody" class="bg-light">
            <?php
            $courseMangeData = $courseMange->assignCourseDisplay();
            $count = 0;
            foreach ($courseMangeData as $data) {
                $count = $count + 1;
                $studentName = $data["Name"];
                $course = $data["CourseName"];
                if (empty($studentName)) {
                    $studentName = "no student here..";
                }
                ?>
                <tr>
                    <td><?php echo $count; ?></td>
                    <td>
                        <div class="input-group text-end">
                            <?php
                            if (empty($course)) {
                                echo '<input class="chekBox" value="' . $data["Id"] . '" type="checkbox">';
                            } else {
                                echo '<input class="chekBox" value="' . $data["Id"] . '" type="checkbox" disabled="">';
                            }
                            ?>
                        </div>
                    </td>
                    <td><?php echo $studentName; ?></td>
                    <td>
                        <span id="assignCourse">
                            <?php echo $course; ?>
                        </span>
                    </td>
                </tr>
                <?php
            }
            ?>

        </tbody>
    </table>
    <div>
        <input class="btn btn-success" id="save_course" type="submit" name="save_course" value="Save">
    </div>
</div>
