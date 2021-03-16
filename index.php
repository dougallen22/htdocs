 <?php
    session_start();
    include('user/check_cookie.php');
    ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
     <?php include('maincss.php'); ?>
     <link rel="stylesheet" href="css/style.css">
     <title>Protect Mutual</title>

 </head>


 <body>

     <?php include('nav.php'); ?>
     <div class="container">
         <h1>Instant Life Insurance Quote</h1><br>
         <h4>Shop over 50 companies and find the best price</h4>

         <form method="POST" action="quote.php">

             <div class="age">
                 <div>
                     <h3>What's Your Current Age?</h3>
                 </div>
                 <div><input type="text" pattern="[0-9]*" id="age" size 10 name="age" placeholder="Enter Your Age"
                         value="<?php echo @$_COOKIE['age']; ?>" required></div>
             </div>

             <div class="radio-gender">
                 <h3>What's Your Gender?</h3><br>
                 <div class="gender">
                     <input type="radio" id="radioMale" name="gender" value="MALE" <?php if (@$_COOKIE['gender'] != 'FEMALE') {
                                                                                        echo 'checked';
                                                                                    } ?>>
                     <label for="radioMale">Male</label>&nbsp;&nbsp;&nbsp;

                     <input type="radio" id="radioFemale" name="gender" value="FEMALE" <?php if (@$_COOKIE['gender'] == 'FEMALE') {
                                                                                            echo 'checked';
                                                                                        } ?>>
                     <label for="radioFemale">Female</label>
                 </div>
             </div>

             <div class="radio-smoker">
                 <h3>Do Use Tobacco Products?</h3><br>
                 <div class="smoker">
                     <input type="radio" id="radioYes" name="smoker" value="YES" <?php if (@$_COOKIE['smoker'] == 'YES') {
                                                                                        echo 'checked';
                                                                                    } ?>>
                     <label for="radioYes">Yes</label>&nbsp;&nbsp;&nbsp;

                     <input type="radio" id="radioNo" name="smoker" value="NO" <?php if (@$_COOKIE['smoker'] != 'YES') {
                                                                                    echo 'checked';
                                                                                } ?>>
                     <label for="radioNo">No</label>
                 </div>
             </div>

             <div class="price">
                 <button class="button instant" type="submit" id="desktop">Instant Price</button>
             </div>

         </form>
     </div>

     <div id="scrollshow"></div>

     <div class="quote-results" id="quote" style="display:none;background:#f2f3f4;"></div>
     <div class="loader" style="display:none;"> </div>

     <?php include('footer.php'); ?>
     <?php include('mainjs.php'); ?>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script>
     $('#age').on('keyup', function() {
         var age = $("#age").val();
         if (age != '') {
             $('.age').css('border-color', '#d6d6d6');
             $('.age').css('color', 'black');
         } else {
             $('.age').css('border-color', 'red');
             $('.age').css('color', 'red');
         }
     });

     $(".instant").on('click', function() {
         var gender = $('input:radio[name=group]:checked').val();
         var age = $("#age").val();
         var smoker = $('input:radio[name=radioSmoker]:checked').val();
         var ele = $("#quote");
         var scroll = $("#scrollshow");
         var price;

         if (age == '') {
             $('.age').css('border-color', 'red');
             $('.age').css('color', 'red');
         } else {
             $('.age').css('border-color', '#d6d6d6');
             $('.age').css('color', 'black');

         }
     });
     </script>
 </body>

 </html>