<div id="page-content" style="min-height: 2911px;">
    <div id="wrap">
        <div id="page-heading">

            <ol class="breadcrumb">
                <li>水果7号</li>
                <li>资产中心</li>
                <li class="active">客户管理</li>
            </ol>

            <h1>客户管理</h1>

        </div>

        <div class="container">
            <div>
                <table id="customer_data_table" class="display" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>标识</th>
                        <th>姓名</th>
                        <th>电话</th>
                        <th>派送地址</th>
                        <th>创建时间</th>
                        <th>查看订单</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>标识</th>
                        <th>姓名</th>
                        <th>电话</th>
                        <th>派送地址</th>
                        <th>创建时间</th>
                        <th>查看订单</th>
                    </tr>
                    </tfoot>

                    <tbody>
                    <?php foreach ($customers as $customer) { ?>
                        <tr align="center">
                            <td><?php echo $customer->id; ?></td>
                            <td><?php echo $customer->name; ?></td>
                            <td><?php echo $customer->cellphone; ?></td>
                            <td><?php echo $customer->district . $customer->address1 . $customer->address2; ?></td>
                            <td><?php echo $customer->created_time; ?></td>
                            <td><a data-toggle="modal" href="#myModal" class="btn btn-primary" onclick="show_order_detail('<?php echo $customer->id; ?>')">查看订单</a>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>

            </div>

            <div class="panel">
            </div><!-- /panel -->
        </div>
    </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">订单详情</h4>
            </div>
            <div class="modal-body" id="modal-body">

            </div>
            <div class="modal-body" id="modal-detail"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>


<style>
    .storeform { padding:.8em 1.2em; }
    .storeform h2 { color:#555; margin:0.3em 0 .8em 0; padding-bottom:.5em; border-bottom:1px solid rgba(0,0,0,.1); }
    .storeform label { display:block; margin-top:1.2em; }
    .switch .ui-slider-switch { width: 8.5em !important }
</style>

<script type="text/javascript">
    $(document).ready(function(){
        $('#customer_data_table').dataTable();
    });

    function show_order_detail(customer_id) {
        $.ajax({
            url: '<?php echo URL; ?>customer/getCustomerOrderById/' + customer_id,
            data: "",
            dataType: 'json',
            success: function(data) {

                var content = "";
                var amount_sum = 0;

                if (data != null && data.length != null && data.length > 0) {

                    content = '<table width="100%" border="1">' +
                        '<thead>' +
                            '<tr>' +
                                '<th>订单ID</th>' +
                                '<th>金额</th>' +
                                '<th>状态</th>' +
                                '<th>创建时间</th>' +
                            '</tr>' +
                        '</thead>' +
                        '<tbody>';


                    for (var m = 0; m < data.length; ++m) {
                        var id = data[m]['id'];
                        var total_amount = data[m]['total_amount'];
                        var status = data[m]['status'];
                        var created_time = data[m]['created_time'];
                        content += '<tr align="center"><td>' + id + '</td>';
                        content += '<td>' + total_amount + '</td>';
                        content += '<td>' + status + '</td>';
                        content += '<td>' + created_time + '</td></tr>';

                        amount_sum += Number(total_amount);
                    }

                    content += "</tbody></table><br />"
                }

                content += '<p>总消费金额: ￥' + amount_sum + '</p>';

                $('#modal-body').html(content);
            }

        })
    }
</script>