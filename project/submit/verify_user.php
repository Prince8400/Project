<?php
    session_start();
    require_once('../inc/connection.php');
    //var_dump($_POST);
    extract($_POST);
    $sql='select id,password from user where email=?';
    $cmd=$db->prepare($sql);
    $cmd->bindParam(1,$email);
    $cmd->execute();
    $table=$cmd->fetchAll();
    if(sizeof($table)==0)
    {
       // var_dump($_POST);
        $message="Invalid Login Attempt";
       header("location:../index.php?error=$message");
    }
    else{
        $HashedPassword= $table[0]['password'];
        echo "user given password = $password and Hashed password = $HashedPassword";
        if(password_verify($password,$HashedPassword)==true)
        {
            $_SESSION['userid']=$table[0]['id'];
            $message="login succesfuly";
            header("location:../lecture.php?success=$message");

        }
        else{
            $message = "invalid login attempt";
            header("location:../index.php?error=$message");
        }
    }


?>