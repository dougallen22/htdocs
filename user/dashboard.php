<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="../css/dash.css">
    <link rel="stylesheet" href="css/style.css">

    <title>Protect Mutual</title>

</head>

<body>

    <?php include('../nav.php');
    ob_start();
    include('check_cookie.php');
    check_session();

    ?><br><br>

    <div class="container">
        <div class="wrapper">
            <h2 style="text-align: center">Your Insurance Dashboard</h2><br><br>

            <div class="tabs">
                <div><button class="tablink" onclick="openChoice(event,'quotes')">Quotes</button></div>
                <div><button class="tablink" onclick="openChoice(event,'advice')">Advice</button></div>
                <div><button class="tablink" onclick="openChoice(event,'polices')">My Polices</button></div>
                <div><button class="tablink" onclick="openChoice(event,'messages')">Secure Messages</button></div>
                <div><button class="tablink" onclick="openChoice(event,'upload')">Upload Documents</button></div>
                <div><button class="tablink" onclick="openChoice(event,'billing')">Billing</button></div>
                <div><button class="tablink" onclick="openChoice(event,'wills')">Wills & Trusts</button></div>
            </div><br>


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

            <div id="quotes" class="choice active">
                <h4>You selected...</h4><br>
                <div class="plan">

                    <div>
                        <p>Coverage</p><br>
                        <h2>$<?php echo number_format($coverage); ?></h2>
                    </div>

                    <div>
                        <p>Term</p><br>
                        <h2>$<?php echo number_format($resultt['year']); ?></h2>
                    </div>

                    <div>
                        <?php $filnam = dirname(__DIR__) . '/admin/images/' . $result['company_logo'];

                        if (!file_exists($filnam) || $result['company_logo'] == '') {
                            echo '<img src="../admin/images/company_dummy.png" width="90" height="60">';
                        } else {
                            echo '<img src="../admin/images/' . $result['company_logo'] . '" width="90" height="60">';
                        }
                        ?>
                    </div>

                    <div>
                        <p>Monthly</p><br>
                        <h2>$<?php echo $price; ?></h2><br>
                    </div>

                </div><br>

                <div>
                    <h2 style="color: #f35b12; font-weight: bold;"><i class="fa fa-forward"></i>FASTTRACK</h2>
                    <p><b>skip the wait.</b> if you call now, we can expedite your review.</p>
                    <p><b>FastTrack your review:</b></p>
                    <h3 style="padding:0; margin: 0;"><b>855:289:6450</b></h3>
                </div>
                <p>If you don't choose FastTrack, we'll call you later today for your review</p>
            </div>

            <div>
                <div id="advice" class="choice" style="display:none">
                    <h2>Advice</h2>
                    <p>Financial Experts recommend at least 10 times your annual salary in life insurance</p>
                </div>

                <div id="polices" class="choice" style="display:none">
                    <h2>My Polices</h2>
                    <p>Polices</p>
                </div>

                <div id="messages" class="choice" style="display:none">
                    <h2>Secure Messages</h2>

                    <form class="form-detail" method="post" action="" enctype="multipart/form-data">
                        <p style="text-align:center;">Feel free to contact admin if you have any questions. Admin will
                            respond shortly.</p><br>

                        <div>
                            <input type="email" name="email" id="email" class="input-text" placeholder="Your Email"
                                value="<?php echo $_SESSION['ruser']['email']; ?>" readonly>
                        </div>

                        <div>
                            <input type="text" name="subject" id="subject" class="input-text"
                                placeholder="Your Subject">
                        </div>

                        <div>
                            <input type="text" name="phone_no" id="phone_no" class="input-text"
                                placeholder="Mobile Number" value="<?php echo $_SESSION['ruser']['phone']; ?>" readonly>
                        </div>

                        <div>
                            <input type="text" textarea name="message" id="message" rows="100"
                                placeholder="Message....." required=""></textarea>
                        </div>

                        <div>
                            <input type="submit" name="send_admin" id="send" class="register" value="SEND">
                        </div>

                    </form>


                </div>

                <div id="upload" class="choice" style="display:none">
                    <h2 style="text-align: center">Upload Documents</h2><br>



                    <form action="" method="POST" role="form" enctype="multipart/form-data">

                        <div onclick="trigger2();" id="display2">
                            <img src="images/upload.png" id="img2" width="150px"><br><br>
                            <h1>Select File</h1><br>
                            <input type="file" name="upload" id="inputimg2" style="display: none"
                                onchange="displayimg2(this);">

                        </div>

                        <div class="alert alert-info" role="alert" id="others" style="display:none;"></div>

                        <p style="color: red; display:none; text-align: center; height: 100%;" id="p2">Only images,
                            word, excle or PDF files are accepted</p>
                        <p style="color: red; display:none; text-align: center; height: 100%;" id="pp2">Please Select a
                            File</p>

                        <input type="submit" class="btn btn-primary" name="submit" value="SUBMIT"
                            onclick="emptycheck();">
                    </form>

                    <div class="alert alert-info" role="alert" id="others" style="display: none;"></div>


