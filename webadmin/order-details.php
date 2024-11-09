<?php

require('classes/functions.php');

$order_id = $_GET["ordId"];

authCheckById($order_id, "view-orders");

$title = "Order Details";
include_once('components/head.php');
include_once('components/nav-header.php');
include_once('components/header.php');
include_once('components/sidebar.php');

$order_details = $order->getOrderAdmin($order_id);
$user_id = $order_details['user_id'];
$tracking_no = $order_details['tracking_no'];
$pickup_id = $order_details['pickup_location'];
$pickup_location = $shipping->getPickUpLocById($pickup_id);
$order_items = $order->getOrderItemsAdmin($order_id);
$order_items_count = $order->countOrderItems($order_id);
$purchase_count = $payment->getPurchaseCount($user_id, $tracking_no);

?>


<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        </ol>
    </div>
    <div class="container-fluid">
        <!-- row -->
        <div class="row">

            <?php include_once 'components/alert_messages.php' ?>

            <div class="col-lg-12">
                <div class="profile card card-body px-3 pt-3 pb-0">
                    <div class="profile-head">
                        <div class="photo-content">
                            <div class="cover-photo rounded" style="background: url(../assets/images/banner/08.jpg) !important"></div>
                        </div>
                        <div class="profile-info">
                            <div class="profile-details">
                                <div class="profile-name px-3 pt-2">
                                    <h4 class="text-primary mb-0"><?= $order_details['first_name'] . " " .  $order_details['last_name'] ?></h4>
                                    <p class="fw-bold"><?= $order_details['email'] ?? '' ?></p>
                                </div>
                                <div class="profile-email px-2 pt-2">

                                    <h4 class="text-muted mb-0">Tracking Number: <?= $order_details['tracking_no'] ?? '' ?></h4>

                                    <?php if ($order_details['status'] == 'confirmed') : ?>
                                        <p class="text-success">Status: Payment <?= $order_details['status'] ?></p>
                                    <?php else: ?>
                                        <p class="text-danger">Status: Payment <?= $order_details['status'] ?></p>
                                    <?php endif; ?>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="profile-statistics">
                                    <div class="text-center">
                                        <div class="row">
                                            <div class="col">
                                                <h3 class="m-b-0"><?= $order_items_count ?? '0' ?></h3><span>Order Items</span>
                                            </div>
                                            <div class="col">
                                                <h3 class="m-b-0"><?= $purchase_count ?? '0' ?></h3><span>Purchases</span>
                                            </div>
                                        </div>
                                        <div class="mt-4">

                                        </div>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="editWeightModal1">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Product Weight</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="comment-form">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="text-black font-w600 form-label">Name <span class="required">*</span></label>
                                                                    <input type="text" class="form-control" value="Author" name="Author" placeholder="Author">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="text-black font-w600 form-label">Email <span class="required">*</span></label>
                                                                    <input type="text" class="form-control" value="Email" placeholder="Email" name="Email">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="mb-3">
                                                                    <label class="text-black font-w600 form-label">Comment</label>
                                                                    <textarea rows="4" class="form-control h-50" name="comment" placeholder="Comment"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="mb-3 mb-0">
                                                                    <input type="submit" value="Post Comment" class="submit btn btn-primary" name="submit">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Delete Product Weight Modal -->
                                    <form method="post" action="classes/process.php?action=delete-product-weight">
                                        <div class="modal fade" id="deleteProdWeightModal" tabindex="-1" aria-labelledby="deleteWSSModal" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="">Delete This Product Weight?</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="hidden" value="<?= $_GET['pId'] ?>" name="product_id">
                                                        <input type="hidden" id="deleteProdWeightId" name="deleteProdWeightId">
                                                        <h4>Are you sure you want to delete this Product Weight?</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" name="delete-product-weight" class="btn btn-danger">Delete
                                                            Product Weight</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    <!--Delete Product Size Modal -->
                                    <form method="post" action="classes/process.php?action=delete-product-size">
                                        <div class="modal fade" id="deleteProdSizeModal" tabindex="-1" aria-labelledby="deleteProdSizeModal" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="">Delete This Product Size?</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="hidden" value="<?= $_GET['pId'] ?>" name="product_id">
                                                        <input type="hidden" id="deleteProdSizeId" name="deleteProdSizeId">
                                                        <h4>Are you sure you want to delete this Product Size?</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" name="delete-product-size" class="btn btn-danger">Delete
                                                            Product Size</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    <!--Delete Product Slot Modal -->
                                    <form method="post" action="classes/process.php?action=delete-product-slot">
                                        <div class="modal fade" id="deleteProdSlotModal" tabindex="-1" aria-labelledby="deleteProdSlotModal" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="">Delete This Product Slot?</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="hidden" value="<?= $_GET['pId'] ?>" name="product_id">
                                                        <input type="hidden" id="deleteProdSlotId" name="deleteProdSlotId">
                                                        <h4>Are you sure you want to delete this Product Slot?</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" name="delete-product-slot" class="btn btn-danger">Delete
                                                            Product Slot</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="profile-news">
                                    <h5 class="text-primary d-inline">Order Items</h5>
                                    <?php if ($order_items != []) {
                                        foreach ($order_items as $order_item) {
                                    ?>

                                            <div class="media pt-3 pb-3">
                                                <img src="../assets/images/products/<?= $order_item['product_image'] ?? 'placeholder.png' ?>" alt="image" class="me-3 rounded" width="75">
                                                <div class="media-body">
                                                    <h5 class="m-b-5"><?= $order_item['product_name'] ?? '' ?></h5>
                                                    <p class="mb-0 text-info">N<?= number_format($order_item['price'], 0, '.', ',') ?></p>
                                                    <p class="text-info mb-0">Quantity: <?= $order_item['quantity'] ?? '' ?></p>
                                                    <p class="mb-0 text-success">Sub Total: N<?= number_format($order_item['price'] * $order_item['quantity'], 0, '.', ',') ?></p>
                                                    <p class="text-danger">Products remaining in Stock: <?= $order_item['items_in_stock'] ?? '' ?></p>
                                                </div>
                                            </div>
                                            <hr>
                                        <?php
                                        }
                                        ?>
                                        <h5 class="text-primary d-inline">Total Price: N<?= number_format($order_details['total_price'] ?? '0000', 0, '.', ',') ?></h5>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="media pt-3 pb-3">
                                            <div class="media-body">
                                                <div class="alert alert-danger">No order items yet!</div>
                                            </div>
                                        </div>
                                    <?php
                                    } ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="card h-auto">
                    <div class="card-body">
                        <div class="profile-tab">
                            <div class="custom-tab-1">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item active show"><a href="#product-details" data-bs-toggle="tab" class="nav-link">Order Details</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="product-details" class="tab-pane fade active show">
                                        <div class="profile-personal-info mt-5">
                                            <div class="row mb-2">
                                                <div class="col-sm-3 col-5">
                                                    <h5 class="f-w-500">User ID <span class="pull-end">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-sm-9 col-7"><span class="text-info"><?= $order_details['user_id'] ?? '' ?></span>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-sm-3 col-5">
                                                    <h5 class="f-w-500">Country <span class="pull-end">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-sm-9 col-7"><span><?= $order_details['country'] ?? '' ?></span>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-sm-3 col-5">
                                                    <h5 class="f-w-500">City <span class="pull-end">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-sm-9 col-7"><span><?= $order_details['city'] ?? '' ?></span>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-sm-3 col-5">
                                                    <h5 class="f-w-500">State <span class="pull-end">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-sm-9 col-7"><span class="text-info"><?= $order_details['state'] ?? '' ?></span>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-sm-3 col-5">
                                                    <h5 class="f-w-500">Zip Code <span class="pull-end">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-sm-9 col-7"><span><?= $order_details['zip_code'] ?? '' ?></span>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-sm-3 col-5">
                                                    <h5 class="f-w-500">Phone <span class="pull-end">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-sm-9 col-7"><span><?= $order_details['phone'] ?? '' ?></span>
                                                </div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-sm-3 col-5">
                                                    <h5 class="f-w-500">Payment ID <span class="pull-end">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-sm-9 col-7"><span><?= $order_details['payment_id'] ?: 'Payment Pending' ?></span>
                                                </div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-sm-3 col-5">
                                                    <h5 class="f-w-500">Payment Mode <span class="pull-end">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-sm-9 col-7"><span><?= $order_details['payment_mode'] ?? '' ?></span>
                                                </div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-sm-3 col-5">
                                                    <h5 class="f-w-500">Total Price of Product<span class="pull-end">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-sm-9 col-7"><span class="text-success">N<?= number_format($order_details['total_price'] ?? '0000', 0, '.', ',') ?></span>
                                                </div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-sm-3 col-5">
                                                    <h5 class="f-w-500">Address <span class="pull-end">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-sm-9 col-7"><span><?= $order_details['address'] ?? '' ?></span>
                                                </div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-sm-3 col-5">
                                                    <h5 class="f-w-500">Pick Up Location <span class="pull-end">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-sm-9 col-7"><?= $pickup_location['location'] ?><span></span>
                                                </div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-sm-3 col-5">
                                                    <h5 class="f-w-500">Shipping Fee <span class="pull-end">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-sm-9 col-7">N<?= $pickup_location['shipping_fee'] ?><span></span>
                                                </div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-sm-3 col-5">
                                                    <h5 class="f-w-500">Order Notes <span class="pull-end">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-sm-9 col-7"><span><?= $order_details['order_notes'] ?? '' ?></span>
                                                </div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-sm-3 col-5">
                                                    <h5 class="f-w-500">Product Status <span class="pull-end">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-sm-9 col-7"><span class="text-warning"><?= $order_details['status'] == 'confirmed' ? 'Customer has paid for the products' : 'Customer is yet to make payment!' ?></span>
                                                </div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-sm-3 col-5">
                                                    <h5 class="f-w-500">Date Created <span class="pull-end">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-sm-9 col-7"><span><?= date("H:i:s d-M-Y", strtotime($order_details['date'])) ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="replyModal">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Post Reply</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <textarea class="form-control h-50" rows="4">Message</textarea>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Reply</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
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