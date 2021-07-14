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
    <title>Documents</title>
    <?php include('maincss.php'); ?>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <?php include('navigation.php'); ?>
    <div class="container">
        <div class="wrapper">
            <div class="wrap">
                <h1>Send Secure Documents</h1><br>
                <form action="" method="POST" role="form" enctype="multipart/form-data">
                    <div onclick="trigger2();" id="display2">
                        <img src="" id="img2" width="100px">
                        <input type="file" name="img2" id="inputimg2" style="display: none"
                            onchange="displayimg2(this);">
                        <h1 class="click_here">Click here to Select</h1><br>
                        <h1><span class="glyphicon glyphicon-cloud-upload" aria-hidden="true"></span></h1><br><br>
                    </div>
                    <div class="alert alert-info" role="alert" id="others" style="display:none;"></div>

                    <p style="color: red; display:none; text-align: center; height: 100%;" id="p2">Only
                        images, word, excle or PDF files are accepted</p>
                    <p style="color: red; display:none; text-align: center; height: 100%;" id="pp2">Please
                        Select a File</p>
                    <button type="submit" name="submit" onclick="emptycheck();">Upload

                </form>
            </div>
        </div>


        <?php include('footer.php'); ?>
        <?php include('mainjs.php'); ?>
</body>

</html>