<div id="page-inside">

    <div class="alert alert-danger">
        今日订单 <br/>
        <a href="<?php echo URL; ?>mobileadmin/orderManager/0"
           class="myButton">未处理(<?php echo $amount_of_type_0; ?>)</a>
        <a href="<?php echo URL; ?>mobileadmin/orderManager/1"
           class="myButton">已处理(<?php echo $amount_of_type_1; ?>)</a>
        <a href="<?php echo URL; ?>mobileadmin/orderManager/"
           class="myButton">全部(<?php echo $amount_of_type_9; ?>)</a>
    </div>

    <?php
    foreach ($orders as $order) {
        $id = $order->id;
        $full_address = $order->province . $order->city . $order->district . $order->address1 . $order->address2;
        //$qty = $items[$product->id];
        $order_reliable = $order->is_verified ? "老客订单" : "新客订单";
        $order_reliable_bg = $order->is_verified ? "#008" : "#800";
        ?>

        <div id="list_<?php echo $id; ?>">

            <div class="name" style="font-size:18px;padding:3px">订单号:
                <a href="<?php echo URL; ?>mobileadmin/processOrder/<?php echo $order->id; ?>"
                   class="myButton">
                    <?php echo $order->order_number; ?>
                </a>
                (<?php echo $order->status; ?>)
            </div>
            <div class="desc" style="color:#000;padding:5px">

                <span style="color:#000;padding:3px">配送店铺: <?php echo $order->storename; ?></span><br>
                <span style="color:#000;padding:3px">下单时间: <?php echo $order->created_time; ?></span><br>
                <span style="color:#000;padding:3px">总价: <?php echo $order->total_amount; ?>, </span>
                <span style="color:#000;padding:3px">运费: <?php echo $order->delivery_fee; ?>, </span>
                <span style="background:<?php echo $order_reliable_bg ?>;color:#fff">
                    <?php echo $order_reliable; ?>
                </span>
                <span style="color:#000;padding:3px">地址: <?php echo $full_address; ?></span>

            </div>
        </div>

        <hr>
    <?php } ?>

</div>
