<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Latest compiled and minified CSS & JS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  <title>Final Expense</title>
  <style>
    @font-face {
      font-family: "Muli-Regular";
      src: url("fonts/muli/Muli-Regular.ttf");
    }

    body {
      font-family: "Muli-Regular" !important;
      padding: 0;
      margin: 0;
      background-color: #f2f3f4;
    }
  </style>
</head>

<body>
  <header>
    <nav class="navbar navbar-default navbar-fixed-top" style=" background-color: white;">
      <div class="flex">
        <!-- Brand/logo -->
        <div class="navbar-header">
          <a class="navbar-brand" style="color: black;" href="#"><span style="font-weight: bold; font-size: 22px">Protect</span> Mutual</a>
        </div>
        <ul class="nav navbar-nav  hidden-xs ">
          <li><a href="tel:123-456-7890p123"><img src="img/operators.png" width="40" height="40"></a></li>
          <li><a href="tel:123-456-7890p123"><img src="img/message.png" width="40" height="40"></a></li>
          <li><a href="tel:123-456-7890p123"><img src="img/phone.png" width="40" height="40"></a></li>
        </ul>

        <ul class="nav navbar-nav hidden-sm hidden-md hidden-lg">

          <li><a href="tel:123-456-7890p123"><img src="img/phone.png" width="35" height="35"></a></li>
        </ul>
      </div>
    </nav>
  </header>


  <section>
    <div class="container">
      <div class="form-box">
        <div class=style="padding:0;">
          <h1><b>Final Expense Made Easy</b></h1><br>
          <h3>Instant Price Online</h3>
          <br>
        </div>
        <div class="well border">
          <form name="quote" action=/action_page.php onsubmit="return validateForm()" method="post">
            <div class="flex">
              <div class="col">

                Zip Code
                <input type="text" pattern="[0-9]*" name=zip id="zip" size="07" maxlength="5" required>

              </div>
              <div class="col">

                <div class="age">
                  Current Age
                  <input type="text" pattern="[0-9]*" name=age id="age" size=03 maxlength=02 required>
                </div>
              </div>
              <div class="col">

                I am
                <li class="male">
                  <input type="radio" id="male" name="group" value="MALE" required>
                  <label for="male">Male
                </li>
                <li class="female">
                  <input type="radio" id="female" name="group" value="FEMALE" required>
                  <label for="female">Female
                </li>
                <p style="color: red; font-size: 14px; display:none;" id="gendervalidate">Select gender</p>
              </div>
            </div>
        </div>
        <section class="price"><a class="link link--arrowed" id="instant">Instant Price
            <svg class="arrow-icon" xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 32 32">
              <g fill="none" stroke="#2175FF" stroke-width="1.5" stroke-linejoin="round" stroke-miterlimit="10">
                <circle class="arrow-icon--circle" cx="16" cy="16" r="15.12"></circle>
                <path class="arrow-icon--arrow" d="M16.14 9.93L22.21 16l-6.07 6.07M8.23 16h13.98"></path>
              </g>
            </svg></a>
        </section>
        </form>
      </div>

      <div id="scrollshow"></div>
      <div class="quote-results" id="quote" style="display:none;background:#f2f3f4;"></div>

      <div class="container2">
        <div class="row">
          <div class="col-sm-6 text-center">
            <div class="well compare1 border">
              <h3><b>Compare Multiple Companies to Find The Best Price style</b></h3>
              <h4><b>You Can't Be Denied Based On Your Health.</b></h4>
              <p>We compare up to 20 final expense insurance companies to find the best price and plan to fit your needs.</p>
              <p>Final expense or burial insurance is a insurance policy that pays for your final expenses after your passing.</p>
            </div>
          </div>
          <div class="col-sm-6 text-center">
            <div class="well compare2 border">
              <ul class="list-group" style="margin-bottom:0;">

                <li class="list-group-item list-group">Plans Starting at $15 A Month</li>
                <li class="list-group-item list-group">Final Expense Amounts $1,000-$50,000</li>
                <li class="list-group-item list-group">Monthly Premiums Can Never Increase</li>
                <li class="list-group-item list-group">Death Benefits Are Guaranteed To Never Decrease</li>
                <li class="list-group-item list-group">Policy Can't Expire At Any Age</li>
                <li class="list-group-item list-group">No Physical Or Medical Exam Necessary</li>

              </ul>
            </div>
          </div>
        </div>
      </div>
  </section>
  <footer style="background: white;">
    <a href=#>Pirvacy Policy |</a>
    <a href=#>Terms & Conditions</a>
  </footer>


  <div class="loader" style="display:none;"> </div>

  <style>
    .loader {
      position: fixed;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      z-index: 9999;
      background: url(https://icon-library.net/images/loading-icon-animated-gif/loading-icon-animated-gif-19.jpg) 50% 50% no-repeat #fff;
      opacity: 1;
    }

    * {
      margin: 0;
      padding: 0;
      list-style: none;
      text-decoration: none;
    }

    .border {
      background: white;
    }

    .container {
      width: 90%;
      margin: auto;
      overflow: hidden;

    }

    .flex {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-right: 15px;
      margin-left: 15px;
    }


    .form-box {
      text-align: center;
      margin-top: 75px;
    }

    .col {
      font-size: 25px;
      padding-top: 25px;
      padding-bottom: 30px;

    }

    input[type=text],
    select {
      border: 0;
      outline: 0;
      background: transparent;
      border-bottom: 2px solid black;
      text-align: center;
      font-size: 20px;
    }

    input[type=submit] {
      background-color: #545754;
      color: white;
      padding: 14px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;

    }

    input[type="radio"] {
      display: inline-block;
      vertical-align: middle;
      border: 2px solid rgba(77, 121, 202, 0.5);
      border-radius: 50%;
      cursor: pointer;
      font: inherit;
      height: 2.0em;
      outline: none;
      width: 2.0em;
      margin-top: -1px;
      -moz-appearance: none;
      -webkit-appearance: none;
    }

    li.male:hover {
      color: rgb(77, 121, 202, 0.5);
    }

    li.female:hover {
      color: rgb(77, 121, 202, 0.5);
    }

    li {
      display: inline;
    }

    input[type="radio"]:checked {
      background-color: rgb(5, 15, 34);
      box-shadow: inset 0 0 0 .1875em #050505;
    }

    .price {
      display: -webkit-inline-box;
      display: inline-flex;
      padding: 2rem;
      font-size: 30px;
      margin-bottom: 25px;
    }

    .link {
      color: #2175FF;
      cursor: pointer;
      font-weight: 400;
      text-decoration: none;
    }

    .link--arrowed {
      display: inline-block;
      height: 2rem;
      line-height: 2rem;
    }

    .link--arrowed .arrow-icon {
      position: relative;
      top: -1px;
      -webkit-transition: -webkit-transform 0.3s ease;
      transition: -webkit-transform 0.3s ease;
      transition: transform 0.3s ease;
      transition: transform 0.3s ease, -webkit-transform 0.3s ease;
      vertical-align: middle;
    }

    .link--arrowed .arrow-icon--circle {
      -webkit-transition: stroke-dashoffset .3s ease;
      transition: stroke-dashoffset .3s ease;
      stroke-dasharray: 95;
      stroke-dashoffset: 95;
    }

    .link--arrowed:hover .arrow-icon {
      -webkit-transform: translate3d(5px, 0, 0);
      transform: translate3d(5px, 0, 0);
    }

    .link--arrowed:hover .arrow-icon--circle {
      stroke-dashoffset: 0;
    }



    ul li {
      display: block;
      text-align: left;
      margin: 0 auto;
    }

    ul {
      list-style: none;
    }

    ul li list-group :before {
      content: '✓';
    }

    footer {
      right: 0;
      bottom: 0;
      left: 0;
      padding: 1rem;
      text-align: center;
    }

    td {
      vertical-align: middle !important;
      border: 0 !important;
    }

    .plusminus {
      border: 3px solid #2175FF !important;
      color: #2175FF !important;
      border-radius: 50% !important;
      font-weight: bold !important;
      font-size: 50px !important;
      background: rgb(255 0 0 / 0%) !important;
      padding: 0px;
      width: 80px !important;
      height: 80px !important;
      line-height: 80px !important;
    }

    .plusminus:hover {
      color: white !important;
      background: #2175FF !important;
    }

    .plusminus:focus {
      outline: none !important;
    }

    .container2 {
      margin-top: 25px;
    }

    @media (max-width: 1100px) {
      .flex {
        flex-direction: column;
        align-items: flex-start;
        align-content: center;

      }

      .price {
        margin-bottom: 50px;
      }
    }

    @media screen and (max-width: 767px) {
      h1 {
        font-weight: bold !important;

      }

      .plusminus {
        width: 60px !important;
        height: 60px !important;
        line-height: 60px !important;
        padding-bottom: 55px !important;
        font-size: 45px !important;

      }

      td {
        font-size: 30px !important;
      }

      input[type="radio"] {
        height: 1.5em !important;
        width: 1.5em !important;
        margin-top: -1px;

      }

      input[type=text],
      select {
        font-size: 26px !important;

      }

      .price {
        margin-bottom: 25px;
      }

      .container {
        width: 100%;

      }

    }
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


  <script>
    $("#instant").on('click', function() {

      var gender = $('input:radio[name=group]:checked').val();
      var age = $("#age").val();
      var zip = $("#zip").val();
      var ele = $("#quote");
      var scroll = $("#scrollshow");
      var zipvalidate = $("#zipvalidate");
      var agevalidate = $("#agevalidate");
      var gendervalidate = $("#gendervalidate");
      var price;
      zipvalidate.hide();
      agevalidate.hide();
      gendervalidate.hide();
      /*Validateion*/
      if (zip == '') {
        zipvalidate.show();
      } else if (age == '') {
        agevalidate.show();
      } else if (!gender) {
        gendervalidate.show();
      } else {
        //var ss=$("#ss").val();
        $.ajax({
          type: "POST",
          url: "ajax_get_quotes.php",
          data: {
            age,
            gender
          },
          beforeSend: function() {
            // Show image container
            $(".loader").show();
          },
          success: function(result) {
            $(".loader").hide();
            ele.show();
            ele.html('');
            $('.container2').hide();
            $('.flex-container1').show();
            ele.append(result);
            window.scrollTo(0, 525);
          }
        });
        /*Display data*/


        /*end display data*/

      }
      /*validation end*/

    });

    $(document).on('click', '.plusminus', function() {
      var cover = ['3000', '4000', '5000', '6000', '7000', '8000', '9000', '10000', '11000', '12000', '13000', '14000', '15000', '16000', '17000', '18000', '19000', '20000', '25000', '30000', '35000', '40000', '45000', '50000'];
      var gender = $('input:radio[name=group]:checked').val();
      var age = $("#age").val();
      var zip = $("#zip").val();
      var ele = $("#quote");
      var scroll = $("#scrollshow");
      var zipvalidate = $("#zipvalidate");
      var agevalidate = $("#agevalidate");
      var gendervalidate = $("#gendervalidate");
      var price;
      zipvalidate.hide();
      agevalidate.hide();
      gendervalidate.hide();

      /*Validateion*/
      if (zip == '') {
        zipvalidate.show();
        // $(this).val(v);
      } else if (age == '') {
        agevalidate.show();
        //  $(this).val(v);
      } else if (!gender) {
        gendervalidate.show();
        // $(this).val(v);
      } else {
        var v = parseInt($("#v").val());
        if ($(this).attr('id') == 'plus' && v < 23) {
          v++;
        } else if ($(this).attr('id') == 'minus' && v > 0) {
          v--;
        }
        if (v == 0 || v == 23) {
          $(this).prop('disabled', true);
        } else {
          $(this).prop('disabled', false);
        }
        //$('#demo').val(cover[v]);

        var coverage = cover[v];

        //var ss=$("#ss").val();
        $.ajax({
          type: "POST",
          url: "ajax_get_quotes.php",
          data: {
            age,
            gender,
            coverage,
            v
          },
          success: function(result) {

            ele.show();
            ele.html('');

            ele.append(result);
            window.scrollTo(0, 525);
          }
        });
        /*Display data*/


        /*end display data*/

      }
      /*validation end*/

    });
  </script>

</body>

</html>