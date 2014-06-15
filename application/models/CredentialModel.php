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
        $sql = "SELECT c.id, c.login, c.password, c.description, r.name FROM credential as c, role as r ";
        $sql.= "WHERE c.role_id=r.id";
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

        $sql = "INSERT INTO credential (role_id, login, password, description) VALUES (:role_id, :login, PASSWORD(:password), :description)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':role_id' => $role_id, ':login' => $login, ':password' => $password, ':description' => $description));
    }

    public function deleteCredential($id)
    {
        $sql = "DELETE FROM credential WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
    }

    // 1 means success, 2 means not found.
    public function getLoginStatus($login, $password) {
        $sql = "SELECT COUNT(id) as amount_of_login FROM credential WHERE login=':login' AND password=PASSWORD(':password')";
        $query = $this->db->prepare($sql);
        $query->execute(array(':login' => $login, ':password' => $password));
        return $query->fetch()->amount_of_login;
    }
}