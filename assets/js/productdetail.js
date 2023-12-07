// var csrfName = $(".txt_csrfname").attr("name");
var csrfHash = $(".txt_csrfname").val(); // CSRF hash
var site_url = $(".site_url").val(); // CSRF hash
var securecode = $(".securecode").val();
var prod_id = $("#prod_id").val();
var user_id = $("#user_id").val();

//alert('ddddd');

$(function () {
  window.onload = product_details(prod_id);
  window.onload = attr_data_change(event);
  //window.onload = related_product();
});

function product_details(prod_id) {
  event.preventDefault();

  //alert(prod_id);

  $.ajax({
    method: "post",
    url: site_url + "index.php/" + "productdetaildata",

    data: {
      language: 1,
      securecode: securecode,
      prod_id: prod_id,
      [csrfName]: csrfHash,
    },

    success: function (response) {
      //alert(response);

      var parsedJSON = $.parseJSON(response);

      $(parsedJSON["Information"]).each(function () {
        $("#product_name_bc").html(this.name);
        $("#product_name").html(this.name);

        $("#mrp").html(this.price);
        $("#price").html(this.mrp);
        attr_data_change(event);
        //alert('dddd'+this.mrp+'--'+this.price);
        var mrp = this.mrp;
        var price = this.price;
        if (mrp == price) {
          //alert('dddddd');
          $("#price_div").hide();
        }
        else {
          $("#price_div").show();
        }



        $("#prod_rating_count").html(this.prod_rating_count);

        // $("#short_desc").html(this.short_desc);

        $("#brand").html(this.brand);

        $("#fulldetail").html(this.fulldetail);

        var myArray = JSON.parse(this.img_url);

        //alert(this.name);

        $(myArray).each(function () {
          var img = "http://mkkirana.com/media/" + this.url;


          $("#meta_img").html("<meta property='og:image' content=" + img + "/>");
          //alert(img);

          $("#prod_img").html("<img style='width:100%' src=" + img + ">");
        });

        var cart_btn_html = "";

        $("#cart_btn").empty();

        var qoute_id = "";

        cart_btn_html +=
          '<button class="btn-border" onclick="add_to_cart_products(event,' +
          "'" +
          prod_id +
          "','" +
          this.sku +
          "','" +
          this.vendor_id +
          "','','1','0','2'," +
          "'" +
          qoute_id +
          "'" +
          ')">Add to Cart</button>';

        $(".pBtns").html(cart_btn_html);
      });

      var product_html = "";

      $("#related_product").empty();

      $(parsedJSON["related"]).each(function () {
        var img_Array = JSON.parse(this.img_url);

        var img = "";

        var titles = this.name.slice(0, 30) + (this.name.length > 30 ? "..." : "");

        $(img_Array).each(function () {
          img = "http://mkkirana.com/media/" + this.url;

          //alert(img);
        });

        product_html +=
          '<div class="col-xl-2 col-lg-2 col-md-6 col-sm-12 col-6"><div class="home-one-product-box"><div class="home-one-product-img"><a href="' + site_url + 'productdetail/' + this.name + '/' + this.id + '"><img src="' +
          img +
          '" alt=""></a></div><div class="home-one-product-content text-center"><span><a href="' + site_url + 'productdetail/' + this.name + '/' + this.id + '">' +
          titles +
          '</a></span><div class="home-one-product-price-list"><ul><li>₹' +
          this.price +
          "</li><li><del>₹" +
          this.mrp +
          "</del></li></ul></div></div></div></div>";

        //alert(this.id);
      });

      $("#related_product").html(product_html);

      //alert(product_html);

      //    location.reload();
    },
  });
}

function attr_data_change(event) {
  //var selectElement = event.target;
  //var value = selectElement.value;
  value = $("#attr_data option:selected").val();
  // alert('llll');
  if (value != 'undefined') {
    $("#mrp").text(value);
  }
  //$("#price").html(this.price);
  //alert(value);
}

