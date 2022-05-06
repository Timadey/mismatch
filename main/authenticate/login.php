<?php
session_start();
if (isset($_SESSION["username"]) && isset($_SESSION["user_id"])){
	include "../../templates/logged_in_as.php";
	exit();
}else if(isset($_COOKIE["username"]) && isset($_COOKIE["user_id"])) {
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
	
	if (mysqli_num_rows($data) == 1){
		echo "<script>alert('Login Successful')</script>";
		$row = mysqli_fetch_array($data);
		$_SESSION["username"] = $row["username"];
		$_SESSION["user_id"] = $row["user_id"];
		$_SESSION["required_profile"] = $row["required_profile"];
		// session_destroy();
		header("Location: ../index.php");
	}else if (mysqli_num_rows($data) == 0){
		echo "<script> alert ('Incorrect Login Details')</script>";
		unset($_POST['login']);
	}
}


$page_title = "Mismatch Login";
include_once "login-header.php";?>

<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src="../../gallery/20.jpg" alt="logo">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Login</h4>
							<form method="POST" action="login.php" class="my-login-validation" id="login-form" novalidate="">
								<div class="form-group">
									<label for="email">E-Mail Address</label>
									<input id="email" type="email" class="form-control" name="email" value="" required autofocus>
									<div class="invalid-feedback">
										Email is invalid
									</div>
								</div>

								<div class="form-group">
									<label for="password">Password
										<a href="forgot.php" class="float-right">
											Forgot Password?
										</a>
									</label>
									<input id="password" type="password" class="form-control" name="password" required data-eye>
								    <div class="invalid-feedback">
								    	Password is required
							    	</div>
								</div>

								<div class="form-group">
									<div class="custom-checkbox custom-control">
										<input type="checkbox" name="remember" id="remember" class="custom-control-input">
										<label for="remember" class="custom-control-label">Remember Me</label>
									</div>
								</div>

								<div class="form-group m-0">
									<button type="submit" class="btn btn-primary btn-block" id = "login-btn" name = "login">
										Login
									</button>
								</div>
								<div class="mt-4 text-center">
									Don't have an account? <a href="register.php">Create One</a>
								</div>
							</form>
						</div>
					</div>

<?php include_once "login-footer.php";?>