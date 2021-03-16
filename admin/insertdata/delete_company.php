<?php 
include('../includes/functions.php');
$company_id=$_POST['company_id'];
$exist="DELETE FROM company where id='$company_id'";
$del_company_rates="DELETE FROM company_rates WHERE company_id='$company_id'";
$del_company_year="DELETE FROM company_year WHERE company_id='$company_id'";
	if(mysqli_query(con(), $exist) AND mysqli_query(con(), $del_company_rates) AND mysqli_query(con(), $del_company_year))
		{
	echo 1;
}
else{
	echo 0;
}
 ?>