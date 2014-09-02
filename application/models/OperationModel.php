<?php

class OperationModel
{
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    /**
     * ##### FOR DEBUG PURPOSE ONLY #####
     */
    public function getAllOperationContents()
    {
        $sql = "SELECT * FROM operation_content";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function getOperationContentByName($name) {
        $sql = "SELECT * FROM operation_content WHERE name='".$name."'";

        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function addOperationContent($name, $content)
    {
        $name = strip_tags($name);
        $content = strip_tags($content);


        $sql = "INSERT INTO operation_content (name, content) ";
        $sql.= "VALUES (:name, :content)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':name' => $name,':content' => $content));
        $insertedId = $this->db->lastInsertId();
        return $insertedId;
    }

    public function deleteOperationContent($name)
    {
        $sql = "DELETE FROM operation_content WHERE name = :name";
        $query = $this->db->prepare($sql);
        $query->execute(array(':name' => $name));
    }
}
