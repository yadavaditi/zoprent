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
$id=$_POST['pageId'];
}
else
{
$id='0';
}

$pageLimit=PAGE_PER_NO*$id;
$sql="select * from booking_details where status='finished' order by booked_date ASC limit $pageLimit,".PAGE_PER_NO;
$run = mysql_query($sql); //here run the sql query.
$count=mysql_num_rows($run);
$HTML='';

 $i=$pageLimit + 1;
if($count > 0)
{
	while($row=mysql_fetch_array($run))
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
}
?>