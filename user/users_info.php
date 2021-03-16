<?php
 session_start();
 ob_start();
    include('includes/functions.php'); 
    check_session(); 
   if($_SESSION['user']['user_type']=='secondary admin'){
       header('location:index.php');
   }
    ?>
<!DOCTYPE html>
<html>
<title>Users Information</title>
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
    Users Information
        <small>Control panel</small>
      </h1>
  

      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Users Information</li>
      </ol>
    </section>
    <br>
<section class="content" >
  <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8"><input type="text" class="form-control" id="search_user" placeholder="Search by anything..."></div>
          <div class="col-md-2"></div>
          <br><hr><br>
          </div>
   <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-10">
      <table id="users_info" class="display responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Sr.No</th>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Username</th>
                <th>User Type</th>
                <th>Created By</th>
                <th>Creation Time</th>
                <th>Updated By</th>
                <th>Updated Time</th>
                <th>Status</th>
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
  $("#search_user").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#users_info tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
</html>
