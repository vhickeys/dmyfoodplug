<?php

class Payment
{
    private $db;

    public function __construct(Database $database)
    {
        $this->db = $database->getConnection();
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


        if (!$statement) {
            header("Location: ../../error.php?userID=$user_id&trkNo=$trkNo");
            exit;
        } else {
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
}
