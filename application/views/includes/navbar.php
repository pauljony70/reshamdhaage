<!-- <header>
    <nav>
        <div class="header-menu-area d-md-none d-none d-lg-block">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5">
                        <a href="javascript:void(0)" class="hidden-lg hamburger">
                            <span class="h-top"></span>
                            <span class="h-middle"></span>
                            <span class="h-bottom"></span>
                        </a>
                        <nav class="main-nav">
                            <div class="logo mobile-ham-logo d-lg-none d-block text-left">
                                <a href="<?php echo base_url; ?>"><img src="<?php echo base_url; ?>assets/images/website-logo.png" alt=""></a>
                            </div>
                            <div class="menu-category-icon">
                                <a href="/"><i class='bx bx-home-alt'></i></a>
                            </div>
                            <ul>
                                <li><a href="<?php echo base_url; ?>">Home</a></li>+
                                <li class="has-child-menu">
                                    <a href="javascript:void(0)">Category</a>
                                    <i class="fl flaticon-plus">+</i>
                                    <ul class="sub-menu" id="header_category_dropdown">
                                    </ul>
                                </li>
                                <li><a href="<?php echo base_url; ?>order">Orders</a></li>
                                <li><a href="<?php echo base_url; ?>contact">Contact Us</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-sm-6 col-6">
                        <div class="logo text-center">
                            <a href="<?php echo base_url; ?>"><img src="<?php echo base_url; ?>assets/images/website-logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5">
                        <div class="menu-right-item">
                            <a target="_blannk" href="https://play.google.com/store/apps/details?id=com.mkkirana">
                                <img style="width: 120px;" src="<?php echo base_url; ?>assets/images/app_full.png" alt="Download from play store">
                            </a>
                            <ul>
                                <?php if (empty($this->session->userdata("user_id"))) { ?>
                                    <li><a href="<?php echo base_url; ?>login">Login</a></li>
                                <?php } else { ?>
                                    <li><a href="<?php echo base_url; ?>logout">Logout</a></li>
                                <?php } ?>
                                <li><span></span></li>
                                <li><a href="#"><i class='bx bx-search menu-search-click'></i></a></li>
                                <li><a href="<?php echo base_url; ?>wishlist"><i class='bx bx-heart'><span id="wishlist_total_count">0</span></i></a></li>
                                <li><a href="<?php echo base_url; ?>cart"><i class='bx bx-shopping-bag'><span id="total_cart_count1">0</span></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-menu-area d-lg-none d-block d-md-block">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-2 col-lg-2 col-sm-3 col-3">
                        <div class="logo text-center">
                            <a href="<?php echo base_url; ?>"><img src="<?php echo base_url; ?>assets/images/website-logo.png" alt=""></a>
                        </div>
                    </div>
                    <div style="padding:0" class="col-xl-5 col-lg-5 col-md-7 col-sm-7 col-7">
                        <div class="menu-right-item">
                            <a target="_blannk" href="https://play.google.com/store/apps/details?id=com.mkkirana">
                                <img style="width: 30px;" src="<?php echo base_url; ?>assets/images/small.png" alt="Download from play store">
                            </a>
                            <ul>
                                <?php if (empty($this->session->userdata("user_id"))) { ?>
                                    <li><a href="<?php echo base_url; ?>login">Login</a></li>
                                <?php } else { ?>
                                    <li><a href="<?php echo base_url; ?>logout">Logout</a></li>
                                <?php } ?>
                                <li><span></span></li>
                                <li><a href="#"><i class='bx bx-search menu-search-click'></i></a></li>
                                <li><a href="<?php echo base_url; ?>wishlist"><i class='bx bx-heart'><span id="wishlist_mob_total_count">0</span></i></a></li>
                                <li><a href="<?php echo base_url; ?>cart"><i class='bx bx-shopping-bag'><span id="total_cart_mob_count1">0</span></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div style="padding:0" class="col-xl-5 col-lg-5 col-md-2 col-sm-2 col-2">
                        <a href="javascript:void(0)" class="hidden-lg hamburger">
                            <span class="h-top"></span>
                            <span class="h-middle"></span>
                            <span class="h-bottom"></span>
                        </a>
                        <nav class="main-nav">
                            <div class="logo mobile-ham-logo d-lg-none d-block text-left">
                                <a href="/"><img src="<?php echo base_url; ?>assets/images/website-logo.png" alt=""></a>
                            </div>
                            <div class="menu-category-icon d-xl-block d-lg-none d-md-none d-none">
                                <a href="#"><i class='bx bx-slider-alt'></i></a>
                            </div>
                            <ul>
                                <li><a href="<?php echo base_url; ?>">Home</a></li>
                                <li class="has-child-menu">
                                    <a href="javascript:void(0)">Category</a>
                                    <span class="d-md-none d-none d-lg-block">3</span>
                                    <i class="fl flaticon-plus">+</i>
                                    <ul class="sub-menu" id="header_category_dropdown_mobile">
                                    </ul>
                                </li>
                                <li><a href="<?php echo base_url; ?>order">Orders</a></li>
                                <li><a href="<?php echo base_url; ?>contact">Contact Us</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="search-bar-wrap ">
        <span class="search-close"><i class='bx bx-x'></i></span>
        <div class="search-bar-content text-center">
            <div class="search-bar-inner">
                <h2>Search</h2>
                <div class="error-search apply-copon subscribe-search search-wrap-search">
                    <form action="<?php echo base_url ?>search/s">
                        <input type="text" name="search" value="<?php if (isset($_REQUEST['search'])) {
                                                                    echo $_REQUEST['search'];
                                                                } ?>" placeholder="Search Text"><button type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header> -->

