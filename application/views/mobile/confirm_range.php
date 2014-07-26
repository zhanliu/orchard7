<body>

<div id="st-container" class="st-container">
    <div class="st-pusher">


        <div class="st-content">
            <div class="st-content-inner">
                <div id="page-content">

                    <header class="newTodayView">
                        <nav class="shine dropShadow">
                            <a href="#">
                                <span class="logo floatLeft"></span>
                                <span class="tagline floatLeft">新鲜健康 <br>每一天</span>
                            </a>
                        </nav>
                    </header>
                    <div class="clr"></div>

                    <div id="page-inside">


                            <div class="alert alert-danger">
                                <h3>欢迎访问 Daily Fresh 鲜果快递, 您是首次访问我们吧, 为了确定您所在地区在配送范围内, 请输入配送地址的小区或楼宇名。</h3>
                                <strong>注意:</strong> 当前配送范围仅限广州市海珠区部分区域
                            </div>


                        <div id="pop" class="alert alert-warning"></div>

                            <div id="form-bg">
                                <fieldset>
                                    <form id="location_form" action="<?php echo URL; ?>mobile/showcase" method="post"
                                          class="form-horizontal">
                                        <input type="hidden" name="province" value="广东省">
                                        <input type="hidden" name="city" value="广州市">
                                        <input type="hidden" name="district" value="海珠区">

                                        <div class="form-group">
                                            <!--<label class="col-sm-3 control-label">广东省-广州市-海珠区</label>-->

                                            <?php $address1 = empty($_COOKIE['address1']) ? "" : $_COOKIE['address1']; ?>

                                            <input type="text" id="address1" name="address1" style="width:90%;" size="20"
                                                   required="required" class="form-control" placeholder="输入小区名或楼宇名..."
                                                   value="<?php echo $address1 ?>">

                                        </div>
                                        <input type="hidden" name="nearest_store_id" id="nearest_store_id" value="">
                                    </form>
                                    <div class="stepy-navigator panel-footer">
                                        <div class="page-button add ok" onclick="next()">
                                            <span class="text">确定</span>
                                        </div>
                                    </div>

                                    <img src="<?php echo URL; ?>public/img/mobile/full_map.jpg" style="width: 100%; height: auto">
                                </fieldset>

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
        $('#pop').html(msg);
        pop1.show();
    }

    //弹层接口
    var usePop = function(options){
        $.extend({
            name : "",
            delayHide : 3000 //延迟隐藏时间
        },options);
        //
        var hideFlag;
        var _pop = {};
        _pop.show = function(){
            $(options.name).stop(true,true).fadeIn(500);
            hideFlag = setTimeout(_pop.hide, options.delayHide);
        }
        _pop.hide = function(){
            clearTimeout(hideFlag);
            $(options.name).stop(true,true).fadeOut(500);
        }
        return _pop;
    };


    //自定义
    var pop1 = usePop({
        name:"#pop",
        delayHide:3000
    })
</script>
