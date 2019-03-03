<?php
session_start();

include('database_conn.php');


$stock_id=$_GET['id'];
$ticker=$_GET['ticker'];


if(isset($_SESSION['email'])){

            $string1="SELECT * from wishlist where email='".$_SESSION['email']."' and ticker='".$ticker."'";

            $result1=mysqli_query($conn,$string1);

            if(mysqli_fetch_array($result1)>0){
              if($_GET['name']=='stocks'){
              echo  "<script>
              window.onload=run;
              function run(){
              alert('Already in your Wishlist');
              location.href = 'stocks.php';
            }
              </script>";

            }
            else{
              echo  "<script>
              window.onload=run;
              function run(){
              alert('Already in your Wishlist');
              location.href = 'mostactive.php';
            }
              </script>";
            }
            }
            else{

                      $email=$_SESSION['email'];


                      $string2="INSERT into wishlist(stock_id,ticker,email) values('$stock_id','$ticker','$email')";

                      $result2=mysqli_query($conn,$string2);

                      if($result2){
                        if($_GET['name']=='stocks'){
                        echo  "<script>
                        window.onload=run;
                        function run(){
                        alert('Sucessfully added to your Wishlist');
                        location.href = 'stocks.php';
                      }
                        </script>";

                      }
                      else{
                        echo  "<script>
                        window.onload=run;
                        function run(){
                        alert('Sucessfully added to your Wishlist');
                        location.href = 'mostactive.php';
                      }
                        </script>";
                      }
                      }
                      else{
                        echo "false";
                      }

          }
}
else{
  header('Location: login.php');
}

?>
