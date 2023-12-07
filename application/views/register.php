<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title>Register - Mkkirana</title>
	<?php include("includes/head.php") ?>
</head>

<body>
	<!-- Preloder -->
	<?php include("includes/preloader.php") ?>
	<!-- Preloder End -->

	<!-- back to to button start-->
	<a href="#" id="scroll-top" class="back-to-top-btn"><i class='bx bx-up-arrow-alt'></i></a>
	<!-- back to to button end-->

	<!-- Header area -->
	<?php include("includes/navbar.php") ?>
	<!-- Header area end -->

	<main>
		<!-- Login Form Area -->
		<!-- <section class="login-area-wrap mt-100"> -->
		<section class="login-area-wrap">
			<div class="container">
				<div class="row mt-50">
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 both-small-50 mx-auto">
						<div class="sign-wrap">
							<div class="login-content-title text-center mb-4">
								<h4 class=" fs-5">Customer Signup</h4>
							</div>
							<form id="signup_form" action="" method="POST" class="contat-input">
								<div class="row">
									<div class="col-xl-12 col-lg-12 col-sm-12 col-12">
										<label class="form-check-label form-check-label-first">Your Name*</label>
										<input type="text" name="name" id="user_name">
									</div>
									<div class="col-xl-12 col-lg-12 col-sm-12 col-12">
										<label class="form-check-label">Phone Number:</label>
										<input type="text" onkeypress="return isNumberKey(event)" maxlength="10" name="phone" id="user_mobile">
									</div>

									<div class="col-xl-12 col-lg-12 col-sm-12 col-12">
										<label class="form-check-label">Password:</label>
										<input type="password" name="password" id="user_password" maxlength="30">
									</div>

									<div class="col-xl-12 col-lg-12 col-sm-12 col-12 mb-3">
										<label class="form-check-label">Confirm Password:</label>
										<input type="password" name="c_password" id="user_passwordre" maxlength="30">
									</div>

									<div class="details-page-reply-btn-wrap d-flex">
										<button type="submit" id="signup_btn" class="common-btn shop-details-review-btn">Signup</button>
										<div class=" ms-3 d-none" id="form-message">
										</div>
									</div>
								</div>
							</form>
						</div>

						<p class="text-start mt-4 black-text">Already have an Account ! <a href="login" class="color-text">Log In here</a></p>
					</div>
				</div>
			</div>
		</section>
		<!-- Login Form Area End -->
	</main>

	<!-- Footer Area -->
	<?php include("includes/footer.php") ?>
	<!-- Footer Area End -->

	<?php include("includes/script.php") ?>
	<script src="<?php echo base_url . 'assets/js/register.js'; ?>"></script>
</body>

</html>