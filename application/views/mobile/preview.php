<div id="page-inside">

    <div class="full-content">

        <div class="shoppingCart-overview">
            <div class="amount">
                <div class="tag">总金额:</div>
                <div class="total"><span id="total_gross_1"></span>元</div>
                <div class="subtotal">(小计:<span id="total_net_1"><?php echo $total_price; ?></span>元,
                    外送费:<span id="delivery_fee_1">0</span>元)
                </div>
            </div>
        </div>
        <div class="alert alert-danger">
            提示: 订单金额小于50元收取7元配送费, 超过50元就可以免费配送了!
        </div>
        <ul class="shoppingCart-list">

            <?php
            $items = $_SESSION['cart']->getItems();
            foreach ($products as $product) {
                $id = $product->id;
                $qty = $items[$product->id];
                ?>

                <li id="list_<?php echo $id; ?>">
                    <div id="delItem_1" class="delete"
                         onclick="removeFromCart(<?php echo $id; ?>)"></div>
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
                <p class="total"><span id="total_gross_2"></span>元</p>

                <p class="subtotal">(小计:<span id="total_net_2"><?php echo $total_price; ?></span>元,
                    外送费:<span id="delivery_fee_2">0</span>元)</p>
            </div>
        </div>

        <a href="<?php echo URL; ?>mobile/confirmCellphone">
        <div class="page-button submit" id="submit">
                <span class="text">进入结算</span>
        </div></a>

        <div class="page-button submit" id="back" style="display:none">
            <a href="<?php echo URL; ?>mobile/showcase">
                <span class="text">重新选购</span></a>
        </div>

    </div>

</div>


<script type="text/javascript">
    $(document).ready(function(){
        updateTotalPrice();
    });

    $(function () {
        FastClick.attach(document.body);
    });

    function addToCart(id) {
        //jQuery.ui.Mask.show('正在重新计算总价...');
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
        //jQuery.ui.Mask.show('正在重新计算总价...');
        var number = Number($('#qty_' + id).text());
        $('#qty_' + id).text(number - 1);

        if (number == 1) {
            removeFromCart(id);
            return;
        }

        $.ajax({
                url: '<?php echo URL; ?>mobile/ReduceToCart/' + id,
                data: "",
                dataType: 'json',
                success: function (data) {
                    if (data != '' || data == 0) {
                        updateTotalPrice();
                    }
                }
            }
        )

    }

    function removeFromCart(id) {

        $('#list_' + id).css('display', 'none');

        $.ajax({
                url: '<?php echo URL; ?>mobile/RemoveFromCart/' + id,
                data: "",
                dataType: 'json',
                success: function (data) {
                    if (data != '' || data == 0) {

                        updateTotalPrice();
                    }
                }
            }
        )
    }

    function updateTotalPrice() {
        jQuery.ui.Mask.show('正在计算总价...');
        $.ajax({
                url: '<?php echo URL; ?>mobile/callTotalPrice/',
                data: "",
                dataType: 'json',
                complete: function () {
                    //setTimeout(function () {
                    jQuery.ui.Mask.hide();
                    //}, 300);                    // hides loader.
                },
                success: function (data) {
                    if (data != '' || data == 0) {

                        if (data == 0) {
                            $('#submit').css('display', 'none');
                            $('#back').css('display', 'block');
                        }

                        var delivery_fee = 0;
                        if (data<50) {
                            delivery_fee = 7;
                        }

                        var total_net = data;
                        var total_gross = total_net + delivery_fee;

                        $('#total_gross_1').text(total_gross);
                        $('#total_net_1').text(total_net);
                        $('#total_gross_2').text(total_gross);
                        $('#total_net_2').text(total_net);


                        $('#delivery_fee_1').text(delivery_fee);
                        $('#delivery_fee_2').text(delivery_fee);

                    }
                }
            }
        )
    }

    $(document).ready(function () {
        updateTotalPrice();
    });


</script>

