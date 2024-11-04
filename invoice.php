<?php
$page_title = 'Invoice';
include_once 'components/head.php';

$userExists = $cart->checkUserExists($_GET['inv'] ?? '');

if (!isset($_GET['inv']) || empty($_GET['inv']) || $userExists == []) {
    echo "<script>window.history.back()</script>";
}

include_once 'components/header.php';
include_once 'components/sidebar.php';

$cart_items = $cart->getCartItems(session_id());

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
                            <h6 class="title">Invoice</h6>
                            <span class="number">0152646678</span>
                            <span class="email"><?= $webSetting['email'] ?></span>
                            <span class="website">www.dmyfoodplug.com</span>
                        </div>
                    </div>
                    <div class="invoice-center-rts">
                        <div class="table-responsive">
                            <table class="table table-striped invoice-table">
                                <thead class="bg-active">
                                    <tr>
                                        <th>Item Item</th>
                                        <th class="text-center">Unit Price</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-right">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="item-desc-1">
                                                <span>Field Roast Chao Cheese Creamy Original</span>
                                                <small>SKU: FWM15VKT</small>
                                            </div>
                                        </td>
                                        <td class="text-center">$10.99</td>
                                        <td class="text-center">1</td>
                                        <td class="text-right">$10.99</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="item-desc-1">
                                                <span>Blue Diamond Almonds Lightly Salted</span>
                                                <small>SKU: FWM15VKT</small>
                                            </div>
                                        </td>
                                        <td class="text-center">$20.00</td>
                                        <td class="text-center">3</td>
                                        <td class="text-right">$60.00</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="item-desc-1">
                                                <span>Fresh Organic Mustard Leaves Bell Pepper</span>
                                                <small>SKU: KVM15VK</small>
                                            </div>
                                        </td>
                                        <td class="text-center">$640.00</td>
                                        <td class="text-center">1</td>
                                        <td class="text-right">$640.00</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="item-desc-1">
                                                <span>All Natural Italian-Style Chicken Meatballs</span>
                                                <small>SKU: 98HFG</small>
                                            </div>
                                        </td>
                                        <td class="text-center">$240.00</td>
                                        <td class="text-center">1</td>
                                        <td class="text-right">$240.00</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="text-end f-w-600">SubTotal</td>
                                        <td class="text-right">$1710.99</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="text-end f-w-600">Tax</td>
                                        <td class="text-right">$85.99</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="text-end f-w-600">
                                            Grand Total
                                        </td>
                                        <td class="text-right f-w-600">$1795.99</td>
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
                    <a href="javascript:window.print()" class="rts-btn btn-primary radious-sm with-icon">
                        <div class="btn-text">Print Now</div>
                        <div class="arrow-icon">
                            <i class="fa-regular fa-print"></i>
                        </div>
                        <div class="arrow-icon">
                            <i class="fa-regular fa-print"></i>
                        </div>
                    </a>
                    <a href="assets/images/invoice/invoice.pdf" download class="rts-btn btn-primary radious-sm with-icon">
                        <div class="btn-text">Download</div>
                        <div class="arrow-icon">
                            <i class="fa-thin fa-download"></i>
                        </div>
                        <div class="arrow-icon">
                            <i class="fa-thin fa-download"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="product-details-popup-wrapper">
    <div class="rts-product-details-section rts-product-details-section2 product-details-popup-section">
        <div class="product-details-popup">
            <button class="product-details-close-btn">
                <i class="fal fa-times"></i>
            </button>
            <div class="details-product-area">
                <div class="product-thumb-area">
                    <div class="cursor"></div>
                    <div class="thumb-wrapper one filterd-items figure">
                        <div class="product-thumb zoom" onmousemove="zoom(event)" style="
                    background-image: url(assets/images/products/product-details.jpg);
                  ">
                            <img src="assets/images/products/product-details.jpg" alt="product-thumb" />
                        </div>
                    </div>
                    <div class="thumb-wrapper two filterd-items hide">
                        <div class="product-thumb zoom" onmousemove="zoom(event)" style="
                    background-image: url(assets/images/products/product-filt2.jpg);
                  ">
                            <img src="assets/images/products/product-filt2.jpg" alt="product-thumb" />
                        </div>
                    </div>
                    <div class="thumb-wrapper three filterd-items hide">
                        <div class="product-thumb zoom" onmousemove="zoom(event)" style="
                    background-image: url(assets/images/products/product-filt3.jpg);
                  ">
                            <img src="assets/images/products/product-filt3.jpg" alt="product-thumb" />
                        </div>
                    </div>
                    <div class="product-thumb-filter-group">
                        <div class="thumb-filter filter-btn active" data-show=".one">
                            <img src="assets/images/products/product-filt1.jpg" alt="product-thumb-filter" />
                        </div>
                        <div class="thumb-filter filter-btn" data-show=".two">
                            <img src="assets/images/products/product-filt2.jpg" alt="product-thumb-filter" />
                        </div>
                        <div class="thumb-filter filter-btn" data-show=".three">
                            <img src="assets/images/products/product-filt3.jpg" alt="product-thumb-filter" />
                        </div>
                    </div>
                </div>
                <div class="contents">
                    <div class="product-status">
                        <span class="product-catagory">Dress</span>
                        <div class="rating-stars-group">
                            <div class="rating-star"><i class="fas fa-star"></i></div>
                            <div class="rating-star"><i class="fas fa-star"></i></div>
                            <div class="rating-star">
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <span>10 Reviews</span>
                        </div>
                    </div>
                    <h2 class="product-title">
                        Wide Cotton Tunic Dress <span class="stock">In Stock</span>
                    </h2>
                    <span class="product-price"><span class="old-price">$9.35</span> $7.25</span>
                    <p>
                        Priyoshop has brought to you the Hijab 3 Pieces Combo Pack PS23.
                        It is a completely modern design and you feel comfortable to put
                        on this hijab. Buy it at the best price.
                    </p>
                    <div class="product-bottom-action">
                        <div class="cart-edit">
                            <div class="quantity-edit action-item">
                                <button class="button">
                                    <i class="fal fa-minus minus"></i>
                                </button>
                                <input type="text" class="input" value="01" />
                                <button class="button plus">
                                    +<i class="fal fa-plus plus"></i>
                                </button>
                            </div>
                        </div>
                        <a href="#" class="rts-btn btn-primary radious-sm with-icon">
                            <div class="btn-text">Add To Cart</div>
                            <div class="arrow-icon">
                                <i class="fa-regular fa-cart-shopping"></i>
                            </div>
                            <div class="arrow-icon">
                                <i class="fa-regular fa-cart-shopping"></i>
                            </div>
                        </a>
                        <a href="javascript:void(0);" class="rts-btn btn-primary ml--20"><i class="fa-light fa-heart"></i></a>
                    </div>
                    <div class="product-uniques">
                        <span class="sku product-unipue"><span>SKU: </span> BO1D0MX8SJ</span>
                        <span class="catagorys product-unipue"><span>Categories: </span> T-Shirts, Tops, Mens</span>
                        <span class="tags product-unipue"><span>Tags: </span> fashion, t-shirts, Men</span>
                    </div>
                    <div class="share-social">
                        <span>Share:</span>
                        <a class="platform" href="http://facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a class="platform" href="http://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a class="platform" href="http://behance.com/" target="_blank"><i class="fab fa-behance"></i></a>
                        <a class="platform" href="http://youtube.com/" target="_blank"><i class="fab fa-youtube"></i></a>
                        <a class="platform" href="http://linkedin.com/" target="_blank"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'components/footer.php';
?>