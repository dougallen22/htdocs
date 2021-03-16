<?php
session_start();
include('user/check_cookie.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('maincss.php'); ?>
    <link rel="stylesheet" href="css/style.css">
    <title>Protect Mutual</title>

</head>

<body>
    <?php include('nav.php'); ?>
    <div class="container">
        <form id="form" method="post" action="submit-form.php">

            <!-- ////////////////////////////////////////
                                Caculates Rates
                    //////////////////////////////////////////////// -->
            <?php

            if (!isset($_GET['id']) or !isset($_GET['coverage'])) {
                header('location: index.php');
            } else {

                $id = $_GET['id'];
                $coverage = $_GET['coverage'];
                $coveragevalue = $_GET['coveragevalue'];
                $company_name = $_GET['company_name'];
                $company_logo = $_GET['company_logo'];

                $check_record = "SELECT * FROM company_rates where id='$id'";
                $run = mysqli_query(con(), $check_record);
                $num_row = mysqli_num_rows($run);
                $result = mysqli_fetch_array($run);
                if ($num_row < 1) {
                    header('location:index.php');
                }
            }
            ?>

            <!-- ////////////////////////////////////////
                                Hidden Fields
                    //////////////////////////////////////////////// -->
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="coverage" value="<?php echo $coverage; ?>">
            <input type="hidden" name="coveragevalue" value="<?php echo $coveragevalue; ?>">
            <input type="hidden" name="company_name" value="<?php echo $company_name; ?>">
            <input type="hidden" name="company_logo" value="<?php echo $company_logo; ?>">

            <!-- ////////////////////////////////////////
                                Hidden Fields finished
                    //////////////////////////////////////////////// -->

            <div class="tab">
                <div class="title-mobile">
                    <h2>Great! Let's Do This!</h2><br>
                    <p>We need a little information to get your coverage started A licensed agent will give you a call
                        to verify your identity and information Don't worry there is no obligation to buy until you
                        areready.
                    </p><br>
                </div>
                <div class="form-row" id="valuseforresponsive">
                    <div class="form-holder">
                        <h2 class="selected">Coverage <br><br> <b>$<?php echo $coverage; ?></b></h2>
                        <h2 class="selected">Year <br><br> <b><?php echo $_GET['year']; ?></b></h2>
                        <h2 class="selected">Company <br><br> <b><?php echo $company_name; ?></b></h2>
                        <h2 class="selected">Monthly <br><br>$ <b><?php echo $result['value'] ?></b></h2>
                    </div>
                </div><br>

                <div class="fname">
                    <div>
                        <h3>First Name</h3>
                    </div>
                    <input type="text" id="fname" oninput="this.className = ''" name="fname"
                        value="<?php echo @$_COOKIE['pfname']; ?>" placeholder="Enter Your First Name">
                </div>

                <div class="lname">
                    <div>
                        <h3>Last Name</h3>
                    </div>
                    <input type="text" id="lname" oninput="this.className = ''" name="lname"
                        value="<?php echo @$_COOKIE['plname']; ?>" placeholder="Enter Your Last Name">
                </div>

                <div class="email">
                    <div>
                        <h3>Email</h3>
                    </div>
                    <input type="email" id="email" oninput="this.className = ''" name="email"
                        value="<?php echo @$_COOKIE['pemail']; ?>" placeholder="Enter Your Email">
                </div>

                <div class="phone">
                    <div>
                        <h3>Phone Number</h3>
                    </div>
                    <input type="text" id="phone" oninput="this.className = ''" name="phone"
                        value="<?php echo @$_COOKIE['pphone']; ?>" placeholder="Enter Your Phone Number">
                </div>
            </div>

            <div class="tab">
                <div class="title-mobile">
                    <div>
                        <h3>Almost There!</h3><br>
                    </div>
                    <p>A few more questions. We do not share your personal information.
                        Don't worry there is no obligation to buy until you are ready. We are here to answer any
                        questions.
                    </p><br>
                </div>
                <div>
                    <label for="gender">Your Gender<br><br>
                        <input <?php if ($result['gender'] == 'MALE') {
                                    echo "checked";
                                }  ?> type="radio" name="gender" value="Male"> Male
                        <input <?php if ($result['gender'] == 'FEMALE') {
                                    echo "checked";
                                } ?> type="radio" name="gender" value="Female"> Female
                    </label>
                </div><br>

                <div class="address">
                    <div>
                        <h3>Your Street Address</h3>
                    </div>
                    <input type="text" id="address" oninput="this.className = ''" name="address"
                        value="<?php echo @$_COOKIE['paddress']; ?>" placeholder="Enter Your Street Address">
                </div>

                <div class="city">
                    <div>
                        <h3>Your City</h3>
                    </div>
                    <input type="text" id="city" oninput="this.className = ''" name="city"
                        value="<?php echo @$_COOKIE['pcity']; ?>" placeholder="Enter Your City">
                </div>

                <div class="state">
                    <div>
                        <h3>State</h3>
                    </div>

                    <select name="state" class="form-control">
                        <option disabled>Select Your State</option>
                        <?php
                        $file = 'state.json';
                        $str = file_get_contents($file);
                        $json = json_decode($str, true);
                        for ($i = 0; $i < count($json); $i++) {
                            $state = $json[$i]['abbreviation'];
                        ?>
                        <option value="<?php echo $state; ?>" <?php if (@$_COOKIE['pstate'] == $state) {
                                                                        echo "selected";
                                                                    } ?>><?php echo $state ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="zip">
                    <div>
                        <h3>Zip Code</h3>
                    </div>
                    <input type="text" id="zip" oninput="this.className = ''" name="zip"
                        value="<?php echo @$_COOKIE['pzip']; ?>" placeholder="Enter Your Zip Code">
                </div>

                <div>
                    <label>Do you currently use tobbaco ?</label><br><br>
                    <input type="radio" name="tobacco" value="YES" <?php if ($result['smoker'] == 'YES') {
                                                                        echo "checked";
                                                                    }  ?>> Yes
                    <input type="radio" name="tobacco" checked value="NO" <?php if ($result['smoker'] == 'NO') {
                                                                                echo "checked";
                                                                            }  ?>> No
                </div><br>

            </div>

            <button type="button" id="prevBtn" class="arrow" onclick="nextPrev(-1)"> &laquo; Back</button>
            <button type="button" id="nextBtn" onclick="nextPrev(1)">Continue</button>

            <div class="bubbles">
                <span class="step"></span>
                <span class="step"></span>
            </div>

        </form>

        <?php include('footer.php'); ?>

        <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form ...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            // ... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Get Covered";
            } else {
                document.getElementById("nextBtn").innerHTML = "Continue";
            }
            // ... and run a function that displays the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form... :
            if (currentTab >= x.length) {
                //...the form gets submitted:
                document.getElementById("form").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false:
                    valid = false;
                }
            }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class to the current step:
            x[n].className += " active";
        }
        </script>



        <?php include('mainjs.php'); ?>
    </div>

</body>

</html>