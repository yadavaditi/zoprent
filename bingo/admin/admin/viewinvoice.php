<?php
   if(!isset($_SESSION)){ session_start();} 
    
	include("../config.php");
	if(!isset($_SESSION['login']) && ($_SESSION['login'] != 'true'))
	{
		header("location:../index.php");
	}	
	
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
           url: "viewinvoicepage.php",
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


$query="select * from zopinvoice order by id DESC";
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
    <title>Admin Panel</title>
      <!-- Global stylesheets -->
      <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
      <link href="../assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
      <link href="../assets/css/bootstrap.css" rel="stylesheet" type="text/css">
      <link href="../assets/css/core.css" rel="stylesheet" type="text/css">
      <link href="../assets/css/components.css" rel="stylesheet" type="text/css">
      <link href="../assets/css/colors.css" rel="stylesheet" type="text/css">
	  
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
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
      <!-- /theme JS files -->
      <!-- Theme JS files -->
      <script type="text/javascript" src="../assets/js/plugins/tables/datatables/datatables.min.js"></script>
      <script type="text/javascript" src="../assets/js/pages/datatables_advanced.js"></script>
      <!-- /theme JS files -->
     

   <script>
   
   function filters_mains_details()
   {
	   data=$('#search').val();
	   
	   jQuery.ajax({
								type:"POST",
								url:"ajax.php?f=filters_subs_categorys",
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
   
 </head>
   <body>
      <!-- Main navbar -->
      <div class="navbar navbar-inverse">
         <div class="navbar-header">
            <a class="navbar-brand" href="index.php"><!--<img src="../assets/myfiles/logo.png" alt="">--></a>
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
                  <!--<img src="../assets/myfiles/small.png" alt="">-->
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
                        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Invoice Report</span></h4>
                     </div>
                    <div class="heading-elements">
						<ul class="icons-list">
                           <li><a href="viewinvoice.php"><i class="fa fa-plus-square"></i></a></li>
                        </ul>
					
                     </div>
                     <?php 
                        if(isset($_SESSION['success_msg']))
                        	{  
                        ?>
                     <div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered">
                        <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                        <span class="text-semibold">Well done!</span> Successfull!
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
                  </div>
               </div>
               <!-- /page header -->
               <!-- Content area -->
               <div class="content">
			   <div class="panel panel-flat">
                  <!-- Form horizontal -->
                 
                  <!-- /form horizontal -->
				  <br><br>
				  <div class="form-group">
							 <label class="control-label col-lg-1" style="padding-top:1%">Filter</label>
							  <div class="col-md-2">
								<input type="text" class="form-control" name="search_filter" id="search" onkeyup="filters_mains_details();"  placeholder="Type of Filter"  > 
							  </div>
				  
							  <br>
							  <br>
                  </div>
				  
                     <div class="panel-body">
                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                           <fieldset class="content-group">
                              <legend class="text-bold">Invoice Sent Details</legend>
							  <table class="table">
							  <tr>
							  <th>S.No.</th>
							  <th>Invoice No.</th>
							  <th>Customer Name</th>
							  <th>Contact No.</th>
							  <th>Email</th>
							  <th>Main Category</th>
							  <th>Vechile Type</th>
							  <th>No. Days</th>
							  <th>Date Sent</th>
							  <th>Date From</th>
							  <th>To Date</th>
							  <th>Price</th>
							  <th>Total</th>
							  <th>Pickup Location</th>
							  <th>Files</th>
							  </tr>
							  <tbody id="get_table">
                          <?php
							
								$pageLimit=PAGE_PER_NO*$id1;
								$sql="select * from zopinvoice order by id ASC limit $pageLimit,".PAGE_PER_NO;
								$result=mysql_query($sql);
								$i=1;
								
								while($row=mysql_fetch_array($result))
								{
									$id=$row['id'];
									$bkid=$row['invoiceid'];
									$name=$row['cname'];
									$number=$row['phone'];
									$email=$row['email'];
									$price=$row['price'];
									$total=$row['total'];
									$days=$row['numberdays'];
									$datesent=$row['date_sent'];
									$fdate=$row['fdate'];
									$tdate=$row['tdate'];
									$main_category=$row['main_category'];
									$vname=$row['vname'];
									$pickup=$row['pickup'];
									$files=$row['files'];
									
									
	
								
									
									echo '
											<tr>
											<td>'.$i.'</td>
											<td>'.$bkid.'</td>
											<td>'.$name.'</td>
											<td>'.$number.'</td>
											<td>'.$email.'</td>
											<td>'.$main_category.'</td>
											<td>'.$vname.'</td>
											<td>'.$days.'</td>
											<td>'.$datesent.'</td>
											<td>'.date('d-m-y H:i',strtotime($fdate)).'</td>
											<td>'.date('d-m-y H:i',strtotime($tdate)).'</td>
											<td>'.$price.'</td>
											<td>'.$total.'</td>
											<td>'.$pickup.'</td>
											<td>
                                              <td><embed src="'.$files.'" width="50" height="30" type="application/pdf">
                                              <a href="'.$files.'" target="_blank">Click</a>
                                            </td>
											
												
											</tr>
									';
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
                  <!-- Footer -->
                  <div class="footer text-muted">
                     &copy; 2017. <a href="#">ZopRent</a>
                  </div>
                  <!-- /footer -->
               </div>
               <!-- /content area -->
            </div>
            <!-- /main content -->
         </div>
         <!-- /page content -->
      </div>
      <!-- /page container -->
   </body>
</html>