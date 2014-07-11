<?php

class Mobile extends Controller
{

    public function index()
    {

        require 'application/views/mobile/header.php';
        require 'application/views/mobile/index.php';
        require 'application/views/mobile/footer.php';
    }

    public function sorry()
    {

        require 'application/views/mobile/header.php';
        require 'application/views/mobile/sorry.php';
        require 'application/views/mobile/footer.php';
    }


    public function showcase()
    {
        $product_model = $this->loadModel('ProductModel');
        $products = $product_model->getAllProducts();

        $block = $_POST["block"];
        // set cookie
        setcookie('uif','',time()-3600);
        setcookie('uif',$_POST['block'],time()+3600*24*365);

        require 'application/views/mobile/header.php';
        require 'application/views/mobile/showcase.php';
        require 'application/views/mobile/footer.php';
    }

    public function location()
    {
        require 'application/views/mobile/header.php';
        require 'application/views/mobile/location.php';
        require 'application/views/mobile/footer.php';
    }

    public function checkout() {

        $item_ids = $_POST['item_id'];
        $item_quantities = $_POST['item_quantity'];
        $item_type = $_POST['item_type'];
/*
        if (isset($_POST["submit_add_order"])) {
            $order_model = $this->loadModel('OrderModel');
            $order_id = $order_model->addOrder();
        }*/

        require 'application/views/mobile/header.php';
        require 'application/views/mobile/checkout.php';
        require 'application/views/mobile/footer.php';
    }

    public function submitAddCombo() {
        $combo_model = $this->loadModel('ComboModel');

        if (isset($_POST["submit_add_combo"])) {
            // load model, perform an action on the model
            $combo_id = $combo_model->addCombo($_POST["name"], $_POST["price"],  $_POST["original_price"],$_POST["description"], $_POST["tag"], $_POST["upload_img_name_prefix"]."_".$_POST["img_url"], $_POST["is_active"]);

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

        $combos = $combo_model->getAllCombos();

        require 'application/views/common/header.php';
        require 'application/views/stock/combo.php';
        require 'application/views/common/footer.php';

    }

}
