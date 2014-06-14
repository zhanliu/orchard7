<div id="page-content" style="min-height: 2911px;">
    <div id="wrap">
        <div id="page-heading">

            <ol class="breadcrumb">
                <li>水果7号</li>
                <li>订单中心</li>
                <li class="active">订单管理</li>
            </ol>

            <h1>订单管理</h1>

        </div>

        <div class="container">
            <div>
                <table id="store_data_table" class="display" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>标识</th>
                        <th>名称</th>
                        <th>省</th>
                        <th>市</th>
                        <th>区</th>
                        <th>地址</th>
                        <th>电话</th>
                        <th>经度</th>
                        <th>纬度</th>
                        <th>删除</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>标识</th>
                        <th>名称</th>
                        <th>省</th>
                        <th>市</th>
                        <th>区</th>
                        <th>地址</th>
                        <th>电话</th>
                        <th>经度</th>
                        <th>纬度</th>
                        <th>删除</th>
                    </tr>
                    </tfoot>

                    <tbody>
                    <?php foreach ($stores as $store) { ?>
                        <tr align="center">
                            <td><?php echo $store->id; ?></td>
                            <td><?php echo $store->name; ?></td>
                            <td><?php echo $store->state; ?></td>
                            <td><?php echo $store->city; ?></td>
                            <td><?php echo $store->district; ?></td>
                            <td><?php echo $store->address; ?></td>
                            <td><?php echo $store->phone_number; ?></td>
                            <td><?php echo $store->lat; ?></td>
                            <td><?php echo $store->lon; ?></td>
                            <td>[<a href="<?php echo URL . 'admin/deletestore/' . $store->id; ?>">X</a>]</td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>

            </div>


                <div id="shadowing"></div>
                <div id="box" STYLE="margin: 0 auto; WIDTH: 50%; ALIGN: CENTER">
                <span id="boxtitle"></span>

                <form name="myform" class="storeform" action="<?php echo URL; ?>admin/addstore" method="post" target="_parent">
                    店铺名称*:
                    <input type="text" name="name" id="name" value="" data-clear-btn="true" data-mini="true">

                    <BR><BR><BR>

                    地区*:
                    <select name="district" id="district">
                        <option value="海珠区" selected="selected">海珠区</option>
                        <option value="荔湾区">荔湾区</option>
                        <option value="白云区">白云区</option>
                        <option value="天河区">天河区</option>
                        <option value="越秀区">越秀区</option>
                        <option value="黄埔区">黄埔区</option>
                    </select>

                    <BR><BR><BR>

                    地址*:
                    <input type="text" name="address" id="address" value="" data-clear-btn="true" autocomplete="off" data-mini="true">

                    <BR><BR><BR>

                    联系电话:
                    <input type="text" name="phone_number" id="phone_number" value="" data-clear-btn="true" data-mini="true">

                    <BR><BR><BR>

                    <div class="switch">
                        当前状态:
                        <select name="status" id="slider" data-role="slider" data-mini="true">
                            <option value="on">激活</option>
                            <option value="off">禁止</option>
                        </select>
                    </div>

                    <BR><BR><BR>

                    <input type="hidden" name="submit_add_store"/>
                    <a href="#" class="myButton" onclick="document.forms['myform'].submit(); return true;">保存</a>
                    <a href="#" class="myButton" onclick="closebox('box')">取消</a>
                    </p>

                </form>
                </div>

                <!-- panel content goes here -->
            <a href="#" onClick="openbox('box', '店铺管理', 1)">添加新店铺</a>
            <div class="panel">
            </div><!-- /panel -->
         </div>
    </div>
</div>






<style>
    .storeform { padding:.8em 1.2em; }
    .storeform h2 { color:#555; margin:0.3em 0 .8em 0; padding-bottom:.5em; border-bottom:1px solid rgba(0,0,0,.1); }
    .storeform label { display:block; margin-top:1.2em; }
    .switch .ui-slider-switch { width: 8.5em !important }
</style>

<script type="text/javascript">
    $(document).ready(function(){
        $('#store_data_table').dataTable();
    });
</script>