<?php 

  session_start();
  ob_start();
    include('includes/functions.php'); 
    check_session();
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
          
          <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-10">
      <table id="rates" class="display responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Sr.No</th>
                <th>Id</th>
                <th>Email</th>
                <th>Price</th>
                <th>Coverage</th>
                <th>Company Name</th>
                <th>Company Logo</th>
                <th>Action</th>
               
               
            </tr>
        </thead>
        
    </table>
    </div>
<div class="col-md-1"></div>
      
        
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
