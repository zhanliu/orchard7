<div id="pop" class="alert alert-warning"></div>

<div id="page-inside">

    <form action="<?php echo URL; ?>mobile/submitCellphone" id="myform"
          class="form-horizontal confirm-form" method="post">

        <div class="panel-body">
            <div class="form-group">
                <div class="label">输入手机</div>

                <?php $cellphone = empty($_COOKIE['cellphone']) ? "" : $_COOKIE['cellphone']; ?>

                <div>
                    <div class="value">
                        <div class="icon username"><span></span></div>
                        <div class="input" style="position: relative; z-index: 1;">
                            <input type="text" name="cellphone" value="<?php echo $cellphone ?>"
                                   placeholder="输入手机号码" id="cellphone">
                            <ul class="email-list" style="display: none;"></ul>
                            <span class="close-btn"></span>
                        </div>
                    </div>
                    <div class="errorMsg">
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="stepy-navigator panel-footer">
                <div class="page-button submit">
                    <a href="#" onclick="next()"><span class="text">下一步</span></a>
                </div>
            </div>

            <div class="page-tipsTitle">友情提示</div>
            <div class="page-tipsContent"><br>

                <p>1.如果您是首次订餐，请输入您常用的手机号码。这将作为您今后登录的唯一用户信息，如有遗忘，您需重新注册。</p><br>

                <p>2.如果您曾使用我们的订餐服务，请输入您上次使用的手机号码。</p><br>

                <p>3.请妥善保管您的手机以免信息被不当使用。</p><br>

                <p>4.送餐区域正餐供应时间为10:00-22:00。</p><br>

                <p>5.急送实行专属菜单及价格，不同城市、不同送餐区域的菜单有所不同。不同时段产品品项及价格有所不同。详情请以输入送餐地址后显示的菜单为准。</p><br>

                <p>6.为保证产品品质, Daily Fresh 急送各门店有送餐范围限制，若您的送餐地址不在送餐范围内造成无法送餐，敬请原谅！</p>
            </div>


        </div>
        <input type="hidden" name="block" value="<?php echo $block; ?>">
        <input type="hidden" name="submit_cellphone" value="true">
    </form>

</div>


<script>
    function next() {
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
            setAlert("请输入正确的手机号码!");
            return false;
        } else {
            return true;
        }
    }

    function setAlert(msg) {
        $('#pop').html(msg);
        pop1.show();
    }

    //弹层接口
    var usePop = function (options) {
        $.extend({
            name: "",
            delayHide: 3000 //延迟隐藏时间
        }, options);
        //
        var hideFlag;
        var _pop = {};
        _pop.show = function () {
            $(options.name).stop(true, true).fadeIn(500);
            hideFlag = setTimeout(_pop.hide, options.delayHide);
        }
        _pop.hide = function () {
            clearTimeout(hideFlag);
            $(options.name).stop(true, true).fadeOut(500);
        }
        return _pop;
    };


    //自定义
    var pop1 = usePop({
        name: "#pop",
        delayHide: 3000
    })
</script>


