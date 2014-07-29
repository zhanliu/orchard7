<div id="page-inside">

    <?php
    $product = $product[0];
    ?>

    <div class="alert alert-danger">
        商品管理
        <a href="#" class="myButton" onclick="javascript:document.getElementById('myform').submit();">Update</a>
        <a href="<?php echo URL; ?>mobileadmin/productManager" class="myButton">返回</a>
    </div>

    <div style="color:#555">
        <form action="<?php echo URL; ?>mobileadmin/submitProcessProduct" id="myform"
              class="form-horizontal userInfo-form edit-form" method="post">

            <div>
                <span style="color:#555;padding:5px">Name: </span>
                <input type="text" name="name" value="<?php echo $product->name; ?>" placeholder="输入 name">
            </div><br>

            <div>
                <span style="color:#555;padding:5px">Price: </span>
                <input type="text" name="price" value="<?php echo $product->price; ?>" placeholder="输入 price" size="8">
            </div><br>

            <div>
                <span style="color:#555;padding:5px">Original Price:</span>
                <input type="text" name="original_price"
                       value="<?php echo $product->original_price; ?>" placeholder="输入 original price">
            </div><br>

            <div>
                <span style="color:#555;padding:5px">Unit:</span>
                <input type="text" name="unit"
                       value="<?php echo $product->unit; ?>" placeholder="输入 unit">
            </div><br>

            <div>
                <span style="color:#555;padding:5px">Description:</span>
                <textarea name="description" style="width:100%;height:50px" placeholder="输入 description"><?php echo $product->description; ?></textarea>
            </div><br>

            <span>Status:
            <input id="cmn-toggle-1" name="is_active" class="cmn-toggle cmn-toggle-round" type="checkbox">
            <label for="cmn-toggle-1"></label></span>

            <input type="hidden" name="id" value="<?php echo $product->id; ?>">
            <input type="hidden" name="submit_process_product" value="true">

            <br>

        </form>

    </div>

</div>

