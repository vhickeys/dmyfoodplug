<?php
require 'functions.php';

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'registerUser':
            if (isset($_POST)) {
                $adminFname = $_POST['adminFname'];
                $adminEmail = $_POST['adminEmail'];
                $adminPassword = $_POST['adminPassword'];
                $role = $_POST['role'];

                $user->registerUser($adminFname, $adminEmail, $adminPassword, $role);
            } else {
                echo "<script>window.location.href='../../index.php'</script>";
            }
            break;

        case 'loginUser':
            if (isset($_POST)) {
                $adminEmail = $_POST['adminEmail'];
                $adminPassword = $_POST['adminPassword'];

                $user->loginUser($adminEmail, $adminPassword);
            } else {
                echo "<script>window.location.href='../../index.php'</script>";
            }
            break;

        case 'changePassword':
            if (isset($_POST)) {
                $userId = $_POST['userId'];
                $new_password = $_POST['new_password'];

                $user->changePassword($userId, $new_password);
            } else {
                echo "<script>window.location.href='../../index.php'</script>";
            }
            break;

        case 'contactSubmit':
            if (isset($_POST)) {
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $subject = $_POST['subject'];
                $message = $_POST['message'];

                $contact->contactSubmit($firstname, $lastname, $email, $phone, $subject, $message);
            } else {
                echo "<script>window.location.href='../../index.php'</script>";
            }
            break;

        case 'loginAdmin':
            if (isset($_POST['adminLoginSubmit'])) {
                $adminEmail = $_POST['adminEmail'];
                $adminPassword = $_POST['adminPassword'];

                $user->loginAdmin($adminEmail, $adminPassword);
            } else {
                echo "<script>window.location.href='../../index.php'</script>";
            }
            break;

        case 'logout':
            if (isset($_POST)) {

                $user->logoutUser();
            } else {
                echo "<script>window.location.href='../../index.php'</script>";
            }
            break;


        case 'create-category':
            if (isset($_POST['submit-category'])) {

                $name = $_POST['name'];
                $slug = uniqid() . '-' . textToSlug($name);
                $caption = $_POST['caption'];
                $description = $_POST['description'];
                $image = $_FILES['image'];

                $meta_title = $_POST['meta_title'];
                $meta_keywords = $_POST['meta_keywords'];
                $meta_description = $_POST['meta_description'];

                $author = $_POST['author'];
                $status = $_POST['status'] == true ? '1' : '0';

                $category->createCategory($name, $slug, $caption, $description, $image, $meta_title, $meta_keywords, $meta_description, $author, $status);
            } else {
                echo "<script>window.location.href='../../index.php'</script>";
            }
            break;

        case 'update-category':
            if (isset($_POST['edit-category'])) {

                $category_id = $_POST['category_id'];
                $name = $_POST['name'];
                $slug = uniqid() . '-' . textToSlug($name);
                $caption = $_POST['caption'];
                $description = $_POST['description'];
                $image = $_FILES['image'];
                $old_image = $_POST['old_image'];

                $meta_title = $_POST['meta_title'];
                $meta_keywords = $_POST['meta_keywords'];
                $meta_description = $_POST['meta_description'];

                $author = $_POST['author'];
                $status = $_POST['status'] == true ? '1' : '0';

                $category->editCategory($category_id, $name, $slug, $caption, $description, $image, $old_image, $meta_title, $meta_keywords, $meta_description, $author, $status);
            } else {
                echo "<script>window.location.href='../../index.php'</script>";
            }
            break;

        case 'settings':
            if (isset($_POST['submit-settings'])) {

                $discount_offer = $_POST['discount_offer'];
                $about = $_POST['about'];

                $phone = $_POST['phone'];
                $email = $_POST['email'];
                $office_address = $_POST['office_address'];

                $error_message = $_POST['error_message'];
                $payment_notice = $_POST['payment_notice'];

                $facebook = $_POST['facebook'];
                $instagram = $_POST['instagram'];
                $twitter = $_POST['twitter'];
                $linkedIn = $_POST['linkedIn'];
                $youtube = $_POST['youtube'];
                $whatsapp = $_POST['whatsapp'];
                $whatsapp_group = $_POST['whatsapp_group'];

                $logo = $_FILES['logo'];
                $old_image = $_POST['old_image'];
                $status = $_POST['status'] == true ? '1' : '0';

                $settings->modifySettings($discount_offer, $about, $phone, $email, $office_address, $error_message, $payment_notice, $facebook, $instagram, $twitter, $linkedIn, $youtube, $whatsapp, $whatsapp_group, $logo, $old_image, $status, "1");
            } else {
                echo "<script>window.location.href='../../index.php'</script>";
            }
            break;

        case 'create-product':
            if (isset($_POST['submit-product'])) {

                $category = $_POST['category'];
                $name = $_POST['name'];
                $slug = uniqid() . '-' . textToSlug($name);
                $caption = $_POST['caption'];
                $description = $_POST['description'];
                $image = $_FILES['image'];

                $cost_price = $_POST['cost_price'];
                $selling_price = $_POST['selling_price'];
                $price_range = $_POST['price_range'];
                $SKU = "DMY-" . rand(100, 900) . session_id();
                $items_in_stock = $_POST['items_in_stock'];

                $meta_title = $_POST['meta_title'];
                $meta_keywords = $_POST['meta_keywords'];
                $meta_description = $_POST['meta_description'];

                $author = $_POST['author'];

                $soldout = $_POST['soldout'] == true ? '1' : '0';
                $trending = $_POST['trending'] == true ? '1' : '0';
                $status = $_POST['status'] == true ? '1' : '0';

                $product->createProduct($category, $name, $slug, $caption, $description, $image, $cost_price, $selling_price, $price_range, $SKU, $items_in_stock, $meta_title, $meta_keywords, $meta_description, $author, $soldout, $trending, $status);
            } else {
                echo "<script>window.location.href='../../index.php'</script>";
            }
            break;

        case 'create-product-weight':
            if (isset($_POST['submit-product-weight'])) {

                $product_id = $_POST['product'];
                $weight = $_POST['weight'];
                $new_price = $_POST['new_price'];
                $other_info = $_POST['other_info'];

                $status = $_POST['status'] == true ? '1' : '0';

                $product = new Product($database);
                $product->createProductWeight($product_id, $weight, $new_price, $other_info, $status);
            } else {
                echo "<script>window.location.href='../../index.php'</script>";
            }
            break;

        case 'create-product-size':
            if (isset($_POST['submit-product-size'])) {

                $product_id = $_POST['product'];
                $size = $_POST['size'];
                $new_price = $_POST['new_price'];
                $other_info = $_POST['other_info'];

                $status = $_POST['status'] == true ? '1' : '0';

                $product = new Product($database);
                $product->createProductSize($product_id, $size, $new_price, $other_info, $status);
            } else {
                echo "<script>window.location.href='../../index.php'</script>";
            }
            break;

        case 'create-product-slot':
            if (isset($_POST['submit-product-slot'])) {

                $product_id = $_POST['product'];
                $slot = $_POST['slot'];
                $new_price = $_POST['new_price'];
                $other_info = $_POST['other_info'];

                $status = $_POST['status'] == true ? '1' : '0';

                $product = new Product($database);
                $product->createProductSlot($product_id, $slot, $new_price, $other_info, $status);
            } else {
                echo "<script>window.location.href='../../index.php'</script>";
            }
            break;

        case 'update-product':
            if (isset($_POST['edit-product'])) {

                $product_id = $_POST['product_id'];
                $category = $_POST['category'];
                $name = $_POST['name'];
                $slug = uniqid() . '-' . textToSlug($name);
                $caption = $_POST['caption'];
                $description = $_POST['description'];
                $image = $_FILES['image'];
                $old_image = $_POST['old_image'];

                $cost_price = $_POST['cost_price'];
                $selling_price = $_POST['selling_price'];
                $price_range = $_POST['price_range'];
                $SKU = $_POST['SKU'];
                $items_in_stock = $_POST['items_in_stock'];

                $meta_title = $_POST['meta_title'];
                $meta_keywords = $_POST['meta_keywords'];
                $meta_description = $_POST['meta_description'];

                $author = $_POST['author'];

                $soldout = $_POST['soldout'] == true ? '1' : '0';
                $trending = $_POST['trending'] == true ? '1' : '0';
                $status = $_POST['status'] == true ? '1' : '0';

                $product->editProduct($product_id, $category, $name, $slug, $caption, $description, $image, $old_image, $cost_price, $selling_price, $price_range, $SKU, $items_in_stock, $meta_title, $meta_keywords, $meta_description, $author, $soldout, $trending, $status);
            } else {
                echo "<script>window.location.href='../../index.php'</script>";
            }
            break;

        case 'addtoCart':
            if (isset($_POST['product_id'])) {
                $product_id = $_POST['product_id'];
                $prodQty = $_POST['prodQty'];
                $prod_mrsmt_cat = $_POST['prod_mrsmt_cat'];
                $prod_mrsmt_id = $_POST['prod_mrsmt_id'];

                $cart->addtoCart($product_id, $prodQty, $prod_mrsmt_cat, $prod_mrsmt_id);
            } else {
                echo 500;
            }

            break;

        case 'updateCart':
            if (isset($_POST['product_id'])) {
                $product_id = $_POST['product_id'];
                $prodQty = $_POST['prodQty'];
                $cart->updateCart($product_id, $prodQty);
            } else {
                echo 500;
            }

            break;

        case 'deleteCartItem':
            if (isset($_POST['cart_id'])) {
                $cart_id = $_POST['cart_id'];

                $cart->deleteCartItem($cart_id);
            } else {
                echo 500;
            }

            break;

        case 'deleteAllCartItems':
            if (isset($_POST['scope'])) {
                $cart->deleteAllCartItems();
            } else {
                echo 500;
            }

            break;

        case 'getCartCount':
            $count = $cart->getCartItemsCount(session_id());
            echo json_encode(['count' => $count]);
            break;

        case 'placeOrder':
            if (isset($_POST['email']) && isset($_POST['user_id'])) {
                $user_id = $_POST['user_id'];
                $email = $_POST['email'];
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $country = $_POST['country'];
                $address = $_POST['address'];
                $pickup_location = $_POST['pickup_location'];
                $city = $_POST['city'];
                $state = $_POST['state'];
                $zip_code = $_POST['zip_code'];
                $phone = $_POST['phone'];
                $order_notes = $_POST['order_notes'];
                $payment_mode = $_POST['payment_mode'];

                $order->placeOrder($user_id, $email, $first_name, $last_name, $country, $address, $pickup_location, $city, $state, $zip_code, $phone, $order_notes, $payment_mode);
            } else {
                echo 500;
            }
            break;

        case 'create-shipping':
            if (isset($_POST['submit-shipping'])) {
                $location = $_POST['location'];
                $shipping_fee = $_POST['shipping_fee'];
                $other_info = $_POST['other_info'];
                $status = $_POST['status'] == true ? '1' : '0';

                $shipping->createNewShippingAdd($location, $shipping_fee, $other_info, $status);
            } else {
                echo "<script>window.location.href='../../index.php'</script>";
            }

            break;

        case 'getParticipants':
            if (isset($_POST)) {
                $participantID = $_POST['participantID'];
                // $participant = $participant->getParticipant('registration', $participantID);
                echo json_encode($participant);
            } else {
                echo "<script>window.location.href='../../index.php'</script>";
            }
            break;

        case 'payment-proof':
            if (isset($_POST['create-proof'])) {
                $user_id = $_POST['user_id'];
                $proof = $_FILES['proof'];

                $transaction->uploadPaymentProof($user_id, $proof);
            } else {
                echo "<script>window.location.href='../../index.php'</script>";
            }
            break;

        case 'updatePaymentStatus':
            if (isset($_POST['payment_status'])) {
                $payment_id = $_POST['payment_id'];
                $user_id = $_POST['user_id'];
                $payment_status = $_POST['payment_status'];

                if ($payment_status == 1) {
                    // Decline Payment Status i.e Set Status to 2
                    $transaction->updatePaymentStatus($payment_id, $user_id, "2");
                } elseif ($payment_status == 2) {
                    // Approve Payment Status i.e Set Status to 1
                    $transaction->updatePaymentStatus($payment_id, $user_id, "1");
                } elseif ($payment_status == 0) {
                    // Approve Payment Status i.e Set Status to 1
                    $transaction->updatePaymentStatus($payment_id, $user_id, "1");
                }
            } else {
                echo "<script>window.location.href='../../index.php'</script>";
            }
            break;

        case 'delete-agenda':
            if (isset($_POST['delete-agenda'])) {
                $agenda_id = $_POST['agendaDeleteModalId'];
                // $agenda->deleteAgenda($agenda_id);
            } else {
                echo "<script>window.location.href='../../index.php'</script>";
            }
            break;

        case 'delete-event':
            if (isset($_POST['delete-event'])) {
                $event_Id = $_POST['eventDeleteModalId'];
                // $event->deleteEvent("events", $event_Id, "Event", "view-events.php");
            } else {
                echo "<script>window.location.href='../../index.php'</script>";
            }
            break;

        case 'delete-user':
            if (isset($_POST['delete-user'])) {
                $user_Id = $_POST['userDeleteModalId'];
                $record->deleteRecord("users", $user_Id, "User", "view-users.php");
            } else {
                echo "<script>window.location.href='../../index.php'</script>";
            }
            break;

        case 'delete-product-weight':
            if (isset($_POST['delete-product-weight'])) {
                $product_id = $_POST['product_id'];
                $deleteProdWeightId = $_POST['deleteProdWeightId'];
                $record->deleteRecord("product_weights", $deleteProdWeightId, "Product Weight", "product-details.php?pId=$product_id");
            } else {
                echo "<script>window.location.href='../../index.php'</script>";
            }
            break;

        case 'delete-product-size':
            if (isset($_POST['delete-product-size'])) {
                $product_id = $_POST['product_id'];
                $deleteProdSizeId = $_POST['deleteProdSizeId'];
                $record->deleteRecord("product_sizes", $deleteProdSizeId, "Product Size", "product-details.php?pId=$product_id");
            } else {
                echo "<script>window.location.href='../../index.php'</script>";
            }
            break;

        case 'delete-product-slot':
            if (isset($_POST['delete-product-slot'])) {
                $product_id = $_POST['product_id'];
                $deleteProdSlotId = $_POST['deleteProdSlotId'];
                $record->deleteRecord("product_slots", $deleteProdSlotId, "Product Slot", "product-details.php?pId=$product_id");
            } else {
                echo "<script>window.location.href='../../index.php'</script>";
            }
            break;

        case 'changeUserRole':
            if (isset($_POST['changeUserRoleBtn'])) {
                $user_Id = $_POST['userId'];
                $user_role = $_POST['user_role'];
                $user->updateUserRole($user_role, $user_Id);
            } else {
                echo "<script>window.location.href='../../index.php'</script>";
            }
            break;

        case 'setUserAccess':
            if (isset($_POST['userAccessBtn'])) {
                $userAccess = $_POST['userAccess'];
                $user_Id = $_POST['user_id'];

                $userAccess == 1 ? $userAccess = 0 : $userAccess = 1;
                $user->userAccess($userAccess, $user_Id);
            } else {
                echo "<script>window.location.href='../../index.php'</script>";
            }
            break;

        default:
            # code...
            break;
    }
} else {
    echo "<script>window.location.href='../../index.php'</script>";
}
