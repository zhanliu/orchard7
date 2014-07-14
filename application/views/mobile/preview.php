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

                            <?php
                            foreach ($_SESSION['cart']->getItems() as $key => $value) {
                                echo "key is " . $key . " and value is " . $value . "<br>";
                            }

                            //echo $products;

                            foreach ($products as $product) {
                                echo "Product name is ". $product->name;
                            }

                            ?>


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

