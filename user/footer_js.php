
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
 <script src="js/bootstrap-imageupload.js"></script>
  		<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  	
<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>


<script>
$(document).ready(function(){ 

  $('.slider').bxSlider({
      pagerType:'short',
      speed:1000,
      touchEnabled:false
      });
  
 /* fetch_rates();
function fetch_rates()
  {
   var dataTable = $('#rates').DataTable({
    "processing" : true,
    "serverSide" : true,
    "order" : [],
    "lengthMenu": [[10, 50, 100, 200, -1], [10, 50, 100, 200, "All"]],
    "aoColumnDefs": [
        { "bSortable": false, "aTargets": [0] }],
    "ajax" : {
     url:"fetch_rates.php",
     type:"POST"
    }
   });
  }
  
    fetch_users();
function fetch_users()
  {
   var dataTable = $('#users_info').DataTable({
    "processing" : true,
    "serverSide" : true,
    "order" : [],
    "lengthMenu": [[50, 100, 200, -1], [50, 100, 200, "All"]],
   "aoColumnDefs": [
        { "bSortable": false, "aTargets": [0] }],
    "ajax" : {
     url:"fetch_all_users.php",
     type:"POST"
    }
   });
  }
*/
  

	                                             $("#upload_image").click(function()
                                         {
                                              var image=$('#image-file').val();
                                         if(image=='')
                                         { 
                                             alert("Please Select Image");
                                         }
                                         else {
                                            var fileInput = document.getElementById('image-file');
                                        var file = fileInput.files[0];
                                        var formData = new FormData();
                                        formData.append('image', file);

                                             // AJAX Code To Submit Form. 
                                         $.ajax({
                                             type: "POST",
                                             enctype: 'multipart/form-data',
                                             url: "ajax_change_image.php",
                                             data: formData,
                                             processData: false,
                                             contentType: false,
                                             cache: false,
 
                                             success: function(result){
                                             if(result.replace(/\s/g, '')=='success'){
                                                 alert('Image changed successfully');
                                             window.location.href="";
                                             
                                             }
                                             else{
                                                alert('Please Upload Again');
                                             window.location.href=""; 
                                             }
                                         }
                                         });
                                         } 
                                         return false;
                                         }); 

                                        jQuery(document).on('change', '.btn-file :file', function() {
            var input = jQuery(this),
                label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.trigger('fileselect', [label]);
        });

        jQuery('.btn-file :file').on('fileselect', function(event, label) {

            var input = jQuery(this).parents('.input-group').find(':text'),
                log = label;

            if (input.length) {
                input.val(log);
            } else {
                if (log);
            }

        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    jQuery('#img-upload').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

       jQuery("#imgInp").change(function() {
            readURL(this);
        });   	
            $('#s option').mousedown(function(e) {
    e.preventDefault();
    var originalScrollTop = $(this).parent().scrollTop();
    console.log(originalScrollTop);
    $(this).prop('selected', $(this).prop('selected') ? false : true);
    var self = this;
    $(this).parent().focus();
    setTimeout(function() {
        $(self).parent().scrollTop(originalScrollTop);
    }, 0);
    
    return false;
});                              
	setInterval(function(){
		check_session();
	}, 4000);
	
	
	
	
		function check_session(){
		
			$.ajax({
				url:"check_session.php",
				success:function(data)
				{
				  
					if(data.replace(/\s/g, '')=="fail"){
					     
					    window.location="login.php";
					}
				}
			})
		
	}
     
                                         }); 
                                          var $imageupload = $('.imageupload');
										  $imageupload.imageupload();
										   
										   
										   
										   
										   
										   
										   
										   
										   
										   
										   
						
/*///////////////////////////////////////////////////////////////////////////////////////////////////////
                                    Document upload
///////////////////////////////////////////////////////////////////////////////////////////////////////*/

function emptycheck() {
var filenname=document.getElementById('inputimg2').value;
if (filenname='') {
document.getElementById('pp2').style.display='inherit';

}
}

function trigger2() {
document.querySelector('#inputimg2').click();
}
function displayimg2(e) {
    var filename=document.querySelector('#inputimg2').value;
    var fileExtention=filename.substr(filename.lastIndexOf('.')+1);
if(fileExtention==='png' || fileExtention==='jpg' || fileExtention==='jpeg'){
    document.querySelector('#p2').style.display='none';
if (e.files[0]) {
var reader=new FileReader();
reader.onload=function (e) {
document.querySelector('#img2').setAttribute('src' , e.target.result);
document.querySelector('#img2').style.width='25%';

}
reader.readAsDataURL(e.files[0]);
}

}

else if( fileExtention==='pdf' || fileExtention==='docx' || fileExtention==='doc' || fileExtention==='csv' || fileExtention==='xlsx'){
$("#img2").removeAttr("src");
document.querySelector('#others').style.display='block';
document.getElementById('others').innerHTML=filename;
}
else{
document.querySelector('#p2').style.display='inherit';
document.querySelector('#display2').style.background='none';
}
}

/*///////////////////////////////////////////////////////////////////////////////////////////////////////
                                    Document upload finished
///////////////////////////////////////////////////////////////////////////////////////////////////////*/

				   
                                         </script>
