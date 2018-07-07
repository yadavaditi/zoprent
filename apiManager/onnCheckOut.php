<?php
session_start();
include 'admin/config.php';
include"apiManager/apiManager.php";
date_default_timezone_set('Asia/Calcutta');
//$id=$_GET['id'];
//$ids=$_GET['first'];
//$uids=$_GET['uid'];

$id='Bikes'; //hardcoded
$ids='1';       //hardcoded
$uids='Bengaluru';      //hardcoded
//session_destroy();
$paymentFlag=false;

//$de_code=urldecode($id);
//$de_code_arr=explode("/",$de_code);
$category=$id;
$category_id=$ids;
$qryd=mysql_query("select * from city where city_name='$uids'");
$ress=mysql_fetch_array($qryd);
$bmg=$ress['id'];

$qry=mysql_query("select banner_image from categories where categories='$category'");
$res=mysql_fetch_array($qry);
$ban_img=$res['banner_image'];


if($ban_img=="")
{
	$ban_img="assets/bg2.png";
}
    

function combineDateTime($date,$time)
{
	$gmtTimezone = new DateTimeZone("+0530");
	$combinedDT = date('Y-m-d H:i:s', strtotime("$date $time"));
	$myDateTime = new DateTime($combinedDT, $gmtTimezone);
	return($myDateTime->format('Y-m-d H:i:s O'));
}

if(isset($_POST['rent_now']))//called from onnproducts page
{



	$bikeName = $_POST['name'];
	$bikeImage = $_POST['bikeImage'];
	$allowedDistance = $_POST['allowedDistance'];
	//$maxSpeedLimit = $_POST['maxSpeedLimit'];
	$securityDeposit = $_POST['securityDeposit'];
	$tariff = $_POST['tariff'];
	$bikeId = $_POST['bikeId'];
	$bikeStationId = $_POST['bikeStationId'];
	
	$onnArray["bikeName"]=$bikeName;
	$onnArray["bikeImage"]=$bikeImage;
	$onnArray["allowedDistance"]=$allowedDistance;
	//$onnArray["maxSpeedLimit"]=$maxSpeedLimit;
	$onnArray["securityDeposit"]=$securityDeposit;
	$onnArray["tariff"]=$tariff;
	$onnArray["bikeId"]=$bikeId;
	$onnArray["bikeStationId"]=$bikeStationId;
	
	$_SESSION["onn"]=$onnArray;
}

if(isset($_POST['book_now']))//clicked on submit in same page
{

        $customerArray['name']=$_POST['name'];
        $customerArray['email']=$_POST['email'];
        $customerArray['phone']=$_POST['phone'];
        $customerArray['address']=$_POST['address'];


            


	$dateFrom = combineDateTime($_SESSION['db_f_date'],$_SESSION['from_time']);
    $dateTo = combineDateTime($_SESSION['db_t_date'],$_SESSION['to_time']);

    $customerArray['dateFrom']=$dateFrom;
    $customerArray['dateTo']=$dateTo;
    $_SESSION["customer"]=$customerArray;
    /*	"authToken": "5b1f666d0ed5422cfbabfb13",
    "fromDate": "2018-06-20 09:00:00 +0530",
    "toDate": "2018-06-21 09:00:00 +0530",
    "bikeId" : "A1886",
    "bikeStationId" : "BS000006",
    "customerName" : "Vishwanath S K",
    "customerEmail" : "vishwanath.sk@onnbikes.com",
    "customerPhoneNumber" : "9008729006",
    "bookingType" : "Pickup"*/
	$parameters = array (
    'fromDate' => $dateFrom,
    'toDate' => $dateTo,
    'bikeStationId' => $_SESSION["onn"]["bikeStationId"],
    'customerName' => $_POST['name'],
    'customerEmail' => $_POST['email'],
	'customerPhoneNumber' => $_POST['phone'],
    'bookingType' => "Pickup",
  );

	if($resposeReserve=reserveBike($parameters))
	{
		$_SESSION['onn']['reserveBookId'] = $resposeReserve['bookingId'];
        //echo $_SESSION['reserveBookId'].'<br/>';
		$paymentFlag=true;
		//header('location: bookingsh.php?sub='.$_GET['sub'].'&uid='.$_GET['uid'].'&city='.$_GET['city'].'#pays');

	}
	else
	{
		//sorry bikes not available
	}

}

