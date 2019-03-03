<?php
session_start();

ob_start();

unset($_SESSION["invalid_email"]);

require('database_conn.php');



 ?>
<html>
<head>
	<title>Stock Exchange</title>
	<link href="https://fonts.googleapis.com/css?family=Jockey+One" rel="stylesheet" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" media="screen and (max-width:411px)" />
  <meta name="theme-color" content="#008db1">
  <link rel="icon" href="logo.png" type="image/x-icon" sizes="16X16" />
	<script>
<?php

if(isset($_SESSION['email'])){

$string1="SELECT first_name,last_name from stock_user where email='".$_SESSION['email']."'";
	$result1=mysqli_query($GLOBALS['conn'],$string1);


	while($row1=mysqli_fetch_array($result1)){
		echo "window.onload=first_name;
					function first_name(){
						var a=document.getElementById('sign1');
						a.innerHTML='<div id=profile onclick=open_profile_menu()><i class=material-icons>account_circle</i><div id=name>".$row1['first_name']." ".$row1['last_name']."</div></div>';
			}

		";
	}
}
else{
echo "
	<script>
		var sign=document.getElementById('sign1');
		sign.innerHTML='<a href='register.php' style='text-decoration:none;'>
			<div id='sign_register'>
				Register
			</div>
		</a>
		<a href='login.php' style='text-decoration:none;'>
			<div id='sign_login'>
				Login
			</div>
		</a>';
	</script>

";
}

 ?>

 </script>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
		rel="stylesheet" />

<link href="https://fonts.googleapis.com/css?family=Righteous|Roboto" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Mirza" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Jua|Overpass" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/main.css" />
	<link href="https://fonts.googleapis.com/css?family=Jockey+One" rel="stylesheet" />

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet" />



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link href="https://fonts.googleapis.com/css?family=Righteous|Roboto" rel="stylesheet">

  <meta http-equiv="refresh" content="">
	<script src ='js/main.js'>
			</script>

      <script async custom-element="amp-auto-ads"
              src="https://cdn.ampproject.org/v0/amp-auto-ads-0.1.js">
      </script>
</head>
<body>
  <div id='left_side_bar'>
    <div id='side_top'>
      <div id='icon'><i class='material-icons' onclick="close_left_bar()">close</i></div>
      <div id='login_sign'>
        <?php
        if(isset($_SESSION['email'])){
          $string="SELECT * from stock_user where email = '".$_SESSION['email']."'";
          $result=mysqli_query($GLOBALS['conn'],$string);
          while($row=mysqli_fetch_array($result)){
          echo "
          <a href='profile.php' style='color:white;text-decoration:none'>
          <div id='profile_icon'><i class='material-icons'>account_circle</i></div>
          <div id='profile_name'>
              ".$row['first_name']."<br>".$row['last_name']."
          </div>
          </a>
          ";
        }
        }
        else{
          echo "
          <a href='register.php'>Register</a>
          <a href='login.php'>Login</a>
          ";
        }
        ?>
      </div>
    </div>
    <div id='side_bottom'>
      <div id='side_menu'>
        <ul>
          <li onclick="location.href='main.php';">Home</li>
          <li onclick="location.href='stocks.php';">Stocks</li>
          <li onclick="location.href='market.php';">Market</li>
          <li onclick="location.href='wishlist.php';">Wishlist</li>
          <li onclick="location.href='tool.php';">Tools</li>
          <?php
            if(isset($_SESSION['email']))
            {
              echo "<li><a style='text-decoration:none;color:#008db1' href='logout.php?name=user'>Log Out</a></li>";
            }
            else {
              echo "";
            }
           ?>
        </ul>
    </div>
  </div>
