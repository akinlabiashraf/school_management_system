<nav class="navbar navbar-light bg-light">
	<form class="form-inline">
		<div class="input-group">
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i>&nbsp</span>
			</div>
			<input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1">
		</div>
	</form>
	<a href="<?= ROOT ?>/single_class/testadd/<?= $row->class_id ?>?tab=test-add">
		<button class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>Add New Test</button>
	</a>
</nav><br>
<!-- <div class="page-title d-flex align-items-center justify-content-between">
	<h5 class="fw-bold">All Tests</h5>
	<div>
		<?php if (Auth::access('lecturer')): ?>
			<a href="<?=ROOT?>/single_class/testadd/<?=$row->class_id?>?tab=test-add" class="btn btn-secondary d-flex align-items-center">
				<i class="isax isax-add-circle me-1"></i>Add Test
			</a>
		<?php endif; ?>
	</div>
</div> -->
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
				<th>Test Name</th>
				<th>Created By</th>
				<th>Date Created</th>
				<th>Active</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php if (isset($tests) && $tests): ?>
				<!-- <pre><?php print_r($row); ?></pre> -->
				<?php foreach ($tests as $row): ?>
					<tr>
						<td>
							<div class="d-flex align-items-center">
								<a href="<?=ROOT?>/single_test/<?=$row->test_id?>" class="d-inline-flex fs-14 me-1 action-icon">
									<i class="fa fa-chevron-right" data-bs-toggle="modal" data-bs-target="#edit_assignment"></i>
								</a>
							</div>
						</td>
						<td>
							<div>
								<h6 class="mb-1">
									<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_assignment">
										<?= $row->test ?>
									</a>
								</h6>
								<p><?= $row->description ?></p>
							</div>
						</td>
						<td><?= $row->user->first_name ?> <?= $row->user->last_name ?></td>

						<td><?= date("d M Y h:i A", strtotime($row->date)) ?></td>
						<td>
							<?php
							$isEnabled = $row->disabled == 1;

							// Set appropriate class and label
							$badgeClass = $isEnabled ? 'bg-success' : 'bg-danger';
							$badgeText = $isEnabled ? 'Yes' : 'No';
							?>

							<span class="badge badge-sm <?= $badgeClass ?> d-inline-flex align-items-center me-1">
								<i class="fa-solid fa-circle fs-5 me-1"></i>
								<?= $badgeText ?>
							</span>

						</td>
						<td>
							<div class="d-flex align-items-center">
								<?php if (Auth::access('lecturer')): ?>
									<a href="<?=ROOT?>/single_class/testedit/<?=$row->class_id?>/<?=$row->test_id?>?tab=tests" class="d-inline-flex fs-14 me-1 action-icon">
										<i class="isax isax-edit-2" data-bs-toggle="modal" data-bs-target="#edit_assignment"></i>
									</a>
									<!-- NONE MODALL CONFIRMATION -->
									<a href="<?=ROOT?>/single_class/testdelete/<?=$row->class_id?>/<?=$row->test_id?>?tab=tests" class="d-inline-flex fs-14 action-icon">
										<i class="isax isax-trash"></i>
									</a>
								<?php endif; ?>
							</div>
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