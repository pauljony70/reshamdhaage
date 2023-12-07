<?php
include('session.php');

if (!isset($_SESSION['admin'])) {
  header("Location: index.php");
}
$ordersno = $_POST['orderid'];

?>
<?php include("header.php"); ?>


<!-- main content start-->
<?php
$sellername = "";
$selleraddress = "";
$sellerphone = "";
$sellergstn = "";
$stmt11 = $conn->prepare("SELECT store_name, address, phone, tax_no FROM store_setting");
$stmt11->execute();
$stmt11->store_result();
$stmt11->bind_result($col1, $col2, $col3, $col4);

while ($stmt11->fetch()) {
  //  echo " order id ".$col1;

  $sellername = $col1;
  $selleraddress = $col2;
  $sellerphone = $col3;
  $sellergstn = $col4;
}
?>

<div class="content-page">
  <!-- Start content -->
  <div class="content">
    <div class="container-fluid">
      <!-- start page title -->
      <div class="row">
        <div class="col-12">
          <div class="page-title-box">
            <div class="page-title-right">
              <ol class="breadcrumb m-0" id="category_bradcumb">
                <li class="breadcrumb-item text-right">
                  <a href="javascript: void(0);">Invoice : #<span id="orderidvalue"></span></a>
                  <br>
                  <a href="javascript: void(0);"><span id="orderdate"></span></a>
                </li>
              </ol>
            </div>
            <h4 class="page-title">Order Details</h4>
          </div>
        </div>
      </div>
      <!-- end page title -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">


              <div class="bs-example widget-shadow" data-example-id="hoverable-table">
                <div id="printableArea">
                  <input type="hidden" class="form-control1" id="sno_order" value=<?php echo $ordersno; ?>></input>

                  <input type="hidden" class="form-control1" id="cust_phone" value=<?php echo $cust_phone; ?>></input>
                  <input type="hidden" class="form-control1" id="cust_email" value=<?php echo $cust_email; ?>></input>

                  <!-- title row -->
                  <div class="row">

                    <div class="col-12">
                      <div style="text-align:center;">
                      </div>
                      <h4 class="page-header">
                        <div class="pull-right">

                          <small class="pull-right" style="margin-top:10px;"> <span id="orderdate"></span></small>

                        </div>

                        <p style="color:black;font-size:26px; "> <img src="assets/images/logo.png" style="width:100px; height=80px; margin-right:20px;"> </img> <b><?php echo $sellername;  ?></b>
                          <input type="hidden" class="form-control1" id="orderid"></input>
                        </p>

                      </h4>
                    </div>

                    <div class="col-12 table-responsive">
                      <table class="table table-striped">
                        <thead class="thead-light">
                          <tr>
                            <th> Seller Name </th>
                            <th> Customer Name </th>
                            <th> Shipping Address </th>
                            <th> <b>Order Status: </b></th>
                          </tr>
                        </thead>
                        <tr>
                          <th>
                            <span id="selleraddress">
                              <?php echo $sellername;  ?>,<br>
                              <?php echo $selleraddress;  ?><br>
                            </span>
                            <span id="sellergstn">
                              <?php echo $sellergstn;  ?><br><br>
                            </span>
                          </th>
                          <th>
                            <address>
                              <span id="custname"></span><br>
                              <span id="custphonevalue" style="display:none"></span> <br>
                              <span id="custemailvalue" style="display:none"></span>
                            </address>
                          </th>
                          <th>
                            <span id="shipping"></span>
                          </th>
                          <!-- <th class="dontprint">
                            <address>
                              <strong style="display:none"> Delivery Time </strong> <br>
                              <span id="deliveryid" style="display:none"></span>

                            </address>
                          </th> -->
                          <th>
                            <strong> <a id="orderstatus" style="color:red"> <span id="orderstatus"></span></a></strong>
                          </th>
                        </tr>

                      </table>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->

                  <!-- Table row -->
                  <div class="row invoice-info">

                    <div class="col-12 table-responsive">
                      <table class="table table-striped" style="border: 1px solid black;">
                        <thead>
                          <tr>
                            <th>Sr no</th>
                            <th class="dontprint">Message</th>
                            <th>Product Name</th>
                            <th>Prod. Details</th>
                            <th>Price</th>
                            <th style="display:none;">Qty.</th>
                            <th>Qty.</th>
                            <th>Edit Qty.</th>
                            <th style="display:none;">Ship.(Rs.)</th>
                            <th>Total</th>
                            <th class="dontprint">Status</th>
                            <th class="dontprint">View</th>

                          </tr>
                        </thead>

                        <tbody id="tbodyPostid">

                          <tr>

                            <input type="hidden" class="form-control1" id="prodid" value=<?php echo   $sno; ?>></input>

                          </tr>

                        </tbody>
                      </table>
                    </div>
                    <!-- /.col -->
                    <span id="qty_save"></span> <br>


                  </div>
                  <!-- /.row -->

                  <div class="row">
                    <!-- accepted payments column -->
                    <div class="col-md-6">
                      <strong>Payment Methods:</strong> <br>
                      <a style="color:black;"><span id="deliverymode"></span></a><br><br>
                      <strong>Payment TXN ID: </strong><br>
                      <a style="color:black;"><span id="paymentid"></span></a>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">

                      <div class="table-responsive">
                        <table class="table">
                          <tbody>
                            <tr>
                              <th style="width:50%">Subtotal:</th>
                              <td><span id="subtotal"></span></td>
                            </tr>
                            <tr>
                              <th>Shipping:</th>
                              <td><span id="ship"></span></td>
                            </tr>
                            <tr>
                            <tr>
                              <th>Coupan Value:</th>
                              <td><span id="coupancode"></span></td>
                            </tr>

                            <tr>
                              <th>Total (Rs.):</th>
                              <td><span id="grandtotal"></span></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!--- /.row -->
                </div> <!-- print area close-->


                <script>
                  function myPrint(divName) {
                    var printContents = document.getElementById(divName).innerHTML;
                    var originalContents = document.body.innerHTML;
                    document.body.innerHTML = printContents;

                    window.print();

                    document.body.innerHTML = originalContents;
                  }
                </script>
                <!-- this row will not appear when printing -->
                <div class="row no-print">
                  <div class="col-md-6">

                    <form class="form-inline" id="myform">
                      <div class="form-group">
                        <input type="text" class="form-control" id="couriername" placeholder="Courier Name">
                      </div>
                      <div class="form-group mx-2">
                        <input type="text" class="form-control" id="trackingid" placeholder="Tracking ID">
                      </div>
                      <button type="submit" class="btn btn-dark" value="Upload" href="javascript:void(0)" onclick="savecourier(this); return false;">Save</button>
                    </form>

                  </div>
                  <div class="col-md-6">
                    <button type="submit" href="javascript:void(0)" onclick="myPrint('printableArea'); return false;" class="btn btn-primary pull-right" style="margin-right: 5px;">
                      <i class="fa fa-download"></i> Generate Invoice
                    </button>
                    <button type="submit" href="javascript:void(0)" onclick="updateOrder('Cancelled'); return false;" class="btn btn-danger pull-right" style="margin-right: 5px;">
                      <i class="fa fa-times"></i> Cancel
                    </button>


                    <button type="submit" href="javascript:void(0)" onclick="updateOrder('Completed'); return false;" class="btn btn-success pull-right" style="margin-right: 5px;">
                      <i class="fa fa-check"></i> Complete
                    </button>

                    <button type="submit" href="javascript:void(0)" onclick="updateOrder('Dispatch'); return false;" class="btn btn-info pull-right" style="margin-right: 5px;">
                      <i class="fa fa-paper-plane-o"></i> Dispatch
                    </button>
                  </div>
                </div></br></br>
                <center>
                  <p id="test1" style="color:green;"></p>
                </center>


                <div class="clearfix"> </div>
              </div>


              <div class="clearfix"> </div>

            </div>
          </div>
        </div>


        <div class="col_1">


          <div class="clearfix"> </div>

        </div>

      </div>
    </div>
  </div>
  <!--footer-->
  <?php include('footernew.php'); ?>
  <!--//footer-->

  <script type="text/javascript">
    function savecourier(element) {

      var couriervalue = $('#couriername').val();
      var trackidvalue = $('#trackingid').val();
      var ordervalue = $('#sno_order').val();

      //     alert(  namevalue  );
      $.ajax({
        method: 'POST',
        url: 'add_courier_details.php',
        data: {
          orderid: ordervalue,
          couriername: couriervalue,
          trackingid: trackidvalue,
          code: "123"
        },
        success: function(response) {
          alert(response); // display response from the PHP script, if any
          //  window.open("events.php","_self");  
          // $(':input','#myform')
          //      .not(':button, :submit, :reset, :hidden')
          //      .val('');
          // getBrand();
        }
      });

    }
  </script>
  <script>
    function viewProduct(item, stock) {
      // alert("redirect "+item);

      var mapForm = document.createElement("form");
      mapForm.target = "_self";
      mapForm.method = "POST"; // or "post" if appropriate
      mapForm.action = "edit_product.php";

      var mapInput = document.createElement("input");
      mapInput.type = "text";
      mapInput.name = "productid";
      mapInput.value = item;
      mapForm.appendChild(mapInput);

      var mapInput = document.createElement("input");
      mapInput.type = "text";
      mapInput.name = "stock";
      mapInput.value = stock;
      mapForm.appendChild(mapInput);

      document.body.appendChild(mapForm);

      map = window.open("", "_self");

      if (map) {
        mapForm.submit();
      } else {
        alert('You must allow popups for this map to work.');
      }
    }
  </script>
  <script>
    $(document).ready(function() {

      refreshdata();


    });

    function refreshdata() {
      var order_id = $('#sno_order').val();

      //  alert("--"+order_id); 
      $.ajax({
        method: 'POST',
        url: 'edit_order_data.php',
        data: {
          code: "123",
          orderid: order_id
        },
        success: function(response) {
          //  alert(response); // display response from the PHP script, if any
          //$('#msgdiv').val("subsdfa");
          var data = $.parseJSON(response);

          if (data["status"] == "1") {
            // alert("status "+data["deliveryid"]);
            $('#orderidvalue').html(data["orderId"]);
            $('#orderdate').html(data["orderdate"]);
            $('#custname').html(data["username"]);
            $('#custphonevalue').html(data["phone"]);
            $('#custemailvalue').html(data["email"]);
            $('#shipping').html(data["address"]);
            $('#orderstatus').html(data["orderstatus"]);
            $('#deliverymode').html(data["deliverymode"]);
            $('#paymentid').html(data["paymentid"]);
            $('#subtotal').html(data["subtotal"]);
            $('#ship').html(data["ship"]);
            $('#grandtotal').html(data["grandtotal"]);
            $('#deliveryid').html(data["deliveryid"]);
            $('#couriername').val(data["courier"]);
            $('#trackingid').val(data["trackid"]);
            $('#coupancode').html(data["coupancode"]);


            // add prod details
            $("#tbodyPostid").empty();
            var count = 1;
            $(data["proddetails"]).each(function() {
              var btnstatus = '<button type = "button" class = "btn-alert">View</button>';
              var btnsave_qty = '<button type = "button" class = "btn-warning">Save</button>';

              var img = '';
              if (this.custom_image != '') {
                img += '<a download=' + this.custom_image + ' href=' + this.custom_image + ' title="ImageName"><img style="width: 121px; height: 72px;" alt="ImageName" src=' + this.custom_image + '>';
              }

              //alert( "img "+this.orgqty);
              $("#tbodyPostid").append('<tr> <th style="display:none;"><input type="text" class="nrprodid" style="width:30px;" value="' + this.prodid + '"></input></th><th scope="row">' + count + '</th><td class="dontprint">' + this.custom_title + '</td><td>' + this.prodname + '</td> <td> ' + this.otherart + '</td><td >' + this.price + '</td><td class="nrqtyorg" style="display:none;">' + this.orgqty + '</td><td ><input type="text" class="nrqty" name="qty" id="qty" value=' + this.qty + ' style="width:40px;"> </td><td class="dontprint">' + btnsave_qty + '</td><td style="display:none;">' + this.ship + '</td><td>' + this.total + '</td><td style="color:red">' + this.prodstatus + '</td><td class="dontprint">' + btnstatus + '</td></tr> ');
              //	alert(this.orgqty);

              count = count + 1
            });

            $(".btn-alert").click(function() {
              var $row = $(this).closest("tr"); // Find the row
              var $text = $row.find(".nrprodid").val(); // Find the text
              viewProduct($text, "20");
              // alert("prod ID "+$text); 


            });
            $(".btn-warning").click(function() {
              var $row = $(this).closest("tr"); // Find the row
              var $text = $row.find(".nrprodid").val(); // Find the text
              updateOrderQty($text);
              //alert("prod ID "+$text); 


            });


          } else {


          }


        }
      });
    }
  </script>
  <script>
    function updateOrder(id) {

      var order_id = $('#sno_order').val();
      var phone = document.getElementById("custphonevalue").innerText;
      var email = document.getElementById("custemailvalue").innerText;
      var grandtotal = document.getElementById("grandtotal").innerText;


      // alert("order--"+order_id+" phone "+phone+" email "+email+" actionid "+id); 
      $.ajax({
        method: 'POST',
        url: 'update_order_status.php',
        data: {
          code: "123",
          orderid: order_id,
          action: id,
          phone: phone,
          email: email,
          grandtotal: grandtotal
        },
        success: function(response) {
          alert(response); // display response from the PHP script, if any
          //$('#msgdiv').val("subsdfa");
          $("#test1").html("<b>" + response + " : " + id + "</b>");
          $("#orderstatus").html("<b>" + id + "</b>");
          // getProductImage(prod_id);
        }
      });
    }

    function updateOrderQty(prodid) {
      var order_id = document.getElementById("orderidvalue").innerText;

      prodid = [];
      qty = [];
      var count = 0;
      $('.nrqty').each(function(input) {
        qty[count] = $(this).val();
        count++;
      });
      var tempcount = 0;
      var flag = false;
      $('.nrqtyorg').each(function() {
        var value = $(this).text();
        if (qty[tempcount] <= $(this).text()) {

          // alert("flag actvie");

        } else {
          flag = true;
        }
        // alert(' qty: ' + qty[tempcount] +"---"+ $(this).text() +"---"+value);
        tempcount++;
      });

      if (flag) {
        alert("Qty should be less than orignal qty.");

      } else {

        //  alert(" ok");  
        var count = 0;
        $('.nrprodid').each(function(input) {
          //  var value = $(this).val();
          prodid[count] = $(this).val();
          // alert(' prodid: ' +  "--" +  prodid[count]);
          count++;
        });

        //alert("action "+prodid.length+"--"+qty.length+"--"+ order_id ); 
        $.ajax({
          method: 'POST',
          url: 'update_order_prodqty.php',
          data: {
            code: "123",
            orderid: order_id,
            prodidd: JSON.stringify(prodid),
            qtyy: JSON.stringify(qty)

          },
          success: function(response) {
            alert(response); // display response from the PHP script, if any
            refreshdata();

          }
        });


      }



    }
  </script>
  </body>

  </html>