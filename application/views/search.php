<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title>Mkkirana. - Category Products</title>
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
	<?php include("includes/topbar.php") ?>
	<?php include("includes/navbar.php") ?>
	<!-- Header area end -->

	<main>

		<section>
			<div class="breadcrumb-area">
				<div class="container">
					<div class="row">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="breadcrumb-content text-center">
								<h3><?php echo $search_title; ?></h3>
								<div class="breadcrumb-link">
									<p><a href="/">Home</a></p>
									<span></span>
									<p><?php echo $search_title; ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php //print_r($search['Information']); //die; 
		?>
		<!-- Shop Area -->

		<section class="shop-area">
			<div class="container">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="row shop-grid-three mb-5">
							<?php if (!empty($search['Information'])) { ?>
								<?php
								// print_r($search['Information']);
								foreach ($search['Information'] as $search) {
									$img_data = json_decode($search['img_url']);
									foreach ($img_data[0] as $prod_info) {
										$prod_img = $prod_info;
									}

								?>
									<div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-6">
										<div class="arrival-box home-three-arrival-box">
											<div class="mobile_sale_img">
												<div class="sale_badge_div">
													<?php if ($search['offpercent'] == "") { ?>
														<span class="badge badge-danger">On Sale</span>
													<?php } else { ?>
														<span class="badge badge-danger"><?= $search['offpercent'] ?>% off</span>
													<?php } ?>
												</div>
												<div class="wishlist_img_div">
													<a onclick="product_add_wishlist('<?= $search['id'] ?>', '<?= $search['price'] ?>')" class="wishlist_link" title="Add to Wishlist">
														<img src="<?= base_url ?>images/icons/wishlist.png" alt="wishlist" id="not_wishlisted_img" class="product_wishlist_image_div">
														<img src="<?= base_url ?>images/icons/wishlisted.png" alt="wishlist" id="wishlisted_img" class="product_wishlist_image_div" style="display:none;">
													</a>
												</div>
												<!-- Show add to cart Button on Hover -->
												<div class="cart_img_div">
													<a onclick="single_product_add_cart('<?= $search['id'] ?>', '<?= $search['price'] ?>')" class="wishlist_link" title="Add to Cart">
														<img src="<?= base_url ?>images/icons/plus.png" alt="wishlist" id="not_wishlisted_img" class="product_wishlist_image_div">
														<img src="<?= base_url ?>images/icons/wishlisted.png" alt="wishlist" id="wishlisted_img" class="product_wishlist_image_div" style="display:none;">
													</a>
												</div>
											</div>
											<div class="arrival-box-img">
												<a href="<?= base_url ?>productdetail/<?php echo $search['name']; ?>/<?php echo $search['id']; ?>">
													<img src="<?php echo base_url . 'media/' . $prod_img; ?>" alt="<?= $search['name'] ?>">
												</a>
											</div>
											<div class="arrival-box-content text-center">
												<p><a href="productdetail/<?php echo $search['name']; ?>/<?php echo $search['id']; ?>"><?php echo substr($search['name'], 0, 40); ?></a></p>
												<div class="d-flex-center price_div">
													<span class="old-price me-1">₹<?php echo $search['mrp']; ?></span>
													<span class="new-price ms-1">₹<?php echo $search['price']; ?></span>
												</div>
												<!-- <p>₹<?php echo $search['price']; ?>&nbsp;&nbsp;<del>₹<?php echo $search['mrp']; ?></del></p> -->
											</div>
										</div>
									</div>
								<?php } ?>
							<?php } else { ?>
								<div class="text-center">
									<img src="<?= base_url ?>images/icons/empty_cart.jpg" alt="" class="empty_shopping_list_img">
								</div>
								<h4 class="text-center mb-2">No matching results for your Search</h4>
								<div class="text-center">
									<a href="<?= base_url ?>" class="back_to_home_btn">Back to home</a>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Shop Area End -->
	</main>



	<!-- Footer Area -->
	<?php include("includes/footer.php") ?>
	<!-- Footer Area End -->

	<?php include("includes/script.php") ?>

</body>

</html>