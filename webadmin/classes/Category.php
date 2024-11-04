<?php

class Category
{
    private $db;

    public function __construct(Database $database)
    {
        $this->db = $database->getConnection();
    }

    public function createCategory($name, $slug, $caption, $description, $image, $meta_title, $meta_keywords, $meta_description, $author, $status)
    {
        $image_name = $image['name'];
        $image_size = $image['size'];
        $image_tmp_name = $image['tmp_name'];
        $image_extension = pathinfo($image_name, PATHINFO_EXTENSION);
        $filename = uniqid() . '.' . $image_extension;
        $valid_extensions = ['jpg', 'jpeg', 'png'];

        if ($image_name != NULL) {
            if ($this->getCategoryName($name) != null) {
                $_SESSION['errorMessage'] = "Category already exists";
                header("location: ../create-category.php");
                exit(0);
            } else if (!in_array($image_extension, $valid_extensions)) {
                $_SESSION['errorMessage'] = "invalid file format! only <strong>['jpg', 'jpeg', 'png']</strong> is allowed.";
                header("location: ../create-category.php");
                exit(0);
            } else if ($image_size > 512000) {
                $_SESSION['errorMessage'] = "file too large! only a maximum <strong>filesize of 500kb</strong> is allowed.";
                header("location: ../create-category.php");
                exit(0);
            } else {
                $destination = "../../assets/images/categories/$filename";
                move_uploaded_file($image_tmp_name, $destination);

                $sql = "INSERT INTO categories(name, slug, caption, description, image, meta_title, meta_keywords, meta_description, author, status) VALUES(?,?,?,?,?,?,?,?,?,?)";
                $statement = $this->db->prepare($sql);
                $statement->execute([$name, $slug, $caption, $description, $filename, $meta_title, $meta_keywords, $meta_description, $author, $status]);

                if ($statement) {
                    $_SESSION['successMessage'] = "Category created successfully!";
                    header("location: ../view-categories.php");
                    exit(0);
                } else {
                    $_SESSION['errorMessage'] = "Something Went Wrong!";
                    header("location: ../view-categories.php");
                    exit(0);
                }
            }
        } else {
            if ($this->getCategoryName($name) != null) {
                $_SESSION['errorMessage'] = "Category already exists";
                header("location: ../create-category.php");
                exit(0);
            } else {
                $sql = "INSERT INTO categories(name, slug, caption, description, meta_title, meta_keywords, meta_description, author, status) VALUES(?,?,?,?,?,?,?,?,?)";
                $statement = $this->db->prepare($sql);
                $statement->execute([$name, $slug, $caption, $description, $meta_title, $meta_keywords, $meta_description, $author, $status]);

                if ($statement) {
                    $_SESSION['successMessage'] = "Category created successfully!";
                    header("location: ../view-categories.php");
                    exit(0);
                } else {
                    $_SESSION['errorMessage'] = "Something Went Wrong!";
                    header("location: ../view-categories.php");
                    exit(0);
                }
            }
        }
    }

    public function editCategory($category_id, $name, $slug, $caption, $description, $image, $old_image, $meta_title, $meta_keywords, $meta_description, $author, $status)
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
                header("location: ../edit-category.php?cId=$category_id");
                exit(0);
            } else if ($image_size > 512000) {
                $_SESSION['errorMessage'] = "file too large! only a maximum <strong>filesize of 500kb</strong> is allowed.";
                header("location: ../edit-category.php?cId=$category_id");
                exit(0);
            } else {

                $olDestination = "../../assets/images/categories/$old_image";

                if (file_exists($olDestination)) {
                    unlink($olDestination);
                }

                $destination = "../../assets/images/categories/$filename";
                move_uploaded_file($image_tmp_name, $destination);

                $sql = "UPDATE categories SET name=?, slug=?, caption=?, description=?, image=?, meta_title=?, meta_keywords=?, meta_description=?, author=?, status=? WHERE id=?";
                $statement = $this->db->prepare($sql);
                $statement->execute([$name, $slug, $caption, $description, $filename, $meta_title, $meta_keywords, $meta_description, $author, $status, $category_id]);

                if ($statement) {
                    $_SESSION['successMessage'] = "Category updated successfully!";
                    header("location: ../view-categories.php");
                    exit(0);
                } else {
                    $_SESSION['errorMessage'] = "Something Went Wrong!";
                    header("location: ../view-categories.php");
                    exit(0);
                }
            }
        } else {

            $sql = "UPDATE categories SET name=?, slug=?, caption=?, description=?, meta_title=?, meta_keywords=?, meta_description=?, author=?, status=? WHERE id=?";
            $statement = $this->db->prepare($sql);
            $statement->execute([$name, $slug, $caption, $description, $meta_title, $meta_keywords, $meta_description, $author, $status, $category_id]);

            if ($statement) {
                $_SESSION['successMessage'] = "Category updated successfully!";
                header("location: ../view-categories.php");
                exit(0);
            } else {
                $_SESSION['errorMessage'] = "Something Went Wrong!";
                header("location: ../view-categories.php");
                exit(0);
            }
        }
    }

    public function getCategories($table = "categories")
    {
        $sql = "SELECT * FROM $table ORDER BY date DESC";
        $statement = $this->db->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        if ($result != null) {
            return $result;
        } else {
            return $result = null;
        }
    }

    public function getCategoryName($name)
    {
        $sql = "SELECT * FROM categories WHERE name=? ORDER BY date DESC";
        $statement = $this->db->prepare($sql);
        $statement->execute([$name]);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        if ($result != null) {
            return $result;
        } else {
            return $result = null;
        }
    }

    public function getCategoriesStatus($table = "categories")
    {
        $status = "0";

        $sql = "SELECT * FROM $table WHERE status=? ORDER BY date DESC";
        $statement = $this->db->prepare($sql);
        $statement->execute([$status]);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        if ($result != null) {
            return $result;
        } else {
            return $result = [];
        }
    }

    public function getCategoryBySlug($table = "categories", $slug)
    {
        $status = "0";

        $sql = "SELECT * FROM $table WHERE slug=? AND status=?";
        $statement = $this->db->prepare($sql);
        $statement->execute([$slug, $status]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if ($result != null) {
            return $result;
        } else {
            return $result = null;
        }
    }
}
