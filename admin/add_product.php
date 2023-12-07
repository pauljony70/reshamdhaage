<?php
include('session.php');

if (!isset($_SESSION['admin'])) {
  header("Location: index.php");
}

?>
<?php include("header.php"); ?>
<?php
function variantTree($parent_idv = 0, $sub_mark = '')
{

  global $conn;
  $query2 = $conn->query("SELECT * FROM product_variant_cat WHERE parent_id = $parent_idv ORDER BY variant_name ASC");
  if ($query2->num_rows > 0) {
    while ($row = $query2->fetch_assoc()) {
      echo '<option value="' . $row['variant_name'] . '">' . $sub_mark . $row['variant_name'] . '</option>';
      variantTree($row['variant_id'], $sub_mark . '---');
    }
  }
}
// variantTree();
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

              <div class="bs-example widget-shadow" data-example-id="hoverable-table">

                <button style="display:none;" onclick="location.href = 'bulk_upload.php';" type="button" class="btn btn-primary  pull-right">Bulk upload</button>

                <h4>Add New Product :</h4>

                <div class="form-three widget-shadow">
                  <form class="form-horizontal" id="myform">
                    <a> ** required field</a>
                    <div class="form-group row">
                      <label for="focusedinput" class="col-sm-2 control-label">Product Name **</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="prod_name" placeholder="Name" required>
                      </div>
                      <div class="col-sm-2">
                        <p class="help-block"></p>
                      </div>
                    </div>
                    <div class="form-group row" style="display:none;">
                      <label for="focusedinput" class="col-sm-2 control-label">Product Name Arabic **</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="prod_name_ar" placeholder="Name Arabic" required>
                      </div>
                      <div class="col-sm-2">
                        <p class="help-block"></p>
                      </div>
                    </div>
                    <div class="form-group row" style="display:none;">
                      <label for="focusedinput" class="col-sm-2 control-label">Product Short details **</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="prod_short" placeholder="Short description" required>
                      </div>
                    </div>
                    <div class="form-group row" style="display:none;">
                      <label for="focusedinput" class="col-sm-2 control-label">Product Short details Arabic **</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="prod_short_ar" placeholder="Short description Arabic" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="focusedinput" class="col-sm-2 control-label">Product Full Details **</label>
                      <div class="col-sm-8">
                        <textarea class="form-control" rows="6" cols="90" id="prod_details" name="prod_details" form="usrform" required placeholder="Enter text here..."></textarea>
                      </div>
                    </div>
                    <div class="form-group row" style="display:none;">
                      <label for="focusedinput" class="col-sm-2 control-label">Product Full Details Arabic **</label>
                      <div class="col-sm-8">
                        <textarea rows="6" cols="90" id="prod_details_ar" name="prod_details_ar" form="usrform" required placeholder="Enter text here..."></textarea>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="focusedinput" class="col-sm-2 control-label">MRP **</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="prod_mrp" placeholder="MRP ex. 214" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="focusedinput" class="col-sm-2 control-label">Sale Price**</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="prod_price" placeholder="Sale Price ex. 208" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="focusedinput" class="col-sm-2 control-label">Stock</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="prod_qty" placeholder="New Stock Quantity ex. 200, 500">
                      </div>
                    </div>
                    <div class="form-group row">

                      <label for="exampleInputFile" class="col-sm-2 control-label">Multi Qty Price</label>

                      <div class="col-sm-8">
                        <a class="btn btn-dark" aria-hidden="true" id="moreAttribute"><i class="fa-solid fa-plus"></i> Add More Size & Price, Stock</a>
                      </div>
                    </div>
                    <div class="form-group row">
                      </br>
                      <label for="exampleInputFile" class="col-sm-2 control-label">Attribute</label>

                      <div class="col-sm-9">
                        <div class="add-attr">
                          <div style="border:1px solid #D3D3D3; padding:12px;" class="pb-3">

                            <a class="btn btn-warning" aria-hidden="true" onclick="moreMultiPriceImage('101'); return false;"><i class="fa-solid fa-plus"></i> Add Image</a>

                            <div class="input-files101">
                            </div>
                            <br><br>
                            <select name="101" id="101" class="form-control" placeholder="Size" style="width:100px; float:left; display: inline-block; margin-right:20px;">
                              <?php
                              variantTree();
                              ?>
                            </select>
                            <input type="text" name="401" id="401" class="form-control" placeholder="MRP" style="width:100px;  float:left; margin-right:20px;">
                            <input type="text" name="201" id="201" class="form-control" placeholder="Price" style="width:100px; float:left; display: inline-block; margin-right:20px;">
                            <input type="text" name="301" id="301" class="form-control" placeholder="stock" style="width:100px; float:left; display: inline; margin-right:20px;">
                            <input type="text" name="601" id="601" class="form-control" placeholder="SKU" style="width:100px; float:left; display: inline-block; margin-right:20px;">
                            <button type="submit" onclick="saveInfoCheck('101'); return false;" class="btn btn-success" style="float:left; display: inline-block; margin-right:20px;">Save</button>
                            <button type="submit" onclick="removeInfo('101'); return false;" class="btn btn-danger" style="float:left; display: inline-block; margin-right:20px;">Remove</button>
                            <br>

                          </div>
                          </br>
                        </div>
                      </div>
                    </div>


                    <div class="form-group row">
                      <label for="focusedinput" class="col-sm-2 control-label">SKU Code </label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="prod_hsn" placeholder="Product SKU code">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="focusedinput" class="col-sm-2 control-label">CGST (in %)</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="prod_cgst" placeholder="CGST on sale price. Example. 5, 18 ">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="focusedinput" class="col-sm-2 control-label">SGST (in %)</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="prod_sgst" placeholder="SGST on sale price. Example. 5, 18 ">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="focusedinput" class="col-sm-2 control-label">IGST (in %)</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="prod_igst" placeholder="IGST on sale price. Example. 5, 18 ">
                      </div>
                    </div>

                    <div class="form-group row" style="display:none;">
                      <label class="col-sm-2 control-label">Essential free ship</label>
                      <div class="col-sm-8">
                        <select class="form-control" id="freeshipessential" name="freeshipessential">
                          <option value="0">No</option>
                          <option value="1"> Yes</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row" style="display:none;">
                      <label for="focusedinput" class="col-sm-2 control-label">Shipping Cost</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="prod_shipping" placeholder="Shipping Cost. Ex. 50">
                      </div>
                    </div>

                    <div class="form-group row" style="display:none;">
                      <label for="focusedinput" class="col-sm-2 control-label">Whole Sale Price</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="prod_w_price" placeholder="Single Product Price without Tax in Whole sale">
                      </div>
                    </div>
                    <div class="form-group row" style="display:none;">
                      <label for="focusedinput" class="col-sm-2 control-label">Min. Whole Sale Qty.</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="prod_w_qty" placeholder="Min. Quantity required to place order in whole sale.">
                      </div>
                    </div>
                    <div class="form-group row" style="display:none;">
                      <label for="focusedinput" class="col-sm-2 control-label">Color</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="prod_color" placeholder="use , for multiple color. Example red, yellow, blue">
                      </div>
                    </div>
                    <div class="form-group row" style="display:none;">
                      <label for="focusedinput" class="col-sm-2 control-label">Size</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="prod_size" placeholder="use , for multiple size. Example S, M, L, XL">
                      </div>
                    </div>
                    <div class="form-group row" style="display:none;">
                      <label for="focusedinput" class="col-sm-2 control-label">Weight </label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="prod_weight" placeholder="Ex. 200 gm, 1 kg">
                      </div>
                    </div>

                    <div class="form-group row" style="display:none;">
                      <label for="focusedinput" class="col-sm-2 control-label">Display Stock</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="displaystock" placeholder="Display Stock ex. 200, 500">
                      </div>
                    </div>
                    <div class="form-group row" style="display:none;">
                      <label for="focusedinput" class="col-sm-2 control-label">Stockist Name</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="sellername" placeholder="Stockist Name">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="focusedinput" class="col-sm-2 control-label">Remarks</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="prod_remark" placeholder="200 sold in 3 hours">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="focusedinput" class="col-sm-2 control-label">Rating Star </label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="prod_rating" placeholder="Ex. Rating between 1 to 5">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="focusedinput" class="col-sm-2 control-label">Rating Count </label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="prod_ratingcount" placeholder="Ex. 200, 556">
                      </div>
                    </div>
                    <div class="form-group row" style="display:none;">
                      <label for="focusedinput" class="col-sm-2 control-label">Unit </label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="prod_unit" placeholder="example - gm, kg, bottle">
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


                          function categoryTree($parent_id = 0, $sub_mark = '')
                          {
                            global $conn;
                            $query = $conn->query("SELECT * FROM category WHERE parent_id = $parent_id ORDER BY cat_name ASC");

                            if ($query->num_rows > 0) {
                              while ($row = $query->fetch_assoc()) {
                                echo '<option value="' . $row['cat_id'] . '">' . $sub_mark . $row['cat_name'] . '</option>';
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
                          $stmt->bind_result($col1, $col2);

                          while ($stmt->fetch()) {
                            echo '<option value="' . $col1 . '">' . $col2 . '</option>';
                          }


                          ?>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row">

                      <label for="exampleInputFile" class="col-sm-2 control-label">Product Images</label>

                      <div class="col-sm-8 input-files1">
                        <a class="btn btn-primary" aria-hidden="true" id="moreImg"><i class="fa fa-plus"></i> Add More Image</a>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputFile" class="col-sm-2 control-label">Images</label>

                      <div class="col-sm-9">
                        <div class="input-files">
                          <!--    <input type="file" name="1" id="1" required>
                                                             <button type="submit" class="btn btn-default" onclick="uploadImage('1'); return false;">Upload</button></br>
                                                       
                                                        -->
                          <div style="vertical-align: middle; margin-top:5px;">

                            <input type="file" name="1" id="1" style="float:left; display: inline-block; margin-right:20px;" required>
                            <button type="submit" class="btn btn-success" onclick="uploadImage('1'); return false;" style="float:left; display: inline-block; margin-right:20px;">Upload</button>
                            <button type="submit" class="btn btn-danger" onclick="removeImage('1'); return false;" style="float:left; display: inline-block; margin-right:20px;">Remove</button>

                          </div>
                          </br>
                        </div>

                      </div>
                    </div>



                    </br></br>
                    <div class="col-sm-offset-2">
                      <button type="submit" class="btn btn-dark" href="javascript:void(0)" onclick="addProduct(this); return false;">Add Product</button>
                    </div>


                  </form>
                </div>

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    <div class="clearfix"> </div>

  </div>


  <div class="clearfix"> </div>

</div>

<!--footer-->
<?php include('footernew.php'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.4/tinymce.min.js" integrity="sha512-kQSkkpoq98tNK/kdapmHfgiLLNnpu3nsyUX5O67/9sr+qKN25tNBo07y/8NM/usymGx2Qif4FawiqbCjOFkaFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
  var notiimage = "";
  $(document).ready(function() {
    getVariant();
    var id = multipriceimagecount;
    var high = "50";
    $("#moreImg").click(function() {
      multipriceimagecount = ++multipriceimagecount;
      //   alert("file id "+multipriceimagecount)
      var showId = multipriceimagecount;
      if (showId <= high) {
        //	$(".input-files").append('<br><input type="file" id="'+showId+'"> </input>  <button name="btn_upload-'+showId+'" type="submit" class="btn btn-default" onclick="uploadImage('+showId+'); return false;">Upload</button></br>  ');
        $(".input-files").append('<br><input type="file" id="' + showId + '" style="float:left; display: inline-block; margin-right:20px;"> </input> ' +
          '<button name="btn_upload-' + showId + '" type="submit" class="btn btn-success" onclick="uploadImage(' + showId + '); return false;" style="float:left; display: inline-block; margin-right:20px;">Upload</button> ' +
          '<button name="btn_remove-' + showId + '" type="submit" class="btn btn-danger" onclick="removeImage(' + showId + '); return false;" style="float:left; display: inline-block; margin-right:20px;">Remove</button> <br>');


      }
    });

    // multi qty price
    //	<label >(if any)</label> 
    //    <input type="file" name="501" id="501"  style="float:left; display: inline-block; margin-right:20px;">
    //    <br><br>
    var atr_id = 102;
    var attvalue_id = 202;
    var attstockvalue_id = 302;
    var attmrpvalue_id = 402;
    var attskuvalue_id = 602;
    $("#moreAttribute").click(function() {
      var showId = ++atr_id;
      var valueid = ++attvalue_id;
      var stockvalueid = ++attstockvalue_id;
      var mrpvalueid = ++attmrpvalue_id;
      var skuvalueid = ++attskuvalue_id;


      $(".add-attr").append('<br><div style="border:1px solid #D3D3D3; padding:12px;" class="pb-3">' +
        '<a class="btn btn-warning" aria-hidden="true"  onclick="moreMultiPriceImage(' + showId + '); return false;" ><i class="fa fa-plus"></i> Add Image</a>' +
        '<div class="input-files' + showId + '"> </div> ' +
        '<br><br>' +
        '<select class="form-control" id="' + showId + '" style="width:100px; float:left; display: inline-block; margin-right:20px;">' + variantarray + '</select> ' +
        //'<input type="text"  id="'+showId+'" class="form-control"  placeholder="Size" style="width:100px; float:left; display: inline-block; margin-right:20px;"> </input> '+
        '<input type="text"  id="' + mrpvalueid + '" class="form-control"  placeholder="MRP" style="width:100px; float:left; margin-right:20px;"> </input> ' +
        '<input type="text"  id="' + valueid + '" class="form-control"  placeholder="Price" style="width:100px; float:left; display: inline-block; margin-right:20px;"> </input> ' +
        '<input type="text"  id="' + stockvalueid + '" class="form-control"  placeholder="stock" style="width:100px; float:left; display: inline; margin-right:20px;"> </input> ' +
        '<input type="text"  id="' + skuvalueid + '" class="form-control"  placeholder="SKU" style="width:100px; float:left; display: inline-block; margin-right:20px;"> </input> ' +
        '<button name="btn_save-' + showId + '" type="submit" class="btn btn-success" onclick="saveInfoCheck(' + showId + '); return false;" style="float:left; display: inline-block; margin-right:20px;">Save</button>' +
        '<button name="btnremove-' + showId + '" type="submit" class="btn btn-danger" onclick="removeInfo(' + showId + '); return false;" style="float:left; display: inline-block; margin-right:20px;">Remove</button><br></div>');

    });

  });
</script>
<script>
  function moreMultiPriceImage(element) {
    multipriceimagecount = ++multipriceimagecount;
    var showId = Number(element) + 400;

    // alert(element+ "--showid--"+showId +"--"+multipriceimagecount) ;
    //	$(".input-files").append('<br><input type="file" id="'+showId+'"> </input>  <button name="btn_upload-'+showId+'" type="submit" class="btn btn-default" onclick="uploadImage('+showId+'); return false;">Upload</button></br>  ');
    $(".input-files" + element).append('<br><input type="file" id="' + multipriceimagecount + '" style="float:left; display: inline-block; margin-right:20px;"> </input> ' +
      '<button name="btn_upload-' + showId + '" type="submit" class="btn btn-success" onclick="uploadMultiPriceImage(' + showId + ', ' + multipriceimagecount + '); return false;" style="float:left; display: inline-block; margin-right:20px;">Upload</button> ' +
      '<button name="btn_remove-' + showId + '" type="submit" class="btn btn-danger" onclick="removeMultiPriceImage(' + showId + '); return false;" style="float:left; display: inline-block; margin-right:20px;">Remove</button> <br>');


  }
</script>

<script>
  function saveInfoCheck(element) {
    // $('#'+element).val('');
    var count = Number(element) + 100;
    var stockcount = Number(element) + 200;
    var mrpcount = Number(element) + 300;
    var imagefile = Number(element) + 400;
    var attrvalue = $('#' + count).val();
    var skucount = Number(element) + 500;
    //var attrname = $('#'+element).val();
    var attrstockvalue = $('#' + stockcount).val();
    var attrmrpvalue = $('#' + mrpcount).val();
    var name = $('#' + imagefile).val();
    var attrskuvalue = $('#' + skucount).val();

    var cat = document.getElementById(element);
    var attrname = cat.options[cat.selectedIndex].value;
    // alert("sdfsdf  -- "+multiPriceMainjson.length+"---"+ attrname ); 

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
    // alert("imagefile--"+imageurl+ "--"+multiimagearray.length); 
    //   alert( "imageulr "+imageurl);
    attrjson.push({
      "attrnam": attrname,
      "attrvalue": attrvalue,
      "attrstockvalue": attrstockvalue,
      "attrmrpvalue": attrmrpvalue,
      "attrimage": imageurl,
      "attrskuvalue": attrskuvalue
    });

    //alert("save "+ attrname +" -- "+ attrvalue + "-- "+attrjson.length+ "--"+JSON.stringify(attrjson));
    $('#' + count).prop("disabled", true);
    $('#' + element).prop("disabled", true);
    $('#' + stockcount).prop("disabled", true);
    $('#' + mrpcount).prop("disabled", true);
    $('#' + skucount).prop("disabled", true);

  }
</script>

<script>
  function saveInfo(element, imageurl) {
    //var file_data = $('#'+element).prop('files')[0]; 
    var count = Number(element) + 100;
    var stockcount = Number(element) + 200;
    var mrpcount = Number(element) + 300;
    var attrvalue = $('#' + count).val();
    //var attrname = $('#'+element).val();
    var attrstockvalue = $('#' + stockcount).val();
    var attrmrpvalue = $('#' + mrpcount).val();

    var cat = document.getElementById(element);
    var attrname = cat.options[cat.selectedIndex].value;

    // alert( "empty file  ");
    attrjson.push({
      "attrnam": attrname,
      "attrvalue": attrvalue,
      "attrstockvalue": attrstockvalue,
      "attrmrpvalue": attrmrpvalue,
      "attrimage": imageurl
    });

    // alert("save "+ attrname +" -- "+ attrvalue + "-- "+attrjson.length+ "--"+JSON.stringify(attrjson));
    $('#' + count).prop("disabled", true);
    $('#' + element).prop("disabled", true);
    $('#' + stockcount).prop("disabled", true);
    $('#' + mrpcount).prop("disabled", true);




  }
</script>

<script>
  function removeInfo(element) {
    //var file_data = $('#'+element).prop('files')[0]; 
    var count = Number(element) + 100;
    var stockcount = Number(element) + 200;
    var mrpcount = Number(element) + 300;
    var skucount = Number(element) + 500;
    var attrvalue = $('#' + count).val();
    // var attrname = $('#'+element).val();
    var cat = document.getElementById(element);
    var attrname = cat.options[cat.selectedIndex].value;

    // alert("sdfsdf  -- "+attrjson.length); 
    var parsedJSON = attrjson;
    //  alert("before " +parsedJSON);                                        

    for (var i = 0; i < parsedJSON.length; i++) {
      var counter = parsedJSON[i];
      // var name = counter.url;
      if (counter.attrnam.includes(attrname)) {
        //alert("remove it " +parsedJSON[i]);
        //delete parsedJSON[i];
        parsedJSON.splice(i, 1);

      }
      //  alert( parsedJSON);
    }

    //  attrjson = JSON.stringify(parsedJSON);

    // imagejson = parsedJSON;
    //   alert("after " + JSON.stringify(parsedJSON)); 

    //alert("remove "+ attrname +" -- "+ attrvalue);
    $('#' + count).prop("disabled", false);
    $('#' + element).prop("disabled", false);
    $('#' + stockcount).prop("disabled", false);
    $('#' + mrpcount).prop("disabled", false);
    $('#' + skucount).prop("disabled", false);

    $('#' + element).val('');
    $('#' + count).val('');
    $('#' + stockcount).val('');
    $('#' + mrpcount).val('');
    $('#' + skucount).val('');


  }
</script>

<script>
  function removeImage(element) {

    // alert( "input name---"+ element+"---" );
    var file_data = $('#' + element).prop('files')[0];
    var form_data = new FormData();
    form_data.append('file', file_data);

    $('#' + element).val('');

    // alert("sdfsdf "+file_data.name+ " -- "+imagejson.length); 
    var parsedJSON = JSON.parse(imagejson);
    //   alert("before " +parsedJSON);                                        

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
    //      alert("after " + imagejson);          

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

          imagejson.push({
            "id": element,
            "url": thumname
          });
          notiimage = thumname;

        }

      }
    });

  }
