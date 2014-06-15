<div id="page-content" style="min-height: 2911px;">
    <div id="wrap">
        <div id="page-heading">

            <ol class="breadcrumb">
                <li>水果7号</li>
                <li>订单中心</li>
                <li class="active">订单管理</li>
            </ol>

            <h1>订单添加->订单确认</h1>

        </div>

        <div class="container">
<!--            <form id="myform" class="myform" action="--><?php //echo URL; ?><!--admin/addOrderStepFour" method="post">-->
                <table id="order_comfirm_table" class="display" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>客户电话</th>
                        <th>状态</th>
                        <th>总额</th>
                        <th>地址</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>客户电话</th>
                        <th>状态</th>
                        <th>总额</th>
                        <th>地址</th>
                    </tr>
                    </tfoot>

                    <tbody>
                        <tr align="center">
                            <td><?php echo $order_customer->cellphone; ?></td>
                            <td><?php echo $current_order->status; ?></td>
                            <td><?php echo $current_order->total_amount; ?></td>
                            <td><?php echo $address_str ?></td>
                        </tr>
                    </tbody>
                </table>
                <input type="hidden" name="customer_id" value="<?php echo $customer_id; ?>">
                <input type="hidden" name="submit_add_order">
                <input type="hidden" name="is_diy" value="0">
                <hr/>
<!--            </form>-->
                <table id="order_detail_table" class="display" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>套餐</th>
                        <th>数量</th>
                        <th>金额</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>套餐</th>
                        <th>数量</th>
                        <th>金额</th>
                    </tr>
                    </tfoot>

                    <tbody>
                    <?php foreach ($order_details as $order_detail) { ?>
                    <tr align="center">
                        <td><?php echo $order_detail->name; ?></td>
                        <td><?php echo $order_detail->combo_quantity; ?></td>
                        <td><?php echo $order_detail->price * $order_detail->combo_quantity; ?></td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            <BR><BR>
            <form id="myform" class="myform" action="<?php echo URL; ?>admin/addOrderStepFive" method="post">
            </form>

            <a href="#" class="myButton" onclick="submit()">确认订单</a>

            <div class="panel">
            </div><!-- /panel -->

        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('#order_comfirm_table').dataTable();
            $('#order_detail_table').dataTable();
//            $( ".spinner" ).spinner();
//        $( ".spinner").spi
        });
        function submit() {
            $("#myform").submit();
            return false;
        }
    </script>