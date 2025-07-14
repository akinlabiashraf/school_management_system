<!DOCTYPE html>
<html lang="en">

<?php $this->view('includes/header') ?>

<body>

	<!-- Main Wrapper -->
	<div class="main-wrapper">

		<!-- Header -->
		<?php $this->view('includes/header_nav') ?>
		<!-- /Header -->

		<!-- Breadcrumb -->
		<div class="breadcrumb-bar text-center">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-12">
						<h2 class="breadcrumb-title mb-2">Class</h2>
						<?php $this->view('includes/crumbs', ['crumbs' => $crumbs]) ?>
					</div>
				</div>
			</div>
		</div>
		<!-- /Breadcrumb -->
		<?php if ($row): ?>
			<?php
			$image = get_image($row->user->image, $row->user->gender);
			?>
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
										<img src="<?= ROOT . $image ?>" alt="img">
										<span class="verify-tick"><i class="isax isax-verify5"></i></span>
									</span>
									<div>
										<h5 class="mb-1 text-white d-inline-flex align-items-center"><?= esc($row->user->last_name) ?> <?= esc($row->user->first_name) ?><a href="instructor-profile.html" class="link-light fs-16 ms-2"><i class="isax isax-edit-2"></i></a></h5>
										<p class="text-light"><?= ucfirst(str_replace("_", " ", Auth::getranks())) ?></p>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="d-flex align-items-center flex-wrap gap-3 justify-content-md-end">
									<a href="#" class="btn btn-white rounded-pill">Single Class</a>
									<a href="#" class="btn btn-secondary rounded-pill"><?= ucfirst(str_replace("_", " ", Auth::getranks())) ?> Dashboard</a>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<!-- Sidebar -->
						<?php $this->view('includes/admin_sidenav') ?>
						<!-- /Sidebar -->
						<div class="col-lg-9">
							<div class="page-title d-flex align-items-center justify-content-between">
								<h5 class="fw-bold"><?= $row->class ?></h5>
								<a href="#" class="edit-profile-icon"><i class="isax isax-edit-2"></i></a>
							</div>
							<div class="card">
								<div class="card-body">
									<h5 class="fs-18 pb-3 border-bottom mb-3">Basic Information</h5>
									<div class="row">
										<div class="col-md-4">
											<div class="mb-3">
												<h6>Class Name</h6>
												<span><?= esc($row->class) ?></span>
											</div>
										</div>
										<div class="col-md-4">
											<div class="mb-3">
												<h6>Created by</h6>
												<span><?= esc($row->user->last_name) ?> <?= esc($row->user->first_name) ?></span>
											</div>
										</div>
										<div class="col-md-4">
											<div class="mb-3">
												<h6>Registration Date</h6>
												<span><?= date('d M Y', strtotime($row->date)) ?></span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<ul class="nav nav-tabs">
								<li class="nav-item">
									<a class="nav-link <?= $page_tab == 'lecturers' ? 'active' : ''; ?> " href="<?= ROOT ?>/single_class/<?= $row->class_id ?>?tab=lecturers">Lecturers</a>
								</li>
								<li class="nav-item">
									<a class="nav-link <?= $page_tab == 'students' ? 'active' : ''; ?> " href="<?= ROOT ?>/single_class/<?= $row->class_id ?>?tab=students">Students</a>
								</li>
								<li class="nav-item">
									<a class="nav-link <?= $page_tab == 'tests' ? 'active' : ''; ?> " href="<?= ROOT ?>/single_class/<?= $row->class_id ?>?tab=tests">Tests</a>
								</li>

							</ul>


							<?php

							switch ($page_tab) {
								case 'lecturers':
									// code...
									include(views_path('class-tab-lecturers'));
									break;

								case 'students':
									// code...
									include(views_path('class-tab-students'));
									break;

								case 'tests':
									// code...
									include(views_path('class-tab-tests'));
									break;

								case 'test-add':
									// code...
									include(views_path('class-tab-test-add'));
									break;

								case 'test-edit':
									// code...
									include(views_path('class-tab-test-edit'));
									break;

								case 'test-delete':
									// code...
									include(views_path('class-tab-test-delete'));
									break;


								case 'lecturer-add':
									// code...
									include(views_path('class-tab-lecturers-add'));

									break;
								case 'student-add':
									// code...
									include(views_path('class-tab-students-add'));

									break;

								case 'lecturer-remove':
									// code...
									include(views_path('class-tab-lecturers-remove'));

									break;
								case 'student-remove':
									// code...
									include(views_path('class-tab-students-remove'));

									break;

								case 'students-add':
									// code...
									include(views_path('class-tab-students-add'));

									break;
								case 'tests-add':
									// code...
									include(views_path('class-tab-tests-add'));

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
		<?php else: ?>
			<center>
				<h2>This class was not found at the moment</h2>
			</center>
		<?php endif; ?>
		<!-- Footer -->

		<?php $this->view('includes/footer') ?>

		<!-- /Footer -->

	</div>
	<!-- /Main Wrapper -->

	<!-- jQuery -->

	<?php $this->view('includes/js') ?>
</body>

</html>