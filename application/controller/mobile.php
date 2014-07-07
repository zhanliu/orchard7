<?php

class Mobile extends Controller
{

    public function index()
    {
        $product_model = $this->loadModel('ProductModel');
        $products = $product_model->getAllProducts();
        require 'application/views/mobile/header.php';
        require 'application/views/mobile/showcase.php';
        require 'application/views/mobile/footer.php';
    }

    public function showcase()
    {
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

        $product_ids = $_POST['product_id'];
        $quantities = $_POST['quantity'];


        require 'application/views/mobile/header.php';
        require 'application/views/mobile/checkout.php';
        require 'application/views/mobile/footer.php';
    }

}
