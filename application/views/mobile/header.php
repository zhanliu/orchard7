
<?php
if (!session_id()) session_start();

// expire session if timeout
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > SESSION_TIMEOUT)) {
    // last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time
    session_destroy();   // destroy session data in storage
    session_start();
}

if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = new ShoppingCart();
}

// refresh session time
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Orchard7 | Something fresh every day</title>

    <meta charset="utf-8">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="cleartype" content="on">

    <link id="compiledCss" rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/jquery-ui-1.8.21.custom.css">
    <link id="compiledCss" rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/mobile.css">
    <link id="compiledCss" rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/css.css">
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/mobile-style.css" type="text/css" media="screen">
    <link href="<?php echo URL; ?>public/css/js-image-slider.css" rel="stylesheet" type="text/css" />


    <script src="<?php echo URL; ?>public/js/jquery-1.7.2.min.js"></script>

    <script src="<?php echo URL; ?>public/js/jquery-ui-1.8.21.custom.min.js"></script>
    <script src="<?php echo URL; ?>public/js/jquery.ui.Mask.js"></script>
    <script src="http://mzt.vip.com/cmstopic/app/design/js/lib/jquery/jquery.lazyload.js" type="text/javascript" charset="utf-8"></script>

    <script src="<?php echo URL; ?>public/js/js-image-slider.js" type="text/javascript"></script>
    <script type='application/javascript' src='<?php echo URL; ?>public/js/fastclick.min.js'></script>
</head>

<body>

<script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "//hm.baidu.com/hm.js?af92635aed30a982f9ea23990d5b33cb";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>


<div id="st-container" class="st-container">
    <div class="st-pusher">

        <div class="st-content">
            <div class="st-content-inner">
                <div id="page-content">

                    <header class="newTodayView">
                        <nav class="shine dropShadow">
                                <span class="floatLeft">
                                    <a href="<?php echo URL; ?>/mobile/showcase"><i class="text-icon fa fa-home" style="padding-top: 5px;"></i></a>
                                </span>
                            <span class="tagline floatLeft">Fruit Planet<br>新鲜健康每一天</span>
                                <span class="floatRight">
                                    <a href="#"><i class="text-icon fa fa-user" style="padding-top: 5px;"></i></a>
                                </span>
                        </nav>
                    </header>
                    <div class="clr"></div>


