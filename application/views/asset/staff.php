<div id="page-content" style="min-height: 2911px;">
    <div id="wrap">
        <div id="page-heading">

            <ol class="breadcrumb">
                <li>水果7号</li>
                <li>资产中心</li>
                <li class="active">店员管理</li>
            </ol>

            <h1>店员管理</h1>

        </div>

        <div class="container">
            <div>
                <table id="store_data_table" class="display" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>微信ID</th>
                        <th>姓名</th>
                        <th>电话</th>
                        <th>店铺</th>
                        <th>状态</th>
                        <th>激活</th>
                        <th>删除</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>微信ID</th>
                        <th>姓名</th>
                        <th>电话</th>
                        <th>店铺</th>
                        <th>状态</th>
                        <th>激活</th>
                        <th>删除</th>
                    </tr>
                    </tfoot>

                    <tbody>
                    <?php foreach ($staffs as $staff) { ?>
                        <tr align="center">
                            <td><?php echo $staff->id; ?></td>
                            <td><?php echo $staff->wechat_id; ?></td>
                            <td><?php echo $staff->name; ?></td>
                            <td><?php echo $staff->cellphone; ?></td>
                            <td><?php echo $staff->store_name; ?></td>
                            <td><?php echo $staff->status; ?></td>
                            <td><a href="<?php echo URL . 'asset/enableStoreStaff/' . $staff->id; ?>" class="myButton">激活</a></td>
                            <td><a href="<?php echo URL . 'asset/deleteStoreStaff/' . $staff->id; ?>" class="myButton">删除</a></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>

            </div>

            <div class="panel">
            </div><!-- /panel -->
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function(){
        $('#store_data_table').dataTable();
    });
</script>