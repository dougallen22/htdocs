<?php
//connection
function con()
{
	$con = mysqli_connect("localhost", "root", "", "protect_mutual") or die;
	return $con;
}

//verify admin credentials
function verify_login($email, $password)
{

	$user_pass = base64_encode($password);
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
			echo "<script>window.location='index.php'</script>";
		}
	} else {

		echo "<script>alert('Your Credentials are Wrong');</script>";
	}
}
function session_open_redirect()
{
	if (!isset($_POST['login']) && isset($_SESSION['ruser'])) {
		return header('location:index.php');
	}
	if (isset($_COOKIE['userss'])) {
		return header('location:index.php');
	}
}
function session_alldestroy()
{
	if (!isset($_POST['login']) && isset($_SESSION['ruser'])) {
		return session_destroy();
	}
}
function check_session()
{
	ob_start();
	if (!isset($_SESSION['ruser'])) {
		header('location:login.php');
	}
}
function user_logout()
{
	$_SESSION = array();

	//For cookies you do similar, from PHP docs:
	//http://php.net/manual/en/function.setcookie.php#73484

	if (isset($_SERVER['HTTP_COOKIE'])) {
		$cookies = explode(';', $_SERVER['HTTP_COOKIE']);
		foreach ($cookies as $cookie) {
			// echo $cookie;
			$parts = explode('=', $cookie);
			$name = trim($parts[0]);

			if ($name == 'userss' || $name == 'PHPSESSID') {

				setcookie($name, serialize($_SESSION['ruser']), time() - 1000);
				setcookie($name, serialize($_SESSION['ruser']), time() - 1000, '/');
			}
		}
	}
	session_destroy();
	header('location:login.php');
}
function get_user_row()
{
	$id = $_SESSION['ruser']['id'];
	$sel_user = "select * from user_info where id='$id'";

	$run_user = mysqli_query(con(), $sel_user);

	$check_user = mysqli_num_rows($run_user);
	$row = mysqli_fetch_array($run_user);
	return $row;
}

function change_password()
{
	$id = $_SESSION['ruser']['id'];
	$old_pass = md5($_POST['old_pass']);
	$new_pass = $_POST['new_pass'];
	$new_pass_again = $_POST['new_pass_again'];



	$get_real_pass = "select * from admin_login where id='$id' AND password='$old_pass'";

	$run_real_pass = mysqli_query(con(), $get_real_pass);

	$check_pass = mysqli_num_rows($run_real_pass);

	if ($check_pass == 0) {

		echo "<script>alert('Your Current Password is not valid, try again')</script>";
		exit();
	} else if ($new_pass != $new_pass_again) {

		echo "<script>alert('New Password did not match, try again')</script>";
		exit();
	} else {
		$hash = md5($new_pass);
		$update_pass = "update admin_login SET password='$hash' where id='$id'";
		$run_pass   = mysqli_query(con(), $update_pass);
		if ($run_pass) {
			session_destroy();
			echo "<script>alert('Your Password has been successfully changed')</script>";

			echo "<script>window.location='login.php'</script>";
		}
	}
}
function success_destroy()
{

	if (isset($_SESSION['success'])) {

		echo '<div class="row"><div class="col-md-2"></div><div class="col-md-8 text-center"><div class="alert alert-success login-success text-center"><b>You are logged in successfully</b></div></div><div class="col-md-2"></div></div>';

		unset($_SESSION['success']);
	}
}


function get_user_name($user_id, $connect)
{
	$query = "SELECT * FROM employee_info WHERE id = '$user_id'";

	$statement = mysqli_query($connect, $query);
	$result = mysqli_fetch_array($statement);

	return $result['user_name'];
}

function set_cookie()
{
	session_start();
	$data = $_SESSION['ruser'];
	setcookie('login', serialize($data), time() + 60 * 60 * 24 * 30 * 12);
}

function run_cookie()
{
	if (isset($_COOKIE['login'])) {
		$data = unserialize($_COOKIE['login'], ["allowed_classes" => false]);
		$user_name = $data['email'];
		$user_pass = $data['password'];

		if (!isset($_SESSION['ruser'])) {
			$sel_user = "SELECT * from user_info where BINARY email='$user_name' AND password='$user_pass'";
			$run_user = mysqli_query(con(), $sel_user);
			$check_user = mysqli_num_rows($run_user);
			$row = mysqli_fetch_array($run_user);
			session_start();
			return $_SESSION['ruser'] = $row;
		}
	}
}

run_cookie();

function del_cookie()
{
	setcookie('login', '', time() - 3600);
}