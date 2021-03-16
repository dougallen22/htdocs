<?php 

if(isset($_POST['Insert_rates'])){
$rate=$_POST['rates'];
$exist="SELECT rates FROM new_rates where rates='$rate'";
$res=mysqli_query(con(), $exist);
if(mysqli_num_rows($res)>0){
	echo "This Rate is Alreay Inserted";
}
else{
	$qry="INSERT INTO new_rates(rates) VALUES ('$rate')";
	if(mysqli_query(con(), $qry));
		{
	echo "Your Rate is Inserted Successfully";
}
}
}
/*///////////////////////////////////////////////////////////////////*/

if(isset($_POST['Insert_company'])){
$company_name=$_POST['company_name'];
$company_logo=$_FILES['company_logo']['name'];
$exist="SELECT company_name FROM company where company_name='$company_name'";
$res=mysqli_query(con(), $exist);
if(mysqli_num_rows($res)>0){
	echo "This Company is Alreay Inserted";
}
else{
	$qry="INSERT INTO company(company_name, company_logo) VALUES ('$company_name', '$company_logo')";
	if(mysqli_query(con(), $qry));
		{
	echo "Your Company is Inserted Successfully";
}
}
}
/*///////////////////////////////////////////////////////////////////////////////*/
if (isset($_POST['insert_multirates'])) {
	$name=$_POST['company'];
	$index=$_POST['index'];
	$gender=$_POST['gender'];
	$smoker=$_POST['smoker'];
	$year=$_POST['year'];
	$company_name=$_POST['company_name'];
	for ($i=0; $i < count($name); $i++) {
	$qry="INSERT INTO company_rates(company_id, rates_id, value) VALUES ('$company_name','$index[$i]','$gender','$smoker','$year','$name[$i]')";
		mysqli_query(con(), $qry);		
	}
}




 ?>