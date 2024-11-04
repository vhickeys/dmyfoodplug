<?php

require('classes/functions.php');

authCheck();

$title = "View All Payments Proofs";
include_once('components/head.php');
include_once('components/nav-header.php');
include_once('components/header.php');
include_once('components/sidebar.php');

$paymentProofs = $transaction->getAllPaymentProof();
?>

<!--**********************************
            Content body start
***********************************-->

<div class="content-body">
    <!-- row -->
    <div class="page-titles">
        <ol class="breadcrumb">
            <li>
                <h5 class="bc-title">View All Payments Proof</h5>
            </li>
            <li class="breadcrumb-item"><a href="index.php">
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Home </a>
            </li>
        </ol>
        <a class="text-primary fs-13" href="create-package.php">+ Add Package</a>
    </div>
    <div class="container-fluid">
        <div class="row">
            <?php
            if (isset($_SESSION['errorMessage'])) {
            ?>
                <div class="alert alert-danger solid alert-dismissible fade show">
                    <svg viewBox="0 0 24 24" width="24 " height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                        <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
                        <line x1="15" y1="9" x2="9" y2="15"></line>
                        <line x1="9" y1="9" x2="15" y2="15"></line>
                    </svg>
                    <strong>Error!</strong> <?php echo $_SESSION['errorMessage']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                    </button>
                </div>
            <?php
                unset($_SESSION['errorMessage']);
            }

            if (isset($_SESSION['successMessage'])) {
            ?>
                <div class="alert alert-success solid alert-dismissible fade show">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                        <polyline points="9 11 12 14 22 4"></polyline>
                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                    </svg>
                    <strong>Success!</strong> <?php echo $_SESSION['successMessage']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                    </button>
                </div>
            <?php
                unset($_SESSION['successMessage']);
            }
            ?>

            <div class="col-xl-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">View All Payments Proof</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display table" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User</th>
                                        <th>Document</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $id = 1;
                                    if ($paymentProofs == null) {
                                    } else {
                                        foreach ($paymentProofs as $proof) {
                                    ?>

                                            <tr>
                                                <td><?= $id ?></td>
                                                <td><?= $proof['user_fullName'] ?></td>
                                                <td><?= $proof['proof'] ?></td>

                                                <?php if ($proof['status'] == 0) : ?>
                                                    <td>
                                                        <p class="text-primary">Pending</p>
                                                    </td>
                                                <?php elseif ($proof['status'] == 1) : ?>
                                                    <td>
                                                        <p class="text-success">Approved</p>
                                                    </td>
                                                <?php else : ?>
                                                    <td>
                                                        <p class="text-danger">Declined</p>
                                                    </td>
                                                <?php endif; ?>

                                                <td><?= date('d-M-Y', strtotime($proof['date'])) ?></td>


                                                <td>
                                                    <div class="d-flex">
                                                        <a href="../img/payments/<?= $proof['proof'] ?>" class="btn btn-primary shadow btn-md me-1">View</a>

                                                        <?php if ($_SESSION['user_data']['role'] == "2") : ?>
                                                            <form action="classes/process.php?action=updatePaymentStatus" method="post">
                                                                <input type="hidden" name="payment_id" value="<?= $proof['id'] ?>">
                                                                <input type="hidden" name="user_id" value="<?= $proof['user_id'] ?>">
                                                                <button name="payment_status" class="btn btn-<?= $proof['status'] == 1 ? 'danger' : 'success' ?> shadow btn-md" value="<?= $proof['status'] ?>"><?= $proof['status'] == 1 ? 'Decline' : 'Approve' ?></button>
                                                            </form>
                                                        <?php endif; ?>

                                                    </div>
                                                </td>
                                            </tr>

                                    <?php
                                            $id++;
                                        }
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
</div>

<!--**********************************
            Content body end
***********************************-->

<?php
include_once('components/footer.php');
include_once('components/scripts.php');
?>