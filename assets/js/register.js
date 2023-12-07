// var csrfName = $(".txt_csrfname").attr("name"); //
// var csrfHash = $(".txt_csrfname").val(); // CSRF hash
// var site_url = $(".site_url").val(); // CSRF has
// var securecode = $(".securecode").val();

// $(document).ready(function () {
//   $("#signup_btn,#resend_otp_btn").click(function () {
//     event.preventDefault();
//     alert("called")
//     var valid_user_phone = false;
//     var valid_user_name = false;
//     var valid_password = false;
//     var valid_passwordre = false;

//     var user_phone = $("#user_mobile").val();
//     var password = $("#user_password").val();
//     var user_passwordre = $("#user_passwordre").val();
//     var user_name = $("#user_name").val();

//     if (user_name == "") {
//       $("input#user_name + .error").remove();
//       $("#user_name").after(
//         "<div class='error'>Please enter your full name</div>"
//       );
//     } else {
//       $("input#user_name + .error").remove();
//       valid_user_name = true;
//     }

//     var phone_length = user_phone.length;
//     if (user_phone == "") {
//       $("input#user_mobile + .error").remove();
//       $("#user_mobile").after(
//         "<div class='error'>Please enter your phone number</div>"
//       );
//     } else if (phone_length != 10) {
//       $("input#user_mobile + .error").remove();
//       $("#user_mobile").after(
//         "<div class='error'>Please enter a valid phone number</div>"
//       );
//     } else {
//       $("input#user_mobile + .error").remove();
//       valid_user_phone = true;
//     }

//     var password_len = password.length;
//     if (password == "") {
//       $("input#user_password + .error").remove();
//       $("#user_password").after(
//         "<div class='error'>Please enter your password</div>"
//       );
//     } else if (password_len < 6) {
//       $("input#user_password + .error").remove();
//       $("#user_password").after(
//         "<div class='error'>Password must be at least 6 characters</div>"
//       );
//     } else {
//       $("input#user_password + .error").remove();
//       valid_password = true;
//     }

//     var repass_len = user_passwordre.length;
//     if (user_passwordre == "") {
//       $("input#user_passwordre + .error").remove();
//       $("#user_passwordre").after(
//         "<div class='error'>Please enter your password</div>"
//       );
//     } else if (repass_len < 6) {
//       $("input#user_passwordre + .error").remove();
//       $("#user_passwordre").after(
//         "<div class='error'>Password must be at least 6 characters</div>"
//       );
//     } else if (user_passwordre != password) {
//       $("input#user_passwordre + .error").remove();
//       $("#user_passwordre").after(
//         "<div class='error'>The confirm password does not match</div>"
//       );
//     } else {
//       $("input#user_passwordre + .error").remove();
//       valid_passwordre = true;
//     }

//     if (
//       valid_user_name &&
//       valid_user_phone &&
//       valid_password &&
//       valid_passwordre
//     ) {
//       /*$("#signup_heading").text('OTP has sent to your phone number');
//       $("#signup_details").hide();
//       $("#signup_otp_details").show();
//       $.ajax({
//         url: "<?php echo $API_URL; ?>send_otp.php",
//         type: "POST",
//         data: {language:'<?php echo $language; ?>',securecode:'<?php echo $securecode; ?>',phone:user_phone},
//         success: function(html){
//           var catObj = JSON.parse(html);
          	
//           var opt_status = catObj.status;
//           if(opt_status ==1){
//             var optArray = catObj.Information;
//             $("#valid_otp").val(optArray.otp);
//           }
        	
//         }
//       });
//       */
//       $.ajax({
//         url: site_url + "register_data",
//         data: {
//           language: 1,
//           securecode: securecode,
//           phone: user_phone,
//           fullname: user_name,
//           password: password,
//           [csrfName]: csrfHash,
//         },
//         //url: "<?php echo $API_URL; ?>new_user_registration.php",
//         type: "POST",

//         //data: {language:'1',securecode:'<?php echo $securecode; ?>',phone:user_phone,fullname:user_name,password:password},
//         success: function (html) {
//           var catHtml_header = "";
//           var catObj = JSON.parse(html);
//           var loginArray = catObj.Information;
//           var login_status = catObj.status;
//           //alert(login_status);
//           if (login_status == 1) {
//             var user_id = loginArray.user_id;
//             var fullname = loginArray.fullname;
//             var phone = loginArray.phone;

