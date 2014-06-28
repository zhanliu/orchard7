<div id="page-content" style="min-height: 2911px;">
    <div id="wrap">
        <div id="page-heading">

            <ol class="breadcrumb">
                <li>水果7号</li>
                <li>资产中心</li>
                <li class="active">店铺管理</li>
            </ol>

            <h1>店铺管理</h1>

        </div>

        <div class="container">
            <div>
                <table id="store_data_table" class="display" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>标识</th>
                        <th>名称</th>
                        <th>删除</th>
                        <th>查看</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>标识</th>
                        <th>名称</th>
                        <th>删除</th>
                        <th>查看</th>
                    </tr>
                    </tfoot>

                    <tbody>
                    <?php foreach ($stores as $store) { ?>
                        <tr align="center">
                            <td><?php echo $store->id; ?></td>
                            <td><?php echo $store->name; ?></td>
                            <td><a href="<?php echo URL . 'asset/deleteStore/' . $store->id; ?>" class="myButton">删除</a></td>
                            <td><a data-toggle="modal" href="#myModal" class="btn btn-primary" onclick="show_store_detail('<?php echo $store->id; ?>')">查看</a>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>

            </div>

                <!-- panel content goes here -->
            <a href="<?php echo URL; ?>asset/addStore" class="myButton">添加新店铺</a>
            <div class="panel">
            </div><!-- /panel -->
         </div>
    </div>
</div>


<style>
    .storeform { padding:.8em 1.2em; }
    .storeform h2 { color:#555; margin:0.3em 0 .8em 0; padding-bottom:.5em; border-bottom:1px solid rgba(0,0,0,.1); }
    .storeform label { display:block; margin-top:1.2em; }
    .switch .ui-slider-switch { width: 8.5em !important }
</style>

<script type="text/javascript">
    $(document).ready(function(){
        $('#store_data_table').dataTable();
    });

    function show_store_detail(store_id) {

    }
</script>