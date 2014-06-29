

function getLocation() {
    var response = '{"status":0,"result":{"location":{"lng":116.30814954222,"lat":40.056885091681},"precise":1,"confidence":80,"level":"\u5546\u52a1\u5927\u53a6"}}';
    //alert('hi');
    var jsonObj = JSON.parse(response);
    var location = jsonObj.location;
    alert(location.lat);
}
//http://api.map.baidu.com/geocoder/v2/?ak=FE2c85f614d10c2fa891d73856cfb665&callback=renderOption&output=json&address=%E7%99%BE%E5%BA%A6%E5%A4%A7%E5%8E%A6&city=%E5%8C%97%E4%BA%AC%E5%B8%82
//renderOption&&renderOption({"status":0,"result":{"location":{"lng":116.30814954222,"lat":40.056885091681},"precise":1,"confidence":80,"level":"\u5546\u52a1\u5927\u53a6"}})
