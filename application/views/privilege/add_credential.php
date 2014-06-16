<div id="page-content" style="min-height: 2911px;">
    <div id="wrap">
        <div id="page-heading">
            <ol class="breadcrumb">
                <li><a href="">控制面板</a></li>
                <li>权限管理</li>
                <li class="active">添加人员</li>
            </ol>
        </div>

        <div class="container">
            <div class="panel panel-midnightblue">


            <div class="panel-heading">
                <h4>添加角色</h4>
                <div class="options">
                    <a href="javascript:;"><i class="fa fa-cog"></i></a>
                    <a href="javascript:;"><i class="fa fa-wrench"></i></a>
                    <a href="javascript:;" class="panel-collapse"><i class="fa fa-chevron-down"></i></a>
                </div>
            </div>

            <div class="panel-body collapse in">
            <form id="myform" action="<?php echo URL; ?>privilege/submitAddCredential" method="post" class="form-horizontal row-border">
                <div class="form-group">
                    <label class="col-sm-3 control-label">登录名</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="login" id="login" placeholder="必填..." >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">密码</label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control" name="password" id="password" placeholder="必填...">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">分配角色</label>
                    <div class="col-sm-6">
                        <select class="form-control" id="role_id" name="role_id">
                            <?php foreach ($roles as $role) { ?>
                                <?php echo '<option value="'.$role->id.'">'.$role->name.'</option>'; ?>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">描述</label>
                    <div class="col-sm-6">
                        <textarea class="form-control" name="description" id="description"></textarea>
                    </div>
                </div>

                <input type="hidden" name="submit_add_credential">
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <div class="btn-toolbar">
                                <a href="#" class="myButton" onclick="submit()">保存</a>
                                <a href="<?php echo URL; ?>privilege/credential" class="myButton">返回</a>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
            </div>

            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function submit() {
        if ($('#login').val()=="") {
            alert('登录名不能为空');
        ｝else if ($('#password').val()=="") {
            alert('密码不能为空');
        } else if ($('#role_id').val()=="") {
            alert('必须为用户分配角色');
        } else {
            document.getElementById("myform").submit();
        }
        return false;
    }
</script>
