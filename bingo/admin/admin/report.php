<?php
if(!isset($_SESSION)){ session_start();}
include("../config.php");
if(!isset($_SESSION['login']) && ($_SESSION['login'] != 'true'))
{
    session_unset();
    header("location:../index.php");
}
date_default_timezone_set('Asia/Calcutta');
    
    $today = date("Y/m/d");
    header( "Content-Type: application/vnd.ms-excel" );
    header( "Content-disposition: attachment; filename=$today.xls" );
    echo 'Name' . "\t" . 'Phone' . "\t" .'E-mail' . "\t" . 'City' ."\t" . 'Vendor Name' ."\t" . 'Vechile Name' ."\t" . 'Date' ."\t" . 'From Date' ."\t" . 'From Time' ."\t". 'To Date' ."\t" .'To Time'."\n";
     
    $vendor_array;
    $sub_array;

    $q="select id,vendor_name from vendor";
    $bansh_qry=mysql_query($q);
    while($bansh_res=mysql_fetch_array($bansh_qry))
    {
        $vendor_array[$bansh_res['id']]=$bansh_res['vendor_name'];
    }

    $q="select id,name from sub_category";
    $bansh_qry=mysql_query($q);
    while($bansh_res=mysql_fetch_array($bansh_qry))
    {
        $sub_array[$bansh_res['id']]=$bansh_res['name'];
    }

    $bansh_qry=mysql_query("select name, phone, email, city, booked_date, vendor_id, sub_category , from_date, to_date, from_time, to_time from booking_details b WHERE b.booked_date='2018-06-01'");

    while($bansi_res=mysql_fetch_array($bansh_qry))
    {
        $name=$bansi_res['name'];
        $city=$bansi_res['city'];
        $city=$bansi_res['email'];
        $number=$bansi_res['phone'];
        $date=(string)$bansi_res['booked_date'];
        $v=$bansi_res['vendor_id'];
       $sub=$bansi_res['sub_category'];
       $fdate=$bansi_res['from_date'];
       $tdate=$bansi_res['to_date'];
       $ftime=$bansi_res['from_time'];
       $to_time=$bansi_res['to_time'];

       echo  $name . "\t" . $number . "\t" .$email . "\t" . $city ."\t" . $vendor_array[$v] ."\t" . $sub_array[$sub] ."\t" . $date ."\t" . $fdate ."\t" . $ftime ."\t" . $tdate ."\t" . $to_time ."\n";
    }
?>