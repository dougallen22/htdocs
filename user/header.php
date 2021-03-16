
<header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>P</b>TM</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Protect</b> Mutual</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <?php  if($_SESSION['ruser']){ ?>
  <li>
            <a href="admin_support.php"  style="color:#00ff37;">
              <b><span class="glyphicon glyphicon-user"></span>
              <span> Admin Support</span>
            </a>
            </b>
          </li>
          <?php  } ?>
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php
                
                $row=get_user_row();
                
                if($row['profile_pic']!=''){
		 $filename =getcwd()."/dist/img/".$row['profile_pic'];

            if (!file_exists($filename)) 
            {
            ?>
             <img src="dist/img/admin_dummy.png" class="user-image">
             <?php } else{ ?>
             <img src="dist/img/<?php echo $row['profile_pic']; ?>" class="user-image">
           <?php  }
                }
                else{
                ?>
                
              <img src="dist/img/admin_dummy.png" class="user-image" >
               <?php } ?>
              <span class="hidden-xs"><?php echo $_SESSION['ruser']['fname'].' '.$_SESSION['ruser']['sname'];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
              
                                 <?php
                $row=get_user_row();
                
                if($row['profile_pic']!=''){
		    $filename =getcwd()."/dist/img/".$row['profile_pic'];

                if (!file_exists($filename)) 
                {
                ?>
             <img src="dist/img/admin_dummy.png" class="img-circle">
             <?php } else{ ?>
             <img src="dist/img/<?php echo $row['profile_pic']; ?>" class="img-circle">
           <?php  }
                }
                else{
                ?>
                
              <img src="dist/img/admin_dummy.png" class="img-circle" >
               <?php } ?>

                <p>
                   
                 <?php echo $_SESSION['ruser']['fname'].' '.$_SESSION['ruser']['sname'];?>
                    
                  <small></small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                            
                    
                  <div class="col-xs-12 text-center">
                  <center> <button class="btn btn-success" data-toggle="modal" data-target="#change_image">Change Image</button></center>
                
                  </div>
                    
                    
                  
                </div>
                <!-- /.row -->
              </li>
              <?php $id=$_SESSION['ruser']['id']; ?>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="user_profile.php?data=<?php echo $id; ?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        
        </ul>
      </div>

    </nav>

  </header>
  <div class="table-responsive">
				
				<div id="user_details"></div>
				<div id="user_model_details"></div>
			</div>
		<audio id="audio" src="http://www.soundjay.com/button/beep-07.wav" autostart="false" ></audio>