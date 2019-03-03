<?php
session_start();
include('database_conn.php');

$ticker=$_GET['ticker'];



$email=$_SESSION['email'];

$string="DELETE FROM wishlist WHERE email='".$_SESSION['email']."' AND ticker='".$ticker."'";

$result=mysqli_query($GLOBALS['conn'],$string);

if($result){
echo "
<script>
alert('Deleted Sucessfully');
location.href='wishlist.php'
</script>
  ";
  }
else{
      echo "<script>
      alert('Not Delete Sucessfully');
      location.href='wishlist.php'
      </script>";
}



 ?>
