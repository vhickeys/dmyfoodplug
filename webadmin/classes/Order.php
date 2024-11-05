<?php

class Order
{
    private $db;
    private $cart;



    public function __construct(Database $database, Cart $cart)
    {
        $this->db = $database->getConnection();
        $this->cart = $cart;
    }

    public function placeOrder($user_id, $email, $first_name, $last_name, $country, $address, $pickup_location, $city, $state, $zip_code, $phone, $order_notes, $payment_mode)
    {
        if (empty($user_id)) {
            echo 500;
        } else {
            $tracking_no = "DMY-" . session_id() . rand(100, 5000);
            $payment_id = "";
            $status = "pending";

            $total_price = $this->getTotalPrice();

            $sql = "INSERT into orders (tracking_no, user_id, email, first_name, last_name, country, address, pickup_location, city, state, zip_code, phone, order_notes, total_price, payment_mode, payment_id, status) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
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
            $statement->bindParam(17, $status, PDO::PARAM_STR);

            $statement->execute();

            $order_id = $this->db->lastInsertId();
            // Add Order Items to table
            $this->addOrderItems($order_id);

            $fullname = $first_name . ' ' . $last_name;
            $date = date('d-M-Y');

            if ($statement) {
                // invoiceMail("support@dmyfoodplug.com", $email, $fullname, $tracking_no, $date, $total_price, "3000", $total_price, $address, $city, $country, $phone);
                echo json_encode(['status' => 201, 'tracking_no' => $tracking_no]);
                $this->cart->deleteCartItems(session_id());
            } else {
                echo json_encode(['status' => 500]);
            }
        }
    }

    // public function updateProductItems($product_id) {


    // }

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

    public function getShippingDetails($shipping_id)
    {
        $sql = "SELECT * FROM shippings WHERE id=? LIMIT 1";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $shipping_id, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result ?: [];
    }
}
