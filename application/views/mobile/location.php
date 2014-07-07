<div id="container">
    <div id="main" role="main">
        <div id="contentWrapper">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h4>确认配送范围</h4>
                </div>

                <div class="panel-body">

                    <div class="form-padding">
                        <div id="form-bg">
                            <form action="<?php echo URL; ?>mobile/showcase" method="post" target="_parent" id="locationform" class="form-horizontal">
                                <fieldset>
                                    <div class="form-item">
                                        <input id= "address" required="required" placeholder="您要配送的大楼或小区..." type="address" name="address" class="form-control"/>
                                    </div>
                                </fieldset>

                                <a title="start shopping now" class="ok" id="shopNowButton" onclick="submit()">开始查找</a>
                            </form>
                        </div>

                    </div>


                    <div id="why-join">
                        <div class="centerbox">
                            <h3>请输入关键字让我们知道您是否在配送范围内，例如:</h3>
                            <ul>
                                <li>海印广场</li>
                                <li>又一城</li>
                                <li>TIT创意园</li>
                            </ul>
                            <h3>说明: 当前分店仅分布于广州市海印区</h3>
                        </div>
                    </div>
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

        //alert(value_address_1);
        var myGeo = new BMap.Geocoder();
        myGeo.getLocation(new BMap.Point(your_y, your_x), function(result){
            if (result){
                var addComp = rs.addressComponents;
                //document.getElementById("address_2").innerHTML = addComp.province + addComp.city + addComp.district + addComp.street + addComp.streetNumber;
                alert(addComp.province);
                alert(addComp.city);
                alert(addComp.district);
            }
        });
    };

//    $(document).ready(function(){
//        getLocation();
//    });

    //创建地址解析的实例
    var myGeo = new BMap.Geocoder();
    //地址解析的函数
    function submit(){
        var value_address_1 = $("#address").val();
        //alert(value_address_1);
//        myGeo.getPoint(value_address_1, function(point){
//            if (point) {
//                alert(point.lat + ";" + point.lng);
//            } else {
//
//            }
//        });

        myGeo.getPoint(value_address_1, function(point){
            if (point) {
//                alert(point.lat);
//                alert(point.lng);

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
//                myGeo.getLocation(point, function(rs){
//                    var addComp = rs.addressComponents;
//                    //document.getElementById("address_2").innerHTML = addComp.province + addComp.city + addComp.district + addComp.street + addComp.streetNumber;
//                    alert(addComp.province);
//                    alert(addComp.city);
//                    alert(addComp.district);
//                    alert(addComp.street);
//                    alert(addComp.streetNumber);
//                });
                //document.cookie = 'address1='+point.lat;
            }
        }, "全国");
    };

</script>
