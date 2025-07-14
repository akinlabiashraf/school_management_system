<?php
$image = get_image($row->image, $row->gender);
?>
<div class="col-xl-4 col-md-6">
    <div class="card">
        <div class="card-body">
            <div class="mb-3">
                <a href="#">
                    <img src="<?= $image ?>" class="rounded-3" alt=""></a>
            </div>
            <div class="d-flex align-items-center justify-content-between border-bottom mb-3 pb-3">
                <div>
                    <h5 class="mb-2 fw-bold"><a href="<?= ROOT ?>/profile/<?= $row->user_id ?>"><?= $row->first_name ?> <?= $row->last_name ?></a></h5>
                    <span class="text-info d-inline-flex align-items-center"><i class="isax isax-user me-1"></i><a href="#" class="text-info text-decoration-underline stu-loc"><?= $row->email ?></a></span>
                </div>
                <a href="#" class="avatar avatar-md avatar-rounded border"><i class="isax isax-messages text-gray-9 fs-14"></i></a>
            </div>
            <div class="d-flex align-items-center justify-content-between fs-14">
                <span class="d-inline-flex align-items-center"><i class="isax isax-calendar-add5 text-primary me-1"></i><?= date('d M Y', strtotime($row->date)) ?></span>
                <span class="d-inline-flex align-items-center"><i class="isax isax-user text-secondary me-1"></i><?= ucfirst(str_replace("_", " ", $row->ranks)) ?></span>
            </div>
            <a href="<?= ROOT ?>/profile/<?= $row->user_id ?>" class="btn btn-primary">Profile</a>

            <?php if (isset($_GET['select'])): ?>
                <button name="selected" value="<?= $row->user_id ?>" class="float-end btn btn-danger">Select</button>
            <?php endif; ?>
        </div>
    </div>
</div>