<div id="page-inside">

    <?php
    $product = $product[0];
    ?>

    <span style="font-family: bold;color:#555">
        Name:<?php echo $product->name; ?>
    </span>

    <div style="color:#555;padding:5px">

        <div><img src="<?php echo UPLOAD_URL . $product->img_url; ?>" width="100%"></div>
        <br>

        <div class="form-group">
            <form id="upload" method="post" action="<?php echo URL; ?>common/upload" enctype="multipart/form-data">

                <div id="drop" border="1">
                    <input type="file" name="upl" multiple />
                </div>
                <ul id="upload_flag">
                    <!-- The file uploads will be shown here -->
                </ul>
                <input type="hidden" name="fixed_upload_img_name" value="<?php echo $product->img_url; ?>">
            </form>
        </div>

        <br>

        <div class="page-button ok">
            <a href="<?php echo URL; ?>mobileadmin/productManager/" id="submit_link">确认</a>
        </div>



    </div>

</div>
<script src="<?php echo URL; ?>public/js/jquery.knob.js"></script>

<script src="<?php echo URL; ?>public/js/jquery.ui.widget.js"></script>
<script src="<?php echo URL; ?>public/js/jquery.iframe-transport.js"></script>
<script src="<?php echo URL; ?>public/js/jquery.fileupload.js"></script>

<script src="<?php echo URL; ?>public/js/upload-script.js"></script>

<script>
    $(document).ready(function(){
        $('#upload_flag').change(function(){

            var mo2g = '<span id="done_span">DONE<span>';
            $('#submit_link').append(mo2g);

            setTimeout(function(){
                $('#done_span').click();
            },2000)

            //$("#submit_link").click();
        });
    })
</script>