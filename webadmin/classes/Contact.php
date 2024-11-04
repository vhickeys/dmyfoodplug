<?php

class Contact
{
    private $db;

    public function __construct(Database $database)
    {
        $this->db = $database->getConnection();
    }

    public function contactSubmit($firstname, $lastname, $email, $phone, $subject, $message)
    {
        $sql = "INSERT into contacts (firstname, lastname, email, phone, subject, message) values(?,?,?,?,?,?)";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $firstname, PDO::PARAM_STR);
        $statement->bindParam(2, $lastname, PDO::PARAM_STR);
        $statement->bindParam(3, $email, PDO::PARAM_STR);
        $statement->bindParam(4, $phone, PDO::PARAM_STR);
        $statement->bindParam(5, $subject, PDO::PARAM_STR);
        $statement->bindParam(6, $message, PDO::PARAM_STR);
        $statement->execute();

        if ($statement) {
            // welcomeMail("support@coinhabor.com", $email, $fullname);
            echo "Message sent successfully!";
        } else {
            echo "something went wrong!";
        }
    }

    public function getContacts()
    {
        $sql = "SELECT * FROM contacts ORDER BY date DESC";
        $statement = $this->db->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result ?: null;
    }

    public function getVisitors()
    {
        $sql = "SELECT * FROM visitors ORDER BY date DESC";
        $statement = $this->db->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result ?: null;
    }
}
