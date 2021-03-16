 
 <?php
 if(isset($_POST['upload_image'])){
     $r_idd=$_POST['r_id'];
    $img=$_FILES['image'.$r_idd]['name'];
    $tmp=$_FILES['image'.$r_idd]['tmp_name'];
    
    move_uploaded_file($tmp, "images/".$img);
   
 
     $qimg="update rates SET company_logo='$img' where id='$r_idd'";
$runimg=mysqli_query(con(),$qimg);
if($runimg)
{
	echo "<script>alert('Logo Changed Successfully');</script>";
}
else{
    echo "<script>alert('OOPS something went wrong. Try Again');</script>";
}
}
 
 ?>
 
 <div class="modal fade" id="change_image" role="dialog">
          <div class="modal-dialog modal-sm"> <div class="modal-content">
               <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button> 
                    <center><h4 class="modal-title">Select Image</h4></center> </div> 
                    <div class="modal-body"> 

<div class="imageupload panel panel-default">
                                    <div class="file-tab panel-body"> 
                                    <label class="btn btn-default btn-file"> <span>Select Profile Photo</span>
                                    <!-- The file is stored here. --> 
                                    <input type="file" name="image" id="image-file" accept="image/*"> </label> <button type="button" class=                                    "btn btn-default">Remove</button> 
                                    </div>
                                 </div>
                       
                                         </div>
                            <div class="modal-footer"> <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                         
                                         <button type="submit" name="upload_image" id="upload_image" class="btn btn-success">Upload</button> 
                                         </div>
                                         </div> 
                                         
                                         </div>
                                         </div> 
                      <?php
                      $ra="select * from rates order by id desc";
    
        $run_ra=mysqli_query(con(),$ra);
        while($row_es=mysqli_fetch_array($run_ra)){                   
                                         ?>
                                         <div class="modal fade" id="change_image<?php echo $row_es['id']; ?>" role="dialog">
          <div class="modal-dialog modal-sm"> <div class="modal-content">
              <form method="post" action="" enctype="multipart/form-data">
               <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button> 
                    <center><h4 class="modal-title">Select Image</h4></center> </div> 
                    <div class="modal-body"> 


                                    
                                    <label>
                                    <!-- The file is stored here. --> 
                                   <input type="hidden" name="r_id" value="<?php echo $row_es['id']; ?>">
                                    <input type="file" name="image<?php echo $row_es['id']; ?>" id="image-file" accept="image/*" required> </label>
                                    
                                
                       
                                         </div>
                            <div class="modal-footer"> <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                         
                                         <button type="submit" name="upload_image"  class="btn btn-success">Upload</button> 
                                         </div>
                                         </form>
                                         </div> 
                                         
                                         </div>
                                         </div> 
                                         
                            <?php  }    ?>        
                                         
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
         <!-- <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">-->
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
           <!-- <img src="dist/img/<?php echo $row['profile_pic']; ?>" class="user-image">-->
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['user']['user_name'].' <br><b style="color:#00ff37;"> '.ucfirst($_SESSION['user']['user_type'])."</b>";?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <?php if($_SESSION['user']['user_type']=='admin'){ ?>
      <!-- search form -->
      <form action="users_profile.php" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="data" class="form-control" placeholder="Search by id or email">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <?php  }  ?>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Sidebar</li>
          <li>
          <a href="index.php">
           <span class="fa fa-dashboard active"></span> <span>Dashboard</span>
            <span class="pull-right-container">
             <!-- <small class="label pull-right bg-green">new</small>-->
            </span>
          </a>
        </li>
         <li>
          <a href="insert_company_rates.php">
           <span class="fa fa-plus"></span> <span>Insert Rates</span>
            <span class="pull-right-container">
             <!-- <small class="label pull-right bg-green">new</small>-->
            </span>
          </a>
        </li>
        
           <li>
          <a href="all_rates.php">
           <span class="fa  fa-th-list"></span> <span>All Rates</span>
            <span class="pull-right-container">
             <!-- <small class="label pull-right bg-green">new</small>-->
            </span>
          </a>
        </li>
        
        <?php if($_SESSION['user']['user_type']!='secondary admin'){ ?>
         <li>
          <a href="add_secondary_admin.php">
            <span class="fa fa-user-plus" ></span><span>Add Secondary Admin</span>
           <span class="pull-right-container">
             <!-- <small class="label pull-right bg-green">new</small>-->
            </span>
          </a>
        </li>
        <?php }   ?>
         <li>
  <?php if($_SESSION['user']['user_type']!='secondary admin'){ ?>
        <li>
          <a href="users_info.php">
           <span class="fa fa-users"></span> <span>All Secondary Admins</span>
            <span class="pull-right-container">
             <!-- <small class="label pull-right bg-green">new</small>-->
            </span>
          </a>
        </li>
        
  <?php }   ?>
        <li>
          <a href="all_users.php">
           <span class="fa fa-users"></span> <span>All Users</span>
            <span class="pull-right-container">
             <!-- <small class="label pull-right bg-green">new</small>-->
            </span>
          </a>
        </li>
        <li>
          <a href="all_plans.php">
           <span class="fa fa-tasks"></span> <span>All plans</span>
            <span class="pull-right-container">
             <!-- <small class="label pull-right bg-green">new</small>-->
            </span>
          </a>
        </li>
         <li>
          <a href="users_queries.php">
            <span class="glyphicon glyphicon-envelope" ></span><span>Users Queries</span>
           <span class="pull-right-container">
             <!-- <small class="label pull-right bg-green">new</small>-->
            </span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

