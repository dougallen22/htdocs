<?php

if (isset($_POST['fname']) and isset($_POST['lname']) and isset($_POST['email'])) {

	setcookie("pfname", "", time() - 3600);
	setcookie("plname", "", time() - 3600);
	setcookie("pemail", "", time() - 3600);
	setcookie("pphone", "", time() - 3600);
	setcookie("paddress", "", time() - 3600);
	setcookie("pcity", "", time() - 3600);
	setcookie("pstate", "", time() - 3600);
	setcookie("pzip", "", time() - 3600);


	setcookie("pfname", $_POST['fname'], time() + 3600 * 24 * 365);
	setcookie("plname", $_POST['lname'], time() + 3600 * 24 * 365);
	setcookie("pemail", $_POST['email'], time() + 3600 * 24 * 365);
	setcookie("pphone", $_POST['phone'], time() + 3600 * 24 * 365);
	setcookie("paddress", $_POST['address'], time() + 3600 * 24 * 365);
	setcookie("pcity", $_POST['city'], time() + 3600 * 24 * 365);
	setcookie("pstate", $_POST['state'], time() + 3600 * 24 * 365);
	setcookie("pzip", $_POST['zip'], time() + 3600 * 24 * 365);
	session_start();
	ob_start();
	include('user/includes/functions.php');
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$company_name = $_POST['company_name'];
	$company_logo = $_POST['company_logo'];
	if (isset($_POST['gender'])) {
		$gender = $_POST['gender'];
	}

	$address = $_POST['address'];
	$city = $_POST['city'];
	$zip = $_POST['zip'];
	$state = $_POST['state'];

	if (isset($_POST['tobacco'])) {
		$tobbaco = $_POST['tobacco'];
	}

	$firstCharacter = substr($fname, 0, 1);
	$pass = $firstCharacter . $lname;
	$password = base64_encode($pass);
	$id = $_POST['id'];
	$coverage = $_POST['coverage'];
	$ncoverage = $_POST['coveragevalue'];
	$check_record = "SELECT * FROM user_info where email='$email'";
	$run = mysqli_query(con(), $check_record);
	$num_row = mysqli_num_rows($run);


	if ($num_row < 1) {
		$user_qry = "INSERT INTO user_info(fname, sname, email, phone, gender, password, address, city, zip, state,tobbaco) VALUES ('$fname', '$lname', '$email', '$phone', '$gender', '$password', '$address', '$city', '$zip', '$state','$tobbaco')";

		$plan_qry = "INSERT INTO user_plan(email, rates_id, price, coverage, company_name, company_logo) VALUES ('$email', '$id', '$ncoverage', '$coverage', '$company_name', '$company_logo')";
		if (mysqli_query(con(), $user_qry) and mysqli_query(con(), $plan_qry)) {

			/*/////////////////////////////////////////////////////////////////////////////////
                                                    Mail
                ///////////////////////////////////////////////////////////////////////////////////*/

			$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/user/login.php";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: info@protectmutual.com' . "\r\n";
			$headers .= 'Reply-To: noreply@protectmutual.com' . "\r\n";
			$headers .= "X-Mailer: PHP" . phpversion() . "\r\n";

			$msg1 = '<center>
	<div style="width:100%;">
		<div style="background: white; padding: 19px; border: 1px solid #e3e3e3; border-top: 5px solid orange; border-radius: 4px; -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05); box-shadow: inset 0 1px 1px rgba(0,0,0,.05);">
			<h3 style="text-align: center;">Protect  Mutual</h3>
		<a href="#"><img src="http://protectmutual.com/emailimages/pic.jpg" alt="" style="margin-right: -19px; margin-left: -19px; width: 100%;"> </a>               
				<p style="text-align: left;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab magnam qui animi minima eveniet explicabo sint saepe maxime minus expedita magni dolore dignissimos, quae neque! Tempora dolorem eum, doloribus qui.</p>
            <h1 class="text-center"><span style="font-family: Segoe UI Symbol;">&#128222;</span>
            <span style="color: orange"><b>855-996-0304</b></span></h1>
               <p class="text-center">Call us <span style="color: orange">before October is over</span> to cross this off your list.</p>
          		<div style="margin-left: -19px; margin-right: -19px; padding: 19px; background-color: #f5f5f5; border: 1px solid #e3e3e3; border-radius: 4px; -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05); box-shadow: inset 0 1px 1px rgba(0,0,0,.05);">
          		<h3 style="text-align:left;"><b>You applied with Protective Life:</b></h3>
          		<div style="background: white; padding: 19px; border: 1px solid #e3e3e3; border-radius: 4px; -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05); box-shadow: inset 0 1px 1px rgba(0,0,0,.05); display: flex; flex-wrap: wrap;">
               <table width="100%" style="text-align: center; font-size: small;">
               		<tr>
               			<th>COVERAGE</th>
               			<th>COMPANY</th>
               			<th>PREMIUM</th>
               		</tr>
               		<tr>
               			<td>' . $coverage . '</td>
               			<td>' . $company_name . '</td>
               			<td>' . $ncoverage . '</td>
               		</tr>

               	</table>
                 </div>
              <p>P.S. We can adjust these numbers with us over the phone!</p>
               </div>
      <section style="margin-top: 50px; text-align: left;">
			<a href="#"><img src="http://protectmutual.com/emailimages/facebook.png" alt="" width="30px"></a>
			<a href="#"><img src="http://protectmutual.com/emailimages/twitter.png" alt=""width="30px"></a>
			<a href="#"><img src="http://protectmutual.com/emailimages/insta.png" alt=""width="30px"> 
			<a href="#"><img src="http://protectmutual.com/emailimages/linked.png" alt=""width="30px"></a>
			<h5 style="color: orange;"><b>Protect Mutual</b></h5>
				<p>Life. Home. Auto. We can help with all your insurnace needs.</p>
				<p>Springfield, IL </p>
				<p>Manage preferences | Unsubscribe</p>
		</section> 

		</div>
	</div>
</center>';


			$msg2 = '<center><div style="width: 100%;">
		<div style="padding: 19px;">
			<h3 style="text-align: center;">Protect  Mutual</h3>
			<section style="text-align: left;">
			<p>' . $fname . ' ' . $lname . '!</p>
			<p>Your Account is created successfully in <b>Protect Mutual</b> the detail of your account is mentioned here; <b>Your Account:</b>' . $email . ' and <b> Password:</b> ' . $pass . '</p>
			<p><b>For your security, Make sure to delete this email after reading.</b></p>
			<p>Thanks,</p>
			<p>Protect Mutual Team</p>
			</section>

		</div>
	</div> </center>';


			mail($email, "Your Plan is Submitted successfully", $msg1, $headers);
			mail($email, "your Account is Successfully Created", $msg2, $headers);

			/*///////////////////////////////////////////////////////////////////////////////////
                                                    Mail Finished
                ////////////////////////////////////////////////////////////////////////////////////*/


			/*/////////////////////////////////////////////////////////////////////////////////
                                                   LOG IN
                ///////////////////////////////////////////////////////////////////////////////////*/

			$user_pass = base64_encode($pass);
			$sel_user = "SELECT * from user_info where BINARY email='$email' AND password='$user_pass'";

			$run_user = mysqli_query(con(), $sel_user);

			$check_user = mysqli_num_rows($run_user);
			$row = mysqli_fetch_array($run_user);
			if ($check_user == 1) {
				if ($row['status'] == 'Block') {
					echo "<script>alert('You are blocked. Please contact administrator');</script>";
				} else {
					$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
					setcookie("userss", "", time() - 3600);
					setcookie("userss", serialize($row), time() + 3600 * 24 * 365);
					$_SESSION['ruser'] = $row;
					$_SESSION['success'] = "You are successfully logged in";
					$headers = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
					$headers .= 'From: info@protectmutual.com' . "\r\n";
					$headers .= 'Reply-To: noreply@protectmutual.com' . "\r\n";
					$headers .= "X-Mailer: PHP" . phpversion() . "\r\n";



					$msg = '<center><div style="width: 100%;">
		    <div style="padding: 19px;">
			<h3 style="text-align: center;">Protect  Mutual</h3>
			<section style="text-align:left;">
			<p>' . $fname . ' ' . $lname . '!</p>
			<p>You have logged in <a href="' . $actual_link . '"><b>Protect Mutual</b></a> at ' . date("m-d-Y H:i:s") . ' email: ' . $email . ';</p>
			<p><b>For your security, If You have not logedin, so let us know or change your password.</b></p>
			<p>Thanks,</p>
			<p>Protect Mutual Team</p></section>
			</div>
			</div>
			</center>';

					mail($row['email'], "Logged in", $msg, $headers);

					/*	///////////////////////////////////////////////////////////////////////////////////////////////////////*/
					$qry = "SELECT * FROM user_plan where email='$email' ORDER BY id DESC LIMIT 1";
					$res = mysqli_query(con(), $qry);
					$result = mysqli_fetch_array($res);
					$productid = $result['id'];
					header('location:user/confirmation.php?productid=' . $productid);
					/*//////////////////////////////////////////////////////////////////////////////////////////////////////
                                    Redirect to PRoduct Page
     ///////////////////////////////////////////////////////////////////////////////////////////////////////*/
				}
			} else {

				echo "<script>alert('Your Credentials are Wrong');</script>";
			}
			/*/////////////////////////////////////////////////////////////////////////////////
                                                   LOGIN FINISHED
                ///////////////////////////////////////////////////////////////////////////////////*/
		} else {
			echo "<script>alert('Sorry Your Plan is not submited, please fill the form carefully and try again!');</script>";
			echo "<script>window.location.replace('index.php');</script>";
		}
	} else {
		$plan_qry = "INSERT INTO user_plan(email, rates_id, price, coverage, company_name, company_logo) VALUES ('$email', '$id', '$ncoverage', '$coverage','$company_name', '$company_logo')";
		if (mysqli_query(con(), $plan_qry)) {


			/*/////////////////////////////////////////////////////////////////////////////////
                                                    Mail
                ///////////////////////////////////////////////////////////////////////////////////*/

			$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/user/login.php";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: info@protectmutual.com' . "\r\n";
			$headers .= 'Reply-To: noreply@protectmutual.com' . "\r\n";
			$headers .= "X-Mailer: PHP" . phpversion() . "\r\n";

			$msg = '<center>
	<div style="width:100%;">
		<div style="background: white; padding: 19px; border: 1px solid #e3e3e3; border-top: 5px solid orange; border-radius: 4px; -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05); box-shadow: inset 0 1px 1px rgba(0,0,0,.05);">
			<h3 style="text-align: center;">Protect  Mutual</h3>
		<a href="#"><img src="http://protectmutual.com/emailimages/pic.jpg" alt="" style="margin-right: -19px; margin-left: -19px; width: 100%;"> </a>               
				<p style="text-align: left;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab magnam qui animi minima eveniet explicabo sint saepe maxime minus expedita magni dolore dignissimos, quae neque! Tempora dolorem eum, doloribus qui.</p>
            <h1 class="text-center"><span style="font-family: Segoe UI Symbol;">&#128222;</span>
            <span style="color: orange"><b>855-996-0304</b></span></h1>
               <p class="text-center">Call us <span style="color: orange">before October is over</span> to cross this off your list.</p>
          		<div style="margin-left: -19px; margin-right: -19px; padding: 19px; background-color: #f5f5f5; border: 1px solid #e3e3e3; border-radius: 4px; -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05); box-shadow: inset 0 1px 1px rgba(0,0,0,.05);">
          		<h3 style="text-align:left;"><b>You applied with Protective Life:</b></h3>
          		<div style="background: white; padding: 19px; border: 1px solid #e3e3e3; border-radius: 4px; -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05); box-shadow: inset 0 1px 1px rgba(0,0,0,.05); display: flex; flex-wrap: wrap;">
               <table width="100%" style="text-align: center; font-size: small;">
               		<tr>
               			<th>COVERAGE</th>
               			<th>COMPANY</th>
               			<th>PREMIUM</th>
               		</tr>
               		<tr>
               			<td>' . $coverage . '</td>
               			<td>' . $company_name . '</td>
               			<td>' . $ncoverage . '</td>
               		</tr>

               	</table>
                 </div>
              <p>P.S. We can adjust these numbers with us over the phone!</p>
               </div>
      <section style="margin-top: 50px; text-align: left;">
			<a href="#"><img src="http://protectmutual.com/emailimages/facebook.png" alt="" width="30px"></a>
			<a href="#"><img src="http://protectmutual.com/emailimages/twitter.png" alt=""width="30px"></a>
			<a href="#"><img src="http://protectmutual.com/emailimages/insta.png" alt=""width="30px"> 
			<a href="#"><img src="http://protectmutual.com/emailimages/linked.png" alt=""width="30px"></a>
			<h5 style="color: orange;"><b>Protect Mutual</b></h5>
				<p>Life. Home. Auto. We shall help you get it right.</p>
				<p>50 W 23rd St 9th Floor, New York, NY 10010</p>
				<p>Manage preferences | Unsubscribe</p>
		</section> 

		</div>
	</div>
</center>';
			mail($email, "Your Plan is Submitted successfully", $msg, $headers);
			/*///////////////////////////////////////////////////////////////////////////////////
                                                    Mail Finished
                ////////////////////////////////////////////////////////////////////////////////////*/

			/*/////////////////////////////////////////////////////////////////////////////////
                                                   LOG IN
                ///////////////////////////////////////////////////////////////////////////////////*/

			$user_pass = base64_encode($pass);
			$sel_user = "SELECT * from user_info where BINARY email='$email'";

			$run_user = mysqli_query(con(), $sel_user);

			$check_user = mysqli_num_rows($run_user);
			$row = mysqli_fetch_array($run_user);
			if ($check_user == 1) {
				if ($row['status'] == 'Block') {
					echo "<script>alert('You are blocked. Please contact administrator');</script>";
				} else {
					$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
					setcookie("userss", "", time() - 3600);
					setcookie("userss", serialize($row), time() + 3600 * 24 * 365);
					$_SESSION['ruser'] = $row;
					$_SESSION['success'] = "You are successfully logged in";
					$headers = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
					$headers .= 'From: info@protectmutual.com' . "\r\n";
					$headers .= 'Reply-To: noreply@protectmutual.com' . "\r\n";
					$headers .= "X-Mailer: PHP" . phpversion() . "\r\n";




					$msg = '<center><div style="width: 100%;">
		    <div style="padding: 19px;">
			<h3 style="text-align: center;">Protect  Mutual</h3>
			<section style="text-align: left;">
			<p>' . $fname . ' ' . $lname . '!</p>
			<p>You have logged in <a href="' . $actual_link . '"><b>Protect Mutual</b></a> at ' . date("m-d-Y H:i:s") . ' email: ' . $email . ';</p>
			<p><b>For your security, If You have not logedin, so let us know or change your password.</b></p>
			<p>Thanks,</p>
			<p>Protect Mutual Team</p></section>
			</div>
			</div>
			</center>';

					mail($row['email'], "Logged in", $msg, $headers);
					/*///////////////////////////////////////////////////////////////////////////////////////////////////////*/
					$qry = "SELECT * FROM user_plan where email='$email' ORDER BY id DESC LIMIT 1";
					$res = mysqli_query(con(), $qry);
					$result = mysqli_fetch_array($res);
					$productid = $result['id'];
					header('location:user/confirmation.php?productid=' . $productid);
					/*//////////////////////////////////////////////////////////////////////////////////////////////////////
                                    Redirect to PRoduct Page
     ///////////////////////////////////////////////////////////////////////////////////////////////////////*/
				}
			} else {

				echo "<script>alert('Your Credentials are Wrong');</script>";
			}
			/*/////////////////////////////////////////////////////////////////////////////////
                                                   LOGIN FINISHED
                ///////////////////////////////////////////////////////////////////////////////////*/
		} else {
			echo "<script>alert('Sorry Your Plan is not submited, please fill the form carefully and try again!');</script>";
			echo "<script>window.location.replace('index.php');</script>";
		}
	}
}