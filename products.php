<?php

$page_title = "Our Products";
include_once 'components/head.php';
include_once 'components/header.php';
include_once 'components/sidebar.php';

?>
<!-- rts contact main wrapper -->
<div class="rts-contact-main-wrapper-banner bg_image" style="background-image: url(assets/images/products/banner.jpg) !important">
    <div class="container">
        <div class="row">
            <div class="co-lg-12">
                <div class="contact-banner-content">
                    <h1 class="title">
                        Products
                    </h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- rts contact main wrapper end -->

<!-- Products by category -->
<div class="weekly-best-selling-area rts-section-gap bg_light-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="tab-content" id="myTabContent">
                    <!-- product area start-->
                    <div class="row g-4">
                        <?php if ($paginated_products != null) {
                            foreach ($paginated_products as $product) {

                        ?>
                                <div class="col-xxl-2 col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12">
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
                                                <h4 class="title"><?= $product['name'] ?? '' ?></h4>
                                            </a>
                                            <span class="availability"><?= $product['caption'] ?? '' ?></span>

                                            <?php if ($product['price_range'] == '') : ?>

                                                <div class="price-area">
                                                    <span class="current">₦<?= number_format($product['selling_price'] ?? '', 0, ".", ",")  ?></span>
                                                    <!-- <div class="previous">$36.00</div> -->
                                                </div>

                                            <?php elseif ($product['price_range'] != '') : ?>

                                                <div class="price-area">
                                                    <span class="current"><?= $product['price_range'] ?? '' ?></span>
                                                </div>

                                            <?php endif; ?>

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
                                    <div class="alert alert-danger">Product not found!</div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <!-- product area start-->
                </div>
            </div>
            <div class="row mt--50">
                <div class="col-lg-12">
                    <div class="pagination-area-main-wrappper">
                        <ul>
                            <?= paginationLinks($currentPage, $totalPages) ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Products by category end -->
<?php
include_once 'components/footer.php';
?>