<!DOCTYPE html>
<html lang="en">

<head>
    <?php $title = "Account Details";
    include("includes/head.php") ?>
    <!-- <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/index.css') ?>"> -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/js/index.js') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style1.css') ?>">
</head>

<body>
    <?php
    include("includes/topbar.php")
    ?>
    <?php
    include("includes/navbar.php")
    ?>

    <main class="container">
        <div class="pd_top_banner breadcrumb">
            <div class="pd_dress_name_bread_div">
                <h4 class="pd_dress_name_bread">My Account</h4>
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
            <input type="hidden" name="user_id" id="user_id" value="<?= $this->session->userdata('user_id') ?>">
            <div class="col-12 col-md-8">
                <!-- <?php echo"<pre>"; print_r($profile_info); echo"</pre>"; ?> -->
                <form action="" class="user_account_details">
                    <div class="form-group mb-2">
                        <label class="form-label" for="form12">Full Name</label>
                        <input type="text" id="fullname" class="form-control" value="<?= $profile_info[0]->full_name ?>" />
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label" for="form12">Display Name</label>
                        <input type="text" id="displayname" class="form-control" value="<?= $profile_info[0]->full_name ?>" />
                        <i class="text-muted"style="font-size:12px;">This will be how your name will be displayed in the account section and in reviews</i>
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label" for="form12">Email</label>
                        <input type="email" id="email" class="form-control" value="<?= $profile_info[0]->email ?>" />
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label" for="form12">Phone Number</label>
                        <input type="tel" id="phone_num" class="form-control" value="<?= $profile_info[0]->phone_no ?>" />
                    </div>
                    <!-- Password Block -->
                    <div class="password_change border mt-4 p-4 position-relative">
                        <span class="change_password">Change Password</span>
                        <div class="form-group mb-2">
                            <label class="form-label" for="form12">Current Password</label>
                            <input type="password" id="curr_password" class="form-control" />
                        </div>
                        <div class="form-group mb-2">
                            <label class="form-label" for="form12">New Password</label>
                            <input type="passowrd" id="new_password" class="form-control" />
                        </div>
                        <div class="form-group mb-2">
                            <label class="form-label" for="form12">Confirm Password</label>
                            <input type="passowrd" id="conf_password" class="form-control" />
                        </div>
                    </div>
                    <div class="submit_btn">
                        <button type="button" onclick="updateUserDetail('<?= $this->session->userdata('user_id') ?>')" class="btn pro_checkout_btn">save changes</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Footer -->
        <section class="footer">
            <div>
                <?php include("includes/footer.php") ?>
            </div>
        </section>

    </main>
    <?php include("includes/script.php") ?>

    <script>
        var site_url = $('.site_url').val(); // CSRF hash
        var csrf = $('.txt_csrfname').val(); // CSRF hash
        var user_id = $('#user_id').val(); // CSRF hash

        function updateUserDetail(user_id) {
            let fullname = document.getElementById("fullname").value
            let displayname = document.getElementById("displayname").value
            let user_ids = user_id;
            let email = document.getElementById("email").value
            let phone_num = document.getElementById("phone_num").value

            if (fullname != "" && email != "" && phone_num != "") {
                $.ajax({
                    type: "post",
                    url: site_url + "update_user_detail",
                    data: {
                        'language': 1,
                        'user_id': user_ids,
                        'fullname': fullname,
                        'displayname': displayname,
                        'email': email,
                        'phone_num': phone_num,
                        ['_token']: csrf,
                    },
                    success: function(res) {
                        // console.log(response);
                        let response = JSON.parse(res)
                        toastr.success(response.msg);
                        toastr.options = { "progressBar": true };
                    }
                });
            } else {
                toastr.error("Fill all the fields");
            }

        }
    </script>

</body>

</html>