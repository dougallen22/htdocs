<?php 
 session_start();
 ob_start();
    include('includes/functions.php'); 
    check_session(); 
	// connect to database
$id=$_SESSION['user']['id'];
if($_FILES['image']['name']!=''){
    $img=$_FILES['image']['name'];
    $tmp=$_FILES['image']['tmp_name'];
    move_uploaded_file($tmp, "dist/img/".$img);
   
 
     $query="update login_credentials SET profile_pic='$img' where id='$id' ";
$run=mysqli_query(con(),$query);
if($run)
{
	echo "success";
}
else{
    echo "fail";
}
}

?>