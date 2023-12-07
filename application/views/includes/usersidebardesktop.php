<link rel="stylesheet" type="text/css" href="<?= base_url('assets/js/index.js') ?>">

<div class="desktop_dashboard_sidebar col-12 col-md-4">
    <div style="position:sticky; top:114px; padding-bottom:2rem">
        <div class="row top_userdetail border p-4 mx-0">
            <div class="col-3 p-0">
                <img src="<?= base_url ?>images/icons/user.png" alt="" class="dashboard_user_img">
            </div>
            <div class="col-9">
                <h6 class="dashboard_welcome">Welcome</h6>
                <h6 class="dashboard_username"><?= $this->session->userdata['fullname'] ?></h6>
            </div>
        </div>
        <div class="user_pages mt-6 border">
            <ul class="p-0">
                <?php $link = $_SERVER['REQUEST_URI']; ?>
                <li>
                    <a href="<?= base_url ?>dashboard" class="<?php echo strpos($link, "dashboard") ? "active" : "" ?>">
                        <i class="fa-regular fa-id-card"></i>&nbsp; Dashboard
                    </a>
                </li>
                <hr class="lineruler">
                <li>
                    <a href="<?= base_url ?>order" class="<?php echo strpos($link, "order") ? "active" : "" ?>">
                        <i class="fa-solid fa-clipboard-list"></i> &nbsp; orders
                    </a>
                </li>
                <hr class="lineruler">
                <li>
                    <a href="<?= base_url ?>wishlist" class="<?php echo strpos($link, "wishlist") ? "active" : "" ?>">
                        <i class="fa-solid fa-download"></i>&nbsp; Wishlist
                    </a>
                </li>
                <hr class="lineruler">
                <li>
                    <a href="<?= base_url ?>account-details" class="<?php echo strpos($link, "account-details") ? "active" : "" ?>">
                        <i class="fa-solid fa-circle-user"></i>&nbsp; Account Details
                    </a>
                </li>
                <hr class="lineruler">
                <li>
                    <a href="<?= base_url ?>user-address" class="<?php echo strpos($link, "user-address") ? "active" : "" ?>">
                        <i class="fa-solid fa-location-dot"></i>&nbsp; Address
                    </a>
                </li>
                <hr class="lineruler">
                <li>
                    <a href="<?= base_url ?>logout">
                        <i class="fa-solid fa-right-to-bracket"></i>&nbsp; Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- Mobile Sidebar -->
<div class="mobile_dashboard_sidebar row col-12 mb-3">
    <div class="col-6 p-0">
        <div class="row top_userdetail border p-2 px-sm-4 mobile_order_margin">
            <div class="col-3 p-0">
                <img src="<?= base_url ?>images/icons/user.png" alt="" class="dashboard_user_img">
            </div>
            <div class="col-9">
                <h6 class="dashboard_welcome">Welcome</h6>
                <h6 class="dashboard_username"><?= $this->session->userdata['fullname'] ?></h6>
            </div>
        </div>
    </div>
    <div class="col-6 p-0 d-flex  justify-content-end h-50">
        <button class="btn dashboard_offcanvas" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">My Profile</button>
        <div class="offcanvas offcanvas-end user_dashboard_mobile_offcanvas" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <button type="button" class="btn-close text-reset border rounded-circle close_btn_offcanvas_profile" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                <h4 id="offcanvasRightLabel">My Profile</h4>
            </div>
            <div class="offcanvas-body">
                <ul class="p-0">
                    <li>
                        <a href="<?= base_url ?>dashboard" class="sidebar_links_profile">
                            <i class="fa-regular fa-id-card"></i>&nbsp; Dashboard
                        </a>
                    </li>
                    <hr class="lineruler">
                    <li>
                        <a href="<?= base_url ?>order" class="sidebar_links_profile">
                            <i class="fa-solid fa-clipboard-list"></i> &nbsp; orders
                        </a>
                    </li>
                    <hr class="lineruler">
                    <li>
                        <a href="<?= base_url ?>wishlist" class="sidebar_links_profile">
                            <i class="fa-solid fa-download"></i>&nbsp; Wishlist
                        </a>
                    </li>
                    <hr class="lineruler">
                    <li>
                        <a href="<?= base_url ?>account-details" class="sidebar_links_profile">
                            <i class="fa-solid fa-circle-user"></i>&nbsp; Account Details
                        </a>
                    </li>
                    <hr class="lineruler">
                    <li>
                        <a href="<?= base_url ?>address_list" class="sidebar_links_profile">
                            <i class="fa-solid fa-location-dot"></i>&nbsp; Address
                        </a>
                    </li>
                    <hr class="lineruler">
                    <li>
                        <a href="<?= base_url ?>logout" class="sidebar_links_profile">
                            <i class="fa-solid fa-right-to-bracket"></i>&nbsp; Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>