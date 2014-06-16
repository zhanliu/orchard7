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

    public function getAddressesByCustomerId($customer_id)
    {
        $sql = "SELECT a.province, a.city, a.district, a.address1, a.address2, a.id, sa.is_primary, a.id, sa.id as shipping_id FROM address as a, shipping_address as sa ";
        $sql.= "WHERE a.id=sa.address_id AND sa.customer_id=".$customer_id;
//        echo $sql;
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function addAddress($country, $province, $city, $district, $address1, $address2)
    {
        // clean the input from javascript code for example
        $country = strip_tags($country);
        $province = strip_tags($province);
        $city = strip_tags($city);
        $district = strip_tags($district);
        $address1 = strip_tags($address1);
        $address2 = strip_tags($address2);
        //$postcode = strip_tags($postcode);

        $now = time();
        $created_time = date("Y-m-d H:i:s" ,$now);
        $updated_time = date("Y-m-d H:i:s" ,$now);

        $sql = "INSERT INTO address (country, province, city, district, address1, address2, created_time, updated_time) VALUES (:country, :province, :city, :district, :address1, :address2, :created_time, :updated_time)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':country' => $country, ':province' => $province, ':city' => $city, ':district' => $district, ':address1' => $address1, ':address2' => $address2, ':created_time'=>$created_time, ':updated_time'=>$updated_time));
        $insertedId = $this->db->lastInsertId();
        return $insertedId;
    }

    public function deleteAddress($id)
    {
        $sql = "DELETE FROM address WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
    }

    public function updateAddressById($address_id, $country, $province, $city, $district, $address1, $address2)
    {
        // clean the input from javascript code for example
        $country = strip_tags($country);
        $province = strip_tags($province);
        $city = strip_tags($city);
        $district = strip_tags($district);
        $address1 = strip_tags($address1);
        $address2 = strip_tags($address2);
        //$postcode = strip_tags($postcode);
        $address_id = strip_tags($address_id);

        $now = time();
//        $created_time = date("Y-m-d H:i:s" ,$now);
        $updated_time = date("Y-m-d H:i:s" ,$now);

        $sql = "update address set province = :province , city = :city, district = :district, address1= :address1,address2 = :address2, updated_time = :updated_time where id = :address_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':province' => $province, ':city' => $city, ':district' => $district, ':address1' => $address1, ':address2' => $address2, ':updated_time'=>$updated_time, ':address_id'=>$address_id));
//        $insertedId = $this->db->lastInsertId();
//        return $insertedId;
    }
}
