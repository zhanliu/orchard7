<div data-role="page" id="pageone">

    <div data-role="header">
        <h1>产品目录管理</h1>
        <a href="#nav-panel" data-icon="bars" data-iconpos="notext">Menu</a>
        <a href="#add-form" data-icon="plus" data-iconpos="notext">Add</a>
    </div>

    <div data-role="content">
        <h3>产品目录数量: <?php echo $amount_of_categories; ?></h3>
        <h3>产品目录列表</h3>
        <ul>
            <?php foreach ($categories as $category) { ?>
                <li>
                    <div><?php echo $category->name; ?> [<a href="<?php echo URL . 'admin/deletecategory/' . $category->id; ?>">X</a>]</div>
                </li>
            <?php } ?>
        </ul>
    </div>

    <style>

        .adminform { padding:.8em 1.2em; }
        .adminform h2 { color:#555; margin:0.3em 0 .8em 0; padding-bottom:.5em; border-bottom:1px solid rgba(0,0,0,.1); }
        .adminform label { display:block; margin-top:1.2em; }
        .switch .ui-slider-switch { width: 8.5em !important }
        .ui-grid-a { margin-top:1em; padding-top:.8em; margin-top:1.4em; border-top:1px solid rgba(0,0,0,.1); }
    </style>

    <div data-role="panel" data-position="right" data-position-fixed="false" data-display="overlay" id="add-form" data-theme="b" class="add-form">

        <form class="adminform" action="<?php echo URL; ?>admin/addCategory" method="post">
            <h2>创建新产品目录</h2>
            <label for="name">产品目录名称*</label>
            <input type="text" name="name" id="name" value="" data-clear-btn="true" data-mini="true">


            <div class="ui-grid-a">
                <div class="ui-block-a"><a href="#" data-rel="close" data-role="button" data-theme="c" data-mini="true">放弃</a></div>
                <div class="ui-block-a"><input type="submit" name="submit_add_category" value="保存" /></div>
            </div>
        </form>

        <!-- panel content goes here -->
    </div><!-- /panel -->