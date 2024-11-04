<?php

$page_title = "Our Categories";
include_once 'components/head.php';
include_once 'components/header.php';
include_once 'components/sidebar.php';

?>
<!-- rts contact main wrapper -->
<div class="rts-contact-main-wrapper-banner bg_image" style="background-image: url(assets/images/categories/banner-2.jpg) !important">
    <div class="container">
        <div class="row">
            <div class="co-lg-12">
                <div class="contact-banner-content">
                    <h1 class="title">
                        Categories
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
                    <!-- categories area start-->
                    <div class="row g-24">

                        <?php if ($categories != null) {
                            foreach ($categories as $category) {

                        ?>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <!-- single category area start -->
                                    <div class="single-blog-area-start style-two">
                                        <a href="category.php?cat=<?= $category['slug'] ?>" class="thumbnail">
                                            <img src="assets/images/categories/<?= $category['image'] ?: 'placeholder.png' ?>" alt="<?= $category['name'] ?> | Dmy Foodplug">
                                        </a>
                                        <div class="blog-body">
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
                    </div>
                    <!-- categories area start-->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Products by category end -->
<?php
include_once 'components/footer.php';
?>