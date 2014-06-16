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

                    <a href="#" class="btn btn-primary" onclick="addRow('dataTable')">加入商品</a>
                        <a href="#" class="btn btn-danger" onclick="deleteRow('dataTable')">删除商品</a>

                    <div class="col-sm-6">

                        <div class="input-group">
                            <span class="input-group-addon">
                                <INPUT type="checkbox" name="chk"/>
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
                    <div class="col-sm-3 control-label"> <!--  control-label needed for positioning -->
                        <div class="toggle" style="height: 20px; width: 50px;">
                            <div class="toggle-slide active">
                                <div class="toggle-inner" style="width: 80px; margin-left: 0px;">
                                    <div class="toggle-on active" style="height: 20px; width: 40px; text-align: center; text-indent: -10px; line-height: 20px;">激活</div>
                                    <div class="toggle-blob" style="height: 20px; width: 20px; margin-left: -10px;"></div>
                                    <div class="toggle-off" style="height: 20px; width: 40px; margin-left: -10px; text-align: center; text-indent: 10px; line-height: 20px;">下架</div></div></div></div>
                    </div>
                </div>
                <input type="hidden" name="img_url" id="img_url">
                <input type="hidden" name="submit_add_combo">

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

<script type="text/javascript">
    function addRow(tableID) {
        var table = document.getElementById(tableID);
        var rowCount = table.rows.length;
        var row = table.insertRow(rowCount);

        var cell1 = row.insertCell(0);
        var element1 = document.createElement("input");
        element1.type = "checkbox";
        element1.name="chkbox[]";
        cell1.appendChild(element1);

        var cell2 = row.insertCell(1);
        cell2.innerHTML = rowCount + 1;

        var cell3 = row.insertCell(2);
        var element2 = document.createElement("select");
        element2.name = "product_id[]";
        //Create and append the options
        <?php
            foreach ($products as $product) {
                echo 'var option = document.createElement("option");';
                echo 'option.value = "'.$product->id.'";';
                echo 'option.text = "'.$product->name.'";';
                echo 'element2.appendChild(option);';
            }
        ?>
        cell3.appendChild(element2);

        var cell4 = row.insertCell(3);
        var element3 = document.createElement("input");
        element3.type = "text";
        element3.name = "quantity[]";
        cell4.appendChild(element3);
    }

    function deleteRow(tableID) {
        try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;

            for(var i=0; i<rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[0].childNodes[0];
                if(null != chkbox && true == chkbox.checked) {
                    table.deleteRow(i);
                    rowCount--;
                    i--;
                }
            }
        }catch(e) {
            alert(e);
        }
    }
</SCRIPT>