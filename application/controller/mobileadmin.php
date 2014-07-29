<?php
include('application/views/mobile/ShoppingCart.class.php');
class MobileAdmin extends Controller {

    public function orderManager($queryStatus=null)
    {
        $order_model = $this->loadModel('OrderModel');
        $orderStatus = $order_model->getOrderStatusCode();
        $orders = $order_model->getTodayOrdersWithDetailsByStatusType($queryStatus);

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

    public function productManager($status=null) {
        $product_model = $this->loadModel('ProductModel');
        $products = $product_model->getAllProducts($status);

        $active_amount = $product_model->getAmountOfProductsByStatus(1);
        $inactive_amount = $product_model->getAmountOfProductsByStatus(0);
        $amount = $active_amount + $inactive_amount;

        require 'application/views/mobile/header.php';
        require 'application/views/mobile/admin/product_manager.php';
        require 'application/views/mobile/footer.php';
    }

    public function processProduct($id)
    {
        $product_model = $this->loadModel('ProductModel');
        $product = $product_model->getProductById($id);

        require 'application/views/mobile/header.php';
        require 'application/views/mobile/admin/process_product.php';
        require 'application/views/mobile/footer.php';
    }

    public function overwriteProductImage($id) {
        $product_model = $this->loadModel('ProductModel');
        $product = $product_model->getProductById($id);

        require 'application/views/mobile/header.php';
        require 'application/views/mobile/admin/overwrite_product_image.php';
        require 'application/views/mobile/footer.php';
    }

    public function submitOverwriteProductImage() {

    }
}