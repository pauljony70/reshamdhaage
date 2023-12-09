<footer>
    <div class="footer-badges">
        <div class="container">
            <div class="exchange-img d-flex justify-content-evenly py-4 w-100">
                <div class="d-flex flex-column align-items-center">
                    <i class="fa-solid fa-truck-pickup"></i>
                    <div class="heading mt-1">Free Shipping</div>
                    <div class="free-shipping-text">for orders of INR 1499 or abobe</div>
                </div>
                <div class="d-flex flex-column align-items-center">
                    <i class="fa-solid fa-arrow-right-arrow-left"></i>
                    <div class="heading mt-1">Easy Exchange</div>
                </div>
                <div class="d-flex flex-column align-items-center">
                    <i class="fa-solid fa-medal"></i>
                    <div class="heading mt-1">Assured Quality</div>
                </div>
                <div class="d-flex flex-column align-items-center">
                    <i class="fa-solid fa-hand-holding-heart"></i>
                    <div class="heading mt-1">Handpicked</div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-logo d-flex align-items-center justify-content-center h-100 w-100 bg-secondary py-2">
        <img src="<?= base_url('assets/images/logo.png') ?>" alt="<?= get_store_settings('store_name') ?>" srcset="">
    </div>
    <div class="footer-links">
        <div class="container">
            <div class="row d-none d-lg-flex row-cols-md-5 footer-link-row mt-5">
                <div class="col mb-5">
                    <div class="col-heading text-primary fw-bolder mb-4">Account</div>
                    <div class="mb-3">
                        <a href="<?= base_url('refund') ?>">My Account</a>
                    </div>
                    <div class="mb-3">
                        <a href="<?= base_url('privacy') ?>">Check Order</a>
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="col-heading text-primary fw-bolder mb-4">Top Category</div>
                    <?php $count = 0;
                    foreach ($header_cat as $maincat_top) {
                        if ($count++ >= 5) {
                            break;
                        } else { ?>
                            <div class="mb-3">
                                <a href="<?php echo base_url . 'shop/' . $maincat_top['cat_slug']; ?>"><?php echo $maincat_top['cat_name']; ?></a>
                            </div>
                    <?php }
                    } ?>
                </div>
                <div class="col mb-5">
                    <div class="col-heading text-primary fw-bolder mb-4">Our Policy</div>
                    <div class="mb-3">
                        <a href="<?= base_url('refund') ?>">Returns Policy</a>
                    </div>
                    <div class="mb-3">
                        <a href="<?= base_url('privacy') ?>">Privacy Policy</a>
                    </div>
                    <div class="mb-3">
                        <a href="<?= base_url('shipping_policy') ?>">Shipping Policy</a>
                    </div>
                    <div class="mb-3">
                        <a href="<?= base_url('term_and_conditions') ?>">Terms & Condition</a>
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="col-heading text-primary fw-bolder mb-4">About Us</div>
                    <div class="footer-links mb-3">
                        <a href="<?= base_url('faq') ?>">FAQ</a>
                    </div>
                    <div class="footer-links mb-3">
                        <a href="<?= base_url('feedback') ?>">Feedback</a>
                    </div>
                    <div class="footer-links mb-3">
                        <a href="<?= base_url('contact') ?>">Contact Us</a>
                    </div>
                    <div class="footer-links mb-3">
                        <a href="<?= base_url('help') ?>">Help & Support</a>
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="col-heading text-primary fw-bolder mb-4">Useful Links</div>
                    <div class="footer-links mb-3">
                        <a href="<?= base_url('faq') ?>">Blog</a>
                    </div>
                    <div class="footer-links mb-3">
                        <a href="<?= base_url('feedback') ?>">Sustainability</a>
                    </div>
                    <div class="footer-links mb-3">
                        <a href="<?= base_url('contact') ?>">Career</a>
                    </div>
                </div>
            </div>
            <div class="d-block d-lg-none mt-5">
                <div class="accordion accordion-flush" id="footerAccordionFlush">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button fw-bolder collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseAccount" aria-expanded="false" aria-controls="flush-collapseAccount">
                                Account
                            </button>
                        </h2>
                        <div id="flush-collapseAccount" class="accordion-collapse collapse" data-bs-parent="#footerAccordionFlush">
                            <div class="accordion-body">
                                <div class="mb-3">
                                    <a href="<?= base_url('refund') ?>">My Account</a>
                                </div>
                                <div class="mb-3">
                                    <a href="<?= base_url('privacy') ?>">Check Order</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button fw-bolder collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-topCategory" aria-expanded="false" aria-controls="flush-topCategory">
                                Top Category
                            </button>
                        </h2>
                        <div id="flush-topCategory" class="accordion-collapse collapse" data-bs-parent="#footerAccordionFlush">
                            <div class="accordion-body">
                                <?php $count = 0;
                                foreach ($header_cat as $maincat_top) {
                                    if ($count++ >= 5) {
                                        break;
                                    } else { ?>
                                        <div class="mb-3">
                                            <a href="<?php echo base_url . 'shop/' . $maincat_top['cat_slug']; ?>"><?php echo $maincat_top['cat_name']; ?></a>
                                        </div>
                                <?php }
                                } ?>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button fw-bolder collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-ourPolicy" aria-expanded="false" aria-controls="flush-ourPolicy">
                                Our Policy
                            </button>
                        </h2>
                        <div id="flush-ourPolicy" class="accordion-collapse collapse" data-bs-parent="#footerAccordionFlush">
                            <div class="accordion-body">
                                <div class="mb-3">
                                    <a href="<?= base_url('refund') ?>">Returns Policy</a>
                                </div>
                                <div class="mb-3">
                                    <a href="<?= base_url('privacy') ?>">Privacy Policy</a>
                                </div>
                                <div class="mb-3">
                                    <a href="<?= base_url('shipping_policy') ?>">Shipping Policy</a>
                                </div>
                                <div class="mb-3">
                                    <a href="<?= base_url('term_and_conditions') ?>">Terms & Condition</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button fw-bolder collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-aboutUs" aria-expanded="false" aria-controls="flush-aboutUs">
                                About Us
                            </button>
                        </h2>
                        <div id="flush-aboutUs" class="accordion-collapse collapse" data-bs-parent="#footerAccordionFlush">
                            <div class="accordion-body">
                                <div class="col-heading text-primary fw-bolder mb-4">About Us</div>
                                <div class="footer-links mb-3">
                                    <a href="<?= base_url('faq') ?>">FAQ</a>
                                </div>
                                <div class="footer-links mb-3">
                                    <a href="<?= base_url('feedback') ?>">Feedback</a>
                                </div>
                                <div class="footer-links mb-3">
                                    <a href="<?= base_url('contact') ?>">Contact Us</a>
                                </div>
                                <div class="footer-links mb-3">
                                    <a href="<?= base_url('help') ?>">Help & Support</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button fw-bolder collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-usefulLinks" aria-expanded="false" aria-controls="flush-usefulLinks">
                                Useful Links
                            </button>
                        </h2>
                        <div id="flush-usefulLinks" class="accordion-collapse collapse" data-bs-parent="#footerAccordionFlush">
                            <div class="accordion-body">
                                <div class="footer-links mb-3">
                                    <a href="<?= base_url('faq') ?>">Blog</a>
                                </div>
                                <div class="footer-links mb-3">
                                    <a href="<?= base_url('feedback') ?>">Sustainability</a>
                                </div>
                                <div class="footer-links mb-3">
                                    <a href="<?= base_url('contact') ?>">Career</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>