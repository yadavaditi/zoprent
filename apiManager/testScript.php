<?php

require"onnbikes/class.onn.php";

 $onn=new class_onn;

 $parameters = array (
  'fromDate' => '2018-06-22 09:00:00 +0530',
  'toDate' => '2018-06-23 09:00:00 +0530',
  'cityLatitude' => 0,
  'cityLongitude' => 0,
  'cityName' => 'Bengaluru',
);
 $var=$onn->getAvailableBikes($parameters);
 echo"... <br>";
 print_r($var);
?>