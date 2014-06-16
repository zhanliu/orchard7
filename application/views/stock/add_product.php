<div id="page-content" style="min-height: 2911px;">
    <div id="wrap">
        <div id="page-heading">
            <ol class="breadcrumb">
                <li><a href="">控制面板</a></li>
                <li>库存管理</li>
                <li class="active">添加商品</li>
            </ol>
        </div>

        <div class="container">
            <div class="panel panel-midnightblue">


            <div class="panel-heading">
                <h4>添加品类</h4>
                <div class="options">
                    <a href="javascript:;"><i class="fa fa-cog"></i></a>
                    <a href="javascript:;"><i class="fa fa-wrench"></i></a>
                    <a href="javascript:;" class="panel-collapse"><i class="fa fa-chevron-down"></i></a>
                </div>
            </div>

            <div class="panel-body collapse in">
            <div class="form-horizontal row-border">
            <form id="myform" action="<?php echo URL; ?>stock/submitAddProduct" method="post" >
                <div class="form-group">
                    <label class="col-sm-3 control-label">商品名称</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="name" id="name" placeholder="必填..." >
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">类目</label>
                    <div class="col-sm-6">
                        <select class="form-control" id="category_id" name="category_id">
                            <?php foreach ($categories as $category) { ?>
                                <?php echo '<option value="'.$category->id.'">'.$category->name.'</option>'; ?>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">价格</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" size=10 name="price" id="price" placeholder="价格只需输入金额..." >
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">单位</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" size=10 name="unit" id="unit" placeholder="个/斤/公斤/份/盒..." >
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">状态</label>
                    <div class="col-sm-6">
                        <select name="is_archived" id="slider" data-role="slider" data-mini="true">
                            <option value="on">激活</option>
                            <option value="off">禁止</option>
                        </select>
                    </div>
                </div>
                <input type="hidden" name="img_url" id="img_url">
                <input type="hidden" name="submit_add_category">

            </form>
                <div class="form-group">
            <form id="upload" method="post" action="<?php echo URL; ?>common/upload" enctype="multipart/form-data">



                    <div id="drop" border="1">
                        拖放图片到这里

                        <a>浏览</a>
                        <input type="file" name="upl" multiple />
                    </div>
                    <ul>
                        <!-- The file uploads will be shown here -->
                    </ul>

            </form></div>
            </div>

            <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <div class="btn-toolbar">
                                <a href="#" class="myButton" onclick="submit()">保存</a>
                                <a href="<?php echo URL; ?>stock/product" class="myButton">返回</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
    function submit() {
        if ($('#name').val()=="") {
            alert('商品名称不能为空');
        } else if ($('#price').val()=="") {
            alert('价格不能为空');
        } else if ($('#unit').val()=="") {
            alert('单位商品名称不能为空');
        } else if ($('#img_url').val()=="") {
            alert('保存商品前请上传商品图片');
        } else {
            document.getElementById("myform").submit();
        }
        return false;
    }
</script>

<script src="/orchard7/public/js/jquery.knob.js"></script>

<!-- jQuery File Upload Dependencies -->
<script src="/orchard7/public/js/jquery.ui.widget.js"></script>
<script src="/orchard7/public/js/jquery.iframe-transport.js"></script>
<script src="/orchard7/public/js/jquery.fileupload.js"></script>

<!-- Our main JS file -->
<script src="/orchard7/public/js/upload-script.js"></script>

<!-- The main CSS file -->
<link href="/orchard7/public/css/dropbox-style.css" rel="stylesheet" />