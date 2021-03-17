   <?php
    if (!isset($_SESSION)) {
        session_start();
    }
    include("user/includes/functions.php");
    $con = con();
    $id = @$_SESSION['ruser']['id'];
    $sel_user = "select * from user_info where id='$id'";

    $run_user = mysqli_query($con, $sel_user);

    $check_user = mysqli_num_rows($run_user);
    $row = mysqli_fetch_array($run_user);
    $nme = @$_SESSION['ruser']['fname'] . ' ' . @$_SESSION['ruser']['sname'];
    if ($row['profile_pic'] != '') {
        $filename = getcwd() . "/user/dist/img/" . $row['profile_pic'];
        if (!file_exists($filename)) {
            $img = '/user/dist/img/admin_dummy.png';
        } else {
            $img = '/user/dist/img/' . $row['profile_pic'];
        }
    } else {
        $img = '/user/dist/img/admin_dummy.png';
    }

    ?>

   <header>
       <div class="container-nav">
           <nav>
               <ul>
                   <li>
                       <a href="index.php"> <img src="images/svg/logo.svg" alt="logo" style: width="209px"
                               height="41px"></a>
                   </li>


                   <li>
                       <a href="tel:123-456-7890"><img src="images/operator-primary-bubble.svg" alt="operator"></a>
                       <a href="tel:123-456-7890p123"><img src="images/svg/chat.svg" class="chat-nav" alt="chat"></a>
                       <a href="tel:123-456-7890p123"><img src="images/phone-primary-bubble-phone.svg" alt="phone"></a>
                       <?php if (@$_SESSION['ruser']) { ?>

                       <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                           <img class="uimg" src="<?php echo $img; ?>">
                           <span
                               class="hidden-xs"><?php echo @$_SESSION['ruser']['fname'] . ' ' . @$_SESSION['ruser']['sname']; ?></span>

                       </a>

                       <ul class="dropdown-menu" style="left:940px;right:0;width:30%;">
                           <!-- User image -->
                           <li class="user-header" style="flex-direction:column;text-align:center; align-items:center;">
                               <img class="uimg" src="<?php echo $img; ?>"
                                   style="border-radius:100px; height:100px; width:100px;">
                               <p><?php echo @$_SESSION['ruser']['fname'] . ' ' . @$_SESSION['ruser']['sname']; ?>
                                   <small></small>
                               </p>
                           </li>

                           <!-- Menu Footer-->
                           <div class="user-footer">
                               <div class="pull-left">
                                   <a href="user/user_profile.php?data=<?php echo $id; ?>"
                                       class="btn btn-default btn-flat">Profile</a>
                               </div>
                               <div class="pull-right">
                                   <a href="user/logout.php" class="btn btn-default btn-flat">Sign out</a>
                               </div>
                           </div>
                       </ul>
                       <?php } ?>
                   </li>

                   <li><a href="tel:123-456-7890"><img src="images/phone-primary-bubble-phone.svg"></a>
                   </li>
               </ul>
           </nav>
       </div>
   </header>