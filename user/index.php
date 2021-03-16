<?php 

  session_start();
  ob_start();
 include('check_cookie.php');
    include('includes/functions.php');
    check_session();
    
?>
<!DOCTYPE html>

<html>
<title>Protect Mutual-Dashboard</title>
<?php include('head.php'); ?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>

      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
<section class="content">
      <!-- Info boxes -->
    <?php success_destroy(); ?>
      <?php if($_SESSION['ruser']){ ?>

       <div class="row">
          <div class="col-md-12"><div class="well text-center"><b>Plans</b></div></div></div>
         
          <!-- /////////////////////////////////////////////////////////////////////////////////////////
                                          DATA FETCH
            ///////////////////////////////////////////////////////////////////////////////////////// -->
        
<div class="slider">
<?php 
$email=$_SESSION['ruser']['email'];
    $query = "SELECT * FROM user_plan where email='$email'";
    $result = mysqli_query(con(), $query);
    while($row = mysqli_fetch_array($result))
{
    $id=$row['id'];
    $price=$row['price'];
    $coverage=$row['coverage'];
    $companny=$row['company_name'];
     $filnam =getcwd()."/images/".$row['company_logo'];
    if (!file_exists($filnam) || $row['company_logo']=='') {
   $logo = "images/company_dummy.png"; 
}
else{
   $logo= "images/".$row['company_logo']; 
}
?>
<div><div class="card active">
  <div class="fabs">
    <div class="fab"></div>
    <i class="avatar"> <img src="<?php echo $logo; ?>" alt="" style="width: 100%; height: 100%; border-radius: 50%;"></i>
  </div>
  <div class="userr">
    <div class="socials">
     <b><?php echo $companny; ?></b><br>
     <i><?php echo $email; ?></i>
    <div class="profiles">
      <div class="profile"><span>Coverage</span>$<?php echo number_format($coverage); ?></div>
      <div class="profile"><span>Monthly</span><?php echo $price; ?></div>

      <div class="profile"><a href="delete_row.php?data=<?php echo $id;?>" class="btn btn-danger" onclick="confirm('Are you sure you want to cancle this plan');">cancle plan</a></div>
      <div class="profile"><a href="upload_file.php?data=<?php echo $id;?>" class="btn btn-info">Upload Document</a></div>
    </div>
  </div>
</div></div></div>

<?php }?>






</div>
      <!-- /////////////////////////////////////////////////////////////////////////////////////////
                                          DATA FETCH
            ///////////////////////////////////////////////////////////////////////////////////////// -->
       
  
      
        
     
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
<script type="text/javascript">
  $( document ).ready(function() { 
      
    
    window.setTimeout(function() {
        $(".login-success").fadeTo(2000, 0).slideUp(1000, function(){
            $(this).remove();
        });
    }, 3500);
  

  $("#search_timesheets").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#timesheets tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });


  });
  </script>
</html>
