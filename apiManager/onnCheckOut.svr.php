<?php
session_start();
include 'admin/config.php';
include"apiManager/apiManager.php";

  $paymentId= $_GET['payment_id'];
  $status   = 'Paid';

  $user_id=$_SESSION['user_id'];
  $bookingId=$_SESSION['onn']['reserveBookId'];
 
 // $city=$_SESSION['city']; //check once
  $city='Bengaluru';
  $name=$_SESSION["customer"]['name'];
  $contact=$_SESSION["customer"]['phone'];
  $email=$_SESSION["customer"]['email'];
  $address=$_SESSION["customer"]['address'];
  $vendorName='ONNBikes';
  $product = $_SESSION["onn"]['bikeName']; //checkonce
  $from_date=$_SESSION["customer"]['dateFrom'];
  $to_date=$_SESSION["customer"]['dateTo'];
  $amount = $_SESSION["onn"]['tariff'];
 


if(!$_GET['payment_id'])
{

//redirect to some page
}

function bookBike($parameters)
{
	$onn = getAPI("onn");
	if($response=$onn->bookBike($parameters))
	{
        return($response);
	}
	else{
        return(false);
	}
}


//make booking
$parameters = array (
    'bookingId' => $_SESSION["onn"]['reserveBookId']
  );


if ($resposeBooking=bookBike($parameters))
{
	$finalOrderId=$resposeBooking['orderId'];
	$bookingFlag=true;
}
else
{
	//try bookning again
	//if successfull
	// if(bookBikeDirect($parameters))
	// bookingFlag=true;
	// else
	// 	bookingFlag=false;

	$bookingFlag=false;
}

if($bookingFlag)
{

    $orderId=$finalOrderId;
    $api_query=mysql_query("INSERT INTO `api_booking`(`user_id`, `api_booking_id`, `api_order_id`, `city`, `name`, `contact`, `email`, `address`, `vendor_name`, `product`, `from_datetime`, `to_datetime`, `total_price`, `status`, `payment_id`)
                                                VALUES ('$user_id','$bookingId','$orderId','$city','$name','$contact','$email','$address','$vendorName','$product','$from_date','$to_date',$amount,'$status','$paymentId')");

	
    
    {
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
								$message .= "PayementId  : ".$payment_id."\n";
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
								$message .= "PayementId  : ".$payment_id."\n";
								$message .= "Product Name  : ".$pro_name."\n";
								$message .= "Vendor Name  : ".$ven_name."\n";
								$message .= "Vendor Location  : ".$ven_loc."\n";
   $from = 'zoprent@gmail.com';
   $headers = "From:" . $from;
   mail($to,$subject,$message,$headers);

//sms admin
					$mobl1='8073951672'; //ranjan's number
								$message  = "New Request\n";
								$message .= "Name   : ".$name."\n";
								$message .= "Email  : ".$email."\n";
								$message .= "Phone  : ".$phone."\n";
								$message .= "PayementId  : ".$payment_id."\n";
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

//sms user
								$message="Dear ".$name."\n";
								$message .= "We have received your Payment. Our team will get in touch with you soon.\n";
								$message .= "Your Bookingid : ".$booking_id."\n";
								$message .= "Your Paymentid : ".$payment_id."\n";
								$message .= "www.zoprent.com";
								$msg=$message;
								$msg_body_final=urlencode($msg);


								$URL="http://roundsms.com/api/sendhttp.php?authkey=OTFmM2Y1ZDJkNDd&mobiles=".$phone."&message=".$msg_body_final."&sender=ZOPRNT&type=1&route=2";


							$ch = curl_init();
								curl_setopt($ch, CURLOPT_URL, $URL);
								curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
								curl_exec($ch);
								curl_close($ch);



	}

header("Location: thankyou.php");
}
else{
     //todo : send mail regarding booking fail but payment recieved
	$errorMessage="oops something went wrong.. our team will get in touch with you soon";
	header("Location: message.php?message=$errorMessage&type=0");
	//unable to book message

}
?>




<?php




// query referrence


   mysql_query("UPDATE booktest SET payment_status = '$Status',payment_id='$paymentId' WHERE  booking_id = '$id'") or
                                   die(mysql_error());
			 $sub_qry1=mysql_query("select * from booktest where booking_id = '$id'");
		$sub_res1=mysql_fetch_array($sub_qry1);
		$booking_id=$sub_res1['booking_id'];
		$name=$sub_res1['name'];
        $email=$sub_res1['email'];
        $phone=$sub_res1['phone'];
        $total_price=$sub_res1['total_price'];
        $from_date=$sub_res1['from_date'];
        $to_date=$sub_res1['to_date'];
        $sub_category=$sub_res1['sub_category'];
		$new_ven_id=$sub_res1['vendor_id'];
        $payment_id=$sub_res1['payment_id'];
			$sub_qry2=mysql_query("select name from sub_category where id='$sub_category'");
		$sub_res2=mysql_fetch_array($sub_qry2);
		$pro_name=$sub_res2['name'];

		$sub_qry3=mysql_query("select vendor_name,vendor_location from vendor where id='$new_ven_id'");
		$sub_res3=mysql_fetch_array($sub_qry3);
		$ven_name=$sub_res3['vendor_name'];
		$ven_loc=$sub_res3['vendor_location'];
?>
