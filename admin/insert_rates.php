<?php
 session_start();
 ob_start();
    include('includes/functions.php'); 
    check_session();

    ?>
<!DOCTYPE html>
<html>
<title>Insert Rates</title>
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
       Insert Rates
        <small>Control panel</small>
      </h1>
    
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Insert Rates</li>
      </ol>
    </section>
    <br>
<section class="content">

       <div class="row">
       	
       	<div class="col-md-12">
       <div class="panel panel-info ">
    <div class="panel-heading text-center">Insert Rates</div>
    <div class="panel-body">
 
       <div class="form-group">  
                     <form  method="post">  
                          <div class="table-responsive">  
                               <table class="table table-bordered"> 
                                 <tr>
                                     <th>Age :</th><td><input type="number" step="1" min="1" name="age" placeholder="Age" class="form-control" required=""  /></td>
                                 <th>Gender :</th><td><select name="gender" class="form-control"><option value="MALE">MALE</option><option value="FEMALE">FEMALE</option></select></td>
                                 <th>Company Name :</th><td><input type="text" name="company_name" placeholder="Comapnay Name" class="form-control" required=""  /></td>
                                 <th>Smoker :</th><td><select name="smoker" class="form-control"><option value="YES">YES</option><option value="NO">NO</option></select></td>
                                 </tr>
               <tr>
                 <th>$3,000 :</th><td><input type="text" name="n3000" class="form-control" required=""  /></td>
                <th>$4,000 :</th><td><input type="text" name="n4000" class="form-control" required=""  /></td>
                <th>$5,000 :</th><td><input type="text" name="n5000" class="form-control" required=""  /></td>
                <th>$6,000 :</th><td><input type="text" name="n6000" class="form-control" required=""  /></td>
                </tr>
                
                <tr>
                <th>$7,000 :</th><td><input type="text" name="n7000" class="form-control" required="" /></td>
                <th>$8,000 :</th><td><input type="text" name="n8000" class="form-control" required="" /></td>
                <th>$9,000 :</th><td><input type="text" name="n9000" class="form-control" required="" /></td>
                <th>$10,000 :</th><td><input type="text" name="n10000" class="form-control" required="" /></td>
                </tr>
                
                <tr>
                <th width="8%">$11,000 :</th><td><input type="text" name="n11000" class="form-control" required="" /></td>
                <th width="8%">$12,000 :</th><td><input type="text" name="n12000" class="form-control" required=""  /></td>
                <th width="8%">$13,000 :</th><td><input type="text" name="n13000" class="form-control" required=""  /></td>
                <th width="8%">$14,000 :</th><td><input type="text" name="n14000" class="form-control" required=""  /></td>
                </tr>
                <tr>
                <th>$15,000 :</th><td><input type="text" name="n15000" class="form-control" required=""  /></td>
                <th>$16,000 :</th><td><input type="text" name="n16000" class="form-control" required=""  /></td>
                <th>$17,000 :</th><td><input type="text" name="n17000" class="form-control" required=""  /></td>
                <th>$18,000 :</th><td><input type="text" name="n18000" class="form-control" required=""  /></td>
                </tr>
                <tr>
                <th>$19,000 :</th><td><input type="text" name="n19000" class="form-control" required=""  /></td>
                <th>$20,000 :</th><td><input type="text" name="n20000" class="form-control" required="" /></td>
                <th>$25,000 :</th><td><input type="text" name="n25000" class="form-control" required=""  /></td>
                <th>$30,000 :</th><td><input type="text" name="n30000" class="form-control" required="" /></td>
                </tr>
                <tr>
                <th>$35,000 :</th><td><input type="text" name="n35000" class="form-control" required=""  /></td>
                <th>$40,000 :</th><td><input type="text" name="n40000" class="form-control" required=""  /></td>
                <th>$45,000 :</th><td><input type="text" name="n45000" class="form-control" required=""  /></td>
                <th>$50,000 :</th><td><input type="text" name="n50000" class="form-control" required="" /></td>
                </tr>
                
                
                
                              
                              
                                    
                                   
                               </table>  
                               <input type="submit" name="insert_rates" id="submit" class="btn btn-info" value="Insert" />  
                          </div>  
                     </form>  
                </div> </div>
  
  </div>
       </div>   
       
      </div> 
      </section>
      </div> 
    

   <?php  
  if(isset($_POST['insert_rates'])){
    $username=$_SESSION['user']['user_name'];
    $user_type=$_SESSION['user']['user_type'];
    $updated_by=$username."-".$user_type;
    $age = mysqli_real_escape_string(con(), $_POST['age']); 
    $gender = mysqli_real_escape_string(con(), $_POST['gender']); 
    $company_name = mysqli_real_escape_string(con(), $_POST['company_name']);
    $company_logo = '';
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
    $r_idi='01'.rand(11,10000);
    $insert_rate = "INSERT into rates(r_id, age, gender, company_name, company_logo, n3000, n4000, n5000, n6000, n7000, n8000, n9000, n10000, n11000, n12000, n13000, n14000, n15000, n16000, n17000, n18000 , n19000, n20000, n25000, n30000, n35000, n40000, n45000, n50000, updated_by, smoker) values('$r_idi', '$age', '$gender', '$company_name', '$company_logo', '$n3000', '$n4000', '$n5000', '$n6000', '$n7000', '$n8000', '$n9000', '$n10000', '$n11000', '$n12000', '$n13000', '$n14000', '$n15000', '$n16000', '$n17000', '$n18000', '$n19000', '$n20000', '$n25000', '$n30000', '$n35000', '$n40000', '$n45000', '$n50000', '$updated_by', '$smoker')";
            $run_rate_insert=    mysqli_query(con(), $insert_rate);
        if($run_rate_insert){
      echo "<script> alert('Data Inserted Successfully');</script>";
       echo "<script> window.location='';</script>"; 
        }

 } 
 ?>  

</body>

</html>
