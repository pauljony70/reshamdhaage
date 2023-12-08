<?php
include('session.php');
include("header.php");
?>
<link href="<?php echo BASEURL; ?>admin/assets/custom-style.css" rel="stylesheet">

<div class="modal fade" id="imageUploadModal" tabindex="-1" aria-labelledby="imageUploadModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="imageUploadModalLabel">Add Banner</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="imageUploadForm" action="homepage-banner-process.php" method="post" enctype="multipart/form-data">
					<input type="hidden" name="id" id="uploadId" value="">
					<input type="hidden" name="bannerType" id="bannerType" value="">
					<div class="form-group">
						<label for="uploadLink">Link</label>
						<input type="text" class="form-control" id="uploadLink" name="uploadLink" data-parsley-required-message="Link is required." required>
					</div>
					<div class="form-group">
						<label for="image">Image</label>
						<input type="file" class="form-control-file" id="image" name="image" data-parsley-required-message="Image is required." required>
					</div>
					<button type="submit" class="btn btn-dark">Submit</button>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="content-page">
	<!-- Start content -->
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="page-title-box">
						<h4 class="page-title">Homepage Banners</h4>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<div class="container">
								<?php
								$sql = "SELECT * FROM homepage_banner WHERE section = 'top_category'";
								$result = $conn->query($sql);
								if ($result->num_rows > 0) : ?>
									<section id="top-category" class="top-category">
										<h3 class="text-center mb-3">Shop By Category</h3>
										<div class="row">
											<?php while ($row = $result->fetch_assoc()) : ?>
												<div class="col-6 col-md-3">
													<a href="<?= $row['link'] ?>" target="_blank" class="card" id="<?= $row['type'] ?>" style="background-image: url('<?= BASEURL . 'media/' . $row['image'] ?>');">
														<div class="card-body d-flex align-items-center justify-content-center">
															<button type="button" class="btn btn-success waves-effect waves-light" data-id="<?= $row['id'] ?>" data-link="<?= $row['link'] ?>" data-type="<?= $row['type'] ?>" data-toggle="modal" data-target="#imageUploadModal" onclick="uploadTopCategory(event)">Upload</button>
														</div>
													</a>
												</div>
											<?php endwhile; ?>
										</div>
									</section>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<?php include('footernew.php'); ?>
<script src="<?php echo BASEURL; ?>admin/js/homepage-web.js"></script>