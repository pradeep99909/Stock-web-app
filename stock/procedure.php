<?php
$conn=mysqli_connect("localhost","root","","stock");
if(isset($_POST["insert_btn"])){
	$sql="CALL insertData('".$_POST["username"]."', '".$_POST["name"]."')";
	if (mysqli_query($conn,$sql))
	{
		header("Location: procedure.php?inserted=1");
	}
}

if(isset($_GET["inserted"])){
	echo '<script>alert("data inserted")</script>';
}

?>

<html>
	<head><title> Stored Procedure </title></head>
	<body>
		<div class="container-box">
			<form method="post">
				<h1>Stored procedure</h1>
				<div class="form-group">
					<label>Enter Username</label>
					<input type="text" name="username" id="username" class="form-container">
				</div>
				<br>
				<div class="form-group">
					<label>Enter Name</label>
					<input type="text" name="name" id="name" class="form-container">
				</div>
				<br>
				<div class="form-group">
					<input type="submit" name="insert_btn" class="btn btn-info">
				</div>
			</form>
		</div>
	</body>
</html>