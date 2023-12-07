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
		<input type="hidden" name="cat_id" id="cat_id" value="<?php echo $cat_id; ?>">

		<section>
			<div class="breadcrumb-area py-3">
				<div class="container">
					<div class="row">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="breadcrumb-content text-center">
								<h3 class="category_head_name"><?php echo urldecode($cat_name); ?></h3>
								<div class="breadcrumb-link">
									<p><a href="/">Home</a></p>
									<span></span>
									<p><?php echo urldecode($cat_name); ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- Shop Area -->

		<!-- <?php
		echo "<pre>";
		print_r($category_details);
		echo "</pre>";
		?> -->

		<section class="shop-area mt-4">
			<div class="container">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="row shop-grid-three" id="category_product_list">
							<?php foreach ($category_details['Information'] as $popular_product_data) { ?>
								<div class="col-xl-2 col-lg-2 col-md-6 col-sm-12 col-6">
									<div class="arrival-box home-three-arrival-box">
										<div class="arrival-box-img">
											<?php $images = json_decode($popular_product_data['img_url']) ?>
											<a href="<?=base_url?>productdetail/<?php echo $popular_product_data['name']; ?>/<?php echo $popular_product_data['id']; ?>">
												<img src="<?php echo base_url. 'media/' . $images[0]->url; ?>" alt="">
											</a>
										</div>
										<div class="arrival-box-content text-center">
											<p><a href="<?=base_url?>productdetail/<?php echo $popular_product_data['name']; ?>/<?php echo $popular_product_data['id']; ?>"><?php echo substr($popular_product_data['name'], 0, 40) . "..."; ?></a></p>
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

						<div class="row shop-grid-two shop-grid-none" id="category_product_list">
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

	<script>
		var csrfName = $(".txt_csrfname").attr("name"); // 
		var csrfHash = $(".txt_csrfname").val(); // CSRF hash
		var site_url = $(".site_url").val(); // CSRF hash
		var securecode = $(".securecode").val();
		var user_id = $(".user_id").val();

		$(function() {
			window.onload = category_product_list();
		});
		//function for get category all products
		// category_product_list();

		function category_product_list() {
			var caterory_id = $('#cat_id').val();
			$.ajax({
				type: "POST",
				url: site_url + 'getcategory_product',
				data: {
					language: 1,
					securecode: securecode,
					catid: caterory_id,
					[csrfName]: csrfHash
				},

				success: function(html) {
					console.log(html);
					var category_product_list = category_product_html = '';
					var catObjs = JSON.parse(html);
					var categorysArray = catObjs.Information;
					//FUNCTION FOR CREATE sub category slider
					//	get_sub_category(catObjs.Information.subcategory);
					var totalArrays = categorysArray.length;
					if (totalArrays > 0) {
						for (var i = 0; i < totalArrays; i++) {
							var catArrayproduct = categorysArray[i];
							var imageObj = JSON.parse(catArrayproduct.img_url);
							var product_name = create_product_url(catArrayproduct.name);
							if (catArrayproduct.pricearray) {
								var pricearray = catArrayproduct.pricearray;
							} else {
								var pricearray = '';
							}

							if (pricearray.length > 2) {
								var price_obj = JSON.parse(pricearray);
								var prices = price_obj[0].attrvalue;
								var mrps = price_obj[0].attrmrpvalue;
								var discount = (mrps - prices);
								var off_cal = (discount / mrps) * 100;
								var offs = off_cal.toFixed(0);
							} else {
								var prices = catArrayproduct.price;
								var mrps = catArrayproduct.mrp;
								var offs = catArrayproduct.offpercent;
							}
							if (imageObj[0]) {
								var img_url = imageObj[0].url;
							} else {
								var img_url = '';
							}
							prices = prices.replace(/,/g, '');
							var titles = catArrayproduct.name.slice(0, 30) + (catArrayproduct.name.length > 30 ? "..." : "");


							category_product_list += '<div class="col-xxl-2 col-xl-2 col-lg-4 col-md-4 col-sm-12 col-6"><div class="home-one-product-box"><div class="home-one-product-img"><a href="' + site_url + 'productdetail/' + catArrayproduct.name + '/' + catArrayproduct.id + '"><img src="<?php echo base_url; ?>../media/' + img_url + '" alt="' + catArrayproduct.name + '"></a></div><div class="home-one-product-content text-center"><span><a href="' + site_url + 'productdetail/' + catArrayproduct.name + '/' + catArrayproduct.id + '">' + titles + '</a></span><div class="home-one-product-price-list"><ul><li>₹ ' + prices + '</li><li><del>₹ ' + mrps + '</del></li></ul></div></div></div></div>';
						}
						$("#category_product_list").html(category_product_list);
					} else {
						$("#category_product_list").html('<div class="no-record text-center mb-76">' + catObjs.msg + '</div>');
					}
				}
			});
		}
	</script>



</body>



</html>