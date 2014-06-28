<?php

class StoreModel
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
     * Get all songs from database
     */
    public function getAllStores()
    {
        $sql = "SELECT id, name, state, city, district, address1, address2, phone_number, lat, lon FROM store";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function addStore($name, $district, $address1, $address2, $phone_number)
    {
        // clean the input from javascript code for example
        $name = strip_tags($name);
        $district = strip_tags($district);
        $address1 = strip_tags($address1);
        $address2 = strip_tags($address2);
        $phone_number = strip_tags($phone_number);

        $sql = "INSERT INTO store (name, district, address1, address2, phone_number) VALUES (:name, :district, :address1, :address2, :phone_number)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':name' => $name, ':district' => $district, ':address1' => $address1, ':address2' => $address2, ':phone_number' => $phone_number));
    }

    public function deleteStore($store_id)
    {
        $sql = "DELETE FROM store WHERE id = :store_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':store_id' => $store_id));
    }
}
