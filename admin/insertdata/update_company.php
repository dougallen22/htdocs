<?php 
include('../includes/functions.php');
$company_id=$_POST['company_idu'];
$company_value=$_POST['company_valueu'];
$company_logo=$_FILES['company_logou']['name'];
$tmp=$_FILES['company_logou']['tmp_name'];
move_uploaded_file($tmp, "../images/".$company_logo);
$exist="UPDATE company SET company_name='$company_value', company_logo='$company_logo' where id='$company_id'";
	if(mysqli_query(con(), $exist))
		{
	echo 1;
}
else{
	echo 0;
}
 ?>
