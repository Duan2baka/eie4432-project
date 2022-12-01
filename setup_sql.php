<?php
    $server = "localhost";
    $user = "root";
    $pw = "";
    $db = "lostandfound";

    $connect=mysqli_connect($server, $user, $pw, $db);
    $createAccount="GRANT ALL PRIVILEGES ON test.* TO 'admin'@'localhost' IDENTIFIED BY 'adminpass' WITH GRANT OPTION";
    $result = mysqli_query($connect, $createAccount);
?>