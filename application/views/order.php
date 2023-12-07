<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Placed Orders - Mkkirana</title>
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
                                <h3>Order History</h3>
                                <div class="breadcrumb-link">
                                    <p><a href="/">Home</a></p>
                                    <span></span>
                                    <p>Order History</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="cart-product-area mt-50 mb-76">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="cart-product-details-wrap cart-product-details-wrap-responsive pt-0">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="text-align:center;">Serial No.</th>
                                        <th>Order Id</th>
                                        <th>Date</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Address</th>
                                        <th>Currier</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody id="order_tbody">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main> -->

    <main class="my-order-page">
        <div class="pd_top_banner breadcrumb">
            <div class="pd_dress_name_bread_div">
                <h4 class="pd_dress_name_bread">Orders</h4>
                <nav aria-label="breadcrumb" class="d-flex-center breadcrumb_ul_list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url ?>dashboard">Home</a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--Start: My Orders Section -->
        <section style="min-height:700px;">
            <div class="container px-1">
                <div class="row mt-4">
                    <?php
                    include('includes/usersidebardesktop.php');
                    ?>

                    <div class="col-lg-8 p-2" style="margin-top: -9px;">
                        <div class="left-block box-shadow-4 px-1 px-md-4" id="MyProfile">
                            <div id="order_content">

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!--End: My Orders Section -->

    </main>

    <!-- Footer Area -->
    <?php include("includes/footer.php") ?>
    <!-- Footer Area End -->

    <?php include("includes/script.php") ?>
    <script>
        var csrfName = $(".txt_csrfname").attr("name"); // 
        var csrfHash = $(".txt_csrfname").val(); // CSRF hash
        var site_url = '<?= base_url() ?>' // CSRF hash
        var securecode = $(".securecode").val();
        var user_id = $("#user_id").val();

        $(function() {
            window.onload = get_order_history_list(user_id);
        });

        function get_order_history_list(ids) {
            if (ids) {
                $.ajax({
                    type: "POST",
                    url: site_url + 'getorderhistory',
                    data: {
                        language: 1,
                        securecode: securecode,
                        user_id: user_id,
                        [csrfName]: csrfHash
                    },
                    success: function(html) {
                        var catObj = JSON.parse(html);
                        var orderArray = catObj.Information;
                        var total_order = orderArray.length;
                        var order_html = '';
                        if(total_order>0){
                            for (var i = 0; i < total_order; i++) {
                                var order_id = orderArray[i].order_id;
                                var date = orderArray[i].date;
                                var price = orderArray[i].price;
                                var orderstatus = orderArray[i].orderstatus;
                                var shippingaddress = orderArray[i].shippingaddress;
                                var curriername = orderArray[i].curriername;
                                var trackid = orderArray[i].trackid;
                                var prod_details = JSON.parse(orderArray[i].prod_details);
                                console.log(prod_details);
                                order_html += '<tr><th class="d-lg-none d-md-none d-block d-sm-block" scope="row">Order Details</th><td>' + (i + 1) + '</td> <td>' + order_id + '</td> <td>' + date + '</td><td> ₹ ' + price + '</td><td>' + orderstatus + '</td> <td>' + shippingaddress + '</td><td>' + curriername + ',' + trackid + '</td>';
                                order_html += '<td><a href="' + site_url + 'order_details/' + order_id + '" class="cart-btn common-btn">View Details</a></td></tr>';
                                order_html_1 = ` 
                                        <div class="cart-details row mb-4">
                                            <div class="col-12 p-0">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="d-flex flex-column">
                                                                    <div class="row">
                                                                        <div class="col-md-7 col-sm-6 px-0">
                                                                            <div class="wrap-details">
                                                                                <div class="d-flex my-1 mobile_order_margin">
                                                                                    <span>Order ID:</span>
                                                                                    <span class="cart-prod-title fw-bolder fs-5 ms-2" style="margin-top:-5px;color:#ee2c61;">${order_id}</span>
                                                                                </div>
                                                                                <div class="d-flex my-1 mobile_order_margin">
                                                                                    <span>Total Price: </span>
                                                                                    <span>&nbsp;₹${price}</span>
                                                                                </div>
                                                                                <div class="d-flex qty my-1 mobile_order_margin">Number of products: ${prod_details.length}</div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-5 col-sm-6 px-0">
                                                                            <div class="d-flex order-id my-1 mobile_order_margin"><span>Order Date:</span>${date}</div>
                                                                            <div class="order-id text-capitalize my-1 mobile_order_margin">Order Status: <span class="badge_stock">${orderstatus}</span></div>
                                                                            <a href="${site_url}order_details/${order_id}" class="my-1 cart-btn py-2 px-3 common-btn mobile_order_margin">View Details</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                `;
                                $("#order_content").append(order_html_1);
                            }
                        } else{
                            order_html_1 = `
                                <div class="cart-details card my-3 py-2">
                                    <div class=" h-50 w-50 mx-auto">
                                        <img src="<?php base_url ?>assets_web/images/empty-cart.png" alt="">
                                        <h5 class="text-center">No Order Found</h5>
                                    </div>
                                </div>
                            `;
                            $("#order_content").append(order_html_1);
                        }
                        // $("#order_tbody").html(order_html);

                    }
                });
            }
        }
    </script>

</body>

</html>