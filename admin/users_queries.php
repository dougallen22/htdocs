<?php
 session_start();
 ob_start();
    include('includes/functions.php'); 
    check_session(); 
 
    ?>
<!DOCTYPE html>
<html>
<title>Users Queries</title>
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
    Users Queries
        <small>Control panel</small>
      </h1>
  

      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Users Queries</li>
      </ol>
    </section>
    <br>
<section class="content" >
  
   <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-10">
      <table id="queries" class="display responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Sr.No</th>
                <th>Id</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Query Time</th>
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

</html>
