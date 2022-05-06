<?php
session_start();
if (!isset($_SESSION["username"]) && !isset($_SESSION["user_id"])){
    header("Location: ./authenticate/login.php");
    exit();
}
if (isset($_SESSION["username"]) && isset($_SESSION["user_id"])){
    $_SESSION = array();
    session_destroy(); 
}
if(isset($_COOKIE["username"]) && (isset($_COOKIE["user_id"]))){
    setcookie(session_name(), "", time()-3600);
    setcookie("username", "", time()-3600);
    setcookie("user_id", "", time()-3600);
    setcookie("required_profile", "", time()-3600);
}



?>