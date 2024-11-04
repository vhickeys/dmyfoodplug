<?php

include_once("classes/functions.php");

if (isset($_SESSION['user_data']['fullName']) && $record->getRecord('users', $_SESSION['user_data']['userId'])['access'] != 1) {
    $_SESSION['message'] = "You are already logged in!";
    header("location: index.php");
    exit(0);
}

$title = "Login";
include_once('components/head.php');
?>

<div class="page-wraper">
    <!-- Content -->
    <div class="browse-job login-style3">
        <!-- Coming Soon -->
        <div class="bg-img-fix overflow-hidden" style="background:#fff url(images/background/bg6.jpg); height: 100vh;">
            <div class="row gx-0">
                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12 vh-100 bg-white ">
                    <div id="mCSB_1" class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside"
                        style="max-height: 653px;" tabindex="0">
                        <div id="mCSB_1_container" class="mCSB_container" style="position:relative; top:0; left:0;"
                            dir="ltr">
                            <div class="login-form style-2">


                                <div class="card-body">
                                    <div class="logo-header text-center">
                                        <a href="javascript:void(0)"><img src="../assets/images/settings/<?= $webSetting['logo'] ?? 'dmy-logo.png' ?>" class="img-fluid" width="40%" alt="Dmy Foodplug Logo"></a>
                                    </div>

                                    <nav>
                                        <div class="nav nav-tabs border-bottom-0" id="nav-tab" role="tablist">

                                            <div class="tab-content w-100" id="nav-tabContent">
                                                <div class="tab-pane fade show active" id="nav-personal" role="tabpanel"
                                                    aria-labelledby="nav-personal-tab">

                                                    <?php include_once('components/alert_messages.php'); ?>

                                                    <div id="adminAlert">
                                                        Alert Message here..
                                                    </div>
                                                    <form class="dz-form pb-3" id="adminLogin">
                                                        <h3 class="form-title m-t0">Dmy Foodplug Admin Login</h3>
                                                        <div class="dz-separator-outer m-b5">
                                                            <div class="dz-separator bg-primary style-liner"></div>
                                                        </div>
                                                        <p>Enter your e-mail address and your password. </p>
                                                        <div class="form-group mb-3">
                                                            <input type="email" id="adminEmail" name="adminEmail"
                                                                class="form-control" placeholder="Enter your email">
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <input type="password" id="adminPassword"
                                                                class="form-control" name="adminPassword"
                                                                placeholder="Enter your password">
                                                        </div>
                                                        <div class="text-center bottom">
                                                            <button class="btn btn-primary button-md btn-block"
                                                                name="adminLoginSubmit" id="adminLoginSubmit"
                                                                data-bs-toggle="tab" type="submit" role="tab"
                                                                aria-controls="nav-sign"
                                                                aria-selected="false">Login</button>
                                                        </div>
                                                        <div class="d-flex flex-row mt-5 justify-content-center">
                                                            <div class="spinner-grow spinner-grow-sm text-danger me-2 spinner"
                                                                role="status">
                                                                <span class="sr-only">Loading...</span>
                                                            </div>
                                                            <div class="spinner-grow spinner-grow-sm text-info me-2 spinner"
                                                                role="status">
                                                                <span class="sr-only">Loading...</span>
                                                            </div>
                                                            <div class="spinner-grow spinner-grow-sm text-success me-2 spinner"
                                                                role="status">
                                                                <span class="sr-only">Loading...</span>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <!-- <div class="new-account mt-3">
                                                        <p>Dont have an account? <a class="text-primary"
                                                                href="register.php">Sign up</a></p>
                                                    </div> -->
                                                </div>
                                            </div>

                                        </div>
                                    </nav>
                                </div>
                                <div class="card-footer">
                                    <div class=" bottom-footer clearfix m-t10 m-b20 row text-center">
                                        <!-- <div class="col-lg-12 text-center">
                                                <span> © Copyright by <span class="heart"></span>
                                                    <a href="javascript:void(0);">DexignZone </a> All rights reserved.</span>
                                            </div> -->
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div id="mCSB_1_scrollbar_vertical"
                            class="mCSB_scrollTools mCSB_1_scrollbar mCS-light mCSB_scrollTools_vertical"
                            style="display: block;">
                            <div class="mCSB_draggerContainer">
                                <div id="mCSB_1_dragger_vertical" class="mCSB_dragger"
                                    style="position: absolute; min-height: 0px; display: block; height: 652px; max-height: 643px; top: 0px;">
                                    <div class="mCSB_dragger_bar" style="line-height: 0px;"></div>
                                    <div class="mCSB_draggerRail"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Full Blog Page Contant -->
    </div>
    <!-- Content END-->
</div>

<?php
include_once('components/footer.php');
include_once('components/scripts.php');
?>