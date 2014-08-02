<?php

class CustomerModel
{
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
    public function getAllCustomers()
    {
        $sql = "SELECT * FROM customer";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function getAllCustomersWithDetails()
    {
        $sql = "SELECT c.id, c.name, c.cellphone, c.created_time, a.district, a.address1, a.address2 FROM customer c, shipping_address sa, address a where sa.customer_id = c.id and sa.is_primary = 1 and sa.address_id = a.id";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function getCustomerByCellphone($cellphone) {
        $sql = "SELECT * FROM customer WHERE cellphone='".$cellphone."'";

        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function getCustomerByID($id) {
        $sql = "SELECT * FROM customer WHERE id='".$id."'";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function getCustomerByWechatId($wechat_id) {
        $sql = "SELECT * FROM customer WHERE wechat_id='".$wechat_id."'";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function addCustomer($name, $cellphone)
    {
        $name = strip_tags($name);
        $cellphone = strip_tags($cellphone);

        $now = time();
        $created_time = date("Y-m-d H:i:s" ,$now);
        $updated_time = date("Y-m-d H:i:s" ,$now);

        $sql = "INSERT INTO customer (name, cellphone, created_time, updated_time) ";
        $sql.= "VALUES (:name, :cellphone, :created_time, :updated_time)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':name' => $name,':cellphone' => $cellphone, ':created_time'=>$created_time, ':updated_time'=>$updated_time));
        $insertedId = $this->db->lastInsertId();
        return $insertedId;
    }

    public function deleteCustomer($id)
    {
        $sql = "DELETE FROM customer WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
    }
}
