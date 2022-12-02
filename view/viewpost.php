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
        echo '<p>Type:' . ($result['type'] == 0 ? 'found item' : 'lost item') . '</p>';
        echo '<p>Found/Lost place:' . $result['place'] . '</p>';
        echo '<p>Found/Lost date:' . $result['findDate'] . '</p>';
        echo '<p>Availablity:' . ($result['status'] == '0' ? 'yes': 'no' ). '</p>';
        $sql = "select * from itemimg where itemID = " . $_GET['itemid'] . ";";
        $res = mysqli_query($link,$sql);
        $flag = 0;
        while($row = mysqli_fetch_assoc($res)) {
            if($flag == 0){
                $flag = 1;
                echo "<p>Image of the item:</p>";
            }
            echo "<p><img src='../" . $row['url'] . "' style='max-width: 500px;'/></p>";
        }
    ?>
</html>