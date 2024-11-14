<!-- rts footer one area start -->
<div class="rts-footer-area pt--80 bg_light-1 px-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="footer-main-content-wrapper pb--70 pb_sm--30">
                    <!-- single footer area wrapper -->
                    <div class="single-footer-wized">
                        <h3 class="footer-title">About Company</h3>
                        <p>We are into supplies of Fresh Cow, Goat, Ram Meat, <br> frozen proteins and farm produce on
                            weekly basis.</p>
                        <div class="call-area">
                            <div class="icon">
                                <i class="fa-solid fa-phone-rotary"></i>
                            </div>
                            <div class="info">
                                <span>Have Question? Call Us 24/7</span>
                                <a href="#" class="number">
                                    <?= $webSetting['phone'] ?>
                                </a>
                            </div>
                        </div>
                        <div class="call-area">
                            <div class="icon">
                                <i class="fa-solid fa-map-marker-alt"></i>
                            </div>
                            <div class="info pt-5">
                                <span>Office Address</span>
                                <a href="#" class="number">
                                    <?= addLineBreakAfterSpace($webSetting['office_address']) ?>
                                </a>
                            </div>
                        </div>
                        <div class="call-area">
                            <div class="icon">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div class="info">
                                <div class="info">
                                    <span>Email Address</span>
                                    <a href="#" class="number">
                                        <?= $webSetting['email'] ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- single footer area wrapper -->

                    <!-- single footer area wrapper -->
                    <div class="single-footer-wized">
                        <h3 class="footer-title">Dmy Categories</h3>
                        <div class="footer-nav">
                            <ul>
                                <?php if ($LimCategories != null) {
                                    foreach ($LimCategories as $limCategory) {
                                ?>
                                        <li><a href="category.php?cat=<?= $limCategory['slug'] ?>">
                                                <?= $limCategory['name'] ?>
                                            </a></li>
                                <?php
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <!-- single footer area wrapper -->
                    <!-- single footer area wrapper -->
                    <div class="single-footer-wized">
                        <h3 class="footer-title">Useful Links</h3>
                        <div class="footer-nav">
                            <ul>
                                <li><a href="shop.php">Shop</a></li>
                                <li><a href="contact.php">Report Infringement</a></li>
                                <li><a href="javascript:void(0)">Payments</a></li>
                                <li><a href="javascript:void(0)">FAQ</a></li>
                                <li><a href="javascript:void(0)">Website Visits (<?= $visitors_count = $record->countRecords("visitors"); ?>)
                                    </a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- single footer area wrapper -->
                    <!-- single footer area wrapper -->
                    <!-- <div class="single-footer-wized">
                        <h3 class="footer-title">Our Newsletter</h3>
                        <p class="disc-news-letter">
                            Subscribe to the mailing list to receive updates one <br> the new arrivals and other
                            discounts
                        </p>
                        <form class="" action="#">
                            <input class="mb-3" disabled type="name" placeholder="Your Name" required>
                            <input class="mb-3" disabled type="phone" placeholder="Your Phone Number" required>
                            <input class="mb-3" disabled type="phone" placeholder="Your Email" required>
                            <button disabled class="btn btn-primary">Subscribe</button>
                        </form>
                    </div> -->
                    <!-- single footer area wrapper -->
                </div>
                <div class="social-and-payment-area-wrapper">
                    <div class="payment-access">
                        <p class="disc">
                            Copyright
                            <?= date('Y') ?> <a href="#">© DMY GLOBAL COMPANY</a>. All rights reserved.
                        </p>
                    </div>
                    <div class="social-one-wrapper">
                        <span>Follow Us:</span>
                        <ul>
                            <li><a href="<?= $webSetting['whatsapp'] ?? 'https://wa.me/07035475073?text=Hello%2C%20I%20have%20a%20question%20about%20your%20product.%20Can%20you%20please%20help%20me%3F' ?>"><i class="fa-brands fa-whatsapp"></i></a>
                            </li>
                            <li><a href="<?= $webSetting['facebook'] ?: 'javascript:void(0)' ?>"><i class="fa-brands fa-facebook-f"></i></a>
                            </li>
                            <li><a href="<?= $webSetting['twitter'] ?: 'javascript:void(0)' ?>"><i class="fa-brands fa-twitter"></i></a></li>
                            <li><a href="<?= $webSetting['youtube'] ?: 'javascript:void(0)' ?>"><i class="fa-brands fa-youtube"></i></a></li>
                            <li><a href="<?= $webSetting['instagram'] ?: 'javascript:void(0)' ?>"><i class="fa-brands fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- rts footer one area end -->


<!-- modal -->
<!-- <div id="myModal-1" class="modal fade" role="dialog">
        <div class="modal-dialog bg_image">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-bs-dismiss="modal"><i class="fa-light fa-x"></i></button>
                </div>
                <div class="modal-body text-center">
                    <div class="inner-content">
                        <div class="content">
                            <span class="pre-title">Get up to 30% off on your first $150 purchase</span>
                            <h1 class="title">Feed Your Family at the  <br>
                                Best Price</h1>
                            <p class="disc">
                                We have prepared special discounts for you on grocery products. Don't <br> miss these opportunities...
                            </p>
                            <div class="rts-btn-banner-area">
                                <a href="#" class="rts-btn btn-primary radious-sm with-icon">
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
                                <div class="price-area">
                                    <span>
                                        from
                                    </span>
                                    <h3 class="title animated fadeIn">$80.99</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

<!-- successfully add in wishlist -->
<div class="successfully-addedin-wishlist">
    <div class="d-flex" style="align-items: center; gap: 15px;">
        <i class="fa-regular fa-check"></i>
        <p>Your item has already added in wishlist successfully</p>
    </div>
</div>
<!-- successfully add in wishlist end -->



<!-- Modal -->
<div class="modal modal-compare-area-start fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Products Compare</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="compare-main-wrapper-body">
                    <div class="single-compare-elements name">Preview</div>
                    <div class="single-compare-elements">
                        <div class="thumbnail-preview">
                            <img src="assets/images/grocery/01.jpg" alt="grocery">
                        </div>
                    </div>
                    <div class="single-compare-elements">
                        <div class="thumbnail-preview">
                            <img src="assets/images/grocery/02.jpg" alt="grocery">
                        </div>
                    </div>
                    <div class="single-compare-elements">
                        <div class="thumbnail-preview">
                            <img src="assets/images/grocery/03.jpg" alt="grocery">
                        </div>
                    </div>
                </div>
                <div class="compare-main-wrapper-body productname spacifiq">
                    <div class="single-compare-elements name">Name</div>
                    <div class="single-compare-elements">
                        <p>J.Crew Mercantile Women's Short</p>
                    </div>
                    <div class="single-compare-elements">
                        <p>Amazon Essentials Women's Tanks</p>
                    </div>
                    <div class="single-compare-elements">
                        <p>Amazon Brand - Daily Ritual Wom</p>
                    </div>
                </div>
                <div class="compare-main-wrapper-body productname">
                    <div class="single-compare-elements name">Price</div>
                    <div class="single-compare-elements price">
                        <p>$25.00</p>
                    </div>
                    <div class="single-compare-elements price">
                        <p>$39.25</p>
                    </div>
                    <div class="single-compare-elements price">
                        <p>$12.00</p>
                    </div>
                </div>
                <div class="compare-main-wrapper-body productname">
                    <div class="single-compare-elements name">Description</div>
                    <div class="single-compare-elements discription">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard</p>
                    </div>
                    <div class="single-compare-elements discription">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard</p>
                    </div>
                    <div class="single-compare-elements discription">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard</p>
                    </div>
                </div>
                <div class="compare-main-wrapper-body productname">
                    <div class="single-compare-elements name">Rating</div>
                    <div class="single-compare-elements">
                        <div class="rating">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <span>(25)</span>
                        </div>
                    </div>
                    <div class="single-compare-elements">
                        <div class="rating">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <span>(19)</span>
                        </div>
                    </div>
                    <div class="single-compare-elements">
                        <div class="rating">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <span>(120)</span>
                        </div>
                    </div>
                </div>
                <div class="compare-main-wrapper-body productname">
                    <div class="single-compare-elements name">Weight</div>
                    <div class="single-compare-elements">
                        <div class="rating">
                            <p>320 gram</p>
                        </div>
                    </div>
                    <div class="single-compare-elements">
                        <p>370 gram</p>
                    </div>
                    <div class="single-compare-elements">
                        <p>380 gram</p>
                    </div>
                </div>
                <div class="compare-main-wrapper-body productname">
                    <div class="single-compare-elements name">Stock status</div>
                    <div class="single-compare-elements">
                        <div class="instocks">
                            <span>In Stock</span>
                        </div>
                    </div>
                    <div class="single-compare-elements">
                        <div class="outstocks">
                            <span class="out-stock">Out Of Stock</span>
                        </div>
                    </div>
                    <div class="single-compare-elements">
                        <div class="instocks">
                            <span>In Stock</span>
                        </div>
                    </div>
                </div>
                <div class="compare-main-wrapper-body productname">
                    <div class="single-compare-elements name">Buy Now</div>
                    <div class="single-compare-elements">
                        <div class="cart-counter-action">
                            <a href="#" class="rts-btn btn-primary radious-sm with-icon">
                                <div class="btn-text">
                                    Add To Cart
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
                    <div class="single-compare-elements">
                        <div class="cart-counter-action">
                            <a href="#" class="rts-btn btn-primary radious-sm with-icon">
                                <div class="btn-text">
                                    Add To Cart
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
                    <div class="single-compare-elements">
                        <div class="cart-counter-action">
                            <a href="#" class="rts-btn btn-primary radious-sm with-icon">
                                <div class="btn-text">
                                    Add To Cart
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
        </div>
    </div>
</div>

<!--================= Preloader Section Start Here =================-->
<div id="weiboo-load">
    <div class="preloader-new">
        <svg class="cart_preloader" role="img" aria-label="Shopping cart_preloader line animation"
            viewBox="0 0 128 128" width="128px" height="128px" xmlns="http://www.w3.org/2000/svg">
            <g fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="8">
                <g class="cart__track" stroke="hsla(0,10%,10%,0.1)">
                    <polyline points="4,4 21,4 26,22 124,22 112,64 35,64 39,80 106,80" />
                    <circle cx="43" cy="111" r="13" />
                    <circle cx="102" cy="111" r="13" />
                </g>
                <g class="cart__lines" stroke="currentColor">
                    <polyline class="cart__top" points="4,4 21,4 26,22 124,22 112,64 35,64 39,80 106,80"
                        stroke-dasharray="338 338" stroke-dashoffset="-338" />
                    <g class="cart__wheel1" transform="rotate(-90,43,111)">
                        <circle class="cart__wheel-stroke" cx="43" cy="111" r="13" stroke-dasharray="81.68 81.68"
                            stroke-dashoffset="81.68" />
                    </g>
                    <g class="cart__wheel2" transform="rotate(90,102,111)">
                        <circle class="cart__wheel-stroke" cx="102" cy="111" r="13" stroke-dasharray="81.68 81.68"
                            stroke-dashoffset="81.68" />
                    </g>
                </g>
            </g>
        </svg>
    </div>
</div>
<!--================= Preloader End Here =================-->





<div class="search-input-area">
    <div class="container">
        <form action="products.php" method="get">
            <div class="search-input-inner">
                <div class="input-div">
                    <input name="search" class="search-input" type="text" placeholder="What are you looking for?">
                    <button type="submit"><i class="far fa-search"></i></button>
                </div>
            </div>
        </form>
    </div>
    <div id="close" class="search-close-icon"><i class="far fa-times"></i></div>
</div>
<div id="anywhere-home" class="anywere"></div>
<!-- progress area start -->
<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;">
        </path>
    </svg>
</div>
<!-- progress area end -->

<!-- plugins js -->
<script defer src="assets/js/plugins.js"></script>
<!-- custom js -->
<script defer src="assets/js/main.js"></script>
<script src="assets/alertifyjs/alertify.min.js"></script>
<script>
    alertify.set('notifier', 'position', 'top-right');
    <?php if (isset($_SESSION['error_message'])) : ?>
        alertify.error('<?= $_SESSION['error_message'] ?>');
        <?php unset($_SESSION['error_message']) ?>
    <?php elseif (isset($_SESSION['error_message'])) : ?>
        alertify.success('<?= $_SESSION['success_message'] ?>');
        <?php unset($_SESSION['success_message']) ?>
    <?php endif; ?>
</script>

<script defer src="assets/js/custom.js"></script>

<script src="https://static.elfsight.com/platform/platform.js" async></script>
<div class="elfsight-app-dd60181f-edf9-495f-a965-593f7fa6b437" data-elfsight-app-lazy></div>

</body>

</html>