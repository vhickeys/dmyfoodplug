<?php

class Payment
{
    private $db;
    private $order;
    private $settings;
    private $shipping;

    public function __construct(Database $database, $order, $settings, $shipping)
    {
        $this->db = $database->getConnection();
        $this->order = $order;
        $this->settings = $settings;
        $this->shipping = $shipping;
    }

    public function insertCustomerRecord($user_id, $trkNo, $fullname, $email, $phone, $payment_status, $reference, $channel, $ip_address, $paid_at, $transaction_date, $customer_code, $amount, $status)
    {
        $realAmount = $amount / 100;
        $platform = "Paystack";
        $sql = 'INSERT INTO payments (user_id, tracking_no, fullname, email, phone, payment_status, reference, channel, ip_address, paid_at, transaction_date, customer_code, amount, platform, status) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $user_id, PDO::PARAM_STR);
        $statement->bindParam(2, $trkNo, PDO::PARAM_STR);
        $statement->bindParam(3, $fullname, PDO::PARAM_STR);
        $statement->bindParam(4, $email, PDO::PARAM_STR);
        $statement->bindParam(5, $phone, PDO::PARAM_STR);
        $statement->bindParam(6, $payment_status, PDO::PARAM_STR);
        $statement->bindParam(7, $reference, PDO::PARAM_STR);
        $statement->bindParam(8, $channel, PDO::PARAM_STR);
        $statement->bindParam(9, $ip_address, PDO::PARAM_STR);
        $statement->bindParam(10, $paid_at, PDO::PARAM_STR);
        $statement->bindParam(11, $transaction_date, PDO::PARAM_STR);
        $statement->bindParam(12, $customer_code, PDO::PARAM_STR);
        $statement->bindParam(13, $realAmount, PDO::PARAM_INT);
        $statement->bindParam(14, $platform, PDO::PARAM_STR);
        $statement->bindParam(15, $status, PDO::PARAM_INT);
        $statement->execute();

        // Information for Email Invoice

        $date = date('d-M-Y');
        $webSetting = $this->settings->getSettings('1', '0');
        $office_phone = $webSetting['phone'];
        $office_email = $webSetting['email'];
        $office_address = $webSetting['office_address'];

        $order_details = $this->order->getOrderDetails($user_id, $trkNo);
        $order_info = $this->order->getOrder($user_id, $trkNo);
        $coupon_code = $order_info['coupon_code'];
        $address = $order_info['address'];
        $city = $order_info['city'];
        $country = $order_info['country'];
        $pickup_location = $order_info['pickup_location'];

        // Calculate the Total Goods Purchase

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


        if ($coupon_code != "" || $coupon_code != null) {
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


        if (!$statement) {
            header("Location: ../../payment_error.php?userID=$user_id&trkNo=$trkNo");
            exit;
        } else {
            // Declaring Email Parameters For Email Use

            if ($coupon_code !== null && $coupon_code !== "") {
                $this->updateCouponUse($user_id, $trkNo, "yes");
            }

            $shipping_fee_email = number_format($shipping_fee, 0, '.', ',');
            $subtotal_email = number_format($subtotal, 0, '.', ',');
            $grand_total_email = number_format($grand_total, 0, '.', ',');

            invoicePaidMail("support@dmyfoodplug.com", $email, $fullname, $trkNo, $date, $subtotal_email, $discount_percentage ?? '0', $shipping_fee_email, $grand_total_email, $address, $city, $country, $phone, $office_phone, $office_email, $office_address, $order_items_html, $shipping_location);

            $this->updateOrderStatus($reference, $user_id, $trkNo);
            header("Location: ../../payment_success.php?userID=$user_id&trkNo=$trkNo");
            exit;
        }
    }

    public function updateOrderStatus($reference, $user_id, $tracking_no)
    {
        $status = "confirmed";
        $sql = "UPDATE orders SET payment_id=?, status=? WHERE user_id=? AND tracking_no=?";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $reference, PDO::PARAM_STR);
        $statement->bindParam(2, $status, PDO::PARAM_STR);
        $statement->bindParam(3, $user_id, PDO::PARAM_STR);
        $statement->bindParam(4, $tracking_no, PDO::PARAM_STR);
        $statement->execute();
    }


    public function getPayments()
    {
        $sql = "SELECT * FROM payments ORDER BY date DESC";
        $statement = $this->db->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result ?: [];
    }

    public function getPurchaseCount($user_id, $tracking_no)
    {
        $sql = "SELECT * FROM payments WHERE user_id=? AND tracking_no=?";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $user_id, PDO::PARAM_STR);
        $statement->bindParam(2, $tracking_no, PDO::PARAM_STR);
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
    public function updateCouponUse($user_id, $tracking_no, $coupon_used)
    {
        $sql = "UPDATE orders SET coupon_used=? WHERE user_id=? AND tracking_no=?";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $user_id, PDO::PARAM_STR);
        $statement->bindParam(2, $tracking_no, PDO::PARAM_STR);
        $statement->bindParam(3, $coupon_used, PDO::PARAM_STR);
        $statement->execute();
    }
}
