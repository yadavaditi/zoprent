 <?php 
if(!isset($_SESSION)){ session_start();} 
  
	include("../config.php");
   // include("class.phpmailer.php");
	if(!isset($_SESSION['login']) && ($_SESSION['login'] != 'true'))
	{
		header("location:../index.php");
	}	

date_default_timezone_set('Asia/Calcutta');   
$ch='ZOP';
$zid = mt_rand(1000 , 9000);
$zbkid=$ch.$zid; 
    if (isset($_POST['submit_now'])) 
    {
		    $name=$_POST['name'];
			$main_category=$_POST['main_category'];
			$name=$_POST['name'];
			$email=$_POST['email'];
			$phone=$_POST['number'];
			$addres=$_POST['addrs'];//pickuplocation
			//$description=$_POST['description'];
			$price=$_POST['price'];
			$fdate=$_POST['fdate'];
			$tdate=$_POST['tdate'];
			$days=$_POST['day'];
			$disc=$_POST['dis'];
			$addresh=$_POST['addresh'];
			$pick=$_POST['vendor'];
			$desc=$_POST['vechname'];
			//$terms=$_POST['tnc'];
			$gdate=date("Y-m-d H:i:s");
			$ftotal=$price*$days;

			if($disc==null){	
				$disc=0;	
				}
			else{ 
				$disc=$ftotal*($disc/100);
				}

	       
			
			$bans_qry=mysql_query("select a.sub_category,a.terms_conditions,a.vendor_name,a.vendor_id,b.name from product_details a join sub_category b where a.sub_category=b.id and a.vendor_id=$pick and a.sub_category=$desc");
$bans_res=mysql_fetch_array($bans_qry);
$mnew=$bans_res['terms_conditions'];
$tnc=strip_tags($mnew);
$description=$bans_res['name'];
$vname=$bans_res['vendor_id'];
			
$bansh_qry=mysql_query("select name,address,contact from vendors where cid=$vname");
$bansi_res=mysql_fetch_array($bansh_qry);
$names=$bansi_res['name'];
$address=$bansi_res['address'];	
$number=$bansi_res['contact'];	
if($addres==null){	
$pickup=$address.".\n Contact No.:".$number;	
}
else{ 
$pickup=$addres.".\n Contact No.:".$phone;	
$_SESSION['devl']=$addres;
}
//$pickup=$address.".\n Contact No.".$number;	
 $address=$address.".\n Contact No.:".$number;
			$ban_qry=mysql_query("select categories from categories where id='$main_category'");
$ban_res=mysql_fetch_array($ban_qry);
$category=$ban_res['categories'];
$temp=("INSERT INTO zopinvoice(invoiceid,cname,price,discount,total,date_sent,fdate,tdate,email,phone,main_category,address,vname,v_address,numberdays,pickup,terms_cond)
								VALUES ('$zbkid','$name','$price','$disc','$ftotal','$gdate','$fdate','$tdate','$email','$phone','$category','$addresh','$description','$address','$days','$pickup','$tnc')");
$q=mysql_query($temp);
				
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
				$_SESSION['vnames']=$names;
				$_SESSION['numb']=$number;
		header("location:design.php?id=$zbkid");				
    }
	
	
   ?>