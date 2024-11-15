<?php
$page_title = 'Checkout';
include_once 'components/head.php';

$userExists = $cart->checkUserExists($_GET['uId'] ?? '');

if (!isset($_GET['uId']) || empty($_GET['uId']) || $userExists == []) {
    echo "<script>window.history.back()</script>";
}

if (isset($_GET['coupon']) || !empty($_GET['coupon'])) {
    $couponExists = $coupon->checkCouponExistStatus($_GET['coupon'] ?? '');
    $isCouponUsed = $coupon->isCouponUsed($_GET['coupon'] ?? '');
    if ($couponExists == []) {
        echo "<script>window.history.back()</script>";
    } elseif ($isCouponUsed > 0) {
        echo "<script>window.history.back()</script>";
    } else {
        $coupon_discount = $couponExists['discount'];
    }
}

include_once 'components/header.php';
include_once 'components/sidebar.php';

$cart_items = $cart->getCartItems(session_id());
$shippingLocations = $shipping->getShippingLocations();


// echo "<pre>";
// print_r($cart_items);

?>

<div class="rts-navigation-area-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="navigator-breadcrumb-wrapper">
                    <a href="index.html">Home</a>
                    <i class="fa-regular fa-chevron-right"></i>
                    <a class="#" href="index.html">Shop</a>
                    <i class="fa-regular fa-chevron-right"></i>
                    <a class="current" href="index.html">Checkout</a>
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


