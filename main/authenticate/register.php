<?php
session_start();
if (isset($_SESSION["username"]) && isset($_SESSION["user_id"])){
	include "../../templates/logged_in_as.php";
	exit();
}

else if(isset ($_POST['register-btn'])){
	$username = trim($_POST["username"]);
	$email = trim($_POST["email"]);
	$password = trim($_POST["password"]);
	require_once "../../config/connection.php";
	//$query = "INSERT INTO users ( ";
	$queryemail = "SELECT * FROM users WHERE email_address = '$email'";
	$dataemail = mysqli_query($dbs, $queryemail) or die("Error fetching data!");
	$queryusername = "SELECT * FROM users WHERE username = '$username'";
	$datausername = mysqli_query($dbs, $queryusername) or die("Error fetching data!");
	if (mysqli_num_rows($datausername) == 1 || mysqli_num_rows($dataemail) == 1){
		//check if either username or email exist
		if (mysqli_num_rows($datausername) == 1 && mysqli_num_rows($dataemail) != 1){
			//if username exist and email doesn,t 
			echo '<script>alert("Username already exist!")</script>';}
		else if (mysqli_num_rows($datausername) != 1 && mysqli_num_rows($dataemail) == 1){
			echo '<script>alert("Email already exist!")</script>';}
		else if (mysqli_num_rows($datausername) == 1 && mysqli_num_rows($dataemail) == 1){
			echo '<script>alert("Username and email already exist!")</script>';}	
	}else{//email and username doesn't exist. register the user
		$queryinsert = "INSERT INTO users (username, email_address, password) VALUES ('$username', '$email', SHA('$password'))";
		mysqli_query ($dbs, $queryinsert) or die ("Error creating user");
		header("Location: login.php");
		echo '<script>alert("Registration successfull, please log in to your account");</script>';
	}
};
$page_title = "Mismatch Register";
include_once "login-header.php";?>

<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src="../../gallery/30.jpg" alt="bootstrap 4 login page">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Register</h4>
							<form method="POST" action="register.php" class="my-login-validation" novalidate="">
								<div class="form-gro up">
									<label for="name">Username</label>
									<input id="name" type="text" class="form-control" name="username" required autofocus>
									<div class="invalid-feedback">
										Enter a username
									</div>
								</div>

								<div class="form-group">
									<label for="email">E-Mail Address</label>
									<input id="email" type="email" class="form-control" name="email" required>
									<div class="invalid-feedback">
										Your email is invalid
									</div>
								</div>

								<div class="form-group">
									<label for="password">Password</label>
									<input id="password" type="password" class="form-control" name="password" required data-eye>
									<div class="invalid-feedback">
										Password is required
									</div>
								</div>

								<div class="form-group">
									<div class="custom-checkbox custom-control">
										<input type="checkbox" name="agree" id="agree" class="custom-control-input" required="">
										<label for="agree" class="custom-control-label">I agree to the <a href="#">Terms and Conditions</a></label>
										<div class="invalid-feedback">
											You must agree with our Terms and Conditions
										</div>
									</div>
								</div>

								<div class="form-group m-0">
									<button type="submit" id="register-btn" name="register-btn" class="btn btn-primary btn-block">
										Register
									</button>
								</div>
								<div class="mt-4 text-center">
									Already have an account? <a href="login.php">Login</a>
								</div>
							</form>
						</div>
					</div>

	<?php include_once "login-footer.php";?>