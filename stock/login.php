<?php
session_start();
ob_start();
unset($_SESSION['invalid_email']);
/* Database connection start */
include('database_conn.php');
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

if(isset($_POST["login_submit"])){
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $result = mysqli_query($conn, "SELECT * FROM stock_user WHERE email = '" . $email. "' and password = '" . md5($password). "'");
  if (mysqli_num_rows($result)==1) {
    $_SESSION['email']=$email;
    header("Location:main.php");
  } else {
    $_SESSION['errMsg'] = "Invalid Email or password";
    $error_message = "Incorrect Email or Password!!!";
  }
}
?>
<html>
<head>


  <link rel="icon" href="logo.png" type="image/x-icon" sizes="16X16" />
  <link href="https://fonts.googleapis.com/css?family=Jockey+One" rel="stylesheet" />

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet" />

	<link href="https://fonts.googleapis.com/css?family=Righteous|Roboto" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Mirza" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Jua|Overpass" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="css/login.css" >

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <meta name="viewport" content="width=device-width, initial-scale=1.0" media="screen and (max-width:500px)" />

  <meta name="theme-color" content="#008db1">

<script>
function input_focus(value){
  var input=document.getElementById(value);
  input.style.borderBottom="1.7px solid #008db1";
}

function input_blur(value){
  var input=document.getElementById(value);
  input.style.border="1.7px solid white";
}
</script>

<style>


</style>

</head>
<body>
<div id='all'>
  <div id='backimage'>
    <div id='frontbox'>
      <div id='foropacity'>
  <div id='top_bar'>
    <div id='top_left'>
      <a href="<?php if(isset($_SESSION['email'])){echo "main.php";} else {echo "index.php";} ?>">
      <div id='logo'>
        Stock Exchange
      </div>
      </a>
    </div>
  </div>
  <div id='main'>
<div id='login'>
  <form method='post' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  name='login_form'>
<h3>login</h3>
<div id='login_main'>
  <div id='login_box'>
    <input type='email' id='login_email' placeholder="Email" onfocus='input_focus(this.id)' onblur='input_blur(this.id)' name='email' required/>
  </div>
  <div id='login_box'>
    <input type='password' id='login_password' placeholder="Password" onfocus='input_focus(this.id)' onblur='input_blur(this.id)' name='password' required/>
  </div>
  <div id='login_box'>
    <input type='submit' id='login_submit' value='login' name='login_submit' />
  </div>
  <div id='login_box' style='display:inline;font-size:16px;'>
    Not Registered?<a href="register.php" style='color:#008db1;'>Create an Account</a>
  </div>
  
  <div id='login_box' style='display:inline;font-size:16px;'>
    <a href="adminlogin.php" style='color:#008db1;'>Admin Login</a>
  </div>
  <div id="errMsg" style>
        <?php if(!empty($_SESSION['errMsg'])) { echo $_SESSION['errMsg']; } ?>
  </div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
<footer>
<div id='footer1'>

<div id='footer_box'>
  <div id='footer_box_head'>Company</div>
  <div id='footer_box_menu'><a href='contact.php' style='color:white;text-decoration:none'>Contact Us</a></div>
  <div id='footer_box_menu'><a href='aboutus.php' style='color:white;text-decoration:none'>About Us</a></div>
</div>
<div id='footer_box'>
  <div id='footer_box_head'>Quick Links</div>
  <div id='footer_box_menu'>Advertise</div>
  <div id='footer_box_menu'>Blog</div>
</div>
<div id='footer_box'>
  <div id='footer_box_head'>Follow</div>
  <div id='footer_box_menu'>
    <a href="#" id='icon' class="fa fa-facebook"></a>
    <a href="#" id='icon' class="fa fa-twitter"></a>
    <a href="#" id='icon' class="fa fa-google"></a>
    <a href="#" id='icon' class="fa fa-linkedin"></a>
  </div>
</div>
</div>
<div id='footer2'>
<b>Privacy Policy</b>
<b>Disclaimer</b>
<b>Terms and Conditions</b>
</div>
<div id='footer_line'>
<div id='hr'></div>
</div>
<div id='footer3'>
<p>Copyright 	&copy; 2018-19 StockExchange,All rights reserved</p>
</div>
</footer>
</div>
</body>
</html>
