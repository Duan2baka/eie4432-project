<?php
    session_start(); 
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Find my stuff</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <script src="https://code.jquery.com/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <?php
            $_SESSION['status'] = "report";
            if (isset($_SESSION['islogin'])){
                echo "<h1>Hi! " . $_SESSION['username'] . "</h1>";
                echo "<div><button class=\"button\" onclick=\"javascript:window.location.href='/post.php'\">Post new thread</button></div>";
            }
            else{
                echo "<p><a href='/login.php'>login</a> to post a new thread</p>";
            }
        ?>

    </body>
</html>