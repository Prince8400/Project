<?php 
    require_once('../inc/verify_login.php');
    require_once('../inc/verify_input.php');
    //check do we get all input or not
    require_once("../inc/connection.php");
    $sql = 'insert into batch(courseid,startdate,enddate,classtime) values(?,?,?,?)';

    //query prepare
    $cmd = $db->prepare($sql);

    //bind placeholder with variables 
    $cmd->bindParam(1,$_POST['courseid']);
    $cmd->bindParam(2,$_POST['startdate']);
    $cmd->bindParam(3,$_POST['enddate']);
    $cmd->bindParam(4,$_POST['classtime']);

    //query run
    $cmd->execute();
    $msg = "Batch inserted";
    header("location:../batch.php?success=$msg");
?>
