<?php
 session_start();
 ob_start();
    include('includes/functions.php'); 
      check_session();

$id=$_GET['data'];
$em=$_SESSION['ruser']['email'];
$select_row="select * from user_plan where id='$id' and email='$em'";
$run_select_row=mysqli_query(con(),$select_row);

if(mysqli_num_rows($run_select_row)==0){
     echo "<script>alert('OOPS something went wrong. Please try again');</script>";
	echo "<script>window.location='index.php';</script>"; 
    
}
  
    else{
       $q="delete from user_plan where id='$id'";
$r=mysqli_query(con(),$q);
if($r){
	echo "<script>alert('Row Deleted Successfully');</script>";
	echo "<script>window.location='index.php';</script>";
}
else{
  echo "<script>alert('OOPS something went wrong. Please try again');</script>";
	echo "<script>window.location='index.php';</script>";  
} 
    }



?>