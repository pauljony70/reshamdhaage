<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title>Login - Mkkirana</title>
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
		<section class="login-area-wrap">
			<div class="container">
				<div class="row mt-50">
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mx-auto">
						<div class="login-wrap">
							<div class="login-content-title text-center mb-4">
								<h4 class=" fs-5">Customer Login</h4>
							</div>

							<form id="contact-form" action="" method="POST" class="contat-input">
								<div class="col-xl-12 col-lg-12 col-sm-12 col-12">
									<label class="form-check-label form-check-label-first">Your Mobile*</label>
									<input type="text" name="user_mobile" id="user_mobile" maxlength="10" onkeypress="return isNumberKey(event)" required>
								</div>

								<!--<div class="col-xl-12 col-lg-12 col-sm-12 col-12 mb-3">
									<label class="form-check-label form-check-label-first">Your Password*</label>
									<input type="password" name="password" id="user_password" maxlength="30" required>
								</div>-->

								<div class="details-page-reply-btn-wrap d-flex">
									<button type="submit" id="signin_button" class="common-btn shop-details-review-btn">Submit</button>
									<div class=" ms-3 d-none" id="form-message">
									</div>
								</div>
							</form>
						</div>
						<p class="text-start mt-4 black-text">Don't have a account ! <a href="register" class="color-text">Sign Up here</a></p>
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

	<script>
		$("#signin_button").click(function() {
			//event.preventDefault();
			var valid_user_phone = false;
			var user_phone = $("#user_mobile").val();
			//alert("hhhh");
			if (user_phone == "") {
				$("input#user_mobile + .error").remove();
				$("#user_mobile").after(
					"<div class='error'>Please enter your phone number</div>"
				);
			} else {
				$("input#user_mobile + .error").remove();
				valid_user_phone = true;
			}

			if (valid_user_phone) {
				$("#signin_button").html('<i class="fas fa-spinner fa-spin"></i>');
				$.ajax({
					type: "POST",

					url: site_url + "login_data",
					data: {
						language: 1,
						securecode: securecode,
						phone: user_phone,
						[csrfName]: csrfHash,
					},
					success: function(html) {
						$("#signin_button").html('Submit');
						var catHtml_header = "";
						var catObj = JSON.parse(html);
						var loginArray = catObj.Information;

						var login_status = catObj.status;
						if (login_status == 1) {
							location.href = site_url;
						} else {
							$("#signin_button + .error").remove();
							$("#form-message").removeClass("d-none");
							$("#form-message").addClass("d-flex");

							$("#form-message").html(
								"<p class='error fs-6 fw-500 text-center mb-0 d-flex align-items-center text-capitalize'>" +
								catObj.msg +
								" !!" +
								"</p>"
							);
						}
					},
				});
			}


		});
	</script>
</body>

</html>