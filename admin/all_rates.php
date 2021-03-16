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
<style>
 ::-webkit-scrollbar{
  width: 5px;
  height: 5px;
} 
::-webkit-scrollbar-thumb {
  background:#337ab7;
}
::-webkit-scrollbar-thumb:hover {
  background: #b30000; 
}
</style>
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
         <div class="col-md-12">
           <table class="table table-bordered display responsive nowrap"  style="width:100%" id="rates">
            <tcaption><h3>Rates</h3></tcaption>
             

              <tbody>
                <?php 
                $company_year="SELECT * FROM company_year"; 
                $resul=mysqli_query(con(), $company_year);
                while($year=mysqli_fetch_array($resul)){
                  $company_year_id=$year['id'];
                  $company_id=$year['company_id'];
                  $company_get_year=$year['year'];
                  $gender=$year['gender'];
                  $smoker=$year['smoker'];
                  $age=$year['age'];
                $qry="SELECT * FROM company WHERE id='$company_id'"; 
                $res=mysqli_query(con(), $qry);
                while($data=mysqli_fetch_array($res)){
                ?>




                <tr>                
                  <td><?php echo $company_year_id; ?></td>
                  <td><?php echo $data['company_name'] ?></td>
                  <td><?php echo $company_get_year; ?></td>
                  <td><?php echo $age; ?></td>
                  <td><?php echo $gender; ?></td>
                  <td><?php echo $smoker; ?></td>

                <?php 
                $company_rates="SELECT * FROM company_rates where company_id='$company_id' AND year='$company_get_year' AND gender='$gender' AND smoker='$smoker' AND age='$age'"; 
                $get_rates=mysqli_query(con(), $company_rates);
                $num_r=mysqli_num_rows($get_rates);
                while($rates=mysqli_fetch_array($get_rates)){  
                ?>
              
                <td>$<?php echo number_format($rates['value']); ?></td>
                <?php } ?>                
                <td><a class="btn btn-info" href="update_company_rates.php?year=<?php echo $company_get_year;?>&company_id=<?php echo $company_id; ?>&gender=<?php echo $gender;?>&smoker=<?php echo $smoker;?>&age=<?php echo $age ?>">update</a>
                  <button class="btn btn-danger" id="delete"
                  data-company="<?php echo $company_id ?>" 
                  data-year="<?php echo $company_get_year ?>" 
                  data-smoker="<?php echo $smoker ?>" 
                  data-gender="<?php echo $gender ?>"
                  data-age="<?php echo $age ?>" >Delete</button>
                </td>
                </tr>


              <?php }} ?>


              </tbody>
                <thead>
              <tr class="bg-primary">
                <th>ID</th>
                <th>Company</th>
                <th>Year</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Smoker</th>
                <?php 
                $qry="SELECT * FROM new_rates limit $num_r"; 
                $res=mysqli_query(con(), $qry);
                while($data=mysqli_fetch_array($res)){
                ?>
                 <th><?php echo $data['rates'] ?></th>
                <?php } ?>
              <th>Action</th>
            </tr>
              </thead>
           
               
             
           </table>
         </div>
       


         </div>
          
      







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





  });

  </script>
</html>
