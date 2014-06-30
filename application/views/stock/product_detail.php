<div id="page-content" style="min-height: 2911px;">
    <div id="wrap">
        <div id="page-heading">
            <ol class="breadcrumb">
                <li><a href="">控制面板</a></li>
                <li>库存管理</li>
                <li class="active">商品详情</li>
            </ol>
        </div>

        <div class="container">


<table><tr>
<td>
Name: <?php echo $product[0]->name; ?><br><br>
Cat ID:<?php echo $product[0]->category_id; ?><br><br>
Unit: <?php echo $product[0]->unit; ?><br><br>
Price: <?php echo $product[0]->price; ?><br><br>
Description: <?php echo $product[0]->description; ?><br><br>
Tag: <?php echo $product[0]->tag; ?><br><br>

Created Time: <?php echo $product[0]->created_time; ?><br><br>
Updated Time: <?php echo $product[0]->updated_time; ?>
</td>
<td>
    <img src="<?php if (ONLINE == 'FALSE') {echo URL . 'public/uploads/' . $product[0]->img_url;} else { echo 'http://orchard7-product.stor.sinaapp.com/' .  $product[0]->img_url;} ?>"/>
</td>
</tr>
</table>

        