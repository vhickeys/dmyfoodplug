<?php

require('classes/functions.php');
$category_id = $_GET["cId"];

authCheckById($category_id, "view-categories");

$title = "Edit Category";
include_once('components/head.php');
include_once('components/nav-header.php');
include_once('components/header.php');
include_once('components/sidebar.php');

$category = $record->getRecord("categories", $category_id);

?>

<!--**********************************
            Content body start
***********************************-->

<div class="content-body">
    <!-- row -->
    <div class="page-titles">
        <ol class="breadcrumb">
            <li>
                <h5 class="bc-title">Edit Categories</h5>
            </li>
            <li class="breadcrumb-item"><a href="index.php">
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Home </a>
            </li>
        </ol>
        <a class="text-primary fs-13" href="view-categories.php">View Categories</a>
    </div>
    <div class="container-fluid">
        <div class="row">

            <?php include_once 'components/alert_messages.php' ?>

            <div class="col-xl-8 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Category</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="classes/process.php?action=update-category" method="POST" enctype="multipart/form-data">

                                <input type="hidden" name="category_id" value="<?= $category['id'] ?>">

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Name:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control" value="<?= $category['name'] ?>" placeholder="Enter Name of Category" required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Caption:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="caption" class="form-control" value="<?= $category['caption'] ?>" placeholder="Enter Caption of Category" required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Description:</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-txtarea form-control" placeholder="Description of Category" name="description" rows="8" id="comment" required><?= $category['description'] ?></textarea>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="formFile" class="col-sm-3 col-form-label">Image for Category</label>
                                    <div class="col-sm-9">
                                        <div class="mb-3">
                                            <p class="text-danger"><small>You cannnot upload images greater than 500KB*</small></p>
                                            <input class="form-control" name="image" type="file" id="formFile">
                                            <input type="hidden" class="form-control" name="old_image" value="<?= $category['image']; ?>">
                                        </div>

                                        <div class="mb-3">
                                            <img src="../assets/images/categories/<?= $category['image'] ?? 'placeholder.png'; ?>" alt="<?= $category['name']; ?>" class="img-fluid" width="20%">
                                        </div>
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
                                    <input type="text" name="meta_title" class="form-control" value="<?= $category['meta_title']; ?>" placeholder="Enter Meta Title" required>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-form-label">Meta Keywords:</label>
                                <div class="col-sm-12">
                                    <textarea class="form-txtarea form-control" placeholder="Enter Keywords for SEO and ranking of your website" name="meta_keywords" rows="3" id="comment"><?= $category['meta_keywords']; ?></textarea>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-form-label">Meta Description:</label>
                                <div class="col-sm-12">
                                    <textarea class="form-txtarea form-control" name="meta_description" placeholder="You can describe your category here" rows="4" id="comment"><?= $category['meta_description']; ?></textarea>
                                </div>
                            </div>

                            <input type="hidden" name="author" value="<?= $_SESSION['user_data']['fullName'] ?? 'Anonymous' ?>">

                            <div class="mb-3 row">
                                <div class="col-sm-3">Status:</div>
                                <div class="col-sm-9">
                                    <div class="form-check">
                                        <input class="form-check-input" <?= $category['status'] == '1' ? 'checked' : '' ?> name="status" type="checkbox">
                                        <label class="form-check-label">
                                            Hidden
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="my-3 row justify-content-center">
                                <button type="submit" name="edit-category" class="btn btn-primary">Edit this category</button>
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