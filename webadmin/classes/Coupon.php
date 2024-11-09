<?php

class Coupon
{
    private $db;

    public function __construct(Database $database)
    {
        $this->db = $database->getConnection();
    }

    public function createCoupon($code, $discount, $other_info, $status)
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
                $sql = "INSERT into coupons (code, discount, other_info, status) values(?,?,?,?)";
                $statement = $this->db->prepare($sql);
                $statement->bindParam(1, $code, PDO::PARAM_STR);
                $statement->bindParam(2, $discount, PDO::PARAM_INT);
                $statement->bindParam(3, $other_info, PDO::PARAM_STR);
                $statement->bindParam(4, $status, PDO::PARAM_INT);
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

    public function editShippingAdd($shipping_id, $location, $shipping_fee, $other_info, $status)
    {
        if (empty($location) || empty($shipping_fee)) {
            $_SESSION['errorMessage'] = "Shipping location and fees cannot be empty!";
            header("location: ../edit-shipping.php?shipId=$shipping_id");
            exit(0);
        } else {
            $sql = "UPDATE shippings SET location=?, shipping_fee=?, other_info=?, status=? WHERE id=?";
            $statement = $this->db->prepare($sql);
            $statement->bindParam(1, $location, PDO::PARAM_STR);
            $statement->bindParam(2, $shipping_fee, PDO::PARAM_INT);
            $statement->bindParam(3, $other_info, PDO::PARAM_STR);
            $statement->bindParam(4, $status, PDO::PARAM_INT);
            $statement->bindParam(5, $shipping_id, PDO::PARAM_INT);
            $statement->execute();

            if ($statement) {
                $_SESSION['successMessage'] = "Shipping location updated successfully";
                header("location: ../view-shippings.php");
                exit(0);
            } else {
                $_SESSION['errorMessage'] = "Something went wrong!";
                header("location: ../create-shippings.php");
                exit(0);
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
}
