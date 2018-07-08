<?php
if(!isset($_SESSION)){ session_start();} 
  
	include("../config.php");
   // include("class.phpmailer.php");
	if(!isset($_SESSION['login']) && ($_SESSION['login'] != 'true'))
	{
		header("location:../index.php");
	}	
date_default_timezone_set('Asia/Calcutta');    

$nms=$_GET['id'];
$sub_qry2=mysql_query("select * from zopinvoice where bookingid='$nms'");
									$sub_res2=mysql_fetch_array($sub_qry2);
									$ids=$sub_res2['id'];
									$name=$sub_res2['cname'];
									$address=$sub_res2['address'];
									$price=$sub_res2['price'];
									$ftotal=$sub_res2['total'];
									$fdate=$sub_res2['fdate'];
									$tdate=$sub_res2['tdate'];
									$number=$sub_res2['phone'];
									$main_category=$sub_res2['main_category'];
									$description=$sub_res2['vname'];
									$days=$sub_res2['numberdays'];
									$pickup=$sub_res2['pickup'];
									$tnc=$sub_res2['terms_cond'];
									$gdate=date("Y-m-d");
									$tax=$ftotal*18/100;
									$taxs=$ftotal*5/100;
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
				$to = $email;
$subject = 'Booking Confirmation';
$from = 'zoprentcs@gmail.com';
 
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";


 
// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
 
// Compose a simple HTML email message 
$message = '<html><body>';
$message .= '<h4 style="color:#000;">Hi' echo $name; '</h4>';
$message .= '<div align="center" style="width: 100%; padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;">';
$message .= '<div style="width: 60%;padding-bottom: 40px;padding-bottom: 9px;margin: 40px 0 20px;border-bottom: 1px solid #eee">';
$message .= '<img src="http://www.zoprent.com/logos.png" align="right" ></img>';
$message .= '<h4 style="padding-top: 20px;color:black;font-size:30px;" align="center">INVOICE DETAIL</h4>';
$message .= '</div>';
$message .= '<div style="margin-right: -15px;margin-left: -15px;">';
$message .= '<div style="width: 60%;">';
$message .= '<div align="left">';
$message .= '<strong style="width:300px;">Company Address:</strong>';
$message .= '<p style="width:300px;">579, 10th B Main Rd, 4th, <br/>T Block East, Jayanagar, <br/>Bengaluru, Karnataka 560011</p>';
$message .= '<h3 align="right" style="margin-top: -50px;">Booking Confirmed for&nbsp;' echo $description;'</h3>';
$message .= '</div>';
$message .= '<hr>';
$message .= '<table style="width:100%;border-bottom: 1px solid transparent; border-top-left-radius: 3px;border-top-right-radius: 3px;border-color: #ddd;">';
 $message .= '<tr>';
 $message .= '<th style="width:150px;height:50px;background-color: #046;color: #fff">Billinging Detail</th>';
 $message .= '<th  style="width:150px;height:50px;background-color: #046;color:#fff">Invoice No.& Date</th>';
$message .= '<th style="width:150px;height:50px;background-color: #046;color:#fff">Rental Duration</th>';
$addr=$_SESSION['devl'];
					if($addr==null){
$message .= '<th style="width:150px;height:50px;background-color: #046;color:#fff">Pickup Location</th>';
}else{
$message .= '<th style="width:150px;height:50px;background-color: #046;color:#fff">Delivery Location</th>';
}
 $message .= '</tr>';
 $message .= '<tr>'; 
 $message .= '<td style="width:150px;height:100px;background-color: #fff;color: #000;">';
 $message .= '<strong style="text-align: left;font-size:14px;color:#000;padding-top:0px"><p>Name:' echo $name;'</p></strong>';
 $message .= '<strong style="text-align: left;font-size:14px;color:#000;padding-top:0px"><p>Name:' echo $address;'</p></strong></td>';
$message .= '<td  style="width:170px;height:100px;background-color: #fff;color:#000;>';
$message .= '<strong style="font-size:14px;color:#000;padding-top:100px"><p>GSTIN : 29AAICR0830N1Z0 </p></strong>';
$message .= '<strong style="font-size:14px;color:#000"><p>Invoice No. :' echo $bkids;'</p></strong>';
$message .= '<strong style="font-size:14px;color:#000"><p>Date:' echo $gdate;'</p></strong>';
$message .= '</td>';
$message .= '<td  style="width:130px;height:100px;background-color: #fff;color:#000;>';
$message .= '<strong style="font-size:16px;color:#000"><p>From: ' echo date('d-m-y h:i A',strtotime($fdate));'</p></strong>';
$message .= '<strong style="font-size:16px;color:#000"><p>To :' echo date('d-m-y h:i A',strtotime($tdate));' </p></strong>';
$message .= '</td>';
$message .= '<td style="width:150px;height:100px;background-color: #fff;color:#000;">';
$message .= '<strong style="font-size:16px;color:#000"><p>Adress & Contact No:<br/>'echo $pickup;' </p></strong></td>';
 $message .= '</tr>';
 $message .= '</table>';
