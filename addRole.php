<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if ($_SESSION["UserName"]) {
//session start if true then go..


include_once 'Class/RoleManagment.php';
$roleMange = new RoleManagment();

if(isset($_POST["submit_role"])){
    $roleMange->insertRole($_POST);
}

    $title = "Add New Role";
    include_once 'header.php';
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
                    <form class="box-Add-rol" action="addRole.php" method="POST">
                        <div class="py-2 text-center">
                            <h4 class="text-dark">
                                Add new Role
                            </h4>
                        </div>
                        <div class="form-group py-3">
                            <input type="text" class="form-control" name="role" placeholder="Enter Role" required="">
                        </div>
                        <div class="form-group pt-2 text-center">
                            <input class="my-btn" type="submit" name="submit_role" class="btn btn-primary" value="Submit">
                        </div>
                    </form>
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


