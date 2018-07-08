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
$page_query = "select * from zopinvoice order by id asc limit $pageLimit,".PAGE_PER_NO; //select query for viewing users.
$run = mysql_query($page_query); //here run the sql query.
$count=mysql_num_rows($run);
$HTML='';

 $i=$pageLimit + 1;
if($count > 0)
{
	while($row=mysql_fetch_array($run))
								{
									$id=$row['id'];
									$bkid=$row['bookingid'];
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
                                              <a href="'.$files.'">Click</a>
                                            </td>
												
											</tr>
									';
									$i++;
								}
}
?>