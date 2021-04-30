<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Protect Mutual Confirmation</title>
</head>

<body>
    <?php include('../navconfirm.php');
    ob_start();
    include('check_cookie.php');
    check_session();

    ?>
    <div class="container">
        <?php
        $email = $_SESSION['ruser']['email'];
        if (isset($_GET['productid']) and !empty($_GET['productid'])) {
            $productid = $_GET['productid'];
        } else {
            header('location:index.php');
        }
        $qry = "SELECT * FROM user_plan where id='$productid'";
        $ru = mysqli_query(con(), $qry);
        $result = mysqli_fetch_array($ru);
        if ($email != $result['email']) {
            header('location:index.php');
        } else {
            $price = $result['price'];
            $coverage = $result['coverage'];
            $company_name = $result['company_name'];
            $rats_id = $result['rates_id'];
            $qryy = "SELECT * FROM  company_rates where id='$rats_id'";
            $ruu = mysqli_query(con(), $qryy);
            $resultt = mysqli_fetch_array($ruu);
        }
        ?>

        <div id="quotes" class="confirmation">
            <div class="conf-box">
                <h1>Thanks we received your request...</h1><br><br>
                <div class="confirmation-plan">
                    <div class="cover">
                        <h4>Coverage</h4><br>
                        <h2>$<?php echo number_format($coverage); ?></h2>
                    </div>

                    <div class="term">
                        <h4>Term</h4><br>
                        <h2>$<?php echo number_format($resultt['year']); ?></h2>
                    </div>

                    <div class="company">
                        <h4>Company</h4><br>
                        <?php $filnam = dirname(__DIR__) . '/admin/images/' . $result['company_logo'];

                        if (!file_exists($filnam) || $result['company_logo'] == '') {
                            echo '<img src="../admin/images/company_dummy.png" width="60" height="25">';
                        } else {
                            echo '<img src="../admin/images/' . $result['company_logo'] . '" width="60" height="25">';
                        }
                        ?>
                    </div>

                    <div class="monthly">
                        <h4>Monthly</h4><br>
                        <h2>$<?php echo $price; ?></h2>
                    </div>
                </div>

                <div class="next">
                    <div>
                        <h3>Life Insurance</h3><br>
                        <h3>Douglas Allen</h3>
                    </div>
                    <div>
                        <h2>Here's what happens next</h2><br>
                        <ul>
                            <li>One of our licensed agents will call you to verify your information.</li>
                            <li>We will answer any questions you may have.</li>
                            <li>We help you select an insurance company.</li>

                        </ul>
                    </div>
                </div>

                <div class="fasttrack">
                    <h2 style="color: #f35b12; font-weight: bold;"><i class="fa fa-forward"></i>FASTTRACK</h2><br>
                    <ul>
                        <li>Skip the wait. If you call now, we can expedite your review.</li>
                        <li>If you don't choose FastTrack, we'll call you later today for your review</li>
                    </ul>
                    <h3>855:289:6450</h3>
                </div>
            </div>
        </div>
        <?php include('../footer.php'); ?>
</body>

</html>