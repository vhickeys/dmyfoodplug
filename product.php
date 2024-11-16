<?php

include_once 'components/head.php';

$prodExists = $product->getProductCatbySlug($_GET['prod'] ?? '');

if (!isset($_GET['prod']) || empty($_GET['prod']) || $prodExists == null) {
    echo "<script>window.history.back()</script>";
}

include_once 'components/header.php';
include_once 'components/sidebar.php';

$related_products = $product->relatedProducts($prodExists['category_id'], $prodExists['id']);
$product_weights = $product->getProdMsrmentById("product_weights", $prodExists['id']);
$product_sizes = $product->getProdMsrmentById("product_sizes", $prodExists['id']);
$product_slots = $product->getProdMsrmentById("product_slots", $prodExists['id']);

// print_r($product_weights);

?>

<div class="rts-navigation-area-breadcrumb bg_light-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="navigator-breadcrumb-wrapper">
                    <a href="index.php">Home</a>
                    <i class="fa-regular fa-chevron-right"></i>
                    <a class="#" href="category.php?cat=<?= $prodExists['category_slug'] ?? '' ?>">
                        <?= $prodExists['category_name'] ?? '' ?>
                    </a>
                    <i class="fa-regular fa-chevron-right"></i>
                    <a class="current" href="javascript:void(0)">
                        <?= $prodExists['name'] ?? '' ?>
                    </a>
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