$message .= '</div>';
$message .= '</div>';
$message .= '</div>';
$message .= '<div align="center" style="width:61%;height:50px;background-color: #046;margin-left:220px;">';
$message .= '<h3 style="font-size:20px;color:#fff;padding-top:5px;" align="center"><strong>Order summary</strong></h3>';
$message .= '</div>';
$message .= '<div align="center" style="width: 61%;margin-top:-20px;margin-left:220px;background-color: #fff;border: 1px solid transparent;border-radius: 4px;-webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .05);box-shadow: 0 1px 1px rgba(0, 0, 0, .05);border-color: #ddd;">';
$message .= '<table align="center">';
$message .= '<tr>';
$message .= '<th style="width:150px;height:20px;color: #000"><strong>Vechile Type</strong></th>';
$message .= '<th style="width:200px;height:20px;color: #000"><strong>Vechile Name</strong></th>';
$message .= '<th style="width:150px;height:20px;color: #000"><strong>Price</strong></th>';
$message .= '<th style="width:150px;height:20px;color: #000"><strong>No. of Days</strong></th>';
$message .= '<th style="width:150px;height:20px;color: #000"><strong>Total</strong></th>';
$message .= '</tr>';
$message .= '<tr style="background-color: #c7d3e5;width:61%;">';
$message .= '<td style="width:150px;height:20px;color: #000"align="center">'echo $main_category;'</td>';
$message .= '<td style="width:200px;height:20px;color: #000">'echo $description;'</td>';
$message .= '<th style="width:150px;height:20px;color: #000">'echo $price;'</th>';
$message .= '<th style="width:150px;height:20px;color: #000">'echo $days;'</th>';
$message .= '<th style="width:150px;height:20px;color: #000">'echo $ftotal;'</th>';
$message .= '</tr>';
$message .= '<tr>';
 $message .= '<td></td>';
 $message .= ' <td></td>';
 $message .= '<td></td>';
$message .= '<td style="text-align: center;font-size:16px;color: #000;"><strong>Subtotal</strong></td>';
$message .= '<td style="text-align: center;font-size:16px;color: #000;"><strong>'echo $ftotal;'</strong></td>';
$message .= '</tr>';
$message .= '<tr>';
 $message .= '<td></td>';
 $message .= ' <td></td>';
 $message .= '<td></td>';
 if($main_category=='Bikes'){
                                  
$message .= '<td style="text-align: center;font-size:16px;color: #000;"><strong>GST(5%)</strong></td>';
$message .= '<td style="text-align: center;font-size:16px;color: #000;"><strong>'echo $taxs;'</strong></td>';
}else{
$message .= '<td style="text-align: center;font-size:16px;color: #000;"><strong>GST(18%)</strong></td>';
$message .= '<td style="text-align: center;font-size:16px;color: #000;"><strong>'echo $tax;'</strong></td>';
}
$message .= '</tr>';
$message .= '<tr>';
 $message .= '<td></td>';
 $message .= '<td></td>';
 $message .= '<td></td>';
$message .= '<td style="text-align: center;font-size:16px;color: #000;"><strong>Reimburse Charge</strong></td>';
$message .= '<td style="text-align: center;font-size:16px;color: #000;"><strong>'echo $convs;'</strong></td>';
$message .= '</tr>';
$message .= '<tr>';
 $message .= '<td></td>';
 $message .= '<td></td>';
 $message .= '<td></td>';
$message .= '<td style="text-align: center;font-size:16px;color: #000;"><strong>Payment Received</strong></td>';
$message .= '<td style="text-align: center;font-size:16px;color: #000;"><strong><strong>INR:&nbsp;<strong>'echo $gtotal;'</strong></td>';
$message .= '</tr>';
$message .= '</table>';

$message .= '</div>'; 
$message .= '<div align="center" style="width:61%;margin-left:220px;">';
						
						$message .= '<p style="font-size:16px;color: #000;">Terms and Condition for'echo $description;'</p>';
						$message .= '<li style="font-size:16px;">'echo $tnc;'</li>
						</div>
						<div style="width:61%;font-size:16px;margin-left:220px;color: #000;">
						<small style="font-size:16px;"><strong>Note</strong></small>
						<p>1. ZopRent is only a booking platform for self-drive vehicles. It does not operate its own vehicles. In order to provide a comprehensive choice of vehicles, prices, locations to its customers, it has tied up with multiple vehicle vendors. </p>

