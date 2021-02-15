<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if ($_SESSION["UserName"]) {
//session start if true then go..

    $title = "Add New";
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
                    <?php
                    include_once 'form.php';
                    ?>
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

