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

                                <fieldset>
                                    <div class="form-item">
                                        <input required="required" placeholder="您要配送的大楼或小区..." id="address" name="address" class="form-control"/>
                                    </div>
                                </fieldset>

                                <button type="submit" title="start shopping now" class="ok" id="shopNowButton" onclick="submit()">开始查找</button>

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
    //var vip_x = 23.105962;
    //var vip_y = 113.237056;

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
        $.ajax({
                url: '<?php echo URL; ?>location/getDistance/' + position.coords.latitude + '/' + position.coords.longitude,
                data: "",
                dataType: 'json',
                success: function(data) {

                    if (data != '') {

                        var alertResult = "";
                        if (data < distanceAllowed) {
                            alert('您的位置距离维品会' + data + " 千米, 在配送范围！");
                        } else {
                            alert('您的位置距离维品会' + data + " 千米, 不在配送范围。。。");
                        }

                    } else {
                        alert("nothing");
                    }
                }
            }
        )

    }

    $(document).ready(function(){
        getLocation();
    });

    //创建地址解析的实例
    var myGeo = new BMap.Geocoder();
    //地址解析的函数
    function submit(){
        var value_address_1 = document.getElementById("address").value;
        myGeo.getPoint(value_address_1, function(point){
            if (point) {
                alert(point.lat);
                myGeo.getLocation(point, function(rs){
                    var addComp = rs.addressComponents;
                    //document.getElementById("address_2").innerHTML = addComp.province + addComp.city + addComp.district + addComp.street + addComp.streetNumber;
                    alert(addComp.province);
                    alert(addComp.city);
                    alert(addComp.district);
                    alert(addComp.street);
                    alert(addComp.streetNumber);
                });
                //document.cookie = 'address1='+point.lat;
            }
        }, "全国");
    }

</script>
