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
						<h2 class="breadcrumb-title mb-2">Edit my Profile</h2>
						<!-- <?php $this->view('includes/crumbs', ['crumbs' => $crumbs]) ?> -->
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
										<img src="<?= ROOT . $image ?>" alt="img">
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
					<form method="post" enctype="multipart/form-data">
						<div class="row">
							<!-- Sidebar -->
							<?php $this->view('includes/admin_sidenav') ?>
							<!-- /Sidebar -->
							<div class="col-lg-9">
								<div class="page-title d-flex align-items-center justify-content-between">
									<h5 class="fw-bold">Edit my Profile</h5>
									<?php if (Auth::access('reception') || Auth::i_own_content($row)): ?>
										<!-- <a href="<?= ROOT ?>/profile/delete/<?= $row->user_id ?>" class="edit-profile-icon"><i class="isax isax-up"></i></a> -->

										<label for="image_browser" class="btn-sm btn btn-info text-white">
											<input onchange="display_image_name(this.files[0].name)" id="image_browser" type="file" name="image" style="display: none;">
											Browse Image
										</label>

								</div>
							<?php endif; ?>
							<div class="card">
								<div class="card-body">
									<h5 class="fs-18 pb-3 border-bottom mb-3">Basic Information</h5>

									<?php if (count($errors) > 0): ?>
										<div class="alert alert-warning alert-dismissible fade show p-1" role="alert">
											<strong>Errors:</strong>
											<?php foreach ($errors as $error): ?>
												<br><?= $error ?>
											<?php endforeach; ?>
											<span type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</span>
										</div>
									<?php endif; ?>

									<input class="my-2 form-control" value="<?= get_var('first_name', $row->first_name) ?>" type="first_name" name="first_name" placeholder="First Name">
									<input class="my-2 form-control" value="<?= get_var('last_name', $row->last_name) ?>" type="last_name" name="last_name" placeholder="Last Name">
									<input class="my-2 form-control" value="<?= get_var('email', $row->email) ?>" type="email" name="email" placeholder="Email">

									<select class="my-2 form-control" name="gender">
										<option <?= get_select('gender', $row->gender) ?> value="<?= $row->gender ?>"><?= ucwords($row->gender) ?></option>
										<option <?= get_select('gender', 'male') ?> value="male">Male</option>
										<option <?= get_select('gender', 'female') ?> value="female">Female</option>
									</select>

									<select class="my-2 form-control" name="rank">
										<option <?= get_select('rank', $row->ranks) ?> value="<?= $row->ranks ?>"><?= ucwords($row->ranks) ?></option>
										<option <?= get_select('rank', 'student') ?> value="student">Student</option>
										<option <?= get_select('rank', 'reception') ?> value="reception">Reception</option>
										<option <?= get_select('rank', 'lecturer') ?> value="lecturer">Lecturer</option>
										<option <?= get_select('rank', 'admin') ?> value="admin">Admin</option>

										<?php if (Auth::getRank() == 'super_admin'): ?>
											<option <?= get_select('rank', 'super_admin') ?> value="super_admin">Super Admin</option>
										<?php endif; ?>

									</select>

									<input class="my-2 form-control" value="<?= get_var('password') ?>" type="text" name="password" placeholder="Password">
									<input class="my-2 form-control" value="<?= get_var('password2') ?>" type="text" name="password2" placeholder="Retype Password">

									<br>
									<button class="btn btn-primary float-end">Save Changes</button>

									<a href="<?= ROOT ?>/profile/<?= $row->user_id ?>">
										<button type="button" class="btn btn-danger">Back to profile</button>
									</a>
								</div>
							</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		<?php else: ?>
			<center>
				<h2>This profile was not found at the moment</h2>
			</center>
		<?php endif; ?>
		<!-- Footer -->
		<script>
			function display_image_name(file_name) {
				document.querySelector(".file_info").innerHTML = '<b>Selected file:</b><br>' + file_name;
			}
		</script>

		<?php $this->view('includes/footer') ?>

		<!-- /Footer -->

	</div>
	<!-- /Main Wrapper -->

	<!-- jQuery -->

	<?php $this->view('includes/js') ?>
</body>

</html>