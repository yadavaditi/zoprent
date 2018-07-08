<?php
include("config.php");


	if($_GET['f']=="search_bike")
	{
		search_bike(); 
	}
	function search_bike()
	{
	    global $con;
		$data=$_POST['data'];
$sql=mysql_query("SELECT a.bikename, a.price_wknd, a.deposit, a.dlimit, b.name, b.address, b.contact from fleet a ,vendors b where a.vid = b.vid and a.bikename like '$data%'");
		//$sql=mysqli_query($conn,"SELECT * FROM bike_details where name like '%$data%' or priority like '%$data%' or price like '%$data%' order by priority desc");
		
		 while ($row = mysql_fetch_array($sql)) 
							  {
									
									
									echo'
									<tr>
									    <td>'.$row['name'].'</td>
										<td>'.$row['bikename'].'</td>
										<td>'.$row['price_wknd'].'</td>
										<td>'.$row['address'].'</td>
										<td>'.$row['contact'].'</td>
										<td>'.$row['deposit'].'</td> 
										<td>'.$row['dlimit'].'</td>
										
										
									</tr>';
                              	} 
	}