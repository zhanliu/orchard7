<?php

class ShippingAddressModel
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

    public function addShippingAddress($customer_id, $address_id)
    {
        // clean the input from javascript code for example
        $user_id = strip_tags($customer_id);
        $address_id = strip_tags($address_id);

        $now = time();
        $created_time = date("Y-m-d H:i:s" ,$now);
        $updated_time = date("Y-m-d H:i:s" ,$now);

        $sql = "INSERT INTO shipping_address (customer_id, address_id, is_primary, created_time, updated_time) VALUES (:customer_id, :address_id, :is_primary,:created_time, :updated_time)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':customer_id' => $customer_id, ':address_id'=>$address_id, ':is_primary'=>1, ':created_time'=>$created_time, ':updated_time'=>$updated_time));
        $insertedId = $this->db->lastInsertId();


        return $insertedId;
    }

    public function unsetDefaultShippingAddress($shipping_address_id, $customer_id) {
        $shipping_address_id = strip_tags($shipping_address_id);
        $customer_id = strip_tags($customer_id);

        $sql = "update shipping_address set is_primary = 0 where customer_id =" . $customer_id . " and id != " . $shipping_address_id;
        $query = $this->db->prepare($sql);
        $query->execute();
    }

    public function deleteShippingAddress($id)
    {
        $sql = "DELETE FROM shipping_address WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
    }

    public function setPrimary($id, $is_primary) {
        $now = time();
        $updated_time = date("Y-m-d H:i:s" ,$now);

        $sql = "UPDATE shipping_address SET is_primary = :is_primary, updated_time = :updated_time";
        $query = $this->db->prepare($sql);
        $query->execute(array(':is_primary' => $is_primary, ':updated_time' => $updated_time));

    }

}