<?php

require('classes/functions.php');

authCheck();

$title = "Create Product";
include_once('components/head.php');
include_once('components/nav-header.php');
include_once('components/header.php');
include_once('components/sidebar.php');

$allCategories = $category->getCategoriesStatus("categories");
$allProducts = $product->getProductsStatus("products");

?>

<!--**********************************
            Content body start
***********************************-->

<div class="content-body">
    <!-- row -->
    <div class="page-titles">
        <ol class="breadcrumb">
            <li>
                <h5 class="bc-title">Product</h5>
            </li>
            <li class="breadcrumb-item"><a href="index.php">
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Home </a>
            </li>
        </ol>
        <a class="text-primary fs-13" href="view-products.php">View Products</a>
    </div>
    <div class="container-fluid">
        <div class="row">

            <?php include_once 'components/alert_messages.php' ?>

            <div class="col-xl-12">
                <div class="card h-auto">
                    <div class="card-body">
                        <div class="profile-tab">
                            <div class="custom-tab-1">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a href="#create-product" data-bs-toggle="tab" class="nav-link active show">Create Product</a>
                                    </li>
                                    <li class="nav-item"><a href="#product-weight" data-bs-toggle="tab" class="nav-link">Product Weight</a>
                                    </li>
                                    <li class="nav-item"><a href="#product-size" data-bs-toggle="tab" class="nav-link">Product Size</a>
                                    </li>
                                    <li class="nav-item"><a href="#product-slot" data-bs-toggle="tab" class="nav-link">Product Slot</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="create-product" class="tab-pane fade active show">
                                        <div class="my-post-content pt-3">
                                            <div class="row">

                                                <div class="col-xl-8 col-lg-12">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h4 class="card-title">Creates New Product</h4>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="basic-form">
                                                                <form action="classes/process.php?action=create-product" method="POST" enctype="multipart/form-data">

                                                                    <div class="mb-3 row">
                                                                        <label class="col-sm-3 col-form-label">Category:</label>
                                                                        <div class="col-sm-9">
                                                                            <div class="dropdown bootstrap-select default-select form-control wide dropup">
                                                                                <select class="default-select form-control wide" name="category" tabindex="null" required>
                                                                                    <option value=''>-- Select Product Category --</option>
                                                                                    <?php
                                                                                    if ($allCategories != null) {
                                                                                        foreach ($allCategories as $category) {
                                                                                    ?>
                                                                                            <option value='<?= $category['id'] ?>'><?= $category['name'] ?></option>

                                                                                    <?php
                                                                                        }
                                                                                    }
                                                                                    ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="mb-3 row">
                                                                        <label class="col-sm-3 col-form-label">Name:</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" name="name" class="form-control" placeholder="Enter Name of Product" required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="mb-3 row">
                                                                        <label class="col-sm-3 col-form-label">Caption:</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" name="caption" class="form-control" placeholder="Weight, Size, or Slot of Product (Optional*)">
                                                                        </div>
                                                                    </div>

                                                                    <div class="mb-3 row">
                                                                        <label class="col-sm-3 col-form-label">Description:</label>
                                                                        <div class="col-sm-9">
                                                                            <textarea class="form-txtarea form-control" placeholder="Description of Product" name="description" rows="8" id="comment" required></textarea>
                                                                        </div>
                                                                    </div>

                                                                    <div class="mb-3 row">
                                                                        <label for="formFile" class="col-sm-3 col-form-label">Image for Product</label>
                                                                        <div class="col-sm-9">
                                                                            <div class="mb-3">
                                                                                <p class="text-danger"><small>You cannnot upload images greater than 500KB*</small></p>
                                                                                <input class="form-control" name="image" type="file" id="formFile">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="mb-3 row">
                                                                        <label class="col-sm-3 col-form-label">Cost Price:</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="number" name="cost_price" class="form-control" placeholder="Enter the Cost or Original Price of Product">
                                                                        </div>
                                                                    </div>

                                                                    <div class="mb-3 row">
                                                                        <label class="col-sm-3 col-form-label">Selling Price:</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="number" name="selling_price" class="form-control" placeholder="Enter amount you wish to sell this product for" required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="mb-3 row">
                                                                        <label class="col-sm-3 col-form-label">Price Range:</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" name="price_range" class="form-control" placeholder="Enter Price Range of Product (Optional* and for product with sizes, slots or weights)">
                                                                        </div>
                                                                    </div>
