<?php
class Admin extends Controller
{
    /**
    * PAGE: index
    * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
    */
    public function index()
    {
        // debug message to show where you are, just for the demo
        //echo 'Message from Controller: You are in the controller *admin, using the method index()';
        require 'application/views/admin/header.php';
        require 'application/views/admin/index.php';
        require 'application/views/admin/footer.php';
        // load views. within the views we can echo out $songs and $amount_of_songs easily
    }

    public function store()
    {
        // load a model, perform an action, pass the returned data to a variable
        // NOTE: please write the name of the model "LikeThis"
        $store_model = $this->loadModel('StoreModel');
        $stores = $store_model->getAllStores();

        $stats_model = $this->loadModel('StoreStatsModel');
        $amount_of_stores = $stats_model->getAmountOfStores();

        // debug message to show where you are, just for the demo
        //echo 'Message from Controller: You are in the controller *admin, using the method index()';
        require 'application/views/admin/header.php';
        require 'application/views/admin/store.php';
        require 'application/views/admin/footer.php';
        // load views. within the views we can echo out $songs and $amount_of_songs easily

    }

    public function addStore()
    {
        // simple message to show where you are
        echo 'Message from Controller: You are in the Controller: Admin, using the method addStore().';

        // if we have POST data to create a new song entry
        if (isset($_POST["submit_add_store"])) {
            // load model, perform an action on the model
            $store_model = $this->loadModel('StoreModel');
            echo "district** is ".$_POST["district"];
            $store_model->addStore($_POST["name"], $_POST["district"], $_POST["address"], $_POST["phone_number"]);
        }

        // where to go after song has been added
        header('location: ' . URL . 'admin/store');
    }

    public function deleteStore($id)
    {
        // simple message to show where you are
        echo 'Message from Controller: You are in the Controller: Admin, using the method deleteStore().';

        // if we have an id of a song that should be deleted
        if (isset($id)) {
            // load model, perform an action on the model
            $stores_model = $this->loadModel('StoreModel');
            $stores_model->deleteStore($id);
        }

        // where to go after song has been deleted
        header('location: ' . URL . 'admin/store');
    }

    public function category()
    {
        // load a model, perform an action, pass the returned data to a variable
        // NOTE: please write the name of the model "LikeThis"
        $category_model = $this->loadModel('CategoryModel');
        $categories = $category_model->getAllCategories();

        $stats_model = $this->loadModel('CategoryStatsModel');
        $amount_of_categories = $stats_model->getAmountOfCategories();

        // debug message to show where you are, just for the demo
//        echo 'Message from Controller: You are in the controller *admin, using the method cat()';
        require 'application/views/admin/header.php';
        require 'application/views/admin/category.php';
        require 'application/views/admin/footer.php';
        // load views. within the views we can echo out $songs and $amount_of_songs easily

    }

    public function addCategory()
    {
        // simple message to show where you are
        echo 'Message from Controller: You are in the Controller: Admin, using the method addCatetory().';

        // if we have POST data to create a new song entry
        if (isset($_POST["submit_add_category"])) {
            // load model, perform an action on the model
            $category_model = $this->loadModel('CategoryModel');
            $category_model->addCategory($_POST["name"]);
        }

        // where to go after song has been added
        header('location: ' . URL . 'admin/category');
    }

    public function deleteCategory($id)
    {
        // simple message to show where you are
        echo 'Message from Controller: You are in the Controller: Admin, using the method deleteCategory().';

        // if we have an id of a song that should be deleted
        if (isset($id)) {
            // load model, perform an action on the model
            $categories_model = $this->loadModel('CategoryModel');
            $categories_model->deleteCategory($id);
        }

        // where to go after song has been deleted
        header('location: ' . URL . 'admin/category');
    }
    // *** PRODUCT MANAGEMENT *** //

