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
//        $(document).ready(function () {
//            $('body').layout({  });
//        });

        var outerLayout, innerLayout;
        $(document).ready(function () {
            outerLayout = $('body').layout({
                // using 'sub-key' option format here
                east: {
                    size:				400
                    ,	resizable:			true
                    ,	togglerLength_open:	0
                    ,	spacing_open:		1 /* cosmetic only */
                    ,	initHidden:			true
                    ,	onhide_end:			function () { $("#pane4-closed").show(); }
                    ,	onshow_start:		function () { $("#pane4-closed").hide(); }
                }
//                ,	center: {
//                    onresize:		function () { if (innerLayout) innerLayout.resizeAll(); }
//                }
            });
//            innerLayout = $('body > .ui-layout-center').layout({
//                minSize:			60
//                ,	closable:			false
//            });

        });

    </script>
    <style>
        .f1 {font-weight: bold;font-size: 26px}
        .ui-layout-east	{ background:	#00CB6D; }
        .ui-layout-north	{ background:	#00B4BA; }
        .ui-layout-west	{ background:	#008EFF; }
        .ui-layout-center	{ background:	#FFFFFF; }
        #pane4-closed {
            position:	absolute;
            top:		0;
            right:		0;
            width:		auto;
            height:		auto;
            padding:	5px 10px;
            text-align:	center;
            border:		1px solid #999;
        }

    </style>
</head>
<body>


<div class="ui-layout-north">
    <span class="f1">orchard7 Dashboard</span>
</div>