<div class="checkout-area rts-section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 pr--40 pr_md--5 pr_sm--5 order-1 order-xl-1 order-lg-1 order-md-2 order-sm-2 mt_md--30 mt_sm--30">
                <!-- <div class="coupon-input-area-1 login-form">
                    <div class="coupon-area">
                        <div class="coupon-ask">
                            <span>Returning customers?</span>
                            <button class="coupon-click"> Click here to login</button>
                        </div>
                        <div class="coupon-input-area">
                            <div class="inner">
                                <p>If you have shopped with us before, please enter your details below. If you are a new customer, please proceed to the Billing section.</p>
                                <form action="#">
                                    <input type="email" placeholder="User Name...">
                                    <input type="password" placeholder="Enter password...">

                                    <button type="submit" class="btn-primary rts-btn">Log In</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="coupon-input-area-1">
                    <div class="coupon-area">
                        <div class="coupon-ask  cupon-wrapper-1">
                            <button class="coupon-click">Have a coupon? Click here to enter your code</button>
                        </div>
                        <div class="coupon-input-area cupon1">
                            <div class="inner">
                                <p class="mt--0 mb--20"> If you have a coupon code, please apply it below.</p>
                                <div class="form-area">
                                    <input type="text" placeholder="Enter Coupon Code...">
                                    <button type="submit" class="btn-primary rts-btn">Apply Coupon</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

                <div class="rts-billing-details-area">
                    <h3 class="title">Billing Details</h3>
                    <form id="checkout">
                        <input type="hidden" id="user_id" name="user_id" value="<?= $_GET['uId'] ?? '' ?>">
                        <input type="hidden" id="coupon" name="coupon" value="<?= $_GET['coupon'] ?? '' ?>">
                        <div class="single-input">
                            <label for="email">Email Address*</label>
                            <input id="email" name="email" type="email">
                        </div>
                        <div class="half-input-wrapper">
                            <div class="single-input">
                                <label for="f-name">First Name*</label>
                                <input id="first_name" name="first_name" type="text">
                            </div>
                            <div class="single-input">
                                <label for="l-name">Last Name*</label>
                                <input id="last_name" name="last_name" type="text">
                            </div>
                        </div>
                        <div class="single-input">
                            <label for="country">Country / Region*</label>
                            <input id="country" name="country" type="text">
                        </div>

                        <div class="single-input">
                            <label for="pickup_location">Ship Product(s) To*</label>
                            <select id="pickup_location" name="pickup_location" class="form-select-lg w-100 my-5">
                                <option selected disabled value="">Select your pickup location</option>
                                <?php if ($shippingLocations != []) : ?>
                                    <?php foreach ($shippingLocations as $shippingLocation) : ?>
                                        <option value="<?= $shippingLocation['id'] ?>"><?= $shippingLocation['location'] . " - N" . $shippingLocation['shipping_fee'] ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>

                        <div class="single-input">
                            <label for="city">Town / City*</label>
                            <input id="city" name="city" type="text">

                        </div>

                        <div class="single-input">
                            <label for="city">Street Address*</label>
                            <input id="address" name="address" type="text">
                        </div>

                        <div class="single-input">
                            <label for="state">State*</label>
                            <input id="state" name="state" type="text">
                        </div>
                        <div class="single-input">
                            <label for="zip">Zip Code*</label>
                            <input id="zip_code" name="zip_code" type="text">
                        </div>
                        <div class="single-input">
                            <label for="phone">Phone*</label>
                            <input id="phone" name="phone" type="text">
                        </div>
                        <div class="single-input">
                            <label for="order_notes">Order Notes*</label>
                            <textarea id="order_notes" name="order_notes"></textarea>
                        </div>
                </div>
            </div>
            <div class="col-lg-4 order-2 order-xl-2 order-lg-2 order-md-1 order-sm-1">
                <h3 class="title-checkout">Your Order</h3>
                <div class="right-card-sidebar-checkout">
                    <div class="top-wrapper">
                        <div class="product">
                            Products
                        </div>
                        <div class="price">
                            Price
                        </div>
                    </div>

                    <?php if ($cart_items != null) : ?>
                        <?php foreach ($cart_items as $cart_item) : ?>
                            <div class="single-shop-list">
                                <div class="left-area">
                                    <a href="javascript:void(0)" class="thumbnail">
                                        <img src="assets/images/products/<?= $cart_item['product_image'] ?? 'placeholder.png' ?>" alt="DMY Foodplug">
                                    </a>
                                    <a href="javascript:void(0)" class="title">
                                        <?= $cart_item['product_name'] ?>
                                    </a>
                                </div>
                                <span class="price">N<?php
                                                        $product_price = 0;
                                                        if ($cart_item['prod_mrsmt_cat'] == '0' && $cart_item['prod_mrsmt_id'] == '0') {
                                                            $product_price = $cart_item['product_price'];
                                                            echo $product_price . " x " .  $cart_item['product_qty'];
                                                        } else {
                                                            $productNewPrice = $cart->getproductMsmtPrice($cart_item['prod_mrsmt_cat'], $cart_item['product_id'], $cart_item['prod_mrsmt_id']);
                                                            $product_price = $productNewPrice['new_price'];

                                                            if ($productNewPrice != []) {
                                                                echo $product_price . " x " .  $cart_item['product_qty'];
                                                            } else {
                                                                echo "NAN";
                                                            }
                                                        }
                                                        ?></span>
                            </div>
                        <?php endforeach; ?>

                        <div class="single-shop-list">
                            <div class="left-area">
                                <span>Subtotal</span>
                            </div>
                            <span class="price">
                                <?php

                                $total_price = 0;
                                $shipping_cost = 3000;

                                foreach ($cart_items as $cart_item) {
                                    $product_price = 0;

                                    // Determine the product price
                                    if ($cart_item['prod_mrsmt_cat'] == '0' && $cart_item['prod_mrsmt_id'] == '0') {
                                        $product_price = $cart_item['product_price'];
                                    } else {
                                        $productNewPrice = $cart->getproductMsmtPrice($cart_item['prod_mrsmt_cat'], $cart_item['product_id'], $cart_item['prod_mrsmt_id']);
                                        if ($productNewPrice != []) {
                                            $product_price = $productNewPrice['new_price'];
                                        } else {
                                            $product_price = "NAN";
                                        }
                                    }

                                    if (is_numeric($product_price)) {
                                        $quantity = $cart_item['product_qty'];
                                        $product_total = $product_price * $quantity;
                                        $total_price += $product_total;
                                    }
                                }

                                if (isset($couponExists) && $couponExists != []) {
                                    $discount_percentage = $coupon_discount;
                                    $discount_factor = $discount_percentage / 100;
                                    $discount = $discount_factor * $total_price;
                                    $total_price -= $discount;
                                }

                                echo "N" . number_format($total_price, 0, '.', ',');

                                ?>
                            </span>
                        </div>
                    <?php endif; ?>

                    <?php if (isset($couponExists) && $couponExists != []) : ?>

                        <div class="single-shop-list">
                            <div class="left-area">
                                <span>Discount Applied</span>
                            </div>
                            <span class="price"><?= $coupon_discount ?>% Discount</span>
                        </div>

                    <?php endif; ?>


                    <div class="single-shop-list">
                        <div class="left-area">
                            <span>Shipping</span>
                        </div>
                        <span class="price">N3,000 (Dynamic Rate)</span>
                    </div>
                    <div class="single-shop-list">
                        <span class="price">Kindly Note: Shipping fee will be updated after order is placed</span>
                    </div>
                    <div class="single-shop-list">
                        <div class="left-area">
                            <span style="font-weight: 600; color: #2C3C28;">Total Price:</span>
                        </div>
                        <span class="price" style="color: #629D23;">
                            <?php
                            $shipping_cost = 3000;
                            $total_with_shipping_cost = $total_price + $shipping_cost;
                            echo "N" . number_format($total_with_shipping_cost, 0, '.', ',');
                            ?>
                        </span>
                    </div>
                    <div class="cottom-cart-right-area">
                        <ul>
                            <li>
                                <input type="radio" id="f-options" value="bank_transfer" name="payment_mode">
                                <label for="f-options">Direct Bank Transfer</label>

                                <div class="check"></div>
                            </li>
                        </ul>
                        <p class="disc mb--25">
                            Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.
                        </p>
                        <ul>
                            <li>
                                <input type="radio" id="f-option" value="paystack" name="payment_mode" checked>
                                <label for="f-option">Paystack</label>

                                <div class="check"></div>
                            </li>
                        </ul>
                        <p class="mb--20">Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our privacy policy.</p>
                        <div class="single-category mb--30">
                            <input id="cat14" class="TandC" type="checkbox">
                            <label for="cat14"> I have read and agree terms and conditions *
                            </label>
                        </div>
                        <!-- <button type="submit" class="rts-btn btn-primary">Place Order</button> -->
                        <button type="submit" id="placeOrderButton" class="rts-btn btn-primary">
                            Place Order
                            <span class="spinner-border d-none" id="buttonSpinner" role="status" aria-hidden="true"></span>
                        </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'components/footer.php';
?>