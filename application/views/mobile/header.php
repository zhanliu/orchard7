<?php
//if (!session_id()) session_start();
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}

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
    <link id="compiledCss" rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/mobile.css">
    <link id="compiledCss" rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/css.css">
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/mobile-style.css" type="text/css" media="screen">
    <script src="<?php echo URL; ?>public/js/jquery-1.10.2.js"></script>
</head>

