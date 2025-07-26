 <!-- <div class="page-title d-flex align-items-center justify-content-between">
     <h5 class="fw-bold">All Tests</h5>
     <div>
         <?php if (Auth::access('lecturer')): ?>
             <a href="<?= ROOT ?>/single_class/testadd/<?= $test_row->class_id ?>?tab=test-add" class="btn btn-secondary d-flex align-items-center">
                 <i class="isax isax-add-circle me-1"></i>Add Test
             </a>
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
 </div> -->
 <div class="table-responsive custom-table">
     <table class="table">
         <!-- <pre><?php print_r($_SESSION['USER']); ?></pre> -->
         <!-- <p>Current School: <?= Auth::getschool_name() ?></p> -->
         <thead class="thead-light">
             <tr>
                 <th></th>
                 <th>Test Name</th>
                 <th>Student</th>
                 <th>Data Submitted</th>
                 <th>Answered</th>
                 <!-- <th>Take Test</th>
                 <th>Completed</th> -->
                 <!-- <th></th> -->
             </tr>
         </thead>
         <tbody>
             <?php if (isset($test_rows) && $test_rows): ?>

                 <?php foreach ($test_rows as $test_row): ?>
                     <?php if (!$test_row || !is_object($test_row)) continue; ?>
                     <tr>
                         <td>
                             <?php if (Auth::access('lecturer')): ?>
                                 <div class="d-flex align-items-center">
                                     <a href="<?= ROOT ?>mark_test/<?=$test_row->test_id?>/<?=$test_row->user->user_id?>" class="d-inline-flex fs-14 me-1 action-icon">
                                         <button class="btn btn-sm btn-primary">Mark<i class="isax isax-arrow-right-1"></i></button>
                                     </a>
                                 </div>
                             <?php endif; ?>
                         </td>
                         <td>
                             <div>
                                 <h6 class="mb-1">
                                     <!-- <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_assignment">
                                         <?= $row->test ?>
                                     </a> -->
                                 </h6>
                                 <h6><?= $test_row->test_details->test ?></h6>
                             </div>
                         </td>
                         <td>
                             <h6> <?= $test_row->user->first_name ?? 'Unknown' ?> <?= $test_row->user->last_name ?? '' ?> </h6>
                         </td>
                         <td>

                             <span class="badge badge-sm bg-success d-inline-flex align-items-center me-1">
                                 <i class="fa-solid fa-circle fs-5 me-1"></i>
                                 <?= get_date($test_row->submitted_date) ?>
                             </span>
                         </td>

                         <td>

                             <?php
                                $percentage = get_answer_percentage($test_row->test_id, $test_row->user_id);
                                ?>
                             <?= $percentage ?>%
                         </td>

                         
                     </tr>
                 <?php endforeach; ?>
             <?php else: ?>
                 <tr>
                     <td colspan="6">
                         <center>No Test Found at the moment</center>
                     </td>
                 </tr>
             <?php endif; ?>
         </tbody>

     </table>
     <!-- <div class="row align-items-center">
            <div class="col-md-2">
                <p class="pagination-text">Page 1 of 2</p>
            </div>
            <?php $pager->display() ?>
        </div> -->