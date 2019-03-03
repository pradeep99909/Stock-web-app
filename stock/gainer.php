<?php

include('database_conn.php');


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
    echo "<table>>";
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

          echo "<tr><td id=".$id.">".$array[$i][$j]."</td>";
        }
        echo "<td><i class='material-icons'>arrow_drop_up</i></td>


        <td><a href='wishlist.php?id=".$row['id']."&ticker=".$row['TICKER']."'>Add To Wishlist</a></td></tr>
        </table>";
      }
}



function array_sort_by_column(&$arr, $col, $dir = SORT_DESC) {
    $sort_col = array();
    foreach ($arr as $key=> $row) {
        $sort_col[$key] = $row[$col];
    }

    array_multisort($sort_col, $dir, $arr);
}




 ?>

 /<!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Most Active</title>
     <link rel="stylesheet" type="text/css" href="css/mostactive.css">

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

       <script>

       function most_active(){
         var value=document.querySelectorAll('table #value');
         var icon=document.querySelectorAll('table #icon i');
         var i;


           for(i=0;i<value.length;i++){
             value[i].innerHTML=parseFloat(value[i].innerHTML).toFixed(2)+"%";
             if(parseFloat(value[i].innerHTML)>0){
               icon[i].style.color='#72bb53';
               icon[i].innerHTML='arrow_drop_up';
               value[i].style.color='#72bb53';
             }
             else{
               icon[i].style.color='#e61610';
               icon[i].innerHTML='arrow_drop_down';
               value[i].style.color='#e61610';
             }
           }

       }

       setInterval(most_active,10);
       </script>
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
       <div id='active_main'>
         <p>Most Active Stocks</p>
         <?php
         get_gainers();

          ?>


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
         <p>Copyright &copy; 2018-19 StockExchange,All rights reserved</p>
       </div>
       </footer>
     </div>
   </body>
 </html>
