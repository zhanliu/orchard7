<?php

class Mobile extends Controller
{

    public function index()
    {

        require 'application/views/mobile/header.php';
        require 'application/views/mobile/index.php';
        require 'application/views/mobile/footer.php';
    }

    public function wechatindex($wechat_id) {

        $customers = $this->getCustomer($wechat_id);


        require 'application/views/mobile/header.php';
        require 'application/views/mobile/index.php';
        require 'application/views/mobile/footer.php';
    }

    public function showcase()
    {
        $product_model = $this->loadModel('ProductModel');
        $products = $product_model->getAllProducts();

        // set cookie
        setcookie('uif','',time()-3600);
        setcookie('uif',$_POST['address1'],time()+3600*24*365);

        require 'application/views/mobile/header.php';
        require 'application/views/mobile/showcase.php';
        require 'application/views/mobile/footer.php';
    }

    public function getCustomer($wechat_id) {
        $custom_model = $this->loadModel('CustomerModel');
        $customers = $custom_model->getCustomerByWechatId($wechat_id);

        if ($customers != null && sizeof($customers) > 0) {
            return $customers[0];
        }

        return null;
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
