<?php
session_start();
include('user/check_cookie.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title>About Protect Mutual</title>
    <?php include('maincss.php'); ?>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <?php include('nav.php'); ?>
    <div class="container">
        <div class="wrapper">
            <div class="wrap">
                <h2>Secure Messages</h2>

                <form class="form-detail" method="post" action="" enctype="multipart/form-data">
                    <p style="text-align:center;">Feel free to contact admin if you have any questions. Admin
                        will
                        respond shortly.</p><br>

                    <div>
                        <input type="email" name="email" id="email" class="input-text" placeholder="Your Email"
                            value="<?php echo $_SESSION['ruser']['email']; ?>" readonly>
                    </div>

                    <div>
                        <input type="text" name="subject" id="subject" class="input-text" placeholder="Your Subject">
                    </div>

                    <div>
                        <input type="text" name="phone_no" id="phone_no" class="input-text" placeholder="Mobile Number"
                            value="<?php echo $_SESSION['ruser']['phone']; ?>" readonly>
                    </div>

                    <div>
                        <input type="text" textarea name="message" id="message" rows="100" placeholder="Message....."
                            required=""></textarea>
                    </div>

                    <div>
                        <input type="submit" name="send_admin" id="send" class="register" value="SEND">
                    </div>

                </form>
            </div>
        </div>
    </div>



    <?php include('footer.php'); ?>
    <?php include('mainjs.php'); ?>
</body>

</html>