<?php

include"./apiManager.php";

$onn = getAPI('onn');

 $parameters = array (
          'fromDate' => '2018-06-28 09:00:00 +0530',
          'toDate' => '2018-06-29 09:00:00 +0530',
          'bikeId' => 'A1083',
          'bikeStationId' => 'BS000006',
          'customerName' => 'Aditi',
          'customerEmail' => 'yadav@gmail.com',
          'customerPhoneNumber' => '9448357628',
          //'bookingType' => $payLoad['bookingType'],
        );

 $var=$onn->reserveBike($parameters);
 ?>