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
            $orders = $order_model->getTodayOrdersWithDetailsByStatusType($queryStatus);
        }

        $amount_of_type_0 = $order_model->getTodayAmountOfOrdersByStatusType(0);
        $amount_of_type_1 = $order_model->getTodayAmountOfOrdersByStatusType(1);
        $amount_of_type_9 = $amount_of_type_0 + $amount_of_type_1;

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

        $order_process = $order_model->getOrderProcess($id);

        require 'application/views/mobile/header.php';
        require 'application/views/mobile/admin/process_order.php';
        require 'application/views/mobile/footer.php';
    }

    public function updateOrder($id, $status, $from_status, $staff_id)
    {
        $order_model = $this->loadModel('OrderModel');
        $order_model->updateOrderStatus($id, $status);


        $orderStatus = $order_model->getOrderStatusCode();
        $orders = $order_model->getTodayOrdersWithDetailsByStatusType(0);

        $amount_of_type_0 = $order_model->getTodayAmountOfOrdersByStatusType(0);
        $amount_of_type_1 = $order_model->getTodayAmountOfOrdersByStatusType(1);
        $amount_of_type_9 = $amount_of_type_0 + $amount_of_type_1;

        $order_model->insertOrderProcessLog($id, $staff_id, $from_status, $status);


        require 'application/views/mobile/header.php';
        require 'application/views/mobile/admin/order_manager.php';
        require 'application/views/mobile/footer.php';
    }


}