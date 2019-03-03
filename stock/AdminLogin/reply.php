<?php
	include('database_conn.php');
	if(isset($_GET['uid'])){
		$id = $_GET['uid'];
		$result = mysqli_query($conn,"SELECT * FROM contact where id ='".$id."'");
	    while( $row = mysqli_fetch_assoc( $result ) ){
	                        
		$id = $row['id'];
		$message = $row['message'];
		$reply = $row['reply'];
	};
};
if (isset($_POST['send'])) {
  $id=$_POST['id'];
  $message=$_POST['message'];
  $reply=$_POST['reply'];
    $sql =  $sql = "UPDATE contact SET reply='".$reply."' WHERE id=".$id;

    //$sql = "Update stock_user set  where id ='".$id."'";
  
      $result = mysqli_query($conn,$sql);
      if($conn->query($sql) === true){
       //echo "success data";
        header('Location: messages.php');
      };
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>User reply</title>
	<!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
</head>
<body>
	<div class="container-fluid">
        <h4 class="page-header text-center">Reply message</h4>
      
      <div class="container-fluid">
        
        <form method="POST">

          <div class="form-group">
            <label for="id">ID:</label>
            <input type="text" class="form-control input-lg" name="id" id="id" value="<?php echo $id?>" readonly>
          </div>
          <div class="form-group">
            <label for="message">Message:</label>
            <input type="text" class="form-control input-lg" name="message id="id" value="<?php echo $message?>" readonly>
          </div>
          <div class="form-group">
            <label for="reply">Reply:</label>
            <textarea class="form-control input-lg" name="reply" id="reply" value="<?php echo $reply?>"></textarea>
          </div>
          <button type="submit" name="send" class="btn btn-primary btn-lg btn-block">Send</button>
          <div>
            <button type="button" class="btn btn-default btn-lg btn-block" href="messages.php">Close</button>
          </div>
       </form>
      </div>

    </div>
</body>
</html>
