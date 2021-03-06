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

    <div id="pop" class="alert alert-warning"></div>

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
                        <input type="text" id="name" name="name" value="<?php echo $name; ?>" placeholder="输入姓名">
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
                            <input type="tel" id="cellphone" name="cellphone" value="<?php echo $cellphone; ?>"
                                   placeholder="请填写手机号码">
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

                <DIV><SPAN STYLE="COLOR:#000;FONT-SIZE:15PX">广东省广州市海珠区</SPAN></DIV>
                <BR>

                <div id="newaddress" style="">

                    <div class="userInfo-addAddrBox">
                        <div class="alert alert-info" id="alert_note" style="display:none"></div>

                        <div class="value userInfo-fullInput" id="search_address">

                            <input type="text" id="address1" name="address1" placeholder="输入小区或楼宇名"
                                   value="<?php echo $_COOKIE['address1']; ?>">
                        </div>
                        <div class="newaddress_fullInput">
                            <?php $address2 = empty($_COOKIE['address2']) ? "" : $_COOKIE['address2']; ?>
                            <div class="value userInfo-fullInput">
                                <input type="text" id="address2" name="address2" value="<?php echo $address2; ?>"
                                       placeholder="输入详细地址,如10弄5号">
                            </div>
                        </div>
                        <div class="clear" style="height:5px"></div>
                    </div>
                </div>

                <a href="#" onclick="check_address_location()">
                <div class="page-button add ok">
                    <span class="text">确定</span>
                </div>
                </a>
            </div>

        </div>
        <input type="hidden" name="cellphone" value="<?php echo $cellphone; ?>">
        <input type="hidden" name="address_lat" id="address_lat" value="">
        <input type="hidden" name="address_lng" id="address_lng" value="">
        <input type="hidden" name="store_id" id="store_id" value="">
        <input type="hidden" name="submit_order" value="true">
    </form>
</div>


<div id="map" style="display:none"></div>
<script src="http://api.map.baidu.com/api?v=2.0&ak=8c8974690b10c942a37e0904f952ce35" type="text/javascript"></script>

<script>

    var district;
    var address1;
    var address2;
    var address_string;

    function validateAddress() {
        //var district = $('#district').val();
        var address1 = $('#address1').val();
        var address2 = $('#address2').val();

        if (address1 == '') {
            setAlert('连小区和楼宇名都没有, 让我们往哪儿送啊?');
            return false;
        } else if (address2 == '') {
//            setAlert('别漏了详细地址, 楼栋号和门牌号!');
//            return false;
        }

        return true;
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
        if ($("#name").val() == '') {
            setAlert('请赐下您的大名');
        } else if ($("#cellphone").val() == '') {
            setAlert('不留手机我们怎么联系您呢?');
        } else if (validateAddress()) {
            address = '广东省广州市海珠区' + $("#address1").val();// + $("#address2").val();
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
        $('#pop').html(msg);
        pop1.show();
    }

    //弹层接口
    var usePop = function (options) {
        $.extend({
            name: "",
            delayHide: 3000 //延迟隐藏时间
        }, options);
        //
        var hideFlag;
        var _pop = {};
        _pop.show = function () {
            $(options.name).stop(true, true).fadeIn(500);
            hideFlag = setTimeout(_pop.hide, options.delayHide);
        }
        _pop.hide = function () {
            clearTimeout(hideFlag);
            $(options.name).stop(true, true).fadeOut(500);
        }
        return _pop;
    };


    //自定义
    var pop1 = usePop({
        name: "#pop",
        delayHide: 3000
    })
</script>


