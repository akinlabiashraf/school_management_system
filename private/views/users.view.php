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
                        <h2 class="breadcrumb-title mb-2">Staffs</h2>
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
                                    <img src="<?= (isset($gender) && strtolower($gender) == 'male') ? 'assets/img/user/user-02.jpg' : 'assets/img/user/user-1.png' ?>" alt="img">
                                    <span class="verify-tick"><i class="isax isax-verify5"></i></span>
                                </span>
                                <div>
                                    <h5 class="mb-1 text-white d-inline-flex align-items-center"><?= Auth::getfirst_name() . " " . Auth::getlast_name() ?><a href="instructor-profile.html" class="link-light fs-16 ms-2"><i class="isax isax-edit-2"></i></a></h5>
                                    <p class="text-light"><?= ucfirst(Auth::getranks()) ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center flex-wrap gap-3 justify-content-md-end">
                                <a href="<?= ROOT ?>register/" class="btn btn-white rounded-pill">Add New Staff</a>
                                <a href="#" class="btn btn-secondary rounded-pill">Super Admin Dashboard</a>
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
                            <h5 class="fw-bold">All Users</h5>
                            <div class="d-flex align-items-center list-icons">
                                <a href="#" class="me-2"><i class="isax isax-task"></i></a>
                                <a href="#" class="active"><i class="isax isax-element-3"></i></a>

                            </div>
                        </div>
                        <div class="row justify-content-end">
                             <div class="col-md-4">
                                <form action="">
                                    <div class="input-icon mb-3">
                                        <span class="input-icon-addon">
                                            <i class="isax isax-search-normal-14"></i>
                                        </span>
                                        <input name="find" value="<?=isset($_GET['find'])?$_GET['find']:'';?>" type="text" class="form-control form-control-md" placeholder="Search">
                                    </div>
                                    <button class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i> Find</button>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <?php if ($rows): ?>
                                <?php foreach ($rows as $row): ?>
                                    <!-- included user card here to display staffs -->

                                    <?php include(views_path('user'))?>
                                    
                                <?php endforeach ?>
                            <?php else: ?>
                                <h4>No Staff Data Found At The Moment</h4>
                            <?php endif; ?>

                        </div>
                        <!-- /pagination -->
                        <div class="row align-items-center">
                            <div class="col-md-2">
                                <p class="pagination-text">Page 1 of 2</p>
                            </div>
                            <?php $pager->display() ?>
                        </div>
                        <!-- /pagination -->

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