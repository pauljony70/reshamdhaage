<?php
include('session.php');

if (!isset($_SESSION['admin'])) {
  header("Location: index.php");
}
$productid = $_POST['productid'];
$stock = $_POST['stock'];
$rowProdJsonArray = "";
?>
<?php include("header.php"); ?>

<?php
$variantvalue = "";
function variantTree($parent_idv = 0, $sub_mark = '')
{
  include('../app/db_connection.php');
  global $conn;
  global  $variantvalue;
  $query2 = $conn->query("SELECT * FROM product_variant_cat WHERE parent_id = $parent_idv ORDER BY variant_name ASC");
  if ($query2->num_rows > 0) {
    while ($row = $query2->fetch_assoc()) {
      echo '<option value="' . $row['variant_name'] . '">' . $sub_mark . $row['variant_name'] . '</option>';
      $variantvalue = $variantvalue . '<option value="' . $row['variant_name'] . '">' . $sub_mark . $row['variant_name'] . '</option>';

      variantTree($row['variant_id'], $sub_mark . '---');
    }
  }
}
//variantTree();
?>

<!-- main content start-->
<div class="content-page">
  <!-- Start content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="page-title-box">
            <h4 class="page-title">Add Product</h4>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <!--	<div class="bs-example widget-shadow" data-example-id="hoverable-table"> -->

              <?php
              $name = "";
              $short = "";
              $desc = "";
              $name_ar = "";
              $short_ar = "";
              $desc_ar = "";
              $mrp = "";
              $price = "";
              $cgst = "";
              $sgst = "";
              $igst = "";
              $ship = "";
              $hsn = "";
              $w_price = "";
              $w_qty = "";
              $color = "";
              $size = "";
              $weight = "";
              $stock = "";
              $unit = "";
              $catid = "";
              $brandid = "";
              $videoid = "";
              $pricearray = [];
              $refercoins = "0";
              $discountcoins = "0";
              $displaystock = "";
              $sellername = "";
              $prodremark = "";
              $freeship = "0";
              $prodrating = 0;
              $prodratingcount = 0;
              $eggless = 0;
              $msgoncake = 0;
              $stmt = $conn->prepare("SELECT prod_id, prod_name, prod_desc, prod_fulldetail, name_ar, short_ar, desc_ar, prod_mrp, prod_price, prod_img_url, cgst, sgst, igst, shipping, hsn_code, w_price, w_qty, other_attribute, stock, unit, cat_id, brand_id, pricearray, cashon, coins, discount_coins, displaystock, sellername, prod_remark, freeship, prod_rating, prod_rating_count, eggless, msgoncake FROM productdetails WHERE prod_id=?");
              $stmt->bind_param("s", $productid);
              $stmt->execute();
              $stmt->store_result();
              $stmt->bind_result($col1, $col2, $col3, $col4, $coln, $cols, $cold, $col5, $col6, $col7, $col8, $col88, $col888, $col9, $col10, $col11, $col12, $col13, $col14, $col15, $col16, $col17,  $col19, $col20, $col21, $col22, $col23, $col24, $col25, $col26, $col27, $col28, $col29, $col30);

              while ($stmt->fetch()) {
                //   echo '<img src='.$col1.' alt='.$col1.' height="150" width="270" hspace="20" vspace="20">';
                $rowProdJsonArray = $col7;
                $name = $col2;
                $short = $col3;
                $desc = $col4;
                $mrp = $col5;
                $price = $col6;
                $name_ar = $coln;
                $short_ar = $cols;
                $desc_ar = $cold;
                $cgst = $col8;
                $sgst = $col88;
                $igst = $col888;
                $ship = $col9;
                $hsn = $col10;
                $w_price = $col11;
                $w_qty = $col12;
                $stock = $col14;
                $unit = $col15;
                $catid = $col16;
                $brandid = $col17;
                $cashon = $col20;
                $refercoins = $col21;
                $discountcoins = $col22;
                $displaystock = $col23;
                $sellername = $col24;
                $prodremark = $col25;
                $freeship = $col26;
                $prodrating = $col27;
                $prodratingcount = $col28;
                $eggless = $col29;
                $msgoncake = $col30;
                //echo "col ".$name;
                if ($col19 !== "" || $col19 != "") {
                  $pricearray = $col19;
                }
                $jsonobj =    json_decode($col13, true);
                $color = $jsonobj['color'];
                $size = $jsonobj['size'];
                $weight = $jsonobj['weight'];
                //  echo "json ".$size;
              }

              ?>

              <div class="form-three widget-shadow">
                <h4>Edit Product : <?php //echo $productid; 
                                    ?></h4>
                <form class="form-horizontal" id="myform">
                  <a> ** required field</a>
                  <div class="form-group row">
                    <label for="focusedinput" class="col-sm-2 control-label">Product Name **</label>
                    <input type="hidden" class="form-control" id="prod_id" value=<?php echo $productid; ?>></input>

                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="prod_name" value="<?php echo $name; ?>" placeholder="Name" required>
                    </div>
                    <div class="col-sm-2">
                      <p class="help-block"></p>
                    </div>
                  </div>
                  <div class="form-group row" style="display:none;">
                    <label for="focusedinput" class="col-sm-2 control-label">Product Name Arabic **</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="prod_name_ar" value="<?php echo $name_ar; ?>" placeholder="Name Arabic" required>
                    </div>
                    <div class="col-sm-2">
                      <p class="help-block"></p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="focusedinput" class="col-sm-2 control-label">Product Short details **</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="prod_short" value="<?php echo $short; ?>" placeholder="Short description" required>
                    </div>
                  </div>
                  <div class="form-group row" style="display:none;">
                    <label for="focusedinput" class="col-sm-2 control-label">Product Short details Arabic **</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="prod_short_ar" value="<?php echo $short_ar; ?>" placeholder="Short description Arabic" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="focusedinput" class="col-sm-2 control-label">Product Full Details **</label>
                    <div class="col-sm-8">
                      <textarea rows="6" cols="90" class="form-control" id="prod_details" name="prod_details" form="usrform" required placeholder="Enter text here..."><?php echo $desc; ?></textarea>
                    </div>
                  </div>
                  <div class="form-group row" style="display:none;">
                    <label for="focusedinput" class="col-sm-2 control-label">Product Full Details Arabic **</label>
                    <div class="col-sm-8">
                      <textarea rows="6" cols="90" id="prod_details_ar" name="prod_details_ar" form="usrform" required placeholder="Enter text here..."><?php echo $desc_ar; ?></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="focusedinput" class="col-sm-2 control-label">MRP **</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="prod_mrp" value="<?php echo $mrp; ?>" placeholder="MRP ex. 450" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="focusedinput" class="col-sm-2 control-label">Sale Price**</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="prod_price" value="<?php echo $price; ?>" placeholder="Sale Price ex. 235" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="focusedinput" class="col-sm-2 control-label">Stock </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="prod_qty" value="<?php echo $stock; ?>" placeholder="Quantity ex. 20, 50">
                    </div>
                  </div>
                  <div class="form-group row">

                    <label for="exampleInputFile" class="col-sm-2 control-label">Multi Qty Price</label>

                    <div class="input-files1">
                      <a class="btn btn-primary" aria-hidden="true" id="moreAttribute"><i class="fa fa-plus"></i>Add More Size & Price, Stock</a>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="exampleInputFile" class="col-sm-2 control-label">Attribute</label>

                    <div class="col-sm-9">
                      <div class="add-attr">


                      </div>
                    </div>
                  </div>

                  <script>
                    function addconfig() {
                      // pass PHP variable declared above to JavaScript variable
                      // alert("lenght "+ $pricearray);
                      attrjson = <?php echo json_encode($pricearray); ?>;
                      attrjson = JSON.parse(attrjson);

                      // alert("lenght "+ attrjson.length+"---"+variantv);

                      // var  atr_id =301; var attvalue_id = 401;
                      for (var i = 0; i < attrjson.length; i++) {
                        var counter = attrjson[i];
                        // alert( counter.attrnam + "-- "+counter.attrvalue);
                        var showId = ++atr_id;
                        var valueid = ++attvalue_id;
                        var stockvalueid = ++attstockvalue_id;
                        var mrpvalueid = ++attmrpvalue_id;
                        var skuvalueid = ++attskuvalue_id;

                        mulitImagejson = counter.attrimage;
                        var imgdiv = '<div style="border:1px solid #D3D3D3; padding:12px;"><div class="image123" >';
                        //alert ("lenght--"+mulitImagejson.length);
                        for (var j = 0; j < mulitImagejson.length; j++) {
                          imgpath = mulitImagejson[j];
                          imgpathurl = "../media/" + imgpath.url;
                          imgdiv = imgdiv + '<div class="imgContainer input-files' + showId + '">' +
                            '<img src =' + imgpathurl + ' height="60" width="60"/>' +
                            '</div>';
                          // alert(    imgpath.url );

                        }
                        imgdiv = imgdiv + '</div><br><br>';
                        var prod_url = "../media/" + counter.attrimage;
                        //	alert("imageurl "+counter.attrimage);


                        $(".add-attr").append('<br><br>' + imgdiv + '<br>' +
                          '<select class="form-control"  name="' + showId + '" id="' + showId + '" style="width:100px; float:left; display: inline-block; margin-right:20px;">' + variantarray + '</select> ' +

                          //'<input type="text"  id="'+showId+'" class="form-control"  value="'+counter.attrnam+'" style="width:100px; float:left; display: inline-block; margin-right:20px;"> </input> '+
                          '<input type="text"  id="' + mrpvalueid + '" class="form-control"  value="' + counter.attrmrpvalue + '" style="width:100px; float:left; margin-right:20px;"> </input> ' +
                          '<input type="text"  id="' + valueid + '" class="form-control"  value="' + counter.attrvalue + '" style="width:100px; float:left; display: inline-block; margin-right:20px;"> </input> ' +
                          '<input type="text"  id="' + stockvalueid + '" class="form-control"  value="' + counter.attrstockvalue + '" style="width:100px; float:left; display: inline; margin-right:20px;"> </input> ' +
                          '<input type="text"  id="' + skuvalueid + '" class="form-control"  value="' + counter.attrskuvalue + '" style="width:100px; float:left; display: inline-block; margin-right:20px;"> </input> ' +
                          '<button name="btn_save-' + showId + '" type="submit" class="btn btn-sm btn-success" onclick="saveInfoCheckExist(' + showId + ',' + atr_id + '); return false;" style="float:left; display: inline-block; margin-right:20px;">Save</button>' +
                          '<button name="btnremove-' + showId + '" type="submit" class="btn btn-sm btn-danger" onclick="removeInfo(' + showId + ',' + atr_id + '); return false;" style="float:left; display: inline-block; margin-right:20px;">Remove</button><br></div>');

                        $('#' + showId).val(counter.attrnam);

                        // $('#'+showId).prop("disabled", true);
                        // $('#'+valueid).prop("disabled", true);
                        //$('#'+stockvalueid).prop("disabled", true);
                        //$('#'+mrpvalueid).prop("disabled", true);
                      }
                    }

                    //var imagejson = [];
                  </script>

                  <div class="form-group row">
                    <label for="focusedinput" class="col-sm-2 control-label">SKU Code</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="prod_hsn" placeholder="Product SKU code" value="<?php echo $hsn; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="focusedinput" class="col-sm-2 control-label">CGST (in %)</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="prod_cgst" value="<?php echo $cgst; ?>" placeholder="CGST on sale price. Example. 5, 18 ">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="focusedinput" class="col-sm-2 control-label">SGST (in %)</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="prod_sgst" value="<?php echo $sgst; ?>" placeholder="SGST on sale price. Example. 5, 18 ">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="focusedinput" class="col-sm-2 control-label">IGST (in %)</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="prod_igst" value="<?php echo $igst; ?>" placeholder="IGST on sale price. Example. 5, 18 ">
                    </div>
                  </div>
                  <div class="form-group row" style="display:none;">
                    <label class="col-sm-2 control-label">Essential free ship</label>
                    <div class="col-sm-8">
                      <select class="form-control" id="freeshipessential" name="freeshipessential">
                        <?php
                        if ($freeship == 0) {

                          echo '<option value="0" selected>No</option>';
                          echo '<option value="1" >Yes</option>';
                        } else {
                          echo '<option value="0" >No</option>';
                          echo '<option value="1" selected>Yes</option>';
                        }

                        ?>

                      </select>
                    </div>
                  </div>

                  <div class="form-group row" style="display:none;">
                    <label for="focusedinput" class="col-sm-2 control-label">Shipping Cost</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="prod_shipping" value="<?php echo $ship; ?>" placeholder="Shipping Cost. Ex. 50">
                    </div>
                  </div>

                  <div class="form-group row" style="display:none;">
                    <label for="focusedinput" class="col-sm-2 control-label">Whole Sale Price</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="prod_w_price" value="<?php echo $w_price; ?>" placeholder="Single Product Price without Tax in Whole sale">
                    </div>
                  </div>
                  <div class="form-group row" style="display:none;">
                    <label for="focusedinput" class="col-sm-2 control-label">Min. Whole Sale Qty.</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="prod_w_qty" value="<?php echo $w_qty; ?>" placeholder="Min. Quantity required to place order in whole sale.">
                    </div>
                  </div>
                  <div class="form-group row" style="display:none;">
                    <label for="focusedinput" class="col-sm-2 control-label">Color</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="prod_color" placeholder="use , for multiple color. Example red, yellow, blue" value="<?php echo $color; ?>">
                    </div>
                  </div>
                  <div class="form-group row" style="display:none;">
                    <label for="focusedinput" class="col-sm-2 control-label">Size </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="prod_size" placeholder="use , for multiple size. Example S, M, L, XL" value="<?php echo $size; ?>">
                    </div>
                  </div>
                  <div class="form-group row" style="display:none;">
                    <label for="focusedinput" class="col-sm-2 control-label">Weight </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="prod_weight" placeholder="Ex. 200 gm, 1 kg" value="<?php echo $weight; ?>">
                    </div>
                  </div>



                  <div class="form-group row" style="display:none;">
                    <label for="focusedinput" class="col-sm-2 control-label">Display Stock</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="displaystock" value="<?php echo $displaystock; ?>" placeholder="Display Stock ex. 200, 500">
                    </div>
                  </div>
                  <div class="form-group row" style="display:none;">
                    <label for="focusedinput" class="col-sm-2 control-label">Stockist Name</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="sellername" value="<?php echo $sellername; ?>" placeholder="Stockist Name">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="focusedinput" class="col-sm-2 control-label">Remarks</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="prod_remark" value="<?php echo $prodremark; ?>" placeholder="200 sold in 3 hours">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="focusedinput" class="col-sm-2 control-label">Rating Star </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="prod_rating" value="<?php echo $prodrating; ?>" placeholder="Ex. Rating between 1 to 5">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="focusedinput" class="col-sm-2 control-label">Rating Count </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="prod_ratingcount" value="<?php echo $prodratingcount; ?>" placeholder="Ex. 200, 556">
                    </div>
                  </div>
                  <div class="form-group row" style="display:none;">
                    <label for="focusedinput" class="col-sm-2 control-label">Unit </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="prod_unit" value="<?php echo $unit; ?>" placeholder="Example - gm, kg. bottle">
                    </div>
                  </div>

                  <div class="form-group row" style="display:none;">
                    <label for="focusedinput" class="col-sm-2 control-label">Discount Coins</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="prod_discountcoins" placeholder="1 coins = 1 rupee" value="<?php echo $discountcoins; ?>">
                    </div>
                  </div>

                  <div class="form-group row" style="display:none;">
                    <label for="focusedinput" class="col-sm-2 control-label">Refer Coins</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="prod_refercoins" placeholder="Ex. 20" value="<?php echo $refercoins; ?>">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 control-label">Select Category **</label>
                    <div class="col-sm-8">
                      <select class="form-control" id="selectcategory" name="selectcategory">
                        <?php

                        // $catidd = $catid;                                         
                        function categoryTree($parent_id = 0, $sub_mark = '')
                        {
                          global $conn;
                          global $catid;
                          $query = $conn->query("SELECT * FROM category WHERE parent_id = $parent_id ORDER BY cat_name ASC");

                          if ($query->num_rows > 0) {
                            while ($row = $query->fetch_assoc()) {

                              if ($row['cat_id'] == $catid) {

                                echo '<option value="' . $row['cat_id'] . '" selected>' . $sub_mark . $row['cat_name'] . '</option>';
                              } else {
                                echo '<option value="' . $row['cat_id'] . '">' . $sub_mark . $row['cat_name'] . '</option>';
                              }
                              categoryTree($row['cat_id'], $sub_mark . '---');
                            }
                          }
                        }
                        categoryTree();

                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 control-label">Select Brand **</label>
                    <div class="col-sm-8">
                      <select class="form-control" id="selectbrand" name="selectbrand">
                        <?php

                        echo '<option value="blank">Select Brand </option>';
                        //      echo '<option value="Samsung"> Samsung </option>';
                        //      echo '<option value="Xiomi">Xiomi </option>';

                        $stmt = $conn->prepare("SELECT brand_id, brand_name FROM brand ORDER By brand_name ASC");
                        //	$stmt-> bind_param("i", $id);
                        $stmt->execute();
                        $stmt->store_result();
                        $stmt->bind_result($col31, $col32);

                        while ($stmt->fetch()) {
                          if ($col31 === $brandid) {

                            echo '<option value="' . $col31 . '" selected>' . $col32 . '</option>';
                          } else {
                            echo '<option value="' . $col31 . '">' . $col32 . '</option>';
                          }
                        }


                        ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">

                    <label for="exampleInputFile" class="col-sm-2 control-label">Product Galley</label>
                  </div>
                  <!-- icon-hover-effects -->
                  <div class="tables" style="background-color: #F6EAEA;">
                    <div class="wrap">

                      <div class="bg-effect">
                        <ul class="bt_list" id="bt_list">

                          <?php
                          $oldarray = json_decode($rowProdJsonArray, true);
                          $count = 0;
                          foreach ($oldarray as $arraykey) {

                            $prod_url = "../media/" . $arraykey['url'];
                            //  echo "image url ".$prod_url;
                            echo '<a class="label label-warning" onclick="deleteImg(' . $count . ')" >DELETE</a><img src=' . $prod_url . ' alt=' . $prod_url . ' height="150" width="270" hspace="20" vspace="20"> ';
                            $count = $count + 1;
                          }
                          ?>

                        </ul>
                      </div>
                    </div>
                  </div>

                  </br>
                  <input type="hidden" class="form-control" id="prod_imgurl" value=<?php echo $rowProdJsonArray; ?>></input>
                  <script>
                    imagejson = $('#prod_imgurl').val();
                    var parsedJSON = JSON.parse(imagejson);
                    // alert("lenght "+parsedJSON.length);

                    for (var i = 0; i < parsedJSON.length; i++) {
                      var counter = parsedJSON[i];
                      //  alert( counter.url);
                    }


                    //var imagejson = [];
                  </script>
                  <div class="form-group row">

                    <label for="exampleInputFile" class="col-sm-2 control-label">Product Images</label>

                    <div class="input-files1">
                      <a class="btn btn-primary" aria-hidden="true" id="moreImg"><i class="fa fa-plus"></i>Add More Image</a>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="exampleInputFile" class="col-sm-2 control-label">Images</label>

                    <div class="col-sm-9">
                      <div class="input-files">

                        <div style="vertical-align: middle; margin-top:5px;">

                          <input type="file" name="1" id="1" style="float:left; display: inline-block; margin-right:20px;" required>
                          <button type="submit" class="btn btn-sm btn-success" onclick="uploadImage('1'); return false;" style="float:left; display: inline-block; margin-right:20px;">Upload</button>
                          <button type="submit" class="btn btn-sm btn-danger" onclick="removeImage('1'); return false;" style="float:left; display: inline-block; margin-right:20px;">Remove</button>

                        </div>
                        </br>

                      </div>

                    </div>
                  </div>



                  </br></br>
                  <div class="col-sm-offset-2">
                    <button type="submit" class="btn btn-primary" href="javascript:void(0)" onclick="saveProduct(this); return false;">Save</button>
                    <button type="submit" class="btn btn-dark" href="javascript:void(0)" onclick="javascript:history.back()">Cancel</button>

                  </div>


                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!--		</div>  -->
    </div>


    <div class="clearfix"> </div>

  </div>






  <div class="clearfix"> </div>

