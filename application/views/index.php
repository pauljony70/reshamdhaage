<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title><?= get_store_settings('store_name') ?> - Home</title>
	<?php include("includes/head.php") ?>
	<style>
		#nlmOverlay {
			display: none !important;
		}

		#nlmPopup {
			display: none !important;
		}

		.home-three-cta-wrap {
			height: 600px;
		}

		.home-three-category-box-wrap img {
			height: 220px;
		}

		.prod-card {
			/* width: 215px !important; */
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

	<!-- Topbar area -->
	<?php include("includes/topbar.php");
	?>

	<!-- Header area -->
	<?php include("includes/navbar.php");
	?>
	<!-- Header area end -->

	<main>
		<section class="container">
			<!-- Dextop Hero Area -->
			<div class="home-three-hero-area d-none d-md-none d-lg-block">
				<div class="">
					<!-- <div class="row align-items-center">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="home-three-hero-slide-img-wrap">
								<?php foreach ($header_banner as $header_data) { ?>
									<div class="single-home-three-hero-img">
										<a href="<?php echo $header_data['url']; ?>">
											<img src="<?php echo $header_data['image']; ?>" alt="">
										</a>
										<img class="shape home-three-hero-slide-shape" src="<?php echo site_url(); ?>assets/images/home-three/home-three-cta-img-1.png" alt="">
									</div>
								<?php } ?>
							</div>
						</div>
					</div> -->
					<div class="slider mb-4">
						<div class="swiper mySwiper">
							<div class="swiper-wrapper">
								<?php foreach ($header_banner as $section1) { ?>
									<div class="swiper-slide d-flex justify-content-center align-items-center">
										<img src="<?php echo $section1['image']; ?>" alt="" class="slider_images">
									</div>
								<?php } ?>
							</div>
							<div class="swiper-button-prev"></div>
							<div class="swiper-button-next"></div>

							<div class="swiper-pagination"></div>
						</div>
					</div>
				</div>
			</div>
			<!-- Dextop Hero Area End -->

			<!-- Mobile Hero Area -->
			<div class="home-three-hero-area d-block d-md-block d-lg-none">
				<div class="">
					<div class="row">
						<!-- <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
							<div class="home-three-hero-slide-img-wrap">
								<?php foreach ($header_banner as $header_data) { ?>
									<div class="single-home-three-hero-img">
										<a href="<?php echo $header_data['url']; ?>">
											<img src="<?php echo $header_data['image']; ?>" alt="">
										</a>
										<img class="shape home-three-hero-slide-shape" src="<?php echo site_url(); ?>assets/images/home-three/home-three-hero-slide-img-bg.png" alt="">
									</div>
								<?php } ?>
							</div>
						</div> -->
						<div class="slider mb-4">
							<div class="swiper mySwiper">
								<div class="swiper-wrapper">
									<?php foreach ($header_banner as $section1) { ?>
										<div class="swiper-slide d-flex justify-content-center align-items-center">
											<img src="<?php echo $section1['image']; ?>" alt="" class="slider_images">
										</div>
									<?php } ?>
								</div>
								<div class="swiper-button-prev"></div>
								<div class="swiper-button-next"></div>

								<div class="swiper-pagination"></div>
							</div>
						</div>

						<!-- <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
							<div class="home-three-hero-slide-content-wrap text-center pt-0">
								<?php foreach ($header_banner as $header_data) { ?>
									<div class="single-home-three-hero-content">
										<h1><?php echo $header_data['title']; ?></h1>
										<p><?php echo $header_data['des']; ?></p>
										<div class="home-three-hero-btn-wrap">
											<a class="common-btn home-three-hero-btn" href="<?php echo $header_data['url']; ?>"><?php echo $header_data['btn']; ?></a>
										</div>
									</div>
								<?php } ?>
							</div>
						</div> -->
					</div>
				</div>
			</div>
			<!-- Mobile Hero Area End -->
		</section>

		<!-- Home category big banner -->
		<!-- <section class="home-three-cta">
			<div class="container-fluid">
				<div class="row">
					<?php foreach ($home_section4 as $section2) { ?>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 p-0">
							<a href="<?php echo $section2['url']; ?>">
								<div class="home-three-cta-wrap">
									<img src="<?php echo base_url() . $section2['image']; ?>" alt="">
									<div class="home-three-cta-content">
										<h3><?php echo $section2['title']; ?></h3>
										<h5><?php echo $section2['des']; ?></h5>
									</div>
								</div>
							</a>
						</div>
					<?php } ?>
				</div>
			</div>
		</section> -->
		<!-- Home category big banner End -->

		<!-- Home New Arrival -->
		<section class="home-three-new-arrival-area ">
			<div class="container">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="section-title new-arrival-section-title">
							<h3 class="all_headings">New Arrival</h3>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="home-three-new-arrival-tab-wrap">
							<div class="tab-content mt-4" id="pills-tabContent">
								<div class="tab-pane fade show active" id="pills-one" role="tabpanel" aria-labelledby="pills-one-tab">
									<div class="swiper prodSwiper p-1" style="--swiper-navigation-color: #fff; --swiper-pagination-color: #ff6600; --swiper-navigation-size: 18px; --swiper-scrollbar-sides-offset: 50%">
										<div class="swiper-wrapper align-items-center">
											<?php foreach ($new_product as $new_product_data) { ?>
												<div class="swiper-slide prod-card">
													<div class="arrival-box home-three-arrival-box">
														<div class="mobile_sale_img">
															<div class="sale_badge_div">
																<?php if ($new_product_data['offpercent'] == "") { ?>
																	<span class="badge badge-danger">On Sale</span>
																<?php } else { ?>
																	<span class="badge badge-danger"><?= $new_product_data['offpercent'] ?></span>
																<?php } ?>
															</div>
															<div class="wishlist_img_div">
																<a onclick="product_add_wishlist('<?= $new_product_data['id'] ?>', '<?= $new_product_data['price'] ?>')" class="wishlist_link" title="Add to Wishlist">
																	<img src="<?= base_url ?>images/icons/wishlist.png" alt="wishlist" id="not_wishlisted_img" class="product_wishlist_image_div">
																	<img src="<?= base_url ?>images/icons/wishlisted.png" alt="wishlist" id="wishlisted_img" class="product_wishlist_image_div" style="display:none;">
																</a>
															</div>
															<!-- Show add to cart Button on Hover -->
															<div class="cart_img_div">
																<a onclick="single_product_add_cart('<?= $new_product_data['id'] ?>', '<?= $new_product_data['price'] ?>')" class="wishlist_link" title="Add to Cart">
																	<img src="<?= base_url ?>images/icons/plus.png" alt="wishlist" id="not_wishlisted_img" class="product_wishlist_image_div">
																	<img src="<?= base_url ?>images/icons/wishlisted.png" alt="wishlist" id="wishlisted_img" class="product_wishlist_image_div" style="display:none;">
																</a>
															</div>
														</div>
														<div class="arrival-box-img">
															<a href="productdetail/<?php echo preg_replace('/[^A-Za-z0-9\s]/', ' ', $new_product_data['name']); ?>/<?php echo $new_product_data['id']; ?>">
																<img src="<?php echo 'media/' . $new_product_data['imgurl']; ?>" alt="">
															</a>
														</div>
														<div class="arrival-box-content text-center">
															<p><a href="productdetail/<?php echo preg_replace('/[^A-Za-z0-9\s]/', ' ', $new_product_data['name']); ?>/<?php echo $new_product_data['id']; ?>"><?php echo substr($new_product_data['name'], 0, 40); ?></a></p>
															<div class="d-flex-center price_div">
																<span class="old-price me-1">₹<?php echo $new_product_data['mrp']; ?></span>
																<span class="new-price ms-1">₹<?php echo $new_product_data['price']; ?></span>
															</div>
															<!-- <p>₹<?php echo $new_product_data['price']; ?>&nbsp;&nbsp;<del>₹<?php echo $new_product_data['mrp']; ?></del></p> -->
														</div>
													</div>
												</div>
											<?php } ?>
										</div>
										<div class="swiper-button-next"></div>
										<div class="swiper-button-prev"></div>
									</div>
								</div>
								<div class="tab-pane fade" id="pills-two" role="tabpanel" aria-labelledby="pills-two-tab">
									<div class="row">
										<?php foreach ($popular_product as $popular_product_data) { ?>
											<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
												<div class="arrival-box home-three-arrival-box">
													<div class="arrival-box-img">
														<a href="productdetail/<?php echo preg_replace('/[^A-Za-z0-9\s]/', ' ', $popular_product_data['name']); ?>/<?php echo $popular_product_data['id']; ?>"><img src="<?php echo '../media/' . $popular_product_data['imgurl']; ?>" alt=""></a>
														<div class="home-one-product-option home-three-product-option">
															<ul>
																<li><a href="#"><i class='bx bx-refresh'></i></a></li>
																<li><a href="#"><i class='bx bxs-heart'></i></a></li>
																<li><a href="#"><i class='bx bxs-cart-download'></i></a></li>
																<li><a href="#"><i class='bx bx-show'></i></a></li>
															</ul>
														</div>
													</div>
													<div class="arrival-box-content text-center">
														<h6><a href="productdetail/<?php echo preg_replace('/[^A-Za-z0-9\s]/', ' ', $popular_product_data['name']); ?>/<?php echo $popular_product_data['id']; ?>"><?php echo preg_replace('/[^A-Za-z0-9\s]/', ' ', $popular_product_data['name']); ?></a></h6>
														<p>₹<?php echo $popular_product_data['price']; ?></p>
													</div>
												</div>
											</div>
										<?php } ?>
									</div>
								</div>
								<div class="tab-pane fade" id="pills-three" role="tabpanel" aria-labelledby="pills-three-tab">
									<div class="row">
										<?php foreach ($recommended_product as $recommended_product_data) { ?>
											<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
												<div class="arrival-box home-three-arrival-box">
													<div class="arrival-box-img">
														<a href="productdetail/<?php echo $recommended_product_data['name']; ?>/<?php echo $recommended_product_data['id']; ?>"><img src="<?php echo '../media/' . $recommended_product_data['imgurl']; ?>" alt=""></a>
														<div class="arrival-box-img-cta">
															<span>New</span>
														</div>
														<div class="home-one-product-option home-three-product-option">
															<ul>
																<li><a href="#"><i class='bx bx-refresh'></i></a></li>
																<li><a href="#"><i class='bx bxs-heart'></i></a></li>
																<li><a href="#"><i class='bx bxs-cart-download'></i></a></li>
																<li><a href="#"><i class='bx bx-show'></i></a></li>
															</ul>
														</div>
													</div>
													<div class="arrival-box-content text-center">
														<h6><a href="productdetail/<?php echo $recommended_product_data['name']; ?>/<?php echo $recommended_product_data['id']; ?>"><?php echo $recommended_product_data['name']; ?></a></h6>
														<p>₹<?php echo $recommended_product_data['price']; ?></p>
													</div>
												</div>
											</div>
										<?php } ?>
									</div>
								</div>
								<div class="tab-pane fade" id="pills-four" role="tabpanel" aria-labelledby="pills-four-tab">
									<div class="row">
										<?php foreach ($offers_product as $offers_product_data) { ?>
											<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
												<div class="arrival-box home-three-arrival-box">
													<div class="arrival-box-img">
														<a href="productdetail/<?php echo $offers_product_data['name']; ?>/<?php echo $offers_product_data['id']; ?>"><img src="<?php echo '../media/' . $offers_product_data['imgurl']; ?>" alt=""></a>
														<div class="arrival-box-img-cta">
															<span>New</span>
														</div>
														<div class="home-one-product-option home-three-product-option">
															<ul>
																<li><a href="#"><i class='bx bx-refresh'></i></a></li>
																<li><a href="#"><i class='bx bxs-heart'></i></a></li>
																<li><a href="#"><i class='bx bxs-cart-download'></i></a></li>
																<li><a href="#"><i class='bx bx-show'></i></a></li>
															</ul>
														</div>
													</div>
													<div class="arrival-box-content text-center">
														<h6><a href="productdetail/<?php echo $offers_product_data['name']; ?>/<?php echo $offers_product_data['id']; ?>"><?php echo $offers_product_data['name']; ?></a></h6>
														<div class="d-flex-center price_div">
															<span class="old-price me-1">₹<?php echo $new_product_data['mrp']; ?></span>
															<span class="new-price ms-1">₹<?php echo $new_product_data['price']; ?></span>
														</div>
														<!-- <p>₹<?php echo $offers_product_data['price']; ?>&nbsp;&nbsp;<del>₹<?php echo $offers_product_data['mrp']; ?></del></p> -->
													</div>
												</div>
											</div>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Home New Arrival End -->

		<?php
		// echo "<pre>";
		// print_r($category);
		// echo "</pre>";
		?>

		<!-- All Categories -->
		<section class="home-three-category-area mt-4">
			<div class="container">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="category-title">
							<h3 class="all_headings">Category</h3>
							<a href="all_category" class="all_links">View All</a>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="category_sliders owl-carousel">
						<?php foreach ($header_cat as $category_data) { ?>
							<div class="single-home-two-arrival-box mt-2">
								<a href="sub_category/<?php echo $category_data['id']; ?>">
									<div class="home-two-arrival-img">
										<img src="<?php echo 'media/' . $category_data['imgurl']; ?>" alt="">
										<h6 class="category_links" style="font-size: smaller; text-align:center;">
											<a href="sub_category/<?php echo $category_data['id']; ?>">
												<?php echo $category_data['name']; ?>
											</a>
										</h6>
									</div>
								</a>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</section>

		<!-- populor -->
		<section class="home-three-category-area">
			<div class="container">
				<div class="row mt-2">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="category-title">
							<h3 class="all_headings">Popular Products</h3>
							<a href="all_category">View All</a>
						</div>
					</div>
				</div>
				<div class="row mt-4">
					<?php foreach ($popular_product as $popular_product_data) { ?>
						<div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-6">
							<div class="arrival-box home-three-arrival-box">
								<div class="mobile_sale_img">
									<div class="sale_badge_div">
										<?php if ($popular_product_data['offpercent'] == "") { ?>
											<span class="badge badge-danger">On Sale</span>
										<?php } else { ?>
											<span class="badge badge-danger"><?= $popular_product_data['offpercent'] ?></span>
										<?php } ?>
									</div>
									<div class="wishlist_img_div">
										<a onclick="product_add_wishlist('<?= $popular_product_data['id'] ?>', '<?= $popular_product_data['price'] ?>')" class="wishlist_link" title="Add to Wishlist">
											<img src="<?= base_url ?>images/icons/wishlist.png" alt="wishlist" id="not_wishlisted_img" class="product_wishlist_image_div">
											<img src="<?= base_url ?>images/icons/wishlisted.png" alt="wishlist" id="wishlisted_img" class="product_wishlist_image_div" style="display:none;">
										</a>
									</div>
									<!-- Show add to cart Button on Hover -->
									<div class="cart_img_div">
										<a onclick="single_product_add_cart('<?= $popular_product_data['id'] ?>', '<?= $popular_product_data['price'] ?>')" class="wishlist_link" title="Add to Cart">
											<img src="<?= base_url ?>images/icons/plus.png" alt="wishlist" id="not_wishlisted_img" class="product_wishlist_image_div">
											<img src="<?= base_url ?>images/icons/wishlisted.png" alt="wishlist" id="wishlisted_img" class="product_wishlist_image_div" style="display:none;">
										</a>
									</div>
								</div>
								<div class="arrival-box-img">
									<a href="productdetail/<?php echo $popular_product_data['name']; ?>/<?php echo $popular_product_data['id']; ?>">
										<img src="<?php echo 'media/' . $popular_product_data['imgurl']; ?>" alt="">
									</a>
								</div>
								<div class="arrival-box-content text-center">
									<p><a href="productdetail/<?php echo $popular_product_data['name']; ?>/<?php echo $popular_product_data['id']; ?>"><?php echo substr($popular_product_data['name'], 0, 40); ?></a></p>
									<div class="d-flex-center price_div">
										<span class="old-price me-1">₹<?php echo $popular_product_data['mrp']; ?></span>
										<span class="new-price ms-1">₹<?php echo $popular_product_data['price']; ?></span>
									</div>
									<!-- <p>₹<?php echo $popular_product_data['price']; ?>&nbsp;&nbsp;<del>₹<?php echo $popular_product_data['mrp']; ?></del></p> -->
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</section>

		<!-- Home Category -->
		<section class="home-three-category-area mt-4">
			<div class="container">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="category-title">
							<h3 class="all_headings">Shop By Category</h3>
							<a href="all_category" class="all_links">All Category</a>
						</div>
					</div>
				</div>
				<div class="row home-three-category-margin">
					<?php foreach ($home_section2 as $section2) { ?>
						<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
							<div class="home-three-category-box-wrap">
								<div class="home-three-category-box-img text-center">
									<a href="<?php echo $section2['url']; ?>"><img src="<?php echo $section2['image']; ?>" alt=""></a>
								</div>
								<div class="home-three-category-hover-content">
									<h4><?php echo $section2['title']; ?></h4>
									<a href="<?php echo $section2['url']; ?>"><?php echo $section2['btn']; ?></a>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</section>
		<!-- Home Category End -->

		<!-- recommonded -->
		<section class="home-three-category-area">
			<div class="container">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="category-title">
							<h3 class="all_headings">Recommended Products</h3>
							<a href="all_category">View All</a>
						</div>
					</div>
				</div>

				<div class="row mt-4">
					<?php foreach ($recommended_product as $recommended_product_data) { ?>
						<div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-6">
							<div class="arrival-box home-three-arrival-box">
								<div class="mobile_sale_img">
									<div class="sale_badge_div">
										<?php if ($recommended_product_data['offpercent'] == "") { ?>
											<span class="badge badge-danger">On Sale</span>
										<?php } else { ?>
											<span class="badge badge-danger"><?= $recommended_product_data['offpercent'] ?></span>
										<?php } ?>
									</div>
									<div class="wishlist_img_div">
										<a onclick="product_add_wishlist('<?= $recommended_product_data['id'] ?>', '<?= $recommended_product_data['price'] ?>')" class="wishlist_link" title="Add to Wishlist">
											<img src="<?= base_url ?>images/icons/wishlist.png" alt="wishlist" id="not_wishlisted_img" class="product_wishlist_image_div">
											<img src="<?= base_url ?>images/icons/wishlisted.png" alt="wishlist" id="wishlisted_img" class="product_wishlist_image_div" style="display:none;">
										</a>
									</div>
									<!-- Show add to cart Button on Hover -->
									<div class="cart_img_div">
										<a onclick="single_product_add_cart('<?= $recommended_product_data['id'] ?>', '<?= $recommended_product_data['price'] ?>')" class="wishlist_link" title="Add to Cart">
											<img src="<?= base_url ?>images/icons/plus.png" alt="wishlist" id="not_wishlisted_img" class="product_wishlist_image_div">
											<img src="<?= base_url ?>images/icons/wishlisted.png" alt="wishlist" id="wishlisted_img" class="product_wishlist_image_div" style="display:none;">
										</a>
									</div>
								</div>
								<div class="arrival-box-img">
									<a href="productdetail/<?php echo $recommended_product_data['name']; ?>/<?php echo $recommended_product_data['id']; ?>">
										<img src="<?php echo 'media/' . $recommended_product_data['imgurl']; ?>" alt="">
									</a>
								</div>
								<div class="arrival-box-content text-center">
									<p><a href="productdetail/<?php echo $recommended_product_data['name']; ?>/<?php echo $recommended_product_data['id']; ?>"><?php echo substr($recommended_product_data['name'], 0, 40); ?></a></p>
									<div class="d-flex-center price_div">
										<span class="old-price me-1">₹<?php echo $recommended_product_data['mrp']; ?></span>
										<span class="new-price ms-1">₹<?php echo $recommended_product_data['price']; ?></span>
									</div>
									<!-- <p>₹<?php echo $recommended_product_data['price']; ?>&nbsp;&nbsp;<del>₹<?php echo $recommended_product_data['mrp']; ?></del></p> -->
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</section>


		<!-- Customer Benefit -->
		<section class="customer-benefit-area">
			<div class="container">
				<div class="row">
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
						<div class="customer-benefit-box text-center">
							<div class="customer-benefit-icon">
								<img src="assets/images/home-three/customer-offer-icon-1.png" alt="">
							</div>
							<div class="customer-benefit-content">
								<h4>Customer Communication</h4>
								<p>Have any question? Contact us</p>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
						<div class="customer-benefit-box text-center">
							<div class="customer-benefit-icon">
								<img src="assets/images/home-three/customer-offer-icon-2.png" alt="">
							</div>
							<div class="customer-benefit-content">
								<h4>Get 50% Offer Order up Rs.250</h4>
								<p>Get offer today make smile</p>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
						<div class="customer-benefit-box text-center">
							<div class="customer-benefit-icon">
								<img src="assets/images/home-three/customer-offer-icon-3.png" alt="">
							</div>
							<div class="customer-benefit-content">
								<h4>Fast Delivery On Time</h4>
								<p>Get the order on time. We value your time.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Customer Benefit End -->

		<?php print_r($product_category); ?>
		<!-- Home One Favorite Product Area -->
		<!-- <div class="home-one-favorite-product-area my-5">
			<div class="container">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="section-title text-center">
							<h3 class="all_headings">Favorite Offers</h3>
						</div>
					</div>
				</div>
				<div class="row mt-50">
					<div class="single-home-one-favorite-slide owl-carousel">
						<?php foreach ($offers_product as $offers_product_data) { ?>
							<div class="single-home-two-arrival-box m-1">
								<a href="productdetail/<?php echo $offers_product_data['name']; ?>/<?php echo $offers_product_data['id']; ?>">
									<div class="home-two-arrival-img text-center px-1">
										<img src="<?php echo 'media/' . $offers_product_data['imgurl']; ?>" alt="">
										<span><a href="productdetail/<?php echo $offers_product_data['name']; ?>/<?php echo $offers_product_data['id']; ?>"><?php echo substr($offers_product_data['name'], 0, 30) . "..."; ?></a></span>
										<div class="d-flex-center price_div">
											<span class="old-price me-1">₹<?php echo $offers_product_data['mrp']; ?></span>
											<span class="new-price ms-1">₹<?php echo $offers_product_data['price']; ?></span>
										</div>
										<p>₹<?php echo $offers_product_data['price']; ?>&nbsp;&nbsp;<del>₹<?php echo $offers_product_data['mrp']; ?></del></p>
									</div>
								</a>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div> -->

		<section class="home-three-category-area">
			<div class="container">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="section-title text-center">
							<h3 class="all_headings mt-4">Favorite Offers</h3>
						</div>
					</div>
				</div>

				<div class="row mt-4">
					<?php foreach ($offers_product as $offers_product_data) { ?>
						<div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-6">
							<div class="arrival-box home-three-arrival-box">
								<div class="mobile_sale_img">
									<div class="sale_badge_div">
										<?php if ($offers_product_data['offpercent'] == "") { ?>
											<span class="badge badge-danger">On Sale</span>
										<?php } else { ?>
											<span class="badge badge-danger"><?= $offers_product_data['offpercent'] ?></span>
										<?php } ?>
									</div>
									<div class="wishlist_img_div">
										<a onclick="product_add_wishlist('<?= $offers_product_data['id'] ?>', '<?= $offers_product_data['price'] ?>')" class="wishlist_link" title="Add to Wishlist">
											<img src="<?= base_url ?>images/icons/wishlist.png" alt="wishlist" id="not_wishlisted_img" class="product_wishlist_image_div">
											<img src="<?= base_url ?>images/icons/wishlisted.png" alt="wishlist" id="wishlisted_img" class="product_wishlist_image_div" style="display:none;">
										</a>
									</div>
									<!-- Show add to cart Button on Hover -->
									<div class="cart_img_div">
										<a onclick="single_product_add_cart('<?= $offers_product_data['id'] ?>', '<?= $offers_product_data['price'] ?>')" class="wishlist_link" title="Add to Cart">
											<img src="<?= base_url ?>images/icons/plus.png" alt="wishlist" id="not_wishlisted_img" class="product_wishlist_image_div">
											<img src="<?= base_url ?>images/icons/wishlisted.png" alt="wishlist" id="wishlisted_img" class="product_wishlist_image_div" style="display:none;">
										</a>
									</div>
								</div>
								<div class="arrival-box-img">
									<a href="productdetail/<?php echo $offers_product_data['name']; ?>/<?php echo $offers_product_data['id']; ?>">
										<img src="<?php echo 'media/' . $offers_product_data['imgurl']; ?>" alt="">
									</a>
								</div>
								<div class="arrival-box-content text-center">
									<p><a href="productdetail/<?php echo $offers_product_data['name']; ?>/<?php echo $offers_product_data['id']; ?>"><?php echo substr($offers_product_data['name'], 0, 40); ?></a></p>
									<div class="d-flex-center price_div">
										<span class="old-price me-1">₹<?php echo $offers_product_data['mrp']; ?></span>
										<span class="new-price ms-1">₹<?php echo $offers_product_data['price']; ?></span>
									</div>
									<!-- <p>₹<?php echo $offers_product_data['price']; ?>&nbsp;&nbsp;<del>₹<?php echo $offers_product_data['mrp']; ?></del></p> -->
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</section>
		<!-- Home One Favorite Product Area End -->
	</main>

	<!-- Footer Area -->
	<?php include("includes/footer.php") ?>
	<!-- Footer Area End -->

	<!-- Newsletter Popup -->
	<?php include("includes/newsletter.php") ?>
	<!-- Newsletter Popup End -->

	<?php include("includes/script.php") ?>
	<script src="<?php echo site_url(); ?>assets/js/checkout.js"></script>

	<script>
		var swiper = new Swiper(".mySwiper", {
			navigation: {
				nextEl: ".swiper-button-next",
				prevEl: ".swiper-button-prev",
			},
			loop: true,
			pagination: {
				el: ".swiper-pagination",
				clickable: true,
			},
			autoplay: {
				delay: 2500,
				disableOnInteraction: false,
			},
		});
		// Add to Wishlist
		function product_add_wishlist(product_id, product_price) {
			var quantity = 1;
			let user_id = $("#user_id").val();
			// alert(user_id);
			if (user_id != "") {
				if (product_id) {
					$.ajax({
						type: "POST",
						url: site_url + "add_prod_into_wishlist",

						data: {
							language: 1,
							securecode: securecode,
							user_id: user_id,
							prod_id: product_id,
							prod_price: product_price,
							qty: quantity,
							[csrfName]: csrfHash,
						},

						success: function(html) {
							get_wishlist_products(user_id);
							$("#wishlist" + product_id).html(
								'<i class="fa fa-heart" aria-hidden="true"></i>'
							);

							var catObj = JSON.parse(html);
							toastr.success(catObj.msg)
							$("#wishlist_div_image").src = site_url + "/images/icons/wishlisted.png";
							var cartArray = catObj.Information;
						},
					});
				}
			} else {
				toastr.error("Please Login to add product in wishlist")
			}
		}

		// Add to Cart
		function single_product_add_cart(product_id, product_price) {
			let user_id = $("#user_id").val();

			var quantity = $('#quantity').val();
			var custom_title = $('#custom_title').val();
			var custom_image = $('#img_div').html();
			var total_stock = $("#attr_data option:selected").attr('data-stock');
			var total_stock_single = $('#total_stock').val();

			<?php if (empty($this->session->userdata('user_id'))) { ?>

				toastr.error("Please Login to add product into cart")

			<?php } else { ?>

				if (product_id) {
					attr_value = $('#attr_data option:selected').val();
					if (attr_value == '') {
						alert('Please Select Arrtibutes');
					} else if (quantity > total_stock) {
						alert('Only ' + total_stock + ' Qty Available');
					} else if (quantity > total_stock_single) {
						alert('Only ' + total_stock_single + ' Qty Available');
					} else {

						var size = $('#attr_data option:selected').text();
						var price = $('#mrp').text();
						var product_size = size;
						//alert(product_size);
						//alert(price);

						var product_color = '';

						$("#cart" + product_id).html('<i class="fa fa-spinner fa-spin"></i>');

						$.ajax({
							type: "POST",
							url: site_url + 'add_to_cart',
							data: {
								language: 1,
								securecode: securecode,
								size: product_size,
								color: product_color,
								user_id: user_id,
								prod_id: product_id,
								prod_price: product_price,
								qty: quantity,
								custom_title: custom_title,
								custom_image: price,
								[csrfName]: csrfHash
							},
							success: function(html) {
								get_cart_products(user_id);
								var catObj = JSON.parse(html)
								// Set the count of cart
								console.log(catObj);
								$("#cart_count_mobile").text = catObj.Information.cart_count;
								$("#cart_count").text = catObj.Information.cart_count;

								toastr.success(catObj.msg);

								var cartArray = catObj.Information;
								var status = catObj.status;
								if (status == 2) {
									alert(catObj.msg);
								} else {

									//	get_cart_products('');

								}
							}
						});
					}
				} else {
					toastr.error("some error")
				}
			<?php } ?>

		}
	</script>

	<script>
		var swiper = new Swiper('.prodSwiper', {
			slidesPerView: 2,
			freeMode: true,
			spaceBetween: 10,
			grabCursor: true,
			mousewheel: {
				forceToAxis: true,
			},
			forceToAxis: false,
			navigation: {
				nextEl: ".swiper-button-next",
				prevEl: ".swiper-button-prev",
			},
			breakpoints: {
				640: {
					slidesPerView: 3,
				},
				768: {
					slidesPerView: 4,
				},
				1024: {
					slidesPerView: 5,
				},
				1400: {
					slidesPerView: 6,
				},
			},
		});
	</script>
</body>

</html>