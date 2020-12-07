<form action="" method="post">
<div class="mt-5 container">
    <div class="row">
        
        <?php if ($this->session->alreport == '0') { ?>
            <div class="col">
                <div class="form-group">
                    <label for="email">Branch</label>
                    <input type="text" class="form-control" value="<?php echo  $this->db->get_where('branch', array('branch_cord' => $this->session->branch))->row()->branch_name?>" id="email" >
                    <input type="hidden" class="form-control" value="<?php echo  $this->session->branch?>" id="email" name="branch_cord">
                <?php echo form_error('branch_cord', '<div class="alert text-danger"><strong>* </strong>', '</div> '); ?>
                </div>
            </div>
        <?php } else { ?>

            <div class="col">
                <div class="form-group">
                    <label for="email">Branch</label>
                    <select  class="form-control" name="branch_cord">
                        <?php foreach($br_list as $ul){ 
                        echo '<option value="'.$ul->branch_cord.'">'.$ul->branch_name.'</option>'; }?>
                        
                    </select>
                    <?php echo form_error('branch_cord', '<div class="alert text-danger"><strong>* </strong>', '</div> '); ?>
                </div>
            </div>


        <?php } ?>
        

        <div class="col">
            <div class="form-group">
                <label for="email">First Date:</label>
                <input type="date" class="form-control" placeholder="Enter Date"  name="fistDate" id="email" value="<?php if(!empty($this->input->post('fistDate'))){ echo $this->input->post('fistDate'); }?>">
           <?php echo form_error('fistDate', '<div class="alert text-danger"><strong>* </strong>', '</div> '); ?>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="email">Last Date:</label>
                <input type="date" class="form-control" placeholder="Enter Date" id="email" name="lastDate" value="<?php if(!empty($this->input->post('lastDate'))){ echo $this->input->post('lastDate'); }?>">
              <?php echo form_error('lastDate', '<div class="alert text-danger"><strong>* </strong>', '</div> '); ?>
            </div>
        </div>

        <div class="col"><div class="form-group">
                </br>
                <label for="email"></label>
                <button type="submit" class="btn btn-success">Success</button>
            </div></div>
            
    </div>

</div>
    <div>
         
         
       
    </div>
    </form>

<?php if(!empty($resalt)){?>
<div class="container">
  <h2>Branch Details</h2>
  <table class="table">
    <thead>
      <tr>
        <th>Branch name</th>
        <th>Status</th>
        <th>Cost</th>
      </tr>
    </thead>
    <tbody>
         <?php  foreach($resalt as $re){
             $totl[]=intval($re->delivery_cost);?>
      <tr>
        <td><?php echo $re->branch_name?></td>
        <td>
            <?php if($re->status==1){echo 'Pending';}?>
            <?php if($re->status==2){echo 'Finish';}?>
        </td>
        <td><?php echo $re->delivery_cost?></td>
      </tr>      
         <?php }?>
      
      <tr>
        <td></td>
        <td>Total Income</td>
        <td> <?php print_r(array_sum($totl));?></td>
      </tr>  
      
      
    </tbody>
  </table>
</div>

<?php } ?>