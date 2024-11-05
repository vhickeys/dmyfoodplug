<?php
$page_title = 'Homepage';
include_once 'components/head.php';
include_once 'components/header.php';
include_once 'components/sidebar.php';

?>

<div class="background-light-gray-color rts-section-gap bg_light-1 pt-4">
    <!-- rts banner area start -->
    <div class="rts-banner-area-one mb--30">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="category-area-main-wrapper-one">
                        <div class="swiper mySwiper-category-1 swiper-data" data-swiper='{
                                "spaceBetween":1,
                                "slidesPerView":1,
                                "loop": true,
                                "speed": 2000,
                                "autoplay":{
                                    "delay":"4000"
                                },
                                "navigation":{
                                    "nextEl":".swiper-button-next",
                                    "prevEl":".swiper-button-prev"
                                },
                                "breakpoints":{
                                "0":{
                                    "slidesPerView":1,
                                    "spaceBetween": 0},
                                "320":{
                                    "slidesPerView":1,
                                    "spaceBetween":0},
                                "480":{
                                    "slidesPerView":1,
                                    "spaceBetween":0},
                                "640":{
                                    "slidesPerView":1,
                                    "spaceBetween":0},
                                "840":{
                                    "slidesPerView":1,
                                    "spaceBetween":0},
                                "1140":{
                                    "slidesPerView":1,
                                    "spaceBetween":0}
                                }
                            }'>
                            <div class="swiper-wrapper">
                                <!-- single swiper start -->
                                <div class="swiper-slide">
                                    <div class="banner-bg-image bg_image bg_one-banner  ptb--120 ptb_md--100 ptb_sm--180">
                                        <div class="banner-one-inner-content">
                                            <span class="pre text-white">We bring the market to your doorstep</span>
                                            <h1 class="title">Welcome to Dmy Foodplug</h1>
                                            <a href="shop.php" class="rts-btn btn-primary radious-sm with-icon">
                                                <div class="btn-text">
                                                    Shop Now
                                                </div>
                                                <div class="arrow-icon">
                                                    <i class="fa-light fa-arrow-right"></i>
                                                </div>
                                                <div class="arrow-icon">
                                                    <i class="fa-light fa-arrow-right"></i>
                                                </div>
                                            </a>
                                            <marquee behavior="" direction="" class="text-white mt-5">Fresh meat and frozen protein deliveries happen every Thursday | Export orders are shipped every Wednesday!</marquee>
                                        </div>
                                    </div>
                                </div>
                                <!-- single swiper start -->
                                <!-- single swiper start -->
                                <div class="swiper-slide">
                                    <div class="banner-bg-image bg_image bg_one-banner two  ptb--120 ptb_md--100 ptb_sm--180">
                                        <div class="banner-one-inner-content">
                                            <span class="pre text-white">We bring the market to your doorstep</span>
                                            <h1 class="title">Welcome to Dmy Foodplug</h1>
                                            <a href="shop.php" class="rts-btn btn-primary radious-sm with-icon">
                                                <div class="btn-text">
                                                    Shop Now
                                                </div>
                                                <div class="arrow-icon">
                                                    <i class="fa-light fa-arrow-right"></i>
                                                </div>
                                                <div class="arrow-icon">
                                                    <i class="fa-light fa-arrow-right"></i>
                                                </div>
                                            </a>
                                            <marquee behavior="" direction="" class="text-white mt-5">Fresh meat, frozen proteins delivery are limited to every Thursday | Export orders are sent out for shipment every Wednesday!</marquee>
                                        </div>
                                    </div>
                                </div>
                                <!-- single swiper start -->
                            </div>

                            <button class="swiper-button-next"><i class="fa-regular fa-arrow-right"></i></button>
                            <button class="swiper-button-prev"><i class="fa-regular fa-arrow-left"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- rts banner area end -->
    <!-- rts category area satart -->
    <div class="rts-caregory-area-one ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="category-area-main-wrapper-one">
                        <div class="swiper mySwiper-category-1 swiper-data" data-swiper='{
                                "spaceBetween":12,
                                "slidesPerView":10,
                                "loop": true,
                                "speed": 1000,
                                "breakpoints":{
                                "0":{
                                    "slidesPerView":2,
                                    "spaceBetween": 12},
                                "320":{
                                    "slidesPerView":2,
                                    "spaceBetween":12},
                                "480":{
                                    "slidesPerView":3,
                                    "spaceBetween":12},
                                "640":{
                                    "slidesPerView":4,
                                    "spaceBetween":12},
                                "840":{
                                    "slidesPerView":4,
                                    "spaceBetween":12},
                                "1140":{
                                    "slidesPerView":10,
                                    "spaceBetween":12}
                                }
                            }'>
                            <div class="swiper-wrapper">
                                <?php if ($categories != null) {
                                    foreach ($categories as $category) {

                                ?>
                                        <!-- single swiper start -->
                                        <div class="swiper-slide">
                                            <a href="category.php?cat=<?= $category['slug'] ?>" class="single-category-one">
                                                <img src="assets/images/categories/<?= $category['image'] ?: 'placeholder.png' ?>" alt="<?= $category['name'] ?> | Dmy Foodplug">
                                                <p><?= $category['name'] ?? 'No Data' ?></p>
                                            </a>
                                        </div>
                                        <!-- single swiper start -->
                                <?php

                                    }
                                } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- rts category area end -->
