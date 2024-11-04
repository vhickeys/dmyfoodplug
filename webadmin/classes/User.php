<?php

class User
{
    private $db;

    public function __construct(Database $database)
    {
        $this->db = $database->getConnection();
    }

    public function registerUser($fullname, $email, $password, $role)
    {

        $checkSql = "SELECT * FROM users WHERE email=?";
        $statement = $this->db->prepare($checkSql);
        $statement->bindParam(1, $email, PDO::PARAM_STR);
        $statement->execute();

        $userResult = $statement->fetch(PDO::FETCH_ASSOC);

        if (isset($userResult['email'])) {
            echo "User Already Exists! Please Sign In";
        } else {
            $hashPassword = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT into users(full_name,email,password, role) values(?,?,?,?)";
            $statement = $this->db->prepare($sql);
            $statement->bindParam(1, $fullname, PDO::PARAM_STR);
            $statement->bindParam(2, $email, PDO::PARAM_STR);
            $statement->bindParam(3, $hashPassword, PDO::PARAM_STR);
            $statement->bindParam(4, $role, PDO::PARAM_INT);
            $statement->execute();

            $userId = $this->db->lastInsertId();
            // $this->createTransaction($userId);

            if ($statement) {
                welcomeMail("support@dmyfoodplug.com", $email, $fullname);
                echo "Registration Successful!";
            } else {
                echo "something went wrong!";
            }
        }
    }

    public function loginUser($email, $password)
    {
        $checkSql = "SELECT * FROM users WHERE email=?";
        $statement = $this->db->prepare($checkSql);
        $statement->bindParam(1, $email, PDO::PARAM_STR);
        $statement->execute();

        $loginResult = $statement->fetch(PDO::FETCH_ASSOC);

        if ($loginResult == null) {
            $response = [
                "message" => "invalid"
            ];

            $json = json_encode($response);
            echo $json;
        } else {
            if (!password_verify($password, $loginResult['password'])) {

                $response = [
                    "message" => "incorrect"
                ];

                $json = json_encode($response);
                echo $json;
            } elseif ($loginResult['access'] == 1) {
                $response = [
                    "message" => "suspended"
                ];

                $json = json_encode($response);
                echo $json;
            } else {
                $_SESSION['user_data'] = [
                    'userId' => $loginResult['id'],
                    'fullName' => $loginResult['full_name'],
                    'email' => $loginResult['email'],
                    'role' => $loginResult['role'],
                    'access' => $loginResult['access'],
                    'interaction' => "",
                ];

                $response = [
                    "message" => "successful",
                    "data" => [
                        'userId' => $loginResult['id'],
                        'fullName' => $loginResult['full_name'],
                        'email' => $loginResult['email'],
                        'role' => $loginResult['role'],
                        'access' => $loginResult['access'],
                        'interaction' => "",
                    ],
                ];

                $json = json_encode($response);
                echo $json;
            }
        }
    }

    public function changePassword($userId, $new_password)
    {
        $checkSql = "SELECT * FROM users WHERE id=? LIMIT 1";
        $statement = $this->db->prepare($checkSql);
        $statement->bindParam(1, $userId, PDO::PARAM_STR);
        $statement->execute();
        $userResult = $statement->fetch(PDO::FETCH_ASSOC);

        if ($userResult != null) {
            $hashPassword = password_hash($new_password, PASSWORD_DEFAULT);
            $sql = "UPDATE users SET password=?";
            $statement = $this->db->prepare($sql);
            $statement->bindParam(1, $hashPassword, PDO::PARAM_STR);
            $statement->execute();

            if ($statement) {
                passwordChangeMail("support@dmyfoodplug.com", $userResult['email'], $userResult['full_name']);
                echo "Password Updated Successfully!";
            } else {
                echo "something went wrong!";
            }
        } else {
            echo "Password can't be changed, user doesn't exist!";
        }
    }

    public function loginAdmin($email, $password)
    {
        $checkSql = "SELECT * FROM users WHERE email=?";
        $statement = $this->db->prepare($checkSql);
        $statement->bindParam(1, $email, PDO::PARAM_STR);
        $statement->execute();

        $loginResult = $statement->fetch(PDO::FETCH_ASSOC);

        // echo "<pre>";
        // print_r($loginResult);

        if ($loginResult == null) {

            $_SESSION['errorMessage'] = "invalid user. No account found!";
            header("location: ../login.php");
            exit(0);
        } else {
            if (!password_verify($password, $loginResult['password'])) {

                $_SESSION['errorMessage'] = "You've entered an incorrect password. Please try again!";
                header("location: ../login.php");
                exit(0);
            } elseif ($loginResult['access'] == 1) {
                $_SESSION['errorMessage'] = "Your account has been suspended! Please contact admin";
                header("location: ../login.php");
                exit(0);
            } else {
                $_SESSION['user_data'] = [
                    'fullName' => $loginResult['full_name'],
                    'email' => $loginResult['email'],
                    'role' => $loginResult['role'],
                    'access' => $loginResult['access'],
                ];

                $_SESSION['successMessage'] = "Login Successful! Redirecting...";
                header("location: ../index.php");
                exit(0);
            }
        }
    }

    public function createTransaction($user_id)
    {
        $sql = "INSERT into transaction (user_id) values(?)";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $user_id, PDO::PARAM_INT);
        $statement->execute();
    }

    public function updateUserRole($userRole, $userId)
    {
        $sql = "UPDATE users SET role=? WHERE id=?";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $userRole, PDO::PARAM_INT);
        $statement->bindParam(2, $userId, PDO::PARAM_INT);
        $statement->execute();

        if ($statement) {
            $_SESSION['successMessage'] = "User Role Updated Successfully!";
            header("location: ../view-users.php");
            exit(0);
        } else {
            $_SESSION['errorMessage'] = "Something Went Wrong!";
            header("location: ../view-users.php");
            exit(0);
        }
    }

    public function userAccess($access, $userId)
    {
        $sql = "UPDATE users SET access=? WHERE id=?";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $access, PDO::PARAM_INT);
        $statement->bindParam(2, $userId, PDO::PARAM_INT);
        $statement->execute();
        $message = $access == 1 ? "Blocked" : "UnBlocked";

        if ($statement) {
            $_SESSION['successMessage'] = "User $message Successfully!";
            header("location: ../view-users.php");
            exit(0);
        } else {
            $_SESSION['errorMessage'] = "Something Went Wrong!";
            header("location: ../view-users.php");
            exit(0);
        }
    }

    public function logoutUser()
    {
        session_start();
        session_unset();
        session_destroy();
        header("location: ../login.php");
    }
}
