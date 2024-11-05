<?php
$page_title = 'Cart';
include_once 'components/head.php';
include_once 'components/header.php';
include_once 'components/sidebar.php';

$cart_items = $cart->getCartItems(session_id());

// echo "<pre>";
// print_r($cart_items);

?>

<div class="rts-navigation-area-breadcrumb bg_light-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="navigator-breadcrumb-wrapper">
                    <a href="index.php">Home</a>
                    <i class="fa-regular fa-chevron-right"></i>
                    <a class="current" href="cart.php">Carts</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section-seperator bg_light-1">
    <div class="container">
        <hr class="section-seperator">
    </div>
</div>

<!-- rts cart area start -->
<div class="rts-cart-area rts-section-gap bg_light-1">
    <div class="container">


        <div class="row g-5" id="dmyCart">
            <?php if ($cart_items != null) : ?>
                <div class="col-xl-9 col-lg-12 col-md-12 col-12 ">
                    <!-- <div class="cart-area-main-wrapper">
                        <div class="cart-top-area-note">
                            <p>Add <span>$59.69</span> to cart and get free shipping</p>
                            <div class="bottom-content-deals mt--10">
                                <div class="single-progress-area-incard">
                                    <div class="progress">
                                        <div class="progress-bar wow fadeInLeft" role="progressbar" style="width: 80%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="rts-cart-list-area">
                        <div class="single-cart-area-list head">
                            <div class="product-main">
                                <P>Products</P>
                            </div>
                            <div class="price">
                                <p>Price</p>
                            </div>
                            <div class="quantity">
                                <p>Quantity</p>
                            </div>
                        </div>

                        <?php foreach ($cart_items as $cart_item) : ?>

                            <div class="single-cart-area-list main dmy-item-parent">
                                <div class="product-main-cart">

                                    <div class="thumbnail">
                                        <img src="assets/images/products/<?= $cart_item['product_image'] ?? 'placeholder.png' ?>" alt="DMY Foodplug">
                                    </div>
                                    <div class="information">
                                        <h6 class="title">
                                            <?= $cart_item['product_name'] ?>
                                        </h6>
                                        <?php if ($cart_item['product_sku'] != '') : ?>
                                            <span>SKU:
                                                <?= $cart_item['product_sku'] ?>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="price">
                                    <p>N<?php
                                        $product_price = 0;
                                        if ($cart_item['prod_mrsmt_cat'] == '0' && $cart_item['prod_mrsmt_id'] == '0') {
                                            $product_price = $cart_item['product_price'];
                                            echo $product_price;
                                        } else {
                                            $productNewPrice = $cart->getproductMsmtPrice($cart_item['prod_mrsmt_cat'], $cart_item['product_id'], $cart_item['prod_mrsmt_id']);
                                            $product_price = $productNewPrice['new_price'];

                                            if ($productNewPrice != []) {
                                                echo $product_price;
                                            } else {
                                                echo "NAN";
                                            }
                                        }
                                        ?>
                                    </p>
                                </div>
                                <div class="quantity">
                                    <div class="input-group dmy-cart-input">
                                        <input type="hidden" class="cart_product_id" value="<?= $cart_item['product_id'] ?>" id="">
                                        <input type="hidden" class="dmy-items-in-stock" value="<?= $cart_item['product_stock'] ?? '10' ?>">
                                        <button type="button" class="input-group-text dmy-decrement-btn update-dmy-cart" style="width: auto !important">-</button>
                                        <input type="text" class="form-control text-center bg-white dmy-input-qty" value="<?= $cart_item['product_qty'] ?>" disabled>
                                        <button type="button" class="input-group-text dmy-increment-btn update-dmy-cart" style="width: auto !important">+</button>
                                    </div>
                                </div>
                                <div>
                                    <button class="ms-4 btn btn-danger deleteCartItem" value="<?= $cart_item['id'] ?>"><i class="fas fa-trash"></i></button>
                                </div>
                            </div>

                        <?php endforeach; ?>

                        <div class="bottom-cupon-code-cart-area">
                            <form action="javascript:void(0)">
                                <input type="text" placeholder="Cupon Code">
                                <button class="rts-btn btn-primary">Apply Coupon</button>
                            </form>
                            <button class="rts-btn btn-primary mr--50 deleteAllCartItems">Clear All</button>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-12 col-md-12 col-12 ">
                    <div class="cart-total-area-start-right">
                        <h5 class="title">Cart Totals</h5>

                        <div class="shipping">
                            <span>Shipping</span>
                            <ul>
                                <!-- <li>
                                    <input type="radio" id="f-option" name="selector">
                                    <label for="f-option"> Shipping</label>

                                    <div class="check"></div>
                                </li> -->

                                <li>
                                    <label for="s-option">Dynamic Rate: N3,000 (Price may differ with location)</label>

                                    <div class="check">
                                        <div class="inside"></div>
                                    </div>
                                </li>
                                <!-- 
                                <li>
                                    <input type="radio" id="t-option" name="selector">
                                    <label for="t-option">Local Pickup</label>

                                    <div class="check">
                                        <div class="inside"></div>
                                    </div>
                                </li> -->

                            </ul>
                        </div>
                        <div class="bottom">
                            <div class="wrapper">
                                <span>Subtotal</span>
                                <h6 class="price">
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

                                    echo "N" . number_format($total_price, 0, '.', ',');

                                    ?>

                                </h6>
                            </div>
                            <div class="button-area">
                                <a href="checkout.php?uId=<?= session_id() ?>"><button class="rts-btn btn-primary">Proceed To Checkout</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else : ?>
                <div class="col-md-12">
                    <div class="cart-area-main-wrapper">
                        <div class="cart-top-area-note">
                            <p>No item in cart. </p>
                            <a href="products.php"><button class="rts-btn btn-primary">Continue shopping!</button></a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

        </div>


    </div>
</div>
<!-- rts cart area end -->

<?php
include_once 'components/footer.php';
?>