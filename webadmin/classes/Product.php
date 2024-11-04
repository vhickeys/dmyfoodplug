<?php

class Product
{
    private $db;

    public function __construct(Database $database)
    {
        $this->db = $database->getConnection();
    }

    public function createProduct($category, $name, $slug, $caption, $description, $image, $cost_price, $selling_price, $price_range, $SKU, $items_in_stock, $meta_title, $meta_keywords, $meta_description, $author, $soldout, $trending, $status)
    {
        $image_name = $image['name'];
        $image_size = $image['size'];
        $image_tmp_name = $image['tmp_name'];
        $image_extension = pathinfo($image_name, PATHINFO_EXTENSION);
        $filename = uniqid() . '.' . $image_extension;
        $valid_extensions = ['jpg', 'jpeg', 'png'];

        if ($image_name != NULL) {
            if ($this->getProductName($name) != null) {
                $_SESSION['errorMessage'] = "Product already exists";
                header("location: ../create-product.php");
                exit(0);
            } else if (!in_array($image_extension, $valid_extensions)) {
                $_SESSION['errorMessage'] = "invalid file format! only <strong>['jpg', 'jpeg', 'png']</strong> is allowed.";
                header("location: ../create-product.php");
                exit(0);
            } else if ($image_size > 512000) {
                $_SESSION['errorMessage'] = "file too large! only a maximum <strong>filesize of 500kb</strong> is allowed.";
                header("location: ../create-product.php");
                exit(0);
            } else {
                $destination = "../../assets/images/products/$filename";
                move_uploaded_file($image_tmp_name, $destination);

                $sql = "INSERT INTO products (category_id, name, slug, caption, description, image, cost_price, selling_price, price_range, SKU, items_in_stock, meta_title, meta_keywords, meta_description, author, soldout, trending, status) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $statement = $this->db->prepare($sql);
                $statement->execute([$category, $name, $slug, $caption, $description, $filename, $cost_price, $selling_price, $price_range, $SKU, $items_in_stock, $meta_title, $meta_keywords, $meta_description, $author, $soldout, $trending, $status]);

                if ($statement) {
                    $_SESSION['successMessage'] = "Product created successfully!";
                    header("location: ../view-products.php");
                    exit(0);
                } else {
                    $_SESSION['errorMessage'] = "Something Went Wrong!";
                    header("location: ../view-products.php");
                    exit(0);
                }
            }
        } else {
            if ($this->getProductName($name) != null) {
                $_SESSION['errorMessage'] = "Product already exists";
                header("location: ../create-product.php");
                exit(0);
            } else {
                $sql = "INSERT INTO products (category_id, name, slug, caption, description, cost_price, selling_price, price_range, SKU, items_in_stock, meta_title, meta_keywords, meta_description, author, soldout, trending, status) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $statement = $this->db->prepare($sql);
                $statement->execute([$category, $name, $slug, $caption, $description, $cost_price, $selling_price, $price_range, $SKU, $items_in_stock, $meta_title, $meta_keywords, $meta_description, $author, $soldout, $trending, $status]);

                if ($statement) {
                    $_SESSION['successMessage'] = "Product created successfully!";
                    header("location: ../view-products.php");
                    exit(0);
                } else {
                    $_SESSION['errorMessage'] = "Something Went Wrong!";
                    header("location: ../view-products.php");
                    exit(0);
                }
            }
        }
    }

    public function createProductWeight($product_id, $weight, $new_price, $other_info, $status)
    {
        $sql = "INSERT INTO product_weights (product_id, weight, new_price, other_info, status) VALUES(?,?,?,?,?)";
        $statement = $this->db->prepare($sql);
        $statement->execute([$product_id, $weight, $new_price, $other_info, $status]);

        if ($statement) {
            $_SESSION['successMessage'] = "Product Weight created successfully!";
            header("location: ../product-details.php?pId=$product_id");
            exit(0);
        } else {
            $_SESSION['errorMessage'] = "Something Went Wrong!";
            header("location: ../view-products.php");
            exit(0);
        }
    }

    public function createProductSize($product_id, $size, $new_price, $other_info, $status)
    {
        $sql = "INSERT INTO product_sizes (product_id, size, new_price, other_info, status) VALUES(?,?,?,?,?)";
        $statement = $this->db->prepare($sql);
        $statement->execute([$product_id, $size, $new_price, $other_info, $status]);

        if ($statement) {
            $_SESSION['successMessage'] = "Product Size created successfully!";
            header("location: ../product-details.php?pId=$product_id");
            exit(0);
        } else {
            $_SESSION['errorMessage'] = "Something Went Wrong!";
            header("location: ../view-products.php");
            exit(0);
        }
    }

