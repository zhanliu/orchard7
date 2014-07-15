<body>
<div id="st-container" class="st-container">
    <div class="st-pusher">
        <div class="st-content">
            <div class="st-content-inner">
                <div id="page-content">

                    <header class="newTodayView">
                        <nav class="shine dropShadow">
                            <a href="#">
                                <span class="logo floatLeft">Daily Fresh</span>
                                <span class="tagline floatLeft">新鲜健康 <br>每一天</span>
                            </a>
                        </nav>
                    </header>
                    <div class="clr"></div>

                    <div class="page-app userinfo">
                        <div class="userInfo-msg" style="">
                            这是您第一次订餐,请完善您的送餐信息
                        </div>

                        <div class="userInfo-form">
                            <div class="userInfo-stepTitle selected">
                                <div class="num">
                                    <span>1</span>
                                </div>
                                <div class="arrow"></div>
                                <p>
                                    基本信息
                                </p>
                            </div>
                            <div class="userInfo-stepBox" style="padding: 15px 0px; height: auto;">


                                    <div class="value">
                                        <div class="icon nick">
                                            <span></span>
                                        </div>
                                        <div class="input">
                                            <input type="text" name="nick" value="" placeholder="输入姓名">
                                        </div>
                                    </div>


                            </div>
                            <div class="userInfo_notSltText name am-clickable" style="display: none;"></div>
                            <div class="userInfo-stepTitle">
                                <div class="num">
                                    <span>2</span>
                                </div>
                                <div class="arrow"></div>
                                <p>
                                    联系电话
                                </p>
                            </div>
                            <div class="userInfo-stepBox" style="display: none; padding: 0px; height: 0px;">
                                <ul class="userInfo-group telGroup"><li id="phone_0" class="selected"><p>18122208902</p><div id="delP_0" class="del"></div></li></ul>
                                <div id="newphone" style="display: none;">
                                    <div class="value">
                                        <div class="icon tel">
                                            <span></span>
                                        </div>
                                        <div class="input">
                                            <input type="tel" name="cellphone" value="" placeholder="请填写手机号码">
                                        </div>
                                    </div>
                                </div>
                                <a onclick="showNewPhoneField()" id="newPhoneLink" style="color:red;float:right;font-size: 16px;text-decoration: underline;line-height:36px;padding:0 10px;margin: -5px -10px -5px 0;">新增电话</a>
                                <div class="clear" style="height:5px"></div>
                                <div class="page-button ok" style="display: none;">
                                    <span class="text">确定</span>
                                </div>

                            </div>
                            <div class="userInfo_notSltText am-clickable" style="">18122208902</div>

                            <div class="userInfo-stepTitle selected">
                                <div class="num">
                                    <span>3</span>
                                </div>
                                <div class="arrow"></div>
                                <p>
                                    送餐地址与时间
                                </p>
                            </div>

                            <div class="userInfo-stepBox" style="padding: 15px 0px; height: auto;">

                                <div id="addressList"></div>
                                <br>
                                <div id="newaddress" style="">
                                    <div class="userInfo-addAddrBox">
                                        <div class="value userInfo-fullInput" id="search_address">
                                            <input type="text" name="key" placeholder="输入关键字,搜索路名或小区">
                                        </div>
                                        <div class="newaddress_fullInput">

                                            <div class="value userInfo-fullInput">
                                                <input type="text" name="search" value="" placeholder="输入详细地址,如10弄5号">
                                            </div>
                                        </div>
                                        <div class="clear" style="height:5px"></div>
                                    </div>
                                </div>
                                <a onclick="showNewAddressField()" id="newAddressLink" style="color: red; float: right; font-size: 16px; text-decoration: underline; line-height: 36px; padding: 0px 10px; margin: -5px -10px -5px 0px; display: none;">新增地址</a>
                                <div class="page-button add ok" style="display: block;">
                                    <span class="text">确定</span>
                                </div>
                            </div>
                            <div class="userInfo_notSltText am-clickable" style="display: none;"></div>
                            <div class="userInfo_notSltText am-clickable" style="display: none;"></div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="clr"></div>

    </div>
</div>


