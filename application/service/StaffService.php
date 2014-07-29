<?php

class StaffService extends Controller
{

    public function addStaff($name, $cellphone, $store_id, $wechat_id) {
        $store_model = $this->loadModel('StoreModel');
        $staff_id = $store_model->addStaff($name, $cellphone, $store_id, $wechat_id);
    
    	return $staff_id;
    }
    
    public function queryOrder($wechat_id) {
        $order_model = $this->loadModel('OrderModel');
        $orders = $order_model->getOrdersByWechatId($wechat_id);
    
    	return $orders;
    }

    public function getStaffs($wechat_id) {
        $store_model = $this->loadModel('StoreModel');
        $num = $store_model->getStaffs($wechat_id);

        return $num;
    }
}


