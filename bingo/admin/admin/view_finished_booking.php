<?php
   if(!isset($_SESSION)){ session_start();} 
     	include("../config.php");
		
	if(!isset($_SESSION['login']) && ($_SESSION['login'] != 'true'))
	{
		header("location:../index.php");
	}
	date_default_timezone_set('Asia/Calcutta');
include_once('function.php');

if(isset($_POST['pageId']) && !empty($_POST['pageId']))
{
$id1=$_POST['pageId'];
}
else
{
$id1=0;
}	
 ?>
 <?php
$content ='
  <style>
  .sel_fon{
    height: 36px;
    padding: 7px 12px;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 3px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    -webkit-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
	}
	  </style>
<script type="text/javascript">
function changePagination(pageId,liId){
	 $(".flash").show();
     $(".flash").fadeIn(400).html
                (\'Loading <img src="../assets/images/load.png" />\');
     var dataString = \'pageId=\'+ pageId;
     $.ajax({
           type: "POST",
           url: "view_finished_booking_page.php",
           data: dataString,
           cache: false,
           success: function(result){
                 $(".flash").hide();
                 $(".link a").removeClass("In-active current") ;
                 $("#"+liId+" a").addClass( "In-active current" );
                 
                 $("#get_table").empty(result);
                 $("#get_table").append(result);
				
           }
      });
}
</script>';


$query="select * from booking_details where status='finished' order by booked_date DESC";
$res=mysql_query($query);
$count=mysql_num_rows($res);
if($count > 0){
      $paginationCount=getPagination($count);
}

$content .='<div id="pageData"></div>';
if($count > 0){

$content .='<ul class="pager pull-right">
    <li class="first link" id="first">
        <a  href="javascript:void(0)" onclick="changePagination(\'0\',\'first\')">First</a>
    </li>
	';
	$content .='<select class="sel_fon"  onchange="changePagination(this.value,this.value)">';
    for($i=0;$i<$paginationCount;$i++){
    $content .='<option >'.($i).'</option>';
    }
    $content .="</select>";
    $content .='<li class="last link" id="last">
         <a href="javascript:void(0)" onclick="changePagination(\''.($paginationCount-1).'\',\'last\')">Last</a>
    </li>
    <li class="flash"></li>
</ul>';
 }
$pre = 1;
         
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
   <script>
   function filter_booking()
   {
	    data=$('#search').val();
	   
	   jQuery.ajax({
								type:"POST",
								url:"ajax.php?f=filter_finished_booking",
								datatype:"text",
								data:{data:data},
								success:function(response)
								{
									$('#get_table').empty();
									$('#get_table').append(response);
									
								},
								error:function (xhr, ajaxOptions, thrownError){}
								});
   }
    function search_by_date()
   {
	    usr_date=$('#pick_date').val();
	   result=usr_date.split("-");
	   data=result[2]+"-"+result[1]+"-"+result[0];
	   jQuery.ajax({
								type:"POST",
								url:"ajax.php?f=filter_finished_booking",
								datatype:"text",
								data:{data:data},
								success:function(response)
								{
									$('#get_table').empty();
									$('#get_table').append(response);
									
								},
								error:function (xhr, ajaxOptions, thrownError){}
								});
   }
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
               <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Finished Orders</span> </h4>
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
									<label class="control-label col-lg-1" style="padding-top:1%">Filter</label>
									<div class="col-md-2">
										<input type="text" class="form-control" name="search_filter" id="search" onkeyup="filter_booking();"  placeholder="Type of Filter"  > 
									</div> 
									<label class="control-label col-lg-2" style="padding-top:1%">Filter By Date</label>
									<div class="col-md-3">
										<input type="text" class="form-control" name="pick_date" id="pick_date"   placeholder="DD/MM/YYYY" onchange="search_by_date();" > 
									</div> 
								</div>  
			  <div class="panel panel-flat" style="width: 200%;">
                     <div class="panel-body">
		  <table class="table">
							  <tr>
							  <th>S.No</th>
							  <th>Booking ID</th>							  
							  <th>Name</th>
							  <th>Phone</th>
							  <th>Email</th>
							  <th>Date of Booking</th>
							  <th>Time of Booking</th>
							  <th>Product Name</th>
							  <th>Vendor Name</th>
							  <th>Vendor Location</th>
							  <th>From Date</th>
							  <th>To Date</th>
                                <th>From Time</th>
							  <th>To Time</th>
							  <th>Address</th>
							  <th>Grand Total</th>
							  <th>Pitstop</th>
							  </tr>
							  <tbody id="get_table">
							  <?php
								$i=1;
								$pageLimit=PAGE_PER_NO*$id1;
								$sql="select * from booking_details where status='finished' order by booked_date ASC limit $pageLimit,".PAGE_PER_NO;
								$result=mysql_query($sql);
								while($row=mysql_fetch_array($result))
								{
									$id=$row['id'];
									$b_id=$row['booking_id'];
									$date=$row['booked_date'];
									$time=$row['booked_time'];
									$ch_date=explode("-",$date);
									$new_date=$ch_date[2]."-".$ch_date[1]."-".$ch_date[0];
									$new_time=date("h:i:s a",strtotime($time));
									
									$new_ven_id=$row['vendor_id'];
									$new_sub_id=$row['sub_category'];
									$new_db_from_date=$row['from_date'];
									$new_db_to_date=$row['to_date'];
									
                                   
									$new_to_time=date("h:i:s a",strtotime($row['to_time']));
                                    $new_from_time=date("h:i:s a",strtotime($row['from_time']));

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
									
									 
									$sub_qry=mysql_query("select id from accomadation where booking_id='$b_id'");
									$acc_count=mysql_num_rows($sub_qry);
									
									echo '
											<tr>
											<td>'.$i.'</td>
											<td>'.$row['booking_id'].'</td>
											<td>'.$row['name'].'</td>
											<td>'.$row['phone'].'</td>
											<td>'.$row['email'].'</td>
											<td>'.$new_date.'</td>
											<td>'.$new_time.'</td>
											<td>'.$pro_name.'</td>
											<td title="Vendor Name">'.$ven_name.'</td>
											<td title="Vendor Location">'.$ven_loc.'</td>
											<td>'.$from_date.'</td>
											<td>'.$to_date.'</td>        
                                            <td>'.$new_from_time.'</td>
											<td>'.$new_to_time.'</td>
									
											<td>'.$row['address'].'</td>										
											<td>Rs. '.$row['grand_total'].'</td>
									';
									
									if($acc_count>=1)
										{
											echo '
											<td><a href="pitstop.php?id='.base64_encode($b_id).'"><input type="button"  class="btn btn-primary" value="Yes" name="pitstop"></a></td>'	;
										}
									else
									{
										echo '<td><input type="button"  class="btn btn-primary" value="No" name="pitstop"></td>'	;
									}
									
									echo '</tr>';
									$i++;
								}
							?>
							</tbody>
							</table>
							
      </div>
	  </div>
						<div id="page">
							<?php if(!isset($pre)) {?>
							<pre>
								<?php print_r($content); ?>
							</pre>
							<?php }else{ ?>
									<?php print_r($content); ?>
							<?php } ?>
						</div>
      <!-- /page header -->
      <div class="content-wrapper">
      <!-- Content area -->
      <div class="content">
         <!-- Dashboard content -->
        
         <!-- /page content -->
      </div>
      <!-- /page container -->
   </body>
</html>