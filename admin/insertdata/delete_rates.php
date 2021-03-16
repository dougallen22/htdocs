<?php 
include('../includes/functions.php');
$rates_id=$_POST['rates_id'];
$exist="DELETE FROM new_rates where id='$rates_id'";
$del_company_rates="DELETE FROM company_rates WHERE rates_id='$rates_id'";
	if(mysqli_query(con(), $exist) AND mysqli_query(con(), $del_company_rates))
		{
	echo 1;
}
else{
	echo 0;
}
 ?>