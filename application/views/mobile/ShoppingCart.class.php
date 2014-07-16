<?php

class ShoppingCart {
    protected $items = array();

    public function isEmpty() {
        return (empty($this->items));
    }

    function addItem($id) {
        if (isset($this->items[$id])) {
            $this->updateItem($id, $this->items[$id] + 1);
        } else {
            $this->items[$id] = 1;
        }
    }

    public function updateItem($id, $qty) {
        // Delete or update accordingly:
        if ($qty === 0) {
            $this->deleteItem($id);
        } else if ( ($qty > 0) && ($qty != $this->items[$id])) {
            $this->items[$id] = $qty;
        }
    }

    public function reduceItem($id) {
        $this->updateItem($id, $this->items[$id] - 1);
    }

    public function deleteItem($id) {
        if (isset($this->items[$id])) {
            unset($this->items[$id]);
        }
    }

    public function getItems() {
        return $this->items;
    }

    public function count() {
        $count = 0;
        foreach ($this->items as $key => $value) {
            $count+= $value;
        }
        return $count;
    }

    public function getIds() {
        $ids = array();
        $index = 0;
        foreach ($this->items as $key => $value) {
            $ids[$index] = $key;
            $index++;
        }
        return $ids;
    }

    /*--------------------------------*/

}
