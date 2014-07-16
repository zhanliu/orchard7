<body>

<div id="st-container" class="st-container">
    <div class="st-pusher">


        <div class="st-content">
            <div class="st-content-inner">
                <div id="page-content">

                    <header class="newTodayView">
                        <nav class="shine dropShadow">
                            <a href="#">
                                <span class="logo floatLeft">Daily Fresh</span>
                                <span class="tagline floatLeft">新鲜健康 <br>每一天</span>
                            </a>

                        </nav>
                    </header>
                    <div class="clr"></div>

                    <div id="page-inside">

                        <div class="group section-wrap upper" id="upper">
                            <div class="wrap group">
                                <div class="section-2 group banner">
                                    <a href="#"> <img src="<?php echo URL; ?>public/img/mobile/banner.jpg"/> </a>
                                </div>
                            </div>
                        </div>
                        <div class="clr"></div>

                        <div class="box-content"><h1><a href="#"> 精选单品 </a></h1></div>
                        <div class="box-content"><h1><a href="#"> 优惠套餐 </a></h1></div>
                        <div class="box-content"><h1><a href="#"> 热卖排行 </a></h1></div>
                        <div class="box-content"><h1><a href="#"> 当季食疗 </a></h1></div>

                        <div class="clr"></div>

                        <div class="full-content">
                            <h5> 精选单品 </h5>

                            <p>时令鲜果一小时抵达</p>
                            <hr/>

                            <form id="myform" action="<?php echo URL; ?>mobile/preview" method="post"
                                  class="form-horizontal">
                            <?php
                            foreach ($products as $product) {
                                $index= $product->id;
                                $div_id = "div_" . $index;
                                $list_id = "list_" . $index;
                                $number_field_id = "number_field_" . $index;
                                $price_id = "price_" . $index;
                                ?>


                                <div class="latest" id="<?php echo $div_id; ?>">
                                    <h3> <?php echo $product->name; ?> </h3>
                                    <img src="<?php echo UPLOAD_URL . $product->img_url; ?>"/>

                                    <p><?php echo $product->description; ?></p>

                                    <p><span class="bright highlight_price" id="<?php echo $price_id; ?>">
                                        <?php echo $product->price; ?></span>
                                        <span class="bright highlight_price">元/<?php echo $product->unit; ?></span>
                                        <span id="<?php echo $price_id . '_original'; ?>"
                                          class="gray_price" <?php if ($product->original_price == null) {
                                        echo "style='display:none'";
                                        } ?>>
                                        <?php echo $product->original_price; ?>
                                        元/<?php echo $product->unit; ?></span></span></p>

                                    <div class="buy-item">

                                        <image src="<?php echo URL; ?>public/img/add-to-cart.png" onclick="addToCart(<?php echo $index; ?>)">

                                    </div>

                                </div>

                                <hr/>
                            <?php } ?>
                                <input type="hidden" name="item_type" value="product">
                                <input type="hidden" name="block" value="<?php echo $block; ?>">
                                <input type="hidden" name="submit_add_item" value="true">
                            </form>

                            <div class="clr"></div>
                        </div>

                        <div class="clr"></div>

                        <div class="shoppingbags" data-shopcart="true">
                            <a href="#" onclick="submit()">
                                <span class="flow_carticon"><img
                                        src="<?php echo URL; ?>public/css/images/cart.png"></span>
                                <span id="cart_num" class="flow_cart_num" style="display:none"></span>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="clr"></div>
        <!--<div id="message_box">Your message goes here</div>-->
    </div>
</div>

<script type="text/javascript">

    var count = <?php echo $_SESSION['cart']->count();?>;

    function addToCart(id) {
        count++;
        $.ajax({
                url: '<?php echo URL; ?>mobile/addToCart/' + id,
                data: "",
                dataType: 'json',
                success: function (data) {
                    if (data != '') {
                        $('#cart_num').text(data);
                        $('#cart_num').css('display', 'inline');
                    }
                }
            }
        )
        //setupMessageBox();
        //showMessage();
    }

    //TODO: THIS VALIDATION IS NOT TESTED YET
    function submit() {
        if (count>0) {
            document.getElementById("myform").submit();
        } else {
            alert('您的购物车还是空的呢');
        }
    }

    $(document).ready(function(){
        if (count>0) {
            $('#cart_num').text(count);
            $('#cart_num').css('display', 'inline');
        }
    });

    var updateTimer = 0;
    function setupMessageBox(){
        //showMessage(); //displays message on page load
        jQuery(window).scroll(function() {
            showMessage();
        });
        clearTimeout(updateTimer);
        activateTimer();
    }

    function activateTimer() {
        updateTimer = setTimeout('jQuery("#message_box").remove()', 5000);
    }

    function showMessage(){
        jQuery('#message_box').animate({top:jQuery(window).scrollTop() + "px" }, {queue: false,duration:350});
    }

</script>
