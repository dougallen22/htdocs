<?php
 session_start();
 ob_start();
    include('includes/functions.php'); 
    check_session();
   if($_SESSION['user']['user_type']=='secondary admin'){
    header('location:index.php');
    }
    if(isset($_POST['user_name'])){

	$first_name = $_POST['first_name'];
	$last_name  = $_POST['last_name'];
	$user_name  = $_POST['user_name'];
	$email      = $_POST['email'];
	$password   = base64_encode($_POST['password']);
	$confirm_password = base64_encode($_POST['confirm_password']);
	$staffing_agency  = '';
	$user_type  = $_POST['user_type']; 
	$operation  = '';

	$position     = '';
	$created_by   = $_SESSION['user']['user_name'];
    $status       = '';
    $image        = $_FILES['image']['name'];
    $image_tmp    = $_FILES['image']['tmp_name'];
    

   
	 $sql_u = "SELECT * FROM login_credentials WHERE user_name='$user_name'";
    $res_u = mysqli_query(con(), $sql_u);
    $check_email = "SELECT * FROM login_credentials WHERE email='$email'";
    $run_email = mysqli_query(con(), $check_email);
   if (mysqli_num_rows($res_u) > 0) {
        echo"<script>alert('Sorry... username is already taken. Please fill the form with another name. Thank you!')</script>"; 
        
        
    }
 
   elseif(mysqli_num_rows($run_email) > 0) {
        echo"<script>alert('Sorry... Email id already taken. Please fill the form with another email. Thank you!')</script>"; 
     
    }

    elseif($password != $confirm_password){
          echo"<script>alert('Both passwords must match')</script>";
          
      
    }


    else{
    $creation=date('m-d-Y h:m:s');
    $insert = "insert into login_credentials(first_name,last_name,user_name,email,password,confirm_password,creation_time,staffing_agency,user_type,operation,position,profile_pic,created_by,status,updated_by) values('$first_name','$last_name','$user_name','$email','$password','$confirm_password','$creation','$staffing_agency','$user_type','$operation','$position','$image','$created_by','$status','$user_name')";
        $run = mysqli_query(con(), $insert);
    move_uploaded_file($image_tmp, "dist/img/$image");

    if($insert){
        echo"<script>alert('Secondary Admin successfully registered')</script>";
        echo"<script>window.location=''</script>";

    }

    

    }
}
    ?>
<!DOCTYPE html>
<html>
<title>Add Secondary Admin</title>
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
          
       Add Secondary Admin
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Secondary Admin</li>
      </ol>
    </section>
    <br>
<section class="content">

	<div class="page-content">
		<div class="form-v9-content" style="background-image: url('form-images/form-v9.jpg')">
			<form class="form-detail" method="post" action="" enctype="multipart/form-data">
				<h2>Create Secondary Admin</h2>
				<div class="form-row-total">
					<div class="form-row">
						<input type="text" name="first_name" id="first_name" class="input-text" placeholder="First Name" value="<?php echo @$_POST['first_name']; ?>" required>
					</div>
					<div class="form-row">
						<input type="text" name="last_name" id="last_name" class="input-text" placeholder="Last Name" value="<?php echo @$_POST['last_name']; ?>" required>
					</div>
				</div>
				<div class="form-row-total">
					<div class="form-row">
						<input type="text" name="user_name" id="user_name" minlength="5" class="input-text" placeholder="User Name" value="<?php echo @$_POST['user_name']; ?>" required>
					</div>
					<div class="form-row">	
					<input type="email" name="email" id="email" class="input-text" placeholder="Email" value="<?php echo @$_POST['email']; ?>" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
					</div>
				</div>
				<div class="form-row-total">
					<div class="form-row">
						<input type="password" name="password" id="password" class="input-text" placeholder="Password" minlength="7" value="<?php echo @$_POST['password']; ?>" required>
					</div>
					<div class="form-row">
						<input type="password" name="confirm_password" id="confirm_password" class="input-text" placeholder="Comfirm Password" minlength="7" value="<?php echo @$_POST['confirm_password']; ?>" required>
					</div> 
				</div>
			

				<div class="form-row-total">
					<div class="form-row">
						
					</div>
					<div class="form-row input-group">
						<label style="padding-left: 28px;">Select Profile Picture </label> <input type="file" id="imgInp" name="image" accept="image/*">						<img id='img-upload' />
					</div>
				</div>
				
				<div class="form-row-total">
					<div class="form-row">
						<input type="hidden" name="user_type" id="user_type" value="secondary admin">
						
					</div>
					<div class="form-row">
						
						<input type="submit" name="create_secondary_admin" class="register" value="Create">
					</div>
					<div class="form-row">
						
						
					</div>
				</div>

			<!--	<div class="form-row-last">
					<input type="submit" name="register" class="register" value="Register">
				</div> -->
			</form>
		</div>
	</div>

    </section>
  </div>
  <!-- /.content-wrapper -->
<?php include('footer.php');  ?>

</div>
<?php include('footer_js.php');  ?>
  
</body>

</html>
