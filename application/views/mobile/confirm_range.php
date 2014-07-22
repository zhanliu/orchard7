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

                            <div class="alert alert-danger">
                                <h3>欢迎访问 Daily Fresh, 我猜您是首次访问我们吧, 为了确定您所在地区在配送范围内, 请输入配送地址的小区或者楼宇名。</h3>
                                <strong>注意:</strong> 当前配送范围仅限广州市海珠区部分区域
                            </div>

                            <div id="form-bg">
                                <fieldset>
                                    <form id="location_form" action="<?php echo URL; ?>mobile/showcase" method="post"
                                          class="form-horizontal">
                                        <input type="hidden" name="province" value="广东省">
                                        <input type="hidden" name="city" value="广州市">
                                        <input type="hidden" name="district" value="海珠区">

                                        <div class="form-group">
                                            <!--<label class="col-sm-3 control-label">广东省-广州市-海珠区</label>-->
                                            <div class="alert alert-info" id="alert_note" style="display:none"></div>
                                            <?php $address1 = empty($_COOKIE['address1']) ? "" : $_COOKIE['address1']; ?>

                                            <input type="text" id="address1" name="address1" style="width:90%;" size="20"
                                                   required="required" class="form-control" placeholder="输入小区名或大厦名..."
                                                   value="<?php echo $address1 ?>">

                                        </div>
                                        <input type="hidden" name="nearest_store_id" id="nearest_store_id" value="">
                                    </form>
                                    <div class="stepy-navigator panel-footer">
                                        <div class="pull-right">
                                            <a href="#" onclick="next();" class="btn btn-primary">下一步</a>
                                        </div>
                                    </div>
                                </fieldset>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="clr"></div>

    </div>
</div>
<style>
    a:visited {
        color: white;
    }
</style>

<div id="map" style="display:none"></div>
<script src="http://api.map.baidu.com/api?v=2.0&ak=8c8974690b10c942a37e0904f952ce35" type="text/javascript"></script>
<script type="text/javascript">

    var distanceAllowed = <?php echo DELIVERY_DISTANCE; ?>;

    var myGeo = new BMap.Geocoder();
    var map = new BMap.Map("map");
    map.centerAndZoom("广州市", 12);         //初始化地图,设置中心点和地图级别
    var options = {renderOptions: {map: map, panel: "map"}};
    var myLocalsearch = new BMap.LocalSearch(map, options);
    var address = "";

    function next() {
        if ($.trim($("#address1").val()) == '') {
            setAlert('地址不合法或超出了广州海珠区，请重新尝试');
        } else {
            address = '广东省广州市海珠区' + $("#address1").val();
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

                            if (distance < distanceAllowed) {
                                document.getElementById("location_form").submit();
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

    $("#search_address_button").click(function() {
        searchAddress();
    })

    var searchAddress = function() {
        $("#search_address input").blur();
        if (!tempCity) {
            utilities.ui.msg($("#userinfo_message_chooseCity").val())
            return
        } else {
            utilities.ui.showBusy()
            ajax1(API_SEARCH_ADDRESS, {
                cityCode : tempCity.citycode,
                keyword : $("#search_address input").val()
            }, function(ret) {
                utilities.ui.hideBusy()
                if (ret.err != -1) {
                    var data = JSON.parse(ret.cot);
                    console.log(data)
                    showSearchAddressPage(data)

                } else {
                    utilities.ui.msg(ret.msg)
                }
            })
        }
    }
    var showSearchAddressPage = function(data) {
        selector.open({
            title : $("#userinfo_message_residenceArea").val(),
            tip : $("#userinfo_message_inputKeyAddress").val(),
            display : 2,
            placeholder : $("#userinfo_message_inputResidenceKeyword").val(),
            specialtype : 2,
            searchable : true,
            citycode : tempCity.citycode,
            data : data,
            keyword : $("#search_address input").val()

        }, function(ret) {
            tempDisct = ret
            $(".userInfo-search input").val(tempDisct.streetName)
        })
    }
</script>
