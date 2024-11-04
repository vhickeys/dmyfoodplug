<?php

$page_title = "About Us";
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
                        About Us
                    </h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- rts about main wrapper end -->

<!-- about area start -->
<div class="rts-about-area mt-5">
    <div class="container-3">
        <div class="row justify-content-center mb-5 pt-5">
            <div class="col-lg-8 pl--60 pl_md--10 pt_md--30 pl_sm--10 pt_sm--30">
                <div class="about-content-area-1">
                    <p class="disc">
                        <?= addLineBreakBetweenParagraphs($webSetting['about']) ?>
                    </p>
                </div>

                <div class="row mb-5">
                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                        <div class="single-counter-area mb-4">
                            <h2 class="title"><span class="counter"><?= $products_count ?? "1240" ?></span>+</h2>
                            <p>
                                Food Products
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                        <div class="single-counter-area mb-4">
                            <h2 class="title"><span class="counter">1,200</span>+</h2>
                            <p>
                                Happy Clients
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                        <div class="single-counter-area mb-4">
                            <h2 class="title"><span class="counter">100</span>%</h2>
                            <p>
                                Satisfaction Rate
                            </p>
                        </div>
                    </div>
                </div>

                <center>
                    <a href="contact.php" class="rts-btn btn-primary mb-5">Contact Us</a>
                </center>

            </div>
        </div>
    </div>
</div>
<!-- about area end -->

<?php
include_once 'components/footer.php';
?>