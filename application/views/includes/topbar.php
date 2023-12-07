<?php
$default_language = $this->session->userdata('default_language');
if (empty($this->session->userdata('default_language'))) {
    $newdata = array(
        'default_language'  => '2',
        'logged_in' => TRUE
    );
    $set_data = $this->session->set_userdata($newdata);
}
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">


<header class="topbar">
    <div class="container">
        <div class="row">
            <div class="col-8 pt-2">
                <span>
                    Free Shipping on All Orders | Get Extra ₹100 OFF on Spent of ₹1499 Use Code: BLUEAPP19985
                    <?php echo $this->session->userdata('default_language') ?>
                </span>
            </div>
            <div class="col-4 d-flex justify-content-end">
                <span>
                    <?php if (empty($this->session->userdata('user_id'))) { ?>
                        <i class="fa-regular fa-user" style="color: #9ba1ab"></i>
                        <button type="button" class="btn px-0 text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Login/Signup
                        </button>
                    <?php } else { ?>
                        <a href="<?= base_url ?>index.php/dashboard" class="btn user_name border text-white">
                            <i class="fa-regular fa-user user_name_icon"></i>
                            <span class="">
                                <?php $name = $this->session->userdata('fullname'); ?>
                                Hello <?php if (strlen($name) > 15) {
                                            echo substr($name, 0, 10) . "...";
                                        } else echo $name; ?>
                            </span>
                        </a>
                        <span>&nbsp;|&nbsp;</span>
                        <a href="<?= base_url('logout') ?>">Logout</a>
                    <?php } ?>
                </span>
            </div>
        </div>
    </div>
</header>

<!-- Login Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h5 class="modal-title" id="exampleModalLongTitle">BlueApp Software</h5> -->
                <img src="<?= base_url ?>images/logo-blueappsoftware.png" alt="" style="width: 30%; margin:auto;">
                <button type="button" class="btn border close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Login Content -->
            <div class="modal-body login_modal" id="login_content">
                <h5 class="login_welcome">Welcome Back User!</h5>
                <form action="" class="login_form">
                    <div>
                        <label for="username">Phone Number <span class="required_field">*</span></label>
                        <input type="text" name="phone" id="user_mobile" onkeypress="return AllowOnlyNumbers(event);" maxlength="10" class="form-control">
                    </div>
                    <div>
                        <label for="username">Password <span class="required_field">*</span></label>
                        <input type="password" id="l_password" name="password" class="form-control" maxlength="16">
                    </div>
                    <div>
                        <button class="btn w-100 login_form_siggnin_btn" id="signin_button">
                            Sign In to Your Account
                        </button>
                    </div>
                </form>
            </div>

            <!-- Signup Content -->
            <div class="modal-body login_modal" id="signup_content" style="display: none; padding-bottom:0px;">
                <h5 class="login_welcome">Welcome User!</h5>
                <form action="" method="POST" class="login_form" id="signup_form">
                    <div>
                        <label for="username">Name <span class="required_field">*</span></label>
                        <input type="text" name="name" id="user_name" class="form-control">
                    </div>
                    <div>
                        <label for="username">Phone Number <span class="required_field">*</span></label>
                        <input onkeypress="return AllowOnlyNumbers(event);" maxlength="10" type="text" id="user_mobile_signup" class="form-control">
                    </div>
                    <div>
                        <label for="username">Password <span class="required_field">*</span></label>
                        <input type="password" class="form-control" id="user_password" maxlength="16">
                    </div>
                    <div>
                        <label for="username">Confirm Password <span class="required_field">*</span></label>
                        <input type="password" class="form-control" id="user_passwordre" maxlength="16">
                    </div>
                    <div>
                        <button id="signup_btn" class="btn w-100 login_form_siggnin_btn">
                            Set Up Your Account
                        </button>
                    </div>
                </form>
            </div>

            <div class="modal-footer text-center d-block">
                <h6 id="login_back_link" style="display: none;">Already Have an Account? <a href="javascript:void(0)" class="auth_login_signup" onclick="getAuthenticated(1)">Login Now</a></h6>
                <h6 id="signup_now">Don't have an Account? <a href="javascript:void(0)" class="auth_login_signup" onclick="getAuthenticated(0)">Sign Up Now</a></h6>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- <script src="<?php echo base_url . 'assets/js/register.js'; ?>"></script> -->

