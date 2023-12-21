<input type="hidden" class="txt_csrfname" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
<input type="hidden" class="site_url" value="<?= base_url() ?>">
<input type="hidden" id="user_id" value="<?= $this->session->userdata('user_id') ?>">
<input type="hidden" name="website_name" value="<?php echo $website_name; ?>" id="website_name">
<input type="hidden" class="securecode" value="1234567890">

<!-- New Navbar -->

<header class="navbar-light navbar-sticky" style="position: sticky; top: -1px; z-index: 1000;">
    <!-- Part 1 Navbar (Logo, Search, Cart and User Details) -->
    <nav class="navbar menu-navbar navbar-expand-lg bg-white">
        <div class="container">
            <div class="row w-100">
                <div class="col-4">
                    <div class="d-flex d-lg-none align-items-center h-100">
                        <a class="ms-3 text-dark" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar">
                            <i class="fa-solid fa-bars"></i>
                        </a>
                    </div>
                </div>
                <a class="col-4 navbar-brand m-0 py-0 text-center" href="<?= base_url() ?>">
                    <img src="<?= base_url('assets/images/logo.png') ?>" alt="<?= get_store_settings('store_name') ?>" srcset="<?= base_url('assets/images/logo-108x108.png') ?> 108w" sizes="(min-width: 1000px) 54px, 50px">
                </a>
                <div class="col-4 d-flex align-items-center justify-content-end">
                    <a href="javascript:void(0)" title="Search">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </a>
                    <a href="<?= base_url('wishlist') ?>" class="ms-3 ms-md-4 position-relative" title="Wishlist">
                        <i class="fa-regular fa-heart"></i>
                        <span class="wishlist-icon-count">
                            <div id="badge-wishlist-count">0</div>
                        </span>
                    </a>
                    <a href="<?= base_url('cart') ?>" class="ms-3 ms-md-4 position-relative" title="Cart">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span class="icon-count">
                            <div id="badge-cart-count">0</div>
                        </span>
                    </a>
                    <?php if ($this->session->userdata('user_id') == '') : ?>
                        <a href="<?= base_url('productdetail/Patanjali%20cow%20ghee%201%20Ltr%20/12') ?>" class="ms-3 ms-md-4 d-none d-md-block" title="Profile">
                            <i class="fa-regular fa-user"></i>
                        </a>
                    <?php else : ?>
                        <a href="<?= base_url('personal_info') ?>" class="ms-3 ms-md-4 d-none d-md-block" title="<?= $this->session->userdata('user_name') ?>">
                            <i class="fa-regular fa-user"></i>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <!-- Part 2 Navbar (Categories) -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm bg-white category-navbar py-0">
        <div class="container position-relative">
            <div class="navbar-collapse w-100 collapse" id="navbarCollapse2">
                <ul class="menu-items mb-0 px-0 w-100 justify-content-center">
                    <?php
                    $maincats = array_slice($header_cat, 0, 4);
                    foreach ($maincats as $maincat) : ?>
                        <li class="menu-li">
                            <a href="<?= base_url('sub_category/' . $maincat['cat_id']) ?>" class="menu-item py-3"><?= $maincat['cat_name'] ?></a>
                            <?php if (!empty($maincat['subcat_1'])) : ?>
                                <div class="container mega-menu">
                                    <div class="content box-shadow-0">
                                        <?php for ($i = 0; $i < 4; $i++) : ?>
                                            <div class="col px-2 py-4">
                                                <section>
                                                    <?php if (!empty($maincat['subcat_1'][$i])) : ?>
                                                        <a href="<?= base_url('sub_category/' . $maincat['subcat_1'][$i]['cat_id']) ?>" class="item-heading"><?= $maincat['subcat_1'][$i]['cat_name'] ?></a>
                                                        <?php if (count($maincat['subcat_1'][$i]['subsubcat_2']) > 0) : ?>
                                                            <ul class="mega-links px-0">
                                                                <?php foreach ($maincat['subcat_1'][$i]['subsubcat_2'] as $key => $subsubcat_2) : ?>
                                                                    <?php
                                                                    if ($key > 4) :
                                                                        break;
                                                                    endif;
                                                                    ?>
                                                                    <li><a href="<?= base_url('sub_category/' . $subsubcat_2['cat_id']) ?>"><?= $subsubcat_2['cat_name'] ?></a></li>
                                                                <?php endforeach; ?>
                                                            </ul>
                                                            <a class="view-all" href="<?= base_url('sub_category/' . $maincat['subcat_1'][$i]['cat_id']) ?>" href="">view all <i class="fa-solid fa-arrow-right"></i></a>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </section>
                                            </div>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                    <li class="menu-li">
                        <a href="#all-collection" class="menu-item py-3">Collections</a>
                        <div class="container mega-menu">
                            <div class="content custom-banner-content box-shadow-0">
                                <?php for ($i = 0; $i < 3; $i++) : ?>
                                    <div class="col px-2 py-4">
                                        <img src="<?= base_url('assets/images/collection.jpeg') ?>" alt="Collection" srcset="" class="w-100 h-100">
                                    </div>
                                <?php endfor; ?>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="search-form-div position-absolute d-none">
        <form action="<?= base_url('search/s') ?>" role="search">
            <div class="position-relative">
                <div class="input-group search-input-group w-100">
                    <input type="text" class="form-control" autocomplete="off" id="search" name="search" value="<?= isset($_REQUEST['search']) ? $_REQUEST['search'] : '' ?>" placeholder="Search (keywords,etc)" aria-label="Search" aria-describedby="button-addon2">
                    <button class="btn" type="submit" id="searchButton">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>

                <div class="dropdown position-absolute w-100 mt-2" style="left: 0; z-index: 1000;">
                    <ul class="dropdown-menu searchResults py-0 w-100" id="searchResults"></ul>
                </div>
            </div>

        </form>
    </div>

    <div class="search-form-overlay"></div>
