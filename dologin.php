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
 
    mysqli_close($link);
    if($result['password'] == $password){
        $_SESSION['username'] = $username;
        $_SESSION['id'] = $result['userID'];
        $_SESSION['role'] = $result['role'];
        $_SESSION['islogin'] = 1;
        header("Location: index.php");
    }else{
        header("Location: login.php");
    }
?>