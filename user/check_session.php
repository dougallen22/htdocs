<?php
session_start();
ob_start();
include('includes/functions.php');
if(!isset($_SESSION['ruser'])){
    echo "fail";
}
else{
    echo "success";
}

?>