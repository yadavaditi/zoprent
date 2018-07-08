<?php
   if(!isset($_SESSION)){ session_start();} 
    
	include("../config.php");
	if(!isset($_SESSION['login']) && ($_SESSION['login'] != 'true'))
	{
		header("location:../index.php");
	}	
    
   
		
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
     
   </head>
   <body>
      <!-- Main navbar -->
      <div class="navbar navbar-inverse">
         <div class="navbar-header">
            <a class="navbar-brand" href="index.html"><!--<img src="../assets/myfiles/logo.png" alt="">--></a>
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
                        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Invoice Form</span></h4>
                     </div>
                    <div class="heading-elements">
                        <ul class="icons-list">
                           <li><a href="sub_category.php"><i class="glyphicon glyphicon-search"></i></a></li>
                          
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
                  <!-- Form horizontal -->
                  <div class="panel panel-flat">
                     <div class="panel-body">
                        <form class="form-horizontal" action="invoicedes.php" method="post" enctype="multipart/form-data">
                           <fieldset class="content-group">
                              <legend class="text-bold">Enter Details For Customer</legend>
                              
							  <div class="form-group">
                                 <label class="control-label col-lg-2">Product Type<strong style="color:red;">*</strong></label>
                                 <div class="col-lg-6">
                                    <select name="main_category" required class="form-control">
									<option value="">Select Type</option>
									<?php
									$sql=mysql_query("select * from categories order by priority DESC");
									while($row=mysql_fetch_array($sql))
									{
										echo '<option value='.$row['id'].'>'.$row['categories'].'</option>';
									}
									?>
									</select>
                                 </div>
                              </div>
							  
                              <div class="form-group">
                                 <label class="control-label col-lg-2">Customer Name <strong style="color:red;">*</strong></label>
                                 <div class="col-lg-6">
                                    <input type="text" class="form-control" name="name" id="name" required>
                                 </div>
                              </div>
							  <div class="form-group">
                                 <label class="control-label col-lg-2">Email<strong style="color:red;">*</strong></label>
                                 <div class="col-lg-6">
                                    <input type="text" class="form-control" name="email" id="email" required>
                                 </div>
                              </div>
							  <div class="form-group">
                                 <label class="control-label col-lg-2">Number<strong style="color:red;">*</strong></label>
                                 <div class="col-lg-6">
                                    <input type="text" class="form-control" name="number" id="number" required>
                                 </div>
                              </div>
							  <div class="form-group">
                                 <label class="control-label col-lg-2">Address/City<strong style="color:red;">*</strong></label>
                                 <div class="col-lg-6">
                                    <input type="text" class="form-control" name="address" id="address" required>
                                 </div>
                              </div>
							  <div class="form-group">
                                 <label class="control-label col-lg-2">Vechile Description<strong style="color:red;">*</strong></label>
                                 <div class="col-lg-6">
                                   <input type="text" class="form-control" name="description" id="description" required>
                                 </div>
                              </div>
							 
							  <div class="form-group">
                                 <label class="control-label col-lg-2">Oneday Price<strong style="color:red;">*</strong></label>
                                 <div class="col-lg-6">
                                    <input type="text" class="form-control" name="price" id="price" required>
                                 </div>
                              </div>
							  <div class="form-group">
                                 <label class="control-label col-lg-2">No. of Days<strong style="color:red;">*</strong></label>
                                 <div class="col-lg-6">
                                    <input type="text" class="form-control" name="day" id="day" required>
                                 </div>
                              </div>
							  <div class="form-group">
                                 <label class="control-label col-lg-2">Pickup Location<strong style="color:red;">*</strong></label>
                                 <div class="col-lg-6">
                                    <textarea class="form-control" name="pickup" id="pickup" rows="2" required></textarea>
                                 </div>
                              </div>
							  <div class="form-group">
                                 <label class="control-label col-lg-2">Terms & Condition<strong style="color:red;">*</strong></label>
                                 <div class="col-lg-6">
                                    <textarea class="form-control" name="tnc" id="tnc" rows="20" required></textarea>
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
                     &copy; 2016. <a href="#">Zoprent</a>
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
