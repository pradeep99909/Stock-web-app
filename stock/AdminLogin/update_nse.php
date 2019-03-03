<?php
include('database_conn.php');
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$result = mysqli_query($conn,"SELECT * FROM nse where id ='".$id."'");
    while( $row = mysqli_fetch_assoc( $result ) ){
	$id=$row['id'];
    $ticker=$row['TICKER'];
    $type=$row['TYPE'];
    $current=$row['CURRENT'];
    $open=$row['OPEN'];
    $high=$row['HIGH'];
    $low=$row['LOW'];
	$prev_close=$row['PREV CLOSE'];
	$volume=$row['VOLUME'];
};
};
if (isset($_POST['save'])) {
  $id=$_POST['id'];
    $ticker=$_POST['TICKER'];
    $type=$_POST['TYPE'];
    $current=$_POST['CURRENT'];
    $open=$_POST['OPEN'];
    $high=$_POST['HIGH'];
    $low=$_POST['LOW'];
	$prev_close=$_POST['PREV_CLOSE'];
	$volume=$_POST['VOLUME'];
    $sql = "UPDATE nse SET TICKER='".$ticker."',TYPE='".$type."',CURRENT='".$current."',OPEN='".$open."',HIGH='".$high."',LOW='".$low."',VOLUME='".$volume."' WHERE id='".$id."'";

    //$sql = "Update stock_user set  where id ='".$id."'";
  
      $result = mysqli_query($conn,$sql);
      if($result){
       //echo "success data";
        header('Location: nse50.php');
      };
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Update user</title>
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
        <h4 class="page-header text-center">Update details</h4>
      
      <div class="container-fluid">
        
        <form method="POST">

          <div class="form-group">
            <label for="id">ID:</label>
            <input type="text" class="form-control input-lg" name="id" id="id" value="<?php echo $id?>" readonly>
          </div>
          <div class="form-group">
            <label for="first_name">TICKER</label>
            <input type="text" class="form-control" id="first_name" name="TICKER" value="<?php echo $ticker?>">
          </div>
          <div class="form-group">
            <label for="last_name">TYPE:</label>
            <input type="text" class="form-control" id="last_name" name="TYPE" value="<?php echo $type?>">
          </div>
          <div class="form-group">
            <label for="email">CURRENT:</label>
            <input type="text" class="form-control" id="email" name="CURRENT" value="<?php echo $current?>">
          </div>
          <div class="form-group">
            <label for="phone_number">OPEN:</label>
            <input type="text" class="form-control" id="email" name="OPEN" value="<?php echo $open?>">
          </div>
          <div class="form-group">
            <label for="pwd">HIGH:</label>
            <input type="text" class="form-control" id="email" name="HIGH" value="<?php echo $high?>">
          </div>
		  <div class="form-group">
            <label for="pwd">LOW:</label>
            <input type="text" class="form-control" id="email" name="LOW" value="<?php echo $low?>">
          </div>
          <div class="form-group">
            <label for="pwd">PREV CLOSE:</label>
            <input type="text" class="form-control" id="email" name="PREV_CLOSE" value="<?php echo $prev_close?>">
          </div>
		  <div class="form-group">
            <label for="pwd">VOLUME:</label>
            <input type="text" class="form-control" id="email" name="VOLUME" value="<?php echo $volume?>">
          </div>
          <button type="submit" name="save" class="btn btn-primary btn-lg btn-block">Save</button>
          <div>
            <button type="button" class="btn btn-default btn-lg btn-block"><a href="nse50.php">Close</a></button>
          </div>
          
        </form>
      </div>

      </div>

</body>
</html>
