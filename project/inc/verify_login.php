<?php
    session_start();
    if(isset($_SESSION['userid'])==false){
        header('location:index.php?error=you need to login first');
    }
?>