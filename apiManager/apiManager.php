<?php

require"onnbikes/class.onn.php";






 function getAPI($api)
 {
    $api = trim(strtoupper($api));
    switch($api)
    {
        case 'ONN':
            $object = new class_onn;
            return $object;
            //break;

        default:
            return false;
    }
 }


 ?>