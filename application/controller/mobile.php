<?php
include('application/views/mobile/ShoppingCart.class.php');
class Mobile extends Controller {

    private $product_model;

    public function index() {


        if (isset($_COOKIE['address1'])) {
            $this->showcase();
        } else {
            require 'application/views/mobile/header.php';
            require 'application/views/mobile/confirm_range.php';
            require 'application/views/mobile/footer.php';
        }
    }

    // on locate failure
    public function sorry()
    {
        require 'application/views/mobile/header.php';
        require 'application/views/mobile/sorry.php';
        require 'application/views/mobile/footer.php';
    }

    // on locate success, show product list
    public function showcase()
    {
        $this->product_model = $this->loadModel('ProductModel');
        $products = $this->product_model->getAllProducts();

        if (isset($_POST["address1"])) {
            setcookie('address1', $_POST["address1"], time()+3600*24*365*10);
        }

        require 'application/views/mobile/header.php';
        require 'application/views/mobile/showcase.php';
        require 'application/views/mobile/footer.php';
    }

    // preview shopping cart
    public function preview() {
        if (!session_id()) session_start();
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = new ShoppingCart();
        }
        $cart = $_SESSION['cart'];
        $this->product_model = $this->loadModel('ProductModel');
        $products = $this->product_model->getProductsByIds($cart->getIds());

        $total_price = $this->getTotalPrice();

        require 'application/views/mobile/header.php';
        require 'application/views/mobile/preview.php';
        require 'application/views/mobile/footer.php';
    }

    public function getTotalPrice() {
        if (!session_id()) session_start();
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = new ShoppingCart();
        }
        $cart = $_SESSION['cart'];


        if ($this->product_model==null) {$this->product_model = $this->loadModel('ProductModel');}
        $products = $this->product_model->getProductsByIds($cart->getIds());

        $total_price = 0;

        foreach ($cart->getItems() as $item_id => $qty) {
            $total_price+= $qty * $this->product_model->getPriceById($item_id);
        }

        return $total_price;
    }

    public function callTotalPrice() {
        echo $this->getTotalPrice();
    }

    public function confirmCellphone() {
        require 'application/views/mobile/header.php';
        require 'application/views/mobile/confirm_cellphone.php';
        require 'application/views/mobile/footer.php';
    }

    public function submitCellphone() {
        if (isset($_POST["submit_cellphone"])) {
            $cellphone = $_POST["cellphone"];
            setcookie('cellphone', $_POST["cellphone"], time()+3600*24*365*10);
            require 'application/views/mobile/header.php';
            require 'application/views/mobile/confirm_detail.php';
            require 'application/views/mobile/footer.php';
        }
    }

    public function success()
    {
        require 'application/views/mobile/header.php';
        require 'application/views/mobile/success.php';
        require 'application/views/mobile/footer.php';
    }

    public function submitOrder() {
        if (isset($_POST["submit_order"])) {

            //TODO: some variables are hardcoded for the time being, fix them later
            $item_type = "product";
            $district = "海珠区";

            //item ids and item quantities will be derived from cart
            if (!session_id()) session_start();
            $cart = $_SESSION['cart'];

            $cellphone = $_POST['cellphone'];
            $name = $_POST['name'];
            $address1 = $_POST['address1'];
            $address2 = $_POST['address2'];

            setcookie('name', $_POST["name"], time()+3600*24*365*10);
            setcookie('address1', $_POST["address1"], time()+3600*24*365*10);
            setcookie('address2', $_POST["address2"], time()+3600*24*365*10);

            //add Customer
            $customer_model = $this->loadModel('CustomerModel');
            $isCustomerExisted = false;
            $customer = $customer_model->getCustomerByCellphone($cellphone);
            $customer_id = NULL;

            //add cellphone to Cookie
            $cookie_model = $this->loadModel('CookieModel');
            $cookie_model->setCookie('cellphone', $cellphone, false);

            //TODO: if customer updated information we will have to update customer table accordingly
            //TODO: to validate name and cellphone are the same
            if (sizeof($customer) == 1) {
                $isCustomerExisted = true;
                $customer_id = $customer[0]->id;
            } else {
                $customer_id = $customer_model->addCustomer($name, $cellphone);
            }


            //add SHIPPING_ADDRESS
            $address_model = $this->loadModel('AddressModel');
            $shipping_address_model = $this->loadModel('ShippingAddressModel');

            if ($isCustomerExisted == false) {
                //TODO: WE NEED TO LOCATE LAT AND LNG LATER

                $address_lat = $_POST['address_lat'];
                $address_lng = $_POST['address_lng'];
                $address_id = $address_model->addAddress("中国", "广东省", "广州市", "海珠区", $_POST["address1"], $_POST["address2"], $address_lat, $address_lng);

                $shipping_address_id = $shipping_address_model->addShippingAddress($customer_id, $address_id);
                $shipping_address_model->setDefaultShippingAddress($shipping_address_id, $customer_id);
            } else {
                $primary_address = $address_model->getPrimaryAddressByCustomerId($customer_id);
                $address_id = $primary_address[0]->id;
            }

            //add order
            $order_model = $this->loadModel('OrderModel');
            //CID, STORE_ID, ADDRESS_ID, IS_DIY, TOTAL_PRICE
            //TODO: order status is not set yet!
            $store_id = $_POST['store_id'];
            $order_id = $order_model->addOrder($customer_id, $store_id, $address_id, 1, 0);

            //add order detail
            $order_detail_model = $this->loadModel('OrderDetailModel');
            $total_amount = 0;

            $product_model = $this->loadModel('ProductModel');
            foreach ($cart->getItems() as $item_id => $qty) {
                $order_detail_model->addOrderDetail($order_id, $item_type, $item_id, $qty);
                $total_amount+= $product_model->getPriceById($item_id) * $qty;
            }

            $order_model->updateTotalAmount($order_id, $total_amount);

            // unset session
            session_unset();
            session_destroy();

            $this->success();
        }
    }

    public function addToCart($id) {
        if (!session_id()) session_start();
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = new ShoppingCart();
        }
        $cart = $_SESSION['cart'];
        $cart->addItem($id);

        echo $cart->count();
    }

    public function reduceToCart($id) {
        if (!session_id()) session_start();
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = new ShoppingCart();
        }
        $cart = $_SESSION['cart'];
        $cart->reduceItem($id);

        echo $cart->count();
    }

    public function removeFromCart($id) {
        if (!session_id()) session_start();
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = new ShoppingCart();
        }
        $cart = $_SESSION['cart'];
        $cart->deleteItem($id);

        echo $cart->count();
    }
}
