<!-- New Footer -->
<footer class="py-4 deskop-footer amm_footer">
    <div class="container footer_top">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-6 col-xl-3 footer_boxes">
                <img src="<?= base_url ?>images/icons/airoplane.png" class="footer_box_img">
                <div class="text-center footer_box_content">
                    <h5>Free Shipping</h5>
                    <span>Free Shipping all India</span>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-6 col-xl-3 footer_boxes">
                <img src="<?= base_url ?>images/icons/airoplane.png" class="footer_box_img">
                <div class="text-center footer_box_content">
                    <h5>Free Shipping</h5>
                    <span>Free Shipping all India</span>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-6 col-xl-3 footer_boxes">
                <img src="<?= base_url ?>images/icons/airoplane.png" class="footer_box_img">
                <div class="text-center footer_box_content">
                    <h5>Free Shipping</h5>
                    <span>Free Shipping all India</span>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-6 col-xl-3 footer_boxes">
                <img src="<?= base_url ?>images/icons/airoplane.png" class="footer_box_img">
                <div class="text-center footer_box_content">
                    <h5>Free Shipping</h5>
                    <span>Free Shipping all India</span>
                </div>
            </div>
        </div>
    </div>

    <div class="container px-1">
        <div class="row footer justify-content-between">
            <div class="col-md-6 col-12">
                <div class="row">
                    <div class="col-12 col-md-7 col-6 mt-3 mt-md-4 mt-lg-4">
                        <div class="footer_logo mb-2">
                            <a href="/">
                                <img src="<?= base_url ?>images/logo-blueappsoftware.png" class="img-fluid footer_logo_image" alt="Footer Logo" style="height: 50px">
                            </a>
                        </div>
                        <p class="fw-semibold fs-xl-6 mb-3">
                            <?= get_settings('footer_text') ?>
                            <br>
                            <!-- <a href="https://www.blueappsoftware.com/">BlueApp Software</a> -->
                        </p>
                        <?php if (!empty(get_settings('facebook_link')) || !empty(get_settings('instagram_link')) || !empty(get_settings('twitter_link')) || !empty(get_settings('snapchat_link')) || !empty(get_settings('youtube_link'))) : ?>
                            <h6 class="fw-bold mb-3">
                                Follow us on
                            </h6>
                        <?php endif; ?>
                        <div>
                            <div class="d-flex flex-wrap">
                                <?php if (!empty(get_settings('facebook_link'))) : ?>
                                    <a href="<?= get_settings('facebook_link') ?>" target="_blank" rel="noopener noreferrer" style="font-size: 22px; color: #3b5998;" class="me-2"><i class="fa-brands fa-square-facebook"></i></a>
                                <?php endif; ?>
                                <?php if (!empty(get_settings('instagram_link'))) : ?>
                                    <a href="<?= get_settings('instagram_link') ?>rget=" _blank" rel="noopener noreferrer" style="font-size: 22px; color: #d62976;" class="me-2"><i class="fa-brands fa-square-instagram"></i></a>
                                <?php endif; ?>
                                <?php if (!empty(get_settings('twitter_link'))) : ?>
                                    <a href="<?= get_settings('twitter_link') ?>" target="_blank" rel="noopener noreferrer" style="font-size: 22px; color: #00acee;" class="me-2"><i class="fa-brands fa-square-twitter"></i></a>
                                <?php endif; ?>
                                <?php if (!empty(get_settings('snapchat_link'))) : ?>
                                    <a href="<?= get_settings('snapchat_link') ?>" target="_blank" rel="noopener noreferrer" style="font-size: 22px; color: #FFFC00;" class="me-2"><i class="fa-brands fa-square-snapchat"></i></a>
                                <?php endif; ?>
                                <?php if (!empty(get_settings('youtube_link'))) : ?>
                                    <a href="<?= get_settings('youtube_link') ?>rget=" _blank" rel="noopener noreferrer" style="font-size: 22px; color: #CD201F;" class="me-2"><i class="fa-brands fa-square-youtube"></i></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-5 col-6 mt-3 mt-md-4 mt-lg-4">
                        <h3 class="fw-bold ms-2 more_info_footer">More Info</h3>
                        <ul class="list-unstyled mb-0">
                            <li><a href="<?php echo base_url ?>about" class="text-decoration-none text-dark fw-semibold d-xl-block ms-2 my-2">About us</a></li>
                            <li><a href="<?php echo base_url ?>contact" class="text-decoration-none text-dark fw-semibold d-xl-block ms-2 my-2">Contact Us</a></li>
                            <li><a href="<?php echo base_url ?>policy" class="text-decoration-none text-dark fw-semibold d-xl-block ms-2 my-2">Privacy Policy</a></li>
                            <li><a href="<?php echo base_url ?>refund" class="text-decoration-none text-dark fw-semibold d-xl-block ms-2 my-2">Refund Policy</a></li>
                            <li><a href="<?php echo base_url ?>" class="text-decoration-none text-dark fw-semibold d-xl-block ms-2 my-2">Shipping</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-3 col-12 mt-3">
                <div class="newsletter">
                    <h3 class="fw-bold more_info_footer mb-4">Download our App</h3>
                    <a target="_blannk" href="https://play.google.com/store/apps/details?id=com.mkkirana">
                        <img style="width: 120px;" src="<?php echo base_url; ?>assets/images/app_full.png" alt="Download from play store">
                    </a>
                    <!-- <span class="my-3 newsletter_footer">Get instant updates about our new products and special promos!</span>
                    <form action="" class="mt-4">
                        <input type="email" class="form-control sub_input_footer" placeholder="Enter your Email">
                        <button class="btn px-5 py-2 sub_btn_footer">SUBSCRIBE</button>
                    </form> -->
                </div>
            </div>
        </div>
        <hr>
        <p class="mb-0 fw-semibold text-center">&copy; <?php echo Date("Y") ?> - Copyright BlueApp Software All Right Reserved</p>
    </div>
</footer>