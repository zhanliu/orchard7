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
                        <div class="userInfo-msg" style="">
                            这是您第一次订餐,请完善您的送餐信息
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
                            <div class="userInfo_notSltText name am-clickable" style="display: none;"></div>
                            <div class="userInfo-stepTitle">
                                <div class="num">
                                    <span>2</span>
                                </div>
                                <div class="arrow"></div>
                                <p>
                                    联系电话
                                </p>
                            </div>
                            <div class="userInfo-stepBox" style="display: none; padding: 0px; height: 0px;">
                                <ul class="userInfo-group telGroup"><li id="phone_0" class="selected"><p><?php echo $cellphone; ?></p><div id="delP_0" class="del"></div></li></ul>
                                <div id="newphone" style="display: none;">
                                    <div class="value">
                                        <div class="icon tel">
                                            <span></span>
                                        </div>
                                        <div class="input">
                                            <input type="tel" name="cellphone" value="" placeholder="请填写手机号码">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="userInfo_notSltText" style=""><?php echo $cellphone; ?></div>

                            <div class="userInfo-stepTitle selected">
                                <div class="num">
                                    <span>3</span>
                                </div>
                                <div class="arrow"></div>
                                <p>送餐地址</p>
                            </div>

                            <div class="userInfo-stepBox" style="padding: 15px 0px; height: auto;">

                                <div id="addressList"></div>
                                <br>
                                <div id="newaddress" style="">
                                    <div class="userInfo-addAddrBox">
                                        <div class="alert alert-info" id="alert_note" style="display:none"></div>
                                        <div class="value userInfo-fullInput" id="search_address">
                                            <input type="text" id="address1" name="address1" placeholder="输入关键字,搜索路名或小区" value="<?php echo $_COOKIE['address1'];?>">
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
    /*
     Address presentation should have three status:
     1. A brand new user flagged as NEW
     2. Existed user choosing existed address flagged as EXISTED
     3. Existed user to create new address flagged as EXISTED_NEW
     */
    var address_flag;
    var district;
    var address1;
    var address2;
    var address_string;


    function next1() {

        if (true) {

            $.ajax({
                    url: '<?php echo URL; ?>order/queryAddressByCellphone/' + $('#cellphone').val(),
                    data: "",
                    dataType: 'json',
                    success: function (data) {
                        //alert('hi');
                        var content = '';
                        var count = 0;
                        if (data != '') {
                            var checked_index = '';
                            alert(data);
                            for (var i in data) {
                                var item = data[i];
                                var id = item['id'];
                                var radio_id = 'radio_existed' + i;
                                var address = item['province'] + item['city'] + item['district'] + item['address1'] + item['address2'];
                                content += '<div class="radio"><lable>';
                                content += '<input type="radio" name="address_id" id="' + radio_id + '" value="' + id + '" onclick="hide_address()">';
                                content += address + '</label></div>';

                                if (item['is_primary'] == 1) {
                                    var checked_index = i;
                                }
                                count++;
                            }
                            content += '<label class="col-sm-3 control-label"></label><div class="radio"><lable>';
                            content += '<input type="radio" name="address_id" id="radio_new" value="new_address" onclick="add_address()">';
                            content += '添加新的配送地址</label></div>';

                            $('#output').html(content);

                            $('#address_hint').html('选择已有配送地址');
                            if (address_flag == 'EXISTED_NEW') {
                                $('input[name=address_id]')[count].checked = "checked";
                            } else {
                                $('input[name=address_id]')[checked_index].checked = "checked";
                                district = data[checked_index]['district'];
                                address1 = data[checked_index]['address1'];
                                address2 = data[checked_index]['address2'];
                                address_string = district + address1 + address2;
                            }

                        } else {
                            address_flag = 'NEW';
                            //$('input:radio:checked').val() == 'new_address';
                            $('#address_hint').html('添加新的配送地址');
                            add_address();
                        }


                    }
                }
            )

        }
    }

    function validateAddress() {
        var is_new_address = ($('input:radio:checked').val() == null || $('input:radio:checked').val() == 'new_address');
        var district = $('#district').val();
        var address1 = $('#address1').val();
        var address2 = $('#address2').val();

        if (is_new_address && (district == '' || address1 == '' || address2 == '')) {
            alert('请添加完整地址');
            return false;
        } else {
            return true;
        }
    }

    function next2() {
        if (validateAddress()) {
            $('#basicwizard-step-2').css('display', 'none');
            $('#basicwizard-step-3').css('display', 'block');
            $('#basicwizard-head-2').removeClass('stepy-active');
            $('#basicwizard-head-3').addClass('stepy-active');
        }
    }

    function next3() {
        $('#basicwizard-step-3').css('display', 'none');
        $('#basicwizard-step-4').css('display', 'block');
        $('#basicwizard-head-3').removeClass('stepy-active');
        $('#basicwizard-head-4').addClass('stepy-active');

        var cellPhone = $("#cellphone").val();

        $('#cellphone_preview').html(cellPhone);

        //if ($('input:radio:checked').val() == 'new_address') {
        if (address_flag = 'EXISTED') {

        } else {
            var district = $('#district').val();
            var address1 = $('#address1').val();
            var address2 = $('#address2').val();
            var address = district + address1 + address2;
        }
        $('#address_preview').html('广东省广州市' + address_string);

    }

    function add_address() {
        address_flag = 'EXISTED_NEW';
        $('#new_address').css('display', 'block');
    }

    function hide_address() {
        address_flag = 'EXISTED';
        $('#new_address').css('display', 'none');
    }

    ///////////////////get nearest store/////////////////
    var distanceAllowed = <?php echo DELIVERY_DISTANCE; ?>;

    var myGeo = new BMap.Geocoder();
    var map = new BMap.Map("map");
    map.centerAndZoom("广州市", 12);         //初始化地图,设置中心点和地图级别
    var options = {renderOptions: {map: map, panel: "map"}};
    var myLocalsearch = new BMap.LocalSearch(map, options);
    var address = "";

    function check_address_location() {
        if ($.trim($("#address1").val()) == '') {
            setAlert('地址不合法或超出了广州海珠区，请重新尝试');
        } else {
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


