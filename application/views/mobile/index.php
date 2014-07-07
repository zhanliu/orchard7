<div id="container">
    <div id="main" role="main">
        <div id="contentWrapper">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h4>确认配送范围</h4>
                </div>

                <div class="panel-body">
                    <div class="alert alert-info">
                        <strong>注意!</strong> 当前配送范围仅限广州市越秀区
                    </div>

                    <form action="<?php echo URL; ?>mobile/showcase" method="post" class="form-horizontal">
                        <input type="hidden" name="province" value="广东省">
                        <input type="hidden" name="city" value="广州市">
                        <input type="hidden" name="district" value="越秀区">
                    <div id="form-bg">
                        <fieldset>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">广东省-广州市-越秀区</label>
                                <div class="col-sm-6">
                                    <input type="text" id="address1" name="address1" size="30" required="required" class="form-control" placeholder="输入路名和小区...">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label"></label>
                                <div class="col-sm-6">
                                    <input type="text" id="address2" name="address2" size="30" required="required" class="form-control" placeholder="输入楼栋和门牌号...">
                                </div>
                            </div>

                            <div class="stepy-navigator panel-footer"><div class="pull-right">

                                    <a href="#" onclick="next()" class="btn btn-primary">Next <i class="fa fa-long-arrow-right"></i></a>
                                </div></div>
                        </fieldset>

                    </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>