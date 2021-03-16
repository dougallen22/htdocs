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

       $q="SELECT * from user_info WHERE  id='$data' OR email='$data'"; 
       $run=mysqli_query(con(), $q);
       if(mysqli_num_rows($run)==0){
         header('location:index.php');  
       }
       else{
           $r=mysqli_fetch_array($run);
       }
       
    ?>
    
<!DOCTYPE html>
<html>
<title>User Profile</title>
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
    User Profile
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">User Profile</li>
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
		    $filename =str_replace("admin","user",getcwd()."/dist/img/".$r['profile_pic']);

if (!file_exists($filename)) 
{
?>
             <img class="profile-user-img img-responsive img-circle" src="/user/dist/img/admin_dummy.png" alt="User profile picture">
             <?php } else{ ?>
             <img class="profile-user-img img-responsive img-circle" src="/user/dist/img/<?php echo $r['profile_pic']; ?>" alt="User profile picture">
             
           <?php  }
                }
                else{
                ?>
                
              <img class="profile-user-img img-responsive img-circle" src="/user/dist/img/admin_dummy.png" alt="User profile picture">
               <?php } ?>
                
              
              
              



              <ul class="list-group list-group-unbordered">
                <li class="list-group-item" style="padding:25px 20px;">
                  <b>Email:</b> <a class="pull-right"><?php echo $r['email'];  ?></a>
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
                      <input type="text" class="form-control" name="fname"  value="<?php echo $r['fname'];  ?>" placeholder="First Name" required >
                    </div>
                  </div>

                   <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Last Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="lname"  value="<?php echo $r['sname'];  ?>" placeholder="Last Name" required >
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" name="email"  value="<?php echo $r['email'];  ?>" placeholder="Email" required >
                    </div>
                  </div>
                 <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Gender</label>
                    <div class="col-sm-10">
                      <select name="gender"  class="form-control">
                      <option <?php if($r['gender']=='Male'){ echo 'selected'; } ?>  value="Male">Male</option>
                      <option <?php if($r['gender']=='Female'){ echo 'selected'; } ?>  value="Female">Female</option> 
                      </select>
                    </div>
                  </div>
<div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Phone</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="phone"  value="<?php echo $r['phone'];  ?>" placeholder="Phone" required >
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">City</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="city"  value="<?php echo $r['city'];  ?>" placeholder="City"  required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">State</label>
                    <div class="col-sm-10">
                      <select name="state"  class="form-control">
              <?php 
              $file='state.json'; 
              $str = file_get_contents($file);
              $json = json_decode($str, true);
              for($i=0;$i<count($json);$i++){
              $state=$json[$i]['abbreviation'];
                                ?>
                            <option <?php if($r['state']==$state){ echo 'selected'; } ?>  value="<?php echo $state; ?>"><?php echo $state ?></option>
                          <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Zip</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="zip"  value="<?php echo $r['zip'];  ?>" placeholder="Zip"  required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Address</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="address"  value="<?php echo $r['address'];  ?>" placeholder="Address"  required>
                    </div>
                  </div>
<div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Tobbaco Use ?</label>
                    <div class="col-sm-10">
                      <label class="radio-inline">
      <input type="radio" name="tobbaco" value="NO" <?php if($r['tobbaco']=='NO'){ echo "checked"; } ?> >No
    </label>
    <label class="radio-inline">
      <input type="radio" name="tobbaco" value="YES" <?php if($r['tobbaco']=='YES'){ echo "checked"; } ?>>Yes
    </label>
                    </div>
                  </div>
<input type="hidden"  name="id" value="<?php echo $r['id'] ?>">
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                      <input type="text" minlength="7" class="form-control" name="password" id="inputEmail" placeholder="Password" value="<?php echo base64_decode($r['password']);  ?>" required>
                    </div>
                  </div>
                  </div>




                  <div class="form-group text-right"> 
                      <input type="submit" value="Update" name="update" class="btn btn-primary" style="margin-right: 12px;"> 
                  </div>



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
           $gender=$_POST['gender'];
            $phone=$_POST['phone'];
            $city=$_POST['city'];
            $state=$_POST['state'];
            $zip=$_POST['zip'];
            $address=$_POST['address'];
            $tobbaco='';
            if(isset($_POST['tobbaco'])){
                $tobbaco=$_POST['tobbaco'];
            }
            $password= base64_encode($_POST['password']);
            $updated_by=$username;

$tes="SELECT * from user_info where id!='$id'  AND email='$email'";
$re=mysqli_query(con(), $tes);
if (mysqli_num_rows($re)>0) {
   echo "<script>alert('Email already taken. Please use different');</script>";
}
else{

/*///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                For Admin
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/



  $qry="UPDATE user_info SET fname='$fname', sname='$lname', email='$email', phone='$phone', gender='$gender', city='$city', state='$state', zip='$zip', address='$address',tobbaco='$tobbaco', password='$password', updated_by='$updated_by' where id='$id'";   
            if(mysqli_query(con(),$qry)){ 
           echo "<script> alert('User record is successfully updated');</script>";
            echo "<script> window.location='';</script>";
          }
        



}
}
 ?>

</body>
</html>
