<?php

requirehttp;

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
        //$product_model = $this->loadModel('ProductModel');
        //$products = $product_model->getAllProducts();


        $address = $_POST['address'];
//echo $address;
        $baidu_access_url = "http://api.map.baidu.com/geocoder/v2/?address=" . $address . "&output=json&ak=" .BAIDU_API_KEY . "&callback=showLocation";

        $r = new HttpRequest($baidu_access_url, HttpRequest::METH_GET);
//        $r->setOptions(array('lastmodified' => filemtime('local.rss')));
//        $r->addQueryData(array('category' => 3));
        try {
            $r->send();
            if ($r->getResponseCode() == 200) {
                echo $r->getResponseBody();
            }
        } catch (HttpException $ex) {
            echo $ex;
        }

//        require 'application/views/mobile/header.php';
//        require 'application/views/mobile/showcase.php';
//        require 'application/views/mobile/footer.php';
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

        $product_ids = $_POST['product_id'];
        $quantities = $_POST['quantity'];


        require 'application/views/mobile/header.php';
        require 'application/views/mobile/checkout.php';
        require 'application/views/mobile/footer.php';
    }

}
