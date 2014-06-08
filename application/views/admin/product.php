<div data-role="page" id="pageone">

    <div data-role="header">
        <h1>商品管理</h1>
        <a href="#nav-panel" data-icon="bars" data-iconpos="notext">Menu</a>
        <a href="#add-form" data-icon="plus" data-iconpos="notext">Add</a>
    </div>

    <div data-role="content">
        <h3>商品数量: <?php echo $amount_of_products; ?></h3>
        <h3>商品列表</h3>
        <ul>
            <?php foreach ($products as $product) { ?>
                <li>
                    <div><?php echo $product->name; ?> [<a href="<?php echo URL . 'admin/deleteproduct/' . $product->id; ?>">X</a>]</div>
                    <div><?php echo $product->price; ?><?php echo $product->price; ?></div>
                    <div><?php echo $product->unit; ?><?php echo $product->unit; ?></div>
                </li>
            <?php } ?>
        </ul>
    </div>

    <style>

        .productform { padding:.8em 1.2em; }
        .productform h2 { color:#555; margin:0.3em 0 .8em 0; padding-bottom:.5em; border-bottom:1px solid rgba(0,0,0,.1); }
        .productform label { display:block; margin-top:1.2em; }
        .switch .ui-slider-switch { width: 8.5em !important }
        .ui-grid-a { margin-top:1em; padding-top:.8em; margin-top:1.4em; border-top:1px solid rgba(0,0,0,.1); }
    </style>

    <div data-role="panel" data-position="right" data-position-fixed="false" data-display="overlay" id="add-form" data-theme="b" class="add-form">

        <form class="productform" action="<?php echo URL; ?>admin/addproduct" method="post">
            <h2>创建新商品</h2>
            <label for="name">商品名称*</label>
            <input type="text" name="name" id="name" value="" data-clear-btn="true" data-mini="true">

            <label for="category">类目*</label>
            <select name="category" id="category">
                <option value="海珠区" selected="selected">海珠区</option>
                <option value="荔湾区">荔湾区</option>
                <option value="白云区">白云区</option>
                <option value="天河区">天河区</option>
                <option value="越秀区">越秀区</option>
                <option value="黄埔区">黄埔区</option>
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

            <div class="ui-grid-a">
                <div class="ui-block-a"><a href="#" data-rel="close" data-role="button" data-theme="c" data-mini="true">放弃</a></div>
                <div class="ui-block-b"><input type="submit" name="submit_add_product" value="Save" /></div>
                <!--<div class="ui-block-b"><a href="#" data-rel="close" data-role="button" data-theme="b" data-mini="true">保存</a></div>-->
            </div>
        </form>

        <!-- panel content goes here -->
    </div><!-- /panel -->