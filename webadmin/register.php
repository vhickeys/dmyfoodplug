<?php
session_start();

if (isset($_SESSION['user_data']['fullName']) && isset($_SESSION['user_data']['email'])) {
    $_SESSION['message'] = "You are already logged in!";
    header("location: index.php");
    exit(0);
}

$title = "Register Admin";
include_once('components/head.php');
?>

<div class="content-body" style="min-height: 728px;">

    <div class="container-fluid">

        <!-- row -->
        <div class="row justify-content-center">
            <div class="col-md-4 col-sm-12 position-absolute top-50 start-50 translate-middle">
                <div class="card">
                    <div class="card-header">
                        <a href="javascript:void(0)"><img src="../assets/images/settings/<?= $webSetting['logo'] ?? 'dmy-logo.png' ?>" class="img-fluid" width="40%" alt="Dmy Foodplug Logo"></a>
                        <h4 class="card-title">Sign up Admin</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <div id="adminAlert">
                                Alert Message here..
                            </div>
                            <form id="adminSignup" name="adminform">
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Full Name</label>
                                        <input id="adminFname" name="firstname" type="text" class="form-control"
                                            placeholder="Full Name">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Email</label>
                                        <input id="adminEmail" name="email" type="email" class="form-control"
                                            placeholder="Email">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Password</label>
                                        <input id="adminPassword" name="password" type="password" class="form-control"
                                            placeholder="Password">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Confirm Password</label>
                                        <input id="adminConfirm" name="confirmPass" type="password" class="form-control"
                                            placeholder="Password">
                                    </div>
                                    <input type="hidden" value="0" name="role" id="role">
                                </div>
                                <div class="mb-3">
                                    <a href="login.php">Registered Already? Now Login</a>
                                </div>
                                <button id="adminSignupSubmit" type="submit" class="btn btn-primary w-100"
                                    name="adminform_btn">Sign
                                    Up</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once('components/footer.php');
include_once('components/scripts.php');
?>