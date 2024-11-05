<?php

session_set_cookie_params([
    'lifetime' => 21600,      // 6 hours (in seconds)
    'path' => '/',            // Available to entire domain
    'domain' => '',           // Default to current domain
    'secure' => true,         // Send cookie only over HTTPS
    'httponly' => true,       // Prevent JavaScript access to the session cookie
    'samesite' => 'Strict'    // Strict mode to prevent CSRF attacks
]);

// Start the session
session_start();

if (!isset($_SESSION['initiated'])) {
    // Set a flag to avoid regenerating the session ID after first use
    $_SESSION['initiated'] = true;
}

date_default_timezone_set('Africa/lagos');

require 'Database.php';
require 'User.php';
require 'Category.php';
require 'Record.php';
require 'Product.php';
require 'Cart.php';
require 'Order.php';
require 'Payment.php';
require 'Shipping.php';
require 'Settings.php';
require 'Contact.php';
require 'email.php';

$database = new Database();

$user = new User($database);

$category = new Category($database);

$record = new Record($database);

$product = new Product($database);

$cart = new Cart($database);

$order = new Order($database, $cart);

$payment = new Payment($database);

$shipping = new Shipping($database);

$settings = new Settings($database);

$contact = new Contact($database);

// Check for User Access

if (isset($_SESSION['user_data']['userId'])) {
    $userAccess = $record->getRecord('users', $_SESSION['user_data']['userId'])['access'];
}

function authCheck()
{
    global $userAccess;

    if (!isset($_SESSION['user_data']['fullName']) && !isset($_SESSION['user_data']['email'])) {
        $_SESSION['message'] = "You are not authorized to access this page. Please Login";
        header("location: login.php");
        exit(0);
    } else if ($userAccess == "1") {
        $_SESSION['message'] = "Your account has been suspended! Please contact admin";
        header("location: ./login.php");
        exit(0);
    } else if ($_SESSION['user_data']['role'] == "0") {
        $_SESSION['message'] = "You are not authorized to access this page. Not an Admin!";
        header("location: ../index.php");
        exit(0);
    }
}

function authCheckUser()
{
    global $userAccess;

    if (!isset($_SESSION['user_data']['fullName']) && !isset($_SESSION['user_data']['email'])) {
        $_SESSION['userErrorMessage'] = "You are not authorized to access this page. Please Login";
        header("location: ./login.php");
        exit(0);
    } else if ($userAccess == "1") {
        $_SESSION['message'] = "Your account has been suspended! Please contact admin";
        header("location: ./login.php");
        exit(0);
    }
}

function authCheckUserBySlug($slug, $page)
{
    global $userAccess;

    if (!isset($_SESSION['user_data']['fullName']) && !isset($_SESSION['user_data']['email'])) {
        $_SESSION['userErrorMessage'] = "You are not authorized to access this page. Please Login";
        header("location: ./login.php");
        exit(0);
    } else if ($userAccess == "1") {
        $_SESSION['message'] = "Your account has been suspended! Please contact admin";
        header("location: ./login.php");
        exit(0);
    } else if (!isset($slug) || ($slug == "")) {
        $_SESSION['errorMessage'] = "You are not authorized to access this page! No ID Found.";
        header("location: $page.php");
        exit(0);
    }
}

function authCheckById($id, $page)
{
    global $userAccess;

    if (!isset($_SESSION['user_data']['fullName']) && !isset($_SESSION['user_data']['email'])) {
        $_SESSION['message'] = "You are not authorized to access this page. Please Login";
        header("location: login.php");
        exit(0);
    } else if ($userAccess == "1") {
        $_SESSION['message'] = "Your account has been suspended! Please contact admin";
        header("location: ./login.php");
        exit(0);
    } else if ($_SESSION['user_data']['role'] == "0") {
        $_SESSION['message'] = "You are not authorized to access this page. Not an Admin!";
        header("location: ../index.php");
        exit(0);
    } else if (!isset($id) || ($id == "")) {
        $_SESSION['errorMessage'] = "You are not authorized to access this page! No ID Found.";
        header("location: $page.php");
        exit(0);
    }
}

