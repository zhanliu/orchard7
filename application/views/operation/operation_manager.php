<div id="page-content" style="min-height: 2911px;">
    <div id="wrap">
        <div id="page-heading">

            <ol class="breadcrumb">
                <li>水果7号</li>
                <li>订单中心</li>
                <li class="active">运营管理</li>
            </ol>

            <h1>运营管理->管理运营文案</h1>

        </div>

        <div class="container">
            <table id="operation_manager_table" class="display" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>文案ID</th>
                    <th>文案名称</th>
                    <th>文案内容</th>
                    <th>修改</th>
                    <th>文案删除</th>
                </tr>
                </thead>

                <tfoot>
                <tr>
                    <th>文案ID</th>
                    <th>文案名称</th>
                    <th>文案内容</th>
                    <th>修改</th>
                    <th>文案删除</th>
                </tr>
                </tfoot>

                <tbody>
                <?php foreach ($operations as $operation) { ?>
                <tr align="center">
                    <td><?php echo $operation->id; ?></td>
                    <td><?php echo $operation->name; ?></td>
                    <td><input type='textarea' value='<?php echo $operation->content; ?>' ></td>
                    <td><a href="<?php echo URL; ?>operation/updateOperation/<?php echo $operation->id; ?>" class="myButton" >修改</a></td>
                    <td><a href="<?php echo URL . 'operation/deleteOperation/' . $operation->name; ?>" class="myButton">删除</a></td>
                </tr>
                <?php } ?>
                </tbody>
            </table>

        </div>
    </div>

<script>
    $(document).ready(function(){
        $('#operation_manager_table').dataTable();
    });


    function updateOrder(order_id) {
        $("#order_combo_data_table").dataTable();
        openbox("box","订单-" + order_id, 1);

    }

</script>
