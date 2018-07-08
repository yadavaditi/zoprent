<?php
   if(!isset($_SESSION)){ session_start();} 
    
	include("../config.php");
	if(!isset($_SESSION['login']) && ($_SESSION['login'] != 'true'))
	{
		header("location:../index.php");
	}	
    
    if (isset($_POST['submit_now'])) 
    {
		
			$vendor_id=$_POST['vendor'];
			$sub_id=$_POST['sub_category'];
			$oneday_price=$_POST['oneday_price'];
			$weekend=$_POST['weekend'];
			$monthly=$_POST['monthly'];
			$qty=$_POST['qty'];
			$terms_condition=mysql_real_escape_string($_POST['description']);
			$priority=$_POST['priority'];
			
			
			$sql=mysql_query("select vendor_name,vendor_city from vendor where id='$vendor_id'"); 
			$res=mysql_fetch_array($sql);
			$vendor_name=$res['vendor_name'];
			$vendor_city=$res['vendor_city'];
			
			$q=mysql_query("INSERT INTO product_details (vendor_id,vendor_name,vendor_city,sub_category,oneday_price,weekend,monthly,qty,terms_conditions,priority) 
				VALUES ('$vendor_id','$vendor_name', '$vendor_city', '$sub_id', '$oneday_price','$weekend','$monthly','$qty', '$terms_condition', '$priority')");
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
    <title>Admin Panel</title>
      <!-- Global stylesheets -->
      <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
      <link href="../assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
      <link href="../assets/css/bootstrap.css" rel="stylesheet" type="text/css">
      <link href="../assets/css/core.css" rel="stylesheet" type="text/css">
      <link href="../assets/css/components.css" rel="stylesheet" type="text/css">
      <link href="../assets/css/colors.css" rel="stylesheet" type="text/css">
	  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
     <script src='http://cdn.tinymce.com/4/tinymce.min.js'></script>
   <script>
   
   tinymce.init({
			selector: '#description',
			themes: "modern",   
			plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen"],
			toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
			
		  });
   
   </script>
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
                        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Add Product Details</span></h4>
                     </div>
                    <div class="heading-elements">
                        <ul class="icons-list">
                           <li><a href="vendor_products.php"><i class="glyphicon glyphicon-search"></i></a></li>
                          
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
                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                           <fieldset class="content-group">
                              <legend class="text-bold">Vendor to Product</legend>
                              
							  <div class="form-group">
                                 <label class="control-label col-lg-2">Vendor Name<strong style="color:red;">*</strong></label>
                                 <div class="col-lg-6">
                                    <select name="vendor" required class="form-control">
									<option value="">Vendor Name</option>
									<?php
									$sql=mysql_query("select * from vendor");
									while($row=mysql_fetch_array($sql))
									{
										echo '<option value='.$row['id'].'>'.$row['vendor_name'].'</option>';
									}
									?>
									</select>
                                 </div>
                              </div>
							  <div class="form-group">
                                 <label class="control-label col-lg-2">Sub-Category<strong style="color:red;">*</strong></label>
                                 <div class="col-lg-6">
                                    <select name="sub_category" required class="form-control">
									<option value="">Select Sub-Category</option>
									<?php
									$sql=mysql_query("select * from sub_category where main_category BETWEEN 1 AND 3  order by priority DESC");
									while($row=mysql_fetch_array($sql))
									{
										echo '<option value='.$row['id'].'>'.$row['name'].'</option>';
									}
									?>
									</select>
                                 </div>
                              </div>
							   <div class="form-group">
                                 <label class="control-label col-lg-2">One Day Price <strong style="color:red;">*</strong></label>
                                 <div class="col-lg-6">
                                    <input type="text" class="form-control" name="oneday_price" id="oneday_price" required>
                                 </div>
                              </div>
							  <div class="form-group">
                                 <label class="control-label col-lg-2">Weekend <strong style="color:red;">*</strong></label>
                                 <div class="col-lg-6">
                                    <input type="text" class="form-control" name="weekend" id="weekend" required>
                                 </div>
                              </div>
							  <div class="form-group">
                                 <label class="control-label col-lg-2">Monthly <strong style="color:red;">*</strong></label>
                                 <div class="col-lg-6">
                                    <input type="text" class="form-control" name="monthly" id="monthly">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label class="control-label col-lg-2">Qty <strong style="color:red;">*</strong></label>
                                 <div class="col-lg-6">
                                    <input type="text" class="form-control" name="qty" id="qty" required>
                                 </div>
                              </div>
							 
							  <div class="form-group">
                                 <label class="control-label col-lg-2">Terms & Conditions</label>
                                 <div class="col-lg-12">
                                    <textarea class="form-control" rows="20" name="description" id="description" ></textarea>
                                 </div>
                              </div>
							  
                            <div class="form-group">
                                 <label class="control-label col-lg-2">Priority <strong style="color:red;">*</strong></label>
                                 <div class="col-lg-6">
                                    <input type="text" class="form-control" name="priority" id="priority" required>
                                 </div>
                              </div>
                            
                           </fieldset>
                           <div class="text-right">
                              <button type="submit" class="btn btn-primary" name="submit_now" >Save <i class="icon-arrow-right14 position-right"></i></button>	
                           </div>
                        </form>
                     </div>
                  </div>
                  <!-- /form horizontal -->
				
                  <!-- Footer -->
                  <div class="footer text-muted">
                     &copy; 2016. <a href="#">ZopRent</a>
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
