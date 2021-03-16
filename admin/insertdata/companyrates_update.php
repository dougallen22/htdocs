<?php 
    include('../includes/functions.php');
    $get_company_id=$_POST['get_company_id'];
    $get_year_value=$_POST['get_year_value'];
    $get_smoker=$_POST['get_smoker_value'];
    $get_gender=$_POST['get_gender_value'];
	$name=$_POST['company'];
	$index=$_POST['index'];
	$age=$_POST['person_age'];
	$gender=$_POST['gender'];
	$smoker=$_POST['smoker'];
	$year=$_POST['year'];
	$company_name=$_POST['company_name'];
	for ($i=0; $i < count($name); $i++) {
	$qry="UPDATE company_rates SET company_id='$company_name', rates_id='$index[$i]', age='$age', smoker='$smoker', gender='$gender', year='$year',value='$name[$i]' WHERE company_id='$get_company_id' AND year='$get_year_value' AND rates_id='$index[$i]' AND smoker='$get_smoker' AND gender='$get_gender' AND age='$age'";
	mysqli_query(con(), $qry);	
	}
	$year="UPDATE company_year SET company_id='$company_name', age='$age', smoker='$smoker', gender='$gender', year='$year' WHERE company_id='$get_company_id' AND year='$get_year_value' AND smoker='$get_smoker' AND gender='$get_gender' AND age='$age'";
	if(mysqli_query(con(), $year)){
	echo 1;
}
	else{
		echo 0;
	}
	
	 ?>