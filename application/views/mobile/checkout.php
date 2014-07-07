<div class="col-md-12 fruit-bg">
    <div class="panel panel-danger">
        <div class="panel-heading">
            <h4>确认订单</h4>
        </div>

        <div class="panel-body">
        <fieldset title="确认订单" id="basicwizard-step-1" class="stepy-step" style="display: block;">
        <div class="form-group">
            <label class="col-md-3 control-label">填写您的手机号码</label>
            <div class="col-md-6">
                <input type="text" id="cellphone" name="cellphone" class="form-control">
            </div>
        </div>
        <div class="stepy-navigator panel-footer">
            <div class="pull-right">
                    <a href="#" onclick="next1()" class="btn btn-primary">Next <i class="fa fa-long-arrow-right"></i></a>
            </div>
        </div>
        </fieldset>

        <fieldset title="Step 2" id="basicwizard-step-2" class="stepy-step" style="display: none;">
                <div class="form-group">
                    <label id="address_hint" class="col-sm-3 control-label">选择已有地址</label>
                    <div class="col-sm-6" id="output"></div>
                </div>

                <div class="col-md-12" id="new_address" style="display:none">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">广东省广州市 -</label>
                        <div class="col-md-6">
                            <select id="district" name="district" class="form-control">
                                <option value="">请选择区</option>
                                <option value="荔湾区">荔湾区</option>
                                <option value="海印区">海印区</option>
                            </select>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label"></label>
                        <div class="col-sm-6">
                            <input type="text" id="address1" name="address1" size="30" required="required" class="form-control" placeholder="输入路名或小区...">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label"></label>
                        <div class="col-sm-6">
                            <input type="text" id="address2" name="address2" size="30" required="required" class="form-control" placeholder="输入楼栋和门牌号...">
                        </div>
                    </div>
                </div>

                <div class="stepy-navigator panel-footer"><div class="pull-right">
                        <a href="#" class="btn btn-default" onclick="back2()"><i class="fa fa-long-arrow-left"></i> Back</a>
                        <a href="#" onclick="next2()" class="btn btn-primary">Next <i class="fa fa-long-arrow-right"></i></a>
                    </div></div>
            </fieldset>

        </div>

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

    $(document).ready(function(){
        $("#order_combo_data_table").dataTable();
    });

    function check_change(id) {

        if ($("#check"+id).attr("value") == 0) {
            $("#check"+id).attr("value", 1);
            $("#spinner"+id).attr("disabled", false);
            $("#comboIdHidden"+id).attr("disabled", false);
            $("#comboPriceHidden"+id).attr("disabled", false);
        } else {
            $("#check"+id).attr("value", 0);
            $("#spinner"+id).attr("disabled", true);
            $("#comboIdHidden"+id).attr("disabled", true);
            $("#comboPriceHidden"+id).attr("disabled", true);
            $("#spinner"+id).val("");
        }
    }

    function submit() {
        var isValid = validateCellphone();
        if (isValid) {
            document.getElementById("myform").submit();
        }
        return true;
    }

    function submit_add_order() {
        $("#basicwizard").submit();
    }

    function validateCellphone() {
        var cellPhone = $("#cellphone").val();
        var RegCellPhone = /^([0-9]{11})?$/;
        var flag = cellPhone.search(RegCellPhone);
        if (cellPhone.length == 0 || flag == -1){
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
                    success: function(data) {
                        var content = '';
                        var count = 0;
                        if (data != '') {
                            var checked_index = '';
                            for (var i in data) {
                                var item = data[i];
                                var id = item['id'];
                                var radio_id = 'radio_existed' + i;
                                var address = item['province'] + item['city'] + item['district'] + item['address1'] + item['address2'];
                                content+= '<div class="radio"><lable>';
                                content+= '<input type="radio" name="address_id" id="' + radio_id + '" value="' + id + '" onclick="hide_address()">';
                                content+= address + '</label></div>';

                                if (item['is_primary'] == 1) {
                                    var checked_index = i;
                                }
                                count ++;
                            }
                            content+= '<label class="col-sm-3 control-label"></label><div class="radio"><lable>';
                            content+= '<input type="radio" name="address_id" id="radio_new" value="new_address" onclick="add_address()">';
                            content+= '添加新的配送地址</label></div>';

                            $('#output').html(content);

                            $('#address_hint').html('选择已有配送地址');
                            if (address_flag == 'EXISTED_NEW') {
                                $('input[name=address_id]')[count].checked="checked";
                            } else {
                                $('input[name=address_id]')[checked_index].checked="checked";
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

    function back2() {
        $('#output').html('');
        $('#basicwizard-step-1').css('display', 'block');
        $('#basicwizard-step-2').css('display', 'none');
        $('#basicwizard-head-1').addClass('stepy-active');
        $('#basicwizard-head-2').removeClass('stepy-active');
    }

    function back3() {
        $('#basicwizard-step-2').css('display', 'block');
        $('#basicwizard-step-3').css('display', 'none');
        $('#basicwizard-head-2').addClass('stepy-active');
        $('#basicwizard-head-3').removeClass('stepy-active');
    }

    function back4() {
        $('#basicwizard-step-3').css('display', 'block');
        $('#basicwizard-step-4').css('display', 'none');
        $('#basicwizard-head-3').addClass('stepy-active');
        $('#basicwizard-head-4').removeClass('stepy-active');
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


