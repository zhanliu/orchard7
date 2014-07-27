<?php
include('application/views/mobile/ShoppingCart.class.php');
class MobileAdmin extends Controller {

    public function orderManager($queryStatus=null)
    {
        $order_model = $this->loadModel('OrderModel');
        $orderStatus = $order_model->getOrderStatusCode();
        $orders = null;


        if (!isset($queryStatus)) {
            $queryStatus = 0;
        }

        if ($queryStatus == 9) {
            $orders = $order_model->getTodayOrdersWithDetails();
        } else {
            $orders = $order_model->getTodayOrdersWithDetailsByStatus($queryStatus);
        }

        require 'application/views/mobile/header.php';
        require 'application/views/mobile/admin/order_manager.php';
        require 'application/views/mobile/footer.php';
    }

    public function processOrder($id)
    {
        $order_model = $this->loadModel('OrderModel');
        $order = $order_model->getOrderById($id);

        $order_detail_model = $this->loadModel('OrderDetailModel');
        $items = $order_detail_model->getOrderDetailsById($id);

        require 'application/views/mobile/header.php';
        require 'application/views/mobile/admin/process_order.php';
        require 'application/views/mobile/footer.php';
    }

}