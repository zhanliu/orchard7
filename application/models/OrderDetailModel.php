<?php

class OrderDetailModel
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

    /**
     * ##### FOR DEBUG PURPOSE ONLY #####
     */
    public function getAllOrderDetails()
    {
        $sql = "SELECT od.order_id, od.item_id, od.item_quantity, p.name, p.price ";
        $sql.= "FROM order_details as od, product as p WHERE od.item_id = p.id order by od.id asc";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function getOrderDetailsById($id)
    {
        $sql = "SELECT od.order_id, od.item_id, od.item_quantity, p.name, p.price ";
        $sql.= "FROM order_details as od, product as p ";
        $sql.= "WHERE od.item_id = p.id AND od.order_id=" . $id;

        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function addOrderDetail($order_id, $item_type, $item_id, $item_quantity)
    {
        // clean the input from javascript code for example
        $order_id = strip_tags($order_id);
        $item_type = strip_tags($item_type);
        $item_id = strip_tags($item_id);
        $item_quantity = strip_tags($item_quantity);

        $now = time();
        $created_time = date("Y-m-d H:i:s" ,$now);
        $updated_time = date("Y-m-d H:i:s" ,$now);

        $sql = "insert into order_details (order_id, item_type, item_id, item_quantity, created_time, updated_time) ";
        $sql.= "VALUES (:order_id, :item_type, :item_id, :item_quantity, :created_time, :updated_time)";
        $query = $this->db->prepare($sql);

        $query->execute(array(':order_id' => $order_id, ':item_type' => $item_type, ':item_id'=> $item_id ,':item_quantity' => $item_quantity, ':created_time'=>$created_time, ':updated_time'=>$updated_time));
        $insertedId = $this->db->lastInsertId();

        return $insertedId;
    }

    public function getOrderDetailByOrderDetailId($order_detail_id) {
        $sql = "SELECT * FROM order_details WHERE order_details.id=".$order_detail_id;
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function getOrderDetailByOrderId($order_id) {
        $sql = "SELECT od.item_id, od.item_quantity, p.name, p.price ";
        $sql.= "FROM order_details as od, product as p ";
        $sql.= "WHERE od.order_id=".$order_id . " and od.product_id = p.id ";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function deleteOrderDetail($id)
    {
        $sql = "DELETE FROM order_details WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
    }

    public function deleteOrderDetailByOrderId($order_id)
    {
        $sql = "DELETE FROM order_details WHERE order_id = :order_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':order_id' => $order_id));
    }
}