</div>


<div class="col_1">


  <div class="clearfix"> </div>

</div>

<!--footer-->
<?php include('footernew.php'); ?>

<script>
  var variantarray = "";

  function getVariant() {
    // alert( "sdfs" );
    var count = 1;
    $.ajax({
      method: 'POST',
      url: 'get_variant_data_tree.php',
      data: {
        code: "123"
      },
      success: function(response) {
        // alert(response); // display response from the PHP script, if any
        variantarray = response;
        addconfig();
        //alert( " va "+ variantarray);
      }
    });
  }
</script>



<script>
  var imagejson = [];
  var attrjson = [];
  var multiPriceMainjson = [];
  var multipriceimagecount = 1;
  var atr_id = 100;
  var attvalue_id = 200;
  var attstockvalue_id = 300;
  var attmrpvalue_id = 400;
  var attskuvalue_id = 600;
  $(document).ready(function() {
    getVariant();
    var id = multipriceimagecount;
    var high = "50";
    $("#moreImg").click(function() {
      multipriceimagecount = ++multipriceimagecount;
      //   alert("file id "+multipriceimagecount)
      var showId = multipriceimagecount;
      if (showId <= high) {
        $(".input-files").append('<br><input type="file" id="' + showId + '" style="float:left; display: inline-block; margin-right:20px;"> </input> ' +
          '<button name="btn_upload-' + showId + '" type="submit" class="btn btn-sm btn-success" onclick="uploadImage(' + showId + '); return false;" style="float:left; display: inline-block; margin-right:20px;">Upload</button> ' +
          '<button name="btn_remove-' + showId + '" type="submit" class="btn btn-sm btn-danger" onclick="removeImage(' + showId + '); return false;" style="float:left; display: inline-block; margin-right:20px;">Remove</button> <br>');

      }
    });
    //	 getProductImage(3);
    $("#moreAttribute").click(function() {
      var showId = ++atr_id;
      var valueid = ++attvalue_id;
      var stockvalueid = ++attstockvalue_id;
      var mrpvalueid = ++attmrpvalue_id;
      var skuvalueid = ++attskuvalue_id;

      $(".add-attr").append('<br><div style="border:1px solid #D3D3D3; padding:12px;">' +
        '<a class="fa fa-plus fa-4 btn btn-warning" aria-hidden="true"  onclick="moreMultiPriceImage(' + showId + '); return false;" >Add Image</a>' +
        '<div class="input-files' + showId + '"> </div> ' +
        '<br><br>' +
        '<select class="form-control" id="' + showId + '" style="width:100px; float:left; display: inline-block; margin-right:20px;">' + variantarray + '</select> ' +
        //'<input type="text"  id="'+showId+'" class="form-control"  placeholder="size" style="width:100px; float:left; display: inline-block; margin-right:20px;"> </input> '+
        '<input type="text"  id="' + mrpvalueid + '" class="form-control"  placeholder="MRP" style="width:100px; float:left; margin-right:20px;"> </input> ' +
        '<input type="text"  id="' + valueid + '" class="form-control"  placeholder="Price" style="width:100px; float:left; display: inline-block; margin-right:20px;"> </input> ' +
        '<input type="text"  id="' + stockvalueid + '" class="form-control"  placeholder="stock" style="width:100px; float:left; display: inline; margin-right:20px;"> </input> ' +
        '<input type="text"  id="' + skuvalueid + '" class="form-control"  placeholder="SKU" style="width:100px; float:left; display: inline-block; margin-right:20px;"> </input> ' +
        '<button name="btn_save-' + showId + '" type="submit" class="btn btn-sm btn-success" onclick="saveInfoCheck(' + showId + ',' + atr_id + '); return false;" style="float:left; display: inline-block; margin-right:20px;">Save</button>' +
        '<button name="btnremove-' + showId + '" type="submit" class="btn btn-sm btn-danger" onclick="removeInfo(' + showId + ',' + atr_id + '); return false;" style="float:left; display: inline-block; margin-right:20px;">Remove</button><br></div>');

    });


  });
