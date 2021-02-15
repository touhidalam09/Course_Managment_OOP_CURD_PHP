<?php
include_once 'Class/Login.php';

$title = "Login";
$titleMessage = "Login";
include_once 'header.php';

$login = new Login();
if (isset($_POST["login_submit"])) {

    $login->DisplayIDCheack($_POST);
}
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2">
            <?php
//            include_once 'navbar.php';
            ?>
        </div>
        <div class="col-lg-10">
            <div class="py-3">
                <?php
                include_once 'message.php';
                ?>
            </div>
            <div class="card box col-lg-4">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="username" name="username" required=""/>
                    </div>
                    <div class="form-group py-3">
                        <input type="password" class="form-control" placeholder="password" name="password" required=""/>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-success" name="login_submit" >login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>









<?php
include_once 'footer.php';
?>