<div id="page-content" style="min-height: 2911px;">
    <div id="wrap">
        <div id="page-heading">

            <ol class="breadcrumb">
                <li>水果7号</li>
                <li>库存管理</li>
                <li class="active">套餐管理</li>
            </ol>

            <h1>套餐管理</h1>

        </div>

        <div class="container">

            <div>
                <table id="combo_data_table" class="display" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>名称</th>
                        <th>价格</th>
                        <th>删除</th>
                        <th>查看</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>名称</th>
                        <th>价格</th>
                        <th>删除</th>
                        <th>查看</th>
                    </tr>
                    </tfoot>

                    <tbody>
                    <?php foreach ($combos as $combo) { ?>

                        <tr align="center">
                            <td><?php echo $combo->name; ?></td>
                            <td><?php echo $combo->price; ?></td>
                            <td><a href="<?php echo URL . 'stock/deleteCombo/' . $combo->id; ?>" class="myButton">删除</a></td>
                            <td><a data-toggle="modal" href="#myModal" class="btn btn-primary" onclick="show_combo_detail('<?php echo $combo->id; ?>')">查看</a>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>

            </div>

            <a href="<?php echo URL; ?>stock/addCombo" class="myButton">添加新套餐</a>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">套餐详情</h4>
            </div>
            <div class="modal-body">
                <div id="modal-body"></div>
                <div id="modal-detail"></div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
<!--            <a href="--><?php //echo URL; ?><!--stock/addCombo" class="myButton">添加新套餐</a>-->
<!--        </div>-->
<!--    </div>-->

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
        $('#combo_data_table').dataTable();
    });

    function show_combo_detail(combo_id) {
        $.ajax({
            url: '<?php echo URL; ?>stock/getComboDetailById/' + combo_id,
            data: "",
            dataType: 'json',
            success: function(data) {

                var name = data['name'];
                var description = data['description'];
                var price = data['price'];
                //var img_url = data['img_url'];
                //var content = '<p><img src="/orchard7/public/upload/' + img_url + '" width="240" height="180"></p>';
                var content = '<p>套餐名称: ' + name + '</p>';
                content+= '<p>定价: ' + price + '</p>';
                content+= '<p>套餐描述: ' + description + '</p>';
                $('#modal-body').html(content);

            }

        })

        $.ajax({
            url: '<?php echo URL; ?>stock/getProductsByComboId/' + combo_id,
            data: "",
            dataType: 'json',
            success: function(data) {
                var content = '';
                for (var i in data) {
                    var name = data[i]['name'];
                    var img_url = data[i]['img_url'];
                    var price = data[i]['price'];
                    var unit = data[i]['unit'];
                    var description = data[i]['description'];
                    content+= '<hr>';
                    content+= '<p><img src="/orchard7/public/uploads/' + img_url + '" width="240" height="180"></p>';
                    content+= '<p>商品名称: ' + name + '</p>';
                    content+= '<p>定价: ' + price + '/' + unit + '</p>';
                    content+= '<p>商品描述: ' + description + '</p>';
                }
                $('#modal-detail').html(content);
            }
        })
    }
</script>