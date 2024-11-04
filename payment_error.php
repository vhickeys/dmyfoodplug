<?php
$page_title = 'Payment Success';
include_once 'components/head.php';

$userOrderExists = $order->checkUserOrderExists($_GET['userID'] ?? '', $_GET['trkNo']);

if (!isset($_GET['userID']) || empty($_GET['userID']) || !isset($_GET['trkNo']) || empty($_GET['trkNo']) ||  $userOrderExists == []) {
    echo "<script>window.history.back()</script>";
}

include_once 'components/header.php';
include_once 'components/sidebar.php';

// echo "<pre>";
// print_r($order_details);

?>

<div class="rts-navigation-area-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="navigator-breadcrumb-wrapper">
                    <a href="index.php">Home</a>
                    <a class="current" href="javascript:void(0)">Payment Success</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section-seperator">
    <div class="container">
        <hr class="section-seperator">
    </div>
</div>

<div class="rts-cart-area rts-section-gap bg_light-1 mb-0">
    <div class="container">


        <div class="row g-5">
            <div class="col-md-12">
                <div class="cart-area-main-wrapper">
                    <div class="cart-top-area-note">
                        <center>
                            <i class="fas fa-times-circle" style="color: #DC2626; font-size: 200px; padding-bottom: 4rem"></i>

                            <p>Your payment was unsuccessful.</p>
                            <a href="products.php"><button class="rts-btn btn-primary">See other products!</button></a>
                        </center>
                    </div>
                </div>
            </div>

        </div>


    </div>
</div>

<?php
include_once 'components/footer.php';
?>