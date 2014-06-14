<h1>Product Detail</h1>
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
    <img src="/public/uploads/<?php echo $product[0]->img_url; ?>"/>
</td>
</tr>
</table>

        