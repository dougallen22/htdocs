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

    <?php include('navigation.php'); ?>
    <div class="container">
        <div class="wrapper">
            <div class="wrap">
                <h1>Secure Messages</h1>
                <form action="" enctype="multipart/form-data">

                    <div class="message_name">
                        <div>
                            <h3>Name</h3>
                        </div>
                        <input type="text" id="name" name="name" placeholder="Your name..."
                            value="<?php echo $_SESSION['ruser']['fname'] . ' ' . @$_SESSION['ruser']['sname']; ?>">
                    </div>

                    <div class="message_email">
                        <div>
                            <h3>Email</h3>
                        </div>
                        <input type="text" id="email" name="email" placeholder="Your email address..."
                            value="<?php echo $_SESSION['ruser']['email']; ?>">
                    </div>

                    <div class="message_phone">
                        <div>
                            <h3>Phone Number</h3>
                        </div>
                        <input type="text" id="phone" name="phone" placeholder="Your Phone Number..."
                            value="<?php echo $_SESSION['ruser']['phone']; ?>">
                    </div>

                    <label for="message">Message</label>
                    <textarea id="message" name="message" placeholder="Write your message..."
                        style="height:200px"></textarea>

                    <input type="submit" value="SUBMIT">
                </form>
            </div>
        </div>
    </div>



    <?php include('footer.php'); ?>
    <?php include('mainjs.php'); ?>
</body>

</html>