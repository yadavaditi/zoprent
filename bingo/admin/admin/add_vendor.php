<?php
   if(!isset($_SESSION)){ session_start();} 
    
	include("../config.php");
	if(!isset($_SESSION['login']) && ($_SESSION['login'] != 'true'))
	{
		header("location:../index.php");
	}	
    	
    if (isset($_POST['submit_now'])) 
    {
			$vendor_city=$_POST['vendor_city'];
			$vendor_loc=$_POST['vendor_loc'];
			$vendor_name=$_POST['vendor_name'];
			$vendor_number=$_POST['vendor_number'];
			
			$q=mysql_query("INSERT INTO vendor(vendor_name,vendor_number,vendor_city,vendor_location) 
										VALUES ('$vendor_name','$vendor_number','$vendor_city','$vendor_loc')");
											
				$_SESSION['success_msg']="aaaa";	
						
				
    }	
   ?>
<!DOCTYPE html>
<html lang="en">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Zoprent</title>
      <!-- Global stylesheets -->
	   <link rel="shortcut icon" href="../assets/small.png" type="image/x-icon" />
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
      <!-- /theme JS files -->
      <!-- Theme JS files -->
      <script type="text/javascript" src="../assets/js/plugins/tables/datatables/datatables.min.js"></script>
      <script type="text/javascript" src="../assets/js/pages/datatables_advanced.js"></script>
      <!-- /theme JS files -->
     <!-- /theme JS files -->
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script>
	   $(document).ready(function () {
        
         $("#vendor_number").keypress(function (e) {
        
         if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        
         
         	   return false;
         }
          });
		  
		   
         });
		 
		 
	</script>
   </head>
   <body>
      <!-- Main navbar -->
      <div class="navbar navbar-inverse">
         <div class="navbar-header">
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
                        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Add</span>- Vendor Details</h4>
                     </div>
                     <div class="heading-elements">
                        <ul class="icons-list">
                           <li><a href="vendor.php"><i class="glyphicon glyphicon-search"></i></a></li>
                          
                        </ul>
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
                  </div>
               </div>
               <!-- /page header -->
               <!-- Content area -->
               <div class="content">
                  <!-- Form horizontal -->
                  <div class="panel panel-flat">
                     <div class="panel-body">
                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                           <fieldset class="content-group">
                              <legend class="text-bold">Vendor Details</legend>
                              <div class="form-group">
                                 <label class="control-label col-lg-2">Vendor City*</label>
                                 <div class="col-lg-6">
                                    <select class="form-control" name="vendor_city" id="vendor_city" required>
									<option value="">Select City</option>
									<?php 
										$qry=mysql_query("select * from city order by priority DESC");
										while($res=mysql_fetch_array($qry))
										{
											echo '<option value="'.$res['id'].'">'.$res['city_name'].'</option>';
										}
									?>
									
									
									</select>
                                 </div>
                              </div>
							   <div class="form-group">
                                 <label class="control-label col-lg-2">Vendor Location*</label>
                                 <div class="col-lg-6">
                                    <input type="text" class="form-control" name="vendor_loc" id="vendor_loc" required>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label class="control-label col-lg-2">Vendor Name*</label>
                                 <div class="col-lg-6">
                                    <input type="text" class="form-control" name="vendor_name" id="vendor_name" required>
                                 </div>
                              </div>
							<div class="form-group">
                                 <label class="control-label col-lg-2">Vendor_number*</label>
                                 <div class="col-lg-6">
                                    <input type="text" class="form-control" name="vendor_number" id="vendor_number" maxlength="10"   required>
                                 </div>
                             </div>
                            
                           </fieldset>
                           <div class="text-right">
                              <button type="submit" class="btn btn-primary" name="submit_now" >Submit <i class="icon-arrow-right14 position-right"></i></button>
                           </div>
                        </form>
                     </div>
                  </div>
                  <!-- /form horizontal -->
                  <!-- Footer -->
                  <div class="footer text-muted">
                     &copy; 2017. 
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