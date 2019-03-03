<?php


$api="1342629cc4298e54df67839744a214ac";   ///// Provide your fixer.io api key here


$string = file_get_contents("http://data.fixer.io/api/latest?access_key=$api&format=1");
	$json = json_decode($string, true);


  $i=0;

  foreach ($json['rates'] as $key => $value) {
    $currency[$i]=$key;
    $rate[$i]=$value;
    $i=$i+1;

  }


  $amount=$_GET['amount'];
  $from=$_GET['from'];
  $to=$_GET['to'];
  $combine= array_combine($currency, $rate);
  $from_currency=$rate[$from];
  $to_currency=$rate[$to];
  $result=$to_currency/$from_currency;
  $resultrev=$from_currency/$to_currency;
$output=$result*$amount;
$reverse=$resultrev*$amount;
echo round($output,3);


?>
