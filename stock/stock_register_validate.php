<?php
session_start();
include('database_conn.php');


if()

$register_submit=$_REQUEST['register_submit'];
if(isset($register_submit)){
$fname=$_POST['first_name'];
$lname=$_POST['last_name'];
$email=$_POST['email'];
$phone=$_POST['phone_number'];
$gender=$_POST['gender'];
$dob=$_POST['date_of_birth'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];

$en_password=md5($password);


$_SESSION['register_fname']=$fname;
$_SESSION['register_lname']=$lname;
$_SESSION['register_email']=$email;
$_SESSION['register_phone']=$phone;
$_SESSION['register_gender']=$gender;
$_SESSION['register_date_of_birth']=$dob;
$_SESSION['register_password']=$password;
$_SESSION['register_cpassword']=$cpassword;


$string1="SELECT * from stock_user where email='".$email."'";

$result1=mysqli_query($conn,$string1);
if(isset($fname) || isset($lname) || isset($email) || isset($phone) || isset($gender) || isset($dob) || isset($password) || isset($cpassword)){
if(mysqli_num_rows($result1)==1){
  $_SESSION["invalid_email"]="Email Already in Use!";
  echo "
    <script>
      location.href='register.php';
    </script>
  ";
}
else{
  if($password==$cpassword){
  $string2="INSERT into stock_user(first_name,last_name,email,phone_number,gender,date_of_birth,password) values('$fname','$lname','$email','$phone','$gender','$dob','$en_password')";


  $result2=mysqli_query($conn,$string2);

  if($result2){
    unset($_SESSION["invalid_email"]);
    $_SESSION['email']=$email;
    echo "
      <script>
        location.href='welcome.php';
      </script>

    ";
  }
  else{
    echo "
      <script>
        window.alert('Password do not match');
      </script>

    ";
  }
  }
  else{
    echo "
      <script>
        alert('registeration Unsucessfull');
      </script>
    ";
  }
}
}
}

?>
