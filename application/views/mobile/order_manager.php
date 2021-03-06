<div id="page-inside">

    <?php
    foreach ($orders as $order) {
        $id = $order->id;
        $full_address = $order->province . $order->city . $order->district . $order->address1 . $order->address2;
        //$qty = $items[$product->id];
        $order_reliable = $order->is_verified ? "老客订单" : "新客订单";
        $order_reliable_bg = $order->is_verified ? "#008" : "#800";
        ?>

        <div id="list_<?php echo $id; ?>">

            <div class="name" style="font-size:18px;padding:3px">订单号: <?php echo $order->order_number; ?> (<?php echo $order->status; ?>)
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
