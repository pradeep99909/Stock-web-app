<?php
class sendMailD
{	

	private $conn;
	
	
	
	function sendMail($email,$message,$subject)
	{						
		require_once('mailer/class.phpmailer.php');
		$mail = new PHPMailer();
		$mail->IsSMTP(); 
		$mail->SMTPDebug  = 0;                     
		$mail->SMTPAuth   = true;                  
		$mail->SMTPSecure = "ssl";                 
		$mail->Host       = "smtp.gmail.com";      
		$mail->Port       = 465;             
		$mail->AddAddress($email);
		  
		$mail->Username="stockexchange04@gmail.com";  
		$mail->Password="intpmini@123";   
		  
		$mail->SetFrom('stockexchange04@gmail.com','Stock Exchange Team');
		$mail->Subject    = $subject;
		$mail->MsgHTML($message);
		if(!$mail->send()) {
			  return "FAIL";
		} else {
  				return "OK";
		}
		

	}	
}

?>
