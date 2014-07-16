
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

                        <div class="full-content">


                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="clr"></div>

    </div>
</div>


<html><head>
    <title>肯德基宅急送 登录</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!--,target-densitydpi=device-dpi-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0,minimum-scale=1.0, user-scalable=0">
    <meta name="format-detection" content="telephone=no">
    <meta name="format-detection" content="email=no">
    <meta name="format-detection" content="address=no">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <!--  business css -- start -->
    <link href="css/common.css" rel="stylesheet" type="text/css">
    <link href="css/login.css" rel="stylesheet" type="text/css">
    <link href="css/userInfo.css" rel="stylesheet" type="text/css">
    <link href="css/adress.css" rel="stylesheet" type="text/css">

    <!--  libs -- start -->
    <script src="libs/jquery-2.0.3.min.js" type="text/javascript"></script>
    <script src="libs/am.js" type="text/javascript"></script><script type="text/javascript" src="libs/sdc_kfc_mos.js"></script>
    <!--  libs -- end -->
    <script src="js/shoppingcart.js" type="text/javascript"></script>
    <script src="js/login.js" type="text/javascript"></script>
    <script src="js/selector.js" type="text/javascript"></script>
    <script src="js/timeWheel.js" type="text/javascript"></script>


    <link rel="apple-touch-icon" sizes="114x114" href="images/114_114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="images/120_120.png">
</head>
<body>
<input type="hidden" id="common_error_netErr" value="由于网络故障无法连接服务器，请稍后重试">
<input type="hidden" id="login_message_passwordEmail" value="设置密码的链接已经发送至您的邮箱，请查看邮件并设置密码">
<input type="hidden" id="login_message_wrongEmail" value="输入的电话或邮箱信息不正确">
<input type="hidden" id="login_message_errorReason" value="设置密码邮件发送失败,错误原因:">
<input type="hidden" id="login_message_limited" value="网站功能受限！您可能使用了浏览器的“无痕浏览模式”或禁用了cookie！请重新设置浏览器后，继续点餐。">
<input type="hidden" id="login_message_inputRightEmailOrMobile" value="请输入正确的邮箱或者手机">
<input type="hidden" id="login_message_emptyEmail" value="邮箱输入为空">
<input type="hidden" id="login_message_inputRightEmail" value="请输入正确的邮箱">
<input type="hidden" id="login_message_emptyPassword" value="密码输入为空">
<input type="hidden" id="login_message_userNotFound" value="该用户不存在，请确认登陆信息是否正确">
<input type="hidden" id="login_message_wrongPassword" value="输入的密码不正确">
<input type="hidden" id="userinfo_message_hotCity" value="热门城市">
<input type="hidden" id="userinfo_html_probablyIn" value="您可能在">
<input type="hidden" id="userinfo_message_failedToLocate" value="定位失败">
<input type="hidden" id="userinfo_message_locating" value="正在定位">

