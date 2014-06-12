<div id="page-content" style="min-height: 2911px;">
    <div id="wrap">
        <div id="page-heading">

            <ol class="breadcrumb">
                <li>水果7号</li>
                <li>订单中心</li>
                <li class="active">订单管理</li>
            </ol>

            <h1>订单添加->输入手机号码</h1>

        </div>

        <div class="container">
            <div>
                <form id="myform" class="myform" action="<?php echo URL; ?>admin/addOrderStepTwo" method="post">
                    <font color="red"><b>重要提示: 当前仅接受广州市海印区和荔湾区订单!</b></font>
                    <br><br>
                    输入手机号码才能开始订餐<br>
                    <input type="text" name="cellphone" id="cellphone" value="" data-clear-btn="true" data-mini="true">

                    <BR><BR><BR>

                    <a href="#" class="myButton" onclick="submit()">Next Step</a>
                </form>
            </div>


            <div class="panel">
            </div><!-- /panel -->
         </div>
    </div>
</div>
<script>
    function submit() {
        var isValid = validateCellphone();
        if (isValid) {
          document.getElementById("myform").submit();
        }
        return true;
    }

    function validateCellphone() {
            var cellPhone = document.getElementById("cellphone");
            var RegCellPhone = /^([0-9]{11})?$/;
            var flag = cellPhone.value.search(RegCellPhone);
            if (flag == -1){
                alert("手机号不合法!");
                return false;
            } else {
                return true;
            }
    }
</script>






