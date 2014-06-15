
<div id="page-content" style="min-height: 2911px;">
    <div id="wrap">
        <div id="page-heading">

            <ol class="breadcrumb">
                <li>水果7号</li>
                <li>权限管理</li>
                <li class="active">角色管理</li>
            </ol>

            <h1>角色管理</h1>

        </div>

        <div class="container">

            <div>
                <table id="category_data_table" class="display" cellspacing="0" width="100%">
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
                            <td>[<a href="<?php echo URL . 'privilege/deleteRole/' . $role->id; ?>">X</a>]</td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>

            <div id="shadowing"></div>
            <div id="box" class="box" STYLE="margin: 0 auto; border: 1px solid #F00; WIDTH: 50%; ALIGN: CENTER">
            <span id="boxtitle"></span>

                <form id="myform" class="myform" action="<?php echo URL; ?>admin/addRole" method="post" target="_parent">
                    <input type="text" name="name" id="name" value="role name..." />
                    <input type="text" name="description" id="description" value="role description..." />
                    <input type="hidden" name="submit_add_role">
                    <br><br>
                    <a href="#" class="myButton" onclick="submit()">保存</a>
                    <a href="#" class="myButton" onclick="closebox('box')">取消</a>
                </form>

            </div>

            <a href="#" onClick="openbox('box', '角色管理', 1)">添加新角色</a>

            <div class="panel"></DIV>
        </div>
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