<div id="page-content" style="min-height: 2911px;">
    <div id="wrap">
        <div id="page-heading">

            <ol class="breadcrumb">
                <li>水果7号</li>
                <li>订单中心</li>
                <li class="active">运营管理</li>
            </ol>

            <h1>运营管理->管理配置</h1>

        </div>

        <div class="container">
            <table id="config_manager_table" class="display" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>配置名称</th>
                    <th>配置内容</th>
                    <th>更改配置</th>
                </tr>
                </thead>

                <tfoot>
                <tr>
                    <th>配置名称</th>
                    <th>配置内容</th>
                    <th>更改配置</th>
                </tr>
                </tfoot>

                <tbody>
                    <tr align="center">
                        <td>是否提前询问用户地址</td>
                        <td><?php if($local_skip_location == 1) {echo "忽略";} else {echo "询问"; } ?></td>
                        <td><a href="<?php echo URL; ?>operation/updateLocationQueryConfig/<?php if($local_skip_location == 1) {echo 0;} else {echo 1; } ?>" class="myButton" >修改</a></td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('#config_manager_table').dataTable();
        });
    </script>
