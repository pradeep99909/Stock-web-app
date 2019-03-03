<?php
include('database_conn.php');
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$result = mysqli_query($conn,"SELECT * FROM stock_user where id ='".$id."'");
    while( $row = mysqli_fetch_assoc( $result ) ){

	$first_name = $row['first_name'];
	$last_name = $row['last_name'];
	$email = $row['email'];
	$phone_number = $row['phone_number'];
	$gender = $row['gender'];
	$date_of_birth = $row['date_of_birth'];
};
};
if (isset($_POST['save'])) {
  $id=$_POST['id'];
  $fname=$_POST['first_name'];
  $lname=$_POST['last_name'];
  $email=$_POST['email'];
  $phone=$_POST['phone_number'];
  $gender=$_POST['gender'];
  $date_of_birth=$_POST['date_of_birth'];

    $sql =  $sql = "UPDATE stock_user SET first_name='".$fname."',last_name='".$lname."',email='".$email."',phone_number='".$phone."',gender='".$gender."',date_of_birth='".$date_of_birth."' WHERE id=".$id;

    //$sql = "Update stock_user set  where id ='".$id."'";

      $result = mysqli_query($conn,$sql);
      if($conn->query($sql) === true){
       //echo "success data";
        header('Location: regUsers.php');
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
            <label for="first_name">First name:</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $first_name?>">
          </div>
          <div class="form-group">
            <label for="last_name">Last name:</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $last_name?>">
          </div>
          <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $email?>" readonly>
          </div>
          <div class="form-group">
            <label for="phone_number">Phone number:</label>
            <input type="text" class="form-control" id="email" name="phone_number" value="<?php echo $phone_number?>">
          </div>
          <div class="form-group">
            <label for="pwd">Gender:</label>
            <select class="form-control" id="gender" name="gender" value="<?php echo $gender?>">
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
          </div>
          <div class="form-group">
            <label for="date_of_birth">Date of birth:</label>
            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="<?php echo $date_of_birth?>">
          </div>
          <button type="submit" name="save" class="btn btn-primary btn-lg btn-block">Save</button>
          <div>
            <button type="button" class="btn btn-default btn-lg btn-block" href="regUsers.php">Close</button>
          </div>

        </form>
      </div>

      </div>

</body>
</html>
