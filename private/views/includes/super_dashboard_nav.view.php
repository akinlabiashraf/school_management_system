<!-- Header Topbar-->
<div class="header-topbar text-center">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="d-flex align-items-center justify-content-center justify-content-lg-start">
					<p class="d-flex align-items-center fw-medium fs-14 mb-2 me-3"><i class="isax isax-location5 me-2"></i>1442 Crosswind Drive Madisonville</p>
					<p class="d-flex align-items-center fw-medium fs-14 mb-2"><i class="isax isax-call-calling5 me-2"></i>+1 45887 77874</p>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="d-flex align-items-center justify-content-center justify-content-lg-end">
					<div class="dropdown flag-dropdown mb-2 me-3">
						<a href="javascript:void(0);" class="dropdown-toggle d-inline-flex align-items-center" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="<?= ROOT ?>assets/img/flags/us-flag.svg" class="me-2" alt="flag">ENG
						</a>
						<ul class="dropdown-menu p-2 mt-2">
							<li>
								<a class="dropdown-item rounded d-flex align-items-center" href="javascript:void(0);">
									<img src="<?= ROOT ?>assets/img/flags/us-flag.svg" class="me-2" alt="flag">ENG
								</a>
							</li>
							<li>
								<a class="dropdown-item rounded d-flex align-items-center" href="javascript:void(0);">
									<img src="<?= ROOT ?>assets/img/flags/arab-flag.svg" class="me-2" alt="flag">ARA
								</a>
							</li>
							<li>
								<a class="dropdown-item rounded d-flex align-items-center" href="javascript:void(0);">
									<img src="<?= ROOT ?>assets/img/flags/france-flag.svg" class="me-2" alt="flag">FRE
								</a>
							</li>
						</ul>
					</div>
					<div class="dropdown mb-2 me-3">
						<a href="javascript:void(0);" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
							USD
						</a>
						<ul class="dropdown-menu p-2 mt-2">
							<li><a class="dropdown-item rounded" href="javascript:void(0);">USD</a></li>
							<li><a class="dropdown-item rounded" href="javascript:void(0);">YEN</a></li>
							<li><a class="dropdown-item rounded" href="javascript:void(0);">EURO</a></li>
						</ul>
					</div>
					<ul class="social-icon d-flex align-items-center mb-2">
						<li class="me-2">
							<a href="javascript:void(0);"><i class="fa-brands fa-facebook-f"></i></a>
						</li>
						<li class="me-2">
							<a href="javascript:void(0);"><i class="fa-brands fa-instagram"></i></a>
						</li>
						<li class="me-2">
							<a href="javascript:void(0);"><i class="fa-brands fa-x-twitter"></i></a>
						</li>
						<li class="me-2">
							<a href="javascript:void(0);"><i class="fa-brands fa-youtube"></i></a>
						</li>
						<li>
							<a href="javascript:void(0);"><i class="fa-brands fa-linkedin"></i></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Header Topbar-->

