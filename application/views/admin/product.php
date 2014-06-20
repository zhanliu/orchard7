<div id="page-content" style="min-height: 2911px;">
    <div id="wrap">
        <div id="page-heading">

            <ol class="breadcrumb">
                <li>水果7号</li>
                <li>库存管理</li>
                <li class="active">商品管理</li>
            </ol>

            <h1>商品管理</h1>

        </div>

        <div class="container">
            <div>
                <table id="product_data_table" class="display" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>标识</th>
                        <th>名称</th>
                        <th>类别</th>
                        <th>单位</th>
                        <th>价格</th>
                        <th>标签</th>
                        <th>删除</th>
                        <th>查看</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>标识</th>
                        <th>名称</th>
                        <th>类别</th>
                        <th>单位</th>
                        <th>价格</th>
                        <th>标签</th>
                        <th>删除</th>
                        <th>查看</th>
                    </tr>
                    </tfoot>

                    <tbody>
                    <?php foreach ($products as $product) { ?>
                        <tr align="center">
                            <td><?php echo $product->id; ?></td>
                            <td><?php echo $product->name; ?></td>
                            <td><?php echo $product->category_id; ?></td>
                            <td><?php echo $product->unit; ?></td>
                            <td><?php echo $product->price; ?></td>
                            <td><?php echo $product->tag; ?></td>
                            <td><a href="<?php echo URL . 'admin/deleteproduct/' . $product->id; ?>" class="myButton">删除</a></td>
                            <td><a data-toggle="modal" href="#myModal" class="btn btn-primary btn-lg">查看</a>
                                <!--<a href="<?php echo URL . 'admin/productDetail/' . $product->id; ?>" class="myButton" target="_blank">查看</a>-->
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>

            </div>

            <div id="shadowing"></div>
            <div id="box" class="box" STYLE="margin: 0 auto; border: 2px solid #F00; WIDTH: 50%; ALIGN: CENTER">
                <span id="boxtitle"></span>
                <table><tr><td >
                <form id="myform" class="productform" action="<?php echo URL; ?>admin/addproduct" method="post" target="_parent">

                    <input type="text" name="name" id="name" value="" placeholder="商品名称..." data-clear-btn="true" data-mini="true">*
                    <br><BR>
                    类目*:
                    <select name="category_id" id="category">
                        <?php foreach ($categories as $category) { ?>
                            <?php echo '<option value="'.$category->id.'">'.$category->name.'</option>'; ?>
                        <?php } ?>
                    </select>

                    <BR><BR>
                    <input type="text" name="price" size="10" id="price" value="" placeholder="价格...">(元)*
                    <BR><BR>
                    单位:<input type="text" name="unit" id="unit" value="" placeholder="个/斤/公斤/份/盒...">*
                    <BR><BR>
                    <div class="switch">
                        当前状态:
                        <select name="is_active" id="slider" data-role="slider" data-mini="true">
                            <option value="on">激活</option>
                            <option value="off">禁止</option>
                        </select>
                    </div>
                    <input type="hidden" name="img_url" id="img_url">
                    <input type="hidden" name="submit_add_product">

                </form>
                </td>

                <!-- Upload area -->
                <td>
                    上传商品图片:<br>
                    <form id="upload" method="post" action="<?php echo URL; ?>admin/upload" enctype="multipart/form-data">
                        <div id="drop" border="1">
                            拖放图片到这里

                            <a>浏览</a>
                            <input type="file" name="upl" multiple />
                        </div>

                        <ul>
                            <!-- The file uploads will be shown here -->
                        </ul>

                    </form>
                </td>

                </table>

                <a href="#" class="myButton" onclick="submit()">保存</a>
                <a href="#" class="myButton" onclick="closebox('box')">取消</a>
            </div>


            <a href="#" onClick="openbox('box', '添加新商品', 1)">添加新商品</a>
            <div class="panel"></DIV>
                <!-- panel content goes here -->
<!--            </div><!-- /panel -->
        </div>
    </div>
</div>
<style>
    .productform { padding:.8em 1.2em; }
    .productform h2 { color:#555; margin:0.3em 0 .8em 0; padding-bottom:.5em; border-bottom:1px solid rgba(0,0,0,.1); }
    .productform label { display:block; margin-top:1.2em; }
    .switch .ui-slider-switch { width: 8.5em !important }
</style>

<script type="text/javascript">
    $(document).ready(function(){
        $('#product_data_table').dataTable();
    });


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

    function openDetailBox(pid) {
        var product_id = pid;
        $.post('<?php echo URL; ?>admin/productDetail', {variable: product_id});
        window.open('<?php echo URL; ?>admin/productDetail');
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