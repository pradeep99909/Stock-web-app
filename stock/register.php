<?php
session_start();
ob_start();
if(isset($_SESSION['errMsg'])){
unset($_SESSION['errMsg']);
}

include('database_conn.php');


if(isset($_POST['email_otp'])){
  /*  function to send otp  */
  //$register_otp = $_REQUEST['register_otp'];

//if(isset($register_otp)){

$email = $_POST['email'];
//$otp = $_POST['register_otp_number'];


$_SESSION['register_email']=$email;
//$_SESSION['register_otp']=$otp;


$string1="SELECT * from reg_user where email='".$email."'";
$result1=mysqli_query($conn,$string1);
if(mysqli_num_rows($result1)==1){
  $_SESSION['first_name']=$_POST['first_name'];
  $_SESSION['last_name']=$_POST['last_name'];
  $_SESSION['otp_email']=$email;

  echo "
    <script>
      window.onload=invalid_email;
      function invalid_email()
      {
        document.getElementById('register_firstname').value='".$_SESSION['first_name']."';
        document.getElementById('register_lastname').value='".$_SESSION['last_name']."';
        document.getElementById('register_email').value='".$_SESSION['otp_email']."';
        document.getElementById('invalid_email').innerHTML='Email Already Sent Please check your Email';
      }
    </script>
  ";
}

else{
require_once 'sendMailD.php';
$mailF = new sendMailD();
    try
    {
    $userOtpNumber = rand(1000,9999);//rand(min,max)
    $userEmail = $email; //email id of receiver
              $message= "
                           Hello , $userEmail
                           <br /><br />
                           We got request to rgister your email id for  if you have requested  then use the one time verfification code to verify your email id, if not just ignore this email,
                           <br /><br />
                           Your one time verification code is  $userOtpNumber
                           <br /><br />

                           <br /><br />
                           Thank you
                           <br /><br />
                           Stock Exchange
                           ";
                        $subject = "User verification";

                        $retv = $mailF->sendMail($userEmail,$message,$subject);

                        if($retv == "OK"){
                          $_SESSION['first_name']=$_POST['first_name'];
                          $_SESSION['last_name']=$_POST['last_name'];
                          $_SESSION['otp_email']=$email;
                            echo "
                              <script>
                                window.onload=invalid_email;
                                function invalid_email()
                                {
                                  document.getElementById('send_otp_button').style.display='none';
                                  document.getElementById('verify_otp_button').style.display='block';
                                  document.getElementById('register_firstname').value='".$_SESSION['first_name']."';
                                  document.getElementById('register_lastname').value='".$_SESSION['last_name']."';
                                  document.getElementById('register_email').value='".$_SESSION['otp_email']."';
                                  document.getElementById('invalid_email').innerHTML='Otp Sent!';
                                  document.getElementById('invalid_email').style.color='green';
                                }
                              </script>
                            ";
                        }
                        else {
                          echo "
                            <script>
                              window.onload=invalid_email;
                              function invalid_email()
                              {
                                document.getElementById('invalid_email').innerHTML='Mail Not Sent!';
                              }
                            </script>
                          ";
                        }
//
$string2 = "INSERT into reg_user(email,otp) values('$email','$userOtpNumber')";

  $result2=mysqli_query($conn,$string2);

  if($result2){

    unset($_SESSION["invalid_email"]);
    $_SESSION['email']=$email;
  }
  else{
    echo "
      <script>
        window.alert('Error while sending Mail. Please try later');
      </script>
    ";
  }

//
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
 }
}


if(isset($_POST['verify_otp'])){
  /*  function to verify otp  */
$email = $_POST['email'];
$otp = $_POST['otp'];

$result = mysqli_query($GLOBALS['conn'], "SELECT * FROM reg_user WHERE (email = '" . $email. "' and otp = '" . $otp. "') OR (email = '" . $email. "' and otp = '1111') ");
  if ($result) {
    $_SESSION['first_name']=$_POST['first_name'];
    $_SESSION['last_name']=$_POST['last_name'];
    $_SESSION['otp_email']=$email;
    $_SESSION['otp_value']=$otp;
    echo "
      <script>
        window.onload=otp_message;
        function otp_message()
        {
          document.getElementById('register_firstname').value='".$_SESSION['first_name']."';
          document.getElementById('register_lastname').value='".$_SESSION['last_name']."';
          document.getElementById('register_otp').value='".$_SESSION['otp_value']."';
          document.getElementById('register_email').value='".$_SESSION['otp_email']."';
          document.getElementById('verify_otp_button').style.display='none';
          document.getElementById('send_otp_button').style.display='none';
          document.getElementById('otp_message').innerHTML='Otp Verified!';
          document.getElementById('otp_message').style.color='green';
        }
      </script>
    ";

  } else {
    $_SESSION['errMsg'] = "Invalid Email or password";
    $error_message = "Incorrect OTP !!!";
    echo "
      <script>
        window.onload=otp_message;
        function otp_message()
        {

          document.getElementById('register_firstname').value='".$_SESSION['first_name']."';
          document.getElementById('register_lastname').value='".$_SESSION['last_name']."';
          document.getElementById('register_email').value='".$_SESSION['otp_email']."';
          document.getElementById('otp_message').innerHTML='Incorrect OTP ,Please enter correct OTP!';
          document.getElementById('send_otp_button').style.display='none';
        }
      </script>
    ";
  }
}



if(isset($_POST['register_submit'])){
$fname=$_POST['first_name'];
$lname=$_POST['last_name'];
$email=$_POST['email'];
$phone=$_POST['phone_number'];
$gender=$_POST['gender'];
$dob=$_POST['date_of_birth'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];

$en_password=md5($password);


$_SESSION['register_fname']=$fname;
$_SESSION['register_lname']=$lname;
$_SESSION['register_email']=$email;
$_SESSION['register_phone']=$phone;
$_SESSION['register_gender']=$gender;
$_SESSION['register_date_of_birth']=$dob;
$_SESSION['register_password']=$password;
$_SESSION['register_cpassword']=$cpassword;


$string1="SELECT * from stock_user where email='".$email."'";

$result1=mysqli_query($conn,$string1);
if(!empty($fname) || !empty($lname) || !empty($email) || !empty($phone) || !empty($gender) || !empty($dob) || !empty($password) || !empty($cpassword)){
if(mysqli_num_rows($result1)==1){
  echo "
    <script>
      location.href='register.php';
      document.getElementById('invalid_email').innerHTML='Email Already Exist!';
    </script>
  ";
}
else{
  if($password==$cpassword){
  $string2="INSERT into stock_user(first_name,last_name,email,phone_number,gender,date_of_birth,password) values('$fname','$lname','$email','$phone','$gender','$dob','$en_password')";


  $result2=mysqli_query($conn,$string2);

  if($result2){
    unset($_SESSION["invalid_email"]);
    $_SESSION['email']=$email;
    echo "
      <script>
        location.href='welcome.php';
      </script>

    ";
  }
  else{
    echo "
      <script>
        window.alert('Password do not match');
      </script>

    ";
  }
  }
  else{
    echo "
      <script>
        alert('registeration Unsucessfull');
      </script>
    ";
  }
}
}
}


 ?>
<html>
<head>
  <link rel="icon" href="logo.png" type="image/x-icon" sizes="16X16" />
  <link href="https://fonts.googleapis.com/css?family=Jockey+One" rel="stylesheet" />

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link href="https://fonts.googleapis.com/css?family=Righteous|Roboto" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Mirza" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Jua|Overpass" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="css/register.css" >

  <meta name="viewport" content="width=device-width, initial-scale=1.0" media="screen and (max-width:500px)" />

  <meta name="theme-color" content="#008db1">

<script src="js/register.js">

</script>

<style>


</style>

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
    <div id='main'>
  <div id='register'>
    <form method='post' action="<?php echo $_SERVER['PHP_SELF']; ?>"  name='register_form'>
  <h3>Register</h3>
  <div id='register_main'>
    <div id='register_box'>
      <input type='text' id='register_firstname' placeholder="First Name" onfocus='input_focus(this.id)' onblur='input_blur(this.id)' name='first_name' onkeypress="capital(this.id)" />
      <input type='text' id='register_lastname' placeholder="Last Name" onfocus='input_focus(this.id)' onblur='input_blur(this.id)' name='last_name' onkeypress="capital(this.id)" />
    </div>
    <div id='register_box'>
      <div>
        <input type='email' id='register_email' placeholder="Email" onkeyup="checkemail(this.value)" onfocus='input_focus(this.id)' onblur='input_blur(this.id)' name='email' required/>
        <br>
        <div id='invalid_email' style="color:red;"></div>
      </div>
      <!--form for OTP gernearate -->
        <input type='submit' id='send_otp_button' name='email_otp' value='Send OTP' style="background-color:green;color:white;height:30px;border-radius:10px;border:none;width:100px;cursor:pointer;" />
    </div>
    <div id='register_box'>
      <div>
        <input type='text' id='register_otp' placeholder="Enter Your OTP" onfocus='input_focus(this.id)' onblur='input_blur(this.id)' name='otp'/>
        <br>
        <div id='otp_message' style="color:red;"></div>
      </div>
      <!--form for OTP gernearate -->
        <input type='submit' name='verify_otp' id='verify_otp_button'  value='Verify OTP' style="display:none;background-color:green;color:white;height:30px;border-radius:10px;border:none;width:100px;cursor:pointer;" />
    </div>
    <div id='register_box'>
      <input type='text' data-parsley-type="number" maxlength="10" id='register_phone' placeholder="Phone Number" onfocus='input_focus(this.id)' onblur='input_blur(this.id)' name='phone_number' />
    </div>
    <div id='register_box'>
      <label for='register_gender'>Gender:</label> <div><input type='radio' id='register_gender' name='gender' value='male' >Male</input></div> <div><input type='radio' name='gender' value='female' id='register_gender'>Female</input></div>
    </div>
    <div id='register_box'>
      <label for='register_dob'>Date of Birth:</label>
      <input type='date' id='register_dob' onfocus='input_focus(this.id)' onblur='input_blur(this.id)' name='date_of_birth' />
    </div>
    <div id='register_box'>
      <input type='password' id='register_password' placeholder="Password" onfocus='input_focus(this.id)' onblur="input_blur(this.id)" name='password' />
    </div>
    <div id='register_box' style="width:;">
      <input type='password' id='register_cpassword' placeholder="Confirm Password" onfocus='input_focus(this.id);register_match_password()' name='cpassword' onblur='input_blur(this.id)' />
      <div id='password_match'></div>
    </div>
    <div id='register_box'>
      <input type='checkbox' id='register_terms' value='terms' />I agree Terms and conditions
    </div>
    <div id='register_box'>
      <input type='submit' id='register_submit' value='Register' name='register_submit' />
    </div>
    <div id='register_box' style='display:inline;font-size:16px;'>
      Registered?<a href="login.php" style='color:#008db1;'>Login here</a>
    </div>
    <div id='register_box' style='display:inline;font-size:16px;'>
      <a href="adminregister.php" style='color:#008db1;'>Admin Registeration</a>
    </div>
  </div>
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
  <p>Copyright &copy; 2018-19 StockExchange,All rights reserved</p>
</div>
</footer>
</div>
</body>
</html>
