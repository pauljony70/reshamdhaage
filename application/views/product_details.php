<!doctype html>
<html lang="en">
<?php

use function PHPSTORM_META\type;

$img_data = json_decode($prod_details_data['Information']['img_url']);
foreach ($img_data[0] as $prod_info) {
	$prod_img = $prod_info;
}
?>
<?php
// print_r($image_data);
// exit; ?>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title>Mkkirana. - Product Details</title>

	<meta name="og_title" property="og:title" content="<?= $prod_details_data['Information']['name']; ?>" />
	<meta name="og_site_name" property="og:site_name" content="<?= base_url() ?>" />


	<meta property="og:description" content="<?= strip_tags($prod_details_data['Information']['short_desc']); ?>" />

	<meta name="og_image" property="og:image" content="<?= base_url() . 'media/' . json_decode($prod_details_data['Information']['img_url'])[0]->url; ?>" />
	<style>
		.star-rating {
			font-size: 0;
			white-space: nowrap;
			display: flex;
			align-items: center;
			width: 175px;
			height: 35px;
			overflow: hidden;
			position: relative;
			background: url(https://fleekmart.com/media/icon/star.svg);
			background-size: contain;
		}

		.star-rating input {
			-moz-appearance: none;
			-webkit-appearance: none;
			opacity: 0;
			display: inline-block;
			width: 20%;
			height: 100%;
			margin: 0;
			padding: 0;
			z-index: 2;
			position: relative;
		}

		.star-rating i {
			opacity: 0;
			position: absolute;
			inset-inline-start: 0;
			top: 0;
			height: 100%;
			width: 20%;
			z-index: 1;
			background: url(https://fleekmart.com/media/icon/starFilled.svg);
			background-size: contain;
		}

		.star-rating input:hover+i,
		.star-rating input:checked+i {
			opacity: 1;
		}

		.star-rating i~i~i~i~i {
			width: 100%;
		}

		.star-rating i~i~i~i {
			width: 80%;
		}

		.star-rating i~i~i {
			width: 60%;
		}

		.star-rating i~i {
			width: 40%;
		}

		.rCardUser i.fas.fa-star,
		.product-review i.fas.fa-star {
			color: #ffc107;
		}

		.shop-img-deails img {
			height: 450px;
		}

		.zoomed_imaeg {
			width: 100% !important;
		}
	</style>

	<?php include("includes/head.php");
	/*	echo '<pre>';
	print_r($prod_details_data);
	echo '</pre>';*/
	?>
	<!-- Image Zoom -->
	<script src="https://unpkg.com/js-image-zoom@0.7.0/js-image-zoom.js" type="application/javascript"></script>
</head>



<body>
	<!-- Preloder -->
	<?php include("includes/preloader.php");
	?>
	<!-- Preloder End -->
	<span id="meta_img"></span>
	<!-- back to to button start-->
	<a href="#" id="scroll-top" class="back-to-top-btn"><i class='bx bx-up-arrow-alt'></i></a>
	<!-- back to to button end-->

	<input type="hidden" name="prod_id" id="prod_id" value="<?php echo $prod_id; ?>">

	<!-- Header area -->
	<?php include("includes/topbar.php") ?>
	<?php include("includes/navbar.php") ?>
	<!-- Header area end -->
	<main>

		<!-- Shop Details Top Area -->
		<!-- <?php
				echo "<pre>";
				print_r($prod_details_data);
				echo "</pre>";
				?> -->

		<section class="shop-details-product mt-5">
			<div class="container">
				<div class="row">
					<?php $image_data = json_decode($prod_details_data['Information']['img_url']) ?>

					<!-- <div class="col-1 image_slider">
						<?php foreach ($image_data as $image) { ?>
							<a class="my-auto spotlight" data-page="false" data-animation="fade" data-control="zoom,fullscreen,close" data-theme="white" data-autohide=false href="<?= base_url . 'media/' . $image->url ?>">
								<img src="<?= base_url . 'media/' . $image->url ?>" alt="<?= $image->url; ?>" class="my-2 mobile_sidebar_imgs">
							</a>
						<?php } ?>
					</div> -->

					<div class="col-7 img_gallary">
						<!-- Desktop Image Gallary -->
						<div class="row p-0 m-0">
							<div class="col-12 p-0 img_gallary_ar">
								<div class="row desktop_parent_img">
									<?php $counter = 0; ?>
									<?php foreach ($image_data as $image) { ?>
										<?php $counter = $counter + 1; ?>
										<div class="col-6 desktop_child_img p-0 px-1" id="img-container_<?= $counter ?>">
											<a class="my-auto">
												<img src="<?= base_url . 'media/' . $image->url ?>" alt="<?= $image->name; ?>" class="my-2 zoomed_imaeg" style="height: 450px; object-fit: contain; box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px; border-radius: 5px;">
											</a>
										</div>
									<?php } ?>
									<input type="hidden" id="image_counter" value="<?= $counter ?>">
								</div>
							</div>
						</div>

						<!-- Mobile Image Gallary -->
						<div class="mobile_image_gallary">
							<div class="swiper mobile_gallary">
								<div class="swiper-wrapper">
									<?php foreach ($image_data as $image) { ?>
										<a class="swiper-slide my-auto spotlight zoom-img" data-page="false" data-animation="fade" data-control="zoom,fullscreen,close" data-theme="white" data-autohide=false href="<?= base_url . 'media/' . $image->url ?>">
											<div class="swiper-zoom-container">
												<img src="<?= base_url . 'media/' . $image->url ?>" alt="<?= $image->name; ?>" class="my-2 zoom-img mobile_gallary_img">
											</div>
										</a>
										<a class="swiper-slide my-auto spotlight zoom-img" data-page="false" data-animation="fade" data-control="zoom,fullscreen,close" data-theme="white" data-autohide=false href="<?= base_url . 'media/' . $image->url ?>">
											<div class="swiper-zoom-container">
												<img src="<?= base_url . 'media/' . $image->url ?>" alt="<?= $image->name; ?>" class="my-2 zoom-img mobile_gallary_img">
											</div>
										</a>
										<a class="swiper-slide my-auto spotlight zoom-img" data-page="false" data-animation="fade" data-control="zoom,fullscreen,close" data-theme="white" data-autohide=false href="<?= base_url . 'media/' . $image->url ?>">
											<div class="swiper-zoom-container">
												<img src="<?= base_url . 'media/' . $image->url ?>" alt="<?= $image->name; ?>" class="my-2 zoom-img mobile_gallary_img">
											</div>
										</a>
									<?php } ?>
								</div>
								<div class="swiper-button-next"></div>
								<div class="swiper-button-prev"></div>
								<div class="swiper-pagination"></div>
							</div>
						</div>
					</div>

					<div class="col-5 product_main_content">
						<div class="shop-details-content-wrap">
							<div class="home-one-product-content shop-details-reoduct-content">
								<h3 id="product_name"></h3>
								<div class="product-review">
									<ul>
										<!-- <?php
												$star_count = (int)$prod_details_data['Information']['prod_rating'];
												for ($i = 0; $i < $star_count; $i++) { ?>
											<span><i class="fas fa-star"></span>
										<?php } ?> -->
										<li>( <span id="prod_rating_count"></span> reviews )</li>
									</ul>
								</div>
								<div class="home-one-product-price-list">
									<!-- <ul>
										<li>₹<span id=""><?= $prod_details_data['Information']['price'] ?></span></li>
										<li>
											<div><del>₹<span id=""><?= $prod_details_data['Information']['mrp'] ?></span></del></div>
										</li>
									</ul> -->

									<!-- <div class="pd_dress_name_div">
										<h3 class="pd_dress_name"><?= $prod_details_data['Information']['name']; ?></h3>
									</div> -->
									<div class="pd_price_box">
										<div class="pd_price_box">
											<span class="pd_new_price" id="product-price">₹ <?= $prod_details_data['Information']['price'] ?></span>
											<span class="pd_old_price" id="">&nbsp;₹ <?= $prod_details_data['Information']['mrp'] ?></span>
										</div>
									</div>
									<div class="pd_desc my-3">
										<p class="pd_desc_content">
											<?= $prod_details_data['Information']['short_desc']; ?>
										</p>
									</div>

								</div> <input type="hidden" name="total_stock" id="total_stock" value="<?php echo $prod_details_data['Information']['stock'] ?>">
								<?php
								$attrib_data = json_decode($prod_details_data['Information']['pricearray']);
								if (!empty($attrib_data)) { ?>
									<select onchange="attr_data_change(event)" name="attr_data" id="attr_data">
										<option value="">Select Option</option>
										<?php
										$count = 0;
										foreach ($attrib_data as $attr_info) {
										?>
											<option <?php if ($count == 0) {
														echo 'selected';
													} ?> data-stock="<?php echo $attr_info->attrstockvalue; ?>" data-id="<?php echo $attr_info->attrmrpvalue; ?>" value="<?php echo $attr_info->attrvalue; ?>"><?php echo $attr_info->attrnam; ?></option>
										<?php
											$count++;
										}
										?>
									</select>
								<?php } ?>
							</div>

							<div class="pd_counter pd_btns mt-8">
								<div class="row px-0">
									<div class="col-2 pd_quantity">
										<a href="javascript:void(0)" class="pd_plus_qty" onclick="add_product_qty('1')">+</a>
										<input type="text" id="quantity" class="w-100" name="quantity" value="1" data-old="1" aria-label="Product quantity" size="4" min="1" max="1" step="1" inputmode="numeric" autocomplete="off">
										<a href="javascript:void(0)" class="pd_minus_qty" onclick="add_product_qty('-1')">-</a>
									</div>
									<div class="col-5 add_to_cart">
										<button onclick="product_add_wishlist(<?php echo $prod_id; ?>,0)" class="btn pd_add_to_cart border w-100">Add to Wishlist</button>
									</div>
									<div class="col-5 buy_now ps-0">
										<button class="btn pd_buy_now border w-100" onclick="single_product_add_cart(<?php echo $prod_id; ?>,0)">Add to Cart</button>
									</div>
								</div>
								<?php if ($prod_details_data['Information']['stock'] > 0) {
									echo '<span class="badge_stock" style="margin-left:-11px;">In Stock</span>';
								} ?>
							</div>

							<!-- <div class="shop-details-add-cart-wrap">
								<div class="quantity buttons_added">
									<input type="button" value="-" class="minus">
									<input type="number" step="1" min="1" max="100" name="quantity" id="quantity" title="Qty" class="input-text qty text">
									<input type="button" value="+" class="plus">
								</div>
								<div class="cart_btn">
								</div>
								<div class="cart-button-wrap">
									<button class="cart-btn common-btn" id="cart<?php echo $prod_id; ?>" onclick="single_product_add_cart(<?php echo $prod_id; ?>,0)">Add to Cart</button>
								</div>
								<div class="cart-heart">
									<a href="#" onclick="product_add_wishlist(<?php echo $prod_id; ?>,0)"><i class='bx bx-heart'></i></a>
								</div>
							</div> -->

							<div class="add-cart-content">
								<p id="short_desc"></p>
							</div>
							<?php
							$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
							?>
							<div class="share mt-4">
								<div class="d-flex flex-wrap">
									<span class="pd_share p-1 ps-0">Share on: </span>
									<a href="https://www.facebook.com/sharer/sharer.php?u=<?= $actual_link ?>" target="_blank" title="Share on Facebook" rel="noopener noreferrer" style="font-size: 20px; color: #3b5998;" class="me-2"><i class="fa-brands fa-square-facebook"></i></a>
									<!-- <a href="https://instagram.com/" target="_blank" title="Share on Instagram" rel="noopener noreferrer" style="font-size: 20px; color: #d62976;" class="me-2"><i class="fa-brands fa-square-instagram"></i></a> -->
									<a href="http://twitter.com/share?url=<?= $actual_link ?>&text=I ♥ this product" target="_blank" title="Share on Twitter" rel="noopener noreferrer" style="font-size: 20px; color: #00acee;" class="me-2"><i class="fa-brands fa-square-twitter"></i></a>
									<!-- <a href="https://www.snapchat.com/" target="_blank" title="Share on Snapchat" rel="noopener noreferrer" style="font-size: 20px; color: #FFFC00;" class="me-2"><i class="fa-brands fa-square-snapchat"></i></a>
									<a href="https://youtube.com/" target="_blank" title="Share on Youtube" rel="noopener noreferrer" style="font-size: 20px; color: #CD201F;" class="me-2"><i class="fa-brands fa-square-youtube"></i></a> -->
								</div>
							</div>

							<div class="product_info mt-4">
								<h4>Product Information</h4>
								<table class="table table-hover">
									<tbody>
										<tr>
											<th class="pd_add_head py-2 px-0 table-light">Brand</th>
											<td class="pd_add_content py-2 px-0"><?= $prod_details_data['Information']['brand']; ?></td>
										</tr>
										<!-- <tr>
											<th class="pd_add_head py-2 px-0 table-light">Stock</th>
											<td class="pd_add_content py-2 px-0"><?php if ($prod_details_data['Information']['stock'] > 0) {
																						echo '<span class="badge_stock">In Stock</span>';
																					} else {
																						echo "";
																					} ?></td>
										</tr> -->
									</tbody>
								</table>
							</div>

							<div class="badges">
								<div class="d-flex justify-content-between">
									<?php for ($i = 1; $i < 4; $i++) { ?>
										<img src="<?= base_url ?>images/icons/badge<?= $i ?>.png" alt="" class="pd_badge_images">
									<?php } ?>
								</div>
							</div>

							<!-- <div class="shop-details-brand">
								<ul>
									<li>Brand: <span id="brand"></span></li>
									<li>Availability: <span>In Stock</span></li>
								</ul>
							</div> -->
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Shop Details Top Area End -->

		<div class="container extra_details mt-5">
			<div class="card-body p-0 child_height_set">
				<ul class="nav nav-pills nav-pills-bg-soft justify-content-sm-center p-3 mobile_scroll" id="course-pills-tab" role="tablist">
					<li class="nav-item me-2 me-sm-5" role="presentation">
						<button class="nav-link mb-2 mb-md-0 rounded-pill pd_tab_btn active" id="tab-1" data-bs-toggle="pill" data-bs-target="#tabs-1" type="button" role="tab" aria-controls="tabs-1" aria-selected="true">Description</button>
					</li>
					<li class="nav-item me-2 me-sm-5" role="presentation">
						<button class="nav-link mb-2 mb-md-0 rounded-pill pd_tab_btn" id="tab-3" data-bs-toggle="pill" data-bs-target="#tabs-3" type="button" role="tab" aria-controls="tabs-3" aria-selected="false" tabindex="-1">Reviews</button>
					</li>
				</ul>
				<hr style="margin: 0px;">
				<div class="tab-content p-4" id="course-pills-tabContent">
					<div class="tab-pane fade active show" id="tabs-1" role="tabpanel" aria-labelledby="tab-1">
						<p class="pd_decription">
							<?= $prod_details_data['Information']['fulldetail']; ?>
						</p>
					</div>
					<div class="tab-pane fade" id="tabs-3" role="tabpanel" aria-labelledby="tab-1">
						<div>
							<form id="review_form" class="form">
								<div class="form-group mb-1">
									<label class="form-label mb-0">Rate this Product</label>
								</div>
								<div class="form-group mb-2">
									<input type="text" class="form-control" name="reviewtitle" id="reviewtitle" placeholder="Review Title" />
								</div>
								<div class="form-group mb-2">
									<textarea class="form-control" name="ProductReview" id="ProductReview" rows="5" placeholder="Comments here ..."></textarea>
								</div>

								<div class="form-group d-flex mb-2">
									<div class="rating_star">
										<input value="5" name="star-radio" id="star-1" type="radio">
										<label for="star-1">
											<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
												<path d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z" pathLength="360"></path>
											</svg>
										</label>
										<input value="4" name="star-radio" id="star-2" type="radio">
										<label for="star-2">
											<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
												<path d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z" pathLength="360"></path>
											</svg>
										</label>
										<input value="3" name="star-radio" id="star-3" type="radio">
										<label for="star-3">
											<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
												<path d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z" pathLength="360"></path>
											</svg>
										</label>
										<input value="2" name="star-radio" id="star-4" type="radio">
										<label for="star-4">
											<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
												<path d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z" pathLength="360"></path>
											</svg>
										</label>
										<input value="1" name="star-radio" id="star-5" type="radio">
										<label for="star-5">
											<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
												<path d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z" pathLength="360"></path>
											</svg>
										</label>
									</div>
								</div>
								<button class="btn" type="submit" style="background-color: #ee2c61; color:white">Add Review</button>
							</form>
						</div>
						<?php if (!empty($prod_details_data['review']) || $productdetails['order_count'] > 0) { ?>
							<div class="read_reviews my-7">
								<h4>Reviews</h4>
								<?php foreach ($product_review as $riview) { ?>
									<div class="row">
										<div class="col-3">
											<img src="assets_web/icons/user.png" alt="" class="rounded-circle">
										</div>
										<div class="col-9">
											<?php
											for ($i = 0; $i < 5; $i++) {
												echo '<i class="fa-solid fa-star"></i>';
											}
											?>
											<h6><?= $riview->review_title ?></h6>
											<p><?= $riview->review_comment ?></p>
										</div>
									</div>
								<?php } ?>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>

		<!-- Related Product Area -->
		<!-- <section class="related-product mt-50 mb-76">
			<div class="container">
				<div class="row">
					<div class="single-details-content-wrap">
						<div class="shop-details-content-title">
							<h4>Description</h4>
						</div>
						<div class="shop-details-content-description">
							<p id="fulldetail"></p>
						</div>
					</div>

					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="shop-details-content-title">
							<h4>Related Product</h4>
						</div>
					</div>
				</div>

				<div class="row" id="related_product">

				</div>
		</section> -->

		<!-- Related Product New -->
		<section class="container pd_related_product">
			<?php if (!empty($prod_details_data['related'])) { ?>
				<h4 class="text-center fw-bold">Related Product</h4>
			<?php } ?>
			<div class="related_pro">
				<div class="relatedProductSlick">
					<?php foreach ($prod_details_data['related'] as $related_prd) { ?>
						<div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-6 mx-4 mt-5">
							<div class="arrival-box home-three-arrival-box">
								<div class="mobile_sale_img">
									<div class="sale_badge_div">
										<span class="badge badge-danger"><?= $related_prd['offpercent'] ?>% off</span>
									</div>
									<div class="wishlist_img_div">
										<a onclick="product_add_wishlist('<?= $related_prd['id'] ?>', '<?= $related_prd['price'] ?>')" class="wishlist_link">
											<img src="<?= base_url ?>images/icons/wishlist.png" alt="wishlist" id="not_wishlisted_img" class="product_wishlist_image_div">
											<img src="<?= base_url ?>images/icons/wishlisted.png" alt="wishlist" id="wishlisted_img" class="product_wishlist_image_div" style="display:none;">
										</a>
									</div>
								</div>
								<div class="arrival-box-img">
									<a href="<?= base_url ?>productdetail/<?php echo $related_prd['name']; ?>/<?php echo $related_prd['id']; ?>">
										<?php $img_url = json_decode($related_prd['img_url'], true); ?>
										<img src="<?php echo base_url . 'media/' . $img_url[0]['url']; ?>" alt="">
									</a>
								</div>
								<div class="arrival-box-content text-center">
									<p>
										<a href="<?= base_url ?>productdetail/<?php echo $related_prd['name']; ?>/<?php echo $related_prd['id']; ?>">
											<?php echo substr($related_prd['name'], 0, 40) . "..."; ?>
										</a>
									</p>
									<div class="d-flex-center price_div">
										<span class="old-price me-1">₹<?php echo $related_prd['mrp']; ?></span>
										<span class="new-price ms-1">₹<?php echo $related_prd['price']; ?></span>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</section>
		<!-- Related Product Area End -->


		<!-- Shop Details Infotmation -->
		<!-- <section class="shop-details-information-area mt-100">
			<div class="container">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="single-details-content-wrap">
							<div class="shop-details-content-title">
								<h4>Add Review</h4>
							</div>
							<div class="row">
								<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 both-small-24">
									<div class="review-form">
										<div class="shop-details-share shop-details-review">
											<ul>
												<li><span>Your Rating</span></li>
												<div class="starDiv">
													<span class="star-rating">
														<input type="radio" name="rating1" value="1"><i></i>
														<input type="radio" name="rating1" value="2"><i></i>
														<input type="radio" name="rating1" value="3"><i></i>
														<input type="radio" name="rating1" value="4"><i></i>
														<input type="radio" name="rating1" value="5"><i></i>
													</span>
												</div>
											</ul>
										</div>
										<form id="contact-form" action="" method="POST" class="contat-input shop-details-contat-input">
											<div class="row">
												<div class="col-xl-12 col-lg-12 col-sm-12 col-12">
													<label class="form-check-label">Your Name*</label>
													<input type="text" name="user_name" id="user_name">
												</div>
												<div class="col-xl-12 col-lg-12 col-sm-12 col-12">
													<label class="form-check-label">Title*</label>
													<input type="text" name="title" id="title">
												</div>
												<div class="col-xl-12 col-lg-12 col-sm-12 col-12">
													<label class="form-check-label">Write Review*</label>
													<textarea name="feedback" id="feedback" cols="30" rows="4"></textarea>
												</div>
												<div class="details-page-reply-btn-wrap">
													<button id="review_save_btn" type="submit" class="common-btn shop-details-review-btn">Submit</button>
												</div>
												<div style="color:green;" id="msg_data"></div>
												<p class="form-message"></p>
											</div>
										</form>
									</div>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
									<div class="row">
										<?php
										$review_data = json_decode($prod_details_data['review']);
										$rive_cnt = 0;

										foreach ($review_data as $riview) {
											if ($rive_cnt < 5) {
										?>
												<div class="col-md-12 mb-3 mb-lg-4">
													<div class="reviewCard">
														<div class="rCardTop">
															<div class="rCardUser">
																<h4><?php echo $riview->username; ?><span style="font-size:14px;">
																		(<?php
																			if ($riview->rating == 5) {
																			?>
																		<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
																	<?php
																			} else if ($riview->rating == 4) {
																	?>
																		<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
																	<?php
																			} else if ($riview->rating == 3) {
																	?>
																		<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
																	<?php
																			} else if ($riview->rating == 2) {
																	?>
																		<i class="fas fa-star"></i><i class="fas fa-star"></i>
																	<?php
																			} else if ($riview->rating == 1) {
																	?>
																		<i class="fas fa-star"></i>
																	<?php
																			}

																	?> - <?php echo $riview->rating; ?>/5 Stars) (<?php echo date('d-m-Y', strtotime($riview->date)); ?>)</span></h4>
															</div>

														</div>
														<div class="rCardMiddle">
															<b><?php echo $riview->title; ?></b>
															<p><?php echo $riview->feedback; ?></p>
														</div>
													</div>
												</div>
										<?php $rive_cnt++;
											}
										} ?>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section> -->
		<br><br>

		<!-- Shop Details Infotmation End -->
	</main>

	<!-- Footer Area -->
	<?php include("includes/footer.php") ?>
	<!-- Footer Area End -->

	<?php include("includes/script.php") ?>


	<!-- Image Zoom -->
	<script>
		let zoom_img_num = $("#image_counter").val();
		var options = {
			// required
			// more options here
			fillContainer: true,
			height: 450,
			offset: {
				vertical: 0,
				horizontal: 10
			}
		};
		var options1 = {
			fillContainer: true,
			height: 450,
			offset: {
				vertical: 0,
				horizontal: 10
			},
			zoomPosition: 'left',
		};
		for (let index = 1; index < zoom_img_num + 1; index++) {
			if (index % 2 == 0) {
				new ImageZoom(document.getElementById("img-container_" + index), options1);
			} else {
				new ImageZoom(document.getElementById("img-container_" + index), options);
			}
		}
	</script>


	<script>
		window.addEventListener("load", () => {
			// if (window.innerWidth <= "576px") {
			var swiper1 = new Swiper(".mobile_gallary", {
				slidesPerView: 1,
				spaceBetween: 30,
				freeMode: true,
				zoom: true,
				effect: "creative",
				creativeEffect: {
					prev: {
						shadow: true,
						translate: ["-120%", 0, -500],
					},
					next: {
						shadow: true,
						translate: ["120%", 0, -500],
					},
				},
				scrollbar: {
					el: ".swiper-scrollbar",
					draggable: true,
					dragSize: '15px'
				},
				navigation: {
					nextEl: ".swiper-button-next",
					prevEl: ".swiper-button-prev",
				},
				pagination: {
					el: ".swiper-pagination",
				},
			});
			// }
		})
	</script>

	<script src="<?php echo base_url . 'assets/js/productdetail.js'; ?>"></script>
	<script>
		function add_product_qty(type) {
			curr_qty = $("#quantity").val();
			if (parseInt(curr_qty) == 1 && type == "-1") {
				toastr.error("Minimum 1 quantity is available");
			} else {
				if (type == "1") {
					curr_qty = parseInt(curr_qty) + 1;
				} else {
					curr_qty = parseInt(curr_qty) - 1;
				}
				$("#quantity").val(curr_qty);
			}
		}

		$(function() {
			window.onload = attr_data_change(event);
		});

		$('#quantity').val();
		var csrfName = $(".txt_csrfname").attr("name"); //
		var csrfHash = $(".txt_csrfname").val(); // CSRF hash
		var site_url = "<?= base_url() ?>"; // CSRF hash
		var securecode = $(".securecode").val();
		$(document).ready(function(e) {
			$("#image-upload-form").on('submit', (function(e) {
				e.preventDefault();
				$.ajax({
					url: site_url + 'custom_image',
					//	url: "upload.php",
					type: "POST",
					data: new FormData(this),
					contentType: false,
					cache: false,
					processData: false,
					success: function(data) {
						$("#targetLayer").html(data);
					},
					error: function(data) {
						console.log("error");
						console.log(data);
					}
				});
			}));
		});

		// Add to Cart
		function single_product_add_cart(product_id, product_price) {
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
						toastr.warning('Please Select Arrtibutes');
					} else if (parseInt(quantity) > total_stock) {
						toastr.warning('Only ' + total_stock + ' Qty Available');
					} else if (parseInt(quantity) > total_stock_single) {
						toastr.warning('Only ' + total_stock_single + ' Qty Available');
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
							//data: {language : 1 , securecode : securecode, prod_id : prod_id, [csrfName]: csrfHash},
							data: {
								language: 1,
								securecode: securecode,
								size: product_size,
								color: product_color,
								user_id: '<?php echo $this->session->userdata('user_id'); ?>',
								prod_id: product_id,
								prod_price: product_price,
								qty: quantity,
								custom_title: custom_title,
								custom_image: price,
								[csrfName]: csrfHash
							},
							success: function(html) {
								get_cart_products('<?php echo $this->session->userdata('user_id'); ?>');
								$("#cart" + product_id).html('<i class="fa fa-cart-plus" aria-hidden="true"></i>');
								var catObj = JSON.parse(html)
								// Set the count of cart
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

		// Add to Wishlist
		function product_add_wishlist(product_id, product_price) {
			var quantity = 1;
			let user_id = $("#user_id").val();
			// alert(user_id);
			if (user_id != "") {
				if (product_id) {
					$("#wishlist" + product_id).html('<i class="fa fa-spinner fa-spin"></i>');
					$.ajax({
						type: "POST",
						url: site_url + "add_prod_into_wishlist",

						data: {
							language: 1,
							securecode: securecode,
							user_id: user_id,
							prod_id: prod_id,
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

		function attr_data_change(event) {
			//var selectElement = event.target;
			//var value = selectElement.value;
			value = $("#attr_data option:selected").val();
			price = $("#attr_data option:selected").attr('data-id');
			if (value != 'undefined') {
				// alert(value);
				$("#mrp").text(value);
				$("#price").text(price);
			}
			//$("#price").html(this.price);
			//alert(value);
		}
	</script>

</body>

</html>