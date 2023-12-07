<script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/libs/bootstrap-5.3.2/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?php echo base_url('assets/libs/sweetalert2/sweetalert2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/app/common.js') ?>"></script>

<script>
	function isNumberKey(evt) {
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode != 46)
			return false;
		return true;
	}
	var csrfName = $(".txt_csrfname").attr("name"); // 
	var csrfHash = $(".txt_csrfname").val(); // CSRF hash
	var site_url = '<?= base_url() ?>'
	var securecode = $(".securecode").val();
	var user_id = $("#user_id").val();

	$(function() {
		window.onload = get_cart_products(user_id);
		window.onload = get_wishlist_products(user_id);
		window.onload = get_category();
	});


	function get_category() {
		$.ajax({
			type: "POST",
			url: site_url + 'getcategory',
			data: {
				language: 1,
				securecode: securecode,
				[csrfName]: csrfHash
			},
			success: function(response) {
				var catObj = JSON.parse(response);
				var categoryArray = catObj.Information;

				categoryArray.slice(0, 9).forEach(function(maincat) {
					var menuLi = $('<li>').addClass('menu-li');
					var menuLink = $('<a>').attr('href', site_url + 'sub_category/' + maincat.cat_id).addClass('menu-item py-3').text(maincat.cat_name);
					menuLi.append(menuLink);

					if (maincat.subcat_1.length > 0) {
						var megaMenu = $('<div>').addClass('mega-menu');
						var content = $('<div>').addClass('content box-shadow-0');

						for (var i = 0; i < 4; i++) {
							if (maincat.subcat_1[i * 2]) {
								var subcat = maincat.subcat_1[i * 2];
								var subcatCol = $('<div>').addClass('col px-2 py-4');
								var section = $('<section>');

								var subcatHeading = $('<a>').attr('href', site_url + 'sub_category/' + subcat.cat_id).addClass('item-heading').text(subcat.cat_name);
								section.append(subcatHeading);

								if (subcat.subsubcat_2.length > 0) {
									var subsubcatUl = $('<ul>').addClass('mega-links px-0');

									for (var j = 0; j < Math.min(subcat.subsubcat_2.length, 5); j++) {
										var subsubcat = subcat.subsubcat_2[j];
										var subsubcatLi = $('<li>').append(
											$('<a>').attr('href', site_url + 'sub_category/' + subsubcat.cat_id).text(subsubcat.cat_name)
										);
										subsubcatUl.append(subsubcatLi);
									}

									section.append(subsubcatUl);

									if (subcat.subsubcat_2.length > 5) {
										section.append(
											$('<a>').addClass('view-all').attr('href', site_url + 'sub_category/' + subcat.cat_id).text('view all ').append(
												$('<i>').addClass('fa-solid fa-arrow-right')
											)
										);
									}
								}

								subcatCol.append(section);
								content.append(subcatCol);
							}

							if (maincat.subcat_1[i * 2 + 1]) {
								var subcat = maincat.subcat_1[i * 2 + 1];
								var subcatCol = $('<div>').addClass('col px-2 py-4');
								var section = $('<section>');

								var subcatHeading = $('<a>').attr('href', site_url + 'sub_category/' + subcat.cat_id).addClass('item-heading').text(subcat.cat_name);
								section.append(subcatHeading);

								if (subcat.subsubcat_2.length > 0) {
									var subsubcatUl = $('<ul>').addClass('mega-links px-0');

									for (var j = 0; j < Math.min(subcat.subsubcat_2.length, 3); j++) {
										var subsubcat = subcat.subsubcat_2[j];
										var subsubcatLi = $('<li>').append(
											$('<a>').attr('href', site_url + 'sub_category/' + subsubcat.cat_id).text(subsubcat.cat_name)
										);
										subsubcatUl.append(subsubcatLi);
									}

									section.append(subsubcatUl);

									if (subcat.subsubcat_2.length > 3) {
										section.append(
											$('<a>').addClass('view-all').attr('href', site_url + 'sub_category/' + subcat.cat_id).text('view all ').append(
												$('<i>').addClass('fa-solid fa-arrow-right')
											)
										);
									}
								}

								subcatCol.append(section);
								content.append(subcatCol);
							}
						}

						var colImage = $('<div>').addClass('col col-image px-2 pb-5');
						var row = $('<div>').addClass('row g-2 justify-content-center mt-3');
						var col12a = $('<div>').addClass('col-12');
						var col12b = $('<div>').addClass('col-12');
						var img1 = $('<img>').addClass('nav-img').attr('src', site_url + 'media/' + maincat.imgurl).attr('alt', 'google-store');
						// var img2 = $('<img>').addClass('nav-img').attr('src', site_url + 'media/' + maincat.web_banner).attr('alt', 'app-store');

						col12a.append($('<a>').attr('href', '#').append(img1));
						// col12b.append($('<a>').attr('href', '#').append(img2));
						row.append(col12a, $('<br>'), col12b);
						colImage.append(row);
						content.append(colImage);
						megaMenu.append(content);
						menuLi.append(megaMenu);
					}

					$('#category-container').append(menuLi);
				});
			}
		});
	}

	function create_product_url(strings) {
		if (strings) {
			product_name = strings.replace(/,/g, "");
			product_name = product_name.replace(/  /g, "-");
			product_name = product_name.replace(/ /g, "-");
			product_name = product_name.replace(/_/g, "-");
			product_name = product_name.replace(/&/g, "");
			product_name = product_name.replace(/$/g, "-");
			product_name = product_name.replace(/@/g, "-");
			product_name = product_name.replace(/'/g, "");
			product_name = product_name.replace(/"/g, "");
			product_name = product_name.replace(/,/g, "");
			product_name = product_name.replace(/#/g, "");

			product_name = product_name.replace(/%/g, "");

			product_name = product_name.replace(/^/g, "");

			product_name = product_name.replace(/\(|\)/g, "");

			product_name = product_name.replace(/\+/g, "");

			product_name = product_name.replace(/=/g, "");

			product_name = product_name.replace(/!/g, "");

			product_name = product_name.replace(/{/g, "");

			product_name = product_name.replace(/}/g, "");

			//	product_name=	product_name.replace(/\[\/g, "");

			product_name = product_name.replace(/--/g, "-");

			product_name = product_name.replace(/|/g, "");

			product_name = product_name.replace(/\//g, "");

			product_name = product_name.replace(".", "");

			return product_name;

		}



	}

	function get_wishlist_products(ids) {
		//alert('dddd');
		if (ids) {
			$.ajax({
				type: "POST",
				url: site_url + 'getuserwishlist',
				data: {
					language: 1,
					securecode: securecode,
					user_id: user_id,
					[csrfName]: csrfHash
				},
				success: function(html) {
					var catObj = JSON.parse(html);
					var wishArray = catObj.Information;
					var total_wishlist = wishArray.length;
					$("#wishlist_total_count").text(total_wishlist);
					$("#wishlist_mob_total_count").text(total_wishlist);
					//alert(total_wishlist);
					var wishlist_html = '';
					for (w = 0; w < total_wishlist; w++) {
						var wish_prod = wishArray[w];
						var imageObj = JSON.parse(wish_prod.img_url);
						var product_id = wish_prod.id;
						var product_name = wish_prod.name;
						var product_price = wish_prod.price;
						wishlist_html += '<tr><td><div class="cart-product-img-wrap"><div class="single-cart-product-box"><div class="single-cart-img"><img width="80px" src="../media/' + imageObj[0].url + '" alt="' + product_name + '"><p>' + product_name + '</p></div><div class="single-cart-product-x-icon"><a  onclick="product_delete_wishlist(' + product_id + ')"><i class="bx bx-x bx-sm"></i></a></div></div></div></td><td><p><span>₹ ' + product_price + '</span></p></td>';
						wishlist_html += '<td><a onclick="wishlist_add_cart(' + product_id + ',' + product_price + ');" class="cart-btn common-btn">Add To Cart</a></td></tr>';
					}
					//alert(wishlist_html);
					$("#wishlist_product_list").html(wishlist_html);
					$("#wishlist_count").text(total_wishlist);
				}
			});
		}
	}

	function get_cart_products(ids) {
		if (ids) {
			$.ajax({
				type: "POST",
				url: site_url + 'getusercartdetails',
				data: {
					language: 1,
					securecode: securecode,
					user_id: user_id,
					[csrfName]: csrfHash
				},
				success: function(html) {
					var catObj = JSON.parse(html);
					var cartArray = catObj.Information;
					var total_cart = cartArray.prod_details.length;
					$("#cart_count_mobile").text(total_cart);
					$("#cart_count").text(total_cart);
					// $("#cart_count_mobile").text(total_cart);
				}
			});
		}
	}
</script>


<script>
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
							// $("#cart" + product_id).html('<i class="fa fa-cart-plus" aria-hidden="true"></i>');
							var catObj = JSON.parse(html)
							// Set the count of cart
							$("#cart_count_mobile").html = catObj.Information.cart_count;

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

	function AllowOnlyNumbers(e) {

		e = (e) ? e : window.event;
		var clipboardData = e.clipboardData ? e.clipboardData : window.clipboardData;
		var key = e.keyCode ? e.keyCode : e.which ? e.which : e.charCode;
		var str = (e.type && e.type == "paste") ? clipboardData.getData('Text') : String.fromCharCode(key);

		return (/^\d+$/.test(str));
	}
</script>