Zoprent’s responsibilities include:
<li>a. Issuing a valid Booking ID (a booking confirmation that will be accepted by the vehicle vendor) for its network of vehicle vendors.</li>
<li>b. Providing refund and support in the event of cancellation.</li>
<li>c. Providing customer support and information in case of any delays or any other inconvenience.</li>

<b>ZopRent’s responsibilities do not include:</b>
<li>a. The vehicle vendors employees being rude.</li>
<li>b. The vehicle vendors vehicle not being up to the customers expectation.
<li>c. The vehicle vendor changing the vehicle and providing a different vehicle due to unavoidable reasons.</li>
<li>d. The vehicle vendor unable to provide delivery or delay in delivery (if opted) due to unavoidable reasons.</li>

<p>2. Users are required to furnish the following at the time of picking up the vehicle:</p>
<li>a. A copy of the booking confirmation mail (Soft copy of the mail would do).</li>
<li>b. A valid identity proof and any other requirements mentioned in the vendor terms and conditions.The same may have to be deposited until return of the vehicle, please read the vendor terms and conditions carefully.</li>
<li>c. Refundable security deposit mentioned in the mail. Failing to do so, they may not be allowed to pick the vehicle.</li>

<p>3. Change of vehicle: In case the vehicle vendor changes the type of vehicle due to some reason, ZopRent will refund the differential amount to the customer upon being intimated by the customer within 72 hours of start of trip.</p>

<p>4. Delivery of vehicle: In case the user has chosen the option to provide delivery of vehicle at a given location, the vendor would call the user before the ride-start time to confirm the same. However, due to some reason, if the vendor is unable to do so, the user may call the vendor at the number provided in the SMS and email. The payment for delivery of the vehicle has to be made in cash to the vendor at the time of delivery.</p>

<p>5. In case a booking confirmation e-mail and sms gets delayed or fails because of technical reasons or as a result of incorrect e-mail ID / phone number provided by the user etc, a ticket will be considered "booked" as long as the ticket shows up on the confirmation page of www.zoprent.com</p>
<p>ZopRent- Rent Self-driven,Motorbike & Stay at Bangalore ...</p>
<p><a href:www.zoprent.com></a></p>
<p>Rent Bikes/Self driven Cars & Stay on hourly/daily basis in Bangalore, Mysore, Goa,Hyderabad,Ooty,Pondicherry,Mumbai & Pune. Rent Royal-Enfield, Harley,Duster, Audi ...</p>

<p>6. Any grievances or concerns related to the vehicle booking should be reported to the ZopRent support team within 5 days of your trip start date at info@zoprent.com</p>
<p> 7. Cancellation of booking: For cancelling a booking, user can cancel by calling on +91 – 7338295808 / 7338295909.</p>
<strong>In case of cancellation, following charges would apply:</strong>
 
<p>More Than 72 hours – 20% will be deducted from the booking amount.</p>
<p>Less Than 72 hours – No Refund</p>';
					$message .= '</div>';
$message .= '</body></html>';
if(mail($to, $subject, $message, $headers)){
    echo 'Your mail has been sent successfully.';
} else{
    echo 'Unable to send email. Please try again.';
}

 $naames=$_SESSION['vnames'];

				$message="Dear ".$naames."\n";
				$message .= "Booking Detail for :".$description.".\n";
				$message .= "Customer Name :".$names.".\n";
				//$message .= "Booking ID :".$book_id.".\n";
				$message .= "Mobile No.:".$phone.".\n";
				$message .= "Duration From :".date('d-m-y h:i A',strtotime($fdate)).".\n";
				$message .= "Duration To :".date('d-m-y h:i A',strtotime($tdate)).".\n";
				$message .= "Paid\n";
				$msg=$message;
				$msg_body_final=urlencode($msg);
				$mobl1=$_SESSION['numb'];
				$URL="http://roundsms.com/api/sendhttp.php?authkey=OTFmM2Y1ZDJkNDd&mobiles=".$mobl1."&message=".$msg_body_final."&sender=ZOPRNT&type=1&route=2";
		
		
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $URL);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_exec($ch);
				curl_close($ch);
				

				
				$message="Dear ".$names."\n";
				$message .= "Booking Detail for ".$description.".\n";
				$message .= "Paid ".$gtotal.".\n";
				$message .= "Duration From".date('d-m-y h:i A',strtotime($fdate)).".\n";
				$message .= "Duration To".date('d-m-y h:i A',strtotime($tdate)).".\n";
				$message .= "Pickup Location & Contact: ".$pickup."\n";
				//$message .= "T & C: ".$tnc;
				$msg=$message;
				$msg_body_final=urlencode($msg);
				$URL="http://roundsms.com/api/sendhttp.php?authkey=OTFmM2Y1ZDJkNDd&mobiles=".$phone."&message=".$msg_body_final."&sender=ZOPRNT&type=1&route=2";
		
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $URL);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_exec($ch);
				curl_close($ch);
		
?>


