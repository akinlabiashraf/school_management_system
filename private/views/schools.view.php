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
                        <h2 class="breadcrumb-title mb-2">All Schools</h2>
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
                                    <p class="text-light"><?= ucfirst(Auth::getranks()) ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center flex-wrap gap-3 justify-content-md-end">
                                <a href="schools/add" class="btn btn-white rounded-pill">Add New School</a>
                                <a href="student-dashboard.html" class="btn btn-secondary rounded-pill">Super Admin Dashboard</a>
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
                            <h5 class="fw-bold">All Schools</h5>
                            <div>
                                <a href="schools/add" class="btn btn-secondary d-flex align-items-center">
                                    <i class="isax isax-add-circle me-1"></i>Add School
                                </a>
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
                                <div class="input-icon mb-3">
                                    <span class="input-icon-addon">
                                        <i class="isax isax-search-normal-14"></i>
                                    </span>
                                    <input type="email" class="form-control form-control-md" placeholder="Search">
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive custom-table">
                            <table class="table">
                                <!-- <pre><?php print_r($_SESSION['USER']); ?></pre> -->
                                <p>Current School: <?= Auth::getschool_name() ?></p>
                                <thead class="thead-light">
                                    <tr>
                                        <th></th>
                                        <th>School Name</th>
                                        <th>Created By</th>
                                        <th>School ID</th>
                                        <th>Date Created</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($rows): ?>
                                        <!-- <?php echo "<pre>";
                                                print_r($rows) ?> -->
                                        <?php foreach ($rows as $row): ?>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="#" class="d-inline-flex fs-14 me-1 action-icon">
                                                            <i class="isax isax-backward" data-bs-toggle="modal" data-bs-target="#edit_assignment"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <h6 class="mb-1">
                                                            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_assignment">
                                                                <?= $row->school ?>
                                                            </a>
                                                        </h6>
                                                        <p><?= $row->school_description ?></p>
                                                    </div>
                                                </td>
                                                <td><?= $row->user->first_name ?> <?= $row->user->last_name ?></td>
                                                <td><?= $row->school_id ?></td>
                                                <td>
                                                    <span class="badge badge-sm bg-success d-inline-flex align-items-center me-1">
                                                        <i class="fa-solid fa-circle fs-5 me-1"></i><?= date("d M Y h:i A", strtotime($row->date)) ?>

                                                    </span>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="schools/edit/<?= $row->id ?>" class="d-inline-flex fs-14 me-1 action-icon">
                                                            <i class="isax isax-edit-2" data-bs-toggle="modal" data-bs-target="#edit_assignment"></i>
                                                        </a>
                                                        <!-- NONE MODALL CONFIRMATION -->
                                                        <a href="schools/delete/<?= $row->id ?>" class="d-inline-flex fs-14 action-icon">
                                                            <i class="isax isax-trash"></i>
                                                        </a>
                                                        <a href="<?= ROOT ?>switch_school/<?= $row->id ?>" class="d-inline-flex fs-14 action-icon">
                                                            <i class="isax isax-forward"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <h4>No School Found at the moment</h4>
                                    <?php endif; ?>

                                </tbody>
                            </table>
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