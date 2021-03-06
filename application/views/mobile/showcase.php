<div id="page-inside">

    <div class="group section-wrap upper" id="upper">
        <div class="wrap group">
            <div id="sliderFrame">
                <div id="slider">
                    <img src="<?php echo URL; ?>public/img/mobile/fresh-fruit.jpg" alt="每日新鲜水果能量, 让您活力充沛" />
                    <img src="<?php echo URL; ?>public/img/mobile/fruit-basket.jpg" alt="礼品果篮, 高端大气上档次" />
                </div>
            </div>
        </div>
    </div>
    <div class="clr"></div>

    <div class="box-content" style="background: #EEBF02"><h1><a href="#" style="color:white"> 水果拼盘 </a></h1></div>
    <div class="box-content"><h1><a href="#"> 时令鲜果 </a></h1></div>
    <div class="box-content"><h1><a href="#"> 香脆坚果 </a></h1></div>
    <div class="box-content"><h1><a href="<?php echo URL; ?>mobile/channelSpecial"> 商务拼盘 </a></h1></div>

    <div class="clr"></div>


    <?php
    $operation_model = $this->loadModel('OperationModel');

    $contents = $operation_model->getOperationContentByName('showcase_operation');

    if (sizeof($contents) > 0) {
        echo '<span id="showcase_operation_content" class="full-content">' . $contents[0]->content . '</span>';
    }
    ?>

    <div class="full-content">
        <p style="font-size: 12pt; color:#85c744; text-align:center" >精选时令鲜果一小时抵达</p>
        <hr/>

        <form id="myform" action="<?php echo URL; ?>mobile/preview" method="post"
              class="form-horizontal">
            <?php
            foreach ($products as $product) {
                $index = $product->id;
                $div_id = "div_" . $index;
                $list_id = "list_" . $index;
                $number_field_id = "number_field_" . $index;
                $price_id = "price_" . $index;
                ?>


                <div class="latest" id="<?php echo $div_id; ?>" style="position: relative">
                    <h3> <?php echo $product->name; ?> </h3>

                    <img src="<?php echo UPLOAD_URL . $product->img_url; ?>" class="pimg" />
                    <div class="description" ><?php echo $product->description; ?></div>

                    <div class="description" ><span class="bright highlight_price" id="<?php echo $price_id; ?>">
                                        <?php echo $product->price; ?></span>
                        <span class="bright highlight_price">元/<?php echo $product->unit; ?></span>
                                        <span id="<?php echo $price_id . '_original'; ?>"
                                              class="gray_price" <?php if ($product->original_price == null) {
                                            echo "style='display:none'";
                                        } ?>>
                                        <?php echo $product->original_price; ?>
                                            元/<?php echo $product->unit; ?></span></span></div>

                    <div class="buy-item" style="bottom: 0px; left:160px; position: absolute;">
                        <input type="button" class="btn-primary btn" value="加入购物车" onclick="addToCart(<?php echo $index; ?>)">
                        <!--<image src="<?php echo URL; ?>public/img/add-to-cart.png">-->

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

<div id="outerdiv" style="position:fixed;top:0;left:0;background:rgba(0,0,0,0.7);z-index:2;width:100%;height:100%;display:none;"><div id="innerdiv" style="position:absolute;"><img id="bigimg" style="border:5px solid #fff;" src="" /></div></div>

<style>
    * {margin:0;padding:0;}
    #imglist {list-style:none; width:500px; margin:50px auto;}
    #imglist li {float:left; margin-top:10px;}
</style>


<script type="text/javascript">

    var count = <?php echo $_SESSION['cart']->count();?>;

    function addToCart(id) {
        jQuery.ui.Mask.show('正在更新购物车...');

        count++;
        $.ajax({
                url: '<?php echo URL; ?>mobile/addToCart/' + id,
                data: "",
                dataType: 'json',
                complete: function () {
                    setTimeout(function () {
                        jQuery.ui.Mask.hide();
                    }, 300);                    // hides loader.
                },
                success: function (data) {
                    if (data != '') {
                        $('#cart_num').text(data);
                        $('#cart_num').css('display', 'inline');

                    }
                }

            }
        )
        return false;
    }

    $(function(){
        $(".pimg").click(function(){
            var _this = $(this);//将当前的pimg元素作为_this传入函数
            imgShow("#outerdiv", "#innerdiv", "#bigimg", _this);
        });
    });

    function showBigImage(id) {
        alert(id);
    }

    function imgShow(outerdiv, innerdiv, bigimg, _this){
        var src = _this.attr("src");//获取当前点击的pimg元素中的src属性
        $(bigimg).attr("src", src);//设置#bigimg元素的src属性

        /*获取当前点击图片的真实大小，并显示弹出层及大图*/
        $("<img/>").attr("src", src).load(function(){
            var windowW = $(window).width();//获取当前窗口宽度
            var windowH = $(window).height();//获取当前窗口高度
            var realWidth = this.width;//获取图片真实宽度
            var realHeight = this.height;//获取图片真实高度
            var imgWidth, imgHeight;
            var scale = 0.8;//缩放尺寸，当图片真实宽度和高度大于窗口宽度和高度时进行缩放

            if(realHeight>windowH*scale) {//判断图片高度
                imgHeight = windowH*scale;//如大于窗口高度，图片高度进行缩放
                imgWidth = imgHeight/realHeight*realWidth;//等比例缩放宽度
                if(imgWidth>windowW*scale) {//如宽度扔大于窗口宽度
                    imgWidth = windowW*scale;//再对宽度进行缩放
                }
            } else if(realWidth>windowW*scale) {//如图片高度合适，判断图片宽度
                imgWidth = windowW*scale;//如大于窗口宽度，图片宽度进行缩放
                imgHeight = imgWidth/realWidth*realHeight;//等比例缩放高度
            } else {//如果图片真实高度和宽度都符合要求，高宽不变
                imgWidth = realWidth;
                imgHeight = realHeight;
            }
            $(bigimg).css("width",imgWidth);//以最终的宽度对图片缩放

            var w = (windowW-imgWidth)/2;//计算图片与窗口左边距
            var h = (windowH-imgHeight)/2;//计算图片与窗口上边距
            $(innerdiv).css({"top":h, "left":w});//设置#innerdiv的top和left属性
            $(outerdiv).fadeIn("fast");//淡入显示#outerdiv及.pimg
        });

        $(outerdiv).click(function(){//再次点击淡出消失弹出层
            $(this).fadeOut("fast");
        });
    }

    //TODO: THIS VALIDATION IS NOT TESTED YET
    function submit() {
        if (count > 0) {
            document.getElementById("myform").submit();
        } else {
            alert('您的购物车还是空的呢');
        }
    }

    $(document).ready(function () {
        if (count > 0) {
            $('#cart_num').text(count);
            $('#cart_num').css('display', 'inline');
        }

    });

</script>
