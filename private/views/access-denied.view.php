<?php $this->view('includes/header') ?>
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
               <h2 class="breadcrumb-title mb-2 text-danger">Unauthorized User you be</h2>
               <!-- <?php $this->view('includes/crumbs', ['crumbs' => $crumbs]) ?> -->
            </div>
         </div>
      </div>
   </div>
   <!-- /Breadcrumb --> <br>
   <center class="alert-danger bg-danger">
      <h1>Access Denied!!</h1>
      <h5>Magomago You dont have the right privilege to access this content</h5>
      <br>
   </center>
</div><br>


<?php $this->view('includes/footer') ?>