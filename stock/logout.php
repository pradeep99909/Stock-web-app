<?php
session_start();
  unset($_SESSION['email']);
  session_destroy();


  if($_GET['name']=='admin'){
    header("Location: ./adminlogin.php");
  }
  else{
    header("Location: login.php");
  }

?>
