<?php
    session_start(); 
    if (isset($_SESSION['islogin'])){
        header("Location: /message_page/already_login.html");
    }
    if (isset($_COOKIE["username"])) {
        include "mysql_connect.php";
        $username = $_COOKIE["username"];
        $password = $_COOKIE["password"];
        $link = mysqli_connect($server, $user, $pw, $db);
        if(!$link) {
            die("Connection failed: " . mysqli_connect_error());
        }
        mysqli_set_charset($link,'utf8');
        $sql = "select * from password where userName='".$username."'";
        $res = mysqli_query($link,$sql);
        $result = mysqli_fetch_assoc($res);
    
        mysqli_close($link);
        if($result['password'] == $password){
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $result['userID'];
            $_SESSION['role'] = $result['role'];
            $_SESSION['islogin'] = 1;
            if (isset($_POST['checkbox']) && $_POST['checkbox'] == 'remember-me') {
                setcookie("username", $username, time() + (60 * 60 * 24));
                setcookie("password", $password , time() + (60 * 60 * 24));
            }
            header("Location: index.php");
        }else{
            header("Location: login.php");
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/css/global.css">
        <link rel="stylesheet" href="/css/signin.css">
        <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
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
                            Java <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">jmeter</a></li>
                            <li><a href="#">EJB</a></li>
                            <li><a href="#">Jasper Report</a></li>
                            <li class="divider"></li>
                            <li><a href="#">分离的链接</a></li>
                            <li class="divider"></li>
                            <li><a href="#">另一个分离的链接</a></li>
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

    <body class="text-center">
    <form class="form-signin" action='dologin.php' method='post'>
      <img class="mb-4" src="/img/lostandfound.jpg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputUsername" class="sr-only">Username</label>
      <input type="text" id="inputUsername" class="form-control" name='username' placeholder="Username" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" name='password' placeholder="Password" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" name='checkbox' value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>
  </body>
</html>