    public function createProductSlot($product_id, $slot, $new_price, $other_info, $status)
    {
        $sql = "INSERT INTO product_slots (product_id, slot, new_price, other_info, status) VALUES(?,?,?,?,?)";
        $statement = $this->db->prepare($sql);
        $statement->execute([$product_id, $slot, $new_price, $other_info, $status]);

        if ($statement) {
            $_SESSION['successMessage'] = "Product slot created successfully!";
            header("location: ../product-details.php?pId=$product_id");
            exit(0);
        } else {
            $_SESSION['errorMessage'] = "Something Went Wrong!";
            header("location: ../view-products.php");
            exit(0);
        }
    }

    public function editProduct($product_id, $category, $name, $slug, $caption, $description, $image, $old_image, $cost_price, $selling_price, $price_range, $SKU, $items_in_stock, $meta_title, $meta_keywords, $meta_description, $author, $soldout, $trending, $status)
    {
        $image_name = $image['name'];
        $image_size = $image['size'];
        $image_tmp_name = $image['tmp_name'];
        $image_extension = pathinfo($image_name, PATHINFO_EXTENSION);
        $filename = uniqid() . '.' . $image_extension;
        $valid_extensions = ['jpg', 'jpeg', 'png'];

        if ($image_name != NULL) {
            if (!in_array($image_extension, $valid_extensions)) {
                $_SESSION['errorMessage'] = "invalid file format! only <strong>['jpg', 'jpeg', 'png']</strong> is allowed.";
                header("location: ../edit-product.php?pId=$product_id");
                exit(0);
            } else if ($image_size > 512000) {
                $_SESSION['errorMessage'] = "file too large! only a maximum <strong>filesize of 500kb</strong> is allowed.";
                header("location: ../edit-product.php?pId=$product_id");
                exit(0);
            } else {

                $olDestination = "../../assets/images/products/$old_image";

                if (file_exists($olDestination)) {
                    unlink($olDestination);
                }

                $destination = "../../assets/images/products/$filename";
                move_uploaded_file($image_tmp_name, $destination);

                $sql = "UPDATE products SET category_id=?, name=?, slug=?, caption=?, description=?, image=?, cost_price=?, selling_price=?, price_range=?, SKU=?, items_in_stock=?, meta_title=?, meta_keywords=?, meta_description=?, author=?, soldout=?, trending=?, status=? WHERE id=?";
                $statement = $this->db->prepare($sql);
                $statement->execute([$category, $name, $slug, $caption, $description, $filename, $cost_price, $selling_price, $price_range, $SKU, $items_in_stock, $meta_title, $meta_keywords, $meta_description, $author, $soldout, $trending, $status, $product_id]);

                if ($statement) {
                    $_SESSION['successMessage'] = "Product updated successfully!";
                    header("location: ../view-products.php");
                    exit(0);
                } else {
                    $_SESSION['errorMessage'] = "Something Went Wrong!";
                    header("location: ../view-products.php");
                    exit(0);
                }
            }
        } else {

            $sql = "UPDATE products SET category_id=?, name=?, slug=?, caption=?, description=?, cost_price=?, selling_price=?, price_range=?, SKU=?, items_in_stock=?, meta_title=?, meta_keywords=?, meta_description=?, author=?, soldout=?, trending=?, status=? WHERE id=?";
            $statement = $this->db->prepare($sql);
            $statement->execute([$category, $name, $slug, $caption, $description, $cost_price, $selling_price, $price_range, $SKU, $items_in_stock, $meta_title, $meta_keywords, $meta_description, $author, $soldout, $trending, $status, $product_id]);

            if ($statement) {
                $_SESSION['successMessage'] = "Product updated successfully!";
                header("location: ../view-products.php");
                exit(0);
            } else {
                $_SESSION['errorMessage'] = "Something Went Wrong!";
                header("location: ../view-products.php");
                exit(0);
            }
        }
    }

    public function getProductCat()
    {
        $sql = "SELECT p.*, 
        c.name AS category_name,
        c.slug AS category_slug,
        c.caption AS category_caption,
        c.description AS category_description,
        c.image AS category_image,
        c.status AS category_status
        FROM products p INNER JOIN
        categories c ON p.category_id = c.id ORDER BY p.date DESC";
        $statement = $this->db->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result ?: null;
    }

