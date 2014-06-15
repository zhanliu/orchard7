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

    public function productDetail($id) {
        $product_model = $this->loadModel('ProductModel');
        $product = $product_model->getProductById($id);

        require 'application/views/admin/product_detail.php';
    }

    public function addProduct()
    {
        // simple message to show where you are
        echo 'Message from Controller: You are in the Controller: Admin, using the method addProduct().';

        // if we have POST data to create a new song entry
        if (isset($_POST["submit_add_product"])) {
            // load model, perform an action on the model
            $product_model = $this->loadModel('ProductModel');
            $product_model->addProduct($_POST["name"], $_POST["category_id"], $_POST["unit"], $_POST["price"], $_POST["tag"], $_POST["description"], $_POST["img_url"], $_POST["is_archived"]);
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
            $products_model->deleteProduct($id);
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

        $comboDetailJson = "{";
        foreach ($combos as $combo) {
            $comboProducts = $product_model->getProductsByComboId($combo->id);

            $comboDetailJson = $comboDetailJson . '"ID' . $combo->id .'":[';
            foreach ($comboProducts as $comboProduct) {
                $comboDetailJson = $comboDetailJson . '{"name":"' . $comboProduct->name . '","quantity":"' . $comboProduct->quantity . '"},';
            }
            $comboDetailJson = $comboDetailJson .'],';
        }
        $comboDetailJson = $comboDetailJson . '}';

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
            $quantities = $_POST['quantity'];

            $combo_detail_model = $this->loadModel('ComboDetailModel');
            $index = 0;
            foreach($product_ids as $product_id) {
                $combo_detail_model->addMapping($combo_id, $product_id, $quantities[$index]);
                $index++;
            }

        }

        // where to go after song has been added
        header('location: ' . URL . 'admin/combo');
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

    public function addOrderStepOne() {

        require 'application/views/admin/header.php';
        require 'application/views/admin/add_order_step_one.php';
        require 'application/views/admin/footer.php';
    }

    public function addOrderStepTwo() {
        $customer_model = $this->loadModel('CustomerModel');
        $isCustomerExisted = false;
        if (isset($_POST["cellphone"])) {

            $cellphone = $_POST["cellphone"];
            $customer = $customer_model->getCustomerByCellphone($cellphone);

            if (sizeof($customer) == 1) {
                $isCustomerExisted = true;

                $cid = $customer[0]->id;

//                echo "--- cid --- ".$cid;
                $address_model = $this->loadModel('AddressModel');
                $list_of_address = $address_model->getAddressesByCustomerId($cid);
            } else {
                $cid = $customer_model->addCustomer($cellphone);
            }
        }

        require 'application/views/admin/header.php';
        require 'application/views/admin/add_order_step_two.php';
        require 'application/views/admin/footer.php';
    }

    public function addOrderStepThree() {

        $combo_model = $this->loadModel('ComboModel');
        $combos = $combo_model->getAllCombos();

        $shipping_address_id = NULL;
        $customer_id = NULL;

        if (isset($_POST["submit_already_add_address"])) {
            $customer_id = $_POST["customer_id"];
        }

        if (isset($_POST["submit_add_address"])) {
            $customer_id = $_POST["customer_id"];

            //insert row to address table
            $address_model = $this->loadModel('AddressModel');
            $address_id = $address_model->addAddress($_POST["country"], $_POST["province"], $_POST["city"], $_POST["district"], $_POST["address1"], $_POST["address2"]);

            $shipping_address_model = $this->loadModel('ShippingAddressModel');
            $shipping_address_id = $shipping_address_model->addShippingAddress($customer_id, $address_id);
        }

        require 'application/views/admin/header.php';
        require 'application/views/admin/add_order_step_three.php';
        require 'application/views/admin/footer.php';
    }


    public function addOrderStepFour() {

        $order_id = NULL;
        $current_order = NULL;
        $address_str = NULL;

        if (isset($_POST["submit_add_order"])) {

            $customer_id = $_POST["customer_id"];
            $total_amount = 0;

            $address_model = $this->loadModel('AddressModel');
            $addresses = $address_model->getAddressesByCustomerId($customer_id);
            $address = $addresses[0];
            $address_str = $address->district."-".$address->address1."-".$address->address2;

            //insert row to order table
            $order_model = $this->loadModel('OrderModel');
            $order_id = $order_model->addOrder($customer_id, $addresses[0]->id, $_POST["is_diy"], $total_amount);

            //insert into order detail
            $quantities = $_POST['quantity'];
            $comboIds = $_POST['comboIds'];
            $comboPrices = $_POST['comboPrices'];

            $order_detail_model = $this->loadModel('OrderDetailModel');

            $quantity_index = 0;
            foreach ($quantities as $quantity) {
                if ($quantity > 0) {
                    $order_detail_model->addOrderDetail($order_id, $comboIds[$quantity_index], $quantity);

                    $total_amount = $total_amount + $comboPrices[$quantity_index] * $quantity;
                }

                $quantity_index++;
            }

            $order_model->updateTotalAmount($order_id, $total_amount);

            $order = $order_model->getOrderByOrderId($order_id);
            $current_order = $order[0];
        }

        $customer_model = $this->loadModel('CustomerModel');
        $customer = $customer_model->getCustomerByID($customer_id);
        $order_customer = $customer[0];

        $order_details = $order_detail_model->getOrderDetailByOrderId($order_id);

        require 'application/views/admin/header.php';
        require 'application/views/admin/add_order_step_four.php';
        require 'application/views/admin/footer.php';
    }


    public function addOrderStepFive() {

        require 'application/views/admin/header.php';
        require 'application/views/admin/add_order_step_five.php';
        require 'application/views/admin/footer.php';
    }

    public function upload() {
        require 'application/views/admin/upload.php';
    }

    public function manageOrder() {

        $order_model = $this->loadModel('OrderModel');
        $orders = $order_model->getAllOrdersWithDetails();
        $orderStatus = $order_model->getOrderStatusCode();

        $combo_model = $this->loadModel('ComboModel');
        $combos = $combo_model->getAllCombos();

        //////////////////////
        $order_detail_model = $this->loadModel('OrderDetailModel');
        $orderDetails = $order_detail_model->getAllOrderDetails();

        //////////////////////
        require 'application/views/admin/header.php';
        require 'application/views/admin/order_manager.php';
        require 'application/views/admin/footer.php';
    }

    public function deleteOrder($id) {

        $order_model = $this->loadModel('OrderModel');
        $orders = $order_model->deleteOrder($id);


        header('location: ' . URL . 'admin/manageOrder');
    }

    public function orderStatus() {

        $order_status = $_POST["orderstatus"];
        $order_id = $_POST["order_id"];

        $order_model = $this->loadModel('OrderModel');
        $orders = $order_model->updateOrderStatus($order_id, $order_status);

        header('location: ' . URL . 'admin/manageOrder');
    }

    public function updateOrder($id) {

        $order_model = $this->loadModel('OrderModel');
        $order = $order_model->getOrderDetailById($id);

        $combo_model = $this->loadModel('ComboModel');
        $combos = $combo_model->getAllCombos();

        //////////////////////
        $order_detail_model = $this->loadModel('OrderDetailModel');
        $orderDetails = $order_detail_model->getAllOrderDetailsById($id);

        require 'application/views/admin/update_order.php';

    }

}