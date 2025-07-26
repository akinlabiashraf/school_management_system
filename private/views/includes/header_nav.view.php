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
                    <a class="logo-white header-logo" href="#">
                        <img src="<?= ROOT ?>assets/img/logo.svg" class="logo" alt="Logo">
                    </a>
                    <a class="logo-dark header-logo" href="#">
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
                        <a href="<?= ROOT ?>home">Current School: <?= Auth::getschool_name() ?></a> <i class=""></i>
                    </li>
                    <li class="has-submenu megamenu <?= ($this->controller_name() == 'Home') ? ' active ' : '' ?> ">
                        <a href="<?= ROOT ?>home">DASHBOARD <i class=""></i></a>
                    </li>
                    <?php if (Auth::access('admin')): ?>
                        <li class="has-submenu <?= ($this->controller_name() == 'Users') ? ' active ' : '' ?>">
                            <a href="<?= ROOT ?>users">STAFFS <i class=""></i></a>
                        </li>
                    <?php endif ?>
                    <?php if (Auth::access('reception')): ?>
                        <li class="has-submenu <?= ($this->controller_name() == 'Students') ? ' active ' : '' ?>">
                            <a href="<?= ROOT ?>students">STUDENTS <i class=""></i></a>
                        </li>
                    <?php endif; ?>
                    <?php if (Auth::access('super_admin')): ?>
                        <li class="has-submenu <?= ($this->controller_name() == 'Schools') ? ' active ' : '' ?>">
                            <a href="<?= ROOT ?>schools">SCHOOLS <i class=""></i></a>
                        </li>
                    <?php endif; ?>

                    <li class="has-submenu <?= ($this->controller_name() == 'Classes') ? ' active ' : '' ?>">
                        <a href="<?= ROOT ?>classes">CLASSES <i class=""></i></a>
                    </li>

                    <li class="has-submenu <?= ($this->controller_name() == 'Tests') ? ' active ' : '' ?>">
                        <a href="<?= ROOT ?>tests">TEST <i class=""></i></a>
                    </li>
                    <?php
                    if (Auth::access('lecturer')): ?>
                        <li class="has-submenu">
                            <a class="nav-link <?= ($this->controller_name() == 'To_mark') ? ' active ' : '' ?> " href="<?= ROOT ?>to_mark">PENDING<i class=""></i>
                                <?php
                                $to_mark_count = (new Tests_model())->get_to_mark_count();
                                ?>
                                <?php if ($to_mark_count): ?>
                                    <span class="badge bg-danger text-white" style="position: absolute;top:0px;right:0px"><?= $to_mark_count ?></span>
                                <?php endif; ?>
                            </a>
                        </li>
                        <li class="has-submenu">
                            <a class="nav-link <?= ($this->controller_name() == 'Marked') ? ' active ' : '' ?> " href="<?= ROOT ?>marked_test">MARKED<i class=""></i></a>
                        </li>
                    <?php endif; ?>

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
                                <a class="dropdown-item d-inline-flex align-items-center rounded fw-medium" href="<?= ROOT ?>profile"><i class="isax isax-security-user me-2"></i>My Profile</a>
                            </li>
                            <li>
                                <a class="dropdown-item d-inline-flex align-items-center rounded fw-medium" href="#"><i class="isax isax-teacher me-2"></i>Courses</a>
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
                            <a class="dropdown-item d-inline-flex align-items-center rounded fw-medium" href="<?= ROOT ?>Logout"><i class="isax isax-logout me-2"></i>Logout</a>
                            <a href="<?= ROOT ?>Logout" class="btn btn-secondary d-inline-flex align-items-center justify-content-center w-100"><i class="isax isax-logout me-2"></i>Logout</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        
        <form class="form-inline">
        <div class="input-group">

          <?php $years = get_years()?>
          <select name="school_year" class="form-select" style="max-width:100px">
            <option><?=get_var('school_year',!empty($_SESSION['SCHOOL_YEAR']->year) ? $_SESSION['SCHOOL_YEAR']->year : date("Y",time()),"get")?></option>
            <?php foreach ($years as $year): ?>
              <option><?=$year?></option>
            <?php endforeach ?>
           </select>
           
          <div class="input-group-prepend">
            <button class="input-group-text" id="basic-addon1">&nbsp<i class="fa fa-chevron-right"></i></button>
          </div>
        </div>
      </form>
    </div>
</header>