function reserveBike($parameters)
{
	$onn = getAPI("onn");

	foreach($_SESSION['onn']["bikeId"] as $bikeId)
	{
		$parameters['bikeId']=$bikeId;
		$response=$onn->reserveBike($parameters);
		if($response!=false)
		{
			return($response);
		}
	}

	return(false);

}


$pro_name='Activa';
$total_price=123;

?>
<!doctype html>
<html>
<head>
   <title>ZopRent -Self-driven Car & Motorbike Rentals-Bangalore | Goa | Mysuru | Ooty | Pondicherry | Hyderabad | Mumbai</title>
    <meta charset="utf-8">
	<meta name="msvalidate.01" content="BB36471903B1CCE02D0D60EFC38ABBC8" />
	<meta name="keywords" content="ZopRent, rent a motorbike online, rent a sports motorbike in Bangalore, rent scooty in Ooty,rent self driven car in Bangalore ">
	 <meta name="keywords" content="boostrap, responsive, html5, css3, jquery, theme, multicolor, parallax, retina, business" />
    <meta name="description" content="Rent sports motorbike, motorcycle, superbikes, Bullet online in Karnataka, Self Driven car in bangalore,Ooty,Mumbai,Hyderabad,Goa,Mysore,Pondicherry">    
<meta name="author" content="Magentech">
    <meta name="robots" content="index, follow" />

    <!-- Mobile specific metas
	============================================ -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Favicon
	============================================ -->

    <link rel="shortcut icon" href="assets/small.png">

    <!-- Google web fonts
	============================================ -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700|Roboto:400,500,700,900' rel='stylesheet' type='text/css'>

    <!-- Libs CSS
	============================================ -->
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="js/datetimepicker/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="js/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="css/themecss/lib.css" rel="stylesheet">
    <link href="js/jquery-ui/jquery-ui.min.css" rel="stylesheet">

    <!-- Theme CSS
	============================================ -->
    <link href="css/themecss/so_megamenu.css" rel="stylesheet">
    <link href="css/themecss/so-categories.css" rel="stylesheet">
    <link href="css/themecss/so-listing-tabs.css" rel="stylesheet">
    <!-- <link href="css/themecss/slider.css" rel="stylesheet"> -->
    <link id="color_scheme" href="css/home5.css" rel="stylesheet">
    <link id="color_scheme" href="css/home8.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="js/jssor.slider.mini.js"></script>

    <style>
	
	.page-main-section {
    background: url(<?php echo $ban_img?>);
    position: relative;
    z-index: 1;
	width: 100%;
    background-attachment: fixed !important;
    background-repeat: no-repeat;
	padding-top: 6%;
    background-position: 50% 0px;
}
        .info_section {
            background: url(assets/b4.png) no-repeat;
        }
        
        .right_box {
            background: rgba(1, 169, 196, 0.81);
            padding: 0 20px;
        }
        
        .container-fluid {
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }
        
        .padding {
            padding: 80px 0;
        }
    </style>
	
	<style> 
	.fishes { 
	position:absolute; 
	z-index: -1;
	
	} 
	.fish { 
	position:relative; 
	z-index: 1000; 
	opacity: 0.8;
	 } 
