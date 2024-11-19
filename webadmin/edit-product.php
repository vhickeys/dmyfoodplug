<?php

require('classes/functions.php');
$product_id = $_GET["pId"];

adminCheckById($product_id, "view-products");

$title = "Edit Product";
include_once('components/head.php');
include_once('components/nav-header.php');
include_once('components/header.php');
include_once('components/sidebar.php');

$allCategories = $category->getCategoriesStatus("categories");
$product = $record->getRecord("products", $product_id);

?>

<!--**********************************
            Content body start
***********************************-->

<div class="content-body">
    <!-- row -->
    <div class="page-titles">
        <ol class="breadcrumb">
            <li>
                <h5 class="bc-title">Edit Product</h5>
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

            <div class="col-xl-8 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Creates New Product</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="classes/process.php?action=update-product" method="POST" enctype="multipart/form-data">

                                <input type="hidden" name="product_id" value="<?= $product['id'] ?>">

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
                                                        <option <?= $product['category_id'] == $category['id'] ? 'selected' : '' ?> value='<?= $category['id'] ?>'><?= $category['name'] ?></option>

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
                                        <input type="text" name="name" class="form-control" value="<?= $product['name'] ?>" placeholder="Enter Name of Product" required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Caption:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="caption" class="form-control" value="<?= $product['caption'] ?>" placeholder="Weight, Size, or Slot of Product (Optional*">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Description:</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-txtarea form-control" placeholder="Description of Product" name="description" rows="8" id="comment" required><?= $product['description'] ?></textarea>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="formFile" class="col-sm-3 col-form-label">Image for Product</label>
                                    <div class="col-sm-9">
                                        <div class="mb-3">
                                            <p class="text-danger"><small>You cannnot upload images greater than 500KB*</small></p>
                                            <input class="form-control" name="image" type="file" id="formFile">
                                            <input type="hidden" class="form-control" name="old_image" value="<?= $product['image']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <img src="../assets/images/products/<?= $product['image'] ?? 'placeholder.png'; ?>" alt="<?= $product['name']; ?>" class="img-fluid" width="20%">
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Cost Price:</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="cost_price" class="form-control" value="<?= $product['cost_price'] ?>" placeholder="Enter the Cost or Original Price of Product">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Selling Price:</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="selling_price" class="form-control" value="<?= $product['selling_price'] ?>" placeholder="Enter amount you wish to sell this product for" required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Price Range:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="price_range" class="form-control" value="<?= $product['price_range'] ?>" placeholder="Enter Price Range of Product (Optional* and for product with sizes, slots or weights)">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">SKU:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="SKU" class="form-control" value="<?= $product['SKU'] ?>" placeholder="Enter Product SKU (Optional*)" disabled>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Products in Stock:</label>
                                    <div class="col-sm-9">
                                        <input type="number" value="<?= $product['items_in_stock'] ?>" name="items_in_stock" class="form-control" placeholder="Enter Amount of Products Available in Stock" required>
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
                                    <input type="text" name="meta_title" value="<?= $product['meta_title'] ?>" class="form-control" placeholder="Enter Meta Title" required>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-form-label">Meta Keywords:</label>
                                <div class="col-sm-12">
                                    <textarea class="form-txtarea form-control" placeholder="Enter Keywords for SEO and ranking of your website" name="meta_keywords" rows="3" id="comment"><?= $product['meta_keywords'] ?></textarea>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-form-label">Meta Description:</label>
                                <div class="col-sm-12">
                                    <textarea class="form-txtarea form-control" name="meta_description" placeholder="You can describe your product here" rows="4" id="comment"><?= $product['meta_description'] ?></textarea>
                                </div>
                            </div>

                            <input type="hidden" name="author" value="<?= $_SESSION['user_data']['fullName'] ?? 'Anonymous' ?>">

                            <div class="mb-3 row">
                                <div class="col-sm-3">Sold Out:</div>
                                <div class="col-sm-9">
                                    <div class="form-check">
                                        <input class="form-check-input" name="soldout" <?= $product['soldout'] == '1' ? 'checked' : '' ?> type="checkbox">
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
                                        <input class="form-check-input" name="trending" <?= $product['trending'] == '1' ? 'checked' : '' ?> type="checkbox">
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
                                        <input class="form-check-input" name="status" <?= $product['status'] == '1' ? 'checked' : '' ?> type="checkbox">
                                        <label class="form-check-label text-info">
                                            Clicking this will hide the product or temporary delete a product
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="my-3 row justify-content-center">
                                <button type="submit" name="edit-product" class="btn btn-primary">Edit this product</button>
                            </div>
                        </div>
                        </form>
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