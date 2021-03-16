<?php
 session_start();
 ob_start();
    include('includes/functions.php'); 
    check_session();
   if($_SESSION['user']['user_type']=='admin' || $_SESSION['user']['user_type']=='secondary admin'){ 

$id=$_GET['q_id'];


       $q="update admin_support set status='Solved' where id='$id'";
$r=mysqli_query(con(),$q);
if($r){
	echo "<script>alert('Query is marked as solved successfully');</script>";
	echo "<script>window.location='users_queries.php';</script>";
}
else{
  echo "<script>alert('OOPS something went wrong. Please try again');</script>";
	echo "<script>window.location='users_info.php';</script>";  
} 
    }

else{
    header('location:index.php');
}

?>