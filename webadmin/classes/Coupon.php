<?php

class Coupon
{
    private $db;
    private $cart;


    public function __construct(Database $database, $cart)
    {
        $this->db = $database->getConnection();
        $this->cart = $cart;
    }

    public function createCoupon($code, $discount, $limit, $other_info, $status)
    {
        if (empty($code) || empty($discount)) {
            $_SESSION['errorMessage'] = "Coupon code and discount cannot be empty!";
            header("location: ../create-coupon.php");
            exit(0);
        } else {
            if ($this->checkCouponExists($code) > 0) {
                $_SESSION['errorMessage'] = "Shipping Location Already Exists!";
                header("location: ../create-coupon.php");
                exit(0);
            } else {
                $sql = "INSERT into coupons (code, discount, price_limit, other_info, status) values(?,?,?,?,?)";
                $statement = $this->db->prepare($sql);
                $statement->bindParam(1, $code, PDO::PARAM_STR);
                $statement->bindParam(2, $discount, PDO::PARAM_INT);
                $statement->bindParam(3, $limit, PDO::PARAM_INT);
                $statement->bindParam(4, $other_info, PDO::PARAM_STR);
                $statement->bindParam(5, $status, PDO::PARAM_INT);
                $statement->execute();

                if ($statement) {
                    $_SESSION['successMessage'] = "Shipping location created successfully";
                    header("location: ../view-coupons.php");
                    exit(0);
                } else {
                    $_SESSION['errorMessage'] = "Something went wrong!";
                    header("location: ../create-coupon.php");
                    exit(0);
                }
            }
        }
    }

    public function checkCouponExists($code)
    {
        $sql = "SELECT * FROM coupons WHERE code=?";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $code, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->rowCount();

        return $result ?: 0;
    }

    public function getCoupons()
    {
        $sql = "SELECT * FROM coupons ORDER BY id DESC";
        $statement = $this->db->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result ?: [];
    }

    public function applyCoupon($coupon_code)
    {
        $cart_items = $this->cart->getCartItems(session_id());
        $total_price = 0;
        $discount = 0;


        // Calculate total price
        foreach ($cart_items as $cart_item) {
            $product_price = 0;

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

        // echo $total_price;


        if ($this->checkCouponExistStatus($coupon_code) != []) {
            $coupon_details = $this->checkCouponExistStatus($coupon_code);

            $coupon_id = $coupon_details['id'];
            $coupon_discount = $coupon_details['discount'];
            $purchase_limit = $coupon_details['price_limit'];

            if ($total_price < $purchase_limit) {
                $response = [
                    "status" => "error",
                    "message" => "You need to purchase Items above N$purchase_limit to get Discount!",
                ];

                echo json_encode($response);
            } elseif ($this->isCouponUsed() != []) {
                $response = [
                    "status" => "error",
                    "message" => "You have used this coupon code already! You cannot use it again.",
                ];

                echo json_encode($response);
            } else {

                $discount_percentage = $coupon_discount;
                $discount_factor = $discount_percentage / 100;
                $discount = $discount_factor * $total_price;
                $total_price -= $discount;

                $response = [
                    "status" => "success",
                    "session_id" => session_id(),
                    "message" => "$coupon_discount% discount applied successfully!",
                    "coupon_discount" => $coupon_discount,
                    "discount" => number_format($discount, 0, '.', ','),
                    "total_price" => number_format($total_price, 0, '.', ',')
                ];

                echo json_encode($response);
            }
        } else {
            $response = [
                "status" => "error",
                "message" => "Invalid Discount Code!",
                "data" => "",
            ];

            echo json_encode($response);
        }
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

    public function isCouponUsed()
    {
        $user_id = session_id();
        $sql = "SELECT coupon_id FROM orders WHERE user_id=?";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $user_id, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result ?: [];
    }
}
