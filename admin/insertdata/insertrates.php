<?php 
 include('../includes/functions.php');
$number = count($_POST["rates"]);   
      for($i=0; $i<$number; $i++)  
      {  
       $rate=mysqli_real_escape_string(con(), $_POST["rates"][$i]);
     
               $exist="SELECT rates FROM new_rates where rates='$rate'";
$res=mysqli_query(con(), $exist);
if(mysqli_num_rows($res)>0){
	echo $rate;
}  
else{
	$qry="INSERT INTO new_rates(rates) VALUES ('$rate')";
mysqli_query(con(), $qry);

}
            
      } 
      	echo '';
      	

 ?>