<?php
if (!isset($_SESSION)) {
    session_start();
}
include("user/includes/functions.php");
$con = con();
$proid=$_GET['productid'];
$id = @$_SESSION['ruser']['id'];
$sel_user = "select * from user_info where id='$id'";

$run_user = mysqli_query($con, $sel_user);

$check_user = mysqli_num_rows($run_user);
$row = mysqli_fetch_array($run_user);
$nme = @$_SESSION['ruser']['fname'] . ' ' . @$_SESSION['ruser']['sname'];

if ($row['profile_pic'] != '') {
    $filename = str_replace("\user", "", getcwd()) . "/user/dist/img/" . $row['profile_pic'];
    if (!file_exists($filename)) {
        $img = str_replace(basename($_SERVER['PHP_SELF']) . "?" . $_SERVER['QUERY_STRING'], "", (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")) . "://$_SERVER[HTTP_HOST]" . '/protectmutual/user/dist/img/admin_dummy.png';
    } else {
        $img = str_replace(basename($_SERVER['PHP_SELF']) . "?" . $_SERVER['QUERY_STRING'], "", (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")) . "://$_SERVER[HTTP_HOST]" . '/protectmutual/user/dist/img/' . $row['profile_pic'];
    }
} else {
    $img = str_replace(basename($_SERVER['PHP_SELF']) . "?" . $_SERVER['QUERY_STRING'], "", (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")) . "://$_SERVER[HTTP_HOST]" . '/protectmutual/user/dist/img/admin_dummy.png';
}

?>


<header>
    <div class="container-nav">
        <nav>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <img src="images/menu.svg" class="menu"></a>
            <ul>
                <li>
                    <a href="index.php"> <img src="images/svg/logo.svg" alt="logo" class="logo style: width=" 209px
                            height="41px"></a>
                </li>

                <li id="mobileMenu" class="mobile">
                    <a href="dashboard.php?productid=<?php echo $proid; ?>">Dashboard</a>
                    <a href="dashboard.php?productid=<?php echo $proid; ?>">Messages</a>
                    <a href="tel:123-456-7890p123"><img src="images/phone-primary-bubble-phone.svg" alt="phone"></a>

                    <?php if (@$_SESSION['ruser']) { ?>

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                        <img class="uimg" src="<?php echo $img; ?>">
                        <span
                            class="hidden-xs"><?php echo @$_SESSION['ruser']['fname'] . ' ' . @$_SESSION['ruser']['sname']; ?></span>
                    </a>
                    <ul class="dropdown-menu" style="left:940px;right:0;width:30%; top: 64px">
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
            </ul>


        </nav>
    </div>

</header>


<body>


    <script>
    function myFunction() {
        var x = document.getElementById("mobileMenu");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }
    </script>


</body>