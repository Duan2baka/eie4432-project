<?php
    session_start(); 
?>
<!DOCTYPE html>
<html>
    <?php
        include "../mysql_connect.php";
        $link = mysqli_connect($server, $user, $pw, $db);
        if(!$link) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "select * from item where itemID = " . $_GET['itemid'] . ";";
        $res = mysqli_query($link,$sql);
        $result = mysqli_fetch_assoc($res);
        echo '<p>' . $result['name'] . '</p>';
        echo '<p>Item description:' . $result['description'] . '</p>';
        echo '<p>Type:' . ($result['type'] == 0 ? 'lost item' : 'missing item') . '</p>';
        echo '<p>Find place:' . $result['place'] . '</p>';
        echo '<p>Find date:' . $result['findDate'] . '</p>';
        echo '<p>Availablity:' . ($result['status'] == '0' ? 'yes': 'no' ). '</p>';
    ?>
</html>