<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="col-sm-12 mb-4">
        <div class="card-group">
            <div class="card col-md-6 no-padding ">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-refresh fa-spin  fa-fw"></i>
                    </div>

                    <div class="h4 mb-0">
                        <span class="count"><?php echo $this->db->where('status','1')->where('branch',$this->session->branch)->count_all_results('package_details');?></span>
                    </div>

                    <small class="text-muted text-uppercase font-weight-bold">Pending Delivery</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            <div class="card col-md-6 no-padding ">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-handshake-o"></i>
                    </div>
                    <div class="h4 mb-0">
                        <span class="count"><?php echo $this->db->where('status','2')->where('branch',$this->session->branch)->count_all_results('package_details');?></span>
                    </div>
                    <small class="text-muted text-uppercase font-weight-bold">Finish Delivery</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-2" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            <div class="card col-md-6 no-padding ">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-home"></i>
                    </div>
                    <div class="h4 mb-0">
                        <span class="count"><?php echo $this->db->where('status','2')->where('branch',$this->session->branch)->like('datetime',date('Y-m-d'))->count_all_results('package_details');?></span>
                    </div>
                    <small class="text-muted text-uppercase font-weight-bold">Today Package</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-3" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            <div class="card col-md-6 no-padding ">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-cart-plus"></i>
                    </div>
                    <div class="h4 mb-0">
                        <span class="count"><?php echo $this->db->like('package_start_date',date('Y-m-d'))->where('branch',$this->session->branch)->count_all_results('package_details');?></span>
                    </div>
                    <small class="text-muted text-uppercase font-weight-bold">Today Our Oders</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-4" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            <div class="card col-md-6 no-padding ">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-thumbs-o-up"></i>
                    </div>
                    <div class="h4 mb-0"><?php echo $this->db->like('datetime',date('Y-m-d'))->like('status','2')->where('branch',$this->session->branch)->count_all_results('package_details');?></div>
                    <small class="text-muted text-uppercase font-weight-bold">Today We Finish</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-5" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            <div class="card col-md-6 no-padding ">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-user-circle-o"></i>
                    </div>
                    <div class="h4 mb-0">
                        <span class="count">
                        <?php echo $this->db->where('branch',$this->session->branch)->count_all_results('sys_users');?>
                        </span>
                    </div>
                    <small class="text-muted text-uppercase font-weight-bold">Users</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
        </div>
    </div>

<div class="container row">
    <div id="chartContainer" style="height: 10px; width: 100%;"></div>
