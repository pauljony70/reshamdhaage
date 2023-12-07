<!doctype html>
<html lang="en">
<?php

// echo "<pre>";
// print_r($order_details); exit;
?>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title>Thank you <?= $order_details['order_details']['customer_name'] ?> - Mkkirana</title>

	<?php include("includes/head.php") ?>
	<style>
		.inner-wish {
			position: relative;
		}

		.delivery-add {
			background-color: #fff;
			border-radius: 8px;
			border: 1px solid gainsboro;
			padding: 10px;
			margin-bottom: 10px;
		}

		.inner-wish .right {
			display: inline-block;
			vertical-align: top;
			width: 80%;
			margin-left: 15px;
		}

		.delivery-add p {
			margin-bottom: 0;
			color: gray;
		}

		.inner-wish .right .cart {
			bottom: 10px;
			right: 20px;
			position: absolute;
			background-color: orange;
			color: #fff;
			padding: 4px 8px;
			border-radius: 50%;
		}

		.inner-wish .right .close {
			position: absolute;
			top: 20px;
			right: 20px;
			opacity: 1;
			padding: 4px 6px;
			border-radius: 50%;
			border: 2px solid;
			font-size: 15px;
		}
	</style>

</head>

<body>
	<!-- Preloder -->
	<?php include("includes/preloader.php") ?>
	<!-- Preloder End -->

	<!-- back to to button start-->
	<a href="#" id="scroll-top" class="back-to-top-btn"><i class='bx bx-up-arrow-alt'></i></a>
	<!-- back to to button end-->


	<nav class="navbar navbar-light justify-content-center" style="border-bottom: 1px solid #ccc;height:80px">
		<a class="navbar-brand" href="<?= base_url() ?>">
			<img src="<?= base_url ?>images/logo-blueappsoftware.png" width="100" height="100" alt="">
		</a>
	</nav>
	<?php
	$mrpSum = 0;
	$priceSum = 0;
	foreach ($order_details['order_prods_details'] as $key => $cartdetail) :
		// $mrpSum += $cartdetail['mrp'];
		$priceSum += $cartdetail['prod_price'];
	endforeach;
	?>
	<main class="mx-sm-4">
		<!-- Just an image -->

		<section class="main_content_desktop">
			<div class="row mx-0" style="min-height: calc(100vh - 80px);">
				<div class="col-lg-7 checkout_left_content">

					<!-- Payment Div -->
					<div class="payment_div" id="payment_div">
						<div class="d-flex align-items-center">
							<div>
								<img src="<?php echo base_url; ?>images/thanks-icon.png" alt="" class="thanks-img" height="45" width="45" />
							</div>
							<div class="ms-4">
								<div style="color: #666; font-size: small;">Order BS76047</div>
								<div style="font-size: larger;">Thank you, Jony!</div>
							</div>
						</div>
						<br>
						<div class="border shipping_div_cont rounded">
							<div class="p-3">
								<h4>Your order is confirmed</h4>
								<div style="color: #666; font-size: small;">You’ll receive an email when your order is ready.</div>
							</div>
						</div>
						<br>
						<div class="border shipping_div_cont rounded">
							<h5 class="p-3 pb-1">
								Order Details
							</h5>
							<div class="row p-3">
								<div class="col-md-6">
									<div class="fw-bolder">Contact information</div>
									<p style="color: #666; font-size: 15px;"><?= $order_details['order_details']['customer_email'] ?></p>
								</div>
								<div class="col-md-6">
									<div class="fw-bolder">Payment method</div>
									<div class="d-flex">
										<p style="color: #666; font-size: 15px;"><?= $order_details['order_details']['delivery_mode'] == 'Cash' ? 'Cash on delivery' : 'Prepaid' ?></p>
										<p style="font-size: 15px;">&nbsp;- <?= $priceSum ?></p>
									</div>
								</div>
								<div class="col-md-12">
									<div class="fw-bolder">Shipping address</div>
									<p class="mb-0" style="color: #666; font-size: 15px;"><?= $order_details['order_details']['customer_name'] ?></p>
									<p class="mb-0" style="color: #666; font-size: 15px;"><?= $order_details['order_details']['customer_address'] ?></p>
									<p class="mb-0" style="color: #666; font-size: 15px;"><?= $order_details['order_details']['customer_pincode'] ?></p>
									<p class="mb-0" style="color: #666; font-size: 15px;"><?= $order_details['order_details']['customer_city'] ?>, <?= $order_details['order_details']['state'] ?></p>
									<p class="mb-0" style="color: #666; font-size: 15px;">India</p>
									<p style="color: #666; font-size: 15px;"><?= $order_details['order_details']['customer_phone'] ?></p>
								</div>
								<!-- <div class="col-md-12">
									<div class="fw-bolder">Shipping method</div>
									<p style="color: #666; font-size: 15px;"><?= $order_details['order_details']['delivery_mode'] ?></p>
								</div> -->
							</div>
						</div>
						<br>
						<div class="row">
							<div class="ms-auto">
								<a href="<?php echo base_url; ?>" class="btn pd_add_to_cart border w-100">Continue Shopping</a>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-5 checkout_right_content" style="border-left: 1px solid #ccc;">
					<div style="position: sticky; top: 30px">

						<!-- All Details -->
						<div class="col-md-12 mt-15">
							<?php foreach ($order_details['order_prods_details'] as $key => $cartdetail) : ?>
								<div class="row">
									<div class="col-3 d-flex justify-content-center align-items-center">
										<figure>
											<img src="<?= base_url($cartdetail['prod_img']) ?>" alt="" style="border-radius:4px; height: 100px">
										</figure>
									</div>
									<div class="col-7">
										<div class="fw-bolder"><?= $cartdetail['prod_name'] ?></div>
										<div style="color: #757575; font-size: smaller;">Quantity: <?= $cartdetail['qty'] ?></div>
									</div>
									<div class="col-2">
										<div class="text-end">₹ <?= $cartdetail['prod_price'] ?></div>
									</div>
								</div>
							<?php endforeach ?>

							<hr>

							<table class="table table-borderless">
								<tr>
									<td class="text-start">Subtotal</td>
									<td class="text-end fw-bolder">₹ <?= $priceSum; ?></td>
								</tr>
								<!-- <tr>
									<td class="text-start">Order discount</td>
									<td class="text-end fw-bolder"><?= $mrpSum - $priceSum ?></td>
								</tr> -->
								<tr>
									<td class="text-start">Shipping</td>
									<td class="text-end fw-bolder">FREE</td>
								</tr>
							</table>
							<hr>
							<table class="table table-borderless">
								<tr>
									<td class="text-start fw-bolder" style="font-size:larger;">Total</td>
									<td class="text-end fw-bolder">₹ <?= $priceSum ?></td>
								</tr>
							</table>

						</div>
					</div>
				</div>
			</div>
		</section>
	</main>

	<?php include("includes/script.php") ?>


</body>



</html>