<?php
    session_start(); 
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Lost and Found system</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/css/global.css">
        <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
        
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    </head>

    <!------------navigation bar----------->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Lost and Found</a>
            </div>
            <div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="/view/viewall.php">View all posts</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            View <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="/view/viewall.php">View all posts</a></li>
                            <li><a href="/view/viewlostpost.php">View lost posts</a></li>
                            <li><a href="/view/viewfoundpost.php">View found posts</a></li>
                            <li class="divider"></li>
                            <li><a href="#">View my posts</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <?php
                if (!isset($_SESSION['islogin'])){
            ?>
                    <ul class="nav navbar-nav navbar-right"> 
                        <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Register</a></li> 
                        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li> 
                    </ul> 
            <?php
                }
                else{
            ?>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <?php echo $_SESSION['username'];?> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Profile</a></li>
                            <li><a href="#">Message</a></li>
                            <li class="divider"></li>
                            <li><a href="#">View all my post</a></li>
                            <li><a href="#">View my lost post</a></li>
                            <li><a href="#">View my found post</a></li>
                            <li class="divider"></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>

            <?php
                }
            ?>
        </div>
    </nav>
    
    <!------------navigation bar end----------->

    <body>


    <main role="main">

    <section class="jumbotron text-center">
    <div class="container">
        <?php
                if (isset($_SESSION['islogin'])){
                    echo "<h1 class='jumbotron-heading'>Hi! " . $_SESSION['username'] . "</h1>";
                    ?>
                    <p class="lead text-muted">Welcome back to the lost & found website!</p>
                    <p><a href="/user/profile.php" class="btn btn-primary my-2">My homepage</a>
                    <a href="logout.php" class="btn btn-secondary my-2">Logout</a></p>
            <?php
                }
                else{
                    ?>
                    <h1 class='jumbotron-heading'>Please login first!</h1>
                    <p class="lead text-muted">Welcome to the lost & found website!</p>
                    <p>
                    <a href="login.php" class="btn btn-primary my-2">Login</a>
                    <a href="register.php" class="btn btn-secondary my-2">Register</a>
                    </p>
                    
                    <?php
                }
            ?>
    </div>
    </section>
    </main>
    

    </body>
</html>