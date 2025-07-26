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
                        <h2 class="breadcrumb-title mb-2">Mark Test</h2>
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
                        <div class="page-title d-flex align-items-center justify-content-between">
                            <h5 class="fw-bold">Mark Test</h5>
                            <div>
                                <?php if (Auth::access('lecturer') && !empty($test_rows) && isset($test_rows[0]->class_id)): ?>
                                    <a href="<?= ROOT ?>/single_class/testadd/<?= $test_rows[0]->class_id ?>?tab=test-add" class="btn btn-secondary d-flex align-items-center">
                                        <i class="isax isax-add-circle me-1"></i> Add Test
                                    </a>
                                <?php endif; ?>



                                <?php if (Auth::access('lecturer')): ?>
                                    <!-- <a href="<?= ROOT ?>/single_class/testadd/<?= $test_row->class_id ?>?tab=test-add" class="btn btn-secondary d-flex align-items-center">
                             <i class="isax isax-add-circle me-1"></i>Add Test
                         </a> -->
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <div class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle text-gray-6 btn  rounded border d-inline-flex align-items-center" data-bs-toggle="dropdown" aria-expanded="false">
                                            Order
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end p-3">
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1">Secondary</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item rounded-1">Instituition</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <form action="">
                                    <div class="input-icon mb-3">
                                        <span class="input-icon-addon">
                                            <i class="isax isax-search-normal-14"></i>
                                        </span>
                                        <input name="find" value="<?= isset($_GET['find']) ? $_GET['find'] : ''; ?>" type="text" class="form-control form-control-md" placeholder="Search">
                                    </div>
                                    <button class="input-group-text" id="basic-addon1" style="display: none;"><i class="fa fa-search"></i> Find</button>
                                </form>
                            </div>
                        </div>
                        <?php include(views_path('to-mark')) ?>
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