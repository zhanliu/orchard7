<?php

class ComboDetailModel
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

    public function addMapping($combo_id, $product_id, $quantity)
    {
        // clean the input from javascript code for example
        $combo_id = strip_tags($combo_id);
        $product_id = strip_tags($product_id);
        $quantity = strip_tags($quantity);

        $now = time();
        $created_time = date("Y-m-d H:i:s" ,$now);
        $updated_time = date("Y-m-d H:i:s" ,$now);

        $sql = "INSERT INTO combo_detail (combo_id, product_id, quantity, created_time, updated_time) VALUES (:combo_id, :product_id, :quantity, :created_time, :updated_time)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':combo_id' => $combo_id, ':product_id'=>$product_id, ':quantity'=>$quantity, ':created_time'=>$created_time, ':updated_time'=>$updated_time));
        $insertedId = $this->db->lastInsertId();
        return $insertedId;
    }

    public function deleteMapping($id)
    {
        $sql = "DELETE FROM combo_detail WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
    }

    public function deleteMappingByProductId($id)
    {
        $sql = "DELETE FROM combo_detail WHERE product_id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
    }

    public function deleteMappingByComboId($id)
    {
        $sql = "DELETE FROM combo_detail WHERE combo_id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
    }


}