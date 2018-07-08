<?php
if(!isset($_SESSION)){ session_start();} 
  
	include("../config.php");
   // include("class.phpmailer.php");
	if(!isset($_SESSION['login']) && ($_SESSION['login'] != 'true'))
	{
		header("location:../index.php");
	}	
date_default_timezone_set('Asia/Calcutta');    
$image = $_POST['image'];
$filedir = $_POST['filedir'];
$bkid = $_POST['zid'];
$name = time();
$image = str_replace('data:image/png;base64,', '', $image);
$decoded = base64_decode($image);
file_put_contents($filedir . "/" . $name . ".png", $decoded, LOCK_EX);
//echo $image;


			
?>
<?php
require("MPDF/mpdf.php");

$image = "upload/".$name.".png";

$pdf = new MPDF();
$pdf->AddPage();
$pdf->Image($image,'c','A4','','',32,25,27,25,16,13); 
$pdf->Output('image/'.$name.'.pdf');
$files = "image/".$name.".pdf";
echo "<script>alert(".$files.");</script>";
$q=mysql_query("update zopinvoice set files=
								'$files' where id='$bkid'");
				
			if($q)	
				{
				
				$_SESSION['success_msg']="aaaa";		
					//header('location:invoiceform.php');
					echo 'mail sent successfully ';
				}
			else
				{
					$_SESSION['error_msg']="aaaa";
				}
				
				$sub_qrys=mysql_query("select * from zopinvoice where id='$bkid'");
									$sub_res2=mysql_fetch_array($sub_qrys);
									$names=$sub_res2['cname'];
									$email=$sub_res2['email'];
									$book_id=$sub_res2['bookingid'];
									$price=$sub_res2['price'];
									$fdate=$sub_res2['fdate'];
									$tdate=$sub_res2['tdate'];
									$ftotal=$sub_res2['total'];
									$phone=$sub_res2['phone'];
									$main_category=$sub_res2['main_category'];
									$description=$sub_res2['vname'];
									$days=$sub_res2['numberdays'];
									$pickup=$sub_res2['pickup'];
									$tnc=$sub_res2['terms_cond'];
								
									$conv=100;
									if($main_category=='Bikes'){
									$tax=$ftotal*18/100;;
									}else{
								    $taxs=$ftotal*18/100;
									$tax=$taxs+$conv;
									}
									$gtotal=$ftotal+$tax;
		$quert=mysql_query("update zopinvoice set total=
								'$gtotal' where id='$bkid'");
				
			if($quert)	
				{
				
				$_SESSION['success_msg']="aaaa";		
					//header('location:invoiceform.php');
					echo 'updated successfully ';
				}
			else
				{
					$_SESSION['error_msg']="aaaa";
				}	
		//$phone='8951901985';
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
				//$URL = "mindappssms.in/submitsms.jsp?user=rentraja&key=458e7a768eXX&mobile=+91".$phone."&message=".$msg_body_final."&senderid=RNTRAJ&accusage=1";
				//$URL ="http://login.jupitersms.in/api/mt/SendSMS?user=zoprent&password=Codezop3&senderid=ZOPRNT&channel=Trans&DCS=0&flashsms=0&number=".$mobl1."&text=".$msg_body_final."&route=6";
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
				$message .= "Pickup Location and Contact: ".$pickup."\n";
				//$message .= "T & C: ".$tnc;
				$msg=$message;
				$msg_body_final=urlencode($msg);
				
				//$URL = "mindappssms.in/submitsms.jsp?user=rentraja&key=458e7a768eXX&mobile=+91".$phone."&message=".$msg_body_final."&senderid=RNTRAJ&accusage=1";
				//$URL ="http://login.jupitersms.in/api/mt/SendSMS?user=zoprent&password=Codezop3&senderid=ZOPRNT&channel=Trans&DCS=0&flashsms=0&number=".$phone."&text=".$msg_body_final."&route=6";
		       $URL="http://roundsms.com/api/sendhttp.php?authkey=OTFmM2Y1ZDJkNDd&mobiles=".$phone."&message=".$msg_body_final."&sender=ZOPRNT&type=1&route=2";
				
		
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $URL);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_exec($ch);
				curl_close($ch);
				
require 'phpmailer/class.phpmailer.php';

try {
    $mail = new PHPMailer(true); //New instance, with exceptions enabled

    $to = $email;
	$mail->AddAddress($to);
	$mail->From       = 'zoprentcs@gmail.com';
    $mail->FromName   = 'ZopRent';
	$mail->Subject  = "Invoice Detail";
	//$job=$_COOKIE['classroomnumber'];

	$body             = '<table>
	                         <tr>
							    <th colspan="2">Booking Detail For '.$description.'</th>
							 </tr>
							 <tr>
							    <td style="font-weight:bold width:200px">Amount Paid:</td>
								<td>'.$gtotal.'</td>
							 </tr>

							 <tr>
							    <td style="font-weight:bold width:200px">Duration From:</td>
								<td>'.date('d-m-y h:i A',strtotime($fdate)).'</td>
							 </tr>

							 <tr>
							  <td style="font-weight:bold width:200px">Duration To : </td>
							  <td>'.date('d-m-y h:i A',strtotime($tdate)).'</td>
							</tr>

							<tr>
							  <td style="font-weight:bold width:200px">Pickup Location & Contact: </td>
							  <td>'.$pickup.'</td>
							</tr>
							<br/>
							<tr>
							  <td style="font-weight:bold; width:200px">Terms & Condition : </td>
							  <td>'.$tnc.'</td>
							</tr>
							
	                     <table>';
	
	$body             = preg_replace('/\\\\/','', $body); //Strip backslashes
	$mail->MsgHTML($body);

	$mail->IsSMTP();                           // tell the class to use SMTP
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->Port       = 25;                    // set the SMTP server port
	$mail->Host       = "smtp.gmail.com"; // SMTP server
	$mail->Username   = "zoprentcs@gmail.com";     // SMTP server username
	$mail->Password   = "Code321#";            // SMTP server password

	$mail->IsSendmail();  // tell the class to use Sendmail
	$mail->AddReplyTo("zoprentcs@gamil.com");
	$mail->addBCC("zoprentcs@gmail.com", "Invoice");
	$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
	$mail->WordWrap   = 500; // set word wrap
   // $mail->AddAttachment($files);
	$mail->AddAttachment("image/".$name.".pdf");
	//$mail->AddAttachment($_FILES['file']['tmp_name'],
                         //$_FILES['file']['name']);
	$mail->IsHTML(true); // send as HTML
	$mail->Send();
	//header('location:career.php#thankyou');
} catch (phpmailerException $e) {
	echo $e->errorMessage();
}
$path="upload/".$name.".png";
unlink($path);
?>


