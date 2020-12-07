<?php

//$code= $sn;

?>

 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>

</head>
<body>
    <form id="form1">
        <div id="GFG" class="container mt-5">
            
            
        
<!------ Include the above in your HEAD tag ---------->

<!--Author      : @arboshiki-->
<div id="invoice">

   
    <div class="invoice overflow-auto">
        <div style="width: 100%">
            <header>
                <div class="row">
                    <div class="col">
                        
                            <img src="<?php echo base_url('uplod/'.$this->db->get_where('system_details', array('id' =>'1'))->row()->logo.''); ?>" data-holder-rendered="true"  width="30%"/>
                            
                    </div>
                    <div class="col company-details">
                        <h2 class="name">
                           
                            <?php echo $this->db->get_where('system_details', array('id' => '1'))->row()->sys_name ?> 
                            
                        </h2>
                        <div><?php echo $this->db->get_where('system_details', array('id' => '1'))->row()->sys_address ?></div>
                        <div><?php echo $this->db->get_where('system_details', array('id' => '1'))->row()->sys_tp ?></div>
                        <div><?php echo $this->db->get_where('system_details', array('id' => '1'))->row()->sys_email ?></div>
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    
                    <div class="col invoice-to">
                        <div class="text-gray-light">INVOICE TO:</div>
                        <h2 class="to"><?php echo $this->db->get_where('sender_details', array('package_sn' => $code))->row()->sender_name ?></h2>
                        <div class="address">
                            <?php echo $this->db->get_where('sender_details', array('package_sn' => $code))->row()->sender_street ?>.
                           <?php echo $this->db->get_where('sender_details', array('package_sn' => $code))->row()->sender_city ?>.
                           <?php echo $this->db->get_where('sender_details', array('package_sn' => $code))->row()->sender_state ?>.                           
                           <?php echo $this->db->get_where('sender_details', array('package_sn' => $code))->row()->sender_country ?>.
                        Zip:<?php echo $this->db->get_where('sender_details', array('package_sn' => $code))->row()->sender_zip ?>.</div>


                        <div class="email"><a href="mailto:<?php echo $this->db->get_where('sender_details', array('package_sn' => $code))->row()->sender_mail ?>"> <?php echo $this->db->get_where('sender_details', array('package_sn' => $code))->row()->sender_mail ?></a></div>
                    </div>
                    <div class="col invoice-details">
                        <h1 class="invoice-id"><img src="<?php echo base_url('page/barcord/'.$code.'');?>" width="30%"></h1>
                        <div class="date">Date of Invoice: <?php echo $this->db->get_where('sender_details', array('package_sn' => $code))->row()->sender_date ?></div>
                        <div class="date">Due Date: <?php echo $this->db->get_where('sender_details', array('package_sn' => $code))->row()->sender_date ?></div>
                    </div>
                </div>
                
                <div class="row contacts">
                    
                    <div class="col invoice-to">
                        <div class="text-gray-light">RECEIVER:</div>
                        <h2 class="to"><?php echo $this->db->get_where('receiver_details', array('package_sn' => $code))->row()->receiver_name ?></h2>
                        <div class="address">
                            <?php echo $this->db->get_where('receiver_details', array('package_sn' => $code))->row()->receiver_street ?>.
                           <?php echo $this->db->get_where('receiver_details', array('package_sn' => $code))->row()->receiver_city ?>.
                           <?php echo $this->db->get_where('receiver_details', array('package_sn' => $code))->row()->receiver_state ?>.                           
                           <?php echo $this->db->get_where('receiver_details', array('package_sn' => $code))->row()->receiver_country ?>.
                        Zip:<?php echo $this->db->get_where('receiver_details', array('package_sn' => $code))->row()->receiver_zip ?>.</div>
                        <div class="email"><a href="mailto:<?php echo $this->db->get_where('receiver_details', array('package_sn' => $code))->row()->receiver_mail ?>"> <?php echo $this->db->get_where('receiver_details', array('package_sn' => $code))->row()->receiver_mail ?></a></div>
                    </div>
                   
                </div>
                
                <table border="0" cellspacing="0" cellpadding="0" class="col-10 mt-5">
                    <thead class="col-10">
                        <tr>
                            <th>#</th>
                            <th class="text-left">DESCRIPTION</th>
                            <th class="text-right">Package </th>
                            <th class="text-right"> PRICE </th>
                            <th class="text-right">TOTAL</th>
                        </tr>
                    </thead>
                    <tbody class="col-10">
                        <tr>
                            <td class="no"></td>
                            <td class="text-left"><h3><?php echo $this->db->get_where('package_details', array('package_sn' => $code))->row()->package_category ?></h3>
                               <?php echo $this->db->get_where('package_details', array('package_sn' => $code))->row()->package_note ?>
                            </td>
                            <td class="text-right"><?php echo $this->db->get_where('package_details', array('package_sn' => $code))->row()->package_weight ?></td>
                            <td class="text-right"><?php echo $this->db->get_where('system_details', array('id' => '1'))->row()->currency ?><?php echo $this->db->get_where('package_details', array('package_sn' => $code))->row()->delivery_cost ?></td>
                            <td class="text-right"><?php echo $this->db->get_where('system_details', array('id' => '1'))->row()->currency ?><?php echo $this->db->get_where('package_details', array('package_sn' => $code))->row()->delivery_cost ?></td>
                        </tr>
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2" class="text-right">SUBTOTAL</td>
                            <td class="text-right"><?php echo $this->db->get_where('system_details', array('id' => '1'))->row()->currency ?><?php echo $this->db->get_where('package_details', array('package_sn' => $code))->row()->delivery_cost ?></td>
                        </tr>
                        
                    </tfoot>
                </table>
                <div class="thanks">Thank you!</div>
                <div class="notices">
                    <div>NOTICE:</div>
                    <div class="notice"><?php echo $this->db->get_where('system_details', array('id' => '1'))->row()->not_for_invoice ?></div>
                </div>
            </main>
            <footer>
                Invoice was created on a computer and is valid without the signature and seal.
            </footer>
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
    <hr>
        
        
