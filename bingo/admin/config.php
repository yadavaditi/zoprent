
 <?php
   
  //$link=mysql_connect("localhost","mindapps_usr","X-P68{E.-Ble");
  /* $link=mysql_connect("localhost","Zoprentsql21","Code4321#");
  if(!$link)
	{
		die("Could not connect to MySQL".mysql_error());
	}
  mysql_select_db("Zoprentsh",$link)or die ("could not open database");*/
   $link=mysql_connect("localhost","root","");
 if(!$link)
	{
		die("Could not connect to MySQL".mysql_error());
	}
  mysql_select_db("zoprent",$link)or die ("could not open database");

?> 

