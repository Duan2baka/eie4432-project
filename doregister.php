<?php
    session_start();
    include "mysql_connect.php";
    $username = $_POST['username']?$_POST['username']:'';
    $password = $_POST['password']?$_POST['password']:'';
    $link = mysqli_connect($server, $user, $pw, $db);
    if(!$link) {
        die("Connection failed: " . mysqli_connect_error());
    }
    mysqli_set_charset($link,'utf8');
    $sql = "select * from password where userName='".$username."'";
    $res = mysqli_query($link,$sql);
    $result = mysqli_fetch_assoc($res);
    if(mysqli_num_rows($res) == 0){
        $sql = "select * from password";
        $res = mysqli_query($link,$sql);
        $result = mysqli_fetch_assoc($res);
        $id = mysqli_num_rows($res) + 10000;
        $sql = "insert into password values ('" . $id . "', '" . $username . "', '" . $password . "', '" . 0 . "');";
        $res = mysqli_query($link,$sql);
        mysqli_close($link);
        header("Location: index.php");
    }
    else{
        mysqli_close($link);
        header("Location: register.php");
    }
?>