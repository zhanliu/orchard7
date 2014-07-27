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



                    <div style="color:#f00;padding:5px">

                            <?php
                                $order = $order[0];
                                $full_address = $order->province.$order->city.$order->district.$order->address1.$order->address2;
                            ?>
                            <div class="alert alert-danger name">
                                订单号:<?php echo $order->order_number; ?>
                            </div>
                            <h3>客户信息</h3>

                            <div>配送店铺: <?php echo $order->storename; ?></div>
                            <div>下单时间: <?php echo $order->created_time; ?></div>
                            <div>总价: <?php echo $order->total_amount; ?></div>
                            <div>运费: <?php echo $order->delivery_fee; ?></div>
                            <div>地址: <?php echo $full_address; ?></div>

                            <hr>

                        </div>

                </div>
            </div>
        </div>

        <div class="clr"></div>

    </div>
</div>