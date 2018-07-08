<?php
 include("../config.php");

 $country = $_POST['country_id'];
 if($country!=""){
 $find=mysql_query("select a.sub_category,a.terms_conditions,b.name from product_details a join sub_category b where a.sub_category=b.id and a.vendor_id=$country");
 while($row=mysql_fetch_array($find))
 {
  echo '<option value='.$row['sub_category'].'>'.$row['name'].'</option>';
 }
}

//}   

?>