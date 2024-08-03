<?php
 require_once('../inc/verify_login.php');
 require_once('../inc/verify_input.php');
 //var_dump($_POST);
 require_once("../inc/connection.php");
extract($_POST);
$sql="INSERT INTO  lecture (   batchid ,  subjectid ,  teacherid ,  duration ,  amount ,  lecturedate ) VALUES (:batchid,:subjectid, :teacherid, :duration,:amount,:lecturedate)";
$cmd = $db->prepare($sql);
$data = array(":teacherid"=>$teacherid, ":subjectid"=> $subjectid, ":batchid"=> $batchid, ":amount"=> $amount, ":duration"=> $duration, ":lecturedate"=> $lecturedate);

$cmd->execute($data);
$msg = "lecture added successfully";
header("location:../lecture.php?success=$msg");

?>