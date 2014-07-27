<?php

class OrderModel
{
    /**
     * Every model needs a database connection, passed to the model
     * @param object $db A PDO database connection
     */
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    /**
     * ##### FOR DEBUG PURPOSE ONLY #####
     */
    public function getAllOrders()
    {
        $sql = "SELECT * FROM order1";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }


    public function getAllOrdersWithDetails()
    {
        $sql = "SELECT ord.id, ord.order_number, cus.cellphone, ord.status, ord.total_amount, ord.delivery_fee, ord.created_time, ";
        $sql.= "ord.is_verified, addr.id as addressid, addr.country, addr.province, ";
        $sql.= "addr.city, addr.district, addr.address1, addr.address2, s.name as storename ";
        $sql.= "FROM order1 as ord left join customer as cus on ord.customer_id = cus.id ";
        $sql.= "left join address as addr on ord.address_id = addr.id left join store as s on ord.store_id = s.id ";

        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function getTodayOrdersWithDetails()
    {
        $sql = "SELECT ord.id, ord.order_number, cus.cellphone, ord.status, ord.total_amount, ord.delivery_fee, ord.created_time, ";
        $sql.= "ord.is_verified, addr.id as addressid, addr.country, addr.province, os.status, ";
        $sql.= "addr.city, addr.district, addr.address1, addr.address2, s.name as storename ";
        $sql.= "FROM order1 as ord left join customer as cus on ord.customer_id = cus.id ";
        $sql.= "left join address as addr on ord.address_id = addr.id left join store as s on ord.store_id = s.id ";
        $sql.= "left join order_status os on ord.status = os.status_code ";
        $sql.= "WHERE ord.created_time >= CURDATE() order by ord.created_time desc";

        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }



    public function getOrderDetailById($order_id) {

        $order_id = strip_tags($order_id);
        $sql = "SELECT ord.id, ord.order_number, cus.cellphone, ord.status, ord.total_amount, addr.id as addressid, addr.country, ";
        $sql.= "addr.province, addr.city, addr.district, addr.address1, addr.address2 ";
        $sql.= "FROM order1 as ord left join customer as cus on ord.customer_id = cus.id ";
        $sql.= "left join address as addr on ord.address_id = addr.id ";
        $sql = $sql . "WHERE ord.id=" . $order_id;

        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function addOrder($customer_id, $store_id, $address_id, $is_diy, $total_amount, $isCustomerExisted)
    {
        // clean the input from javascript code for example
        $customer_id = strip_tags($customer_id);
        $address_id = strip_tags($address_id);
        $store_id = strip_tags($store_id);
        $is_diy = strip_tags($is_diy);

        $status = 0;

        $now = new DateTime(null, new DateTimeZone('Asia/Shanghai'));
        $created_time = $now->format("Y-m-d H:i:s");
        $updated_time = $created_time;

        $is_verified = $isCustomerExisted;

        $sql = "insert into order1 (customer_id, store_id, status, is_diy, is_verified, total_amount, address_id, ";
        $sql.= "created_time, updated_time) VALUES (:customer_id,:store_id, :status, :is_diy, :is_verified, :total_amount, :address_id, ";
        $sql.= ":created_time, :updated_time)";
        $query = $this->db->prepare($sql);

        $query->execute(array(':customer_id' => $customer_id,':store_id'=>$store_id, ':status'=> $status, ':is_diy' => $is_diy, ':is_verified' => $is_verified, ':total_amount'=> $total_amount, ':address_id' => $address_id,  ':created_time'=>$created_time, ':updated_time'=>$updated_time));
        $insertedId = $this->db->lastInsertId();

        return $insertedId;
    }

    public function getOrderByOrderId($order_id) {

        $order_id = strip_tags($order_id);

        $sql = "SELECT * ";
        $sql.= "FROM order1 o ";
        $sql.= "WHERE o.id=".$order_id;
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
    
    public function getOrdersByWechatId($wechat_id) {

        $wechat_id = strip_tags($wechat_id);

        $sql = "SELECT ord.id, ord.order_number, cus.cellphone, ord.status, ord.total_amount,addr.id as addressid, addr.country, ";
        $sql.= "addr.province, addr.city, addr.district, addr.address1, addr.address2 ";
        $sql.= "FROM staff s left join order1 as ord on s.store_id = ord.store_id left join customer as cus on ord.customer_id = cus.id ";
        $sql.= "left join address as addr on ord.address_id = addr.id ";
        $sql = $sql . "WHERE s.wechat_id = '" . $wechat_id . "'";
        
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function getOrderStatusCode()
    {
        $sql = "SELECT * ";
        $sql.= "FROM order_status ";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function updateTotalAmount($order_id, $total_amount) {

        $order_id = strip_tags($order_id);
        $total_amount = strip_tags($total_amount);

        $delivery_fee = 0;
        if ($total_amount<50) {
            $delivery_fee = 7;
        }

        $now = new DateTime(null, new DateTimeZone('Asia/Shanghai'));
        $date_str = $now->format('Ymd');
        $order_number = $date_str.$order_id;

        $sql = "UPDATE order1 SET total_amount = " . $total_amount . ", delivery_fee = " . $delivery_fee . ", order_number = " . $order_number;
        $sql.= " WHERE id = " . $order_id;

        $query = $this->db->prepare($sql);
        $query->execute();
    }

    public function deleteOrder($id)
    {
        $id = strip_tags($id);

        $sql = "DELETE FROM order1 WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
    }

    public function updateOrderStatus($id, $status)
    {
        $id = strip_tags($id);
        $status = strip_tags($status);

        $sql = "UPDATE order1 set status = :status WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id, ':status' => $status));
    }
}
