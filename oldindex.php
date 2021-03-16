7<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <!-- Latest compiled and minified CSS & JS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
      <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" ></script>
      <title>Protect Mutual</title>
      <style>
           @font-face {
        font-family: "Muli-Regular" ;
        src: url("fonts/muli/Muli-Regular.ttf") ; }
         body {
        font-family: "Muli-Regular" !important;
          padding:0;
          margin:0;
          background-color: #f2f3f4;
          }
          .row{
              margin-right:0;
              margin-left:0;
          }
      </style>
  </head>
<body>
         <header> 
        <ul>
          <li>
            <div class= "logo"><a href="#home">Protect Mutual</a></div>            
          </li>
 
          <li>
            <div class= "icons">
              <a class="op" href="tel:123-456-7890"><img src= "img/operators.png" width="40" height="40" ></a>
              <a  href="tel:123-456-7890p123"><img src= "img/message.png" width="40" height="40" ></a>
              <a  href="tel:123-456-7890p123"><img src= "img/phone.png" width="40" height="40" ></a>
            </div>
            <a class= "phone" href="tel:123-456-7890"><img src= "img/phone.png" width="30" height="30"></a>
          </li>

        </ul>  
      </header>

  
  <div class="container">
    <h1 class= "instant-quote">Instant Life Insurance Quote</h1><br>
    <h4>Shop over 50 companies and find the best price</h4><br>
      <form>
          <div class="age">
              <h3>What's Your Current Age?</h3>
                <hr style="width:100%;text-align:left;margin-left:0">
                <input type="text" pattern="[0-9]*" id= "age" size 10 name= "age" placeholder="Enter Your Age" >
          </div>

          <div class="radio-gender">
              <h3>What's Your Gender?</h3><br>
                <div class= "gender">
                  <input type="radio" id="radioMale" name="group" value="MALE" checked>
                  <label for="radioMale">Male</label>&nbsp;&nbsp;&nbsp;
                    
                  <input type="radio" id="radioFemale" name="group" value="FEMALE">
                  <label for="radioFemale">Female</label>
                </div>
          </div>

          <div class="radio-smoker">
              <h3>Do Use Tobacco Products?</h3><br>
                <div class= "smoker">
                    <input type="radio" id="radioYes" name="radioSmoker" value="YES" >
                    <label for="radioYes">Yes</label>&nbsp;&nbsp;&nbsp;
                    
                    <input type="radio" id="radioNo" name="radioSmoker" value="NO" checked>
                    <label for="radioNo">No</label>
                </div>
          </div>
             
          <div class= "price">
              <button class= "button instant" type="button" id="desktop">Instant Price</button>
        </div>

      </form>
  </div>
  
   <div id="scrollshow"></div>
   
<div class="quote-results" id="quote" style="display:none;background:#f2f3f4;"></div>
      <div class="loader" style="display:none;">  </div>               
  <footer>

    <div class="footer-left">
      <h3>Protect <span>Mutual</span></h3>
      <p class="footer-links">
        <a class="ex2" href="#">Home</a>
        |
        <a class="ex2" href="#">Privacy Policy</a>
        |
        <a class="ex2" href="#">About</a>
        |
        <a class="ex2"  href="#">Contact</a>
      </p>
      <p class="footer-company-name">© 2020 Protect Mutual</p>
    </div>

    <div class="footer-center">
      <a class="ex2" href="tel:123-456-7890p123"><img src= "img/message.png" width="30" height="30" >&nbsp;&nbsp; Live Chat</a><br>

      <a class="ex2" href="tel:123-456-7890p123"><img src= "img/phone.png" width="30" height="30" > &nbsp;&nbsp;217-931-8000</a><br>

      <a class="ex2" href="tel:123-456-7890p123"><img src= "img/email.png" width="30" height="30" > &nbsp;&nbsp;help@protectmutual.com</a>

    </div>

    <div class= "footer-center-mobile">
      <p>Questions?</p><br>
      <a class="ex2" href="tel:123-456-7890p123"> &nbsp;&nbsp;217-931-8000</a><br>

      <a class="ex2" href="tel:123-456-7890p123"> &nbsp;&nbsp;help@protectmutual.com</a><br>
    </div>

    <div class="footer-right">
      <p class="footer-company-about">
        <span>Online Insurance Center</span><br>
       Home of the Life Insurance rate engine.</p>
     
      <div class="footer-icons">
        <a class="ex2" href="#"><i class="fa fa-facebook fa-lg"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a class="ex2" href="#"><i class="fa fa-twitter fa-lg"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a class="ex2" href="#"><i class="fa fa-instagram fa-lg"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a class="ex2" href="#"><i class="fa fa-linkedin fa-lg"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a class="ex2" href="#"><i class="fa fa-youtube fa-lg"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
      </div>
    </div>

  </footer>

  
    

<style>

.loader{position:fixed;left:0;top:0;width:100%;height:100%;z-index:9999;background:url('img/3.gif') 50% 50% no-repeat #fff;opacity:1;
        }
