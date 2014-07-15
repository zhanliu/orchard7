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
                                    <div class="total"><span>59.5</span>元</div>
                                    <div class="subtotal">(小计:50.5元, 外送费:9.0元)</div>
                                </div>
                            </div>
                            <ul class="shoppingCart-list">

                                <?php
                                $items = $_SESSION['cart']->getItems();
                                foreach ($products as $product) {
                                    $qty = $items[$product->id];
                                ?>

                                <li><div id="delItem_1" class="delete"></div>
                                    <div class="widget-num">
                                        <div id="minusItem_1" class="left am-clickable"></div>
                                        <div id="addItem_1" class="right am-clickable"></div>
                                        <div class="text"><?php echo $qty; ?></div>
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
                                    <p class="total"><span>59.5</span>元</p>

                                    <p class="subtotal">(小计:50.5元, 外送费:9.0元)</p>
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
    }

    function removeFromCart(id) {
        $.ajax({
                url: '<?php echo URL; ?>mobile/RemoveFromCart/' + id,
                data: "",
                dataType: 'json',
                success: function (data) {
                    if (data != '') {

                    }
                }
            }
        )
    }


</script>

