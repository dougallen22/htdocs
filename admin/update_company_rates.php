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
       <form action="" method="POST" role="form" id="insert_company_rates_update">
         <legend>INSERT RATES</legend>
       
         <div class="form-group">
           <?php 
           $get_company_id=$_GET['company_id'];
           $get_year=$_GET['year'];
           $smoker=$_GET['smoker'];
           $gender=$_GET['gender'];
           $age=$_GET['age'];
           $company="SELECT * FROM company_rates WHERE company_id='$get_company_id' AND year='$get_year' AND smoker='$smoker' AND gender='$gender' AND age='$age'";
            $q=mysqli_query(con(), $company);          
            $row=mysqli_fetch_array($q);
             ?>
           <table class="table table-bordered">
<input type="hidden" name="get_company_id"   value="<?php echo $get_company_id ?>">
<input type="hidden" name="get_year_value" value="<?php echo $get_year; ?>">
<input type="hidden" name="get_smoker_value" value="<?php echo $smoker; ?>">
<input type="hidden" name="get_gender_value" value="<?php echo $gender; ?>">
<input type="hidden" name="get_age_value" value="<?php echo $age; ?>">
            <tr>
              <th>Select Company</th>
                <td><select name="company_name" class="form-control" required="required">
                   <?php  
                       $exist="SELECT * FROM company";
                      $res=mysqli_query(con(), $exist);
                      while($data=mysqli_fetch_array($res))
                                   { ?>
                  <option value="<?php echo $data['id'];?>" <?php if($data['id']==$row['company_id']){ echo "selected ";}?> ><?php echo $data['company_name'] ?></option>
                <?php } ?>
               
               </select></td>
            </tr>
            <tr>
              <th>Select Smoker</th>
              <td>
                <select name="smoker" class="form-control" required="required">
                  <option <?php if($row['smoker']=='YES'){ echo "selected ";}?> value="YES">YES</option>
                  <option <?php if($row['smoker']=='NO'){ echo "selected ";}?> value="NO">NO</option>
                </td>
            </tr>
            <tr>
              <th>Enter Age</th>
              <td>
                <input type="number" min="1" name="person_age" class="form-control" value="<?php echo $row['age'] ?>">
              </td>
            </tr>
              <tr>
              <th>Select Gender</th>
              <td>
                <select name="gender" class="form-control" required="required">
                  <option <?php if($row['gender']=='MALE'){ echo "selected ";}?> value="MALE">MALE</option>
                  <option <?php if($row['gender']=='FEMALE'){ echo "selected ";}?> value="FEMALE">FEMAL</option>
                  <option <?php if($row['gender']=='OTHER'){ echo "selected ";}?> value="OTHER">OTHER</option>
                </td>
            </tr>
             <tr>
              <th>Select Year</th>
              <td>
                <select name="year" class="form-control" required="required">
                  <?php for ($i=10; $i <=30 ; $i=$i+5) {?> 
                  <option <?php if($row['year']==$i){ echo "selected ";}?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                  <?php } ?>
                </td>
            </tr>
           <?php  
           $exist="SELECT * FROM new_rates";
          $res=mysqli_query(con(), $exist);
          while($data=mysqli_fetch_array($res)){
            $get_rates_id=$data['id'];
                        ?>
                 <tr>       
           <th width="10%"><?php echo $data['rates'] ?><input type="hidden" name="index[]" value="<?php echo  $get_rates_id;?>"></th>
           <?php 
           $get_rates="SELECT * FROM company_rates where rates_id='$get_rates_id' AND company_id='$get_company_id' AND year='$get_year'";
           $run_qry=mysqli_query(con(), $get_rates);
           $val=mysqli_fetch_array($run_qry);
            ?>
           <td><input type="number" class="form-control" name="company[]" placeholder="insert Rate" value="<?php echo $val['value'] ?>"></td>


      </tr>
         <?php } ?>
       </table>


         </div>
         <button type="button" class="btn btn-primary" name="" id="insert_multirates_update">Submit</button>
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
