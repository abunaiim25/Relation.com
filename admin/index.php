<?php
include('includes/header.php');
include('controller/GetController.php');
?>

<div class="container-fluid py-4 px-5">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Users table</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Users</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created Time</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $user = getUsersAll();

                                if (mysqli_num_rows($user) > 0) {
                                    foreach ($user as $item) {
                                ?>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="../uploads/profile/<?= $item['profile_image']; ?>" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                                      
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm"> <?= $item['name'] ?> </h6>
                                                        <p class="text-xs text-secondary mb-0"><?= $item['email'] ?></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0"> </p>
                                                <p class="text-xs text-secondary mb-0"><?= $item['email'] ?></p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <?php
                                                if ($item['role_as'] == 0) {
                                                ?>
                                                    <span class="badge badge-sm bg-gradient-success">User</span>
                                                <?php
                                                } else {
                                                ?>
                                                    <span class="badge badge-sm bg-gradient-danger">Admin</span>
                                                <?php
                                                }
                                                ?>


                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold"><?= $item['created_at'] ?></span>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo "No records found";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php') ?>