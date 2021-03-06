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
                        <th>原价</th>
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
                        <th>原价</th>
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
                            <td><?php echo $product->original_price; ?></td>
                            <td><a href="<?php echo URL . 'stock/deleteProduct/' . $product->id; ?>" class="myButton">删除</a></td>
                            <td><a data-toggle="modal" href="#myModal" class="btn btn-primary" onclick="show_product_detail('<?php echo $product->id; ?>')">查看</a>

                            </td>
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

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">商品详情</h4>
            </div>
            <div class="modal-body" id="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>


<script type="text/javascript">
    $(document).ready(function(){
        $('#product_data_table').dataTable();
    });

    function show_product_detail(product_id) {
        $.ajax({
             url: '<?php echo URL; ?>stock/getProductDetailById/' + product_id,
             data: "",
             dataType: 'json',
             success: function(data) {
                var name = data['name'];
                var description = data['description'];
                var price = data['price'];
                var original_price = data['original_price'];
                var unit = data['unit'];
                var img_url = data['img_url'];
<?php if (ONLINE == 'FALSE') {echo "var content = '<p><img src=\"" . URL. "public/uploads/' + img_url + '\" width=\"240\" height=\"180\"></p>';";} else { echo "var content = '<p><img src=\"http://orchard7-product.stor.sinaapp.com/' + img_url + '\" width=\"240\" height=\"180\"></p>';";} ?>
		content+= '<p>商品名称: ' + name + '</p>';
                content+= '<p>定价: ' + price + '/' + unit + '</p>';
                if (original_price != null) {
                    content+= '<p>原价: ' + original_price + '/' + unit + '</p>';
                }
                content+= '<p>商品描述: ' + description + '</p>';
                $('#modal-body').html(content);
             }

        })
    }
</script>

