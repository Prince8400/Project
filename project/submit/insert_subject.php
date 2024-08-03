<?php
     require_once('../inc/verify_login.php');
     require_once('../inc/verify_input.php');
    require_once('../inc/connection.php');
    $sql='insert into subject(courseid,subject,rate) values(?,?,?)';

    $cmd =$db->prepare($sql);
    extract($_POST);
    $data= array($courseid,$subject,$rate);
    $cmd->execute($data);
    $msg='subject Added Succesfully';
    header("location:../subject.php?success=$msg");
    ?>