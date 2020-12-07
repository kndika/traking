
<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="<?php echo base_url('dash');?>"><img src="<?php echo base_url('uplod/'.$this->db->get_where('system_details', array('id' =>'1'))->row()->logo.''); ?>" alt="<?php echo $this->db->get_where('system_details', array('id' => '1'))->row()->sys_name ?>"></a>
                <a class="navbar-brand hidden" href="<?php echo base_url('dash');?>"><img src="<?php echo base_url('uplod/'.$this->db->get_where('system_details', array('id' =>'1'))->row()->logo.''); ?>" alt="<?php echo $this->db->get_where('system_details', array('id' => '1'))->row()->sys_name ?>"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="<?php echo base_url('dash');?>"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    
                    <?php if(!empty($this->session->admin)){?>
                    <h3 class="menu-title">Admin Panel </h3><!-- /.menu-title -->
                    <!--- user list --!---->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Users</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-user-circle-o"></i><a href="<?php echo base_url('newuser')?>">New User</a></li>
                            <li><i class="fa fa-list"></i><a href="<?php echo base_url('userlist')?>" >User List</a></li>                            
                        </ul>
                    </li>
                    
                    
                    <!--- branch --!--->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-map-marker"></i>Branch</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-location-arrow"></i><a href="<?php echo base_url('addBranch')?>">New Branch</a></li>
                            <li><i class="fa fa-list"></i><a href="<?php echo base_url('branchlist')?>">Branch List</a></li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="<?php echo base_url('sysdetails')?>"> <i class="menu-icon fa fa-cogs"></i>System Details</a>
                    </li>
                    
                     
                    <?php } ?>
                    
                  

                    <h3 class="menu-title">Branch Zone</h3><!-- /.menu-title -->
                    
                     <?php 
                   
                     if(!empty($this->session->add)){?>
                    <li>
                        <a href="<?php echo base_url('newPacage')?>"> <i class="menu-icon fa fa-gift"></i>New Package</a>
                    </li>
                     <?php } ?>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-gift"></i>Package</a>
                        <ul class="sub-menu children dropdown-menu">
                            <?php  if(!empty($this->session->red)){?> 
                            
                            <li><i class="menu-icon fa fa-fort-awesome"></i><a href="<?php echo base_url('branch_mark')?>">Update Branch</a></li>
                            <li><i class="menu-icon fa fa-check-circle"></i><a href="<?php echo base_url('deliver_finishing')?>">Deliver Finishing</a></li>
                            <?php } ?>
                            <?php  if(!empty($this->session->add)){?> 
                              <li><i class="menu-icon fa fa-check-circle"></i><a href="<?php echo base_url('note_package')?>">Note for package</a></li>
                            <?php } ?>
                        </ul>
                    </li>
                    
                
                    <h3 class="menu-title">Report</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-building-o"></i>Report</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-building-o"></i><a href="<?php echo base_url('branchReport')?>">Delivery Finish Branch</a></li>
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="pendingJob">Delivery Pending Branch</a></li>
                            <li><i class="menu-icon fa fa-area-chart"></i><a href="branch_status">Branch Status</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->
    
