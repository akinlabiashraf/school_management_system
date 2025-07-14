<!DOCTYPE html>
<html lang="en">

<?php $this->View('includes/header'); ?>

<?php
// print_r($errors)
?>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <div class="login-content">
            <div class="row">
                <!-- Login Banner -->
                <div class="col-md-6 login-bg d-none d-lg-flex">
                    <div class="login-carousel">
                        <div>
                            <div class="login-carousel-section mb-3">
                                <div class="login-banner">
                                    <img src="<?= ROOT ?>assets/img/auth/auth-1.svg" class="img-fluid" alt="Logo">
                                </div>
                                <div class="mentor-course text-center">
                                    <h3 class="mb-2">Welcome to <br>Cortia<span class="text-secondary">School Management</span> System.</h3>
                                    <p>Platform designed to help organizations, educators, and learners manage, deliver, and track learning and training activities.</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="login-carousel-section mb-3">
                                <div class="login-banner">
                                    <img src="<?= ROOT ?>assets/img/auth/auth-1.svg" class="img-fluid" alt="Logo">
                                </div>
                                <div class="mentor-course text-center">
                                    <h3 class="mb-2">Welcome to <br>Cortia<span class="text-secondary">LMS</span> Courses.</h3>
                                    <p>Platform designed to help organizations, educators, and learners manage, deliver, and track learning and training activities.</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="login-carousel-section mb-3">
                                <div class="login-banner">
                                    <img src="<?= ROOT ?>assets/img/auth/auth-1.svg" class="img-fluid" alt="Logo">
                                </div>
                                <div class="mentor-course text-center">
                                    <h3 class="mb-2">Welcome to <br>Cortia<span class="text-secondary">LMS</span> Courses.</h3>
                                    <p>Platform designed to help organizations, educators, and learners manage, deliver, and track learning and training activities.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Login Banner -->

                <div class="col-md-12 col-lg-6 login-wrap-bg">
                    <!-- Login -->
                    <div class="login-wrapper">
                        <div class="loginbox">
                            <div class="w-100">
                                <div class="d-flex align-items-center justify-content-between login-header">
                                    <img src="<?= ROOT ?>assets/img/logo.svg" class="img-fluid" alt="Logo">
                                    <a href="index-2.html" class="link-1">Back to Home</a>
                                </div>
                                <?php if ($mode == 'students'): ?>
                                    <h1 class="fs-32 fw-bold topic">Add Student</h1>
                                <?php else: ?>
                                    <h1 class="fs-32 fw-bold topic">Add Staff</h1>
                                <?php endif; ?>
                                <?php if (count($errors) > 0): ?>
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>Errors</strong>
                                        <?php foreach ($errors as $error): ?>
                                            <br><?= $error ?>
                                        <?php endforeach; ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="position: absolute; top: 0.5rem; right: 1rem;">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php endif; ?>
                                <form action="#" method="POST" class="mb-3 pb-3">
                                    <div class="mb-3 position-relative">
                                        <label class="form-label">First Name<span class="text-danger ms-1">*</span></label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control form-control-lg" name="first_name" value="<?= get_var('first_name') ?>">
                                            <span><i class="isax isax-user input-icon text-gray-7 fs-14"></i></span>
                                        </div>
                                    </div>
                                    <div class="mb-3 position-relative">
                                        <label class="form-label">Last Name<span class="text-danger ms-1">*</span></label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control form-control-lg" name="last_name" value="<?= get_var('last_name') ?>">
                                            <span><i class="isax isax-user input-icon text-gray-7 fs-14"></i></span>
                                        </div>
                                    </div>
                                    <div class="mb-3 position-relative">
                                        <label class="form-label">Email<span class="text-danger ms-1">*</span></label>
                                        <div class="position-relative">
                                            <input type="email" class="form-control form-control-lg" name="email" value="<?= get_var('email') ?>">
                                            <span><i class="isax isax-sms input-icon text-gray-7 fs-14"></i></span>
                                        </div>
                                    </div>
                                    <div class="mb-3 position-relative">
                                        <label class="form-label">Gender<span class="text-danger ms-1">*</span></label>
                                        <div class="position-relative">
                                            <select name="gender" id="" class="form-control form-control-lg">
                                                <option<?= get_select('gender', '') ?> value="">-- Select Gender --</option>
                                                    <option<?= get_select('gender', 'male') ?> value="male">Male</option>
                                                        <option<?= get_select('gender', 'female') ?> value="female">Female</option>
                                            </select>
                                            <span><i class="isax isax-user input-icon text-gray-7 fs-14"></i></span>
                                        </div>
                                    </div>

                                    <div class="mb-3 position-relative">
                                        <label class="form-label">Rank<span class="text-danger ms-1">*</span></label>
                                        <?php if ($mode == 'students'): ?>
                                            <input type="hidden" value="student" name="ranks" class="form-control form-control-lg">
                                            <input disabled type="text" value="student" class="form-control form-control-lg">
                                        <?php else: ?>
                                            <div class="position-relative">
                                                <select name="ranks" id="" class="form-control form-control-lg">
                                                    <option <?= get_select('ranks', '') ?> value="">-- Select Rank --</option>
                                                    <option <?= get_select('ranks', 'reception') ?> value="reception">Reception</option>
                                                    <option <?= get_select('ranks', 'student') ?> value="student">Student</option>
                                                    <option <?= get_select('ranks', 'lecturer') ?> value="lecturer">Lecturer</option>
                                                    <option <?= get_select('ranks', 'admin') ?> value="admin">Admin</option>
                                                    <?php if (Auth::getranks() == 'super_admin'): ?>
                                                        <option <?= get_select('rank', 'super_admin') ?> value="super_admin">Super Admin</option>
                                                    <?php endif; ?>
                                                </select>
                                                <span><i class="isax isax-medal input-icon text-gray-7 fs-14"></i></span>
                                            </div>
                                    </div>
                                <?php endif; ?>
                                <div class="mb-3 position-relative">
                                    <label class="form-label">New Password <span class="text-danger"> *</span></label>
                                    <div class="position-relative" id="passwordInput">
                                        <input type="password" class="pass-inputs form-control form-control-lg" name="password" value="<?= get_var('password') ?>">
                                        <span class="isax toggle-passwords isax-eye-slash text-gray-7 fs-14"></span>
                                    </div>
                                    <div class="password-strength" id="passwordStrength">
                                        <span id="poor"></span>
                                        <span id="weak"></span>
                                        <span id="strong"></span>
                                        <span id="heavy"></span>
                                    </div>
                                    <div class="mt-2" id="passwordInfo"></div>
                                </div>
                                <div class="mb-3 position-relative">
                                    <label class="form-label">Confirm Password <span class="text-danger"> *</span></label>
                                    <div class="position-relative">
                                        <input type="password" class="pass-inputa form-control form-control-lg" name="confirm_password" value="<?= get_var('confirm_password') ?>">
                                        <span class="isax toggle-passworda isax-eye-slash text-gray-7 fs-14"></span>
                                    </div>
                                </div>
                                <!-- <div class="d-flex align-items-center justify-content-between mb-4">
                                        <div class="remember-me d-flex align-items-center">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label mb-0 d-inline-flex remember-me fs-14" for="flexCheckDefault">
                                                I agree with <a href="javascript:void(0);" class="link-2 mx-2">Terms of Service</a> and <a href="javascript:void(0);" class="link-2 mx-2">Privacy Policy</a>
                                            </label>
                                        </div>
                                    </div> -->
                                <div class="d-grid">
                                    <?php if ($mode == 'students'): ?>
                                        <button class="btn btn-primary btn-lg" type="submit"  onclick="this.disabled=true; this.form.submit();">Add Student <i class="isax isax-arrow-right-3 ms-1"></i></button><br>
                                        <a href="<?= ROOT ?>students">
                                            <button class="btn btn-secondary btn-lg" type="button">Cancel <i class="isax isax-arrow-right-3 ms-1"></i></button>
                                        </a>
                                    <?php else: ?>
                                        <button class="btn btn-primary btn-lg" type="submit"  onclick="this.disabled=true; this.form.submit();">Add User <i class="isax isax-arrow-right-3 ms-1"></i></button><br>
                                        <a href="<?= ROOT ?>users">
                                            <button class="btn btn-secondary btn-lg" type="button">Cancel <i class="isax isax-arrow-right-3 ms-1"></i></button>
                                        </a>
                                    <?php endif; ?>
                                </div>
                                </form>

                                <div class="d-flex align-items-center justify-content-center or fs-14 mb-3">
                                    Or
                                </div>

                                <div class="d-flex align-items-center justify-content-center mb-3">
                                    <a href="javascript:void(0);" class="btn btn-light me-2"><img src="<?= ROOT ?>assets/img/icons/google.svg" alt="img" class="me-2">Google</a>
                                    <a href="javascript:void(0);" class="btn btn-light"><img src="<?= ROOT ?>assets/img/icons/facebook.svg" alt="img" class="me-2">Facebook</a>
                                </div>

                                <!-- <div class="fs-14 fw-normal d-flex align-items-center justify-content-center">
                                    Already you have an account?<a href="login.html" class="link-2 ms-1"> Login</a>
                                </div> -->

                                <!-- /Login -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <?php $this->view('includes/js') ?>
</body>

</html>