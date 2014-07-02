<?php

class ComboModel
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


    public function getAllCombos()
    {
        $sql = "SELECT id, name, price,original_price, description, tag, img_url, is_active, created_time, updated_time FROM combo";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function addCombo($name, $price, $description, $tag, $img_url, $is_active)
    {
        // clean the input from javascript code for example
        $name = strip_tags($name);
        $price = strip_tags($price);
        $description = '';//strip_tags($description);
        $tag = '';//strip_tags($tag);
        $img_url = strip_tags($img_url);
        $is_active = 1; //strip_tags($is_active);

        $now = time();
        $created_time = date("Y-m-d H:i:s" ,$now);
        $updated_time = date("Y-m-d H:i:s" ,$now);

        $sql = "INSERT INTO combo (name, price, description, tag, img_url, is_active, created_time, updated_time) VALUES (:name, :price, :description, :tag, :img_url, :is_active,:created_time, :updated_time)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':name' => $name, ':price'=>$price, ':description'=>$description, ':tag'=>$tag, ':img_url'=>$img_url, ':is_active'=>$is_active, 'created_time'=>$created_time, 'updated_time'=>$updated_time));
        $insertedId = $this->db->lastInsertId();

        return $insertedId;
    }

    public function deleteCombo($id)
    {
        $sql = "DELETE FROM combo WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
    }

    public function getComboById($combo_id)
    {
        $sql = "SELECT id, name, price, description, tag, is_active, created_time, updated_time FROM combo ";
        $sql.= "WHERE id=".$combo_id;
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }



}