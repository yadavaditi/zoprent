<?php
//get host by name

$allowlist = array(
    'broadband.actcorp.in',
	'Ranjan',
	'157.49.11.224',
	'27.59.82.252',
	'157.49.10.235',
	'157.49.4.61'
);
$show=shuffle($allowlist);
print_r $show;
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
if(($allowlist[0]==$hostname) || ($allowlist[1]==$hostname) || ($allowlist[2]==$hostname)|| ($allowlist[3]==$hostname) || ($allowlist[4]==$hostname) || ($allowlist[5]==$hostname)   )
{ 
echo 'Hi ZopRent';
}else
{
echo 'Hi'.$hostname;
//header("Location: http://www.google.com");
}



?>

