 <div class="page-title d-flex align-items-center justify-content-between">
     <h5 class="fw-bold">All Classes</h5>
     <div>
         <?php if (Auth::access('lecturer')): ?>
             <a href="<?= ROOT ?>/classes/add" class="btn btn-secondary d-flex align-items-center">
                 <i class="isax isax-add-circle me-1"></i>Add Class
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
 </div>
 <div class="table-responsive custom-table">
     <table class="table">
         <!-- <pre><?php print_r($_SESSION['USER']); ?></pre> -->
         <!-- <p>Current School: <?= Auth::getschool_name() ?></p> -->
         <thead class="thead-light">
             <tr>
                 <th></th>
                 <th>Class Name</th>
                 <th>Created By</th>
                 <th>Class ID</th>
                 <th>Date Created</th>
                 <th></th>
             </tr>
         </thead>
         <tbody>
             <?php if (isset($rows) && $rows): ?>
                 <!-- <pre><?php print_r($row); ?></pre> -->
                 <?php foreach ($rows as $row): ?>
                     <tr>
                         <td>
                             <div class="d-flex align-items-center">
                                 <a href="<?= ROOT ?>single_class/<?= $row->class_id ?>" class="d-inline-flex fs-14 me-1 action-icon">
                                     <i class="fa fa-chevron-right" data-bs-toggle="modal" data-bs-target="#edit_assignment"></i>
                                 </a>
                             </div>
                         </td>
                         <td>
                             <div>
                                 <h6 class="mb-1">
                                     <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_assignment">
                                         <?= $row->class ?>
                                     </a>
                                 </h6>
                                 <p><?= $row->class_description ?></p>
                             </div>
                         </td>
                         <td><?= $row->user->first_name ?> <?= $row->user->last_name ?></td>
                         <td><?= $row->class_id ?></td>
                         <td>
                             <span class="badge badge-sm bg-success d-inline-flex align-items-center me-1">
                                 <i class="fa-solid fa-circle fs-5 me-1"></i><?= date("d M Y h:i A", strtotime($row->date)) ?>

                             </span>
                         </td>
                         <td>
                             <div class="d-flex align-items-center">
                                 <?php if (Auth::access('lecturer')): ?>
                                     <a href="classes/edit/<?= $row->id ?>" class="d-inline-flex fs-14 me-1 action-icon">
                                         <i class="isax isax-edit-2" data-bs-toggle="modal" data-bs-target="#edit_assignment"></i>
                                     </a>
                                     <!-- NONE MODALL CONFIRMATION -->
                                     <a href="classes/delete/<?= $row->id ?>" class="d-inline-flex fs-14 action-icon">
                                         <i class="isax isax-trash"></i>
                                     </a>
                                 <?php endif; ?>
                             </div>
                         </td>
                     </tr>
                 <?php endforeach; ?>
             <?php else: ?>
                 <tr><td colspan="5"><center>No Class Found at the moment</center></td></tr>
             <?php endif; ?>

         </tbody>
     </table>
     <!-- <div class="row align-items-center">
                            <div class="col-md-2">
                                <p class="pagination-text">Page 1 of 2</p>
                            </div>
                            <?php $pager->display() ?>
                        </div> -->