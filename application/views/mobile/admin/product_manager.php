<div id="page-inside">

    <div class="alert alert-danger">
        商品管理 <br/>
        <a href="<?php echo URL; ?>mobileadmin/productManager/1"
           class="myButton">上架(<?php echo $active_amount; ?>)</a>
        <a href="<?php echo URL; ?>mobileadmin/productManager/0"
           class="myButton">下架(<?php echo $inactive_amount; ?>)</a>
        <a href="<?php echo URL; ?>mobileadmin/productManager"
           class="myButton">全部(<?php echo $amount; ?>)</a>
    </div>

    <?php
    foreach ($products as $product) {
        $id = $product->id;
    ?>

        <div id="list_<?php echo $id; ?>">

            <div class="name" style="font-size:18px;padding:3px">
                <a href="<?php echo URL; ?>mobileadmin/processProduct/<?php echo $id; ?>"
                   class="myButton">
                    <?php echo $product->name; ?>
                </a>
            </div>
            <div class="desc" style="color:#000;padding:5px">

                <span style="color:#000;padding:3px">Price: <?php echo $product->price; ?></span><br>
                <span style="color:#000;padding:3px">Original Price: <?php echo $product->original_price; ?></span><br>
                <span style="color:#000;padding:3px">Unit: <?php echo $product->unit; ?></span><br>
                <span style="color:#000;padding:3px">Desc: <?php echo $product->description; ?></span>

            </div>
        </div>

        <hr>
    <?php } ?>

</div>
