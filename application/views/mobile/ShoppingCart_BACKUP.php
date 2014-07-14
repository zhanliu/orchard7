<?php

class Shopping_Cart1 {
    var $cart_name;       // The name of the cart/session variable
    var $items = array(); // The array for storing items in the cart

    /**
     * __construct() - Constructor. This assigns the name of the cart
     *                 to an instance variable and loads the cart from
     *                 session.
     *
     * @param string $name The name of the cart.
     */
    function __construct($name) {
        $this->cart_name = $name;
        $this->items = $_SESSION[$this->cart_name];
    }

    /**
     * setItemQuantity() - Set the quantity of an item.
     *
     * @param string $order_code The order code of the item.
     * @param int $quantity The quantity.
     */
    function setItemQuantity($order_code, $quantity) {
        $this->items[$order_code] = $quantity;
    }

    /**
     * getItemPrice() - Get the price of an item.
     *
     * @param string $order_code The order code of the item.
     * @return int The price.
     */
    function getItemPrice($order_code) {
        // This is where the code taht retrieves prices
        // goes. We'll just say everything costs $19.99 for this tutorial.
        return 9.99;
    }

    /**
     * getItemName() - Get the name of an item.
     *
     * @param string $order_code The order code of the item.
     */
    function getItemName($order_code) {
        // This is where the code that retrieves product names
        // goes. We'll just return something generic for this tutorial.
        return 'My Product (' . $order_code . ')';
    }

    /**
     * getItems() - Get all items.
     *
     * @return array The items.
     */
    function getItems() {
        return $this->items;
    }

    /**
     * hasItems() - Checks to see if there are items in the cart.
     *
     * @return bool True if there are items.
     */
    function hasItems() {
        return (bool) $this->items;
    }

    /**
     * getItemQuantity() - Get the quantity of an item in the cart.
     *
     * @param string $order_code The order code.
     * @return int The quantity.
     */
    function getItemQuantity($order_code) {
        return (int) $this->items[$order_code];
    }

    /**
     * clean() - Cleanup the cart contents. If any items have a
     *           quantity less than one, remove them.
     */
    function clean() {
        foreach ( $this->items as $order_code=>$quantity ) {
            if ( $quantity < 1 )
                unset($this->items[$order_code]);
        }
    }

    /**
     * save() - Saves the cart to a session variable.
     */
    function save() {
        $this->clean();
        $_SESSION[$this->cart_name] = $this->items;
    }


}

/*
<span class="pd_product-num-minus"
onclick="sub('<?php echo $index ?>')"></span>
<input class="pd_product-num-form" name="item_quantity[]" type="number"
min="0" max="999" ;="" value="0" id="<?php echo $number_field_id; ?>"
required="">
<input type="hidden" name="item_prices[]"
value="<?php echo $product->price; ?>"/>
<input type="hidden" name="item_id[]" value="<?php echo $product->id; ?>"/>
<input type="hidden" name="item_type" value="product">
<input type="hidden" name="block" value="<?php echo $block; ?>">
<input type="hidden" name="submit_add_item" value="true">
<span class="pd_product-num-plus"
onclick="add('<?php echo $index; ?>')"></span>
</div>
</div>-->*/