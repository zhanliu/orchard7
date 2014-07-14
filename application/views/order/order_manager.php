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
            <table id="order_manager_table" class="display" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>订单ID</th>
                    <th>客户电话</th>
                    <th>订单状态</th>
                    <th>订单金额</th>
                    <th>订单地址</th>
                    <th>配送店铺</th>
                    <th>修改</th>
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
                    <th>配送店铺</th>
                    <th>修改</th>
                    <th>订单删除</th>
                </tr>
                </tfoot>

                <tbody>
                <?php foreach ($orders as $order) { ?>
                <tr align="center">
                    <td><?php echo $order->id; ?></td>
                    <td><?php echo $order->cellphone; ?></td>
                    <form id="myform<?php echo $order->id; ?>" class="comboform" action="<?php echo URL; ?>order/orderstatus" method="post" target="_parent">
                    <td>
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
                    </td>
                    </form>
                    <td><?php echo $order->total_amount ?></td>
                    <td><?php echo $order->country."-".$order->province."-".$order->city."-".$order->district."-".$order->address1."-".$order->address2; ?></td>
                    <td><?php echo $order->storename ?></td>
                    <td><a href="<?php echo URL; ?>order/updateOrder/<?php echo $order->id; ?>" class="myButton" >修改</a></td>
                    <td><a href="<?php echo URL . 'order/deleteOrder/' . $order->id; ?>" class="myButton">删除</a></td>
                </tr>
                <?php } ?>
                </tbody>
            </table>

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
