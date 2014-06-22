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
                            <td><a href="<?php echo URL . 'stock/deleteCategory/' . $category->id; ?>" class="myButton">删除</a></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>

            <a href="<?php echo URL; ?>stock/addCategory" class="myButton">添加新类目</a>

            <div class="panel"></div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#category_data_table').dataTable();
    });
</script>