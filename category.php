<?php

include_once 'components/head.php';

$CatExists = $category->getCategoryBySlug("categories", $_GET['cat'] ?? '');

if (!isset($_GET['cat']) || empty($_GET['cat']) || $CatExists == null) {
    echo "<script>window.history.back()</script>";
}

$catProducts = $product->getProductsByCatId($CatExists['id']);

include_once 'components/header.php';
include_once 'components/sidebar.php';

?>
<!-- rts contact main wrapper -->
<div class="rts-contact-main-wrapper-banner bg_image" style="background-image: url(assets/images/categories/banner.jpg) !important">
    <div class="container">
        <div class="row">
            <div class="co-lg-12">
                <div class="contact-banner-content">
                    <h1 class="title">
                        <?= $CatExists['name'] ?? '' ?>
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
                <div class="title-area-between">
                    <h2 class="title-left">
                        Our Latest Arrivals
                    </h2>
                    <ul class="nav nav-tabs best-selling-grocery">
                        <li class="nav-item" role="presentation">
                            <a href="products.php"><button class="nav-link active" aria-selected="true">View All</button></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="tab-content" id="myTabContent">
                    <!-- product area start-->
                    <div class="row g-4">
                        <?php if ($catProducts != null) {
                            foreach ($catProducts as $catProduct) {

                        ?>
                                <div class="col-xxl-2 col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12">
                                    <div class="single-shopping-card-one">
                                        <!-- iamge and sction area start -->
                                        <div class="image-and-action-area-wrapper">
                                            <a href="product.php?prod=<?= $catProduct['slug'] ?? '' ?>" class="thumbnail-preview">
                                                <img src="assets/images/products/<?= $catProduct['image'] ?: 'placeholder.png' ?>" alt="<?= $catProduct['name'] ?? '' ?> | Dmy Foodplug">
                                            </a>
                                            <div class="action-share-option">
                                                <span class="single-action openuptip message-show-action" data-flow="up" title="Add To Wishlist">
                                                    <i class="fa-light fa-heart"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <!-- iamge and sction area start -->
                                        <div class="body-content">

                                            <a href="product.php?prod=<?= $catProduct['slug'] ?? '' ?>">
                                                <h4 class="title"><?= $catProduct['name'] ?? '' ?></h4>
                                            </a>
                                            <span class="availability"><?= $catProduct['caption'] ?? '' ?></span>

                                            <?php if ($catProduct['price_range'] == '') : ?>

                                                <div class="price-area">
                                                    <span class="current">₦<?= number_format($catProduct['selling_price'] ?? '', 0, ".", ",")  ?></span>
                                                    <!-- <div class="previous">$36.00</div> -->
                                                </div>

                                            <?php elseif ($catProduct['price_range'] != '') : ?>

                                                <div class="price-area">
                                                    <span class="current"><?= $catProduct['price_range'] ?? '' ?></span>
                                                </div>

                                            <?php endif; ?>

                                            <div class="cart-counter-action">
                                                <div class="">

                                                </div>
                                                <a href="product.php?prod=<?= $catProduct['slug'] ?? '' ?>" class="rts-btn btn-primary radious-sm with-icon">
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
                                    <div class="alert alert-danger">No product under this category listed yet! Check back later.</div>
                                </div>
                            </div>

                        <?php
                        }
                        ?>
                    </div>
                    <!-- product area start-->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Products by category end -->
<?php
include_once 'components/footer.php';
?>