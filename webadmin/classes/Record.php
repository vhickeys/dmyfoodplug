<?php

class Record
{
    private $db;

    public function __construct(Database $database)
    {
        $this->db = $database->getConnection();
    }

    public function getRecord($table, $recordID)
    {
        $sql = "SELECT * FROM $table WHERE id=?";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $recordID, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if ($result != null) {
            return $result;
        } else {
            return $result = null;
        }
    }

    public function getRecordByColumn($table, $columnName, $record)
    {
        $sql = "SELECT * FROM $table WHERE $columnName=?";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $record, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if ($result != null) {
            return $result;
        } else {
            return $result = null;
        }
    }
    public function getRecordByCol($table, $columnName, $record)
    {
        $sql = "SELECT * FROM $table WHERE $columnName=?";
        $statement = $this->db->prepare($sql);
        $statement->execute([$record]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if ($result != null) {
            return $result;
        } else {
            return $result = null;
        }
    }

    public function getRecordByColumnAndId($table, $columnName, $id, $record)
    {
        $sql = "SELECT * FROM $table WHERE id=? AND $columnName=?";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $id, PDO::PARAM_INT);
        $statement->bindParam(2, $record, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if ($result != null) {
            return $result;
        } else {
            return $result = null;
        }
    }

    public function getRecordBy2Cols($table, $column1, $column2, $column1Data, $column2Data)
    {
        $sql = "SELECT * FROM $table WHERE $column1=? AND $column2=?";
        $statement = $this->db->prepare($sql);
        $statement->execute([$column1Data, $column2Data]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result ?: null;
    }

    public function getRecords($table)
    {
        $sql = "SELECT * FROM $table";
        $statement = $this->db->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        if ($result != null) {
            return $result;
        } else {
            return $result = null;
        }
    }

    public function deleteRecord($table, $recordID, $record, $view_page_name)
    {
        $sql = "DELETE FROM $table WHERE id=?";
        $statement = $this->db->prepare($sql);
        $statement->execute([$recordID]);

        if ($statement) {
            $_SESSION['successMessage'] = "$record Deleted Successfully!";
            header("location: ../$view_page_name");
            exit(0);
        } else {
            $_SESSION['errorMessage'] = "Something Went Wrong!";
            header("location: ../$view_page_name");
            exit(0);
        }
    }

    public function countRecords($table)
    {
        $sql = "SELECT * FROM $table";
        $statement = $this->db->prepare($sql);
        $statement->execute();
        $result = $statement->rowCount();

        if ($result != null) {
            return $result;
        } else {
            return $result = null;
        }
    }
}
