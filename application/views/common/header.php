<?php
if (!session_id()) session_start();
  if (!isset($_SESSION['login'])) {
      header('location: ' . URL . 'common/login');
  }
?>
<!DOCTYPE html>
<!-- saved from url=(0041)http://redteamux.com/avant/ui-buttons.php -->
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Orchard7</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/orchard7/public/css/styles.min.css">
    <link href="/orchard7/public/css/css.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="/orchard7/public/css/lightbox-form.css">
    <link type="text/css" rel="stylesheet" href="/orchard7/public/css/default.css">
    <link href="/orchard7/public/css/default.css" rel="stylesheet" type="text/css" media="all" id="styleswitcher">
    <link href="/orchard7/public/css/default.css" rel="stylesheet" type="text/css" media="all" id="headerswitcher">
    <link rel="stylesheet" type="text/css" href="/orchard7/public/css/prettify.css">
    <link rel="stylesheet" type="text/css" href="/orchard7/public/css/toggles.css">
    <link rel="stylesheet" type="text/css" href="/orchard7/public/css/jquery.datatable.css">

    <script src="/orchard7/public/js/jquery-1.10.2.js"></script>
    <script src="/orchard7/public/js/jquery.datatable.js"></script>
    <script src="/orchard7/public/js/jqueryui-1.10.3.min.js"></script>
    <script src="/orchard7/public/js/bootstrap.min.js"></script>
    <script src="/orchard7/public/js/enquire.js"></script>
    <script src="/orchard7/public/js/jquery.cookie.js"></script>
    <script src="/orchard7/public/js/jquery.nicescroll.min.js"></script>
    <script src="/orchard7/public/js/prettify.js"></script>
    <script src="/orchard7/public/js/jquery.easypiechart.min.js"></script>
    <script src="/orchard7/public/js/jquery.sparklines.min.js"></script>
    <script src="/orchard7/public/js/toggle.min.js"></script>
    <script src="/orchard7/public/js/placeholdr.js"></script><style>.placeholdr{color:#AAA;}</style>
    <script src="/orchard7/public/js/application.js"></script>
    <script src="/orchard7/public/js/demo.js"></script>
    <script src="/orchard7/public/js/lightbox-form.js" type="text/javascript"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries. Placeholdr.js enables the placeholder attribute -->
    <!--[if lt IE 9]>
    <link rel="stylesheet" href="assets/css/ie8.css">
    <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.1.0/respond.min.js"></script>
    <script type="text/javascript" src="assets/plugins/charts-flot/excanvas.min.js"></script>
    <![endif]-->

    <!-- The following CSS are included as plugins and can be removed if unused-->

    <style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style>
    <style>
        .add_object_button_div {
            background:#333333 url(images/plus.png) 85% 55% no-repeat;
            position:	absolute;
            top:		12%;
            right:		0;
            width:		auto;
            height:		auto;
            padding:	5px 10px;
            text-align:	center;
            border:		1px solid #999;
        }
        .panel{
            position:absolute;
            top:8%;
            left:40%;
            display:none;
            background:#e6e7e8;
            border:1px solid #111111;
            -moz-border-radius-topleft:10px;
            -webkit-border-top-left-radius:10px;
            -moz-border-radius-bottomleft:10px;
            -webkit-border-bottom-left-radius:10px;
            -moz-border-radius-topright:10px;
            -webkit-border-top-right-radius:10px;
            -moz-border-radius-bottomright:10px;
            -webkit-border-bottom-right-radius:10px;
            width:auto;
            height:auto;
            padding:30px 30px 30px 30px;
            filter:alpha(opacity=98);opacity:.98;}
        .panel p{
            margin:0 0 15px 0;
            padding:0;
            color:#cccccc;}
        .panel a,.panel a:visited{
            margin:0;
            padding:0;
            color:#9FC54E;
            text-decoration:none;
            border-bottom:1px solid #9FC54E;}
        .panel a:hover,.panel a:visited:hover{
            margin:0;padding:0;
            color:#ffffff;
            text-decoration:none;
            border-bottom:1px solid #ffffff;}

        .container th {
            text-align: center;
        }
    </style>

</head>

<body class="" style="">
<script async="" src="/orchard7/public/js/analytics.js"></script>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-44426473-2', 'redteamux.com');
    ga('send', 'pageview');
</script>

<div id="headerbar">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-sm-2">
                <a href="http://redteamux.com/avant/ui-buttons.php#" class="shortcut-tiles tiles-brown">
                    <div class="tiles-body">
                        <div class="pull-left"><i class="fa fa-pencil"></i></div>
                    </div>
                    <div class="tiles-footer">
                        Create Post
                    </div>
                </a>
            </div>
            <div class="col-xs-6 col-sm-2">
                <a href="http://redteamux.com/avant/ui-buttons.php#" class="shortcut-tiles tiles-grape">
                    <div class="tiles-body">
                        <div class="pull-left"><i class="fa fa-group"></i></div>
                        <div class="pull-right"><span class="badge">2</span></div>
                    </div>
                    <div class="tiles-footer">
                        Contacts
                    </div>
                </a>
            </div>
            <div class="col-xs-6 col-sm-2">
                <a href="http://redteamux.com/avant/ui-buttons.php#" class="shortcut-tiles tiles-primary">
                    <div class="tiles-body">
                        <div class="pull-left"><i class="fa fa-envelope-o"></i></div>
                        <div class="pull-right"><span class="badge">10</span></div>
                    </div>
                    <div class="tiles-footer">
                        Messages
                    </div>
                </a>
            </div>
            <div class="col-xs-6 col-sm-2">
                <a href="http://redteamux.com/avant/ui-buttons.php#" class="shortcut-tiles tiles-inverse">
                    <div class="tiles-body">
                        <div class="pull-left"><i class="fa fa-camera"></i></div>
                        <div class="pull-right"><span class="badge">3</span></div>
                    </div>
                    <div class="tiles-footer">
                        Gallery
                    </div>
                </a>
            </div>

            <div class="col-xs-6 col-sm-2">
                <a href="http://redteamux.com/avant/ui-buttons.php#" class="shortcut-tiles tiles-midnightblue">
                    <div class="tiles-body">
                        <div class="pull-left"><i class="fa fa-cog"></i></div>
                    </div>
                    <div class="tiles-footer">
                        Settings
                    </div>
                </a>
            </div>
            <div class="col-xs-6 col-sm-2">
                <a href="http://redteamux.com/avant/ui-buttons.php#" class="shortcut-tiles tiles-orange">
                    <div class="tiles-body">
                        <div class="pull-left"><i class="fa fa-wrench"></i></div>
                    </div>
                    <div class="tiles-footer">
                        Plugins
                    </div>
                </a>
            </div>

        </div>
    </div>


</div>
<header class="navbar navbar-inverse navbar-fixed-top" role="banner">
    <a id="leftmenu-trigger" class="tooltips" data-toggle="tooltip" data-placement="right" title="" data-original-title="Toggle Sidebar"></a>
    <a id="rightmenu-trigger" class="tooltips" data-toggle="tooltip" data-placement="left" title="" data-original-title="Toggle Infobar"></a>

    <div class="navbar-header pull-left">
        <a class="navbar-brand" href="http://redteamux.com/avant/index.php">Avant</a>
    </div>

    <ul class="nav navbar-nav pull-right toolbar">
        <li class="dropdown">
            <a href="http://redteamux.com/avant/ui-buttons.php#" class="dropdown-toggle username" data-toggle="dropdown"><span class="hidden-xs">John McCartney <i class="fa fa-caret-down"></i></span><img src="/orchard7/public/img/dangerfield.png" alt="Dangerfield"></a>
            <ul class="dropdown-menu userinfo arrow">
                <li class="username">
                    <a href="http://redteamux.com/avant/ui-buttons.php#">
                        <div class="pull-left"><img src="/orchard7/public/img/dangerfield.png" alt="Jeff Dangerfield"></div>
                        <div class="pull-right"><h5>Hello <?php echo $_SESSION['login']; ?>!</h5><small>Logged in as <span>Admin</span></small></div>
                    </a>
                </li>
                <li class="userlinks">
                    <ul class="dropdown-menu">
                        <li><a href="http://redteamux.com/avant/ui-buttons.php#">Edit Profile <i class="pull-right fa fa-pencil"></i></a></li>
                        <li><a href="http://redteamux.com/avant/ui-buttons.php#">Account <i class="pull-right fa fa-cog"></i></a></li>
                        <li><a href="http://redteamux.com/avant/ui-buttons.php#">Help <i class="pull-right fa fa-question-circle"></i></a></li>
                        <li class="divider"></li>
                        <li><a href="/orchard7/common/logout" class="text-right">Sign Out</a></li>
                    </ul>
                </li>
            </ul>
        </li>


    </ul>
</header>

<div id="page-container">
    <!-- BEGIN SIDEBAR -->
    <nav id="page-leftbar" role="navigation">
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="acc-menu" id="sidebar" style="top: 40px;">
            <li id="search">
                <a href="javascript:;"><i class="fa fa-search opacity-control"></i></a>
                <form>
                    <input type="text" class="search-query" placeholder="Search...">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </li>
            <li class="divider"></li>
            <li><a href="/orchard7/home/"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
            <li class="hasChild"><a href="javascript:;"><i class="fa fa-pencil"></i> <span>权限管理</span>
                    <span class="badge badge-primary">5</span></a>
                <ul class="acc-menu">
                    <li><a href="/orchard7/privilege/role">角色管理</a></li>
                    <li><a href="/orchard7/privilege/credential">人员管理</a></li>
                </ul>
            </li>
            <li class="hasChild"><a href="javascript:;"><i class="fa fa-th"></i> <span>资产中心</span> </a>
                <ul class="acc-menu">
                    <li><a href="/orchard7/admin/store"><span>店铺管理</span></a></li>
                </ul>
            </li>
            <li class="hasChild"><a href="javascript:;"><i class="fa fa-list-ol"></i> <span>库存管理</span> <span class="badge badge-indigo">4</span></a>
                <ul class="acc-menu" style="display: none;">
                    <li><a href="/orchard7/admin/category">类目管理</a></li>
                    <li><a href="/orchard7/admin/product">商品管理</a></li>
                    <li><a href="/orchard7/admin/combo">套餐管理</a></li>
                </ul>
            </li>
            <li class="hasChild"><a href="javascript:;"><i class="fa fa-tasks"></i> <span>订单中心</span> <span class="badge badge-info">12</span></a>
                <ul class="acc-menu">
                    <li><a href="/orchard7/admin/addOrderStepOne">订单添加</a></li>
                    <li><a href="/orchard7/admin/order">订单管理</a></li>
                </ul>
            </li>
            <li class="hasChild"><a href="javascript:;"><i class="fa fa-table"></i> <span>会员中心</span></a>
                <ul class="acc-menu">
                    <li><a href="/orchard7/admin/customer">客户管理</a></li>
                </ul>
            </li>

            <li class="hasChild"><a href="javascript:;"><i class="fa fa-map-marker"></i> <span>Maps</span></a>
                <ul class="acc-menu">
                    <li><a href="http://redteamux.com/avant/maps-google.php">Google Maps</a></li>
                    <li><a href="http://redteamux.com/avant/maps-vector.php">Vector Maps</a></li>
                </ul>
            </li>
            <li class="hasChild"><a href="javascript:;"><i class="fa fa-bar-chart-o"></i> <span>Charts</span></a>
                <ul class="acc-menu">
                    <li><a href="http://redteamux.com/avant/charts-flot.php">Extensible</a></li>
                    <li><a href="http://redteamux.com/avant/charts-svg.php">Interactive</a></li>
                    <li><a href="http://redteamux.com/avant/charts-canvas.php">Lightweight</a></li>
                    <li><a href="http://redteamux.com/avant/charts-inline.php">Inline</a></li>
                </ul>
            </li>
            <li><a href="http://redteamux.com/avant/calendar.php"><i class="fa fa-calendar"></i> <span>Calendar</span></a></li>
            <li><a href="http://redteamux.com/avant/gallery.php"><i class="fa fa-camera"></i> <span> Gallery</span> </a></li>
            <li class="hasChild"><a href="javascript:;"><i class="fa fa-flag"></i> <span>Icons</span> <span class="badge badge-orange">2</span></a>
                <ul class="acc-menu">
                    <li><a href="http://redteamux.com/avant/icons-fontawesome.php">Font Awesome</a></li>
                    <li><a href="http://redteamux.com/avant/icons-glyphicons.php">Glyphicons</a></li>
                </ul>
            </li>
            <li class="divider"></li>
            <li class="hasChild"><a href="javascript:;"><i class="fa fa-briefcase"></i> <span>Extras</span> <span class="badge badge-danger">1</span></a>
                <ul class="acc-menu">
                    <li><a href="http://redteamux.com/avant/extras-timeline.php">Timeline</a></li>
                    <li><a href="http://redteamux.com/avant/extras-profile.php">Profile</a></li>
                    <li><a href="http://redteamux.com/avant/extras-inbox.php">Inbox</a></li>
                    <li><a href="http://redteamux.com/avant/extras-search.php">Search Page</a></li>
                    <li><a href="http://redteamux.com/avant/extras-chatroom.php">Chat Room</a></li>
                    <li><a href="http://redteamux.com/avant/extras-invoice.php">Invoice</a></li>
                    <li><a href="http://redteamux.com/avant/extras-registration.php">Registration</a></li>
                    <li><a href="http://redteamux.com/avant/extras-signupform.php">Sign Up</a></li>
                    <li><a href="http://redteamux.com/avant/extras-forgotpassword.php">Password Reset</a></li>
                    <li><a href="http://redteamux.com/avant/extras-login.php">Login 1</a></li>
                    <li><a href="http://redteamux.com/avant/extras-login2.php">Login 2</a></li>
                    <li><a href="http://redteamux.com/avant/extras-404.php">404 Page</a></li>
                    <li><a href="http://redteamux.com/avant/extras-500.php">500 Page</a></li>
                </ul>
            </li>
            <li class="hasChild"><a href="javascript:;"><i class="fa fa-sitemap"></i> <span>Unlimited Level Menu</span></a>
                <ul class="acc-menu">
                    <li><a href="javascript:;">Menu Item 1</a></li>
                    <li class="hasChild"><a href="javascript:;">Menu Item 2</a>
                        <ul class="acc-menu">
                            <li><a href="javascript:;">Menu Item 2.1</a></li>
                            <li class="hasChild"><a href="javascript:;">Menu Item 2.2</a>
                                <ul class="acc-menu">
                                    <li><a href="javascript:;">Menu Item 2.2.1</a></li>
                                    <li class="hasChild"><a href="javascript:;">Menu Item 2.2.2</a>
                                        <ul class="acc-menu">
                                            <li><a href="javascript:;">And deeper yet!</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </nav>