</style> 
<style>
@media (max-width: 590px) {
		#mist
		{
			top:-80px !important;
			font-size: 10px;
			margin-left: -30px;
			
		}
}
</style>

    <script>
        jQuery(document).ready(function($) {

            var jssor_1_SlideoTransitions = [
                [{
                    b: 5500,
                    d: 3000,
                    o: -1,
                    r: 240,
                    e: {
                        r: 2
                    }
                }],
                [{
                    b: -1,
                    d: 1,
                    o: -1,
                    c: {
                        x: 51.0,
                        t: -51.0
                    }
                }, {
                    b: 0,
                    d: 1000,
                    o: 1,
                    c: {
                        x: -51.0,
                        t: 51.0
                    },
                    e: {
                        o: 7,
                        c: {
                            x: 7,
                            t: 7
                        }
                    }
                }],
                [{
                    b: -1,
                    d: 1,
                    o: -1,
                    sX: 9,
                    sY: 9
                }, {
                    b: 1000,
                    d: 1000,
                    o: 1,
                    sX: -9,
                    sY: -9,
                    e: {
                        sX: 2,
                        sY: 2
                    }
                }],
                [{
                    b: -1,
                    d: 1,
                    o: -1,
                    r: -180,
                    sX: 9,
                    sY: 9
                }, {
                    b: 2000,
                    d: 1000,
                    o: 1,
                    r: 180,
                    sX: -9,
                    sY: -9,
                    e: {
                        r: 2,
                        sX: 2,
                        sY: 2
                    }
                }],
                [{
                    b: -1,
                    d: 1,
                    o: -1
                }, {
                    b: 3000,
                    d: 2000,
                    y: 180,
                    o: 1,
                    e: {
                        y: 16
                    }
                }],
                [{
                    b: -1,
                    d: 1,
                    o: -1,
                    r: -150
                }, {
                    b: 7500,
                    d: 1600,
                    o: 1,
                    r: 150,
                    e: {
                        r: 3
                    }
                }],
                [{
                    b: 10000,
                    d: 2000,
                    x: -379,
                    e: {
                        x: 7
                    }
                }],
                [{
                    b: 10000,
                    d: 2000,
                    x: -379,
                    e: {
                        x: 7
                    }
                }],
                [{
                    b: -1,
                    d: 1,
                    o: -1,
                    r: 288,
                    sX: 9,
                    sY: 9
                }, {
                    b: 9100,
                    d: 900,
                    x: -1400,
                    y: -660,
                    o: 1,
                    r: -288,
                    sX: -9,
                    sY: -9,
                    e: {
                        r: 6
                    }
                }, {
                    b: 10000,
                    d: 1600,
                    x: -200,
                    o: -1,
                    e: {
                        x: 16
                    }
                }]
            ];

            var jssor_1_options = {
                $AutoPlay: true,
                $SlideDuration: 800,
                $SlideEasing: $Jease$.$OutQuint,
                $CaptionSliderOptions: {
                    $Class: $JssorCaptionSlideo$,
                    $Transitions: jssor_1_SlideoTransitions
                },
                $ArrowNavigatorOptions: {
                    $Class: $JssorArrowNavigator$
                },
                $BulletNavigatorOptions: {
                    $Class: $JssorBulletNavigator$
                }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 1900);
                    jssor_1_slider.$ScaleWidth(refSize);
                } else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            //responsive code end
        });
    </script>
	<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1945186389056283');
