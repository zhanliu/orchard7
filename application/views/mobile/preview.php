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

                        <div class="full-content">

                            <div class="shoppingCart-overview">
                                <div class="amount">
                                    <div class="tag">总金额:</div>
                                    <div class="total"><span id="total_price1"><?php echo $total_price; ?></span>元</div>
                                    <div class="subtotal">(小计:<span id="total_price2"><?php echo $total_price; ?></span>元,
                                        外送费:0.0元)
                                    </div>
                                </div>
                            </div>
                            <ul class="shoppingCart-list">

                                <?php
                                $items = $_SESSION['cart']->getItems();
                                foreach ($products as $product) {
                                    $id = $product->id;
                                    $qty = $items[$product->id];
                                    ?>

                                    <li id="list_<?php echo $id; ?>">
                                        <div id="delItem_1" class="delete" onclick="removeFromCart(<?php echo $id; ?>)"></div>
                                        <div class="widget-num">
                                            <div class="left" onclick="reduceToCart(<?php echo $id; ?>)"></div>
                                            <div class="right" onclick="addToCart(<?php echo $id; ?>)"></div>
                                            <div class="text" id="qty_<?php echo $id; ?>"><?php echo $qty; ?></div>
                                        </div>

                                        <div class="name"><?php echo $product->name; ?></div>
                                        <div class="desc">
                                            <span>单价:<?php echo $product->price; ?>, </span>
                                            <span>小计:<?php echo $product->price * $qty; ?></span>
                                        </div>
                                    </li>
                                <?php } ?>

                            </ul>

                            <div class="shoppingCart-overview bottom">
                                <div class="amount">
                                    <div class="tag">总金额:</div>
                                    <p class="total"><span id="total_price3"><?php echo $total_price; ?></span>元</p>

                                    <p class="subtotal">(小计:<span id="total_price4"><?php echo $total_price; ?></span>元,
                                        外送费:0元)</p>
                                </div>
                            </div>

                            <div class="page-button submit">
                                <a href="<?php echo URL; ?>mobile/confirmCellphone"><span class="text">进入结算</span></a>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="clr"></div>

    </div>
</div>

<script type="text/javascript">

    function addToCart(id) {
        var number = Number($('#qty_' + id).text());
        $('#qty_' + id).text(number + 1);

        $.ajax({
                url: '<?php echo URL; ?>mobile/addToCart/' + id,
                data: "",
                dataType: 'json',
                success: function (data) {
                    if (data != '') {
                        updateTotalPrice();
                    }
                }
            }
        )
    }

    function reduceToCart(id) {
        var number = Number($('#qty_' + id).text());
        if (number == 1) {
            removeFromCart(id);
        } else {
            $('#qty_' + id).text(number - 1);

            $.ajax({
                    url: '<?php echo URL; ?>mobile/ReduceToCart/' + id,
                    data: "",
                    dataType: 'json',
                    success: function (data) {
                        if (data != '') {
                            updateTotalPrice();
                        }
                    }
                }
            )
        }
    }

    function removeFromCart(id) {
        $('#list_' + id).css('display', 'none');
        $.ajax({
                url: '<?php echo URL; ?>mobile/RemoveFromCart/' + id,
                data: "",
                dataType: 'json',
                success: function (data) {
                    if (data != '') {
                        updateTotalPrice();
                    }
                }
            }
        )
    }

    function updateTotalPrice() {
        $.ajax({
                url: '<?php echo URL; ?>mobile/callTotalPrice/',
                data: "",
                dataType: 'json',
                success: function (data) {
                    if (data != '') {
                        //alert(data);
                        $('#total_price1').text(data);
                        $('#total_price2').text(data);
                        $('#total_price3').text(data);
                        $('#total_price4').text(data);
                    }
                }
            }
        )
    }


</script>

