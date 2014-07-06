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

    public function location()
    {
        $product_model = $this->loadModel('ProductModel');
        $products = $product_model->getAllProducts();
        require 'application/views/mobile/header.php';
        require 'application/views/mobile/location.php';
        require 'application/views/mobile/footer.php';
    }

    public function checkout() {
        require 'application/views/mobile/header.php';
        require 'application/views/mobile/checkout.php';
        require 'application/views/mobile/footer.php';
    }

}
