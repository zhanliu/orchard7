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
        $sql = "SELECT s.id, s.name, s.phone_number, s.address_id, a.province, a.city, a.district, a.address1, a.address2, ";
        $sql.= "a.lat, a.lng FROM store as s, address as a ";
        $sql.= "WHERE s.address_id=a.id";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function getStoreById($id)
    {
        $sql = "SELECT name, phone_number from store WHERE id=".$id;

        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function addStore($name, $address_id, $phone_number)
    {
        // clean the input from javascript code for example
        $name = strip_tags($name);
        $district = strip_tags($address_id);
        $phone_number = strip_tags($phone_number);

        $sql = "INSERT INTO store (name, address_id, phone_number) VALUES (:name, :address_id, :phone_number)";

        $query = $this->db->prepare($sql);
        $query->execute(array(':name' => $name, ':address_id' => $address_id, ':phone_number' => $phone_number));
    }
    
    public function addStaff($name, $cellphone, $store_id, $wechat_id)
    {
        // clean the input from javascript code for example
        $name = strip_tags($name);
        $cellphone = strip_tags($cellphone);
        $store_id = strip_tags($store_id);
        $wechat_id = strip_tags($wechat_id);
        $status = 'N';
        $description = 'wechat created staff';
        $now = time();
        $created_time = date("Y-m-d H:i:s" ,$now);
        $updated_time = date("Y-m-d H:i:s" ,$now);
        

        $sql = "INSERT INTO staff (wechat_id, name, cellphone, store_id, description, status, created_time, updated_time) VALUES (:wechat_id, :name, :cellphone,:store_id, :description, :status,:created_time, :updated_time)";

        $query = $this->db->prepare($sql);
        $query->execute(array(':wechat_id' => $wechat_id, ':name' => $name, ':cellphone' => $cellphone, ':store_id' => $store_id, ':description' => $description,':status' => $status,':created_time' => $created_time,':updated_time' => $updated_time));
    
    
    	$insertedId = $this->db->lastInsertId();
        
        return $insertedId;
    }

    public function deleteStore($store_id)
    {
        $sql = "DELETE FROM store WHERE id = :store_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':store_id' => $store_id));
    }

    /**
     * handle store staffs
     */
    public function getAllStoreStaffs()
    {
        $sql = "SELECT s.id, s.wechat_id, s.cellphone, s.name, s.store_id, ss.name as store_name, s.description, s.status, s.created_time, s.updated_time ";
        $sql.= " FROM staff as s, store as ss ";
        $sql.= "WHERE s.store_id = ss.id order by s.wechat_id asc ";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function deleteStoreStaff($staff_id)
    {
        $sql = "DELETE FROM staff WHERE id = :staff_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':staff_id' => $staff_id));
    }

    public function enableStoreStaff($staff_id)
    {
        $sql = "Update staff set status = 'Y' WHERE id = :staff_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':staff_id' => $staff_id));
    }

    public function disableStoreStaff($staff_id)
    {
        $sql = "Update staff set status = 'N' WHERE id = :staff_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':staff_id' => $staff_id));
    }
}
