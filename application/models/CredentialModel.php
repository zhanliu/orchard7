<?php

class CredentialModel
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


    public function getAllCredentials()
    {
        $sql = "SELECT id, role_id, login, password, description FROM role";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function addCredential($role_id, $login, $password, $description)
    {
        $role_id = strip_tags($role_id);
        $login = strip_tags($login);
        $password = strip_tags($password);
        $description = strip_tags($description);

        $sql = "INSERT INTO role (role_id, login, password, description) VALUES (:role_id, :login, :password, :description)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':role_id' => $role_id, ':login' => $login, ':password' => $password, ':description' => $description));
    }

    public function deleteCredential($id)
    {
        $sql = "DELETE FROM credential WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
    }
}