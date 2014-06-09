<div class="ui-layout-center">

    <p class="f1">产品目录管理</p><hr/>

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
        <div id="pane4-closed">
            <button onclick="outerLayout.show('east',true)">添加</button>
        </div>




<!--        <div id="dialog"  title="bb">-->
<!--            <h2>Create Your Account </h2>-->
<!--            <form class="adminform" action="--><?php //echo URL; ?><!--admin/addCategory" method="post">-->
<!--                <h2>创建新产品目录</h2>-->
<!--                <label for="name">产品目录名称*</label>-->
<!--                <input type="text" name="name" id="name" value="" data-clear-btn="true" data-mini="true">-->
<!---->
<!---->
<!--                <div class="ui-grid-a">-->
<!--                    <div class="ui-block-a"><input type="submit" name="submit_add_category" class="category_save_button" value="保存" /></div>-->
<!--                </div>-->
<!--            </form>-->
<!--        </div>-->
    </div>

    <script type="text/javascript">

//        $( ".category_create" ).click(function() {
//            //$("#register").show();
//            $( "#dialog").show();
//            $( "#dialog" ).dialog();
//        });

//        $( ".category_save_button" ).click(function() {
//            $("#register").hide();
//        });

//        $(function() {
//            $( "#dialog" ).dialog();
//        });

//$(document).ready( function() {
//    var myLayout;
//
//    myLayout = $("category_create_popup").layout({
//        initClosed:					true
//    });
    </script>

</div>

<div id="category_create_popup" class="ui-layout-east">
    <form class="adminform" action="<?php echo URL; ?>admin/addCategory" method="post">
        <h2>创建新产品目录</h2>
        <label for="name">产品目录名称*</label>
        <input type="text" name="name" id="name" value="" />
        <p><button onclick="outerLayout.hide('east')">放弃</button></p>
        <input type="submit" name="submit_add_category" value="保存" />
    </form>
</div>

