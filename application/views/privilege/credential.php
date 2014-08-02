<div id="page-content" style="min-height: 2911px;">
    <div id="wrap">
        <div id="page-heading">

            <ol class="breadcrumb">
                <li>控制面板</li>
                <li>权限管理</li>
                <li class="active">人员管理</li>
            </ol>

            <h1>人员管理</h1>

        </div>

        <div class="container">

            <div>
                <table id="role_data_table" class="display" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>标识</th>
                        <th>登录名</th>
                        <th>角色</th>
                        <th>描述</th>
                        <th>删除</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>标识</th>
                        <th>登录名</th>
                        <th>角色</th>
                        <th>描述</th>
                        <th>删除</th>
                    </tr>
                    </tfoot>

                    <tbody>
                    <?php foreach ($credentials as $credential) { ?>
                        <tr  align="center">
                            <td><?php echo $credential->id; ?></td>
                            <td><?php echo $credential->login; ?></td>
                            <td><?php echo $credential->name; ?></td>
                            <td><?php echo $credential->description; ?></td>
                            <td><a href="<?php echo URL . 'privilege/deleteCredential/' . $credential->id; ?>" class="myButton">删除</a></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>

            <a href="<?php echo URL; ?>privilege/addCredential" class="myButton">添加新人员</a>

            <div class="panel"></DIV>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#role_data_table').dataTable();
    });
</script>