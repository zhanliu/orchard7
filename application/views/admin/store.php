<div data-role="page" id="pageone">

    <div data-role="header">
        <h1>店铺管理</h1>
        <a href="#nav-panel" data-icon="bars" data-iconpos="notext">Menu</a>
        <a href="#add-form" data-icon="plus" data-iconpos="notext">Add</a>
    </div>

    <div data-role="content">
        <h3>店铺数量: <?php echo $amount_of_stores; ?></h3>
        <h3>店铺列表</h3>
        <ul>
            <?php foreach ($stores as $store) { ?>
                <li>
                    <div><?php echo $store->name; ?> [<a href="<?php echo URL . 'admin/deletestore/' . $store->id; ?>">X</a>]</div>
                    <div><?php echo $store->district; ?><?php echo $store->address; ?></div>
                </li>
            <?php } ?>
        </ul>
    </div>

    <style>

        .storeform { padding:.8em 1.2em; }
        .storeform h2 { color:#555; margin:0.3em 0 .8em 0; padding-bottom:.5em; border-bottom:1px solid rgba(0,0,0,.1); }
        .storeform label { display:block; margin-top:1.2em; }
        .switch .ui-slider-switch { width: 8.5em !important }
        .ui-grid-a { margin-top:1em; padding-top:.8em; margin-top:1.4em; border-top:1px solid rgba(0,0,0,.1); }
    </style>

    <div data-role="panel" data-position="right" data-position-fixed="false" data-display="overlay" id="add-form" data-theme="b" class="add-form">

        <form class="storeform" action="<?php echo URL; ?>admin/addstore" method="post">
            <h2>创建新店铺</h2>
            <label for="name">店铺名称*</label>
            <input type="text" name="name" id="name" value="" data-clear-btn="true" data-mini="true">

            <label for="district">地区*</label>
            <select name="district" id="district">
                <option value="海珠区" selected="selected">海珠区</option>
                <option value="荔湾区">荔湾区</option>
                <option value="白云区">白云区</option>
                <option value="天河区">天河区</option>
                <option value="越秀区">越秀区</option>
                <option value="黄埔区">黄埔区</option>
            </select>

            <label for="password">地址*</label>
            <input type="text" name="address" id="address" value="" data-clear-btn="true" autocomplete="off" data-mini="true">

            <label for="phone_number">联系电话</label>
            <input type="text" name="phone_number" id="phone_number" value="" data-clear-btn="true" data-mini="true">

            <div class="switch">
                <label for="status">当前状态</label>
                <select name="status" id="slider" data-role="slider" data-mini="true">
                    <option value="on">激活</option>
                    <option value="off">禁止</option>
                </select>
            </div>

            <div class="ui-grid-a">
                <div class="ui-block-a"><a href="#" data-rel="close" data-role="button" data-theme="c" data-mini="true">放弃</a></div>
                <div class="ui-block-b"><input type="submit" name="submit_add_store" value="Save" /></div>
                <!--<div class="ui-block-b"><a href="#" data-rel="close" data-role="button" data-theme="b" data-mini="true">保存</a></div>-->
            </div>
        </form>

        <!-- panel content goes here -->
    </div><!-- /panel -->