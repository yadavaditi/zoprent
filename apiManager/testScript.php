<?php

require"apiManager.php";

$onn = getAPI('onn');

 $parameters = array (
  'fromDate' => '2018-06-28 09:00:00 +0530',
  'toDate' => '2018-06-29 09:00:00 +0530',
  'cityLatitude' => 0,
  'cityLongitude' => 0,
  'cityName' => 'Bengaluru',
);
 $var=$onn->getAvailableBikes($parameters);
 echo"... <br>";
 //print_r($var['bikeStations'][0]['bikes'][0]['bikeId']);
 echo json_encode($var);


?>