</script>
<script>
  function moreMultiPriceImage(element) {
    multipriceimagecount = ++multipriceimagecount;
    var showId = Number(element) + 400;

    //alert(element+ "--showid--"+showId +"--"+multipriceimagecount) ;
    //	$(".input-files").append('<br><input type="file" id="'+showId+'"> </input>  <button name="btn_upload-'+showId+'" type="submit" class="btn btn-default" onclick="uploadImage('+showId+'); return false;">Upload</button></br>  ');
    $(".input-files" + element).append('<br><input type="file" id="' + multipriceimagecount + '" style="float:left; display: inline-block; margin-right:20px;"> </input> ' +
      '<button name="btn_upload-' + showId + '" type="submit" class="btn btn-sm btn-success" onclick="uploadMultiPriceImage(' + showId + ', ' + multipriceimagecount + '); return false;" style="float:left; display: inline-block; margin-right:20px;">Upload</button> ' +
      '<button name="btn_remove-' + showId + '" type="submit" class="btn btn-sm btn-danger" onclick="removeMultiPriceImage(' + showId + '); return false;" style="float:left; display: inline-block; margin-right:20px;">Remove</button> <br>');


  }
</script>
<script>
  function deleteImg(id) {

    var prod_id = $('#prod_id').val();

    //  alert("prod ID "+id +"--"+prod_id); 
    $.ajax({
      method: 'POST',
      url: 'delete_product_image.php',
      data: {
        code: "123",
        delete_id: id,
        prod_id: prod_id
      },
      success: function(response) {
        alert(response); // display response from the PHP script, if any
        getProductImage(prod_id);
      }
    });
  }

  function getProductImage(id) {
    // alert( "prod id "+id );
    var count = 1;
    $.ajax({
      method: 'POST',
      url: 'get_product_image.php',
      data: {
        code: "123",
        prod_id: id
      },
      success: function(response) {
        // alert(response); // display response from the PHP script, if any
        var data = $.parseJSON(response);
        imagejson = $.parseJSON(response);
        imagejson = JSON.stringify(imagejson);

        $("#bt_list").empty();
        var count = 0;
        $(data).each(function() {

          var prod_url = "../media/" + this.url;
          //	alert("img url "+this.url+ "--"+prod_url );
          //	$("#bt_list").append('<li><input type="checkbox" name="chkbox"  value="'+this.url+'"/><lable>'+this.url+'</label> </li>');
          $("#bt_list").append('<a class="label label-warning" onclick="deleteImg(' + count + ')" >DELETE</a><img src="' + prod_url + '" alt="' + prod_url + '" height="150" width="270" hspace="20" vspace="20"> ');

          count = count + 1;
        });

      }
    });
  }
