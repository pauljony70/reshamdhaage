<!DOCTYPE html>
<html lang="en">

<head>
    <?php $title = "User Dashboard";
    include("includes/head.php") ?>
    <!-- <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/index.css') ?>"> -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/js/index.js') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style1.css') ?>">
</head>

<body>
    <!-- Preloader -->
    <?php include("includes/preloader.php");
    ?>
    <?php
    include("includes/topbar.php")
    ?>
    <?php
    include("includes/navbar.php")
    ?>

    <main>
        <?php
        // echo"<pre>";
        // print_r($user_data);
        // echo"</pre>";
        ?>
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

            <div class="col-12 col-md-8">
                <h4 class="heading_dashboard mb-5">
                    Access to Account and explore various features
                </h4>
                <div class="row">
                    <div class="col-6 col-sm-4 mb-5">
                        <a href="<?= base_url ?>order">
                            <div class="dashboard_box">
                                <i class="fa-solid fa-clipboard-list dashboard_icons"></i>
                                <h5>Orders</h5>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-sm-4 mb-5">
                        <a href="<?= base_url ?>wishlist">
                            <div class="dashboard_box">
                                <i class="fa-solid fa-heart dashboard_icons"></i>
                                <h5>Wishlist</h5>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-sm-4 mb-5">
                        <a href="<?= base_url ?>account-details">
                            <div class="dashboard_box">
                                <i class="fa-solid fa-circle-user dashboard_icons"></i>
                                <h5>Account Details</h5>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-sm-4 mb-5">
                        <a href="<?= base_url ?>address_list">
                            <div class="dashboard_box">
                                <i class="fa-solid fa-location-dot dashboard_icons"></i>
                                <h5>Address</h5>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-sm-4 mb-5">
                        <a href="<?= base_url ?>logout">
                            <div class="dashboard_box">
                                <i class="fa-solid fa-right-to-bracket dashboard_icons"></i>
                                <h5>Logout</h5>
                            </div>
                        </a>
                    </div>
                </div>
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

</body>

</html>