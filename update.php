<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if ($_SESSION["UserName"]) {
//session start if true then go..

    include_once 'Class/RoleManagment.php';
    $grp = new RoleManagment();
    $grpData = $grp->display();


    $title = "Update";
    $titleMessage = "Updated Data";
    include_once 'header.php';
    include_once 'Class/Customer.php';
    $customers = new Customer();
//Update Data
    if (isset($_GET["editId"]) && !empty($_GET["editId"])) {
        $id = $_GET["editId"];
        $data = $customers->displaybyId($id);
    }

    if (isset($_POST["submit_Update"])) {
        $customers->update_Data($_POST);
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

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2" style="padding-right: 0">
                <?php
                include_once 'navbar.php';
                ?>
            </div>
            <div class="col-lg-10" style="padding-left: 0">

                <section>

                    <div class="row">
                        <div class="col-lg-3">
                            <form class="update-box" action="update.php" method="POST">
                                <div class="py-2 text-center">
                                    <h3 class="text-dark">
                                        Updated Information
                                    </h3>
                                </div>
                                <div class="py-2 text-center">
                                    <h2 class="py-2">
                                        <a href="viewRecord.php" class="btn btn-dark">View Record</a>
                                    </h2>
                                </div>
                                <?php
                                foreach ($data as $row) {
                                    ?>
                                    <input
                                        type="hidden"
                                        name ="id"
                                        value="<?php echo $row['Id']; ?>"
                                        />
                                    <div class="form-group py-3">
                                        <input type="text" class="form-control" name="name" value="<?php echo $row['Name']; ?>" placeholder="Enter name" required="">
                                    </div>
                                    <div class="form-group pb-3">
                                        <input type="email" class="form-control" name="email" value="<?php echo $row['Email']; ?>" placeholder="Enter email" required="">
                                    </div>
                                    <div class="form-group pb-3">
                                        <input type="text" class="form-control" name="username" value="<?php echo $row['Username']; ?>" placeholder="Enter username" required="">
                                    </div>
                                    <div class="form-control d-flex justify-content-between mb-3">
                                        <label for="group" class="text-muted">Select Group</label>
                                        <select id="group" name="group">
                                            <option> chosse role</option>
                                            <?php roleSelection(); ?>
                                        </select>
                                    </div>
                                    <div class="form-group pb-3">
                                        <input type="password" class="form-control" name="password" placeholder="Enter password" required="">
                                    </div>
                                    <div class="form-group pt-2 text-center">
                                        <input class="my-btn" type="submit" name="submit_Update" class="btn btn-primary" value="Submit">
                                    </div>
                                    <?php
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </section>
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
