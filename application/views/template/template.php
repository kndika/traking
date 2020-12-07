  <style>
            *{padding: 0px;
              margin: 0px;}
            .no-js #loader { display: none;  }
            .js #loader { display: block; position: absolute; left: 100px; top: 0; }
            .se-pre-con {
                position: fixed;
                left: 0px;
                top: 0px;
                width: 100%;
                height: 100%;
                z-index: 9999;
                /*	background: url(<?php echo base_url('images/loader-64x/Preloader_2.gif') ?>) center no-repeat #fff;*/
                background: url(https://i.imgur.com/TdYJ6q2.gif) center no-repeat #fff;

            }
        </style>

        <script>

            function myFunction() {
                $(".se-pre-con").fadeIn(2000).delay(2000).fadeOut("slow");
            }
        </script>
    </head>
    <?php

$emp_no=$this->session->emp_no;
$this->Systemuser->permission($emp_no);

$this->load->view('template/heder');

$this->load->view($page_content);
$this->load->view('template/foter');
    


?>
