<?php
class Asset extends Controller
{

    public function index()
    {
        require 'application/views/common/header.php';
        require 'application/views/common/index.php';
        require 'application/views/common/footer.php';
    }

    public function store()
    {
        $store_model = $this->loadModel('StoreModel');
        $stores = $store_model->getAllStores();

        $stats_model = $this->loadModel('StoreStatsModel');
        $amount_of_stores = $stats_model->getAmountOfStores();

        require 'application/views/common/header.php';
        require 'application/views/asset/store.php';
        require 'application/views/common/footer.php';
    }

    public function addStore() {
        require 'application/views/common/header.php';
        require 'application/views/asset/add_store.php';
        require 'application/views/common/footer.php';
    }

    public function submitAddStore()
    {
        if (isset($_POST["submit_add_store"])) {
            //insert row to address table
            $address_model = $this->loadModel('AddressModel');
            $address_id = $address_model->addAddress($_POST["country"], $_POST["province"], $_POST["city"], $_POST["district"], $_POST["address1"], $_POST["address2"], $_POST['lat'], $_POST['lng']);
            $store_model = $this->loadModel('StoreModel');
            $store_model->addStore($_POST["name"], $address_id, $_POST["phone_number"]);
        }

        header('location: ' . URL . 'asset/store');
    }

    public function deleteStore($id)
    {
        if (isset($id)) {
            $stores_model = $this->loadModel('StoreModel');
            $stores_model->deleteStore($id);
        }
        header('location: ' . URL . 'asset/store');
    }

    public function getStoreDetailById($id) {
        $store_model = $this->loadModel('StoreModel');
        $store = $store_model->getStoreById($id);
        echo json_encode($store[0]);
    }

}