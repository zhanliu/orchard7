<?php
//if (!empty($_COOKIE['uif'])) {echo($_COOKIE['uif']);}
//else {
//    setcookie('uif','',time()-3600);
//    setcookie('uif','zzz',time()+3600*24*365);
//    //echo "8888";
//}
?>
<body>

<?php
if (!empty($_COOKIE['uaccess_time'])) {
    $count = $_COOKIE['uaccess_time'];
} else {
    $count = 0;
}
?>

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
                                            <input type="text" id="block" name="block" style="width:90%;" size="20"
                                                   required="required" class="form-control" placeholder="输入小区名或楼宇名..."
                                                   value="<?php if (!empty($_COOKIE['uif'])) {
                                                       echo($_COOKIE['uif']);
                                                   } ?>">

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
    map.centerAndZoom("广州市", 12);         //初始化地图。设置中心点和地图级别
    var options = {renderOptions: {map: map, panel: "map"}};
    var myLocalsearch = new BMap.LocalSearch(map, options);
    var address = "";

    function next() {
        if ($.trim($("#block").val()) == '') {
            setAlert('地址不合法或超出了广州海珠区，请重新尝试');
        } else {
            address = '广东省广州市海珠区' + $("#block").val();

            myLocalsearch.setSearchCompleteCallback(calculate_distance);
            myLocalsearch.search(address);
        }
    }

    function calculate_distance() {
        if (myLocalsearch.getStatus() != 0) {
            //alert('地址不合法或超出了广州海珠区，请重新尝试');
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
                                var store_id = data['store_id'];
                                var address = data['address'];

                                if (distance < distanceAllowed) {
                                    alert('您的位置距离配送中心' + address + distance + " 千米, 在配送范围！");
                                    $("#nearest_store_id").val(store_id);
                                    document.getElementById("location_form").submit();
                                } else {
                                    alert('您的位置距离配送中心' + address + distance + " 千米, 不在配送范围。。。");
                                    //$('#form-bg').html('');
                                    setAlert('本小区尚未开通宅急送服务，请稍候时日，多谢支持！');
                                }
                            } else {
                                alert("计算距离失败");
                                setAlert('计算距离失败!');
                            }
                        }
                    }
                )

            } else {
                alert("定位失败");
            }
        }, "全国");
    }

    function setAlert(msg) {
        $('#alert_note').html(msg);
        $('#alert_note').addClass("alert-warning");
        $('#alert_note').css('display', 'block');
    }
</script>