fbq('track', 'PageView');
</script>
<noscript>
<img height="1" width="1"
src="https://www.facebook.com/tr?id=1945186389056283&ev=PageView
&noscript=1"/>
</noscript>

    <style>
        /* jssor slider bullet navigator skin 05 css */
        /*
        .jssorb05 div           (normal)
        .jssorb05 div:hover     (normal mouseover)
        .jssorb05 .av           (active)
        .jssorb05 .av:hover     (active mouseover)
        .jssorb05 .dn           (mousedown)
        */
        
        .jssorb05 {
            position: absolute;
        }
        
        .jssorb05 div,
        .jssorb05 div:hover,
        .jssorb05 .av {
            position: absolute;
            /* size of bullet elment */
            width: 16px;
            height: 16px;
            background: url('img/b05.png') no-repeat;
            overflow: hidden;
            cursor: pointer;
        }
        
        .jssorb05 div {
            background-position: -7px -7px;
        }
        
        .jssorb05 div:hover,
        .jssorb05 .av:hover {
            background-position: -37px -7px;
        }
        
        .jssorb05 .av {
            background-position: -67px -7px;
        }
        
        .jssorb05 .dn,
        .jssorb05 .dn:hover {
            background-position: -97px -7px;
        }
        /* jssor slider arrow navigator skin 22 css */
        /*
        .jssora22l                  (normal)
        .jssora22r                  (normal)
        .jssora22l:hover            (normal mouseover)
        .jssora22r:hover            (normal mouseover)
        .jssora22l.jssora22ldn      (mousedown)
        .jssora22r.jssora22rdn      (mousedown)
        */
        
        .jssora22l,
        .jssora22r {
            display: block;
            position: absolute;
            /* size of arrow element */
            width: 40px;
            height: 58px;
            cursor: pointer;
            background: url('img/a22.png') center center no-repeat;
            overflow: hidden;
        }
        
        .jssora22l {
            background-position: -10px -31px;
        }
        
        .jssora22r {
            background-position: -70px -31px;
        }
        
        .jssora22l:hover {
            background-position: -130px -31px;
        }
        
        .jssora22r:hover {
            background-position: -190px -31px;
        }
        
        .jssora22l.jssora22ldn {
            background-position: -250px -31px;
        }
        
        .jssora22r.jssora22rdn {
            background-position: -310px -31px;
        }
    </style>
    <style>
        @font-face {
            font-family: ab1;
            src: url(fonts/ab1.ttf);
        }
        
        @font-face {
            font-family: ab2;
            src: url(fonts/ab2.ttf);
        }
        
        @font-face {
            font-family: ab3;
            src: url(fonts/ab3.ttf);
        }
        
        @font-face {
            font-family: ab4;
            src: url(fonts/ab4.ttf);
        }
        
        @font-face {
            font-family: abc;
            src: url(fonts/abc.ttf);
        }
    </style>
    <style type="text/css">
        .no-js #loader {
            display: none;
        }
        
        .js #loader {
            display: block;
            position: absolute;
            left: 100px;
            top: 0;
        }
        
        .se-pre-con {
            position: fixed;
            left: 0px;
            font-family: abc;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: #fff;
        }
    </style>

    <style>
        h1 {
            position: relative;
            color: rgba(0, 0, 0, .3);
        }
        
        h1:before {
            content: attr(data-text);
            position: absolute;
            overflow: hidden;
            max-width: 12em;
            white-space: nowrap;
            color: #000;
            animation: loading 8s linear;
            font-family: abc;
        }
        
        @keyframes loading {
            0% {
                max-width: 0;
            }
        }
    </style>
  <!--Popup Start-->
	<script src="pop/jquery-loader.js"></script>
    <link rel="stylesheet" href="pop/qunit/qunit/qunit.css" media="screen">
    <script src="pop/qunit/qunit/qunit.js"></script>
	<link rel="stylesheet" href="pop/remodal.css">
    <link rel="stylesheet" href="pop/remodal-default-theme.css">
    <script src="pop/remodal.js"></script>
    <script src="popremodal_test.js"></script>
    <style>
      .remodal-overlay.without-animation.remodal-is-opening,
      .remodal-overlay.without-animation.remodal-is-closing,
      .remodal.without-animation.remodal-is-opening,
      .remodal.without-animation.remodal-is-closing,
      .remodal-bg.without-animation.remodal-is-opening,
      .remodal-bg.without-animation.remodal-is-closing {
        animation: none;
      }
    </style>
	
	
	<script>
	function change_location(id)
	{
		location_user=$("#"+id).val();
		result=id.split("_");	
		sub_id=result[1];
		div_id=result[2];
		
		jQuery.ajax({
						type:"POST",
						url:"ajax.php?f=change_location",
						datatype:"text",
						data:{location_user:location_user,sub_id:sub_id,div_id:div_id},
						success:function(response)
						{
							a=response.split("*********");
							pro_details=a[0];
							terms_details=a[1];
							$("#"+div_id).empty();
							$("#"+div_id).append(pro_details);
							$("#msg"+div_id).empty();
							$("#msg"+div_id).append(terms_details);
						},
						error:function (xhr, ajaxOptions, thrownError){}
					});
		
		
	}
	</script>
	<style>
	
	
	
	</style>
	<!--Google Analytics Start-->	
	
