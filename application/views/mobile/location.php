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
                            <form action="" method="post" id="form-signup" autocomplete="on">

                                <fieldset>
                                    <div class="form-item">
                                        <input required="required" placeholder="您要配送的大楼或小区..." type="address" name="address" class="form-control"/>
                                    </div>
                                </fieldset>

                                <button type="submit" title="start shopping now" class="ok" id="shopNowButton">开始查找</button>
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


<script type="text/javascript">
    var total_price = 0;
    var unit = 0;
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
                        alert('您的位置距离维品会' + data + " 千米");

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
</script>