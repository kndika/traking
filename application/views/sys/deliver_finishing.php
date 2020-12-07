<div class="container mt-5">
    <?php if(!empty($error)){echo $error;}?>
    <form action="" method="post">
    <div class="input-group">
    <span class="input-group-addon inputlg"><i class="fa fa-barcode" aria-hidden="true"></i></span>
    <input id="msg" type="text" class="form-control input-lg col-6" name="bar" placeholder="Package Barcode"  autofocus required>
    <?php echo form_error('bar', '<div class="alert text-danger"><strong>* </strong>', '</div> '); ?>
    </div>
    <input type="submit" value="Submit" name="barcod_update" style="display: none">
    </form>

</div>


    
