<?php 
$page_title = "Mismatch Login";
include_once "login-header.php";?>

<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src="../../gallery/15.jpg" alt="logo">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">You are logged in as <?php echo $_SESSION["username"];?></h4>
							
								<div class="form-group m-0">
									<a href= "../index.php"><button type="submit" class="btn btn-primary btn-block" id = "proceed-to-mismatch" name = "go-to-home">
										Proceed to Mismatch
									</button></a>
								</div>
                                <div class="mt-4 text-center">
									Not <?php echo $_SESSION["username"];?>? <a href="../logout.php">Log in</a>
								</div>
								<div class="mt-4 text-center">
									Don't have an account? <a href="../logout.php">Create One</a>
								</div>
							</form>
						</div>
					</div>

<?php include_once "login-footer.php";?>