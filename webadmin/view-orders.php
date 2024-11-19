<?php

require('classes/functions.php');

authCheck();

$title = "View Orders";
include_once('components/head.php');
include_once('components/nav-header.php');
include_once('components/header.php');
include_once('components/sidebar.php');

$orders = $order->getAllOrders();

?>

<!--**********************************
            Content body start
***********************************-->

<div class="content-body">
    <!-- row -->
    <div class="page-titles">
        <ol class="breadcrumb">
            <li>
                <h5 class="bc-title">View All Orders</h5>
            </li>
            <li class="breadcrumb-item"><a href="index.php">
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Home </a>
            </li>
        </ol>
        <!-- <a class="text-primary fs-13" href=javascript:void(0)">+ Add Shipping Address</a> -->
    </div>
    <div class="container-fluid">
        <div class="row">

            <?php include_once 'components/alert_messages.php' ?>

            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">View All Orders</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display table" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Fullname</th>
                                        <th>Tracking Number</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Payment Status</th>
                                        <th>Date Created</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $id = 1;
                                    if ($orders == []) {
                                    } else {
                                        foreach ($orders as $order) {
                                    ?>

                                            <tr>
                                                <td><?= $id ?></td>
                                                <td><?= $order['first_name'] . " " . $order['last_name'] ?></td>
                                                <td><?= $order['tracking_no'] ?></td>
                                                <td><?= $order['email'] ?></td>
                                                <td><?= $order['phone'] ?></td>

                                                <td>
                                                    <?php if ($order['status'] == 'pending') : ?>
                                                        <span class="text-danger">Pending!</span>
                                                    <?php elseif ($order['status'] == 'confirmed') : ?>
                                                        <span class="text-success">Payment Confirmed!</span>
                                                    <?php endif; ?>
                                                </td>

                                                <td><?php echo date("H:i:s d-M-Y", strtotime($order['date'])) ?></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="order-details.php?ordId=<?= $order['id'] ?>" class="btn btn-success shadow btn-xs sharp"><i class="fa fa-eye"></i></a>
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