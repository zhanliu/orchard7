<div id="page-content" style="min-height: 2911px;">
    <div id="wrap">
        <div id="page-heading">

            <ol class="breadcrumb">
                <li><a href="">控制面板</a></li>
                <li>权限管理</li>
                <li>角色管理</li>
                <li class="active">添加角色</li>
            </ol>

            <h1>添加角色</h1>

        </div>

        <div class="container">

            <form id="myform" class="myform" action="<?php echo URL; ?>privilege/submitAddRole" method="post" target="_parent">
                <input type="text" name="name" id="name" placeholder="角色名称..." /><br><br>
                <input type="text" name="description" id="description" placeholder="角色描述..." />
                <input type="hidden" name="submit_add_role">
                <br><br>
                <a href="#" class="myButton" onclick="submit()">保存</a>
                <a href="<?php echo URL; ?>privilege/role" class="myButton">返回</a>
            </form>

        </div>
    </div>
</div>
