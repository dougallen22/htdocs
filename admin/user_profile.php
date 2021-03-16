<?php
 session_start();
 ob_start();
    include('includes/functions.php'); 
    check_session(); 
    if($_GET['data']=='' || !isset($_GET['data'])){
        header('location:index.php');
    }
    $username=$_SESSION['user']['user_name'];
$user_type=$_SESSION['user']['user_type'];
    $data=@$_GET['data'];

       $q="SELECT * from login_credentials WHERE  id='$data' OR user_name='$data'"; 
       $run=mysqli_query(con(), $q);
       if(mysqli_num_rows($run)==0){
         header('location:index.php');  
       }
       else{
           $r=mysqli_fetch_array($run);
       }
       
       if(($username!=$r['user_name']) && ($user_type=='admin' &&($r['user_type']=='admin'))){
           header('location:index.php'); 
       }
       if(($username!=$r['user_name']) && ($user_type=='secondary admin' &&($r['user_type']=='admin' || $r['user_type']=='secondary admin'))){
           header('location:index.php'); 
       }
      
    ?>
    
<!DOCTYPE html>
<html>
<title>Admin Profile</title>
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
    Admin Profile
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Admin Profile</li>
      </ol>
    </section>
    <br>
<section class="content">
  <?php 


   
       ?>
      
          <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
         <?php      if($r['profile_pic']!=''){
		    $filename =getcwd()."/dist/img/".$r['profile_pic'];

if (!file_exists($filename)) 
{
?>
             <img class="profile-user-img img-responsive img-circle" src="dist/img/admin_dummy.png" alt="User profile picture">
             <?php } else{ ?>
             <img class="profile-user-img img-responsive img-circle" src="dist/img/<?php echo $r['profile_pic']; ?>" alt="User profile picture">
             
           <?php  }
                }
                else{
                ?>
                
              <img class="profile-user-img img-responsive img-circle" src="dist/img/admin_dummy.png" alt="User profile picture">
               <?php } ?>
                
              
              
              



              <ul class="list-group list-group-unbordered">
                <li class="list-group-item" style="padding:25px 20px;">
                  <b>Email</b> <a class="pull-right"><?php echo $r['email'];  ?></a>
                </li>
                
              </ul>

              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#login_info" data-toggle="tab">Informtion</a></li>              
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="login_info">
 
                  <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">First Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="fname"  value="<?php echo $r['first_name'];  ?>" placeholder="First Name" <?php if($username==$r['user_name'] && $r['user_type']!='admin'){ echo "readonly"; } ?> required>
                    </div>
                  </div>

                   <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Last Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="lname"  value="<?php echo $r['last_name'];  ?>" placeholder="Last Name" <?php if($username==$r['user_name'] && $r['user_type']!='admin'){ echo "readonly"; } ?> required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" name="email"  value="<?php echo $r['email'];  ?>" placeholder="Email" <?php if($username==$r['user_name'] && $r['user_type']!='admin'){ echo "readonly"; } ?> required>
                    </div>
                  </div>



                   <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Username</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="uname"  value="<?php echo $r['user_name'];  ?>" placeholder="Userame" <?php if($username==$r['user_name'] && $r['user_type']!='admin'){ echo "readonly"; } ?> required>
                    </div>
                  </div>



<input type="hidden"  name="user_typ" value="<?php echo $r['user_type'] ?>">
<input type="hidden"  name="id" value="<?php echo $r['id'] ?>">
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                      <input type="text" minlength="7" class="form-control" name="password" id="inputEmail" placeholder="Password" value="<?php echo base64_decode($r['password']);  ?>" <?php if($username==$r['user_name'] && $r['user_type']!='admin'){ echo "readonly"; } ?> required> 
                    </div>
                  </div>
                  </div>


<?php  if(($username==$r['user_name'] && $user_type=='admin') || ($username==$r['user_name'] && $user_type=='secondary admin')){ ?>

                  <div class="form-group text-right"> 
                      <input type="submit" value="Update" name="update" class="btn btn-primary" style="margin-right: 12px;"> 
                  </div>

<?php } ?>


                </form>
                
              </div>
              <!-- /.tab-pane -->
              
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->  
              
       
    </section>

     </div>
  <!-- /.content-wrapper -->
<?php include('footer.php');  ?>

</div>
<?php include('footer_js.php');  ?>


<?php 

if (isset($_POST['update'])) {
           $id=$_POST['id'];
            $fname=$_POST['fname'];
            $lname=$_POST['lname'];
            $email=$_POST['email'];
            $uname=$_POST['uname'];
            $password= base64_encode($_POST['password']);
            $user_typ=$_POST['user_typ'];
            $updated_by=$username;

$tes="SELECT * from login_credentials where id!='$id'  and (user_name='$uname' OR email='$email')";
$re=mysqli_query(con(), $tes);
if (mysqli_num_rows($re)>0) {
   echo "<script>alert('Username or Email already taken. Please use different');</script>";
}
else{

/*///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                For Admin
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/


if ($user_typ=='admin' || $user_typ=='secondary admin') {


  $qry="UPDATE login_credentials SET first_name='$fname', last_name='$lname', email='$email', user_name='$uname', password='$password', updated_by='$updated_by' where id='$id'";   
            if(mysqli_query(con(),$qry)){ 
            echo "<script> alert('Secondary Admin record is successfully updated');</script>";
            echo "<script> window.location='';</script>";
          }
        

}

}
}
 ?>

</body>
</html>
