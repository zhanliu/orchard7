<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css">-->
    <link rel="stylesheet" href="/orchard7/public/css/jquery-ui-1.10.4.custom.min.css">
    <link rel="stylesheet" href="/orchard7/public/css/jquery-layout.css">
    <link rel="stylesheet" href="/orchard7/public/css/jquery.datatable.css">
<!--    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>-->
<!--    <script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>-->
    <script src="/orchard7/public/js/jquery-1.10.2.js"></script>
    <script src="/orchard7/public/js/jquery-ui-1.10.4.custom.min.js"></script>
    <script src="/orchard7/public/js/jquery-layout.js"></script>
    <script src="/orchard7/public/js/jquery.datatable.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('body').layout({
            });
        });
    </script>
    <style>
        .f1 {font-weight: bold;font-size: 26px}
        .ui-layout-east	{ background:	#00CB6D; }
        .ui-layout-north	{ background:	#00B4BA; }
        .ui-layout-west	{ background:	#008EFF; }
        .ui-layout-center	{ background:	#FFFFFF; }

        .add_object_button_div {
            background:#333333 url(images/plus.png) 85% 55% no-repeat;
            position:	absolute;
            top:		0;
            right:		0;
            width:		auto;
            height:		auto;
            padding:	5px 10px;
            text-align:	center;
            border:		1px solid #999;
        }
        .panel{
            position:absolute;
            top:10%;
            right:0;
            display:none;
            background:#00CB6D;
            border:1px solid #111111;
            -moz-border-radius-topleft:20px;
            -webkit-border-top-left-radius:20px;
            -moz-border-radius-bottomleft:20px;
            -webkit-border-bottom-left-radius:20px;
            width:auto;
            height:auto;
            padding:30px 30px 30px 30px;
            filter:alpha(opacity=85);opacity:.85;}
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
    </style>
</head>
<body>


<div class="ui-layout-north">
    <span class="f1">orchard7 Dashboard</span>
</div>
