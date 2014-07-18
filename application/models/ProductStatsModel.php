<?php

class ProductStatsModel
{
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    public function getAmountOfProducts()
    {
        $sql = "SELECT COUNT(id) AS amount_of_products FROM product";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows
        return $query->fetch()->amount_of_products;
    }
}
