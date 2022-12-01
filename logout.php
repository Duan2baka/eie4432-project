<?php
    session_start(); 
    setcookie("username", "Tom", time() - 3600);
    setcookie("password", "123", time() - 3600);
    session_destroy();
    header("Location: index.php");
?>