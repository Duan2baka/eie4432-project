<?php
    session_start(); 
    if (!isset($_SESSION['islogin'])){
        header("Location: /message_page/request_login.php");
    }
    include "mysql_connect.php";
    $link = mysqli_connect($server, $user, $pw, $db);
    if(!$link) {
        die("Connection failed: " . mysqli_connect_error());
    }
    mysqli_set_charset($link,'utf8');
    $sql = "select * from item";
    $res = mysqli_query($link,$sql);
    $result = mysqli_fetch_assoc($res);
    $itemID = mysqli_num_rows($res) + 10000;
    $userID = $_SESSION['id'];
    $type = $_POST['type'];
    $sql = "insert into item values ('" . $itemID . "', '" . $_POST['type'] . "', '0', NOW(), '" . $userID . "', '" . $_POST['place'] . "', '" . $_POST['description'] . "', '" . $_POST['name'] . "','" . $_POST['date'] . "');";
    mysqli_query($link,$sql);
?>