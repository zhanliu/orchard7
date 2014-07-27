<body>


<div id="st-container" class="st-container">
    <div class="st-pusher">


        <div class="st-content">
            <div class="st-content-inner">
                <div id="page-content">

                    <header class="newTodayView">
                        <nav class="shine dropShadow">
                            <a href="#">
                                <span class="logo floatLeft">Daily Fresh</span>
                                <span class="tagline floatLeft">新鲜健康 <br>每一天</span>
                            </a>

                        </nav>
                    </header>
                    <div class="clr"></div>

                    <div id="page-inside">

                        <div class="full-content">

                            <div class="alert alert-danger">
                                今日待处理订单
                            </div>
                                <?php foreach ($orderStatus as $status) { ?>
                                    <a href="<?php echo URL; ?>mobileadmin/orderManager/<?php echo $status->status_code; ?>" class="myButton" ><?php echo $status->status; ?></a>
                                <?php } ?>
                                    <a href="<?php echo URL; ?>mobileadmin/orderManager/9" class="myButton" >全部</a>

                                <?php
                                foreach ($orders as $order) {
                                    $id = $order->id;
                                    $full_address = $order->province.$order->city.$order->district.$order->address1.$order->address2;
                                    //$qty = $items[$product->id];
                                    $order_reliable = $order->is_verified ? "老客订单" : "新客订单";
                                    $order_reliable_bg = $order->is_verified ? "#008" : "#800";
                                    ?>

                                    <div id="list_<?php echo $id; ?>">

                                        <div class="name">订单号:
                                            <a href="<?php echo URL; ?>mobileadmin/processOrder/<?php echo $order->id; ?>" class="myButton" >
                                                <?php echo $order->order_number; ?>
                                            </a>
                                            (<?php echo $order->status; ?>)
                                        </div>
                                        <div class="desc" style="color:#000;padding:5px">
                                            <span>配送店铺: <?php echo $order->storename; ?> </span><br>
                                            <span>下单时间: <?php echo $order->created_time; ?>, </span><br>
                                            <span>总价: <?php echo $order->total_amount; ?>, </span>
                                            <span>运费: <?php echo $order->delivery_fee; ?>, </span>
                                            <span style="background:<?php echo $order_reliable_bg?>;color:#fff">
                                                <?php echo $order_reliable; ?>
                                            </span>
                                            <span>地址: <?php echo $full_address; ?></span>

                                        </div>
                                     </div>

                                    <hr>
                                <?php } ?>




                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="clr"></div>

    </div>
</div>