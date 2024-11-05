    <!-- rts header area start -->
    <div class="rts-header-one-area-one">
        <div class="header-top-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bwtween-area-header-top">
                            <div class="discount-area">
                                <p class="disc">Fresh meat and frozen protein deliveries happen every Thursday | Export orders are shipped every Wednesday! </p>
                            </div>
                            <div class="contact-number-area">
                                <p>Need help? Call Us:
                                    <a href="javascript:void(0)"><?= $webSetting['phone'] ?></a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="search-header-area-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="logo-search-category-wrapper">
                            <a href="index.php" class="logo-area">
                                <img src="assets/images/settings/<?= $webSetting['logo'] ?? 'dmy-logo' ?>" width="30%" alt="Dmy Foodplug Logo" class="logo">
                            </a>
                            <div class="category-search-wrapper">
                                <div class="category-btn category-hover-header">
                                    <img class="parent" src="assets/images/icons/bar-1.svg" alt="Dmy Foodplug">
                                    <span>Categories</span>
                                    <ul class="category-sub-menu" id="category-active-four">

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
                                <form action="products.php" class="search-header">
                                    <input type="text" placeholder="What are you looking for? Search for item" name="search" required>
                                    <button type="submit" class="rts-btn btn-primary radious-sm with-icon">
                                        <div class="btn-text">
                                            Search
                                        </div>
                                        <div class="arrow-icon">
                                            <i class="fa-light fa-magnifying-glass"></i>
                                        </div>
                                        <div class="arrow-icon">
                                            <i class="fa-light fa-magnifying-glass"></i>
                                        </div>
                                    </button>
                                </form>
                            </div>
                            <div class="actions-area">
                                <div class="search-btn" id="searchs">

                                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.75 14.7188L11.5625 10.5312C12.4688 9.4375 12.9688 8.03125 12.9688 6.5C12.9688 2.9375 10.0312 0 6.46875 0C2.875 0 0 2.9375 0 6.5C0 10.0938 2.90625 13 6.46875 13C7.96875 13 9.375 12.5 10.5 11.5938L14.6875 15.7812C14.8438 15.9375 15.0312 16 15.25 16C15.4375 16 15.625 15.9375 15.75 15.7812C16.0625 15.5 16.0625 15.0312 15.75 14.7188ZM1.5 6.5C1.5 3.75 3.71875 1.5 6.5 1.5C9.25 1.5 11.5 3.75 11.5 6.5C11.5 9.28125 9.25 11.5 6.5 11.5C3.71875 11.5 1.5 9.28125 1.5 6.5Z" fill="#1F1F25"></path>
                                    </svg>

                                </div>
                                <div class="menu-btn" id="menu-btn">

                                    <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect y="14" width="20" height="2" fill="#1F1F25"></rect>
                                        <rect y="7" width="20" height="2" fill="#1F1F25"></rect>
                                        <rect width="20" height="2" fill="#1F1F25"></rect>
                                    </svg>

                                </div>
                            </div>
                            <div class="accont-wishlist-cart-area-header">
                                <a href="javascript:void(0)" class="btn-border-only account">
                                    <i class="fa-light fa-user"></i>
                                    <span>Account</span>
                                </a>
                                <!-- <a href="wishlist.php" class="btn-border-only wishlist">
                                    <i class="fa-regular fa-heart"></i>
                                    <span class="text">Wishlist</span>
                                    <span class="number">2</span>
                                </a> -->
                                <div class="btn-border-only cart category-hover-header">
                                    <i class="fa-sharp fa-regular fa-cart-shopping"></i>
                                    <span class="text">Cart</span>
                                    <span class="number cart-items-count"><?= $cartItemsCount ?? '0' ?></span>
                                    <a href="cart.php" class="over_link"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="rts-header-nav-area-one header--sticky">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="nav-and-btn-wrapper">
                            <div class="nav-area">
                                <nav>
                                    <ul class="parent-nav">
                                        <li class="parent"><a href="index.php">Home</a></li>
                                        <li class="parent"><a href="about-us.php">About Us</a></li>
                                        <li class="parent has-dropdown">
                                            <a class="nav-link" href="javascript:void(0)">Categories</a>
                                            <ul class="submenu">
                                                <?php if ($categories != null) {
                                                    foreach ($categories as $category) {

                                                ?>
                                                        <li><a class="sub-b" href="category.php?cat=<?= $category['slug'] ?>"><?= $category['name'] ?? 'No Data' ?></a></li>
                                                <?php

                                                    }
                                                } ?>
                                            </ul>
                                        </li>
                                        <li class="parent"><a href="shop.php">Shop</a></li>
                                        <li class="parent"><a href="contact.php">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- button-area -->
                            <div class="right-btn-area">
                                <a href="products.php"><button class="rts-btn btn-dark">
                                        Trending Products</button></a>
                            </div>
                            <!-- button-area end -->
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="logo-search-category-wrapper after-md-device-header">
                            <a href="index.php" class="logo-area">
                                <img src="assets/images/settings/<?= $webSetting['logo'] ?? 'dmy-logo.png' ?>" width="50%" alt="Dmy Foodplug Logo" class="logo">
                            </a>
                            <div class="category-search-wrapper">
                                <div class="category-btn category-hover-header">
                                    <img class="parent" src="assets/images/icons/bar-1.svg" alt="Dmy Foodplug">
                                    <span>Categories</span>
                                    <ul class="category-sub-menu">
                                        <li>
                                            <a href="#" class="menu-item">
                                                <img src="assets/images/icons/01.svg" alt="Dmy Foodplug">
                                                <span>Breakfast & Dairy</span>
                                                <i class="fa-regular fa-plus"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <form action="products.php" class="search-header">
                                    <input type="text" placeholder="What are you looking for? Search for item" name="search" required>
                                    <button type="submit" class="rts-btn btn-primary radious-sm with-icon">
                                        <span class="btn-text">
                                            Search
                                        </span>
                                        <span class="arrow-icon">
                                            <i class="fa-light fa-magnifying-glass"></i>
                                        </span>
                                        <span class="arrow-icon">
                                            <i class="fa-light fa-magnifying-glass"></i>
                                        </span>
                                    </button>
                                </form>
                            </div>
                            <div class="main-wrapper-action-2 d-flex">
                                <div class="accont-wishlist-cart-area-header">
                                    <a href="javascript:void(0)" class="btn-border-only account">
                                        <i class="fa-light fa-user"></i>
                                        Account
                                    </a>
                                    <a href="javascript:void(0)" class="btn-border-only wishlist">
                                        <i class="fa-regular fa-heart"></i>
                                        Wishlist
                                    </a>
                                    <div class="btn-border-only cart category-hover-header">
                                        <i class="fa-sharp fa-regular fa-cart-shopping"></i>
                                        <span class="text">My Cart</span>
                                        <span class="number cart-items-count"><?= $cartItemsCount ?? '0' ?></span>
                                        <a href="cart.php" class="over_link"></a>
                                    </div>
                                </div>
                                <div class="actions-area">
                                    <div class="search-btn" id="search">

                                        <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15.75 14.7188L11.5625 10.5312C12.4688 9.4375 12.9688 8.03125 12.9688 6.5C12.9688 2.9375 10.0312 0 6.46875 0C2.875 0 0 2.9375 0 6.5C0 10.0938 2.90625 13 6.46875 13C7.96875 13 9.375 12.5 10.5 11.5938L14.6875 15.7812C14.8438 15.9375 15.0312 16 15.25 16C15.4375 16 15.625 15.9375 15.75 15.7812C16.0625 15.5 16.0625 15.0312 15.75 14.7188ZM1.5 6.5C1.5 3.75 3.71875 1.5 6.5 1.5C9.25 1.5 11.5 3.75 11.5 6.5C11.5 9.28125 9.25 11.5 6.5 11.5C3.71875 11.5 1.5 9.28125 1.5 6.5Z" fill="#1F1F25"></path>
                                        </svg>

                                    </div>
                                    <div class="menu-btn">

                                        <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect y="14" width="20" height="2" fill="#1F1F25"></rect>
                                            <rect y="7" width="20" height="2" fill="#1F1F25"></rect>
                                            <rect width="20" height="2" fill="#1F1F25"></rect>
                                        </svg>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- rts header area end -->