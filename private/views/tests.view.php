<!DOCTYPE html>
<html lang="en">

<?php $this->view('includes/header') ?>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <!-- Header Topbar-->
        <?php $this->view('includes/header2') ?>
        <!-- /Header Topbar-->

        <!-- Header -->
        <?php $this->view('includes/header_nav') ?>
        <!-- /Header -->

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
                                <?php if (Auth::access('lecturer')): ?>
                                    <a href="classes/add" class="btn btn-white rounded-pill">Add New Test</a>
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
                        <?php include(views_path('tests')) ?>
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