function authCheckBy2records($slug, $page, $table, $column1, $column2, $column1Data, $column2Data)
{
    global $record;
    global $userAccess;

    if (!isset($_SESSION['user_data']['fullName']) && !isset($_SESSION['user_data']['email'])) {
        $_SESSION['userErrorMessage'] = "You are not authorized to access this page. Please Login";
        header("location: ./login.php");
        exit(0);
    } else if ($userAccess == "1") {
        $_SESSION['message'] = "Your account has been suspended! Please contact admin";
        header("location: ./login.php");
        exit(0);
    } else if (!isset($slug) || ($slug == "") || ($record->getRecordBy2Cols($table, $column1, $column2, $column1Data, $column2Data) == null)) {
        $_SESSION['errorMessage'] = "You are not authorized to access this page! No ID Found.";
        header("location: $page.php");
        exit(0);
    }
}

function adminAuth()
{
    global $userAccess;

    if (!isset($_SESSION['user_data']['fullName']) && !isset($_SESSION['user_data']['email'])) {
        $_SESSION['message'] = "You are not authorized to access this page. Please Login";
        header("location: login.php");
        exit(0);
    } else if ($userAccess == "1") {
        $_SESSION['message'] = "Your account has been suspended! Please contact admin";
        header("location: ./login.php");
        exit(0);
    } else if ($_SESSION['user_data']['role'] == "0") {
        $_SESSION['message'] = "You are not authorized to access this page. Not an Admin!";
        header("location: ../index.php");
        exit(0);
    } else if ($_SESSION['user_data']['role'] == "1") {
        $_SESSION['message'] = "You are not authorized to access this page. Not a Super Admin!";
        header("location: index.php");
        exit(0);
    }
}

// function authConfirm()
// {
//     if (isset($_SESSION['user_data']['fullName']) && isset($_SESSION['user_data']['email'])) {
//         $_SESSION['message'] = "You are already logged in!";
//         header("location: index.php");
//         exit(0);
//     } 
// }

function logoutUser()
{
    if (isset($_GET['logout']) == 'true') {
        session_unset();
        session_destroy();
        header('location: login.php');
        exit();
    }
}

function image_processing($image)
{
    $image_name = $image['name'];

    if ($image_name != null) {
        $image_size = $image['size'];
        $image_tmp_name = $image['tmp_name'];
        $image_extension = pathinfo($image_name, PATHINFO_EXTENSION);
        $filename = uniqid() . '.' . $image_extension;
        $valid_extensions = ['jpg', 'jpeg', 'png'];

        return [
            'image_name' => $image_name,
            'image_size' => $image_size,
            'image_tmp_name' => $image_tmp_name,
            'image_extension' => $image_extension,
            'filename' => $filename,
            'valid_extensions' => $valid_extensions
        ];
    } else {
        return null;
    }
}

function move_image($filename, $image_tmp_name)
{
    $destination = "../../images/events/$filename";
    move_uploaded_file($image_tmp_name, $destination);
}

function unlink_image($old_image, $filename, $image_tmp_name)
{
    $olDestination = "../../images/events/$old_image";

    if (file_exists($olDestination)) {
        unlink($olDestination);
    }

    $destination = "../../images/events/$filename";
    move_uploaded_file($image_tmp_name, $destination);
}

function unlink_image_only($path)
{
    if (file_exists($path)) {
        unlink($path);
    }
}

function textToSlug($text)
{
    $text = preg_replace('/[^a-z0-9- ]/i', '', $text);
    $text = str_replace(' ', '-', $text);
    $text = strtolower($text);
    $text = preg_replace('/-+/', '-', $text);
    $text = trim($text, '-');

    return $text;
}

function setActivePage($currentPage, $linkPage)
{
    if ($currentPage === $linkPage) {
        return 'active';
    } else {
        return '';
    }
}

function save_visitors()
{
    global $database;

    $ip_address = $_SERVER['REMOTE_ADDR'];

    //Get page url
    $url = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF'];
    $query_string = $_SERVER['QUERY_STRING'];
    if (!empty($query_string)) {
        $url .= "?" . $query_string;
    }
    $stmt = $database->getConnection()->prepare("SELECT * FROM visitors WHERE ip_address = ? AND page_url=?");
    $stmt->execute([$ip_address, $url]);
    if ($stmt->rowCount() > 0) {
        return true;
    } else {
        $stmt = $database->getConnection()->prepare("INSERT INTO visitors (ip_address,page_url) VALUES (?,?)");
        if ($stmt->execute([$ip_address, $url])) {
            return True;
        } else {
            return False;
        }
    }
}

function web_visitor_count()
{
    global $database;
    $sql = 'SELECT COUNT(*) as total FROM visitors';
    $stmt = $database->getConnection()->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $total_visitors = $result['total'];
    return $total_visitors;
}

