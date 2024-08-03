<?php
    session_start();
    session_destroy();
    $msg="LOGOUT SUCCESSFULY";
    header("location:index.php?success=$msg");

?>