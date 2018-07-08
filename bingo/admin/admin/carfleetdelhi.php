<?php
   if(!isset($_SESSION)){ session_start();} 
    
   include("../config.php");
  
?>
<?php
$sql=mysql_query("SELECT a.carname, a.price_wkd,a.price_wknd,a.deposit,a.dlimit,b.name,b.address,b.contact from carfleet a,vendors b where a.vid = b.vid and b.city='Delhi';");
//$sql=mysqli_query($con,"select id, bikename, price_wkd, deposit, dlimit from fleet order by vid DESC limit 20");
			
         
?>

<!DOCTYPE html>
<html lang="en">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
           <title>zoprent</title>
      <!-- Global stylesheets -->
	   <link rel="shortcut icon" href="../assets/small.png" type="image/x-icon" />
      <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
      <link href="../assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
      <link href="../assets/css/bootstrap.css" rel="stylesheet" type="text/css">
      <link href="../assets/css/core.css" rel="stylesheet" type="text/css">
      <link href="../assets/css/components.css" rel="stylesheet" type="text/css">
      <link href="../assets/css/colors.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
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
	  <style>
	  .button {
    background-color: #01a9c4; /* Green */
    border: 3px solid white;
	float: right;
    color: white;
	align: right;
    padding: 10px 18px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
}
	  </style>
    <script>
	  function search_cardelhis()
	  {
		  var data=$('#search').val();
					
						jQuery.ajax({
						type:"POST",
						url:"searchs.php?f=search_cardelhi",
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
	   function search_cardelhi()
	  {
		  var data=$('#search').val();
					
						jQuery.ajax({
						type:"POST",
						url:"ajax.php?f=search_cardelhi",
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
            <a class="navbar-brand" href="index.php"></a>
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
                        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">FLEET </span>- Details</h4>
                     </div>
                     <div class="heading-elements">
                        <ul class="icons-list">
                           <li><a href="#"><i class="fa fa-plus-square"></i></a></li>
                          
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
		<script>
function myfunction() {
    window.open("search.php");
}
</script>
               <!-- /page header 
Click Me-->
               <div class="content">
						 <div class="panel panel-flat" >
                     <div class="panel-body" >
                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                           <fieldset class="content-group">
                              <legend class="text-bold">Search</legend>
                               	 <label class="control-label col-lg-1" style="padding-top:1%">Filter</label>
								  
								 
							  <div class="col-md-2">
								<input type="text" class="form-control" name="search_filter" id="search" onkeyup="search_cardelhi();"  placeholder="Type of Filter"  > 
							  </div> 
							  <input type="button"  onclick="myfunction()"  class="button" value="Go to Google Map" />
							  
							 
							  
                           </fieldset>
                        </form>
                     </div>
                  </div>
                  <!-- Page length options -->
                  <div class="panel panel-flat">
                     <table class="table">
                        <thead>
                           <tr>
						      <th>Name</th>
                              <th>Car Name</th>
							  <th>Price WKD</th>
							  <th>Price WKND</th>
							  <th>Address</th>
							  <th>Contact</th>
                              
                                 <th>Deposit</th>
                              <th>Limit</th>
                              
							  
                              
                           </tr>
                        </thead>
                        <tbody id="get_table">
                           <?php
							  
                             while($row=mysql_fetch_array($sql))
							  {
									echo'
									<tr>
									    <td>'.$row['name'].'</td>
										<td>'.$row['carname'].'</td>
										<td>'.$row['price_wkd'].'</td>
										<td>'.$row['price_wknd'].'</td>
										<td>'.$row['address'].'</td>
										<td>'.$row['contact'].'</td>
										<td>'.$row['deposit'].'</td> 
										<td>'.$row['dlimit'].'</td>
										
										
									</tr>';
							
                              	} 
							?>
                        </tbody>
                     </table>
                     <!-- /highlighting rows and columns -->
                     <!-- Column rendering -->
                     <!-- Footer -->
					 
                     <div class="footer text-muted">
                       Zoprent &copy; 2017. 
                     </div>
                     <!-- /footer -->
                  </div>
                  <!-- /content area -->
               </div>
               <!-- /main content -->
            </div>
            <!-- /page content -->
         </div>
         <!-- /page content -->
      </div>
      <!-- /page container -->
   </body>
</html>