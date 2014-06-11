<?php

class ComboProductMappingModel
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

    public function addMapping($combo_id, $product_id, $number_of_unit)
    {
        // clean the input from javascript code for example
        $combo_id = strip_tags($combo_id);
        $product_id = strip_tags($product_id);
        $number_of_unit = strip_tags($number_of_unit);

        $now = time();
        $created_time = date("Y-m-d H:i:s" ,$now);
        $updated_time = date("Y-m-d H:i:s" ,$now);

        $sql = "INSERT INTO combo_product_mapping (combo_id, product_id, number_of_unit, created_time, updated_time) VALUES (:combo_id, :product_id, :number_of_unit, :created_time, :updated_time)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':combo_id' => $combo_id, ':product_id'=>$product_id, ':number_of_unit'=>$number_of_unit, ':created_time'=>$created_time, ':updated_time'=>$updated_time));
        $insertedId = $this->db->lastInsertId();
        return $insertedId;
    }

    public function deleteMapping($id)
    {
        $sql = "DELETE FROM combo_product_mapping WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
    }


}