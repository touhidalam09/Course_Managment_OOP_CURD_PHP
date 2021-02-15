<?php

include_once '../Class/Bangladesh.php';
$ban = new Bangladesh();

if (isset($_GET["div"])) {
    $divisionID = $_GET["div"];

    $distdata = $ban->district($divisionID);

    //district option
    if (!empty($distdata) && ($divisionID != "")) {
        echo "<option> chosse District</option>";
        foreach ($distdata as $data) {
            echo "<option value=" . $data["id"] . ">";
            echo $data["bn_name"];
            echo "</option>";
        }
    }
}
if (isset($_GET["dis"])) {
    $distictID = $_GET["dis"];
    $upazData = $ban->upazila($distictID);
    //Upazila Option
    if (($distictID != "") && (!empty($upazData))) {
        echo "<option> chosse upazila</option>";
        foreach ($upazData as $data) {
            echo "<option value=" . $data["id"] . ">";
            echo $data["bn_name"];
            echo "</option>";
        }
    }
}

if (isset($_GET["upaz"])) {

    $upazelaId = $_REQUEST["upaz"];

    $unionData = $ban->union($upazelaId);
    //Union option
    if (($unionData != "") && (!empty($upazelaId))) {
        echo "<option> chosse union</option>";
        foreach ($unionData as $data) {
            echo "<option value=" . $data["id"] . ">";
            echo $data["bn_name"];
            echo "</option>";
        }
    } else {
        echo "<option> no data in database</option>";
    }
}
?>
