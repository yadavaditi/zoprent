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
	if($_GET['f']=="search_bike")
	{
		search_bike(); 
	}
	if($_GET['f']=="search_ahmedabad")
	{
		search_ahmedabad(); 
	}
	if($_GET['f']=="search_hyd")
	{
		search_hyd(); 
	}
	if($_GET['f']=="search_udaipur")
	{
		search_udaipur(); 
	}
	if($_GET['f']=="search_shimla")
	{
		search_shimla(); 
	}
	if($_GET['f']=="search_rishikesh")
	{
		search_rishikesh(); 
	}
	if($_GET['f']=="search_jaipur")
	{
		search_jaipur(); 
	}
	if($_GET['f']=="search_ladakh")
	{
		search_ladakh(); 
	}
	if($_GET['f']=="search_haridwar")
	{
		search_haridwar(); 
	}
	if($_GET['f']=="search_manali")
	{
		search_manali(); 
	}
	if($_GET['f']=="search_mussoorie")
	{
		search_mussoorie(); 
	}
	if($_GET['f']=="search_mumbai")
	{
		search_mumbai(); 
	}
	if($_GET['f']=="search_mysore")
	{
		search_mysore(); 
	}
	if($_GET['f']=="search_pune")
	{
		search_pune(); 
	}
	if($_GET['f']=="search_ooty")
	{
		search_ooty(); 
	}
	if($_GET['f']=="search_pondi")
	{
		search_pondi(); 
	}
	if($_GET['f']=="search_andaman")
	{
		search_andaman(); 
	}
	if($_GET['f']=="search_dehradun")
	{
		search_dehradun(); 
	}
	if($_GET['f']=="search_delhi")
	{
		search_delhi(); 
	}
	if($_GET['f']=="search_goa")
	{
		search_goa(); 
	}
	if($_GET['f']=="search_chandigarh")
	{
		search_chandigarh(); 
	}
	if($_GET['f']=="search_car")
	{
		search_car(); 
	}
	if($_GET['f']=="search_carahmedabad")
	{
		search_carahmedabad(); 
	}
	if($_GET['f']=="search_carudaipur")
	{
		search_carudaipur(); 
	}
	if($_GET['f']=="search_cargoa")
	{
		search_cargoa(); 
	}
	if($_GET['f']=="search_carpune")
	{
		search_carpune(); 
	}
	if($_GET['f']=="search_carpondi")
	{
		search_carpondi(); 
	}
	if($_GET['f']=="search_carjaipur")
	{
		search_carjaipur(); 
	}
	if($_GET['f']=="search_carandaman")
	{
		search_carandaman(); 
	}
	if($_GET['f']=="search_carmanali")
	{
		search_carmanali(); 
	}
	if($_GET['f']=="search_carmumbai")
	{
		search_carmumbai(); 
	}
	if($_GET['f']=="search_carchandigarh")
	{
		search_carchandigarh(); 
	}
	if($_GET['f']=="search_cardelhi")
	{
		search_cardelhi(); 
	}
	if($_GET['f']=="search_carladakh")
	{
		search_carladakh(); 
	}
	if($_GET['f']=="search_carhyderabad")
	{
		search_carhyderabad(); 
	}
	if($_GET['f']=="search_carharidwar")
	{
		search_carharidwar(); 
	}
	if($_GET['f']=="search_carshimla")
	{
		search_carshimla(); 
	}
	if($_GET['f']=="search_carrishikesh")
	{
		search_carrishikesh(); 
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
	if($_GET['f']=="filters_subs_categorys")
	{
		filters_subs_categorys(); 
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
	if($_GET['f']=="search_agra")
	{
		search_agra(); 
	}



	function search_agra()
	{
		$data=$_POST['data'];
$sql=mysql_query("SELECT a.bikename, a.price_wkd, a.price_wknd, a.deposit, a.dlimit, b.name, 
b.address, b.contact FROM fleet a, vendors b WHERE a.vid = b.vid AND CONCAT_WS('', a.bikename,b.address,b.name) 
LIKE '%$data%' AND b.city = 'agra'");	//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
		 while ($row = mysql_fetch_array($sql)) 
							  {
									
									
									echo'
									<tr>
									    <td>'.$row['name'].'</td>
										<td>'.$row['bikename'].'</td>
										<td>'.$row['price_wkd'].'</td>
										<td>'.$row['price_wknd'].'</td>
										<td>'.$row['address'].'</td>
										<td>'.$row['contact'].'</td>
										<td>'.$row['deposit'].'</td> 
										<td>'.$row['dlimit'].'</td>
										
										
									</tr>';
                              	
	}
	}
	function search_cargoa()
	{
	$data=$_POST['data'];
$sql=mysql_query("SELECT a.carname, a.price_wkd,a.price_wknd,a.deposit, a.dlimit, b.name, b.address, b.contact from 
carfleet a ,vendors b where a.vid = b.vid and CONCAT_WS('', a.carname,b.address,b.name) 
LIKE '%$data%' and b.city='goa'");
		//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
		 while ($row = mysql_fetch_array($sql)) 
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
	}
	function search_carmumbai()
	{
	$data=$_POST['data'];
$sql=mysql_query("SELECT a.carname, a.price_wkd,a.price_wknd,a.deposit, a.dlimit, b.name, b.address, b.contact from 
carfleet a ,vendors b where a.vid = b.vid and CONCAT_WS('', a.carname,b.address,b.name) 
LIKE '%$data%' and b.city='mumbai'");
		//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
		 while ($row = mysql_fetch_array($sql)) 
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
	}
	function search_carpondi()
	{
	$data=$_POST['data'];
$sql=mysql_query("SELECT a.carname, a.price_wkd,a.price_wknd,a.deposit, a.dlimit, b.name, b.address, b.contact from 
carfleet a ,vendors b where a.vid = b.vid and CONCAT_WS('', a.carname,b.address,b.name) 
LIKE '%$data%' and b.city='pondicherry'");
		//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
		 while ($row = mysql_fetch_array($sql)) 
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
	}
	function search_carshimla()
	{
	$data=$_POST['data'];
$sql=mysql_query("SELECT a.carname, a.price_wkd,a.price_wknd,a.deposit, a.dlimit, b.name, b.address, b.contact from 
carfleet a ,vendors b where a.vid = b.vid and CONCAT_WS('', a.carname,b.address,b.name) 
LIKE '%$data%' and b.city='shimla'");
		//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
		 while ($row = mysql_fetch_array($sql)) 
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
	}
	function search_carudaipur()
	{
	$data=$_POST['data'];
$sql=mysql_query("SELECT a.carname, a.price_wkd,a.price_wknd,a.deposit, a.dlimit, b.name, b.address, b.contact from 
carfleet a ,vendors b where a.vid = b.vid and CONCAT_WS('', a.carname,b.address,b.name) 
LIKE '%$data%' and b.city='udaipur'");
		//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
		 while ($row = mysql_fetch_array($sql)) 
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
	}
	function search_carladakh()
	{
	$data=$_POST['data'];
$sql=mysql_query("SELECT a.carname, a.price_wkd,a.price_wknd,a.deposit, a.dlimit, b.name, b.address, b.contact from 
carfleet a ,vendors b where a.vid = b.vid and CONCAT_WS('', a.carname,b.address,b.name) 
LIKE '%$data%' and b.city='ladakh'");
		//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
		 while ($row = mysql_fetch_array($sql)) 
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
	}
		function search_carmanali()
	{
	$data=$_POST['data'];
$sql=mysql_query("SELECT a.carname, a.price_wkd,a.price_wknd,a.deposit, a.dlimit, b.name, b.address, b.contact from 
carfleet a ,vendors b where a.vid = b.vid and CONCAT_WS('', a.carname,b.address,b.name) 
LIKE '%$data%' and b.city='manali'");
		//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
		 while ($row = mysql_fetch_array($sql)) 
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
	}
	
	function search_carpune()
	{
	$data=$_POST['data'];
$sql=mysql_query("SELECT a.carname, a.price_wkd,a.price_wknd,a.deposit, a.dlimit, b.name, b.address, b.contact from 
carfleet a ,vendors b where a.vid = b.vid and CONCAT_WS('', a.carname,b.address,b.name) 
LIKE '%$data%' and b.city='pune'");
		//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
		 while ($row = mysql_fetch_array($sql)) 
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
	}
	function search_carrishikesh()
	{
	$data=$_POST['data'];
$sql=mysql_query("SELECT a.carname, a.price_wkd,a.price_wknd,a.deposit, a.dlimit, b.name, b.address, b.contact from 
carfleet a ,vendors b where a.vid = b.vid and CONCAT_WS('', a.carname,b.address,b.name) 
LIKE '%$data%' and b.city='rishikesh'");
		//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
		 while ($row = mysql_fetch_array($sql)) 
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
	}
	
		function search_carjaipur()
	{
	$data=$_POST['data'];
$sql=mysql_query("SELECT a.carname, a.price_wkd,a.price_wknd,a.deposit, a.dlimit, b.name, b.address, b.contact from 
carfleet a ,vendors b where a.vid = b.vid and CONCAT_WS('', a.carname,b.address,b.name) 
LIKE '%$data%' and b.city='jaipur'");
		//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
		 while ($row = mysql_fetch_array($sql)) 
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
	}
	function search_carandaman()
	{
	$data=$_POST['data'];
$sql=mysql_query("SELECT a.carname, a.price_wkd,a.price_wknd,a.deposit, a.dlimit, b.name, b.address, b.contact from 
carfleet a ,vendors b where a.vid = b.vid and CONCAT_WS('', a.carname,b.address,b.name) 
LIKE '%$data%' and b.city='andaman'");
		//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
		 while ($row = mysql_fetch_array($sql)) 
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
	}
	function search_carchandigarh()
	{
	$data=$_POST['data'];
$sql=mysql_query("SELECT a.carname, a.price_wkd,a.price_wknd,a.deposit, a.dlimit, b.name, b.address, b.contact from 
carfleet a ,vendors b where a.vid = b.vid and CONCAT_WS('', a.carname,b.address,b.name) 
LIKE '%$data%' and b.city='chandigarh'");
		//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
		 while ($row = mysql_fetch_array($sql)) 
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
	}
	function search_cardelhi()
	{
	$data=$_POST['data'];
$sql=mysql_query("SELECT a.carname, a.price_wkd,a.price_wknd,a.deposit, a.dlimit, b.name, b.address, b.contact from 
carfleet a ,vendors b where a.vid = b.vid and CONCAT_WS('', a.carname,b.address,b.name) 
LIKE '%$data%' and b.city='delhi'");
		//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
		 while ($row = mysql_fetch_array($sql)) 
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
	}
	function search_carhyderabad()
	{
	$data=$_POST['data'];
$sql=mysql_query("SELECT a.carname, a.price_wkd,a.price_wknd,a.deposit, a.dlimit, b.name, b.address, b.contact from 
carfleet a ,vendors b where a.vid = b.vid and CONCAT_WS('', a.carname,b.address,b.name) 
LIKE '%$data%' and b.city='hyderabad'");
		//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
		 while ($row = mysql_fetch_array($sql)) 
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
	}
	function search_carharidwar()
	{
	$data=$_POST['data'];
$sql=mysql_query("SELECT a.carname, a.price_wkd,a.price_wknd,a.deposit, a.dlimit, b.name, b.address, b.contact from 
carfleet a ,vendors b where a.vid = b.vid and CONCAT_WS('', a.carname,b.address,b.name) 
LIKE '%$data%' and b.city='haridwar'");
		//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
		 while ($row = mysql_fetch_array($sql)) 
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
	
		function search_bike()
	{
		$data=$_POST['data'];
$sql=mysql_query("SELECT a.bikename, a.price_wkd, a.price_wknd, a.deposit, a.dlimit, b.name, 
b.address, b.contact FROM fleet a, vendors b WHERE a.vid = b.vid AND CONCAT_WS('', a.bikename,b.address,b.name) 
LIKE '%$data%' AND b.city = 'bengaluru'");	//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
		 while ($row = mysql_fetch_array($sql)) 
							  {
									
									
									echo'
									<tr>
									    <td>'.$row['name'].'</td>
										<td>'.$row['bikename'].'</td>
										<td>'.$row['price_wkd'].'</td>
										<td>'.$row['price_wknd'].'</td>
										<td>'.$row['address'].'</td>
										<td>'.$row['contact'].'</td>
										<td>'.$row['deposit'].'</td> 
										<td>'.$row['dlimit'].'</td>
										
										
									</tr>';
                              	
	}
	}
	function search_goa()
	{
		$data=$_POST['data'];
$sql=mysql_query("SELECT a.bikename, a.price_wkd, a.price_wknd, a.deposit, a.dlimit, b.name, 
b.address, b.contact FROM fleet a, vendors b WHERE a.vid = b.vid AND CONCAT_WS('', a.bikename,b.address,b.name) 
LIKE '%$data%' AND b.city = 'goa'");	//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
		 while ($row = mysql_fetch_array($sql)) 
							  {
									
									
									echo'
									<tr>
									    <td>'.$row['name'].'</td>
										<td>'.$row['bikename'].'</td>
										<td>'.$row['price_wkd'].'</td>
										<td>'.$row['price_wknd'].'</td>
										<td>'.$row['address'].'</td>
										<td>'.$row['contact'].'</td>
										<td>'.$row['deposit'].'</td> 
										<td>'.$row['dlimit'].'</td>
										
										
									</tr>';
                              	
	}
	}
	
	function search_haridwar()
	{
		$data=$_POST['data'];
$sql=mysql_query("SELECT a.bikename, a.price_wkd, a.price_wknd, a.deposit, a.dlimit, b.name, 
b.address, b.contact FROM fleet a, vendors b WHERE a.vid = b.vid AND CONCAT_WS('', a.bikename,b.address,b.name) 
LIKE '%$data%' AND b.city = 'haridwar'");	//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
		 while ($row = mysql_fetch_array($sql))  
							  {
									
									
									echo'
									<tr>
									    <td>'.$row['name'].'</td>
										<td>'.$row['bikename'].'</td>
										<td>'.$row['price_wkd'].'</td>
										<td>'.$row['price_wknd'].'</td>
										<td>'.$row['address'].'</td>
										<td>'.$row['contact'].'</td>
										<td>'.$row['deposit'].'</td> 
										<td>'.$row['dlimit'].'</td>
										
										
									</tr>';
                              	
	}
	}
	function search_mussoorie()
	{
		$data=$_POST['data'];
$sql=mysql_query("SELECT a.bikename, a.price_wkd, a.price_wknd, a.deposit, a.dlimit, b.name, 
b.address, b.contact FROM fleet a, vendors b WHERE a.vid = b.vid AND CONCAT_WS('', a.bikename,b.address,b.name) 
LIKE '%$data%' AND b.city = 'mussoorie'");	//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
		 while ($row = mysql_fetch_array($sql))  
							  {
									
									
									echo'
									<tr>
									    <td>'.$row['name'].'</td>
										<td>'.$row['bikename'].'</td>
										<td>'.$row['price_wkd'].'</td>
										<td>'.$row['price_wknd'].'</td>
										<td>'.$row['address'].'</td>
										<td>'.$row['contact'].'</td>
										<td>'.$row['deposit'].'</td> 
										<td>'.$row['dlimit'].'</td>
										
										
									</tr>';
                              	
	}
	}
	function search_hyd()
	{
		$data=$_POST['data'];
$sql=mysql_query("SELECT a.bikename, a.price_wkd, a.price_wknd, a.deposit, a.dlimit, b.name, 
b.address, b.contact FROM fleet a, vendors b WHERE a.vid = b.vid AND CONCAT_WS('', a.bikename,b.address,b.name) 
LIKE '%$data%' AND b.city = 'hyderabad'");	//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
		 while ($row = mysql_fetch_array($sql))  
							  {
									
									
									echo'
									<tr>
									    <td>'.$row['name'].'</td>
										<td>'.$row['bikename'].'</td>
										<td>'.$row['price_wkd'].'</td>
										<td>'.$row['price_wknd'].'</td>
										<td>'.$row['address'].'</td>
										<td>'.$row['contact'].'</td>
										<td>'.$row['deposit'].'</td> 
										<td>'.$row['dlimit'].'</td>
										
										
									</tr>';
                              	
	}
	}
	
	function search_andaman()
	{
		$data=$_POST['data'];
$sql=mysql_query("SELECT a.bikename, a.price_wkd, a.price_wknd, a.deposit, a.dlimit, b.name, 
b.address, b.contact FROM fleet a, vendors b WHERE a.vid = b.vid AND CONCAT_WS('', a.bikename,b.address,b.name) 
LIKE '%$data%' AND b.city = 'andaman'");	//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
		 while ($row = mysql_fetch_array($sql)) 
							  {
									
									
									echo'
									<tr>
									    <td>'.$row['name'].'</td>
										<td>'.$row['bikename'].'</td>
										<td>'.$row['price_wkd'].'</td>
										<td>'.$row['price_wknd'].'</td>
										<td>'.$row['address'].'</td>
										<td>'.$row['contact'].'</td>
										<td>'.$row['deposit'].'</td> 
										<td>'.$row['dlimit'].'</td>
										
										
									</tr>';
                              	
	}
	}
	function search_manali()
	{
		$data=$_POST['data'];
$sql=mysql_query("SELECT a.bikename, a.price_wkd, a.price_wknd, a.deposit, a.dlimit, b.name, 
b.address, b.contact FROM fleet a, vendors b WHERE a.vid = b.vid AND CONCAT_WS('', a.bikename,b.address,b.name) 
LIKE '%$data%' AND b.city = 'manali'");	//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
		 while ($row = mysql_fetch_array($sql)) 
							  {
									
									
									echo'
									<tr>
									    <td>'.$row['name'].'</td>
										<td>'.$row['bikename'].'</td>
										<td>'.$row['price_wkd'].'</td>
										<td>'.$row['price_wknd'].'</td>
										<td>'.$row['address'].'</td>
										<td>'.$row['contact'].'</td>
										<td>'.$row['deposit'].'</td> 
										<td>'.$row['dlimit'].'</td>
										
										
									</tr>';
                              	
	}
	}
	function search_mumbai()
	{
		$data=$_POST['data'];
$sql=mysql_query("SELECT a.bikename, a.price_wkd, a.price_wknd, a.deposit, a.dlimit, b.name, 
b.address, b.contact FROM fleet a, vendors b WHERE a.vid = b.vid AND CONCAT_WS('', a.bikename,b.address,b.name) 
LIKE '%$data%' AND b.city = 'mumbai'");	//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
		 while ($row = mysql_fetch_array($sql)) 
							  {
									
									
									echo'
									<tr>
									    <td>'.$row['name'].'</td>
										<td>'.$row['bikename'].'</td>
										<td>'.$row['price_wkd'].'</td>
										<td>'.$row['price_wknd'].'</td>
										<td>'.$row['address'].'</td>
										<td>'.$row['contact'].'</td>
										<td>'.$row['deposit'].'</td> 
										<td>'.$row['dlimit'].'</td>
										
										
									</tr>';
                              	
	}
	}
	function search_ooty()
	{
		$data=$_POST['data'];
$sql=mysql_query("SELECT a.bikename, a.price_wkd, a.price_wknd, a.deposit, a.dlimit, b.name, 
b.address, b.contact FROM fleet a, vendors b WHERE a.vid = b.vid AND CONCAT_WS('', a.bikename,b.address,b.name) 
LIKE '%$data%' AND b.city = 'ooty'");	//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
		 while ($row = mysql_fetch_array($sql)) 
							  {
									
									
									echo'
									<tr>
									    <td>'.$row['name'].'</td>
										<td>'.$row['bikename'].'</td>
										<td>'.$row['price_wkd'].'</td>
										<td>'.$row['price_wknd'].'</td>
										<td>'.$row['address'].'</td>
										<td>'.$row['contact'].'</td>
										<td>'.$row['deposit'].'</td> 
										<td>'.$row['dlimit'].'</td>
										
										
									</tr>';
                              	
	}
	}
	function search_pondi()
	{
		$data=$_POST['data'];
$sql=mysql_query("SELECT a.bikename, a.price_wkd, a.price_wknd, a.deposit, a.dlimit, b.name, 
b.address, b.contact FROM fleet a, vendors b WHERE a.vid = b.vid AND CONCAT_WS('', a.bikename,b.address,b.name) 
LIKE '%$data%' AND b.city = 'pondicherry'");	//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
		 while ($row = mysql_fetch_array($sql)) 
							  {
									
									
									echo'
									<tr>
									    <td>'.$row['name'].'</td>
										<td>'.$row['bikename'].'</td>
										<td>'.$row['price_wkd'].'</td>
										<td>'.$row['price_wknd'].'</td>
										<td>'.$row['address'].'</td>
										<td>'.$row['contact'].'</td>
										<td>'.$row['deposit'].'</td> 
										<td>'.$row['dlimit'].'</td>
										
										
									</tr>';
                              	
	}
	}
	function search_rishikesh()
	{
		$data=$_POST['data'];
$sql=mysql_query("SELECT a.bikename, a.price_wkd, a.price_wknd, a.deposit, a.dlimit, b.name, 
b.address, b.contact FROM fleet a, vendors b WHERE a.vid = b.vid AND CONCAT_WS('', a.bikename,b.address,b.name) 
LIKE '%$data%' AND b.city = 'rishikesh'");	//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
		 while ($row = mysql_fetch_array($sql)) 
							  {
									
									
									echo'
									<tr>
									    <td>'.$row['name'].'</td>
										<td>'.$row['bikename'].'</td>
										<td>'.$row['price_wkd'].'</td>
										<td>'.$row['price_wknd'].'</td>
										<td>'.$row['address'].'</td>
										<td>'.$row['contact'].'</td>
										<td>'.$row['deposit'].'</td> 
										<td>'.$row['dlimit'].'</td>
										
										
									</tr>';
                              	
	}
	}
	function search_shimla()
	{
		$data=$_POST['data'];
$sql=mysql_query("SELECT a.bikename, a.price_wkd, a.price_wknd, a.deposit, a.dlimit, b.name, 
b.address, b.contact FROM fleet a, vendors b WHERE a.vid = b.vid AND CONCAT_WS('', a.bikename,b.address,b.name) 
LIKE '%$data%' AND b.city = 'shimla'");	//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
		 while ($row = mysql_fetch_array($sql)) 
							  {
									
									
									echo'
									<tr>
									    <td>'.$row['name'].'</td>
										<td>'.$row['bikename'].'</td>
										<td>'.$row['price_wkd'].'</td>
										<td>'.$row['price_wknd'].'</td>
										<td>'.$row['address'].'</td>
										<td>'.$row['contact'].'</td>
										<td>'.$row['deposit'].'</td> 
										<td>'.$row['dlimit'].'</td>
										
										
									</tr>';
                              	
	}
	}
	function search_udaipur()
	{
		$data=$_POST['data'];
$sql=mysql_query("SELECT a.bikename, a.price_wkd, a.price_wknd, a.deposit, a.dlimit, b.name, 
b.address, b.contact FROM fleet a, vendors b WHERE a.vid = b.vid AND CONCAT_WS('', a.bikename,b.address,b.name) 
LIKE '%$data%' AND b.city = 'udaipur'");	//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
		 while ($row = mysql_fetch_array($sql)) 
							  {
									
									
									echo'
									<tr>
									    <td>'.$row['name'].'</td>
										<td>'.$row['bikename'].'</td>
										<td>'.$row['price_wkd'].'</td>
										<td>'.$row['price_wknd'].'</td>
										<td>'.$row['address'].'</td>
										<td>'.$row['contact'].'</td>
										<td>'.$row['deposit'].'</td> 
										<td>'.$row['dlimit'].'</td>
										
										
									</tr>';
                              	
	}
	}
	function search_pune()
	{
		$data=$_POST['data'];
$sql=mysql_query("SELECT a.bikename, a.price_wkd, a.price_wknd, a.deposit, a.dlimit, b.name, 
b.address, b.contact FROM fleet a, vendors b WHERE a.vid = b.vid AND CONCAT_WS('', a.bikename,b.address,b.name) 
LIKE '%$data%' AND b.city = 'pune'");	//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
		 while ($row = mysql_fetch_array($sql)) 
							  {
									
									
									echo'
									<tr>
									    <td>'.$row['name'].'</td>
										<td>'.$row['bikename'].'</td>
										<td>'.$row['price_wkd'].'</td>
										<td>'.$row['price_wknd'].'</td>
										<td>'.$row['address'].'</td>
										<td>'.$row['contact'].'</td>
										<td>'.$row['deposit'].'</td> 
										<td>'.$row['dlimit'].'</td>
										
										
									</tr>';
                              	
	}
	}
	function search_mysore()
	{
		$data=$_POST['data'];
$sql=mysql_query("SELECT a.bikename, a.price_wkd, a.price_wknd, a.deposit, a.dlimit, b.name, 
b.address, b.contact FROM fleet a, vendors b WHERE a.vid = b.vid AND CONCAT_WS('', a.bikename,b.address,b.name) 
LIKE '%$data%' AND b.city = 'mysore'");	//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
		 while ($row = mysql_fetch_array($sql)) 
							  {
									
									
									echo'
									<tr>
									    <td>'.$row['name'].'</td>
										<td>'.$row['bikename'].'</td>
										<td>'.$row['price_wkd'].'</td>
										<td>'.$row['price_wknd'].'</td>
										<td>'.$row['address'].'</td>
										<td>'.$row['contact'].'</td>
										<td>'.$row['deposit'].'</td> 
										<td>'.$row['dlimit'].'</td>
										
										
									</tr>';
                              	
	}
	}
	function search_chandigarh()
	{
		$data=$_POST['data'];
$sql=mysql_query("SELECT a.bikename, a.price_wkd, a.price_wknd, a.deposit, a.dlimit, b.name, 
b.address, b.contact FROM fleet a, vendors b WHERE a.vid = b.vid AND CONCAT_WS('', a.bikename,b.address,b.name) 
LIKE '%$data%' AND b.city = 'chandigarh'");	//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
		 while ($row = mysql_fetch_array($sql)) 
							  {
									
									
									echo'
									<tr>
									    <td>'.$row['name'].'</td>
										<td>'.$row['bikename'].'</td>
										<td>'.$row['price_wkd'].'</td>
										<td>'.$row['price_wknd'].'</td>
										<td>'.$row['address'].'</td>
										<td>'.$row['contact'].'</td>
										<td>'.$row['deposit'].'</td> 
										<td>'.$row['dlimit'].'</td>
										
										
									</tr>';
                              	
	}
	}
	function search_jaipur()
	{
		$data=$_POST['data'];
$sql=mysql_query("SELECT a.bikename, a.price_wkd, a.price_wknd, a.deposit, a.dlimit, b.name, 
b.address, b.contact FROM fleet a, vendors b WHERE a.vid = b.vid AND CONCAT_WS('', a.bikename,b.address,b.name) 
LIKE '%$data%' AND b.city = 'jaipur'");	//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
		 while ($row = mysql_fetch_array($sql)) 
							  {
									
									
									echo'
									<tr>
									    <td>'.$row['name'].'</td>
										<td>'.$row['bikename'].'</td>
										<td>'.$row['price_wkd'].'</td>
										<td>'.$row['price_wknd'].'</td>
										<td>'.$row['address'].'</td>
										<td>'.$row['contact'].'</td>
										<td>'.$row['deposit'].'</td> 
										<td>'.$row['dlimit'].'</td>
										
										
									</tr>';
                              	
	}
	}
	function search_ladakh()
	{
		$data=$_POST['data'];
$sql=mysql_query("SELECT a.bikename, a.price_wkd, a.price_wknd, a.deposit, a.dlimit, b.name, 
b.address, b.contact FROM fleet a, vendors b WHERE a.vid = b.vid AND CONCAT_WS('', a.bikename,b.address,b.name) 
LIKE '%$data%' AND b.city = 'ladakh'");	//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
		 while ($row = mysql_fetch_array($sql)) 
							  {
									
									
									echo'
									<tr>
									    <td>'.$row['name'].'</td>
										<td>'.$row['bikename'].'</td>
										<td>'.$row['price_wkd'].'</td>
										<td>'.$row['price_wknd'].'</td>
										<td>'.$row['address'].'</td>
										<td>'.$row['contact'].'</td>
										<td>'.$row['deposit'].'</td> 
										<td>'.$row['dlimit'].'</td>
										
										
									</tr>';
                              	
	}
	}
	
	function search_delhi()
	{
		$data=$_POST['data'];
$sql=mysql_query("SELECT a.bikename, a.price_wkd, a.price_wknd, a.deposit, a.dlimit, b.name, 
b.address, b.contact FROM fleet a, vendors b WHERE a.vid = b.vid AND CONCAT_WS('', a.bikename,b.address,b.name) 
LIKE '%$data%' AND b.city = 'delhi'");	//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
		 while ($row = mysql_fetch_array($sql)) 
							  {
									
									
									echo'
									<tr>
									    <td>'.$row['name'].'</td>
										<td>'.$row['bikename'].'</td>
										<td>'.$row['price_wkd'].'</td>
										<td>'.$row['price_wknd'].'</td>
										<td>'.$row['address'].'</td>
										<td>'.$row['contact'].'</td>
										<td>'.$row['deposit'].'</td> 
										<td>'.$row['dlimit'].'</td>
										
										
									</tr>';
                              	
	}
	}
	
	function search_dehradun()
	{
		$data=$_POST['data'];
$sql=mysql_query("SELECT a.bikename, a.price_wkd, a.price_wknd, a.deposit, a.dlimit, b.name, 
b.address, b.contact FROM fleet a, vendors b WHERE a.vid = b.vid AND CONCAT_WS('', a.bikename,b.address,b.name) 
LIKE '%$data%' AND b.city = 'dehra dun'");	//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
		 while ($row = mysql_fetch_array($sql)) 
							  {
									
									
									echo'
									<tr>
									    <td>'.$row['name'].'</td>
										<td>'.$row['bikename'].'</td>
										<td>'.$row['price_wkd'].'</td>
										<td>'.$row['price_wknd'].'</td>
										<td>'.$row['address'].'</td>
										<td>'.$row['contact'].'</td>
										<td>'.$row['deposit'].'</td> 
										<td>'.$row['dlimit'].'</td>
										
										
									</tr>';
                              	
	}
	}
	function search_ahmedabad()
	{
		$data=$_POST['data'];
$sql=mysql_query("SELECT a.bikename, a.price_wkd, a.price_wknd, a.deposit, a.dlimit, b.name, 
b.address, b.contact FROM fleet a, vendors b WHERE a.vid = b.vid AND CONCAT_WS('', a.bikename,b.address,b.name) 
LIKE '%$data%' AND b.city = 'ahmedabad'");	//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
		 while ($row = mysql_fetch_array($sql)) 
							  {
									
									
									echo'
									<tr>
									    <td>'.$row['name'].'</td>
										<td>'.$row['bikename'].'</td>
										<td>'.$row['price_wkd'].'</td>
										<td>'.$row['price_wknd'].'</td>
										<td>'.$row['address'].'</td>
										<td>'.$row['contact'].'</td>
										<td>'.$row['deposit'].'</td> 
										<td>'.$row['dlimit'].'</td>
										
										
									</tr>';
                              	
	}
	}
	function search_car()
	{
	$data=$_POST['data'];
$sql=mysql_query("SELECT a.carname, a.price_wkd,a.price_wknd,a.deposit, a.dlimit, b.name, b.address, b.contact from 
carfleet a ,vendors b where a.vid = b.vid and CONCAT_WS('', a.carname,b.address,b.name) 
LIKE '%$data%' and b.city='bangalore'");
		//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
		 while ($row = mysql_fetch_array($sql)) 
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
	}
	function search_carahmedabad()
	{
	$data=$_POST['data'];
$sql=mysql_query("SELECT a.carname, a.price_wkd,a.price_wknd,a.deposit, a.dlimit, b.name, b.address, b.contact from 
carfleet a ,vendors b where a.vid = b.vid and CONCAT_WS('', a.carname,b.address,b.name) 
LIKE '%$data%' and b.city='ahmedabad'");
		//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
		 while ($row = mysql_fetch_array($sql)) 
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
	function filters_subs_categorys()
	{
		$data=$_POST['data'];
		$sql=mysql_query("SELECT * FROM zopinvoice where  vname like '%$data%' or cname like '%$data%' or bookingid like '%$data%' or phone like '%$data%' order by id desc");
		$i=1;
		 while($row=mysql_fetch_array($sql))
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
											
											<td><object data="'.$files.'" type="application/pdf" width="100" height="40">
                                             
                                             </object><a href="'.$files.'">Click</a></td>
												
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
	function product_priority_update()
	{
		$id=$_POST['res_id'];
		$value=$_POST['pri'];
		
		$qry=mysql_query("update product_details set priority='$value' where id='$id'");	
	}
	function filter_product()
	{
		$data=$_POST['data'];
		$sql=mysql_query("SELECT * FROM product_details where vendor_name like '%$data%' or qty like '%$data%' or priority like '%$data%' or vendor_id like '%$data%' order by priority desc");
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


                                            <td>'.$new_from_time.'</td>
											<td>'.$new_to_time.'</td>
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


                                            <td>'.$new_from_time.'</td>
											<td>'.$new_to_time.'</td>
											
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
											</tr>
									';
									$i++;
								}
	}
?>
