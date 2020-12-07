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
                <label for="company" class=" form-control-label">Branch  Name</label>
                <input type="text" id="company" placeholder="Enter Branch  Name" class="form-control" name="branch_name" value="<?php if(!empty($this->input->post('branch_name'))){echo $this->input->post('branch_name');} ?>">
                <?php echo form_error('branch _name', '<div class="alert text-danger"><strong>* </strong>', '</div> '); ?>
            </div>
           
            <div class="form-group">
                <label for="vat" class=" form-control-label">Branch  Cord </label>
                <input type="text" id="vat" placeholder="Branch  Cord" class="form-control" name="branch_cord" value="<?php if(!empty($this->input->post('branch_cord'))){echo $this->input->post('branch_cord');} ?>" style="width: 100px">
                <?php echo form_error('branch_cord', '<div class="alert text-danger"><strong>* </strong>', '</div> '); ?>
            </div>
            <div class="row form-group">
                 <div class="col-8">
                    <div class="form-group">
                        <label for="city" class=" form-control-label">Telephone Number</label>
                        <input type="text" id="city" placeholder="07********" class="form-control" name="branch_tpno" value="<?php if(!empty($this->input->post('branch_tpno'))){echo $this->input->post('branch_tpno');} ?>"></div>
                    <?php echo form_error('branch_tpno', '<div class="alert text-danger"><strong>* </strong>', '</div> '); ?>
                 </div>
           
            </div>
            
             <div class="row form-group">
                 <div class="col-8">
                    <div class="form-group">
                        <label for="city" class=" form-control-label">Branch City</label>
                        <input type="text" id="city" placeholder="Branch City" class="form-control" name="branch_city" value="<?php if(!empty($this->input->post('branch_city'))){echo $this->input->post('branch_city');} ?>"></div>
                    <?php echo form_error('branch_city', '<div class="alert text-danger"><strong>* </strong>', '</div> '); ?>
                 </div>
           
            </div>
            
         
         
            
          
            
             <div class="form-group">
               
                 <input type="submit" class="btn btn-success" name="newuser" value="Add Branch">
           </div>
        </div>
    </div>
</div>
    
    </form>