    public function product()
    {
        $product_model = $this->loadModel('ProductModel');
        $products = $product_model->getAllProducts();

        $stats_model = $this->loadModel('ProductStatsModel');
        $amount_of_products = $stats_model->getAmountOfProducts();

        $category_model = $this->loadModel('CategoryModel');
        $categories = $category_model->getAllCategories();

        // debug message to show where you are, just for the demo
        //echo 'Message from Controller: You are in the controller *admin, using the method index()';
        require 'application/views/admin/header.php';
        require 'application/views/admin/product.php';
        require 'application/views/admin/footer.php';
        // load views. within the views we can echo out $songs and $amount_of_songs easily

    }

    public function addProduct()
    {
        // simple message to show where you are
        echo 'Message from Controller: You are in the Controller: Admin, using the method addProduct().';

        // if we have POST data to create a new song entry
        if (isset($_POST["submit_add_product"])) {
            // load model, perform an action on the model
            $product_model = $this->loadModel('ProductModel');
            $product_model->addProduct($_POST["name"], $_POST["price"], $_POST["unit"], $_POST["is_archived"], $_POST["category_id"], $_POST["tag"], $_POST["description"], $_POST["created_time"], $_POST["updated_time"]);
        }

        // where to go after song has been added
        header('location: ' . URL . 'admin/product');
    }

    public function deleteProduct($id)
    {
        // simple message to show where you are
        echo 'Message from Controller: You are in the Controller: Admin, using the method deleteProduct().';

        // if we have an id of a song that should be deleted
        if (isset($id)) {
            // load model, perform an action on the model
            $products_model = $this->loadModel('ProductModel');
            $products_model->deleteCombo($id);
        }

        // where to go after song has been deleted
        header('location: ' . URL . 'admin/product');
    }

    // *** COMBO MANAGEMENT *** //

    public function combo()
    {
        $combo_model = $this->loadModel('ComboModel');
        $combos = $combo_model->getAllCombos();

        $stats_model = $this->loadModel('ComboStatsModel');
        $amount_of_combos = $stats_model->getAmountOfCombos();

        $product_model = $this->loadModel('ProductModel');
        $products = $product_model->getAllProducts();

        // debug message to show where you are, just for the demo
        //echo 'Message from Controller: You are in the controller *admin, using the method index()';
        require 'application/views/admin/header.php';
        require 'application/views/admin/combo.php';
        require 'application/views/admin/footer.php';
        // load views. within the views we can echo out $songs and $amount_of_songs easily

    }

    public function addCombo()
    {
        // simple message to show where you are
        echo 'Message from Controller: You are in the Controller: Admin, using the method addCombo().';

        // if we have POST data to create a new song entry
        if (isset($_POST["submit_add_combo"])) {
            // load model, perform an action on the model
            $combo_model = $this->loadModel('ComboModel');
            $combo_id = $combo_model->addCombo($_POST["name"], $_POST["price"], $_POST["description"], $_POST["tag"], $_POST["is_archived"]);

            // insert multiple records into mapping table
            $product_ids = $_POST['product_id'];
            $number_of_units = $_POST['number_of_unit'];
            //echo "Hello -> ".$number_of_units[1];
            $mapping_model = $this->loadModel('ComboProductMappingModel');
            $index = 0;
            foreach($product_ids as $product_id) {
                $mapping_model->addMapping($combo_id, $product_id, $number_of_units[$index]);
                $index++;
            }

        }

        // where to go after song has been added
        //header('location: ' . URL . 'admin/combo');
    }

    public function deleteCombo($id)
    {
        // simple message to show where you are
        echo 'Message from Controller: You are in the Controller: Admin, using the method deleteCombo().';

        // if we have an id of a song that should be deleted
        if (isset($id)) {
            // load model, perform an action on the model
            $combos_model = $this->loadModel('ComboModel');
            $combos_model->deleteCombo($id);
        }

        // where to go after song has been deleted
        header('location: ' . URL . 'admin/combo');
    }




}