<?php

require('classes/functions.php');

adminAuth();

$title = "View Users";
include_once('components/head.php');
include_once('components/nav-header.php');
include_once('components/header.php');
include_once('components/sidebar.php');

$allUsers = $record->getRecords("users");

?>

<!--**********************************
            Content body start
***********************************-->

<div class="content-body">
    <!-- row -->
    <div class="page-titles">
        <ol class="breadcrumb">
            <li>
                <h5 class="bc-title">View All Users</h5>
            </li>
            <li class="breadcrumb-item"><a href="index.php">
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z"
                            stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                    Home </a>
            </li>
        </ol>
        <a class="text-primary fs-13" data-bs-toggle="offcanvas" href="#addNewUser" role="button"
            aria-controls="addNewUser">+ Add a user</a>
    </div>
    <div class="container-fluid">
        <div class="row">

            <form method="post" id="changeUserRole" action="classes/process.php?action=changeUserRole">
                <div class="modal fade" id="changeUserRoleModal" tabindex="-1" aria-labelledby="changeUserRoleModal"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="">Update the role of this user</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h4>Select the user new role</h4>
                                <div class="dropdown bootstrap-select default-select form-control wide dropup">

                                    <input type="hidden" id="userId" name="userId">

                                    <?php
                                    $roles = [
                                        ["0", "User"],
                                        ["1", "Admin"],
                                        ["2", "Super Admin"],
                                    ]
                                    ?>

                                    <select class="default-select form-control wide" name="user_role" tabindex="null"
                                        required>

                                        <option value="">-- Select User Role --</option>
                                        <?php
                                        foreach ($roles as $role) {
                                        ?>
                                            <option value='<?= $role[0] ?>'><?= $role[1] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="changeUserRoleBtn" class="btn btn-success">Change User
                                    Role</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Modal -->
            <form method="post" id="deleteUser" action="classes/process.php?action=delete-user">
                <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModal"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="">Delete This User</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" id="deleteModalId" name="userDeleteModalId">
                                <h4>Are you sure you want to delete this user?</h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="delete-user" class="btn btn-danger">Delete
                                    User</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <?php
            if (isset($_SESSION['errorMessage'])) {
            ?>
                <div class="alert alert-danger solid alert-dismissible fade show">
                    <svg viewBox="0 0 24 24" width="24 " height="24" stroke="currentColor" stroke-width="2" fill="none"
                        stroke-linecap="round" stroke-linejoin="round" class="me-2">
                        <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
                        <line x1="15" y1="9" x2="9" y2="15"></line>
                        <line x1="9" y1="9" x2="15" y2="15"></line>
                    </svg>
                    <strong>Error!</strong>
                    <?php echo $_SESSION['errorMessage']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                    </button>
                </div>
            <?php
                unset($_SESSION['errorMessage']);
            }

            if (isset($_SESSION['successMessage'])) {
            ?>
                <div class="alert alert-success solid alert-dismissible fade show">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none"
                        stroke-linecap="round" stroke-linejoin="round" class="me-2">
                        <polyline points="9 11 12 14 22 4"></polyline>
                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                    </svg>
                    <strong>Success!</strong> Hey,
                    <?php echo $_SESSION['successMessage']; ?>
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
                        <h4 class="card-title">View All Users</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display table" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Date Created</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $id = 1;
                                    foreach ($allUsers as $user) {
                                    ?>

                                        <tr>
                                            <td>
                                                <?= $id ?>
                                            </td>
                                            <td>
                                                <?= $user['full_name'] ?>
                                            </td>
                                            <td class="text-danger">
                                                <?= $user['email'] ?>
                                            </td>
                                            <td>
                                                <?php
                                                switch ($user['role']) {
                                                    case '0':
                                                        echo "User";
                                                        break;

                                                    case '1':
                                                        echo "Admin";
                                                        break;

                                                    case '2':
                                                        echo "Super Admin";
                                                        break;

                                                    default:
                                                        echo "ID Unknown";
                                                        break;
                                                }
                                                ?>
                                            </td>
                                            <td class="text-success">
                                                <?php echo date("d-M-Y", strtotime($user['date_created'])) ?>
                                            </td>
                                            <td class="text-end">

                                                <?php if ($_SESSION['user_data']['role'] != $user['role']): ?>
                                                    <div class="dropdown custom-dropdown mb-0">
                                                        <button id="" class="btn sharp btn-primary tp-btn userAction" onclick="toggleActions(this)">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                                    <circle fill="#000000" cx="12" cy="5" r="2"></circle>
                                                                    <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                                    <circle fill="#000000" cx="12" cy="19" r="2"></circle>
                                                                </g>
                                                            </svg>
                                                        </button>
                                                    </div>

                                                    <div class="d-flex flex-column actions my-3">
                                                        <button value="<?= $user['id'] ?>"
                                                            class="btn btn-success shadow btn-xs mb-2 change-role">Change
                                                            Role</button>

                                                        <form action="classes/process.php?action=setUserAccess" method="POST">
                                                            <input type="hidden" name="userAccess"
                                                                value="<?= $user['access'] ?>">
                                                            <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                                                            <button type="submit" name="userAccessBtn"
                                                                class="btn btn-<?= $user['access'] == 1 ? 'warning' : 'info' ?> shadow btn-xs mb-2 w-100">
                                                                <?= $user['access'] == 1 ? 'Unblock User' : 'Block User' ?>
                                                            </button>
                                                        </form>

                                                        <button value="<?= $user['id'] ?>"
                                                            class="btn btn-danger shadow btn-xs delete-user">Delete</button>

                                                    </div>
                                                <?php endif; ?>

                                            </td>
                                        </tr>

                                    <?php
                                        $id++;
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