<<<<<<< HEAD
                    <?php
=======
     <?php include('../footer.php'); ?>
>>>>>>> 92d1aa73eb853bb1f827b9f5a41e4a6bd4093390

                    if (isset($_POST['submit'])) {
                        $id = $_GET['data'];
                        $img2 = $_FILES['img2']['name'];
                        $extension = pathinfo($_FILES["img2"]["name"], PATHINFO_EXTENSION);
                        $newname = 'Document' . rand() . '.' . $extension;
                        if (!empty($img2) and ($extension == 'pdf' || $extension == 'docx' || $extension == 'doc' || $extension == 'csv' || $extension == 'xlsx' || $extension == 'png' || $extension == 'jpg' || $extension == 'jpeg')) {
                            if (!empty($doc)) {
                                $nstr = $doc . ',' . $newname;
                                $qry = "UPDATE user_plan SET document='$nstr' where id='$id'";
                                if (mysqli_query(con(), $qry)) {
                                    move_uploaded_file($_FILES['img2']['tmp_name'], "document/$newname");
                                    echo "<script> alert('successfully uploaded')</script>";
                                }
                            } else {
                                $qry = "UPDATE user_plan SET document='$newname' where id='$id'";
                                if (mysqli_query(con(), $qry)) {
                                    move_uploaded_file($_FILES['img2']['tmp_name'], "document/$newname");
                                    echo "<script> alert('Successfully Uploaded')</script>";
                                }
                            }
                        } else {
                            echo "<script> alert('Please Select a file')</script>";
                        }
                    }

                    ?>

                </div>

                <div id="billing" class="choice" style="display:none">
                    <h2>Billing</h2>
                    <p>Billing</p>
                </div>

                <div id="wills" class="choice" style="display:none">
                    <h2>Wills & Trusts</h2>
                    <p>Wills & Trusts</p>
                </div>
            </div>


        </div>


    </div>

    <?php include('../footer.php'); ?>



    <script>
    /*///////////////////////////////////////////////////////////////////////////////////////////////////////
                                  Tabs
                  ///////////////////////////////////////////////////////////////////////////////////////////////////////*/

    function openChoice(evt, choiceName) {
        var i, x, tablinks;
        x = document.getElementsByClassName("choice");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }

        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < x.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" color:#FF0000", "");
        }

        document.getElementById(choiceName).style.display = "block";
        evt.currentTarget.className += " color:#FF0000";
    }
    </script>



    <script>
    /*///////////////////////////////////////////////////////////////////////////////////////////////////////
                                    Document upload
            ///////////////////////////////////////////////////////////////////////////////////////////////////////*/

    function emptycheck() {
        var filenname = document.getElementById('inputimg2').value;
        if (filenname = '') {
            document.getElementById('pp2').style.display = 'inherit';

        }
    }

    function trigger2() {
        document.querySelector('#inputimg2').click();
    }

    function displayimg2(e) {
        var filename = document.querySelector('#inputimg2').value;
        var fileExtention = filename.substr(filename.lastIndexOf('.') + 1);
        if (fileExtention === 'png' || fileExtention === 'jpg' || fileExtention === 'jpeg') {
            document.querySelector('#p2').style.display = 'none';
            if (e.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.querySelector('#img2').setAttribute('src', e.target.result);
                    document.querySelector('#img2').style.width = '25%';

                }
                reader.readAsDataURL(e.files[0]);
            }

        } else if (fileExtention === 'pdf' || fileExtention === 'docx' || fileExtention === 'doc' || fileExtention ===
            'csv' || fileExtention === 'xlsx') {
            $("#img2").removeAttr("src");
            document.querySelector('#others').style.display = 'block';
            document.getElementById('others').innerHTML = filename;
        } else {
            document.querySelector('#p2').style.display = 'inherit';
            document.querySelector('#display2').style.background = 'none';
        }
    }


<<<<<<< HEAD
    $(document).ready(function() {
        hrf = $(".pull-left a").attr('href');
        $(".pull-left a").attr('href', '../' + hrf);
        hrf = $(".pull-right a").attr('href');
        $(".pull-right a").attr('href', '../' + hrf);
        img = $(".uimg").attr('src');
        $(".uimg").attr('src', '../' + img);
    });
    /*///////////////////////////////////////////////////////////////////////////////////////////////////////
                        Document upload finished
    ///////////////////////////////////////////////////////////////////////////////////////////////////////*/
    </script>
=======
$(document).ready(function() {
hrf=$(".pull-left a").attr('href');
$(".pull-left a").attr('href', '../'+hrf);
hrf=$(".pull-right a").attr('href');
$(".pull-right a").attr('href', '../'+hrf);
/*img=$(".uimg").attr('src');
$(".uimg").attr('src', '../'+img);*/
});
     /*///////////////////////////////////////////////////////////////////////////////////////////////////////
                         Document upload finished
     ///////////////////////////////////////////////////////////////////////////////////////////////////////*/
     </script>
>>>>>>> 92d1aa73eb853bb1f827b9f5a41e4a6bd4093390

    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>













</body>

</html>