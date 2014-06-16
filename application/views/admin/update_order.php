<?php
if (!session_id()) session_start();
if (!isset($_SESSION['login'])) {
    header('location: ' . URL . 'common/login');
}
?>
<!DOCTYPE html>
<!-- saved from url=(0041)http://redteamux.com/avant/ui-buttons.php -->
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Orchard7</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/orchard7/public/css/styles.min.css">
    <link type="text/css" rel="stylesheet" href="/orchard7/public/css/default.css">
    <link rel="stylesheet" type="text/css" href="/orchard7/public/css/jquery.datatable.css">

    <script src="/orchard7/public/js/jquery-1.10.2.js"></script>
    <script src="/orchard7/public/js/jquery.datatable.js"></script>
    <script src="/orchard7/public/js/jqueryui-1.10.3.min.js"></script>
</head>

<body class="" style="">

<script type="text/javascript">
    $(document).ready(function(){
        $('#order_combo_data_table').dataTable();
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

<div id="box" class="box" STYLE="margin: 0 auto; border: 1px solid #F00; WIDTH: 60%; ALIGN: CENTER">
    <span id="boxtitle"></span>

    <!--            <div class="panel">-->
    <div id="boxcontent">
        <form id="myform" class="comboform" action="<?php echo URL; ?>admin/submitUpdateOrder" method="post" target="_parent">
            <!--                        <h2>修改订单</h2>-->
            <label><b>订单地址:</b></label>
            <br/>
            <label for="province">省*</label><input type="text" name="province" id="province" value="<?php echo $order[0]->province; ?>" data-clear-btn="true" data-mini="true"><br/>
            <label for="city">市*</label><input type="text" name="city" id="city" value="<?php echo $order[0]->city; ?>" data-clear-btn="true" data-mini="true"><br/>
            <label for="district">区*</label><input type="text" name="district" id="district" value="<?php echo $order[0]->district; ?>" data-clear-btn="true" data-mini="true"><br/>
            <label for="address1">地址一*</label><input type="text" name="address1" id="address1" value="<?php echo $order[0]->address1; ?>" data-clear-btn="true" data-mini="true"><br/>
            <label for="address2">地址二*</label><input type="text" name="address2" id="address2" value="<?php echo $order[0]->address2; ?>" data-clear-btn="true" data-mini="true"><br/>

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
                        <td><input <?php if ($orderCombo[$combo->id] > 0) {echo "checked";} ?> type="checkbox" name="chk" class="chk" value="<?php if ($orderCombo[$combo->id] > 0) {echo "1";} else {echo "0";} ?>" id="check<?php echo $combo->id; ?>" onclick=" check_change(<?php echo $combo->id; ?>)" /></td>
                        <td><input class="spinner" name="quantity[]" id="spinner<?php echo $combo->id; ?>" <?php if ($orderCombo[$combo->id] > 0) { } else {echo "disabled";}?> value="<?php echo $orderCombo[$combo->id]; ?>"></td>
                        <td><?php echo $combo->name; ?></td>
                        <td><?php echo $combo->price; ?></td>
                        <input type="hidden" name="comboIds[]" <?php if ($orderCombo[$combo->id] > 0) { } else {echo "disabled";}?> id="comboIdHidden<?php echo $combo->id; ?>" value="<?php echo $combo->id; ?>" />
                        <input type="hidden" name="comboPrices[]" <?php if ($orderCombo[$combo->id] > 0) { } else {echo "disabled";}?> id="comboPriceHidden<?php echo $combo->id; ?>" value="<?php echo $combo->price; ?>"/>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <BR><BR>
            <input type="hidden" name="submit_update_order">
            <input type="hidden" name="address_id" value="<?php echo $order[0]->addressid; ?>">
            <input type="hidden" name="order_id" value="<?php echo $order[0]->id; ?>">

            <a href="#" class="myButton" onclick="submit()">保存</a>
            <a href="#" class="myButton" onclick="closebox('box')">取消</a>
        </form>
    </div>
</div>

</body>