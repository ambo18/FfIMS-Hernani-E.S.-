<?php 
	session_start(); 
	if(isset($_SESSION['username'])){
		header('Location: dashboard.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'templates/header.php' ?>
	<title>Fisher Folks Information Management System</title>
	<style>
		.wrapper-login {
			background-image: url("./assets/img/bglogin.jpg");
			background-color: #cccccc;
			height: 500px;
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;
			position: relative;
		}

		.container-fluid {
			padding: 0;
		}

		.card-size {
			height: 500px;
			width: 520px;
			margin-left: 330px;
		}
		
		.login .wrapper.wrapper-login{
			justify-content: left;
			align-items: left;
		}

		.fw-bold{
			font-size: 35px;
		}

		.font-size-big{
			font-size: 18px;
			
		}

		.bg-seagreen {
			background-color: lightseagreen !important;
			border-color: lightseagreen !important;
		}

		.text-seagreen {
			color: lightseagreen !important;
		}

		.btn-dark:hover {
			background-color: #707070;
		}
	</style>
</head>
<?php include 'templates/loading_screen.php' ?>
<body class="login">
	<nav class="navbar navbar-expand-lg navbar-light bg-dark">
		<a class="navbar-brand" href="#">Fisher Folks IMS</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active">
					<a class="nav-link" href="login.php">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="about.php">About</a>
				</li>
			</ul>
		</div>
	</nav>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="wrapper wrapper-login">				
					
					<section class="vh-100">
						<div class="container py-5 h-100">
							<div class="row d-flex justify-content-center align-items-center h-100">
								<div class="col col-xl-10">
									<div class="card card-size" style="border-radius: 1rem;">
										<div class="row g-0">
											<div class="col-md-12  d-flex align-items-center">
												<div class="card-body p-4 p-lg-5 text-black">
													<form method="POST" action="model/login.php">
														<!-- login as member -->
														<div class="mb-3 pb-1 text-center">
															<span class="h1 fw-bold mb-0 ">Fisher Folks Information Management System</span>
														</div>
														<?php if(isset($_SESSION['message'])): ?>
															<span class="text-<?= $_SESSION['success']; ?>" >
																<h4>
																	<?= $_SESSION['message']; ?>
																</h4>	
															</span>
														<?php unset($_SESSION['message']); ?>
														<?php endif ?>
														<div class="form-outline mb-4 mt-4">
															<input name="username" class="form-control form-control-lg" required/>
															<label class="form-label" for="username">Username</label>
														</div>
														<div class="form-outline mb-4">
															<input type="password" name="password" class="form-control form-control-lg" required/>
															<label class="form-label" for="password">Password</label>
														</div>
														<div class="pt-1 mb-4">
															<button type="submit" class="btn btn-dark btn-lg btn-block mb-3 font-size-big">Log In</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>
	<?php include 'templates/footer.php' ?>
</body>
</html>