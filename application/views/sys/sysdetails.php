<div class="container col-sm-7 mt-5 mb-5">
    <?php if(!empty($error)){echo $error;}?>
    <form action="" method="post">
  <div class="form-group">
    <label for="email">Name Of Company</label>
    <input type="text" class="form-control" id="email" name="sys_name"  value="<?php echo $this->db->get_where('system_details', array('id' => '1'))->row()->sys_name ?>" required>
    <?php echo form_error('sys_name', '<div class="alert text-danger"><strong>* </strong>', '</div> '); ?>
  </div>
  <div class="form-group">
    <label for="pwd">Address </label>
    <input type="text" class="form-control" id="pwd" name="sys_address" value="<?php echo $this->db->get_where('system_details', array('id' => '1'))->row()->sys_address ?>" required>
    <?php echo form_error('sys_address', '<div class="alert text-danger"><strong>* </strong>', '</div> '); ?>
  </div>
    
      <div class="form-group">
    <label for="pwd">Telephone Number</label>
    <input type="text" class="form-control" id="pwd" name="sys_tp" value="<?php echo $this->db->get_where('system_details', array('id' => '1'))->row()->sys_tp ?>" required>
   <?php echo form_error('sys_tp', '<div class="alert text-danger"><strong>* </strong>', '</div> '); ?>
      </div>
    
     <div class="form-group">
    <label for="pwd">Email</label>
    <input type="text" class="form-control" id="pwd" name="sys_email" value="<?php echo $this->db->get_where('system_details', array('id' => '1'))->row()->sys_email ?>" required>
   <?php echo form_error('sys_email', '<div class="alert text-danger"><strong>* </strong>', '</div> '); ?>
     </div>
    
     <div class="form-group">
    
    <button type="button" class="btn btn-success"  data-toggle="modal" data-target="#myModal"> <i class="fa fa-upload" aria-hidden="true"></i> Upload Logo</button>
    
  </div>
     <div class="form-group">
    <label for="pwd">Cord for Bar </label>
    <input type="text" class="form-control" id="pwd" name="bar_prifix" value="<?php echo $this->db->get_where('system_details', array('id' => '1'))->row()->bar_prifix ?>" required>
   <?php echo form_error('bar_prifix', '<div class="alert text-danger"><strong>* </strong>', '</div> '); ?>
     </div>
    
     <div class="form-group">
    <label for="pwd">Currency</label>
    <input type=text" class="form-control" id="pwd" name="currency" value="<?php echo $this->db->get_where('system_details', array('id' => '1'))->row()->currency ?>" required>
   <?php echo form_error('currency', '<div class="alert text-danger"><strong>* </strong>', '</div> '); ?>
     </div>
    
      <div class="form-group">
    <label for="pwd">Note for Invoice</label>
    <textarea  class="form-control" name="not_for_invoice" required><?php echo $this->db->get_where('system_details', array('id' => '1'))->row()->not_for_invoice ?></textarea>
   <?php echo form_error('not_for_invoice', '<div class="alert text-danger"><strong>* </strong>', '</div> '); ?>
      </div>
    
    

    
  
    <input type="submit" class="btn btn-default btn-success" name="sysdetails" value="Submit">
</form>
    </div>

    
    <!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Upload a Photo</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
          <form action="<?php echo base_url('image_up')?>" method="post" enctype="multipart/form-data">
               <input type="file" class="form-control" id="customFile" accept="image/*"  style="width:250px" name="userfile" required>
               </br> <input type="submit" value="Uplod" class="btn btn-success" name="upImage" >
          </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>