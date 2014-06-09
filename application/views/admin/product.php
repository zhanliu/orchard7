<div class="ui-layout-center">

    <p class="f1">商品管理</p><hr/>

    <div data-role="content">
        <h3>商品数量: <?php echo $amount_of_products; ?></h3>
        <h3>商品列表</h3>
        <ul>
            <?php foreach ($products as $product) { ?>
                <li>
                    <div><?php echo $product->name; ?> <?php echo $product->price; ?>元/<?php echo $product->unit; ?>
                        [<a href="<?php echo URL . 'admin/deleteproduct/' . $product->id; ?>">X</a>]</div>
                </li>
            <?php } ?>
        </ul>
        <div id="pane4-closed">
<!--            <button onclick="outerLayout.show('east',true)">添加</button>-->
            <button class="product_add_button">添加</button>
        </div>
    </div>

    <style>
        .productform { padding:.8em 1.2em; }
        .productform h2 { color:#555; margin:0.3em 0 .8em 0; padding-bottom:.5em; border-bottom:1px solid rgba(0,0,0,.1); }
        .productform label { display:block; margin-top:1.2em; }
        .switch .ui-slider-switch { width: 8.5em !important }
        .ui-grid-a { margin-top:1em; padding-top:.8em; margin-top:1.4em; border-top:1px solid rgba(0,0,0,.1); }
        div#pane4-closed {
            background:#333333 url(images/plus.png) 85% 55% no-repeat;
        }
        .panel{
            position:absolute;
            top:10%;
            right:0;
            display:none;
            background:#00CB6D;
            border:1px solid #111111;
            -moz-border-radius-topleft:20px;
            -webkit-border-top-left-radius:20px;
            -moz-border-radius-bottomleft:20px;
            -webkit-border-bottom-left-radius:20px;
            width:auto;
            height:auto;
            padding:30px 30px 30px 30px;
            filter:alpha(opacity=85);opacity:.85;}
        .panel p{
            margin:0 0 15px 0;
            padding:0;
            color:#cccccc;}
        .panel a,.panel a:visited{
            margin:0;
            padding:0;
            color:#9FC54E;
            text-decoration:none;
            border-bottom:1px solid #9FC54E;}
        .panel a:hover,.panel a:visited:hover{
            margin:0;padding:0;
            color:#ffffff;
            text-decoration:none;
            border-bottom:1px solid #ffffff;}
    </style>

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


            <p><button onclick="outerLayout.hide('east')">放弃</button></p>
            <input type="submit" name="submit_add_category" value="保存" />

        </form>

        <!-- panel content goes here -->
    </div><!-- /panel -->
</div>

<!--<div id="add-form" class="ui-layout-east">-->


<script type="text/javascript">
    $(document).ready(function(){
        $(".product_add_button").click(function(){
            $(".panel").toggle("fast");
            $(this).toggleClass("active");
            return false;
        });
    });
</script>