</script>
<script>
  function saveInfoCheck(element, elem2) {
    // $('#'+element).val('');
    var count = Number(element) + 100;
    var stockcount = Number(element) + 200;
    var mrpcount = Number(element) + 300;
    var imagefile = Number(element) + 400;
    var indexv = parseInt(elem2);
    var skucount = Number(element) + 500;

    indexv = indexv - 100;
    var attrvalue = $('#' + count).val();
    //var attrname = $('#'+element).val();
    var attrstockvalue = $('#' + stockcount).val();
    var attrmrpvalue = $('#' + mrpcount).val();
    var name = $('#' + imagefile).val();
    var attrskuvalue = $('#' + skucount).val();

    var cat = document.getElementById(element);
    var attrname = cat.options[cat.selectedIndex].value;

    var parsedJSON = multiPriceMainjson;
    var multiimagearray = [];
    //  alert("before " +parsedJSON);                                        

    for (var i = 0; i < parsedJSON.length; i++) {
      var counter = parsedJSON[i];
      // var name = counter.url;
      if (counter.id === imagefile) {
        // alert("id exist add image--" +imagefile +"--"+counter.url+"--");
        multiimagearray.push({
          "id": i,
          "url": counter.url
        });

      }
      //  alert( parsedJSON);
    }
    var imageurl = multiimagearray;
    // file_data =  name.files.item(0).name;
    // alert("imagefile--"+name+ "--"); 

    //alert( "empty file  ");
    if (indexv <= attrjson.length) {
      // update
      for (var i = 0; i < attrjson.length; i++) {
        if (i == indexv - 1) {
          attrjson[i].attrnam = attrname;
          attrjson[i].attrvalue = attrvalue;
          attrjson[i].attrstockvalue = attrstockvalue;
          attrjson[i].attrmrpvalue = attrmrpvalue;
          attrjson[i].attrimage = imageurl;
          attrjson[i].attrskuvalue = attrskuvalue;
          break;
        }
      }
    } else {
      attrjson.push({
        "attrnam": attrname,
        "attrvalue": attrvalue,
        "attrstockvalue": attrstockvalue,
        "attrmrpvalue": attrmrpvalue,
        "attrimage": imageurl,
        "attrskuvalue": attrskuvalue
      });
    }

    // alert("save "+ attrname +" -- "+ attrvalue + "-- "+attrjson.length+ "--"+ elem2);
    $('#' + count).prop("disabled", true);
    $('#' + element).prop("disabled", true);
    $('#' + stockcount).prop("disabled", true);
    $('#' + mrpcount).prop("disabled", true);
    $('#' + skucount).prop("disabled", true);


  }

  function saveInfoCheckExist(element, elem2) {
    // $('#'+element).val('');
    var count = Number(element) + 100;
    var stockcount = Number(element) + 200;
    var mrpcount = Number(element) + 300;
    var imagefile = Number(element) + 400;
    var indexv = parseInt(elem2);
    var skucount = Number(element) + 500;

    indexv = indexv - 100;
    var attrvalue = $('#' + count).val();
    //var attrname = $('#'+element).val();
    var attrstockvalue = $('#' + stockcount).val();
    var attrmrpvalue = $('#' + mrpcount).val();
    var name = $('#' + imagefile).val();
    var attrskuvalue = $('#' + skucount).val();

    var cat = document.getElementById(element);
    var attrname = cat.options[cat.selectedIndex].value;


    var parsedJSON = multiPriceMainjson;
    var multiimagearray = [];
    //  alert("before " +parsedJSON);                                        

    for (var i = 0; i < parsedJSON.length; i++) {
      var counter = parsedJSON[i];
      // var name = counter.url;
      if (counter.id === imagefile) {
        // alert("id exist add image--" +imagefile +"--"+counter.url+"--");
        multiimagearray.push({
          "id": i,
          "url": counter.url
        });

      }
      //  alert( parsedJSON);
    }
    var imageurl = multiimagearray;
    // file_data =  name.files.item(0).name;
    // alert("imagefile--"+name+ "--"); 

    //alert( "empty file  ");
    if (indexv <= attrjson.length) {
      // update
      for (var i = 0; i < attrjson.length; i++) {
        if (i == indexv - 1) {
          attrjson[i].attrnam = attrname;
          attrjson[i].attrvalue = attrvalue;
          attrjson[i].attrstockvalue = attrstockvalue;
          attrjson[i].attrmrpvalue = attrmrpvalue;
          attrjson[i].attrskuvalue = attrskuvalue;
          break;
        }
      }
    } else {
      attrjson.push({
        "attrnam": attrname,
        "attrvalue": attrvalue,
        "attrstockvalue": attrstockvalue,
        "attrmrpvalue": attrmrpvalue,
        "attrimage": imageurl,
        "attrskuvalue": attrskuvalue
      });
    }

    // alert("save "+ attrname +" -- "+ attrvalue + "-- "+attrjson.length+ "--"+ elem2);
    $('#' + count).prop("disabled", true);
    $('#' + element).prop("disabled", true);
    $('#' + stockcount).prop("disabled", true);
    $('#' + mrpcount).prop("disabled", true);
    $('#' + skucount).prop("disabled", true);

  }