function slugToTitle($slug)
{
    $title = str_replace('-', ' ', $slug);
    $title = ucwords($title);
    $title = trim($title);
    return $title;
}

function generateUniqId($length = 16)
{
    $uniqueId = uniqid('', true);
    $salt = openssl_random_pseudo_bytes(16);
    $hash = hash('sha256', $uniqueId . $salt);
    $paymentId = substr($hash, 0, $length);

    return $paymentId;
}

function generateSecurePaymentId($length = 16)
{
    $uniqueId = uniqid('', true);
    $salt = openssl_random_pseudo_bytes(16);
    $hash = hash('sha256', $uniqueId . $salt);
    $paymentId = substr($hash, 0, $length);

    return $paymentId;
}

function addLineBreakAfterComma($content)
{
    $content_with_breaks = str_replace(', ', ",\n", $content);

    return $content_with_breaks;
}

function addLineBreakAfterSpace($content)
{
    $content_with_breaks = str_replace("\n", "<br>", $content);

    return $content_with_breaks;
}

function addLineBreakBetweenParagraphs($content)
{
    // $content_with_breaks = preg_replace('/(\n\s*){2,}/', "<br><br>", $content);
    $content_with_breaks = preg_replace('/(\R\s*?){2,}/', "<br><br>", preg_replace('/(\R\s*?)/', "<br>", $content));

    return $content_with_breaks;
}

function pastEventsSql()
{
    $sqlTotal = "SELECT COUNT(*) FROM events WHERE date < :currentDate AND isPublished= :isPublished AND status = :status";
    $sql = "SELECT * FROM events WHERE date < :currentDate AND isPublished= :isPublished AND status = :status";

    return [
        'sqlTotal' => $sqlTotal ?: '',
        'sql' => $sql,
    ];
}

function paginateSearch($search, $sqlTotal, $sql)
{
    global $database;

    $cStatus = 0; 
    $pStatus = 0;

    // Check if a search term is provided
    if (!empty($search)) {
        // Append search condition to SQL queries
        $sqlTotal .= " AND p.name LIKE ?";
        $sql .= " AND p.name LIKE ?";
    }

    // Prepare and execute the query to get total items
    $totalItemsQuery = $database->getConnection()->prepare($sqlTotal);
    $paramsTotal = [$cStatus, $pStatus];

    // Add the search parameter if provided
    if (!empty($search)) {
        $paramsTotal[] = "%$search%";
    }

    $totalItemsQuery->execute($paramsTotal);
    $totalItems = $totalItemsQuery->fetchColumn();

    // Calculate pagination details
    $itemsPerPage = 12;
    $totalPages = ceil($totalItems / $itemsPerPage);

    // Get the current page
    $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    if ($currentPage < 1) $currentPage = 1;
    if ($currentPage > $totalPages) $currentPage = $totalPages;

    // Calculate offset safely
    $offset = max(0, ($currentPage - 1) * $itemsPerPage);

    // Modify SQL query to include ORDER BY, LIMIT, and OFFSET
    $sql .= " ORDER BY p.date DESC LIMIT $itemsPerPage OFFSET $offset";

    // Prepare and execute the query to get items
    $stmt = $database->getConnection()->prepare($sql);
    $params = [$cStatus, $pStatus];

    // Add the search parameter if provided
    if (!empty($search)) {
        $params[] = "%$search%";
    }

    $stmt->execute($params);
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return [
        'items' => $items,
        'totalPages' => $totalPages,
        'currentPage' => $currentPage
    ];
}

function paginationLinks($currentPage, $totalPages)
{

    $previous = $currentPage - 1;
    $next = $currentPage + 1;
    $output = "";
    if ($currentPage > 1) :

        $output .= <<<output
            <li><a href="?page=$previous"><button><i class="fa-regular fa-chevrons-left"></i></button></i></a></li>
        output;

    endif;

    for ($i = 1; $i <= $totalPages; $i++) :
        if ($i == $currentPage) :
            $output .= <<<output
                <li><a href="?page=$i"><button class="active">$i</button></a></li>
            output;
        else :
            $output .= <<<output
                <li><a href="?page=$i"><button>$i</button></a></li>
            output;
        endif;
    endfor;

    if ($currentPage < $totalPages) :

        $output .= <<<output
            <li class="page-item"><a href="?page=$next"><button><i class="fa-regular fa-chevrons-right"></i></button></a></li>
        output;

    endif;

    echo $output;
}
