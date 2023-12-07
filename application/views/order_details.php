<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>Order Details - Mkkirana</title>

  <?php include("includes/head.php") ?>
  <style>
    section aside {
      background-color: #fff;
      padding: 10px;
      border: 1px solid gainsboro;
    }

    .cstm-sec {
      padding: 40px 0;
      background-color: #f9f8f8;
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

  <!-- Header area -->
  <?php include("includes/topbar.php") ?>
  <?php include("includes/navbar.php") ?>
  <!-- Header area end -->

  <main>
    <input type="hidden" name="order_id" id="order_id" value="<?php echo $order_id; ?>">

    <section>
      <div class="pd_top_banner breadcrumb">
        <div class="pd_dress_name_bread_div">
          <h4 class="pd_dress_name_bread">Order Details</h4>
          <nav aria-label="breadcrumb" class="d-flex-center breadcrumb_ul_list">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= base_url ?>dashboard">Home</a></li>
            </ol>
          </nav>
        </div>
      </div>
    </section>
    <!-- <?php
          echo "<pre>";
          print_r($order_detail);
          echo "</pre>";
          ?> -->

    <!-- Checkout Area -->
    <section class="checkout-area mt-50 mb-5">
      <div class="container">
        <div class="row">
          <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12 ">
            <div class="cart-product-details-wrap cart-product-details-wrap-responsie pt-0 border-0">
              <!-- Desktop Order Table -->
              <table class="table cart_content_table desktop_cart">
                <thead>
                  <tr>
                    <th scope="col">Product</th>
                    <th scope="col" style="color: var(--theme-color);">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">SubTotal</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($order_detail['Information'] as $cart_product) { ?>
                    <tr id="">
                      <td class="product_name d-flex py-4">
                        <img src="<?php echo base_url . 'media/' . $cart_product['prod_img']; ?>" alt="" class="cart_image">
                        <a href="<?= base_url . 'productdetail/' . $cart_product['prod_name'] . '/' . $cart_product['prod_id'] ?>" class="cart_product_name_link">
                          <span><?= $cart_product['prod_name'] ?></span> <br>
                        </a>
                      </td>
                      <td class="price px-0">
                        <p class="price_amount text-dark">₹ <?= ($cart_product['price']) ?></p>
                      </td>
                      <td class="quntity">
                        <div class="pd_quantity">
                          <input type="text" id="quantity" class="w-100" name="quantity" value="<?= $cart_product['qty'] ?>" readonly>
                        </div>
                      </td>
                      <td class="subtotal">
                        <span class="cart_total_price">₹ <?= $cart_product['total'] ?></span>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>

              <!-- Mobile Order Table -->
              <table class="table cart_content_table mobile_cart">
                <thead>
                  <tr>
                    <th scope="col">Product</th>
                    <th scope="col">Quantity</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($order_detail['Information'] as $cart_product) { ?>
                    <tr>
                      <td class="d-flex py-4">
                        <img src="<?php echo base_url . 'media/' . $cart_product['prod_img']; ?>" alt="" class="cart_image_mobile">
                        <a href="<?= base_url . $cart_product['web_url'] ?>" class="cart_product_name_link">
                          <span><?= $cart_product['prod_name'] ?></span> <br>
                          <p class="price_amount_mobile">₹ <?= ($cart_product['price']) ?></p>
                        </a>
                      </td>
                      <td class="quntity">
                        <div class="pd_quantity">
                          <input type="text" id="quantity" class="w-100" name="quantity" value="<?= $cart_product['qty'] ?>" readonly>
                        </div>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>

          <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12 mt-4 mt-lg-0">
            <div class="cart-product-details-wrap checkout-product-details-wrap pt-0">
              <table class="table">
                <thead>
                  <tr>
                    <th colspan="2" style="text-align:center">Order Summary</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="fs-6 fw-500">Cart Subtotal</td>
                    <td>₹<span id="total_cart_price"><?= $order_detail['subtotal'] ?></span></td>
                  </tr>
                  <tr>
                    <td class="fs-6 fw-500">Shipping fee</td>
                    <td>₹<span id="total_shipping_fee"><?= $order_detail['shippingfee'] ?></span></td>
                  </tr>
                  <tr>
                    <td class="fs-6 fw-500">CGST</td>
                    <td>₹<span id="cgst"><?= $order_detail['cgst'] ?></span></td>
                  </tr>
                  <tr>
                    <td class="fs-6 fw-500">Discount</td>
                    <td>₹<span id="total_discount"><?= $order_detail['discountvalue'] ?></span></td>
                  </tr>
                  <tr>
                    <td class="fs-6 fw-500">Order Total</td>
                    <td>₹<span id="order_total"><?= $order_detail['grandtotal'] ?></span></td>
                  </tr>
                  <tr>
                    <td class="fs-5 fw-500">Order Status</td>
                    <td class="fs-5 fw-bold accent-color"><span id="order_status" class="badge_stock"><?= $order_detail['orderstatus'] ?></span></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Checkout Area End -->
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
    var order_id = $("#order_id").val();

    $(function() {
      window.onload = get_order_history_details(user_id);

    });

    function get_order_history_details(ids) {
      if (ids) {
        $.ajax({
          type: "POST",
          url: site_url + 'getorderhistorydetails',
          data: {
            language: 1,
            securecode: securecode,
            user_id: user_id,
            order_id: order_id,
            [csrfName]: csrfHash
          },
          success: function(html) {
            $(".loader").remove();
            var catObj = JSON.parse(html);
            var orderArray = catObj.Information;
            var total_order = orderArray.length;
            var order_html = '';

            $("#total_cart_price").text(catObj.subtotal);
            $("#total_shipping_fee").text(catObj.shippingfee);
            $("#total_discount").text(catObj.discountvalue);
            $("#order_total").text(catObj.grandtotal);
            $("#order_status").text(catObj.orderstatus);

            for (var i = 0; i < total_order; i++) {
              var prod_name = orderArray[i].prod_name;
              var prod_img = orderArray[i].prod_img;
              var price = orderArray[i].price;
              var size = orderArray[i].size;
              var color = orderArray[i].color;
              order_html += '<tr><td><div class="cart-product-img-wrap"><div class="single-cart-product-box"><div class="single-cart-img"><img style="width:150px;" alt="' + prod_name + '" src="' + site_url + prod_img + '">';
              order_html += '<div class="d-flex flex-column"><p class="fw-500 fs-5" style="color:#14213d">' + prod_name + '</p>';
              order_html += '<p class="text-start fs-6">' + color + '</p>';
              order_html += '<p class="text-start fs-6">' + size + '</p>';
              order_html += '<p class="text-start fs-6"> Price: ₹ ' + price + '</p></div></div></div></div></td>';
              order_html += '</tr>';
            }
            $("#cart_item_trs").after(order_html);

          }
        });
      }
    }
  </script>

</body>

</html>