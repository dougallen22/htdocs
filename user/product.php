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
 
 <style>
  .conatiner{
    width: 100%;
  }
  .nav-tabs li a {
    background: #d2d6de; 
    font-weight: bold;
  }
  .shopping{
    display: flex; 
    margin-top: 40px; 
    flex-direction: row; 
    width: 100%;
  }
  .leftportion{
    flex-basis: 50%;
  }
  .rightportion{
    flex-basis: 50%;
  }
  @media (max-width: 768px) {
    .shopping{
      flex-direction: column;
    }
    .leftportion{
      width: 100%;
    }
    .rightportion{
      width: 100%;
    }
  }
  @media (min-width: 1200px) {
    .container{
      width: 100%;
    }
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
  <div class="container">
    <h3><b>Life Insurance</b></h3>
  <div role="tabpanel">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active" >
        <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Shopping</a>
      </li>
      <li role="presentation">
        <a href="#Advice" aria-controls="Advice" role="tab" data-toggle="tab">Advice</a>
      </li>
      <li role="presentation">
        <a href="#Policies" aria-controls="Policies" role="tab" data-toggle="tab">My Policies</a>
      </li>
    </ul>
  
    <!-- Tab panes -->
    <div class="tab-content">
      <div role="tabpanel" class="tab-pane active" id="home">
        
          <div class="shopping">
          <div class="container leftportion">
          <h4 style="padding-left: 25px;"><b>Here's what happens next:</b></h4>
          <ul>
            <li>we'll verify your information over phone</li>
            <li>we'll help you choose the right insurer</li>
            <li>Question? Ask away-we're here to help</li>
          </ul>

          <div class="well" style="margin-left: 19px;">
          <h5><b>YOU'VE SELECTED FOR</b></h5>
          <h2 style="color: #f35b12; font-weight: bold;"><i class="fa fa-forward"></i>FASTTRACK</h2>
          <p><b>skip the wait.</b> if you call now, we can expedite your review.</p>
          <p><b>FastTrack your review:</b></p>
          <h3 style="padding:0; margin: 0;"><b>855:289:6450</b></h3>
          </div>
          <p style="margin-left: 19px;">If you don't choose FastTrack, we'll call you later today for your review</p>
          </div>

          <?php
          $email=$_SESSION['ruser']['email'];
          if (isset($_GET['productid']) and !empty($_GET['productid'])) {
            $productid=$_GET['productid'];
          }
          else
          {
            header('location:index.php');
          }
            $qry="SELECT * FROM user_plan where id='$productid'";
            $ru=mysqli_query(con(), $qry);
            $result=mysqli_fetch_array($ru);
            if ($email!=$result['email']) {
           header('location:index.php');
            }
            else{
            $price=$result['price'];
            $coverage=$result['coverage'];
            $company_name=$result['company_name'];
                }
           ?>




          <div class="container rightportion" >
          <h4>You selected...</h4>
          <div class="well" style="background: white;">

            <section style="text-align: center; margin-left: -19px; margin-right: -19px;">
              <h2 style="padding: 0; margin:0; "><b><?php echo $price; ?></b></h2>
              <p style=" border-bottom: 1px solid silver;">Monthly</p>
            </section>

            <table width="100%">
                <?php $filnam =getcwd()."admin/images/".$result['company_logo'];

            if (!file_exists($filnam) || $result['company_logo']=='') {
               echo '<img src="/admin/images/company_dummy.png" width="90" height="60">'; 
            }
            else{
               echo '<img src="/admin/images/'.$result['company_logo'].'" width="90" height="60">'; 
            }
            ?>
                          <caption>Level</caption>
              <thead>
                <th>Coverage</th>
                <th>Company</th>
              </thead>
              <tbody>
                <td>$<?php echo number_format($coverage); ?></td>
                <td><?php echo $company_name; ?></td>
              </tbody>
            </table>

            </div>
          </div>
      

          </div>
      </div>
      <div role="tabpanel" class="tab-pane" id="Advice"><b></b></div>
      <div role="tabpanel" class="tab-pane" id="Policies"><i>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed reiciendis, unde eligendi temporibus reprehenderit, quas ullam nemo debitis molestiae cupiditate recusandae animi nulla, laboriosam rem. Ratione, voluptatum voluptate officiis aspernatur!</i></div>
    </div>
  </div>
</div>
     
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
