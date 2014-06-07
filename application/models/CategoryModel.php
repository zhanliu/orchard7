<?php

class CategoryModel
{
    /**
     * Every model needs a database connection, passed to the model
     * @param object $db A PDO database connection
     */
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }


    public function getAllCategories()
    {
        $sql = "SELECT id, name FROM category";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function addCategory($name)
    {
        // clean the input from javascript code for example
        $name = strip_tags($name);

        $sql = "INSERT INTO category (name) VALUES (:name)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':name' => $name));
    }

    public function deleteCategory($id)
    {
        $sql = "DELETE FROM category WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
    }
}