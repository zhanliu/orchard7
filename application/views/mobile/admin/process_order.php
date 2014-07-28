<div id="page-inside">

    <?php
    $order = $order[0];
    $full_address = $order->province . $order->city . $order->district . $order->address1 . $order->address2;
    $order_reliable = $order->is_verified ? "老客订单" : "新客订单";
    $order_reliable_bg = $order->is_verified ? "#008" : "#800";
    ?>
    <span style="font-family: bold;color:#555">
                            订单号:<?php echo $order->order_number; ?>
                        </span>

    <div style="color:#555;padding:5px">
        <h3>基本信息</h3>

        <div>配送店铺: <?php echo $order->storename; ?></div>
        <div>下单时间: <?php echo $order->created_time; ?></div>
        <div>总价: <?php echo $order->total_amount; ?> | 运费: <?php echo $order->delivery_fee; ?> |
                                <span style="background:<?php echo $order_reliable_bg ?>;color:#fff">
                                    <?php echo $order_reliable; ?>
                                </span>
        </div>

        <hr>

        <h3>客户信息</h3>

        <div>姓名: <?php echo $order->cname; ?></div>
        <div>电话: <?php echo $order->cellphone; ?></div>
        <div>地址: <?php echo $full_address; ?></div>

        <hr>

        <h3>订单详情</h3>
        <table border="1" width="90%">
            <th>商品</th>
            <th>价格</th>
            <th>数量</th>
            <?php foreach ($items as $item) { ?>
                <tr align="center">
                    <td><?php echo $item->name; ?>
                    <td><?php echo $item->price; ?></td>
                    <td><?php echo $item->item_quantity; ?></td>
                </tr>
            <?php } ?>
        </table>

        <hr>

        <h3>订单状态</h3>

        <table border="1" width="90%">
            <th>操作员</th>
            <th>新状态</th>
            <th>更新时间</th>
            <?php foreach ($order_process as $process) { ?>
                <tr align="center">
                    <td><?php echo $process->name; ?></td>
                    <td><?php echo $process->status2; ?></td>
                    <td><?php echo $process->created_time; ?></td>
                </tr>
            <?php } ?>
        </table>

        <br>

        <div>
            Modify状态:
            <?php if ($order->status_code == 0) { ?>
                <a href="<?php echo URL; ?>mobileadmin/updateOrder/<?php echo $order->id; ?>/1/0/1"
                   class="myButton">待派送</a>
                <a href="<?php echo URL; ?>mobileadmin/updateOrder/<?php echo $order->id; ?>/5/0/1" class="myButton">取消订单</a>
            <?php } else if ($order->status_code == 1) { ?>
                <a href="<?php echo URL; ?>mobileadmin/updateOrder/<?php echo $order->id; ?>/2/1/1"
                   class="myButton">派送中</a>
            <?php } else if ($order->status_code == 2) { ?>
                <a href="<?php echo URL; ?>mobileadmin/updateOrder/<?php echo $order->id; ?>/3/2/1" class="myButton">完成订单</a>
                <a href="<?php echo URL; ?>mobileadmin/updateOrder/<?php echo $order->id; ?>/4/2/1" class="myButton">拒收订单</a>
            <?php } ?>

        </div>

        <hr>

        <div class="page-button ok">
            <span class="text" onclick="javascript:history.back();">返回</span>
        </div>

    </div>

</div>

