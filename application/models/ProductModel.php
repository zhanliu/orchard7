<?php

class ProductModel
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


    public function getAllProducts()
    {
        $sql = "SELECT id, name,category_id,unit, price, description, tag, is_archived, created_time, updated_time FROM product";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function addProduct($name, $category_id, $unit, $price,$description, $tag, $is_archived)
    {
        // clean the input from javascript code for example
        $name = strip_tags($name);
        $category_id = strip_tags($category_id);
        $unit = strip_tags($unit);
        $price = strip_tags($price);
        $description = strip_tags($description);
        $tag = strip_tags($tag);
        $is_archived = strip_tags($is_archived);

        $now = time();
        $created_time = date("Y-m-d H:i:s" ,$now);
        $updated_time = date("Y-m-d H:i:s" ,$now);

        $sql = "INSERT INTO product (name, category_id, unit, price, description, tag, is_archived, created_time, updated_time) VALUES (:name,:category_id, :unit, :price,:description,:tag, :is_archived,:created_time, :updated_time)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':name' => $name, ':category_id'=> $category_id, ':unit'=>$unit, ':price'=>$price, ':description'=>$description, ':tag'=>$tag, ':is_archived'=>$is_archived, 'created_time'=>$created_time, 'updated_time'=>$updated_time));
    }

    public function deleteProduct($id)
    {
        $sql = "DELETE FROM product WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
    }
}