<input type="hidden" class="txt_csrfname" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
<input type="hidden" class="site_url" value="<?= base_url() ?>">
<input type="hidden" id="user_id" value="<?= $this->session->userdata('user_id') ?>">
<input type="hidden" name="website_name" value="<?php echo $website_name; ?>" id="website_name">
<input type="hidden" class="securecode" value="1234567890">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">


<!-- Navbar -->
<header class="header_navbar">
    <nav class="navbar main_navbar py-1">
        <div class="container">
            <a class="navbar-brand py-0" href="<?= base_url ?>">
                <img src="<?= base_url ?>images/logo-blueappsoftware.png" alt="Logo" class="logo_image">
            </a>
            <div class="d-flex">
                <!-- <div class="navbar-nav second_part_navbar">
                    <li class="nav-item dropdown">
                        <a href="<?= base_url() ?>" class="nav-link page_links">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link page_links">Categories</a>
                        <div class="dropdown-content">
                            <ul class="unordered_list" id="header_category_dropdown">

                            </ul>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <?php if (!empty($this->session->userdata('user_id'))) { ?>
                            <a href="<?= base_url() ?>order" class="nav-link page_links">Orders</a>
                        <?php } else { ?>
                            <a data-bs-toggle="modal" data-bs-target="#exampleModalCenter" title="Login/Signup" class="nav-link page_links">
                                Orders
                            </a>
                        <?php } ?>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="<?= base_url() ?>contact" class="nav-link page_links">Contact Us</a>
                    </li>
                </div> -->
            </div>
            <div class="d-flex">
                <div class="navbar-nav third_part_navbar">
                    <li class="nav-item">
                        <a href="<?= base_url ?>cart" class="nav-link position-relative" title="Cart">
                            <img src="<?= base_url ?>images/icons/shopping-bag.png" alt="" class="navbar_icons">
                            <span id="cart_count" class="badge rounded-circle bg-danger text-white cout_badge">0</span>
                        </a>
                    </li>
                    <li class="nav-item" title="Wishlist">
                        <a href="<?= base_url ?>wishlist" class="nav-link position-relative">
                            <img src="<?= base_url ?>images/icons/wishlist.png" alt="" class="navbar_icons">
                            <span id="wishlist_count" class="badge rounded-circle bg-danger text-white cout_badge"></span>
                        </a>
                    </li>
                    <li class="nav-item" title="Search">
                        <a href="javascript:void(0)" class="nav-link" id="search" onclick="openSearchbar()">
                            <img src="<?= base_url ?>images/icons/search.png" alt="" class="navbar_icons">
                        </a>
                    </li>
                </div>
            </div>
        </div>
        <!-- Mobile Offcanvas SEARCH -->
        <div class="custumsearchoffcanvas" data-bs-scroll="true" tabindex="-1" id="searchOffcanvas">
            <div class="offcanvas-header">
                <form action="<?php echo base_url ?>search/s" class="d-flex w-100">
                    <input autocomplete="off" id="search" type="search" name="search" class="form-control search_input_box" value="<?php if (isset($_REQUEST['search'])) {
                                                                                                                                        echo $_REQUEST['search'];
                                                                                                                                    } ?>" placeholder="I'm shopping for">
                    <button type="submit" class="btn border">Search</button>
                    <button type="button" class="btn-close text-reset rounded-pill offcanvas_close_search" onclick="closeSearchbar()"></button>
                </form>
            </div>
            <!-- Search Results -->
            <!-- <div class="offcanvas-body">
                <ul class="dropdown-menu0 w-100 box-shadow-4 my-5 px-2 bg-light">
                    <span id="search_div_mob"></span>
                </ul>
            </div> -->
        </div>
    </nav>


    <nav class="navbar-expand-lg navbar-light bg-light shadow-sm bg-white category-navbar">
        <div class="container position-relative">
            <div class="navbar-collapse w-100 collapse" id="navbarCollapse2">

                <ul class="menu-items mb-0 px-0 w-100 justify-content-around align-items-stretch" id="category-container">
                    <!-- <?php foreach ($header_cat as $maincat) : ?>
                        <li class="menu-li">
                            <a href="<?= base_url('shop/' . $maincat['cat_slug']) ?>" class="menu-item py-2"><?= $maincat['cat_name'] ?></a>
                            <?php if (count($maincat['subcat_1']) > 0) : ?>
                                <div class="mega-menu">
                                    <div class="content box-shadow-0">
                                        <?php for ($i = 0; $i < 4; $i++) : ?>
                                            <div class="col px-2 py-4">
                                                <section>
                                                    <?php if (!empty($maincat['subcat_1'][($i * 2)])) : ?>
                                                        <a href="<?= base_url($maincat['subcat_1'][($i * 2)]['cat_slug']) ?>" class="item-heading"><?= $maincat['subcat_1'][($i * 2)]['cat_name'] ?></a>
                                                        <?php if (count($maincat['subcat_1'][($i * 2)]['subsubcat_2']) > 0) : ?>
                                                            <ul class="mega-links px-0">
                                                                <?php foreach ($maincat['subcat_1'][($i * 2)]['subsubcat_2'] as $key => $subsubcat_2) : ?>
                                                                    <?php
                                                                    if ($key > 4) :
                                                                        break;
                                                                    endif;
                                                                    ?>
                                                                    <li><a href="<?= base_url($subsubcat_2['cat_slug']) ?>"><?= $subsubcat_2['cat_name'] ?></a></li>
                                                                <?php endforeach; ?>
                                                            </ul>
                                                            <a class="view-all" href="<?= base_url('shop/' . $maincat['subcat_1'][($i * 2)]['cat_slug']) ?>" href="">view all <i class="fa-solid fa-arrow-right"></i></a>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                    <?php if (!empty($maincat['subcat_1'][($i * 2) + 1])) : ?>
                                                        <div class="mb-3"></div>
                                                        <a href="<?= base_url($maincat['subcat_1'][($i * 2) + 1]['cat_slug']) ?>" class="item-heading"><?= $maincat['subcat_1'][($i * 2) + 1]['cat_name'] ?></a>
                                                        <?php if (count($maincat['subcat_1'][($i * 2) + 1]['subsubcat_2']) > 0) : ?>
                                                            <ul class="mega-links px-0">
                                                                <?php foreach ($maincat['subcat_1'][($i * 2) + 1]['subsubcat_2'] as $key => $subsubcat_2) : ?>
                                                                    <?php
                                                                    if ($key > 2) :
                                                                        break;
                                                                    endif;
                                                                    ?>
                                                                    <li><a href="<?= base_url($subsubcat_2['cat_slug']) ?>"><?= $subsubcat_2['cat_name'] ?></a></li>
                                                                <?php endforeach; ?>
                                                            </ul>
                                                            <a class="view-all" href="<?= base_url('shop/' . $maincat['subcat_1'][($i * 2) + 1]['cat_slug']) ?>" href="#">view all <i class="fa-solid fa-arrow-right"></i></a>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </section>
                                            </div>
                                        <?php endfor; ?>
                                        <div class="col col-image px-2 pb-5">
                                            <div class="row g-2 justify-content-center mt-3">
                                                <div class="col-12">
                                                    <a href="#">
                                                        <img class="nav-img" src="<?= base_url('media/' . $maincat['imgurl']) ?>" class="btn-transition" alt="google-store">
                                                    </a>
                                                </div>
                                                <br>
                                                <div class="col-12">
                                                    <a href="#">
                                                        <img class="nav-img" src="<?= base_url('media/' . $maincat['web_banner']) ?>" class="btn-transition" alt="app-store">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="mega-menu">
                                    <div class="content box-shadow-0">
                                        <?php for ($i = 0; $i < 4; $i++) : ?>
                                            <div class="col px-2 pb-4">
                                            </div>
                                        <?php endfor; ?>
                                        <div class="col col-image px-2 pb-5">
                                            <div class="row g-2 justify-content-center mt-3">
                                                <div class="col-12">
                                                    <a href="#">
                                                        <img class="nav-img" src="<?= base_url('media/' . $maincat['imgurl']) ?>" class="btn-transition" alt="google-store">
                                                    </a>
                                                </div>
                                                <br>
                                                <div class="col-12">
                                                    <a href="#">
                                                        <img class="nav-img" src="<?= base_url('media/' . $maincat['web_banner']) ?>" class="btn-transition" alt="app-store">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?> -->
                </ul>
            </div>
        </div>
    </nav>

