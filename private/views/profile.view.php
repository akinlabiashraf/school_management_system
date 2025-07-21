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
						<h2 class="breadcrumb-title mb-2">My Profile</h2>
						<?php $this->view('includes/crumbs', ['crumbs' => $crumbs]) ?>
					</div>
				</div>
			</div>
		</div>
		<!-- /Breadcrumb -->
		<?php if ($row): ?>
			<?php
			$image = get_image($row->image, $row->gender);
			?>
			<div class="content">
				<div class="container">
					<div class="instructor-profile">
						<div class="instructor-profile-bg">
							<img src="<?= ROOT ?>assets/img/bg/card-bg-01.png" class="instructor-profile-bg-1" alt="">
						</div>
						<div class="row align-items-center row-gap-3">
							<div class="col-md-6">
								<div class="d-flex align-items-center">
									<span class="avatar flex-shrink-0 avatar-xxl avatar-rounded me-3 border border-white border-3 position-relative">
										<?php if (isset($user)): ?>
											<img src="<?= get_image($user->image ?? '', $user->gender ?? 'male') ?>"
												alt="Profile Photo"
												class="img-thumbnail"
												width="150" height="150">

										<?php endif; ?>
										<span class="verify-tick"><i class="isax isax-verify5"></i></span>
									</span>
									<div>
										<h5 class="mb-1 text-white d-inline-flex align-items-center"><?= esc($row->last_name) ?> <?= esc($row->first_name) ?><a href="instructor-profile.html" class="link-light fs-16 ms-2"><i class="isax isax-edit-2"></i></a></h5>
										<p class="text-light"><?= ucfirst(str_replace("_", " ", Auth::getranks())) ?></p>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="d-flex align-items-center flex-wrap gap-3 justify-content-md-end">
									<a href="#" class="btn btn-white rounded-pill">Profile</a>
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
								<h5 class="fw-bold">My Profile</h5>
								<?php if (Auth::access('admin') || (Auth::access('reception') && $row->ranks == 'student')): ?>
									<div>
										<a href="<?= ROOT ?>/profile/delete/<?= $row->user_id ?>" class="edit-profile-icon me-2">
											<i class="isax isax-trash"></i>
										</a>
										<a href="<?= ROOT ?>/profile/edit/<?= $row->user_id ?>" class="edit-profile-icon">
											<i class="isax isax-edit-2"></i>
										</a>
									</div>
								<?php endif; ?>
							</div>

							<div class="card mt-3">
								<div class="card-body">
									<h5 class="fs-18 pb-3 border-bottom mb-3">Basic Information</h5>
									<div class="row">
										<div class="col-md-4 mb-3">
											<h6>First Name</h6>
											<span><?= esc($row->first_name) ?></span>
										</div>
										<div class="col-md-4 mb-3">
											<h6>Last Name</h6>
											<span><?= esc($row->last_name) ?></span>
										</div>
										<div class="col-md-4 mb-3">
											<h6>Registration Date</h6>
											<span><?= date('d M Y', strtotime($row->date)) ?></span>
										</div>
										<div class="col-md-4 mb-3">
											<h6>User Name</h6>
											<span>Tescode</span>
										</div>
										<div class="col-md-4 mb-3">
											<h6>Phone Number</h6>
											<span>08023455677</span>
										</div>
										<div class="col-md-4 mb-3">
											<h6>Email</h6>
											<span><?= esc($row->email) ?></span>
										</div>
										<div class="col-md-4 mb-3">
											<h6>Gender</h6>
											<span><?= esc($row->gender) ?></span>
										</div>
										<div class="col-md-4 mb-3">
											<h6>DOB</h6>
											<span>16 Jan 2020</span>
										</div>
										<div class="col-md-4 mb-3">
											<h6>Rank</h6>
											<span><?= ucwords(str_replace("_", " ", $row->ranks)) ?></span>
										</div>
										<div class="col-md-12">
											<h6>Bio</h6>
											<span>
												I am a web developer with a vast array of knowledge in
												many different front end and back end languages,
												responsive frameworks, databases, and best code practices.
											</span>
										</div>
									</div>
								</div>
							</div>

							<ul class="nav nav-tabs mt-4">
								<li class="nav-item">
									<a class="nav-link <?= $page_tab == 'info' ? 'active' : ''; ?>" href="<?= ROOT ?>/profile/<?= $row->user_id ?>">Basic Info</a>
								</li>
								<?php if (Auth::access('lecturer') || Auth::i_own_content($row)): ?>
									<li class="nav-item">
										<a class="nav-link <?= $page_tab == 'classes' ? 'active' : ''; ?>" href="<?= ROOT ?>/profile/<?= $row->user_id ?>?tab=classes">My Classes</a>
									</li>
									<li class="nav-item">
										<a class="nav-link <?= $page_tab == 'tests' ? 'active' : ''; ?>" href="<?= ROOT ?>/profile/<?= $row->user_id ?>?tab=tests">Tests</a>
									</li>
								<?php endif; ?>
							</ul>

							<?php
							switch ($page_tab) {
								case 'info':
									include(views_path('profile-tab-info'));
									break;

								case 'classes':
									if (Auth::access('lecturer') || Auth::i_own_content($row)) {
										include(views_path('profile-tab-classes'));
									} else {
										include(views_path('access-denied'));
									}
									break;

								case 'tests':
									include(views_path('profile-tab-tests'));
									break;

								default:
									break;
							}
							?>
						</div>

					</div>
				</div>
			</div>
		<?php else: ?>
			<center>
				<h2>This profile was not found at the moment</h2>
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