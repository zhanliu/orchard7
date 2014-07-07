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

                    <form action="<?php echo URL; ?>mobile/showcase" method="post" class="form-horizontal">
                        <input type="hidden" name="province" value="广东省">
                        <input type="hidden" name="city" value="广州市">
                        <input type="hidden" name="district" value="越秀区">
                    <div id="form-bg">
                        <fieldset>
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

                            <div class="stepy-navigator panel-footer"><div class="pull-right">

                                    <a href="#" onclick="next()" class="btn btn-primary">Next <i class="fa fa-long-arrow-right"></i></a>
                                </div></div>
                        </fieldset>

                    </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>

<script src="http://api.map.baidu.com/api?v=2.0&ak=8c8974690b10c942a37e0904f952ce35" type="text/javascript"></script>
<script type="text/javascript">

    var distanceAllowed = 5;
    var shop_x = 23.120748;
    var shop_y = 113.291059;


    // location service
    function getLocation()
    {
        if (navigator.geolocation)
        {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else{
            alert("disabled");
        }
    }

    function showPosition(position)
    {
        your_x = position.coords.latitude;
        your_y = position.coords.longitude;

        var myGeo = new BMap.Geocoder();
        myGeo.getLocation(new BMap.Point(your_y, your_x), function(result){
            if (result){
                var addComp = rs.addressComponents;
                alert(addComp.province);
                alert(addComp.city);
                alert(addComp.district);
            }
        });
    };



    var myGeo = new BMap.Geocoder();

    function submit(){
        var value_address_1 = $("#address").val();
        myGeo.getPoint(value_address_1, function(point){
            if (point) {
                $.ajax({
                        url: '<?php echo URL; ?>location/getDistance/' + point.lat + '/' + point.lng,
                        data: "",
                        dataType: 'json',
                        success: function(data) {

                            if (data != '') {
                                if (data < distanceAllowed) {
                                    alert('您的位置距离海印广场' + data + " 千米, 在配送范围！");
                                    document.getElementById("locationform").submit();
                                } else {
                                    alert('您的位置距离海印广场' + data + " 千米, 不在配送范围。。。");
                                }
                            } else {
                                alert("nothing");
                            }
                        }
                    }
                )

            }
        }, "全国");
    };

</script>
