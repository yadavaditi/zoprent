<?php
include("../config.php");
date_default_timezone_set('Asia/Calcutta');

	if($_GET['f']=="search_bike")
	{
		search_bike(); 
	}
	if($_GET['f']=="search_car")
	{
		search_car(); 
	}
	if($_GET['f']=="search_ahmedabad")
	{
		search_ahemdabad();  
	}
	if($_GET['f']=="search_carahmedabad")
	{
		search_carahemdabad(); 
	}
	if($_GET['f']=="search_udaipur")
	{
		search_udaipur();  
	}
	if($_GET['f']=="search_carudaipur")
	{
		search_carudaipur(); 
	}
	if($_GET['f']=="search_jaipur")
	{
		search_jaipur();  
	}
	if($_GET['f']=="search_carjaipur")
	{
		search_carjaipur(); 
	}
	if($_GET['f']=="search_delhi")
	{
		search_delhi();  
	}
	if($_GET['f']=="search_cardelhi")
	{
		search_cardelhi(); 
	}
	if($_GET['f']=="search_chandigarh")
	{
		search_chandigarh();  
	}
	if($_GET['f']=="search_carchandigarh")
	{
		search_carchandigarh(); 
	}
	if($_GET['f']=="search_ladakh")
	{
		search_ladakh();  
	}
	if($_GET['f']=="search_carladakh")
	{
		search_carladakh(); 
	}
	if($_GET['f']=="search_shimla")
	{
		search_shimla();  
	}
	if($_GET['f']=="search_carshimla")
	{
		search_carshimla(); 
	}
	if($_GET['f']=="search_manali")
	{
		search_manali();  
	}
	if($_GET['f']=="search_carmanali")
	{
		search_carmanali(); 
	}
	if($_GET['f']=="search_haridwar")
	{
		search_haridwar();  
	}
	if($_GET['f']=="search_carharidwar")
	{
		search_carharidwar(); 
	}
	if($_GET['f']=="search_dehradun")
	{
		search_dehradun();  
	}
	if($_GET['f']=="search_cardehradun")
	{
		search_cardehradun(); 
	}
	if($_GET['f']=="search_rishikesh")
	{
		search_rishikesh();  
	}
	if($_GET['f']=="search_carrishikesh")
	{
		search_carrishikesh(); 
	}
	if($_GET['f']=="search_carhyderabad")
	
		search_carhyderabad(); 
	}
	if($_GET['f']=="search_carmumbai")
	{
		search_carmumbai(); 
	}
	if($_GET['f']=="search_carpune")
	{
		search_carpune(); 
	}
	if($_GET['f']=="search_cargoa")
	{
		search_cargoa(); 
	}
	if($_GET['f']=="search_carpondi")
	{
		search_carpondi(); 
	}
	if($_GET['f']=="search_mysore")
	{
		search_mysore();  
	}
	if($_GET['f']=="search_ooty")
	{
		search_ooty(); 
	}
        if($_GET['f']=="search_pondi")
	{
		search_pondi(); 
	}
	if($_GET['f']=="search_hyd")
	{
		search_hyd(); 
	}
	if($_GET['f']=="search_goa")
	{
		search_goa(); 
	}
	if($_GET['f']=="search_andaman")
	{
		search_andaman(); 
	}
	if($_GET['f']=="search_mumbai")
	{
		search_mumbai(); 
	}
	if($_GET['f']=="search_pune")
	{
		search_pune(); 
	}
	if($_GET['f']=="search_carandaman")
	{
		search_carandaman(); 
	}
	function search_bike()
	{
	    
		$data=$_POST['data'];
$sql=mysql_query("SELECT a.bikename, a.price_wkd, a.price_wknd, a.deposit, a.dlimit, b.name, 
b.address, b.contact FROM fleet a, vendors b WHERE a.vid = b.vid AND CONCAT_WS('', a.bikename,b.address,b.name) 
LIKE '%$data%' AND b.city = 'bangalore'");	//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
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
	function search_ahmedabad()
	{
	    
		$data=$_POST['data'];
$sql=mysql_query("SELECT a.bikename, a.price_wkd, a.price_wknd, a.deposit, a.dlimit, b.name, b.address, b.contact
FROM fleet a, vendors b
WHERE a.vid = b.vid
AND CONCAT_WS('', a.bikename,b.address,b.name) 
LIKE '%$data%'
AND b.city = 'ahmedabad'");
		//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
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
	function search_delhi()
	{
	    
		$data=$_POST['data'];
$sql=mysql_query("SELECT a.bikename, a.price_wkd, a.price_wknd, a.deposit, a.dlimit, b.name, b.address, b.contact
FROM fleet a, vendors b
WHERE a.vid = b.vid
AND CONCAT_WS('', a.bikename,b.address,b.name) 
LIKE '%$data%'
AND b.city = 'delhi'");
		//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
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
	function search_carudaipur()
	{
	    
		$data=$_POST['data'];
$sql=mysql_query("SELECT a.carname, a.price_wkd,a.price_wknd,a.deposit, a.dlimit, b.name, b.address, b.contact from 
carfleet a ,vendors b where a.vid = b.vid and CONCAT_WS('', a.carname,b.address,b.name) 
LIKE '%$data%' and b.city='carudaipur'");
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
	function search_udaipur()
	{
	    
		$data=$_POST['data'];
$sql=mysql_query("SELECT a.bikename, a.price_wkd, a.price_wknd, a.deposit, a.dlimit, b.name, b.address, b.contact
FROM fleet a, vendors b
WHERE a.vid = b.vid
AND CONCAT_WS('', a.bikename,b.address,b.name) 
LIKE '%$data%'
AND b.city = 'udaipur'");
		//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
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
	function search_jaipur()
	{
	    
		$data=$_POST['data'];
$sql=mysql_query("SELECT a.bikename, a.price_wkd, a.price_wknd, a.deposit, a.dlimit, b.name, b.address, b.contact
FROM fleet a, vendors b
WHERE a.vid = b.vid
AND CONCAT_WS('', a.bikename,b.address,b.name) 
LIKE '%$data%'
AND b.city = 'jaipur'");
		//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
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
	function search_chandigarh()
	{
	    
		$data=$_POST['data'];
$sql=mysql_query("SELECT a.bikename, a.price_wkd, a.price_wknd, a.deposit, a.dlimit, b.name, b.address, b.contact
FROM fleet a, vendors b
WHERE a.vid = b.vid
AND CONCAT_WS('', a.bikename,b.address,b.name) 
LIKE '%$data%'
AND b.city = 'chandigarh'");
		//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
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
	function search_ladakh()
	{
	    
		$data=$_POST['data'];
$sql=mysql_query("SELECT a.bikename, a.price_wkd, a.price_wknd, a.deposit, a.dlimit, b.name, b.address, b.contact
FROM fleet a, vendors b
WHERE a.vid = b.vid
AND CONCAT_WS('', a.bikename,b.address,b.name) 
LIKE '%$data%'
AND b.city = 'ladakh'");
		//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
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
	function search_manali()
	{
	    
		$data=$_POST['data'];
$sql=mysql_query("SELECT a.bikename, a.price_wkd, a.price_wknd, a.deposit, a.dlimit, b.name, b.address, b.contact
FROM fleet a, vendors b
WHERE a.vid = b.vid
AND CONCAT_WS('', a.bikename,b.address,b.name) 
LIKE '%$data%'
AND b.city = 'manali'");
		//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
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
	function search_shimla()
	{
	    
		$data=$_POST['data'];
$sql=mysql_query("SELECT a.bikename, a.price_wkd, a.price_wknd, a.deposit, a.dlimit, b.name, b.address, b.contact
FROM fleet a, vendors b
WHERE a.vid = b.vid
AND CONCAT_WS('', a.bikename,b.address,b.name) 
LIKE '%$data%'
AND b.city = 'shimla'");
		//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
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
	function search_haridwar()
	{
	    
		$data=$_POST['data'];
$sql=mysql_query("SELECT a.bikename, a.price_wkd, a.price_wknd, a.deposit, a.dlimit, b.name, b.address, b.contact
FROM fleet a, vendors b
WHERE a.vid = b.vid
AND CONCAT_WS('', a.bikename,b.address,b.name) 
LIKE '%$data%'
AND b.city = 'haridwar'");
		//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
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
	function search_rishikesh()
	{
	    
		$data=$_POST['data'];
$sql=mysql_query("SELECT a.bikename, a.price_wkd, a.price_wknd, a.deposit, a.dlimit, b.name, b.address, b.contact
FROM fleet a, vendors b
WHERE a.vid = b.vid
AND CONCAT_WS('', a.bikename,b.address,b.name) 
LIKE '%$data%'
AND b.city = 'rishikesh'");
		//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
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
$sql=mysql_query("SELECT a.bikename, a.price_wkd, a.price_wknd, a.deposit, a.dlimit, b.name, b.address, b.contact
FROM fleet a, vendors b
WHERE a.vid = b.vid
AND CONCAT_WS('', a.bikename,b.address,b.name) 
LIKE '%$data%'
AND b.city = 'dehra dun'");
		//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
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
	function search_mysore()
	{
	    
		$data=$_POST['data'];
$sql=mysql_query("SELECT a.bikename, a.price_wkd, a.price_wknd, a.deposit, a.dlimit, b.name, b.address, b.contact
FROM fleet a, vendors b
WHERE a.vid = b.vid
AND CONCAT_WS('', a.bikename,b.address,b.name) 
LIKE '%$data%'
AND b.city = 'mysore'");
		//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
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
$sql=mysql_query("SELECT a.bikename, a.price_wkd, a.price_wknd, a.deposit, a.dlimit, b.name, b.address, b.contact
FROM fleet a, vendors b
WHERE a.vid = b.vid
AND CONCAT_WS('', a.bikename,b.address,b.name) 
LIKE '%$data%'
AND b.city = 'ooty'");
		//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
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
$sql=mysql_query("SELECT a.bikename, a.price_wkd, a.price_wknd, a.deposit, a.dlimit, b.name, b.address, b.contact
FROM fleet a, vendors b
WHERE a.vid = b.vid
AND CONCAT_WS('', a.bikename,b.address,b.name) 
LIKE '%$data%'
AND b.city = 'mumbai'");
		//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
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
$sql=mysql_query("SELECT a.bikename, a.price_wkd, a.price_wknd, a.deposit, a.dlimit, b.name, b.address, b.contact
FROM fleet a, vendors b
WHERE a.vid = b.vid
AND CONCAT_WS('', a.bikename,b.address,b.name) 
LIKE '%$data%'
AND b.city = 'pondicherry'");
		//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
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
$sql=mysql_query("SELECT a.bikename, a.price_wkd, a.price_wknd, a.deposit, a.dlimit, b.name, b.address, b.contact
FROM fleet a, vendors b
WHERE a.vid = b.vid
AND CONCAT_WS('', a.bikename,b.address,b.name) 
LIKE '%$data%'
AND b.city = 'hyderabad'");
		//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
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
$sql=mysql_query("SELECT a.bikename, a.price_wkd, a.price_wknd, a.deposit, a.dlimit, b.name, b.address, b.contact
FROM fleet a, vendors b
WHERE a.vid = b.vid
AND CONCAT_WS('', a.bikename,b.address,b.name) 
LIKE '%$data%'
AND b.city = 'goa'");
		//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
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
$sql=mysql_query("SELECT a.bikename, a.price_wkd, a.price_wknd, a.deposit, a.dlimit, b.name, b.address, b.contact
FROM fleet a, vendors b
WHERE a.vid = b.vid
AND CONCAT_WS('', a.bikename,b.address,b.name) 
LIKE '%$data%'
AND b.city = 'pune'");
		//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
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
$sql=mysql_query("SELECT a.bikename, a.price_wkd, a.price_wknd, a.deposit, a.dlimit, b.name, b.address, b.contact
FROM fleet a, vendors b
WHERE a.vid = b.vid
AND CONCAT_WS('', a.bikename,b.address,b.name) 
LIKE '%$data%'
AND b.city = 'andaman'");
		//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
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
	
	