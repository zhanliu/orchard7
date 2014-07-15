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


                        <form action="<?php echo URL; ?>mobile/submitCellphone" id="myform"
                              class="form-horizontal confirm-form" method="post">

                            <div class="panel-body">
                                <fieldset title="确认订单" id="basicwizard-step-1" class="stepy-step"
                                          style="display: block;">
                                    <div class="form-group">
                                        <div class="label">输入手机</div>

                                        <?php if (!empty($_COOKIE['ucellphone'])) {
                                            $cellphone = $_COOKIE['ucellphone'];
                                        } else {
                                            $cellphone = "";
                                        }
                                        ?>

                                        <div>
                                            <div class="value">
                                                <div class="icon username"><span></span></div>
                                                <div class="input" style="position: relative; z-index: 1;">
                                                    <input type="text" name="cellphone" value="<?php echo $cellphone ?>"
                                                           placeholder="输入手机号码" id="cellphone">
                                                    <ul class="email-list" style="display: none;"></ul>
                                                    <span class="close-btn"></span>
                                                </div>
                                            </div>
                                            <div class="errorMsg">
                                                <p></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="stepy-navigator panel-footer">
                                        <div class="page-button submit">
                                            <a href="#" onclick="next()"><span class="text">下一步</span></a>
                                        </div>
                                    </div>

                                    <div class="page-tipsTitle">友情提示</div>
                                    <div class="page-tipsContent"><br>

                                        <p>1.如果您是首次订餐，请输入您常用的手机号码。这将作为您今后登录的唯一用户信息，如有遗忘，您需重新注册。</p><br>

                                        <p>2.如果您曾使用我们的订餐服务，请输入您上次使用的手机号码。</p><br>

                                        <p>3.请妥善保管您的手机以免信息被不当使用。</p><br>

                                        <p>4.送餐区域正餐供应时间为10:00-22:00。</p><br>

                                        <p>5.急送实行专属菜单及价格，不同城市、不同送餐区域的菜单有所不同。不同时段产品品项及价格有所不同。详情请以输入送餐地址后显示的菜单为准。</p><br>

                                        <p>6.为保证产品品质, Daily Fresh 急送各门店有送餐范围限制，若您的送餐地址不在送餐范围内造成无法送餐，敬请原谅！</p>
                                    </div>
                                </fieldset>


                            </div>
                            <input type="hidden" name="block" value="<?php echo $block; ?>">
                            <input type="hidden" name="submit_cellphone" value="true">
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <div class="clr"></div>

    </div>
</div>


<script>
    function next() {
        var isValid = validateCellphone();
        if (isValid) {
            document.getElementById("myform").submit();
        }
        return true;
    }

    function validateCellphone() {
        var cellPhone = $("#cellphone").val();
        var RegCellPhone = /^([0-9]{11})?$/;
        var flag = cellPhone.search(RegCellPhone);
        if (cellPhone.length == 0 || flag == -1) {
            alert("手机号不合法!");
            return false;
        } else {
            return true;
        }
    }
</script>


