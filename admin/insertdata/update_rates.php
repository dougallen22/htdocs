<?php 
include('../includes/functions.php');
$rates_id=$_POST['rates_id'];
$rates_value=$_POST['rates_value'];
$exist="UPDATE new_rates SET rates='$rates_value' where id='$rates_id'";
	if(mysqli_query(con(), $exist))
		{
	echo 1;
}
else{
	echo 0;
}
 ?>
