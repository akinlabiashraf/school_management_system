<?php $this->view('includes/header') ?>
<?php $this->view('includes/header_nav') ?>

<!-- Breadcrumb -->
<?php $this->view('includes/crumbs') ?>
<div class="breadcrumb-bar text-center">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-12">
				<h2 class="breadcrumb-title mb-2">Mark Tests</h2>
				<?php $this->view('includes/crumbs', ['crumbs' => $crumbs]) ?>
			</div>
		</div>
	</div>
</div>
<!-- /Breadcrumb -->
<div class="content">
	<div class="container">
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
		<div class="row">
			<!-- Sidebar -->
			<?php $this->view('includes/admin_sidenav') ?>
			<!-- /Sidebar -->
			<div class="col-lg-9">
				<div class="container-fluid p-4 shadow mx-auto" style="max-width: 1000px;">
					<?php $this->view('includes/crumbs', ['crumbs' => $crumbs]) ?>

					<?php if ($row && $answered_test_row && $answered_test_row->submitted && !($row->disabled && Auth::access('student'))): ?>

						<div class="row">
							<center>
								<h4><?= esc(ucwords($row->test)) ?></h4>
							</center>
							<center class="row">
								<h5 class="col">Class:
									<a href="<?= ROOT ?>/single_class/<?= $row->class->class_id ?>?tab=students">
										<?= $row->class->class ?>
									</a>
								</h5>

								<h5 class="col">Student:
									<a href="<?= ROOT ?>/profile/<?= $student_row->user_id ?>?tab=tests">
										<?= $student_row->first_name ?> <?= $student_row->last_name ?>
									</a>
								</h5>
							</center>

							<table class="table table-hover table-striped table-bordered">
								<tr>
									<th>Created by:</th>
									<td>
										<a href="<?= ROOT ?>/profile/<?= $row->user->user_id ?>?tab=tests">
											<?= esc($row->user->first_name) ?> <?= esc($row->user->last_name) ?>
										</a>
									</td>
									<th>Date Created:</th>
									<td><?= get_date($row->date) ?></td>

								</tr>

								<?php $active = $row->disabled ? "No" : "Yes"; ?>
								<tr>
									<td><b>Class:</b> <?= $row->class->class ?></td>
									<td colspan="5"><b>Test Description:</b><br><?= esc($row->description) ?></td>
								</tr>
							</table>
							<a href="<?= ROOT ?>/make_pdf/<?= $row->test_id ?>/<?= $student_row->user_id ?>?type=test">
								<button class="btn btn-primary float-end">Save as PDF</button>
							</a>
						</div>


						<?php

						switch ($page_tab) {
							case 'view':
								// code...
								include(views_path('marked-single-tab-view'));
								break;

							default:
								// code...
								break;
						}


						?>

					<?php else: ?>
						<center>
							<h4>That test was not found!</h4>
						</center>
					<?php endif; ?>

				</div>
			</div>
		</div>
	</div>
</div>



<?php $this->view('includes/footer') ?>