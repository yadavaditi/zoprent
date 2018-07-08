<?php
session_start();
//include 'admin/config.php';
include"../../apiManager.php";
$from_date = $_SESSION['from_date'];
$from_time = $_SESSION['from_time'];
$to_date = $_SESSION['to_date'];
$to_time = $_SESSION['to_time'];
$city=$_POST['city'];
$convert=$_POST['bikeArea'];
//$city=$_GET['city'];
//$convert=$_GET['bikeArea'];
$bikeStationCode= (int)$convert;


function combineDateTime($date,$time)
{
	$gmtTimezone = new DateTimeZone("+0530");
	$combinedDT = date('Y-m-d H:i:s', strtotime("$date $time"));
	$myDateTime = new DateTime($combinedDT, $gmtTimezone);
	return($myDateTime->format('Y-m-d H:i:s O'));
}


$dateFrom = combineDateTime($from_date,$from_time);
$dateTo = combineDateTime($to_date,$to_time);
$onn = getAPI('onn');
$parameters = array (
 'fromDate' => $dateFrom,
 'toDate' => $dateTo,
 'cityLatitude' => 0,
 'cityLongitude' => 0,
 'cityName' => 'Bengaluru',
  );
if($resultArray=$onn->getAvailableBikes($parameters))
{

    $bikeStations = $resultArray['bikeStations'];
    //$bikeStationId = $resultArray['bikeStationId'];
    unset($resultArray);
    $bikesArray=array();
    foreach( $bikeStations[$bikeStationCode]['bikes'] as $bike)//$bikeStations[0], 0 = value from selectbox option
    {
        if(isset($bikesArray[$bike['modelName']]))
        {
            array_push($bikesArray[$bike['modelName']][1],$bike['bikeId']);
        }
        else
        {
            $bikesArray[$bike['modelName']]=array(array("name"=>$bike['manufacturerName']." ".$bike['modelName'],
                                              "bikeImage"=>$bike['bikeImage'],
                                              "allowedDistance"=>$bike['allowedDistance'],
                                              "maxSpeedLimit"=>$bike['maxSpeedLimit'],
                                              "securityDeposit"=>$bike['securityDeposit'],
                                              "tariff"=>$bike['tariff'],
                                              "bikeStationId"=>$bikeStations[$bikeStationCode]['stationId']
                                              ),array($bike['bikeId']));
        }
    }
    $i=1;
    foreach ($bikesArray as $value) {
        if($i==1)
        {
            echo '<div class="row" style="padding-top:2%;">';
        }
?>
<form action="onnCheckOut1.php" method="post">
    <div class="col-md-3 col-sm-3 col-xs-12 text-center">
        <img src="<?php echo $value[0]['bikeImage'];?>" alt="image" height="119" width="189" />
        <h4 style="margin-top: 10px;font-family: ab2;font-weight:bold;">
            <?php echo $value[0]['name'];?>
        </h4>
        <!--
                                        <span style="margin-left:-20px">Mon-Thu</span><span style="margin-left:30px">Fri-Sun</span> <h4 style="margin-top: 10px;font-family: ab2;font-weight:bold;"><i class="fa fa-inr" aria-hidden="true"></i>'.$low_price.'/Day &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-inr" aria-hidden="true"> </i> '.$prices.'/Day</h4><p style="color:#004066;"><b>Onwards</b></p>
                                    -->
        <h4 style="margin-top: 10px;font-family: ab2;font-weight:bold;">
            <i class="fa fa-inr" aria-hidden="true"></i>
            <?php echo $value[0]['tariff']; ?>
        </h4>
        <input type="hidden" name="name" value="<?php echo $value[0]['name'];?>" />
        <input type="hidden" name="bikeImage" value="<?php echo $value[0]['bikeImage'];?>" />
        <input type="hidden" name="allowedDistance" value="<?php echo $value[0]['allowedDistance'];?>" />
        <input type="hidden" name="securityDeposit" value="<?php echo $value[0]['securityDeposit'];?>" />
        <input type="hidden" name="tariff" value="<?php echo $value[0]['tariff'];?>" />
        <input type="hidden" name="bikeStationId" value="<?php echo $value[0]['bikeStationId'];?>" />
        <?php
        foreach($value[1] as $bikeIdvar)
        {
            echo'<input type="hidden" name="bikeId[]" value="'.$bikeIdvar.'"/>';
        }
        ?>

        <div class="query-submit-button top30">

            <!--<a href="bookings.php?sub='.$vname.'&uid='.$bmg.'&city='.$uids.'">-->
            <input type="submit" value="Rent Now" name="rent_now" style="text-align:center;font-size:12px;color:#fff;font-family: ab2;border: 1px solid #004066;background: #004066;border-radius: 3px;
									width: 50%;
									padding: 6px 4px 6px 5px;" />
            <!--</a>	-->
        </div>

    </div>
</form>
<?php
        if($i==4)
        {
            echo '</div>';
            $i=0;
        }
        $i++;
    }
}
else{
	echo "something wrong try valid dates and time";
}

?>


