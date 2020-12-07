<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

?>


<div class="col-lg-10 mt-5">
    <?php foreach($one_user as $one){  ?>
    <div class="card">
        <div class="card-header"><strong><?php echo $page_title?></strong></div>
        <?php if(!empty($errmasage)){echo $errmasage;}?>
        <div class="card-body card-block">
            <div class="form-group">
                <label for="company" class=" form-control-label">User Full Name</label>
                <input type="text" id="company"  class="form-control" name="full_name" value="<?php echo $one->full_name ?>" disabled>
                
            </div>
           
            <div class="form-group">
                <label for="vat" class=" form-control-label">Employee Number </label>
                <input type="text" id="vat"  class="form-control" name="emp_no" value="<?php echo $one->emp_no ?>" disabled style="width: 100px">
                
            </div>
            <div class="row form-group">
                 <div class="col-8">
                    <div class="form-group">
                        <label for="city" class=" form-control-label">Telephone Number</label>
                        <input type="text" id="city"  class="form-control" name="tpno" value="<?php echo $one->tpno ?>" disabled></div>
                    
                 </div>
                <div class="col-8">
                    <div class="form-group">
                        <label for="city" class=" form-control-label">User Name</label>
                        <input type="text" id="city"  class="form-control" name="uname" value="<?php echo $one->uname ?>" disabled>
                    </div>  
                </div>
                <div class="col-8">
                    <div class="form-group">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#delete<?php echo $one->sys_user_id ?>"><i class="fa fa-key text-danger" aria-hidden="true"></i> Password Reset</button>
                  </div>
                    <!-- The Modal -->
<div class="modal" id="delete<?php echo $one->sys_user_id ?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">My Password Reset</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
          <form action="<?php echo base_url('sys_user_passre');?>" method="post">
              
             <div class="col-8">
                    <div class="form-group">
                  <label for="postal-code" class=" form-control-label">Password</label>
                  <input type="password" id="postal-code" class="form-control" name="upassword" ></div>
                  
                  <input type="submit" value="Password Reset" class="btn badge-warning">
                </div> 
          </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
                    <!--- end model !------>
                  
                </div>
            </div>
          
            
              <div class="form-group">
                <label for="country" class=" form-control-label">Branch </label>
                <input type="text" id="city"  class="form-control" name="uname" value="<?php echo $one->branch ?>" disabled>
           
            </div>
            
            
             <div class="form-group ml-3">
                 
                 <label for="country" class="form-control-label">Permission </label> 
                 </br>
                 
                 <!-- admin !---->
                <label for="inline-radio2" class="form-control-label ">
                    <input type="checkbox" id="inline-radio2" name="admin" value="1" class="form-check-input" <?php if(!empty($one->admin)){echo 'checked';}?> disabled>Admin
                </label></br>
                 <!-- red !---->
                  <label for="inline-radio2" class="form-control-label ">
                 <input type="checkbox" id="inline-radio2" name="red" value="1" class="form-check-input" <?php if(!empty($one->red)){echo 'checked';}?> disabled>Read only
                </label></br>
                 <!-- edit !---->
                  <label for="inline-radio2" class="form-control-label ">
                 <input type="checkbox" id="inline-radio2" name="edit" value="1" class="form-check-input" <?php if(!empty($one->edit)){echo 'checked';}?> disabled>Edit And Update
                </label></br>
                 <!-- delet !---->
                  <label for="inline-radio2" class="form-control-label ">
                      <input type="checkbox" id="inline-radio2" name="delet" value="1" class="form-check-input" <?php if(!empty($one->delet)){echo 'checked';}?> disabled>Delete
                </label></br>
            
            </div>
            
           
        </div>
        
        <?php }?>
    </div>
</div>
    
   
