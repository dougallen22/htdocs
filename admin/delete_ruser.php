<?php
 session_start();
 ob_start();
    include('includes/functions.php'); 
      check_session();

$id=$_GET['t_id'];
$email=$_GET['email'];
$username=$_SESSION['user']['user_name'];
$user_type=$_SESSION['user']['user_type'];
$validated_by=$username.' - '.$user_type;
$time=date('m-d-Y H:m:s');
$select_user="select * from user_info where id='$id' AND email='$email'";
$run_select_user=mysqli_query(con(),$select_user);
if(mysqli_num_rows($run_select_user)==0){
     echo "<script>alert('OOPS something went wrong. Please try again');</script>";
	echo "<script>window.location='all_users.php';</script>"; 
    
}
else{
       $q="delete from user_info where id='$id'";
       $q1="delete from user_plan where email='$email'";
$r=mysqli_query(con(),$q);
$r1=mysqli_query(con(),$q1);
if($r && $r1){
	echo "<script>alert('User Deleted Successfully');</script>";
	echo "<script>window.location='all_users.php';</script>";
}
else{
  echo "<script>alert('OOPS something went wrong. Please try again');</script>";
	echo "<script>window.location='all_users.php';</script>";  
} 
}


?>