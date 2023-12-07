<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title>Mkkirana. - Cart</title>

	<?php include("includes/head.php") ?>

</head>

<body>
	<!-- Preloder -->
	<?php include("includes/preloader.php") ?>
	<!-- Preloder End -->

	<!-- back to to button start-->
	<a href="#" id="scroll-top" class="back-to-top-btn"><i class='bx bx-up-arrow-alt'></i></a>
	<!-- back to to button end-->

	<?php include("includes/topbar.php") ?>
	<!-- Header area -->
	<?php include("includes/navbar.php") ?>
	<!-- Header area end -->

	<!-- <main>
		<section>
			<div class="breadcrumb-area">
				<div class="container">
					<div class="row">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="breadcrumb-content text-center">
								<h3>Cart</h3>
								<div class="breadcrumb-link">
									<p><a href="index.html">Home</a></p>
									<span></span>
									<p>Cart</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="cart-product-area">
			<div class="container">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="cart-product-details-wrap cart-product-details-wrap-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>Product </th>
										<th>Price</th>
										<th>Quantity</th>
										<th>Subtotal</th>
									</tr>
								</thead>
								<tbody>
									<tr id="cart_item_trs">

									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="row mt-50 justify-content-between">
					<div class="col-xl-4 col-lg-5 col-md-12 col-sm-12 col-12">
						<div class="error-search apply-copon text-center">
							<form action="#">
								<input type="text" placeholder="Type coupon code"><button>Apply Coupon</button>
							</form>
						</div>
					</div>
					<div class="col-xl-6 col-lg-7 col-md-12 col-sm-12 col-12 both-small-50">
						<div class="cart-total-wrap">
							<div class="cart-total-title">
								<h4>Cart Total</h4>
							</div>
							<div class="cart-total-body">
								<ul>
									<li>Subtotal<span id="total_cart_price">₹ 0</span></li>
									<<li>
										<div class="cart-total-body-title">Shipping:</div>
									</li>
									<li>Flat rate:<span>₹0.00</span></li>
									<br>
									li>Shipping to MA.</li>
									<li class="click-address">
										<div class="cart-total-body-title cart-total-body-title-two">Change Shipping Address:</div>
										<span class="click-address-here"><i class='bx bxs-down-arrow'></i></span>
										<div class="cart-address-change-wrap">
											<p>Digital Agency Network 20 Eastbourne Terrace, London</p>
											<p>Morbi aliquam Network 4 Eastbourne Terrace, London</p>
										</div>
									</li>
									<li>Total<span id="total_price">₹ 0</span></li>
									<li>
										<div class="update-cart-content-wrap">
											<p><a href="#">Update Cart</a></p>
											<input type="hidden" id="total_prices">
											<input type="hidden" name="minordervalue" id="minordervalue" value="<?php echo $minordervalue; ?>">
											<button type="submit" onclick="order_summary_page();" class="common-btn shop-details-review-btn update-cart-content-btn">Proceed To Checkout</button>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main> -->


	<main class="container">
		<?php if (!empty($cartdetails['Information']['prod_details'])) : ?>
			<section class="cart_main_banner py-2">
				<div class="row">
					<div class="col-4">
						<div class="d-flex">
							<div class="count_one"> 01 </div>
							<div class="cart_content ms-3">
								<h6 class="cart_shopping m-0">Shopping Cart</h6>
								<p class="cart_count_content m-0">Manage Your Items List</p>
							</div>
						</div>
					</div>
					<div class="col-4">
						<a href="<?= base_url ?>checkout" class="cart_count_second_div" style="<?= empty($cartdetails['Information']['prod_details']) ? 'pointer-events: none; cursor: default;' : '' ?>">
							<div class="d-flex">
								<div class="count_one"> 02 </div>
								<div class="cart_content ms-3">
									<h6 class="cart_shopping m-0">Checkout Details</h6>
									<p class="cart_count_content m-0">Check Item Details</p>
								</div>
							</div>
						</a>
					</div>
					<div class="col-4">
						<a href="javascript:void(0)" class="cart_count_second_div">
							<div class="d-flex">
								<div class="count_one"> 03 </div>
								<div class="cart_content ms-3">
									<h6 class="cart_shopping m-0">Order Complete</h6>
									<p class="cart_count_content m-0">Check Item Details</p>
								</div>
							</div>
						</a>
					</div>
				</div>
			</section>

			<section class="cart_main_content my-8 mx-3 mb-5">
				<?php if (empty($cart['cart_full'])) { ?>
					<div class="row">
						<div class="col-12 col-md-8 p-0">
							<!-- Desktop Cart -->
							<table class="table cart_content_table desktop_cart">
								<thead>
									<tr>
										<th scope="col">Product</th>
										<th scope="col" style="color: var(--theme-color);">Price</th>
										<th scope="col">Quantity</th>
										<th scope="col">SubTotal</th>
									</tr>
								</thead>
								<!-- <?php echo "<pre>";
										print_r($cartdetails['Information']['prod_details']);
										echo "</pre>"; ?> -->
								<tbody>
									<?php foreach ($cartdetails['Information']['prod_details'] as $cart_product) { ?>
										<tr id="">
											<td class="product_name d-flex py-4">
												<i class="fa-regular fa-trash-can ms-2 d-flex justify-content-center align-items-center pe-2 cart_delete_icon" onclick="delete_cart_item('<?= $cart_product['id'] ?>')"></i>
												<?php
												$images = json_decode($cart_product['img_url'], true);
												?>
												<img src="<?php echo base_url . 'media/' . $images[0]['url']; ?>" alt="" class="cart_image">
												<a href="<?= base_url . $cart_product['web_url'] . '?pid=' . $cart_product['prodid'] . '&sku=' . $cart_product['sku'] . '&sid=' . $cart_product['vendor_id'] ?>" class="cart_product_name_link d-flex align-items-center">
													<span><?= $cart_product['name'] ?></span> <br>
												</a>
											</td>
											<td class="price px-0">
												<p class="price_amount text-center mb-1">₹ <?= ($cart_product['price']) ?></p>
												<p class="old_price_amount">₹ <?= ($cart_product['mrp']) ?></p>
											</td>
											<td class="quntity">
												<div class="pd_quantity">
													<a href="javascript:void(0)" class="pd_plus_qty" onclick="update_cart('<?= $cart_product['id']; ?>',<?= $cart_product['price']; ?>,'<?= $cart_product['stock']; ?>','<?= $cart_product['qty']; ?>','1')">+</a>
													<input type="text" id="quantity" class="w-100" name="quantity" value="<?= $cart_product['qty'] ?>" data-old="1" aria-label="Product quantity" size="4" min="1" max="1" step="1" inputmode="numeric" autocomplete="off">
													<a href="javascript:void(0)" class="pd_minus_qty" onclick="update_cart('<?= $cart_product['id']; ?>',<?= $cart_product['price']; ?>,'<?= $cart_product['stock']; ?>','<?= $cart_product['qty']; ?>','0')">-</a>
												</div>
											</td>
											<td class="subtotal">
												<?php $total_price = $cart_product['price'] * $cart_product['qty'] ?>
												<span class="cart_total_price">₹ <?= ($total_price) ?></span>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>

							<!-- Mobile Cart -->
							<table class="table cart_content_table mobile_cart">
								<thead>
									<tr>
										<th scope="col">Product</th>
										<th scope="col">Quantity</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($cartdetails['Information']['prod_details'] as $cart_product) { ?>
										<tr>
											<td class="d-flex py-4">
												<!-- <i class="fa-solid fa-xmark d-flex-center pe-2" style="vertical-align: middle;"></i> -->
												<?php
												$images = json_decode($cart_product['img_url'], true);
												?>
												<i class="fa-regular fa-trash-can ms-2 d-flex justify-content-center align-items-center cart_delete_icon" onclick="delete_cart_item('<?= $cart_product['id'] ?>')"></i>
												<img src="<?php echo base_url . 'media/' . $images[0]['url']; ?>" alt="" class="cart_image_mobile">
												<a href="<?= base_url . $cart_product['web_url'] . '?pid=' . $cart_product['prodid'] . '&sku=' . $cart_product['sku'] . '&sid=' . $cart_product['vendor_id'] ?>" class="cart_product_name_link">
													<span><?= $cart_product['name'] ?></span> <br>
													<p class="price_amount_mobile">₹ <?= ($cart_product['price']) ?></p>
												</a>
											</td>
											<!-- <td class="price px-0">
                                            <p class="price_amount"><?= ($cart_product['mrp']) ?></p>
                                            <p class="old_price_amount"><?= ($cart_product['price']) ?></p>
                                        </td> -->
											<td class="quntity">
												<div class="pd_quantity">
													<a href="javascript:void(0)" class="pd_plus_qty" onclick="update_cart('<?= $cart_product['id']; ?>',<?= $cart_product['price']; ?>,'<?= $cart_product['stock']; ?>','<?= $cart_product['qty']; ?>','1')">+</a>
													<input type="text" id="quantity" class="w-100" name="quantity" value="<?= $cart_product['qty'] ?>" data-old="1" aria-label="Product quantity" size="4" min="1" max="1" step="1" inputmode="numeric" autocomplete="off">
													<a href="javascript:void(0)" class="pd_minus_qty" onclick="update_cart('<?= $cart_product['id']; ?>',<?= $cart_product['price']; ?>,'<?= $cart_product['stock']; ?>','<?= $cart_product['qty']; ?>','0')">-</a>
												</div>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
						<div class="col-12 col-md-4 border">
							<h4 class="cart_total_heading">Cart Total</h4>
							<div class="subtotal d-flex justify-content-between mt-5">
								<span class="text-start cart_left_div">Subtotal</span>
								<span class="text-end cart_right_div">₹ <?= $cartdetails['Information']['totalprice'] ?></span>
							</div>
							<hr>
							<div class="shipping d-flex justify-content-between">
								<span class="text-start cart_left_div">Shipping</span>
								<span class="text-end cart_right_div">Free Shipping</span>
							</div>
							<hr>
							<div class="cod_price d-flex justify-content-between">
								<span class="text-start cart_left_div">Total Discount</span>
								<span class="text-end cart_right_div">- ₹ <?= 0; ?></span>
							</div>
							<hr>
							<div class="total d-flex justify-content-between">
								<span class="text-start total">Total</span>
								<span class="text-end total_price">₹ <?= $cartdetails['Information']['totalprice'] ?></span>
							</div>
							<div class="checkout_btn_div">
								<a href="<?= base_url ?>checkout" id="cart-continue-btn" class="btn w-100 pro_checkout_btn" style="<?= empty($cartdetails['Information']['prod_details']) ? 'pointer-events: none; cursor: default; opacity: 0.6;' : '' ?>">
									Proceed to checkout
								</a>
							</div>
						</div>
					</div>
				<?php } else { ?>
					<div class="text-center">
						<img src="<?= base_url ?>images/icons/empty_cart.jpg" alt="" class="empty_shopping_list_img">
					</div>
					<h4 class="text-center mb-2">Your cart is Empty</h4>
					<div class="d-flex-center">
						<a href="<?= base_url ?>" class="back_to_home_btn">Back to home</a>
					</div>
				<?php } ?>
			</section>

		<?php else : ?>
			<section class="mb-5">
				<div class="text-center">
					<img src="<?= base_url ?>images/icons/empty_cart.jpg" alt="" class="empty_shopping_list_img">
				</div>
				<h4 class="text-center mb-2">No items in cart</h4>
				<div class="text-center">
					<a href="<?= base_url ?>" class="back_to_home_btn">Back to home</a>
				</div>
			</section>
		<?php endif; ?>

		<!-- Footer -->
		<section class="footer">
			<div>
				<?php include("include/footer.php") ?>
			</div>
		</section>

	</main>


	<!-- Footer Area -->
	<?php include("includes/footer.php") ?>
	<!-- Footer Area End -->

	<?php include("includes/script.php") ?>
	<script src="<?php echo site_url(); ?>/assets/js/cart.js"></script>

</body>

</html>