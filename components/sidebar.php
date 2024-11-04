    <!-- header style two -->
    <div id="side-bar" class="side-bar header-two">
        <button class="close-icon-menu"><i class="far fa-times"></i></button>


        <form action="#" class="search-input-area-menu mt--30">
            <input type="text" placeholder="What are you looking for?" required>
            <button><i class="fa-light fa-magnifying-glass"></i></button>
        </form>

        <div class="mobile-menu-nav-area tab-nav-btn mt--20">

            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Menu</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Category</button>
                </div>
            </nav>

            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                    <!-- mobile menu area start -->
                    <div class="mobile-menu-main">
                        <nav class="nav-main mainmenu-nav mt--30">
                            <ul class="mainmenu metismenu" id="mobile-menu-active">
                                <li>
                                    <a href="index.php" class="main">Home</a>
                                </li>
                                <li>
                                    <a href="about-us.php" class="main">About Us</a>
                                </li>

                                <li class="has-droupdown">
                                    <a href="#" class="main">Category</a>
                                    <ul class="submenu mm-collapse">
                                        <?php if ($categories != null) {
                                            foreach ($categories as $category) {
                                        ?>
                                                <li><a class="mobile-menu-link" href="category.php?cat=<?= $category['slug'] ?>"><?= $category['name'] ?? 'No Data' ?></a></li>
                                        <?php
                                            }
                                        } ?>
                                    </ul>
                                </li>

                                <li>
                                    <a href="shop.php" class="main">Shop</a>
                                </li>
                                <li>
                                    <a href="contact.php" class="main">Contact</a>
                                </li>
                            </ul>
                        </nav>

                    </div>
                    <!-- mobile menu area end -->
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                    <div class="category-btn category-hover-header menu-category">
                        <ul class="category-sub-menu" id="category-active-menu">
                            <?php if ($categories != null) {
                                foreach ($categories as $category) {
                            ?>
                                    <li>
                                        <a href="category.php?cat=<?= $category['slug'] ?>" class="menu-item">
                                            <span><?= $category['name'] ?? 'No Data' ?></span>
                                        </a>
                                    </li>
                            <?php

                                }
                            } ?>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

        <!-- button area wrapper start -->
        <div class="button-area-main-wrapper-menuy-sidebar mt--50">
            <div class="contact-area">
                <div class="phone">
                    <i class="fa-light fa-headset"></i>
                    <a href="javascript:void(0)"><?= $webSetting['phone'] ?></a>
                </div>
            </div>
            <div class="buton-area-bottom">
                <a href="javascript:void(0)" class="rts-btn btn-primary">Sign In</a>
                <a href="javascript:void(0)" class="rts-btn btn-primary">Sign Up</a>
            </div>
        </div>
        <!-- button area wrapper end -->

    </div>
    <!-- header style two End -->