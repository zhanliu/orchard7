<div id="page-content" style="min-height: 2911px;">
    <div id="wrap">
        <div id="page-heading">
            <ol class="breadcrumb">
                <li><a href="">控制面板</a></li>
                <li>资产管理</li>
                <li class="active">添加店铺</li>
            </ol>
        </div>

        <div class="container">
            <div class="panel panel-midnightblue">


                <div class="panel-heading">
                    <h4>添加店铺</h4>
                    <div class="options">
                        <a href="javascript:;"><i class="fa fa-cog"></i></a>
                        <a href="javascript:;"><i class="fa fa-wrench"></i></a>
                        <a href="javascript:;" class="panel-collapse"><i class="fa fa-chevron-down"></i></a>
                    </div>
                </div>

                <div class="panel-body collapse in">
                    <div class="form-horizontal row-border">
                    <form id="myform" class="storeform" action="<?php echo URL; ?>asset/submitAddStore" method="post">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">店铺名称</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="name" id="name" placeholder="必填..." >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">地区</label>
                            <div class="col-sm-3">
                            <select name="district" id="district" class="form-control">
                                <option value="海珠区" selected="selected">海珠区</option>
                                <option value="荔湾区">荔湾区</option>
                                <option value="白云区">白云区</option>
                                <option value="天河区">天河区</option>
                                <option value="越秀区">越秀区</option>
                                <option value="黄埔区">黄埔区</option>
                            </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">地址栏1</label>
                            <div class="col-sm-6">
                                <input type="text" id="address1" name="address1" size="30" required="required" class="form-control" placeholder="输入路名或小区...">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">地址栏2</label>
                            <div class="col-sm-6">
                                <input type="text" id="address2" name="address2" size="30" required="required" class="form-control" placeholder="输入楼栋和门牌号...">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">联系电话</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="" >
                            </div>
                        </div>

                        <div class="form-group" style="height:50px">
                            <label class="col-sm-3 control-label" for="myToggleButton">激活</label>
                            <div class="col-sm-6">
                                <input id="cmn-toggle-1" name="is_active" class="cmn-toggle cmn-toggle-round" type="checkbox" checked>
                                <label for="cmn-toggle-1"></label>
                            </div>
                        </div>

                        <input type="hidden" name="lat" id="lat"/>
                        <input type="hidden" name="lng" id="lng"/>
                        <input type="hidden" name="country" value="中国"/>
                        <input type="hidden" name="province" value="广东省"/>
                        <input type="hidden" name="city" value="广州市"/>
                        <input type="hidden" name="submit_add_store"/>


                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-sm-6 col-sm-offset-3">
                                    <div class="btn-toolbar">
                                        <a href="#" class="myButton" onclick="submit()">保存</a>
                                        <a href="<?php echo URL; ?>asset/store" class="myButton">返回</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                   </div>
                </div>

            </div>
        </div>
    </div>
</div>
<script src="http://api.map.baidu.com/api?v=1.3" type="text/javascript"></script>
<script type="text/javascript">
    function submit() {
        if ($('#name').val()=="") {
            alert('店铺名称不能为空');
        } else {
            var full_address = '广东省广州市' + $('#district').val() + $('#address1').val() +$('#address2').val();
            //alert(full_address);
            var myGeo = new BMap.Geocoder();
            myGeo.getPoint(full_address, function (point) {
                if (point) {
                    //alert(point.lat);
                    $('#lat').val(point.lat);
                    $('#lng').val(point.lng);
                    document.getElementById("myform").submit();
                } else{
                    alert('您输入的地址有误，百度地图获取不到！');
                }
            });

        }
    }
</script>

