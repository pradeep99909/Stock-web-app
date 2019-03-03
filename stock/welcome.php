<?php
session_start();
include('database_conn.php');
function print_user(){
  if(isset($_SESSION['email'])){
    $string="SELECT * from stock_user where email='".$_SESSION['email']."'";
    $result=mysqli_query($GLOBALS['conn'],$string);
    if($result){
      while($row=mysqli_fetch_array($result)){
        echo "".$row['first_name']." ".$row['last_name']."
          <div id='good'>Good to see you here.</div>
          <div id='verified_user'><i class='material-icons'>verified_user</i></div>
          <a href='main.php'><button formtarget='_self'>Continue</button></a>
        ";
      }
    }

  }
  else{
    echo "<a href='register.php'>Register First</a>";
  }

}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="https://fonts.googleapis.com/css?family=Jockey+One" rel="stylesheet" />

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet" />

      <link rel="icon" href="logo.png" type="image/x-icon" sizes="16X16" />

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link href="https://fonts.googleapis.com/css?family=Righteous|Roboto" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Mirza" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Jua|Overpass" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/welcome.css" />
    <link href="https://fonts.googleapis.com/css?family=Jockey+One" rel="stylesheet" />

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
        rel="stylesheet" />

    <link href="https://fonts.googleapis.com/css?family=Righteous|Roboto" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" media="screen and (max-width:500px)" />

    <meta name="theme-color" content="#008db1">


    
  </head>
  <body>
    <div id='all'>
    <header>
      <div id='top_left'>
        <a href="<?php if(isset($_SESSION['email'])){echo "main.php";} else {echo "index.php";} ?>">
				<div id='logo'>
					Stock Exchange
				</div>
				</a>
      </div>
    </header>
    <main>
      <div id='welcome'>Welcome</div>
      <div id='user'><?php print_user(); ?></div>
    </main>
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
