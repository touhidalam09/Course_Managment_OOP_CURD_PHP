<?php
include_once 'Class/CourseManagment.php';
$courseMange = new CourseManagment();
?>

<div class="reg-box" style="width: auto;">
    <div class="d-flex justify-content-between">
        <div class="d-flex align-items-center text-center">
            <div>
                <h4 class="text-dark">
                    Manage <span class="bg-info">
                        <b>Course</b>
                    </span>
                </h4>
            </div>
        </div>
        
        <div>
            <h2 class="py-2">
                <a href="addCourse.php" class="btn btn-dark">New Course Add</a>
            </h2>
        </div>
    </div>
    <table class="table table-hover my-table" >
        <thead class="table-dark">
            <tr>
                <th>Id</th>
                <th>Course</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="bg-light">
            <?php
            $data = $courseMange->display();
            $count = 0;
            foreach ($data as $row) {
                $count = $count + 1;
                $course = $row['Course_Name'];
                if (empty($course)) {
                    $course = "no course !";
                }
                ?>
                <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $course; ?></td>
                    <td>
                        <a class="btn btn-info text-white"
                           href="updateCourse.php?updateCourse=<?php echo $row['id'] ?>"
                           >
                            Update
                        </a>
                        <a 
                            class="btn btn-danger text-white"
                            href="courseManagment.php?deleteCourse=<?php echo $row['id'] ?>"
                            onclick="confirm('Are you sure want to delete this record')">
                            Delete
                        </a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>