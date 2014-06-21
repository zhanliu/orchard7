<script type="text/javascript">
    function addRow(tableID) {
        var table = document.getElementById(tableID);
        var rowCount = table.rows.length;
        var row = table.insertRow(rowCount);

        var cell1 = row.insertCell(0);
        var element1 = document.createElement("input");
        element1.type = "checkbox";
        element1.name="chkbox[]";
        cell1.appendChild(element1);

        var cell2 = row.insertCell(1);
        cell2.innerHTML = rowCount + 1;

        var cell3 = row.insertCell(2);
        var element2 = document.createElement("select");
        element2.name = "product_id[]";
        //Create and append the options
        <?php
            foreach ($products as $product) {
                echo 'var option = document.createElement("option");';
                echo 'option.value = "'.$product->id.'";';
                echo 'option.text = "'.$product->name.'";';
                echo 'element2.appendChild(option);';
            }
        ?>
        cell3.appendChild(element2);

        var cell4 = row.insertCell(3);
        var element3 = document.createElement("input");
        element3.type = "text";
        element3.name = "quantity[]";
        cell4.appendChild(element3);
    }

    function deleteRow(tableID) {
        try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;

            for(var i=0; i<rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[0].childNodes[0];
                if(null != chkbox && true == chkbox.checked) {
                    table.deleteRow(i);
                    rowCount--;
                    i--;
                }
            }
        }catch(e) {
            alert(e);
        }
    }

    $(document).ready(function(){
//        $(".combo_add_button").click(function(){
//            $(".panel").toggle("fast");
//            $(this).toggleClass("active");
//            return false;
//        });

        $('#combo_data_table').dataTable();
    });

    function submit() {
        document.getElementById("myform").submit();
        return false;
    }

    function showComboProduct(comboID, comboName) {
        //p.id, p.name, p.category_id, p.unit, p.price, p.description, p.tag, cd.combo_id, cd.product_id, cd.quantity

//        var obj = eval ('{"5":[{"name":"芒果","quantity":"1"},{"name":"苹果","quantity":"1"}],"6":[{"name":"荔枝","quantity":"2"},{"name":"龙眼","quantity":"2"}],"7":[{"name":"芒果","quantity":"3"},{"name":"草莓","quantity":"3"}]}');

        var comboDetail = eval('(' + '<?php echo $comboDetailJson; ?>' + ')');
        var combinedID = "ID" +  comboID;


        var str = '<table border="1"><thead><tr><th>名称</th><th>数量</th></tr></thead><tfoot><tr><th>名称</th><th>数量</th></tr></tfoot><tbody>';

        for (var n in eval('(' + 'comboDetail.' + combinedID + ')')) {
            var product = eval('(' + 'comboDetail.' + combinedID +'['+ n + ']' +  ')');
            str = str + '<tr><td>';
            str = str + product.name + '</td>';
            str = str + '<td>'+ product.quantity + '</td></tr>';
        }
        str = str +'</tbody></table>';

        $("#detailcontent").replaceWith('<div id="detailcontent">'+str + '<a href="#" class="myButton" onclick="closedetailbox();closebox(\'detailbox\'); ">确认</a>'+'</div>');
        $(".detailboxtitle").replaceWith('<span id="boxtitle" class="detailboxtitle"></span>');
        openbox("detailbox","套餐-" + comboName, 0);

        return false;
    }

    function closedetailbox() {
        $(".detailboxtitle").replaceWith('<span id="detailboxtitle" class="detailboxtitle"></span>');
//        return closebox("detailbox", 1);
    }
</script>

<div id="page-content" style="min-height: 2911px;">
    <div id="wrap">
        <div id="page-heading">

            <ol class="breadcrumb">
                <li>水果7号</li>
                <li>库存管理</li>
                <li class="active">套餐管理</li>
            </ol>

            <h1>套餐管理</h1>

        </div>

        <div class="container">


            <div>
                <table id="combo_data_table" class="display" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th text-align="right">名称</th>
                        <th text-align="right">价格</th>
                        <th text-align="right">描述</th>
                        <th text-align="right">查看</th>
                        <th text-align="right">删除</th>
                        <th text-align="right">创建时间</th>
                        <th text-align="right">修改时间</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr align="center">
                        <th>名称</th>
                        <th>价格</th>
                        <th>描述</th>
                        <th>查看</th>
                        <th>删除</th>
                        <th>创建时间</th>
                        <th>修改时间</th>
                    </tr>
                    </tfoot>

                    <tbody>
                    <?php foreach ($combos as $combo) { ?>
                        <tr align="center">
                            <td><?php echo $combo->name; ?></td>
                            <td><?php echo $combo->price; ?></td>
                            <td><?php echo $combo->description; ?></td>
                            <td><a data-toggle="modal" href="#myModal" class="btn btn-primary" onclick="show_combo_detail(<?php echo $combo->id; ?>)">查看</a></td>
                            <td><a href="<?php echo URL . 'stock/deletecombo/' . $combo->id; ?>" class="myButton">删除</a></td>
                            <td><?php echo $product->created_time; ?></td>
                            <td><?php echo $product->updated_time; ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>

            </div>

<!--            <div id="shadowing"></div>-->
<!--            <div id="detailbox" class="box" STYLE="margin: 0 auto; border: 1px solid #F00; WIDTH: 25%; height:35%; ALIGN: CENTER">-->
<!--                <span id="boxtitle" class="detailboxtitle"></span>-->
<!--                <div id="detailcontent">-->
<!--                </div>-->
<!--            </div>-->

            <a href="<?php echo URL; ?>stock/addCombo" class="myButton">添加新套餐</a>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">商品详情</h4>
            </div>
            <div class="modal-body" id="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#product_data_table').dataTable();
    });

    function show_combo_detail(combo_id) {
        $.ajax({
            url: '<?php echo URL; ?>stock/getComboDetailById/' + combo_id,
            data: "",
            dataType: 'json',
            success: function(data) {
//                var name = data['name'];
//                var description = data['description'];
//                var price = data['price'];
//                var unit = data['unit'];
//                var img_url = data['img_url'];
//                var content = '<p><img src="/orchard7/public/upload/' + img_url + '" width="240" height="180"></p>';
//                content+= '<p>商品名称: ' + name + '</p>';
//                content+= '<p>定价: ' + price + '/' + unit + '</p>';
//                content+= '<p>商品描述: ' + description + '</p>';
                $('#modal-body').html("abc");
            }

        })
    }
</script>