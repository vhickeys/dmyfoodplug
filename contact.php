<?php

$page_title = "Contact Us";
include_once 'components/head.php';
include_once 'components/header.php';
include_once 'components/sidebar.php';

?>
<!-- rts about main wrapper -->
<div class="rts-contact-main-wrapper-banner bg_image" style="background-image: url(assets/images/products/banner.jpg) !important">
    <div class="container">
        <div class="row">
            <div class="co-lg-12">
                <div class="contact-banner-content">
                    <h1 class="title">
                        Contact Us
                    </h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- rts about main wrapper end -->

<!-- rts counter area start -->
<div class="rts-counter-area">
    <div class="container-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="counter-area-main-wrapper">
                    <div class="single-counter-area">
                        <div class="icon" style="color: #e2750e; font-size: 25px">
                            <i class="fa-solid fa-map-marker-alt"></i>
                        </div>
                        <p><?= $webSetting['office_address'] ?? "" ?></p>
                    </div>
                    <div class="single-counter-area">
                        <div class="icon" style="color: #e2750e; font-size: 25px">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <p><?= $webSetting['phone'] ?? "" ?></p>
                    </div>
                    <div class="single-counter-area">
                        <div class="icon" style="color: #e2750e; font-size: 25px">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <p><?= $webSetting['email'] ?? "" ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- rts counter area end -->

<!-- rts contact-form area start -->
<div class="rts-contact-form-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="bg_light-1 contact-form-wrapper-bg">
                    <div class="row">
                        <div class="col-lg-7 pr--30 pr_md--10 pr_sm--5">
                            <div class="contact-form-wrapper-1">
                                <h3 class="title mb--50">
                                    Send us a message</h3>
                                <div id="userAlert">

                                </div>
                                <form class="contact-form-1">
                                    <div class="contact-form-wrapper--half-area">
                                        <div class="single">
                                            <input type="text" id="firstname" placeholder="First Name *">
                                        </div>
                                        <div class="single">
                                            <input type="text" id="lastname" placeholder="Last Name *">
                                        </div>
                                    </div>
                                    <div class="contact-form-wrapper--half-area">
                                        <div class="single">
                                            <input type="email" id="email" placeholder="Email *">
                                        </div>
                                        <div class="single">
                                            <input type="number" id="phone" placeholder="Phone Number">
                                        </div>
                                    </div>
                                    <div class="single-select">
                                        <input type="text" id="subject" placeholder="Subject *">
                                    </div>
                                    <textarea name="message" id="message" placeholder="Write Message Here"></textarea>
                                    <button type="submit" id="submit-contact" class="rts-btn btn-primary mt--20">Send Message</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-5 mt_md--30 mt_sm--30">
                            <div class="thumbnail-area">
                                <img src="assets/images/contact/02.jpg" alt="contact_form">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- rts contact-form area end -->

<div class="weekly-best-selling-area rts-section-gap bg_light-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-area-between">
                    <h2 class="title-left">
                        Trending Now
                    </h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="tab-content" id="myTabContent">
                    <!-- product area start-->
                    <div class="row g-4">
                        <?php if ($trendingProducts != []) {
                            foreach ($trendingProducts as $trendingProduct) {

                        ?>
                                <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                    <div class="single-shopping-card-one">
                                        <!-- iamge and sction area start -->
                                        <div class="image-and-action-area-wrapper">
                                            <a href="product.php?prod=<?= $trendingProduct['slug'] ?? '' ?>" class="thumbnail-preview">
                                                <img src="assets/images/products/<?= $trendingProduct['image'] ?: 'placeholder.png' ?>" alt="<?= $trendingProduct['name'] ?? '' ?> | Dmy Foodplug">
                                            </a>
                                            <div class="action-share-option">
                                                <span class="single-action openuptip message-show-action" data-flow="up" title="Add To Wishlist">
                                                    <i class="fa-light fa-heart"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <!-- iamge and sction area start -->
                                        <div class="body-content">

                                            <a href="product.php?prod=<?= $trendingProduct['slug'] ?? '' ?>">
                                                <h4 class="title"><?= $trendingProduct['name'] ?? '' ?></h4>
                                            </a>
                                            <span class="availability"><?= $trendingProduct['caption'] ?? '' ?></span>


                                            <?php if ($trendingProduct['price_range'] == '') : ?>

                                                <div class="price-area">
                                                    <span class="current">₦<?= number_format($trendingProduct['selling_price'] ?? '', 0, ".", ",")  ?></span>
                                                    <?php if ($trendingProduct['cost_price'] != '') : ?>
                                                        <div class="previous">₦<?= number_format($trendingProduct['cost_price'] ?? '', 0, ".", ",")  ?></div>
                                                    <?php endif; ?>
                                                </div>

                                            <?php elseif ($trendingProduct['price_range'] != '') : ?>

                                                <div class="price-area">
                                                    <span class="current"><?= $trendingProduct['price_range'] ?? '' ?></span>
                                                </div>

                                            <?php endif; ?>

                                            <div class="cart-counter-action">
                                                <div class="">

                                                </div>
                                                <a href="product.php?prod=<?= $trendingProduct['slug'] ?? '' ?>" class="rts-btn btn-primary radious-sm with-icon">
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

                            <div class="col-md-12">
                                <div class="single-shopping-card-one">
                                    <div class="body-content">
                                        <div class="alert alert-danger">No Trending Product Yet!</div>
                                    </div>
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

<?php
include_once 'components/footer.php';
?>