<!--Google Analytics Start-->	
		</head>
		

<body class="common-home res layout-home1">
    <div id="wrapper" class="wrapper-full banners-effect-7">
		<!-- Header Container  -->
			<?php include 'menu1.php';?>
		<!-- //Header Container  -->
		<!-- Main Container  -->
	
		
		<main id="content" class="page-main" style="padding-top: 7%; padding-bottom:1%">
             <?php if(!isset($_POST['book_now']))
             {

                ?>
             }
            <form action="" method="POST">
                <div class="main-container container" style="" id="form">
                    <div class="row ">
                        <div class="col-md-3 col-sm-12 col-xs-12">

                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12 mobsf" style="padding-left:20px;">

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title" style="font-weight: bold;text-align:center;
									font-family: ab2;">
                                        For Booking
                                    </h4>
                                </div>
                                <br />
                                <h4 class="panel-title" style="font-weight: bold;text-align:center;
									font-family: ab2;">
                                    <i class="fa fa-user"></i> Your Personal Details
                                </h4>
                                <div class="panel-body">
                                    <fieldset id="account">
                                        <div class="form-group required">
                                            <label for="input-payment-firstname" class="control-label"> Name</label>
                                            <input type="text" class="form-control" placeholder="Name" name="name" id="name" required>
                                        </div>


                                        <div class="form-group required">
                                            <label for="input-payment-email" class="control-label">E-Mail</label>
                                            <input type="email" class="form-control" id="input-payment-email" placeholder="E-Mail" name="email" required>
                                        </div>

                                        <div class="form-group required">
                                            <label for="input-payment-telephone" class="control-label">Phone</label>
                                            <input type="text" class="form-control" placeholder="Phone" maxlength="10" id="phone" name="phone" required style="display:block;">

                                        </div>

                                        <div class="form-group">
                                            <label for="input-payment-fax" class="control-label">Address</label>
                                            <textarea rows="2" class="form-control" id="address" name="address" placeholder="Address"></textarea>
                                            <br>
                                            <label class="control-label" for="confirm_agree">
                                                <input type="checkbox" value="1" required="" class="validate required" id="confirm_agree" name="confirm agree">
                                                <span>I have read and agree to the <a class="agree" href="termsAndConditions.php" required=""><b>Terms &amp; Conditions</b></a></span>
                                            </label>
                                            <div class="pull-left" style="margin-top:2%;">
                                                
												<input type="submit" class="btn btn-primary" id="book_now" name="book_now" value="confirm order & pay ">
                                                
                                            </div>



                                        </div>
                                    </fieldset>

                                </div>
                            </div>

                        </div>



                    </div>
                </div>
            </form>
					
        <?php 
            }
            if($paymentFlag)
            {
            $total_price=1;
            $pro_name='Activa';
        ?>
                

    <div class="row">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-8">
            <img src="logos.png" />
            <h3 style="text-align:center; font-family: ab2;font-weight:bold;">Booking Details</h3>
           <!-- <a data-remodal-action="close" class="remodal-close mys"></a>-->
            
                <div class="content-product-left  col-md-3 col-sm-8 col-xs-8">
                    <h3 style="text-align:center;color:#004066;font-size:15px;font-family:ab2;font-size:20px;font-weight: bold;">
                        <?php echo $pro_name;?> <!-- hardcoded -->
                        <?php// echo $bikeName;?>
                    </h3>

                    <!--<center><img src="admin/<?php //echo $image;?>" alt="Bike Image"></center> -->
                </div>
                 <div class="col-md-6" style="margin-top:2%;">
                    <h5 style="font-size:15px;font-weight:bold;color:#004066;">Booking Duration</h5>
                    <!-- <p>From :<span><?php// echo $_SESSION['from_date'];?></span> To: <span><?php// echo $_SESSION['to_date'];?></span></p>-->
                    <p>
                        From :
                        <span>09/07/2018</span>
                        To:10/07/2018
                        <span></span>
                    </p>
                    <h5 style="font-size: 15px; font-weight: bold;color: #004066;">Total Amount Payable</h5>
                    <h5 style="font-size: 20px;font-weight: bold;">
                        <i class="fa fa-inr"></i>
                        <?php echo $total_price;?>
                    </h5>
                    <button id="rzp-button1" class="btn btn-primary">Pay</button>
                    OR
                    <button id="butt1" class="btn btn-primary">Skip</button>
                    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

                    <script>

                        var options = {
                            "key": "rzp_live_yynYqAM86EDsyI",
                            "amount": "100", // 2000 paise = INR 20 hardcoded
                            "name": "ZopRent Pvt. Ltd.",
                            "description": "<?php echo $pro_name;?>",
                            "image": "assets/logo.png",
                            //"callback_url": 'https://www.zoprent.com/paymentAccpted.php?paymentId"+response.razorpay_payment_id',
                            "handler": function (response){
                                //alert(response.razorpay_payment_id);
								
                                var paymentId = response.razorpay_payment_id;
                                //var booking = "<?php //echo $_SESSION['booking_id'];?>";
                                var booking = "ZOP123"; //hardcoded
                                if (typeof response.razorpay_payment_id == 'undefined' ||  response.razorpay_payment_id < 1) {
                                redirect_url = "paymentCancled.php?paynent_id="+booking;
                                 } else {
                                //redirect_url = "paymentAccpted.php?Id="+booking+"&paymentId="+response.razorpay_payment_id;
                                    redirect_url = "onnCheckOut.svr.php?payment_id=" + paymentId;
                                 }
                                location.href = redirect_url;
                            },

                            "prefill": {
                                "name": "<?php echo 'Aditi'; //echo $_POST['name'];?>",
                                "email": "<?php echo' yadav@gmail.com'; // echo $_POST['email'];?>"
                            },
                            "notes": {
                                "address": "<?php echo' adress adress adress'; //echo $_POST['address'];?>"
                            },
                            "theme": {
                                "color": "#004066"
                            },
                            "modal" : {
                                 "ondismiss": function(){

                                 // var booking = "<?php //echo $_SESSION['booking_id'];?>";
                                     //var booking = "ZOP123";
                                //window.location.href="paymentCancled.php?Id="+booking;
				alert("booking is not confirmed without payment");
                        }

                            }

                        };
                        var rzp1 = new Razorpay(options);

                        document.getElementById('rzp-button1').onclick = function(e){
                            rzp1.open();
                            e.preventDefault();
                        }
                                        </script>
                                        <script>
                        var btn = document.getElementById('butt1');
                            //var booking = "<?php //echo $_SESSION['booking_id'];?>";
                            var booking = "ZOP123";
                        btn.addEventListener('click', function() {
                          document.location.href = "paymentCancled.php?Id="+booking;
                        });
                                        </script>
                                      
                    </div>
                </div>
                <?php
                    }
                  ?>
						
		</div>
    				
						
			<?php $_SESSION['category'] = $category;?>
		
		</main >
		<!-- //Main Container -->
		
		<script type="text/javascript"><!--
			var $typeheader = 'header-home5';
			//-->
		</script>
		<!-- Footer Container -->
			<?php include 'footer.php';?>
		<!-- //end Footer Container -->






    </div>
	<!-- Social widgets -->
	
	

	<link rel='stylesheet' property='stylesheet'  href='css/themecss/cpanel.css' type='text/css' media='all' />
	
	<!-- Preloading Screen -->
	<!-- <div id="loader-wrapper"> -->
		<!-- <div id="loader"></div> -->
		<!-- <div class="loader-section section-left"></div> -->
		<!-- <div class="loader-section section-right"></div> -->
	 <!-- </div> -->
	<!-- End Preloading Screen -->
	
	<!-- Include Libs & Plugins
	============================================ -->
	<!-- Placed at the end of the document so the pages load faster -->
	
		<script type="text/javascript" src="js/jquery-2.2.4.min.js"></script>
		
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	
	 <script src="js/timepicki.js"></script>
    <script>
	$('#from_time').timepicki();
    </script>
	<link href="time_picker/css/timepicki.css" rel="stylesheet">
    <link href="time_picker/css/style.css" rel="stylesheet">
    <script src="time_picker/js/timepicki.js"></script>
	<script>
	$('#timepicker1').timepicki();
    </script>
	<script>
  $( function() {
    $( "#from_date").datepicker({ dateFormat: "dd-mm-yy"}).val();
    $( "#to_date").datepicker({ dateFormat: "dd-mm-yy"}).val();
  } );
  </script>
  <script type="text/javascript">
  goog_snippet_vars = function() {
    var w = window;
    w.google_conversion_id = 848977300;
    w.google_conversion_label = "UZzwCNyM2nIQlLvplAM";
    w.google_remarketing_only = false;
  }
  goog_report_conversion = function(url) {
    goog_snippet_vars();
    window.google_conversion_format = "3";
    var opt = new Object();
    opt.onload_callback = function() {
    if (typeof(url) != 'undefined') {
      window.location = url;
    }
  }
  var conv_handler = window['google_trackConversion'];
  if (typeof(conv_handler) == 'function') {
    conv_handler(opt);
  }
}
</script>
<script type="text/javascript"
  src="//www.googleadservices.com/pagead/conversion_async.js">