</script>

<script>
  function saveInfo(element, elem2, imageurl) {
    //var file_data = $('#'+element).prop('files')[0]; 
    var count = Number(element) + 100;
    var stockcount = Number(element) + 200;
    var mrpcount = Number(element) + 300;
    var indexv = parseInt(elem2);

    indexv = indexv - 100;
    var attrvalue = $('#' + count).val();
    //var attrname = $('#'+element).val();
    var attrstockvalue = $('#' + stockcount).val();
    var attrmrpvalue = $('#' + mrpcount).val();

    var cat = document.getElementById(element);
    var attrname = cat.options[cat.selectedIndex].value;


    if (indexv <= attrjson.length) {
      // update
      for (var i = 0; i < attrjson.length; i++) {
        if (i == indexv - 1) {
          attrjson[i].attrnam = attrname;
          attrjson[i].attrvalue = attrvalue;
          attrjson[i].attrstockvalue = attrstockvalue;
          attrjson[i].attrmrpvalue = attrmrpvalue;
          attrjson[i].attrimage = imageurl;
          break;
        }
      }

    } else {
      // insert new
      attrjson.push({
        "attrnam": attrname,
        "attrvalue": attrvalue,
        "attrstockvalue": attrstockvalue,
        "attrmrpvalue": attrmrpvalue,
        "attrimage": imageurl
      });
    }

    //   alert("save "+ attrname +" -- "+ attrvalue + "-- "+attrjson.length+ "--"+ elem2);
    $('#' + count).prop("disabled", true);
    $('#' + element).prop("disabled", true);
    $('#' + stockcount).prop("disabled", true);
    $('#' + mrpcount).prop("disabled", true);
  }
