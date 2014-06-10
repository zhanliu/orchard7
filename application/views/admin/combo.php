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
        element3.name = "number_of_unit[]";
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
        $(".combo_add_button").click(function(){
            $(".panel").toggle("fast");
            $(this).toggleClass("active");
            return false;
        });

        $('#combo_data_table').dataTable();
    });
</script>

<div id="page-content" style="min-height: 2911px;">
    <div id="wrap">
        <div id="page-heading">

            <ol class="breadcrumb">
                <li><a href="#">Dashboard</a></li>
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
                        <th>名称</th>
                        <th>价格</th>
                        <th>描述</th>
                        <th>标签</th>
                        <th>活跃</th>
                        <th>创建时间</th>
                        <th>修改时间</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>名称</th>
                        <th>价格</th>
                        <th>描述</th>
                        <th>标签</th>
                        <th>活跃</th>
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
                            <td><?php echo $combo->tag; ?></td>
                            <td>[<a href="<?php echo URL . 'admin/deletecombo/' . $combo->id; ?>">X</a>]</td>
                            <td><?php echo $product->created_time; ?></td>
                            <td><?php echo $product->updated_time; ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>

                <div class="add_object_button_div">
                    <button class="combo_add_button">添加</button>
                </div>

            </div>

            <div class="panel">

                <form class="comboform" action="<?php echo URL; ?>admin/addCombo" method="post">
                    <h2>创建新套餐</h2>
                    <label for="name">套餐名称*</label>
                    <input type="text" name="name" id="name" value="" data-clear-btn="true" data-mini="true">

                    <INPUT type="button" value="加入商品" onclick="addRow('dataTable')" />
                    <INPUT type="button" value="删除商品" onclick="deleteRow('dataTable')" />
                    <TABLE id="dataTable" width="100%" border="1">
                        <TR>
                            <TD><INPUT type="checkbox" name="chk"/>1</TD>
                            <TD> 1 </TD>
                            <TD>
                                <select name="product_id[]" id="mapping">
                                    <?php
                                    foreach ($products as $product) {
                                        echo '<option value="'.$product->id.'">'.$product->name.'</option>';
                                    }
                                    ?>
                                </select>
                            </TD>
                            <TD><input type="text" name="number_of_unit[]"></TD>
                        </TR>
                    </TABLE>

                    <label for="price">价格*</label>
                    <input type="text" name="price" id="price" value="" data-clear-btn="true" autocomplete="off" data-mini="true">

                    <div class="switch">
                        <label for="is_archived">当前状态</label>
                        <select name="is_archived" id="slider" data-role="slider" data-mini="true">
                            <option value="on">激活</option>
                            <option value="off">禁止</option>
                        </select>
                    </div>

<!--                    <p><button>放弃</button></p>-->
                    <input type="submit" name="submit_add_combo" value="保存" />
                </form>
            </div><!-- /panel -->
        </div>
    </div>
</div>

<style>

    .comboform { padding:.8em 1.2em; }
    .comboform h2 { color:#555; margin:0.3em 0 .8em 0; padding-bottom:.5em; border-bottom:1px solid rgba(0,0,0,.1); }
    .comboform label { display:block; margin-top:1.2em; }
    .switch .ui-slider-switch { width: 15.5em !important }
    .ui-grid-a { margin-top:1em; padding-top:.8em; margin-top:1.4em; border-top:1px solid rgba(0,0,0,.1); }
    .ui-panel {
        width: 30%;
    }
</style>