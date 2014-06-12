
<div id="page-content" style="min-height: 2911px;">
    <div id="wrap">
        <div id="page-heading">

            <ol class="breadcrumb">
                <li>水果7号</li>
                <li>库存管理</li>
                <li class="active">产品目录管理</li>
            </ol>

            <h1>产品目录管理</h1>

        </div>

        <div class="container">

            <div>
                <table id="category_data_table" class="display" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>标识</th>
                        <th>名称</th>
                        <th>删除</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>标识</th>
                        <th>名称</th>
                        <th>删除</th>
                    </tr>
                    </tfoot>

                    <tbody>
                    <?php foreach ($categories as $category) { ?>
                        <tr align="center">
                            <td><?php echo $category->id; ?></td>
                            <td><?php echo $category->name; ?></td>
                            <td>[<a href="<?php echo URL . 'admin/deletecategory/' . $category->id; ?>">X</a>]</td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>

            <div id="shadowing"></div>
            <div id="box" STYLE="margin: 0 auto; border: 1px solid #F00; WIDTH: 50%; ALIGN: CENTER">
            <span id="boxtitle"></span>

                <form id="myform" class="adminform" action="<?php echo URL; ?>admin/addCategory" method="post" target="_parent">
                    产品目录名称*:
                    <input type="text" name="name" id="name" value="" />
                    <input type="hidden" name="submit_add_category">
                    <br><br>
                    <a href="#" class="myButton" onclick="submit()">保存</a>
                    <a href="#" class="myButton" onclick="closebox()">取消</a>
                </form>

            </div>

            <a href="#" onClick="openbox('商品类目管理', 1)">添加新商品类目</a>

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