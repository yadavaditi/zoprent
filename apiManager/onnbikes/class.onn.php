<?php

require "api.onn.php";


class class_onn
{

    private $authToken;

    private $api;

    public function __construct()
    {
        $this->authToken = "5b1f666d0ed5422cfbabfb13";
        $this->api = new api_onn;
    }

    private function isJson($string)
    {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }

    private function filterResponse($result)
    {
        if(trim($result['errno']) != 0 && trim($result['error']) != "")// checking for http errors
        {
            // todo: log error occured $result[error]
            return false;
        }

        if(trim($result['response']) == "")
        {
            // todo: log empty response error
            return false;
        }
        if(class_onn::isJson($result['response']))
        {
            $result['response']=json_decode($result['response'],true);//convering json to associative array
            if(($result['response']['errorCode'] != 0) || ($result['response']['errorMessage'] != "Success"))// checking for errors from API
            {
                // todo: log $resultArray[errorMessage]
                return false;
            }
        }


        return $result['response'];
    }


    public function getBookings($payLoad)
    {
        $parameters = array (
          'authToken' => $this->authToken,
          'fromDate' => $payLoad['fromDate'],
          'toDate' => $payLoad['toDate'],
          'bikeId' => $payLoad['bikeId'],
          'bikeStationId' => $payLoad['bikeStationId'],
          'name' => $payLoad['name'],
          'email' => $payLoad['email'],
          'phoneNumber' => $payLoad['phoneNumber'],
          'bookingType' => $payLoad['bookingType'],
        );

        
        $parametersJSON=json_encode($parameters);


        $result = $this->api->getBookings($parametersJSON); //makeing function call from api.onn.php

        if($response=class_onn::filterResponse($result))
        {
            return $response;
        }
        return false;
    }


    public function getAvailableBikes($payLoad)
    {


        $parameters = array (
          'authToken' => $this->authToken,
          'fromDate' => $payLoad['fromDate'],
          'toDate' => $payLoad['toDate'],
          'cityLatitude' => $payLoad['cityLatitude'],
          'cityLongitude' => $payLoad['cityLongitude'],
          'cityName' => $payLoad['cityName'],
        );

        $parametersJSON=json_encode($parameters);


        $result = $this->api->getAvailableBikes($parametersJSON); //makeing function call from api.onn.php

        if($response=class_onn::filterResponse($result))
        {
            return $response;
        }
        return false;
    }


    public function reserveBike($payLoad)
    {
        $parameters = array (
          'authToken' => $this->authToken,
          'fromDate' => $payLoad['fromDate'],
          'toDate' => $payLoad['toDate'],
          'bikeId' => $payLoad['bikeId'],
          'bikeStationId' => $payLoad['bikeStationId'],
          'customerName' => $payLoad['customerName'],
          'customerEmail' => $payLoad['customerEmail'],
          'customerPhoneNumber' => $payLoad['customerPhoneNumber'],
          'bookingType' => $payLoad['bookingType'],
        );


        $parametersJSON=json_encode($parameters);


        $result = $this->api->reserveBike($parametersJSON); //makeing function call from api.onn.php

        if($response=class_onn::filterResponse($result))
        {
            return $response;
        }
        return false;
        
    }


    public function bookBike($payLoad)
    {

         $parameters = array (
          'authToken' => $this->authToken,
          'bookingId' => $payLoad['bookingId'],
          'amountCollected' => $payLoad['amountCollected']
        );

        
        $parametersJSON=json_encode($parameters);


        $result = $this->api->bookBike($parametersJSON); //makeing function call from api.onn.php

        if($response=class_onn::filterResponse($result))
        {
            return $response;
        }
        return false;
    }


    public function cancelBooking($payLoad)
    {
        $parameters = array (
          'authToken' => $this->authToken,
          'fromDate' => $payLoad['fromDate'],
          'toDate' => $payLoad['toDate'],
          'bikeId' => $payLoad['bikeId'],
          'bikeStationId' => $payLoad['bikeStationId'],
          'customerName' => $payLoad['customerName'],
          'customerEmail' => $payLoad['customerEmail'],
          'customerPhoneNumber' => $payLoad['customerPhoneNumber'],
          'bookingType' => $payLoad['bookingType'],
        );


        $parametersJSON=json_encode($parameters);


        $result = $this->api->cancelBooking($parametersJSON); //makeing function call from api.onn.php

        if($response=class_onn::filterResponse($result))
        {
            return $response;
        }
        return false;
    }



/*  yet to be implimented rescheduling
    public function checkRescheduleBooking($payLoad)
    {

        $parametersJSON=json_encode($parameters);


        $result = $this->api->checkRescheduleBooking($parametersJSON); //makeing function call from api.onn.php

        if($response=class_onn::filterResponse($result))
        {
            return $response;
        }
        return false;
    }


    public function reserveRescheduleBooking($payLoad)
    {

        $parametersJSON=json_encode($parameters);


        $result = $this->api->reserveRescheduleBooking($parametersJSON); //makeing function call from api.onn.php

        if($response=class_onn::filterResponse($result))
        {
            return $response;
        }
        return false;
    }


    public function rescheduleBooking($payLoad)
    {

        $parametersJSON=json_encode($parameters);


        $result = $this->api->rescheduleBooking($parametersJSON); //makeing function call from api.onn.php

        if($response=class_onn::filterResponse($result))
        {
            return $response;
        }
        return false;
    }


    */
   





}//end of class

?>
