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
        $sql = "SELECT od.order_id, od.combo_id, od.combo_quantity, c.name, c.price FROM order_details as od left join combo c on od.combo_id = c.id order by od.id asc";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function getAllOrderDetailsById($id)
    {
        $sql = "SELECT od.order_id, od.combo_id, od.combo_quantity, c.name, c.price FROM order_details as od left join combo c on od.combo_id = c.id ";
        $sql = $sql . ' WHERE od.order_id=' . $id;

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

        $sql = "insert into order_details (order_id, item_type, item_id, item_quantity, created_time, updated_time) VALUES (:order_id, :item_type, :item_id, :item_quantity, :created_time, :updated_time)";
        $query = $this->db->prepare($sql);

        $query->execute(array(':order_id' => $order_id, ':item_type' => $item_type, ':item_id'=> $item_id ,':item_quantity' => $item_quantity, ':created_time'=>$created_time, ':updated_time'=>$updated_time));
        $insertedId = $this->db->lastInsertId();

        return $insertedId;
    }

    public function getOrderDetailByOrderDetailId($order_detail_id) {
        $sql = "SELECT * ";
        $sql.= "FROM order_details o ";
        $sql.= "WHERE o.id=".$order_detail_id;
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function getOrderDetailByOrderId($order_id) {
        $sql = "SELECT od.combo_id, od.combo_quantity, c.name, c.price ";
        $sql.= "FROM order_details as od, combo as c ";
        $sql.= "WHERE od.order_id=".$order_id . " and od.combo_id = c.id ";
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