<script>
    function getAuthenticated(key) {
        if (key == 0) {
            document.getElementById('signup_content').style.display = "block";
            document.getElementById('login_content').style.display = "none";

            document.getElementById('login_back_link').style.display = "block";
            document.getElementById('signup_now').style.display = "none";
        } else {
            document.getElementById('signup_content').style.display = "none";
            document.getElementById('login_content').style.display = "block";

            document.getElementById('login_back_link').style.display = "none";
            document.getElementById('signup_now').style.display = "block";
        }
    }

    var csrfName = $(".txt_csrfname").attr("name"); //
    var csrfHash = $(".txt_csrfname").val(); // CSRF hash
    var site_url = $(".site_url").val(); // CSRF has
    var securecode = $(".securecode").val();

    $(document).ready(function() {
        // Registration Process
        $("#signup_btn").click(function() {
            event.preventDefault();
            // alert("called")
            var valid_user_phone = false;
            var valid_user_name = false;
            var valid_password = false;
            var valid_passwordre = false;

            var user_phone = $("#user_mobile_signup").val();
            var password = $("#user_password").val();
            var user_passwordre = $("#user_passwordre").val();
            var user_name = $("#user_name").val();

            if (user_name == "") {
                toastr.error("Please enter your full name");
                $("input#user_name").addClass("input_error");
                // $("#user_name").after(
                //     "<div class='error'>Please enter your full name</div>"
                // );
            } else {
                $("input#user_name + .error").remove();
                valid_user_name = true;
            }

            var phone_length = user_phone.length;
            if (user_phone == "") {
                toastr.error("Please enter your phone number")
                $("input#user_mobile").addClass("input_error");
                // $("#user_mobile").after(
                //     "<div class='error'>Please enter your phone number</div>"
                // );
            } else if (phone_length != 10) {
                toastr.error("Please enter a valid phone number")
                $("input#user_mobile").addClass("input_error");
                // $("#user_mobile").after(
                //     "<div class='error'>Please enter a valid phone number</div>"
                // );
            } else {
                $("input#user_mobile + .error").remove();
                valid_user_phone = true;
            }

            var password_len = password.length;
            if (password == "") {
                toastr.error("Please enter your password")
                $("input#user_password").addClass("input_error");
                // $("#user_password").after(
                //     "<div class='error'>Please enter your password</div>"
                // );
            } else if (password_len < 8) {
                toastr.error("Password must be at least 8 characters")
                $("input#user_password").addClass("input_error");
                // $("#user_password").after(
                //     "<div class='error'>Password must be at least 6 characters</div>"
                // );
            } else {
                $("input#user_password + .error").remove();
                valid_password = true;
            }

            var repass_len = user_passwordre.length;
            if (user_passwordre == "") {
                toastr.error("Please enter your password")
                $("input#user_passwordre").addClass("input_error");
                // $("#user_passwordre").after(
                //     "<div class='error'>Please enter your password</div>"
                // );
            } else if (repass_len < 8) {
                toastr.error("Password must be at least 8 characters")
                $("input#user_passwordre").addClass("input_error");
                // $("#user_passwordre").after(
                //     "<div class='error'>Password must be at least 6 characters</div>"
                // );
            } else if (user_passwordre != password) {
                toastr.error("The confirm password does not match")
                $("input#user_passwordre").addClass("input_error");
                // $("#user_passwordre").after(
                //     "<div class='error'>The confirm password does not match</div>"
                // );
            } else {
                $("input#user_passwordre + .error").remove();
                valid_passwordre = true;
            }

            if (
                valid_user_name &&
                valid_user_phone &&
                valid_password &&
                valid_passwordre
            ) {
                $.ajax({
                    url: site_url + "register_data",
                    data: {
                        language: 1,
                        securecode: securecode,
                        phone: user_phone,
                        fullname: user_name,
                        password: password,
                        [csrfName]: csrfHash,
                    },
                    type: "POST",

                    success: function(html) {
                        var catHtml_header = "";
                        var catObj = JSON.parse(html);
                        var loginArray = catObj.Information;
                        var login_status = catObj.status;
                        //alert(login_status);
                        if (login_status == 1) {
                            var user_id = loginArray.user_id;
                            var fullname = loginArray.fullname;
                            var phone = loginArray.phone;

                            location.reload();
                        } else {
                            $("#signup_otp_btn").html("Submit");
                            $("#signup_otp_btn + .error").remove();
                            $("#form-message").removeClass("d-none");
                            $("#form-message").addClass("d-flex");

                            $("#form-message").html(
                                "<p class='error text-center fs-6 fw-500 mb-0 d-flex align-items-center text-capitalize'>" +
                                catObj.msg +
                                " !!" +
                                "</p>"
                            );
                            // $("#signup_otp_btn").after(
                            //   "<div class='error'>" + catObj.msg + "</div>"
                            // );
                        }
                    },
                });
            }
        });

        // Login Process
        $("#signin_button").click(function() {
            event.preventDefault();
            var valid_user_phone = false;
            var valid_l_password = false;
            var user_phone = $("#user_mobile").val();
            var l_password = $("#l_password").val();
            if (user_phone == "") {
                toatr.alert("Please enter your phone number");
                $("input#user_mobile").addClass("input_error");
            } else {
                $("input#user_mobile").removeClass("input_error");
                valid_user_phone = true;
            }

            if (l_password == "") {
                toatr.alert("Please enter your Password");
                $("input#l_password").addClass("input_error");
            } else {
                $("input#l_password").removeClass("input_error");
                valid_l_password = true;
            }

            if (valid_user_phone && valid_l_password) {
                $("#signin_button").html('<i class="fas fa-spinner fa-spin"></i>');
                $.ajax({
                    type: "POST",
                    url: site_url + "login_data",
                    data: {
                        language: 1,
                        securecode: securecode,
                        phone: user_phone,
                        password: l_password,
                        [csrfName]: csrfHash,
                    },
                    success: function(html) {
                        $("#signin_button").html('Submit');
                        var catHtml_header = "";
                        var catObj = JSON.parse(html);
                        var loginArray = catObj.Information;
                        var login_status = catObj.status;
                        if (login_status == 1) {
                            location.reload();
                        } else {
                            toastr.error(catObj.msg);
                            $("#signin_button + .error").remove();
                            $("#form-message").removeClass("d-none");
                            $("#form-message").addClass("d-flex");

                            $("#form-message").html(
                                "<p class='error fs-6 fw-500 text-center mb-0 d-flex align-items-center text-capitalize'>" +
                                catObj.msg +
                                " !!" +
                                "</p>"
                            );
                        }
                    },
                });
            }
        });
    });
</script>