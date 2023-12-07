<!DOCTYPE html>
<html lang="zxx" class="js">
<?php
header('Access-Control-Allow-Origin: *');
if (empty($this->session->userdata('user_id'))) {
    redirect('login');
}
?>

<?php include("includes/head.php") ?>

<body class="nk-body bg-lighter npc-default has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            <?php include("includes/sidebar.php") ?>
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <?php include("includes/header.php") ?>
                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="components-preview wide-md mx-auto">
                                    <div class="nk-block-head nk-block-head-lg wide-sm">
                                        <div class="nk-block-head-content">
                                            <h2 class="nk-block-title fw-normal">Address</h2>
                                            <?php echo @$message; ?>

                                        </div>
                                    </div><!-- .nk-block -->
                                    <div class="nk-block nk-block-lg">
                                        <div class="row g-gs">
                                            <div class="col-lg-12">
                                                <div class="card h-100">
                                                    <div class="card-inner">

                                                        <form method="post" action="<?php echo base_url(); ?>Address/add_address">
                                                            <div class="row">
                                                                <div class="form-group col-md-4">
                                                                    <label class="form-label" for="cf-email-address">Country Code</label>
                                                                    <div class="form-group">
                                                                        <div class="form-control-wrap ">
                                                                            <div class="form-control-select">
                                                                                <select class="form-control required invalid" data-msg="Required" id="country_code" name="country_code" required="">
                                                                                    <option value="">Select Code</option>

                                                                                    <?php foreach ($country_data->result() as $country) { ?>
                                                                                        <option value="<?php echo $country->phonecode; ?>"><?php echo '(+' . $country->phonecode . ')  ' . $country->nicename; ?></option>
                                                                                    <?php } ?>

                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-8">
                                                                    <div class="form-label-group">
                                                                        <label class="form-label" for="default-01">Phone No</label>
                                                                    </div>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" name="phone" class="form-control form-control-lg" required id="phone" placeholder="Enter Phone No">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-8">
                                                                    <div class="form-label-group">
                                                                        <label class="form-label" for="default-01">Address</label>
                                                                    </div>
                                                                    <div class="form-control-wrap">
                                                                        <textarea class="form-control form-control-lg" name="address" required placeholder="Enter Address"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-label" for="cf-full-name">City</label>
                                                                    <input type="text" class="form-control" id="city" name="city" required placeholder="Enter City">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-label" for="cf-phone-no">Pin</label>
                                                                    <input type="text" class="form-control" id="pin" name="pin" required placeholder="Enter Pin">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-label" for="cf-phone-no">Country</label>
                                                                    <input type="text" class="form-control" id="country" name="country" required placeholder="Enter Country">
                                                                </div>

                                                                <div class="form-group">
                                                                    <button type="submit" class="btn btn-lg btn-primary">Add Address</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card card-bordered card-preview">
                                            <div class="card-inner">
                                                <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                                                    <thead>
                                                        <tr>
                                                            <th>Sno</th>
                                                            <th>Mobile No</th>
                                                            <th>Address</th>
                                                            <th></th>

                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbodyPostid">
                                                        <?php
                                                        $sno = 1;
                                                        foreach ($user_data->result() as $row) {
                                                        ?>
                                                            <tr class="nk-tb-item">

                                                                <td class="nk-tb-col tb-col-lg">
                                                                    <span><?php echo $sno; ?></span>
                                                                </td>
                                                                <td class="nk-tb-col tb-col-lg">
                                                                    <span><?php echo $row->phone; ?></span>
                                                                </td>
                                                                <td class="nk-tb-col tb-col-lg">
                                                                    <span><?php echo $row->address; ?></span>
                                                                </td>

                                                                <td class="nk-tb-col tb-col-lg">
                                                                    <ul class="nk-tb-actions gx-1">
                                                                        <li class="nk-tb-action-hidden">
                                                                            <a href="<?php echo site_url('address/delete/' . $row->sno); ?>" class="btn btn-trigger btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                                                <em class="icon ni ni-trash"></em>
                                                                            </a>
                                                                        </li>

                                                                        <li class="nk-tb-action-hidden">
                                                                            <a href="<?php echo site_url('address/edit/' . $row->sno); ?>" class="btn btn-trigger btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                                                                <em class="icon ni ni-pen2"></em>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <div class="drodown">
                                                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>

                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </td>

                                                            </tr><!-- .nk-tb-item  -->
                                                        <?php $sno++;
                                                        } ?>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div><!-- .card-preview -->
                                    </div><!-- .nk-block -->

                                </div><!-- .components-preview -->
                            </div>
                        </div>
                    </div>
                </div>


                <!-- content @e -->
                <!-- footer @s -->
                <?php include("includes/footer.php") ?>
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- select region modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="region">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-md">
                    <h5 class="title mb-4">Select Your Country</h5>
                    <div class="nk-country-region">
                        <ul class="country-list text-center gy-2">
                            <li>
                                <a href="#" class="country-item">
                                    <img src="<?php echo base_url; ?>images/flags/arg.png" alt="" class="country-flag">
                                    <span class="country-name">Argentina</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="<?php echo base_url; ?>images/flags/aus.png" alt="" class="country-flag">
                                    <span class="country-name">Australia</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="<?php echo base_url; ?>images/flags/bangladesh.png" alt="" class="country-flag">
                                    <span class="country-name">Bangladesh</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="<?php echo base_url; ?>images/flags/canada.png" alt="" class="country-flag">
                                    <span class="country-name">Canada <small>(English)</small></span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="<?php echo base_url; ?>images/flags/china.png" alt="" class="country-flag">
                                    <span class="country-name">Centrafricaine</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="<?php echo base_url; ?>images/flags/china.png" alt="" class="country-flag">
                                    <span class="country-name">China</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="<?php echo base_url; ?>images/flags/french.png" alt="" class="country-flag">
                                    <span class="country-name">France</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="<?php echo base_url; ?>images/flags/germany.png" alt="" class="country-flag">
                                    <span class="country-name">Germany</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="<?php echo base_url; ?>images/flags/iran.png" alt="" class="country-flag">
                                    <span class="country-name">Iran</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="<?php echo base_url; ?>images/flags/italy.png" alt="" class="country-flag">
                                    <span class="country-name">Italy</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="<?php echo base_url; ?>images/flags/mexico.png" alt="" class="country-flag">
                                    <span class="country-name">México</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="<?php echo base_url; ?>images/flags/philipine.png" alt="" class="country-flag">
                                    <span class="country-name">Philippines</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="<?php echo base_url; ?>images/flags/portugal.png" alt="" class="country-flag">
                                    <span class="country-name">Portugal</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="<?php echo base_url; ?>images/flags/s-africa.png" alt="" class="country-flag">
                                    <span class="country-name">South Africa</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="<?php echo base_url; ?>images/flags/spanish.png" alt="" class="country-flag">
                                    <span class="country-name">Spain</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="<?php echo base_url; ?>images/flags/switzerland.png" alt="" class="country-flag">
                                    <span class="country-name">Switzerland</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="<?php echo base_url; ?>images/flags/uk.png" alt="" class="country-flag">
                                    <span class="country-name">United Kingdom</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="<?php echo base_url; ?>images/flags/english.png" alt="" class="country-flag">
                                    <span class="country-name">United State</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!-- .modal-content -->
        </div><!-- .modla-dialog -->
    </div><!-- .modal -->
    <!-- JavaScript -->
    <?php include("includes/script.php") ?>
    <script src="https://www.gstatic.com/firebasejs/7.15.5/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.15.5/firebase-database.js"></script>
</body>

</html>