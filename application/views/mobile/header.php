<?php
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}
?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Orchard7 | Something fresh every day</title>

    <meta charset="utf-8">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="cleartype" content="on">
    <link id="compiledCss" rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/mobile.css">
    <script src="<?php echo URL; ?>public/js/jquery-1.10.2.js"></script>
</head>


<body class="newTodayView">
<header>
    <nav class="shine dropShadow">
        <a href="#">
            <span class="logo floatLeft"></span>
            <span class="tagline floatLeft">新鲜健康 <br>每一天</span>
        </a>
        <em id="num_cart" class="num_cart hide"></em>
        <a href="<?php echo URL; ?>mobile/checkout" class="floatRight"><span class="cart"></span></a>
        <div id="menuIcon" class="floatRight" data-event="toggle-menu"><span id="menuDown" class="menu down"></span></div>
    </nav>
</header>