<?php
session_start();
include('database_conn.php');
if(isset($_SESSION['email'])){
  $email=$_SESSION['email'];
  $result = mysqli_query($GLOBALS['conn'],"SELECT * FROM stock_user where email ='".$email."'");
  while( $row = mysqli_fetch_assoc( $result ) ){
	$id=$row['id'];
  $first_name = $row['first_name'];
  $last_name = $row['last_name'];
  $email = $row['email'];
  $phone_number = $row['phone_number'];
  $gender = $row['gender'];
  $date_of_birth = $row['date_of_birth'];
  //header('Location: profile.php');
};
};

?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
        <h4 class="page-header text-center">Profile</h4>
      <hr>
      <div class="container">
        
        <form method="POST">

          <div class="form-group">
            <label for="id">ID:</label>
            <input type="text" class="form-control input-lg" name="id" id="id" value="<?php echo $id?>" readonly>
          </div>
          <div class="form-group">
            <label for="first_name">First name:</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $first_name?>" readonly>
          </div>
          <div class="form-group">
            <label for="last_name">Last name:</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $last_name?>" readonly>
          </div>
          <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $email?>" readonly>
          </div>
          <div class="form-group">
            <label for="phone_number">Phone number:</label>
            <input type="text" class="form-control" id="email" name="phone_number" value="<?php echo $phone_number?>" readonly>
          </div>
          <div class="form-group">
            <label for="pwd">Gender:</label>
            <select class="form-control" id="gender" name="gender" value="<?php echo $gender?>" readonly>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
          </div>
          <div class="form-group">
            <label for="date_of_birth">Date of birth:</label>
            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="<?php echo $date_of_birth?>" readonly>
          </div>
          <div>
            <button type="button" class="btn btn-default btn-lg btn-block"><a href="main.php">Close</a></button>
          </div>
          
        </form>
      </div>

      </div>    
</body>
</html>