<!-- 
                                                                    <div class="mb-3 row">
                                                                        <label class="col-sm-3 col-form-label">SKU:</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" name="SKU" class="form-control" placeholder="Enter Product SKU (Optional*)">
                                                                        </div>
                                                                    </div> -->

                                                                    <div class="mb-3 row">
                                                                        <label class="col-sm-3 col-form-label">Products in Stock:</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="number" name="items_in_stock" class="form-control" placeholder="Enter Amount of Products Available in Stock" required>
                                                                        </div>
                                                                    </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-12">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h4 class="card-title">SEO INFORMATION</h4>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="basic-form">

                                                                <div class="mb-3 row">
                                                                    <label class="col-form-label">Meta Title:</label>
                                                                    <div class="col-sm-12">
                                                                        <input type="text" name="meta_title" class="form-control" placeholder="Enter Meta Title" required>
                                                                    </div>
                                                                </div>

                                                                <div class="mb-3 row">
                                                                    <label class="col-form-label">Meta Keywords:</label>
                                                                    <div class="col-sm-12">
                                                                        <textarea class="form-txtarea form-control" placeholder="Enter Keywords for SEO and ranking of your website" name="meta_keywords" rows="3" id="comment"></textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="mb-3 row">
                                                                    <label class="col-form-label">Meta Description:</label>
                                                                    <div class="col-sm-12">
                                                                        <textarea class="form-txtarea form-control" name="meta_description" placeholder="You can describe your product here" rows="4" id="comment"></textarea>
                                                                    </div>
                                                                </div>

                                                                <input type="hidden" name="author" value="<?= $_SESSION['user_data']['fullName'] ?? 'Anonymous' ?>">

                                                                <div class="mb-3 row">
                                                                    <div class="col-sm-3">Sold Out:</div>
                                                                    <div class="col-sm-9">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" name="soldout" type="checkbox">
                                                                            <label class="form-check-label text-info">
                                                                                Clicking this will make the product unavailable for sale as it is sold out
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="mb-3 row">
                                                                    <div class="col-sm-3">Trending:</div>
                                                                    <div class="col-sm-9">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" name="trending" type="checkbox">
                                                                            <label class="form-check-label text-info">
                                                                                Clicking this will make a product trending
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="mb-3 row">
                                                                    <div class="col-sm-3">Status:</div>
                                                                    <div class="col-sm-9">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" name="status" type="checkbox">
                                                                            <label class="form-check-label text-info">
                                                                                Clicking this will hide the product or temporary delete a product
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="my-3 row justify-content-center">
                                                                    <button type="submit" name="submit-product" class="btn btn-primary">Create a New
                                                                        Product</button>
                                                                </div>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="product-weight" class="tab-pane fade">
                                        <div class="pt-3">
                                            <div class="settings-form">
                                                <h4 class="text-primary">Add Product Weight</h4>
                                                <form action="classes/process.php?action=create-product-weight" method="post">
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">Select Product</label>

                                                            <div class="dropdown bootstrap-select default-select form-control wide dropup">
                                                                <select class="default-select form-control wide" name="product" tabindex="null" required>
                                                                    <option value=''>-- Select Product --</option>
                                                                    <?php
                                                                    if ($allProducts != null) {
                                                                        foreach ($allProducts as $product) {
                                                                    ?>
                                                                            <option value='<?= $product['id'] ?>'><?= $product['name'] ?></option>

                                                                    <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">Weight</label>
                                                            <input type="text" placeholder="Product Weight (KG)" name="weight" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="row">
                                                            <div class="mb-3 col-md-6">
                                                                <label class="form-label">Price</label>
                                                                <input type="number" name="new_price" placeholder="New Price (for the weight)" class="form-control" required>
                                                            </div>
                                                            <div class="mb-3 col-md-6">
                                                                <label class="form-label">Other Info</label>
                                                                <input type="text" name="other_info" placeholder="Other Information (Optional)" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <div class="col-sm-3">Status:</div>
                                                        <div class="col-sm-9">
                                                            <div class="form-check">
                                                                <input class="form-check-input" name="status" type="checkbox">
                                                                <label class="form-check-label">
                                                                    Hidden
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-primary" name="submit-product-weight" type="submit">Create Product Weight</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="product-size" class="tab-pane fade">
                                        <div class="pt-3">
                                            <div class="settings-form">
                                                <h4 class="text-primary">Add Product Size</h4>
                                                <form action="classes/process.php?action=create-product-size" method="post">
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">Select Product</label>

                                                            <div class="dropdown bootstrap-select default-select form-control wide dropup">
                                                                <select class="default-select form-control wide" name="product" tabindex="null" required>
                                                                    <option value=''>-- Select Product --</option>
                                                                    <?php
                                                                    if ($allProducts != null) {
                                                                        foreach ($allProducts as $product) {
                                                                    ?>
                                                                            <option value='<?= $product['id'] ?>'><?= $product['name'] ?></option>

                                                                    <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">Size</label>
                                                            <input type="text" placeholder="Product Size" name="size" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="row">
                                                            <div class="mb-3 col-md-6">
                                                                <label class="form-label">Price</label>
                                                                <input type="number" name="new_price" placeholder="New Price (for the weight)" class="form-control" required>
                                                            </div>
                                                            <div class="mb-3 col-md-6">
                                                                <label class="form-label">Other Info</label>
                                                                <input type="text" name="other_info" placeholder="Other Information (Optional)" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <div class="col-sm-3">Status:</div>
                                                        <div class="col-sm-9">
                                                            <div class="form-check">
                                                                <input class="form-check-input" name="status" type="checkbox">
                                                                <label class="form-check-label">
                                                                    Hidden
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-primary" name="submit-product-size" type="submit">Create Product Size</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="product-slot" class="tab-pane fade">
                                        <div class="pt-3">
                                            <div class="settings-form">
                                                <h4 class="text-primary">Add Product Slot</h4>
                                                <form action="classes/process.php?action=create-product-slot" method="post">
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">Select Product</label>

                                                            <div class="dropdown bootstrap-select default-select form-control wide dropup">
                                                                <select class="default-select form-control wide" name="product" tabindex="null" required>
                                                                    <option value=''>-- Select Product --</option>
                                                                    <?php
                                                                    if ($allProducts != null) {
                                                                        foreach ($allProducts as $product) {
                                                                    ?>
                                                                            <option value='<?= $product['id'] ?>'><?= $product['name'] ?></option>

                                                                    <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">Slot</label>
                                                            <input type="text" placeholder="Product Slot (e.g Half Slot, Full Slot etc)" name="slot" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="row">
                                                            <div class="mb-3 col-md-6">
                                                                <label class="form-label">Price</label>
                                                                <input type="number" name="new_price" placeholder="New Price (for the weight)" class="form-control" required>
                                                            </div>
                                                            <div class="mb-3 col-md-6">
                                                                <label class="form-label">Other Info</label>
                                                                <input type="text" name="other_info" placeholder="Other Information (Optional)" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <div class="col-sm-3">Status:</div>
                                                        <div class="col-sm-9">
                                                            <div class="form-check">
                                                                <input class="form-check-input" name="status" type="checkbox">
                                                                <label class="form-check-label">
                                                                    Hidden
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-primary" name="submit-product-slot" type="submit">Create Product Slot</button>
                                                </form>
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