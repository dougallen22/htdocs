<?php
session_start();
ob_start();
include("includes/functions.php");
session_alldestroy();

user_logout();
?>
