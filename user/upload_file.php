<?php
 session_start();
 ob_start();
    include('includes/functions.php'); 
    check_session();
    $em=$_SESSION['ruser']['email'];
    $id=@$_GET['data'];
    $qrry="SELECT * FROM user_plan where id='$id' and email='$em'";
    $ru=mysqli_query(con(), $qrry);
    $result=mysqli_fetch_array($ru);
    $num=mysqli_num_rows($ru);
    if($_GET['data']=='' || !isset($_GET['data']) || !isset($_SESSION['ruser']) || !$num>0){
        header('location:index.php');
    }
    else
    {
       $doc=$result['document'];
   
    }
    
    ?>
<!DOCTYPE html>

<html>
<title>Protect Mutual-Dashboard</title>
    <?php 
  

 include('head.php'); ?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>

      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
       <br>
<section class="content">
      <!-- Info boxes -->
    <?php success_destroy(); ?>
      <?php if($_SESSION['ruser']){ ?>

       <div class="row">
           <hr>
          <div class="col-md-1"></div><div class="col-md-10"><div class="well text-center"><b>Plans</b></div></div><div class="col-md-1"></div></div>
          <style>
    .container{
        width: 100%;
    }
.container .well{
    background: white;
    
}
.container .well div{
        width: 75%;
        margin-bottom: 15px;
        
}
.container .well #display2{
    border: dotted silver;
    border-radius: 10px;
    background: aliceblue;
}
.container .well #display2:hover{
    border-color: skyblue;
}
</style>
    <div class="container">
    <div class="well">
        <center>
   <form action="" method="POST" role="form" enctype="multipart/form-data">
    <div onclick="trigger2();" id="display2">
    <img src="" id="img2" width="100px" >
    <input type="file" name="img2" id="inputimg2" style="display: none" onchange="displayimg2(this);">
    <h1>Click here to Select</h1>
   <h1><span class="glyphicon glyphicon-cloud-upload" aria-hidden="true"></span></h1> 
    </div>
    <div class="alert alert-info" role="alert" id="others" style="display:none;"></div>

    <p style="color: red; display:none; text-align: center; height: 100%;" id="p2">Only images, word, excle or PDF files are accepted</p>
    <p style="color: red; display:none; text-align: center; height: 100%;" id="pp2">Please Select a File</p>
   
   
       
   
       <button type="submit" class="btn btn-primary" name="submit" onclick="emptycheck();">Upload <span class="glyphicon glyphicon-open
" aria-hidden="true"></button>
   </form> </center>
    
</div>   
<div class="alert alert-info" role="alert" id="others" style="display: none;"></div>
</div>
      <!-- /.row -->
      <?php } ?>
    </section>
     
  </div>
  
 
  <!-- /.content-wrapper -->
     
<?php include('footer.php');  ?>

</div>
<?php include('footer_js.php'); 

?>
</body>



<?php

if (isset($_POST['submit'])) {
$id=$_GET['data'];
$img2=$_FILES['img2']['name'];
$extension = pathinfo($_FILES["img2"]["name"], PATHINFO_EXTENSION);
$newname='Document'.rand().'.'.$extension;
if (!empty($img2) and ($extension=='pdf' || $extension=='docx' || $extension=='doc' || $extension=='csv' || $extension=='xlsx' || $extension=='png' || $extension=='jpg' || $extension=='jpeg')) {
if (!empty($doc)) {
  $nstr=$doc.','.$newname;   
  $qry="UPDATE user_plan SET document='$nstr' where id='$id'";
if(mysqli_query(con(), $qry)){
    move_uploaded_file($_FILES['img2']['tmp_name'], "document/$newname");
      echo "<script> alert('successfully uploaded')</script>";
    }
    }

else{
  $qry="UPDATE user_plan SET document='$newname' where id='$id'";
  if(mysqli_query(con(), $qry)){
   move_uploaded_file($_FILES['img2']['tmp_name'], "document/$newname");
      echo "<script> alert('Successfully Uploaded')</script>";
    }
    }

}
else{
          echo "<script> alert('Please Select a file')</script>";

}
}

 ?>
</html>
