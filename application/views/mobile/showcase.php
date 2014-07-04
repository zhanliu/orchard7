<div id="snap-container">

    <div id="container" class="snap-content  scrollable">
        <div id="main" role="main" class="">
            <div id="contentWrapper">

                <div id="appBanner" style="height: 40px; text-align: center; background-color: rgb(192, 228, 237);">
                    <a target="_blank" href="#">
                        <img src="<?php echo URL; ?>public/img/mobile/shipping_banner.png" style="height: 39px; opacity: 1;"></a>
                </div>

                <div id="loading" style="height: 568px;">
                    <span class="icon"></span>
                    <span class="text">Loading…</span>
                </div>
                <div id="newTodayView" class="view current" data-url="/newToday">
                    <h1 class="drrrty homeNav">
                        <span><a class="newToday" href="#">热卖单品</a></span>
                        <span><a class="endsSoon" href="#">精选套餐</a></span>
                        <span><a class="lastDay" href="#">最新上市</a></span>
                    </h1><script id="compiledJs" type="text/javascript" src="<?php echo URL; ?>public/js/mobile.js"></script>

                    <div id="checkoutRTSView" class="current checkout_div" data-url="/checkout" style="display:none">
                        <h1 class="drrrty continue keep-shopping">
                            <a href="#" onclick="reset()">
                                <strong>继续购物</strong>
                            </a>
                        </h1>
                    </div>

                    <?php
                    $index = 0;
                    foreach ($products as $product) {
                        $index++;
                        $div_id = "div_".$index;
                        $list_id = "list_".$index;
                        $number_field_id = "number_field_".$index;
                        $price_id = "price_".$index;
                    ?>

                    <div class="list list-large" id="<?php echo $list_id; ?>">
                        <div class="inner-list pearl">
                            <div class="image">
                                <div class="inner-image product-image">
                                    <img src="<?php echo 'http://orchard7-product.stor.sinaapp.com/'.$product->img_url; ?>" data-koh-imagetypeid="all" class="loaded wasted product-img">
                                </div>
                            </div>
                            <div class="details" id="<?php echo $div_id; ?>">
                                <div class="inner-details">
                                    <h3><?php echo $product->name; ?></h3>
                                    <p><?php echo $product->description; ?></p>
                                    <p><span  class="bright highlight_price" id="<?php echo $price_id; ?>"><?php echo $product->price; ?></span><span  class="bright highlight_price">元/<?php echo $product->unit; ?></span>
                                       <span id="<?php echo $price_id . '_original'; ?>" class="gray_price" <?php if ($product->original_price == null) { echo "style='display:none'";} ?>><?php echo $product->original_price; ?>元/<?php echo $product->unit; ?></span></span></p>
                                </div>
                                <div class="pd_product-buy-num">
                                    <div class="pd_product-num-wrap">
                                        <span class="pd_product-num-minus" onclick="sub('<?php echo $index ?>')"></span>
                                        <input class="pd_product-num-form" type="number" min="0" max="999" ;="" value="0" id="<?php echo $number_field_id; ?>" required="">
                                        <span class="pd_product-num-plus" onclick="add('<?php echo $index; ?>')"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                    <div id="checkoutRTSView" class="checkout_div checkout_summary" style="display:none">
                        <h2 style="border-bottom:1px solid #dedede; margin:20px 0 3px;">订单明细</h2>
                        <table>
                            <tbody>

                            <tr>
                                <td colspan="2" class="numeric">运费</td>
                                <td colspan="2" class="numeric">0元</td>
                            </tr>

                            <tr style="border-top:1px solid #dedede">
                                <th colspan="2" class="numeric">订单总价</th>
                                <th colspan="2" class="numeric" id="total_price"></th>
                            </tr>
                            </tbody>
                        </table>
                        <div class="add-to-wrap" align="center" style="width: 98%";>
                            <button type="submit" class="ok">提交订单</button>
                        </div>
                    </div>

                    <div class="footer_menu">
                        <a href="#">
                            <div class="item pearl">邀请朋友吃免费水果<div class="tick"></div></div>
                        </a>
                        <a href="#">
                            <div class="item pearl">精选套餐<div class="tick"></div></div>
                        </a>
                        <a href="#">
                            <div class="item pearl">最新上市<div class="tick"></div></div>
                        </a>

                    </div>
                    <footer>
                        <nav>
                            <div style="text-align: center">
                                <a href="#" class="nohash" target="about-us">关于我们</a>
                                <a href="#" class="nohash kohTagging" target="">联系我们</a>
                            </div>
                        </nav>
                    </footer>


                </div>
            </div>
        </div>
    </div>

</div>

<script type="text/javascript">
    var total_price = 0;
    var unit = 0;
    function add(index) {

        var number_field_id = 'number_field_' + index;
        var div_id = 'div_' + index;
        var price_id = 'price_' + index;

        var number_field = document.getElementById(number_field_id);
        number_field.value++;
        unit++;

        total_price+= Number($('#'+price_id).text());
        $('#total_price').text(total_price+'元');

        $('#'+div_id).css('background', '#eeeeff');
        $('#num_cart').text(unit);
        $('#num_cart').css('display', 'inline');
    }

    function sub(index) {
        var number_field_id = 'number_field_' + index;
        var div_id = 'div_' + index;
        var price_id = 'price_' + index;

        var number_field = document.getElementById(number_field_id);

        if (number_field.value>0) {
            number_field.value--;
            unit--;
            total_price-= Number($('#'+price_id).text());
            $('#total_price').text(total_price+'元');
            $('#num_cart').text(unit);
        }

        if (number_field.value==0) {
            $('#num_cart').css('display', 'none');
            $('#'+div_id).css('background', 'none');
        }
    }

    function checkout() {
        var index = 0;

        $('.checkout_div').css('display', 'block');
        $(".list").each(function() {
            index++;
            var price_id = 'price_' + index;
            var number_field_id = 'number_field_' + index;
            var number_field = document.getElementById(number_field_id);
            //alert(number_field.value);
            var list_id = 'list_' + index;
            if (number_field.value==0) {
                $('#'+list_id).css('display', 'none');
            } else {
                //total_price+= Number($('#'+price_id).text()) * (number_field.value);
            }
        })
        //$('#total_price').text(total_price);
        //alert(total_price);
    }

    function reset() {

        //$('#basicwizard-head-2').addClass('stepy-active');
        //$('#basicwizard-head-3').removeClass('stepy-active');
        $('.checkout_div').addClass('stepy-active');
        $('.list').removeClass('stepy-active');
    }
</script>
<!-- END BrightTag -->
