<?php
include_once 'Class/Customer.php';
include_once 'Class/Bangladesh.php';
include_once 'Class/RoleManagment.php';

$ban = new Bangladesh();
$divisionData = $ban->division();
$customers = new Customer();
$grp = new RoleManagment();
$grpData = $grp->display();

if (isset($_POST['submit_form'])) {
    $customers->insertData($_POST);
}

function divisionOption() {
    global $divisionData;
    foreach ($divisionData as $data) {
        echo "<option value=" . $data["id"] . ">";
        echo $data["bn_name"];
        echo "</option>";
    }
}

function roleSelection() {
    global $grpData;
    foreach ($grpData as $data) {
        echo "<option value=" . $data["id"] . ">";
        echo $data["Role"];
        echo "</option>";
    }
}
?>


<div class="row">
    <div class="col-lg-3">
        <form class="reg-box" action="add.php" method="POST">
            <div class="py-2 text-center">
                <h4 class="text-dark">
                    Add new User Information
                </h4>
            </div>
            <div class="form-group py-3">
                <input type="text" class="form-control" name="name" placeholder="Enter name" required="">
            </div>
            <div class="form-group pb-3">
                <input type="email" class="form-control" name="email" placeholder="Enter email" required="">
            </div>
            <div class="form-group pb-3">
                <input type="text" class="form-control" name="username" placeholder="Enter username" required="">
            </div>
            <div class="form-control d-flex justify-content-between mb-3">
                <label for="group" class="text-muted">Select Group</label>
                <select id="group" name="group">
                    <option> chosse role</option>
                    <?php roleSelection(); ?>
                </select>
            </div>
            <div class="form-control d-flex justify-content-between">
                <label for="division" class="text-muted">Division</label>
                <select id="division" name="division">
                    <option> chosse Division</option>
                    <?php divisionOption(); ?>
                </select>
            </div>
            <div class="form-control d-flex justify-content-between my-3">
                <label for="district" class="text-muted">District</label>
                <select id="district" name="district">
                    <option> chosse District</option>
                </select>
            </div>
            <div class="form-control d-flex justify-content-between mb-3">
                <label for="upazila" class="text-muted">Upazila</label>
                <select id="upazila" name="upazila">
                    <option > chosse Upazila</option>
                </select>
            </div>
            <div class="form-control d-flex justify-content-between">
                <label for="union" class="text-muted">Union</label>
                <select id="union" name="union">
                    <option > chosse Union</option>
                </select>
            </div>
            <div class="form-group py-3">
                <input type="password" class="form-control" name="password" placeholder="Enter password" required="">
            </div>
            <div class="form-group pt-2 text-center">
                <input class="my-btn" type="submit" name="submit_form" class="btn btn-primary" value="Submit">
            </div>
        </form>
    </div>
</div>


<script>

    const division = document.getElementById("division");
    const district = document.getElementById("district");
    const upazila = document.getElementById("upazila");
    const union = document.getElementById("union");



    //Division to District
    division.addEventListener("change", function (event) {
        event.preventDefault();
        const valueId = division.value;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                district.innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "AjaxFile/gethint.php?div=" + valueId, true);
        xmlhttp.send();
    });

    //District to Upazila
    district.addEventListener("change", function (event) {
        event.preventDefault();

        const valueId = district.value;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                upazila.innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "AjaxFile/gethint.php?dis=" + valueId, true);
        xmlhttp.send();
    });

    //Upazila to Union
    upazila.addEventListener("change", function (event) {
        event.preventDefault();
        const valueId = upazila.value;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                union.innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "AjaxFile/gethint.php?upaz=" + valueId, true);
        xmlhttp.send();
    });

//    Union


</script>