</script>
<script>
  function removeInfo(element, elem2) {
    //var file_data = $('#'+element).prop('files')[0]; 
    var count = Number(element) + 100;
    var stockcount = Number(element) + 200;
    var mrpcount = Number(element) + 300;
    var skucount = Number(element) + 500;
    var attrvalue = $('#' + count).val();
    var attrstockvalue = $('#' + stockcount).val();
    // var attrname = $('#'+element).val();
    var indexv = parseInt(elem2);

    var cat = document.getElementById(element);
    var attrname = cat.options[cat.selectedIndex].value;

    indexv = indexv - 100;

    // alert("sdfsdf  -- "+attrjson.length + "--"+elem2); 
    var parsedJSON = attrjson;
    //  alert("before " +parsedJSON);                                        

    for (var i = 0; i < parsedJSON.length; i++) {
      var counter = parsedJSON[i];
      // var name = counter.url;
      if (i == indexv - 1) {
        //alert("remove it " +parsedJSON[i]);
        //delete parsedJSON[i];
        parsedJSON.splice(i, 1);

      }
      //  alert( parsedJSON);
    }

    //  attrjson = JSON.stringify(parsedJSON);

    // imagejson = parsedJSON;
    //  alert("after " + JSON.stringify(parsedJSON)); 

    // alert("remove "+ attrname +" -- "+ attrvalue);
    $('#' + count).prop("disabled", false);
    $('#' + stockcount).prop("disabled", false);
    $('#' + element).prop("disabled", false);
    $('#' + mrpcount).prop("disabled", false);
    $('#' + skucount).prop("disabled", false);

    $('#' + element).val('');
    $('#' + count).val('');
    $('#' + stockcount).val('');
    $('#' + mrpcount).val('');
    $('#' + skucount).val('');

    $(".input-files" + element).empty();


  }
