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
        echo "function trigger with param ".$_POST["submit_add_store"];
        if (isset($_POST["submit_add_store"])) {

            $store_model = $this->loadModel('StoreModel');
            $store_model->addStore($_POST["name"], $_POST["district"], $_POST["address1"], $_POST["address2"], $_POST["phone_number"]);
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

}