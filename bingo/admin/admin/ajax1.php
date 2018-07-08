<?php
include("../config.php");
date_default_timezone_set('Asia/Calcutta');
if($_GET['f']=="search_category")
	{
		search_category(); 
	}
	if($_GET['f']=="delete_category")
	{
		delete_category(); 
	}
	if($_GET['f']=="category_priority_update")
	{
		category_priority_update(); 
	}
	if($_GET['f']=="delete_vendor")
	{
		delete_vendor(); 
	}
	if($_GET['f']=="search_vendor")
	{
		search_vendor(); 
	}
	if($_GET['f']=="delete_subcategory")
	{
		delete_subcategory(); 
	}
	if($_GET['f']=="sub_category_priority_update")
	{
		sub_category_priority_update(); 
	}
	if($_GET['f']=="city_priority_update")
	{
		city_priority_update(); 
	}
	if($_GET['f']=="filter_sub_category")
	{
		filter_sub_category(); 
	}
	if($_GET['f']=="delete_product")
	{
		delete_product(); 
	}
	if($_GET['f']=="product_priority_update")
	{
		product_priority_update(); 
	}
	if($_GET['f']=="filter_product")
	{
		filter_product(); 
	}
	if($_GET['f']=="filter_category")
	{
		filter_category(); 
	}
	
	if($_GET['f']=="filter_city")
	{
		filter_city(); 
	}
	if($_GET['f']=="delete_city")
	{
		delete_city(); 
	}
	
	if($_GET['f']=="reject_booking")
	{
		reject_booking(); 
	}
	if($_GET['f']=="finish_booking")
	{
		finish_booking(); 
	}
	
	if($_GET['f']=="filter_booking")
	{
		filter_booking(); 
	}
	if($_GET['f']=="filter_rejected_booking")
	{
		filter_rejected_booking(); 
	}
	if($_GET['f']=="filter_finished_booking")
	{
		filter_finished_booking(); 
	}
	
	
