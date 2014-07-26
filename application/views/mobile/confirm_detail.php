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

                    <div class="page-app userinfo">
                        <?PHP if (empty($_COOKIE['name'])) {
                                 $msg = "这是您第一次订餐,请完善您的送餐信息";
                              } else {
                                 $msg = "欢迎再次下单, 请确认您的送餐信息";
                              }
                        ?>

                        <div class="userInfo-msg" style="">
                            <?php echo $msg; ?>
                        </div>
                        <form action="<?php echo URL; ?>mobile/submitOrder" id="myform"
                              class="form-horizontal confirm-form" method="post">
                        <div class="userInfo-form">
                            <div class="userInfo-stepTitle selected">
                                <div class="num">
                                    <span>1</span>
                                </div>
                                <div class="arrow"></div>
                                <p>
                                    基本信息
                                </p>
                            </div>
                            <div class="userInfo-stepBox" style="padding: 15px 0px; height: auto;">
                                    <div class="value">
                                        <div class="icon nick">
                                            <span></span>
                                        </div>
                                        <?php $name = empty($_COOKIE['name']) ? "" : $_COOKIE['name']; ?>
                                        <div class="input">
                                            <input type="text" name="name" value="<?php echo $name; ?>" placeholder="输入姓名">
                                        </div>
                                    </div>
                            </div>

                            <div class="userInfo-stepTitle selected">
                                <div class="num">
                                    <span>2</span>
                                </div>
                                <div class="arrow"></div>
                                <p>
                                    联系电话
                                </p>
                            </div>

                            <div class="userInfo-stepBox" style="padding: 15px 0px; height: auto;">
                                <div id="newphone">
                                    <div class="value">
                                        <div class="icon tel">
                                            <span></span>
                                        </div>
                                        <div class="input">
                                            <input type="tel" name="cellphone" value="<?php echo $cellphone; ?>" placeholder="请填写手机号码">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="userInfo-stepTitle selected">
                                <div class="num">
                                    <span>3</span>
                                </div>
                                <div class="arrow"></div>
                                <p>送餐地址</p>
                            </div>

                            <div class="userInfo-stepBox" style="padding: 15px 0px; height: auto;">

                                <DIV><SPAN STYLE="COLOR:#000;FONT-SIZE:15PX">广东省广州市海珠区</SPAN></DIV><BR>

                                <div id="newaddress" style="">

                                    <div class="userInfo-addAddrBox">
                                        <div class="alert alert-info" id="alert_note" style="display:none"></div>

                                        <div class="value userInfo-fullInput" id="search_address">

                                            <input type="text" id="address1" name="address1" placeholder="输入小区或楼宇名" value="<?php echo $_COOKIE['address1'];?>">
                                        </div>
                                        <div class="newaddress_fullInput">
                                            <?php $address2 = empty($_COOKIE['address2']) ? "" : $_COOKIE['address2']; ?>
                                            <div class="value userInfo-fullInput">
                                                <input type="text" id="address2" name="address2" value="<?php echo $address2; ?>" placeholder="输入详细地址,如10弄5号">
                                            </div>
                                        </div>
                                        <div class="clear" style="height:5px"></div>
                                    </div>
                                </div>

                                <div class="page-button add ok" style="display: block;">
                                    <span class="text" onclick="check_address_location()">确定</span>
                                </div>
                            </div>

                        </div>
                        <input type="hidden" name="cellphone" value="<?php echo $cellphone; ?>">
                        <input type="hidden" name="address_lat" id="address_lat" value="">
                        <input type="hidden" name="address_lng" id="address_lng" value="">
                        <input type="hidden" name="store_id" id="store_id" value="">
                        <input type="hidden" name="submit_order" value="true">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="clr"></div>

    </div>
</div>

<div id="map" style="display:none"></div>
<script src="http://api.map.baidu.com/api?v=2.0&ak=8c8974690b10c942a37e0904f952ce35" type="text/javascript"></script>

<script>

    var district;
    var address1;
    var address2;
    var address_string;

    function validateAddress() {
        var district = $('#district').val();
        var address1 = $('#address1').val();
        var address2 = $('#address2').val();

        if (district == '' || address1 == '' || address2 == '') {
            alert('请添加完整地址');
            return false;
        } else {
            return true;
        }
    }

    //TODO: REMOVE DUPLICATION
    ///////////////////get nearest store/////////////////
    var distanceAllowed = <?php echo DELIVERY_DISTANCE; ?>;

    var myGeo = new BMap.Geocoder();
    var map = new BMap.Map("map");
    map.centerAndZoom("广州市", 12);         //初始化地图,设置中心点和地图级别
    var options = {renderOptions: {map: map, panel: "map"}};
    var myLocalsearch = new BMap.LocalSearch(map, options);
    var address = "";

    function check_address_location() {
        if (validateAddress()) {
            address = '广东省广州市海珠区' + $("#address1").val() + $("#address2").val();
            myLocalsearch.setSearchCompleteCallback(calculate_distance);
            myLocalsearch.search(address);
        }
    }

    function calculate_distance() {
        if (myLocalsearch.getStatus() != 0) {
            setAlert('地址不合法或超出了广州海珠区，请重新尝试');
            return;
        }

        myGeo.getPoint(address, function (point) {
            if (point) {

                $.ajax({
                    url: '<?php echo URL; ?>location/getDistance/' + point.lat + '/' + point.lng,
                    data: "",
                    dataType: 'json',
                    success: function (data) {

                        if (data != '') {

                            var distance = data['distance'];
                            var address = data['address'];
                            var store_id = data['store_id'];

                            if (distance < distanceAllowed) {
                                $("#address_lat").val(point.lat);
                                $("#address_lng").val(point.lng);
                                $("#store_id").val(store_id);

                                document.getElementById("myform").submit();
                            } else {
                                setAlert('本小区尚未开通宅急送服务，请稍候时日，多谢支持！');
                            }
                        } else {
                            setAlert('计算距离失败!');
                        }
                    }
                })

            } else {
                setAlert('定位失败!');
            }
        }, "广州市");
    }

    function setAlert(msg) {
        $('#alert_note').html(msg);
        $('#alert_note').addClass("alert-warning");
        $('#alert_note').css('display', 'block');
    }
</script>


