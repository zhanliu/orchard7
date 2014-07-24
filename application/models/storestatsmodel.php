<?php

class StoreStatsModel
{
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    public function getAmountOfStores()
    {
        $sql = "SELECT COUNT(id) AS amount_of_stores FROM store";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows
        return $query->fetch()->amount_of_stores;
    }

    public function getAmountOfStoreStaffs()
    {
        $sql = "SELECT COUNT(id) AS amount_of_store_staffs FROM store_staff ";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows
        return $query->fetch()->amount_of_store_staffs;
    }
}
