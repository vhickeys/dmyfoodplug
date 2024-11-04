<?php

require('classes/functions.php');

authCheck();

$title = "View Categories";
include_once('components/head.php');
include_once('components/nav-header.php');
include_once('components/header.php');
include_once('components/sidebar.php');

$allCategories = $category->getCategories();
?>

<!--**********************************
            Content body start
***********************************-->

<div class="content-body">
    <!-- row -->
    <div class="page-titles">
        <ol class="breadcrumb">
            <li>
                <h5 class="bc-title">View All Categories</h5>
            </li>
            <li class="breadcrumb-item"><a href="index.php">
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Home </a>
            </li>
        </ol>
        <a class="text-primary fs-13" href="create-category.php">+ Add Category</a>
    </div>
    <div class="container-fluid">
        <div class="row">

            <?php include_once 'components/alert_messages.php' ?>

            <div class="col-xl-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">View All Categories</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display table" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Author</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Date Created</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $id = 1;
                                    if ($allCategories == null) {
                                    } else {
                                        foreach ($allCategories as $category) {
                                    ?>

                                            <tr>
                                                <td><?= $id ?></td>
                                                <td><?= $category['name'] ?></td>
                                                <td><?= $category['author'] ?></td>

                                                <td>
                                                    <div class="products">
                                                        <img src="../assets/images/categories/<?= $category['image'] == '' ? 'placeholder.png' : $category['image'] ?>" class="avatar avatar-md" alt="<?= $category['name'] ?>">
                                                    </div>
                                                </td>

                                                <td><?= $category['status'] == '1' ? 'Hidden' : 'Visible' ?></td>


                                                <td><?php echo date("H:i:s d-M-Y", strtotime($category['date'])) ?></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="edit-category.php?cId=<?= $category['id'] ?>" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>

                                                        <?php if ($_SESSION['user_data']['role'] == "2") : ?>
                                                            <button href="delete-category.php?cId=<?= $category['id'] ?>" class="btn btn-danger shadow btn-xs sharp" disabled><i class="fa fa-trash"></i></button>
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