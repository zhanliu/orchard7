<?php

class AddressModel
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
    public function getAllAddresses()
    {
        $sql = "SELECT * FROM address";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function addAddress($country, $province, $city, $district, $address1, $address2, $postcode)
    {
        // clean the input from javascript code for example
        $country = strip_tags($country);
        $province = strip_tags($province);
        $city = strip_tags($city);
        $district = strip_tags($district);
        $address1 = strip_tags($address1);
        $address2 = strip_tags($address2);
        $postcode = strip_tags($postcode);

        $now = time();
        $created_time = date("Y-m-d H:i:s" ,$now);
        $updated_time = date("Y-m-d H:i:s" ,$now);

        $sql = "INSERT INTO address (country, province, city, district, address1, address2, postcode, created_time, updated_time) VALUES (:country, :province, :city, :district, :address1, :address2, :postcode, :created_time, :updated_time)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':country' => $country, ':province' => $province, ':city' => $city, ':district' => $district, ':address1' => $address1, ':address2' => $address2,':postcode' => $postcode, ':created_time'=>$created_time, ':updated_time'=>$updated_time));
        $insertedId = $this->db->lastInsertId();
        return $insertedId;
    }

    public function deleteAddress($id)
    {
        $sql = "DELETE FROM address WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
    }
}
