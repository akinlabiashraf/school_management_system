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
        <div class="breadcrumb-bar text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <h2 class="breadcrumb-title mb-2">All Schools</h2>
                        <?php $this->view('includes/crumbs', ['crumbs'=>$crumbs]) ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Breadcrumb -->

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
                                    <img src="<?= ROOT ?>assets/img/user/user-01.jpg" alt="img">
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
                                <a href="add-course.html" class="btn btn-white rounded-pill">Add New School</a>
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
                        <div class="mb-3">
                            <h5>Add New School</h5>
                        </div>
                        <ul class="settings-nav d-flex align-items-center flex-wrap border bg-light-900 rounded">
                            <li><a href="student-settings.html" class="active">Add New School</a></li>
                        </ul>
                        <div class="card">
                            <div class="card-body">
                                <form action="#" method="POST">
                                    <div>
                                        <div class="edit-profile-info mb-3">
                                            <h5 class="mb-1">School Details</h5>
                                            <p>Upload New School Details</p>
                                        </div>
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
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">School Name <span class="text-danger"> *</span></label>
                                                    <input type="text" class="form-control" placeholder="School Name" name="school" value="<?= get_var('school') ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">School Description <span class="text-danger"> *</span></label>
                                                    <select class="form-select" name="category">
                                                        <option value="">-- Select School Description --</option>
                                                        <option value="institution" <?= get_select('category', 'institution') ?>>Institution</option>
                                                        <option value="secondary_school" <?= get_select('category', 'secondary_school') ?>>Secondary School</option>
                                                        <option value="primary_school" <?= get_select('category', 'primary_school') ?>>Primary School</option>
                                                        <option value="college" <?= get_select('category', 'college') ?>>College</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">School Description <span class="text-danger"> *</span></label>
                                                    <textarea class="form-control" name="school_description" rows="4" placeholder="Institution or secondary school"><?= get_var('school') ?></textarea>
                                                </div>
                                            </div>
                                            <!-- Cancel Button -->
                                            <div class="col-12 col-md-6 mb-2 mb-md-0">
                                                <a href="schools" class="d-block">
                                                    <button class="btn btn-secondary rounded-pill w-100" type="button">Cancel</button>
                                                </a>
                                            </div>

                                            <!-- Update Button -->
                                            <div class="col-12 col-md-6">
                                                <a href="#" class="d-block">
                                                    <button class="btn btn-secondary rounded-pill w-100" type="submit">Create School</button>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </form>
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
    <script src="<?= ROOT ?>assets/plugins/select2/js/select2.min.js" type="e4219b1d41068e42482cfbd9-text/javascript"></script>

    <!-- Slick Slider -->
    <script src="<?= ROOT ?>assets/plugins/slick/slick.js" type="e4219b1d41068e42482cfbd9-text/javascript"></script>

    <!-- Validation-->
    <script src="<?= ROOT ?>assets/js/validation.js" type="e4219b1d41068e42482cfbd9-text/javascript"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</html>