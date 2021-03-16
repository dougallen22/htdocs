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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">

 

  		<style type="text/css">
  		
.card {
  text-align: center;
  height: 300px;
  width: 300px;
  background: #fff;
  font-family: Roboto;
  display: block;
  position: relative;
  margin: 50px auto;
  border-radius: 5px;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
  transition: all 0.2s ease-in-out;
}

.card:hover {
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
}

.fab {
  position: absolute;
  width: 60px;
  height: 40px;
  margin-top: 0;
  margin-left: 112px;
  visibility: hidden;
  background-color: white;
  border-radius: 50%;
  transform: scale(0);
  box-shadow: 0 2px 3px rgba(0, 0, 0, 0.22), 0 1px 2px rgba(0, 0, 0, 0.24);
  transition: margin-top 0.6s 0.0s ease-in-out, margin-left 0.6s 0.1s ease-in-out, transform 0.6s 0.0s ease-in-out, visibility 0.6s ease-in-out;
}

.active .fab {
  transform: scale(12);
  visibility: visible;
  transition: margin-top 0.5s ease-in-out, margin-left 0.6s ease-in-out, transform 0.4s 0.3s ease-in-out, visibility 0.4s ease-in-out;
  box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
}

.avatar {
  margin-top: 5px;
  margin-left: -30px;
  width: 60px;
  height: 60px;
  border-radius: 50%;
  position: absolute;
  transition: 0.6s ease-in-out;
  cursor: pointer;
  box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
}

.active .avatar {
  transform: scale(2);
  margin-top: 50px;
  margin-left: -30px;
  transition: 0.6s ease-in-out;
  box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
}

.active .avatar:hover {
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
}

.fabs {
  position: absolute;
  margin-top: -30px;
  margin-left: 260px;
  overflow: hidden;
  width: 80px;
  height: 80px;
  border-radius: 5px;
  transition: 1s ease-in-out;
  border-radius: 50%;
}

.active .fabs {
  margin-top: 0px;
  margin-left: 0px;
  width: 300px;
  height: 400px;
  transition: 0.4s ease-in-out;
  border-radius: 0;
}

.userr {
  position: absolute;
  width: 280px;
  height: 200px;
  margin: 150px 10px 0 10px;
  text-align: center;
  visibility: hidden;
  transition: 0.5s cubic-bezier(.55, 0, .1, 1);
}

.active .userr {
  visibility: visible;
}

.socials {
  display: inline-block;
}

.social {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  transform: translate(0px, -10px);
  opacity: 0;
  float: left;
  margin: 0 auto;
  overflow: hidden;
  z-index: 2;
  transition: 0.2s cubic-bezier(.55, 0, .1, 1);
  cursor: pointer;
}

.social>i {
  line-height: 40px;
  font-size: 2em;
  color: #37474f;
}

.active .social {
  transform: translate(0px, 0px);
  opacity: 1;
  transition: 0.3s 0.5s cubic-bezier(.55, 0, .1, 1);
}

.profiles {
  display: inline-block;
}

.profile {
  width: 50%;
  height: auto;
  transform: translate(0px, -10px);
  opacity: 0;
  float: left;
  margin: 0 auto;
  overflow: hidden;
  z-index: 2;
  transition: 0.2s cubic-bezier(.55, 0, .1, 1);
  color: #37474f;
}

.profile>span {
  line-height: 40px;
  font-size: 1.2em;
  font-weight: 600;
  display: block;
  font-style: none;
  color: #37474f;
}

.active .profile {
  transform: translate(0px, 0px);
  opacity: 1;
  transition: 0.3s 0.8s cubic-bezier(.55, 0, .1, 1);
}

	

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
  aside.main-sidebar {
    border-right: 1px solid black !important;
}
  aside.main-sidebar, nav.navbar.navbar-static-top, .skin-blue .main-header .logo, a.sidebar-toggle:hover{
     background: white !important; 
}
.user-panel a, .user-panel p, section.sidebar a, .sidebar-form input.form-control, li.dropdown.user.user-menu span, .skin-blue .main-header .logo, a.sidebar-toggle {
    color: black !important;
}
.user-panel  {
    border-bottom: 1px solid black !important;
    
}
.skin-blue .main-header .logo{
    border: 1px solid black !important;
}
li.header,section.sidebar a:hover{
    color:white !important;
}
</style>
</head>