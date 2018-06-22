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
    $response = curl_exec($curl);
    curl_close($curl);
    return array(
        "error"=>$error,
        "errno"=>$errno,
        "response"=>$response);
}
}
?>
