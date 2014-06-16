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
                        <tr>
                            <td><?php echo $product->id; ?></td>
                            <td><?php echo $product->name; ?></td>
                            <td><?php echo $product->category_id; ?></td>
                            <td><?php echo $product->unit; ?></td>
                            <td><?php echo $product->price; ?></td>
                            <td><?php echo $product->tag; ?></td>
                            <td><a href="<?php echo URL . 'stock/deleteProduct/' . $product->id; ?>" class="myButton">删除</a></td>
                            <td><a href="<?php echo URL . 'stock/productDetail/' . $product->id; ?>" class="myButton" target="_blank">查看</a></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>

            </div>

            <a href="<?php echo URL; ?>stock/addProduct" class="myButton">添加新商品</a>
            <div class="panel"></DIV>

        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function(){
        $('#product_data_table').dataTable();
    });

</script>

