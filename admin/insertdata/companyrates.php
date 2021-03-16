<?php 
    include('../includes/functions.php'); 
	$name=$_POST['company'];
	$index=$_POST['index'];
	$age=$_POST['age'];
	$gender=$_POST['gender'];
	$smoker=$_POST['smoker'];
	$year=$_POST['year'];
	$company_name=$_POST['company_name'];

	$exist="SELECT * FROM company_year where company_id='$company_name' AND year='$year' AND gender='$gender' AND smoker='$smoker' AND age='$age'";
	$res=mysqli_query(con(), $exist);
	if(mysqli_num_rows($res)>0){
		echo 0;
	}
else{

	for ($i=0; $i < count($name); $i++) {
	$qry="INSERT INTO company_rates(company_id, rates_id, age, smoker, gender, year, value) VALUES ('$company_name','$index[$i]','$age','$smoker','$gender','$year','$name[$i]')";
	mysqli_query(con(), $qry);	
	}
	$year="INSERT INTO company_year(company_id, age, smoker, gender, year) VALUES('$company_name','$age', '$smoker', '$gender', '$year')";
	mysqli_query(con(), $year);
	echo 1;
	}
	 ?>