</div>
	<div id='profile_menu'>
		<div id='close_icon'>
		<i class='material-icons' onclick="close_profile_menu()">close</i>
		</div>
		<ul>
			<li><a href='profile.php' style="text-decoration:none;color:#444444;">Profile</a></li>
			<li name='logout'><a href='logout.php?name=user' style="text-decoration:none;color:#444444;">Logout</a></li>
		</ul>
	</div>
  <div id='all'>
    <div id='top_bar'>
      <div id='top_left'>
        <div id='nav' onclick="open_left_side_bar()">
          <div id='line'></div>
          <div id='line'></div>
          <div id='line'></div>
        </div>
        <a href="<?php if(isset($_SESSION['email'])){echo "main.php";} else {echo "index.php";} ?>">
        <div id='logo'>
          Stock Exchange
        </div>
        </a>
        <div id='menu'>
          <ul>
            <li onclick="location.href='main.php';">Home</li>
            <li onclick="location.href='stocks.php';">Stocks</li>
            <li onclick="location.href='market.php';">Markets</li>
            <li onclick="location.href='wishlist.php';">Wishlist</li>
            <li onclick="location.href='tool.php';">Tools</li>
          </ul>
        </div>
      </div>
      <div id='top_right'>
        <div id='sign1'>
          <?php

          if(isset($_SESSION['email'])){

          $string1="SELECT first_name,last_name from stock_user where email='".$_SESSION['email']."'";
            $result1=mysqli_query($GLOBALS['conn'],$string1);


            while($row1=mysqli_fetch_array($result1)){
              echo "<div id=profile onclick=open_profile_menu()><i class=material-icons>account_circle</i><div id=name>".$row1['first_name']." ".$row1['last_name']."</div></div>";
            }
          }
          else{
          echo "
            <a href='register.php' style='text-decoration:none;'>
                <div id='sign_register'>
                  Register
                </div>
              </a>
              <a href='login.php' style='text-decoration:none;'>
                <div id='sign_login'>
                  Login
                </div>
              </a>";
          }

           ?>
        </div>

      </div>
    </div>
    <div id='tools'>
      <div id='tool_1'>
        <div id='tool_text' onClick="open_cal()" style="cursor:pointer">
          <p>Calculator</p><i class="material-icons">add_circle</i>
        </div>
        <div id='calculator_main' style='height:0px;display:none;background'>
          <table>
              <tr >
              	<td colspan=4><input type="text" id="text1" placeholder="0" style="text-align:right;width:250px;height:50px;"/></td>
              </tr>
              <tr>
                <td><button type="button" value="C" onClick="event3()">C</button></td>
              	<td><button type="button" value="/" onClick="event1(this.value)">/</button></td>
              	<td><button type="button" value="*"  onClick="event1(this.value)">*</button></td>
              	<td><button type="button" value="-"  onClick="event1(this.value)">-</button></td>
              </tr>
              <tr>
              	<td><button type="button" value="7" onClick="event1(this.value)">7</button></td>
              	<td><button type="button" value="8" onClick="event1(this.value)">8</button></td>
              	<td><button type="button" value="9" onClick="event1(this.value)">9</button></td>
              	<td rowspan=2><button type="button" value="+" style="height:50px;height:120px;" onClick="event1(this.value)">+</td>
              </tr>
              <tr>
              	<td><button type="button" value="4" onClick="event1(this.value)">4</button></td>
              	<td><button type="button" value="5" onClick="event1(this.value)">5</button></td>
              	<td><button type="button" value="6" onClick="event1(this.value)">6</button></td>
              </tr>
              <tr>
              	<td><button type="button" value="1" onClick="event1(this.value)">1</button></td>
              	<td><button type="button" value="2" onClick="event1(this.value)">2</button></td>
              	<td><button type="button" value="3" onClick="event1(this.value)">3</button></td>
              	<td rowspan=2><button type="button" style="background-color:#008db1;color:white;height:100px"  onClick="event2()" >=</button></td>
              </tr>
              <tr>
              	<td colspan=2><button type="button" value="0" style="width:100%" onClick="event1(this.value)">0</button></td>
              	<td><button type="button" value="." onclick="event4(this.value)">.</button></td>
              </tr>
              </table>
        </div>
      </div>
      <div id='tool_1'>
        <div id='tool_text' onClick="open_currency()" style="cursor:pointer">
          <p>Currency Calculator</p><i class="material-icons">add_circle</i>
        </div>
        <div id="currency_main" style="display:none">
          <form action="currency.php" method="get">
          <div id='currency_top'>
            <input type="text" onkeyup="get_currency(document.getElementById('currency_select1').value,document.getElementById('currency_select2').value,document.getElementById('currency_text1').value)" name="amount" id="currency_text1" onfocus="input_focus(this.id)" onblur="input_blur(this.id)" placeholder="1"  />
            <select name="from" id="currency_select1" onchange="get_currency(document.getElementById('currency_select1').value,document.getElementById('currency_select2').value,document.getElementById('currency_text1').value)">
                        <?php
                        include('fetch.php');
                for($i=0;$i<count($rate);$i++){
                  echo "<option value=\"$i\">$currency[$i]</option>";
                }


              ?>
      </select>
          </div>
          <div id='currency_bottom'>
            <input type="text" placeholder="1" name="" id="currency_text2" onkeyup="get_currency(document.getElementById('currency_select1').value,document.getElementById('currency_select2').value,document.getElementById('currency_text1').value)" onfocus="input_focus(this.id)" onblur="input_blur(this.id)" />
            <select name="to" id="currency_select2" onchange="get_currency(document.getElementById('currency_select1').value,document.getElementById('currency_select2').value,document.getElementById('currency_text1').value)">
                              <?php
                				for($i=0;$i<count($rate);$i++){
                					echo "<option value=\"$i\">$currency[$i]</option>";
                				}


                			?>
              </select>
        </form>
        </div>
      </div>
    </div>

    <div id='tool_1'>
      <amp-auto-ads type="adsense" data-ad-client="ca-pub-2609866988914589">
      </amp-auto-ads>
    </div>
</div>

<footer>
<div id='footer1'>

<div id='footer_box'>
  <div id='footer_box_head'>Company</div>
  <div id='footer_box_menu'>Contact Us</div>
  <div id='footer_box_menu'>About Us</div>
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