<div class="rts-chop-details-area rts-section-gap bg_light-1">
    <div class="container">
        <div class="shopdetails-style-1-wrapper">
            <div class="row">

                <div class="rts-product-details-section">
                    <div class="details-product-area">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="product-thumb-area">
                                    <div class="cursor"></div>
                                    <div class="thumb-wrapper one filterd-items figure">
                                        <div class="product-thumb zoom" onmousemove="zoom(event)" style="background-image: url(assets/images/products/<?= $prodExists['image'] ?? 'placeholder.png' ?>)">
                                            <img src="assets/images/products/<?= $prodExists['image'] ?? 'placeholder.png' ?>" alt="product-thumb">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="contents product-dmy-data">
                                    <div class="product-status">
                                        <span class="product-catagory">
                                            <?= $prodExists['soldout'] == '1' ? 'Sold Out!' : 'Sale!' ?>
                                        </span>
                                        <div class="rating-stars-group">
                                            <div class="rating-star"><i class="fas fa-star"></i></div>
                                            <div class="rating-star"><i class="fas fa-star"></i></div>
                                            <div class="rating-star"><i class="fas fa-star-half-alt"></i></div>
                                            <span>0 Reviews</span>
                                        </div>
                                    </div>
                                    <h2 class="product-title">
                                        <?= $prodExists['name'] ?? '' ?>
                                    </h2>

                                    <?php if ($prodExists['price_range'] == '') : ?>

                                        <span class="product-price mb--40 d-block" style="color: #DC2626; font-weight: 600;">
                                            ₦<?= number_format($prodExists['selling_price'] ?? '', 0, ".", ",") ?>
                                            <?php if ($prodExists['cost_price'] != '') : ?>
                                                <span class="old-price ml--15">N
                                                    <?= number_format($prodExists['cost_price'] ?? '0', 0, ".", ",") ?>
                                                </span>
                                            <?php endif; ?>
                                        </span>

                                    <?php elseif ($prodExists['price_range'] != '') : ?>

                                        <span class="product-price mb--40 d-block" style="color: #DC2626; font-weight: 600;">
                                            <?= $prodExists['price_range'] ?? '' ?>
                                        </span>

                                    <?php endif; ?>

                                    <div class="product-uniques mb-5">
                                        <hr class="section-seperator">
                                        <span class="catagorys product-unipue my-5"><span style="font-weight: 400;">Category: </span>
                                            <?= $prodExists['category_name'] ?? '' ?></span>
                                        <hr class="section-seperator">

                                        <hr class="section-seperator">
                                        <span class="catagorys product-unipue my-5"><span style="font-weight: 400;">SKU:
                                            </span>
                                            <?= $prodExists['SKU'] ?? '' ?></span>

                                        <hr class="section-seperator">

                                        <?php if ($prodExists['price_range'] != '' && $prodExists['soldout'] == '0') : ?>

                                            <form id="addtoCartwithMrsmts">
                                                <div class="mb-5">

                                                    <input type="hidden" name="product_id" value="<?= $prodExists['id'] ?>">

                                                    <?php if ($product_weights != null) : ?>

                                                        <select class="form-select mt-3 mb-5 w-100" id="weight-select" onchange="updatePrice('weight-select')">
                                                            <option selected disabled>Select Weight (KG)</option>
                                                            <?php foreach ($product_weights as $product_weight) : ?>
                                                                <option value="<?= $product_weight['new_price'] ?>" data-id="<?= $product_weight['id'] ?>">
                                                                    <?= $product_weight['weight'] ?>
                                                                </option>

                                                            <?php endforeach; ?>
                                                        </select>

                                                        <!-- Hidden input fields -->
                                                        <input type="hidden" name="prod_mrsmt_id" id="prod_mrsmt_id">
                                                        <input type="hidden" name="prod_mrsmt_cat" value="product_weights">

                                                    <?php elseif ($product_sizes != null) : ?>

                                                        <select class="form-select mt-3 mb-5 w-100" id="size-select" onchange="updatePrice('size-select')">
                                                            <option selected disabled>Select Size</option>
                                                            <?php foreach ($product_sizes as $product_size) : ?>
                                                                <option value="<?= $product_size['new_price'] ?>" data-id="<?= $product_size['id'] ?>">
                                                                    <?= $product_size['size'] ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>

                                                        <!-- Hidden input fields -->
                                                        <input type="hidden" name="prod_mrsmt_id" id="prod_mrsmt_id">
                                                        <input type="hidden" name="prod_mrsmt_cat" value="product_sizes">

                                                    <?php elseif ($product_slots != null) : ?>

                                                        <select class="form-select mt-3 mb-5 w-100" id="slot-select" onchange="updatePrice('slot-select')">
                                                            <option selected disabled>Select Slot</option>
                                                            <?php foreach ($product_slots as $product_slot) : ?>
                                                                <option value="<?= $product_slot['new_price'] ?>" data-id="<?= $product_slot['id'] ?>">
                                                                    <?= $product_slot['slot'] ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>

                                                        <!-- Hidden input fields -->
                                                        <input type="hidden" name="prod_mrsmt_id" id="prod_mrsmt_id">
                                                        <input type="hidden" name="prod_mrsmt_cat" value="product_slots">

                                                    <?php endif; ?>

                                                </div>

                                                <div class="price-range-cart">

                                                    <div class="input-group mb-5 dmy-cart-input">
                                                        <input type="hidden" class="dmy-items-in-stock" value="<?= $prodExists['items_in_stock'] ?? '10' ?>">
                                                        <button type="button" class="input-group-text dmy-decrement-btn" style="width: auto !important">-</button>
                                                        <input type="hidden" class="form-control text-center bg-white dmy-prod-qty2" name="prodQty" value="1">
                                                        <input type="text" class="form-control text-center bg-white dmy-input-qty" value="1" disabled>
                                                        <button type="button" class="input-group-text dmy-increment-btn" style="width: auto !important">+</button>
                                                    </div>


                                                    <!-- <button type="submit" class="btn btn-primary py-4 dmy-add-cart">
                                                        Add To Cart
                                                        <i class="fa-regular fa-cart-shopping"></i>
                                                    </button> -->

                                                    <button type="submit" class="btn btn-primary py-4 dmy-add-cart">
                                                        <span class="spinner-border me-3 d-none" role="status" aria-hidden="true"></span>
                                                        Add To Cart
                                                        <i class="fa-regular fa-cart-shopping"></i>
                                                    </button>
                                                </div>
                                            </form>

                                        <?php endif; ?>

                                        <?php if ($prodExists['price_range'] == '' && $prodExists['soldout'] == '0') : ?>

                                            <div class="product-bottom-action mt-5">

                                                <div class="input-group mb-3 dmy-cart-input">
                                                    <input type="hidden" class="dmy-items-in-stock" value="<?= $prodExists['items_in_stock'] ?? '10' ?>">
                                                    <button type="button" class="input-group-text dmy-decrement-btn" style="width: auto !important">-</button>
                                                    <input type="text" class="form-control text-center bg-white dmy-input-qty" value="1" disabled>
                                                    <button type="button" class="input-group-text dmy-increment-btn" style="width: auto !important">+</button>
                                                </div>

                                            </div>

                                            <button value="<?= $prodExists['id'] ?>" id="dmyAddCart" class="btn btn-primary py-4 dmy-add-cart">
                                                <span class="spinner-border me-3 d-none" role="status" aria-hidden="true"></span>
                                                Add To Cart
                                                <i class="fa-regular fa-cart-shopping"></i>
                                            </button>

                                        <?php endif ?>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="product-discription-tab-shop">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Additional Information</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tabt" data-bs-toggle="tab" data-bs-target="#profile-tab-panes" type="button" role="tab" aria-controls="profile-tab-panes" aria-selected="false">Customer Reviews (01)</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                            <div class="single-tab-content-shop-details">
                                <p class="disc">
                                    <?= addLineBreakBetweenParagraphs($prodExists['description'] ?? '') ?>
                                </p>
                                <div class="table-responsive table-shop-details-pd">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>
                                                    <?= $prodExists['name'] ?? '' ?>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Other Info</td>
                                                <td>
                                                    <?= $prodExists['caption'] ?? '' ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile-tab-panes" role="tabpanel" aria-labelledby="profile-tabt" tabindex="0">
                            <div class="single-tab-content-shop-details">
                                <div class="product-details-review-product-style">
                                    <div class="average-stars-area-left">
                                        <div class="top-stars-wrapper">
                                            <h4 class="review">
                                                5.0
                                            </h4>
                                            <div class="rating-disc">
                                                <span>Average Rating</span>
                                                <div class="stars">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <span>(1 Reviews & 0 Ratings)</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="average-stars-area">
                                            <h4 class="average">66.7%</h4>
                                            <span>Recommended
                                                (2 of 3)</span>
                                        </div>
                                        <div class="review-charts-details">
                                            <div class="single-review">
                                                <div class="stars">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                                <div class="single-progress-area-incard">
                                                    <div class="progress">
                                                        <div class="progress-bar wow fadeInLeft" role="progressbar" style="width: 80%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <span class="pac">100%</span>
                                            </div>
                                            <div class="single-review">
                                                <div class="stars">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                </div>
                                                <div class="single-progress-area-incard">
                                                    <div class="progress">
                                                        <div class="progress-bar wow fadeInLeft" role="progressbar" style="width: 80%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <span class="pac">80%</span>
                                            </div>
                                            <div class="single-review">
                                                <div class="stars">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                </div>
                                                <div class="single-progress-area-incard">
                                                    <div class="progress">
                                                        <div class="progress-bar wow fadeInLeft" role="progressbar" style="width: 60%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <span class="pac">60%</span>
                                            </div>
                                            <div class="single-review">
                                                <div class="stars">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                </div>
                                                <div class="single-progress-area-incard">
                                                    <div class="progress">
                                                        <div class="progress-bar wow fadeInLeft" role="progressbar" style="width: 80%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <span class="pac">40%</span>
                                            </div>
                                            <div class="single-review">
                                                <div class="stars">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                </div>
                                                <div class="single-progress-area-incard">
                                                    <div class="progress">
                                                        <div class="progress-bar wow fadeInLeft" role="progressbar" style="width: 80%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <span class="pac">30%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="submit-review-area">
                                        <form action="#" class="submit-review-area">
                                            <h5 class="title">Submit Your Review</h5>
                                            <div class="your-rating">
                                                <span>Your Rating Of This Product :</span>
                                                <div class="stars">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                            </div>
                                            <div class="half-input-wrapper">
                                                <div class="half-input">
                                                    <input type="text" placeholder="Your Name*">
                                                </div>
                                                <div class="half-input">
                                                    <input type="text" placeholder="Your Email *">
                                                </div>
                                            </div>
                                            <textarea name="#" id="#" placeholder="Write Your Review" required></textarea>
                                            <button class="rts-btn btn-primary">SUBMIT REVIEW</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if ($related_products != null) : ?>

    <!-- rts grocery feature area start -->
    <div class="rts-grocery-feature-area mt--30 bg_light-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-area-between">
                        <h2 class="title-left">
                            Related Product
                        </h2>
                        <div class="next-prev-swiper-wrapper">
                            <div class="swiper-button-prev"><i class="fa-regular fa-chevron-left"></i></div>
                            <div class="swiper-button-next"><i class="fa-regular fa-chevron-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="category-area-main-wrapper-one">
                        <div class="swiper mySwiper-category-1 swiper-data" data-swiper='{
                                "spaceBetween":16,
                                "slidesPerView":6,
                                "loop": true,
                                "speed": 700,
                                "navigation":{
                                    "nextEl":".swiper-button-next",
                                    "prevEl":".swiper-button-prev"
                                },
                                "breakpoints":{
                                "0":{
                                    "slidesPerView":1,
                                    "spaceBetween": 12},
                                "380":{
                                    "slidesPerView":1,
                                    "spaceBetween":12},
                                "480":{
                                    "slidesPerView":2,
                                    "spaceBetween":12},
                                "640":{
                                    "slidesPerView":2,
                                    "spaceBetween":16},
                                "840":{
                                    "slidesPerView":3,
                                    "spaceBetween":16},
                                "1540":{
                                    "slidesPerView":6,
                                    "spaceBetween":16}
                                }
                            }'>
                            <div class="swiper-wrapper">
                                <!-- single swiper start -->

                                <?php if ($related_products != null) {
                                    foreach ($related_products as $product) {
                                ?>
                                        <div class="swiper-slide">
                                            <div class="single-shopping-card-one">
                                                <!-- iamge and sction area start -->
                                                <div class="image-and-action-area-wrapper">
                                                    <a href="product.php?prod=<?= $product['slug'] ?? '' ?>" class="thumbnail-preview">
                                                        <img src="assets/images/products/<?= $product['image'] ?: 'placeholder.png' ?>" alt="<?= $product['name'] ?? '' ?> | Dmy Foodplug">
                                                    </a>
                                                    <div class="action-share-option">
                                                        <span class="single-action openuptip message-show-action" data-flow="up" title="Add To Wishlist">
                                                            <i class="fa-light fa-heart"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <!-- iamge and sction area start -->
                                                <div class="body-content">

                                                    <a href="product.php?prod=<?= $product['slug'] ?? '' ?>">
                                                        <h4 class="title">
                                                            <?= $product['name'] ?? '' ?>
                                                        </h4>
                                                    </a>
                                                    <span class="availability">
                                                        <?= $product['caption'] ?? '' ?>
                                                    </span>

                                                    <div class="price-area">
                                                        <?php if ($product['price_range'] == '') : ?>

                                                            <span class="current">₦<?= number_format($product['selling_price'] ?? '', 0, ".", ",")  ?>
                                                                <?php if ($product['cost_price'] != '') : ?>
                                                                    <span class="previous">₦<?= number_format($product['cost_price'] ?? '0', 0, ".", ",")  ?></span>
                                                                <?php endif; ?>
                                                            </span>

                                                        <?php elseif ($product['price_range'] != '') : ?>

                                                            <span class="product-price mb--40 d-block" style="color: #DC2626; font-weight: 600;">
                                                                <?= $product['price_range'] ?? '' ?>
                                                            </span>

                                                        <?php endif; ?>
                                                    </div>

                                                    <div class="cart-counter-action">
                                                        <div class="">

                                                        </div>
                                                        <a href="product.php?prod=<?= $product['slug'] ?? '' ?>" class="rts-btn btn-primary radious-sm with-icon">
                                                            <div class="btn-text">
                                                                Add
                                                            </div>
                                                            <div class="arrow-icon">
                                                                <i class="fa-regular fa-cart-shopping"></i>
                                                            </div>
                                                            <div class="arrow-icon">
                                                                <i class="fa-regular fa-cart-shopping"></i>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <div class="col-12 my-0 py-0">
                                        <div class="single-shopping-card-one">
                                            <div class="alert alert-warning">No related product! Check other categories</div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>

                                <!-- single swiper start -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- rts grocery feature area end -->

<?php endif; ?>

<?php
include_once 'components/footer.php';
?>