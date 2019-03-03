<?php
session_start();

unset($_SESSION["invalid_email"]);
include('database_conn.php');

if(isset($_SESSION['email'])){
  header('Location:main.php');
}



function get_stock_main(){
  $string="SELECT * from stock_main";
  $result=mysqli_query($GLOBALS['conn'],$string);
  while($row=mysqli_fetch_array($result)){
    $chance=(($row['current_value']-$row['prev_value'])/$row['prev_value'])*100;

    echo
    "
    <div id='stock'>
      <div id='stock_text'>
        <div id='h3'>".$row['name']."</div>
        <div id='h2'>".$row['current_value']."</div>
        <div id='p'>".round($chance,2)."%</div>
      </div>
      <i class='material-icons'>arrow_drop_up</i>
    </div>
    ";
  }
}


 ?>
<html>
<head>
	<title>Live Stock</title>
	<link href="https://fonts.googleapis.com/css?family=Jockey+One" rel="stylesheet" />
	<script>


 </script>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
		rel="stylesheet" />

<link rel="icon" href="logo.png" type="image/x-icon" sizes="16X16" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link href="https://fonts.googleapis.com/css?family=Righteous|Roboto" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Mirza" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Jua|Overpass" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/index.css" />
	<link href="https://fonts.googleapis.com/css?family=Jockey+One" rel="stylesheet" />

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet" />


  <link href="https://fonts.googleapis.com/css?family=Righteous|Roboto" rel="stylesheet">

  <meta name="viewport" content="width=device-width, initial-scale=1.0" media="screen and (max-width:411px)" />
  <meta name="theme-color" content="#008db1">
  <script src ='js/index.js'>
		</script>

</head>
<body>
<div id='all'>
  <div id='head'>
    <div id='top_bar'>
      <div id='top_left'>
        <a href="<?php if(isset($_SESSION['email'])){echo "main.php";} else {echo "index.php";} ?>">
        <div id='logo'>
          Stock Exchange
        </div>
        </a>
      </div>
      <div id='top_right'>
        <a href='register.php'>Register</a>
        <a href='login.php'>Login</a>
        <a href='contact.php'>Contact Us</a>
        <a href='aboutus.php'>About Us</a>
      </div>
    </div>
    <div id='head_main'>
      <div id='head_center'>
        <div id='head_text'>Helping You Build Wealth With Honest Research</div>
        <a href='login.php'>Start Now</a>
      </div>
    </div>
  </div>
  <div id='top_share'>
    <?php get_stock_main(); ?>
  </div>
  <div id='why_main'>
    <div id='why_top'>
      Why StockExchange?
    </div>
    <div id='why_bottom'>
      <div id='why_box'>
        <div id='why_icon'><i class="material-icons">devices</i></div>
        <div id='why_text'>
          <div id='head_text'>Professional trading platforms</div>
          <div id='para'>Our suite of powerful trading platforms was designed to meet the demanding needs of currency traders</div>
        </div>
      </div>

      <div id='why_box'>
        <div id='why_icon'><i class="material-icons">
show_chart
</i></div>
        <div id='why_text'>
          <div id='head_text'>Charts</div>
          <div id='para'>Provide realtime NSE charts</div>
        </div>
      </div>

      <div id='why_box'>
        <div id='why_icon'><i class="material-icons">list</i></div>
        <div id='why_text'>
          <div id='head_text'>Wishlist</div>
          <div id='para'>Users can tracks their favourite Stocks</div>
        </div>
      </div>
    </div>
  </div>
  <div id='start_main'>
    <div id='text'>Start with Stock Exchange today</div>
    <a href='register.php' style="text-decoration:none">Open An Account</a>
  </div>
  <div id='market'>
    <div id='market_text'>
      <div id='market_head'>Exclusive market insights</div>
      <div id='market_para'> Leverage our experts’ market analysis and trade ideas to maximize   your trading potential and realize your financial goals.</div>
    </div>
    <a href='aboutus.php' style="text-decoration:none">Meet Our Team</a>
  </div>
  <div id='count'>
    <div id='count_box'>
      <div id='count_head'>Stock Exchange</div>
    </div>
    <div id='count_box'>
      <div id='count_head'>10</div>
      <div id='count_para'>Years</div>
    </div>
    <div id='count_box'>
      <div id='count_head'>1.3</div>
      <div id='count_para'>Million Customer</div>
    </div>
    <div id='count_box'>
      <div id='count_head'>454</div>
      <div id='count_para'>Cities</div>
    </div>
    <div id='count_box'>
      <div id='count_head'>5 Lakh</div>
      <div id='count_para'>Customer Assets</div>
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
