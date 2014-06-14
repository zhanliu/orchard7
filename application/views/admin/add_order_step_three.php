

<div id="page-content" style="min-height: 2911px;">
    <div id="wrap">
        <div id="page-heading">

            <ol class="breadcrumb">
                <li>水果7号</li>
                <li>订单中心</li>
                <li class="active">订单管理</li>
            </ol>

            <h1>订单添加->选择套餐</h1>

        </div>

        <div class="container">
            <form id="myform" class="myform" action="<?php echo URL; ?>admin/addOrderStepFour" method="post">
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
                <input type="hidden" name="customer_id" value="<?php echo $customer_id; ?>">
                <input type="hidden" name="submit_add_order">
                <input type="hidden" name="is_diy" value="0">
            </form>
                <BR><BR>
                <a href="#" class="myButton" onclick="submit()">确认订单</a>
         <div class="panel">
         </div><!-- /panel -->

    </div>
</div>

<script>
    $(document).ready(function(){
        $("#order_combo_data_table").dataTable();

//        $( ".spinner" ).spinner();
    });

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







