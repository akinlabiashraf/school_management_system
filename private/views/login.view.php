<!DOCTYPE html>
<html lang="en">

<?php $this->View('includes/header'); ?>

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
                                    <img src="assets/img/auth/auth-1.svg" class="img-fluid" alt="Logo">
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
                                    <img src="assets/img/auth/auth-1.svg" class="img-fluid" alt="Logo">
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
                                    <img src="assets/img/auth/auth-1.svg" class="img-fluid" alt="Logo">
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
                                    <img src="assets/img/logo.svg" class="img-fluid" alt="Logo">
                                    <a href="#" class="link-1">Back to Home</a>
                                </div>
                                <h1 class="fs-32 fw-bold topic">Sign into Your Account</h1>
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
                                        <label class="form-label">Email<span class="text-danger ms-1">*</span></label>
                                        <div class="position-relative">
                                            <input type="email" class="form-control form-control-lg" name="email" value="<?= get_var('email') ?>" autofocus>
                                            <span><i class="isax isax-sms input-icon text-gray-7 fs-14"></i></span>
                                        </div>
                                    </div>
                                    <div class="mb-3 position-relative">
                                        <label class="form-label">Password <span class="text-danger ms-1">*</span></label>
                                        <div class="position-relative" id="passwordInput">
                                            <input type="password" class="pass-inputs form-control form-control-lg" name="password" value="<?= get_var('password') ?>">
                                            <span class="isax toggle-passwords isax-eye-slash fs-14"></span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <div class="remember-me d-flex align-items-center">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label ms-2" for="flexCheckDefault">
                                                Remember Me
                                            </label>
                                        </div>
                                        <div class="">
                                            <a href="forgot-password.html" class="link-2">
                                                Forgot Password ?
                                            </a>
                                        </div>
                                    </div>
                                    <div class="d-grid">
                                        <button class="btn btn-secondary btn-lg" type="submit">Login <i class="isax isax-arrow-right-3 ms-1"></i></button>
                                    </div>
                                </form>

                                <div class="d-flex align-items-center justify-content-center or fs-14 mb-3">
                                    Or
                                </div>

                                <div class="d-flex align-items-center justify-content-center mb-3">
                                    <a href="javascript:void(0);" class="btn btn-light me-2"><img src="assets/img/icons/google.svg" alt="img" class="me-2">Google</a>
                                    <a href="javascript:void(0);" class="btn btn-light"><img src="assets/img/icons/facebook.svg" alt="img" class="me-2">Facebook</a>
                                </div>

                                <!-- <div class="fs-14 fw-normal d-flex align-items-center justify-content-center">
                                    Don't you have an account?<a href="register" class="link-2 ms-1"> Sign up</a>
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
    <!-- jQuery -->
    <script src="assets/js/jquery-3.7.1.min.js" type="e4219b1d41068e42482cfbd9-text/javascript"></script>

    <!-- Bootstrap Core JS -->
    <script src="assets/js/bootstrap.bundle.min.js" type="e4219b1d41068e42482cfbd9-text/javascript"></script>

    <!-- Select2 JS -->
    <script src="assets/plugins/select2/js/select2.min.js" type="e4219b1d41068e42482cfbd9-text/javascript"></script>

    <!-- Slick Slider -->
    <script src="assets/plugins/slick/slick.js" type="e4219b1d41068e42482cfbd9-text/javascript"></script>

    <!-- Validation-->
    <script src="assets/js/validation.js" type="e4219b1d41068e42482cfbd9-text/javascript"></script>

    <!-- Custom JS -->
    <script src="assets/js/script.js" type="e4219b1d41068e42482cfbd9-text/javascript"></script>

    <script src="../../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="e4219b1d41068e42482cfbd9-|49" defer></script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"93f10a1c0d122ba9","version":"2025.4.0-1-g37f21b1","serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"token":"3ca157e612a14eccbb30cf6db6691c29","b":1}' crossorigin="anonymous"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>