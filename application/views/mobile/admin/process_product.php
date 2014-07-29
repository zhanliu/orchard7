<div id="page-inside">

    <?php
    $product = $product[0];
    $check = $product->is_active ? "checked" : "";
    ?>

    <div class="alert alert-danger">
        商品管理
        <a href="#" class="myButton" onclick="javascript:document.getElementById('myform').submit();">更新</a>
        <a href="<?php echo URL; ?>mobileadmin/productManager" class="myButton">返回</a>
    </div>

    <div style="color:#555">
        <form action="<?php echo URL; ?>mobileadmin/submitProcessProduct" id="myform"
              class="form-horizontal userInfo-form edit-form" method="post">

            <div>
                <span style="color:#555;padding:5px">名称: </span>
                <input type="text" name="name" value="<?php echo $product->name; ?>" placeholder="输入名称">
            </div><br>

            <div>
                <span style="color:#555;padding:5px">价格: </span>
                <input type="text" name="price" value="<?php echo $product->price; ?>" placeholder="输入价格" size="8">
            </div><br>

            <div>
                <span style="color:#555;padding:5px">原价:</span>
                <input type="text" name="original_price"
                       value="<?php echo $product->original_price; ?>" placeholder="输入原价">
            </div><br>

            <div>
                <span style="color:#555;padding:5px">单位:</span>
                <input type="text" name="unit"
                       value="<?php echo $product->unit; ?>" placeholder="输入单位">
            </div><br>

            <div>
                <span style="color:#555;padding:5px">描述:</span>
                <textarea name="description" style="width:100%;height:50px" placeholder="输入描述"><?php echo $product->description; ?></textarea>
            </div><br>

<<<<<<< HEAD
            <span>Status:
            <input id="cmn-toggle-1" name="is_active" class="cmn-toggle cmn-toggle-round" type="checkbox" <?php echo $check; ?>>
=======
            <span>状态:
            <input id="cmn-toggle-1" name="is_active" class="cmn-toggle cmn-toggle-round" type="checkbox">
>>>>>>> f982663bb08af007df89807797b7ba06b90c48c1
            <label for="cmn-toggle-1"></label></span>

            <input type="hidden" name="id" value="<?php echo $product->id; ?>">
            <input type="hidden" name="submit_process_product" value="true">

            <br>

        </form>

    </div>

</div>

