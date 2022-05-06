<?php
session_start();
if (!isset($_SESSION["username"]) && !isset($_SESSION["user_id"])){
    if (isset($_COOKIE["username"]) && (isset($_COOKIE["user_id"]))){
        $_SESSION["username"] = $_COOKIE["username"];
        $_SESSION["user_id"] = $_COOKIE["user_id"];
        $_SESSION["required_profile"] = $_COOKIE["required_profile"];
    }else{
        header("Location: ./authenticate/login.php");
        exit(); 
    }
}else{
    if(!isset($_COOKIE["username"]) && (!isset($_COOKIE["user_id"]))){
        setcookie("username", $_SESSION["username"], time()+(60*60*24*2));
		setcookie("user_id", $_SESSION["user_id"], time()+(60*60*24*2));
        setcookie("required_profile", $_SESSION["required_profile"], time()+(60*60*24*2));
    }
}
?>