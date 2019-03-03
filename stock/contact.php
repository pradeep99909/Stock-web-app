<?php
include('database_conn.php');
ob_start();
if(isset($_GET['submit'])){

  $name=$_GET['name'];
  $email=$_GET['email'];
  $phone=$_GET['phone'];
  $type=$_GET['type'];
  $subject=$_GET['subject'];
  $message=$_GET['message'];
  if(!empty($name) || !empty($email) || !empty($phone) || !empty($type) || !empty($subject) || !empty($message)){
  $string="INSERT INTO contact(name,email,phone,type,subject,message) values('$name','$email','$phone','$type','$subject','$message')";

  $result=mysqli_query($GLOBALS['conn'],$string);

  if($result){
     echo "
     <script>
     window.onload=notify;
     function notify(){
      document.getElementById('notify').innerHTML='Message Sent';
      document.getElementById('notify').style.backgroundColor='green';
      document.getElementById('notify').style.color='white';
      document.getElementById('notify').style.width='400px';
      document.getElementById('notify').style.height='30px';
    }
    </script>
     ";
  }


  }
  else{
    echo "

    <script>
    window.onload=notify;
    function notify(){
     document.getElementById('notify').innerHTML='Fill all Values';
     document.getElementById('notify').style.backgroundColor='red';
     document.getElementById('notify').style.color='white';
     document.getElementById('notify').style.width='400px';
     document.getElementById('notify').style.height='30px';
   }
   </script>
    ";
  }

}

  ?>
<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <title>Contact Us</title>
    <link rel="stylesheet" href="css/contact.css" type="text/css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="icon" href="logo.png" type="image/x-icon" sizes="16X16" />

    <link href="https://fonts.googleapis.com/css?family=Jockey+One" rel="stylesheet" />

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
        rel="stylesheet" />

    <link href="https://fonts.googleapis.com/css?family=Righteous|Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Mirza" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Jua|Overpass" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/login.css" >

    <meta name="viewport" content="width=device-width, initial-scale=1.0" media="screen and (max-width:500px)" />

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
      <div id='contact_main'>
        <div id='contact_main_up'>
          <div id='contact_up_left'>
            <p>Contact Us</p>
            <div id='notify'>
            </div>
            <div id='contact_form'>
              <form action='' method='get'>
                <div id='contact_text'>
                  <p>Name<sup>*</sup></p>
                  <input type='text' name='name' id='contact_name' />
                </div>
                <div id='contact_text'>
                  <p>Email<sup>*</sup></p>
                  <input type='email' name='email' id='contact_email' />
                </div>
                <div id='contact_text'>
                  <p>Phone Number<sup>*</sup></p>
                  <input type='text' name='phone' id='contact_phone' />
                </div>
                <div id='contact_text'>
                  <p>Type<sup>*</sup></p>
                  <select name='type' id='contact_type'>
                    <option value="message">Message</option>
                    <option value="complain">Complain</option>
                    <option value="suggestion">Suggestion</option>
                  </select>
                </div>
                <div id='contact_text'>
                  <p>Subject<sup>*</sup></p>
                  <input type='text' name='subject' id='contact_subject' />
                </div>
                <div id='contact_text'>
                  <p>Message<sup>*</sup></p>
                  <textarea name='message' id='contact_message' ></textarea>
                </div>
                <div id='contact_text'>
                  <input type='submit' name='submit' value="Send" id='contact_send' />
                </div>
              </form>
            </div>
          </div>
        </div>
        <div id='map'>
          <p>Our Location</p>
          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d943.1677578802733!2d73.1278104146869!3d18.99013049937975!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1539426508858"></iframe>
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
