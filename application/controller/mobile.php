<?php
include('application/views/mobile/ShoppingCart.class.php');
class Mobile extends Controller {

    public function index() {
        //add user access to Cookie
        $cookie_model = $this->loadModel('CookieModel');
        if ($cookie_model->getCookie('uaccess_time') != null) {
            $cookie_model->setCookie('uaccess_time', $cookie_model->getCookie('uaccess_time') + 1, false);
            $this->showcase();
        } else {
            $cookie_model->setCookie('uaccess_time', 1, false);
            require 'application/views/mobile/header.php';
            require 'application/views/mobile/confirm_range.php';
            require 'application/views/mobile/footer.php';
        }


    }


    public function wechatindex($wechat_id) {

        $customer = $this->getCustomer($wechat_id);
        $wechatid_session = $wechat_id;
        $addresses = null;

        if ($wechatid_session != null && $customer != null) {
            $address_model = $this->loadModel('AddressModel');
            $addresses =$address_model->getLastAddressesByCustomerId($customer->id);
            //$address = $addresses[0];
        }

        require 'application/views/mobile/header.php';
        require 'application/views/mobile/index.php';
        require 'application/views/mobile/footer.php';
    }

    public function sorry()
    {
        require 'application/views/mobile/header.php';
        require 'application/views/mobile/sorry.php';
        require 'application/views/mobile/footer.php';
    }

    public function success()
    {
        require 'application/views/mobile/header.php';
        require 'application/views/mobile/success.php';
        require 'application/views/mobile/footer.php';
    }

    public function showcase()
    {
        $product_model = $this->loadModel('ProductModel');
        $products = $product_model->getAllProducts();

        $block = isset($_POST["block"]) ? $_POST["block"]:null;
        require 'application/views/mobile/header.php';
        require 'application/views/mobile/showcase.php';
        require 'application/views/mobile/footer.php';
/*
        //$block = $_POST["block"];
        //$cookie_model = $this->loadModel('CookieModel');
        //$cookie_model->setCookie('uif', $block, false);

        $block = $_POST["block"];
        $nearest_store_id = $_POST["nearest_store_id"];
        $cookie_model = $this->loadModel('CookieModel');
        $cookie_model->setCookie('uif', $block, false);

        //require 'application/views/mobile/header.php';

        //require 'application/views/mobile/footer.php';*/
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

        $nearest_store_id = $_POST["nearest_store_id"];
        $item_ids = $_POST['item_id'];
        $item_quantities = $_POST['item_quantity'];
        $item_type = $_POST['item_type'];
        $item_prices = $_POST['item_prices'];

        require 'application/views/mobile/header.php';
        require 'application/views/mobile/checkout.php';
        require 'application/views/mobile/footer.php';
    }

    public function submitAddItem() {
        if (isset($_POST["submit_add_item"])) {
            $block = $_POST["block"];
            $nearest_store_id = $_POST["nearest_store_id"];
            $item_type = $_POST['item_type'];
            $item_ids = base64_encode(json_encode($_POST['item_id']));
            $item_quantities = base64_encode(json_encode($_POST['item_quantity']));
            $item_prices = base64_encode(json_encode($_POST['item_prices']));

            require 'application/views/mobile/header.php';
            require 'application/views/mobile/checkout.php';
            require 'application/views/mobile/footer.php';
        }
    }

    public function submitOrder() {
        if (isset($_POST["submit_order"])) {
            $item_type = $_POST['item_type'];
            echo "item id are ".$_POST['item_ids'];
            $item_ids = json_decode(base64_decode($_POST['item_ids']));
            $item_quantities = json_decode(base64_decode($_POST['item_quantities']));
            $item_prices = json_decode(base64_decode($_POST['item_prices']));
            $district = $_POST['district'];
            $address1 = $_POST['address1'];
            $address2 = $_POST['address2'];
            $cellphone = $_POST['cellphone'];

            //add Customer
            $customer_model = $this->loadModel('CustomerModel');
            $isCustomerExisted = false;
            $customer = $customer_model->getCustomerByCellphone($cellphone);
            $customer_id = NULL;

            //add cellphone to Cookie
            $cookie_model = $this->loadModel('CookieModel');
            $cookie_model->setCookie('ucellphone', $cellphone, false);

            if (sizeof($customer) == 1) {
                $isCustomerExisted = true;
                $customer_id = $customer[0]->id;
            } else {
                $customer_id = $customer_model->addCustomer($cellphone);
            }

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
            //TODO: do not submit the item with qty 0
            foreach ($item_quantities as $quantity) {
                if ($quantity > 0) {
                    $order_detail_model->addOrderDetail($order_id, $item_type, $item_ids[$quantity_index], $quantity);

                    $total_amount = $total_amount + $item_prices[$quantity_index] * $quantity;
                }
                $quantity_index++;
            }
            $order_model->updateTotalAmount($order_id, $total_amount);

        }
    }

    public function addToCart($id) {
        if (!session_id()) session_start();
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = new ShoppingCart();
        }
        $cart = $_SESSION['cart'];
        $cart->addItem($id);
    }

    public function removeFromCart($id) {
        if (!session_id()) session_start();
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = new ShoppingCart();
        }
        $cart = $_SESSION['cart'];
        $cart->deleteItem($id);
    }

    public function preview() {
        require 'application/views/mobile/header.php';
        require 'application/views/mobile/preview.php';
        require 'application/views/mobile/footer.php';
    }
}
