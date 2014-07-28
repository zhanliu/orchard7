<div id="page-inside">

    <?php
    $product = $product[0];
    ?>

    <span style="font-family: bold;color:#555">
        Name:<?php echo $product->name; ?>
    </span>

    <div style="color:#555;padding:5px">

        <div>Price: <?php echo $product->price; ?></div>
        <div>Original Price: <?php echo $product->original_price; ?></div>
        <br>
        <div class="page-button ok" onclick="javascript:history.back();">
            <span class="text">返回</span>
        </div>

    </div>

</div>

