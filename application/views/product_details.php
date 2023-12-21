<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title><?= get_store_settings('store_name') ?> - Product Details</title>

	<meta name="og_title" property="og:title" content="<?= $prod_details_data['Information']['name']; ?>" />
	<meta name="og_site_name" property="og:site_name" content="<?= base_url() ?>" />


	<meta property="og:description" content="<?= strip_tags($prod_details_data['Information']['short_desc']); ?>" />

	<meta name="og_image" property="og:image" content="<?= base_url() . 'media/' . json_decode($prod_details_data['Information']['img_url'])[0]->url; ?>" />

	<?php include("includes/head.php"); ?>

	<!-- Plugin css -->
	<link rel="stylesheet" href="<?= base_url('assets/libs/swiper/swiper-bundle.min.css') ?>" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">

	<!-- Custom Css -->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/productdetails.css') ?>">
</head>



<body>
	<!-- Preloder -->
	<?php include("includes/preloader.php"); ?>
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

		<section class="shop-details-product my-2">
			<div class="container">
				<?php $image_data = json_decode($prod_details_data['Information']['img_url']) ?>

				<nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item"><a href="#">Women</a></li>
						<li class="breadcrumb-item"><a href="#">All Clothing </a></li>
						<li class="breadcrumb-item"><a href="#">Dresses </a></li>
						<li class="breadcrumb-item active" aria-current="page"><?= $prod_details_data['Information']['name']; ?></li>
					</ol>
				</nav>

				<div class="row product-details-div mb-5">
					<div class="col-lg-6">
						<div class="row product-gallery mb-4">
							<div class="col-lg-3 d-none d-lg-block h-100 ps-lg-1">
								<div thumbsSlider="" class="swiper product-details-swiper-sm-desktop py-0">
									<div class="swiper-wrapper">
										<?php foreach ($image_data as $img) : ?>
											<div class="swiper-slide">
												<img src="<?= base_url('media/' . $img->url) ?>" class="w-100 h-100" />
											</div>
										<?php endforeach; ?>
									</div>
								</div>
							</div>
							<div class="col-lg-9 h-100 pe-lg-1">
								<div class="swiper product-details-swiper-desktop">
									<div class="swiper-wrapper">
										<?php foreach ($image_data as $img) : ?>
											<a class="swiper-slide spotlight zoom-img" data-fancybox="mobile-group" href="<?= base_url('assets/images/producta1.jpeg') ?>">
												<img src="<?= base_url('media/' . $img->url) ?>" class="w-100" />
											</a>
										<?php endforeach; ?>
									</div>
									<div class="swiper-button-next"></div>
									<div class="swiper-button-prev"></div>
								</div>
							</div>
						</div>
						<div class="row d-none d-lg-flex">
							<div class="col-12 px-0">
								<div class="accordion" id="accordionPanelsStayOpenExample">
									<div class="accordion-item">
										<h2 class="accordion-header">
											<button class="accordion-button px-0" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
												Accordion Item #1
											</button>
										</h2>
										<div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
											<div class="accordion-body px-0">
												<strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
											</div>
										</div>
									</div>
									<div class="accordion-item">
										<h2 class="accordion-header">
											<button class="accordion-button px-0 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
												Accordion Item #2
											</button>
										</h2>
										<div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
											<div class="accordion-body px-0">
												<strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
											</div>
										</div>
									</div>
									<div class="accordion-item">
										<h2 class="accordion-header">
											<button class="accordion-button px-0 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
												Accordion Item #3
											</button>
										</h2>
										<div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
											<div class="accordion-body px-0">
												<strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 ps-lg-5">
						<div class="d-flex align-items-center justify-content-between mb-3">
							<h2 class="product-name mb-0"><?= $prod_details_data['Information']['name'] ?></h2>
							<div class="toggle-btn d-flex">
								<span class="share-icon">
									<div class="d-flex align-items-center" id="share-btn">
										<img src="<?= base_url('assets/images/icons/share.svg') ?>" alt="Share">
									</div>
									<div class="hover-card box-shadow">
										<div class="d-flex justify-content-between flex-wrap">
											<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?= $actual_link ?>" title="Facebook Share" class="brand-icon facebook">
												<img src="<?= base_url('assets/images/brands/facebook.svg') ?>" alt="Facebook" srcset="">
											</a>
											<a target="_blank" href="whatsapp://send?text=<?= $actual_link ?>" class="brand-icon whatsapp">
												<img src="<?= base_url('assets/images/brands/whatsapp.svg') ?>" alt="Facebook" srcset="">
											</a>
											<a target="_blank" href="http://twitter.com/share?url=<?= $actual_link ?>&text=I ♥ this product on Rentzo! <?= $productdetails['name']; ?>&via=Rentzo&hashtags=buyonRentzo" class="brand-icon twitter">
												<img src="<?= base_url('assets/images/brands/twitter.svg') ?>" alt="Twitter" srcset="">
											</a>
											<a target="_blank" href="https://www.pinterest.com/pin/create/button/?url=<?= $actual_link ?>&media=<?= urlencode(base_url() . 'media/' . $main_url_img) ?>&description=<?= urlencode($productdetails['name'] . ' - ' . strip_tags($productdetails['short_desc'])) ?>" class="brand-icon pinterest">
												<img src="<?= base_url('assets/images/brands/pinterest.svg') ?>" alt="Pinterest" srcset="">
											</a>
										</div>
										<span class="arrow"></span>
									</div>
								</span>
								<span class="mobile-share-icon" onclick="mobileShareLink('<?= $actual_link ?>')">
									<div class="d-flex align-items-center" id="share-btn">
										<img src="<?= base_url('assets/images/icons/share.svg') ?>" alt="Share">
									</div>
								</span>
							</div>
						</div>
						<div class="d-flex flex-wrap align-items-center">
							<div class="product-price"><?= price_format($prod_details_data['Information']['price']) ?></div>
							<div class="product-mrp text-decoration-line-through fw-light ms-3"><?= price_format($prod_details_data['Information']['mrp']) ?></div>
							<span class="badge rounded-pill text-bg-secondary fw-semibold offpercent ms-3">SAVE <?= number_format(($prod_details_data['Information']['mrp'] - $prod_details_data['Information']['price']) / $prod_details_data['Information']['mrp'] * 100, 2) ?>%</span>
						</div>
						<div class="text-muted">MRP Inclusive of all taxes</div>
						<hr>
						<div class="pDetails">
							<div class="product-size mb-4 mb-lg-4">
								<span class="fs-6 fw-semibold">Color</span>
								<div class="p-size mb-3">
									<div class="btn-group" role="group" aria-label="Basic radio toggle button group">
										<input type="radio" class="btn-check attribute-values" attribute-label="Color" name="btnradio_Color" id="#43549f" value="#43549f" autocomplete="off">
										<label style="background-color:#43549f; border: 2px solid rgb(53.6,67.2,127.2)" class="Color btn btn-outline-primary " for="#43549f">
										</label>
									</div>
									<div class="btn-group" role="group" aria-label="Basic radio toggle button group">
										<input type="radio" class="btn-check attribute-values" attribute-label="Color" name="btnradio_Color" id="#4870FF" value="#4870FF" autocomplete="off">
										<label style="background-color:#4870FF; border: 2px solid rgb(57.6,89.6,204)" class="Color btn btn-outline-primary " for="#4870FF">
										</label>
									</div>
								</div>
								<span class="fs-6 fw-semibold">Size</span>
								<div class="p-size mb-3">
									<div class="btn-group" role="group" aria-label="Basic radio toggle button group">
										<input type="radio" class="btn-check attribute-values" attribute-label="Color" name="btnradio_Size" id="#12" value="#12" autocomplete="off">
										<label class="Size btn btn-outline-primary " for="#12">
											12
										</label>
									</div>
									<div class="btn-group" role="group" aria-label="Basic radio toggle button group">
										<input type="radio" class="btn-check attribute-values" attribute-label="Color" name="btnradio_Size" id="#14" value="#14" autocomplete="off">
										<label class="Size btn btn-outline-primary " for="#14">
											14
										</label>
									</div>
								</div>
							</div>
						</div>
						<div class="fs-6 fw-semibold mb-2">Quantity</div>
						<div class="row mb-1">
							<div class="col-5">
								<select name="quantity" id="quantity" class="form-select">
									<?php for ($i = 1; $i <= 10; $i++) : ?>
										<option value="<?= $i ?>"><?= $i ?></option>
									<?php endfor; ?>
								</select>
							</div>
						</div>
						<div class="fs-6 mb-4">In Stock</div>
						<!-- Add to Cart and By now and Whatsapp Buttons -->
						<div class="row align-items-center bg-white btn-wrap mb-3">
							<div class="col-9">
								<a class="btn btn-primary w-100">Buy Now</a>
							</div>
							<div class="col-3">
								<a class="btn btn-light wishlist-btn heart-container" onclick="">
									<div class="d-flex justify-content-center align-items-center h-100">
										<i class="fa-<?= $productdetails['wishlist_count'] > 0 ? 'solid' : 'regular' ?> fa-heart add-to-wishlist"></i>
									</div>
								</a>
							</div>
						</div>
						<a href="#" target="_blank" class="fs-6 text-dark text-decoration-underline mb-4" rel="noopener noreferrer">Return and exchange policy</a>
						<div class="accordion d-md-none" id="accordionPanelsStayOpenExample">
							<div class="accordion-item">
								<h2 class="accordion-header">
									<button class="accordion-button px-0" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
										Accordion Item #1
									</button>
								</h2>
								<div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
									<div class="accordion-body">
										<strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
									</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header">
									<button class="accordion-button px-0 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
										Accordion Item #2
									</button>
								</h2>
								<div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
									<div class="accordion-body">
										<strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
									</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header">
									<button class="accordion-button px-0 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
										Accordion Item #3
									</button>
								</h2>
								<div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
									<div class="accordion-body">
										<strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="similar-products-div">
					<div class="text-center heading fs-3 fw-bolder mb-4">Similar Products</div>
					<div class="swiper similar-prod-swiper">
						<div class="swiper-wrapper" id="recently_viewed_products">
							<?php for ($i = 0; $i < 10; $i++) : ?>
								<div class="swiper-slide">
									<a href="#" class="d-flex flex-column card product-card rounded-0">
										<div class="product-card-img zoom-img rounded-0">
											<img src="<?= base_url('assets/images/similiar-product-1.jpeg') ?>" class="card-img-top rounded-0" alt="Mint Floral Satin Top">
										</div>
										<div class="card-body d-flex flex-column product-card-body ps-0">
											<h5 class="card-title product-title line-clamp-1 pb-2 fs-6">Mint Floral Satin Top</h5>
											<div class="card-text d-flex py-1">
												<div class="sell-price fw-medium"><?= price_format(2199) ?></div>
												<div class="mrp-price text-decoration-line-through fw-light ms-3"><?= price_format(2199) ?></div>
											</div>
										</div>
									</a>
								</div>
								<div class="swiper-slide">
									<a href="#" class="d-flex flex-column card product-card rounded-0">
										<div class="product-card-img zoom-img rounded-0">
											<img src="<?= base_url('assets/images/similiar-product-2.jpeg') ?>" class="card-img-top rounded-0" alt="Mint Floral Satin Top">
										</div>
										<div class="card-body d-flex flex-column product-card-body ps-0">
											<h5 class="card-title product-title line-clamp-1 pb-2 fs-6">Mint Floral Satin Top</h5>
											<div class="card-text d-flex py-1">
												<div class="sell-price fw-medium"><?= price_format(2199) ?></div>
												<div class="mrp-price text-decoration-line-through fw-light ms-3"><?= price_format(2199) ?></div>
											</div>
										</div>
									</a>
								</div>
								<div class="swiper-slide">
									<a href="#" class="d-flex flex-column card product-card rounded-0">
										<div class="product-card-img zoom-img rounded-0">
											<img src="<?= base_url('assets/images/similiar-product-3.jpeg') ?>" class="card-img-top rounded-0" alt="Mint Floral Satin Top">
										</div>
										<div class="card-body d-flex flex-column product-card-body ps-0">
											<h5 class="card-title product-title line-clamp-1 pb-2 fs-6">Mint Floral Satin Top</h5>
											<div class="card-text d-flex py-1">
												<div class="sell-price fw-medium"><?= price_format(2199) ?></div>
												<div class="mrp-price text-decoration-line-through fw-light ms-3"><?= price_format(2199) ?></div>
											</div>
										</div>
									</a>
								</div>
							<?php endfor; ?>
						</div>
						<div class="swiper-button-next"></div>
						<div class="swiper-button-prev"></div>
					</div>
				</div>
			</div>
		</section>
		<!-- Shop Details Top Area End -->

	</main>

	<!-- Footer Area -->
	<?php include("includes/footer.php") ?>
	<!-- Footer Area End -->

	<?php include("includes/script.php") ?>

	<!-- Plugin JS -->
	<script src="<?= base_url('assets/libs/swiper/swiper-bundle.min.js') ?>"></script>
	<script src="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

	<!-- Custom JS -->
	<script src="<?= base_url('assets/js/app/productdetail.js'); ?>"></script>


	<script>
		/* function add_product_qty(type) {
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
		} */
	</script>

</body>

</html>