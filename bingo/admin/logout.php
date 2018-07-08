<?php if(!isset($_SESSION)){ session_start();}
      include("config.php");

 if(isset($_SESSION['login']))
    {
		session_unset();
		header("location:index.php");
	}
	
?>
