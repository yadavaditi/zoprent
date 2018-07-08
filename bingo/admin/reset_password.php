<?php 
   if(!isset($_SESSION)){
    session_start();
    }
	  include("config.php");
	if(!$_GET['id'])
	{
		header('location:index.php');
    }
	
	
		$encrypt_mail=$_GET['id'];	
		$mail=base64_decode($encrypt_mail);
		$sql="SELECT * FROM musermst WHERE email='$mail'";
		$query=mysql_query($sql);
		$row_count=mysql_num_rows($query);
		if($row_count == 1)
			{
				$_SESSION['email']=$mail;
			}
		else
			{
				session_unset();
				//header("location:index.php");
			}
 
   if(isset($_POST['submit']))
   	{
		$user_pass=mysql_real_escape_string($_POST['password']);	
		$email=$_SESSION['email'];
		$encrypt_password=md5($user_pass);
		$sql1=mysql_query("UPDATE musermst SET user_password ='$encrypt_password' WHERE email = '$email'");	
			if($sql)
			{
				$_SESSION['reset']="true";
				header('location:index.php');
				echo "<meta http-equiv='refresh' content='1;url=index.php'>";
			}
			else
			{
				$_SESSION['error_msg']="aaaa";
			}
   	}
   
   
   ?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LOGIN HERE</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="assets/css/colors.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/login.js"></script>
	<!-- /theme JS files -->
	<script>
	function check_pass()
		{
			var psd=$("#password").val();
         	var c_psd=$("#c_password").val();
         	if(psd!="" && c_psd!="")
         	{
         		
         		if(psd!=c_psd)
         		{
         			
         			alert("Missmatch in password!");
         			$("#c_password").val("");
         			$("#c_password").focus();
         		}
         		
         	}
         
		}
		</script>
</head>

<body class="bg-slate-800" >

	<!-- Page container -->
	<div class="page-container login-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

					<!-- Advanced login -->
					<form action="" method="post">
						<div class="panel panel-body login-form">
							<div class="text-center">
								<div class="icon-object border-warning-400 text-warning-400"><img src="assets/logo2.png" width="100"/></div>
								<h5 class="content-group-lg">Login to your account <small class="display-block">Enter your credentials</small></h5>
							</div>
							<?php
							if(isset($_SESSION['error_msg']))
								{
								?>
									<div class="alert bg-danger alert-styled-left">
										<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
										<span class="text-semibold">Opps!</span> Try agin!
									</div>
								<?php
									unset($_SESSION['error_msg']);
										}
								?>
							
							<div class="form-group has-feedback has-feedback-left">
								<input type="password" class="form-control" placeholder="Password" name="password" id="password" onchange="check_pass();" required>
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="password" class="form-control" placeholder="Retype Password" name="c_password" id="c_password" onchange="check_pass();" required>
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>
							<div class="form-group">
								<button type="submit" name="submit" class="btn bg-blue btn-block">Reset Password <i class="icon-circle-right2 position-right"></i></button>
								
							</div>

							</div>
					</form>
					<!-- /advanced login -->


					<!-- Footer -->
					<div class="footer text-muted">
						&copy; 2017. 
					</div>
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
</html>