</header>

<!-- Mobile Navbar -->
<header class="mobile_navbar">
    <nav class="navbar container-fluid">
        <div class="mobile_navbar_left d-flex justify-content-start">
            <a class="mobile_hamburger" data-bs-toggle="offcanvas" data-bs-target="#mobileCategoryOffcanvas" aria-controls="mobileCategoryOffcanvas">
                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>
            </a>

            <a href="javascript:void(0)" class="nav-link" id="search" onclick="openSearchbar()">
                <img src="<?= base_url ?>images/icons/search.png" alt="" class="mobile_navbar_icons">
            </a>
        </div>
        <div class="mobile_navbar_middle text-center">
            <a href="<?= base_url ?>">
                <img src="<?= base_url ?>images/logo-blueappsoftware.png" alt="" class="mobile_logo">
            </a>
        </div>
        <div class="mobile_navbar_right d-flex justify-content-end">
            <?php if (empty($this->session->userdata('user_id'))) { ?>
                <a data-bs-toggle="modal" data-bs-target="#exampleModalCenter" title="Login/Signup" class="mobile_user">
                    <i class="fa-regular fa-user fa-lg user_icon" style="color: #0000009e"></i>
                </a>
            <?php } else { ?>
                <a href="<?= base_url ?>dashboard" class="btn user_name border mt-1 px-2 py-1">
                    <i class="fa-regular fa-user user_name_icon"></i>
                    <span class="">
                        <?php $name = $this->session->userdata('displayname'); ?>
                        <?php if (strlen($name) > 15) {
                            echo substr($name, 0, 6) . "...";
                        } else {
                            echo $name;
                        } ?>
                    </span>
                </a>
            <?php } ?>
            <a href="<?= base_url ?>index.php/cart" class="nav-link" title="Cart">
                <img src="<?= base_url ?>images/icons/shopping-bag.png" alt="" class="mobile_navbar_icons">
                <span id="cart_count_mobile" class="badge rounded-circle text-white cout_badge">0</span>
            </a>
        </div>
    </nav>
