<?php

require_once 'sendMailD.php';
$mailF = new sendMailD();
    try
    {
		$userOtpRCode = "2345";
		$userEmail = "xyz@gmail.com"; //email id of recevr
            	$message= "
                           Hello , $userEmail
                           <br /><br />
                           We got request to rgister your email id for  if you have requested  then use the one time verfification code to verify your email id, if not just ignore this email,
                           <br /><br />
                           Your one time verification code is  $userOtpRCode
                           <br /><br />
                           
                           <br /><br />
                           Thank you 
                           <br /><br />
                           PCE 
                           ";
                        $subject = "User verification";
                
                        $retv = $mailF->sendMail($userEmail,$message,$subject);

                        if($retv == "OK"){
                           
				echo "<h1>Mail sent!<h1>";

                        }
                        else {
                            echo "Mail not sent!";
                        }
            

    }
    catch(PDOException $e){
        echo $e->getMessage();
    }


?>

