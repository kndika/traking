<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
if(empty($this->session->admin)){redirect(base_url('dash'));}
?>

<form action="" method="post">
<div class="col-lg-10 mt-5">
    
    <div class="card">
        <div class="card-header"><strong><?php echo $page_title?></strong><small> Form</small></div>
        <?php if(!empty($errmasage)){echo $errmasage;}?>
        <div class="card-body card-block">
            <div class="form-group">
                <label for="company" class=" form-control-label">User Full Name</label>
                <input type="text" id="company" placeholder="Enter User Full Name" class="form-control" name="full_name" value="<?php if(!empty($this->input->post('full_name'))){echo $this->input->post('full_name');} ?>">
                <?php echo form_error('full_name', '<div class="alert text-danger"><strong>* </strong>', '</div> '); ?>
            </div>
           
            <div class="form-group">
                <label for="vat" class=" form-control-label">Employee Number </label>
                <input type="text" id="vat" placeholder="Employee Number" class="form-control" name="emp_no" value="<?php if(!empty($this->input->post('emp_no'))){echo $this->input->post('emp_no');} ?>" style="width: 100px">
                <?php echo form_error('emp_no', '<div class="alert text-danger"><strong>* </strong>', '</div> '); ?>
            </div>
            <div class="row form-group">
                 <div class="col-8">
                    <div class="form-group">
                        <label for="city" class=" form-control-label">Telephone Number</label>
                        <input type="text" id="city" placeholder="07********" class="form-control" name="tpno" value="<?php if(!empty($this->input->post('tpno'))){echo $this->input->post('tpno');} ?>"></div>
                    <?php echo form_error('tpno', '<div class="alert text-danger"><strong>* </strong>', '</div> '); ?>
                 </div>
                <div class="col-8">
                    <div class="form-group">
                        <label for="city" class=" form-control-label">User Name</label>
                        <input type="text" id="city" placeholder="Enter User Name" class="form-control" name="uname" value="<?php if(!empty($this->input->post('uname'))){echo $this->input->post('uname');} ?>"></div>
                    <?php echo form_error('uname', '<div class="alert text-danger"><strong>* </strong>', '</div> '); ?>
                </div>
                <div class="col-8">
                    <div class="form-group">
                  <label for="postal-code" class=" form-control-label">Password</label>
                  <input type="text" id="postal-code" placeholder="Password" class="form-control" name="password" value="<?php if(!empty($this->input->post('password'))){echo $this->input->post('password');} ?>"></div>
                    <?php echo form_error('password', '<div class="alert text-danger"><strong>* </strong>', '</div> '); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="country" class=" form-control-label">Branch </label>
                <select name="branch" class="form-control" >
                    <?php if(!empty($this->input->post('branch'))){echo '<option>'.$this->input->post('branch').'</option>';}else{ echo '<option value="0">Branch</option>';} ?>
               <?php  foreach($br_list as $br_list){ ?>
               <option  value="<?php echo $br_list->branch_id?>"><?php echo $br_list->branch_name?></option>
                <?php } ?>
                </select>
            <?php echo form_error('branch', '<div class="alert text-danger"><strong>* </strong>', '</div> '); ?>
            </div>
            
             <div class="form-group ml-3">
                 <label for="country" class="form-control-label">Permission </label> </br>
                 
                   <!-- admin !---->
                <label for="inline-radio2" class="form-control-label ">
                <input type="checkbox" id="inline-radio2" name="alreport" value="1" class="form-check-input" <?php if(!empty($this->input->post('alreport'))){echo 'checked';}?>>All Report
                </label></br>
                 
                 <!-- admin !---->
                <label for="inline-radio2" class="form-control-label ">
                <input type="checkbox" id="inline-radio2" name="admin" value="1" class="form-check-input" <?php if(!empty($this->input->post('admin'))){echo 'checked';}?>>Admin
                </label></br>
                
                 <!-- add !---->
                <label for="inline-radio2" class="form-control-label ">
                <input type="checkbox" id="inline-radio2" name="add" value="1" class="form-check-input" <?php if(!empty($this->input->post('add'))){echo 'checked';}?>>Add
                </label></br>
                 <!-- red !---->
                  <label for="inline-radio2" class="form-control-label ">
                 <input type="checkbox" id="inline-radio2" name="red" value="1" class="form-check-input" <?php if(!empty($this->input->post('red'))){echo 'checked';}?>>Read only
                </label></br>
                 <!-- edit !---->
                  <label for="inline-radio2" class="form-control-label ">
                 <input type="checkbox" id="inline-radio2" name="edit" value="1" class="form-check-input" <?php if(!empty($this->input->post('edit'))){echo 'checked';}?>>Edit And Update
                </label></br>
                 <!-- delet !---->
                  <label for="inline-radio2" class="form-control-label ">
                      <input type="checkbox" id="inline-radio2" name="delet" value="1" class="form-check-input" <?php if(!empty($this->input->post('delet'))){echo 'checked';}?>>Delete
                </label></br>
            
            </div>
            
             <div class="form-group">
               
                 <input type="submit" class="btn btn-success" name="newuser" value="Add New User">
           </div>
        </div>
    </div>
</div>
    
    </form>
