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

function generateSelectOptions()
{
  global $conn;

  $query = $conn->query("SELECT * FROM product_variant_cat WHERE parent_id = 0 ORDER BY variant_name ASC");

  if ($query->num_rows > 0) {
    while ($row = $query->fetch_assoc()) {
      echo '<optgroup label="' . $row['variant_name'] . '">';
      variantTree($row['variant_id'], '---');
      echo '</optgroup>';
    }
  }
}
?>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Configurations</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-2">
        <!--<div class="col-sm-8" id="add_more_attr_btndiv">
					<a class="fa fa-plus fa-4 btn btn-dark waves-effect waves-light" aria-hidden="true" onclick="add_more_attrs();">Add More Attributes</a>
				</div>-->
        <form class="form-horizontal" id="myform_attr">
          <div class="form-group row align-items-center">
            <div class="form-group mb-0">
              <div class="col-sm-12">
                <div class="attributes">
                  <table class="table table-sm table-borderless mb-0">
                    <tbody id="selectattrs_div"></tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark waves-effect waves-light" id="manage_configurations_btn" onclick=" return manage_configurations();">Add Configurations</button>
      </div>
    </div>

  </div>
</div>

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
                  <form class="form-horizontal" id="myform" action="add_product_process.php" method="post" enctype="multipart/form-data">
                    <a> ** required field</a>

                    <div class="form-group row">
                      <label for="focusedinput" class="col-sm-2 control-label">Product Name **</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="prod_name" placeholder="Name" value="Jony Paul" required>
                      </div>
                      <div class="col-sm-2">
                        <p class="help-block"></p>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="focusedinput" class="col-sm-2 control-label">Product Full Details **</label>
                      <div class="col-sm-8">
                        <textarea class="form-control" rows="6" cols="90" id="prod_details" name="prod_details" form="usrform" required placeholder="Enter text here..."></textarea>
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
                        <a class="btn btn-dark text-light" aria-hidden="true" id="moreAttribute"><i class="fa-solid fa-plus"></i> Add More Size & Price, Stock</a>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="exampleInputFile" class="col-sm-2 control-label">Attribute</label>
                      <div class="col-sm-9">
                        <div class="add-attr">
                          <div style="border:1px solid #D3D3D3; padding:12px;" class="pb-3">
                            <a class="btn btn-warning text-light" aria-hidden="true" onclick="moreMultiPriceImage('101'); return false;"><i class="fa-solid fa-plus"></i> Add Image</a>
                            <div class="input-files101">
                            </div>
                            <br><br>
                            <select name="101" id="101" class="form-control" placeholder="Size" style="width:100px; float:left; display: inline-block; margin-right:20px;">
                              <?php
                              generateSelectOptions();
                              ?>
                            </select>
                            <input type="text" name="401" id="401" class="form-control" placeholder="MRP" style="width:100px;  float:left; margin-right:20px;">
                            <input type="text" name="201" id="201" class="form-control" placeholder="Price" style="width:100px; float:left; display: inline-block; margin-right:20px;">
                            <input type="text" name="301" id="301" class="form-control" placeholder="stock" style="width:100px; float:left; display: inline; margin-right:20px;">
                            <input type="text" name="601" id="601" class="form-control" placeholder="SKU" style="width:100px; float:left; display: inline-block; margin-right:20px;">
                            <button type="button" onclick="saveInfoCheck('101'); return false;" class="btn btn-success" style="float:left; display: inline-block; margin-right:20px;">Save</button>
                            <button type="button" onclick="removeInfo('101'); return false;" class="btn btn-danger" style="float:left; display: inline-block; margin-right:20px;">Remove</button>
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
                        <a class="btn btn-primary text-light" aria-hidden="true" id="moreImg"><i class="fa fa-plus"></i> Add More Image</a>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="exampleInputFile" class="col-sm-2 control-label">Images</label>
                      <div class="col-sm-9">
                        <div class="input-files">
                          <!-- <input type="file" name="1" id="1" required>
                                                             <button type="button" class="btn btn-default" onclick="uploadImage('1'); return false;">Upload</button></br> -->
                          <div style="vertical-align: middle; margin-top:5px;">
                            <input type="file" name="1" id="1" style="float:left; display: inline-block; margin-right:20px;" required>
                            <button type="button" class="btn btn-success" onclick="uploadImage('1'); return false;" style="float:left; display: inline-block; margin-right:20px;">Upload</button>
                            <button type="button" class="btn btn-danger" onclick="removeImage('1'); return false;" style="float:left; display: inline-block; margin-right:20px;">Remove</button>
                          </div>
                          </br>
                        </div>
                      </div>
                    </div>

                    </br></br>
                    <div class="col-sm-offset-2">
                      <button type="submit" class="btn btn-dark">Add Product</button>
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
<script src="<?= BASEURL . 'admin/js/admin/add-product.js' ?>"></script>

<script>
  function moreMultiPriceImage(element) {
    multipriceimagecount = ++multipriceimagecount;
    var showId = Number(element) + 400;

    // alert(element+ "--showid--"+showId +"--"+multipriceimagecount) ;
    //	$(".input-files").append('<br><input type="file" id="'+showId+'"> </input>  <button name="btn_upload-'+showId+'" type="button" class="btn btn-default" onclick="uploadImage('+showId+'); return false;">Upload</button></br>  ');
    $(".input-files" + element).append('<br><input type="file" id="' + multipriceimagecount + '" style="float:left; display: inline-block; margin-right:20px;"> </input> ' +
      '<button name="btn_upload-' + showId + '" type="button" class="btn btn-success" onclick="uploadMultiPriceImage(' + showId + ', ' + multipriceimagecount + '); return false;" style="float:left; display: inline-block; margin-right:20px;">Upload</button> ' +
      '<button name="btn_remove-' + showId + '" type="button" class="btn btn-danger" onclick="removeMultiPriceImage(' + showId + '); return false;" style="float:left; display: inline-block; margin-right:20px;">Remove</button> <br>');


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