.plusminus{
        border:2px solid #00aeff !important;
        color:#00aeff !important;
        border-radius:50% !important;
        font-weight:bold !important;
        font-size:50px !important;
        background:rgb(255 0 0 / 0%) !important;
        padding-bottom: -30px;
        width: 80px !important;
        height: 80px !important;
        line-height: 45px !important;
    }
    .plusminus:hover{
        color:white !important;
        background: #00aeff !important;
    }
    .plusminus:focus{
        outline: none !important;
    }

.footer-center-mobile {
  display: none;
}
 body {
    background-color: #f5f5f5;
    }

.logo {
  font-family: "Muli-SemiBold";
}


footer {
  display: flex;
  justify-content: space-around;
  align-items: center;
  background-color: white;
  font-family: "Muli-SemiBold";
  font-weight:600;
  padding: 10px;
}

footer div {
  width: 300px;
  margin: 10px;
  text-align: center;
  line-height: 25px;
  font-family: "Muli-SemiBold";
}

.footer-center {
  line-height: 40px;
}

.footer-center, .footer-left {
text-align: left;
}

.phone { 
  display: none;
}

.button {
    font-weight: 700;
    font-size: 1.75rem;
    line-height: 1.125rem;
    letter-spacing: .7px;
    letter-spacing: .1125rem;
    text-transform: uppercase;
    display: block;
    cursor: pointer;
    text-align: center;
    text-decoration: none;
    color: #fff;
    margin: auto;
    padding-top: 1.875rem;
    padding-bottom: 1.875rem;
    background-color: #ff700a;
    border: 2px solid #ff700a;
    border-radius: 0;
    transition: all .1s;
    width: 100%;
    outline: none;
    white-space: normal;
    margin-bottom: 6rem;
    font-family: "Muli-SemiBold";
}

.gender, .smoker {
  display: flex;
  }

form {
  max-width: 65rem; 
  margin: 0 auto;
}

.age {
 margin-bottom: 2rem;
background: white;
padding-top: 5px;
padding-bottom: 15px;
padding-left: 25px;
padding-right: 25px;
border: 1px solid #d6d6d6;
font-family: "Muli-SemiBold";
}

input[type=text], select {
    border: 0;
    outline: 0;
    background: transparent;
    font-size: 20px;
}

.radio-gender {
  margin-bottom: 2rem;
  background: white;
  padding-top: 5px;
  padding-bottom: 15px;
  padding-left: 25px;
  padding-right: 25px;
  border: 1px solid #d6d6d6;
  font-family: "Muli-SemiBold";
}

.radio-smoker {
  margin-bottom: 3rem;
  background: white;
  padding-top: 5px;
  padding-bottom: 15px;
  padding-left: 25px;
  padding-right: 25px;
  border: 1px solid #d6d6d6;
  font-family: "Muli-SemiBold";
}

.radio-gender input[type="radio"] {
  opacity: 0;
  position: fixed;
  width: 0;
}

.radio-smoker input[type="radio"] {
  opacity: 0;
  position: fixed;
  width: 0;
}

.radio-gender label {
    display: inline-block;
    background-color: white;
    padding: 13px 20px;
    font-family: sans-serif, Arial;
    font-size: 16px;
    border: 1px solid #d6d6d6;
    width: 300px;
    height: 50px;
    text-align: center;
    color: grey;
    font-family: "Muli-SemiBold";
}

.radio-smoker label {
    display: inline-block;
    background-color: white;
    padding: 13px 20px;
    font-family: sans-serif, Arial;
    font-size: 16px;
    border: 1px solid #d6d6d6;
    width: 300px;
    height: 50px;
    text-align: center;
    color: grey;
    font-family: "Muli-SemiBold";
}

.radio-gender label:hover {
  -webkit-transform: scale(1.2);
        -ms-transform: scale(1.2);
        transform: scale(1.2);
}

.radio-smoker label:hover {
  -webkit-transform: scale(1.2);
        -ms-transform: scale(1.2);
        transform: scale(1.2);
}

.radio-gender input[type="radio"]:focus + label {
    border: 2px dashed #444;
}

.radio-smoker input[type="radio"]:focus + label {
    border: 2px dashed #444;
}

.radio-gender input[type="radio"]:checked + label {
  background-color:#00aeff;
    border-color: rgb(143, 143, 145);
    color: white;
}

.radio-smoker input[type="radio"]:checked + label {
    background-color:#00aeff;
    border-color: rgb(143, 143, 145);
    color: white;
}

header ul {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin: auto;
  background: white;
  width: 100%;
  padding: 20px;
  position: fixed;
  top: 0;
  width: 100%;
  z-index:900;
  }

h1 {
  text-align: center;
  font-family: "Muli-SemiBold";
  
}
.instant-quote {
    margin-top:127px;
}


h4 {
  text-align: center;
}


  li a {
  text-decoration: none;
  display: inline;
  padding: 1em;
  color: black;
  font-family: "Muli-SemiBold";
    }

  a {
    color: black;
    }

   img:hover { transform: scale(1.3   );
     
    }

    a:link {
  text-decoration: none;
  
 
}

a.ex2:hover, a.ex2:active {font-size: 125%;}

