<?php
//connection
function con(){
$con = mysqli_connect("localhost","root","","protect_mutual") or die;
    return $con;
}

//verify admin credentials
function verify_login($username,$password){
   
	$user_pass = base64_encode($password);
	$sel_user= "select * from login_credentials where BINARY user_name='$username' AND password='$user_pass'";
	
    $run_user = mysqli_query(con(), $sel_user);
	
	$check_user = mysqli_num_rows($run_user);
	$row=mysqli_fetch_array($run_user);
	if($check_user==1){
	    if($row['status']=='Block'){
	        echo "<script>alert('You are blocked. Please contact administrator');</script>";
	    }
	    else{
	$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$_SESSION['user']=$row;
	$_SESSION['success']="You are successfully logged in";
		$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: info@protectmutual.com' ."\r\n";
$headers .= 'Reply-To: noreply@protectmutual.com' ."\r\n";
$headers .= "X-Mailer: PHP". phpversion() ."\r\n";
 


  
        $msg = "You have logged in <a href=".$actual_link."><b>Protect Mutual</b></a> at ".date('m-d-Y H:i:s')."<br> <br>Username: ".$username;

        mail($row['email'],"Logged in",$msg,$headers);
		echo "<script>window.location='index.php'</script>";
		}
	}
		else{
			
			echo "<script>alert('Your Credentials are Wrong');</script>";
			
			}
}
function session_open_redirect(){
      if(!isset($_POST['login']) && isset($_SESSION['user'])){
return header('location:index.php');
	}
}
function session_alldestroy(){
    if(!isset($_POST['login']) && isset($_SESSION['user'])){
return session_destroy();
	}
}
function check_session(){
    ob_start();
    if(!isset($_SESSION['user'])){
header('location:login.php');
	}
}
function user_logout(){
       
        session_destroy();
        header('location:login.php');
        
   
    
}
function get_user_row(){
    $id=$_SESSION['user']['id'];
    $sel_user= "select * from login_credentials where id='$id'";
	
    $run_user = mysqli_query(con(), $sel_user);
	
	$check_user = mysqli_num_rows($run_user);
	$row=mysqli_fetch_array($run_user);
    return $row;
}

function change_password(){
       $id = $_SESSION['user']['id'];   
	   $old_pass = md5($_POST['old_pass']);
	   $new_pass = $_POST['new_pass'];
	   $new_pass_again =$_POST['new_pass_again'];
       
       
	   
	   $get_real_pass = "select * from admin_login where id='$id' AND password='$old_pass'";
	   
	   $run_real_pass = mysqli_query(con(), $get_real_pass);
	   
	   $check_pass = mysqli_num_rows($run_real_pass);
	   
	   if($check_pass==0){
		   
		   echo "<script>alert('Your Current Password is not valid, try again')</script>";
		   exit();
		   
		   }
		   else if($new_pass!=$new_pass_again){
			   
			   echo "<script>alert('New Password did not match, try again')</script>";
			   exit();
			   
			   }
			   else{
				   $hash=md5($new_pass);
				   $update_pass= "update admin_login SET password='$hash' where id='$id'";
				   $run_pass   = mysqli_query(con(), $update_pass);
				   if($run_pass){
                        session_destroy();
				   echo "<script>alert('Your Password has been successfully changed')</script>";
                  
				   echo "<script>window.location='login.php'</script>";		   
                   }
			   }
}
function success_destroy(){
        
          if(isset($_SESSION['success'])){
              
           echo '<div class="row"><div class="col-md-2"></div><div class="col-md-8 text-center"><div class="alert alert-success login-success text-center"><b>You are logged in successfully</b></div></div><div class="col-md-2"></div></div>';
        
         unset($_SESSION['success']);
     }  
 }
 
 
function get_user_name($user_id, $connect)
{
	$query = "SELECT * FROM employee_info WHERE id = '$user_id'";

	$statement = mysqli_query($connect,$query);
	$result = mysqli_fetch_array($statement);

		return $result['user_name'];
	
}

?>








