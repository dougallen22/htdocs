<?php
session_start();
ob_start();
include("includes/functions.php");
session_open_redirect();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Forgot Password-Randbrook Shipment System</title>
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/logo.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image:url('images/insurance_bg.png');background-repeat:no-repeat;background-size:100% 100%;">
			<div class="wrap-login100" style="opacity:0.9">
				<form class="login100-form validate-form" method="POST">
					<span class="login100-form-title p-b-26">
						<h4>Forgot Password</h4>
					</span>
						
					<div class="wrap-input100 validate-input" data-validate = "Enter Your Email or Username">
						<input class="input100" type="text" name="emailusername">
						<span class="focus-input100" data-placeholder="Email or Username"></span>
					</div>



					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="forgot">
								get Password
							</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/login.js"></script>







<?php  
	if (isset($_POST['forgot']))
	{

	$emailusername=$_POST['emailusername'];
	$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$tes="SELECT * from user_info where email='$emailusername'";
	$row=mysqli_query(con(),$tes);
	if(mysqli_num_rows($row)>0){
	 $res=mysqli_fetch_array($row);
	 	$pass=base64_decode($res['password']);
										
	$formatofmsg='<center><div style="width: 100%;">
		<div style="padding: 19px;">
			<h3 style="text-align: center;">Protect  Mutual</h3>
			<section style="text-align: left;">
			<p>'.$res["fname"].''.$res["fname"].'!</p>
			<p>Your Account is information successfully fetched in <b>Protect Mutual</b> the detail of your account is mentioned here;<b> Password:</b> '.$pass.'</p>
			<p><b>For your security, Make sure to delete this email after reading.</b></p>
			<p>Thanks,</p>
			<p>Protect Mutual Team</p>
			</section>

		</div>
	</div> </center>';
$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: info@randbrook.com' ."\r\n";
			$headers .= 'Reply: noreply@randbrook.com' ."\r\n";
			$headers .= "X-Mailer: PHP". phpversion() ."\r\n";
        	$msg = $formatofmsg."<br><br>This came from <a href=".$actual_link."><b>Randbrook Shipment System</b></a> at ".date('m-d-Y H:i:s');
        mail($res['email'],"Forgot Password",$msg,$headers);
              echo "<script> alert('Your password is sent to your email. Email may take sometime to reach. For security plz make sure to delete this email or change your password after seeing.');</script>";


}
else{
	      echo "<script> alert('Sorry! Email or Username is wrong');</script>";

}
}
 ?>





</body>
</html>