a.ex2:hover, a.ex2:active {color:  #ff700a}

li {
  list-style: none;
}

.logo {
  font-size: 26px;
  }


@media (max-width:768px) {
  .icons {
   display: none;
 }

 .phone {
   display: flex;
   
 }
 
footer {
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 20px;
  font-size: 16px;
}

header ul {
   padding: 1px !important; 
    
 }
 
 h1 {
   margin-top:0px;
   font-size: 30px;
 }

.footer-left, .footer-center, .footer-right {
  display: flex;
  flex-direction: column;
  text-align: center;
  align-items: center;
  border: 1px solid black;
  width: 100%;
  padding: 5px;
}

.footer-center-mobile {
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  border: 1px solid black;
  width: 100%;
  line-height:15px;
  padding: 5px;

}

.footer-center {
  display: none;
}


      * {
        margin: 0;
        padding: 0;
        list-style: none;
        text-decoration: none;
      }
      .border{
          background:white;
      }
       
        .container {
          width:100%;
          margin:auto;
          overflow:hidden;
          margin-top: 50px;
          
          }

        .flex {
          display: flex;
          align-items: center;
          justify-content: space-between;
          margin-right: 15px ;
          margin-left: 15px ;
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
          
        input[type=text], select {
          border: 0;
          outline: 0;
          background: transparent;
          font-size: 40px;
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

        li.male:hover  {
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

        footer {
          right: 0;
          bottom: 0;
          left: 0;
          padding: 1rem;
          text-align: center;
          font-size: 20px;
        }
  
      td {
    vertical-align: middle !important;
    border:0 !important;
    }
    
    
    .plusminus{
        width: 60px!important; 
        height: 60px !important;
        line-height: 30px !important;
        font-size:45px !important;
        
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
    @media (max-width: 767px) {
     h1 {
         font-weight: bold !important;
         
     }
 
     .instant-quote {
    margin-top:20px;
}
    .col-md-6{
        padding-right:0;
        padding-left:0;
    }
     td {
         font-size: 30px !important;
     }
     
      input[type="radio"] {
              height: 1.5em !important;
              width: 1.5em !important;
              margin-top: -1px;
           
    }
    
     input[type=text], select 
        {
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
var height=823;
if(/windows/i.test(navigator.userAgent)){
 height=823;
}
if(/iphone/i.test(navigator.userAgent)){
  height=793;
}
if(/android/i.test(navigator.userAgent)){
  height=860;
}





	$('#age').on('keyup', function(){
     var age=$("#age").val();
    if(age!=''){
    $('.age').css('border-color','#d6d6d6');
    $('.age').css('color','black');
    }
    else{
    $('.age').css('border-color','red');
    $('.age').css('color','red');
    }
	});

  $(".instant").on('click',function() {
    var gender=$('input:radio[name=group]:checked').val();
    var age=$("#age").val();
    var smoker=$('input:radio[name=radioSmoker]:checked').val();
    var ele=$("#quote");
    var scroll=$("#scrollshow");
    var price;

    if(age==''){
    $('.age').css('border-color','red');
    $('.age').css('color','red');
}
else{
//var ss=$("#ss").val();
  $.ajax({
                                             type: "POST",
                                             url: "ajax_get_quotes.php",
                                             data: {age,gender,smoker},
                                             beforeSend: function(){
                                                   // Show image container
                                             $(".loader").show();
                                              },
                                             success: function(result){
                                                 $(".loader").hide();
                                           ele.show();
                                           ele.html('');
                                           $('.container2').hide();
                                           $('.flex-container1').show();
                                           ele.append(result);
                      window.scrollTo(0, height);                 
                                         }
                                         });
  /*Display data*/
    
    
/*end display data*/

}
/*validation end*/

  });
  
$(document).on('click','.plusminus',function() {
    var cover=['3000','4000','5000','6000','7000','8000','9000','10000','11000','12000','13000','14000','15000','16000','17000','18000','19000','20000','25000','30000','35000','40000','45000','50000'];
    var gender=$('input:radio[name=group]:checked').val();
    var smoker=$('input:radio[name=radioSmoker]:checked').val();
    var age=$("#age").val();
    var ele=$("#quote");
    var scroll=$("#scrollshow");
    var price;
    
    var v=parseInt($("#v").val());
   if($(this).attr('id')=='plus' && v<23 ){
v++;
}
else if($(this).attr('id')=='minus' && v>0 ){
    v--;
}  
if(v==0 || v==23){
  $(this).prop('disabled', true);
}
else{
   $(this).prop('disabled', false); 
}
//$('#demo').val(cover[v]);

   var coverage=cover[v];

//var ss=$("#ss").val();
  $.ajax({
                                             type: "POST",
                                             url: "ajax_get_quotes.php",
                                             data: {age,gender,smoker,coverage,v},
                                             success: function(result){
                                                 
                                           ele.show();
                                           ele.html('');
                                           
                                           ele.append(result);
                                            window.scrollTo(0, height);  
                                         }
                                         });
  /*Display data*/
    
    
/*end display data*/


/*validation end*/

  });
</script>





  </body>
</html>
