<?php
session_start();

ob_start();

unset($_SESSION["invalid_email"]);

require('database_conn.php');

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
        <div id='p'>".$chance."%</div>
      </div>
      <i class='material-icons'>arrow_drop_up</i>
    </div>
    ";
  }
}




/*function to get news from database*/

function get_news(){
  $string="SELECT * from news";

  $result=mysqli_query($GLOBALS['conn'],$string);

  while($row=mysqli_fetch_array($result)){
    echo "<br><br><div id='top'><img src='images/".$row['image']."'><div id='headline'>".$row['headline']."</div></div><br><div id='bottom'><div id='detail'>".substr($row['detail'], 0, 300)."</div></div><a style='color:#008db1;font-family:sans-serif;font-size:14px' href='".$row['source']."'>Read More>></a>";
  }

}



  function array_sort_by_column(&$arr, $col, $dir = SORT_DESC) {
      $sort_col = array();
      foreach ($arr as $key=> $row) {
          $sort_col[$key] = $row[$col];
      }

      array_multisort($sort_col, $dir, $arr);
  }

/*function for top gainers */


function get_gainers(){
  $string="SELECT * from nse group by TICKER";

  $result=mysqli_query($GLOBALS['conn'],$string);
  $ticker=array();
  $current=array();
  $chance=array();
  $array=array();
  $count=0;
  while($row=mysqli_fetch_array($result)){

    $chance1=($row['CURRENT']-$row['PREV CLOSE'])/$row['PREV CLOSE']*100;
    $chance1=round($chance1,2);
    array_push($array,array($row['TICKER'],$row['CURRENT'],$chance1));

  $count=$count+1;

  }



  array_sort_by_column($array,'2');



  for($i=0;$i<6;$i++){
    echo "<div style='display:flex;' id='stock_gain'>";
    for($j=0;$j<3;$j++){
      if($j==0){
        $id='ticker';
      }
      else if($j==1){
        $id='current';
      }
      else{
        $id='chance';
      }

          echo "<div id=".$id.">    ".$array[$i][$j]."    </div><br>";
        }
        echo "<i class='material-icons'>arrow_drop_up</i></div>";
      }
}



function array_sort_by_column2(&$arr, $col, $dir = SORT_ASC) {
    $sort_col = array();
    foreach ($arr as $key=> $row) {
        $sort_col[$key] = $row[$col];
    }

    array_multisort($sort_col, $dir, $arr);
}

//get loosers function.

function get_loosers(){
  $string="SELECT * from nse group by TICKER";

  $result=mysqli_query($GLOBALS['conn'],$string);
  $ticker=array();
  $current=array();
  $chance=array();
  $array=array();
  $count=0;
  while($row=mysqli_fetch_array($result)){

    $chance1=($row['CURRENT']-$row['PREV CLOSE'])/$row['PREV CLOSE']*100;
    $chance1=round($chance1,2);
    array_push($array,array($row['TICKER'],$row['CURRENT'],$chance1));

  $count=$count+1;

  }



  array_sort_by_column2($array,'2');



  for($i=0;$i<6;$i++){
    echo "<div style='display:flex;' id='stock_gain'>";
    for($j=0;$j<3;$j++){
      if($j==0){
        $id='ticker';
      }
      else if($j==1){
        $id='current';
      }
      else{
        $id='chance';
      }

          echo "<div id=".$id.">    ".$array[$i][$j]."    </div><br>";
        }
        echo "<i class='material-icons'>arrow_drop_down</i></div>";
      }
}




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
<div id='stocks'>
  <div id='stocks_head' style="color:#008db1;font-size:22px;font-family:sans-serif;font-weight:bold;">Stocks</div>
  <div id='stocks_main'>
    <p style="color:#008db1;font-size:19px;font-family:sans-serif;font-weight:bold;">NSE</p>
    <br>
    <select onchange='get_stock1(this.value)'>
      <option value="NIFTY 50">Nifty 50</option>
      <option value="NIFTY AUTO">Nifty Auto</option>
      <option value="NIFTY MEDIA"> Nifty Media</option>
      <option value="NIFTY PHARMA">Nifty Pharma</option>
    </select>
    <table id='table' style="margin-top:50px">

    </table>
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
