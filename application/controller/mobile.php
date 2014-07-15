<?php
include('application/views/mobile/ShoppingCart.class.php');
class Mobile extends Controller {

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
        $product_model = $this->loadModel('ProductModel');
        $products = $product_model->getAllProducts();

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

        $product_model = $this->loadModel('ProductModel');
        $products = $product_model->getProductsByIds($cart->getIds());

        require 'application/views/mobile/header.php';
        require 'application/views/mobile/preview.php';
        require 'application/views/mobile/footer.php';
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

    public function location()
    {
        require 'application/views/mobile/header.php';
        require 'application/views/mobile/location.php';
        require 'application/views/mobile/footer.php';
    }

    public function submitOrder() {
        if (isset($_POST["submit_order"])) {

            //echo "item id are ".$_POST['item_ids'];
            //$item_ids = json_decode(base64_decode($_POST['item_ids']));
            //$item_quantities = json_decode(base64_decode($_POST['item_quantities']));
            //$item_prices = json_decode(base64_decode($_POST['item_prices']));



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


            echo "cell phone is ".$cellphone."<br>";
            echo "name is ".$name."<br>";
            echo "address1 is ".$address1."<br>";
            echo "address2 is ".$address2."<br>";

            //add Customer
            $customer_model = $this->loadModel('CustomerModel');
            $isCustomerExisted = false;
            $customer = $customer_model->getCustomerByCellphone($cellphone);
            $customer_id = NULL;

            //add cellphone to Cookie
            $cookie_model = $this->loadModel('CookieModel');
            $cookie_model->setCookie('cellphone', $cellphone, false);


            if (sizeof($customer) == 1) {
                $isCustomerExisted = true;
                $customer_id = $customer[0]->id;
            } else {
                $customer_id = $customer_model->addCustomer($name, $cellphone);
            }

            /*
            //add SHIPPING_ADDRESS
            $address_model = $this->loadModel('AddressModel');
            $shipping_address_model = $this->loadModel('ShippingAddressModel');

            if ($isCustomerExisted == false) {
                //TODO: WE NEED TO LOCATE LAT AND LNG LATER
                $address_id = $address_model->addAddress("中国", "广东省", "广州市", $_POST["district"], $_POST["address1"], $_POST["address2"], "", "");

                $shipping_address_id = $shipping_address_model->addShippingAddress($customer_id, $address_id);
                $shipping_address_model->setDefaultShippingAddress($shipping_address_id, $customer_id);
            } else {
                $address_id = $_POST["address_id"];
            }

            //add order
            $order_model = $this->loadModel('OrderModel');
            //CID, STORE_ID, ADDRESS_ID, IS_DIY, TOTAL_PRICE
            $nearest_store_id = $_POST["nearest_store_id"];
            $order_id = $order_model->addOrder($customer_id, $nearest_store_id, $address_id, 1, 0);

            //add order detail
            $order_detail_model = $this->loadModel('OrderDetailModel');

            $quantity_index = 0;
            $total_amount = 0;

            foreach ($item_quantities as $quantity) {

                    $order_detail_model->addOrderDetail($order_id, $item_type, $item_ids[$quantity_index], $quantity);

                    $total_amount = $total_amount + $item_prices[$quantity_index] * $quantity;

                $quantity_index++;
            }
            $order_model->updateTotalAmount($order_id, $total_amount);*/
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
