<?php
session_start();
include('user/check_cookie.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>About Protect Mutual</title>
    <?php include('maincss.php'); ?>
</head>

<body>

    <?php include('nav.php');
    ?>

    <div class="container">
        <div class="wrapper">

            <h1>Privacy Policy</h1>
















        </div>
    </div>


    <style>
        .container {
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;

        }

        .wrapper {
            margin-right: auto;
            /* 1 */
            margin-left: auto;
            /* 1 */
            max-width: 68em;
            /* 2 */
            padding-right: 25px;
            /* 3 */
            padding-left: 25px;
            /* 3 */
            padding-bottom: 25px;
            padding-top: 25px;
            margin-top: 50px;

        }
    </style>

    <?php include('footer.php'); ?>
    <?php include('mainjs.php'); ?>
</body>

</html>