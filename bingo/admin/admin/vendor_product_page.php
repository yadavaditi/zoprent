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
$id=$_POST['pageId'];
}
else
{
$id='0';
}

$pageLimit=PAGE_PER_NO*$id;
$page_query = "select * from product_details order by priority desc limit $pageLimit,".PAGE_PER_NO; //select query for viewing users.
$run = mysql_query($page_query); //here run the sql query.
$count=mysql_num_rows($run);
$HTML='';

 $i=$pageLimit + 1;
if($count > 0)
{
	while($row=mysql_fetch_array($run))
								{
									$id=$row['id'];
									$vendor_id=$row['vendor_name'];
									$sub_id=$row['sub_category'];
									
									
									$sql1=mysql_query("select vendor_name from vendor where id='$vendor_id'");
									$res=mysql_fetch_array($sql1);
									$name=$res['vendor_name'];
									$sql2=mysql_query("select name from sub_category where id='$sub_id'");
									$res2=mysql_fetch_array($sql2);
									$sub_name=$res2['name'];
									$en_id=base64_encode($id);
								
									
									echo '
											<tr>
											<td>'.$i.'</td>
											<td>'.$vendor_id.'</td>
											<td>'.$sub_name.'</td>
											<td>Rs. '.$row['oneday_price'].'</td>
											<td>Rs. '.$row['weekend'].'</td>
											<td>Rs. '.$row['monthly'].'</td>
											<td>'.$row['qty'].'</td>
											<td><input type="text" class="form-control" name="pri_'.$id.'" id="pri_'.$id.'" value='.$row['priority'].' onchange="category_priority_update(this.id);" ></td>
											<td><a href="edit_product.php?id='.$en_id.'"><i class="fa fa-pencil"></i></a></td>							
											<td><a href="#" id="'.$id.'" onclick="delete_product(this.id)"><i class="fa fa-trash-o"></i></a></td>							
											
											</tr>
									';
									$i++;
								}
}
?>