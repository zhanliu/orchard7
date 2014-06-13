<?php

class OrderModel
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
    public function getAllOrders()
    {
        $sql = "SELECT * FROM order";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function addOrder($customer_id, $address_id, $is_diy, $total_amount)
    {
        // clean the input from javascript code for example
        $customer_id = strip_tags($customer_id);
        $address_id = strip_tags($address_id);
        $is_diy = strip_tags($is_diy);

        $status = 0;

        $now = time();
        $created_time = date("Y-m-d H:i:s" ,$now);
        $updated_time = date("Y-m-d H:i:s" ,$now);

        $sql = "insert into order1 (customer_id, status,  is_diy, total_amount, address_id, created_time, updated_time) VALUES (:customer_id, :status, :is_diy, :total_amount, :address_id, :created_time, :updated_time)";
        $query = $this->db->prepare($sql);

        $query->execute(array(':customer_id' => $customer_id, ':status'=> $status ,':is_diy' => $is_diy, ':total_amount'=> $total_amount, ':address_id' => $address_id,  ':created_time'=>$created_time, ':updated_time'=>$updated_time));
        $insertedId = $this->db->lastInsertId();

        return $insertedId;
    }

    public function getOrderByOrderId($order_id) {
        $sql = "SELECT * ";
        $sql.= "FROM order1 o ";
        $sql.= "WHERE o.id=".$order_id;
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function deleteOrder($id)
    {
        $sql = "DELETE FROM order WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
    }
}
