<?php

include_once '../Class/CourseManagment.php';
$coursemanagment = new CourseManagment();


if (isset($_GET["cr"]) && isset($_GET["aitem"])) {
    $courseId = $_GET["cr"];

    if ($courseId > 0) {

        $stdId = $_GET["aitem"];
        $stdIdArray = explode(",", $stdId);
        for ($i = 0; $i < count($stdIdArray); $i++) {
            if (!empty($stdIdArray[$i])) {
                $flag = $coursemanagment->coursestudent($stdIdArray[$i], $courseId);
            }
        }
        echo $flag;
    }
}
