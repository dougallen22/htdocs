<?php
 session_start();
 ob_start();
    include('includes/functions.php'); 
      check_session();

$id=$_GET['t_id'];
$select_user="select * from user_plan where id='$id'";
$run_select_user=mysqli_query(con(),$select_user);
if(mysqli_num_rows($run_select_user)==0){
     echo "<script>alert('OOPS something went wrong. Please try again');</script>";
	echo "<script>window.location='all_plans.php';</script>"; 
    
}
else{
       $q="delete from user_plan where id='$id'";
      
$r=mysqli_query(con(),$q);
if($r){
	echo "<script>alert('Plan Deleted Successfully');</script>";
	echo "<script>window.location='all_plans.php';</script>";
}
else{
  echo "<script>alert('OOPS something went wrong. Please try again');</script>";
	echo "<script>window.location='all_plans.php';</script>";  
} 
}


?>