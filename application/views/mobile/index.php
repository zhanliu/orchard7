<div id="container">
    <div id="main" role="main">
        <div id="contentWrapper">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h4>确认配送范围</h4>
                </div>

                <div class="panel-body">
                    <div class="alert alert-info">
                        <strong>注意!</strong> 当前配送范围仅限广州市越秀区
                    </div>


                    <div id="form-bg">
                        <fieldset>
                            <form id="location_form" action="<?php echo URL; ?>mobile/showcase" method="post" class="form-horizontal">
                                <input type="hidden" name="province" value="广东省">
                                <input type="hidden" name="city" value="广州市">
                                <input type="hidden" name="district" value="越秀区">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">广东省-广州市-越秀区</label>
                                <div class="col-sm-6">
                                    <input type="text" id="address1" name="address1" size="30" required="required" class="form-control" placeholder="输入路名和小区...">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label"></label>
                                <div class="col-sm-6">
                                    <input type="text" id="address2" name="address2" size="30" required="required" class="form-control" placeholder="输入楼栋和门牌号...">
                                </div>
                            </div>
                    </form>
                            <div class="stepy-navigator panel-footer"><div class="pull-right">
                                    <a href="#" onclick="next();" class="btn btn-primary">下一步<i class="fa fa-long-arrow-right"></i></a>
                                </div></div>
                        </fieldset>

                    </div>


                </div>

            </div>
        </div>
    </div>
</div>

<script src="http://api.map.baidu.com/api?v=2.0&ak=8c8974690b10c942a37e0904f952ce35" type="text/javascript"></script>
<script type="text/javascript">

    var distanceAllowed = 2;
    var shop_x = 23.120748;
    var shop_y = 113.291059;

    var myGeo = new BMap.Geocoder();

    function next(){
        var address = '广东省广州市越秀区' + $("#address1").val() + $("#address2").val();
        myGeo.getPoint(address, function(point){
            if (point) {
                alert(point.lat);
                alert(point.lng);
                var distance = getDistance(point.lat, point.lng);
                if (distance < distanceAllowed) {
                    alert('您的位置距离海印广场' + distance + " 千米, 在配送范围！");
                    document.getElementById("location_form").submit();
                } else {
                    alert('您的位置距离海印广场' + distance + " 千米, 不在配送范围。。。");
                }
            } else {
                alert("定位失败");
            }
        }, "全国");

    }

    function calculate_distance(lat1, lng1, lat2, lng2) {
        var R = 6371;
        var dLat = (lat1 - lat2) * Math.PI / 180;
        var dLon = (lng1 - lng2) * Math.PI / 180;
        var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
            Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) *
                Math.sin(dLon / 2) * Math.sin(dLon / 2);
        var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
        return R * c;
    }

    function getDistance(x, y) {
        return calculate_distance(shop_x, shop_y, x, y);

    }

</script>
