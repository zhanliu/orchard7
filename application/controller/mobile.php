<?php

class Mobile extends Controller
{

    public function index()
    {
        $product_model = $this->loadModel('ProductModel');
        $products = $product_model->getAllProducts();
        require 'application/views/mobile/showcase.php';
    }

}
