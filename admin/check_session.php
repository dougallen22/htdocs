<?php
session_start();
ob_start();
include('includes/functions.php');
if(!isset($_SESSION['user'])){
    echo "fail";
}
else{
    echo "success";
}

?>