//alert('ddddd');
/*
$(function () {
  window.onload = product_details(prod_id);
  //window.onload = product_add_wishlist(prod_id,'');
  //window.onload = related_product();
});

function product_add_wishlist(product_id, product_price) {
  var quantity = 1;

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

      success: function (html) {
          get_wishlist_products(user_id); 
        $("#wishlist" + product_id).html(
          '<i class="fa fa-heart" aria-hidden="true"></i>'
        );

        var catObj = JSON.parse(html);
        var cartArray = catObj.Information;
      },
    });
  }
}

function product_details(prod_id) {
  event.preventDefault();

  //alert(prod_id);

  $.ajax({
    method: "post",
    url: site_url + "productdetaildata",

    data: {
      language: 1,
      securecode: securecode,
      prod_id: prod_id,
      [csrfName]: csrfHash,
    },

    success: function (response) {
      //alert(response);

      var parsedJSON = $.parseJSON(response);

      $(parsedJSON["Information"]).each(function () {
        $("#product_name_bc").html(this.name);
        $("#product_name").html(this.name);

        $("#mrp").html(this.mrp);
        $("#price").html(this.price);
        console.log('dddddddd');
        var mrp = this.mrp;
        var price = this.price;
        if(mrp == price)
        {
            //alert('dddddd');
            $("#price_div").hide();
        }
        else
        {
            $("#price_div").show();
        }

        

        $("#prod_rating_count").html(this.prod_rating_count);

        $("#short_desc").html(this.short_desc);

        $("#brand").html(this.brand);

        $("#fulldetail").html(this.fulldetail);

        var myArray = JSON.parse(this.img_url);

        //alert(this.name);

        $(myArray).each(function () {
          var img = "http://girgitt.com/media/" + this.url;
          
          
          $("#meta_img").html("<meta property='og:image' content="+ img + "/>");
          //alert(img);

          $("#prod_img").html("<img style='width:100%' src=" + img + ">");
        });

        var cart_btn_html = "";

        $("#cart_btn").empty();

        var qoute_id = "";

        cart_btn_html +=
          '<button class="btn-border" onclick="add_to_cart_products(event,' +
          "'" +
          prod_id +
          "','" +
          this.sku +
          "','" +
          this.vendor_id +
          "','','1','0','2'," +
          "'" +
          qoute_id +
          "'" +
          ')">Add to Cart</button>';

        $(".pBtns").html(cart_btn_html);
      });

      var product_html = "";

      $("#related_product").empty();

      $(parsedJSON["related"]).each(function () {
        var img_Array = JSON.parse(this.img_url);

        var img = "";

        $(img_Array).each(function () {
          img = "http://girgitt.com/media/" + this.url;

          //alert(img);
        });

    product_html +=
          '<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12"><div class="home-one-product-box"><div class="home-one-product-img"><a href="'+site_url+'productdetail/'+this.name+'/'+this.id+'"><img src="' +
          img +
          '" alt=""></a></div><div class="home-one-product-content"><h4><a href="'+site_url+'productdetail/'+this.name+'/'+this.id+'">' +
          this.name +
          '</a></h4><div class="home-one-product-price-list"><ul><li>₹' +
          this.price +
          "</li><li><del>₹" +
          this.mrp +
          "</del></li></ul></div></div></div></div>";

        //alert(this.id);
      });

      $("#related_product").html(product_html);

      //alert(product_html);

      //    location.reload();
    },
  });
}
*/

$(document).ready(function () {
  $("#review_save_btn").click(function () {
    event.preventDefault();

    var prod_id = $("#prod_id").val();
    var user_name = $("#user_name").val();
    var title = $("#title").val();
    var feedback = $("#feedback").val();
    var rating = $("input[name='rating1']:checked").val();
    //alert(rating); 

    $.ajax({
      //	url: "<?php echo $API_URL; ?>add_address.php",

      type: "POST",

      url: site_url + "add_review",

      data: {
        language: 'default',
        securecode: securecode,
        prod_id: prod_id,
        user_id: user_id,
        user_name: user_name,

        title: title,
        feedback: feedback,
        rating: rating,
        [csrfName]: csrfHash,
      },

      success: function (html) {
        var catObj = JSON.parse(html);
        //alert(catObj.msg); 
        $('#msg_data').text(catObj.msg);
        $("#title").val('');
        $("#feedback").val('');
        $('input[name="rating1"]').prop("checked", false);
        //jQuery(".succ-msg").remove();

        //$("#address_save_btn").html("Save");

        //location.href = site_url + "checkout";
      },
    });
  });
});

$(document).ready(function () {
  $('.relatedProductSlick').slick({
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    dots: false,
    prevArrow: false,
    nextArrow: false,
    arrow: false,
    autoplay: true,
    dotsClass: "slick-dots",
    autoplaySpeed: 5000,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 2,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });
});