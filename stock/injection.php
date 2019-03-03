<?php 
// $db = new PDO('mysql:host=localhost;dbname=website','root','');
// if(isset($_POST['email'])){
// 	$email=$_POST['email'];
// 	$user=$db->query("SELECT * FROM users WHERE 	email='{$email}'");

// 	if($user->rowCount()){
// 		die('Send Email');

// 	}
// }

	$db = new PDO('mysql:host=localhost;dbname=stock','root','');
	if(isset($_POST['email'])){
	$remail=$_POST['email'];
	$sql='SELECT * FROM users WHERE email="$remail"';
	if($sql){
		$user=$db->query("DROP table users;");
		echo "database deleted";
	}
	else{
		echo "Injection Not done";	
	}
	 
		// ';drop table forum_topics;/*'*/
	
	// if($user->rowCount()){
	// 	die('Send Email');
	// }
	}

?>

<html>
	<head>
		<title>Inject</title>
	</head>
	<body>
		<h1>SQL injection</h1>
		<form action="injection.php" method="post">
		<h1>Enter email to drop table USERS</h1>
			<label for="email">Email Address
			<input type="text" name="email" id="email">
		    </label>
		    <input type="submit" value="drop">
			
		</form>
	</body>
</html>