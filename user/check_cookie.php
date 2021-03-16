<?php

if (isset($_COOKIE['userss']))
{
  $cookie=unserialize(@$_COOKIE['userss'], ["allowed_classes" => false]);
  
if(!isset($_SESSION['ruser'])){
   $_SESSION['ruser']=$cookie;
}
}
else if (!isset($_COOKIE['userss'])){
  if(isset($_SESSION['ruser'])){
      setcookie ("userss", "", time() - 3600);
   setcookie ("userss", serialize($_SESSION['ruser']), time()+3600 * 24 * 365);
}  
}

?>