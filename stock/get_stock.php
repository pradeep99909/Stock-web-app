<?php
ob_start();
include('database_conn.php');

$string="SELECT * from nse where TYPE = '".$_GET['type']."'";

$result=mysqli_query($conn,$string);

echo "<tr style='color:#008db1;font-family:sans-serif;font-weight:bold;'>
  <td >Ticker</td>
  <td>Type</td>
  <td>Current</td>
  <td>Open</td>
  <td>High</td>
  <td>Low</td>
  <td>Previous Close</td>
  <td>Volume</td>
  <td>Wishlist</td>
</tr>";

while($row=mysqli_fetch_array($result)){
  echo "
  <tr style='color:#616161;font-size:15px;font-family:sans-serif;font-weight:600;'>
    <td>".$row['TICKER']."</td>
    <td>".$row['TYPE']."</td>
    <td>".$row['CURRENT']."</td>
    <td>".$row['OPEN']."</td>
    <td>".$row['HIGH']."</td>
    <td>".$row['LOW']."</td>
    <td>".$row['PREV CLOSE']."</td>
    <td>".$row['VOLUME']."</td>
    <td><a href='addwishlist.php?id=".$row['id']."&ticker=".$row['TICKER']."&name=stocks'>Add To Wishlist</a></td>
  </tr>

  ";
}

?>
