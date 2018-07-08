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
$page_query = "select * from city order by priority desc limit $pageLimit,".PAGE_PER_NO; //select query for viewing users.
$run = mysql_query($page_query); //here run the sql query.
$count=mysql_num_rows($run);
$HTML='';

 $i=$pageLimit + 1;
if($count > 0)
{
	while($row=mysql_fetch_array($run))
								{
									$id=$row['id'];
									$en_id=base64_encode($id);
									$city_name=$row['city_name'];
									$img=$row['image'];
								
									echo '
											<tr>
											<td>'.$i.'</td>
											<td>'.$city_name.'</td>
											<td><img src="../'.$img.'" height="100" width="100"></td>
											<td><input type="text" class="form-control" name="pri_'.$id.'" id="pri_'.$id.'" value='.$row['priority'].' onchange="city_priority_update(this.id);" ></td>
											<td><a href="edit_city.php?id='.$en_id.'"><i class="fa fa-pencil"></i></a></td>							
											<td><a href="#" id="'.$id.'" onclick="delete_city(this.id)"><i class="fa fa-trash-o"></i></a></td>							
											</tr>
									';
									$i++;
								}
}
?>