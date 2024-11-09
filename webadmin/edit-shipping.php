<?php

require('classes/functions.php');
$shipping_id = $_GET["shipId"];

authCheckById($shipping_id, "view-shippings");

$title = "Edit Category";
include_once('components/head.php');
include_once('components/nav-header.php');
include_once('components/header.php');
include_once('components/sidebar.php');

$shipping_info = $record->getRecord("shippings", $shipping_id);

?>

<!--**********************************
            Content body start
***********************************-->

<div class="content-body">
    <!-- row -->
    <div class="page-titles">
        <ol class="breadcrumb">
            <li>
                <h5 class="bc-title">Edit Shipping Address</h5>
            </li>
            <li class="breadcrumb-item"><a href="index.php">
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Home </a>
            </li>
        </ol>
        <a class="text-primary fs-13" href="view-shippings.php">+ View All Shippings</a>

    </div>
    <div class="container-fluid">
        <div class="row">

            <?php include_once 'components/alert_messages.php' ?>

            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Shipping</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="classes/process.php?action=edit-shipping" method="POST" enctype="multipart/form-data">
                                <input type="hidden" value="<?= $shipping_id ?? '' ?>" name="shipping_id">
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Shipping Location:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="location" value="<?= $shipping_info['location'] ?? '' ?>" class="form-control" placeholder="Enter Name of Location" required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Shipping Fee:</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="shipping_fee" value="<?= $shipping_info['shipping_fee'] ?? '' ?>" class="form-control" placeholder="Enter Shipping Fee" required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Any other info about shipping address:</label>
                                    <div class="col-sm-9">
                                        <textarea name="other_info" class="form-control" placeholder="Enter Any Other Shipping Information (Optional)"><?= $shipping_info['other_info'] ?? '' ?></textarea>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <div class="col-sm-3">Status:</div>
                                    <div class="col-sm-9">
                                        <div class="form-check">
                                            <input class="form-check-input" <?= $shipping_info['status'] == 1 ? 'checked' : '' ?> name="status" type="checkbox">
                                            <label class="form-check-label text-danger">
                                                Clicking this will hide the shipping details from the customer!
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="my-3 row justify-content-center">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9">
                                        <button type="submit" name="edit-shipping" class="btn btn-success w-100">Edit Shipping Address</button>
                                    </div>
                                </div>

                            </form>
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