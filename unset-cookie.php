<?php
    setcookie("username", "Tom", time() - 3600);
    setcookie("password", "123", time() - 3600);
    header("Location: index.php");
?>