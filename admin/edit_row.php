<?php
 session_start();
 ob_start();
    include('includes/functions.php'); 
    check_session();
   $id=$_GET['t_id'];
$select_row="select * from rates where id='$id'";
$run_select_row=mysqli_query(con(),$select_row);
if(mysqli_num_rows($run_select_row)==0){
 header('location:index.php');   
}
    ?>
<!DOCTYPE html>
<html>
<title>Update Information</title>
<?php include('head.php'); ?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Update Rates
        <small>Control panel</small>
      </h1>
    
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Update Rates</li>
      </ol>
    </section>
    <br>
<section class="content">

       <div class="row">
       	
       	<div class="col-md-12">
       <div class="panel panel-info ">
    <div class="panel-heading text-center">Update information</div>
    <div class="panel-body">
 
       <div class="form-group">  
                     <form  method="post">  
                          <div class="table-responsive">  
                               <table class="table table-bordered"> 
                               <?php
$row=mysqli_fetch_array($run_select_row);
?>
 <input type="hidden" name="r_iddd" value="<?php echo $row['id']; ?>" >
                                 <tr>
                                     <th>Age :</th><td><input type="number" step="1" min="1" name="age" placeholder="Age" class="form-control" required="" value="<?php echo str_replace(' ', '', $row['age']); ?>" /></td>
                                 <th>Gender :</th><td><select name="gender" class="form-control"><option <?php if($row['gender']=='MALE'){ echo "selected"; } ?> value="MALE">MALE</option><option <?php if($row['gender']=='FEMALE'){ echo "selected"; } ?> value="FEMALE">FEMALE</option></select></td>
                                 <th>Company Name :</th><td><input type="text" name="company_name" placeholder="Comapnay Name" class="form-control" required="" value="<?php echo $row['company_name']; ?>" /></td>
                                 
                                      <th>Smoker :</th><td><select name="smoker" class="form-control"><option <?php if($row['smoker']=='YES'){ echo "selected"; } ?> value="YES">Yes</option><option <?php if($row['smoker']=='No'){ echo "selected"; } ?> value="No">No</option></select></td>
                                 </tr>
               <tr>
                 <th>$3,000 :</th><td><input type="text" name="n3000" class="form-control" required="" value="<?php echo str_replace(' ', '', $row['n3000']); ?>" /></td>
                <th>$4,000 :</th><td><input type="text" name="n4000" class="form-control" required="" value="<?php echo str_replace(' ', '', $row['n4000']); ?>" /></td>
                <th>$5,000 :</th><td><input type="text" name="n5000" class="form-control" required="" value="<?php echo str_replace(' ', '', $row['n5000']); ?>" /></td>
                <th>$6,000 :</th><td><input type="text" name="n6000" class="form-control" required="" value="<?php echo str_replace(' ', '', $row['n6000']); ?>" /></td>
                </tr>
                
                <tr>
                <th>$7,000 :</th><td><input type="text" name="n7000" class="form-control" required="" value="<?php echo str_replace(' ', '', $row['n7000']); ?>" /></td>
                <th>$8,000 :</th><td><input type="text" name="n8000" class="form-control" required="" value="<?php echo str_replace(' ', '', $row['n8000']); ?>" /></td>
                <th>$9,000 :</th><td><input type="text" name="n9000" class="form-control" required="" value="<?php echo str_replace(' ', '', $row['n9000']); ?>" /></td>
                <th>$10,000 :</th><td><input type="text" name="n10000" class="form-control" required="" value="<?php echo str_replace(' ', '', $row['n10000']); ?>" /></td>
                </tr>
                
                <tr>
                <th width="8%">$11,000 :</th><td><input type="text" name="n11000" class="form-control" required="" value="<?php echo str_replace(' ', '', $row['n11000']); ?>" /></td>
                <th width="8%">$12,000 :</th><td><input type="text" name="n12000" class="form-control" required="" value="<?php echo str_replace(' ', '', $row['n12000']); ?>" /></td>
                <th width="8%">$13,000 :</th><td><input type="text" name="n13000" class="form-control" required="" value="<?php echo str_replace(' ', '', $row['n13000']); ?>" /></td>
                <th width="8%">$14,000 :</th><td><input type="text" name="n14000" class="form-control" required="" value="<?php echo str_replace(' ', '', $row['n14000']); ?>" /></td>
                </tr>
                <tr>
                <th>$15,000 :</th><td><input type="text" name="n15000" class="form-control" required="" value="<?php echo str_replace(' ', '', $row['n15000']); ?>" /></td>
                <th>$16,000 :</th><td><input type="text" name="n16000" class="form-control" required="" value="<?php echo str_replace(' ', '', $row['n16000']); ?>" /></td>
                <th>$17,000 :</th><td><input type="text" name="n17000" class="form-control" required="" value="<?php echo str_replace(' ', '', $row['n17000']); ?>" /></td>
                <th>$18,000 :</th><td><input type="text" name="n18000" class="form-control" required="" value="<?php echo str_replace(' ', '', $row['n18000']); ?>" /></td>
                </tr>
                <tr>
                <th>$19,000 :</th><td><input type="text" name="n19000" class="form-control" required="" value="<?php echo str_replace(' ', '', $row['n19000']); ?>" /></td>
                <th>$20,000 :</th><td><input type="text" name="n20000" class="form-control" required="" value="<?php echo str_replace(' ', '', $row['n20000']); ?>" /></td>
                <th>$25,000 :</th><td><input type="text" name="n25000" class="form-control" required="" value="<?php echo str_replace(' ', '', $row['n25000']); ?>" /></td>
                <th>$30,000 :</th><td><input type="text" name="n30000" class="form-control" required="" value="<?php echo str_replace(' ', '', $row['n30000']); ?>" /></td>
                </tr>
                <tr>
                <th>$35,000 :</th><td><input type="text" name="n35000" class="form-control" required="" value="<?php echo str_replace(' ', '', $row['n35000']); ?>" /></td>
                <th>$40,000 :</th><td><input type="text" name="n40000" class="form-control" required="" value="<?php echo str_replace(' ', '', $row['n40000']); ?>" /></td>
                <th>$45,000 :</th><td><input type="text" name="n45000" class="form-control" required="" value="<?php echo str_replace(' ', '', $row['n45000']); ?>" /></td>
                <th>$50,000 :</th><td><input type="text" name="n50000" class="form-control" required="" value="<?php echo str_replace(' ', '', $row['n50000']); ?>" /></td>
                </tr>
                
                
                
                              
                              
                                    
                                   
                               </table>  
                               <input type="submit" name="update_rates" id="submit" class="btn btn-info" value="Update" />  
                          </div>  
                     </form>  
                </div> </div>
  
  </div>
       </div>   
       
      </div> 
      </section>
      </div> 
    

   <?php  
  if(isset($_POST['update_rates'])){
    $username=$_SESSION['user']['user_name'];
    $user_type=$_SESSION['user']['user_type'];
    $updated_by=$username."-".$user_type;
    $id = mysqli_real_escape_string(con(), $_POST['r_iddd']); 
    $age = mysqli_real_escape_string(con(), $_POST['age']); 
    $gender = mysqli_real_escape_string(con(), $_POST['gender']); 
    $company_name = mysqli_real_escape_string(con(), $_POST['company_name']); 
    $n3000 = mysqli_real_escape_string(con(), $_POST['n3000']);
    $n4000 = mysqli_real_escape_string(con(), $_POST['n4000']); 
    $n5000 = mysqli_real_escape_string(con(), $_POST['n5000']); 
    $n6000 = mysqli_real_escape_string(con(), $_POST['n6000']); 
    $n7000 = mysqli_real_escape_string(con(), $_POST['n7000']); 
    $n8000 = mysqli_real_escape_string(con(), $_POST['n8000']); 
    $n9000 = mysqli_real_escape_string(con(), $_POST['n9000']); 
    $n10000 = mysqli_real_escape_string(con(), $_POST['n10000']); 
    $n11000 = mysqli_real_escape_string(con(), $_POST['n11000']); 
    $n12000 = mysqli_real_escape_string(con(), $_POST['n12000']); 
    $n13000 = mysqli_real_escape_string(con(), $_POST['n13000']); 
    $n14000 = mysqli_real_escape_string(con(), $_POST['n14000']); 
    $n15000 = mysqli_real_escape_string(con(), $_POST['n15000']); 
    $n16000 = mysqli_real_escape_string(con(), $_POST['n16000']); 
    $n17000 = mysqli_real_escape_string(con(), $_POST['n17000']); 
    $n18000 = mysqli_real_escape_string(con(), $_POST['n18000']); 
    $n19000 = mysqli_real_escape_string(con(), $_POST['n19000']); 
    $n20000 = mysqli_real_escape_string(con(), $_POST['n20000']); 
    $n25000 = mysqli_real_escape_string(con(), $_POST['n25000']); 
    $n30000 = mysqli_real_escape_string(con(), $_POST['n30000']); 
    $n35000 = mysqli_real_escape_string(con(), $_POST['n35000']);
    $n40000 = mysqli_real_escape_string(con(), $_POST['n40000']); 
    $n45000 = mysqli_real_escape_string(con(), $_POST['n45000']);
    $n50000 = mysqli_real_escape_string(con(), $_POST['n50000']);
    $smoker = mysqli_real_escape_string(con(), $_POST['smoker']);
    $update_rates="update rates set age='$age',gender='$gender',company_name='$company_name',n3000='$n3000',n4000='$n4000',n5000='$n5000',n6000='$n6000',n7000='$n7000',n8000='$n8000',n9000='$n9000',n10000='$n10000',n11000='$n11000',n12000='$n12000',n13000='$n13000',n14000='$n14000',n15000='$n15000',n16000='$n16000',n17000='$n17000',n18000='$n18000',n19000='$n19000',n20000='$n20000',n25000='$n25000',n30000='$n30000',n35000='$n35000',n40000='$n40000',n45000='$n45000',n50000='$n50000', updated_by='$updated_by',smoker='$smoker' where id='$id'";
        $run_rate=mysqli_query(con(), $update_rates);
        if($run_rate){
      echo "<script> alert('Data Updated Successfully');</script>";
       echo "<script> window.location='index.php';</script>"; 
        }

 } 
 ?>  

</body>

</html>