</div>

<!-- choosing reason service area start -->
<div class="rts-service-area rts-section-gap2 pt-0 bg_light-1">
    <div class="container-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-center-area-main">
                    <h2>
                        Why You Choose Us?
                    </h2>
                    <p class="disc">
                        We are your go-to source for premium fresh and frozen meats. We cater to all your weekly protein needs with high-quality products. As a trusted agrofoods exporter, we serve satisfied clients accross Europe and Africa.
                    </p>
                </div>
            </div>
        </div>
        <div class="row mt--30 mb-5 g-5">
            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="single-service-area-style-one">
                    <div class="icon-area">
                        <span class="bg-text">01</span>
                        <img src="assets/images/service/01.svg" alt="Dmy Foodplug">
                    </div>
                    <div class="bottom-content">
                        <h3 class="title">
                            Locally Sourced Products

                        </h3>
                        <p class="disc">
                            We partner with local farmers to bring you the freshest produce, meats, dairy e.t.c ensuring quality and supporting local economies.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="single-service-area-style-one">
                    <div class="icon-area">
                        <span class="bg-text">02</span>
                        <img src="assets/images/service/02.svg" alt="Dmy Foodplug">
                    </div>
                    <div class="bottom-content">
                        <h3 class="title">
                            Fresh and Frozen Meats
                        </h3>
                        <p class="disc">
                            Whether you're looking for fresh cuts or frozen options, our selection includes a wide variety of beef, poultry, lamb, and more.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="single-service-area-style-one">
                    <div class="icon-area">
                        <span class="bg-text">03</span>
                        <img src="assets/images/service/03.svg" alt="Dmy Foodplug">
                    </div>
                    <div class="bottom-content">
                        <h3 class="title">
                            Reliable Export Services
                        </h3>
                        <p class="disc">
                            With a focus on efficiency, reliability, and customer satisfaction, we handle the logistics of exporting your goods seamlessly
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- choosing reason service area end -->

