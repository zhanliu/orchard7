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
                                <?php if ($status->status_code == $order->status) { ?>
                                <?php echo '<option class="statusoption" value="'.$status->status_code.'" selected>'.$status->status.'</option>'; ?>
                                <?php } else { ?>
                                <?php echo '<option class="statusoption" value="'.$status->status_code.'" >'.$status->status.'</option>'; ?>
                                <?php } ?>
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

            <div id="box" class="box" STYLE="margin: 0 auto; border: 1px solid #F00; WIDTH: 60%; ALIGN: CENTER">
                <span id="boxtitle"></span>

                <!--            <div class="panel">-->
                <div id="boxcontent">
                    <form id="myform" class="comboform" action="<?php echo URL; ?>admin/updateOrder" method="post" target="_parent">
<!--                        <h2>修改订单</h2>-->
                        <label><b>订单地址:</b></label>
                        <br/>
                        <label for="province">省*</label><input type="text" name="province" id="province" value="" data-clear-btn="true" data-mini="true"><br/>
                        <label for="city">市*</label><input type="text" name="city" id="city" value="" data-clear-btn="true" data-mini="true"><br/>
                        <label for="district">区*</label><input type="text" name="district" id="district" value="" data-clear-btn="true" data-mini="true"><br/>
                        <label for="address1">地址一*</label><input type="text" name="address1" id="address1" value="" data-clear-btn="true" data-mini="true"><br/>
                        <label for="address2">地址二*</label><input type="text" name="address2" id="address1" value="" data-clear-btn="true" data-mini="true"><br/>

                        <hr/>
                        <label><b>订单详情:</b></label>
                        <table id="order_combo_data_table" class="display" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>点选</th>
                                <th>数量</th>
                                <th>名称</th>
                                <th>价格</th>
                            </tr>
                            </thead>

                            <tfoot>
                            <tr>
                                <th>点选</th>
                                <th>数量</th>
                                <th>名称</th>
                                <th>价格</th>
                            </tr>
                            </tfoot>

                            <tbody>
                            <?php foreach ($combos as $combo) { ?>
                                <tr align="center">
                                    <td><input type="checkbox" name="chk" class="chk" value="0" id="check<?php echo $combo->id; ?>" onclick=" check_change(<?php echo $combo->id; ?>)" /></td>
                                    <td><input class="spinner" name="quantity[]" id="spinner<?php echo $combo->id; ?>" disabled="true"></td>
                                    <td><a href="#" onclick="showComboProduct(<?php echo $combo->id; ?>)">
                                            <?php echo $combo->name; ?>
                                        </a></td>
                                    <td><?php echo $combo->price; ?></td>
                                    <input type="hidden" name="comboIds[]" disabled="true" id="comboIdHidden<?php echo $combo->id; ?>" value="<?php echo $combo->id; ?>" />
                                    <input type="hidden" name="comboPrices[]" disabled="true" id="comboPriceHidden<?php echo $combo->id; ?>" value="<?php echo $combo->price; ?>"/>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        <BR><BR>
                        <input type="hidden" name="submit_add_combo">

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
            $("#order_combo_data_table").dataTable();
            openbox("box","订单-" + order_id, 1);
        }

        function optionClick(comboID) {
            $("#myform"+comboID).submit();
        }

        function check_change(id) {

            if ($("#check"+id).attr("value") == 0) {
                $("#check"+id).attr("value", 1);
                $("#spinner"+id).attr("disabled", false);
                $("#comboIdHidden"+id).attr("disabled", false);
                $("#comboPriceHidden"+id).attr("disabled", false);
            } else {
                $("#check"+id).attr("value", 0);
                $("#spinner"+id).attr("disabled", true);
                $("#comboIdHidden"+id).attr("disabled", true);
                $("#comboPriceHidden"+id).attr("disabled", true);
                $("#spinner"+id).val("");
            }
        }

        function submit() {
            document.getElementById("myform").submit();
            return false;
        }
    </script>
