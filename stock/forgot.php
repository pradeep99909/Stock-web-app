<?php
session_start();

 ?>
<html>
<head>
  <link rel="stylesheet" href='css/forgot.css' type="text/css" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet" />
      <link href="https://fonts.googleapis.com/css?family=Jockey+One" rel="stylesheet" />

      <link rel="icon" href="logo.png" type="image/x-icon" sizes="16X16" />

      <meta name="viewport" content="width=device-width, initial-scale=1.0" media="screen and (max-width:500px)" />

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

      <meta name="theme-color" content="#008db1">
</head>
<body>
  <div id='all'>
    <div id='top_bar'>
      <div id='top_left'>
        <a href="<?php if(isset($_SESSION['email'])){echo "main.php";} else {echo "index.php";} ?>">
				<div id='logo'>
					Stock Exchange
				</div>
				</a>
      </div>
    </div>
    <div id='forgot_main'>
    <div id='main'>
      <div id='icon'><i class="material-icons">lock</i></div>
      <div id='head'>Forget Password?</div>
      <p>You can reset your password here.</p>
      <form class="" action="" method="post">
        <div id='form_box'>
          <div id='form_icon'><i class="material-icons">email</i></div>
          <input type='email' name='forgot_email' />
        </div>
        <input type='submit' value='Reset Password' />
      </form>
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
    <p>Copyright (c)2018-19 StockExchange,All rights reserved</p>
  </div>
</footer>
  </div>
</body>
</html>
