<div class="ui-layout-center">

    <p class="f1">产品目录管理</p><hr/>

    <div data-role="content">
        <table id="category_data_table" class="display" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>ID</th>
                <th>名称</th>
                <th>删除</th>
            </tr>
            </thead>

            <tfoot>
            <tr>
                <th>ID</th>
                <th>名称</th>
                <th>删除</th>
            </tr>
            </tfoot>

            <tbody>
            <?php foreach ($categories as $category) { ?>
                <tr align="center">
                    <td><?php echo $category->id; ?></td>
                    <td><?php echo $category->name; ?></td>
                    <td>[<a href="<?php echo URL . 'admin/deletecategory/' . $category->id; ?>">X</a>]</td>
                </tr>
            <?php } ?>
            </tbody>
        </table>

        <div class="add_object_button_div">
            <button class="category_add_button">添加</button>
        </div>
    </div>

    <div class="panel">
        <form class="adminform" action="<?php echo URL; ?>admin/addCategory" method="post">
            <h2>创建新产品目录</h2>
            <label for="name">产品目录名称*</label>
            <input type="text" name="name" id="name" value="" />
            <p><button>放弃</button></p>
            <input type="submit" name="submit_add_category" value="保存" />
        </form>
    </div>

</div>

<script type="text/javascript">
    $(document).ready(function(){
        $(".category_add_button").click(function(){
            $(".panel").toggle("fast");
            $(this).toggleClass("active");
            return false;
        });

        $('#category_data_table').dataTable();
    });
</script>


