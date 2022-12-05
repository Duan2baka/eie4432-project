<?php
    session_start(); 
    $userid = '';
    if(isset($_GET['userid'])) $userid=$_GET['userid'];
    else if(isset($_SESSION['id'])) $userid=$_SESSION['id'];
    else header("Location: ../message_page/errorpage.html");
    include "../mysql_connect.php";
    $link = mysqli_connect($server, $user, $pw, $db);
    if(!$link) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "select * from password where userID = " .  $userid . ";";
    $res = mysqli_query($link,$sql);
    $result = mysqli_fetch_assoc($res);
    $userName = $result['userName'];
    $role = ($result['role'] == '1' ? 'admin' : 'normal user');
?>
<!DOCTYPE html>
<html>
    <head>
        <?php
            echo '<title>'. $userName .'</title>';
        ?>
    </head>
    <body>
        <?php
            echo $userName;
        ?>

    </body>
</html>