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


    <link href="/orchard7/public/css/css.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="/orchard7/public/css/lightbox-form.css">
    <link type="text/css" rel="stylesheet" href="/orchard7/public/css/default.css">
    <link href="/orchard7/public/css/default.css" rel="stylesheet" type="text/css" media="all" id="styleswitcher">
    <link href="/orchard7/public/css/default.css" rel="stylesheet" type="text/css" media="all" id="headerswitcher">
    <link rel="stylesheet" type="text/css" href="/orchard7/public/css/prettify.css">
    <link rel="stylesheet" type="text/css" href="/orchard7/public/css/toggles.css">
    <link rel="stylesheet" type="text/css" href="/orchard7/public/css/jquery.datatable.css">
    <link rel="stylesheet" href="/orchard7/public/css/styles.min.css">

    <script src="/orchard7/public/js/jquery-1.10.2.js"></script>
    <script src="/orchard7/public/js/orchard7.js"></script>
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

    <!-- The following CSS are included as plugins and can be removed if unused-->
</head>

<body class="" style="">

<?php require "application/views/common/header_bar.php"; ?>

<?php require "application/views/common/header_toolbar.php"; ?>

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
                    <li><a href="/orchard7/privilege/addRole">添加角色</a></li>
                    <li><a href="/orchard7/privilege/role">角色管理</a></li>
                    <li><a href="/orchard7/privilege/credential">添加人员</a></li>
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
                    <li><a href="/orchard7/stock/addCategory">添加类目</a></li>
                    <li><a href="/orchard7/stock/category">类目管理</a></li>
                    <li><a href="/orchard7/stock/addProduct">添加商品</a></li>
                    <li><a href="/orchard7/stock/product">商品管理</a></li>
                    <li><a href="/orchard7/stock/addCombo">添加套餐</a></li>
                    <li><a href="/orchard7/stock/combo">套餐管理</a></li>
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