</script>
<script>
  function removeImage(element) {

    //  alert( "input name---"+ element+"---" );
    var file_data = $('#' + element).prop('files')[0];
    var form_data = new FormData();
    form_data.append('file', file_data);
    $('#' + element).val('');
    //alert("sdfsdf "+file_data.name+ " -- "+imagejson.length); 
    var parsedJSON = JSON.parse(imagejson);
    // alert("before " +parsedJSON);                                        

    for (var i = 0; i < parsedJSON.length; i++) {
      var counter = parsedJSON[i];
      // var name = counter.url;
      if (counter.url.includes(file_data.name)) {
        // alert("remove it " +parsedJSON[i]);
        //delete parsedJSON[i];
        parsedJSON.splice(i, 1);

      }
      //  alert( parsedJSON);
    }

    imagejson = JSON.stringify(parsedJSON);

    // imagejson = parsedJSON;
    //     alert("after " + imagejson);          

  }
</script>

<script type="text/javascript">
  /// upload image /video
  function uploadMultiPriceImage(element, filenumber) {

    //  alert( "element---"+ element+"--filenumber--" +filenumber);
    var imagefile = Number(filenumber); //+400;
    var file_data = $('#' + imagefile).prop('files')[0];
    var form_data = new FormData();
    form_data.append('file', file_data);
    // alert("image --"+file_data+"--"+imagefile);                             

    $.ajax({
      url: 'add_product_image.php', // point to server-side PHP script 
      dataType: 'text', // what to expect back from the PHP script, if anything
      cache: false,
      contentType: false,
      processData: false,
      data: form_data,
      type: 'post',
      success: function(response) {
        if (response === "") {

        } else {
          alert(response); // display response from the PHP script, if any
          var thumname = response.replace("Upload successfully--", "");
          // alert(" success --"+element+"--"+ thumname);
          //      success --503--2020-12-03/Apple.jpg
          //      success --503--2020-12-03/Apple.jpg
          // multi qty price
          multiPriceMainjson.push({
            "id": element,
            "url": thumname
          });
          var multiPriceMainvalue = JSON.stringify(multiPriceMainjson);
          //  alert("multiimage---"+multiPriceMainvalue);
          // saveInfo(element, thumname);

        }

      }
    });

  }
