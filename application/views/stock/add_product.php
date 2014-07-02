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
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="name" id="name" placeholder="必填..." >
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">类目</label>
                    <div class="col-sm-3">
                        <select class="form-control" id="category_id" name="category_id">
                            <option value="">选择商品目录</option>
                            <?php foreach ($categories as $category) { ?>
                                <?php echo '<option value="'.$category->id.'">'.$category->name.'</option>'; ?>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">价格</label>
                    <div class="col-sm-2">
                        <div class="input-group">
                            <span class="input-group-addon">$</span>
                            <input type="text" class="form-control" size=10 name="price" id="price" placeholder="输入金额..." >
                            <span class="input-group-addon">.00</span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">原价格</label>
                    <div class="col-sm-2">
                        <div class="input-group">
                            <span class="input-group-addon">$</span>
                            <input type="text" class="form-control" size=10 name="original_price" id="original_price" placeholder="输入金额..." >
                            <span class="input-group-addon">.00</span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">单位</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" size=10 name="unit" id="unit" placeholder="个/斤/公斤/份/盒..." >
                    </div>
                </div>

                <div class="form-group" style="height:50px">
                    <label class="col-sm-3 control-label" for="myToggleButton">激活</label>
                    <div class="col-sm-6">
                        <input id="cmn-toggle-1" name="is_active" class="cmn-toggle cmn-toggle-round" type="checkbox" checked>
                        <label for="cmn-toggle-1"></label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">商品描述</label>
                    <div class="col-sm-6">
                        <textarea class="form-control" name="description" id="description"></textarea>
                    </div>
                </div>

                <input type="hidden" name="img_url" id="img_url">
                <input type="hidden" name="upload_img_name_prefix" value="<?php echo $upload_prefix; ?>">
                <input type="hidden" name="submit_add_product">

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
                    <input type="hidden" name="upload_inner_img_name_prefix" value="<?php echo $upload_prefix; ?>">
            </form>
            </div>

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

<script type="text/javascript">
    function submit() {
        if ($('#name').val()=="") {
            alert('商品名称不能为空');
        } else if ($('#price').val()=="") {
            alert('价格不能为空');
        } else if ($('#unit').val()=="") {
            alert('单位名称不能为空');
        } else if ($('#img_url').val()=="") {
            alert('保存商品前请上传商品图片');
        } else {
            document.getElementById("myform").submit();
        }
        return false;
    }
</script>

<script src="<?php echo URL; ?>public/js/jquery.knob.js"></script>

<!-- jQuery File Upload Dependencies -->
<script src="<?php echo URL; ?>public/js/jquery.ui.widget.js"></script>
<script src="<?php echo URL; ?>public/js/jquery.iframe-transport.js"></script>
<script src="<?php echo URL; ?>public/js/jquery.fileupload.js"></script>

<!-- Our main JS file -->
<script src="<?php echo URL; ?>public/js/upload-script.js"></script>

