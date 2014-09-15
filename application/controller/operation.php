<?php
class Operation extends Controller
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

    public function addOperation() {

        require 'application/views/common/header.php';
        require 'application/views/operation/add_operation.php';
        require 'application/views/common/footer.php';
    }

    public function manageOperation() {
        $operation_model = $this->loadModel('OperationModel');
        $operations = $operation_model->getAllOperationContents();

        require 'application/views/common/header.php';
        require 'application/views/operation/operation_manager.php';
        require 'application/views/common/footer.php';
    }

    public function manageConfig() {

        require 'application/config/Settings_INI.php';

        $settings = new Settings_INI;
//        $settings->load('settings.ini');
//        $local_skip_location = $settings->get('SKIP_LOCATION');

        $local_skip_location = $settings->loadProperty('SKIP_LOCATION');

        require 'application/views/common/header.php';
        require 'application/views/operation/config_manager.php';
        require 'application/views/common/footer.php';
    }

    public function updateLocationQueryConfig($flag) {

        require 'application/config/Settings_INI.php';

        $settings = new Settings_INI;
        $settings->modifyProperty('SKIP_LOCATION', $flag);

        header('location: ' . URL . 'operation/manageConfig');
    }

    public function deleteOperation($name) {
        $operation_model = $this->loadModel('OperationModel');
        $operations = $operation_model->deleteOperationContent($name);

        header('location: ' . URL . 'operation/manageOperation');
    }


    public function updateOperation($name) {
        $operation_model = $this->loadModel('OperationModel');
        $operations = $operation_model->getOperationContentByName($name);


        require 'application/views/common/header.php';
        require 'application/views/operation/update_operation.php';
        require 'application/views/common/footer.php';
    }

    function submitUpdateOperation() {
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

    public function submitAddOperation() {
        //add Customer
        $operation_model = $this->loadModel('OperationModel');

        $name = $_POST["name"];
        $content = $_POST["content"];
        $operation = $operation_model->addOperationContent($name, $content);

        header('location: ' . URL . 'operation/manageOperation');
    }

}