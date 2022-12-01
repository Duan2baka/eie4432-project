<?php
    session_start(); 
    if (isset($_SESSION['islogin'])){
        header("Location: /message_page/already_login.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
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
        
        <form action="doregister.php" method="post">
            username:<input type="text" name="username"/><br/>
            password:<input type="password" name="password" /><br/>
            confirm password:<input type="password" name="password" />
            <input type="submit" value="Submit"/>
        </form>
    </body>
</html>