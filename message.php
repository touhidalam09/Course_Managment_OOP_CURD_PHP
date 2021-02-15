<?php

if (isset($_GET['msg1']) == "insert") {
    echo "<div class='alert alert-success'>
              Your Registration added successfully
            </div>";
}
if (isset($_GET['msg2']) == "update") {
    echo "<div class='alert alert-warning'>
              Your Registration updated successfully
            </div>";
}
if (isset($_GET['deleteId']) == "delete") {
    echo "<div class='alert alert-danger'>
              Record deleted successfully
            </div>";
}
if (isset($_GET['msg3']) == "delete") {
    echo "<div class='alert alert-danger'>
              Record deleted successfully
            </div>";
}
if (isset($_GET['msg4']) == "nodata") {
    echo "<div class='alert alert-info'>
              No Data Available
            </div>";
}
if (isset($_GET['msg5']) == "invalid") {
    echo "<div class='alert alert-warning'>
              Invalid Username or Password
            </div>";
}
if (isset($_GET['warning']) == "warning") {
    echo "<div class='alert alert-warning'>
              warning 
            </div>";
}
if (isset($_GET['duplicated']) == "duplicated") {
    echo "<div class='alert alert-warning'>
              Already Added!! 
            </div>";
}



