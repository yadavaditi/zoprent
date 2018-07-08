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
           url: "categories_page.php",
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


$query="select * from categories";
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
           <title>Zoprent</title>
      <!-- Global stylesheets -->
	   <link rel="shortcut icon" href="../assets/small.png" type="image/x-icon" />
      <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
      <link href="../assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
      <link href="../assets/css/bootstrap.css" rel="stylesheet" type="text/css">
      <link href="../assets/css/core.css" rel="stylesheet" type="text/css">
      <link href="../assets/css/components.css" rel="stylesheet" type="text/css">
      <link href="../assets/css/colors.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
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
	  function search_category()
	  {
		  var data=$('#search').val();
					
						jQuery.ajax({
						type:"POST",
						url:"ajax.php?f=search_category",
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
	  
	function category_priority_update(this_id)
		  {
				res1=this_id.split("_");
				res_id=res1[1];
				value=$("#"+this_id).val();
				jQuery.ajax({
         				type:"POST",
         				url:"ajax.php?f=category_priority_update",
         				datatype:"text",
         				data:{value:value,res_id:res_id},
         				success:function(response)
         				{
						
         				},
         				error:function (xhr, ajaxOptions, thrownError){}
         				});
		  }
		 function delete_category(this_id)
		{
			r=confirm("Are you Sure Want to Delete ?");
         			if(r==true)
         			{
				jQuery.ajax({
								type:"POST",
								url:"ajax.php?f=delete_category",
								datatype:"text",
								data:{this_id:this_id},
								success:function(response)
								{
									$('#get_table').empty();
									$('#get_table').append(response);
								},
								error:function (xhr, ajaxOptions, thrownError){}
								});
					}	
         			else
         			{
         				//do nothing
         			}
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
                        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Category </span>- Details</h4>
                     </div>
                     <div class="heading-elements">
                        <ul class="icons-list">
                           <li><a href="add_categories.php"><i class="fa fa-plus-square" style="font-size: 18px;"></i></a></li>
                          
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
               <div class="content">
						 <div class="panel panel-flat" >
                     <div class="panel-body" >
                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                           <fieldset class="content-group">
                              <legend class="text-bold">Search</legend>
                               	 <label class="control-label col-lg-1" style="padding-top:1%">Filter</label>
							  <div class="col-md-2">
								<input type="text" class="form-control" name="search_filter" id="search" onkeyup="search_category();"  placeholder="Type of Filter"  > 
							  </div> 
                           </fieldset>
                        </form>
                     </div>
                  </div>
                  <!-- Page length options -->
                  <div class="panel panel-flat">
                     <table class="table">
                        <thead>
                           <tr>
                              <th>S No</th>
                              <th>Category</th>
                              <th>Image</th>
                              <th>Priority</th>
                              <th>Edit</th>
                              <th>Delete</th>
                              
                           </tr>
                        </thead>
                        <tbody id="get_table">
                           <?php
							  $i=1;
							  $pageLimit=PAGE_PER_NO*$id1;
                              $musermst_query = "SELECT * FROM categories order by priority desc limit $pageLimit,".PAGE_PER_NO; 
                              $run = mysql_query($musermst_query); 
                              $i=1;
                              while ($row = mysql_fetch_array($run)) 
							  {
									$id = $row['id'];
									$en_id=base64_encode($id);
									
									echo'
									<tr>
										<td>'.$i.'</td>
										<td>'.$row['categories'].'</td>
										<td><img src="../'.$row['image'].'" height="100" width="100"></td>
										<td><input type="text" name="prio_'.$id.'" id="prio_'.$id.'"  value="'.$row["priority"].'" onkeyup="category_priority_update(this.id);"/></td> 
										<td><a href="edit_categories_details.php?id='.$en_id.'"><i class="fa fa-pencil"></i></a></td>
										<td><a href="#" onclick="delete_category(this.id)"  id="'.$id.'"><i class="fa fa-trash-o"></i></a></td>							
									</tr>';
									$i++;
                              	} 
							?>
                        </tbody>
                     </table>
                     <!-- /highlighting rows and columns -->
                     <!-- Column rendering -->
                     <!-- Footer -->
					 <div id="page">
							<?php if(!isset($pre)) {?>
							<pre>
								<?php print_r($content); ?>
							</pre>
							<?php }else{ ?>
									<?php print_r($content); ?>
							<?php } ?>
						</div>
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
         <!-- /page content -->
      </div>
      <!-- /page container -->
   </body>
</html>