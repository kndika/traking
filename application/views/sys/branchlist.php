<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
if(empty($this->session->admin)){redirect(base_url('dash'));}
?>
<div class="container mt-5">
    <div class="row  ml-3">
        <a href="<?php echo base_url('addBranch')?>"> <button type="button" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> New Branch</button></a>
    </div>

    <?php // if(!empty($da)){echo $da;}?>
    <div class="row mt-3">

        <div class="col-md-12">


            <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Branch Name</th>
                        <th>Branch Cord</th>
                        <th>Branch Telephone Number</th>
                        <th>Branch City</th>  
                    </tr>
                </thead>

                <tfoot>
                    <tr>
                       <th>Branch Name</th>
                        <th>Branch Cord</th>
                        <th>Branch Telephone Number</th>
                        <th>Branch City</th>                       
                        
                    </tr>
                </tfoot>

                <tbody>
                   
              <?php  foreach($br_list as $ul){ ?>
                    <tr>
                        <td><?php echo $ul->branch_name ?></td>
                        <td><?php echo $ul->branch_cord ?></td>
                        <td><?php echo $ul->branch_tpno ?></td>
                        <td><?php echo $ul->branch_city?></td>
                         </tr>
                    
                    




<div class="modal fade" id="delete<?php echo $ul->branch_id ?>" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?php  echo base_url('syspassre')?>" method="post">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title custom_align" id="Heading">Add New Password</h4>
            </div>
            <div class="modal-body">
          
               <input type="hidden" id="company"  class="form-control" name="branch_id" value="<?php echo $ul->branch_id?>" >
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