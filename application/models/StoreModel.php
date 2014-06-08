<?php

class AdminStoreModel
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
        $sql = "SELECT id, name, state, city, district, address, phone_number, lat, lon FROM store";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // libs/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change libs/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
    }

    /**
     * Add a song to database
     * @param string $artist Artist
     * @param string $track Track
     * @param string $link Link
     */
    public function addStore($name, $district, $address, $phone_number)
    {
        // clean the input from javascript code for example
        $name = strip_tags($name);
        $district = strip_tags($district);
        $address = strip_tags($address);
        $phone_number = strip_tags($phone_number);

        $sql = "INSERT INTO store (name, district, address, phone_number) VALUES (:name, :district, :address, :phone_number)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':name' => $name, ':district' => $district, ':address' => $address, ':phone_number' => $phone_number));
    }

    /**
     * Delete a song in the database
     * Please note: this is just an example! In a real application you would not simply let everybody
     * add/update/delete stuff!
     * @param int $song_id Id of song
     */
    public function deleteStore($store_id)
    {
        $sql = "DELETE FROM store WHERE id = :store_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':store_id' => $store_id));
    }
}
