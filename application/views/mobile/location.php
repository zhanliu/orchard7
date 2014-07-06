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
                            <form action="/auth/signup" method="post" id="form-signup" autocomplete="on">

                                <input type="hidden" name="firstname" id="firstname" value=""/>
                                <input type="hidden" name="lastname" id="lastname" value=""/>

                                <fieldset>
                                    <div class="form-item">
                                        <input required="required" placeholder="email" type="email" name="email" autocorrect="off" autocapitalize="off" id="email"  title="Email Address" class="input-text validate-email required-entry"/>
                                    </div>
                                    <div class="form-item" id="passwordFieldWrapper">
                                        <input required="required" placeholder="enter password" type="password" pattern="^\S{6,}$" data-message="Please enter 6 or more characters, with no spaces." name="password" id="password" title="Password" class="input-text required-entry validate-password" />
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

                <script type="text/javascript">
                    $(document).ready( function() {
                        track('view', 'shopnow');
                        $("#forgot-password-shopnow").click(function (){
                            if($("#signup").attr("class") == 'auth'){
                                $(".loginText").hide();
                                $("#shopNowButton").html("Reset");
                            }else{
                                $(".loginText").show();
                                $("#shopNowButton").html("Shop Now")
                            }
                            $("#passwordFieldWrapper")
                                .toggleClass('passwordDisabled')
                                .toggle('fast');
                            $("#signup")
                                .toggleClass("auth")
                                .toggleClass("forgot-password-shopnow");

                            var theLoginFormJQueryObject = $("#form-signup");
                            if ( theLoginFormJQueryObject.attr("action") != "/auth/signup") {
                                $("#password").removeAttr('required');
                                theLoginFormJQueryObject.attr("action", "/auth/signup");
                            }
                            else {

                                $("#password").removeAttr('required');
                                theLoginFormJQueryObject.attr("action", "/auth/forgot");
                            }
                        });
                    });
                </script>
            </div>


        </div>
    </div>
</div>

<script id="compiledJs" type="text/javascript" src="https://zcdn.global.ssl.fastly.net/mobilejs/cache/e8da5b6ea75bf35eac961e222f7d09de.js"></script>

<script type="text/javascript">var zulily = {"user":{"is_logged_in":false}};</script>
<!-- START BrightTag -->
<script type="text/javascript">
    (function () {
        var tagjs = document.createElement("script");
        var s = document.getElementsByTagName("script")[0];
        tagjs.async = true;
        tagjs.src = "//s.btstatic.com/tag.js#site=e9qw5lm";
        s.parentNode.insertBefore(tagjs, s);
    }());
</script>
<!-- END BrightTag -->


<script type="text/javascript">window.NREUM||(NREUM={});NREUM.info={"beacon":"beacon-4.newrelic.com","licenseKey":"0c041ba3c1","applicationID":"2925230","transactionName":"NlIHZhZZD0FQVxZQCQ8YMEANFwhcVVEaFxYJRw==","queueTime":0,"applicationTime":72,"ttGuid":"","agentToken":"","userAttributes":"","errorBeacon":"bam.nr-data.net","agent":"js-agent.newrelic.com\/nr-411.min.js"}</script>

<script type="text/javascript">
    var total_price = 0;
    var unit = 0;
    function add(index) {

        var number_field_id = 'number_field_' + index;
        var div_id = 'div_' + index;
        var price_id = 'price_' + index;

        var number_field = document.getElementById(number_field_id);
        number_field.value++;
        unit++;

        $('#'+div_id).css('background', '#eeeeff');
        total_price+= Number($('#'+price_id).text());
        $('#num_cart').text(unit);
        $('#num_cart').css('display', 'inline');
    }

    function sub(index) {
        var number_field_id = 'number_field_' + index;
        var div_id = 'div_' + index;
        var price_id = 'price_' + index;

        var number_field = document.getElementById(number_field_id);

        if (number_field.value>0) {
            number_field.value--;
            unit--;
            total_price-= Number($('#'+price_id).text());
            $('#num_cart').text(unit);
        }

        if (number_field.value==0) {
            $('#num_cart').css('display', 'none');
            $('#'+div_id).css('background', 'none');
        }
    }

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