<div class="page-app login">
    <div class="page-header_box">
        <div class="page-header_boxInner">
            <div class="page-header">
                <a class="head-button-left backhome page-button bright" href="index.htm"><span class="icon"></span>首页</a>
                <p>登 录</p>
            </div>
        </div>
    </div>
    <div class="page-header_boxPH"></div>

    <div class="login-tabContent">
        <div class="login-form">
            <div id="block_uid1">
                <div class="label">输入电子邮箱或手机才能开始订餐</div>
                <div>
                    <div class="errorBox show"><div class="value errorBorder">
                            <div class="icon username"><span></span></div>
                            <div class="input" style="position: relative; z-index: 1;">
                                <input type="email" name="username" value="" placeholder="输入手机或电子邮箱" id="uid1" style="width: 95%"><ul class="email-list" style="display:none"></ul>
                                <span class="close-btn"></span>
                            </div>
                        </div><div class="errorMsg" style="width: 280px;"><p>请输入正确的邮箱或者手机</p></div></div>
                    <div class="errorMsg">
                        <p>
                        </p>
                    </div>
                </div>
            </div>
            <div id="block_uid2" style="display: none">
                <div class="label">麻烦在此输入电子邮箱,才能找到您的送餐信息</div>
                <div>
                    <div class="value">
                        <div class="icon mail"><span></span></div>
                        <div class="input" style="position: relative; z-index: 1;">
                            <input type="email" name="email" value="" placeholder="输入电子邮箱" id="uid2"><ul class="email-list" style="display:none"></ul>
                        </div>
                    </div>
                    <div class="errorMsg">
                        <p></p>
                    </div>
                </div>
            </div>
            <div id="block_pwd" style="display: none">
                <div class="label">密码</div>
                <div>
                    <div class="value">
                        <div class="icon lock"><span></span></div>
                        <div class="input">
                            <input type="password" name="pass" value="" placeholder="输入密码" id="pwd">
                        </div>
                    </div>
                    <div class="errorMsg">
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="login-checkBox">
                <div class="login-forgotPass" style="display:none">忘记密码？</div>
                <div class="am-clickable page-checkBox" id="remenberMe">记住我</div>
            </div>

            <div class="page-button" id="next">下一步</div>

            <div class="page-tipsTitle">友情提示</div>
            <div class="page-tipsContent">
                <p>1.如果您是首次订餐，请输入您常用的电子邮件或手机号码。这将作为您今后登录的唯一用户信息，如有遗忘，您需重新注册。</p>
                <p>2.如果您曾使用我们的订餐服务，请输入您上次使用的电子邮箱或手机号码。</p>
                <p>3.使用“记住我”功能可以帮助您记住您订餐时使用的手机或邮箱信息。请妥善保管您的手机以免信息被不当使用。</p>
                <p>4.早餐、夜宵仅限24小时送餐区域供应，非24小时送餐区域正餐供应时间为10:00-22:00。</p>
                <p>5.肯德基宅急送实行专属菜单及价格，不同城市、不同送餐区域的菜单有所不同。不同时段产品品项及价格有所不同。详情请以输入送餐地址后显示的菜单为准。</p>
                <p>6.为保证产品品质，肯德基宅急送各门店有送餐范围限制，若您的送餐地址不在送餐范围内造成无法送餐，敬请原谅！</p>
            </div>
        </div>
    </div>

</div>



<img src="http://dt.yum.com.cn/dcsoye69k00000w4dihnwa22c_7u5p/dcs.gif?WT.branch=kfc_mwos&amp;dcssip=m.4008823823.com.cn&amp;dcsuri=%2fkfcmwos%2fhomeservice.do&amp;wt.es=http%3a%2f%2fm.4008823823.com.cn%2fkfcmwos%2fhomeservice.do%3flocale%3dzh_cn&amp;dcsqry=%3flocale%3dzh_cn&amp;dcsref=http%3a%2f%2fm.4008823823.com.cn%2fkfcmwos%2findex.htm&amp;wt.sr=320x568&amp;wt.co_f=29ad10496837ad290611405478417549&amp;dcsdat=1405478420040"><img src="http://dt.yum.com.cn/dcsoye69k00000w4dihnwa22c_7u5p/dcs.gif?WT.branch=kfc_mwos&amp;dcssip=m.4008823823.com.cn&amp;dcsuri=%2fkfcmwos%2fhomeservice.do&amp;wt.es=http%3a%2f%2fm.4008823823.com.cn%2fkfcmwos%2fhomeservice.do%3flocale%3dzh_cn&amp;dcsqry=%3flocale%3dzh_cn&amp;dcsref=http%3a%2f%2fm.4008823823.com.cn%2fkfcmwos%2findex.htm&amp;wt.sr=320x568&amp;wt.co_f=29ad10496837ad290611405478417549&amp;dcsdat=1405478421866&amp;wt.event=logon1&amp;wt.msg=next"></body></html>