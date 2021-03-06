<?php

/**
 * A simple PHP MVC skeleton
 *
 * @package php-mvc
 * @author Panique
 * @link http://www.php-mvc.net
 * @link https://github.com/panique/php-mvc/
 * @license http://opensource.org/licenses/MIT MIT License
 */


define("TOKEN", "orchard7_2015");
$wechatObj = new wechatCallbackapiTest();
if (isset($_GET['echostr'])) {
    $wechatObj->valid();
}else{
    $wechatObj->responseMsg();
}

class wechatCallbackapiTest
{
    public function valid()
    {
        $echoStr = $_GET["echostr"];
        if($this->checkSignature()){
            echo $echoStr;
            exit;
        }
    }

    private function checkSignature()
    {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];

        $token = TOKEN;
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );

        if( $tmpStr == $signature ){
            return true;
        }else{
            return false;
        }
    }


    public function responseMsg()
    {
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];



        if (!empty($postStr)){
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);




            //$debug_resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $postObj);
            //echo $debug_resultStr;

            $RX_TYPE = trim($postObj->MsgType);
            $resultStr = "";


            switch ($RX_TYPE)
            {
                case "event":
                    $resultStr = $this->receiveEvent($postObj);
                    break;
                default:
                    $resultStr = $this->receiveMessage($postObj);
                    break;
            }


            echo $resultStr;

        }else{
            echo "Oh no, post String is empty!";
            exit;
        }
    }

    public function receiveMessage($postObj) {
        $keyword = trim($postObj->Content);
        $msgType = "";
        $contentStr = "";
        $RX_TYPE = trim($postObj->MsgType);

        $fromUsername = $postObj->FromUserName;
        $toUsername = $postObj->ToUserName;
        $keyword = trim($postObj->Content);
        $time = time();


        $product_manager = "http://orchard7.vipsinaapp.com/mobileadmin/productManager/";
        $order_manager = "http://orchard7.vipsinaapp.com/mobileadmin/orderManager/";
        $store_list_entry = "&lt;a href=&quot;http://1.fruit7.sinaapp.com/home/storeList&quot;&gt;点击查看所有分店!&lt;/a&gt;";

        if($keyword == "?" || $keyword == "？")
        {
            $msgType = "text";
            $contentStr = $fromUsername."---".date("Y-m-d H:i:s",time())."---".$toUser;
        } else if ($keyword == "001") {
            $msgType = "text";

            if ($this->getStaffNum() > 0) {
                $contentStr = $product_manager;
            } else {
                $contentStr = "";
            }

        } else if ($keyword == "002") {
            $msgType = "text";

            if ($this->getStaffNum() > 0) {
                $contentStr = $order_manager;
            } else {
                $contentStr = "";
            }

        } else if ($keyword == "117") {
            $msgType = "text";
            $contentStr = $postObj->AppSecret;
        } else if ($keyword == "query#") {
            $msgType = "text";

            $orders = $this->queryOrder($fromUsername);

            if ($orders !=null && !empty($orders)) {

                foreach($orders as $order) {
                    $contentStr = $contentStr . $order->id . "|" . $order->status . "|" . $order->total_amount . "|" . $order->country."-".$order->province."-".$order->city."-".$order->district."-".$order->address1."-".$order->address2 . "\n\n";
                }

            } else {
                $contentStr = "您订阅的订单结果为空。";
            }


        } else if ($keyword == "432") {
            $msgType = "news";
            $contentStr = "";
        } else if ($this->startWith($keyword, "apply#")) {
            $msgType = "text";

            $num = substr_count($keyword,"#");

            if ($num == 3) {
                $arr = explode("#",$keyword);
                //$contentStr = $arr[0] . $arr[1] . $arr[2] . $arr[3];

                //insert staff into db
                $contentStr = $this->addStaff($arr[1], $arr[2], $arr[3], $fromUsername);
            } else {
                $contentStr = "注册请使用: \n apply#姓名#电话号#店铺编号\n\n（店铺编号:\n 5-逸景一店\n 6-逸景二店\n 7-南珠店\n 8-东晓南店）";
            }

            //preg_match("apply#",$keyword,$regs);

            //$contentStr = print_r($regs);

        } else {
            $msgType = "text";
            $contentStr = "参观水果市场请回复1\n查看分店请回复2";

        }

        //$url = "<![CDATA[" . "http://orchard7.sinaapp.com/mobile/wechatindex/" .$fromUsername  . "]]>";

        $textTpl = "<xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[%s]]></MsgType>
                        <Content><![CDATA[%s]]></Content>
                        <ArticleCount>3</ArticleCount>
                        <Articles>
                            <item>
                                <Title><![CDATA[30分钟水果快送，货到付款，猛击下单]]></Title>
                                <Description><![CDATA[关注我就是关注健康生活，今后我会帮您挑选新鲜美味的水果切和百分百纯果汁，绝无转基因食品哦。]]></Description>
                                <PicUrl><![CDATA[http://orchard7-product.stor.sinaapp.com/1404193499_1602.jpg]]></PicUrl>
                                <Url><![CDATA[http://orchard7.sinaapp.com/mobile]]></Url>
                            </item>
                            <item>
                                <Title><![CDATA[今日推荐！增城新鲜荔枝，核小味鲜]]></Title>
                                <Description><![CDATA[关注我就是关注健康生活，今后我会帮您挑选新鲜美味的水果切和百分百纯果汁，绝无转基因食品哦。]]></Description>
                                <PicUrl><![CDATA[http://orchard7-product.stor.sinaapp.com/1404193668_leeche.jpeg]]></PicUrl>
                                <Url><![CDATA[http://orchard7.sinaapp.com/mobile]]></Url>
                            </item>
                            <item>
                                <Title><![CDATA[味美价廉！阳光农庄原生态草莓]]></Title>
                                <Description><![CDATA[关注我就是关注健康生活，今后我会帮您挑选新鲜美味的水果切和百分百纯果汁，绝无转基因食品哦。]]></Description>
                                <PicUrl><![CDATA[http://orchard7-product.stor.sinaapp.com/1404193425_1999.jpg]]></PicUrl>
                                <Url><![CDATA[http://orchard7.sinaapp.com/mobile]]></Url>
                            </item>
                        </Articles>
                        <FuncFlag>0</FuncFlag>
                    </xml>";

        $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);

        return $resultStr;
    }

    public function receiveEvent($postObj)
    {
        $contentStr = "";
        $keyword = trim($postObj->Content);
        $msgType = "";
        $RX_TYPE = trim($postObj->MsgType);

        $fromUsername = $postObj->FromUserName;
        $toUsername = $postObj->ToUserName;
        $keyword = trim($postObj->Content);
        $time = time();


        switch ($postObj->Event)
        {
            case "subscribe":
                //$contentStr = "嘿！终于把您等来了~~关注我就是关注健康生活，今后我会帮您挑选新鲜美味的水果切和百分百纯果汁，绝无转基因食品哦。&lt;a href=&quot;http://1.fruit7.sinaapp.com/view/market_home.php&quot;&gt;请点击参观我们的果园吧!&lt;/a&gt;";
                $contentStr = "嘿！终于把您等来了~~快来点我吧";
                $msgType = "news";
                break;
            case "unsubscribe":
                $contentStr = "";
                $msgType = "text";
                break;
            case "CLICK":
                switch ($postObj->EventKey)
                {
                    default:
                        $contentStr = "你点击了菜单: ".$postObj->EventKey;
                        $msgType = "text";
                        break;
                }
                break;
            default:
                $contentStr = "receive a new event: ".$postObj->Event;
                $msgType = "text";
                break;
        }


        $textTpl = "<xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[%s]]></MsgType>
                        <Content><![CDATA[]]></Content>
                        <ArticleCount>1</ArticleCount>
                        <Articles>
                            <item>
                                <Title><![CDATA[%s]]></Title>
                                <Description><![CDATA[关注我就是关注健康生活，今后我会帮您挑选新鲜美味的水果切和百分百纯果汁，绝无转基因食品哦。]]></Description>
                                <PicUrl><![CDATA[http://orchard7-product.stor.sinaapp.com/1404193499_1602.jpg]]></PicUrl>
                                <Url><![CDATA[http://orchard7.sinaapp.com/mobile]]></Url>
                            </item>
                        </Articles>
                        <FuncFlag>0</FuncFlag>
                    </xml>";

        $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);

        return $resultStr;
    }

    function startWith($str, $needle) {

        return strpos($str, $needle) === 0;

    }


    function addStaff($name, $cellphone, $store_id, $wechat_id) {
        require 'index.php';
        require 'application/service/StaffService.php';
        $staff_service = new StaffService();


        return $staff_service->addStaff($name, $cellphone, $store_id, $wechat_id);
    }

    function queryOrder($wechat_id) {
        require 'index.php';
        require 'application/service/StaffService.php';
        $staff_service = new StaffService();


        return $staff_service->queryOrder($wechat_id);
    }

    function getStaffNum($wechat_id) {
        require 'index.php';
        require 'application/service/StaffService.php';
        $staff_service = new StaffService();


        return $staff_service->getStaffs($wechat_id);
    }

}



