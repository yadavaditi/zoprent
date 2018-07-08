<?php 
   if(!isset($_SESSION)){
    session_start();
    }
   include("config.php");
   if(isset($_POST['submit']))
   	{
		$user_email=$_POST['email'];
		$sql="SELECT * FROM `musermst` WHERE email='$user_email'";
		$query=mysql_query($sql) or die(mysql_error());
		$row_count=mysql_num_rows($query);
			
			if($row_count == 1)
			{
			$res=mysql_fetch_array($query);
			$email=$res['email'];
			$username=$res['user_name'];
			$encrypt_mail=base64_encode($email);
			$emailTo=$email;
			
			//----------------Email Send Start--------------------------------
			
			$email_body  = "Dear ".$username."\n\n";
			$email_body .= " Forgot Password Reset Link. \n\n";
			$email_body .= "http://zoprent.com/admin/reset_password.php?id=".$encrypt_mail."\n\n";
			$email_body .= "Regards\n\n";
			$email_body .= "Reset password For Zoprent";
		
			$headers = "From:info@zoprent.com \r\n" . "Reply-To: " . $email;
			mail($emailTo, $subject="Forgot Password Reset Link from zoprent", $email_body, $headers);
		
			//-----------------Email Send End---------------------------------
				$_SESSION['send_link']="True";
				header("location:index.php");	
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
								<div class="icon-object border-warning-400 text-warning-400"><img src="assets/logo.png" width="100"/></div>
								<h5 class="content-group-lg">Forgot Password<small class="display-block"></small></h5>
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
								<input type="email" class="form-control" placeholder="Email" name="email" id="email" required>
								<div class="form-control-feedback">
									<i class="icon-envelop text-muted"></i>
								</div>
							</div>
							<div class="form-group">
								<button type="submit" name="submit" class="btn bg-blue btn-block">Submit <i class="icon-circle-right2 position-right"></i></button>
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
