<div class="container mt-5">
    <?php if (!empty($error)) {
        echo $error;
    } ?>
    <form action="" method="post">


        <div class="form-group">
             <label for="email">Note:</label>
            <textarea  class="form-control input-lg col-6" name="note" placeholder="Note" required></textarea>    
<?php echo form_error('note', '<div class="alert text-danger"><strong>* </strong>', '</div> '); ?>
        </div>

        <div class="form-group">
             <label for="email">Package Bar-code:</label>
            <input id="msg" type="text" class="form-control input-lg col-6" name="bar" placeholder="Package Barcode"  autofocus required>
<?php echo form_error('bar', '<div class="alert text-danger"><strong>* </strong>', '</div> '); ?>
        </div>



        <input type="submit" value="Submit" name="barcod_note" style="display: none">
    </form>

</div>
