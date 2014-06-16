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
                    <td>
                        <a href="<?php echo URL; ?>admin/updateOrder/<?php echo $order->id; ?>" class="myButton" >修改订单<?php echo $order->id; ?></a>
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
