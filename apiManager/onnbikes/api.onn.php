<?php

require"class.CurlHelper.php";
class api_onn
{

    private $httpMethod ;
    private $host;

    public function __construct()
    {
        $this->httpMethod = "POST";
        $this->host="https://devservice.onnbikes.com/OnnBikesExternal/v1/rest/";
}

//$authToken="5b1f666d0ed5422cfbabfb13";

/*
ONNBikes Booking Service Show/Hide List Operations Expand Operations
POST /booking/getBookings Get Bookings
POST /booking/getAvailableBikes Get the available bikes
POST /booking/reserveBike Reserve Bike for booking
POST /booking/bookBike Perform booking operation
POST /booking/cancelBooking Cancel a Booking
POST /booking/checkRescheduleBooking check Reschedule Booking
POST /booking/reserveRescheduleBooking Reserve Reschedule Booking
POST /booking/rescheduleBooking Reschedule Booking
*/




public function getBookings($parametersJSON)
{
$path="booking/getBookings";
$url=$this->host.$path;
$result = CurlHelper::perform_http_request($this->httpMethod, $url, $parametersJSON);
return($result);
}


public function getAvailableBikes($parametersJSON)
{
$path="booking/getAvailableBikes";
$url=$this->host.$path;
$result = CurlHelper::perform_http_request($this->httpMethod, $url, $parametersJSON);
return($result);
}


public function reserveBike($parametersJSON)
{
$path="booking/reserveBike";
$url=$this->host.$path;
$result = CurlHelper::perform_http_request($this->httpMethod, $url, $parametersJSON);
return($result);
}


public function bookBike($parametersJSON)
{
$path="booking/bookBike";
$url=$this->host.$path;
$result = CurlHelper::perform_http_request($this->httpMethod, $url, $parametersJSON);
return($result);
}


public function cancelBooking($parametersJSON)
{
$path="booking/cancelBooking";
$url=$this->host.$path;
$result = CurlHelper::perform_http_request($this->httpMethod, $url, $parametersJSON);
return($result);
}


public function checkRescheduleBooking($parametersJSON)
{
$path="booking/checkRescheduleBooking";
$url=$this->host.$path;
$result = CurlHelper::perform_http_request($this->httpMethod, $url, $parametersJSON);
return($result);
}


public function reserveRescheduleBooking($parametersJSON)
{
$path="booking/reserveRescheduleBooking";
$url=$this->host.$path;
$result = CurlHelper::perform_http_request($this->httpMethod, $url, $parametersJSON);
return($result);
}


public function rescheduleBooking($parametersJSON)
{
$path="booking/rescheduleBooking";
$url=$this->host.$path;
$result = CurlHelper::perform_http_request($this->httpMethod, $url, $parametersJSON);
return($result);
}

}

/*
    $action = "POST";
    $url = "https://devservice.onnbikes.com/OnnBikesExternal/v1/rest/booking/getAvailableBikes";


	echo "Trying to reach ...";// can be removed 2 lines
    echo $url;


	$parameters = array (
  'authToken' => '5b1f666d0ed5422cfbabfb13',
  'fromDate' => '2018-06-22 09:00:00 +0530',
  'toDate' => '2018-06-23 09:00:00 +0530',
  'cityLatitude' => 0,
  'cityLongitude' => 0,
  'cityName' => 'Bengaluru',
);
$parametersJSON=json_encode($parameters);// convert array into json

$result = CurlHelper::perform_http_request($action, $url, $parametersJSON); // making request from class


   echo print_r($result);


//check for errors----> $result['error'],$result['errno'],$result['result'](error message from json response)*/
?>
