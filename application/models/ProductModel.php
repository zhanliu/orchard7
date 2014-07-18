<?php

class ProductModel
{
    protected $select_clause;
    function __construct($db) {
        try {
            $this->db = $db;
            $select_clause = "SELECT id, name,category_id,unit, price, original_price, description, tag, img_url, is_active, ";
            $select_clause.= "created_time, updated_time FROM product ";
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }


    public function getAllProducts()
    {
        $sql = $this->select_clause;
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function getProductsByIds($product_ids) {
        $id_group = "";
        foreach ($product_ids as $product_id) {
            $id_group.= $product_id.",";
        }
        $id_group = substr_replace($id_group, '', -1);

        $sql = $this->select_clause." WHERE id in (".$id_group.")";

        //return $sql;

        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function getProductById($product_id)
    {
        $sql = $this->select_clause." WHERE id=".$product_id;
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function getPriceById($product_id)
    {
        $sql = "SELECT price FROM product ";
        $sql.= "WHERE id=".$product_id;
        $query = $this->db->prepare($sql);
        $query->execute();

        $result = $query->fetchAll();

        return $result[0]->price;
    }

    public function getProductsByComboId($combo_id) {
        $sql = "SELECT p.id, p.name, p.category_id, p.unit, p.price, p.description, p.tag, p.img_url, cd.combo_id, ";
        $sql.= "cd.product_id, cd.quantity ";
        $sql.= "FROM product as p, combo_detail as cd ";
        $sql.= "WHERE p.id=cd.product_id AND cd.combo_id=".$combo_id;
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function addProduct($name, $category_id, $unit, $price,$original_price, $description, $tag, $img_url, $is_active)
    {
        // clean the input from javascript code for example
        $name = strip_tags($name);
        $category_id = strip_tags($category_id);
        $unit = strip_tags($unit);
        $price = strip_tags($price);
        $original_price = strip_tags($original_price);
        $description = strip_tags($description);
        $tag = strip_tags($tag);
        $img_url = strip_tags($img_url);
        $is_active = strip_tags($is_active);

        $now = time();
        $created_time = date("Y-m-d H:i:s" ,$now);
        $updated_time = date("Y-m-d H:i:s" ,$now);

        $sql = "INSERT INTO product (name, category_id, unit, price,original_price, description, tag, img_url, ";
        $sql.= "is_active, created_time, updated_time) VALUES (:name,:category_id, :unit, :price,:original_price, ";
        $sql.= ":description,:tag, :img_url, :is_active, :created_time, :updated_time)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':name' => $name, ':category_id'=> $category_id, ':unit'=>$unit, ':price'=>$price,':original_price'=>$original_price , ':description'=>$description, ':tag'=>$tag, ':img_url'=>$img_url, ':is_active'=>$is_active, ':created_time'=>$created_time, ':updated_time'=>$updated_time));
    }

    public function deleteProduct($id) {
        $sql = "DELETE FROM product WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
    }

    public function getProductsByOrderId($order_id) {
        $sql = "SELECT p.id, p.name, p.price from product as p, order_details as od ";
        $sql.= "WHERE od.item_id=p.id and od.order_id=".$order_id;

        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
}