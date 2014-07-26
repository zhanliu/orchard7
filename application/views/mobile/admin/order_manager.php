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
                                提示: 订单金额小于50元收取7元配送费, 超过50元就可以免费配送了!
                            </div>


                                <?php
                                foreach ($orders as $order) {
                                    $id = $order->id;
                                    //$qty = $items[$product->id];
                                    ?>

                                    <div id="list_<?php echo $id; ?>">

                                        <div class="name"><?php echo $id; ?></div>
                                        <div class="desc">
                                            <span>单价:<?php echo $order->total_amount; ?>, </span>
                                            <span>小计:<?php echo $order->delivery_fee; ?></span>
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