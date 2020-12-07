<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
if(empty($this->session->admin)){redirect(base_url('dash'));}
?>
<div class="container mt-5">
    <div class="row  ml-3">
        <a href="<?php echo base_url('newuser')?>"  > <button type="button" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> New User</button></a>
    </div>

    <?php if(!empty($da)){echo $da;}?>
    <div class="row mt-3">

        <div class="col-md-12">


            <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Employee Number</th>
                        <th>User Name</th>
                        <th>Telephone Number</th>
                        <th>Branch</th>
                        <th>Start date</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Reset</th>
                    </tr>
                </thead>

                <tfoot>
                    <tr>
                        <th>Employee Number</th>
                        <th>User Name</th>
                        <th>Telephone Number</th>
                        <th>Branch</th>
                        <th>Start date</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Reset</th>
                    </tr>
                </tfoot>

                <tbody>
                   
              <?php  foreach($user_list as $ul){ ?>
                    <tr>
                        <td><?php echo $ul->emp_no ?></td>
                        <td><?php echo $ul->uname ?></td>
                        <td><?php echo $ul->tpno ?></td>
                        <td><?php echo $ul->branch ?></td>
                        <td><?php echo $ul->emp_no ?></td>
                        <td><?php echo $ul->emp_no ?></td>
                        <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit<?php echo $ul->sys_user_id ?>" ><span class="fa fa-pencil-square-o"></span></button></p></td>
                        <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete<?php echo $ul->sys_user_id ?>" ><span class="fa fa-unlock-alt"></span></button></p></td>
                    </tr>
                    
                    
                    
                    <!--- models --!---->
                    
      <div class="modal fade" id="edit<?php echo $ul->sys_user_id ?>" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title custom_align" id="Heading"> Edit <?php echo $ul->emp_no ?> Detail</h4>
            </div>
            <div class="modal-body">
              <!--- body start !--->
              <form action="<?php echo base_url('update_sys_user');?>" method="post">
<div class="col-lg-10 mt-5">
    
    <div class="card">
        <div class="card-header"><strong><?php echo $page_title?></strong><small> Form</small></div>
        
        <div class="card-body card-block">
            <div class="form-group">
                <label for="company" class=" form-control-label">User Full Name</label>
                <input type="text" id="company"  class="form-control" name="full_name" value="<?php echo $ul->full_name?>" disabled>
                <input type="hidden" id="company"  class="form-control" name="sys_user_id" value="<?php echo $ul->sys_user_id?>" >
                <input type="hidden" id="company"  class="form-control" name="emp_no" value="<?php echo $ul->emp_no?>" >
            </div>
           
            <div class="form-group">
                <label for="vat" class=" form-control-label">Employee Number </label>
                <input type="text" id="vat" placeholder="Employee Number" class="form-control" name="emp_no" value="<?php echo $ul->emp_no?>" style="width: 100px" disabled>
                
            </div>
            <div class="row form-group">
                 <div class="col-8">
                    <div class="form-group">
                        <label for="city" class=" form-control-label">Telephone Number</label>
                        <input type="text" id="city" placeholder="07********" class="form-control" name="tpno" value="<?php echo $ul->tpno?>" disabled></div>
                   
                 </div>
                <div class="col-8">
                    <div class="form-group">
                        <label for="city" class=" form-control-label">User Name</label>
                        <input type="text" id="city" placeholder="Enter User Name" class="form-control" name="uname" value="<?php echo $ul->uname?>" disabled></div>
                    
                </div>
              
            </div>
            <div class="form-group">
                <label for="country" class=" form-control-label">Branch </label>
                <select name="branch" class="form-control" >                 
                    <option  value="<?php echo $ul->branch?>"><?php echo $this->db->get_where('branch', array('branch_cord' =>$ul->branch))->row()->branch_name ?></option>
               <?php  foreach($br_list as $br_list){ ?>
               <option  value="<?php echo $br_list->branch_id?>"><?php echo $br_list->branch_name?></option>
               <?php } ?>
                </select>
            
            </div>
            
             <div class="form-group ml-3">
                 <label for="country" class="form-control-label">Permission </label> </br>
                 
                  <!-- alreport !---->
                <label for="inline-radio2" class="form-control-label ">
                <input type="checkbox" id="inline-radio2" name="alreport" value="1" class="form-check-input" <?php if(!empty($ul->alreport)){echo 'checked';}?>>All Report
                </label></br>
                
                 
                 <!-- admin !---->
                <label for="inline-radio2" class="form-control-label ">
                <input type="checkbox" id="inline-radio2" name="admin" value="1" class="form-check-input" <?php if(!empty($ul->admin)){echo 'checked';}?>>Admin
                </label></br>
                
                 <!-- add !---->
                <label for="inline-radio2" class="form-control-label ">
                <input type="checkbox" id="inline-radio2" name="add" value="1" class="form-check-input"  <?php if(!empty($ul->add)){echo 'checked';}?>>Add
                </label></br>
                
                 <!-- red !---->
                  <label for="inline-radio2" class="form-control-label ">
                 <input type="checkbox" id="inline-radio2" name="red" value="1" class="form-check-input" <?php if(!empty($ul->red)){echo 'checked';}?>>Read only
                </label></br>
                 <!-- edit !---->
                  <label for="inline-radio2" class="form-control-label ">
                 <input type="checkbox" id="inline-radio2" name="edit" value="1" class="form-check-input" <?php if(!empty($ul->edit)){echo 'checked';}?>>Edit And Update
                </label></br>
                 <!-- delet !---->
                  <label for="inline-radio2" class="form-control-label ">
                      <input type="checkbox" id="inline-radio2" name="delet" value="1" class="form-check-input" <?php if(!empty($ul->delet)){echo 'checked';}?>>Delete
                </label></br>
            
            </div>
            
             <div class="form-group">
               
                 <input type="submit" class="btn btn-success" name="newuser" value="Update User">
           </div>
        </div>
    </div>
</div>
    
    </form>

              <!--- body end !--->
            </div>
           
        </div>
        <!-- /.modal-content --> 
    </div>
    <!-- /.modal-dialog --> 
</div>



<div class="modal fade" id="delete<?php echo $ul->sys_user_id ?>" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?php  echo base_url('syspassre')?>" method="post">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title custom_align" id="Heading">Add New Password</h4>
            </div>
            <div class="modal-body">
          
               <input type="hidden" id="company"  class="form-control" name="sys_user_id" value="<?php echo $ul->sys_user_id?>" >
               <input type="password" id="company"  placeholder="New Password" class="form-control" name="upassword"   required>
            </div>
            <div class="modal-footer ">
                <input type="submit" value="Add New Password" class="btn btn-success" >
               
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
            </div>
        </div>
        </form>
        <!-- /.modal-content --> 
    </div>
    <!-- /.modal-dialog --> 
</div>
                
<?php } ?>
                </tbody>
            </table>


        </div>
    </div>
</div>





<script>
    $(document).ready(function () {
        $('#datatable').dataTable();

        $("[data-toggle=tooltip]").tooltip();

    });

</script>
<style>
    .pagination>li {
        display: inline;
        padding:0px !important;
        margin:0px !important;
        border:none !important;
    }
    .modal-backdrop {
        z-index: -1 !important;
    }
    /*
    Fix to show in full screen demo
    */
    iframe
    {
        height:700px !important;
    }

    .btn {
        display: inline-block;
        padding: 6px 12px !important;
        margin-bottom: 0;
        font-size: 14px;
        font-weight: 400;
        line-height: 1.42857143;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        -ms-touch-action: manipulation;
        touch-action: manipulation;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        background-image: none;
        border: 1px solid transparent;
        border-radius: 4px;
    }

    .btn-primary {
        color: #fff !important;
        background: #428bca !important;
        border-color: #357ebd !important;
        box-shadow:none !important;
    }
    .btn-danger {
        color: #fff !important;
        background: #d9534f !important;
        border-color: #d9534f !important;
        box-shadow:none !important;
    }
</style>