<!-- Header -->
<header class="header-two">
	<div class="container">
		<div class="header-nav">
			<div class="navbar-header">
				<a id="mobile_btn" href="javascript:void(0);">
					<span class="bar-icon">
						<span></span>
						<span></span>
						<span></span>
					</span>
				</a>
				<div class="navbar-logo">
					<a class="logo-white header-logo" href="index-2.html">
						<img src="<?= ROOT ?>assets/img/logo.svg" class="logo" alt="Logo">
					</a>
					<a class="logo-dark header-logo" href="index-2.html">
						<img src="<?= ROOT ?>assets/img/logo-white.svg" class="logo" alt="Logo">
					</a>
				</div>
			</div>
			<div class="main-menu-wrapper">
				<div class="menu-header">
					<a href="index-2.html" class="menu-logo">
						<img src="<?= ROOT ?>assets/img/logo.svg" class="img-fluid" alt="Logo">
					</a>
					<a id="menu_close" class="menu-close" href="javascript:void(0);">
						<i class="fas fa-times"></i>
					</a>
				</div>
				<ul class="main-nav">
					<li class="has-submenu megamenu">
						<a href="student">DASHBOARD <i class=""></i></a>
					</li>
					<li class="has-submenu">
						<a href="#">CLASSES <i class=""></i></a>
					</li>
					<li class="has-submenu">
						<a href="#">STAFF <i class=""></i></a>
					</li>
					<li class="has-submenu">
						<a href="#">STUDENTS <i class=""></i></a>
					</li>
					<li class="has-submenu">
						<a href="#">SCHOOLS <i class=""></i></a>
					</li>
					<li class="has-submenu">
						<a href="users">USERS <i class=""></i></a>
					</li>
					<li class="has-submenu active">
						<a href="">TEST <i class=""></i></a>
					</li>
				</ul>
			</div>
			<div class="header-btn d-flex align-items-center">
				<div class="icon-btn me-2">
					<a href="javascript:void(0);" id="dark-mode-toggle" class="theme-toggle activate">
						<i class="isax isax-sun-15"></i>
					</a>
					<a href="javascript:void(0);" id="light-mode-toggle" class="theme-toggle">
						<i class="isax isax-moon"></i>
					</a>
				</div>
				<div class="icon-btn me-3">
					<a href="cart.html" class="position-relative">
						<i class="isax isax-shopping-cart5"></i>
						<span class="count-icon bg-success p-1 rounded-pill text-white fs-10 fw-bold">1</span>
					</a>
				</div>
				<div class="dropdown profile-dropdown">
					<a href="javascript:void(0);" class="d-flex align-items-center" data-bs-toggle="dropdown">
						<span class="avatar">
							<img src="<?= ROOT ?>assets/img/user/user-01.jpg" alt="Img" class="img-fluid rounded-circle">
						</span>
					</a>
					<div class="dropdown-menu dropdown-menu-end">
						<div class="profile-header d-flex align-items-center">
							<div class="avatar">
								<img src="<?= ROOT ?>assets/img/user/user-01.jpg" alt="Img" class="img-fluid rounded-circle">
							</div>
							<div>
								<h6><?= Auth::getfirst_name() ?></h6>
								<!-- <h6>Enny</h6> -->
								<p><a href="#" class="__cf_email__"><?= Auth::getemail() ?></p>
							</div>
						</div>
						<ul class="profile-body">
							<li>
								<a class="dropdown-item d-inline-flex align-items-center rounded fw-medium" href="student_profile"><i class="isax isax-security-user me-2"></i>My Profile</a>
							</li>
							<li>
								<a class="dropdown-item d-inline-flex align-items-center rounded fw-medium" href="instructor-course.html"><i class="isax isax-teacher me-2"></i>Courses</a>
							</li>
							<!-- <li>
								<a class="dropdown-item d-inline-flex align-items-center rounded fw-medium2" href="instructor-earnings.html"><i class="isax isax-dollar-circle me-2"></i>Earnings</a>
							</li>
							<li>
								<a class="dropdown-item d-inline-flex align-items-center rounded fw-medium" href="instructor-payout.html"><i class="isax isax-coin me-2"></i>Payouts</a>
							</li> -->
							<li>
								<a class="dropdown-item d-inline-flex align-items-center rounded fw-medium" href="instructor-message.html"><i class="isax isax-messages-3 me-2"></i>Messages<span class="message-count">2</span></a>
							</li>
							<li>
								<a class="dropdown-item d-inline-flex align-items-center rounded fw-medium" href="instructor-settings.html"><i class="isax isax-setting-2 me-2"></i>Settings</a>
							</li>
						</ul>
						<div class="profile-footer">
							<a class="dropdown-item d-inline-flex align-items-center rounded fw-medium" href="<?= ROOT ?>logout"><i class="isax isax-logout me-2"></i>Logout</a>
							<a href="<?= ROOT ?>logout" class="btn btn-secondary d-inline-flex align-items-center justify-content-center w-100">
								<i class="isax isax-logout me-2"></i>Logout
							</a>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<!-- /Header -->