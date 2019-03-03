<?php
include('database_conn.php');
if(isset($_GET['did'])){
  $id = $_GET['did'];
  include('database_conn.php');
  $sql = "DELETE FROM news where id ='".$id."'";

  //$result = mysqli_query($conn,$sql);

  if($conn->query($sql) === true){
    header('Location: news.php');
  };
};
if (isset($_POST['save'])) {
  $headline=$_POST['headline'];
  $detail=$_POST['detail'];
  $fileupload = $_FILES['image']['name'];
  $image=$_FILES['image']['tmp_name'];
  $folder = "./images/";
  move_uploaded_file($image, $folder.$fileupload);

  $source=$_POST['source'];
  $string2 = "INSERT into news(headline,detail,image,source) values('$headline','$detail','$image','$source')";
  $result2=mysqli_query($conn,$string2);
  if($result2){
    header('Location: news.php');
  }

/*  $fileupload = $_FILES['image']['name'];

  $fileuploadTMP = $_FILES['image']['tmp_name'];

  $folder = "images/";



  move_uploaded_file($fileuploadTMP, $folder.$fileupload);

$sql = "INSERT INTO event(id,headline,image) VALUES ('','$headline','$fileupload')";*/

}
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard-news</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="index.php">Stock Exchange</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <!--<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">-->
        <div class="input-group">
         <!-- <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2"> -->
          <!--<div class="input-group-append">-->
            <!--<button class="btn btn-primary" type="button">-->
            <!--  <i class="fas fa-search"></i>-->
            <!--</button>-->
          </div>
        </div>
      <!--</form>-->

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">

        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="profile.php">Profile</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </li>
      </ul>

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Databases</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Stock Database:</h6>
            <a class="dropdown-item" href="bse30.html">BSE 30</a>
            <a class="dropdown-item" href="nse50.php">NSE 50</a>
            <a class="dropdown-item" href="currency.html">Currency</a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">User Database:</h6>
            <a class="dropdown-item" href="regUsers.php">Registered Users</a>
            <a class="dropdown-item" href="OTPusers.php">OTP request users</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="news.php">
            <i class="fas fa-fw fa-table"></i>
            <span>News</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tables.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Database Tables</span></a>
        </li>
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">News</li>
          </ol>

       <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Database Table</div>
            <div class="card-body">
            <h2 style="float: left;">Add News : </h2>
            <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">Add</button>

              <div class="table-responsive">
                <table style="font-size: 10px;" class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Headline</th>
                      <th>Details</th>
                      <th>Image</th>
                      <th>Source</th>
                      <th>Delete</th>

                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Headline</th>
                      <th>Details</th>
                      <th>Image</th>
                      <th>Source</th>
                      <th>Delete</th>

                    </tr>
                  </tfoot>
                  <tbody>

                    <?php
                    $result = mysqli_query($conn,"SELECT * FROM news");
                      while( $row = mysqli_fetch_assoc( $result ) ){

                        echo
                        "<tr>
                          <td>{$row['id']}</td>
                          <td>{$row['headline']}</td>
                          <td>{$row['detail']}</td>
                          <td><img src='data:image/jpeg;base64,".base64_encode($row['image'])."' height=50 width=50></td>
                          <td>{$row['source']}</td>";
            echo "<td><a class='btn btn-danger btn-sm' href='news.php?did=".$row['id']."'>Delete</a></td></tr>";

                      }

                    ?>
                    <div class="container">


                      <!-- The Modal -->
                      <div class="modal fade" id="myModal">
                        <div class="modal-dialog">
                          <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                              <h4 class="modal-title">News details</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                              <div class="container-fluid">

                  <form class="table-responsive" method="POST">

                    <div class="form-group">
                      <label for="id">Headline:</label>
                      <input type="text" class="form-control input-lg" name="headline" id="headline">
                    </div>
                    <div class="form-group">
                      <label for="detail">Details:</label>
                      <textarea class="form-control" rows="5" name="detail" id="detail"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="image">Image:</label>
                      <input type="file" class="form-control" name="image" id="image" >
                    </div>
                    <div class="form-group">
                      <label for="source">Source:</label>
                      <input type="text" class="form-control" id="source" name="source">
                    </div>
                    <div>
                        <button type="submit" name="save" class="btn btn-primary btn-lg btn-block">Save</button>
                    </div>


                    </form>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>

                          </div>
                        </div>


                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted"> <p>Updated at <span id="datetime"></span></p></div>

            <script>
            var dt = new Date();
            document.getElementById("datetime").innerHTML = (("0"+dt.getDate()).slice(-2)) +"."+ (("0"+(dt.getMonth()+1)).slice(-2)) +"."+ (dt.getFullYear()) +" "+ (("0"+dt.getHours()).slice(-2)) +":"+ (("0"+dt.getMinutes()).slice(-2));
            </script>
          </div>



        </div>



       </div>
      </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Stock Exchange 2018</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="../logout.php?name=admin">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>

  </body>

</html>
