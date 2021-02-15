
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if ($_SESSION["UserName"]) {
//session start if true then go..

    $title = "Home";
    $titleMessage = "OOP CURD";
    include_once 'header.php';
    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2">
                <?php
                include_once 'navbar.php';
                ?>
            </div>
            <div class="col-lg-10">
                <div class="container py-5">
                    <?php
                    include_once 'message.php';
                    ?>
                </div>
                
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


