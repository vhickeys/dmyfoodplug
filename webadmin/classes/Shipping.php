<?php

class Shipping
{
    private $db;

    public function __construct(Database $database)
    {
        $this->db = $database->getConnection();
    }

    public function createNewShippingAdd($location, $shipping_fee, $other_info, $status)
    {
        if (empty($location) || empty($shipping_fee)) {
            $_SESSION['errorMessage'] = "Shipping location and fees cannot be empty!";
            header("location: ../create-shipping.php");
            exit(0);
        } else {
            if ($this->checkShippingAddExists($location) > 0) {
                $_SESSION['errorMessage'] = "Shipping Location Already Exists!";
                header("location: ../create-shipping.php");
                exit(0);
            } else {
                $sql = "INSERT into shippings (location, shipping_fee, other_info, status) values(?,?,?,?)";
                $statement = $this->db->prepare($sql);
                $statement->bindParam(1, $location, PDO::PARAM_STR);
                $statement->bindParam(2, $shipping_fee, PDO::PARAM_INT);
                $statement->bindParam(3, $other_info, PDO::PARAM_STR);
                $statement->bindParam(4, $status, PDO::PARAM_INT);
                $statement->execute();

                if ($statement) {
                    $_SESSION['successMessage'] = "Shipping location created successfully";
                    header("location: ../create-shipping.php");
                    exit(0);
                } else {
                    $_SESSION['errorMessage'] = "Something went wrong!";
                    header("location: ../create-shipping.php");
                    exit(0);
                }
            }
        }
    }

    public function checkShippingAddExists($location)
    {
        $sql = "SELECT * FROM shippings WHERE location=?";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $location, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->rowCount();

        return $result ?: 0;
    }

    public function getShippingLocations()
    {
        $status = 0;
        $sql = "SELECT * FROM shippings WHERE status=?";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $status, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result ?: [];
    }
    public function getAllPickupLoc()
    {
        $sql = "SELECT * FROM shippings ORDER BY date DESC";
        $statement = $this->db->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result ?: [];
    }
}
