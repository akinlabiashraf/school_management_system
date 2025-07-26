<?php $this->view('includes/header') ?>


<body>

	<!-- Main Wrapper -->
	<div class="main-wrapper">

		<?php $this->view('includes/header_nav') ?>

		<!-- Breadcrumb -->
		<?php $this->view('includes/crumbs') ?>
		<div class="breadcrumb-bar text-center">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-12">
						<h2 class="breadcrumb-title mb-2">All Tests</h2>
						<?php $this->view('includes/crumbs', ['crumbs' => $crumbs]) ?>
					</div>
				</div>
			</div>
		</div>
		<!-- /Breadcrumb -->

		<div class="content">
			<div class="container">
				<!-- profile box -->
				<div class="instructor-profile">
					<div class="instructor-profile-bg">
						<img src="assets/img/bg/card-bg-01.png" class="instructor-profile-bg-1" alt="">
					</div>
					<div class="row align-items-center row-gap-3">
						<div class="col-md-6">
							<div class="d-flex align-items-center">
								<span class="avatar flex-shrink-0 avatar-xxl avatar-rounded me-3 border border-white border-3 position-relative">
									<img src="assets/img/user/user-01.jpg" alt="img">
									<span class="verify-tick"><i class="isax isax-verify5"></i></span>
								</span>
								<div>
									<h5 class="mb-1 text-white d-inline-flex align-items-center"><?= Auth::getfirst_name() . " " . Auth::getlast_name() ?><a href="instructor-profile.html" class="link-light fs-16 ms-2"><i class="isax isax-edit-2"></i></a></h5>
									<p class="text-light"><?= ucfirst(str_replace("_", " ", Auth::getranks())) ?></p>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="d-flex align-items-center flex-wrap gap-3 justify-content-md-end">
								<!-- <?php if (Auth::access('lecturer')): ?>
                                    <?php
											$link = ROOT . "/single_class/testadd/" . $row->class_id . "?tab=test-add";
									?>
                                    <a href="<?= $link ?>" class="btn btn-white rounded-pill">Add New Test</a>

                                <?php endif; ?> -->

								<?php if (Auth::access('lecturer')): ?>
									<a href="#" class="btn btn-white rounded-pill">Add Course</a>
								<?php endif; ?>
								<a href="#" class="btn btn-secondary rounded-pill">Dashboard</a>
							</div>
						</div>
					</div>
				</div>
				<!-- profile box -->
				<div class="row">
					<!-- sidebar -->

					<?php $this->view('includes/admin_sidenav') ?>

					<!-- sidebar -->
					<div class="col-lg-9 quiz-wizard">
						
						<?php

						switch ($page_tab) {
							case 'view':
								// code...
								include(views_path('take-original-test-tab-view'));
								break;

							default:
								// code...
								break;
						}


						?>

					</div>
				</div>
			</div>
		</div>

		<!-- Footer -->
		<?php $this->view('includes/footer') ?>
		<!-- /Footer -->

		<!-- Edit Review -->
		<div class="modal fade" id="edit_review">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Edit Review</h4>
						<button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
							<i class="isax isax-close-circle"></i>
						</button>
					</div>
					<div class="modal-body pb-0">
						<div class="mb-3">
							<label class="form-label fs-14">Your Rating <span class="text-danger">*</span></label>
							<div class="selection-wrap">
								<div class="d-inline-block">
									<div class="rating-selction">
										<input type="radio" name="rating" value="5" id="rating5" checked>
										<label for="rating5"><i class="fa-solid fa-star"></i></label>
										<input type="radio" name="rating" value="4" id="rating4" checked>
										<label for="rating4"><i class="fa-solid fa-star"></i></label>
										<input type="radio" name="rating" value="3" id="rating3" checked>
										<label for="rating3"><i class="fa-solid fa-star"></i></label>
										<input type="radio" name="rating" value="2" id="rating2">
										<label for="rating2"><i class="fa-solid fa-star"></i></label>
										<input type="radio" name="rating" value="1" id="rating1">
										<label for="rating1"><i class="fa-solid fa-star"></i></label>
									</div>
								</div>
							</div>
						</div>
						<div class="mb-3">
							<label class="form-label fs-14">Write Your Review <span class="text-danger">*</span></label>
							<textarea class="form-control" rows="3">This is the second Photoshop course I have completed with Nancy Duarte. Worth every penny and recommend it highly. To get the most out of this course, its best to to take the Beginner to Advanced course first. The sound and video quality is of a good standard. Thank you Nancy Duarte.</textarea>
						</div>
					</div>
					<div class="modal-footer">
						<a href="javascript:void(0);" class="btn btn-md btn-light rounded-pill me-2" data-bs-dismiss="modal">Cancel</a>
						<button type="submit" class="btn btn-md btn-secondary rounded-pill">Save Changes</button>
					</div>
				</div>
			</div>
		</div>
		<!-- /Edit Review -->

		<!-- Delete Modal -->
		<div class="modal fade" id="delete_modal">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-body text-center custom-modal-body">
						<span class="avatar avatar-lg bg-light rounded-circle mb-2">
							<i class="isax isax-trash fs-24 text-danger"></i>
						</span>
						<div>
							<h4 class="mb-2">Delete Review</h4>
							<p class="mb-3">Are you sure you want to delete review?</p>
							<div class="d-flex align-items-center justify-content-center">
								<a href="#" class="btn btn-light rounded-pill me-2" data-bs-dismiss="modal">Cancel</a>
								<a href="#" class="btn btn-secondary rounded-pill">Yes, Remove All</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Delete Modal -->

	</div>
	<!-- /Main Wrapper -->

	<!-- jQuery -->
	<?php $this->view('includes/js') ?>
</html>