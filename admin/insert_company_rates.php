<?php 
  session_start();
  ob_start();
    include('includes/functions.php'); 
    check_session();
    $username=$_SESSION['user']['user_name'];
$user_type=$_SESSION['user']['user_type'];
$updated_by=$username."-".$user_type;

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
         
       <div class="row">
        <div class="container-fluid">
       <form action="" method="POST" role="form" id="insert_company_rates">
         <legend>INSERT RATES</legend>
       
         <div class="form-group">
           
           <table class="table table-bordered">

            <tr>
              <th>Select Company</th>
                <td><select name="company_name" class="form-control" required="required">
                   <?php  
           $exist="SELECT * FROM company";
          $res=mysqli_query(con(), $exist);
          while($data=mysqli_fetch_array($res))
                       { ?>
                  <option value="<?php echo $data['id'] ?>"><?php echo $data['company_name'] ?></option>
                <?php } ?>
                </select> </td>
            </tr>
            <tr>
              <th>Enter Age</th>
           <td><input type="number" class="form-control" min="1" name="age" value="1" placeholder="Insert Age" required></td>
            </tr>
            <tr>
              <th>Select Smoker</th>
              <td>
                <select name="smoker" class="form-control" required="required">
                  <option value="YES">YES</option>
                  <option value="NO">NO</option>
                </td>
            </tr>
              <tr>
              <th>Select Gender</th>
              <td>
                <select name="gender" class="form-control" required="required">
                  <option value="MALE">MALE</option>
                  <option value="FEMALE">FEMALE</option>
                  <option value="OTHER">OTHER</option>
                </td>
            </tr>
             <tr>
              <th>Select Year</th>
              <td>
                <select name="year" class="form-control" required="required">
                  <?php for ($i=10; $i <=30 ; $i=$i+5) {?>
                  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                  <?php } ?>
                </td>
            </tr>
           <?php  
           $exist="SELECT * FROM new_rates";
          $res=mysqli_query(con(), $exist);
          while($data=mysqli_fetch_array($res))
                       { ?>
                 <tr>       
           <th width="10%"><?php echo $data['rates'] ?><input type="hidden" name="index[]" value="<?php echo $data['id']; ?>"></th>
           <td><input type="number" class="form-control" min="1" name="company[]" placeholder="insert Rate"></td>
      </tr>
         <?php } ?>
       </table>


         </div>
         <button type="button" class="btn btn-primary" name="" id="insert_multirates">Submit</button>
       </form>
</div>
</div>


    </section>
     
  </div>
  
 
  <!-- /.content-wrapper -->
     
<?php include('footer.php');  ?>

</div>
<?php include('footer_js.php'); 
include ('insertdata/ajax.php');
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
