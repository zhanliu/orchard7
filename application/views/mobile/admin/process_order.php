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
                        $full_address = $order->province . $order->city . $order->district . $order->address1 . $order->address2;
                        ?>
                        <div class="alert alert-danger name">
                            订单号:<?php echo $order->order_number; ?>
                        </div>


                        <h3>基本信息</h3>

                        <div>配送店铺: <?php echo $order->storename; ?></div>
                        <div>下单时间: <?php echo $order->created_time; ?></div>
                        <div>总价: <?php echo $order->total_amount; ?> | 运费: <?php echo $order->delivery_fee; ?></div>

                        <hr>

                        <h3>客户信息</h3>

                        <div>姓名: <?php echo $order->cname; ?></div>
                        <div>电话: <?php echo $order->cellphone; ?></div>
                        <div>地址: <?php echo $full_address; ?></div>

                        <hr>

                        <h3>订单详情</h3>
                        <?php foreach ($items as $item) { ?>
                            <div>商品名: <?php echo $item->name; ?></div>
                            <div>价格: <?php echo $item->price; ?> | 数量: <?php echo $item->item_quantity; ?></div><br>
                        <?php } ?>

                        <hr>

                        <div>订单状态: <?php echo $order->status; ?>

                            <?php if ($order->status_code == 0) { ?>
                                <a href="<?php echo URL; ?>mobileadmin/updateOrder/<?php echo $order->id; ?>/1/0/1" class="myButton" >待派送</a>
                                <a href="<?php echo URL; ?>mobileadmin/updateOrder/<?php echo $order->id; ?>/5/0/1" class="myButton" >取消订单</a>
                            <?php } else if ($order->status_code == 1) { ?>
                                <a href="<?php echo URL; ?>mobileadmin/updateOrder/<?php echo $order->id; ?>/2/1/1" class="myButton" >派送中</a>
                            <?php } else if ($order->status_code == 2) { ?>
                                <a href="<?php echo URL; ?>mobileadmin/updateOrder/<?php echo $order->id; ?>/3/2/1" class="myButton" >完成</a>
                                <a href="<?php echo URL; ?>mobileadmin/updateOrder/<?php echo $order->id; ?>/4/2/1" class="myButton" >拒收</a>
                            <?php } ?>

                        </div>

                        <?php foreach ($order_process as $process) { ?>
                            <div>操作员: <?php echo $process->name; ?></div>
                            <div>新状态: <?php echo $process->status2; ?></div>
                            <div>更新时间: <?php echo $process->created_time; ?></div>
                            <hr>
                        <?php } ?>

                    </div>

                </div>
            </div>
        </div>

        <div class="clr"></div>

    </div>
</div>