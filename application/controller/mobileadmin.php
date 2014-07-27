<?php
include('application/views/mobile/ShoppingCart.class.php');
class MobileAdmin extends Controller {

    public function orderManager()
    {
        $order_model = $this->loadModel('OrderModel');
        $orders = $order_model->getTodayOrdersWithDetails();

        require 'application/views/mobile/header.php';
        require 'application/views/mobile/admin/order_manager.php';
        require 'application/views/mobile/footer.php';
    }

}