<HTML>
<HEAD>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
</HEAD>
<BODY>
<link type="text/css" rel="stylesheet" href="/orchard7/public/css/login-style.css">
<div id="wrapper">

    <form name="login-form" class="login-form" action="<?php echo URL; ?>common/validateLogin" method="post">

        <div class="header">
            <h1>果园7号平台登录</h1>
        </div>

        <div class="content">
            <input name="login" type="text" class="input username" placeholder="登录名" />
            <div class="user-icon"></div>
            <input name="password" type="password" class="input password" placeholder="密码" />
            <div class="pass-icon"></div>
        </div>

        <div class="footer">
            <input type="submit" name="submit" value="登录" class="button" />
            <!--<input type="submit" name="submit" value="Register" class="register" />-->
        </div>

    </form>

</div>
<div class="gradient"></div>
</BODY>
</HTML>
