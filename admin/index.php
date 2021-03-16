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
 
       <div class="row container-fluid">
         <div class="col-md-6">
           <table class="table table-bordered" id="ratestable">
            <tcaption><h3>Coverages</h3></tcaption>
             <thead>
              <tr class="text-right"><td colspan="3"><a href="#modal-id" data-toggle="modal" class="btn btn-info">Coverage +</a></td></tr>

               <tr style="background: #00c0ef;">
                 <th>ID</th>
                 <th>Coverage</th>
                 <th>Action</th>
               </tr>
             </thead>
             <tbody>
               
                 <?php 
                $qry="SELECT * FROM new_rates"; 
                $res=mysqli_query(con(), $qry);
                while($data=mysqli_fetch_array($res)){
                ?>
                <tr>
                 <td><?php echo $data['id']; ?></td>
                 <td>$<?php echo number_format($data['rates']); ?></td>
                 <td class="text-right"><a href="#modal-id3" data-toggle="modal" class="update_rate_modal btn btn-info" data-value="<?php echo $data['rates']; ?>" data-id="<?php echo $data['id']; ?>">Update</a><button class="btn btn-danger delete_rates" data-id="<?php echo $data['id']; ?>">delete</button></td>
               </tr>
               <?php } ?>
               
             </tbody>
           </table>
         </div>
          <div class="col-md-6">
           <table class="table table-bordered" id="companiestable">
            <tcaption><h3>Companies</h3></tcaption>
             <thead>
              <tr class="text-right"><td colspan="4"><a href="#modal-id2" data-toggle="modal" class="btn btn-success">Company +</a></td></tr>
               <tr style="background: #00a65a;">
                 <th>ID</th>
                 <th>Company Name</th>
                 <th>Company Logo</th>
                 <th>Action</th>

               </tr>
             </thead>
             <tbody>
               <?php
                  
                $qry="SELECT * FROM company"; 
                $res=mysqli_query(con(), $qry);
                while($data=mysqli_fetch_array($res)){
                $filnam =getcwd()."/images/".$data['company_logo'];
                if (!file_exists($filnam) || $data['company_logo']=='') {
                $company_logo='images/company_dummy.png';
                }
                else{
                   $company_logo="images/".$data['company_logo']; 
                }
                ?>
                <tr>
                 <td><?php echo $data['id']; ?></td>
                 <td><?php echo $data['company_name']; ?></td>
                 <td><img src="<?php echo $company_logo; ?>" width="110" height="70"></td>
                 <td class="text-right"><a href="#modal-id4" data-toggle="modal" class="btn btn-info update_company_modal" data-value="<?php echo $data['company_name']; ?>" data-id="<?php echo $data['id']; ?>" data-logo="<?php echo $data['company_logo']; ?>">Update</a><button class="btn btn-danger delete_company" data-id="<?php echo $data['id']; ?>">delete</button></td>
              
               </tr>
             <?php } ?>            
             </tbody>
           </table>
         </div>

         <div class="coll-md-12">
           
         </div>


         </div>
          
          
       <!-- //////////////////////////////INSERT RATE//////////////////////////////////////////////// -->
      <div class="modal fade" id="modal-id">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <form action="" method="POST" id="rates_form">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Insert Coverage</h4>
            </div>
            <div class="modal-body">
                <div class="table-responsive">  
                <table class="table table-bordered" id="dynamic_field"> 
                 <tr><td width="75%"> <input type="number" min=1 name="rates[]" class="form-control ratelist" placeholder="Insert Covearge" required></td>
                    <td width="25%"><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  </tr>
              </table>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" name="Insert_rates" id="Insert_rates">Insert</button>
            </div>
          </form>
          </div>
        </div>
      </div>
      <!-- ///////////////////////////////////////////////////////////////////////////////////////// -->


       <!-- //////////////////////////////INSERT COMPANY//////////////////////////////////////////////// -->
      <div class="modal fade" id="modal-id2">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <form action="" method="POST" id="company_form" enctype="multipart/form-data" >
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Insert Company</h4>
            </div>
            <div class="modal-body">
              <label for="rates">Insert Your Company Name</label>
              <input type="text" name="company_name" id="company_name" class="form-control" placeholder="Insert company Name" required>
              <label for="rates">Select Company Logo </label>
              <input type="file" class="form-control" name="company_logoi" id="company_logoi" accept="image/*">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" name="Insert_company" id="Insert_company">Insert</button>
            </div>
          </form>
          </div>
        </div>
      </div>
      <!-- ///////////////////////////////////////////////////////////////////////////////////////// -->

       <!-- //////////////////////////////INSERT RATE//////////////////////////////////////////////// -->
      <div class="modal fade" id="modal-id3">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <form action="" method="POST" id="rates_update_form">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Update Rates</h4>
            </div>
            <div class="modal-body">
              <label for="rates">Insert Your Rates</label>
              <input type="hidden" name="rates_id" id="rates_id" class="form-control" placeholder="Insert Rate value" required>
              <input type="number" min="1" name="rates_value" id="rates_value" class="form-control" placeholder="Insert Rate value" required>
           
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" name="Insert_rates" id="update_rates">Update</button>
            </div>
          </form>
          </div>
        </div>
      </div>
      <!-- ///////////////////////////////////////////////////////////////////////////////////////// -->
       <!-- //////////////////////////////INSERT RATE//////////////////////////////////////////////// -->
      <div class="modal fade" id="modal-id4">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <form action="" method="POST" id="company_update_form" enctype="multipart/form-data">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Update Company</h4>
            </div>
            <div class="modal-body">
              <label for="rates">Insert Your company</label>
              <input type="hidden" name="company_idu" id="company_idu" class="form-control" placeholder="Insert Rate value" required>
              <input type="text" name="company_valueu" id="company_valueu" class="form-control" placeholder="Insert Rate value" required>
            <label for="company_logo">Select Company Image</label>
              <input type="file" class="form-control" name="company_logou" id="company_logou" accept="image/*">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="update_company">Update</button>
            </div>
          </form>
          </div>
        </div>
      </div>
      <!-- ///////////////////////////////////////////////////////////////////////////////////////// -->
    






    </section>
     
  </div>
  
 
  <!-- /.content-wrapper -->
     
<?php include('footer.php');  ?>

</div>
<?php 
include('footer_js.php');
include('insertdata/ajax.php');
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

    $('#companiestable').DataTable();
 $('#ratestable').DataTable();
  });
  </script>
  <script>  
 $(document).ready(function(){ 
      var i=1;  
        $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="number" min=1 name="rates[]" class="form-control ratelist" placeholder="Insert Coverage" required></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });
    
 });  
 </script>
</html>
