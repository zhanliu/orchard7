<div id="page-content" style="min-height: 2911px;">
    <div id="wrap">
        <div id="page-heading">

            <ol class="breadcrumb">
                <li>水果7号</li>
                <li>订单中心</li>
                <li class="active">订单管理</li>
            </ol>

            <h1>订单管理->订单管理</h1>

        </div>

        <div class="container">
            <!--            <form id="myform" class="myform" action="--><?php //echo URL; ?><!--admin/addOrderStepFour" method="post">-->
            <table id="order_manager_table" class="display" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>订单ID</th>
                    <th>客户电话</th>
                    <th>订单状态</th>
                    <th>订单金额</th>
                    <th>订单地址</th>
                    <th>订单删除</th>
                </tr>
                </thead>

                <tfoot>
                <tr>
                    <th>订单ID</th>
                    <th>客户电话</th>
                    <th>订单状态</th>
                    <th>订单金额</th>
                    <th>订单地址</th>
                    <th>订单删除</th>
                </tr>
                </tfoot>

                <tbody>
                <?php foreach ($orders as $order) { ?>
                <tr align="center">
                    <td><a href="#" onclick="updateOrder(<?php echo $order->id; ?>)">
                            <?php echo $order->id; ?>
                        </a>
                    </td>
                    <td><?php echo $order->cellphone; ?></td>
                    <td>
                        <form id="myform<?php echo $order->id; ?>" class="comboform" action="<?php echo URL; ?>admin/orderstatus" method="post" target="_parent">
                            <b><?php echo $order->status; ?></b>
                            <select name="orderstatus" id="orderstatus<?php echo $order->id; ?>" onchange="optionClick(<?php echo $order->id; ?>)">
                            <?php foreach ($orderStatus as $status) { ?>
                                <?php echo '<option class="statusoption" value="'.$status->status_code.'" >'.$status->status.'</option>'; ?>
                            <?php } ?>
                        </select>
                        <input type="hidden" name="order_id" value="<?php echo $order->id; ?>">
                        </form>
                    </td>
                    <td><?php echo $order->total_amount ?></td>
                    <td><?php echo $order->country."-".$order->province."-".$order->city."-".$order->district."-".$order->address1."-".$order->address2; ?></td>
                    <td>[<a href="<?php echo URL . 'admin/deleteorder/' . $order->id; ?>">X</a>]</td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
<!--            <input type="hidden" name="customer_id" value="--><?php //echo $customer_id; ?><!--">-->
<!--            <input type="hidden" name="submit_add_order">-->
<!--            <input type="hidden" name="is_diy" value="0">-->

<!--            <BR><BR>-->
<!---->
<!--            <a href="#" class="myButton" onclick="submit()">确认订单</a>-->

            <div id="shadowing"></div>

            <div id="box" class="box" STYLE="margin: 0 auto; border: 1px solid #F00; WIDTH: 50%; ALIGN: CENTER">
                <span id="boxtitle"></span>

                <!--            <div class="panel">-->
                <div id="boxcontent">
                    <form id="myform" class="comboform" action="<?php echo URL; ?>admin/addCombo" method="post" target="_parent">
                        <h2>修改</h2>
                        <label for="name">套餐名称*</label>
                        <input type="text" name="name" id="name" value="" data-clear-btn="true" data-mini="true">

                        <INPUT type="button" value="加入商品" onclick="addRow('dataTable')" />
                        <INPUT type="button" value="删除商品" onclick="deleteRow('dataTable')" />
                        <BR><BR>
                        <input type="hidden" name="submit_add_combo">
                        <TABLE id="dataTable" width="100%" border="1">
                            <TR>
                                <TD><INPUT type="checkbox" name="chk"/>1</TD>
                                <TD> 1 </TD>
                                <TD>
                                    <select name="product_id[]" id="mapping">
                                        <?php
                                        foreach ($products as $product) {
                                            echo '<option value="'.$product->id.'">'.$product->name.'</option>';
                                        }
                                        ?>
                                    </select>
                                </TD>
                                <TD><input type="text" name="quantity[]"></TD>
                            </TR>
                        </TABLE>

                        <label for="price">价格*</label>
                        <input type="text" name="price" id="price" value="" data-clear-btn="true" autocomplete="off" data-mini="true">

                        <div class="switch">
                            <label for="is_archived">当前状态</label>
                            <select name="is_archived" id="slider" data-role="slider" data-mini="true">
                                <option value="on">激活</option>
                                <option value="off">禁止</option>
                            </select>
                        </div>

                        <a href="#" class="myButton" onclick="submit()">保存</a>
                        <a href="#" class="myButton" onclick="closebox('box')">取消</a>
                    </form>
                </div>
            </div>

<!--            <a href="#" onClick="openbox('box', '套餐管理', 1)">添加新套餐</a>-->

        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('#order_manager_table').dataTable();
        });


        function updateOrder(order_id) {
            openbox("box","订单-" + order_id, 1);
        }

        function optionClick(comboID) {
            $("#myform"+comboID).submit();
        }
    </script>
