<?php 
include('../includes/functions.php');
$company_name=$_POST['company_name'];
$company_logo=$_FILES['company_logo']['name'];
$temp_name=$_FILES['company_logo']['tmp_name'];
$exist="SELECT * FROM company where company_name='$company_name'";
$res=mysqli_query(con(), $exist);
if(mysqli_num_rows($res)>0){
	echo 0;
}
else{
	$qry="INSERT INTO company(company_name, company_logo) VALUES ('$company_name', '$company_logo')";
	if(mysqli_query(con(), $qry));
		{
	move_uploaded_file($temp_name, "../images/".$company_logo);
	echo 1;
}
}
 ?>