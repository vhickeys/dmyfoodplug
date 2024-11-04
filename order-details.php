<?php
$page_title = 'Order Details';
include_once 'components/head.php';

$userOrderExists = $order->checkUserOrderExists($_GET['ord'] ?? '', $_GET['trkNo']);

if (!isset($_GET['ord']) || empty($_GET['ord']) || !isset($_GET['trkNo']) || empty($_GET['trkNo']) ||  $userOrderExists == []) {
    echo "<script>window.history.back()</script>";
}

include_once 'components/header.php';
include_once 'components/sidebar.php';

$order_details = $order->getOrderDetails($_GET['ord'], $_GET['trkNo']);
$order = $order->getOrder($_GET['ord'], $_GET['trkNo']);
// echo "<pre>";
// print_r($order_details);

?>

<div class="rts-navigation-area-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="navigator-breadcrumb-wrapper">
                    <a href="index.php">Home</a>
                    <!-- <i class="fa-regular fa-chevron-right"></i>
                    <a class="#" href="index.html">Shop</a> -->
                    <i class="fa-regular fa-chevron-right"></i>
                    <a class="current" href="javascript:void(0)">Checkout</a>
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

<div class="rts-invoice-style-one">
    <div class="container-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="invoice-main-wrapper-1">
                    <div class="logo-top-area">
                        <div class="logo img-fluid">
                            <img src="assets/images/settings/<?= $webSetting['logo'] ?? 'dmy-logo.png' ?>" alt="DMY Foodplug" width="120px" />
                        </div>
                        <div class="invoice-location">
                            <h6 class="title">Order Summary</h6>
                            <span class="number">Tracking no: <?= $userOrderExists['tracking_no'] ?></span>
                            <span class="email"><?= $webSetting['email'] ?></span>
                            <span class="website">www.dmyfoodplug.com</span>
                        </div>
                    </div>
                    <div class="invoice-center-rts">
                        <div class="table-responsive">
                            <table class="table table-striped invoice-table">
                                <thead class="bg-active">
                                    <tr>
                                        <th>Order Item</th>
                                        <th class="text-center">Unit Price</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-right">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $subtotal = 0; // Initialize subtotal

                                    if ($order_details != []) :
                                        foreach ($order_details as $order_detail) :
                                            $product_price = $order_detail['product_price'];
                                            $product_qty = $order_detail['product_qty'];
                                            $product_price_total = $product_price * $product_qty;

                                            // Add to subtotal
                                            $subtotal += $product_price_total;
                                    ?>

                                            <tr>
                                                <td>
                                                    <div class="item-desc-1">
                                                        <span><?= $order_detail['product_name'] ?></span>
                                                    </div>
                                                </td>
                                                <td class="text-center">N<?= number_format($product_price, 0, '.', ',') ?></td>
                                                <td class="text-center"><?= $product_qty ?></td>
                                                <td class="text-right">N<?= number_format($product_price_total, 0, '.', ',') ?></td>
                                            </tr>

                                    <?php
                                        endforeach;
                                    endif;

                                    $shipping = 3000; // Shipping cost
                                    $grand_total = $subtotal + $shipping; // Calculate grand total
                                    ?>

                                    <tr>
                                        <td colspan="3" class="text-end f-w-600">SubTotal</td>
                                        <td class="text-right">N<?= number_format($subtotal, 0, '.', ',') ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="text-end f-w-600">Shipping</td>
                                        <td class="text-right">N<?= number_format($shipping, 0, '.', ',') ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="text-end f-w-600">Grand Total</td>
                                        <td class="text-right f-w-600">N<?= number_format($grand_total, 0, '.', ',') ?></td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <div class="invoice-area-bottom">
                        <div class="powerby">
                            <p>Powered by: Gravics Designs</p>
                            <!-- <img src="assets/images/logo/fav.png" alt="" /> -->
                        </div>
                        <p>
                            Note:This is computer generated receipt and does not require
                            physical signature.
                        </p>
                    </div>
                </div>

                <div class="buttons-area-invoice no-print mb--30">
                    <!-- <a href="javascript:window.print()" class="rts-btn btn-primary radious-sm with-icon">
                        <div class="btn-text">Print Now</div>
                        <div class="arrow-icon">
                            <i class="fa-regular fa-print"></i>
                        </div>
                        <div class="arrow-icon">
                            <i class="fa-regular fa-print"></i>
                        </div>
                    </a> -->
                    <a href="javascript:void(0)" download class="rts-btn btn-primary radious-sm with-icon">
                        <div class="btn-text">Download</div>
                        <div class="arrow-icon">
                            <i class="fa-thin fa-download"></i>
                        </div>
                        <div class="arrow-icon">
                            <i class="fa-thin fa-download"></i>
                        </div>
                    </a>

                    <form id="paymentForm">
                        <div class="row">
                            <input type="hidden" value="<?= $_GET['ord'] ?>" id="user_id">
                            <input type="hidden" value="<?= $order['id'] ?>" id="order_id">
                            <input type="hidden" value="<?= $_GET['trkNo'] ?>" id="tracking_no">

                            <input type="hidden" value="<?= $order['first_name'] ?>" class="form-control h-auto p-3 border-color-primary" id="first_name" required="">

                            <input type="hidden" value="<?= $order['last_name'] ?>" class="form-control h-auto p-3 border-color-primary" id="last_name" required="">

                            <input type="hidden" value="<?= $order['phone'] ?>" class="form-control h-auto p-3 border-color-primary" id="phone" required="">

                            <input type="hidden" value="<?= $order['email'] ?>" class="form-control h-auto p-3 border-color-primary" id="email" required="">

                            <input type="hidden" value="<?= $grand_total ?>" class="form-control h-auto p-3 border-color-primary" id="amount" required="">

                        </div>

                        <button type="submit" class="rts-btn btn-primary radious-sm with-icon" onclick="payWithPaystack()">
                            <div class="btn-text">Make Payment</div>
                            <div class="arrow-icon">
                                <!-- <i class="fa-pay fa-download"></i> -->
                            </div>
                            <div class="arrow-icon">
                                <i class="fa-thin fa-download"></i>
                            </div>
                        </button>
                    </form>

                    <script src="https://js.paystack.co/v1/inline.js"></script>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'components/footer.php';
?>