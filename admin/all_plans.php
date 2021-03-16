<?php
 session_start();
 ob_start();
    include('includes/functions.php'); 
    check_session(); 
  
    ?>
<!DOCTYPE html>
<html>
<title>All Users Plans</title>
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
   All Plans
        <small>Control panel</small>
      </h1>
  

      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">All Plans</li>
      </ol>
    </section>
    <br>
<section class="content" >
  <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8"><input type="text" class="form-control" id="search_plans" placeholder="Search by anything..."></div>
          <div class="col-md-2"></div>
          <br><hr><br>
          </div>
   <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-10">
      <table id="all_users_plans" class="display responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Sr.No</th>
                <th>Id</th>
                <th>Email</th>
                <th>Price</th>
                <th>Coverage</th>
                <th>Company Name</th>
                <th>Company Logo</th>
                <th>Status</th>
                <th>Creation Time</th>
                <th>Updated By</th>
                <th>Updated Time</th>
                <th>Documents</th>
                <th>Action</th>
            </tr>
        </thead>
        
    </table>
    </div>
<div class="col-md-1"></div>
      
        
      </div>
  
    </section>
  </div>
  <!-- /.content-wrapper -->
<?php include('footer.php');  ?>

</div>
<?php include('footer_js.php');  ?>

</body>
<script>
$(document).ready(function(){
  $("#search_plans").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#all_users_plans tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
</html>
