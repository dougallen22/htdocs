<script type="text/javascript" charset="utf-8" >
	$(document).ready(function(){

	$(document).on('click','#Insert_rates', function() {
	    var u=0;
	    $('.ratelist').each(function(){
    if($(this).val()>0 && $(this).val()!='')
	    {
	       u++;   
	    }
});
	    
	   if($( ".ratelist" ).length!=u)
	    {
	        Swal.fire(
              'Opps!',
             'Please fill all fields with greater than 0 ',
              'error'
              )  
	    }
	    else{
  $.ajax({
    url:'insertdata/insertrates.php',
    method:'POST',
    data:$('#rates_form').serialize(),
    success:function (resp) {
        if(resp==''){
                         Swal.fire(
              'Good job!',
             'Coverages',
              'success'
              ) 
                setTimeout(function() {
  window.location.href = "index.php";
}, 2000);
            }
            else{
   
    Swal.fire(
              'Info!',
             'This '+ resp + ' is Already Exist',
              'info'
              )
setTimeout(function() {
  window.location.href = "index.php";
}, 2000);
         
            }
      },
      error:function () {
         Swal.fire(
              'Sorry!',
             'Something went wrong',
              'error'
              ) 
         setTimeout(function() {
  window.location.href = "index.php";
}, 2000);
         
      }
      });
      
      
	    } 
      
      
      
      
});
/*//////////////////////////////////////////////////////////////////////////////////////////////*/
$("#Insert_company").on('click', function() {
    var name=document.getElementById("company_name").value;
  var logo=document.getElementById("company_logoi");
  var file = logo.files[0];
  var formData = new FormData();
  formData.append('company_logo', file);
  formData.append('company_name', name);
if(name!='')
{
  $.ajax({
    url:'insertdata/insertcompany.php',
    method:'POST',
    enctype: 'multipart/form-data',
    data: formData,
   processData: false,
   contentType: false,
   cache: false,
    success:function (res) {
        if(res==0){
            Swal.fire(
              'Info!',
             'This Company is Already Inserted',
              'info'
              )
            setTimeout(function() {
  window.location.href = "index.php";
}, 2000);
         
            }
            else{
                Swal.fire(
              'Good job!',
             'Your Company is Inserted',
              'success'
              ) 
                setTimeout(function() {
  window.location.href = "index.php";
}, 2000);
         
            }
      },
      error:function () {
         Swal.fire(
              'Sorry!',
             'Something went wrong',
              'error'
              ) 
         setTimeout(function() {
  window.location.href = "index.php";
}, 2000);
         
      }
      });
}
else{
       Swal.fire(
              'Sorry!',
             'Please Enter Company Name',
              'error'
              )
}
});




/*//////////////////////////////////////////////////////////////////////////////////////////////*/
$("#insert_multirates").on('click', function() {
  $.ajax({
    url:'insertdata/companyrates.php',
    method:'POST',
    data:$('#insert_company_rates').serialize(),
    success:function (res) {
        if(res==0){
            Swal.fire(
              'Info!',
             'This Company Rates For This are Already Inserted',
              'info'
              )
            setTimeout(function() {
  window.location.href = "all_rates.php";
}, 2000);
         
            }
            else{
                Swal.fire(
              'Good job!',
             'Your Company Rates For This Year are Inserted',
              'success'
              ) 
                    setTimeout(function() {
  window.location.href = "all_rates.php";
}, 2000);
            }
      },
      error:function () {
         Swal.fire(
              'Sorry!',
             'Something went wrong',
              'error'
              ) 
             setTimeout(function() {
  window.location.href = "all_rates.php";
}, 2000);
      }
      });
});

/*//////////////////////////////////////////////////////////////////////////////////////////////*/
$("#insert_multirates_update").on('click', function() {
  $.ajax({
    url:'insertdata/companyrates_update.php',
    method:'POST',
    data:$('#insert_company_rates_update').serialize(),
    success:function (res) {
        if(res==0){
            Swal.fire(
              'Info!',
             'Sorry! This Record is not Updated',
              'info'
              )
                setTimeout(function() {
  window.location.href = "all_rates.php";
}, 2000);
            }
            else{
                Swal.fire(
              'Good job!',
             'This Record is Updated',
              'success'
              )
                    setTimeout(function() {
  window.location.href = "all_rates.php";
}, 2000);
            }
      },
      error:function () {
         Swal.fire(
              'Sorry!',
             'Something went wrong',
              'error'
              ) 
             setTimeout(function() {
  window.location.href = "all_rates.php";
}, 2000);
      }
      });
});
//////////////////////////////////////////////////////////////////////////////////////////////////////
$(document).on('click',"#delete", function() {
 var company =$(this).data('company');
 var year =$(this).data('year');
 var gender =$(this).data('gender');
 var smoker =$(this).data('smoker');
 var age =$(this).data('age');
 $.ajax({
    url:'insertdata/delete_record.php',
    method:'POST',
    data:{company_id:company, year:year, gender:gender, smoker:smoker, age:age},
   success:function (res) {
        if(res==0){
            Swal.fire(
              'Info!',
             'Sorry! This Record is not Deleted',
              'info'
              )
                setTimeout(function() {
  window.location.href = "all_rates.php";
}, 2000);
            }
            else{
                Swal.fire(
              'Good job!',
             'This Record is Deleted',
              'success'
              )
                    setTimeout(function() {
  window.location.href = "all_rates.php";
}, 2000);
            }
      },
      error:function () {
         Swal.fire(
              'Sorry!',
             'Something went wrong',
              'error'
              ) 
             setTimeout(function() {
  window.location.href = "all_rates.php";
}, 2000);
      }

});
});
/////////////////////////////////////////////////////////////////////////////////////////////////////
$('.update_rate_modal').on('click', function(){
  var getvalue=$(this).data('value');
  var getid=$(this).data('id');
  $("#rates_value").val(getvalue);
  $("#rates_id").val(getid);
  });
  
  
$('#update_rates').on('click', function(){
    var rates_value=$("#rates_value").val();
	   if(rates_value==0 || ratevalue=='')
	    {
	        Swal.fire(
              'Opps!',
             'Please Enter a Value',
              'error'
              )  
	    }
	    else{
    
  $.ajax({
    url:'insertdata/update_rates.php',
    method:'POST',
    data:$('#rates_update_form').serialize(),
   success:function (res) {
        if(res==0){
            Swal.fire(
              'Info!',
             'Sorry! This Record is not updated',
              'info'
              )
                setTimeout(function() {
  window.location.href = "index.php";
}, 2000);
            }
            else{
                Swal.fire(
              'Good job!',
             'This Record is updated',
              'success'
              )
                    setTimeout(function() {
  window.location.href = "index.php";
}, 2000);
            }
      },
      error:function () {
         Swal.fire(
              'Sorry!',
             'Something went wrong',
              'error'
              ) 
             setTimeout(function() {
  window.location.href = "index.php";
}, 2000);
      }

});
}
});


/////////////////////////////////////////////////////////////////////////////////////////////////////
$('.update_company_modal').on('click', function(){
  var getvalue=$(this).data('value');
  var getid=$(this).data('id');
   var getlogo=$(this).data('logo');
   $("#company_idu").val(getid);
  $("#company_valueu").val(getvalue);
  $("#company_logou").val(getlogo);
  });
$('#update_company').on('click', function(){
    var nameu=document.getElementById("company_valueu").value;
  var logou=document.getElementById("company_logou");
  var idu=document.getElementById("company_idu").value;
  var fileu = logou.files[0];
  var formData = new FormData();
  formData.append('company_logou', fileu);
  formData.append('company_valueu', nameu);
  formData.append('company_idu', idu);
if(nameu!='')
{
  $.ajax({
    url:'insertdata/update_company.php',
    method:'POST',
    enctype: 'multipart/form-data',
    data: formData,
   processData: false,
   contentType: false,
   cache: false,
   success:function (res) {
        if(res==0){
            Swal.fire(
              'Info!',
             'Sorry! This Record is not updated',
              'info'
              )
                setTimeout(function() {
  window.location.href = "index.php";
}, 2000);
            }
            else{
                Swal.fire(
              'Good job!',
             'This Record is updated',
              'success'
              )
                    setTimeout(function() {
  window.location.href = "index.php";
}, 2000);
            }
      },
      error:function () {
         Swal.fire(
              'Sorry!',
             'Something went wrong',
              'error'
              ) 
             setTimeout(function() {
  window.location.href = "index.php";
}, 2000);
      }

});
}
else{
      Swal.fire(
              'Sorry!',
             'Please Enter Company Name',
              'error'
              ) 
}
});


/////////////////////////////////////////////////////////////////////////////////////////////////////
$('.delete_rates').on('click', function(){
  var getid=$(this).data('id');
  $.ajax({
    url:'insertdata/delete_rates.php',
    method:'POST',
    data:{rates_id:getid},
   success:function (res) {
        if(res==0){
            Swal.fire(
              'Info!',
             'Sorry! This Record is Not Deleted',
              'info'
              )
                setTimeout(function() {
  window.location.href = "index.php";
}, 2000);
            }
            else{
                Swal.fire(
              'Good job!',
             'This Record is Deleted',
              'success'
              )
                    setTimeout(function() {
  window.location.href = "index.php";
}, 2000);
            }
      },
      error:function () {
         Swal.fire(
              'Sorry!',
             'Something went wrong',
              'error'
              ) 
             setTimeout(function() {
  window.location.href = "index.php";
}, 2000);
      }

});
});


/////////////////////////////////////////////////////////////////////////////////////////////////////
$('.delete_company').on('click', function(){
  var getid=$(this).data('id');
  $.ajax({
    url:'insertdata/delete_company.php',
    method:'POST',
    data:{company_id:getid},
   success:function (res) {
        if(res==0){
            Swal.fire(
              'Info!',
             'Sorry! This Record is not deleted',
              'info'
              )
                setTimeout(function() {
  window.location.href = "index.php";
}, 2000);
            }
            else{
                Swal.fire(
              'Good job!',
             'This Record is deleted',
              'success'
              )
                    setTimeout(function() {
  window.location.href = "index.php";
}, 2000);
            }
      },
      error:function () {
         Swal.fire(
              'Sorry!',
             'Something went wrong',
              'error'
              ) 
             setTimeout(function() {
  window.location.href = "index.php";
}, 2000);
      }

});
});










































});
</script>