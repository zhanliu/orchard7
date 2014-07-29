<div id="page-inside">

    <?php
    $product = $product[0];
    ?>
    <div style="color:#555;padding:5px">
        <form action="<?php echo URL; ?>mobileadmin/submitProcessProduct" id="myform"
              class="form-horizontal userInfo-form" method="post">

            <div>
                <span style="color:#555;padding:5px">Name: </span>
                <input type="text" name="name" value="<?php echo $product->name; ?>" placeholder="输入 name">
            </div><br>

            <div>
                <span style="color:#555;padding:5px">Price: </span>
                <input type="text" name="price" value="<?php echo $product->price; ?>" placeholder="输入 price">
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

        </form>

        <br>
        <div class="page-button ok" onclick="javascript:history.back();">
            <span class="text">返回</span>
        </div>

    </div>

</div>

