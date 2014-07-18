<?php

class RoleModel
{
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }


    public function getAllRoles()
    {
        $sql = "SELECT id, name,description FROM role";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function addRole($name, $description)
    {
        // clean the input from javascript code for example
        $name = strip_tags($name);
        $description = strip_tags($description);

        $sql = "INSERT INTO role (name, description) VALUES (:name, :description)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':name' => $name, ':description' => $description));
    }

    public function deleteRole($id)
    {
        $sql = "DELETE FROM role WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
    }
}