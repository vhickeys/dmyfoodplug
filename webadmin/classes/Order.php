<?php

class Order
{
    private $db;
    private $cart;
    private $shipping;
    private $settings;



    public function __construct(Database $database, Cart $cart, $shipping, $settings)
    {
        $this->db = $database->getConnection();
        $this->cart = $cart;
        $this->shipping = $shipping;
        $this->settings = $settings;
    }

    public function placeOrder($user_id, $coupon_code, $email, $first_name, $last_name, $country, $address, $pickup_location, $city, $state, $zip_code, $phone, $order_notes, $payment_mode)
    {
        if (empty($user_id)) {
            echo 500;
        } else {
            $tracking_no = "DMY-" . session_id() . rand(100, 5000);
            $payment_id = "";
            $status = "pending";

            $total_price = $this->getTotalPrice();

            $sql = "INSERT into orders (tracking_no, user_id, email, first_name, last_name, country, address, pickup_location, city, state, zip_code, phone, order_notes, total_price, payment_mode, payment_id, coupon_code, status) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $statement = $this->db->prepare($sql);
            $statement->bindParam(1, $tracking_no, PDO::PARAM_STR);
            $statement->bindParam(2, $user_id, PDO::PARAM_STR);
            $statement->bindParam(3, $email, PDO::PARAM_STR);
            $statement->bindParam(4, $first_name, PDO::PARAM_STR);
            $statement->bindParam(5, $last_name, PDO::PARAM_STR);
            $statement->bindParam(6, $country, PDO::PARAM_STR);
            $statement->bindParam(7, $address, PDO::PARAM_STR);
            $statement->bindParam(8, $pickup_location, PDO::PARAM_INT);
            $statement->bindParam(9, $city, PDO::PARAM_STR);
            $statement->bindParam(10, $state, PDO::PARAM_STR);
            $statement->bindParam(11, $zip_code, PDO::PARAM_STR);
            $statement->bindParam(12, $phone, PDO::PARAM_STR);
            $statement->bindParam(13, $order_notes, PDO::PARAM_STR);
            $statement->bindParam(14, $total_price, PDO::PARAM_INT);
            $statement->bindParam(15, $payment_mode, PDO::PARAM_STR);
            $statement->bindParam(16, $payment_id, PDO::PARAM_STR);
            $statement->bindParam(17, $coupon_code, PDO::PARAM_STR);
            $statement->bindParam(18, $status, PDO::PARAM_STR);

            $statement->execute();

            $order_id = $this->db->lastInsertId();
            // Add Order Items to table
            $this->addOrderItems($order_id);

            // Details for Sending Email
            $fullname = $first_name . ' ' . $last_name;
            $date = date('d-M-Y');
            $webSetting = $this->settings->getSettings('1', '0');
            $office_phone = $webSetting['phone'];
            $office_email = $webSetting['email'];
            $office_address = $webSetting['office_address'];

            $order_details = $this->getOrderDetails($user_id, $tracking_no);
            $subtotal = 0; // Initialize subtotal

            $order_items_html = '';
            if ($order_details != []) {
                foreach ($order_details as $order_detail) {
                    $product_name = $order_detail['product_name'];
                    $product_price = $order_detail['product_price'];
                    $product_qty = $order_detail['product_qty'];
                    $product_price_total = $product_price * $product_qty;

                    // Add to subtotal
                    $subtotal += $product_price_total;

                    $order_items_html .= <<<HTML
                    <p style="font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;">
                        <span style="display:block;font-size:13px;font-weight:normal;">{$product_name}</span>
                        {$product_price} <b style="font-size:12px;font-weight:300;"> x {$product_qty}</b>
                    </p>

                    HTML;
                }
            }


            if ($coupon_code != "") {
                $couponExists = $this->checkCouponExistStatus($coupon_code);
                $coupon_discount = $couponExists['discount'];
                $discount_percentage = $coupon_discount;
                $discount_factor = $discount_percentage / 100;
                $discount = $discount_factor * $subtotal;
                $subtotal -= $discount;
            }

            $shipping_id = $pickup_location;
            $shipping_details = $this->shipping->getShippingDetails($shipping_id);
            $shipping_location = $shipping_details['location'];
            $shipping_fee = $shipping_details['shipping_fee'] ?? 3000;

            $grand_total = $subtotal + $shipping_fee;

            // End of Details for Sending Email

            if ($statement) {

                // Declaring Email Parameters For Email Use

                $shipping_fee_email = number_format($shipping_fee, 0, '.', ',');
                $subtotal_email = number_format($subtotal, 0, '.', ',');
                $grand_total_email = number_format($grand_total, 0, '.', ',');

                invoiceMail("support@dmyfoodplug.com", $email, $fullname, $tracking_no, $date, $subtotal_email, $discount_percentage ?? '0', $shipping_fee_email, $grand_total_email, $address, $city, $country, $phone, $office_phone, $office_email, $office_address, $order_items_html, $shipping_location);

                echo json_encode(['status' => 201, 'tracking_no' => $tracking_no]);
                $this->cart->deleteCartItems(session_id());
            } else {
                echo json_encode(['status' => 500]);
            }
        }
    }