</header>

<!-- New Mobile Sidebar -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasSidebar" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header align-items-center justify-content-end">
        <button type="button" class="close-btn-offcanvas text-reset" data-bs-dismiss="offcanvas" aria-label="Close">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>
    <div class="offcanvas-body">
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <?php foreach ($header_cat as $header_cat_mobile_data) : ?>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="<?= count($header_cat_mobile_data['subcat_1']) > 0 ? '' : 'no-arrow' ?> accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#accordion<?= $header_cat_mobile_data['cat_id'] ?>" aria-expanded="false" aria-controls="accordion<?= $header_cat_mobile_data['cat_id'] ?>">
                            <?= $header_cat_mobile_data['cat_name'] ?>
                        </button>
                    </h2>
                    <?php if (count($header_cat_mobile_data['subcat_1']) > 0) : ?>
                        <div id="accordion<?= $header_cat_mobile_data['cat_id'] ?>" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body py-0">
                                <?php foreach ($header_cat_mobile_data['subcat_1'] as $subcat_1_data) : ?>
                                    <div class="accordion accordion-flush" id="accordion<?= $header_cat_mobile_data['cat_id'] ?>Example">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="<?= count($subcat_1_data['subsubcat_2']) > 0 ? '' : 'no-arrow' ?> accordion-button pe-0 collapsed fw-medium" type="button" data-bs-toggle="collapse" data-bs-target="#accordion<?= $subcat_1_data['cat_id'] ?>" aria-expanded="false" aria-controls="accordion<?= $subcat_1_data['cat_id'] ?>">
                                                    <?= $subcat_1_data['cat_name'] ?>
                                                </button>
                                            </h2>
                                            <?php if (count($subcat_1_data['subsubcat_2']) > 0) : ?>
                                                <div id="accordion<?= $subcat_1_data['cat_id'] ?>" class="accordion-collapse collapse" data-bs-parent="accordion#<?= $subcat_1_data['cat_id'] ?>Example">
                                                    <div class="accordion-body py-0">
                                                        <?php foreach ($subcat_1_data['subsubcat_2'] as $subcat_2_data) : ?>
                                                            <div class="accordion accordion-flush" id="accordion<?= $subcat_1_data['cat_id'] ?>Example">
                                                                <div class="accordion-item">
                                                                    <h2 class="accordion-header">
                                                                        <button class="no-arrow accordion-button pe-0 collapsed fw-light" type="button" data-bs-toggle="collapse" data-bs-target="#accordion<?= $subcat_2_data['cat_id'] ?>" aria-expanded="false" aria-controls="accordion<?= $subcat_2_data['cat_id'] ?>">
                                                                            <?= $subcat_2_data['cat_name'] ?>
                                                                        </button>
                                                                    </h2>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <hr class="m-0">
            <?php endforeach; ?>
        </div>
    </div>
</div>