//             location.href = site_url;
//           } else {
//             $("#signup_otp_btn").html("Submit");
//             $("#signup_otp_btn + .error").remove();
//             $("#form-message").removeClass("d-none");
//             $("#form-message").addClass("d-flex");

//             $("#form-message").html(
//               "<p class='error text-center fs-6 fw-500 mb-0 d-flex align-items-center text-capitalize'>" +
//               catObj.msg +
//               " !!" +
//               "</p>"
//             );
//             // $("#signup_otp_btn").after(
//             //   "<div class='error'>" + catObj.msg + "</div>"
//             // );
//           }
//         },
//       });
//     }
//   });

//   $("#signup_otp_btn").click(function () {
//     event.preventDefault();

//     var valid_user_otp = false;
//     var validate_otp = false;

//     var user_phone = $("#user_mobile").val();
//     var password = $("#user_password").val();
//     var user_passwordre = $("#user_passwordre").val();
//     var user_name = $("#user_name").val();

//     var valid_otp = $("#valid_otp").val();
//     var user_otp = $("#user_otp").val();

//     if (user_otp == "") {
//       $("input#user_otp + .error").remove();
//       $("#user_otp").after("<div class='error'>Please enter OTP.</div>");
//     } else {
//       $("input#user_otp + .error").remove();
//       valid_user_otp = true;
//     }

//     if (user_otp != valid_otp) {
//       $("input#user_otp + .error").remove();
//       $("#user_otp").after("<div class='error'>Please enter valid OTP.</div>");
//     } else {
//       $("input#user_otp + .error").remove();
//       validate_otp = true;
//     }

//     if (valid_user_otp && validate_otp) {
//       $("#signup_otp_btn").html('<i class="fas fa-spinner"></i>');
//       $.ajax({
//         url: "<?php echo $API_URL; ?>new_user_registration.php",
//         type: "POST",

//         data: {
//           language: "<?php echo $language; ?>",
//           securecode: "<?php echo $securecode; ?>",
//           phone: user_phone,
//           fullname: user_name,
//           password: password,
//         },
//         success: function (html) {
//           var catHtml_header = "";
//           var catObj = JSON.parse(html);
//           var loginArray = catObj.Information;
//           var login_status = catObj.status;
//           if (login_status == 1) {
//             var user_id = loginArray.user_id;
//             var fullname = loginArray.fullname;
//             var phone = loginArray.phone;

//             setCookie("set_user_cookies", 1, 30);
//             setCookie("user_id", user_id, 30);
//             setCookie("fullname", fullname, 30);
//             setCookie("phone", phone, 30);
//             location.href = "<?php echo $SITE_URL; ?>";
//           } else {
//             $("#signup_otp_btn").html("Submit");
//             $("#signup_otp_btn + .error").remove();
//             $("#signup_otp_btn").after(
//               "<div class='error'>" + catObj.msg + "</div>"
//             );
//           }
//         },
//       });
//     }
//   });

//   $("#signin_button").click(function () {
//     //event.preventDefault();
//     //var valid_user_phone = false;
//     //var user_phone = $("#user_mobile").val();
//     alert("hhhh");
//     /*  if (user_phone == "") {
//         $("input#user_mobile + .error").remove();
//         $("#user_mobile").after(
//           "<div class='error'>Please enter your phone number</div>"
//         );
//       } else {
//         $("input#user_mobile + .error").remove();
//         valid_user_phone = true;
//       }
  
//       if (valid_user_phone) {
//         $("#signin_button").html('<i class="fas fa-spinner fa-spin"></i>');
//         $.ajax({
//           type: "POST",
  
//           url: site_url + "login_data",
//           data: {
//             language: 1,
//             securecode: securecode,
//             phone: user_phone,
//             [csrfName]: csrfHash,
//           },
//           success: function (html) {
//             $("#signin_button").html('Submit');
//             var catHtml_header = "";
//             var catObj = JSON.parse(html);
//             var loginArray = catObj.Information;
  
//             var login_status = catObj.status;
//             if (login_status == 1) {
//               location.href = site_url;
//             } else {
//               $("#signin_button + .error").remove();
//               $("#form-message").removeClass("d-none");
//               $("#form-message").addClass("d-flex");
  
//               $("#form-message").html(
//                 "<p class='error fs-6 fw-500 text-center mb-0 d-flex align-items-center text-capitalize'>" +
//                   catObj.msg +
//                   " !!" +
//                   "</p>"
//               );
//             }
//           },
//         });
//       }
      
//       */
//   });
// });
