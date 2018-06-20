<?php

class CurlHelper {

// This method will perform an action/method thru HTTP/API calls
// Parameter description:
// Method= POST, PUT, GET etc
// Data= array("param" => "value") ==> index.php?param=value
public static function perform_http_request($method, $url, $data = false)
{
    $curl = curl_init();

    switch ($method)
    {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);

            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_PUT, 1);
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }

    // Optional Authentication:
    //curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    //curl_setopt($curl, CURLOPT_USERPWD, "username:password");

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    //set by me 2 lines
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);//todo: no idea if its secure, maybe can remove during deployment
    curl_setopt( $curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

    //created by me 2 lines
    $error    = curl_error($curl);
    $errno    = curl_errno($curl);
    $result = curl_exec($curl);

    curl_close($curl);

    return array(
        "error"=>$error,
        "errno"=>$errno,
        "result"=>$result);
}

}

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
	
	
//check for errors----> $result['error'],$result['errno'],$result['result'](error message from json response)
?>