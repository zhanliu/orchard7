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
                        <th>描述</th>
                        <th>标签</th>
                        <th>活跃</th>
                        <th>创建时间</th>
                        <th>修改时间</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>标识</th>
                        <th>名称</th>
                        <th>类别</th>
                        <th>单位</th>
                        <th>价格</th>
                        <th>描述</th>
                        <th>标签</th>
                        <th>活跃</th>
                        <th>创建时间</th>
                        <th>修改时间</th>
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
                            <td><?php echo $product->description; ?></td>
                            <td><?php echo $product->tag; ?></td>
                            <td>[<a href="<?php echo URL . 'admin/deleteproduct/' . $product->id; ?>">X</a>]</td>
                            <td><?php echo $product->created_time; ?></td>
                            <td><?php echo $product->updated_time; ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>

                <div class="add_object_button_div">
                    <button class="product_add_button">添加</button>
                </div>
            </div>

            <div class="panel">
                <form class="productform" action="<?php echo URL; ?>admin/addproduct" method="post">
                    <h2>创建新商品</h2>
                    <label for="name">商品名称*</label>
                    <input type="text" name="name" id="name" value="" data-clear-btn="true" data-mini="true">

                    <label for="category">类目*</label>
                    <select name="category" id="category">
                        <?php foreach ($categories as $category) { ?>
                            <?php echo '<option value="'.$category->id.'">'.$category->name.'</option>'; ?>
                        <?php } ?>
                    </select>

                    <label for="price">价格*</label>
                    <input type="text" name="price" id="price" value="" data-clear-btn="true" autocomplete="off" data-mini="true">

                    <label for="unit">单位</label>
                    <input type="text" name="unit" id="unit" value="" data-clear-btn="true" data-mini="true">

                    <div class="switch">
                        <label for="is_archived">当前状态</label>
                        <select name="is_archived" id="slider" data-role="slider" data-mini="true">
                            <option value="on">激活</option>
                            <option value="off">禁止</option>
                        </select>
                    </div>


                    <p><button>放弃</button></p>
                    <input type="submit" name="submit_add_category" value="保存" />

                </form>

                <!-- panel content goes here -->
            </div><!-- /panel -->
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
        $(".product_add_button").click(function(){
            $(".panel").toggle("fast");
            $(this).toggleClass("active");
            return false;
        });

        $('#product_data_table').dataTable();
    });
</script>