<!-- rts blog area start -->
<div class="blog-area-start rts-section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-area-between">
                    <h2 class="title-left mb--0">
                        Our Categories
                    </h2>
                </div>
            </div>
        </div>
        <div class="row g-24">

            <?php if ($LimCategories != null) {
                foreach ($LimCategories as $category) {

            ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                        <!-- single category area start -->
                        <div class="single-blog-area-start style-two">
                            <a href="category.php?cat=<?= $category['slug'] ?>" class="thumbnail">
                                <img src="assets/images/categories/<?= $category['image'] ?: 'placeholder.png' ?>" alt="<?= $category['name'] ?> | Dmy Foodplug">
                            </a>
                            <div class="blog-body">
                                <!-- <div class="top-area">
                                    <div class="single-meta">
                                        <i class="fa-light fa-clock"></i>
                                        <span>15 Sep, 2023</span>
                                    </div>
                                    <div class="single-meta">
                                        <i class="fa-regular fa-folder"></i>
                                        <span>Modern Fashion</span>
                                    </div>
                                </div> -->
                                <a href="category.php?cat=<?= $category['slug'] ?>">
                                    <h4 class="title">
                                        <?= $category['name'] ?>
                                    </h4>
                                </a>
                            </div>
                        </div>
                        <!-- single category area end -->
                    </div>
                <?php
                }
            } else {
                ?>
                <div class="col-md-12">
                    <div class="single-blog-area-start style-two py-5 px-3">
                        <div class="alert alert-info">No Category Listed yet!</div>
                    </div>
                </div>
            <?php
            } ?>

            <center>
                <a href="categories.php"><button class="rts-btn btn-primary radious-sm mt-5">View All</button></a>
            </center>

        </div>
    </div>
</div>
<!-- rts blog area ends -->

<!-- best selling groceris -->
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
                        <?php if ($latestProducts != null) {
                            foreach ($latestProducts as $latestProduct) {

                        ?>
                                <div class="col-xxl-2 col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12">
                                    <div class="single-shopping-card-one">
                                        <!-- iamge and sction area start -->
                                        <div class="image-and-action-area-wrapper">
                                            <a href="product.php?prod=<?= $latestProduct['slug'] ?? '' ?>" class="thumbnail-preview">
                                                <img src="assets/images/products/<?= $latestProduct['image'] ?: 'placeholder.png' ?>" alt="<?= $latestProduct['name'] ?? '' ?> | Dmy Foodplug">
                                            </a>
                                            <div class="action-share-option">
                                                <span class="single-action openuptip message-show-action" data-flow="up" title="Add To Wishlist">
                                                    <i class="fa-light fa-heart"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <!-- iamge and sction area start -->
                                        <div class="body-content">

                                            <a href="product.php?prod=<?= $latestProduct['slug'] ?? '' ?>">
                                                <h4 class="title"><?= $latestProduct['name'] ?? '' ?></h4>
                                            </a>
                                            <span class="availability"><?= $latestProduct['caption'] ?? '' ?></span>

                                            <?php if ($latestProduct['price_range'] == '') : ?>

                                                <div class="price-area">
                                                    <span class="current">N<?= $latestProduct['selling_price'] ?? '' ?></span>
                                                    <!-- <div class="previous">$36.00</div> -->
                                                </div>

                                            <?php elseif ($latestProduct['price_range'] != '') : ?>

                                                <div class="price-area">
                                                    <span class="current"><?= $latestProduct['price_range'] ?? '' ?></span>
                                                </div>

                                            <?php endif; ?>

                                            <div class="cart-counter-action">
                                                <div class="">

                                                </div>
                                                <a href="product.php?prod=<?= $latestProduct['slug'] ?? '' ?>" class="rts-btn btn-primary radious-sm with-icon">
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
                        }
                        ?>
                    </div>
                    <!-- product area start-->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- best selling groceris end -->

<div class="rts-shorts-service-area rts-section-gap bg_primary">
    <div class="container">
        <div class="row text-center">
            <h4 class="text-white">Click to Join our meat sharing whatsapp group</h4>
            <div class="d-flex justify-content-center">
                <a class="me-3" href="<?= $webSetting['whatsapp_group'] ?: 'javascript:void(0)' ?>"><i class="fa-brands fa-whatsapp text-white" style="font-size: 30px;"></i></a>
                <a href="<?= $webSetting['whatsapp_group'] ?: 'javascript:void(0)' ?>"><i class="fa-brands fa-whatsapp text-white" style="font-size: 30px;"></i></a>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'components/footer.php';
?>