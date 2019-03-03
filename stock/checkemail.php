<?php
include('database_conn.php');
$string="SELECT * from stock_user where email='".$_GET['email']."'";
$result=mysqli_query($conn,$string);
if($_GET['email']==True){
if(filter_var($_GET['email'], FILTER_VALIDATE_EMAIL)){
  if(mysqli_num_rows($result)==1){
    echo "Email Already Use";
  }
  else{
  echo "Valid Email";
}
}
else{
  echo "Enter valid Email";
}
}
?>
