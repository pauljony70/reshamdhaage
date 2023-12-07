<!doctype html>
<html lang="en">
<?php
$paymentorder_id = "PAY" . date('YmdHis');
$description        = "Product Description";
$txnid              = date("YmdHis");
$key_id             = "rzp_live_T6fvRlqyWh4Zuj";
$currency_code      = $currency_code;
$total              = (1 * 100); // 100 = 1 indian rupees
$amount             = 1;
$merchant_order_id  = date("YmdHis");
$card_holder_name   = $this->session->userdata('fullname');
$name               = "Mkkirana";
// echo "<pre>";
// print_r($cartdetails); exit;
?>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title>Checkout - Mkkirana</title>

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

	<!-- Header area -->


	<!-- Header area end -->
	<?php
	$sql = "SELECT name,value FROM store_config";
	$query = $this->db->query($sql);
	if ($query->num_rows() > 0) {
		foreach ($query->result() as $row) {
			if ($row->name == "store_open_status") {
				if ($row->value == 0) {
					$store_open_status  = 'Open';
				} else {
					$store_open_status  = 'Close';
				}
			}
		}
	}
	?>

	<form name="razorpay-form" id="razorpay-form" action="<?php echo $callback_url; ?>" method="POST">
		<input type="hidden" name="store_open_status" id="store_open_status" value="<?php echo $store_open_status; ?>" />
		<input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id" />
		<input type="hidden" name="paymentorder_id" id="paymentorder_id" value="<?php echo $paymentorder_id; ?>" />
		<input type="hidden" name="delivery_add_id" id="delivery_add_id">
		<input type="hidden" name="total_price_payment" id="total_price_payment">
		<input type="hidden" name="totalshipping_fee" id="totalshipping_fee">
		<input type="hidden" name="merchant_order_id" id="merchant_order_id" value="<?php echo $merchant_order_id; ?>" />
		<input type="hidden" name="merchant_trans_id" id="merchant_trans_id" value="<?php echo $txnid; ?>" />
		<input type="hidden" name="merchant_product_info_id" id="merchant_product_info_id" value="<?php echo $description; ?>" />
		<input type="hidden" name="merchant_surl_id" id="merchant_surl_id" value="<?php echo $surl; ?>" />
		<input type="hidden" name="merchant_furl_id" id="merchant_furl_id" value="<?php echo $furl; ?>" />
		<input type="hidden" name="card_holder_name_id" id="card_holder_name_id" value="<?php echo $card_holder_name; ?>" />
		<input type="hidden" name="merchant_total" id="merchant_total" />
		<input type="hidden" name="merchant_amount" id="merchant_amount" />
	</form>

	<!-- <main>
		<section>
			<div class="breadcrumb-area">
				<div class="container">
					<div class="row">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="breadcrumb-content text-center">
								<h3>Check out</h3>
								<div class="breadcrumb-link">
									<p><a href="/">Home</a></p>
									<span></span>
									<p>Check out</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="checkout-area mt-50">
			<div class="container">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="checkout-bill-title">
							<h4>Billing address</h4>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
						<div id="delivery_address_id">
						</div>

						<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
							<button class="common-btn shop-details-review-btn update-cart-content-btn" onclick="change_address();">Change Delivery Address</button>
						</div>
						<br>
						<div id="Score_data">
						</div>
					</div>

					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mt-4 mt-lg-0">
						<div class="cart-product-details-wrap checkout-product-details-wrap pt-0">
							<table class="table">
								<thead>
									<tr>
										<th>Order Summary</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Price(Rs.) </td>
										<td>₹<span id="total_cart_final">0</span></td>
									</tr>
									<tr>
										<td>Shipping fee</td>
										<td>₹<span id="shippingfee">0</span></td>
									</tr>
									<tr>
										<td>CGST</td>
										<td>₹<span id="cgst">0</span></td>
									</tr>
									<tr>
										<td>SGST</td>
										<td>₹<span id="igst">0</span></td>
									</tr>
									<tr>
										<td>Total</td>
										<td>₹<span id="cart_totalprice">0</span></td>
									</tr>
								</tbody>
							</table>

							<div class="payment-option-wrap">
								<div class="form-check">
									
								</div>

								<div class="form-check" id="cod_divs">
									<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value='2' checked>
									<label class="form-check-label" for="flexRadioDefault2">
										Cash on delivery
									</label>
									<p>Pay with cash upon delivery.</p>
								</div>

								<div class="form-check" id="radio_data">
								</div>
								<ul>
									<li>
										<button type="submit" onclick="place_order_data_pre(event)" class="common-btn shop-details-review-btn update-cart-content-btn">Proceed To Payment</button>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main> -->


	<nav class="navbar navbar-light justify-content-center" style="border-bottom: 1px solid #ccc;height:80px">
		<a class="navbar-brand" href="<?= base_url() ?>">
			<img src="<?= base_url ?>images/logo-blueappsoftware.png" width="100" height="100" alt="">
		</a>
	</nav>

	<main class="mx-sm-4">
		<!-- Just an image -->

		<section class="main_content_desktop">
			<div class="row mx-0" style="min-height: calc(100vh - 80px);">
				<div class="col-lg-7 checkout_left_content">
					<!-- <div class="checkout_logo">
						<a href="<?= base_url ?>">
							<img src="<?= base_url ?>images/logo-blueappsoftware.png" alt="" class="checkout_logo">
						</a>
					</div> -->
					<nav aria-label="breadcrumb" class="breadcrumb_checkout">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?= base_url ?>cart">Cart</a></li>
							<li class="breadcrumb-item active" id="info_bc"><a href="javascript:void(0)" onclick="showInfoDiv()">Information</a></li>
							<!-- <li class="breadcrumb-item" id="ship_bc"><a href="javascript:void(0)" onclick="showShippingDiv()">Shipping</a></li> -->
							<li class="breadcrumb-item" id="payment_bc"><a href="javascript:void(0)" onclick="validateAddressForm()">Payment</a></li>
						</ol>
					</nav>

					<!-- Information Div -->
					<div class="information_div" id="information_div">
						<!-- Contact Info -->
						<!-- <?php for ($i = 0; $i < 50; $i++) { ?>
							<h6 class="checkout_heading">
								Billing Address
							</h6>
						<?php } ?>
						<h6 class="checkout_heading">
							Billing Address
						</h6> -->
						<!-- <input type="email" name="email" id="user_email" class="form-control mb-3" placeholder="Email Address" value="<?= $this->session->userdata['email'] ?>"> -->

						<div id="delivery_address_id1">
						</div>
						<!-- <div id="">
							<a href="<?= base_url ?>address_list" class="btn basic_button">Change address</a>
						</div> -->
						<h6 class="checkout_heading">
							Contact
						</h6>
						<form action="#" class="form">
							<div class="row">
								<div class="col-12">
									<div class="form-group">
										<input type="text" name="contact" id="contact" class="form-control" placeholder="Email or mobile phone number">
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<div class="form-check">
											<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
											<label class="form-check-label" for="defaultCheck1">
												Email me with news and offers
											</label>
										</div>
									</div>
								</div>
							</div>
						</form>
						<h6 class="checkout_heading">
							Delivery
						</h6>
						<form id="formoid" action="#" class="address_form_checkout">
							<!-- Different Address Div -->
							<div class="different_address_checkout" id="different_address_div">
								<!-- Address -->
								<div class="address_details_box">
									<input type="text" name="name" class="form-control" placeholder="Full Name *" id="fullname_a" value="<?= $this->session->userdata['name'] ?>">
									<span id="error"></span>
									<span id="fullname1_error"></span>
									<div class="row p-0">
										<div class="col-12 col-sm-6 pe-1">
											<input type="email" name="email" id="email" class="form-control" placeholder="Email *">
											<span id="emails_error"></span>
											<span id="error"></span>
										</div>
										<div class="col-12 col-sm-6 ps-sm-1">
											<input type="text" name="phone" id="mobile" class="form-control" placeholder="Phone Number *" onkeypress="return AllowOnlyNumbers(event);" maxlength="10">
											<span id="mobile_error"></span>
											<span id="error"></span>
										</div>
									</div>
									<div class="">
										<input type="text" name="address" id="fulladdress" class="form-control" placeholder="House Number and street name*">
										<span id="fulladdress_error"></span>
										<span id="error"></span>
									</div>
									<div class="row">
										<div class="col-12 col-sm-4">
											<input type="text" name="city" id="city" class="form-control" placeholder="Town/City *">
											<span id="city_error"></span>
											<span id="error"></span>
										</div>
										<div class="col-12 col-sm-4 px-sm-1">
											<select name="state" id="state" class="form-control">
												<option value="">Select state</option>
												<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
												<option value="Andhra Pradesh">Andhra Pradesh</option>
												<option value="Arunachal Pradesh">Arunachal Pradesh</option>
												<option value="Assam">Assam</option>
												<option value="Bihar">Bihar</option>
												<option value="Chandigarh">Chandigarh</option>
												<option value="Chhattisgarh">Chhattisgarh</option>
												<option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
												<option value="Daman and Diu">Daman and Diu</option>
												<option value="Delhi">Delhi</option>
												<option value="Goa">Goa</option>
												<option value="Gujarat">Gujarat</option>
												<option value="Haryana">Haryana</option>
												<option value="Himachal Pradesh">Himachal Pradesh</option>
												<option value="Jammu and Kashmir">Jammu and Kashmir</option>
												<option value="Jharkhand">Jharkhand</option>
												<option value="Karnataka">Karnataka</option>
												<option value="Kerala">Kerala</option>
												<option value="Ladakh">Ladakh</option>
												<option value="Lakshadweep">Lakshadweep</option>
												<option value="Madhya Pradesh">Madhya Pradesh</option>
												<option value="Maharashtra">Maharashtra</option>
												<option value="Manipur">Manipur</option>
												<option value="Meghalaya">Meghalaya</option>
												<option value="Mizoram">Mizoram</option>
												<option value="Nagaland">Nagaland</option>
												<option value="Odisha">Odisha</option>
												<option value="Puducherry">Puducherry</option>
												<option value="Punjab">Punjab</option>
												<option value="Rajasthan">Rajasthan</option>
												<option value="Sikkim">Sikkim</option>
												<option value="Tamil Nadu">Tamil Nadu</option>
												<option value="Telangana">Telangana</option>
												<option value="Tripura">Tripura</option>
												<option value="Uttar Pradesh">Uttar Pradesh</option>
												<option value="Uttarakhand">Uttarakhand</option>
												<option value="West Bengal">West Bengal</option>
											</select>

											<span id="error"></span>
										</div>
										<div class="col-12 col-sm-4">
											<input type="text" name="pincode" id="pincode" class="form-control" placeholder="Pin Code *" onkeypress="return AllowOnlyNumbers(event);" maxlength="6">
											<span id="error"></span>
										</div>
									</div>
								</div>
							</div>
							<div class="bottom_btns mt-5">
								<button type="button" onclick="validateAddressForm()" class="btn submit_btn_address w-100" id="cont_to_pay">
									Continue to Payment
									<div id="loader_new" class="loader_new"></div>
								</button>
								<a href="<?= base_url ?>cart" class="back_to_cart btn p-0 w-100 mt-3">
									<i class="fa-solid fa-arrow-left"></i></i>&nbsp; RETURN TO CART
								</a>
								<input type="hidden" value="<?php echo $this->session->userdata('user_id'); ?>" type="user_id" id="user_id" name="user_id">

							</div>
						</form>
					</div>

					<!-- shipping Div -->
					<div class="shipping_div" id="shipping_div" style="display: none;">
						<div class="border rounded shipping_div_cont">
							<table class="table border mt-5">
								<tr>
									<td>Contact</td>
									<th id="shipping_useremail"></th>
									<td>
										<button onclick="showInfoDiv()" class="btn p-0 shipping_change_btn">Change</button>
									</td>
								</tr>
								<tr>
									<td>Ship to</td>
									<th id="address"></th>
									<td>
										<button onclick="showInfoDiv()" class="btn p-0 shipping_change_btn">Change</button>
									</td>
								</tr>
							</table>
						</div>

						<h6 class="checkout_heading">Shipping Methods</h6>
						<div class="border p-7 rounded mb-3">
							Free Shipping
						</div>

						<h6 class="checkout_heading mt-3">Other Notes (Optional)</h6>
						<div class="">
							<textarea name="other_notes" id="other_notes" cols="30" rows="5" class="form-control" placeholder="Notes about your order"></textarea>
						</div>

						<div class="bottom_btns mt-8">
							<button onclick="showPaymentDiv()" class="btn submit_btn_address w-100">
								Continue to Payment
							</button>
							<a onclick="showInfoDiv()" class="back_to_cart btn p-0 my-2 w-100">
								<i class="fa-solid fa-arrow-left"></i></i>&nbsp; RETURN TO INFORMATION
							</a>
						</div>
					</div>

					<!-- Payment Div -->
					<div class="payment_div" id="payment_div" style="display: none;">
						<div class="border shipping_div_cont rounded">
							<table class="table mb-0">
								<tr>
									<td>Contact</td>
									<th id="pay_shipping_useremail"></th>
									<td>
										<button onclick="showInfoDiv()" class="btn p-0 shipping_change_btn">Change</button>
									</td>
								</tr>
								<tr>
									<td>Ship to</td>
									<th id="pay_address"></th>
									<td>
										<button onclick="showInfoDiv()" class="btn p-0 shipping_change_btn">Change</button>
									</td>
								</tr>
								<tr>
									<td>Method</td>
									<th>Free Shipping</th>
									<td>
										<button onclick="showInfoDiv()" class="btn p-0 shipping_change_btn">Change</button>
									</td>
								</tr>
							</table>
						</div>
						<h6 class="checkout_heading">Payment Methods</h6>
						<p>All transactions are secure and encrypted.</p>
						<div class="border p-5 rounded mb-3" id="cod_divs">
							<input type="radio" id="online_pay" name="flexRadioDefault" value="1" onclick="togglePaymentDiv('online')">
							<label for="online_pay">Credit Card/Debit Card/NetBanking</label><br>

							<div class="border p-7 rounded mb-3" id="online" style="background-color: #f9f9f9; display:none;">
								Pay securely by Credit or Debit card or Internet Banking through CC Avenue.
							</div>

							<input type="radio" id="cod_pay" name="flexRadioDefault" value="2" onclick="togglePaymentDiv('cod')">
							<label for="cod_pay">Cash on Delivery</label>

							<div class="border p-7 rounded mb-3" id="cod" style="background-color: #f9f9f9; display:none;">
								Pay with cash upon delivery.
							</div>
						</div>

						<!-- Form Submit Button -->
						<div class="form_submit mt-8">
							<!-- <input type="checkbox" name="accept" id="accept_tac" class="for-control">
							<label for="accrpt_tac">I have read and agree to the website terms and conditions</label> -->
							<a onclick="place_order_data_pre(event)" href="javascript:void(0);" class="btn w-100 mt-5 pro_checkout_btn" id="place_order">
								Place Order
								<div id="loader_new_1" class="loader_new_1"></div>
							</a>
							<a onclick="showInfoDiv()" class="back_to_cart btn p-0 my-2 w-100">
								<i class="fa-solid fa-arrow-left"></i></i>&nbsp; RETURN TO INFORMATION
							</a>
						</div>

					</div>
				</div>

				<div class="col-lg-5 checkout_right_content" style="border-left: 1px solid #ccc;">
					<div style="position: sticky; top: 30px">
						<?php if (!empty($cart['cart_full'])) { ?>
							<?php foreach ($cart['cart_full'] as $cart_product) { ?>
								<div class="row p-0 my-5 cart_details">
									<div class="col-3 checkout_prod_img_div p-0">
										<img src="<?php echo base_url . 'media/' . $cart_product['imgurl']; ?>" alt="" class="checkout_image">
										<span class="prod_quantity"><?= $cart_product['qty'] ?></span>
									</div>
									<div class="col-7 checkout_prod_name_div">
										<h6 class="checkout_prod_name"><?= $cart_product['name'] ?></h6>
									</div>
									<div class="col-2 p-0 checkout_prod_price_div">
										<h6 class="checkout_prod_price">
											<?= $cart_product['price'] * $cart_product['qty'] ?> Rs
										</h6>
									</div>
								</div>
							<?php } ?>
						<?php } ?>

						<!-- All Details -->
						<div class="col-md-12 mt-15">
							<?php foreach ($cartdetails['Information']['prod_details'] as $key => $cartdetail) : ?>
								<div class="row">
									<div class="col-3 d-flex justify-content-center align-items-center">
										<figure>
											<img src="<?= base_url('media/' . json_decode($cartdetail['img_url'])[0]->url) ?>" alt="" style="border-radius:4px; height: 100px">
										</figure>
									</div>
									<div class="col-7">
										<div class="fw-bolder"><?= $cartdetail['name'] ?></div>
										<div style="color: #757575; font-size: smaller;">Quantity: <?= $cartdetail['qty'] ?></div>
									</div>
									<div class="col-2">
										<div class="text-end">₹ <?= $cartdetail['mrp'] ?></div>
									</div>
								</div>
							<?php endforeach ?>
							<div class="coupon_code_cont">
								<div class="row">
									<div class="col-7">
										<input type="text" class="form-control h-100" name="coupon_code" id="coupon_code" placeholder="Coupon Code">
									</div>
									<!-- <div class="input-group-prepend"> -->
									<div class="col-5">
										<button onclick="get_checkout_data()" class="btn input-group-text submit_btn_address w-100">Apply Coupon</button>
									</div>
									<!-- </div> -->
									<div id="coupon_message" style="color:#438F29;font-weight:600"></div>
								</div>
							</div>
							<br>
							<?php
							$mrpSum = 0;
							$priceSum = 0;
							foreach ($cartdetails['Information']['prod_details'] as $key => $cartdetail) :
								$mrpSum += $cartdetail['mrp'];
								$priceSum += $cartdetail['price'];
							endforeach;
							?>
							<table class="table table-borderless">
								<tr>
									<td class="text-start">Subtotal</td>
									<td class="text-end fw-bolder">₹ <?= $mrpSum; ?></td>
								</tr>
								<tr>
									<td class="text-start">Order discount</td>
									<td class="text-end fw-bolder">₹ <?= $mrpSum - $priceSum ?></td>
								</tr>
								<tr>
									<td class="text-start">Shipping</td>
									<td class="text-end fw-bolder">FREE</td>
								</tr>
								<tr>
									<td class="text-start fw-bolder" style="font-size:larger;">Total</td>
									<td class="text-end fw-bolder">₹ <?= $priceSum ?></td>
								</tr>
							</table>
							<!-- <div class="subtotal d-flex justify-content-between mt-5">
							<span class="text-start cart_left_div">Subtotal</span>
							<span class="text-end cart_right_div" id="cart_totalprice"><?= ($checkout['total_mrp']) ?></span>
						</div>
						<div class="shipping d-flex justify-content-between">
							<span class="text-start cart_left_div">Shipping</span>
							<span class="text-end cart_right_div" id="shippingfee"></span>
						</div>
						<div class="cod_price d-flex justify-content-between">
							<span class="text-start cart_left_div">GST</span>
							<span class="text-end cart_right_div" id="gst">- <?= ($checkout['total_discount']) ?></span>
						</div>
						<div class="total d-flex justify-content-between">
							<span class="text-start total">Total</span>
							<span class="text-end total_price" id="total_cart_final"><?= ($checkout['total_price']) ?></span>
						</div> -->
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>


	<!-- Footer Area -->

	<!-- Footer Area End -->

	<?php include("includes/script.php") ?>
	<script src="<?php echo site_url(); ?>/assets/js/checkout.js"></script>
	<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

	<script>
		// const checkbox = document.getElementById('different_address');
		// const hiddenDiv = document.getElementById('different_address_div');

		// checkbox.addEventListener('change', function() {
		// 	if (checkbox.checked) {
		// 		hiddenDiv.style.display = 'block';
		// 	} else {
		// 		hiddenDiv.style.display = 'none';
		// 	}
		// });

		// window.addEventListener("load", () => {
		// 	if (checkbox.checked) {
		// 		hiddenDiv.style.display = 'block';
		// 		checkbox.style.display = 'none';
		// 	}
		// })

		function showShippingDiv() {

			let user_email = document.getElementById('email');

			// Shipping
			let shipping_useremail = document.getElementById('shipping_useremail');
			let address = document.getElementById('address');

			// Payment
			let payshipping_useremail = document.getElementById('pay_shipping_useremail');
			let payaddress = document.getElementById('pay_address');

			let house_num = document.getElementById('fulladdress').value;
			let city = document.getElementById('city').value;
			let pincode = document.getElementById('pincode').value;
			let state = document.getElementById('state').value;

			let useraddress = house_num + ", " + city + " " + pincode + ", " + state

			// document.getElementById('info_bc').classList.remove("active");
			// document.getElementById('ship_bc').classList.add("active");

			shipping_useremail.innerHTML = user_email.value;
			payshipping_useremail.innerHTML = user_email.value;
			address.innerHTML = useraddress;
			payaddress.innerHTML = useraddress;

			// document.getElementById('information_div').style.display = "none";
			// document.getElementById('shipping_div').style.display = "block";
			// document.getElementById('payment_div').style.display = "none";
		}

		function showInfoDiv() {
			document.getElementById('information_div').style.display = "block";
			document.getElementById('shipping_div').style.display = "none";
			document.getElementById('payment_div').style.display = "none";

			document.getElementById('info_bc').classList.add("active");
			document.getElementById('payment_bc').classList.remove("active");

		}

		function showPaymentDiv() {
			document.getElementById('information_div').style.display = "none";
			document.getElementById('shipping_div').style.display = "none";
			document.getElementById('payment_div').style.display = "block";

			document.getElementById('info_bc').classList.remove("active");
			// document.getElementById('ship_bc').classList.remove("active");
			document.getElementById('payment_bc').classList.add("active");

			showShippingDiv();
		}

		function togglePaymentDiv(divId) {
			document.getElementById('cod').style.display = "none";
			document.getElementById('online').style.display = "none";

			const div = document.getElementById(divId);
			div.style.display = 'block';
		}

		function validateAddressForm() {
			var fullname = document.getElementById('fullname_a');
			var email = document.getElementById('email');
			var phone = document.getElementById('mobile');
			var fulladdress = document.getElementById('fulladdress');
			var city = document.getElementById('city');
			var state = document.getElementById('state');
			var pincode = document.getElementById('pincode');

			var flag_fullname = false;
			var flag_email = false;
			var flag_phone = false;
			var flag_fulladdress = false;
			var flag_city = false;
			var flag_state = false;
			var flag_pincode = false;

			if (fullname.value == '') {
				flag_fullname = false;
				setErrorMsg(fullname, '<i class="fa-solid fa-circle-xmark"></i> Full name is required.');
			} else {
				flag_fullname = true;
				setSuccessMsg(fullname);
			}

			if (email.value == '') {
				flag_email = false;
				setErrorMsg(email, '<i class="fa-solid fa-circle-xmark"></i> Email is required.');
			} else {
				flag_email = true;
				setSuccessMsg(email);
			}

			if (phone.value == '') {
				flag_phone = false;
				setErrorMsg(phone, '<i class="fa-solid fa-circle-xmark"></i> Phone is required.');
			} else {
				flag_phone = true;
				setSuccessMsg(phone);
			}

			if (fulladdress.value == '') {
				flag_fulladdress = false;
				setErrorMsg(fulladdress, '<i class="fa-solid fa-circle-xmark"></i> Full Address is required.');
			} else {
				flag_fulladdress = true;
				setSuccessMsg(fulladdress);
			}

			if (city.value == '') {
				flag_city = false;
				setErrorMsg(city, '<i class="fa-solid fa-circle-xmark"></i> City is required.');
			} else {
				flag_city = true;
				setSuccessMsg(city);
			}

			if (state.value == '') {
				flag_state = false;
				setErrorMsg(state, '<i class="fa-solid fa-circle-xmark"></i> State is required.');
			} else {
				flag_state = true;
				setSuccessMsg(state);
			}

			if (pincode.value == '') {
				flag_pincode = false;
				setErrorMsg(pincode, '<i class="fa-solid fa-circle-xmark"></i> Pincode is required.');
			} else {
				flag_pincode = true;
				setSuccessMsg(pincode);
			}

			if (flag_email == true && flag_phone == true && flag_fulladdress == true && flag_city == true && flag_state == true && flag_pincode == true) {
				showPaymentDiv();
				return true;
			} else {
				return false;
			}
		}

		function setErrorMsg(ele, errormsgs) {
			const formGroup = ele.parentElement;
			const formInput = formGroup.querySelector('.form-control');
			const span = formGroup.querySelector('#error');
			span.innerHTML = errormsgs;
			formInput.className = "form-control is-invalid";
			span.className = "invalid-feedback fw-bolder";
		}

		function setSuccessMsg(ele) {
			const formGroup = ele.parentElement;
			const formInput = formGroup.querySelector('.form-control');
			formInput.className = "form-control success";
		}
	</script>

	<script>
		var delivery_address_id = $('#delivery_address_id1').val();
		//alert(delivery_address_id);
		if (delivery_address_id == '') {
			//alert('Add Delivery Address');
		}

		$("input[name='flexRadioDefault']").change(function() {
			//alert('dddd');
			if ($(this).val() === '10') {
				$(this).attr('checked', true);
				razorpaySubmit(this);
			} else if ($(this).val() === '20') {
				$(this).attr('checked', true);
				$(this).attr('checked', true);
				//alert('fff');
			}
		});

		var csrfName = $(".txt_csrfname").attr("name"); // 
		var csrfHash = $(".txt_csrfname").val(); // CSRF hash
		var site_url = "<?= base_url() ?>" // CSRF hash
		var securecode = $(".securecode").val();
		var user_id = $(".user_id").val();
		var razorpay_pay_btn, instance;

		function razorpaySubmit(el) {
			var cart_totalprice = <?= $priceSum ?>;
			// var id_number = parseInt(cart_totalprice.replace(/[^0-9.]/g, ""));
			var merchant_total = <?= $priceSum ?>;
			var options = {
				key: "<?php echo $key_id; ?>",
				amount: cart_totalprice * 100,
				name: "<?php echo $name; ?>",
				description: "Order # <?php echo $merchant_order_id; ?>",
				netbanking: true,
				currency: "<?php echo $currency_code; ?>", // INR
				prefill: {
					name: "<?php echo $card_holder_name; ?>",
					email: "admin@gmail.com",
					contact: "<?php echo $this->session->userdata('phone'); ?>"
				},
				notes: {
					soolegal_order_id: "<?php echo $merchant_order_id; ?>",
				},

				handler: function(transaction) {

					document.getElementById('razorpay_payment_id').value = transaction.razorpay_payment_id;
					//	alert(transaction.razorpay_payment_id);
					if (transaction.razorpay_payment_id != '') {
						place_order_data(event)
					}
					// document.getElementById('razorpay-form').submit();
				},

				"modal": {
					"ondismiss": function() {

						location.reload()
					}
				}
			};

			if (typeof Razorpay == 'undefined') {
				setTimeout(razorpaySubmit, 200);
				if (!razorpay_pay_btn && el) {
					razorpay_pay_btn = el;
					el.disabled = true;
					el.value = 'Please wait...';
				}
			} else {
				if (!instance) {
					instance = new Razorpay(options);
					if (razorpay_pay_btn) {
						razorpay_pay_btn.disabled = false;
						razorpay_pay_btn.value = "Pay Now";
					}
				}
				instance.open();
			}
		}

		function place_order_data_pre(event) {
			var store_open_status = $('#store_open_status').val();
			if (store_open_status == 'Close') {
				alert('Store is Closed Now. Please Try After Some Time.');
			} else if ($('input[name="flexRadioDefault"]:checked').val() == 1) {
				razorpaySubmit(this);

			} else if ($('input[name="flexRadioDefault"]:checked').val() == 2) {
				place_order_data(event)
				//razorpaySubmit(this);
			} else {
				alert('Select Any Payment Option');
			}
		}

		function place_order_data(event) {

			if (($('input[name="flexRadioDefault"]:checked').val() == 1) || ($('input[name="flexRadioDefault"]:checked').val() == 2)) {

				//alert("Payment Done");

				var razorpay_payment_id = $('#razorpay_payment_id').val();
				var paymentorder_id = $('#paymentorder_id').val();
				var delivery_add_id = $('#delivery_add_id').val();
				var total_price_payment = $('#total_price_payment').val();
				var totalshipping_fee = $('#totalshipping_fee').val();
				var deliverymode = '';

				var type = $("input[name='flexRadioDefault']:checked").val();
				if (type == 1) {
					deliverymode = 'Razorpay';
				} else if (type == 2) {
					deliverymode = 'Cash';
				}
				// if (delivery_add_id == 0) {
				// 	alert('Add Delivery Address');
				// } else {
				//alert(delivery_add_id);
				$.ajax({
					method: 'POST',
					url: site_url + 'placeorder',
					data: {
						language: '1',
						securecode: securecode,
						user_id: global_user_id,
						paymentorder_id: paymentorder_id,
						payment_id: razorpay_payment_id,
						address_id: 1,
						customer_name: $('#fullname_a').val(),
						customer_email: $('#email').val(),
						customer_phone: $('#mobile').val(),
						customer_address: $('#fulladdress').val(),
						customer_city: $('#city').val(),
						customer_state: $('#state').val(),
						customer_pincode: $('#pincode').val(),
						total_price: <?= $priceSum ?>,
						qoute_id: '0',
						deliverymode: deliverymode,
						extraship: '0',
						deliveryid: '0',
						walletcoins: '0',
						discountvalue: '0',
						discountid: '0',
						shipping: totalshipping_fee || 0,
						[csrfName]: csrfHash
					},
					success: function(response) {
						var catObj = JSON.parse(response);
						var status = catObj.status;
						if (status == 1) {
							//alert(catObj);
							//	var order_id = 'Order Id  - ' + catObj.Information.orderId;
							var order_id = catObj.Information.orderId;
							location.href = site_url + "thankyou/" + order_id;
							//location.href = site_url;
						}
					},
				});
				// }
			} else {
				alert('Select Any Payment Option');
			}
		}
	</script>

</body>



</html>