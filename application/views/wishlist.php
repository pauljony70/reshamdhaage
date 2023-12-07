<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Wishlist - Mkkirana</title>
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

    <!-- <main>
        <section>
            <div class="breadcrumb-area">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="breadcrumb-content text-center">
                                <h3>Wishlist</h3>
                                <div class="breadcrumb-link">
                                    <p><a href="/">Home</a></p>
                                    <span></span>
                                    <p>Wishlist</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="cart-product-area mt-50">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="cart-product-details-wrap cart-product-details-wrap-responsive pt-0">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Product </th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody id="wishlist_product_list">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main> -->

    <main class="wishlist-page my-order-page cart-page">
        <!--Start: Wishlist Section -->
        <div class="pd_top_banner breadcrumb">
            <div class="pd_dress_name_bread_div">
                <h4 class="pd_dress_name_bread">Wishlist</h4>
                <nav aria-label="breadcrumb" class="d-flex-center breadcrumb_ul_list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url ?>dashboard">Home</a></li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row px-sm-9 my-4 mx-2">
            <?php
            include('includes/usersidebardesktop.php');
            ?>

            <div class="col-12 col-md-8 px-sm-0">
                <?php if (!empty($wishlist_data['Information'])) { ?>
                    <?php foreach ($wishlist_data['Information'] as $wishlist_product) { ?>
                        <div class="cart-details card box-shadow-4 py-2 my-2">
                            <div class="cart-body">
                                <div class="row">
                                    <div class="col-3 col-md-3">
                                        <?php
                                        $images = json_decode($wishlist_product['img_url'], true);
                                        ?>
                                        <a href="<?php echo base_url . $wishlist_product['web_url'] . '?pid=' . $wishlist_product['prodid'] . '&sku=' . $wishlist_product['sku'] . '&sid=' . $wishlist_product['vendor_id']; ?>">
                                            <img src="<?php echo base_url . 'media/' . $images[0]['url']; ?>" class="wishlist_image" />
                                        </a>
                                    </div>
                                    <div class="col-9 col-md-9">
                                        <h6 class="product_name" onclick="redirect_to_link('<?php echo base_url . $wishlist_product['web_url'] . '?pid=' . $wishlist_product['prodid'] . '&sku=' . $wishlist_product['sku'] . '&sid=' . $wishlist_product['vendor_id']; ?>')"><?php echo $wishlist_product['name']; ?></h6>
                                        <div class="col-md-12">
                                            <div class="wrap-details">
                                                <div class="rate">
                                                    <h5 class="m-0 new-price">₹ <?php echo $wishlist_product['price']; ?></h5>
                                                    <div class="old-price my-1">₹ <?php echo $wishlist_product['mrp']; ?></div>
                                                    <div class="d-flex my-1">
                                                        <a class="d-flex basic_button btn p-1" onclick="wishlist_add_cart('<?=$wishlist_product['id']?>','<?=$wishlist_product['price']?>')" href="javascript:void(0);">
                                                            <div class="d-flex justify-content-center align-items-center h-100">
                                                                <i class="fa-solid fa-cart-shopping"></i>
                                                                <div class="mx-2 mt-1 fw-bolder text-uppercase">Add to Cart</div>
                                                            </div>
                                                        </a>
                                                        <a class="mx-2 p-2 border delete_btn" onclick="product_delete_wishlist('<?=$wishlist_product['id']?>')">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="" class="bi bi-trash" viewBox="0 0 16 16">
                                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } else { ?>
                  	<div class="text-center">
						<img src="<?= base_url ?>images/icons/empty_cart.jpg" alt="" class="empty_shopping_list_img" style="width: 200px; height: 200px;">
					</div>
					<h4 class="text-center">No Items Found in Wishlist</h4>
					<div class="text-center">
						<a href="<?= base_url ?>" class="back_to_home_btn">Back to home</a>
					</div>
                <?php } ?>
            </div>
        </div>
        <!--End: Wishlist Section -->
        <!-- <?php print_r($wishlist_data) ?> -->
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
        var user_id = $("#user_id").val();
        function wishlist_add_cart(product_id, product_price) {
            console.log(user_id, site_url)
            var quantity = 1;
            if (product_id && product_price) {
                $("#wishlist_cart" + product_id).html('<i class="fa fa-spinner fa-spin"></i>');
                $.ajax({
                    type: "POST",
                    url: site_url + 'add_to_cart',
                    data: {
                        language: 1,
                        securecode: securecode,
                        size: '',
                        color: '',
                        user_id: user_id,
                        prod_id: product_id,
                        prod_price: product_price,
                        qty: quantity,
                        [csrfName]: csrfHash
                    },
                    success: function(html) {
                        toastr.success("Product added to Wishlist");
                        product_delete_wishlist(product_id);
                    }
                });
            }
        }

        function product_delete_wishlist(product_id) {
            if (product_id) {
                $("#wishlist_delete" + product_id).html('<i class="fa fa-spinner fa-spin"></i>');
                $.ajax({
                    type: "POST",
                    url: site_url + 'deletewishlistitem',
                    data: {
                        language: 1,
                        securecode: securecode,
                        user_id: user_id,
                        prod_id: product_id,
                        [csrfName]: csrfHash
                    },
                    success: function(html) {
                        toastr.success("Item removed from wishlist");
                        setInterval(() => {
                            window.location.reload();
                        }, 500);

                        $("#wishlist_div" + product_id).remove();
                        var total_wishlist = parseInt($("#wishlist_total_count").text());
                        $("#wishlist_total_count").text(total_wishlist - 1);
                        get_cart_products(user_id);
                    }
                });
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
                        var wishlist_html = '';
                        for (w = 0; w < total_wishlist; w++) {
                            var wish_prod = wishArray[w];
                            var imageObj = JSON.parse(wish_prod.img_url);
                            var product_id = wish_prod.id;
                            var product_name = wish_prod.name;
                            var product_price = wish_prod.price;
                            wishlist_html += '<tr><th class="d-lg-none d-md-none d-block d-sm-block" scope="row">Product</th><td><div class="cart-product-img-wrap"><div class="single-cart-product-box"><div class="single-cart-img"><img width="100px" src="../media/' + imageObj[0].url + '" alt="' + product_name + '"><p>' + product_name + '</p></div><div class="single-cart-product-x-icon"><a  onclick="product_delete_wishlist(' + product_id + ')"><i class="bx bx-x bx-sm"></i></a></div></div></div></td><td><p><span>₹ ' + product_price + '</span></p></td>';
                            wishlist_html += '<td><a onclick="wishlist_add_cart(' + product_id + ',' + product_price + ');" class="cart-btn common-btn">Add To Cart</a></td></tr>';
                        }
                        $("#wishlist_product_list").html(wishlist_html);
                    }
                });
            }
        }
    </script>
</body>

</html>