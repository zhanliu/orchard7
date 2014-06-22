<div id="page-content" style="min-height: 2911px;">
    <div id="wrap">
        <div id="page-heading">

            <ol class="breadcrumb">
                <li>水果7号</li>
                <li>订单中心</li>
                <li class="active">订单管理</li>
            </ol>

            <h1>订单添加->输入手机号码</h1>

        </div>

        <div class="container">

            <div class="alert alert-dismissable alert-warning">
                <strong>重要提示!</strong> 当前仅接受广州市海印区和荔湾区订单!
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            </div>

            <div class="col-md-12">

                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h4>选品下单</h4>
                        <div class="options">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#domwizard" data-toggle="tab"><i class="fa fa-desktop"></i></a></li>
                                <li><a href="#codewizard" data-toggle="tab"><i class="fa fa-code"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="domwizard">
                                <ul id="basicwizard-header" class="stepy-header">
                                    <li id="basicwizard-head-1" class="stepy-active" style="cursor: default;">
                                        <div>第一步</div><span>输入手机号</span></li>
                                    <li id="basicwizard-head-2" style="cursor: default;" >
                                          <div>第二步</div><span>管理送货地址</span>
                                    </li>
                                    <li id="basicwizard-head-3" style="cursor: default;">
                                        <div>第三步</div><span>选择套餐</span></li>
                                    </li>
                                    <li id="basicwizard-head-4" style="cursor: default;">
                                        <div>第四步</div><span>确认订单</span>
                                    </li>
                                </ul>
                                <form action="<?php echo URL; ?>order/addOrder" method="post" target="_parent" id="basicwizard" class="form-horizontal">
                                    <fieldset title="第一步" id="basicwizard-step-1" class="stepy-step" style="display: block;">
                                        <legend>输入手机号</legend>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">手机号码</label>
                                            <div class="col-md-6">
                                                <input type="text" id="cellphone" name="cellphone" class="form-control">
                                            </div>
                                        </div>

                                        <div class="stepy-navigator panel-footer"><div class="pull-right">
                                                <a href="#" onclick="next1()" class="btn btn-primary">Next <i class="fa fa-long-arrow-right"></i></a>
                                        </div></div>
                                    </fieldset>

                                    <fieldset title="Step 2" id="basicwizard-step-2" class="stepy-step" style="display: none;">
                                        <legend>管理配送地址</legend>
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
                                                    <input type="text" id="address2" name="address2" size="30" required="required" class="form-control" placeholder="输入路名或小区...">
                                                </div>
                                            </div>
                                        </div>




                                        <div class="stepy-navigator panel-footer"><div class="pull-right">
                                                <a href="#" class="btn btn-default" onclick="back2()"><i class="fa fa-long-arrow-left"></i> Back</a>
                                                <a href="#" onclick="next2()" class="btn btn-primary">Next <i class="fa fa-long-arrow-right"></i></a>
                                         </div></div>
                                    </fieldset>

                                    <fieldset title="Step 3" id="basicwizard-step-3" class="stepy-step" style="display: none;">
                                        <legend>选择套餐</legend>
                                        <div class="row">
                                            <div class="col-md-9">

                                                    <table id="order_combo_data_table" class="display" cellspacing="0" width="100%" algin="center">
                                                        <thead>
                                                        <tr>
                                                            <th>点选</th>
                                                            <th>数量</th>
                                                            <th>名称</th>
                                                            <th>价格</th>
                                                        </tr>
                                                        </thead>

                                                        <tfoot>
                                                        <tr>
                                                            <th>点选</th>
                                                            <th>数量</th>
                                                            <th>名称</th>
                                                            <th>价格</th>
                                                        </tr>
                                                        </tfoot>

                                                        <tbody>
                                                        <?php foreach ($combos as $combo) { ?>
                                                            <tr>
                                                                <td><input type="checkbox" name="chk" class="chk" value="0" id="check<?php echo $combo->id; ?>" onclick="check_change(<?php echo $combo->id; ?>)" /></td>
                                                                <td>
                                                                    <input type="number" name="quantity[]" id="spinner<?php echo $combo->id; ?>" disabled="true" style="width: 50px">

                                                                </td>
                                                                <td>
                                                                        <?php echo $combo->name; ?>
                                                                </td>
                                                                <td><?php echo $combo->price; ?></td>
                                                                <input type="hidden" name="comboIds[]" disabled="true" id="comboIdHidden<?php echo $combo->id; ?>" value="<?php echo $combo->id; ?>" />
                                                                <input type="hidden" name="comboPrices[]" disabled="true" id="comboPriceHidden<?php echo $combo->id; ?>" value="<?php echo $combo->price; ?>"/>
                                                            </tr>
                                                        <?php } ?>
                                                        </tbody>
                                                    </table>
                                                    <input type="hidden" name="customer_id" value="<?php echo $customer_id; ?>">
                                                    <input type="hidden" name="is_diy" value="0">
                                            </div>
                                        </div>
                                        <div class="stepy-navigator panel-footer"><div class="pull-right">
                                                <a href="#" class="btn btn-default" onclick="back3()"><i class="fa fa-long-arrow-left"></i> Back</a>
                                                <a href="#" onclick="next3()" class="btn btn-primary">Next <i class="fa fa-long-arrow-right"></i></a>
                                    </fieldset>

                                    <fieldset title="Step 4" id="basicwizard-step-4" class="stepy-step" style="display: none;">
                                        <legend>请确认订单信息</legend>
                                        <div class="row">
                                            <div class="panel panel-green">
                                                <div class="panel-heading">
                                                    <h4>联系方式</h4>

                                                </div>
                                                <div class="panel-body">您的联系电话是: <span id="cellphone_preview"></span></div>
                                            </div>

                                            <div class="panel panel-orange">
                                                <div class="panel-heading">
                                                    <h4>配送地址</h4>

                                                </div>
                                                <div class="panel-body">您的配送地址是: <span id="address_preview"></span></div>
                                            </div>
                                        </div>
                                        <div class="stepy-navigator panel-footer"><div class="pull-right">
                                                <a href="#" class="btn btn-default" onclick="back4()"><i class="fa fa-long-arrow-left"></i> Back</a>
                                                <input type="submit" class="finish btn-success btn" value="Submit" onclick="submit_add_order()"></div></div>
                                    </fieldset>

                                </form>
                            </div>



                        </div>




                    </div>
                </div>


            </div>

            <div class="panel">
            </div><!-- /panel -->
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


