<form action="<?php echo URL; ?>mobile/submitOrder" id="myform"
      class="form-horizontal confirm-form" method="post">

    <div class="panel-body">
        <div class="form-group">
            <label id="address_hint" class="col-sm-3 control-label"></label>

            <div class="col-sm-6" id="output"></div>
        </div>

        <div class="col-md-12" id="new_address" style="display:none">
            <div class="form-group">
                <label class="col-sm-3 control-label">广东省广州市 -</label>

                <div class="col-md-6">
                    <select id="district" name="district" class="form-control">
                        <option value="海珠区">海珠区</option>
                    </select>
                </div>

            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label"></label>

                <div class="col-sm-6">
                    <input type="text" id="address1" name="address1" size="30"
                           required="required" class="form-control"
                           placeholder="输入街道和号码...">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label"></label>

                <div class="col-sm-6">
                    <input type="text" id="address2" name="address2" size="30"
                           required="required" value="<?php echo $block; ?>"
                           class="form-control">
                </div>
            </div>
        </div>

        <div class="stepy-navigator panel-footer">
            <div class="pull-right">
                <a href="#" onclick="submit()" class="btn btn-primary">完成</a>
            </div>
        </div>

    </div>
    <input type="hidden" name="block" value="<?php echo $block; ?>">
    <input type="hidden" name="nearest_store_id" id="nearest_store_id"
           value="<?php echo $nearest_store_id; ?>">
    <input type="hidden" name="submit_order" value="true">
</form>