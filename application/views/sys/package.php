

            <!-- // $this->Email_model->new_pakage_email(); --!--------->
         
 <div class="container col-10 mb-5">
     <form action="" method="post">
     <h3 class="mt-2 text-capitalize mb-5">sender details</h3>
     <hr>
     
     <?php if(!empty($errorMasage)){echo $errorMasage;}?>
     
  <div class="form-group">
    <label for="email">Name</label>
    <input type="text" class="form-control" placeholder="Name" id="email" required name="sender_name" value="<?php echo $onePackage['sender_name']?>">
    <?php echo form_error('sender_name', '<div class="alert text-danger"><strong>* </strong>', '</div> '); ?>
  </div>
  <div class="form-group mt-3">
      <h5>Address</h5>
    <label for="pwd">Street Address </label>
    <input type="text" class="form-control" placeholder="Street Address" id="pwd" name="sender_street" value="<?php echo $onePackage['sender_street']?>" required>
     <?php echo form_error('sender_street', '<div class="alert text-danger"><strong>* </strong>', '</div> '); ?></br>
    <label for="pwd">City / Town </label>
    <input type="text" class="form-control" placeholder="City / Town" id="pwd" name="sender_city" value="<?php echo $onePackage['sender_city']?>" required>
     <?php echo form_error('sender_city', '<div class="alert text-danger"><strong>* </strong>', '</div> '); ?></br>
    <label for="pwd">State / Province</label>
    <input type="text" class="form-control" placeholder="State / Province" id="pwd" name="sender_state" value="<?php echo $onePackage['sender_state']?>" required>
     <?php echo form_error('sender_state', '<div class="alert text-danger"><strong>* </strong>', '</div> '); ?></br>
    <label for="pwd">Zip / Postal</label>    
    <input type="text" class="form-control" placeholder="Zip / Postal" id="pwd" name="sender_zip" value="<?php echo $onePackage['sender_zip']?>" required>
     <?php echo form_error('sender_zip', '<div class="alert text-danger"><strong>* </strong>', '</div> '); ?></br>
    <label for="pwd">Country</label>
     <input type="text" class="form-control" placeholder="Country" id="pwd" name="sender_country" value="<?php echo $onePackage['sender_country']?>" required>
      <?php echo form_error('sender_country', '<div class="alert text-danger"><strong>* </strong>', '</div> '); ?></br>
  </div>
         
   <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" placeholder="Sender Email" id="email" required name="sender_mail" value="<?php echo $onePackage['sender_mail']?>" required>
     <?php echo form_error('sender_mail', '<div class="alert text-danger"><strong>* </strong>', '</div> '); ?>
  </div>
     
     <div class="form-group">
    <label for="email">Contact Number</label>
    <input type="text" class="form-control" placeholder="Contact Number" id="email" required name="sender_contact" value="<?php echo $onePackage['sender_contact']?>" required>
     <?php echo form_error('sender_contact', '<div class="alert text-danger"><strong>* </strong>', '</div> '); ?>
  </div>
  
    <div class="form-group">
    <label for="email">NIC</label>
    <input type="text" class="form-control" placeholder="National Identity Number" id="email" required name="sender_nic" value="<?php echo $onePackage['sender_nic']?>" required>
    <?php echo form_error('sender_nic', '<div class="alert text-danger"><strong>* </strong>', '</div> '); ?>
    </div>
     
     
     <hr>
      <h3 class="mt-5 text-capitalize mb-5">receiver details</h3>
     <hr>
     
  <div class="form-group">
    <label for="email">Name</label>
    <input type="text" class="form-control" placeholder="Name" id="email" required  name="receiver_name" value="<?php echo $onePackage['receiver_name']?>">
    <?php echo form_error('receiver_name', '<div class="alert text-danger"><strong>* </strong>', '</div> '); ?>
  </div>
  <div class="form-group mt-3">
      <h5>Address</h5>
    <label for="pwd">Street Address </label>
    <input type="text" class="form-control" placeholder="Street Address" id="pwd" name="receiver_street" required value="<?php echo $onePackage['receiver_street']?>"> 
    <?php echo form_error('receiver_street', '<div class="alert text-danger"><strong>* </strong>', '</div> '); ?></br>
    <label for="pwd">City / Town </label>
    <input type="text" class="form-control" placeholder="City / Town" id="pwd" name="receiver_city" value="<?php echo $onePackage['receiver_city']?>" required>
    <?php echo form_error('receiver_city', '<div class="alert text-danger"><strong>* </strong>', '</div> '); ?></br>
    <label for="pwd">State / Province</label>
    <input type="text" class="form-control" placeholder="State / Province" id="pwd" name="receiver_state" value="<?php echo $onePackage['receiver_state']?>" required>
    <?php echo form_error('receiver_state', '<div class="alert text-danger"><strong>* </strong>', '</div> '); ?></br>
    <label for="pwd">Zip / Postal</label>    
    <input type="text" class="form-control" placeholder="Zip / Postal" id="pwd" name="receiver_zip" value="<?php echo $onePackage['receiver_zip']?>" required>
    <?php echo form_error('receiver_zip', '<div class="alert text-danger"><strong>* </strong>', '</div> '); ?></br>
    <label for="pwd">Country</label>
    <input type="text" class="form-control" placeholder="Country" id="pwd" name="receiver_country" value="<?php echo $onePackage['receiver_country']?>" required>
    <?php echo form_error('receiver_country', '<div class="alert text-danger"><strong>* </strong>', '</div> '); ?></br>
  </div>
         
   <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" placeholder="Email" id="email" required name="receiver_mail" value="<?php echo $onePackage['receiver_mail']?>" >
    <?php echo form_error('receiver_mail', '<div class="alert text-danger"><strong>* </strong>', '</div> '); ?>
  </div>
     
      <div class="form-group">
    <label for="email">Contact Number</label>
    <input type="text" class="form-control" placeholder="Contact Number" id="email" required name="receiver_contact" value="<?php echo $onePackage['receiver_contact']?>" >
    <?php echo form_error('receiver_contact', '<div class="alert text-danger"><strong>* </strong>', '</div> '); ?>
  </div>
  
    <div class="form-group">
    <label for="email">NIC</label>
    <input type="text" class="form-control" placeholder="National Identity Number" id="email" required name="receiver_nic" value="<?php echo $onePackage['receiver_nic']?>">
    <?php echo form_error('receiver_nic', '<div class="alert text-danger"><strong>* </strong>', '</div> '); ?>
  </div>
     
   
     <hr>
      <h3 class="mt-5 text-capitalize mb-5">package details</h3>
     <hr>
  
     
     <div class="form-group">
    <label for="email">Package Weight </label>
    <input type="text" class="form-control" placeholder="Package Weight" id="email" required style="width:150px" name="package_weight" value="<?php echo $onePackage['package_weight']?>">
     <?php echo form_error('package_weight', '<div class="alert text-danger"><strong>* </strong>', '</div> '); ?>
     </div>
     
     <div class="form-group">
    <label for="email">Package Category </label>
    <input type="text" class="form-control" placeholder="Package Category" id="email" required style="width:150px" name="package_category" value="<?php echo $onePackage['package_category']?>">
     <?php echo form_error('package_category', '<div class="alert text-danger"><strong>* </strong>', '</div> '); ?>
    </div>
     
     
    <div class="form-group">
    <label for="email">Finish Delivery</label>
    <input type="date" class="form-control" placeholder="Package Category" id="date_deliver" required style="width:300px" onchange="calDate()" name="package_date_finish" value="<?php echo $onePackage['package_date_finish']?>">
     <?php echo form_error('package_date_finish', '<div class="alert text-danger"><strong>* </strong>', '</div> '); ?>
    </div>
     
     <div class="form-group">
    <label for="email">Date to Finish Delivery</label>
    <input type="hidden" class="form-control"  id="totay" required style="width:300px"    readonly >
    <input type="text" class="form-control"  id="da" required style="width:300px"  readonly name="package_date_to_recive" value="<?php echo $onePackage['package_date_to_recive']?>">
     <?php echo form_error('package_date_to_recive', '<div class="alert text-danger"><strong>* </strong>', '</div> '); ?>
    </div>
     
    <div class="form-group">
    <label for="email">Note</label>
    <textarea class="form-control" name="package_note"><?php echo $onePackage['package_note']?></textarea>
    </div>
     
     <div>
         <div class="card">

  

         <?php 
         $package_sn=$onePackage['package_sn'];
        $one_pac= $this->Package_model->note_one($package_sn);
        foreach ($one_pac as $one){            
           echo'  <div class="card-header">'.$one->note.'/</br> By -'.$one->uname.'/</br> Branch-'.$one->branch_name.'</div>';
        }
         ?>
  </div>
     </div>
    
     <div class="form-group">
    <label for="email">Cost of Delivery <?php echo $this->db->get_where('system_details', array('id' => '1'))->row()->currency ?></label>
    
    <input type="text" class="form-control"  placeholder="" id="da" required style="width:300px"   name="delivery_cost" required value="<?php echo $onePackage['delivery_cost']?>">
     <?php echo form_error('delivery_cost', '<div class="alert text-danger"><strong>* </strong>', '</div> '); ?>
    </div>
    
   
   
     
   
     
     
         
         
  <!--   <input type="submit" class="btn btn-primary" value="Ad Package" name="adpackage"> !----->
  
  


</form>

</div>
           
                         
   
   
  
  <script type = "text/javascript" > 
	
   function calDate() {
     var x=document.getElementById("totay").value;
     var y=document.getElementById("date_deliver").value;
     var timeDiff =(new Date(y)) - (new Date(x)); 
     var Difference_In_Days = timeDiff / (1000 * 60 * 60 * 24); 
     document.getElementById("da").value =Difference_In_Days;
   }
</script> 