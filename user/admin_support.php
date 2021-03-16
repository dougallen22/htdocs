<?php
 session_start();
 ob_start();
    include('includes/functions.php'); 
    check_session();
  
   if(isset($_POST['send_admin'])){
    $subject    = $_POST['subject'];
	$email      = $_POST['email'];
	$phone    = mysqli_real_escape_string(con(),$_POST['phone_no']);
    $message    = mysqli_real_escape_string(con(),$_POST['message']); 
    $status       = '';
    $time=date('m-d-Y H:m:s');
   

  


  
    $insert = "insert into admin_support (subject,email,phone,message,status,query_time) values ('$subject','$email','$phone','$message','$status','$time')";
        $run = mysqli_query(con(), $insert);

    if($run){
                  	$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  
  $headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: info@protectmutual.com'.''."\r\n";
$headers .= 'Reply-To: '.$email. "\r\n";
$headers .= "X-Mailer: PHP". phpversion() ."\r\n";
        $msg = "Mobile Number : ".$phone."<br><hr> Message : ".$message."<br><hr></br><br>Query Came From <a href=".$actual_link."><b>Protect Mutual</b></a> at ".date('m-d-Y H:i:s');

        mail('dkallen1020@gmail.com',$subject,$msg,$headers);
        echo"<script>alert('Your message sent successfully to admin')</script>";
        echo"<script>window.location=''</script>";

    }
    else{
         echo"<script>alert('OOPS Something went wrong. Please try again')</script>";
    }
	
}
    ?>
<!DOCTYPE html>
<html>
<title>Admin Support</title>
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
          
       Admin Support
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Admin Support</li>
      </ol>
    </section>
    <br>
<section class="content">
<div class="page-content">
		<div class="form-v9-content" style="background-image: url('form-images/form-v9.jpg')">
		    
			<form class="form-detail" method="post" action="" enctype="multipart/form-data">
			    <p style="text-align:center;">Feel free to contact admin if you have any query. Admin will respond shortly. Thanks</p>
				<h2>Admin Support</h2>
				
				<div class="form-row-total">
					<div class="form-row">
						
					</div>

					<div class="form-row">
						
					</div>
				</div>
				<div class="form-row-total">
					<div class="form-row">
					<input type="email" name="email" id="email" class="input-text" placeholder="Your Email" value="<?php echo $_SESSION['ruser']['email']; ?>" readonly>
					</div>
					<div class="form-row">	
                        <input type="text" name="subject" id="subject" class="input-text" placeholder="Your Subject"  >
					</div>
				</div>
				<div class="form-row-total">
					
					<input type="text" name="phone_no" id="phone_no" class="input-text" placeholder="Mobile Number" value="<?php echo $_SESSION['ruser']['phone']; ?>" readonly>
					</div> 
				
				
		            <div class="form-row-total">
				
					<textarea name="message" id="message" rows="5" placeholder="Message....." required=""></textarea>	
					
					
				</div>
				
				<div class="form-row-total">
					<div class="form-row">
					
						
					</div>
					<div class="form-row">
						
						<input type="submit" name="send_admin" id="send" class="register" value="Send">
					</div>
					<div class="form-row">
						
						
					</div>
				

			
			</form>
		</div>
	</div>

    </section>
  </div>
  <!-- /.content-wrapper -->
<?php include('footer.php');  ?>

</div>
<?php include('footer_js.php');  ?>
  
</body>

</html>