    public function getProductCatbySlug($prod_slug)
    {
        $cStatus = "0";
        $pStatus = "0";

        $sql = "SELECT p.*, 
        c.name AS category_name,
        c.slug AS category_slug,
        c.caption AS category_caption,
        c.description AS category_description,
        c.image AS category_image,
        c.status AS category_status
        FROM products p INNER JOIN
        categories c ON p.category_id = c.id WHERE p.slug=? AND c.status=? AND p.status=?";
        $statement = $this->db->prepare($sql);
        $statement->execute([$prod_slug, $cStatus, $pStatus]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result ?: null;
    }

    public function getProductCatbyId($prod_id)
    {
        $sql = "SELECT p.*, 
        c.name AS category_name,
        c.slug AS category_slug,
        c.caption AS category_caption,
        c.description AS category_description,
        c.image AS category_image,
        c.status AS category_status
        FROM products p INNER JOIN
        categories c ON p.category_id = c.id WHERE p.id=?";
        $statement = $this->db->prepare($sql);
        $statement->execute([$prod_id]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result ?: null;
    }

    public function relatedProducts($catId, $product_id)
    {
        $cStatus = "0";
        $pStatus = "0";

        $sql = "SELECT p.*, 
        c.name AS category_name,
        c.slug AS category_slug,
        c.caption AS category_caption,
        c.description AS category_description,
        c.image AS category_image,
        c.status AS category_status
        FROM products p INNER JOIN
        categories c ON p.category_id = c.id WHERE p.category_id=? AND p.id !=? AND c.status=? AND p.status=?";
        $statement = $this->db->prepare($sql);
        $statement->execute([$catId, $product_id, $cStatus, $pStatus]);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result ?: null;
    }

    public function getLatestProducts()
    {
        $cStatus = "0";
        $pStatus = "0";

        $sql = "SELECT p.*, 
        c.name AS category_name,
        c.slug AS category_slug,
        c.caption AS category_caption,
        c.description AS category_description,
        c.image AS category_image,
        c.status AS category_status
        FROM products p INNER JOIN
        categories c ON p.category_id = c.id WHERE c.status=? AND p.status=? ORDER BY p.date DESC";
        $statement = $this->db->prepare($sql);
        $statement->execute([$cStatus, $pStatus]);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result ?: [];
    }

    public function getTrendingProducts()
    {
        $cStatus = "0";
        $pStatus = "0";
        $trending = "1";

        $sql = "SELECT p.*, 
        c.name AS category_name,
        c.slug AS category_slug,
        c.caption AS category_caption,
        c.description AS category_description,
        c.image AS category_image,
        c.status AS category_status
        FROM products p INNER JOIN
        categories c ON p.category_id = c.id WHERE p.trending=? AND c.status=? AND p.status=? ORDER BY p.date DESC";
        $statement = $this->db->prepare($sql);
        $statement->execute([$trending, $cStatus, $pStatus]);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result ?: [];
    }

    public function getProductName($name)
    {
        $sql = "SELECT * FROM products WHERE name=? ORDER BY date DESC";
        $statement = $this->db->prepare($sql);
        $statement->execute([$name]);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        if ($result != null) {
            return $result;
        } else {
            return $result = null;
        }
    }

    public function getProductWSSlot($table = "product_weights", $prod_id)
    {
        $sql = "SELECT * FROM $table WHERE product_id=? ORDER BY date DESC";
        $statement = $this->db->prepare($sql);
        $statement->execute([$prod_id]);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result ?: null;

    }

    public function getProductsStatus($table = "products")
    {
        $status = '0';
        $sql = "SELECT * FROM $table WHERE status=? ORDER BY date DESC";
        $statement = $this->db->prepare($sql);
        $statement->execute([$status]);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        if ($result != null) {
            return $result;
        } else {
            return $result = null;
        }
    }

    public function getProductBySlug($table = "products", $slug)
    {
        $status = '0';
        $sql = "SELECT * FROM $table WHERE slug=? AND status=?";
        $statement = $this->db->prepare($sql);
        $statement->execute([$slug, $status]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result ?: null;
    }

    public function getProdMsrmentById($table, $prod_id)
    {
        $status = '0';
        $sql = "SELECT * FROM $table WHERE product_id=? AND status=?";
        $statement = $this->db->prepare($sql);
        $statement->execute([$prod_id, $status]);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result ?: null;
    }

    public function getProductsByCatId($catId)
    {
        $status = '0';
        $sql = "SELECT * FROM products WHERE category_id=? AND status=? ORDER BY date DESC";
        $statement = $this->db->prepare($sql);
        $statement->execute([$catId, $status]);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        if ($result != null) {
            return $result;
        } else {
            return $result = null;
        }
    }

    public function paginateProducts()
    {
        $sqlTotal = "SELECT COUNT(*)
                     FROM products p
                     INNER JOIN categories c ON p.category_id = c.id
                     WHERE c.status = ? AND p.status = ?";

        $sql = "SELECT p.*, 
                       c.name AS category_name,
                       c.slug AS category_slug,
                       c.caption AS category_caption,
                       c.description AS category_description,
                       c.image AS category_image,
                       c.status AS category_status
                FROM products p
                INNER JOIN categories c ON p.category_id = c.id
                WHERE c.status = ? AND p.status = ?";

        // Return the SQL queries
        return [
            'sqlTotal' => $sqlTotal,
            'sql' => $sql,
        ];
    }
}