<script>
    /*
     Address presentation should have three status:
     1. A brand new user flagged as NEW
     2. Existed user choosing existed address flagged as EXISTED
     3. Existed user to create new address flagged as EXISTED_NEW
     */
    var address_flag;
    var district;
    var address1;
    var address2;
    var address_string;

    function submit() {
        var isValid = validateCellphone();
        if (isValid) {
            document.getElementById("myform").submit();
        }
        return true;
    }

    function validateCellphone() {
        var cellPhone = $("#cellphone").val();
        var RegCellPhone = /^([0-9]{11})?$/;
        var flag = cellPhone.search(RegCellPhone);
        if (cellPhone.length == 0 || flag == -1) {
            alert("手机号不合法!");
            return false;
        } else {
            return true;
        }
    }

    function next1() {

        if (validateCellphone()) {

            $('#basicwizard-step-1').css('display', 'none');
            $('#basicwizard-step-2').css('display', 'block');
            $('#basicwizard-head-1').removeClass('stepy-active');
            $('#basicwizard-head-2').addClass('stepy-active');

            $.ajax({
                    url: '<?php echo URL; ?>order/queryAddressByCellphone/' + $('#cellphone').val(),
                    data: "",
                    dataType: 'json',
                    success: function (data) {
                        //alert('hi');
                        var content = '';
                        var count = 0;
                        if (data != '') {
                            var checked_index = '';
                            alert(data);
                            for (var i in data) {
                                var item = data[i];
                                var id = item['id'];
                                var radio_id = 'radio_existed' + i;
                                var address = item['province'] + item['city'] + item['district'] + item['address1'] + item['address2'];
                                content += '<div class="radio"><lable>';
                                content += '<input type="radio" name="address_id" id="' + radio_id + '" value="' + id + '" onclick="hide_address()">';
                                content += address + '</label></div>';

                                if (item['is_primary'] == 1) {
                                    var checked_index = i;
                                }
                                count++;
                            }
                            content += '<label class="col-sm-3 control-label"></label><div class="radio"><lable>';
                            content += '<input type="radio" name="address_id" id="radio_new" value="new_address" onclick="add_address()">';
                            content += '添加新的配送地址</label></div>';

                            $('#output').html(content);

                            $('#address_hint').html('选择已有配送地址');
                            if (address_flag == 'EXISTED_NEW') {
                                $('input[name=address_id]')[count].checked = "checked";
                            } else {
                                $('input[name=address_id]')[checked_index].checked = "checked";
                                district = data[checked_index]['district'];
                                address1 = data[checked_index]['address1'];
                                address2 = data[checked_index]['address2'];
                                address_string = district + address1 + address2;
                            }

                        } else {
                            address_flag = 'NEW';
                            //$('input:radio:checked').val() == 'new_address';
                            $('#address_hint').html('添加新的配送地址');
                            add_address();
                        }


                    }
                }
            )

        }
    }

    function validateAddress() {
        var is_new_address = ($('input:radio:checked').val() == null || $('input:radio:checked').val() == 'new_address');
        var district = $('#district').val();
        var address1 = $('#address1').val();
        var address2 = $('#address2').val();

        if (is_new_address && (district == '' || address1 == '' || address2 == '')) {
            alert('请添加完整地址');
            return false;
        } else {
            return true;
        }
    }

    function next2() {
        if (validateAddress()) {
            $('#basicwizard-step-2').css('display', 'none');
            $('#basicwizard-step-3').css('display', 'block');
            $('#basicwizard-head-2').removeClass('stepy-active');
            $('#basicwizard-head-3').addClass('stepy-active');
        }
    }

    function next3() {
        $('#basicwizard-step-3').css('display', 'none');
        $('#basicwizard-step-4').css('display', 'block');
        $('#basicwizard-head-3').removeClass('stepy-active');
        $('#basicwizard-head-4').addClass('stepy-active');

        var cellPhone = $("#cellphone").val();

        $('#cellphone_preview').html(cellPhone);

        //if ($('input:radio:checked').val() == 'new_address') {
        if (address_flag = 'EXISTED') {

        } else {
            var district = $('#district').val();
            var address1 = $('#address1').val();
            var address2 = $('#address2').val();
            var address = district + address1 + address2;
        }
        $('#address_preview').html('广东省广州市' + address_string);

    }

    function add_address() {
        address_flag = 'EXISTED_NEW';
        $('#new_address').css('display', 'block');
    }

    function hide_address() {
        address_flag = 'EXISTED';
        $('#new_address').css('display', 'none');
    }

</script>