</script>
 
	

    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/owl-carousel/owl.carousel.js"></script>
    <script type="text/javascript" src="js/themejs/libs.js"></script>
    <script type="text/javascript" src="js/unveil/jquery.unveil.js"></script>
    <script type="text/javascript" src="js/countdown/jquery.countdown.min.js"></script>
    <script type="text/javascript" src="js/dcjqaccordion/jquery.dcjqaccordion.2.8.min.js"></script>
    <script type="text/javascript" src="js/datetimepicker/moment.js"></script>
    <script type="text/javascript" src="js/datetimepicker/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui/jquery-ui.min.js"></script>


    <!-- Theme files
	============================================ -->
    <script type="text/javascript" src="js/themejs/application.js"></script>
    <script type="text/javascript" src="js/themejs/toppanel.js"></script>
    <script type="text/javascript" src="js/themejs/so_megamenu.js"></script>
    <script type="text/javascript" src="js/themejs/addtocart.js"></script>

    <script type="text/javascript" src="js/themejs/accordion.js"></script>
    <script type="text/javascript" src="js/themejs/cpanel.js"></script>

    <script>
        //paste this code under the head tag or in a separate js file.
        // Wait for window load
        $(window).load(function() {
            // Animate loader off screen
            $(".se-pre-con").fadeOut("slow");;
        });
    </script>
	 <script type="text/javascript" src="js/themejs/so_megamenu.js"></script>
	<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-97196585-1', 'auto');
		  ga('send', 'pageview');

	</script>	
 
	
	</body>
</html>
