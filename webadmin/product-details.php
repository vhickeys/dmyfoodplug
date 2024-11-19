<?php

require('classes/functions.php');
$product_id = $_GET["pId"];

authCheckById($product_id, "view-products");

$title = "Product Details";
include_once('components/head.php');
include_once('components/nav-header.php');
include_once('components/header.php');
include_once('components/sidebar.php');

$product_details = $product->getProductCatbyId($product_id);
$product_weights = $product->getProductWSSlot("product_weights", $product_id);
$product_sizes = $product->getProductWSSlot("product_sizes", $product_id);
$product_slots = $product->getProductWSSlot("product_slots", $product_id);

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
                            <div class="cover-photo rounded" style="background: url(../assets/images/products/<?= $product_details['image'] ?? 'placeholder.png' ?>) !important"></div>
                        </div>
                        <div class="profile-info">
                            <div class="profile-details">
                                <div class="profile-name px-3 pt-2">
                                    <h4 class="text-primary mb-0"><?= $product_details['name'] ?? '' ?></h4>
                                    <p>Category: <?= $product_details['category_name'] ?? '' ?></p>
                                </div>
                                <div class="profile-email px-2 pt-2">

                                    <?php if ($product_details['price_range'] == '') : ?>
                                        <h4 class="text-muted mb-0">N<?= $product_details['selling_price'] ?? '' ?></h4>
                                    <?php elseif ($product_details['price_range'] != '') : ?>
                                        <h4 class="text-muted mb-0"><?= $product_details['price_range'] ?? '' ?></h4>
                                    <?php endif; ?>

                                    <p>Status: <?= $product_details['status'] == '0' ? 'Visible' : 'Hidden' ?></p>
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
                                                <h3 class="m-b-0">0</h3><span>Visitors</span>
                                            </div>
                                            <div class="col">
                                                <h3 class="m-b-0">0</h3><span>Purchases</span>
                                            </div>
                                            <div class="col">
                                                <h3 class="m-b-0">0</h3><span>Reviews</span>
                                            </div>
                                        </div>
                                        <div class="mt-4">

                                            <?php if ($_SESSION['user_data']['role'] == "2") : ?>

                                                <a href="create-product.php" class="btn btn-success mb-1 me-1">Add a Product/Weight/Size/Slot</a>
                                                <a href="edit-product.php?pId=<?= $product_details['id'] ?>" class="btn btn-secondary mb-1">Edit this Product</a>

                                            <?php endif; ?>
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

                                    <?php if ($_SESSION['user_data']['role'] == "2") : ?>
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
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="profile-news">
                                    <h5 class="text-primary d-inline">Product Weights (<?= $product_details['name'] ?? '' ?>)</h5>
                                    <?php if ($product_weights != null) {
                                        foreach ($product_weights as $product_weight) {
                                    ?>
                                            <div class="media pt-3 pb-3">
                                                <div class="media-body">
                                                    <h5 class="m-b-5">Weight: <?= $product_weight['weight'] ?? '' ?></h5>
                                                    <h6 class="m-b-5">Price Associated with Weight: N<?= $product_weight['new_price'] ?? '' ?></h6>
                                                    <p><?= $product_weight['other_info'] ?? '' ?></p>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="text-info mb-0">Status: <?= $product_weight['status'] == '0' ? 'Visible' : 'Hidden' ?></p>
                                                        </div>

                                                        <?php if ($_SESSION['user_data']['role'] == "2") : ?>
                                                            <div class="col-md-6 text-end"><button class="btn btn-danger btn-sm mt-3 mb-0 deleteProdWeight" data-bs-toggle="modal" value="<?= $product_weight['id'] ?? '' ?>">Delete Weight</button></div>
                                                        <?php endif; ?>

                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <div class="media pt-3 pb-3">
                                            <div class="media-body">
                                                <div class="alert alert-danger">No Product Weight Set!</div>
                                            </div>
                                        </div>
                                    <?php
                                    } ?>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="profile-news">
                                    <h5 class="text-primary d-inline">Product Sizes (<?= $product_details['name'] ?? '' ?>)</h5>
                                    <?php if ($product_sizes != null) {
                                        foreach ($product_sizes as $product_size) {
                                    ?>
                                            <div class="media pt-3 pb-3">
                                                <div class="media-body">
                                                    <h5 class="m-b-5">Size: <?= $product_size['size'] ?? '' ?></h5>
                                                    <h6 class="m-b-5">Price Associated with Size: N<?= $product_size['new_price'] ?? '' ?></h6>
                                                    <p><?= $product_size['other_info'] ?? '' ?></p>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="text-info mb-0">Status: <?= $product_size['status'] == '0' ? 'Visible' : 'Hidden' ?></p>
                                                        </div>

                                                        <?php if ($_SESSION['user_data']['role'] == "2") : ?>
                                                            <div class="col-md-6 text-end"><button class="btn btn-danger btn-sm mt-3 mb-0 deleteProdSize" data-bs-toggle="modal" value="<?= $product_size['id'] ?? '' ?>">Delete Size</button></div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <div class="media pt-3 pb-3">
                                            <div class="media-body">
                                                <div class="alert alert-danger">No Product Size Set!</div>
                                            </div>
                                        </div>
                                    <?php
                                    } ?>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="profile-news">
                                    <h5 class="text-primary d-inline">Product Slots (<?= $product_details['name'] ?? '' ?>)</h5>
                                    <?php if ($product_slots != null) {
                                        foreach ($product_slots as $product_slot) {
                                    ?>
                                            <div class="media pt-3 pb-3">
                                                <div class="media-body">
                                                    <h5 class="m-b-5">Slot: <?= $product_slot['slot'] ?? '' ?></h5>
                                                    <h6 class="m-b-5">Price Associated with Size: N<?= $product_slot['new_price'] ?? '' ?></h6>
                                                    <p><?= $product_slot['other_info'] ?? '' ?></p>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="text-info mb-0">Status: <?= $product_slot['status'] == '0' ? 'Visible' : 'Hidden' ?></p>
                                                        </div>

                                                        <?php if ($_SESSION['user_data']['role'] == "2") : ?>
                                                            <div class="col-md-6 text-end"><button class="btn btn-danger btn-sm mt-3 mb-0 deleteProdSlot" data-bs-toggle="modal" value="<?= $product_slot['id'] ?? '' ?>">Delete Slot</button></div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <div class="media pt-3 pb-3">
                                            <div class="media-body">
                                                <div class="alert alert-danger">No Product Slot Set!</div>
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
                                    <li class="nav-item active show"><a href="#product-details" data-bs-toggle="tab" class="nav-link">Product Details</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="product-details" class="tab-pane fade active show">
                                        <div class="profile-about-me">
                                            <div class="pt-4 border-bottom-1 pb-3">
                                                <h4 class="text-primary">Caption</h4>
                                                <p class="mb-2"><?= $product_details['caption'] ?? '' ?></p>
                                            </div>
                                            <div class="pt-4 border-bottom-1 pb-3">
                                                <h4 class="text-primary">Description</h4>
                                                <p class="mb-2"><?= addLineBreakBetweenParagraphs($product_details['description'] ?? '') ?></p>
                                            </div>
                                        </div>
                                        <div class="profile-skills mb-5">
                                            <h4 class="text-primary mb-2">Size, Weight, Slots</h4>
                                            <a href="javascript:void(0);" class="btn btn-primary light btn-xs mb-1">KG</a>
                                        </div>
                                        <div class="profile-personal-info">
                                            <h4 class="text-primary mb-4">Additional Information</h4>
                                            <div class="row mb-2">
                                                <div class="col-sm-3 col-5">
                                                    <h5 class="f-w-500">Product URL <span class="pull-end">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-sm-9 col-7"><span><a href="../product.php?prod=<?= $product_details['slug'] ?? '' ?>">product.php?prod=<?= $product_details['slug'] ?? '' ?></a></span>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-sm-3 col-5">
                                                    <h5 class="f-w-500">Cost Price <span class="pull-end">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-sm-9 col-7"><span>N<?= $product_details['cost_price'] ?? '' ?></span>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-sm-3 col-5">
                                                    <h5 class="f-w-500">Selling Price <span class="pull-end">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-sm-9 col-7"><span>N<?= $product_details['selling_price'] ?? '' ?></span>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-sm-3 col-5">
                                                    <h5 class="f-w-500">SKU <span class="pull-end">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-sm-9 col-7"><span class="text-info"><?= $product_details['SKU'] ?? '' ?></span>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-sm-3 col-5">
                                                    <h5 class="f-w-500">Price Range <span class="pull-end">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-sm-9 col-7"><span><?= $product_details['price_range'] ?? '' ?></span>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-sm-3 col-5">
                                                    <h5 class="f-w-500">Items in Stock <span class="pull-end">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-sm-9 col-7"><span><?= $product_details['items_in_stock'] ?? '' ?></span>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-sm-3 col-5">
                                                    <h5 class="f-w-500">Meta Title <span class="pull-end">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-sm-9 col-7"><span><?= $product_details['meta_title'] ?? '' ?></span>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-sm-3 col-5">
                                                    <h5 class="f-w-500">Meta Keywords <span class="pull-end">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-sm-9 col-7"><span><?= $product_details['meta_keywords'] ?? '' ?></span>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-sm-3 col-5">
                                                    <h5 class="f-w-500">Meta Description <span class="pull-end">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-sm-9 col-7"><span><?= $product_details['meta_description'] ?? '' ?></span>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-sm-3 col-5">
                                                    <h5 class="f-w-500">Is Product Sold Out <span class="pull-end">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-sm-9 col-7"><span><?= $product_details['soldout'] == '0' ? 'No, Product Available' : 'Yes and Out of Stock' ?></span>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-sm-3 col-5">
                                                    <h5 class="f-w-500">Is Product Trending <span class="pull-end">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-sm-9 col-7"><span><?= $product_details['trending'] == '0' ? 'No' : 'Yes! It is a trending Product' ?></span>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-sm-3 col-5">
                                                    <h5 class="f-w-500">Product Status <span class="pull-end">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-sm-9 col-7"><span class="text-info"><?= $product_details['status'] == '0' ? 'Product is visible and selling' : 'Product is hidden and not up for sale' ?></span>
                                                </div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-sm-3 col-5">
                                                    <h5 class="f-w-500">Date Created <span class="pull-end">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-sm-9 col-7"><span><?= date("H:i:s d-M-Y", strtotime($product_details['date'])) ?></span>
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