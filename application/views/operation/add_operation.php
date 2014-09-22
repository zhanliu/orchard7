<div id="page-content" style="min-height: 2911px;">
    <div id="wrap">
        <div id="page-heading">
            <ol class="breadcrumb">
                <li><a href="">控制面板</a></li>
                <li>运营管理</li>
                <li class="active">添加运营文案</li>
            </ol>
        </div>

        <div class="container">
            <div class="panel panel-midnightblue">


                <div class="panel-heading">
                    <h4>添加运营文案</h4>
                    <div class="options">
                        <a href="javascript:;"><i class="fa fa-cog"></i></a>
                        <a href="javascript:;"><i class="fa fa-wrench"></i></a>
                        <a href="javascript:;" class="panel-collapse"><i class="fa fa-chevron-down"></i></a>
                    </div>
                </div>

                <div class="panel-body collapse in">
                    <form id="myform" action="<?php echo URL; ?>operation/submitAddOperation" method="post" class="form-horizontal row-border">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">文案名称</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="name" id="name" placeholder="必填" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">文案内容</label>
                            <div class="col-sm-6">
                                <input type="textarea" class="form-control" name="content" id="content" placeholder="必填" >
                            </div>
                        </div>

                        <input type="hidden" name="submit_add_category">
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-sm-6 col-sm-offset-3">
                                    <div class="btn-toolbar">
                                        <a href="#" class="myButton" onclick="submit()">保存</a>
                                        <a href="<?php echo URL; ?>stock/category" class="myButton">返回</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script type="text/javascript">
        function submit() {
            if ($('#name').val()=="") {
                alert('名称不能为空');
            } else if ($('#content').val()=="") {
                alert('内容不能为空');
            } else {
                document.getElementById("myform").submit();
            }
            return false;
        }
    </script>