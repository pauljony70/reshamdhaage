<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title><?= get_store_settings('store_name') ?> - Home</title>
	<?php include("includes/head.php") ?>
	<link rel="stylesheet" href="<?= base_url('assets/css/index.css') ?>">
</head>

<body>
	<?php include("includes/preloader.php") ?>
	<?php include("includes/topbar.php"); ?>
	<?php include("includes/navbar.php"); ?>

	<main>
		<!--
		  	--------------------------------------------------- 
		  	Top full height video
		  	---------------------------------------------------
		-->
		<div class="top-video">
			<video src="<?= base_url('media/video.mp4') ?>" class="w-100" autoplay muted></video>
		</div>
		<!--
		  --------------------------------------------------- 
		  Top Links
		  ---------------------------------------------------
		-->
		<div class="container">
			<!--
		  		--------------------------------------------------- 
		  		Top Links
		  		---------------------------------------------------
			-->
			<div class="top-links pb-4">
				<div class="row">
					<div class="col-md-4 mb-2">
						<a href="#" class="btn btn-outline-primary w-100">New Arrivals</a>
					</div>
					<div class="col-md-4 mb-2">
						<a href="#" class="btn btn-outline-primary w-100">New Arrivals</a>
					</div>
					<div class="col-md-4 mb-2">
						<a href="#" class="btn btn-outline-primary w-100">New Arrivals</a>
					</div>
				</div>
			</div>
			<!--
				--------------------------------------------------- 
				Top category
				---------------------------------------------------
			-->
			<div class="top-category pt-4 mb-5">
				<h1 class="heading text-center mb-4">Shop By Category</h1>
				<div class="row">
					<div class="col-6 col-md-3 mb-4">
						<img src="<?= base_url('assets/images/category1.jpeg') ?>" alt="Category" srcset="" class="w-100">
					</div>
					<div class="col-6 col-md-3 mb-4">
						<img src="<?= base_url('assets/images/category2.jpeg') ?>" alt="Category" srcset="" class="w-100">
					</div>
					<div class="col-6 col-md-3 mb-4">
						<img src="<?= base_url('assets/images/category3.jpeg') ?>" alt="Category" srcset="" class="w-100">
					</div>
					<div class="col-6 col-md-3 mb-4">
						<img src="<?= base_url('assets/images/category4.jpeg') ?>" alt="Category" srcset="" class="w-100">
					</div>
				</div>
			</div>
			<!--
				--------------------------------------------------- 
				Trending Now
				---------------------------------------------------
			-->
			<div class="trending-now pt-4 mb-5">
				<h1 class="heading text-center mb-4">Trending Now</h1>
				<div class="row">
					<div class="col-md-4 mb-4">
						<img src="<?= base_url('assets/images/trending1.jpeg') ?>" alt="Category" srcset="" class="w-100">
					</div>
					<div class="col-md-4 mb-4">
						<img src="<?= base_url('assets/images/trending2.jpeg') ?>" alt="Category" srcset="" class="w-100">
					</div>
					<div class="col-md-4 mb-4">
						<img src="<?= base_url('assets/images/trending3.jpeg') ?>" alt="Category" srcset="" class="w-100">
					</div>
				</div>
			</div>
		</div>
		<!--
			--------------------------------------------------- 
			Full width banner
			---------------------------------------------------
		-->
		<div class="promo-banner">
			<img src="<?= base_url('assets/images/promo-banner1.jpeg') ?>" alt="Category" srcset="" class="w-100 mb-5">
			<img src="<?= base_url('assets/images/promo-banner2.jpeg') ?>" alt="Category" srcset="" class="w-100 mb-5">
			<img src="<?= base_url('assets/images/promo-banner3.jpeg') ?>" alt="Category" srcset="" class="w-100 mb-5">
		</div>
		<div class="container">
			<div class="top-links mb-4">
				<div class="row">
					<div class="col-md-3 mb-2">
						<a href="#" class="btn btn-outline-primary w-100 h-100">
							<div class="d-flex align-items-center justify-content-center h-100">Shop Jwellery</div>
						</a>
					</div>
					<div class="col-md-3 mb-2">
						<a href="#" class="btn btn-outline-primary w-100 h-100">
							<div class="d-flex align-items-center justify-content-center h-100">Shop Bags</div>
						</a>
					</div>
					<div class="col-md-3 mb-2">
						<a href="#" class="btn btn-outline-primary w-100 h-100">
							<div class="d-flex align-items-center justify-content-center h-100">Shop Footwear</div>
						</a>
					</div>
					<div class="col-md-3 mb-2">
						<a href="#" class="btn btn-outline-primary w-100 h-100">
							<div class="d-flex align-items-center justify-content-center h-100">Shop Scraves</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</main>

	<!-- Footer Area -->
	<?php include("includes/footer.php") ?>
	<!-- Footer Area End -->

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