<?php
$image = get_image($row->image, $row->gender);
?>
<tr>
    <td><a href="<?= ROOT ?>profile/<?= $row->user_id ?>" class="text-primary"><?= $row->first_name ?> <?= $row->last_name ?></a></td>
    <td>
        <div class="d-flex align-items-center">
            <a href="<?= ROOT ?>profile/<?= $row->user_id ?>" class="avatar avatar-md avatar-rounded flex-shrink-0 me-2">
                <img src="<?= $image ?>" alt="">
            </a>
            <a href="<?= ROOT ?>profile/<?= $row->user_id ?>">
                <p class="fs-14"><?= $row->email ?></p>
            </a>
        </div>
    </td>
    <td><?= date('d M Y', strtotime($row->date)) ?></td>
    <td>
        <div class="d-flex align-items-center">
            <!-- <div class="progress progress-xs flex-shrink-0" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="height: 4px;width: 110px">
                                                                <div class="progress-bar bg-success" style="width: 60%"></div>
                                                            </div> -->
            <span class="ms-2"><?= ucfirst(str_replace("_", " ", $row->ranks)) ?></span>
        </div>
    </td>
    <!-- <td>10</td> -->
    <td>
        <div class="d-flex align-items-center">
            <a href="#" class="d-inline-flex fs-14 me-1 action-icon"><i class="isax isax-eye"></i></a>
            <a href="#" class="d-inline-flex fs-14 action-icon"><i class="isax isax-messages-3"></i></a>
        </div>
    </td>
</tr>