function search_category()
	{
		$data=$_POST['data'];
		$sql=mysql_query("SELECT * FROM categories where categories like '%$data%' or priority like '%$data%' order by priority desc");
		$i=1;
		 while ($row = mysql_fetch_array($sql)) 
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
	}
	
	function delete_category()
	{
		$id=$_POST['this_id'];
		$sql=mysql_query("delete from categories where id='$id'");
		$sql=mysql_query("SELECT * FROM categories order by priority desc");
		$i=1;
		 while ($row = mysql_fetch_array($sql)) 
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
	}
	
	
	function category_priority_update()
	{
		$id=$_POST['res_id'];
		$value=$_POST['value'];
		
		$qry=mysql_query("update categories set priority='$value' where id='$id'");	
	}
	function delete_vendor()
	{
		$id=$_POST['this_id'];
		$sql=mysql_query("delete from vendor where id='$id'");
		$sql=mysql_query("SELECT * FROM vendor");
		$i=1;
		 while ($row = mysql_fetch_array($sql)) 
							  {
									$id = $row['id'];
									$en_id=base64_encode($id);
									
									$city_id=$row['vendor_city'];
									$qry=mysql_query("select city_name from city where id='$city_id'");
									$res=mysql_fetch_array($qry);
									$city_name=$res['city_name'];
									
									echo'
									<tr>
										<td>'.$id.'</td>
										<td>'.$row['vendor_name'].'</td>
										<td>'.$row['vendor_number'].'</td>
										<td>'.$city_name.'</td>
										<td><a href="edit_vendor_details.php?id='.$en_id.'"><i class="fa fa-pencil"></i></a></td>
										<td><a href="#" onclick="delete_vendor(this.id)"  id="'.$id.'"><i class="fa fa-trash-o"></i></a></td>							
									</tr>';
									$i++;
                              	} 
	}
	function search_vendor()
	{
		$data=$_POST['data'];
		$sql=mysql_query("SELECT * FROM vendor where vendor_name like '%$data%' or vendor_number like '%$data%'");
		$i=1;
		 while ($row = mysql_fetch_array($sql)) 
							  {
									$id = $row['id'];
									$en_id=base64_encode($id);
									
									$city_id=$row['vendor_city'];
									$qry=mysql_query("select city_name from city where id='$city_id'");
									$res=mysql_fetch_array($qry);
									$city_name=$res['city_name'];
									
									echo'
									<tr>
										<td>'.$id.'</td>
										<td>'.$row['vendor_name'].'</td>
										<td>'.$row['vendor_number'].'</td>
										<td>'.$city_name.'</td>
										<td><a href="edit_vendor_details.php?id='.$en_id.'"><i class="fa fa-pencil"></i></a></td>
										<td><a href="#" onclick="delete_vendor(this.id)"  id="'.$id.'"><i class="fa fa-trash-o"></i></a></td>							
									</tr>';
									$i++;
                              	} 
	}
	function delete_subcategory()
	{
		$id=$_POST['id'];
		
		
		$sql1=mysql_query("SELECT image FROM sub_category where id='$id'");
		$path=mysql_fetch_array($sql1);
		$file="../".$path['image'];
		unlink($file);
		
		
		$sql=mysql_query("delete from sub_category where id='$id'");
		$sql=mysql_query("SELECT * FROM sub_category order by priority desc");
		$i=1;
		 while($row=mysql_fetch_array($sql))
								{
									$id=$row['id'];
									$img=$row['image'];
									$en_id=base64_encode($id);
								
									$m_cat=$row['main_category'];
									$qry=mysql_query("select categories from categories where id='$m_cat'");
									$res=mysql_fetch_array($qry);
									$category=$res['categories'];
									
									echo '
											<tr>
											<td>'.$i.'</td>
											<td>'.$category.'</td>
											<td>'.$row['name'].'</td>
											<td><img src="../'.$img.'" height="100" width="100"></td>
											<td>Rs. '.$row['oneday_price'].'</td>
											<td><input type="text" class="form-control" name="pri_'.$id.'" id="pri_'.$id.'" value='.$row['priority'].' onchange="category_priority_update(this.id);" ></td>
											<td><a href="edit_sub_category.php?id='.$en_id.'"><i class="fa fa-pencil"></i></a></td>							
											<td><a href="#" id="'.$id.'" onclick="delete_sub_category(this.id)"><i class="fa fa-trash-o"></i></a></td>							
											
											</tr>
									';
									$i++;
								} 
	}
	function sub_category_priority_update()
	{
		$id=$_POST['res_id'];
		$value=$_POST['pri'];
		
		$sql=mysql_query("update sub_category set priority='$value' where id='$id'");
		
	}
	function city_priority_update()
	{
		$id=$_POST['res_id'];
		$value=$_POST['pri'];
		
		$sql=mysql_query("update city set priority='$value' where id='$id'");
		
	}
	function filter_sub_category()
	{
		$data=$_POST['data'];
		$sql=mysql_query("SELECT * FROM sub_category where name like '%$data%' or oneday_price like '%$data%' or priority like '%$data%' order by priority desc");
		$i=1;
		 while($row=mysql_fetch_array($sql))
								{
									$id=$row['id'];
									$img=$row['image'];
									$en_id=base64_encode($id);
									
									$m_cat=$row['main_category'];
									
									$qry=mysql_query("select categories from categories where id='$m_cat'");
									$res=mysql_fetch_array($qry);
									$category=$res['categories'];
									
									echo '
											<tr>
											<td>'.$i.'</td>
											<td>'.$category.'</td>
											<td>'.$row['name'].'</td>
											<td><img src="../'.$img.'" height="100" width="100"></td>
											<td>Rs. '.$row['oneday_price'].'</td>
											<td><input type="text" class="form-control" name="pri_'.$id.'" id="pri_'.$id.'" value='.$row['priority'].' onchange="category_priority_update(this.id);" ></td>
											<td><a href="edit_sub_category.php?id='.$en_id.'"><i class="fa fa-pencil"></i></a></td>							
											<td><a href="#" id="'.$id.'" onclick="delete_sub_category(this.id)"><i class="fa fa-trash-o"></i></a></td>							
											
											</tr>
									';
									$i++;
								}
	}
	function delete_product()
	{
		$id=$_POST['id'];
		
		$sql=mysql_query("delete from product_details where id='$id'");
		$sql=mysql_query("SELECT * FROM product_details order by priority desc");
		$i=1;
		 while($row=mysql_fetch_array($sql))
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
											<td>'.$row['qty'].'</td>
											<td><input type="text" class="form-control" name="pri_'.$id.'" id="pri_'.$id.'" value='.$row['priority'].' onchange="category_priority_update(this.id);" ></td>
											<td><a href="edit_product.php?id='.$en_id.'"><i class="fa fa-pencil"></i></a></td>							
											<td><a href="#" id="'.$id.'" onclick="delete_product(this.id)"><i class="fa fa-trash-o"></i></a></td>							
											
											</tr>
									';
									$i++;
								} 
	}
	function product_priority_update()
	{
		$id=$_POST['res_id'];
		$value=$_POST['pri'];
		
		$qry=mysql_query("update product_details set priority='$value' where id='$id'");	
	}
	function filter_product()
	{
		$data=$_POST['data'];
		$sql=mysql_query("SELECT * FROM product_details where vendor_name like '%$data%' or qty like '%$data%' or priority like '%$data%' order by priority desc");
		$i=1;
		 while($row=mysql_fetch_array($sql))
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
											<td>'.$row['qty'].'</td>
											<td><input type="text" class="form-control" name="pri_'.$id.'" id="pri_'.$id.'" value='.$row['priority'].' onchange="category_priority_update(this.id);" ></td>
											<td><a href="edit_product.php?id='.$en_id.'"><i class="fa fa-pencil"></i></a></td>							
											<td><a href="#" id="'.$id.'" onclick="delete_product(this.id)"><i class="fa fa-trash-o"></i></a></td>																		
											</tr>
									';
									$i++;
								}
	}
	function filter_category()
	{
		$data=$_POST['data'];
		$sql=mysql_query("SELECT * FROM sub_category where main_category='$data' order by priority DESC");
		
		$i=1;
		 while($row=mysql_fetch_array($sql))
								{
									$id=$row['id'];
									$img=$row['image'];
									$img=$row['image'];
									$main_category=$row['main_category'];
									
									$sql1=mysql_query("select categories from categories where id='$main_category'");
									$res=mysql_fetch_array($sql1);
									$category=$res['categories'];
									$en_id=base64_encode($id);
								
									
									echo '
											<tr>
											<td>'.$i.'</td>
											<td>'.$category.'</td>
											<td>'.$row['name'].'</td>
											<td><img src="../'.$img.'" height="100" width="100"></td>
											<td>Rs. '.$row['oneday_price'].'</td>
											<td><input type="text" class="form-control" name="pri_'.$id.'" id="pri_'.$id.'" value='.$row['priority'].' onchange="category_priority_update(this.id);" ></td>
											<td><a href="edit_sub_category.php?id='.$en_id.'"><i class="fa fa-pencil"></i></a></td>							
											<td><a href="#" id="'.$id.'" onclick="delete_sub_category(this.id)"><i class="fa fa-trash-o"></i></a></td>							
											
											</tr>
									';
									$i++;
								}
	}
	
	function delete_city()
	{
		$id=$_POST['id'];
		
		$del=mysql_query("delete from city where id='$id'");
		
		$sql=mysql_query("select * from city order by priority DESC");
		$i=1;
		while($row=mysql_fetch_array($sql))
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
	function filter_city()
	{
		$data=$_POST['data'];
		$sql=mysql_query("select * from city where (city_name like '%$data%' or priority like '%$data%') order by priority DESC");
		$i=1;
		while($row=mysql_fetch_array($sql))
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
	function reject_booking()
	{
		$id=$_POST['id'];
		
		$qry=mysql_query("update booking_details set status='rejected' where id='$id'");
		$i=1;
		$sql="select * from booking_details where status='success' order by booked_date ASC";
				$result=mysql_query($sql);
				while($row=mysql_fetch_array($result))
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
									
									
									echo '
											<tr>
											<td>'.$i.'</td>
											
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
											<td>'.$row['address'].'</td>										
											<td>Rs. '.$row['total_price'].'</td>
											<td><input type="button"  class="btn btn-primary" value="Reject" name="reject" id="'.$id.'" onclick="reject_booking(this.id);" > </td>
											<td><input type="button"  class="btn btn-primary" value="Finished" name="finish" id="'.$id.'" onclick="finish_booking(this.id);" > </td>	
											</tr>
									';
									$i++;
								}
	}
	function finish_booking()
	{
		$id=$_POST['id'];
		
		$qry=mysql_query("update booking_details set status='finished' where id='$id'");
		$i=1;
		$sql="select * from booking_details where status='success' order by booked_date ASC";
				$result=mysql_query($sql);
				while($row=mysql_fetch_array($result))
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
									
									
									echo '
											<tr>
											<td>'.$i.'</td>
											
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
											<td>'.$row['address'].'</td>										
											<td>Rs. '.$row['total_price'].'</td>
											<td><input type="button"  class="btn btn-primary" value="Reject" name="reject" id="'.$id.'" onclick="reject_booking(this.id);" > </td>
											<td><input type="button"  class="btn btn-primary" value="Finished" name="finish" id="'.$id.'" onclick="finish_booking(this.id);" > </td>	
											</tr>
									';
									$i++;
								}
	}
	
	function filter_booking()
	{
		$data=$_POST['data'];
		$i=1;
		$sql=mysql_query("select * from booking_details where status='success' and (booking_id like '%$data%' or booked_date like '%$data%' or name like '%$data%' or email like '%$data%' or phone like '%$data%' ) order by booked_date asc");
		while($row=mysql_fetch_array($sql))
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
									
									
									echo '
											<tr>
											<td>'.$i.'</td>
											<td>'.$row['booking_id'].'</td>
											<td>'.$row['name'].'</td>
											<td>'.$row['phone'].'</td>
											<td>'.$new_date.'</td>
											<td>'.$new_time.'</td>
											<td>'.$pro_name.'</td>
											<td title="Vendor Name">'.$ven_name.'</td>
											<td title="Vendor Location">'.$ven_loc.'</td>
											<td>'.$from_date.'</td>
											<td>'.$to_date.'</td>
											<td>'.$row['address'].'</td>										
											<td>Rs. '.$row['total_price'].'</td>
											<td><input type="button"  class="btn btn-primary" value="Reject" name="reject" id="'.$id.'" onclick="reject_booking(this.id);" > </td>
											<td><input type="button"  class="btn btn-primary" value="Finished" name="finish" id="'.$id.'" onclick="finish_booking(this.id);" > </td>	
											</tr>
									';
									$i++;
								}
		
		
	}
	function filter_rejected_booking()
	{
		$data=$_POST['data'];
		$i=1;
		$sql=mysql_query("select * from booking_details where status='rejected' and (booking_id like '%$data%' or booked_date like '%$data%' or name like '%$data%' or email like '%$data%' or phone like '%$data%' ) order by booked_date asc");
		while($row=mysql_fetch_array($sql))
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
									
									
									echo '
											<tr>
											<td>'.$i.'</td>
											<td>'.$row['booking_id'].'</td>
											<td>'.$row['name'].'</td>
											<td>'.$row['phone'].'</td>
											<td>'.$new_date.'</td>
											<td>'.$new_time.'</td>
											<td>'.$pro_name.'</td>
											<td title="Vendor Name">'.$ven_name.'</td>
											<td title="Vendor Location">'.$ven_loc.'</td>
											<td>'.$from_date.'</td>
											<td>'.$to_date.'</td>
											<td>'.$row['address'].'</td>										
											<td>Rs. '.$row['total_price'].'</td>
											</tr>
									';
									$i++;
								}
	}
	function filter_finished_booking()
	{
		$data=$_POST['data'];
		$i=1;
		$sql=mysql_query("select * from booking_details where status='finished' and (booking_id like '%$data%' or booked_date like '%$data%' or name like '%$data%' or email like '%$data%' or phone like '%$data%' ) order by booked_date asc");
		while($row=mysql_fetch_array($sql))
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
									
									
									echo '
											<tr>
											<td>'.$i.'</td>
											<td>'.$row['booking_id'].'</td>
											<td>'.$row['name'].'</td>
											<td>'.$row['phone'].'</td>
											<td>'.$new_date.'</td>
											<td>'.$new_time.'</td>
											<td>'.$pro_name.'</td>
											<td title="Vendor Name">'.$ven_name.'</td>
											<td title="Vendor Location">'.$ven_loc.'</td>
											<td>'.$from_date.'</td>
											<td>'.$to_date.'</td>
											<td>'.$row['address'].'</td>										
											<td>Rs. '.$row['total_price'].'</td>
											</tr>
									';
									$i++;
								}
	}
?>
