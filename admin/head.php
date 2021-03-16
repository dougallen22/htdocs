<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard</title>

 
  <link rel="icon" type="image/png" href="images/logo.png"/>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  	<link rel="stylesheet" type="text/css" href="css/nunito-font.css">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="css/form-style.css"/>
    
   
 <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Raleway'>
 <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link href="css/bootstrap-imageupload.css" rel="stylesheet">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  		<script src="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.js"></script>
  		<link href="css/chat.css" rel="stylesheet">
  		<script src="js/moment.js"></script>
  		<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  		<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
  		<link href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.dataTables.min.css" rel="stylesheet">

 

  		<style type="text/css">
  		

	

.btn-file {
            position: relative;
            overflow: hidden;
        }

        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            background: white;
            cursor: inherit;
            display: block;
        }

        #img-upload {
        	margin-top: 10px;
            width: 100%;

        }


select[multiple], select[size] {
    height: auto;
    width: 100%;
    padding: 14.5px 0px 14.5px 30px;
    border: 2px solid #ccc;
    appearance: unset;
    -moz-appearance: unset;
    -webkit-appearance: unset;
    -o-appearance: unset;
    -ms-appearance: unset;
    outline: none;
    -moz-outline: none;
    -webkit-outline: none;
    -o-outline: none;
    -ms-outline: none;
    border-radius: 27.5px;
    -o-border-radius: 27.5px;
    -ms-border-radius: 27.5px;
    -moz-border-radius: 27.5px;
    -webkit-border-radius: 27.5px;
    font-family: 'Nunito', sans-serif;
    font-size: 16px;
    font-weight: 700;
    background: rgba(255, 255, 255, 0.2);
}
.form-v9-content{
    margin:0 !important;
    height: auto !important;
} 
textarea{
    width: 100%;
    padding: 14.5px 0px 14.5px 30px;
    border: 2px solid #ccc;
    appearance: unset;
    -moz-appearance: unset;
    -webkit-appearance: unset;
    -o-appearance: unset;
    -ms-appearance: unset;
    outline: none;
    -moz-outline: none;
    -webkit-outline: none;
    -o-outline: none;
    -ms-outline: none;
    border-radius: 27.5px;
    -o-border-radius: 27.5px;
    -ms-border-radius: 27.5px;
    -moz-border-radius: 27.5px;
    -webkit-border-radius: 27.5px;
    font-family: 'Nunito', sans-serif;
    font-size: 16px;
    font-weight: 700;
    background: rgba(255, 255, 255, 0.2);
}
textarea::-webkit-input-placeholder {
  color: #ccc;
}

textarea:-moz-placeholder { /* Firefox 18- */
  color: #ccc;  
}

textarea::-moz-placeholder {  /* Firefox 19+ */
  color: #ccc;  
}

textarea:-ms-input-placeholder {
  color: #ccc;  
}

textarea::placeholder {
  color: #ccc;  
}
.user-panel img {
    margin-top: 8px !important;
}
	  #alert_popover
  {
   display:block;
   position:absolute;
   top:160px;
   right:10px;
   z-index:100 !important;
  }
  .space {
    display: table-cell;
    vertical-align: bottom;
    height: auto;
    width:250px;
  }
  .alert_custom
  {
   color: black;
   background-color: #00ff37;
   border-color: black;
   z-index:100 !important;
  }
  .alert_custom a
  {
   text-decoration: none !important;
   color:black !important;
   
  }
</style>
</head>