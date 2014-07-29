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


    <div style="color:#000;padding:5px">
        <table width="100%">
            <tr>
                <td width="50%" padding="5px">
                <span>
                <a href="<?php echo URL; ?>mobileadmin/processProduct/<?php echo $id; ?>"
                   class="myButton">
                    <?php echo $product->name; ?>
                </a></span><br>
                    <span style="color:#000;padding:3px">Price: <?php echo $product->price; ?></span><br>
                    <span
                        style="color:#000;padding:3px">Original Price: <?php echo $product->original_price; ?></span><br>
                    <span style="color:#000;padding:3px">Unit: <?php echo $product->unit; ?></span>
                </td>
                <td padding="5px"><a href="<?php echo URL; ?>mobileadmin/overwriteProductImage/<?php echo $id; ?>">
                       <img src="<?php echo UPLOAD_URL . $product->img_url; ?>"></a>
                </td>

            </tr>
            <tr><td colspan="2">
                    <span style="color:#000;padding:3px">Desc: <?php echo $product->description; ?></span>
            </td></tr>
        </table>



    </div>

<?php } ?>

</div>
