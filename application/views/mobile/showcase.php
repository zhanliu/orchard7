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

                    <?php
                    $index = 0;
                    foreach ($products as $product) {
                        $index++;
                        $div_id = "div_".$index;
                        $number_field_id = "number_field_".$index;
                        $price_id = "price_".$index;
                    ?>

                    <div class="list list-large">
                        <a href="#" class="inner-list pearl">
                            <div class="image">
                                <div class="inner-image">
                                    <img src="<?php echo 'http://orchard7-product.stor.sinaapp.com/'.$product->img_url; ?>" data-koh-imagetypeid="all" class="loaded wasted product-img">
                                </div>
                            </div>
                            <div class="details" id="<?php echo $div_id; ?>">
                                <div class="inner-details">
                                    <h3><?php echo $product->name; ?></h3>
                                    <p><?php echo $product->description; ?></p>
                                    <p><span  class="bright highlight_price" id="<?php echo $price_id; ?>"><?php echo $product->price; ?>元/<?php echo $product->unit; ?></span> <span id="<?php echo $price_id . '_original'; ?>" class="gray_price" <?php if ($product->original_price == null) { echo "style='display:none'";} ?>><?php echo $product->original_price; ?>元/<?php echo $product->unit; ?></span></span></p>
                                </div>
                                <div class="pd_product-buy-num">
                                    <div class="pd_product-num-wrap">
                                        <span class="pd_product-num-minus" onclick="sub('<?php echo $index ?>')"></span>
                                        <input class="pd_product-num-form" type="number" min="0" max="999" ;="" value="0" id="<?php echo $number_field_id; ?>" required="">
                                        <span class="pd_product-num-plus" onclick="add('<?php echo $index; ?>')"></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php } ?>


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

        $('#'+div_id).css('background', '#eeeeff');
        total_price+= Number($('#'+price_id).text());
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
            $('#num_cart').text(unit);
        }

        if (number_field.value==0) {
            $('#num_cart').css('display', 'none');
            $('#'+div_id).css('background', 'none');
        }
    }

    // location service
    function getLocation()
    {
        if (navigator.geolocation)
        {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else{
            alert("disabled");
        }
    }

    function showPosition(position)
    {
        alert("Latitude: " + position.coords.latitude + "<br />Longitude: " + position.coords.longitude);
    }

    $(document).ready(function(){
        getLocation();
    });
</script>
<!-- END BrightTag -->
