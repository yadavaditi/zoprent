<?php
if(!isset($_SESSION)){ session_start();} 
  
	include("../config.php");
   // include("class.phpmailer.php");
	if(!isset($_SESSION['login']) && ($_SESSION['login'] != 'true'))
	{
		header("location:../index.php");
	}	
date_default_timezone_set('Asia/Calcutta');    
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>ZOPRENT INVOICE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
<!--<script type="text/javascript" src="http://html2canvas.hertzen.com/build/html2canvas.js"></script>-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
 <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.plugin.html2canvas.js"></script>
<style>
.html2canvas { width: 1200px !important; }
</style>
</head>
<?php

$nms=$_GET['id'];
$sub_qry2=mysql_query("select * from zopinvoice where bookingid='$nms'");
									$sub_res2=mysql_fetch_array($sub_qry2);
									$ids=$sub_res2['id'];
									$name=$sub_res2['cname'];
									$address=$sub_res2['address'];
									$price=$sub_res2['price'];
                                    $disc=$sub_res2['discount'];
									$btotal=$sub_res2['total'];
									$fdate=$sub_res2['fdate'];
									$tdate=$sub_res2['tdate'];
									$number=$sub_res2['phone'];
									$main_category=$sub_res2['main_category'];
									$description=$sub_res2['vname'];
                                    $vAddress=$sub_res2['v_address'];
									$days=$sub_res2['numberdays'];
									$pickup=$sub_res2['pickup'];
									$tnc=$sub_res2['terms_cond'];
									$gdate=date("Y-m-d");
                                    $ftotal=$btotal-$disc;
									$tax=$ftotal*18/100;
									$taxs=$ftotal*18/100;
									$convs=100;
									if($main_category=='Bikes'){ $gtotal=$ftotal+$taxs; } 
									else { 
									$gtotal=$ftotal+$tax+$convs;
									}
									$str=substr($nms, 0, -4);
									$bkids=$str.$ids;
									$qs=mysql_query("update zopinvoice set bookingid=
								'$bkids' where id='$ids'");
				
			if($qs)	
				{
				
				$_SESSION['success_msg']="aaaa";		
					
				}
			else
				{
					$_SESSION['error_msg']="aaaa";
				}
?>


<script>

/*------------------new code--------------------*/

$(document).ready(function(){
$('button').click(function(){
elem = $('#testdiv');
html2canvas(elem, {
onrendered: function(canvas) {
//context.fillStyle = "rgba(0, 0, 0, 0.4)";
var img = canvas.toDataURL("image/png","width=1200");
var output = img.replace(/^data:image\/(png|jpg);base64,/, "");
var output = encodeURIComponent(img);
var cur_path = 'upload';
var bkid  = '<?php echo $ids;?>';
var Parameters = "image=" + output + "&filedir=" + cur_path + "&zid=" + bkid;
$.ajax({
type: "POST",
url: "save_image.php",
data: Parameters
});
}
});
});
});
 

</script>


<body>

<div class="container">



<div class="container" id="testdiv">
<div class="page-header" style="padding-bottom: 40px;">
<img src="logo.png" align="right" > 
    <h4 style="padding-top: 20px;color:black;font-size:30px;">INVOICE DETAIL</h4>
	<strong style="font-size:16px;"><p>Invoice No. :<?php echo $bkids;?></p></strong>
</div>
      
    <div class="row">
        <div class="col-xs-12">
		<div>
			 
                <strong style="width:300px;">Company Address:</strong>
				<p style="width:300px;">579, 10th B Main Rd, 4th, <br/>T Block East, Jayanagar, <br/>Bengaluru, Karnataka 560011</p>
                <strong style="font-size:16px;"><p>GSTIN : 29AAICR0830N1Z0 </p></strong><br/>
		<!--	<div class="guit" style="width:120px;height:35px;font-size:24px;padding-left:5px;"><b style="width:10px;heght:30px;">Z<b><span>ZopRent</span></div>-->
             <strong align="right" style="font-size:16px;"><p>Date:<?php echo $gdate;?></p></strong> <br/> <br/>
			 <h3 align="right" style="margin-top: -50px;">Booking Confirmed for&nbsp;<?php echo $description;?></h3>
            </div>
		
            <hr>
            <div class="row">
                <div class="col-xs-12 col-md-3 col-lg-3 pull-left">
                    <div class="panel panel-default height">
                        <div class="panel-heading" style="font-size:20px;">Billing Details</div>
                        <div class="panel-body">
                            <strong style="font-size:16px;"><?php echo $name;?></strong><br>
                            <strong style="font-size:16px;"><?php echo $address;?></strong><br>
                        </div>
                    </div>
                </div>
				<div class="col-xs-12 col-md-3 col-lg-3">
                    <div class="panel panel-default height">
                        <div class="panel-heading" style="font-size:20px;">Vendor Details:</div>
						<div class="panel-body">
						    <!-- <strong style="font-size:16px;"><p>GSTIN : 29AAICR0830N1Z0 </p></strong><br/> -->
                            <!-- <strong style="font-size:16px;"><p>Invoice No. :<?php //echo $bkids;?></p></strong> -->
						   <!--  <strong style="font-size:16px;"><p>Date:<?php //echo $gdate;?></p></strong> -->
                           <strong style="font-size:16px;"><?php echo $vAddress;?></strong><br>
                        
                        </div>
						
                    </div>
                </div>
<div class="col-xs-12 col-md-3 col-lg-3">
                    <div class="panel panel-default height">
                        <div class="panel-heading" style="font-size:20px;">Rental Duration</div>
                        <div class="panel-body" style="font-size:16px;">
                             <strong style="font-size:16px;"><p>From</p><?php echo date('d-m-y h:i A',strtotime($fdate));?></strong><br>
                             
                           
                            <strong style="font-size:16px;"><p>To</p><?php echo date('d-m-y h:i A',strtotime($tdate));?></strong>
                        
                        </div>
                    </div>
                </div>
				
                
                <div class="col-xs-12 col-md-3 col-lg-3 pull-right">
                    <div class="panel panel-default height">
                       <?php  $addr=$_SESSION['devl'];
					if($addr==null){
                       echo '<div class="panel-heading" style="font-size:20px;">Pickup Location:</div>';}else
					   echo '<div class="panel-heading" style="font-size:20px;">Delivery Location:</div>';?>
                        <div class="panel-body">
                            <strong style="font-size:16px;"><?php echo $pickup;?></strong><br>
                           
                            
               
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-center" style="font-size:20px;"><strong>Order summary</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <td><strong style="font-size:20px;">Vechile Type</strong></td>
                                    <td class="text-center" style="font-size:20px;"><strong>Vechile Name</strong></td>
                                    <td class="text-center" style="font-size:20px;"><strong>Price</strong></td>
                                    <td class="text-right" style="font-size:20px;"><strong>No. of Days</strong></td>
									<td class="text-right" style="font-size:20px;"><strong>Total</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="font-size:20px;"><strong><?php echo $main_category;?></strong></td>
                                    <td class="text-center" style="font-size:20px;"><strong><?php echo $description;?></strong></td>
                                    <td class="text-center" style="font-size:20px;"><strong><?php echo $price;?></strong></td>
                                    <td class="text-right" style="font-size:20px;"><strong><?php echo $days;?></strong></td>
									<td class="text-right" style="font-size:20px;"><strong><?php echo $btotal;?></strong></td>
                                </tr>
                               
                                <tr>
                                    <td class="highrow"></td>
                                    <td class="highrow"></td>
									<td class="highrow"></td>
                                    <td class="highrow text-center" style="font-size:20px;"><strong>Subtotal</strong></td>
                                    <td class="highrow text-right" style="font-size:20px;"><strong><?php echo $btotal;?></strong></td>
                                </tr>
                                <tr>
                                    <td class="highrow"></td>
                                    <td class="highrow"></td>
                                    <td class="highrow"></td>
                                    <td class="highrow text-center" style="font-size:20px;"><strong>Discount</strong></td>
                                    <td class="highrow text-right" style="font-size:20px;"><strong><?php echo $disc;?></strong></td>
                                </tr>
								<?php if($main_category=='Bikes'){
                                   echo ' <tr>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow"></td>
									<td class="emptyrow"></td>
									 <td class="emptyrow text-center" style="font-size:20px;"><strong>Tax(GST 18%)</strong></td>
                                    <td class="emptyrow text-right" style="font-size:20px;">'; echo $taxs; echo'</td>
                                </tr>';} else { echo'
                                 <tr>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow"></td>
									<td class="emptyrow"></td>
									 <td class="emptyrow text-center" style="font-size:20px;"><strong>Tax(GST 18%)</strong></td>
                                    <td class="emptyrow text-right" style="font-size:20px;">'; echo $tax; echo'</td>
									</tr>
									<tr>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow"></td>
									<td class="emptyrow"></td>
									<td class="emptyrow text-center" style="font-size:20px;"><strong>Reimburse Charge</strong></td>
                                    <td class="emptyrow text-right" style="font-size:20px;">';echo $convs; echo'</td>
                                </tr>
								';}?>
                                <tr>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow"></td>
									 <td class="emptyrow"></td>
                                    <td class="emptyrow text-center" style="font-size:20px;"><strong>Payment Received</strong></td>
                                    <td class="emptyrow text-right" style="font-size:24px;"><strong>INR:&nbsp;<strong><?php echo $gtotal;?></strong></i></td>
                                </tr>
                            </tbody>
                        </table>
						<div style="font-size:18px;">
						<small style="font-size:18px;"><strong>Please Note</strong></small>
						<p><b>1. ZopRent is only a booking platform for self-drive vehicles. It does not operate its own vehicles. In order to provide a comprehensive choice of vehicles, prices, locations to its customers, it has tied up with multiple vehicle vendors.</b></p>

<b>Zoprent’s responsibilities include:</b>
<li><b>a. Issuing a valid Booking ID (a booking confirmation that will be accepted by the vehicle vendor) for its network of vehicle vendors.</b></li>
<li><b>b. Providing refund and support in the event of cancellation.</b></li>
<li><b>c. Providing customer support and information in case of any delays or any other inconvenience.</b></li>

<b>ZopRent’s responsibilities do not include:</b>
<li><b><u>a. ZopRent being an aggregator cannot be held responsible if the documents in the vehicle do not satisfy the state laws. And hence, customer shall make sure that the same go in accord with the respective State laws.</u></b></li>
<li><b>b. The vehicle vendors employees being rude.</b></li>
<li><b>c. The vehicle vendors vehicle not being up to the customers expectation.</b></li>
<li><b>d. The vehicle vendor changing the vehicle and providing a different vehicle due to unavoidable reasons.</b></li>
<li><b>e. The vehicle vendor unable to provide delivery or delay in delivery (if opted) due to unavoidable reasons.</b></li>
          

<p><b>2. Users are required to furnish the following at the time of picking up the vehicle:</b></p>
<li><b>a. A copy of the booking confirmation mail (Soft copy of the mail would do).</b></li>
<li><b>b. A valid identity proof and any other requirements mentioned in the vendor terms and conditions.The same may have to be deposited until return of the vehicle, please read the vendor terms and conditions carefully.</b></li>
<li><b>c. Refundable security deposit mentioned in the mail. Failing to do so, they may not be allowed to pick the vehicle.</b></li>

<p><b>3. Customer needs to verify vehicle documents before accepting vehicle at the time of pickup..</b></p>
<p><b>4. Change of vehicle: In case the vehicle vendor changes the type of vehicle due to some reason, ZopRent will refund the differential amount to the customer upon being intimated by the customer within 72 hours of start of trip.</b></p>

<p><b>5. Delivery of vehicle: In case the user has chosen the option to provide delivery of vehicle at a given location, the vendor would call the user before the ride-start time to confirm the same. However, due to some reason, if the vendor is unable to do so, the user may call the vendor at the number provided in the SMS and email. The payment for delivery of the vehicle has to be made in cash to the vendor at the time of delivery.</b></p>

<p><b>6. In case a booking confirmation e-mail and sms gets delayed or fails because of technical reasons or as a result of incorrect e-mail ID / phone number provided by the user etc, a ticket will be considered "booked" as long as the ticket shows up on the confirmation page of www.zoprent.com</p>
<p>ZopRent- Rent Self-driven,Motorbike & Stay at Bangalore ...</b></p>
<p><a href:www.zoprent.com></a></p>
<p><b>Rent Bikes/Self driven Cars & Stay on hourly/daily basis in Bangalore, Mysore, Goa,Hyderabad,Ooty,Pondicherry,Mumbai & Pune. Rent Royal-Enfield, Harley,Duster, Audi ...</b></p>

<p><b>7. Any grievances or concerns related to the vehicle booking should be reported to the ZopRent support team within 5 days of your trip start date at info@zoprent.com</b></p>
<p><b>8. Cancellation of booking: For cancelling a booking, user can cancel by calling on +91 – 7338295808 / 7338295909.</b></p>
<strong>In case of cancellation, following charges would apply:</strong>
 
<p><b>More Than 72 hours – 20% will be deducted from the booking amount.</b></p> 
<p><b>Less Than 72 hours – No Refund</b></p>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.height {
    min-height: 200px;
}

.icon {
    font-size: 47px;
    color: #5CB85C;
}

.iconbig {
    font-size: 77px;
    color: #5CB85C;
}

.table > tbody > tr > .emptyrow {
    border-top: none;
}

.table > thead > tr > .emptyrow {
    border-bottom: none;
}

.table > tbody > tr > .highrow {
    border-top: 3px solid; 
}
u {
    text-decoration: underline;
}
</style>

<!-- Simple Invoice - END -->
<button id="osx">click</button>

</div>
<script>
$(document).ready(function () {
  document.getElementById("osx").click();
});
</script>
<script>
setTimeout(function () {
   window.location.href= 'http://www.zoprent.com/admin/admin/invoiceform.php'; // the redirect goes here

},10000);
</script>
</body>
</html>