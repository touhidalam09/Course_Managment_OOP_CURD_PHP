
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if ($_SESSION["UserName"]) {
//session start if true then go..

    $title = "View Record";
    include_once 'header.php';


    include_once 'Class/Customer.php';
    $customers = new Customer();

//Delete Data
    if (!empty($_GET["deleteId"]) && isset($_GET["deleteId"])) {
        $id = $_GET["deleteId"];
        $customers->destroy($id);
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
                                include_once 'display.php';
                                ?>
                            </section>

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


