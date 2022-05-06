<?php
session_start();
if(isset($_COOKIE["username"]) && isset($_COOKIE["user_id"])) {
	$_SESSION["username"] = $_COOKIE["username"];
    $_SESSION["user_id"] = $_COOKIE["user_id"];
	include "../../templates/logged_in_as.php";
	exit();

}else if (isset($_POST["login"])){
	$login_email = trim($_POST["email"]);
	$login_password = trim($_POST["password"]);
	require_once "../../config/connection.php";
	$query = "SELECT * FROM users WHERE email_address = '$login_email' AND password = SHA('$login_password')";
	$data = mysqli_query($dbs, $query) or die("Error fetching data!");
	$status = 0;
	if (mysqli_num_rows($data) == 1){
		$status = 1;
		json_encode($status);
		echo "<script>alert('Login Successful')</script>";
		$row = mysqli_fetch_array($data);
		$_SESSION["username"] = $row["username"];
		$_SESSION["user_id"] = $row["user_id"];

		//header("Location: ../index.php");
        json_encode($status);
	}else{
		json_encode($status);
		//header("Location: login.php");
	}
}

?>