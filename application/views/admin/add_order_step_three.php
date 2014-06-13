

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
                <table id="combo_data_table" class="display" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>名称</th>
                            <th>价格</th>
                            <th>描述</th>
                            <th>标签</th>
                        </tr>
                        </thead>

                        <tfoot>
                        <tr>
                            <th>名称</th>
                            <th>价格</th>
                            <th>描述</th>
                            <th>标签</th>
                        </tr>
                        </tfoot>

                        <tbody>
                        <?php foreach ($combos as $combo) { ?>
                            <tr align="center">
                                <td><a href="#" onclick="showComboProduct(<?php echo $combo->id; ?>)">
                                        <?php echo $combo->name; ?>
                                    </a></td>
                                <td><?php echo $combo->price; ?></td>
                                <td><?php echo $combo->description; ?></td>
                                <td><?php echo $combo->tag; ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                </table>

                <BR><BR>
                <a href="#" class="myButton" onclick="submit()">确认订单</a>

         <div class="panel">
         </div><!-- /panel -->

    </div>
</div>

<script>
    $(document).ready(function(){
        $('#category_data_table').dataTable();
    });
    function submit() {
        document.getElementById("myform").submit();
        return false;
    }
</script>







