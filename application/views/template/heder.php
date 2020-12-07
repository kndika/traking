
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $this->db->get_where('system_details', array('id' => '1'))->row()->sys_name ?> | <?php echo $page_title ?></title>
        <meta name="description" content="<?php echo $this->db->get_where('system_details', array('id' => '1'))->row()->sys_name ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <link rel="shortcut icon"  href="<?php echo base_url('uplod/'.$this->db->get_where('system_details', array('id' => '1'))->row()->logo . ''); ?>" >
        
        <link rel="stylesheet" href="<?php echo base_url('vendors/bootstrap/dist/css/bootstrap.min.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('vendors/font-awesome/css/font-awesome.min.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('vendors/themify-icons/css/themify-icons.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('vendors/flag-icon-css/css/flag-icon.min.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('vendors/selectFX/css/cs-skin-elastic.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('vendors/jqvmap/dist/jqvmap.min.css') ?>">

        <!-- data tabal !--->
        <link rel="stylesheet" href="<?php echo base_url('asset/4.1.3/css/bootstrap.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('asset/1.10.20/css/dataTables.bootstrap4.min.css') ?>">

        <!-- tabal !-------->
        <script src="<?php echo base_url('asset/js/jquery-3.3.1.js') ?>"></script>
        <script src="<?php echo base_url('asset/1.10.20/js/jquery.dataTables.min.js') ?>"></script>
        <script src="<?php echo base_url('asset/1.10.20/js/dataTables.bootstrap4.min.js') ?>"></script>
        <!--- print div --!---->
        <script src="<?php echo base_url('asset/js/jQuery.print.js') ?>"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 
        <link rel="stylesheet" href="<?php echo base_url('asset/css/style.css') ?>">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>


        <script>
            function showResult(str) {
                if (str.length == 0) {
                    document.getElementById("livesearch").innerHTML = "";
                    document.getElementById("livesearch").style.border = "0px";
                    return;
                }
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {  // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("livesearch").innerHTML = this.responseText;
                        document.getElementById("livesearch").style.border = "1px solid #A5ACB2";
                    }
                }
                xmlhttp.open("GET", "<?php echo base_url('live') ?>?q=" + str, true);
                xmlhttp.send();
            }
        </script>


      
 
    <body onload="myFunction()">
        <div class="se-pre-con"></div>
        
        <?php $this->load->view('template/leftPanal'); ?>
        
        <div id="right-panel" class="right-panel">

            <!-- Header-->
            <header id="header" class="header">

                <div class="header-menu">

                    <div class="col-sm-7">
                        <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                        <div class="header-left">
                            <button class="search-trigger"><i class="fa fa-search"></i></button>
                            <div class="form-inline">
                                <form class="search-form" >
                                    <input class="form-control mr-sm-2" type="text" placeholder="Search ..." size="30" onkeyup="showResult(this.value)" aria-label="Search">
                                    <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                                </form>
                                  <div id="livesearch" class="position-static fixed-top col-sm-7 bg-secondary ml-5" ></div>
                            </div>

                            <!---
                            <div class="dropdown for-notification">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-bell"></i>
                                    <span class="count bg-danger">5</span>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="notification">
                                    <p class="red">You have 3 Notification</p>
                                    <a class="dropdown-item media bg-flat-color-1" href="#">
                                        <i class="fa fa-check"></i>
                                        <p>Server #1 overloaded.</p>
                                    </a>
                                    <a class="dropdown-item media bg-flat-color-4" href="#">
                                        <i class="fa fa-info"></i>
                                        <p>Server #2 overloaded.</p>
                                    </a>
                                    <a class="dropdown-item media bg-flat-color-5" href="#">
                                        <i class="fa fa-warning"></i>
                                        <p>Server #3 overloaded.</p>
                                    </a>
                                </div>
                            </div>

                            <div class="dropdown for-message">
                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                        id="message"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ti-email"></i>
                                    <span class="count bg-primary">9</span>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="message">
                                    <p class="red">You have 4 Mails</p>
                                    <a class="dropdown-item media bg-flat-color-1" href="#">
                                        <span class="photo media-left"><img alt="avatar" src="images/avatar/1.jpg"></span>
                                        <span class="message media-body">
                                            <span class="name float-left">Jonathan Smith</span>
                                            <span class="time float-right">Just now</span>
                                            <p>Hello, this is an example msg</p>
                                        </span>
                                    </a>
                                    <a class="dropdown-item media bg-flat-color-4" href="#">
                                        <span class="photo media-left"><img alt="avatar" src="images/avatar/2.jpg"></span>
                                        <span class="message media-body">
                                            <span class="name float-left">Jack Sanders</span>
                                            <span class="time float-right">5 minutes ago</span>
                                            <p>Lorem ipsum dolor sit amet, consectetur</p>
                                        </span>
                                    </a>
                                    <a class="dropdown-item media bg-flat-color-5" href="#">
                                        <span class="photo media-left"><img alt="avatar" src="images/avatar/3.jpg"></span>
                                        <span class="message media-body">
                                            <span class="name float-left">Cheryl Wheeler</span>
                                            <span class="time float-right">10 minutes ago</span>
                                            <p>Hello, this is an example msg</p>
                                        </span>
                                    </a>
                                    <a class="dropdown-item media bg-flat-color-3" href="#">
                                        <span class="photo media-left"><img alt="avatar" src="images/avatar/4.jpg"></span>
                                        <span class="message media-body">
                                            <span class="name float-left">Rachel Santos</span>
                                            <span class="time float-right">15 minutes ago</span>
                                            <p>Lorem ipsum dolor sit amet, consectetur</p>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            
                            !------>
                        </div>
                    </div>

                    <div class="col-sm-5">
                        <div class="user-area dropdown float-right">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="user-avatar rounded-circle" src="<?php echo base_url('images/admin.jpg')?>" alt="User Avatar"> 

                            </a>

                            <div class="user-menu dropdown-menu">
                                <a class="nav-link" href="<?php echo base_url('my_pro') ?>"><i class="fa fa-user"></i> My Profile</a>
                                <a class="nav-link" href="<?php echo base_url('logout'); ?>"><i class="fa fa-power-off"></i>  Logout</a>
                            </div>
                        </div>
                        <!---
                        <div class="language-select dropdown" id="language-select">
                            <a class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                                <i class="flag-icon flag-icon-us"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="language">
                                <div class="dropdown-item">
                                    <span class="flag-icon flag-icon-fr"></span>
                                </div>
                                <div class="dropdown-item">
                                    <i class="flag-icon flag-icon-es"></i>
                                </div>
                                <div class="dropdown-item">
                                    <i class="flag-icon flag-icon-us"></i>
                                </div>
                                <div class="dropdown-item">
                                    <i class="flag-icon flag-icon-it"></i>
                                </div>
                            </div>
                        </div>
!----->
                    </div>
                </div>

            </header><!-- /header -->
            <!-- Header-->
         



