<?php

require('classes/functions.php');

authCheck();

$title = "Contact Requests";
include_once('components/head.php');
include_once('components/nav-header.php');
include_once('components/header.php');
include_once('components/sidebar.php');

$allContacts = $contact->getContacts();

?>

<!--**********************************
            Content body start
***********************************-->

<div class="content-body">
    <!-- row -->
    <div class="page-titles">
        <ol class="breadcrumb">
            <li>
                <h5 class="bc-title">View All Contact Requests</h5>
            </li>
            <li class="breadcrumb-item"><a href="index.php">
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Home </a>
            </li>
        </ol>
        <a class="text-primary fs-13" data-bs-toggle="offcanvas" href="#addNewUser" role="button" aria-controls="addNewUser">+ Add a user</a>
    </div>
    <div class="container-fluid">
        <div class="row">

            <div class="col-xl-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">View All Contacts</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display table" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $id = 1;
                                    if ($allContacts != null) {
                                        foreach ($allContacts as $contact) {
                                    ?>

                                            <tr>
                                                <td>
                                                    <?= $id ?>
                                                </td>
                                                <td>
                                                    <?= $contact['firstname'] . " " . $contact['lastname'] ?>
                                                </td>
                                                <td class="text-warning">
                                                    <?= $contact['email'] ?? "" ?>
                                                </td>
                                                <td class="text-primary">
                                                    <?= $contact['phone'] ?? "" ?>
                                                </td>
                                                <td class="text-info">
                                                    <?= $contact['subject'] ?? "" ?>
                                                </td>
                                                <td class="text-info">
                                                    <?= $contact['message'] ?? "" ?>
                                                </td>

                                                <td class="text-success">
                                                    <?php echo date("d-M-Y H:i:s", strtotime($contact['date'])) ?>
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