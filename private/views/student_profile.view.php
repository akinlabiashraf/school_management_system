<!DOCTYPE html>
<html lang="en">

<?php $this->view('includes/header') ?>

<body>

	<!-- Main Wrapper -->
	<div class="main-wrapper">

		<!-- Header Topbar-->
		<?php $this-> view('includes/dashboard_nav') ?>
		<!-- /Header -->

		<!-- Breadcrumb -->
		<div class="breadcrumb-bar text-center">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-12">
						<h2 class="breadcrumb-title mb-2">My Profile</h2>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb justify-content-center mb-0">
								<li class="breadcrumb-item"><a href="home">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">My Profile</li>
							</ol>
						</nav>
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
									<img src="assets/img/user/user-02.jpg" alt="img">
									<span class="verify-tick"><i class="isax isax-verify5"></i></span>
								</span>
								<div>
									<h5 class="mb-1 text-white d-inline-flex align-items-center">Maryam Akinlabi<a href="instructor-profile.html" class="link-light fs-16 ms-2"><i class="isax isax-edit-2"></i></a></h5>
									<p class="text-light">Student</p>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="d-flex align-items-center flex-wrap gap-3 justify-content-md-end">
								<a href="add-course.html" class="btn btn-white rounded-pill">Add New Course</a>
								<a href="student-dashboard.html" class="btn btn-secondary rounded-pill">Student Dashboard</a>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<!-- Sidebar -->
					<?php $this-> view('includes/student_sidenav') ?>
					<!-- /Sidebar -->
					<div class="col-lg-9">
						<div class="page-title d-flex align-items-center justify-content-between">
							<h5 class="fw-bold">My Profile</h5>
							<a href="#" class="edit-profile-icon"><i class="isax isax-edit-2"></i></a>
						</div>
						<div class="card">
							<div class="card-body">
								<h5 class="fs-18 pb-3 border-bottom mb-3">Basic Information</h5>
								<div class="row">
									<div class="col-md-4">
										<div class="mb-3">
											<h6>First Name</h6>
											<span>Mustofiyyah</span>
										</div>
									</div>
									<div class="col-md-4">
										<div class="mb-3">
											<h6>Last Name</h6>
											<span>Mikail</span>
										</div>
									</div>
									<div class="col-md-4">
										<div class="mb-3">
											<h6>Registration Date</h6>
											<span>16 Jan 2024, 11:15 AM</span>
										</div>
									</div>
									<div class="col-md-4">
										<div class="mb-3">
											<h6>User Name</h6>
											<span>Enitan</span>
										</div>
									</div>
									<div class="col-md-4">
										<div class="mb-3">
											<h6>Phone Number</h6>
											<span>08023455677</span>
										</div>
									</div>
									<div class="col-md-4">
										<div class="mb-3">
											<h6>Email</h6>
											<span><a href="#" class="__cf_email__" data-cfemail="7910170a0d0b0c1a0d160b1d1c1416391c01181409151c571a1614">Example@gmail.com</a></span>
										</div>
									</div>
									<div class="col-md-4">
										<div class="mb-3">
											<h6>Gender</h6>
											<span>Male</span>
										</div>
									</div>
									<div class="col-md-4">
										<div class="mb-3">
											<h6>DOB</h6>
											<span>16 Jan 2020</span>
										</div>
									</div>
									<div class="col-md-4">
										<div class="mb-3">
											<h6>Age</h6>
											<span>24</span>
										</div>
									</div>
									<div class="col-md-12">
										<div>
											<h6>Bio</h6>
											<span>I am a web developer with a vast array of knowledge in
												many different front end and back end languages,
												responsive frameworks, databases, and best code practices.
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Footer -->
		<?php $this->view('includes/footer') ?>
		<!-- /Footer -->

	</div>
	<!-- /Main Wrapper -->

	<!-- jQuery -->
	<?php $this->view('includes/js') ?>
</html>