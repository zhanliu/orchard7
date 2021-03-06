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
                    <div class="box-content"> <h1> <a href="#"> 精选单品 </a> </h1> </div>
                    <div class="box-content"> <h1> <a href="#"> 优惠套餐 </a> </h1> </div>

                    <div id="checkoutRTSView" class="current checkout_div stepy-hide" data-url="/checkout">
                        <h1 class="drrrty continue keep-shopping">
                            <a href="#" onclick="reset()">
                                <strong>继续购物</strong>
                            </a>
                        </h1>
                    </div>

                    <form action="<?php echo URL; ?>mobile/submitAddItem" method="post">
                        <dl class="list"><dd>
                                <dl class="list">
                                    <?php
                                    $index = 0;
                                    foreach ($products as $product) {
                                        $index++;
                                        $div_id = "div_".$index;
                                        $list_id = "list_".$index;
                                        $number_field_id = "number_field_".$index;
                                        $price_id = "price_".$index;
                                        ?>

                                        <dd>
                                            <a href="/deal/25207674.html?stid=116645990530560_c1" gaevent="imt/index/youlike" class="react">
                                                <div class="dealcard">
                                                    <div class="dealcard-img"><img src="<?php echo URL.'public/uploads/'.$product->img_url; ?>"></div>
                                                    <div class="dealcard-block-right">
                                                        <div class="dealcard-brand single-line"><?php echo $product->name; ?></div>

                                                        <div class="title text-block"><?php echo $product->description; ?></div>
                                                        <div class="price">
                                                            <strong><?php echo $product->price; ?></strong><span class="strong-color">元</span><space></space>
                                                            <!----><del><?php echo $product->original_price; ?>35元</del><!---->
                                                            <span class="line-right">已售35570</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </dd>

                                        <!--
                     <div class="list list-large" id="<?php echo $list_id; ?>">
                        <div class="inner-list pearl">
                            <div class="image">
                                <div class="inner-image product-image">
                                    <img src="<?php echo URL.'public/uploads/'.$product->img_url; ?>" data-koh-imagetypeid="all" class="loaded wasted product-img">
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
                        </div>
                    </div>-->
                                    <?php } ?>
                                </dl>
                            </dd> </dl>

                        <div id="checkoutRTSView" class="checkout_div checkout_summary stepy-hide">
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
                </form>

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