</div>
<?php  if(!empty($this->session->alreport)){?>

<div class="col-sm-12 mb-4">
        <div class="card-group">
            <div class="card col-md-6 no-padding ">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-refresh fa-spin  fa-fw"></i>
                    </div>

                    <div class="h4 mb-0">
                        <span class="count"><?php echo $this->db->where('status','1')->count_all_results('package_details');?></span>
                    </div>

                    <small class="text-muted text-uppercase font-weight-bold">Pending  All</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            <div class="card col-md-6 no-padding ">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-handshake-o"></i>
                    </div>
                    <div class="h4 mb-0">
                        <span class="count"><?php echo $this->db->where('status','2')->count_all_results('package_details');?></span>
                    </div>
                    <small class="text-muted text-uppercase font-weight-bold">Finish Delivery</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-2" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            <div class="card col-md-6 no-padding ">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-home"></i>
                    </div>
                    <div class="h4 mb-0">
                        <span class="count"><?php echo $this->db->where('status','2')->like('datetime',date('Y-m-d'))->count_all_results('package_details');?></span>
                    </div>
                    <small class="text-muted text-uppercase font-weight-bold">Today Package</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-3" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            <div class="card col-md-6 no-padding ">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-cart-plus"></i>
                    </div>
                    <div class="h4 mb-0">
                        <span class="count"><?php echo $this->db->like('package_start_date',date('Y-m-d'))->count_all_results('package_details');?></span>
                    </div>
                    <small class="text-muted text-uppercase font-weight-bold">Today Our Oders</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-4" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            <div class="card col-md-6 no-padding ">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-thumbs-o-up"></i>
                    </div>
                    <div class="h4 mb-0"><?php echo $this->db->like('datetime',date('Y-m-d'))->like('status','2')->count_all_results('package_details');?></div>
                    <small class="text-muted text-uppercase font-weight-bold">Today We Finish</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-5" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            <div class="card col-md-6 no-padding ">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-user-circle-o"></i>
                    </div>
                    <div class="h4 mb-0">
                        <span class="count">
                        <?php echo $this->db->count_all_results('sys_users');?>
                        </span>
                    </div>
                    <small class="text-muted text-uppercase font-weight-bold">Users</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
        </div>
    </div>

<div class="container row">
    <div id="chartContainer" style="height: 10px; width: 100%;"></div>
</div>


<?php 

//echo date_format(date_create(date('Y-').strtolower(date('F',strtotime(date('Y-m').'- 1  month')))),"Y-m");

?>




<!--------- js ------!---------->

<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3">All Branch This Month</h4>
                                <canvas id="sales-chart"></canvas>
                            </div>
                        </div>
                    </div><!-- /# column -->


                </div>

            </div><!-- .animated -->
       
        </div><!-- .content -->
        
        
        <!--------- js ------!---------->

<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3">All Branch This Month Income</h4>
                                <canvas id="income-chart"></canvas>
                            </div>
                        </div>
                    </div><!-- /# column -->


                </div>

            </div><!-- .animated -->
       
        </div><!-- .content -->





        <script src="<?php echo base_url('vendors/chart.js/dist/Chart.bundle.min.js');?>"></script>
        <script src="<?php //echo base_url('asset/js/init-scripts/chart-js/chartjs-init.js')?>"></script>
        
        <script>
            
        // income chart
       
    var ctx = document.getElementById( "sales-chart" );
    ctx.height = 150;
    var myChart = new Chart( ctx, {
        type: 'line',
        data: {
            labels: [<?php foreach ($branch_name as $br){ ?> "<?php echo $br->branch_name; ?>",<?php }?>],
            type: 'line',
            defaultFontFamily: 'Montserrat',
            datasets: [ {
                label: "Pending",
                data: [ <?php foreach ($branch_name as $br){ ?> <?php echo $this->db->where(array('status'=>'1','branch'=>$br->branch_cord))->like('package_start_date',date('Y-m'))->count_all_results('package_details');?>,<?php }?> ],
                backgroundColor: 'transparent',
                borderColor: 'rgba(220,53,69,0.75)',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: 'rgba(220,53,69,0.75)',
                    }, {
                label: "Finish",
                data: [ <?php foreach ($branch_name as $br){ ?> <?php echo $this->db->where(array('status'=>'2','branch'=>$br->branch_cord))->like('datetime',date('Y-m'))->count_all_results('package_details');?>,<?php }?>],
                backgroundColor: 'transparent',
                borderColor: 'rgba(40,167,69,0.75)',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: 'rgba(40,167,69,0.75)',
                    } ]
        },
        options: {
            responsive: true,

            tooltips: {
                mode: 'index',
                titleFontSize: 12,
                titleFontColor: '#000',
                bodyFontColor: '#000',
                backgroundColor: '#fff',
                titleFontFamily: 'Montserrat',
                bodyFontFamily: 'Montserrat',
                cornerRadius: 3,
                intersect: false,
            },
            legend: {
                display: false,
                labels: {
                    usePointStyle: true,
                    fontFamily: 'Montserrat',
                },
            },
            scales: {
                xAxes: [ {
                    display: true,
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    scaleLabel: {
                        display: false,
                        labelString: 'Branch'
                    }
                        } ],
                yAxes: [ {
                    display: true,
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    scaleLabel: {
                        display: true,
                        labelString: 'Package'
                    }
                        } ]
            },
            title: {
                display: false,
                text: 'Normal Legend'
            }
        }
    } );


            
         
         //Sales chart
    var ctx = document.getElementById( "income-chart" );
    ctx.height = 150;
    var myChart = new Chart( ctx, {
        type: 'line',
        data: {
            labels: [<?php foreach ($branch_name as $br){ ?> "<?php echo $br->branch_name; ?>",<?php }?>],
            type: 'line',
            defaultFontFamily: 'Montserrat',
            datasets: [ {
                label: "This Month",
                data: [<?php foreach ($branch_name as $br){ ?> <?php $branch_cord=$br->branch_cord;$dat=date('Y-m');$to=$this->Report_model->total_of_dilavary_cost($branch_cord,$dat);foreach ($to as $to){echo $to->delivery_cost.',';}}?> ],
                backgroundColor: 'transparent',
                borderColor: 'rgba(220,53,69,0.75)',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: 'rgba(220,53,69,0.75)',
                    }, 
                {
                label: "Last Month",
                data: [ <?php foreach ($branch_name as $br){ ?> <?php $branch_cord=$br->branch_cord;$dat=date_format(date_create(date('Y-').strtolower(date('F',strtotime(date('Y-m').'- 1  month')))),"Y-m");$to=$this->Report_model->total_of_dilavary_cost($branch_cord,$dat);foreach ($to as $to){echo $to->delivery_cost.',';}}?> ],
                backgroundColor: 'transparent',
                borderColor: 'rgba(40,167,69,0.75)',
                borderWidth: 3,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
                pointBackgroundColor: 'rgba(40,167,69,0.75)',
                    }]
        },
        options: {
            responsive: true,

            tooltips: {
                mode: 'index',
                titleFontSize: 12,
                titleFontColor: '#000',
                bodyFontColor: '#000',
                backgroundColor: '#fff',
                titleFontFamily: 'Montserrat',
                bodyFontFamily: 'Montserrat',
                cornerRadius: 3,
                intersect: false,
            },
            legend: {
                display: false,
                labels: {
                    usePointStyle: true,
                    fontFamily: 'Montserrat',
                },
            },
            scales: {
                xAxes: [ {
                    display: true,
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    scaleLabel: {
                        display: false,
                        labelString: 'Branch'
                    }
                        } ],
                yAxes: [ {
                    display: true,
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    scaleLabel: {
                        display: true,
                        labelString: 'Income'
                    }
                        } ]
            },
            title: {
                display: false,
                text: 'Normal Legend'
            }
        }
    } );





/// 

        </script>
 <?php }?>





     