</header>

<!-- Mobile Offcanvas Category -->
<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="mobileCategoryOffcanvas">
    <div class="offcanvas-header">
        <!-- <h5 class="offcanvas-title"></h5> -->
        <img src="<?= base_url ?>assets_web/logo-blueappsoftware.png" alt="" style="width: 20vw;">
        <button type="button" class="btn-close text-reset border rounded-circle close_btn_offcanvas" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="sidebar_accordian w-100">
            <!-- Accordian Start -->
            <div class="accordion accordion-icon accordion-bg-light" id="accordionExample2">
                <?php $i = 1;
                foreach ($header_cat as $header_cat_mobile_data) {
                ?>
                    <!-- Item -->
                    <div class="accordion-item">
                        <h6 class="accordion-header font-base" id="heading-">
                            <button class="<?= count($header_cat_mobile_data['subcat_1']) > 0 ? 'accordion-button' : 'custom-accordion-button' ?> btn fw-bold rounded collapsed mt-1 px-0 py-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?= $i ?>" aria-expanded="false" aria-controls="collapse-<?= $i ?>">
                                <span class="first_level_category"><?= $header_cat_mobile_data['cat_name'] ?></span>
                            </button>
                        </h6>
                        <!-- Body -->
                        <?php if (count($header_cat_mobile_data['subcat_1']) > 0) : ?>
                            <div id="collapse-<?= $i ?>" class="accordion-collapse collapse" aria-labelledby="heading-1" data-bs-parent="#accordionExample2">
                                <div class="py-0">
                                    <ul class="ps-3 pe-0 mb-1">
                                        <!-- Nested Accordian -->
                                        <?php $j = 1;
                                        foreach ($header_cat_mobile_data['subcat_1'] as $subcat_1_data) { ?>
                                            <li class="sub_category_item px-0">
                                                <div class="accordion accordion-icon accordion-bg-light" id="accordionExamplesub_subcategory-<?= $j ?>">
                                                    <div class="accordion-item">
                                                        <p class="accordion-header font-base" id="heading-1">
                                                            <a class="sub_category_item_nested px-0 py-1 w-100 <?= count($subcat_1_data['subsubcat_2']) > 0 ? 'accordion-button' : '' ?> collapsed" data-bs-toggle="collapse" data-bs-target="#collapse_sub-subcate-<?= $j ?>" aria-expanded="true" aria-controls="collapse_sub-subcate-<?= $j ?>">
                                                                <span class="second_level_category" style="margin-right: 10px;"><?= $subcat_1_data['cat_name'] ?></span>
                                                            </a>
                                                        </p>
                                                        <!-- Body -->
                                                        <?php if (count($subcat_1_data['subsubcat_2']) > 0) : ?>
                                                            <div id="collapse_sub-subcate-<?= $j ?>" class="accordion-collapse collapse " aria-labelledby="heading-1" data-bs-parent="#accordionExamplesub_subcategory-<?= $j ?>">
                                                                <div class="py-0">
                                                                    <ul class="ps-3 pe-0">
                                                                        <!-- Sub Sub-subcategory 4 layer -->
                                                                        <!-- Double Nested Accordian -->
                                                                        <?php
                                                                        foreach ($subcat_1_data['subsubcat_2'] as $subcat_2_data) { ?>
                                                                            <li class="sub_category_item">
                                                                                <a href="<?= base_url() . "index.php/" . $subcat_2_data['cat_slug'] ?>" class="sub_category_item_nested w-100">
                                                                                    <span class="third_level_category" style="margin-right: 10px;">
                                                                                        <?php echo $subcat_2_data['cat_name']; ?>
                                                                                    </span>
                                                                                </a>
                                                                            </li>
                                                                        <?php
                                                                        } ?>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php $j++;
                                        } ?>
                                    </ul>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <hr class="ruler">
                <?php $i++;
                } ?>
            </div>
            <!-- Accordian END -->
        </div>
    </div>
</div>




<script>
    function offcanvasHeight() {
        let search_div_mob = document.getElementById('search_div_mob');

       /*  if (search_div_mob.textContent.trim() !== "") {
            document.getElementById('searchOffcanvas').style.height = "fit-content"
        } */
    }

    window.addEventListener("load", () => {
        setInterval(offcanvasHeight, 500)
    })

    document.getElementById("searchOffcanvas").style.display = "none";

    function openSearchbar() {
        document.getElementById("searchOffcanvas").style.display = "block";
    }

    function closeSearchbar() {
        document.getElementById("searchOffcanvas").style.display = "none";
    }
</script>