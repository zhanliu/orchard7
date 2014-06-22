<div id="page-content" style="min-height: 2911px;">
    <div id="wrap">
        <div id="page-heading">
            <ol class="breadcrumb">
                <li><a href="">控制面板</a></li>
                <li>库存管理</li>
                <li class="active">添加套餐</li>
            </ol>
        </div>

        <div class="container">
            <div class="panel panel-midnightblue">


            <div class="panel-heading">
                <h4>添加套餐</h4>
                <div class="options">
                    <a href="javascript:;"><i class="fa fa-cog"></i></a>
                    <a href="javascript:;"><i class="fa fa-wrench"></i></a>
                    <a href="javascript:;" class="panel-collapse"><i class="fa fa-chevron-down"></i></a>
                </div>
            </div>

            <div class="panel-body collapse in">
            <div class="form-horizontal row-border">
            <form id="myform" action="<?php echo URL; ?>stock/submitAddCombo" method="post" >
                <div class="form-group">
                    <label class="col-sm-3 control-label">套餐名称</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="name" id="name" placeholder="必填..." >
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">选择商品</label>

                    <a href="#" class="btn btn-primary" onclick="addRow('product_add_div')">加入商品</a>
                    <a href="#" class="btn btn-danger" onclick="deleteRow()">删除商品</a>

                    <div class="col-sm-6" id="product_add_div">
                        <div class="input-group combo-product-item">
                            <span class="input-group-addon">
                                <INPUT type="checkbox" name="chk" class="combo-product-item-checkbox" />
                            </span>

                            <span>
                            <input type="text" name="quantity[]" class="form-addon-control" >
                            </span>

                            <span>
                                <select name="product_id[]" id="mapping" class="form-addon-control" >
                                    <?php
                                    foreach ($products as $product) {
                                        echo '<option value="'.$product->id.'">'.$product->name.'</option>';
                                    }
                                    ?>
                                </select>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">价格</label>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <span class="input-group-addon">$</span>
                            <input type="text" class="form-control" size=10 name="price" id="price" placeholder="输入金额..." >
                            <span class="input-group-addon">.00</span>
                        </div>
                    </div>
                </div>



                <div class="form-group">
                    <label class="col-sm-3 control-label">状态</label>
                    <div class="col-sm-6">
                        <div class="toggle-slide active">
                            <div class="toggle-inner" style="width: 80px; margin-left: 0px;">
                                <div class="toggle-on active" style="height: 20px; width: 40px; text-align: center; text-indent: -10px; line-height: 20px;">ON</div>
                                <div class="toggle-blob" style="height: 20px; width: 20px; margin-left: -10px;"></div>
                                <div class="toggle-off" style="height: 20px; width: 40px; margin-left: -10px; text-align: center; text-indent: 10px; line-height: 20px;">OFF</div>
                            </div>
                        </div>

                    </div>
                </div>
                <input type="hidden" name="description" value="">
                <input type="hidden" name="tag" value="">
                <input type="hidden" name="is_active" id="is_active" value="">
                <input type="hidden" name="img_url" id="img_url">
                <input type="hidden" name="submit_add_combo">
                <input type="hidden" name="upload_img_name_prefix" value="<?php echo $upload_prefix; ?>">

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
</div>

<script src="/orchard7/public/js/jquery.knob.js"></script>

<!-- jQuery File Upload Dependencies -->
<script src="/orchard7/public/js/jquery.ui.widget.js"></script>
<script src="/orchard7/public/js/jquery.iframe-transport.js"></script>
<script src="/orchard7/public/js/jquery.fileupload.js"></script>

<!-- Our main JS file -->
<script src="/orchard7/public/js/upload-script.js"></script>

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

    function addRow(tableID) {
        var productTable = $("#product_add_div");
        var appendStr = "";

        appendStr += '<div class="input-group combo-product-item">';
        appendStr += '<span class="input-group-addon">';
        appendStr += '<INPUT type="checkbox" name="chk"/>';
        appendStr += '</span>';

        appendStr += '<span>';
        appendStr += '<input type="text" name="quantity[]" class="form-addon-control" >';
        appendStr += '</span>';

        appendStr += '<span> \r\n';
        appendStr += '<select name="product_id[]" id="mapping" class="form-addon-control" >';

        <?php
        foreach ($products as $product) {
            echo 'appendStr += \'<option value="'.$product->id.'">'.$product->name.'</option>\';';
        }
        ?>

        appendStr += '</select>';
        appendStr += '</span>';
        appendStr += '</div>';

        productTable.append(appendStr);
    }

    function deleteRow() {
        $("input[name='chk']:checked").parent().parent().html("");
    }
</SCRIPT>