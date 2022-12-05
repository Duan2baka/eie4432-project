<?php
    session_start();
    include "mysql_connect.php";
    $username = isset($_POST['username'])?$_POST['username']:'';
    $password = isset($_POST['password'])?$_POST['password']:-1;
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
        if (isset($_POST['checkbox']) && $_POST['checkbox'] == 'remember-me') {
            setcookie("username", $username, time() + (60 * 60 * 24));
            setcookie("password", $password , time() + (60 * 60 * 24));
        }
        header("Location: index.php");
    }else{
        header("Location: login.php");
    }
?>