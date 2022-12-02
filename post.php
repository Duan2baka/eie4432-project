<?php
    session_start(); 
    if (!isset($_SESSION['islogin'])){
        header("Location: /message_page/request_login.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Post new item</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <style>
            .td_text {
                text-align: right;
            }
        </style>
    </head>
    <body>
        <script src="https://code.jquery.com/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <?php
            echo "<form action = 'dopost.php' method = 'post'><table>";
            echo "<tr><td class='td_text'>Item name:</td><td><input type=\"text\" name='name'/></td></tr>";
            echo "<tr><td class='td_text'>Find place:</td><td><input type=\"text\" name='place'/></td></tr>";
            echo "<tr><td class='td_text'>Description:</td><td><textarea name='description'></textarea></td></tr>";
            echo "<tr><td class='td_text'>Post type:</td>";
            echo "<td><select id=\"type\" name=\"type\">";
            if ($_SESSION['status'] === "find")
                echo "<option value=\"report\">Report</option><option value=\"0\" selected>Find</option>";
            else
                echo "<option value=\"report\" selected>Report</option><option value=\"1\">Find</option>";
            echo "</select></td></r>";
            echo "<tr><td class='td_text'>Find/Lost date:</td>";
            echo "<td><input name='date' type='date'/></td></tr>";
            echo "<tr><td><input type='submit' value='Submit'/></td></tr>";
            echo "</table></form>";
        ?>
    </body>
</html>