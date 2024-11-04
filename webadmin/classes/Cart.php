<?php

class Cart
{
    private $db;

    public function __construct(Database $database)
    {
        $this->db = $database->getConnection();
    }

    public function addtoCart($product_id, $prodQty, $prod_mrsmt_cat, $prod_mrsmt_id)
    {
        $user_id = session_id();

        if (empty($product_id) || empty($prodQty)) {
            echo 500;
        } else {
            if ($this->checkCartExists($product_id, $user_id) > 0) {
                echo "exists";
            } else {
                $sql = "INSERT into carts (user_id, product_id, product_qty, prod_mrsmt_cat, prod_mrsmt_id) values(?,?,?,?,?)";
                $statement = $this->db->prepare($sql);
                $statement->bindParam(1, $user_id, PDO::PARAM_STR);
                $statement->bindParam(2, $product_id, PDO::PARAM_INT);
                $statement->bindParam(3, $prodQty, PDO::PARAM_INT);
                $statement->bindParam(4, $prod_mrsmt_cat, PDO::PARAM_STR);
                $statement->bindParam(5, $prod_mrsmt_id, PDO::PARAM_INT);
                $statement->execute();

                if ($statement) {
                    echo 201;
                } else {
                    echo 500;
                }
            }
        }
    }

    public function deleteCartItem($cart_id)
    {
        $user_id = session_id();

        if (empty($cart_id)) {
            echo 500;
        } else {
            if ($this->checkCartItem($cart_id, $user_id) > 0) {
                $sql = "DELETE FROM carts WHERE user_id=? AND id=?";
                $statement = $this->db->prepare($sql);
                $statement->bindParam(1, $user_id, PDO::PARAM_STR);
                $statement->bindParam(2, $cart_id, PDO::PARAM_INT);
                $statement->execute();

                if ($statement) {
                    echo 200;
                } else {
                    echo 500;
                }
            } else {
                echo 500;
            }
        }
    }

    public function updateCart($product_id, $prodQty)
    {
        $user_id = session_id();

        if (empty($product_id)) {
            echo 500;
        } else {
            if ($this->checkCartExists($product_id, $user_id) > 0) {
                $sql = "UPDATE carts SET product_qty=? WHERE user_id=? AND product_id=?";
                $statement = $this->db->prepare($sql);
                $statement->bindParam(1, $prodQty, PDO::PARAM_INT);
                $statement->bindParam(2, $user_id, PDO::PARAM_STR);
                $statement->bindParam(3, $product_id, PDO::PARAM_INT);
                $statement->execute();

                if ($statement) {
                    echo 200;
                } else {
                    echo 500;
                }
            } else {
                echo 500;
            }
        }
    }

    public function deleteAllCartItems()
    {
        $user_id = session_id();

        $sql = "DELETE FROM carts WHERE user_id=?";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $user_id, PDO::PARAM_STR);
        $statement->execute();

        if ($statement) {
            echo 200;
        } else {
            echo 500;
        }
    }

    public function checkCartItem($cart_id, $user_id)
    {
        $sql = "SELECT * FROM carts WHERE id=? AND user_id=?";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $cart_id, PDO::PARAM_INT);
        $statement->bindParam(2, $user_id, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->rowCount();

        return $result ?: null;
    }

    public function checkCartExists($product_id, $user_id)
    {
        $sql = "SELECT * FROM carts WHERE product_id=? AND user_id=?";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $product_id, PDO::PARAM_INT);
        $statement->bindParam(2, $user_id, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->rowCount();

        return $result ?: null;
    }

    public function getCartItems($user_id)
    {
        $sql = "SELECT c.*, 
        p.name AS product_name,
        p.image AS product_image,
        p.selling_price AS product_price,
        p.items_in_stock AS product_stock,
        p.SKU AS product_sku
        FROM carts c INNER JOIN
        products p ON c.product_id = p.id WHERE c.user_id=? ORDER BY c.id DESC";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $user_id, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result ?: null;
    }

    public function getproductMsmtPrice($table, $product_id, $prod_mrsmt_id)
    {
        $sql = "SELECT * FROM $table WHERE product_id=? AND id=? LIMIT 1";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $product_id, PDO::PARAM_INT);
        $statement->bindParam(2, $prod_mrsmt_id, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result ?: [];
    }

    public function getCartItemsCount($user_id)
    {
        $sql = "SELECT c.*, 
        p.name AS product_name,
        p.image AS product_image,
        p.selling_price AS product_price,
        p.SKU AS product_sku
        FROM carts c INNER JOIN
        products p ON c.product_id = p.id WHERE c.user_id=? ORDER BY c.id DESC";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $user_id, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->rowCount();

        return $result ?: 0;
    }

    public function checkUserExists($user_id){
        $sql = "SELECT user_id FROM carts WHERE user_id=?";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $user_id, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result ?: [];

    }

    public function deleteCartItems($user_id){
        $sql = "DELETE FROM carts WHERE user_id=?";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $user_id, PDO::PARAM_STR);
        $statement->execute();
    }

}
