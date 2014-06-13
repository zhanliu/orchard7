<div id="page-content" style="min-height: 2911px;">
    <div id="wrap">
        <div id="page-heading">

            <ol class="breadcrumb">
                <li>水果7号</li>
                <li>订单中心</li>
                <li class="active">订单管理</li>
            </ol>

            <h1>订单添加->输入配送信息</h1>

        </div>

        <div class="container">
            <div>
                <form id="myform" class="myform" action="<?php echo URL; ?>admin/addOrderStepThree" method="post">
                    <?php
                      if ($isCustomerExisted == true) {
                          echo "欢迎您再次下单!";
                      } else {
                          echo "这是您初次下单, 请完善您的配送信息";
                      }
                    ?>

                    <h3>1. Cellphone</h3>
                    <?php echo $cellphone; ?>
                    <hr>

                    <h3>2. Shipping Address</h3>
                    <font color="red"><b>重要提示: 当前仅接受广州市海印区和荔湾区订单!</b></font>
                    <br><br>
                    您的配送地址:<BR>

                    <?php
                        if ($isCustomerExisted == true) {
                            foreach ($list_of_address as $address) {
                                echo $address->district."-".$address->address1."-".$address->address2;
                            }
                     ?>
                            <input type="hidden" name="submit_already_add_address">
                    <?php
                        } else {
                    ?>
                            广州市 -
                            <select id="district" name="district">
                                <option value="">请选择区</option>
                                <option value="荔湾区">荔湾区</option>
                                <option value="海印区">海印区</option>
                            </select>
                            <BR>
                            <input type="text" name="address1" size="30" placeholder="输入路名或小区..."><BR>
                            <input type="text" name="address2" size="30" placeholder="输入详细地址, 如10弄5号...">
                            <input type="hidden" name="country" value="中国">
                            <input type="hidden" name="province" value="广东省">
                            <input type="hidden" name="city" value="广州市">
                            <input type="hidden" name="submit_add_address">
                    <?php
                        }
                    ?>

<!--
                    <input type="text" name="address_keyword" size="30" placeholder="输入关键字, 搜索路名或小区...">
                    <a href="#" class="myButton" onclick="address_lookup();">查找</a>
                    <br><br>
                    <input type="hidden" name="address1" id="address1">
                    <input type="text" name="address2" size="40" placeholder="输入详细地址, 如10弄5号...">
-->
                    <hr>
                    <input type="hidden" name="customer_id" value="<?php echo $cid; ?>">
                    <input type="hidden" name="cellphone" value="<?php echo $cellphone; ?>">

                    <a href="#" class="myButton" onclick="submit()">开始下单</a>
                </form>
            </div>


            <div class="panel">
            </div><!-- /panel -->
         </div>
    </div>
</div>
<script>
    function submit() {
        document.getElementById("myform").submit();
    }

</script>






