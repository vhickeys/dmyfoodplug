<?php
require 'webadmin/classes/functions.php';
$webSetting = $settings->getSettings('1', '0');
save_visitors();

$search = isset($_GET['search']) ? $_GET['search'] : '';

$categories = $category->getCategoriesStatus();
$products = $product->getLatestProducts();
$LimCategories = array_slice($category->getCategoriesStatus(), 0, 6);
$latestProducts = array_slice($product->getLatestProducts(), 0, 12);
$trendingProducts = array_slice($product->getTrendingProducts(), 0, 12);
$products_count = $record->countRecords("products");
$cartItemsCount = $cart->getCartItemsCount(session_id());

if ($catExists = $category->getCategoryBySlug("categories", $_GET['cat'] ?? '')) {
    $page_title = $catExists['name'];
    $meta_keywords = $catExists['meta_keywords'];
    $meta_description = $catExists['meta_description'];
}

if ($prodExists = $product->getProductCatbySlug($_GET['prod'] ?? '')) {
    $page_title = $prodExists['name'];
    $meta_keywords = $prodExists['meta_keywords'];
    $meta_description = $prodExists['meta_description'];
}

$paginated_products = paginateSearch($search, $product->paginateProducts()['sqlTotal'], $product->paginateProducts()['sql'])['items'];
$totalPages = paginateSearch($search, $product->paginateProducts()['sqlTotal'], $product->paginateProducts()['sql'])['totalPages'];
$currentPage = paginateSearch($search, $product->paginateProducts()['sqlTotal'], $product->paginateProducts()['sql'])['currentPage'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="<?= $meta_keywords ?? "Grocery, Store, stores, food store" ?>| Dmy Foodplug">
    <meta name="description"
        content="<?= $meta_description ?? "Dmy FoodPlug for buying of food products and items online" ?>| Dmy Foodplug">
    <meta name="author" content="Dmy Foodplug">
    <title>
        <?= $page_title ?? 'Welcome to ' ?> | Dmy Foodplug
    </title>

    <!-- plugins css -->
    <link rel="stylesheet preload" href="assets/css/plugins.css" as="style">
    <link rel="stylesheet preload" href="assets/css/style.css" as="style">
    <link rel="stylesheet preload" href="assets/css/custom.css" as="style">
    <link rel="stylesheet" href="assets/alertifyjs/css/alertify.min.css" />
    <link rel="stylesheet" href="assets/alertifyjs/css/themes/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/fonts.css" />

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/favicon/site.webmanifest">
</head>

<body class="shop-main-h">