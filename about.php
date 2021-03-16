<?php
session_start();
include('user/check_cookie.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <title>About Protect Mutual</title>
    <?php include('maincss.php'); ?>
  </head>

  <body>
    <?php include('nav.php');
    ?>

    <div class="container">
      <div class="wrapper">
        <h1>About Us</h1>
        <p>
          Protect Mutual is a leader in the online insurance marketplace. Our
          mission is to make it easy for you to shop and learn about insurance
          coverages as well as find the best price.
        </p>

        <h2>Our Company</h2>
        <p>
          Protect Mutual is an online marketplace and not an insurance company.
          However we represent over 50 companies to ensure you get the coverage
          from a reputable insurance company at a price you can afford.
        </p>

        <h2>Where we differ</h2>
        <p>
          Our founders have a backround in insurance for over 25 years. We were
          not founded by computer programmers. We took our vast knowledge of
          insurance and took it online to provide site to provide info and
          pricing.
        </p>

        <h2>Why Protect Mutual</h2>
        <p>
          Our team is the most knowlegable on insurance products than any online
          insurance marketplace. We have the training and experience you need to
          ensure you are properly covered
        </p>
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
        margin-left: auto;
        max-width: 68em;
        padding-right: 25px;
        padding-left: 25px;
        padding-bottom: 25px;
        padding-top: 25px;
        margin-top: 50px;
      }
    </style>

    <?php include('footer.php'); ?>
    <?php include('mainjs.php'); ?>
  </body>
</html>
