

<body>

<?php
if (!empty($_COOKIE['uaccess_time'])) {
    $count = $_COOKIE['uaccess_time'];
} else {
    $count = 0;
}
?>

<div id="st-container" class="st-container">
    <div class="st-pusher">


        <div class="st-content">
            <div class="st-content-inner">
                <div id="page-content">

                    <header class="newTodayView">
                        <nav class="shine dropShadow">
                            <a href="#">
                                <span class="logo floatLeft">Daily Fresh</span>
                                <span class="tagline floatLeft">新鲜健康 <br>每一天 － <?php echo $count; ?></span>
                            </a>

                        </nav>
                    </header>
                    <div class="clr"></div>

                    <div id="page-inside">

                        <div class="group section-wrap upper" id="upper">
                            <div class="wrap group">
                                <div class="section-2 group banner">
                                    <a href="#"> <img src="<?php echo URL; ?>public/img/mobile/banner.jpg" /> </a>
                                </div>
                            </div>
                        </div>
                        <div class="clr"></div>

                        <div class="box-content"> <h1> <a href="#"> 精选单品 </a></h1> </div>
                        <div class="box-content"> <h1> <a href="#"> 优惠套餐 </a> </h1></div>
                        <div class="box-content"> <h1> <a href="#"> 热卖排行 </a> </h1></div>
                        <div class="box-content"> <h1> <a href="#"> 当季食疗 </a> </h1> </div>

                        <div class="clr"></div>

                        <div class="full-content">
                            <h5> 精选单品 </h5>
                            <p>时令鲜果一小时抵达</p>
                            <hr />


                            <?php
                            $index = 0;
                            foreach ($products as $product) {
                                $index++;
                                $div_id = "div_".$index;
                                $list_id = "list_".$index;
                                $number_field_id = "number_field_".$index;
                                $price_id = "price_".$index;
                                ?>


                                <div class="latest" id="<?php echo $div_id; ?>">
                                    <h3> <?php echo $product->name; ?> </h3>
                                    <img src="<?php echo URL.'public/uploads/'.$product->img_url; ?>" />
                                    <p><?php echo $product->description; ?></p>
                                    <p><span  class="bright highlight_price" id="<?php echo $price_id; ?>">
                                        <?php echo $product->price; ?></span>
                                        <span  class="bright highlight_price">元/<?php echo $product->unit; ?></span>
                                    <span id="<?php echo $price_id . '_original'; ?>" class="gray_price" <?php if ($product->original_price == null) { echo "style='display:none'";} ?>>
                                        <?php echo $product->original_price; ?>元/<?php echo $product->unit; ?></span></span></p>
                                    <div class="pd_product-buy-num">
                                        <div class="pd_product-num-wrap" id="form-element">
                                            <span class="pd_product-num-minus" onclick="sub('<?php echo $index ?>')"></span>
                                            <input class="pd_product-num-form" name="item_quantity[]" type="number" min="0" max="999" ;="" value="0" id="<?php echo $number_field_id; ?>" required="">
                                            <input type="hidden" name="item_prices[]" value="<?php echo $product->price; ?>" />
                                            <input type="hidden" name="item_id[]" value="<?php echo $product->id; ?>" />
                                            <input type="hidden" name="item_type" value="product">
                                            <input type="hidden" name="block" value="<?php echo $block; ?>">
                                            <input type="hidden" name="submit_add_item" value="true">
                                            <span class="pd_product-num-plus" onclick="add('<?php echo $index; ?>')"></span>
                                        </div>
                                    </div>
                                </div>

                                <hr />

                            <?php } ?>

                            <div class="clr"></div>
                        </div>

                        <div class="clr"></div>

                        <div class="shoppingbags" data-shopcart="true">
                            <a href="cart.html?rbc=service">
                                <span class="flow_carticon"><img src="<?php echo URL; ?>public/css/images/cart.png"></span>
                                <span id="cart_num" class="flow_cart_num" style="display:none"></span>

                            </a>
                        </div>


                    </div>
                </div>
            </div>
        </div>

        <div class="clr"></div>

    </div>
</div>

<script type="text/javascript">
    var total_price = 0;
    var unit = 0;
    var is_checkout = false;

    function add(index) {

        var number_field_id = 'number_field_' + index;
        var div_id = 'div_' + index;

        var number_field = document.getElementById(number_field_id);
        number_field.value++;
        unit++;

        $('#'+div_id).css('background', '#eeeeff');
        $('#cart_num').text(unit);
        $('#cart_num').css('display', 'inline');
    }

    function sub(index) {
        var number_field_id = 'number_field_' + index;
        var div_id = 'div_' + index;
        var number_field = document.getElementById(number_field_id);

        if (number_field.value>0) {
            number_field.value--;
            unit--;
            $('#cart_num').text(unit);
        }

        if (number_field.value==0) {
            $('#'+div_id).css('background', 'none');
        }

        if (unit==0) {
            $('#cart_num').css('display', 'none');
        }
    }

    function checkout() {
        var index = 0;
        $('.checkout_div').removeClass('stepy-hide');
        //$('.checkout_div').css('display', 'block');
        $(".list").each(function() {
            index++;
            var price_id = 'price_' + index;
            var div_id = 'div_' + index;
            var number_field_id = 'number_field_' + index;
            var number_field = document.getElementById(number_field_id);
            //alert(number_field.value);
            var list_id = 'list_' + index;
            if (number_field.value==0) {
                $('#'+list_id).addClass('stepy-hide');
            } else {

            }
        })
    }

</script>
<!-- END BrightTag -->