</script>

<script>
  function addProduct() {

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

    var myJSON = JSON.stringify(imagejson)
    // multi qty price
    var prod_multiqtyvalue = JSON.stringify(attrjson);

    var count = 1;
    // alert( prod_shortvalue + " -- "+prod_multiqtyvalue);
    if (prod_namevalue == "" || prod_namevalue == null) {

      alert("Name is empty");
    } else if ((prod_mrpvalue == "" || prod_mrpvalue == null) && attrjson.length <= 0) {

      alert("MRP is empty");
    } else if ((prod_pricevalue == "" || prod_pricevalue == null) && attrjson.length <= 0) {

      alert("Price is empty");
    } else if (catvalue == "blank") {

      alert("Please Select Category");
    } else if (bravalue == "blank") {

      alert("Please Select Brand");
    } else {
      //alert(" ready to store "+prod_namevalue + "---"+prod_detailsvalue_ar );

      $.ajax({
        method: 'POST',
        url: 'add_product_process.php',
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
          // send notification to all users
          //   sendnotification(prod_namevalue, prod_shortvalue );  

          imagejson.length = 0;
          attrjson.length = 0;
          multiPriceMainjson.length = 0;
          $(':input', '#myform')
            .not(':button, :submit, :reset, :hidden')
            .val('')

          window.location.reload();

        }
      });




    }
  }
</script>

<script>
  tinymce.init({
    selector: "textarea#prod_details",
    theme: "modern",
    height: 300,
    plugins: [
      "advlist lists print",
      //  "wordcount code fullscreen",
      "save table directionality emoticons paste textcolor"
    ],
    toolbar: " undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

  });
</script>