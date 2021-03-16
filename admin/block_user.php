<?php
 session_start();
 ob_start();
    include('includes/functions.php'); 
    check_session();

$id=$_GET['t_id'];
$username=$_SESSION['user']['user_name'];
$user_type=$_SESSION['user']['user_type'];
$validated_by=$username.' - '.$user_type;
$time=date('m-d-Y H:m:s');
$select_user="select * from login_credentials where id='$id'";
$run_select_user=mysqli_query(con(),$select_user);
if(mysqli_num_rows($run_select_user)==0){
     echo "<script>alert('OOPS something went wrong. Please try again');</script>";
	echo "<script>window.location='users_info.php';</script>"; 
    
}
else{
    $user_row=mysqli_fetch_array($run_select_user);
     if(($user_row['user_type']=='admin') && $user_type=='admin'){
        header('location:users_info.php');
    }
    elseif(($user_row['user_type']=='secondary admin') && $user_type=='secondary admin'){
        header('location:users_info.php');
    }
    elseif(($user_row['user_type']=='secondary admin' ) && $user_type=='admin'){
        header('location:users_info.php');
    }
    else{
       $q="update login_credentials set status='Block',updated_by='$username' where id='$id'";
$r=mysqli_query(con(),$q);
if($r){
	echo "<script>alert('Secondary Admin Blocked Successfully');</script>";
	echo "<script>window.location='users_info.php';</script>";
}
else{
  echo "<script>alert('OOPS something went wrong. Please try again');</script>";
	echo "<script>window.location='users_info.php';</script>";  
} 
    }
}



?>