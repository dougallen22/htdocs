<?php 
    include('../includes/functions.php');
    $get_company_id=$_POST['company_id'];
    $get_year_value=$_POST['year'];
    $get_smoker=$_POST['smoker'];
    $get_gender=$_POST['gender'];
    $get_age=$_POST['age'];

   $del_company_rates="DELETE FROM company_rates WHERE company_id='$get_company_id' AND year='$get_year_value' AND  smoker='$get_smoker' AND gender='$get_gender' AND age='$get_age'";

   $del_company_year="DELETE FROM company_year WHERE company_id='$get_company_id' AND year='$get_year_value' AND  smoker='$get_smoker' AND gender='$get_gender' AND age='$get_age'";
   	if(mysqli_query(con(), $del_company_rates) AND mysqli_query(con(), $del_company_year))
   	{
 	echo 1;
   	}
   	else{
   		echo 0;
   	}
 ?>