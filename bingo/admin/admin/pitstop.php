<?php
   if(!isset($_SESSION)){ session_start();} 
     	include("../config.php");
		
	if(!isset($_SESSION['login']) && ($_SESSION['login'] != 'true'))
	{
		header("location:../index.php");
	}
	date_default_timezone_set('Asia/Calcutta');

	
	$booking_id=base64_decode($_GET['id']);
	$sql=mysql_query("select * from booking_details where booking_id='$booking_id'");
	$res=mysql_fetch_array($sql);
	$name=$res['name'];
	$email=$res['email'];
	$phone=$res['phone'];
	$address=$res['address'];
	$grand_total=$res['grand_total'];
 ?>
 
<!DOCTYPE html>
<html lang="en">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>ADMIN PANEL APPLICATION</title>
      <!-- Global stylesheets -->
      <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
      <link href="../assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
      <link href="../assets/css/bootstrap.css" rel="stylesheet" type="text/css">
      <link href="../assets/css/core.css" rel="stylesheet" type="text/css">
      <link href="../assets/css/components.css" rel="stylesheet" type="text/css">
      <link href="../assets/css/colors.css" rel="stylesheet" type="text/css">
      <!-- /global stylesheets -->
      <!-- Core JS files -->
      <script type="text/javascript" src="../assets/js/plugins/loaders/pace.min.js"></script>
      <script type="text/javascript" src="../assets/js/core/libraries/jquery.min.js"></script>
      <script type="text/javascript" src="../assets/js/core/libraries/bootstrap.min.js"></script>
      <script type="text/javascript" src="../assets/js/plugins/loaders/blockui.min.js"></script>
      <!-- /core JS files -->
      <!-- Theme JS files -->
      <script type="text/javascript" src="../assets/js/plugins/forms/styling/uniform.min.js"></script>
      <script type="text/javascript" src="../assets/js/core/app.js"></script>
      <script type="text/javascript" src="../assets/js/pages/form_inputs.js"></script>
      <script type="text/javascript" src="assets/js/core/app.js"></script>
      <script type="text/javascript" src="assets/js/pages/dashboard.js"></script>
      <!-- /theme JS files --><!-- Theme JS files -->
      <script type="text/javascript" src="../assets/js/plugins/tables/datatables/datatables.min.js"></script>
      <script type="text/javascript" src="../assets/js/pages/datatables_advanced.js"></script>
      <!-- /theme JS files -->
     
   </head>
     <link href = "../assets/js/date/jquery-ui.css" rel = "stylesheet">
      <script src = "../assets/js/date/jquery-1.10.2.js"></script>
      <script src = "../assets/js/date/jquery-ui.js"></script>
      
	 <script>
         $(function() {
            $( "#pick_date" ).datepicker({ dateFormat: "dd-mm-yy"}).val();
         });
      </script>	
 
      <style>
         a {
         color: #ffffff;
         text-decoration: none;
         }
         .bg-pink-400 {
         background-color: #ec4040;
         border-color: #ec4040;
         color: #fff;
         }
         a:focus, a:hover {
         color: #000000;
         text-decoration: none;
         }
         .bg-teal-400 {
         background-color: #5d85af;
         border-color: #26A69A;
         color: #fff;
         }
         .bg-green-400 {
         background-color: #62af5d;
         border-color: #9CCC65;
         color: #fff;
         }
      </style>
   </head>
   <body>
      <!-- Main navbar -->
      <div class="navbar navbar-inverse">
         <div class="navbar-header">
            <a class="navbar-brand" href="index.php#"><!--<img src="../assets/images/logo2.png" alt="">--></a>
            <ul class="nav navbar-nav pull-right visible-xs-block">
               <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
               <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
            </ul>
         </div>
         <div class="navbar-collapse collapse" id="navbar-mobile">
            <ul class="nav navbar-nav">
               <li>
                  <a class="sidebar-control sidebar-main-toggle hidden-xs">
                  <i class="icon-paragraph-justify3"></i>
                  </a>
               </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
               <li class="dropdown dropdown-user">
                  <a class="dropdown-toggle" data-toggle="dropdown">
                 <!-- <img src="../assets/images/logo2.png" alt="">-->
                  <span>Welcome Admin</span>
                  <i class="caret"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-right">
                     <li><a href="../logout.php"><i class="icon-switch2"></i> Logout</a></li>
                  </ul>
               </li>
            </ul>
         </div>
      </div>
      <!-- /main navbar -->
      <!-- Page container -->
      <div class="page-container">
      <!-- Page content -->
      <div class="page-content">
      <!-- Main sidebar -->
      <?php
         include('menu.php');
         ?>
      <!-- /main sidebar -->
      <!-- Main content -->
      <div class="content-wrapper">
      <!-- Page header -->
      <div class="page-header">
         <div class="page-header-content">
            <div class="page-title">
               <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Pitstop Details</span> </h4>
            </div>
            <?php 
               if(isset($_SESSION['success_msg']))
               	{  
               ?>
            <div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered">
               <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
               <span class="text-semibold">Well done!</span> You successfully inserted the record!
            </div>
            <?php 
               unset($_SESSION['success_msg']); 
               	}
               else if(isset($_SESSION['error_msg']))
               	{
               ?>
            <div class="alert bg-danger alert-styled-left">
               <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
               <span class="text-semibold">Sorry!</span> There is some error, Please check and try again!
            </div>
            <?php
               unset($_SESSION['error_msg']);
               	}
               ?>
				
		 <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
		 
							<div class="form-group">
								<div class="col-md-12">
									<label class="control-label col-lg-2" style="padding-top:1%">Booking ID :</label>
									<label class="control-label col-lg-1" style="padding-top:1%"><?php echo $booking_id;?></label>
									
									<label class="control-label col-lg-2" style="padding-top:1%">Name :</label>
									<label class="control-label col-lg-2" style="padding-top:1%"><?php echo ucwords($name);?></label>
									
								</div>
								<div class="col-md-12">
									
									
									<label class="control-label col-lg-2" style="padding-top:1%">Phone :</label>
									<label class="control-label col-lg-1" style="padding-top:1%"><?php echo $phone;?></label>
									
									<label class="control-label col-lg-2" style="padding-top:1%">Email :</label>
									<label class="control-label col-lg-2" style="padding-top:1%"><?php echo $email;?></label>
									
								</div> 
								<div class="col-md-12">
									<label class="control-label col-lg-2" style="padding-top:1%">Grand Total :</label>
									<label class="control-label col-lg-1" style="padding-top:1%"><?php echo "Rs. ". $grand_total;?></label>
									
									<label class="control-label col-lg-2" style="padding-top:1%">Address :</label>
									<label class="control-label col-lg-1" style="padding-top:1%"><?php echo $address;?></label>
									
								</div>  
							</div>  
			  <div class="panel panel-flat" style="width: 100%;">
                     <div class="panel-body">
					 <legend class="text-bold">Bike Details</legend>
						<table class="table">
							  <tr>
							  <th>Vehicle Name</th>
							  <th>Vendor Name</th>
							  <th>Vendor Location</th>
							  <th>From Date</th>
							  <th>To Date</th>
							  <th>Total Price</th>
							  
							  </tr>
							  <tbody id="get_table">
							  <?php
								$i=1;
								$sql="select * from booking_details where booking_id='$booking_id'";
								$result=mysql_query($sql);
								while($row=mysql_fetch_array($result))
								{
									$id=$row['id'];
									$b_id=$row['booking_id'];
									
									$new_ven_id=$row['vendor_id'];
									$new_sub_id=$row['sub_category'];
									$new_db_from_date=$row['from_date'];
									$new_db_to_date=$row['to_date'];
									
									$sub_qry2=mysql_query("select name from sub_category where id='$new_sub_id'");
									$sub_res2=mysql_fetch_array($sub_qry2);
									$pro_name=$sub_res2['name'];
									
									$sub_qry3=mysql_query("select vendor_name,vendor_location from vendor where id='$new_ven_id'");
									$sub_res3=mysql_fetch_array($sub_qry3);
									$ven_name=$sub_res3['vendor_name'];
									$ven_loc=$sub_res3['vendor_location'];
									
									$ch1=explode("-",$new_db_from_date);
									$from_date=$ch1[2]."-".$ch1[1]."-".$ch1[0];
													
									$ch2=explode("-",$new_db_to_date);
									$to_date=$ch2[2]."-".$ch2[1]."-".$ch2[0];	
									echo '
											<tr>
											
											<td>'.$pro_name.'</td>
											<td title="Vendor Name">'.$ven_name.'</td>
											<td title="Vendor Location">'.$ven_loc.'</td>
											<td>'.$from_date.'</td>
											<td>'.$to_date.'</td>								
											<td>Rs. '.$row['total_price'].'</td>';
									$i++;
								}
							?>
							</tbody>
							</table>
						</div>
						<div class="panel-body">
					 <legend class="text-bold">Pitstop Details</legend>
						<table class="table">
							  <tr>
							  <th>City</th>
							  <th>Resort Name</th>
							  <th>From Date</th>
							  <th>To Date</th>
							  <th>Total Price</th>
							  
							  </tr>
							  <tbody id="get_table">
							  <?php
								$i=1;
								$sql="select * from accomadation where booking_id='$booking_id'";
								$result=mysql_query($sql);
								while($row=mysql_fetch_array($result))
								{
									$id=$row['id'];
									$b_id=$row['booking_id'];
									
									$city_id=$row['city_id'];
									$resort_id=$row['resort_id'];
									$new_db_from_date_acc=$row['from_date'];
									$new_db_to_date_acc=$row['to_date'];
									
									$ch1_acc=explode("-",$new_db_from_date_acc);
									$from_date_acc=$ch1_acc[2]."-".$ch1_acc[1]."-".$ch1_acc[0];
													
									$ch2_acc=explode("-",$new_db_to_date_acc);
									$to_date_acc=$ch2_acc[2]."-".$ch2_acc[1]."-".$ch2_acc[0];	
									
									$sub_qry2=mysql_query("select city_name from city where id='$city_id'");
									$sub_res2=mysql_fetch_array($sub_qry2);
									$city_name=$sub_res2['city_name'];
									
									$sub_qry3=mysql_query("select resort_name from resorts where id='$resort_id'");
									$sub_res3=mysql_fetch_array($sub_qry3);
									$resort_name=$sub_res3['resort_name'];
									
									echo '
											<tr>
											<td>'.$city_name.'</td>
											<td title="Resort Name">'.$resort_name.'</td>
											<td>'.$from_date_acc.'</td>
											<td>'.$to_date_acc.'</td>								
											<td>Rs. '.$row['price'].'</td>';
									$i++;
								}
							?>
							</tbody>
							</table>
						</div>
						</div>
						
      <!-- /page header -->

      <div class="content">
         <!-- Dashboard content -->
        
         <!-- /page content -->
      </div>
      <!-- /page container -->
   </body>
</html>