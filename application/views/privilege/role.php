<div id="page-content" style="min-height: 2911px;">
    <div id="wrap">
        <div id="page-heading">

            <ol class="breadcrumb">
                <li>控制面板</li>
                <li>权限管理</li>
                <li class="active">角色管理</li>
            </ol>

            <h1>角色管理</h1>

        </div>

        <div class="container">

            <div>
                <table id="role_data_table" class="display" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>标识</th>
                        <th>名称</th>
                        <th>描述</th>
                        <th>删除</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>标识</th>
                        <th>名称</th>
                        <th>描述</th>
                        <th>删除</th>
                    </tr>
                    </tfoot>

                    <tbody>
                    <?php foreach ($roles as $role) { ?>
                        <tr align="center">
                            <td><?php echo $role->id; ?></td>
                            <td><?php echo $role->name; ?></td>
                            <td><?php echo $role->description; ?></td>
                            <td><a href="<?php echo URL . 'privilege/deleteRole/' . $role->id; ?>" class="myButton">删除</a></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>

            <a href="<?php echo URL; ?>privilege/addRole" class="myButton">添加新角色</a>

            <div class="panel"></DIV>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#role_data_table').dataTable();
    });
</script>