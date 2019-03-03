<?php
if(isset($_GET['id'])){
	$id = $_GET['id'];
	include('database_conn.php');
	$sql = "DELETE FROM stock_user where id ='".$id."'";
	
	//$result = mysqli_query($conn,$sql);

	if($conn->query($sql) === true){
		echo "success data";
		header('Location: regUsers.php');
	}
	else{
		echo "no data";
	}
};

?>