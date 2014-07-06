<div id="container">
    <div id="main" role="main">
        <div id="contentWrapper">
            <div id="authView" class="view current" data-url="/auth/signup/?ref=auth">
                <div id="header">
                    <span class="auth_tagline">something special<br>every day</span>
                </div>


                <div id="signup" class="auth">
                    <div class="form-padding">
                        <div id="form-bg">
                            <form action="" method="post" id="form-signup" autocomplete="on">

                                <input type="hidden" name="firstname" id="firstname" value=""/>
                                <input type="hidden" name="lastname" id="lastname" value=""/>

                                <fieldset>
                                    <div class="form-item">
                                        <input required="required" placeholder="您要配送的街道或小区..." type="address" name="address" autocorrect="off" autocapitalize="off" id="email"  title="地址" class="input-text validate-email required-entry"/>
                                    </div>
                                </fieldset>

                                <button type="submit" title="start shopping now" class="ok" id="shopNowButton">开始定位</button>


                            </form>
                        </div>
                    </div>
                </div>

                <div id="why-join">
                    <div class="centerbox">
                        <h2>水果的妙用</h2>
                        <ul>
                            <li>养生之道</li>
                            <li>变废为宝，奇妙的果皮</li>
                        </ul>
                    </div>
                </div>

                <div class="sliderContainer visibleNearby fullWidth clearfix">
                    <div class="centerbox"><h2>今日</h2></div>
                    <div id="gallery-1" class="royalSlider rsDefault">
                        <a class="rsImg"  data-rsDelay="1000"  href="https://zcdn.global.ssl.fastly.net/images/cache/event/200x1000/89762_merrellwomen_HP_2014_0702_SJO1_2_1403829409.jpg"><span class="description">apparel & footwear</span></a>
                    </div>
                </div>


            </div>


        </div>
    </div>
</div>


<script type="text/javascript">
    var total_price = 0;
    var unit = 0;
    var vip_x = 23.105962;
    var vip_y = 113.237056;

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
        alert("Latitude: " + position.coords.latitude + "<br />Longitude: " + position.coords.longitude);
    }

    $(document).ready(function(){
        getLocation();
    });
</script>