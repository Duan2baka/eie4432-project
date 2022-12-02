<?php
    session_start(); 
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Lost and Found system</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

        <style>
            .button {
              border: none;
              color: rgb(0, 0, 0);
              padding: 15px 32px;
              text-align: center;
              text-decoration: none;
              display: inline-block;
              font-size: 16px;
              margin: 4px 2px;
              cursor: pointer;
            }
            
            .button1 {background-color: #4CAF50;} /* Green */
            .button2 {background-color: #008CBA;} /* Blue */
        </style>
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <script src="https://code.jquery.com/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <?php
            if (isset($_SESSION['islogin'])){
                echo "<h1>Hi! " . $_SESSION['username'] . "</h1>";
                echo "<div><button class=\"button\" onclick=\"javascript:window.location.href='/logout.php'\">Logout</button></div>";
                echo "<div><button class=\"button\" onclick=\"javascript:window.location.href='/report.php'\">Report Lost Item</button></div>";
                echo "<div><button class=\"button\" onclick=\"javascript:window.location.href='/find.php'\">Find My Item</button></div>";
            }
            else{
                echo "<h1>Hi! Please login first!</h1>";
                echo "<div><button class=\"button\" onclick=\"javascript:window.location.href='/login.php'\">Login</button></div>";
                echo "<div><button class=\"button\" onclick=\"javascript:window.location.href='/register.php'\">Sign up</button></div>";
            }
            echo "<div><button class=\"button\" onclick=\"javascript:window.location.href='/view/viewall.php'\">View all posts</button></div>";
        ?>
    </body>
</html>