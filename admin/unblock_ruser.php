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
$select_user="select * from user_info where id='$id'";
$run_select_user=mysqli_query(con(),$select_user);
if(mysqli_num_rows($run_select_user)==0){
     echo "<script>alert('OOPS something went wrong. Please try again');</script>";
	echo "<script>window.location='all_users.php';</script>"; 
    
}
else{
    
       $q="update user_info set status='',updated_by='$username' where id='$id'";
$r=mysqli_query(con(),$q);
if($r){
	echo "<script>alert('User Unblocked Successfully');</script>";
	echo "<script>window.location='all_users.php';</script>";
}
else{
  echo "<script>alert('OOPS something went wrong. Please try again');</script>";
	echo "<script>window.location='all_users.php';</script>";  
} 
   
}


?>