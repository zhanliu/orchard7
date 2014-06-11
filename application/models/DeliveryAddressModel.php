<?php

class DeliveryAddressModel
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

    public function addDeliveryAddress($user_id, $address_id)
    {
        // clean the input from javascript code for example
        $user_id = strip_tags($user_id);
        $address_id = strip_tags($address_id);

        $now = time();
        $created_time = date("Y-m-d H:i:s" ,$now);
        $updated_time = date("Y-m-d H:i:s" ,$now);

        $sql = "INSERT INTO delivery_address (user_id, $address_id, created_time, updated_time) VALUES (:user_id, :address_id, :created_time, :updated_time)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':user_id' => $user_id, ':address_id'=>$address_id, ':created_time'=>$created_time, ':updated_time'=>$updated_time));

    }

    public function deleteDeliveryAddress($id)
    {
        $sql = "DELETE FROM delivery_address WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
    }

    public function setPrimary($id, $is_primary) {
        $now = time();
        $updated_time = date("Y-m-d H:i:s" ,$now);

        $sql = "UPDATE delivery_address SET is_primary = :is_primary, updated_time = :updated_time";
        $query = $this->db->prepare($sql);
        $query->execute(array(':is_primary' => $is_primary, ':updated_time' => $updated_time));

    }

}