</script>


<script type="text/javascript">
  /// upload image /video
  function uploadImage(element) {

    //  alert( "input name---"+ element+"---" );
    var file_data = $('#' + element).prop('files')[0];
    var form_data = new FormData();
    form_data.append('file', file_data);
    //  alert("sdfsdf");                             

    $.ajax({
      url: 'add_product_image.php', // point to server-side PHP script 
      dataType: 'text', // what to expect back from the PHP script, if anything
      cache: false,
      contentType: false,
      processData: false,
      data: form_data,
      type: 'post',
      success: function(response) {
        if (response === "") {

        } else {
          alert(response); // display response from the PHP script, if any
          var thumname = response.replace("Upload successfully--", "");
          imagejson = JSON.parse(imagejson);
          //  alert("lenght "+imagejson.length);

          //  alert( "json added "+ imagejson);  
          imagejson.push({
            // "id" : element,
            "url": thumname
          });
          imagejson = JSON.stringify(imagejson);

        }
        //alert( "after "+  imagejson);                
        // addImageIntoAlbum(thumname);
      }
    });

  }
</script>

<script>
  function saveProduct() {
    var prod_idvalue = $('#prod_id').val();

    var prod_namevalue = $('#prod_name').val();
    var prod_shortvalue = $('#prod_short').val();
    var prod_detailsvalue = $('#prod_details').val();
    var prod_namevalue_ar = $('#prod_name_ar').val();
    var prod_shortvalue_ar = $('#prod_short_ar').val();
    var prod_detailsvalue_ar = $('#prod_details_ar').val();
    var prod_pricevalue = $('#prod_price').val();
    var prod_mrpvalue = $('#prod_mrp').val();
    var prod_cgstvalue = $('#prod_cgst').val();
    var prod_sgstvalue = $('#prod_sgst').val();
    var prod_igstvalue = $('#prod_igst').val();
    var prod_shipvalue = $('#prod_shipping').val();
    var prod_hsnvalue = $('#prod_hsn').val();
    var prod_wpricevalue = $('#prod_w_price').val();
    var prod_wqtyvalue = $('#prod_w_qty').val();
    var prod_colorvalue = $('#prod_color').val();
    var prod_sizevalue = $('#prod_size').val();
    var prod_weightvalue = $('#prod_weight').val();
    var prod_qtyvalue = $('#prod_qty').val();
    var prod_unitvalue = $('#prod_unit').val();
    var prod_videovalue = ""; //$('#prod_videoid').val();
    var prod_discountcoins = $('#prod_discountcoins').val();
    var prod_refercoins = $('#prod_refercoins').val();
    var displaystockvalue = $('#displaystock').val();
    var sellernamevalue = $('#sellername').val();
    var remarkvalue = $('#prod_remark').val();
    var ratingvalue = $('#prod_rating').val();
    var ratingcountvalue = $('#prod_ratingcount').val();


    var cat = document.getElementById("selectcategory");
    var catvalue = cat.options[cat.selectedIndex].value;

    var bra = document.getElementById("selectbrand");
    var bravalue = bra.options[bra.selectedIndex].value;

    var freeship = document.getElementById("freeshipessential");
    var freeshipvalue = freeship.options[freeship.selectedIndex].value;

    var myJSON = imagejson;
    //  alert("my jsn "+myJSON);
    // multi qty price
    var prod_multiqtyvalue = JSON.stringify(attrjson);

    var count = 1;
    // alert( prod_shortvalue + " --"+prod_multiqtyvalue+"---" );
    if (prod_namevalue == "" || prod_namevalue == null) {

      alert("Name is empty");
    } else if (prod_pricevalue == "" || prod_pricevalue == null && attrjson.length <= 0) {

      alert("Price is empty");
    } else if (catvalue == "blank") {

      alert("Please Select Category");
    } else if (bravalue == "blank") {

      alert("Please Select Brand");
    } else {
      //  alert(" ready to store "+myJSON + "--"+prod_idvalue);

      $.ajax({
        method: 'POST',
        url: 'edit_product_process.php',
        data: {
          name: prod_namevalue,
          short: prod_shortvalue,
          full: prod_detailsvalue,
          name_ar: prod_namevalue_ar,
          short_ar: prod_shortvalue_ar,
          full_ar: prod_detailsvalue_ar,
          mrp: prod_mrpvalue,
          price: prod_pricevalue,
          cgst: prod_cgstvalue,
          sgst: prod_sgstvalue,
          igst: prod_igstvalue,
          shipping: prod_shipvalue,
          hsn: prod_hsnvalue,
          w_price: prod_wpricevalue,
          w_qty: prod_wqtyvalue,
          color: prod_colorvalue,
          size: prod_sizevalue,
          weight: prod_weightvalue,
          stock_qty: prod_qtyvalue,
          unit: prod_unitvalue,
          cat: catvalue,
          brand: bravalue,
          imagejson: myJSON,
          prod_id: prod_idvalue,
          videoid: prod_videovalue,
          pricearray: prod_multiqtyvalue,
          discountcoins: prod_discountcoins,
          refercoins: prod_refercoins,
          displaystock: displaystockvalue,
          sellername: sellernamevalue,
          remark: remarkvalue,
          freeship: freeshipvalue,
          ratingstar: ratingvalue,
          ratingcount: ratingcountvalue

        },
        success: function(response) {
          alert(response); // display response from the PHP script, if any

        }
      });



    }
  }
</script>