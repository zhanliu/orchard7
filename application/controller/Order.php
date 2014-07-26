<?php
class Order extends Controller
{
    public function index()
    {
        // debug message to show where you are, just for the demo
        //echo 'Message from Controller: You are in the controller *admin, using the method index()';
        require 'application/views/common/header.php';
        require 'application/views/common/index.php';
        require 'application/views/common/footer.php';
        // load views. within the views we can echo out $songs and $amount_of_songs easily
    }

    public function addOrder() {
        $combo_model = $this->loadModel('ComboModel');
        $combos = $combo_model->getAllCombos();

        require 'application/views/common/header.php';
        require 'application/views/order/add_order.php';
        require 'application/views/common/footer.php';
    }

    // for ajax callback
    public function queryAddressByCellphone($cellphone) {
        $customer_model = $this->loadModel('CustomerModel');
        $customer = $customer_model->getCustomerByCellphone($cellphone);

        if (sizeof($customer) == 1) {
            $cid = $customer[0]->id;
            $address_model = $this->loadModel('AddressModel');
            $address = $address_model->getAddressesByCustomerId($cid);
            echo json_encode($address);
        } else {
            echo json_encode('');
        }
    }

    public function manageOrder() {
        $order_model = $this->loadModel('OrderModel');
        $orders = $order_model->getAllOrdersWithDetails();
        $orderStatus = $order_model->getOrderStatusCode();

        //TODO: revise logic to handle order mapping with product and combo
        $combo_model = $this->loadModel('ComboModel');
        $combos = $combo_model->getAllCombos();

        $order_detail_model = $this->loadModel('OrderDetailModel');
        $orderDetails = $order_detail_model->getAllOrderDetails();

        require 'application/views/common/header.php';
        require 'application/views/order/order_manager.php';
        require 'application/views/common/footer.php';
    }

    public function deleteOrder($id) {
        $order_model = $this->loadModel('OrderModel');
        $orders = $order_model->deleteOrder($id);

        $order_detail_model = $this->loadModel('OrderDetailModel');
        $order_detail_model->deleteOrderDetailByOrderId($id);

        header('location: ' . URL . 'order/manageOrder');
    }

    public function orderStatus() {
        $order_status = $_POST["orderstatus"];
        $order_id = $_POST["order_id"];

        $order_model = $this->loadModel('OrderModel');
        $orders = $order_model->updateOrderStatus($order_id, $order_status);

        header('location: ' . URL . 'order/manageOrder');
    }

    public function updateOrder($id) {
        $order_model = $this->loadModel('OrderModel');
        $order = $order_model->getOrderDetailById($id);

        $order_detail_model = $this->loadModel('OrderDetailModel');
        $orderDetails = $order_detail_model->getAllOrderDetailsById($id);

        $product_model = $this->loadModel('ProductModel');
        $items = $product_model->getProductsByOrderId($id);

        ///////////////////// collect orderCombo, control quantity input
        $orderItem = NULL;
        foreach ($items as $item) {
            //echo "size is ".sizeof($items);
            $orderItem[$item->id] = "";
            foreach ($orderDetails as $orderDetail) {
                if ($orderDetail->item_id == $item->id) {
                    $orderItem[$orderDetail->item_id] = $orderDetail->item_quantity;
                }
            }
        }

        require 'application/views/common/header.php';
        require 'application/views/order/update_order.php';
        require 'application/views/common/footer.php';
    }

    function submitUpdateOrder() {
        if (isset($_POST["submit_update_order"])) {
            $province = $_POST['province'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $address1 = $_POST['address1'];
            $address2 = $_POST['address2'];
            $address_id = $_POST['address_id'];

            $quantities = $_POST['quantity'];
            $itemIds = $_POST['itemIds'];
            $itemPrices = $_POST['itemPrices'];
            $order_id = $_POST['order_id'];

            $order_detail_model = $this->loadModel('OrderDetailModel');

            // 1. delete order detail
            $order_detail_model->deleteOrderDetailByOrderId($order_id);

            // 2. add order detail
            $total_amount = 0;
            $quantity_index = 0;
            $item_type = "product";
            foreach ($quantities as $quantity) {
                if ($quantity > 0) {
                    $order_detail_model->addOrderDetail($order_id, $item_type,$itemIds[$quantity_index], $quantity);
                    $total_amount = $total_amount + $itemPrices[$quantity_index] * $quantity;
                }
                $quantity_index++;
            }

            $order_model = $this->loadModel('OrderModel');
            $order_model->updateTotalAmount($order_id, $total_amount);

            $address_model = $this->loadModel('AddressModel');
            $address_model->updateAddressById($address_id, "", $province, $city, $district, $address1, $address2, null, null);
        }

        header('location: ' . URL . 'order/manageOrder');
    }

    public function submitAddOrder() {
        //add Customer
        $customer_model = $this->loadModel('CustomerModel');
        $isCustomerExisted = false;
        $cellphone = $_POST["cellphone"];
        $customer = $customer_model->getCustomerByCellphone($cellphone);
        $customer_id = NULL;;

        if (sizeof($customer) == 1) {
            $isCustomerExisted = true;
            $customer_id = $customer[0]->id;
        } else {
            $customer_id = $customer_model->addCustomer($cellphone);
        }

        //add Address
        $shipping_address_id = NULL;
        $address_model = $this->loadModel('AddressModel');
        $shipping_address_model = $this->loadModel('ShippingAddressModel');

        if (isset($_POST["submit_add_address"])) {
            //insert row to address table
            $address_id = $address_model->addAddress($_POST["country"], $_POST["province"], $_POST["city"], $_POST["district"], $_POST["address1"], $_POST["address2"], "","");

            $shipping_address_id = $shipping_address_model->addShippingAddress($customer_id, $address_id);
            $shipping_address_model->setDefaultShippingAddress($shipping_address_id, $customer_id);
        } else if (isset($_POST["submit_already_add_address"])) {

            $shipping_address_id = $_POST["primary_address_radio"];
            $shipping_address_model->setDefaultShippingAddress($shipping_address_id, $customer_id);
        }
        //add Order
        //TODO: complete this function
    }

}