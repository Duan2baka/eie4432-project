<?php
    session_start(); 
?>
<!DOCTYPE html>
<html>
    <head>
        <title>View all posts</title>
    </head>
    <body>
        <?php
            include "../mysql_connect.php";
            $link = mysqli_connect($server, $user, $pw, $db);
            if(!$link) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $sql = "select * from item";
            $res = mysqli_query($link,$sql);
            while($row = mysqli_fetch_assoc($res) ) {
                echo "<p><a href='/view/viewpost.php?itemid=" . $row['itemID'] . "'>". $row['name'] ."</a></p>";
                echo "<p>" . $row['description'] . "</p>";
            }
        ?>
    </body>
</html>