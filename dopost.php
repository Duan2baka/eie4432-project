<?php
    session_start(); 
    if (!isset($_SESSION['islogin'])){
        header("Location: /message_page/request_login.html");
    }
    include "mysql_connect.php";
    $link = mysqli_connect($server, $user, $pw, $db);
    if(!$link) {
        die("Connection failed: " . mysqli_connect_error());
    }
    mysqli_set_charset($link,'utf8');
    $sql = "select * from item";
    $res = mysqli_query($link,$sql);
    $result = mysqli_fetch_assoc($res);
    $itemID = mysqli_num_rows($res) + 10000;
    $userID = $_SESSION['id'];
    $type = $_POST['type'];
    $sql = "insert into item values ('" . $itemID . "', '" . $_POST['type'] . "', '0', NOW(), '" . $userID . "', '" . $_POST['place'] . "', '" . $_POST['description'] . "', '" . $_POST['name'] . "','" . $_POST['date'] . "');";
    mysqli_query($link,$sql);
    $cnt = 0;
    if(isset($_FILES['myFile'])){
        $sql = "select * from itemimg";
        $res = mysqli_query($link,$sql);
        $result = mysqli_fetch_assoc($res);
        $imgID = mysqli_num_rows($res) + 10000;
        mysqli_query($link,$sql);
        for ($i = 0; $i < count($_FILES['myFile']['name']); $i ++){
            $array=$_FILES["myFile"]["type"][$i];
			$array=explode("/",$array);
			$newfilename=$imgID;
			$_FILES["myFile"]["name"][$i]=$newfilename.".".$array[1];
            if (!is_dir("upload/"))
				mkdir("upload/");
            if (!is_dir("upload/img/"))
				mkdir("upload/img/");
            if (!is_dir("upload/img/item/"))
				mkdir("upload/img/item/");
            $url = "upload/img/item/";

            $url=$url.$_FILES["myFile"]["name"][$i];
            move_uploaded_file($_FILES["myFile"]["tmp_name"][$i],$url);
            
            $sql = "insert into itemimg values ('". $imgID . "','" . $itemID . "','" . $url . "');";
            $res = mysqli_query($link,$sql);
            /********************可能需要验证 */
            $imgID = $imgID + 1;
        }
    }
    echo json_encode(array('success' => '1', 'url' => '/view/viewpost.php?itemid=' . $itemID));
?>