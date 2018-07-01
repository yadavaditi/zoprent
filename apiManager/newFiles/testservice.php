<?php
// $date=date_create("15-03-2015 12:30:00");

// $date= date_format($date,"Y/m/d H:i:s ")." +0530";
// echo "$date";

$date="15-03-2018";
$time="12:30:00";
$format=date_create($date." ".$time);

$date= date_format($date,"Y/m/d H:i:s ")." +0530";
echo "$date";

?>