    public function getTotalPrice()
    {

        $cart_items = $this->cart->getCartItems(session_id());
        $total_price = 0;

        foreach ($cart_items as $cart_item) {
            $product_price = 0;

            // Determine the product price
            if ($cart_item['prod_mrsmt_cat'] == '0' && $cart_item['prod_mrsmt_id'] == '0') {
                $product_price = $cart_item['product_price'];
            } else {
                $productNewPrice = $this->cart->getproductMsmtPrice($cart_item['prod_mrsmt_cat'], $cart_item['product_id'], $cart_item['prod_mrsmt_id']);
                if ($productNewPrice != []) {
                    $product_price = $productNewPrice['new_price'];
                } else {
                    $product_price = "NAN";
                }
            }

            if (is_numeric($product_price)) {
                $quantity = $cart_item['product_qty'];
                $product_total = $product_price * $quantity;
                $total_price += $product_total;
            }
        }

        return $total_price;
    }
    public function addOrderItems($order_id)
    {

        $cart_items = $this->cart->getCartItems(session_id());
        $total_price = 0;

        foreach ($cart_items as $cart_item) {
            $product_price = 0;

            // Determine the product price
            if ($cart_item['prod_mrsmt_cat'] == '0' && $cart_item['prod_mrsmt_id'] == '0') {
                $product_price = $cart_item['product_price'];
            } else {
                $productNewPrice = $this->cart->getproductMsmtPrice($cart_item['prod_mrsmt_cat'], $cart_item['product_id'], $cart_item['prod_mrsmt_id']);
                if ($productNewPrice != []) {
                    $product_price = $productNewPrice['new_price'];
                } else {
                    $product_price = "NAN";
                }
            }

            if (is_numeric($product_price)) {
                $quantity = $cart_item['product_qty'];
                $product_total = $product_price * $quantity;
                $total_price += $product_total;
            }

            $product_id = $cart_item['product_id'];

            $orderItemsql = "INSERT into order_items (order_id, product_id, quantity, price) values(?,?,?,?)";
            $orderItemStmt = $this->db->prepare($orderItemsql);
            $orderItemStmt->bindParam(1, $order_id, PDO::PARAM_INT);
            $orderItemStmt->bindParam(2, $product_id, PDO::PARAM_INT);
            $orderItemStmt->bindParam(3, $quantity, PDO::PARAM_INT);
            $orderItemStmt->bindParam(4, $product_price, PDO::PARAM_INT);

            $orderItemStmt->execute();

            $items_in_stock = $cart_item['product_stock'];
            $items_left_in_stock = $items_in_stock - $quantity;

            // Update Product Items in Stock

            $items_in_stock_sql = "UPDATE products SET items_in_stock=? WHERE id=?";
            $items_in_stock_stmt = $this->db->prepare($items_in_stock_sql);
            $items_in_stock_stmt->bindParam(1, $items_left_in_stock, PDO::PARAM_STR);
            $items_in_stock_stmt->bindParam(2, $product_id, PDO::PARAM_INT);
            $items_in_stock_stmt->execute();
        }
    }

    public function checkUserOrderExists($user_id, $tracking_no)
    {
        $status = "pending";
        $sql = "SELECT * FROM orders WHERE user_id=? AND tracking_no=? AND status=?";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $user_id, PDO::PARAM_STR);
        $statement->bindParam(2, $tracking_no, PDO::PARAM_STR);
        $statement->bindParam(3, $status, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result ?: [];
    }

    public function checkOrderSuccessExists($user_id, $tracking_no)
    {
        $status = "confirmed";
        $sql = "SELECT * FROM orders WHERE user_id=? AND tracking_no=? AND status=?";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $user_id, PDO::PARAM_STR);
        $statement->bindParam(2, $tracking_no, PDO::PARAM_STR);
        $statement->bindParam(3, $status, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result ?: [];
    }

    public function getOrderDetails($user_id, $tracking_no)
    {
        $sql = "SELECT o.*, 
        oi.product_id AS product_id, 
        oi.quantity AS product_qty, 
        oi.price AS product_price, 
        p.name AS product_name
        FROM orders o
        INNER JOIN order_items oi ON o.id = oi.order_id
        INNER JOIN products p ON oi.product_id = p.id
        WHERE o.user_id = ? AND o.tracking_no = ?
        ORDER BY oi.id DESC";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $user_id, PDO::PARAM_STR);
        $statement->bindParam(2, $tracking_no, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result ?: [];
    }

    public function getOrderItemsAdmin($order_id)
    {
        $sql = "SELECT oItems.*,
        p.name AS product_name,
        p.image AS product_image,
        p.items_in_stock AS items_in_stock
        FROM order_items oItems
        INNER JOIN products p ON oItems.product_id = p.id
        WHERE oItems.order_id = ?
        ORDER BY oItems.id DESC";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $order_id, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result ?: [];
    }

    public function getOrderAdmin($order_id)
    {
        $sql = "SELECT * FROM orders WHERE id=?";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $order_id, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result ?: [];
    }

    public function getOrder($user_id, $tracking_no)
    {
        $sql = "SELECT * FROM orders WHERE user_id=? AND tracking_no=?";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $user_id, PDO::PARAM_STR);
        $statement->bindParam(2, $tracking_no, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result ?: [];
    }

    public function getAllOrders()
    {
        $sql = "SELECT * FROM orders ORDER BY date DESC";
        $statement = $this->db->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result ?: [];
    }

    public function getShippingDetails($shipping_id)
    {
        $sql = "SELECT * FROM shippings WHERE id=? LIMIT 1";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $shipping_id, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result ?: [];
    }

    public function countOrderItems($order_id)
    {
        $sql = "SELECT * FROM order_items WHERE order_id=?";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $order_id, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->rowCount();

        return $result ?: 0;
    }

    public function checkCouponExistStatus($code)
    {
        $status = 0;
        $sql = "SELECT * FROM coupons WHERE BINARY code=? AND status=?";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $code, PDO::PARAM_STR);
        $statement->bindParam(2, $status, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result ?: [];
    }
}
