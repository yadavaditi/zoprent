<?php
include 'admin/config.php';
//include 'configy.php';
   $id = $_GET['Id'];
   //$paymentid = null;
   $Status   = 'Cancelled';
                            mysql_query("UPDATE booktest SET payment_status = '$Status' WHERE  booking_id= '$id'") or 
                                   die(mysql_error());
                 $sub_qry1=mysql_query("select * from booktest where booking_id = '$id'");
		$sub_res1=mysql_fetch_array($sub_qry1);
		//$booking_id=$sub_res1['booking_id'];
		$name=$sub_res1['name'];
        $email=$sub_res1['email'];
        $phone=$sub_res1['phone'];
        $total_price=$sub_res1['total_price'];	
        $from_date=$sub_res1['from_date'];
        $to_date=$sub_res1['to_date'];	
        $sub_category=$sub_res1['sub_category'];			
		$new_ven_id=$sub_res1['vendor_id'];
        	$sub_qry2=mysql_query("select name from sub_category where id='$sub_category'");
		$sub_res2=mysql_fetch_array($sub_qry2);
		$pro_name=$sub_res2['name'];
		
		$sub_qry3=mysql_query("select vendor_name,vendor_location from vendor where id='$new_ven_id'");
		$sub_res3=mysql_fetch_array($sub_qry3);
		$ven_name=$sub_res3['vendor_name'];
		$ven_loc=$sub_res3['vendor_location'];
		
  $to = 'zoprentcs@gmail.com'; 
   //$to = "zoprentcs@gmail.com\r\n";
   $subject = "New Request\n";
   $message = "Booking Detail.\n";
   $message .= "Name   : ".$name."\n";
   $message .= "Email  : ".$email."\n";
   $message .= "Phone  : ".$phone."\n";
   $message .= "Grand Total  : Rs. ".$total_price."\n";
								$message .= "From Date  : ".$from_date."\n";
								$message .= "To Date  : ".$to_date."\n";
								$message .= "Product Name  : ".$pro_name."\n";
								$message .= "Vendor Name  : ".$ven_name."\n";
								$message .= "Vendor Location  : ".$ven_loc."\n";
   $from = 'zoprent@gmail.com';
   $headers = "From:" . $from;
   mail($to,$subject,$message,$headers);
   
    $to = 'zoprent@gmail.com'; 
   //$to = "zoprentcs@gmail.com\r\n";
   $subject = "New Request\n";
   $message = "Booking Detail.\n";
  
    $message .= "Name   : ".$name."\n";
   $message .= "Email  : ".$email."\n";
   $message .= "Phone  : ".$phone."\n";
    $message .= "Grand Total  : Rs. ".$total_price."\n";
								$message .= "From Date  : ".$from_date."\n";
								$message .= "To Date  : ".$to_date."\n";
								$message .= "Product Name  : ".$pro_name."\n";
								$message .= "Vendor Name  : ".$ven_name."\n";
								$message .= "Vendor Location  : ".$ven_loc."\n";
   $from = 'zoprent@gmail.com';
   $headers = "From:" . $from;
   mail($to,$subject,$message,$headers);
								//$mobl1='7338295909';
                                $mobl1='8073951672';								
								$message  = "New Request\n";
								$message .= "Name   : ".$name."\n";
								$message .= "Email  : ".$email."\n";
								$message .= "Phone  : ".$phone."\n";
								$message .= "Grand Total  : Rs. ".$total_price."\n";
								$message .= "From Date  : ".$from_date."\n";
								$message .= "To Date  : ".$to_date."\n";
								$message .= "Product Name  : ".$pro_name."\n";
								$message .= "Vendor Name  : ".$ven_name."\n";
								$message .= "Vendor Location  : ".$ven_loc."\n";
								
								$msg=$message;
								$msg_body_final=urlencode($msg);
								$URL="http://roundsms.com/api/sendhttp.php?authkey=OTFmM2Y1ZDJkNDd&mobiles=".$mobl1."&message=".$msg_body_final."&sender=ZOPRNT&type=1&route=2";

								$ch = curl_init();
								curl_setopt($ch, CURLOPT_URL, $URL);
								curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
								curl_exec($ch);
								curl_close($ch);
								
								$message="Dear ".$name."\n";
								$message .= "We have received your request. Our team will get in touch with you soon.\n";
								$message .= "www.zoprent.com";
								$msg=$message;
								$msg_body_final=urlencode($msg);
								
								
								$URL="http://roundsms.com/api/sendhttp.php?authkey=OTFmM2Y1ZDJkNDd&mobiles=".$phone."&message=".$msg_body_final."&sender=ZOPRNT&type=1&route=2";
		              
		
							$ch = curl_init();
								curl_setopt($ch, CURLOPT_URL, $URL);
								curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
								curl_exec($ch);
								curl_close($ch);          
                         
 header("Location: thankyou.php");

?>