</div>
<div style="break-after:page"></div>
   <div class="row contacts">
                    
                    <div class="col invoice-to">
                        <div class="text-gray-light">FROM:</div>
                        <h2 class="to"><?php echo $this->db->get_where('sender_details', array('package_sn' => $code))->row()->sender_name ?></h2>
                        <div class="address">
                            <?php echo $this->db->get_where('sender_details', array('package_sn' => $code))->row()->sender_street ?></br>
                           <?php echo $this->db->get_where('sender_details', array('package_sn' => $code))->row()->sender_city ?></br>
                           <?php echo $this->db->get_where('sender_details', array('package_sn' => $code))->row()->sender_state ?></br>                          
                           <?php echo $this->db->get_where('sender_details', array('package_sn' => $code))->row()->sender_country ?></br>
                        Zip:<?php echo $this->db->get_where('sender_details', array('package_sn' => $code))->row()->sender_zip ?>.</div>
                        
                    </div>
       
                     <div class="col invoice-to">
                        <div class="text-gray-light">To:</div>
                        <h2 class="to">
                           
                            <?php echo $this->db->get_where('receiver_details', array('package_sn' => $code))->row()->receiver_name ?></h2>
                        <div class="address">
                            
                            <?php echo $this->db->get_where('receiver_details', array('package_sn' => $code))->row()->receiver_street ?></br>
                           <?php echo $this->db->get_where('receiver_details', array('package_sn' => $code))->row()->receiver_city ?></br>
                           <?php echo $this->db->get_where('receiver_details', array('package_sn' => $code))->row()->receiver_state ?></br>                          
                           <?php echo $this->db->get_where('receiver_details', array('package_sn' => $code))->row()->receiver_country ?></br>
                        Zip:<?php echo $this->db->get_where('receiver_details', array('package_sn' => $code))->row()->receiver_zip ?>.</div>
                         <img src="<?php echo base_url('page/barcord/'.$code.'');?>">
                    </div>
                   
                </div>          
      
    </div>
        <input type="button" value="Print This Invoice" id="btnPrint" class="btn btn-secondary ml-5" onclick="printDiv()"/>
    </form>
</body>
</html>

<script> 
        function printDiv() { 
		
            var divContents = document.getElementById("GFG").innerHTML; 
            var a = window.open('', '', 'height=500, width=800'); 
            a.document.write('<html>'); 
            a.document.write('<body> '); 
            a.document.write(divContents);
			a.document.getElementsByTagName("head")[0].insertAdjacentHTML( "beforeend","<link rel=\"stylesheet\" href=\"<?php echo base_url('vendors/bootstrap/dist/css/bootstrap.min.css') ?>\" />");
			a.document.write("imagehtml"); 
            a.document.write('</body></html>'); 
            a.document.close(); 
            setTimeout(function () { 
                a.print(); 
            }, 500);
        } 
    </script> 