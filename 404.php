<?php

$page_title = "404 Page";
include_once 'components/head.php';
include_once 'components/header.php';
include_once 'components/sidebar.php';

?>

<div class="error-area-main-wrapper rts-section-gap2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="error-main-wrapper">
                    <div class="thumbnail">
                        <img src="assets/images/contact/03.png" width="30%" alt="error">
                    </div>
                    <div class="content-main">
                        <h2 class="title">This Page Can’t Be Found</h2>
                        <p>Sorry, we couldn't find the page you where looking for. We suggest that you return to homepage.</p>
                        <a href="index.php" class="rts-btn btn-primary">Back To Homepage</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include_once 'components/footer.php';
?>